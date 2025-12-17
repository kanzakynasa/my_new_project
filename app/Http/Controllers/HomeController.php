<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('videos')->get();

        $featured = Video::with('category')
            ->where('is_featured', true)
            ->latest('published_at')
            ->take(6)
            ->get();

        $latest = Video::with('category')
            ->latest('published_at')
            ->take(12)
            ->get();

        return view('home', compact('categories', 'featured', 'latest'));
    }
}
