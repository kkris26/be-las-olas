<?php

namespace Database\Seeders;

use App\Models\FocusSetting;
use App\Models\PartnerSetting;
use App\Models\TestimonialSetting;
use App\Models\Testimonial;
use App\Models\ProfessionalTeamMember;
use Illuminate\Database\Seeder;

class SectionAndContentSeeder extends Seeder
{
    private function parentPath(string $filename): string
    {
        return 'sections/' . $filename;
    }

    public function run(): void
    {
        $this->seedFocusSetting();
        $this->seedPartnerSetting();
        $this->seedTestimonialSetting();
        $this->seedTestimonials();
        $this->seedProfessionalTeam();
    }

    // ─────────────────────────────────────────────────────────────────────────
    // FOCUS SETTING
    // ─────────────────────────────────────────────────────────────────────────

    private function seedFocusSetting(): void
    {
        FocusSetting::truncate();
        $this->command?->info('Seeding Focus Setting…');

        FocusSetting::create([
            'focus_heading' => ['id' => 'Fokus Kami', 'en' => 'Our Focus'],
            'focus_description' => [
                'id' => 'Memastikan proses seleksi, pengembangan, dan penempatan tenaga kerja berjalan profesional dan terintegrasi.',
                'en' => 'Ensuring the selection, development, and placement process of the workforce runs professionally and integratedly.',
            ],
            'focus_items' => [
                'id' => [
                    ['icon_key' => 'personSearch', 'title' => 'Perekrutan Tenaga Kerja',   'description' => 'Kami berfokus dalam membuka akses karier dan peluang kerja di tingkat internasional.'],
                    ['icon_key' => 'assignment',   'title' => 'Seleksi Awal dan Peniliaian Kompetensi Pekerja',              'description' => 'Kami selalu memastikan supaya setiap kandidat kompeten dan profesional.'],
                    ['icon_key' => 'document',     'title' => 'Layanan Pengurusan Dokumen',           'description' => 'Kami memastikan seluruh dokumen diproses secara lengkap, akurat, dan tepat waktu, sesuai legalitas yang berlaku.'],
                    ['icon_key' => 'business',     'title' => 'Proses Penempatan di Industri',         'description' => 'Kami memastikan proses penempatan di industri berjalan tepat dan profesional.'],
                    ['icon_key' => 'analytics',    'title' => 'Pengembangan Kompetensi Pekerja',   'description' => 'Menjadi fokus kami dalam meningkatkan kompetensi kerja agar kinerja sesuai dengan harapan user.'],
                    ['icon_key' => 'partnership',  'title' => 'Perluasan Jaringan Kemitraan Penempatan Kerja',        'description' => 'Kami melakukannya secara strategis untuk membuka lebih banyak peluang karier di berbagai industri.'],
                ],
                'en' => [
                    ['icon_key' => 'personSearch', 'title' => 'Workforce Recruitment',     'description' => 'We recruit top candidates through rigorous screening aligned with international cruise industry standards.'],
                    ['icon_key' => 'assignment',   'title' => 'Initial Selection',         'description' => 'A comprehensive initial selection process to ensure candidate competencies match the requirements of each position.'],
                    ['icon_key' => 'document',     'title' => 'Document Services',         'description' => 'Full assistance with work documents, visas, and other administrative requirements — handled professionally and efficiently.'],
                    ['icon_key' => 'business',     'title' => 'Placement Process',         'description' => 'End-to-end coordination from contract signing to departure, ensuring a smooth and successful placement experience.'],
                    ['icon_key' => 'analytics',    'title' => 'Competency Development',    'description' => 'Structured training programs to enhance technical skills and soft skills in line with international standards.'],
                    ['icon_key' => 'partnership',  'title' => 'Network Expansion',         'description' => 'Building and expanding strategic partnerships with world-class cruise and hospitality companies.'],
                ],
            ],
            'focus_bg_desktop'    => $this->parentPath('focus/background_image.webp'),
            'use_focus_bg_mobile' => true,
            'focus_bg_mobile'     => $this->parentPath('focus/background_image.webp'),
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PARTNER SETTING
    // ─────────────────────────────────────────────────────────────────────────

    private function seedPartnerSetting(): void
    {
        PartnerSetting::truncate();
        $this->command?->info('Seeding Partner Setting…');

        PartnerSetting::create([
            'partner_heading'     => ['id' => 'Mitra Kami', 'en' => 'Our Partners'],
            'partner_description' => [
                'id' => 'Kami menjalin kerjasama dengan mitra internasional terpercaya, memastikan standar tinggi dalam setiap aspek layanan, serta memberikan peluang global yang legal dan terjamin.',
                'en' => 'We are proud to partner with world-class cruise companies that trust us to source and place the finest Indonesian talent.',
            ],
            'partner_logos' => [
                ['logo_image' => $this->parentPath('/partners/AYC_Logo.webp')],
                ['logo_image' => $this->parentPath('/partners/Explora_Journey_Logo.webp')],
                ['logo_image' => $this->parentPath('/partners/MSC_Logo.webp')],
                ['logo_image' => $this->parentPath('/partners/Opus_Logo.webp')],
            ],
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // TESTIMONIAL SETTING
    // ─────────────────────────────────────────────────────────────────────────

    private function seedTestimonialSetting(): void
    {
        TestimonialSetting::truncate();
        $this->command?->info('Seeding Testimonial Setting…');

        TestimonialSetting::create([
            'testimonial_heading'     => ['id' => 'Apa Kata Mereka', 'en' => 'What They Say'],
            'testimonial_description' => [
                'id' => 'Ratusan pengalaman sukses yang mencerminkan kualitas dan dampak positif layanan kami.',
                'en' => 'Hear directly from Indonesian professionals who have launched their international careers through PT Las Olas Indonesia.',
            ],
            'testimonial_button_text' => ['id' => 'Lihat Lainnya', 'en' => 'View More'],
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // TESTIMONIALS (CONTENT LIST)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedTestimonials(): void
    {
        Testimonial::truncate();
        $this->command?->info('Seeding Testimonials…');

        $list = [
            [
                'name' => 'Kadek Devita Apriliani', 'image' => null,
                'position'    => ['id' => 'Massage Therapist',    'en' => 'Massage Therapist'],
                'testimonial' => [
                    'id' => 'Saya berterima kasih kepada Lasolas karena telah membimbing saya melewati proses lamaran kerja di luar negeri dengan lancar.   ',
                    'en' => 'Joining PT Las Olas Indonesia was the best decision of my life. Their team is incredibly professional and supportive throughout the entire selection and departure process. I now work aboard an MSC cruise ship with earnings that far exceed my expectations.',
                ],
            ],
            [
                'name' => 'Siti Rahmawati', 'image' => null,
                'position'    => ['id' => 'Housekeeping', 'en' => 'Housekeeping'],
                'testimonial' => [
                    'id' => 'Saya tidak menyangka bisa bekerja di kapal pesiar internasional. Las Olas membantu saya dari pelatihan bahasa Inggris, pengurusan visa, hingga orientasi pra-keberangkatan. Pengalaman bekerja di Explora Journeys membuka wawasan dan karir saya secara luar biasa.',
                    'en' => 'I never imagined I could work on an international cruise ship. Las Olas helped me with everything — from English training and visa processing to pre-departure orientation. Working at Explora Journeys has truly opened up my horizons and career in remarkable ways.',
                ],
            ],
            [
                'name' => 'Andi Pratama', 'image' => null,
                'position'    => ['id' => 'Galley Utility', 'en' => 'Galley Utility'],
                'testimonial' => [
                    'id' => 'Prosesnya transparan dan jelas dari awal. Las Olas tidak pernah meminta biaya tersembunyi dan selalu memberikan informasi yang akurat. Sekarang saya sudah kontrak kedua dan berencana naik jabatan. Terima kasih Las Olas!',
                    'en' => 'The process was clear and transparent from the start. Las Olas never had any hidden fees and always provided accurate information. I am now on my second contract and planning to get promoted. Thank you, Las Olas!',
                ],
            ],
        ];

        foreach ($list as $data) {
            Testimonial::create($data);
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROFESSIONAL TEAM
    // ─────────────────────────────────────────────────────────────────────────

    private function seedProfessionalTeam(): void
    {
        ProfessionalTeamMember::truncate();
        $this->command?->info('Seeding Professional Team…');

        $members = [
            ['name' => 'Agung Widnyana S.S M.M', 'role' => ['id' => 'Ketua dan Chief Executive',  'en' => 'Chairman and Chief Executive'], 'sort_order' => 1],
            ['name' => 'Sarah Wijaya',            'role' => ['id' => 'Chief Operations Officer',  'en' => 'Chief Operations Officer'],      'sort_order' => 2],
            ['name' => 'Budi Santoso',            'role' => ['id' => 'Chief Financial Officer',   'en' => 'Chief Financial Officer'],       'sort_order' => 3],
            ['name' => 'Dinda Pertiwi',  'role' => ['id' => 'Spesialis Rekrutmen Senior',  'en' => 'Senior Recruitment Specialist'], 'sort_order' => 4],
            ['name' => 'Rian Hidayat',   'role' => ['id' => 'Manajer Pelatihan',            'en' => 'Training Manager'],              'sort_order' => 5],
            ['name' => 'Putri Anindya',  'role' => ['id' => 'Eksekutif Pemasaran',          'en' => 'Marketing Executive'],           'sort_order' => 6],
            ['name' => 'Kevin Pratama',  'role' => ['id' => 'Koordinator Operasional',      'en' => 'Operations Coordinator'],        'sort_order' => 7],
            ['name' => 'Siti Rahmawati', 'role' => ['id' => 'Petugas Sumber Daya Manusia',  'en' => 'Human Resources Officer'],       'sort_order' => 8],
            ['name' => 'Ahmad Fauzi',    'role' => ['id' => 'Spesialis Dukungan IT',        'en' => 'IT Support Specialist'],         'sort_order' => 9],
            ['name' => 'Jessica Tan',    'role' => ['id' => 'Pengendali Dokumen',           'en' => 'Document Control'],              'sort_order' => 10],
            ['name' => 'Hendra Wijaya',  'role' => ['id' => 'Pengembangan Bisnis',          'en' => 'Business Development'],          'sort_order' => 11],
        ];

        foreach ($members as $data) {
            ProfessionalTeamMember::create(array_merge($data, ['image' => null, 'linkedin' => null, 'email' => null]));
        }
    }
}
