<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');//รัเทอนไปโดเนชั่น
// });
Route::get('/','DonationController@index');
// Route::get('/', function () {
//     redirect()->route('donation.index');//รัเทอนไปโดเนชั่น
// });
Route::get('/teacherRegister', function(){
    return view('auth/teacherRegister');
})->name('teacherRegister');

Route::get('/news', function(){
    return view('pages\user\home\login');
})->name('news');
Route::get('/news2', function(){
    return view('pages\user\general/donation');
})->name('news');


Auth::routes();



Route::get('/teacher/nontification/{id}', 'teacher\NontificationController@create')->name('nontification.create')->middleware('teacher');
Route::post('/teacher/nontification/store', 'teacher\NontificationController@store')->name('nontification.store');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');

});



//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index')->name('admin.dashboard');

    });
});
//Route for teacher
Route::group(['prefix' => 'teacher'], function(){
    Route::group(['middleware' => ['teacher']], function(){
        Route::get('/dashboard', 'teacher\TeacherController@index')->name('teacher.dashboard');;

    });
});
//admin

Route::get('/admin/edit', 'admin\AdminController@edit')->name('admin.edit')->middleware('admin');
Route::post('/admin/update', 'admin\AdminController@update')->name('admin.update')->middleware('admin');
Route::get('/admin/user/delete/{id}', 'admin\AdminController@deleteUser')->name('admin.deleteUser')->middleware('admin');

Route::post('/admin/search', 'admin\AdminController@search')->name('admin.search')->middleware('admin');
Route::get('/admin/slideBig', 'admin\AdminController@slideBig')->name('admin.slideBig')->middleware('admin');
Route::get('/admin/slideBig/edit/{id}', 'admin\AdminController@slideBigEdit')->name('admin.slideBigEdit')->middleware('admin');
Route::post('/admin/slideBig/store', 'admin\AdminController@slideStore')->name('admin.slideStore')->middleware('admin');

Route::get('/admin/member/all', 'admin\MemberController@member')->name('admin.member')->middleware('admin');
Route::get('/admin/member/edit/{id}', 'admin\MemberController@editMember')->name('admin.editMember')->middleware('admin');
Route::post('/admin/member/update', 'admin\MemberController@memberUpdate')->name('admin.memberUpdate')->middleware('admin');
Route::post('/admin/member/ban', 'admin\MemberController@memberBaned')->name('admin.memberBaned')->middleware('admin');
Route::get('/admin/member/unban/{id}', 'admin\MemberController@memberUnban')->name('admin.memberUnban')->middleware('admin');
Route::get('/admin/member/about/{id}', 'admin\MemberController@memberAbout')->name('admin.memberAbout')->middleware('admin');

Route::get('/admin/student/all', 'admin\StudentController@student')->name('admin.student')->middleware('admin');
Route::get('/admin/addStudent', 'admin\StudentController@addStudent')->name('admin.addStudent')->middleware('admin');
Route::post('/admin/studentStore', 'admin\StudentController@studentStore')->name('admin.studentStore')->middleware('admin');
Route::post('/admin/studentStoreDesc', 'admin\StudentController@studentStoreDesc')->name('admin.studentStoreDesc')->middleware('admin');
Route::get('/admin/student/edit/{id}', 'admin\StudentController@studentEdit')->name('admin.studentEdit')->middleware('admin');
Route::post('/admin/student/update', 'admin\StudentController@studentUpdate')->name('admin.studentUpdate')->middleware('admin');
Route::post('/admin/student/ban', 'admin\StudentController@studentBan')->name('admin.studentBan')->middleware('admin');
Route::post('/admin/student/unBan', 'admin\StudentController@studentUnban')->name('admin.studentUnban')->middleware('admin');
Route::get('/admin/student/about/{id}', 'admin\StudentController@aboutStudent')->name('admin.aboutStudent')->middleware('admin');
Route::get('/admin/student/delete/{id}', 'admin\StudentController@deleteStudent')->name('admin.deleteStudent')->middleware('admin');





