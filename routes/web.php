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
        Route::get('/dashboard', 'teacher\teacherController@index')->name('teacher.dashboard');;

    });
});
//admin
Route::get('/admin/member/all', 'admin\adminController@member')->name('admin.member')->middleware('admin');
Route::get('/admin/member/edit/{id}', 'admin\adminController@editMember')->name('admin.editMember')->middleware('admin');
Route::post('/admin/member/update', 'admin\adminController@memberUpdate')->name('admin.memberUpdate')->middleware('admin');
Route::post('/admin/member/ban', 'admin\adminController@memberBaned')->name('admin.memberBaned')->middleware('admin');
Route::get('/admin/member/unban/{id}', 'admin\adminController@memberUnban')->name('admin.memberUnban')->middleware('admin');
Route::get('/admin/member/about/{id}', 'admin\adminController@memberAbout')->name('admin.memberAbout')->middleware('admin');

Route::get('/admin/student/all', 'admin\adminController@student')->name('admin.student')->middleware('admin');
Route::get('/admin/addStudent', 'admin\adminController@addStudent')->name('admin.addStudent')->middleware('admin');
Route::post('/admin/studentStore', 'admin\adminController@studentStore')->name('admin.studentStore')->middleware('admin');
Route::get('/admin/student/edit/{id}', 'admin\adminController@studentEdit')->name('admin.studentEdit')->middleware('admin');
Route::post('/admin/student/update', 'admin\adminController@studentUpdate')->name('admin.studentUpdate')->middleware('admin');
Route::post('/admin/student/ban', 'admin\adminController@studentBan')->name('admin.studentBan')->middleware('admin');
Route::post('/admin/student/unBan', 'admin\adminController@studentUnban')->name('admin.studentUnban')->middleware('admin');
Route::get('/admin/student/about/{id}', 'admin\adminController@aboutStudent')->name('admin.aboutStudent')->middleware('admin');





Route::get('/admin/checkReciept', 'admin\adminController@checkReciept')->name('admin.checkReciept')->middleware('admin');
Route::get('/admin/allReciept', 'admin\adminController@allReciept')->name('admin.allReciept')->middleware('admin');

Route::get('/admin/teacher/all', 'admin\adminController@teacher')->name('admin.teacher')->middleware('admin');
Route::get('/admin/teacher/add', 'admin\adminController@addTeacher')->name('admin.addTeacher')->middleware('admin');
Route::post('/admin/teacher/search', 'admin\adminController@searchTeacher')->name('admin.searchTeacher')->middleware('admin');
Route::post('/admin/teacher/store', 'admin\adminController@storeTeacher')->name('admin.storeTeacher')->middleware('admin');
Route::get('/admin/teacher/accept', 'admin\adminController@acceptTeacher')->name('admin.acceptTeacher')->middleware('admin');
Route::get('/admin/teacher/about/{id}', 'admin\adminController@aboutTeacher')->name('admin.aboutTeacher')->middleware('admin');
Route::get('/admin/teacher/edit/{id}', 'admin\adminController@editTeacher')->name('admin.editTeacher')->middleware('admin');
Route::get('/admin/teacher/allow/{id}', 'admin\adminController@allowTeacher')->name('admin.allowTeacher')->middleware('admin');
Route::post('/admin/teacher/update', 'admin\adminController@teacherUpdate')->name('admin.teacherUpdate')->middleware('admin');



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
// Route::get('/admin/member/all', 'admin\adminController@member')->name('admin.member')->middleware('admin');
// Route::get('/admin/member/ajax', 'admin\adminController@memberAjax')->name('admin.memberAjax')->middleware('admin');

//test
Route::get('/test', function () {
    return view('test');
});
