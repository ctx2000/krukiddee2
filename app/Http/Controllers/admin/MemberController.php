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

class MemberController extends Controller
{
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

        return view('pages\admin\member\edit',[
            'user'=>$user
        ]);
        // return view('admin/editMember',[
        //     'user'=>$user
        // ]);
    }
    public function memberUpdate(Request $request){
        $request->validate([
            'name'=>['required',  'max:255'],
            'lastname'=>['required','max:255'],
            'email'=>['required','E-mail','max:255'],
            'tel'=>['required','numeric','digits_between:10,13'],

            'Address'=>['required',  'max:255'],

            // 'password'=>['required'],
        ],[
            'name.required'=> 'กรุณากรอกชื่อ',
            'lastname.required'=> 'กรุณากรอกนามสกุล',

            'tel.numeric' => 'กรอกตัวเลขเท่านั้น',
            'tel.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'Address.required'=> 'กรุณากรอกที่อยู่โรงเรียน',


            'email.required' => 'กรุณากรอกอีเมล์',
            'email.E-mail' => 'กรุณากรอกอีเมล์',

            // 'password.required'=> 'กรุณากรอกรหัสผ่าน',
        ]);
        $user=User::find($request->id);
        if(isset($request->password)){

            $password = $request->password;
            $password = Hash::make($password);
            DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password'=>$password
            ]);
        }

        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'tel'=>$request->tel,
                'Address'=>$request->Address
            ]);
            return redirect()->route('admin.member')->with('feedback','แก้ไขข้อมูลสมาชิกสำเร็จ');
    }
    public function memberBaned(Request $request){
        $id = Crypt::decrypt($request->id);
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 'ban','cause'=>$request->cause]);
             Alert::success('แบนผู้ใช้งานสำเร็จ', 'แบนผู้ใช้งานเรียบร้อยแล้ว');
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
    public function deleteUser($id){
        $id = Crypt::decrypt($id);
        DB::table('users')->where('id', '=', $id)->delete();
        Alert::success('ลบข้อมูลสำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว');
        return back()->with('feedback','ลบผู้ใช้สำเร็จ');

        }
}
