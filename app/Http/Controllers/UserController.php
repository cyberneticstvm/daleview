<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)):
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, $request->get('remember'));
            return redirect()->route('dash')->with("success", "Logged in successfully!");
        endif;  
        return redirect("/")->with('error', 'Login details are not valid')->withInput($request->all());
    }

    public function dash(){
        //echo Auth::user()->role()->name;
        //die;
        //return view(Auth::user()->role()->name);
        return view('dash-admin');
    }
}
