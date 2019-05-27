<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutController extends Controller
{
    //
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/home');
    }
}
