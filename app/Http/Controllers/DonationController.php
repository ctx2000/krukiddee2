<?php

namespace App\Http\Controllers;

use App\Student;
use App\Donation;
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
        $student = Student::where('status','=','open')->orderBy('level','desc')->get();
        //return $student;
        // return view('home',[//รีเทินไปเวลคัม
        //     'student' => $student
        // ]);
        return view('welcome',[//รีเทินไปเวลคัม
            'student' => $student
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
            'description'=>['required'],
        ],[
            'price.numeric' => 'กรอกตัวเลขเท่านั้น',
            'price.required' => 'กรอกข้อมูล',
            'description.required'=>'กรอกข้อมูล'
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
        return redirect()->route('donation.index');

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

        //return $stu;

        return view('history',[
            'donation' => $donation,
            'stu' => $stu
        ]);

        //$donation = Donation::where('user_id','=',auth()->user()->id)->get();
        //$user = Student::with('donation')->where('user_id','=',auth()->user()->id)->get();
        //return $donation;
        //$student = Student::where('id','=',);

        //2foreatch น่าจะได้
    }
}
