<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }

        // Filter kategori (pakai slug dari tabel categories)
        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $videos   = $query->paginate(12);
        $featured = $query->first();

        return view('videos.index', compact('videos', 'featured'));
    }

    // tampilkan detail video
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    // form tambah video
    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    // simpan video baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_id'  => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['thumbnail_url'] = "https://i.ytimg.com/vi/{$validated['youtube_id']}/hqdefault.jpg";

        Video::create($validated);

        return redirect()->route('videos.index')->with('success', 'Video berhasil ditambahkan.');
    }

    // form edit video
    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('videos.edit', compact('video', 'categories'));
    }

    // update video
    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_id'  => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['thumbnail_url'] = "https://i.ytimg.com/vi/{$validated['youtube_id']}/hqdefault.jpg";

        $video->update($validated);

        return redirect()->route('videos.index')->with('success', 'Video berhasil diupdate.');
    }

    // hapus video
    public function destroy($id)
    {
    Video::findOrFail($id)->delete();
    return redirect()->route('videos.index')
        ->with('success', 'Video berhasil dihapus.');
    }

    // tampilkan video berdasarkan kategori slug
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $videos   = $category->videos()->paginate(12);

        return view('videos.index', [
            'videos'   => $videos,
            'featured' => $videos->first(),
            'category' => $category,
        ]);
    }
}
