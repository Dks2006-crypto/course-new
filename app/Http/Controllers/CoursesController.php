<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = courses::where('is_active', true)->get();
        return view('layouts.base', [
            'courses' => $courses,
        ]);
    }
}
