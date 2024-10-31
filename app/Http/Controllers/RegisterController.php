<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function save(Request $request)
    {   
        if(Auth::check())
        {
            return  redirect(route('user.private'));
        }

        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists())
        {
            return redirect()->to(route('user.registration'))->withErrors([
                'formError' => "Email has already exists"
            ]);
        }

        $user = User::create($validateFields);

        if($user)
        {
            Auth::login($user);

            return redirect(route('user.private'));
        }

        return redirect()->to(route('user.login'))->withErrors([
            'formError' => "Error with user"
        ]);
    }
}
