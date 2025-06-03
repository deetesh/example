<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
   // homepage
    public function create(){

         return view('home');
    }
}
