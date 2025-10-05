<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorCourseRequest;
use App\Models\Collegian;
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
}
