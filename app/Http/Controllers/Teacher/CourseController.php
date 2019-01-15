<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('teacher.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'name' => 'required|unique:courses',
            'details' => 'required',
            'image' => 'required',
        ]);

        $slug = str_slug($request->name);
        $course_details = $request->details;
        $teacher = Auth::guard('teacher')->user()->id;
        $image = $request->file('image');

        if (isset($image)) {

           $currentDate = Carbon::now()->toDateString();
           $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


           if (!Storage::disk('public')->exists('course')) 
                {
                    Storage::disk('public')->makeDirectory('course');
                }

// resize image.....

            $course = Image::make($image)->resize(360, 220)->save($imageName);

// store image into category folder.....

            Storage::disk('public')->put('course/'.$imageName, $course);

// check if slider directory already exists....

            if (!Storage::disk('public')->exists('course/details')) 
            {
                Storage::disk('public')->makeDirectory('course/details');
            }

// resize image.....

            $details = Image::make($image)->resize(750,350)->save($imageName);

// store image into slider folder.....

            Storage::disk('public')->put('course/details/'.$imageName, $details);
       }else{

        $imageName = 'deafult.png';
       }


        $course = new Course();
        $course->teacher_id = $teacher;
        $course->name = $request->name;
        $course->slug = $slug;
        $course->details = $course_details;
        $course->image = $imageName;
        $course->save();


        Toastr::success('Course Added Successfully.', 'success');
        return redirect()->route('teacher.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('teacher.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:courses',
        ]);

        $slug = str_slug($request->name);

        $course = Course::find($id);
        $course->name = $request->name;
        $course->slug = $slug;
        $course->save();

        Toastr::success('Course Updated Successfully.', 'success');
        return redirect()->route('teacher.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}