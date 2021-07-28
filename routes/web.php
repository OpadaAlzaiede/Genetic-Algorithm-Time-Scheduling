<?php

use Illuminate\Support\Facades\Route;

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
    return view('home0');
});
Route::get('/admin_students', function () {
    return view('admin_students');
});
Route::get('/studenthome ', function () {
    return view('studenthome');
});

Route::get('/admin',['middleware' => 'redirect', function () {
    return view('admin');
}]);
Route::get('/doctor',['middleware' => 'redirect', function () {
    return view('doctor.doctor');
}]);
Auth::routes();

Route::get('/lec', 'HomeController@indexlec')->name('lec');
Route::get('/student', 'HomeController@index')->name('student');
Route::get('/createpost', 'HomeController@index3')->name('createpost');
Route::get('/doctor', 'HomeController@index4')->name('doctor');
Route::get('/createpost', 'HomeController@index5')->name('createpost');
Route::get('/lectuers', 'HomeController@lectureLoad')->name('lect');
Route::get('/download/{id}', 'LectureController@download')->name('download');

Route::post('/showeditpost/{id}', 'HomeController@showeditpost')->name('editpost');
Route::post('/addPost/{id}', 'postcontroller@create')->name('createpost');
Route::post('/deletepost/{id}', 'postcontroller@deletepost')->name('doctor');
Route::post('/filterPosts', 'testAjax@filter');
Route::post('/generateTimeTables', 'testAjax@sendToFront');


Route::post('/editprofile/{id}', 'studentcontroller@editpro')->name('student_profile');
Route::post('/editphoto/{id}', 'studentcontroller@updatephoto')->name('student_profile');

Route::get('/admin', 'adminController@show2')->name('admin');
Route::get('/student_profile', 'studentcontroller@show')->name('student_profile');
Route::get('/time_tables','adminController@show3')->name('time_tables');
Route::post('/editstudent/{id}', 'adminController@editstudent')->name('admin_students');
Route::post('/addstudent', 'adminController@addstudent')->name('admin_students');
Route::post('/deletestudent/{id}', 'adminController@deletestudent')->name('admin_students');

Route::post('/edit/{id}', 'adminController@editdoctor')->name('admin_students');
Route::post('/add', 'adminController@adddoctor')->name('admin_students');
Route::post('/addAssistant', 'adminController@addAssistant')->name('admin_assistants');
Route::post('/delete/{id}', 'adminController@deletedoctor')->name('admin_students');
Route::get('/admin_students', 'adminController@show')->name('admin_students');
Route::get('/admin_doctors', 'adminController@showdoctors')->name('admin_doctors');
Route::get('/admin_courses', 'adminController@showCourses')->name('admin_courses');
Route::get('/admin_assistants', 'adminController@showAssistants')->name('admin_assistants');

Route::get('/assistant', 'HomeController@showAssistant')->name('assistant');




Route::post('/addpdf', 'LectureController@addpdfs')->name('lec');
