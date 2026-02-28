<?php

namespace Database\Seeders;

use App\Models\ArticleSetting;
use Illuminate\Database\Seeder;

class ArticleSettingSeeder extends Seeder
{
    public function run(): void
    {
        ArticleSetting::truncate();

        ArticleSetting::create([
            'banner_image' => null,

            'banner_title' => [
                'en' => 'Latest Articles',
                'id' => 'Artikel Terbaru',
            ],

            'subheading' => [
                'en' => 'TIPS & TRICKS',
                'id' => 'TIPS & TRIK',
            ],

            'heading' => [
                'en' => 'Overseas Career Preparation & Tips',
                'id' => 'Tips & Persiapan Kerja Luar Negeri',
            ],

            'short_description' => [
                'en' => 'A collection of educational articles featuring tips, industry knowledge, and career guides to help you better prepare for the international cruise and hospitality workforce.',
                'id' => 'Kumpulan artikel edukatif berisi tips, pengetahuan industri, dan panduan karier untuk membantu Anda lebih siap memasuki dunia kerja kapal pesiar dan perhotelan internasional.',
            ],

            // SEO
            'seo_title' => [
                'en' => 'Latest Articles | Las Olas Indonesia',
                'id' => 'Artikel Terbaru | Las Olas Indonesia',
            ],
            'seo_description' => [
                'en' => 'Browse educational articles with tips, industry knowledge, and career guides for the international cruise and hospitality workforce.',
                'id' => 'Temukan artikel edukatif berisi tips, pengetahuan industri, dan panduan karier untuk dunia kerja kapal pesiar dan perhotelan.',
            ],
            'seo_keywords' => [
                'en' => 'articles, career tips, cruise industry, hospitality, overseas jobs, Las Olas Indonesia',
                'id' => 'artikel, tips karier, industri kapal pesiar, perhotelan, kerja luar negeri, Las Olas Indonesia',
            ],
            'seo_og_image' => null,
        ]);
    }
}
