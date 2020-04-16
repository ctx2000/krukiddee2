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
