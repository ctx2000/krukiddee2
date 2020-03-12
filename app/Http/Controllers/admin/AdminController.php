<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Donation;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $user = User::where('type','=','1')->count();
        $teacher = User::where('type','=','3')->count();
        $student = Student::count();
        $donation = Donation::count();

        $sum = Donation::where('status','=','true')->get();
        $total = 0;
        foreach ($sum as $key=>$p) {
            $total = $p['price']+$total;
        }

        return view('admin/dashboard',[
            'user'=>$user,
            'teacher'=>$teacher,
            'student'=>$student,
            'donate'=>$donation,
            'total'=>$total
        ]);
    }
    public function member(){
        return view('admin/memberAll');
    }

    public function teacher(){
        return view('admin/teacherAll');
    }

    public function student(){
        return view('admin/studentAll');
    }
    public function addStudent(){
        $teacher = User::where('type','=',3)->get();
        return view('admin/addStudent',[
            'teacher'=>$teacher
        ]);
    }
    public function checkReciept(){
        return view('admin/checkReciept');
    }
    public function addTeacher(){
        return view('admin/addTeacher');
    }
    public function storeTeacher(request $request){
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->lastname = $request->lastname;
        $teacher->email  = $request->email;
        $teacher->tel = $request->tel;
        $teacher->id_card = $request->id_card;
        $teacher->address = $request->address;
        $teacher->type = '3';
        $teacher->password = Hash::make($request->password);
        if($request->hasFile('picture')){
            //random file name
            //$newFileName = str_random(40);
            $newFileName = uniqid().'.'.$request->picture->extension();

            //upload file
            $request->picture->storeAs('id_card',$newFileName,'public');
            $teacher->pic_id_card = $newFileName;

            //resize
            // $path = Storage::disk('public')->path('images/resize/');
            // Image::make($request->picture->getRealPath(),$newFileName)->resize(120,null,function($contraint){
            //     $contraint->aspectRatio();
            // })->save($path.$newFileName);
        }
        $teacher->save();

    }
    public function acceptTeacher(){
        return view('admin/acceptTeacher');
    }


}
