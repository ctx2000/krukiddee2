<?php

namespace App\Http\Controllers\teacher;

use App\User;

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
    public function news(){
        return view('teacher/news');
    }
    public function edit(){
        $profile = User::where('id','=',auth()->user()->id)->first();
        return view('teacher/editProfile',[
            'profile' => $profile
        ]);
    }
}

