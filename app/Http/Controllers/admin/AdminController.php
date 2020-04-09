<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function member(){
        $user = User::where('type','=',1)->paginate(10);
        return view('pages.admin.member.index',[
                 'user'=>$user
             ]);
        // return view('admin/memberAll',[
        //     'user'=>$user
        // ]);

    }
    public function editMember($id){
        $id = Crypt::decrypt($id);
        $user = User::where('id','=',$id)->first();
        return view('admin/editMember',[
            'user'=>$user
        ]);
    }
    public function memberUpdate(Request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'email'=>['required','E-mail','max:255'],
            'tel'=>['required','numeric','digits:10'],

            'Address'=>['required',  'max:255'],

            'password'=>['required',  'max:255'],
        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            'tel.digits' => 'กรอกหมายเลขโทรศัพท์10ตัว',
            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'tel.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'Address.required'=> 'กรุณากรอกที่อยู่โรงเรียน',


            'email.required' => 'กรุณากรอกอีเมล์',
            'email.E-mail' => 'กรุณากรอกอีเมล์',

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
                'password'=>$password
            ]);
            return redirect()->route('admin.member');
    }
    public function memberBaned(Request $request){
        $id = Crypt::decrypt($request->id);
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 'ban','cause'=>$request->cause]);
            return back()->with('feedback','แบนผู้ใช้สำเร็จ');
    }
    public function memberUnban($id){
        $id = Crypt::decrypt($id);
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => '']);
            return back()->with('feedback','ยกเลิกการแบนสำเร็จ');
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
        $teacher = User::where('type','=',2)->paginate(5);
        return view('admin/acceptTeacher',[
            'teacher'=>$teacher
        ]);
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

                return view('admin/addDesc',[
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
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'grade'=>['required','max:255'],
            'age'=>['required','numeric','max:255'],
            'birthday'=>['required','max:255'],
            'tel'=>['required','numeric','digits:10'],
            'id_card'=>['required','numeric','digits:13'],
            'address'=>['required',  'max:255'],
            'level'=>['required',  'max:255'],
            'closeDonate'=>['required',  'max:255'],
            'maxDonate'=>['required','numeric'],
            'bank_of'=>['required',  'max:255'],
            'bankName'=>['required',  'max:255'],
            'bankAccountName'=>['required',  'max:255'],
            'bankNumber'=>['required','numeric'],
            'description'=>['required'],

        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            'tel.digits' => 'หมายเลขโทรศัพท์ห้ามเกิน10ตัว',
            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'tel.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'address.required'=> 'กรุณากรอกที่อยู่นักเรียน',
            'age.required'=> 'กรุณากรอกอายุ',
            'age.numeric' => 'กรอกตัวเลขเท่านั้น',
            'birthday.required' => 'กรุณากรอกวันเกิด',
            'closeDonate.required' => 'กรุณากรอกข้อมูล',
            'maxDonate.required' => 'กรุณากรอกข้อมูล',
            'maxDonate.numeric' => 'กรอกตัวเลขเท่านั้น',
            'bank_of.required' => 'กรุณากรอกข้อมูล',
            'bankName.required' => 'กรุณากรอกข้อมูล',
            'bankAccountName.required' => 'กรุณากรอกข้อมูล',
            'bankNumber.required' => 'กรุณากรอกข้อมูล',
            'bankNumber.numeric' => 'กรอกตัวเลขเท่านั้น',
            'description.required' => 'กรุณากรอกข้อมูล',
            'id_card.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'id_card.digits'=>'เลขบัตรประชาชน13หลัก',
            'id_card.numeric'=>'กรอกตัวเลขเท่านั้น',

        ]);
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
        }else{
            $x  = Student::where('id','=',$request->id)->first();
            $newFileName = $x->picture;
        }
        DB::table('students')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'grade' => $request->grade,
                'age' => $request->age,
                'birthday' => $request->birthday,
                'id_card' => $request->id_card,
                'tel' => $request->tel,
                'address' => $request->address,
                'level' => $request->level,
                'closeDonate' => $request->closeDonate,
                'maxDonate' => $request->maxDonate,
                'bank_of' => $request->bank_of,
                'bankName' => $request->bankName,
                'bankAccountName' => $request->bankAccountName,
                'bankNumber' => $request->bankNumber,
                'user_id' => $request->user_id,
                'description' => $request->description,
                'picture' => $newFileName

                ]);
                return redirect()->route('admin.student');
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
    public function aboutStudent($id){
        $student = Student::find($id);
        $teacher = User::where('id',$student->user_id)->first();
        $donate = Donation::where('student_id',$id)->get();
        $count = Donation::where('student_id',$id)->count();
        $sum=0;
        foreach ($donate as $d) {
            $sum=$sum+$d->price;
        }
        return view('admin/tool/aboutStudent',[
            'student'=>$student,
            'teacher'=>$teacher,
            'donate'=>$donate,
            'count'=>$count,
            'sum'=>$sum
        ]);
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

        return redirect()->route('admin.dashboard')->with('feedback','ลบผู้ใช้สำเร็จ');
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
