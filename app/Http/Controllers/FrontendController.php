<?php

namespace App\Http\Controllers;

use App\Course;
use App\Teacher;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   
    public function welcome()
    {
        $teachers = Teacher::all();
        $courses = Course::latest()->get();
        return view('welcome', compact('courses','teachers'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function courses()
    {
        $courses = Course::latest()->get();

        return view('courses', compact('courses'));
    }

    public function courseDetails($id){
        // $courses = Course::where('id', $id)->get();
        // // echo "<pre>";
        // // print_r($courses);
        // // echo "</pre>";
        // return view('course-details',compact('courses'));
        $courses = Course::where('id', $id)->get();
        return view('course-details', compact('courses'));
    }
   
}
