<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // about
    public function create(){
         return view('about');
    }
}
