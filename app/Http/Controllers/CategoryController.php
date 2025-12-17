<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['videos' => function ($q) {
                $q->latest('published_at');
            }])
            ->firstOrFail();

        return view('category.show', compact('category'));
    }
}
