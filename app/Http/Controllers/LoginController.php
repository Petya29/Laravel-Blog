<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::check()){
            return redirect()->to(route('user.profile'));
        }

        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.profile'));
        }else{
            return redirect()->to(route('user.login'))->withErrors([
                'password' => 'Invalid email or password, try again'
            ]);
        }

    }
}
