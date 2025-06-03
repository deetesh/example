<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
         $oJobs =  Jobs::with('employer')->latest()->simplePaginate(10);
         return view('job.index',   [ 'jobs' => $oJobs ]); 
    }

    // create job page
    public function create()
    {
         return view('job.create' ); 
    }


    // save job
    public function store(){
    $aJob = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'hour' => ['required']
        ]);
        $aJob['employer_id'] = '1'; 
        
        Jobs::create($aJob);
        return redirect('/jobs' ); 
    }
    // edit job, edit.blade
    public function edit ($id){
         return view('job.edit', [ 'aJobData' => Jobs::find($id) ] ); 
    }

    // description, show.blade
    public function show ($id){ 
         return view('job.show', [ 'aJobData' => Jobs::find($id) ] ); 
    }

    // update 
    public function update(Jobs $job)
    {
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
    }

     // delete 
    public function delete($id)
    {
        Jobs::findOrFail($id)->delete();
        return redirect('/jobs');
    }
 
}
