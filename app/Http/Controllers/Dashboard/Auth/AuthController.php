<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\ChechOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');

    }//end of fun

    public function store(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'email', 'exists:users'],
            'password'  => ['required'],
        ]);
            

        $credentials = $request->only('email', 'password');
        $remember    = true;

        if ($credentials) {    

            if (auth()->attempt($credentials)) {
                session()->flash('success', __('dashboard.login_successfully'));
                return redirect()->route('dashboard.home');
            }

            return redirect()->back()->with(['password' => __('auth.no_password')])->withInput();

        } else {

            return redirect()->back()->with('success', 'تم ارسال ايميل لتاكيد الحساب 👌');

        }

        return redirect()->back()->with(['login' => __('login.no_data_found')])->withInput();

    }//end of fun

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard.login.index');

    }//end of fun


}//end of controller