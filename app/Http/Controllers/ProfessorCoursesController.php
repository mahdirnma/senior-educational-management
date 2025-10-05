<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorCourseRequest;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorCoursesController extends Controller
{
    public function professorCourses()
    {
        $user=Auth::user();
        $professor=Professor::where('email',$user->email)->first();
        $courses=$professor->courses;
        return view('professor.index',compact('courses'));
    }
    public function createCourses()
    {
        return view('professor.create');
    }
    public function storeCourses(StoreProfessorCourseRequest $request)
    {
        $user=Auth::user();
        $professor=Professor::where('email',$user->email)->first();
        $course=$professor->courses()->create($request->validated());
        if($course){
            return redirect()->route('professor.courses');
        }
        return redirect()->back();
    }

}
