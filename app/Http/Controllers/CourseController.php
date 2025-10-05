<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Professor;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::where('is_active',1)->paginate(2);
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors=Professor::where('is_active',1)->get();
        return view('admin.courses.create',compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course=Course::create($request->all());
        if($course){
            return redirect()->route('courses.index');
        }
        return redirect()->route('courses.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $professors=Professor::where('is_active',1)->get();
        return view('admin.courses.edit',compact('course','professors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $status=$course->update($request->all());
        if($status){
            return redirect()->route('courses.index');
        }
        return redirect()->route('courses.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $status=$course->update(['is_active'=>0]);
        return redirect()->route('courses.index');
    }
}
