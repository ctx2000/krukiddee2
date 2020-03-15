<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()) {

            return view('admin/dashboard');

        }else if(auth()->user()->isTeacher()){
            return redirect()->route('teacher.dashboard');
            //return view('teacher/dashboard');

        } else {
            //return view('welcome');//รัเทินไปหน้าโดเนชั่นอินเด็ก
            return redirect()->route('donation.index');
            //return redirect()->route('donation.index');
        }
    }
}
