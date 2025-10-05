<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollegianCourseRequest;
use App\Http\Requests\StoreProfessorCourseRequest;
use App\Models\Collegian;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollegianCoursesController extends Controller
{
    public function collegianCourses()
    {
        $user=Auth::user();
        $collegian=Collegian::where('email',$user->email)->first();
        $courses=$collegian->courses;
        return view('collegian.index',compact('courses'));
    }

    public function createCourses()
    {
        $courses=Course::where('is_active',1)->get();
        return view('collegian.create',compact('courses'));
    }
    public function storeCourses(StoreCollegianCourseRequest $request){
        $user=Auth::user();
        $collegian=Collegian::where('email',$user->email)->first();
        $status=$collegian->courses()->attach($request->course_id);
        return redirect()->route('collegian.courses');
    }
}
