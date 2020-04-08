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
    return view('auth/TeacherRegister');
})->name('teacherRegister');



Auth::routes();



Route::get('/teacher/nontification/{id}', 'teacher\NontificationController@create')->name('nontification.create')->middleware('teacher');
Route::post('/teacher/nontification/store', 'teacher\NontificationController@store')->name('nontification.store')->middleware('teacher');

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
Route::get('/admin/student/delete/{id}', 'admin\AdminController@deleteStudent')->name('admin.deleteStudent')->middleware('admin');
Route::post('/admin/search', 'admin\AdminController@search')->name('admin.search')->middleware('admin');
Route::get('/admin/slideBig', 'admin\AdminController@slideBig')->name('admin.slideBig')->middleware('admin');
Route::get('/admin/slideBig/edit/{id}', 'admin\AdminController@slideBigEdit')->name('admin.slideBigEdit')->middleware('admin');
Route::post('/admin/slideBig/store', 'admin\AdminController@slideStore')->name('admin.slideStore')->middleware('admin');

Route::get('/admin/member/all', 'admin\AdminController@member')->name('admin.member')->middleware('admin');
Route::get('/admin/member/edit/{id}', 'admin\AdminController@editMember')->name('admin.editMember')->middleware('admin');
Route::post('/admin/member/update', 'admin\AdminController@memberUpdate')->name('admin.memberUpdate')->middleware('admin');
Route::post('/admin/member/ban', 'admin\AdminController@memberBaned')->name('admin.memberBaned')->middleware('admin');
Route::get('/admin/member/unban/{id}', 'admin\AdminController@memberUnban')->name('admin.memberUnban')->middleware('admin');
Route::get('/admin/member/about/{id}', 'admin\AdminController@memberAbout')->name('admin.memberAbout')->middleware('admin');

Route::get('/admin/student/all', 'admin\AdminController@student')->name('admin.student')->middleware('admin');
Route::get('/admin/addStudent', 'admin\AdminController@addStudent')->name('admin.addStudent')->middleware('admin');
Route::post('/admin/studentStore', 'admin\AdminController@studentStore')->name('admin.studentStore')->middleware('admin');
Route::get('/admin/student/edit/{id}', 'admin\AdminController@studentEdit')->name('admin.studentEdit')->middleware('admin');
Route::post('/admin/student/update', 'admin\AdminController@studentUpdate')->name('admin.studentUpdate')->middleware('admin');
Route::post('/admin/student/ban', 'admin\AdminController@studentBan')->name('admin.studentBan')->middleware('admin');
Route::post('/admin/student/unBan', 'admin\AdminController@studentUnban')->name('admin.studentUnban')->middleware('admin');
Route::get('/admin/student/about/{id}', 'admin\AdminController@aboutStudent')->name('admin.aboutStudent')->middleware('admin');





Route::get('/admin/checkReciept', 'admin\AdminController@checkReciept')->name('admin.checkReciept')->middleware('admin');
Route::get('/admin/allReciept', 'admin\AdminController@allReciept')->name('admin.allReciept')->middleware('admin');

Route::get('/admin/teacher/all', 'admin\AdminController@teacher')->name('admin.teacher')->middleware('admin');
Route::get('/admin/teacher/add', 'admin\AdminController@addTeacher')->name('admin.addTeacher')->middleware('admin');
Route::post('/admin/teacher/search', 'admin\AdminController@searchTeacher')->name('admin.searchTeacher')->middleware('admin');
Route::post('/admin/teacher/store', 'admin\AdminController@storeTeacher')->name('admin.storeTeacher')->middleware('admin');
Route::get('/admin/teacher/accept', 'admin\AdminController@acceptTeacher')->name('admin.acceptTeacher')->middleware('admin');
Route::get('/admin/teacher/about/{id}', 'admin\AdminController@aboutTeacher')->name('admin.aboutTeacher')->middleware('admin');
Route::get('/admin/teacher/edit/{id}', 'admin\AdminController@editTeacher')->name('admin.editTeacher')->middleware('admin');
Route::get('/admin/teacher/allow/{id}', 'admin\AdminController@allowTeacher')->name('admin.allowTeacher')->middleware('admin');
Route::post('/admin/teacher/update', 'admin\AdminController@teacherUpdate')->name('admin.teacherUpdate')->middleware('admin');



//teacher


Route::get('/teacher/show','teacher\TeacherController@show')->middleware('teacher')->name('teacher.show');
Route::get('/teacher/checked/{id}/check/{check}', 'teacher\TeacherController@checkedReciept')->name('teacher.checkedReciept');
Route::get('/teacher/news','teacher\TeacherController@checkReciept')->middleware('teacher')->name('teacher.checkReciept');
Route::get('/teacher/edit','teacher\TeacherController@edit')->middleware('teacher')->name('teacher.edit');
Route::post('/teacher/update', 'teacher\TeacherController@update')->name('teacher.update')->middleware('teacher');

Route::resource('/teacher/student', 'teacher\StudentController')->middleware('teacher');


//member
Route::resource('/member/index', 'member\MemberContentController')->middleware('auth');

Route::resource('/donation', 'DonationController');

Route::get('/history','DonationController@history')->name('donation.history')->middleware('auth');
Route::get('/cause/{id}','DonationController@cause')->name('donation.cause');
Route::get('/donate/level/{level}','DonationController@donateLevel')->name('donation.donateLevel');
Route::get('/home', 'HomeController@index')->name('home');

// //ralatable
// Route::get('/admin/member/all', 'admin\AdminController@member')->name('admin.member')->middleware('admin');
// Route::get('/admin/member/ajax', 'admin\AdminController@memberAjax')->name('admin.memberAjax')->middleware('admin');

//test
Route::get('/test', function () {
    return view('test');
});
Route::post('/teacher/desc', 'teacher\TeacherController@addDesc')->name('teacher.addDesc')->middleware('teacher');
