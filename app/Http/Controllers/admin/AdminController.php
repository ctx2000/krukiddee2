<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Donation;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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
        $user = User::where('type','=',1)->paginate(10);
        return view('admin/memberAll',[
            'user'=>$user
        ]);

    }
    public function editMember($id){
        $id = Crypt::decrypt($id);
        $user = User::where('id','=',$id)->first();
        return view('admin/editMember',[
            'user'=>$user
        ]);
    }
    public function memberUpdate(Request $request){
        $user=User::find($request->id);
        if($request->password==$user->password){
            $password = $user->password;
        }else{
            $password = $request->password;
        }
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'tel'=>$request->tel,
                'Address'=>$request->Address,
                'password'=>$password
            ]);
            return redirect()->route('admin.member');
    }
    public function memberBaned(Request $request){
        $id = Crypt::decrypt($request->id);
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 'ban','cause'=>$request->cause]);
            return back();
    }
    public function memberUnban($id){
        $id = Crypt::decrypt($id);
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => '']);
            return back();
    }
    public function memberAbout($id){
        $ids = Crypt::decrypt($id);
        $user = User::where('id','=',$ids)->first();


        $donate = DB::table('users')->join('donations','donations.user_id','=','users.id')->join('students',function ($join) use($ids){
            $join->on('donations.student_id','=','students.id')
            ->where('users.id','=',$ids);
        })->orderBy('students.id')->select('donations.*','students.*')->get();
        $count = DB::table('donations')->join('students','students.id','=','donations.student_id')->where('donations.user_id','=',$ids)->distinct()->count();
        $price = DB::table('users')->join('donations','donations.user_id','=','users.id')->join('students',function ($join) use($ids){
            $join->on('donations.student_id','=','students.id')
            ->where('users.id','=',$ids);
        })->orderBy('students.id')->select('donations.price')->get();
        $sum=0;
        foreach ($price as $d) {
            $sum=$d->price+$sum;
        }

        return view('admin/tool/aboutMember',[
            'user' => $user,
            'donate' => $donate,
            'count' => $count,
            'sum' => $sum

            //'sum' => $sum,

        ]);
    }

    public function teacher(){
        $teacher = User::where('type','=',3)->paginate(5);
        return view('admin/teacherAll',[
            'teacher'=>$teacher
        ]);
    }
    public function searchTeacher(request $request){

        $like = $request->search;
        //$teacher = User::where('email','LIKE','%'.$like.'%')->get();
        $teacher = User::where('type','=',3)
                    ->where(function ($query)use ($like) {
                        $query->where('name', 'LIKE', '%'.$like.'%')
                        ->orWhere('email', 'LIKE', '%'.$like.'%')
                        ->orWhere('lastname','LIKE', '%'.$like.'%')
                        ->orWhere('address','LIKE', '%'.$like.'%')
                        ->orWhere('schoolname','LIKE', '%'.$like.'%')
                        ->orWhere('tel','LIKE', '%'.$like.'%');
        })->get();
        return view('admin/tool/searchTeacher',[
            'teacher'=>$teacher
        ]);
        // return $like;
    }
    public function acceptTeacher(){
        $teacher = User::where('type','=',2)->get();
        return view('admin/acceptTeacher',[
            'teacher'=>$teacher
        ]);
    }
    public function aboutTeacher($id){
        $ids = Crypt::decrypt($id);
        $teacher = User::where('id','=',$ids)->first();
        $student = Student::where('user_id','=',$ids)->get();
        $count = Student::where('user_id','=',$ids)->count();
        $donate = DB::table('users')->join('students','users.id','=','students.user_id')->join('donations',function ($join) use($ids){
            $join->on('donations.student_id','=','students.id')
            ->where('users.id','=',$ids);
        })->select('donations.price')->get();
        $sum=0;
        foreach ($donate as $d) {
            $sum=$d->price+$sum;
        }
        return view('admin/tool/aboutTeacher',[
            'teacher' => $teacher,
            'student' => $student,
            'sum' => $sum,
            'count' => $count
        ]);


    }
    public function addTeacher(){
        return view('admin/addTeacher');
    }
    public function storeTeacher(request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'email'=>['required','E-mail','max:255'],
            'tel'=>['required','numeric','digits:10'],
            'id_card'=>['required','numeric','digits:13'],
            'address'=>['required',  'max:255'],
            'schoolName'=>['required',  'max:255'],
            'password'=>['required',  'max:255'],
        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            'tel.digits' => 'หมายเลขโทรศัพท์ห้ามเกิน10ตัว',
            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'tel.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'address.required'=> 'กรุณากรอกที่อยู่โรงเรียน',
            'schoolName.required'=> 'กรุณากรอกชื่อโรงเรียน',

            'email.required' => 'กรุณากรอกอีเมล์',
            'email.E-mail' => 'กรุณากรอกอีเมล์',
            'id_card.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'id_card.digits'=>'เลขบัตรประชาชน13หลัก',
            'id_card.numeric'=>'กรอกตัวเลขเท่านั้น',
            'password.required'=> 'กรุณากรอกรหัสผ่าน',
        ]);
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->lastname = $request->lastname;
        $teacher->email  = $request->email;
        $teacher->tel = $request->tel;
        $teacher->id_card = $request->id_card;
        $teacher->schoolName = $request->schoolName;
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
    public function editTeacher($id){
        $id = Crypt::decrypt($id);
        $user = User::where('id','=',$id)->first();
        return view('admin.editTeacher',[
            'user'=>$user
        ]);
    }


    public function student(){
        $student = Student::all();
        return view('admin/studentAll',[
            'student'=>$student
        ]);
    }
    public function addStudent(){
        $teacher = User::where('type','=',3)->get();
        return view('admin/addStudent',[
            'teacher'=>$teacher
        ]);
    }
    public function studentStore(Request $request){
        $student = new Student();
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->address = $request->address;
        $student->tel = $request->tel;
        $student->bankAccountName = $request->bankAccountName;
        $student->bankName = $request->bankName;
        $student->bankNumber = $request->bankNumber;
        $student->description = $request->description;
        $student->level = $request->level;
        $student->closeDonate = $request->closeDonate;
        $student->maxDonate = $request->maxDonate;
        $student->grade = $request->grade;
        $student->age = $request->age;
        $student->birthday = $request->birthday;
        $student->id_card = $request->id_card;
        $student->bank_of = $request->bank_of;
        $student->user_id = $request->user_id;

        if($request->hasFile('picture')){
            //random file name
            //$newFileName = str_random(40);
            $newFileName = uniqid().'.'.$request->picture->extension();

            //upload file
            $request->picture->storeAs('images',$newFileName,'public');
            $student->picture = $newFileName;

            //resize
            // $path = Storage::disk('public')->path('images/resize/');
            // Image::make($request->picture->getRealPath(),$newFileName)->resize(120,null,function($contraint){
            //     $contraint->aspectRatio();
            // })->save($path.$newFileName);
        }

        $student->save();
        return redirect()->route('admin.student');

    }
    public function checkReciept(){
        $student = DB::table('users')->join('students','users.id','=','students.user_id')->join('donations',function ($join){
            $join->on('donations.student_id','=','students.id')
            ->where('donations.status','=','checking');
        })->orderBy('donations.student_id','desc')->select('donations.*','students.name','students.lastname')->get();

        //return $student;
         return view('admin/checkReciept',[
             'student' => $student
         ]);

    }
    public function allReciept(){
        $donate = Donation::all();
        return view('admin/allReciept',[
            'donate'=>$donate
        ]);
    }
    public function studentEdit($id){
        $student = Student::where('id',$id)->first();
        $oldTeacher = User::where('id','=',$student->user_id)->first();
        $teacher = User::where('type','=',3)->get();
        return view('admin.tool.editStudent',[
            'student'=>$student,
            'oldTeacher'=>$oldTeacher,
            'teacher'=>$teacher

        ]);
    }
    public function studentUpdate(Request $request){

    }
    public function studentBan(Request $request){
        DB::table('students')
            ->where('id', $request->id)
            ->update(['status' => 'ban','cause'=>$request->cause]);
            return back();
    }
    public function studentUnban(Request $request){
        DB::table('students')
            ->where('id', $request->id)
            ->update(['status' => 'open','cause'=>'','closeDonate'=>$request->closeDonate]);
            return back();
    }




}
