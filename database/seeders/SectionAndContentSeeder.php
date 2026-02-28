<?php

namespace Database\Seeders;

use App\Models\FocusSetting;
use App\Models\PartnerSetting;
use App\Models\TestimonialSetting;
use App\Models\Testimonial;
use App\Models\BoardMember;
use App\Models\ProfessionalTeamMember;
use Illuminate\Database\Seeder;

class SectionAndContentSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'example/' . $filename;
    }

    public function run(): void
    {
        $this->seedFocusSetting();
        $this->seedPartnerSetting();
        $this->seedTestimonialSetting();
        $this->seedTestimonials();
        $this->seedBoardMembers();
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
                'id' => 'Memastikan proses seleksi, pengembangan, dan penempatan tenaga kerja berjalan secara profesional, transparan, dan sesuai standar internasional untuk mendukung karir global Anda.',
                'en' => 'Ensuring professional, transparent, and internationally-aligned selection, development, and placement processes to support your global career journey.',
            ],
            'focus_items' => [
                'id' => [
                    ['icon_key' => 'personSearch', 'title' => 'Perekrutan Tenaga Kerja',   'description' => 'Kami merekrut kandidat terbaik melalui seleksi ketat yang berorientasi pada standar industri kapal pesiar internasional.'],
                    ['icon_key' => 'assignment',   'title' => 'Seleksi Awal',              'description' => 'Proses seleksi awal yang komprehensif untuk memastikan kesesuaian kompetensi kandidat dengan kebutuhan posisi.'],
                    ['icon_key' => 'document',     'title' => 'Layanan Dokumen',           'description' => 'Bantuan lengkap pengurusan dokumen kerja, visa, dan persyaratan administratif lainnya secara profesional dan cepat.'],
                    ['icon_key' => 'business',     'title' => 'Proses Penempatan',         'description' => 'Koordinasi menyeluruh dari awal kontrak hingga keberangkatan untuk memastikan penempatan yang mulus dan sukses.'],
                    ['icon_key' => 'analytics',    'title' => 'Pengembangan Kompetensi',   'description' => 'Program pelatihan terstruktur untuk meningkatkan keterampilan teknis dan soft skill sesuai standar internasional.'],
                    ['icon_key' => 'partnership',  'title' => 'Perluasan Jaringan',        'description' => 'Membangun dan memperluas jaringan kemitraan strategis dengan perusahaan kapal pesiar bertaraf dunia.'],
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
            'focus_bg_desktop'    => $this->examplePath('example-desktop.png'),
            'use_focus_bg_mobile' => true,
            'focus_bg_mobile'     => $this->examplePath('example-potrait.png'),
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
                'id' => 'Kami bangga bermitra dengan perusahaan-perusahaan kapal pesiar kelas dunia yang mempercayakan rekrutmen tenaga kerja terbaik Indonesia kepada kami.',
                'en' => 'We are proud to partner with world-class cruise companies that trust us to source and place the finest Indonesian talent.',
            ],
            'partner_logos' => [
                ['logo_image' => $this->examplePath('example-desktop.png')],
                ['logo_image' => $this->examplePath('example-desktop.png')],
                ['logo_image' => $this->examplePath('example-desktop.png')],
                ['logo_image' => $this->examplePath('example-desktop.png')],
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
                'id' => 'Dengarkan langsung pengalaman nyata dari para profesional Indonesia yang telah memulai karir internasional mereka melalui PT Las Olas Indonesia.',
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
                'name' => 'Kadek Devita Apriliani', 'image' => $this->examplePath('example-desktop.png'),
                'position'    => ['id' => 'Terapis Pijat',    'en' => 'Massage Therapist'],
                'testimonial' => [
                    'id' => 'Bergabung dengan PT Las Olas Indonesia adalah keputusan terbaik dalam hidup saya. Tim mereka sangat profesional dan supportif dari proses seleksi hingga keberangkatan. Kini saya bekerja di kapal pesiar MSC dengan penghasilan yang jauh melampaui ekspektasi saya.',
                    'en' => 'Joining PT Las Olas Indonesia was the best decision of my life. Their team is incredibly professional and supportive throughout the entire selection and departure process. I now work aboard an MSC cruise ship with earnings that far exceed my expectations.',
                ],
            ],
            [
                'name' => 'Siti Rahmawati', 'image' => $this->examplePath('example-desktop.png'),
                'position'    => ['id' => 'Tata Graha', 'en' => 'Housekeeping'],
                'testimonial' => [
                    'id' => 'Saya tidak menyangka bisa bekerja di kapal pesiar internasional. Las Olas membantu saya dari pelatihan bahasa Inggris, pengurusan visa, hingga orientasi pra-keberangkatan. Pengalaman bekerja di Explora Journeys membuka wawasan dan karir saya secara luar biasa.',
                    'en' => 'I never imagined I could work on an international cruise ship. Las Olas helped me with everything — from English training and visa processing to pre-departure orientation. Working at Explora Journeys has truly opened up my horizons and career in remarkable ways.',
                ],
            ],
            [
                'name' => 'Andi Pratama', 'image' => $this->examplePath('example-desktop.png'),
                'position'    => ['id' => 'Utilitas Dapur', 'en' => 'Galley Utility'],
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
    // BOARD MEMBERS
    // ─────────────────────────────────────────────────────────────────────────

    private function seedBoardMembers(): void
    {
        BoardMember::truncate();
        $this->command?->info('Seeding Board Members…');

        $members = [
            ['name' => 'Agung Widnyana S.S M.M', 'role' => ['id' => 'Ketua dan Chief Executive',  'en' => 'Chairman and Chief Executive'], 'sort_order' => 1],
            ['name' => 'Sarah Wijaya',            'role' => ['id' => 'Chief Operations Officer',  'en' => 'Chief Operations Officer'],      'sort_order' => 2],
            ['name' => 'Budi Santoso',            'role' => ['id' => 'Chief Financial Officer',   'en' => 'Chief Financial Officer'],       'sort_order' => 3],
        ];

        foreach ($members as $data) {
            BoardMember::create(array_merge($data, ['image' => $this->examplePath('example-desktop.png'), 'linkedin' => null, 'email' => null]));
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
            ['name' => 'Dinda Pertiwi',  'role' => ['id' => 'Spesialis Rekrutmen Senior',  'en' => 'Senior Recruitment Specialist'], 'sort_order' => 1],
            ['name' => 'Rian Hidayat',   'role' => ['id' => 'Manajer Pelatihan',            'en' => 'Training Manager'],              'sort_order' => 2],
            ['name' => 'Putri Anindya',  'role' => ['id' => 'Eksekutif Pemasaran',          'en' => 'Marketing Executive'],           'sort_order' => 3],
            ['name' => 'Kevin Pratama',  'role' => ['id' => 'Koordinator Operasional',      'en' => 'Operations Coordinator'],        'sort_order' => 4],
            ['name' => 'Siti Rahmawati', 'role' => ['id' => 'Petugas Sumber Daya Manusia',  'en' => 'Human Resources Officer'],       'sort_order' => 5],
            ['name' => 'Ahmad Fauzi',    'role' => ['id' => 'Spesialis Dukungan IT',        'en' => 'IT Support Specialist'],         'sort_order' => 6],
            ['name' => 'Jessica Tan',    'role' => ['id' => 'Pengendali Dokumen',           'en' => 'Document Control'],              'sort_order' => 7],
            ['name' => 'Hendra Wijaya',  'role' => ['id' => 'Pengembangan Bisnis',          'en' => 'Business Development'],          'sort_order' => 8],
        ];

        foreach ($members as $data) {
            ProfessionalTeamMember::create(array_merge($data, ['image' => $this->examplePath('example-desktop.png'), 'linkedin' => null, 'email' => null]));
        }
    }
}
