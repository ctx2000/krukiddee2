<?php

namespace App\Http\Controllers;

use App\Student;
use App\Donation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumDo = Donation::count();
        $sumTea = User::where('type','3')->count();
        $sumUser = User::where('type','1')->count();
        $sumStu = Student::count();
        $max = Student::where([['level','=',4],['status','=','open']])->take(6)->get();
        $student = Student::where([['status','=','open'],['level','!=',4]])->orderBy('level','desc')->get();
        //return $student;
        // return view('home',[//รีเทินไปเวลคัม
        //     'student' => $student
        // ]);
        return view('welcome',[//รีเทินไปเวลคัม
            'student' => $student,
            'max' => $max,
            'sumDo'=>$sumDo,
            'sumTea'=>$sumTea,
            'sumUser'=>$sumUser,
            'sumStu'=>$sumStu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price'=>['required', 'numeric'],

        ],[
            'price.numeric' => 'กรอกตัวเลขเท่านั้น',
            'price.required' => 'กรอกข้อมูล',

        ]);

        $donate = new Donation();
        if(auth()->user()){
            $donate->user_id = auth()->user()->id;
        }

        $donate->student_id = $request->student_id;
        $donate->price = $request->price;
        $donate->description = $request->description;
        $donate->status = 'checking';

        if($request->hasFile('picture')){
            //random file name
            //$newFileName = str_random(40);
            $newFileName = uniqid().'.'.$request->picture->extension();

            //upload file
            $request->picture->storeAs('receipt',$newFileName,'public');
            $donate->picture = $newFileName;

            //resize
            // $path = Storage::disk('public')->path('images/resize/');
            // Image::make($request->picture->getRealPath(),$newFileName)->resize(120,null,function($contraint){
            //     $contraint->aspectRatio();
            // })->save($path.$newFileName);
        }

        $donate->save();
        $old = Student::where('id',$request->student_id)->select('totalDonate')->first();
        $sum = $old->totalDonate + $donate->price;
        $total = DB::table('students')->where('id', $request->student_id)->update([
            'totalDonate' =>$sum
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        return 'test';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $stu = Student::where('id','=',$id)->first();
       // return $stu;

        return view('donate',[
            'stu' => $stu
        ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }

    public function history()
    {
        $donation = Donation::where('user_id','=',auth()->user()->id)->get();

        $stu = DB::table('students')->join('donations',function ($join){
            $join->on('students.id','=','donations.student_id')
            ->where('donations.user_id','=',auth()->user()->id);
        })->select('students.*')->distinct()->get();
        // $student = DB::table('students')->join('donations','students.id','=','donations.student_id')
        // ->select('students.*')->get();

        // $sumStu = DB::table('students')->join('donations',function ($join){
        //     $join->on('students.id','=','donations.student_id')
        //     ->where('donations.user_id','=',auth()->user()->id);
        // })->select('students.*')->distinct()->count();
        $sum=0;
            foreach($stu as $s){
                $sum = $sum+1;
            }
        $sumDo = Donation::where('user_id',auth()->user()->id)->count();
        // return $sum;

        return view('history',[
            'donation' => $donation,
            'stu' => $stu,
            'sumStu'=>$sum,
            'sumDo'=>$sumDo
        ]);

        //$donation = Donation::where('user_id','=',auth()->user()->id)->get();
        //$user = Student::with('donation')->where('user_id','=',auth()->user()->id)->get();
        //return $donation;
        //$student = Student::where('id','=',);

        //2foreatch น่าจะได้
    }
    public function cause($id){
        $id = Crypt::decrypt($id);
        $max = Student::where([['level','=',4],['status','=','open']])->take(6)->get();
        $student = Student::where('id',$id)->first();
        $sum = Donation::where('student_id',$id)->count();
        return view('cause',[
            's'=>$student,
            'sum'=>$sum,
            'max'=>$max
        ]);
    }
    public function donateLevel($level){
        $donate = Student::where('level',$level)->get();
        return view('donateLevel',[
            'donate' => $donate
        ]);
    }
}
