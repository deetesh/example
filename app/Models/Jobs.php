<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Jobs extends Model { 
    use HasFactory; 

    protected $table = 'job_listings';
    // protected $fillable = ['title','salary','hour','employer_id'];
    protected $guarded = []; 
    function employer(){
        return $this->belongsTo(Employer::class);
    }

     function tag(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }

    // public static function all(): array {
    //     return [
    //             [   'id' => 1,
    //                 'title' => 'Director',
    //                 'salary' => '$50, 000', 
    //                 'hour' => '8hr'
    //             ] , 
    //             [
    //                 'id' => 2,
    //                 'title' => 'Manager',
    //                 'salary' => '$40, 000', 
    //                 'hour' => '10hr'
    //             ],
    //             [
    //                 'id' => 3,
    //                 'title' => 'Developer',
    //                 'salary' => '$30, 000', 
    //                 'hour' => '15hr'
    //             ]
    //         ];
    // }

    // public static function findJob( $id ) : array {
    //      return Arr::first(Jobs::all() , fn($job_data) => $job_data['id'] == $id);
    // }
} 