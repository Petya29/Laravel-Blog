<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {

        if (Auth::check()) {
            return redirect()->to(route('user.profile'));
        }

        $validateFields = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect()->to(route('user.profile'));
        } else {
            return redirect()->to(route('user.login'))->withErrors([
                'password' => 'Something went wrong, try again'
            ]);
        }
    }
}
