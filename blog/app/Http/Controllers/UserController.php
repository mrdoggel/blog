<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('username', 'password');
        $validation = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($credentials, $validation);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withInput($request->except('password'))->withErrors($validator->errors());
        }
        if (auth()->attempt($credentials)) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect('/home');
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'Invalid username or password']);
        }
    }

    public function register(Request $request) {
        $incoming = $request->only('username', 'email', 'password');
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'max:200', 'confirmed']
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withInput($request->except('password'))->withErrors($validator->errors());
        }

        $user = User::create($incoming);
        Auth::login($user);

        return redirect('/home');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
