<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check())
        {
            return redirect(route('user.private'));
        }

        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields))
        {
            return redirect(route('user.private'));
        }
    }
}
