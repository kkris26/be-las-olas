<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'example/' . $filename;
    }

    public function run(): void
    {
        HomePage::truncate();

        $this->command?->info('Creating Home Page seed record…');

        HomePage::create([

            // ── Hero ───────────────────────────────────────────────────────
            'hero_subheading'       => ['id' => 'PT LAS OLAS INDONESIA', 'en' => 'PT LAS OLAS INDONESIA'],
            'hero_heading'          => ['id' => 'Menghubungkan Talenta ke Penjuru Dunia', 'en' => 'Connecting Talents To The World'],
            'hero_description'      => [
                'id' => 'Agen Kapal Pesiar Resmi MSC Cruises & Explora Journeys, Menyediakan Peluang Kerja Profesional di Luar Negeri, dari Kapal Pesiar hingga Perhotelan Darat.',
                'en' => 'Official Cruise Agency for MSC Cruises & Explora Journeys, Providing Professional International Career Opportunities, from Cruise Ships to Land-Based Hospitality.',
            ],
            'hero_button_text'      => ['id' => 'Daftar Sekarang!', 'en' => 'Register Now!'],
            'hero_button_link'      => '#register',
            'hero_mobile_bg_image'  => $this->examplePath('example-potrait.png'),
            'hero_desktop_bg_image' => $this->examplePath('example-desktop.png'),

            // ── Highlight ──────────────────────────────────────────────────
            'highlight_subheading'  => ['id' => 'PT Las Olas Indonesia',                              'en' => 'PT Las Olas Indonesia'],
            'highlight_heading'     => ['id' => 'Mitra Resmi MSC Cruises & Explora Journeys',         'en' => 'Official Partner of MSC Cruises & Explora Journeys'],
            'highlight_description' => [
                'id' => 'Sebagai P3MI berlisensi dan Agen Kru resmi, kami membantu tenaga profesional menemukan peluang karier terbaik di industri pelayaran mewah dan perhotelan internasional. Dengan pengalaman bertahun-tahun dalam perekrutan dan rekam jejak yang terbukti, kami menyeleksi kandidat berdasarkan kompetensi, membangun hubungan yang solid antara pelamar dan perusahaan, serta mendukung masa depan karir global tanpa batas.',
                'en' => 'As a licensed P3MI and official Cruise Agency, we assist professional workers in finding the best career opportunities within the luxury cruise industry and international hospitality. With years of recruitment experience and a proven track record, we screen candidates based on competence, build solid relationships between applicants and companies, and support a boundless global career future.',
            ],
            'highlight_button_text' => ['id' => 'Kenali Lebih Lanjut', 'en' => 'Learn More About Us'],
            'highlight_button_link' => '#about',
            'highlight_image'       => $this->examplePath('example-desktop.png'),

            // ── Statistics ─────────────────────────────────────────────────
            'statistics_items' => [
                'en' => [
                    ['value' => 2017, 'heading' => 'Year Established',      'has_prefix' => false, 'prefix_text' => null],
                    ['value' => 600,  'heading' => 'Cruises Placements',    'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 150,  'heading' => 'Land Placements',       'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 4,    'heading' => 'Global Partners',       'has_prefix' => false, 'prefix_text' => null],
                ],
                'id' => [
                    ['value' => 2017, 'heading' => 'Tahun Berdiri',         'has_prefix' => false, 'prefix_text' => null],
                    ['value' => 600,  'heading' => 'Penempatan Pesiar',     'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 150,  'heading' => 'Penempatan Darat',      'has_prefix' => true,  'prefix_text' => '+'],
                    ['value' => 4,    'heading' => 'Mitra Global',          'has_prefix' => false, 'prefix_text' => null],
                ],
            ],

            // ── Cruise Services ────────────────────────────────────────────
            'cruise_subheading'        => ['id' => 'Karir Utama Kami',               'en' => 'Our Main Career'],
            'cruise_heading'           => ['id' => 'Penempatan Kapal Pesiar Mewah', 'en' => 'Luxury Cruise Ship Placement'],
            'cruise_short_description' => [
                'id' => 'Kami sangat berpengalaman dalam merekrut kandidat andal untuk bekerja di kapal pesiar internasional kelas satu dengan penghasilan mata uang asing.',
                'en' => 'We are highly experienced in recruiting reliable candidates to work on first-class international cruise ships earning foreign currency.',
            ],
            'cruise_services' => [
                'en' => [
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'MSC Cruises',
                        'description' => "MSC Cruises, one of the world's largest cruise lines, offers a luxury experience with superior service and incredible international destinations.",
                        'button_text' => 'Apply to MSC',
                        'button_link' => '#msc',
                    ],
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Explora Journeys',
                        'description' => 'A distinct ultra-luxury cruise brand presenting an exclusive journey with highly personalized service and amazing global boutique destinations.',
                        'button_text' => 'Apply to Explora',
                        'button_link' => '#explora',
                    ],
                ],
                'id' => [
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'MSC Cruises',
                        'description' => 'MSC Cruises, salah satu armada kapal pesiar terbesar di dunia, menawarkan pengalaman berlayar mewah dengan layanan unggul dan destinasi internasional memukau.',
                        'button_text' => 'Lamar MSC',
                        'button_link' => '#msc',
                    ],
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Explora Journeys',
                        'description' => 'Merk pelayaran ultra-mewah yang menghadirkan perjalanan eksklusif sekelas resor butik dengan layanan sangat personal dan destinasi global pesona tinggi.',
                        'button_text' => 'Lamar Explora',
                        'button_link' => '#explora',
                    ],
                ],
            ],

            // ── Land Services ─────────────────────────────────────────────
            'land_subheading'        => ['id' => 'Peluang Global Lainnya',                'en' => 'Other Global Opportunities'],
            'land_heading'           => ['id' => 'Penempatan Industri Perhotelan Darat',   'en' => 'Land-Based Hospitality Placement'],
            'land_short_description' => [
                'id' => 'Selain laut lepas, kami juga merekrut dan menempatkan tenaga kerja profesional perhotelan di berbagai sektor komersial darat tingkat Eropa.',
                'en' => 'Beyond the open sea, we also recruit and place professional hospitality workers in various high-level European commercial land sectors.',
            ],
            'land_services' => [
                'en' => [
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Turkey Placements',
                        'description' => 'Turkey is an outstanding hub bridging Europe and Asia, with a fast-growing tourism economy and high demand for 5-star hospitality workers.',
                        'button_text' => 'Discover Opportunities',
                        'button_link' => '#turkey',
                    ],
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Bulgaria Placements',
                        'description' => 'Bulgaria offers strategic and promising job prospects with its booming hotel industry sector and great pathways to wider European Union careers.',
                        'button_text' => 'Discover Opportunities',
                        'button_link' => '#bulgaria',
                    ],
                ],
                'id' => [
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Penempatan Turki',
                        'description' => 'Turki adalah penghubung utama Eropa dan Asia yang luar biasa, dengan ekonomi pariwisata super cepat dan permintaan tinggi untuk pekerja perhotelan bintang 5.',
                        'button_text' => 'Jelajahi Peluang',
                        'button_link' => '#turkey',
                    ],
                    [
                        'image'       => $this->examplePath('example-desktop.png'),
                        'heading'     => 'Penempatan Bulgaria',
                        'description' => 'Bulgaria menawarkan prospek kerja strategis dan menjanjikan dengan sektor perhotelannya yang sedang meroket serta jalur bagus menuju karir Uni Eropa.',
                        'button_text' => 'Jelajahi Peluang',
                        'button_link' => '#bulgaria',
                    ],
                ],
            ],

            // ── News Section ──────────────────────────────────────────────
            'news_subheading'        => ['id' => 'Pusat Informasi',               'en' => 'Information Center'],
            'news_heading'           => ['id' => 'Berita & Acara Terkini',         'en' => 'Latest News & Events'],
            'news_short_description' => [
                'id' => 'Ikuti ulasan berita pembaruan terbaru seputar kegiatan perekrutan, program pelatihan, jalinan kerja sama industri baru, serta berbagai cerita inspiratif alumni kami.',
                'en' => 'Follow our latest news updates on recruitment activities, training programs, new industry partnerships, and various inspiring success stories from our alumni.',
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
            'seo_og_image' => $this->examplePath('example-desktop.png'),
        ]);
    }
}

