<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSuperVisorController extends Controller
{
    public function showLoginForm()
    {
        return view('story.login'); // You'll need to create this view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page or dashboard
            return redirect('story');
        } else {
            // Authentication failed, redirect back to login with an error message
            return redirect()->route('supervisor.showLogin')->with('error', 'تحقق من ادخال البيانات صحيحه');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('supervisor.showLogin');
    }
}