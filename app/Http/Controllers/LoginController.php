<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(){
        Auth::logout();
        return view('login');
    }

    public function checkLogin(Request $request)
    {   
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user_data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($user_data)){
            $request->session()->regenerate();
            session()->put('username', Auth::user()->name);
            session()->save();
            if(Auth::user()->type == 'admin'){
                return redirect()->intended('admin');
            }
            else if(Auth::user()->type == 'resepsionis'){
                return redirect()->intended('receptionist');
            }
        }
        else{
            return redirect('/login')->with('error', true);
        }
    }
}
