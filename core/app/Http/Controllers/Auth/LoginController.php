<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;


class LoginController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'user-login';
        return view('frontend.user.auth.login')->with($data);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard')
                ->with('success', 'Successfully logged in');
        }


        return redirect()->route('user.login')->with('error', 'Authentication failed');
    }


    //GOOGLE___LOGIN
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('dashboard');
            } else {
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'username' => $user->user['family_name'],
                    'password' => bcrypt(uniqid())
                ]);

                Auth::login($newUser);

                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('user.login')->with('error', $e->getMessage());
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('dashboard');
            } else {
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'username' => null,
                    'password' => bcrypt(uniqid())
                ]);

                Auth::login($newUser);

                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('user.login')->with('error', $e->getMessage());
        }
    }



    public function register()
    {
        $data['pageTitle'] = 'user-register';
        return view('frontend.user.auth.register')->with($data);
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',           
            'email' => 'email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:5|confirmed',
        ], [
            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
        ]);

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,          
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.login')->with('success', 'Register complete.please login');
    }


    public function signOut()
    {
        Auth::logout();

        return Redirect()->route('user.login');
    }
}
