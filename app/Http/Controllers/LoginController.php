<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {   

        $credentials = $request->validate([
            'email' => ['required',],
            'password' => ['required'],
        ]);

        

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            // return "yes";
            flashy()->success('Login Successfully. ✅', '#');
                 return redirect()->route('dashboard');
             
           
        }
        flashy()->error(' ❌ Email || Password is invalid ', '#');
        return back()->with(""); 
        
        
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        flashy()->info('Logout Successfully ✅', '#');
    
        return redirect('/')->with('');
    }
}
