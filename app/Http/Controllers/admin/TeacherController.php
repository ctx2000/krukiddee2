<?php

namespace App\Http\Controllers\admin;

use App\District;
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

class TeacherController extends Controller
{
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
        return view('pages\admin\teacher\profile',[
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
        $teacher->Address = $request->address;

        $teacher->agree = $request->agree;
        $teacher->type = '3';
        $teacher->password = Hash::make($request->password);

            //convert district //159
        $thai = District::where([['district_code',$request->sub_district],['amphoe_code',$request->district],['province_code',$request->province]])->first();
            $teacher->sub_district = $thai->district;
            $teacher->district = $thai->amphoe;
            $teacher->province = $thai->province;
            $teacher->zipcode = $thai->zipcode;
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
        return redirect()->route('admin.teacher')->with('feedback','เพิ่มครูสำเร็จ');

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
    public function deleteUser($id){
        $id = Crypt::decrypt($id);
        DB::table('users')->where('id', '=', $id)->delete();
        Alert::success('ลบข้อมูลสำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว');
        return back()->with('feedback','ลบผู้ใช้สำเร็จ');

        }

}
