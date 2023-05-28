<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthForgotPasswordController extends Controller
{
    public function index()
    {
        $pageTitle = 'Forgot Password';

        return view('frontend.user.auth.forgot_password', compact('pageTitle'));
    }

    public function sendVerification(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if (!$user) {          
            return back()->with('error', 'Please Provide a valid email');
        }

        $code = random_int(100000, 999999);

        $user->verification_code = $code;

        $user->save();

         sendMail('PASSWORD_RESET', ['code' => $code],  $user);

         session()->put('email',$user->email);

        return redirect()->route('user.auth.verify')->with('success', 'Send verification code to your email');
    }


    public function verify()
    {
        $email = session('email');

        $pageTitle = 'Verify Code';

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('user.forgot.password')->with('invalid user!!!');
        }

        return view('frontend.user.auth.verify', compact('pageTitle', 'email'));
    }


    public function verifyCode(Request $request)
    {
        
        $request->validate([
            'code' => 'required',
            'email' => 'required|exists:users,email',
        ],[
            'code.required' => 'verification code does not match'
        ]);

        $user = User::where('email', $request->email)->first();

        
        $token = $user->verification_code;
      
        if ($user->verification_code != $request->code) {     

            return back()->with('error','Invalid Code');
        }

        $user->verification_code = null;

        $user->save();

        $d=session()->put('identification', [
            "token" => $token,
            "email" => $user->email
        ]);


        return redirect()->route('user.reset.password');
    }

    public function reset()
    {
        $email = session('identification');

        if (!$email) {

            return redirect()->route('user.login');
        }

        $pageTitle = 'Reset Password';

        return view('frontend.user.auth.reset', compact('pageTitle', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email', 
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('user.login')->with('success', 'Successfully Reset Your Password');
    }

}
