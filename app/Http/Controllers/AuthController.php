<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(){

        return view('Auth.register');
    }


    public function postregister(Request $request){

       $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'string|required'
       ]);


       $user = new User();
       $user -> name = $request->name;
       $user -> email = $request->email;
       $user->password = Hash::make($request->password);
        $user->save();
       return back()->with('success','Your registration has been successful');
       

       

    }

    public function login(){

        return view('Auth.login');
    }

    public function postlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $userFilter = $request->only('email','password');

        if(Auth::attempt( $userFilter)){

            return view('backend.index');
        }else{
            return back()->with('errors','email or password are incorrect');
        }
    }

    public function logout(Request $request){
       $request->session()->flush();
       Auth::logout();
       return redirect ('login');
    }


}
