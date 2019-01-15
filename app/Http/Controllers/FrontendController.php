<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   
    public function welcome()
    {
        $courses = Course::latest()->get();
        return view('welcome', compact('courses'));
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

   
}
