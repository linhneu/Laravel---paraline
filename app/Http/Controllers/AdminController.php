<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $message = [
            'email.required' => 'You must fill email',
            'email.email' =>'email is not in correct format',
            'password.required' => 'You must fill password',
            'password.min' => 'password must have at least 8 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('getLogin')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt([
                'email' => $email,
                'password' => $password,
            ])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('getLogin')->with('message', 'Login is failed');
            }
        }
    }
}
