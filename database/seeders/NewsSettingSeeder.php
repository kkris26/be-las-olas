<?php

namespace Database\Seeders;

use App\Models\NewsSetting;
use Illuminate\Database\Seeder;

class NewsSettingSeeder extends Seeder
{
    public function run(): void
    {
        NewsSetting::truncate();

        NewsSetting::create([
            'banner_image' => null,

            'banner_title' => [
                'en' => 'Latest News',
                'id' => 'Berita Terbaru',
            ],

            'subheading' => [
                'en' => 'INFORMATION',
                'id' => 'INFORMASI',
            ],

            'heading' => [
                'en' => 'Latest News & Activities',
                'id' => 'Berita & Kegiatan Terbaru',
            ],

            'short_description' => [
                'en' => 'The latest updates on our activities, training programs, industrial cooperation, and the travel stories of our students and alumni.',
                'id' => 'Update terbaru seputar kegiatan kami, program pelatihan, kerja sama industri, serta cerita perjalanan siswa dan alumni kami.',
            ],

            // SEO
            'seo_title' => [
                'en' => 'Latest News | Las Olas Indonesia',
                'id' => 'Berita Terbaru | Las Olas Indonesia',
            ],
            'seo_description' => [
                'en' => 'Stay updated with the latest news, training programs, industrial cooperation, and alumni stories from Las Olas Indonesia.',
                'id' => 'Tetap update dengan berita terbaru, program pelatihan, kerja sama industri, dan kisah alumni dari Las Olas Indonesia.',
            ],
            'seo_keywords' => [
                'en' => 'news, activities, training programs, alumni, Las Olas Indonesia',
                'id' => 'berita, kegiatan, program pelatihan, alumni, Las Olas Indonesia',
            ],
            'seo_og_image' => null,
        ]);
    }
}
