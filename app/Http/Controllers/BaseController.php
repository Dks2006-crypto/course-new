<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\courses;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $reviews = Review::with('user')->latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'courses' => view('layouts.components.corses', compact('courses'))->render(),
            ]);
        }

        return view('layouts.base', compact('brands', 'courses', 'reviews'));
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

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
            if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('reviews', 'public');
    }

        Review::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'photo' => $photoPath,
        ]);

        return redirect()->route('reviews.index');
    }
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('reviews.index');
    }
};
