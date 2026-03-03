<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'home/' . $filename;
    }

    public function run(): void
    {
        HomePage::truncate();

        $this->command?->info('Creating Home Page seed record…');

        HomePage::create([

            // ── Hero ───────────────────────────────────────────────────────
            'hero_subheading'       => ['id' => 'PT LAS OLAS INDONESIA', 'en' => 'PT LAS OLAS INDONESIA'],
            'hero_heading'          => ['id' => 'Connecting Talents to the World', 'en' => 'Connecting Talents to the World'],
            'hero_description'      => [
                'id' => 'Agen kapal pesiar resmi MSC Cruises & Explora Journeys, menyediakan peluang kerja profesional di luar negeri, dari kapal pesiar hingga perhotelan darat.',
                'en' => 'Official Cruise Agency for MSC Cruises & Explora Journeys, providing professional international career opportunities, from cruise ships to land-based hospitality.',
            ],
            'hero_button_text'      => ['id' => 'Daftar Sekarang', 'en' => 'Register Now'],
            'hero_button_link'      => 'https://tms.lasolas.id/jobs',
            'hero_desktop_bg_image' => $this->examplePath('hero/home_hero_image.webp'),
            'hero_use_mobile_image' => true,
            'hero_mobile_bg_image'  => $this->examplePath('hero/home_hero_image_potrait.webp'),

            // ── Highlight ──────────────────────────────────────────────────
            'highlight_subheading'  => ['id' => 'SELAMAT DATANG DI',                              'en' => 'WELCOME TO'],
            'highlight_heading'     => ['id' => 'PT Las Olas Indonesia',         'en' => 'PT Las Olas Indonesia'],
            'highlight_description' => [
                'id' => 'Sebagai agensi kapal pesiar resmi MSC Cruises dan Explora Journeys, kami membantu tenaga kerja profesional menemukan peluang karier terbaik, baik di kapal pesiar maupun sektor hospitality luar negeri berbasis darat. Dengan pengalaman bertahun-tahun dalam perekrutan dan rekam jejak yang terbukti, kami menempatkan kandidat sesuai kompetensi, membangun hubungan saling menguntungkan antara kandidat dan perusahaan, serta mendukung pertumbuhan bisnis mitra dan masa depan kandidat.',
                'en' => 'As the official Cruise Agency for MSC Cruises and Explora Journeys, we help professional workers find the best career opportunities, both on cruise ships and in the land-based international hospitality sector. With years of experience in recruitment and a proven track record, we place candidates according to their competence, build mutually beneficial relationships between candidates and companies, and support the business growth of our partners and the future of our candidates.',
            ],
            'highlight_button_text' => ['id' => 'Tentang Kami', 'en' => 'About Us'],
            'highlight_image'       => $this->examplePath('highlight/foto_gedung_LOI.webp'),

            // ── Statistics ─────────────────────────────────────────────────
            'statistics_items' => [
                'en' => [
                    ['value' => 2017, 'heading' => 'Year of establishment',      'has_prefix' => false, 'prefix_text' => null],
                    ['value' => 600,  'heading' => 'Total on board cruise',    'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 150,  'heading' => 'Total land based',       'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 5,    'heading' => 'Partners',       'has_prefix' => false, 'prefix_text' => null],
                ],
                'id' => [
                    ['value' => 2017, 'heading' => 'Year of establishment',      'has_prefix' => false, 'prefix_text' => null],
                    ['value' => 600,  'heading' => 'Total on board cruise',    'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 150,  'heading' => 'Total land based',       'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 5,    'heading' => 'Partners',       'has_prefix' => false, 'prefix_text' => null],
                ],
            ],

            // ── Cruise Services ────────────────────────────────────────────
            'cruise_subheading'        => ['id' => 'LAYANAN KAMI',               'en' => 'OUR SERVICES'],
            'cruise_heading'           => ['id' => 'Penempatan di Kapal Pesiar', 'en' => 'Cruise Ship Placement'],
            'cruise_short_description' => [
                'id' => 'Kami berpengalaman dalam merekrut dan menempatkan tenaga kerja terbaik untuk bergabung dengan perusahaan kapal pesiar ternama Eropa-Amerika.',
                'en' => 'We are experienced in recruiting and placing the best workers to join renowned European-American cruise ship companies.',
            ],
            // ── Land Services ─────────────────────────────────────────────
            'land_subheading'        => ['id' => 'LAYANAN KAMI',                'en' => 'OUR SERVICES'],
            'land_heading'           => ['id' => 'Penempatan di Industri Perhotelan Luar Negeri (Sektor Darat)',   'en' => 'Placement in International Hospitality Industry (Land Sector)'],
            'land_short_description' => [
                'id' => 'Kami merekrut dan menempatkan Pekerja Migran Indonesia di resort dan hotel berbintang di beberapa negara prospektif di Eropa seperti di Bulgaria dan Turki serta di kawasan pariwisata internasional seperti Maldives.',
                'en' => 'We recruit and place Indonesian Migrant Workers in resorts and star hotels in several prospective countries in Europe such as Bulgaria and Turkey as well as in international tourism areas like the Maldives.',
            ],
            // ── News Section ──────────────────────────────────────────────
            'news_subheading'        => ['id' => 'PUSAT INFORMASI',               'en' => 'INFORMATION CENTER'],
            'news_heading'           => ['id' => 'Berita & Acara Terkini',         'en' => 'Latest News & Events'],
            'news_short_description' => [
                'id' => 'Ikuti ulasan berita pembaruan terbaru seputar kegiatan perekrutan, program pelatihan, jalinan kerja sama industri baru, serta berbagai cerita inspiratif alumni kami.',
                'en' => 'Follow our latest news updates regarding recruitment activities, training programs, new industry partnerships, and various inspiring stories from our alumni.',
            ],
            'news_button_text' => ['id' => 'Baca Semua Berita', 'en' => 'Read All News'],
            'news_button_link' => '#news',

            // ── SEO ───────────────────────────────────────────────────────
            'seo_title'       => [
                'en' => 'Home | Las Olas Indonesia - Official MSC Cruises & Explora Agency',
                'id' => 'Beranda | Las Olas Indonesia - Agen Resmi MSC Cruises & Explora',
            ],
            'seo_description' => [
                'en' => 'PT Las Olas Indonesia is the official recruitment agency for MSC Cruises & Explora Journeys, connecting talented Indonesians to world-class cruise and international hospitality careers.',
                'id' => 'PT Las Olas Indonesia adalah agen rekrutmen resmi MSC Cruises & Explora Journeys, menghubungkan talenta Indonesia dengan karier unggul di kapal pesiar dan perhotelan internasional.',
            ],
            'seo_keywords'    => [
                'id' => 'las olas indonesia, lowongan kapal pesiar, agen resmi msc indonesia, kerja kapal pesiar, lowongan perhotelan luar negeri, agen p3mi resmi',
                'en' => 'las olas indonesia, cruise ship recruitment, msc official agency indonesia, cruise jobs, international hospitality careers, licensed p3mi agency',
            ],
            'seo_og_image' => $this->examplePath('seo/main-logo-loi.webp'),
        ]);
    }
}

