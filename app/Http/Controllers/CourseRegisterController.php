<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseRegisterController extends Controller
{
    
    public function register(Request $request, string $course_slug)
    {
        dd($course_slug);
    }

}