Route::get('/admin/checkReciept', 'admin\AdminController@checkReciept')->name('admin.checkReciept')->middleware('admin');
Route::get('/admin/allReciept', 'admin\AdminController@allReciept')->name('admin.allReciept')->middleware('admin');

Route::get('/admin/teacher/all', 'admin\TeacherController@teacher')->name('admin.teacher')->middleware('admin');
Route::get('/admin/teacher/add', 'admin\TeacherController@addTeacher')->name('admin.addTeacher')->middleware('admin');
Route::post('/admin/teacher/search', 'admin\TeacherController@searchTeacher')->name('admin.searchTeacher')->middleware('admin');
Route::post('/admin/teacher/store', 'admin\TeacherController@storeTeacher')->name('admin.storeTeacher')->middleware('admin');
Route::get('/admin/teacher/accept', 'admin\TeacherController@acceptTeacher')->name('admin.acceptTeacher')->middleware('admin');
Route::get('/admin/teacher/about/{id}', 'admin\TeacherController@aboutTeacher')->name('admin.aboutTeacher')->middleware('admin');
Route::get('/admin/teacher/edit/{id}', 'admin\TeacherController@editTeacher')->name('admin.editTeacher')->middleware('admin');
Route::get('/admin/teacher/allow/{id}', 'admin\TeacherController@allowTeacher')->name('admin.allowTeacher')->middleware('admin');
Route::post('/admin/teacher/update', 'admin\TeacherController@teacherUpdate')->name('admin.teacherUpdate')->middleware('admin');



//teacher


Route::get('/teacher/show','teacher\TeacherController@show')->middleware('teacher')->name('teacher.show');
Route::get('/teacher/checked/{id}/check/{check}', 'teacher\TeacherController@checkedReciept')->name('teacher.checkedReciept');
Route::get('/teacher/news','teacher\TeacherController@checkReciept')->middleware('teacher')->name('teacher.checkReciept');
Route::get('/teacher/edit','teacher\TeacherController@edit')->middleware('teacher')->name('teacher.edit');
Route::post('/teacher/update', 'teacher\TeacherController@update')->name('teacher.update')->middleware('teacher');
Route::post('/teacher/desc', 'teacher\TeacherController@addDesc')->name('teacher.addDesc')->middleware('teacher');
Route::resource('/teacher/student', 'teacher\StudentController')->middleware('teacher');


//member
Route::resource('/member/index', 'member\MemberContentController')->middleware('auth');

Route::resource('/donation', 'DonationController');

Route::get('/history','DonationController@history')->name('donation.history')->middleware('auth');

Route::get('/cause/{slug}','DonationController@cause')->name('donation.cause');

Route::get('/donate/level/{level}','DonationController@donateLevel')->name('donation.donateLevel');
Route::get('/home', 'HomeController@index')->name('home');

// //ralatable
// Route::get('/admin/member/all', 'admin\AdminController@member')->name('admin.member')->middleware('admin');
// Route::get('/admin/member/ajax', 'admin\AdminController@memberAjax')->name('admin.memberAjax')->middleware('admin');
Route::get('test1', function () {
    return view('pages.user.general.about');
});
// Route::get('/users', function () {
//     return view('pages.user.general.about');
// });
//test
Route::get('admin/student/test', function () {

    return view('pages\admin\student\desc');
});
Route::get('administrator/blank', function () {
    $user = App\User::where('type','3')->get();
    return view('pages.admin.general.blank',[
        'user'=>$user
    ]);
});
Route::get('administrator/edit', function () {
    return view('pages.admin.member.edit');
});
Route::get('administrator/show', function () {

    return view('pages.admin.member.show');
});

Route::get('administrator/login', function () {
    return view('pages\admin\auth\login');
});
Route::post('/administrator/auth/login', 'admin\AdminController@login')->name('admin.login');
Route::get('/dashboards', 'admin\AdminController@indexs')->name('admin.index');
