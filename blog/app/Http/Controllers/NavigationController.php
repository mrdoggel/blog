<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function start() {
        return view('login');
    }

    public function showRegister() {
        return view('register');
    }
}
