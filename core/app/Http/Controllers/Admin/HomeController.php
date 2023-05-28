<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Jobs\emailSendJobs;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\GeneralSetting;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function dashboard()
    {

        if (is_null($this->user) || !$this->user->can('dashboard')) {
            $data['pageTitle'] = 'Dashboard';
            $data['navDashboardActiveClass'] = "active";
            return view('backend.welcome')->with($data);
        }

        $data['pageTitle'] = 'Dashboard';
        $data['navDashboardActiveClass'] = "active";
        return view('backend.dashboard')->with($data);
    }

    public function user()
    {
        if (is_null($this->user) || !$this->user->can('user_list')) {
            abort(401);
        }
        $data['users'] = 'active';
        $data['pageTitle'] = "Users";
        $data['user'] = User::get();
        return view('backend.user')->with($data);
    }

    public function subscribers()
    {
        $pageTitle = "Newsletter Subscriber";
        $subscribersActiveClass = 'active';
        $subscribers_all = Subscriber::latest()->get();
        return view('backend.subscriber', compact('subscribers_all', 'pageTitle', 'subscribersActiveClass'));
    }

    public function sendEmail()
    {
        $data['subscriberActiveClass'] = 'active';
        $data['pageTitle'] = "Email Send To Subscriber";
        $data['subscribers'] = Subscriber::all();
        return view('backend.email.sendEmailToSubscriber')->with($data);
    }

    public function sendgroupEmail(Request $request)
    {

        $request->validate([
            'select' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        $general = GeneralSetting::select('site_email', 'sitename')->first();

        $details = [
            'select' => $request->select,
            'subject' => $request->subject,
            'message' => $request->message,
            'email' => @$general->site_email,
        ];

        if ($request->select == 1) {
            $emailJob = (new emailSendJobs($details))->delay(Carbon::now()->addSecond(1));
        }
        dispatch($emailJob);
        return redirect()->back()->with('success', 'E-Mail Successfully Send');
    }

    public function markNotification(Request $request)
    {
        auth()->guard('admin')->user()
            ->unreadNotifications
            ->markAsRead();

        return redirect()->back()->with('success', 'All Notifications are Marked');
    }

    public function userDetails(Request $request)
    {
        $user = User::where('id', $request->user)->firstOrFail();

        $pageTitle = "User Details";

        return view('backend.user_details', compact('pageTitle', 'user'));
    }

    public function sendUserMail(Request $request, User $user)
    {
        $data = $request->validate([
            'subject' => 'required',
            "message" => 'required',
        ]);

        $data['name'] = $user->fullname;
        $data['email'] = $user->email;

        sendGeneralMail($data);

        $notify[] = ['success', 'Send Email To user Successfully'];

        return back()->withNotify($notify);
    }
}
