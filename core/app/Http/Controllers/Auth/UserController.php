<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotifyEvent;
use App\Events\serviceProvidernotify;
use App\Http\Controllers\Controller;
use App\Jobs\adminSendEmail;
use App\Models\Admin;
use App\Models\ExpertArea;
use App\Models\GeneralSetting;
use App\Models\Payment;
use App\Models\Proposal;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\User;
use App\Notifications\proposalNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = @Auth::user()->fullname . '-dashboard';
        $data['dashboard'] = 'active';
        $data['proposal_submit'] = Proposal::with('service')->where('user_id', Auth::user()->id)->paginate(10);
        return view('frontend.user.dashboard')->with($data);
    }

    public function history($id)
    {
        $data['proposal_submit'] = Proposal::with('service')->where('user_id', Auth::user()->id)->count();
        $data['payment'] = Payment::where('proposal_id', $id)->where('user_id', Auth::user()->id)->get();
        $data['pageTitle'] = @Auth::user()->fullname . '-history';
        $data['dashboard'] = 'active';
        return view('frontend.user.history')->with($data);
    }

    public function profile()
    {
        $data['pageTitle'] = @Auth::user()->fullname . '-profile';
        $data['profile'] = 'active';
        return view('frontend.user.profile')->with($data);
    }

    public function profileUpdate(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'sometimes|image',
            'email' => 'unique:users,email,' . Auth::id(),
            'phone' => 'required|unique:users,phone,' . Auth::id(),

        ], [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Last Name is required',

        ]);

        $user = auth()->user();


        if ($request->hasFile('image')) {
            $size = '170x170';
            $filename = uploadImage($request->image, filePath('user'), $size, $user->image);
            $user->image = $filename;
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();

        return back()->with('success', 'Successfully Updated Profile');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:5',
            'password' => 'min:5|confirmed',

        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password do not match');
        } else {
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->back()->with('success', 'Password Updated');
        }
    }

    public function sendProposal(Request $request)
    {
        $request->validate([
            'document' => 'mimes:jpeg,png,jpg,doc,docx,pdf'
        ]);

        $proposal = new Proposal();

        $proposal->user_id = Auth::user()->id;
        $proposal->service_id = $request->service;
        $proposal->client_budget = $request->budget;
        $proposal->description = $request->description;

        if ($request->has('document')) {
            $response = cloudinary()->upload($request->document->getRealPath(), [
                'folder' => 'CA/proposal',
                'transformation' => [
                    'quality' => 'auto',
                ]
            ])->getSecurePath();

            $proposal->document = $response;
        }

        $proposal->save();

        $service = Service::findOrFail($request->service);

        $message = Auth::user()->fullname . ' Send a proposal';
        $admins = Admin::all();


        $create = $proposal->created_at->diffforhumans();

        $realtime_id = $proposal->id;

        $general = GeneralSetting::select('sitename')->first();

        $details = [
            'subject' => @$general->sitename . ' -proposal submit by -  ' . Auth::user()->fullname,
            'message' => $request->description,
            'service' => $service->title,
            'budget' => $request->budget,
            'actual_budget' => $service->price_range,
            'email' => Auth::user()->email,
        ];




        $emailJob = (new adminSendEmail($details))->delay(Carbon::now()->addSecond(1));
        dispatch($emailJob);

        event(new NotifyEvent($message, $create, $realtime_id));

        event(new serviceProvidernotify($message, $create, $realtime_id));

        $database_id = $proposal->id;
        Notification::send($admins, new proposalNotification($message, $database_id));
        $expertise = ExpertArea::where('subcategory_id', $service->sub_category_id)->get();
        foreach ($expertise as $item) {
            $providers = ServiceProvider::find($item);
            Notification::send($providers, new proposalNotification($message, $database_id));
        }
        return back()->with('success', 'your proposal successfully send! shortly we will get back to you');
    }
}
