<?php

use App\Models\Jobs;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Arr;
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
Route::get('/', function () {
    return view('home');
});

// about
Route::get('/about', function () {
    return view('about'); 
});

// contact
Route::get('/contact', function () {
    return view('contact'); 
});

// method POST action /jobs,: execute when create job
Route::post('/jobs', function ()  {  

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'hour' => ['required'],
    ]);


    Jobs::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'hour' => request('hour'),
        'employer_id' => '1', // typically from authenticated user
    ]);
     return redirect('/jobs' ); 
});


// job listing , index.blade
Route::get('/jobs', function ()  {
    // $oJobs = Jobs::all(); 
    //  $oJobs = App\Models\Jobs::with('employer')->paginate(10);
     $oJobs = App\Models\Jobs::with('employer')->latest()->simplePaginate(10);
    //  $oJobs = App\Models\Jobs::with('employer')->cursorPaginate(10);
    return view('job.index',   [ 'jobs' => $oJobs ]); 
});

// create, create.blade
Route::get('/jobs/create', function ()  {  
    return view('job.create' ); 
});

// edit, edit.blade
Route::get('/jobs/{id}/edit', function ($id)  {  
    return view('job.edit', ['aJobData' => Jobs::find($id) ] ); 
});

// updating jobs 
Route::patch('/jobs/{job}', function (Jobs $job) {
    request()->validate([
        'title' => ['required','min:3'],
        'salary' =>[ 'required'],
        'hour' =>[ 'required']
    ]);

    // $job = Jobs::findOrFail($id);
    $job->update([
        'title' =>  request('title'),
        'salary' => request('salary'),
        'hour' => request('hour')
    ]);

    return redirect("/job_desc/".$job->id);
});



// delete jobs
Route::delete('/jobs/{job}', function ($job)  {  
    // $job = Jobs::findOrFail($id)->delete();
    return redirect("/jobs" ); 
});


// job description, show.blade
Route::get('/job_desc/{id}', function ($id)  {         
    return view('job.show' , ['aJobData' => Jobs::find($id) ]); 
});

// Route::get('/jobs', function ()  {
//     return view('jobs',   [ 'jobs' => JobClass::all() ]); 
// });

// Route::get('/job_desc/{id}', function ($id)  {        
//     $job = Arr::first(JobClass::all() , fn($job_data) => $job_data['id'] == $id);
//     return view('job_desc' , ['aJobData' => $job]); 
// });


Route::get('/about2', function () {
    return 'About example 1';
});

Route::get('/about3', function () {
    return ['foo' => 'bar'];
});


// login
Route::get('/login', function () {
    return view('login.login'); 
});

// register
Route::get('/register', function () {
    return view('login.register'); 
});

// register, methode
Route::post('/register', function () {

    request()->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'max:255'],
        'email_confirmation' => ['required','same:email'],
        'password' => ['required', 'min:8'],
    ]);


    User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' =>  Hash::make(request()->newPassword)
    ]);
    return redirect('/' ); 
});

// register, methode
Route::post('/register', function () {

   $aUser = request()->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'max:255'],
        'email_confirmation' => ['required','same:email'],
        'password' => ['required', 'min:8'],
    ]);


   $oUser = User::create($aUser);
    Auth::login($oUser);
    return redirect('/' ); 
});



// register, methode
Route::post('/login', function () {

  
    
    request()->validate([
        'name' => ['required', 'min:3'],
        'password' => ['required', 'min:8'],
    ]);


    request()->name;

    // User::create([
    //     'name' => request('name'),
    //     'email' => request('email'),
    //     'password' =>  Hash::make(request()->newPassword)
    // ]);
    return redirect('/' ); 
});

