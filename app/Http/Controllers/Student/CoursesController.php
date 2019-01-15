<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Course_Student;
use App\Http\Controllers\Controller;
use App\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function course()
    {
    	$student_id = Auth::guard('student')->id();
    	$courses = Student::find($student_id)->courses()->get();
    	return view('student.courses.courses', compact('courses'));
    }

    public function create()
    {
    	$courses = Course::latest()->get();
    	return view('student.courses.create', compact('courses'));
    }

     public function store(Request $request)
    {
    	$this->validate($request, [
    		'course' => 'required'
    	]);

    	$course_student = new Course_student();
    	$course = Course_student::all();
    	foreach ($course as $value) {
    		if ($request->course == $value->course_id) {
    			Toastr::info('Course Already Added...', 'info');
        		return redirect()->route('student.courses');
    		}
    	}

    	$course_student->course_id = $request->course;
    	$course_student->student_id = Auth::guard('student')->id();

    	$course_student->save();

    	Toastr::success('Course Added Successfully...', 'success');
        return redirect()->route('student.courses');
    }

    public function assignment()
    {
    	$student_id = Auth::guard('student')->id();
    	$courses = Student::find($student_id)->courses()->get();
    	$teachers = array();
    	foreach ($courses as $course) {

    		$teachers[] = Course::find($course->id)->teacher()->get();
    	}

    	return view('student.assignment.assignment', compact('courses', 'teachers'));
    }

    public function posts()
    {
    	return view('student.courses.posts');
    }
}
