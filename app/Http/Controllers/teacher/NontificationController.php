<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Nontification;
use App\Donation;
use Illuminate\Support\Facades\DB;
class NontificationController extends Controller
{
    public function create($id)
    {
        $student = Student::findOrFail($id);

        return view('teacher.addNontification',[
            'student' => $student
        ]);
    }
    public function store(Request $request){


        $id = $request->id;
        //$loop = Donation::where('student_id','=',$id)->distinct('user_id')->get();
        $loop = DB::table('donations')->join('users',function ($join) use ($id){
            $join->on('donations.user_id','=','users.id')
            ->where('donations.student_id','=',$id);
        })->select('donations.user_id')->distinct()->get();
        $title = $request->title;
        $data = $request->data;
//return $loop;
        foreach($loop as $l){
            $non = new Nontification();

            $non->user_id = $l->user_id;
            $non->student_id = $id;
            $non->title = $title;
            $non->data = $data;
            $non->save();
        }
        DB::table('students')
            ->where('id', $id)
            ->update([
                'status'=>'close'
            ]);

        return  redirect()->route('student.index');

    }
    public function badge(){

    }
}
