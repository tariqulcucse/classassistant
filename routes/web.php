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


Route::get('/', 'FrontendController@welcome')->name('welcome');

Route::get('about', 'FrontendController@about')->name('about');
Route::get('contact', 'FrontendController@contact')->name('contact');
Route::get('courses', 'FrontendController@courses')->name('courses');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/teacher/home', 'TeacherController@index')->name('teacher.home');
//Route::get('/student/home', 'StudentController@index')->name('student.home');

// Teachers Route................................................................

Route::get('teacher-login', 'AuthTeacher\LoginController@showLoginForm')->name('teacher.login');
Route::post('teacher/dashboard', 'AuthTeacher\LoginController@login')->name('teacher.login');

Route::post('logout', 'AuthTeacher\LoginController@logout')->name('logout');

Route::get('teacher-register', 'AuthTeacher\RegisterController@showRegistrationForm')->name('teacher.register');
Route::post('teacher-register', 'AuthTeacher\RegisterController@register');

Route::get('teacher-password/reset', 'AuthTeacher\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
Route::post('teacher-password/email', 'AuthTeacher\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
Route::get('teacher-password/reset/{token}', 'AuthTeacher\ResetPasswordController@showResetForm')->name('teacher.password.reset');
Route::post('teacher-password/reset', 'AuthTeacher\ResetPasswordController@reset')->name('teacher.password.update');

// Students Route................................................................

Route::get('student-login', 'AuthStudent\LoginController@showLoginForm')->name('student.login');
Route::post('student', 'AuthStudent\LoginController@login')->name('student.login.post');

Route::post('logout', 'AuthStudent\LoginController@logout')->name('logout');

Route::get('student-register', 'AuthStudent\RegisterController@showRegistrationForm')->name('student.register');
Route::post('student-register', 'AuthStudent\RegisterController@register');

Route::get('student-password/reset', 'AuthStudent\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
Route::post('student-password/email', 'AuthStudent\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::get('student-password/reset/{token}', 'AuthStudent\ResetPasswordController@showResetForm')->name('student.password.reset');
Route::post('student-password/reset', 'AuthStudent\ResetPasswordController@reset')->name('student.password.update');

// Teacher Route>................................

Route::group(['as'=>'teacher.', 'prefix'=>'teacher', 'namespace'=>'Teacher', 'middleware'=>['auth:teacher']], function(){

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	Route::resource('post', 'PostController');
	Route::resource('course', 'CourseController');
	Route::get('profile', 'ProfileController@index')->name('profile.index');
	Route::PUT('profile/update', 'ProfileController@profileUpdate')->name('profile.update');
	Route::PUT('password/update', 'ProfileController@passwordUpdate')->name('password.update');

});

// student route................................

Route::group(['as'=>'student.', 'prefix'=>'student', 'namespace'=>'Student', 'middleware'=>['auth:student']], function(){

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('courses', 'CoursesController@course')->name('courses');
	Route::get('add-courses', 'CoursesController@create')->name('course.create');
	Route::post('add-courses', 'CoursesController@store')->name('courses.store');
	Route::get('assignment', 'CoursesController@assignment')->name('assignment');
	Route::get('posts', 'CoursesController@posts')->name('posts');

});