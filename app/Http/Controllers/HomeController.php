<?php

namespace App\Http\Controllers;

use App\Role;
use App\StudentCourse;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function allStudents(){
        $students =  User::getAllStudents();
        return response()->json($students);
      
    }

    public function getChartData(){
        $data = StudentCourse::getChartData();
        return response()->json($data);
    }
}
