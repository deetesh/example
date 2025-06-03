<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Jobs;
use App\Models\User;
use GuzzleHttp\Psr7\Request;  
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

class JobClass { 
    public static function all(): array {
        return [
                [   'id' => 1,
                    'title' => 'Director',
                    'salary' => '$50, 000', 
                    'hour' => '8hr'
                ] ,
                [
                    'id' => 2,
                    'title' => 'Manager',
                    'salary' => '$40, 000', 
                    'hour' => '10hr'
                ],
                [
                    'id' => 3,
                    'title' => 'Developer',
                    'salary' => '$30, 000', 
                    'hour' => '15hr'
                ]
            ];
    }
} 

// home
Route::get('/home', [ HomepageController::class, 'create']);
// about
Route::get('/about', [ AboutController::class, 'create']);
// contact
Route::get('/contact', [ ContactController::class, 'create']);

// Job links
Route::controller(JobController::class)->group(function(){
Route::post('/jobs',  'store'); 
Route::get('/jobs',   'index' );  
Route::get('/jobs/create',  'create' );  
Route::get('/jobs/{id}/edit',  'edit' );  
Route::patch('/jobs/{job}',    'update');   
Route::delete('/jobs/{id}',  'delete'); 
Route::get('/job_desc/{id}',  'show' );
});

Route::get('/about2', function () {
    return 'About example 1';
});

Route::get('/about3', function () {
    return ['foo' => 'bar'];
});

// register
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// login
Route::get('/' , [SessionController::class , 'create']); 
Route::post('/login' , [SessionController::class , 'store']); 
// logout
Route::post('/logout' , [SessionController::class , 'destroy']); 
 