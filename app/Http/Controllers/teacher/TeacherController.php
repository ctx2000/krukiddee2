<?php

namespace App\Http\Controllers\teacher;

use App\User;
use App\Donation;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher/dashboard');
    }
    public function show(){
        return 'show teacher';
    }
    public function checkReciept(){
        $student = DB::table('users')->join('students','users.id','=','students.user_id')->join('donations',function ($join){
            $join->on('donations.student_id','=','students.id')
            ->where('users.id','=',auth()->user()->id);
        })->orderBy('donations.student_id','desc')->select('donations.*','students.name','students.lastname')->get();

        return $student;
        // return view('teacher/checkReciept');

    }
    public function edit(){
        $profile = User::where('id','=',auth()->user()->id)->first();
        return view('teacher/editProfile',[
            'profile' => $profile
        ]);
    }
}

