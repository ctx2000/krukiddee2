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
            ->where([['users.id','=',auth()->user()->id],['donations.status','=','checking']]);
        })->orderBy('donations.student_id','desc')->select('donations.*','students.name','students.lastname')->get();

        //return $student;
         return view('teacher/checkReciept',[
             'student' => $student
         ]);

    }
    public function checkedReciept($id,$check){
        if ($check=='true') {
            DB::table('donations')->where('id',$id)->update(['status'=>'true']);
        }else{
            DB::table('donations')->where('id',$id)->update(['status'=>'false']);
        }

         return back();
    }
    public function edit(){
        $profile = User::where('id','=',auth()->user()->id)->first();
        return view('teacher/editProfile',[
            'user' => $profile
        ]);
    }
    public function update(Request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'email'=>['required','E-mail','max:255'],
            'tel'=>['required','numeric','digits:10'],
            'id_card'=>['required','numeric','digits:13'],
            'Address'=>['required',  'max:255'],
            'schoolname'=>['required',  'max:255'],
            'password'=>['required',  'max:255'],
        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            'tel.digits' => 'หมายเลขโทรศัพท์ห้ามเกิน10ตัว',
            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'tel.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'Address.required'=> 'กรุณากรอกที่อยู่โรงเรียน',
            'schoolname.required'=> 'กรุณากรอกชื่อโรงเรียน',

            'email.required' => 'กรุณากรอกอีเมล์',
            'email.E-mail' => 'กรุณากรอกอีเมล์',
            'id_card.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'id_card.digits'=>'เลขบัตรประชาชน13หลัก',
            'id_card.numeric'=>'กรอกตัวเลขเท่านั้น',
            'password.required'=> 'กรุณากรอกรหัสผ่าน',
        ]);
        $user=User::find($request->id);
        if($request->password==$user->password){
            $password = $user->password;
        }else{
            $password = $request->password;
        }

        DB::table('users')
            ->where('id','=', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'tel'=>$request->tel,
                'Address'=>$request->Address,
                'schoolname' => $request->schoolname,
                'id_card' => $request->id_card,
                'password'=>$password
            ]);
            return redirect()->route('teacher.dashboard');

    }
}

