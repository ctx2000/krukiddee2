<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Donation;
use App\Student;
use App\Slide;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login(Request $request){
        //$credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 0]))
    	{

    		return redirect()->route('admin.index');
        }else{
            Auth::logout();
            return view('pages/admin/auth/login');
        }

    }
    public function indexs(){

        return view('pages.admin.general.blank');
    }
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
    public function search(request $request){
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
        })->paginate(10);
        $member = User::where('type','=',1)
        ->where(function ($query)use ($like) {
            $query->where('name', 'LIKE', '%'.$like.'%')
            ->orWhere('email', 'LIKE', '%'.$like.'%')
            ->orWhere('lastname','LIKE', '%'.$like.'%')
            ->orWhere('address','LIKE', '%'.$like.'%')
            ->orWhere('tel','LIKE', '%'.$like.'%');
        })->paginate(10);
        $student = Student::where('name', 'LIKE', '%'.$like.'%')
            ->orWhere('lastname','LIKE', '%'.$like.'%')
            ->orWhere('address','LIKE', '%'.$like.'%')
            ->orWhere('grade','LIKE', '%'.$like.'%')
            ->orWhere('age','LIKE', '%'.$like.'%')
            ->orWhere('id_card','LIKE', '%'.$like.'%')
            ->orWhere('tel','LIKE', '%'.$like.'%')
            ->orWhere('bankAccountName','LIKE', '%'.$like.'%')
            ->orWhere('bankName','LIKE', '%'.$like.'%')
            ->orWhere('bankNumber','LIKE', '%'.$like.'%')
            ->orWhere('bank_of','LIKE', '%'.$like.'%')
            ->orWhere('closeDonate','LIKE', '%'.$like.'%')
            ->orWhere('level','LIKE', '%'.$like.'%')->paginate(10);

        return view('admin/tool/search',[
            'teacher'=>$teacher,
            'member'=>$member,
            'student'=>$student
        ]);
    }



    public function teacher(){
        $user = User::where('type','=',3)->paginate(5);
        return view('pages.admin.teacher.index',[
            'user'=>$user
        ]);
        // return view('admin/teacherAll',[
        //     'teacher'=>$teacher
        // ]);
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
        $teacher = User::where('type','=',2)->paginate(5);

        return view('pages\admin\teacher\acceptTeacher',[
            'user'=>$teacher
        ]);
        // return view('admin/acceptTeacher',[
        //     'teacher'=>$teacher
        // ]);
    }
    public function allowTeacher($id){
        $id = Crypt::decrypt($id);
        DB::table('users')->where('id','=',$id)
        ->update([
            'type' => 3,

        ]);
        return redirect()->route('admin.teacher')->with('feedback','อนุมัติผู้ใช้งานสำเร็จ');
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
        return view('pages\admin\teacher\insert');
        //return view('admin/addTeacher');
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
            $file_image = $request->file('picture');
            $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

            $file_image->move(public_path('storage/id_card'), $newFileName);
            $teacher->pic_id_card = $newFileName;

            //resize
            // $path = Storage::disk('public')->path('images/resize/');
            // Image::make($request->picture->getRealPath(),$newFileName)->resize(120,null,function($contraint){
            //     $contraint->aspectRatio();
            // })->save($path.$newFileName);
        }
        $teacher->save();
        return redirect()->route('admin.teacher');

    }
    public function editTeacher($id){
        $id = Crypt::decrypt($id);
        $user = User::where('id','=',$id)->first();
        return view('admin.editTeacher',[
            'user'=>$user
        ]);
    }
    public function teacherUpdate(Request $request){
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
            $password = Hash::make($password);
        }

        DB::table('users')
            ->where('id', $request->id)
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
            return redirect()->route('admin.teacher');
    }


    public function student(){
        $student = Student::all();

        return view('pages\admin\student\index',[
            'student'=>$student
        ]);
        // return view('admin/studentAll',[
        //     'student'=>$student
        // ]);
    }
    public function addStudent(){
        $teacher = User::where('type','=',3)->get();

        return view('pages\admin\student\insert',[
            'teacher'=>$teacher
        ]);
        // return view('admin/addStudent',[
        //     'teacher'=>$teacher
        // ]);
    }
    public function studentStore(Request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],

            'tel'=>['numeric'],

            'address'=>['required',  'max:255'],
            'bankAccountName'=>['required','max:255'],
            'bankName'=>['required','max:255'],
            'bankNumber'=>['numeric','required'],
            'level'=>['required'],
            'closeDonate'=>['required'],
            'maxDonate'=>['numeric','required'],
            'grade'=>['required','max:255'],
            'age'=>['required','max:255'],
            'birthday'=>['required'],
            'bank_of'=>['required','max:255'],
            'district'=>['required','max:255'],
            'province'=>['required','max:255'],
        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            //'tel.digits' => 'กรอกหมายเลขโทรศัพท์10ตัว',
            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'address.required'=> 'กรุณากรอกข้อมูล 1',
            'bankAccountName.required'=> 'กรุณากรอกข้อมูล 2',
            'bankName.required'=> 'กรุณากรอกข้อมูล 3',
            'bankNumber.required'=> 'กรุณากรอกข้อมูล 4',
            'level.required'=> 'กรุณากรอกข้อมูล 5',
            'closeDonate.required'=> 'กรุณากรอกข้อมูล 6',
            'maxDonate.required'=> 'กรุณากรอกข้อมูล 7',
            'grade.required'=> 'กรุณากรอกข้อมูล 8',
            'age.required'=> 'กรุณากรอกข้อมูล 9',
            'birthday.required'=> 'กรุณากรอกข้อมูล 10',
            'bank_of.required'=> 'กรุณากรอกข้อมูล 11',
            'district.required'=> 'กรุณากรอกข้อมูล 12',
            'province.required'=> 'กรุณากรอกข้อมูล 13',

        ]);
        if (!isset($request->description1)) {


            $student = new Student();
            $student->name = $request->name;
            $student->lastname = $request->lastname;
            $student->address = $request->address;
            $student->tel = $request->tel;
            $student->bankAccountName = $request->bankAccountName;
            $student->bankName = $request->bankName;
            $student->bankNumber = $request->bankNumber;
            // $student->description = $request->description;
            $student->level = $request->level;
            $student->closeDonate = $request->closeDonate;
            $student->maxDonate = $request->maxDonate;
            $student->grade = $request->grade;
            $student->age = $request->age;
            $student->birthday = $request->birthday;
            $student->id_card = $request->id_card;
            $student->bank_of = $request->bank_of;
            $student->district = $request->district;
            $student->province = $request->province;
            $student->user_id = auth()->user()->id;

                if($request->hasFile('picture')){
                //random file name
                $file_image = $request->file('picture');
                $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

                $file_image->move(public_path('storage/images'), $newFileName);
                    $student->picture = $newFileName;

                }

                $student->save();

                return view('pages\admin\student\desc',[
                    'id'=>$student->id
                ]);
            }else{

                DB::table('students')
                ->where('id', $request->id)
                ->update([
                    'description1'=>$request->description1,
                    'description2'=>$request->description2

                ]);
                // dd($request->description2);
                return redirect()->route('admin.student')->with('feedback','เพิ่มนักเรียนสำเร็จ');
            }


    }
    public function checkReciept(){
        $student = DB::table('users')->join('students','users.id','=','students.user_id')->join('donations',function ($join){
            $join->on('donations.student_id','=','students.id')
            ->where('donations.status','=','checking');
        })->orderBy('donations.student_id','desc')->select('donations.*','students.name','students.lastname')->get();

        //return $student;

        return view('pages\admin\general\index',[
            'student' => $student
        ]);
        //  return view('admin/checkReciept',[
        //      'student' => $student
        //  ]);

    }
    public function allReciept(){
        $donate = Donation::where('status','true')->orWhere('status','false')->get();

        return view('pages\admin\general\history',[
            'donate'=>$donate
        ]);
        // return view('admin/allReciept',[
        //     'donate'=>$donate
        // ]);
    }

    public function edit(){
        $user = User::find(auth()->user()->id);
        return view('admin/tool/edit',[
            'user'=>$user
        ]);
    }
    public function deleteUser($id){
        $id = Crypt::decrypt($id);
        DB::table('users')->where('id', '=', $id)->delete();
        Alert::success('ลบข้อมูลสำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว');
        return back()->with('feedback','ลบผู้ใช้สำเร็จ');

        }

        public function deleteStudent($id){

        DB::table('students')->where('id', '=', $id)->delete();
        return back();
    }



    public function slideBig(){
        $slide = Slide::orderBy('level','asc')->get();
        return view('admin/tool/slideBig',[
            'slide'=>$slide
        ]);
    }
    public function slideStore(Request $request){
        $slide = new Slide();
        if($request->hasFile('picture')){

            $file_image = $request->file('picture');
            $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

            $file_image->move(public_path('storage/cover'), $newFileName);
            $slide->picture = $newFileName;
        }
        $slide->titleBig = $request->titleBig;
        $slide->titlesmall1 = $request->titlesmall1;
        $slide->titlesmall2 = $request->titlesmall2;
        $slide->level = $request->level;
        $slide->save();
        return back();
    }
    public function slideBigEdit($id){
        $slide = Slide::find($id);
        return view('admin/tool/slideBigEdit',[
            's'=>$slide
        ]);
    }


}
