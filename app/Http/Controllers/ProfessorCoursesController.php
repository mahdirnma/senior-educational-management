<?php

namespace App\Http\Controllers;

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

}
