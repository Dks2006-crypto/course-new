<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return view('layouts.base', );
    }
    public function courses()
    {
        $courses = courses::where('is_active', true)->get();
        return view('layouts.base', [
            'courses' => $courses,
        ]);
    }
}
