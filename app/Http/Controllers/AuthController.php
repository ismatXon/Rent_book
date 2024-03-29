<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        //cek apakah login valid
        if(Auth::attempt($credentials)){
            //cel apakah user status = active
            if(auth::user()-> status != 'active' ){

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                session::flash('status','failed');
                session::flash('message','Your Account in not Active, Please contact admin!');
                return redirect('login');
            }
            // $request->session()->regenerate();
            if(Auth::user()->role_id == 1 ){
                return redirect('dashboard');
            }
            if(Auth::user()->role_id == 2 ){
                return redirect('profile');
            }
        }
        session::flash('status','failed');
        session::flash('message','Login Invalid');
        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerProcess(Request $request){

        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required'
        ]);
        $request['password']= Hash::make($request->password);
        $user = User::create($request->all());

        session::flash('status','Success');
        session::flash('message','Regist Success, Wait Admin for approval');

        return redirect('register');
    }

}
