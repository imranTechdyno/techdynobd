<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin_user_list')) {
            abort(401);
        }

        $data['pageTitle'] = "Admin List";
        $data['navAdminActive'] = "active";
        $data['adminListActive'] = "active";
        $data['admins'] = Admin::where('id', '!=', auth()->guard('admin')->user()->id)->latest()->get();
        return view('backend.administration.admin_user.list')->with($data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin_user_add')) {
            abort(401);
        }
        $data['pageTitle'] = "Create Admin";
        $data['navAdminActive'] = "active";
        $data['adminAddActive'] = "active";

        $data['roles'] = Role::all();

        return view('backend.administration.admin_user.add')->with($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:admins',
            'phone' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        if ($request->has('image')) {
            $size = '400x400';
            $image = uploadImage($request->image, filePath('admin'), $size, $admin->image);
            $admin->image = $image;
        }

        $admin->save();

        $admin->assignRole($request->role);

        return redirect()->route('admin.index')->with('success', 'Admin User Created Successfully');
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin_user_edit')) {
            abort(401);
        }
        $data['pageTitle'] = "Edit Admin";
        $data['navAdminActive'] = "active";
        $data['adminListActive'] = "active";

        $data['roles'] = Role::all();
        $data['admin'] = Admin::find($id);

        return view('backend.administration.admin_user.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $admin = Admin::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:admins,id,' . $admin->phone,
            'email' => 'required|email|unique:admins,id,' . auth()->guard('admin')->user()->email,
            'username' => 'required|unique:admins,id,' . auth()->guard('admin')->user()->username,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->username = $request->username;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        if ($request->has('image')) {
            $size = '400x400';
            $image = uploadImage($request->image, filePath('admin'), $size, $admin->image);
            $admin->image = $image;
        }

        $admin->save();

        @$admin->roles()->detach();

        @$admin->assignRole($request->role);

        return redirect()->route('admin.index')->with('success', 'Admin User Updated Successfully');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('admin_user_delete')) {
            abort(401);
        }
        $admin = Admin::find($id);
        if ($admin) {
            $admin->roles()->detach();
            removeFile(filePath('admin') . '/' . @$admin->image);
            $admin->delete();
        }

        return redirect()->back()->with('success', "User deleted successfully");
    }

    public function profile()
    {
        $pageTitle = 'Profile';

        return view('backend.profile', compact('pageTitle'));
    }

    public function profileUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,id,' . auth()->guard('admin')->user()->email,
            'image' => 'sometimes|image|mimes:jpg,jpeg,png'
        ]);

        $admin = auth()->guard('admin')->user();

        if ($request->has('image')) {

            $path = filePath('admin');

            $size = '400x400';

            $filename = uploadImage($request->image, $path, $size, $admin->image);

            $admin->image = $filename;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        $notify[] = ['success', 'Admin Profile Update Success'];

        return redirect()->back()->withNotify($notify);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $admin = auth()->guard('admin')->user();

        if (!Hash::check($request->old_password, $admin->password)) {
            $notify[] = ['error', 'Password Does not match'];

            return back()->withNotify($notify);
        }

        $admin->password = bcrypt($request->password);
        $admin->save();


        $notify[] = ['success', 'Password changed Successfully'];

        return back()->withNotify($notify);
    }

    public function multiple(Request $request)
    {
        if ($request->has('data')) {
            foreach ($request->data as $data) {
                Admin::findOrFail($data)->delete();
            }
            return response()->json(['message' => 'data successfully deleted']);
        } else {
            return response()->json(['message' => 'no data found']);
        }
    }
}
