<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
     // return register view
    public function create(){
      return view('login.register');   
    } 

    public function store(){
        // valide input values
       $aValidateUser = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'max:255'],
            'email_confirmation' => ['required','same:email'],
            'password' => ['required', 'min:8'],
        ]);

        // create user
       $oUser =  User::create($aValidateUser);
        // login 
        Auth::login($oUser);
        // redirect on Homepage
        return redirect('/home' ); 
    }
}


