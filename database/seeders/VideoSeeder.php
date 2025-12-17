<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'anime'  => Category::where('slug', 'anime')->first(),
            'movie'  => Category::where('slug', 'movie')->first(),
            'berita' => Category::where('slug', 'berita')->first(),
            'series' => Category::where('slug', 'series')->first(),
            'foods'  => Category::where('slug', 'foods')->first(),
            'game'   => Category::where('slug', 'game')->first(),
        ];

        $videos = [
            [
                'title'       => 'Menembus Banjir Langkat dan Pelosok Tamiang yang terisolasi',
                'description' => 'Ferry Irwandi Banjir Aceh.',
                'youtube_id'  => 'PC3KLjRgRbM',
                'category'    => 'berita',
            ],
            [
                'title'       => 'The Angel Next Door Spoils Me Rotten #1',
                'description' => 'My bini tinggal disebelah omaygot!!!.',
                'youtube_id'  => 'S4k4MinUf-Y',
                'category'    => 'anime',
            ],
            [
                'title'       => 'Dwayne Johnson In THE DEMIGOD',
                'description' => 'THE DEMIGOD.',
                'youtube_id'  => 'Klq1qRaZOxo',
                'category'    => 'movie',
            ],
            [
                'title'       => 'Turu Camp (Playlist)',
                'description' => 'Ciwi-ciwi kamping cuy. Playlist YouTube.',
                'youtube_id'  => 'toRv2b-iCs8', // hanya video ID
                'playlist_id' => 'PLNAQymMf9eaaB3h_iALWDcKRlLXqiBB57', // field tambahan opsional
                'category'    => 'series',
            ],
            [
                'title'       => 'MAKAN SOTO HARGA 6 RIBU SAMPAI JATOH GARA-GARA BANGKU PATAH',
                'description' => 'Jatoh',
                'youtube_id'  => '_oHCgMh9KGM',
                'category'    => 'foods',
            ],
            [
                'title'       => 'PONI LEMPAR IS BACKKK!!!!',
                'description' => 'Leon kanjud',
                'youtube_id'  => '369W_SydEA0',
                'category'    => 'game',
            ],
        ];

        foreach ($videos as $video) {
            Video::create([
                'title'         => $video['title'],
                'description'   => $video['description'],
                'youtube_id'    => $video['youtube_id'],
                'thumbnail_url' => "https://i.ytimg.com/vi/{$video['youtube_id']}/hqdefault.jpg",
                'category_id'   => $categories[$video['category']]?->id,
                'is_featured'   => true,
                // simpan playlist_id kalau ada
                'playlist_id'   => $video['playlist_id'] ?? null,
            ]);
        }
    }
}
