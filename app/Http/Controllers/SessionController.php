<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class SessionController extends Controller
{

    // return login view
    public function create(){
      return view('login.login');   
    } 
    
    // login attemp
    public function store(){
        // validate input
        $aUser = request()->validate([ 
            'email' => ['required', 'max:255'], 
            'password' => ['required', 'min:8']
        ]);
        // attempt to login
       if ( !Auth::attempt($aUser) ){
            throw ValidationException::withMessages([
                'email' => 'Unmatch credentials'
            ]); 
       }  

        // generate session 
        request()->session()->regenerate(); 
        return redirect('/home');
    }
    

    // logout
    public function destroy(){
        Auth::logout(); 
        return redirect('/');
    }
}
