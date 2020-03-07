<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    // public function users(){
    //     return $this->belongsToMany(User::class,'donations','student_id','user_id')->withPivot('price')->withPivot('picture')->withPivot('description')->withPivot('status')->withTimestamps();
    // }
    // public function donation(){
    //     return $this->hasMany(Donation::class);
    // }
}
