<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\courses;
use Illuminate\Http\Request;

/**
 * Class SubscriptionController
 * @package App\Http\Controllers
 */

class BaseController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();

        $courses = courses::all();

        if ($request->ajax()) {
            return response()->json([
                'courses' => view('layouts.components.corses', compact('courses'))->render(),
            ]);
        }

        return view('layouts.base', compact('brands', 'courses'));
    }
    public function getCoursesByCategory($brandId, Request $request)
    {
        $courses = courses::where('brand_id', $brandId)->get();

        if ($request->ajax()){
            return response()->json([
                'courses' => view('layouts.components.corses', compact('courses'))->render(),
            ]);
        }

        return response()->json(['message' => 'Invalid request'], 400);
    }
};
