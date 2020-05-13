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

class StudentController extends Controller
{
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
        $teacher = User::where('type','=',3)->orWhere('type','=',0)->get();

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
            'level_id'=>['required'],
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
            'level_id.required'=> 'กรุณากรอกข้อมูล 5',
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

            $slug = preg_replace('~[^\pL\d]+~u', '-', $request->title);
            $student = new Student();
            $student->title = $request->title;
            $student->slug = $slug;
            $student->seo = $request->seo;

            $student->name = $request->name;
            $student->lastname = $request->lastname;
            $student->address = $request->address;
            $student->tel = $request->tel;
            $student->bankAccountName = $request->bankAccountName;
            $student->bankName = $request->bankName;
            $student->bankNumber = $request->bankNumber;
            // $student->description = $request->description;
            $student->level_id = $request->level_id;
            $student->closeDonate = $request->closeDonate;
            $student->maxDonate = $request->maxDonate;
            $student->grade = $request->grade;
            $student->age = $request->age;
            $student->birthday = $request->birthday;
            $student->id_card = $request->id_card;
            $student->bank_of = $request->bank_of;

            $student->user_id = $request->user_id;

            $thai = District::where([['district_code',$request->sub_district],['amphoe_code',$request->district],['province_code',$request->province]])->first();
            $student->sub_district = $thai->district;
            $student->district = $thai->amphoe;
            $student->province = $thai->province;
            $student->zipcode = $thai->zipcode;
                if($request->hasFile('picture')){
                //random file name
                $file_image = $request->file('picture');
                $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

                $file_image->move(public_path('storage/images'), $newFileName);
                    $student->picture = $newFileName;

                }
                if($request->hasFile('picture_cover')){

                    $file_image = $request->file('picture_cover');
                    $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

                    $file_image->move(public_path('storage/images_cover'), $newFileName);
                        $student->picture_cover = $newFileName;

                    }

                $student->save();

                return view('pages\admin\student\desc',[
                    'id'=>$student->id
                ]);
            }else{
                // dd($request->description1);
                // DB::table('students')
                // ->where('id', $request->id)
                // ->update([
                //     'description1'=>$request->description1,
                //     'description2'=>$request->description2

                // ]);
                // // dd($request->description2);
                // return redirect()->route('admin.student')->with('feedback','เพิ่มนักเรียนสำเร็จ');
            }


    }
    public function studentStoreDesc(Request $request){
                       // dd($request->description1);
                DB::table('students')
                ->where('id', $request->id)
                ->update([
                    'description1'=>$request->description1,
                    'description2'=>$request->description2

                ]);
                // dd($request->description2);
                return redirect()->route('admin.student')->with('feedback','เพิ่มนักเรียนสำเร็จ');
    }
    public function studentEdit($id){
        $student = Student::where('id',$id)->first();
        $oldTeacher = User::where('id','=',$student->user_id)->first();
        $teacher = User::where('type','=',3)->get();

        return view('pages\admin\student\edit',[
            'student'=>$student,
            'oldTeacher'=>$oldTeacher,
            'teacher'=>$teacher

        ]);
        // return view('admin.tool.editStudent',[
        //     'student'=>$student,
        //     'oldTeacher'=>$oldTeacher,
        //     'teacher'=>$teacher

        // ]);
    }
    public function studentUpdate(Request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'grade'=>['required','max:255'],
            'age'=>['required','numeric','max:255'],
            'birthday'=>['required','max:255'],
            'tel'=>['required','numeric'],

            'address'=>['required',  'max:255'],
            'level_id'=>['required',  'max:255'],
            'closeDonate'=>['required',  'max:255'],
            'maxDonate'=>['required','numeric'],
            'bank_of'=>['required',  'max:255'],
            'bankName'=>['required',  'max:255'],
            'bankAccountName'=>['required',  'max:255'],
            'bankNumber'=>['required','numeric'],
            //'description'=>['required'],

        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',
            //'tel.digits' => 'หมายเลขโทรศัพท์ห้ามเกิน10ตัว',
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
            //'description.required' => 'กรุณากรอกข้อมูล',


        ]);
        if($request->hasFile('picture')){

            $file_image = $request->file('picture');
            $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

            $file_image->move(public_path('storage/images'), $newFileName);



        }else{
            $x  = Student::where('id','=',$request->id)->first();
            $newFileName = $x->picture;
        }
        if($request->hasFile('picture_cover')){

            $file_image2 = $request->file('picture_cover');
            $newFileName2 = uniqid().'.'.$file_image2->getClientOriginalExtension();

            $file_image2->move(public_path('storage/images_cover'), $newFileName2);



        }else{
            $x  = Student::where('id','=',$request->id)->first();
            $newFileName2 = $x->picture_cover;
        }
        $slug = preg_replace('~[^\pL\d]+~u', '-', $request->title);
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
                'level_id' => $request->level_id,
                'closeDonate' => $request->closeDonate,
                'maxDonate' => $request->maxDonate,
                'bank_of' => $request->bank_of,
                'bankName' => $request->bankName,
                'bankAccountName' => $request->bankAccountName,
                'bankNumber' => $request->bankNumber,
                'user_id' => $request->user_id,
                'picture' => $newFileName,
                'picture_cover' => $newFileName2,
                'seo' => $request->seo,
                'title' => $request->title,
                'slug' => $slug

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
        return view('pages\admin\student\profile',[
            'student'=>$student,
            'teacher'=>$teacher,
            'donate'=>$donate,
            'count'=>$count,
            'sum'=>$sum
        ]);
    }
    public function deleteStudent($id){

        DB::table('students')->where('id', '=', $id)->delete();
        return back();
    }
}
