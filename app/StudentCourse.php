<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
class StudentCourse extends Model
{
    //
    protected $table = "student_courses";
    public $timestamps = false;


    protected $primaryKey = 'studentcourse_id';

    function User(){
	return $this->belongsTo(\App\User::class);
    }
}
