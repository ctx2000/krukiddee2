<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 0;
    const DEFAULT_TYPE = 1;
    const TEACHER_TYPE = 3;
    public function isAdmin(){

    return $this->type === self::ADMIN_TYPE;

    }

    public function isTeacher(){

        return $this->type === self::TEACHER_TYPE;

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email','tel', 'schoolname', 'address','pic_id_card','id_card', 'password', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function student(){
    //     return $this->hasMany(Student::class);
    // }
    // public function students(){
    //     return $this->belongsToMany(Student::class,'donations','user_id','student_id')->withPivot('price')->withPivot('picture')->withPivot('description')->withPivot('status')->withTimestamps();
    // }
    public static function laratablesCustomAction($user)
    {

        return view('admin/tool/memberAction', compact('user'))->render();
    }

    public function laratablesRowData() {
        return [
            'id' => $this->id
        ];
    }
}
