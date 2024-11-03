<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

class AuthController extends Controller
{
    //
    public function login() {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return redirect("admin/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 2) {
                return redirect("teacher/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 3) {
                return redirect("student/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 4) {
                return redirect("parent/dashboard")->with("success","welcom");
            }
        }
        return view("auth.login");
    }

    public function authLogin(Request $request) {
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(credentials: ["email"=> $request->email, "password" => $request->password], remember: $remember)) {
            if (Auth::user()->role == 1) {
                return redirect("admin/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 2) {
                return redirect("teacher/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 3) {
                return redirect("student/dashboard")->with("success","welcom");
            } else if (Auth::user()->role == 4) {
                return redirect("parent/dashboard")->with("success","welcom");
            } else
                return redirect("login")->with("error","ensure this email is member");
        } else {
            return redirect()->back()->with("error","enter your email and password");
        }

    }

    public function forgotPassword() {
        return view("auth.forgot");
    }

    public function postForgotPassword(Request $request) {
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassword($user));
            return redirect()->back()->with("success","please check your email and reset your password.");
        }
        return redirect()->back()->with('error', 'Email not found');
    }

    public function reset($token) {
        $user = User::getTokenSingle($token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', data: $data);
        }
        abort(404);
    }

    public function postReset($token, Request $request) {
        if ($request->password == $request->cpassword) {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect('/')->with('success','password successfully reset.');
        }
        return redirect()->back()->with('error', 'password and confirm password does not match.');
    }

    public function logout() {
        Auth::logout();
        return redirect('');
    }

}
