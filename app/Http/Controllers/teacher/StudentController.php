<?php

namespace App\Http\Controllers\teacher;

use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stu = Student::where('user_id','=',auth()->user()->id)->get();
        return view('teacher/seeStudent',[
            'stu' => $stu
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
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

            return view('teacher/addDesc',[
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
             return redirect()->route('student.index')->with('feedback','เพิ่มนักเรียนสำเร็จ');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('teacher/editStudent',[
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->address = $request->address;
        $student->district = $request->district;
        $student->province = $request->province;
        $student->grade = $request->grade;
        $student->tel = $request->tel;
        $student->bankAccountName = $request->bankAccountName;
        $student->bankName = $request->bankName;
        $student->bankNumber = $request->bankNumber;
        $student->description1 = $request->description1;
        $student->description2 = $request->description2;
        $student->level = $request->level;
        $student->closeDonate = $request->closeDonate;
        $student->maxDonate = $request->maxDonate;
        $student->age = $request->age;
        $student->birthday = $request->birthday;
        $student->id_card = $request->id_card;
        $student->bank_of = $request->bank_of;

        $student->user_id = auth()->user()->id;

        if($request->hasFile('picture')){
            $file_image = $request->file('picture');
            $newFileName = uniqid().'.'.$file_image->getClientOriginalExtension();

            $file_image->move(public_path('storage/images'), $newFileName);
            $student->picture = $newFileName;

            //resize
            // $path = Storage::disk('public')->path('images/resize/');
            // Image::make($request->picture->getRealPath(),$newFileName)->resize(120,null,function($contraint){
            //     $contraint->aspectRatio();
            // })->save($path.$newFileName);
        }

        $student->save();
        return redirect()->route('student.index')->with('feedback','แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Storage::disk('public')->delete('images/'.$student->picture);
        $student->delete();
        return redirect()->route('student.index');
    }
}
