<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function postLogin(UserFormRequest $request)
    {

        $input = $request->only('email', 'password');
        if (Auth::attempt($input)) {
           return redirect()->route('dashboard')->with('messages', 'Login is successful');
        } else {
            return redirect()->route('getLogin')->with('messages', 'Login is failed');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
