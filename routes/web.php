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

Route::get('/', function () {
    return view('welcome');
});
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
Route::get('/teacher/show','teacher\TeacherController@show')->middleware('teacher')->name('teacher.show');

Route::get('/teacher/news','teacher\TeacherController@news')->middleware('teacher')->name('teacher.news');

Route::get('/teacher/edit','teacher\TeacherController@edit')->middleware('teacher')->name('teacher.edit');

Route::resource('/teacher/student', 'teacher\StudentController')->middleware('teacher');

Route::resource('/member/index', 'member\MemberContentController')->middleware('auth');

Route::resource('/member/donation', 'DonationController');

Route::get('/member/history','DonationController@history')->name('donation.history')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');

