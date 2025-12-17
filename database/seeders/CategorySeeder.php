<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Anime', 'slug' => 'anime'],
            ['name' => 'Movie', 'slug' => 'movie'],
            ['name' => 'Berita', 'slug' => 'berita'],
            ['name' => 'Series', 'slug' => 'series'],
            ['name' => 'Foods', 'slug' => 'foods'],
            ['name' => 'Game', 'slug' => 'game'],
        ];

        foreach ($categories as $cat) {
            // cek berdasarkan slug, kalau ada update, kalau belum ada create
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
