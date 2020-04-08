<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if(auth()->user()->status == 'ban'){
                Auth::logout();
                return  redirect()->route('donation.index')->with('alert', 'คุณถูกระงับการใช้งาน กรุณาติดต่อผู้ดูแลระบบ!');
            }else if(auth()->user()->type == '2'){
                Auth::logout();
                return  redirect()->route('donation.index')->with('alert', 'กรุณารอตรวจสอบข้อมูล!');
            } else {
		if(auth()->user()->status == 0){
                    return redirect()->route('admin.dashboard');
                }else{
                return redirect()->route('donation.index');
}
            }

            //return redirect()->route('donation.index');
        }
    }
}
