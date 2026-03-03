<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    private function parentPath(string $filename): string
    {
        return 'about-us/' . $filename;
    }

    public function run(): void
    {
        AboutPage::truncate();

        $this->command?->info('Creating About Page seed record…');

        AboutPage::create([

            // ── Banner ────────────────────────────────────────────────────
            'banner_title' => [
                'en' => 'About Us',
                'id' => 'Tentang Kami',
            ],
            'banner_image' => $this->parentPath('banner/about-us-hero.webp'),

            // ── Owner Message ─────────────────────────────────────────────
            'owner_headline' => [
                'en' => 'A Message From Our Management',
                'id' => 'Sebuah Pesan dari Manajemen Kami',
            ],
            'owner_message' => [
                'en' => '<p>At PT Las Olas Indonesia, we are driven by integrity, professionalism, and a deep commitment to empowering Indonesian talent to succeed on the global stage. We believe that people are our greatest asset, and through continuous learning, responsible recruitment, and international standards, we strive to create meaningful career opportunities abroad.</p><p>Our mission is not only to connect talent with world-class employers, but also to ensure every journey is guided by transparency, care, and respect. We welcome individuals who share our values, passion, and dedication to excellence to grow together with us as part of the Las Olas family. If you are ready to take your career beyond borders, your journey starts here.</p>',

                'id' => '<p>Di PT Las Olas Indonesia, kami didorong oleh integritas, profesionalisme, dan komitmen mendalam untuk memberdayakan talenta Indonesia agar sukses di panggung global. Kami percaya bahwa manusia adalah aset terbesar kami, dan melalui pembelajaran berkelanjutan, rekrutmen yang bertanggung jawab, serta standar internasional, kami berupaya menciptakan peluang karier yang bermakna di luar negeri.</p><p>Misi kami bukan hanya menghubungkan talenta dengan pemberi kerja kelas dunia, tetapi juga memastikan setiap perjalanan dipandu oleh transparansi, kepedulian, dan rasa hormat. Kami menyambut individu yang berbagi nilai, semangat, dan dedikasi kami terhadap keunggulan untuk tumbuh bersama sebagai bagian dari keluarga Las Olas. Jika Anda siap untuk membawa karier Anda melampaui batas, perjalanan Anda dimulai di sini.</p>',
            ],
            'owner_name' => [
                'en' => 'Agung Widnyana, S.S., M.M.',
                'id' => 'Agung Widnyana, S.S., M.M.',
            ],
            'owner_position' => [
                'en' => 'Director of PT Las Olas Indonesia',
                'id' => 'Direktur PT Las Olas Indonesia',
            ],
            'owner_image' => $this->parentPath('owner/directure-profile.webp'),

            // ── About Company ─────────────────────────────────────────────
            'about_headline' => [
                'en' => 'PT. Las Olas Indonesia',
                'id' => 'PT. Las Olas Indonesia',
            ],
            'about_description' => [
                'en' => '<p>PT Las Olas Indonesia is an official, government-licensed Indonesian Migrant Worker Placement Agency (P3MI) and the exclusive accredited entity authorized to actively recruit on behalf of MSC Cruises and Explora Journeys — unarguably two of the world\'s most prestigious and luxurious ocean vessel lines. We proudly specialize in meticulously matching highly skilled and ambitious Indonesian hospitality professionals with spectacular international career opportunities extending across both modern cruise fleets and land-based luxury hotel sectors.</p><p>Backed by decades of collective experience alongside an impeccable, proven track record of consistently successful global placements, our dedicated team comprehensively guides aspiring candidates through every single critical stage of employment: starting deliberately from the initial intensive screening phase and vocational skills competency training, all the way flawlessly through complex visa document processing and seamless final onboarding port support.</p>',
                'id' => '
                <p>Adalah Perusahaan Penempatan Pekerja Migran Indonesia (P3MI) yang berfokus pada penempatan Pekerja Migran Indonesia (PMI) di industri kapal pesiar dan hospitality (darat) di seluruh dunia. Dengan lisensi dari Kementerian Ketenagakerjaan dan Kementerian Kelautan Republik Indonesia, kami memastikan bahwa setiap proses perekrutan berjalan sesuai dengan standar yang mengacu pada Sistem Manajemen Mutu (SMM) ISO 9001:2015 serta kepatuhan penuh terhadap regulasi MLC 2006.</p>
                <p>Kami berkomitmen untuk menjalankan proses rekrutmen dengan asas transparansi dan akuntabilitas, sehingga setiap PMI yang ditempatkan dapat memperoleh kesempatan kerja yang sesuai dengan keahlian mereka dengan biaya keberangkatan yang wajar. Didukung oleh tim manajemen dengan pengalaman manajerial bertahun-tahun di industri kapal pesiar dan hospitality, kami memahami kebutuhan spesifik para prinsipal dan siap menyediakan PMI yang memiliki kompetensi sesuai dengan kebutuhan industri.</p>
                <p>Dengan sistem perekrutan yang selektif dan layanan yang fokus pada kualitas, kami siap mendukung para PMI untuk sukses dalam meraih peluang kerja global serta mendukung kemajuan bisnis para prinsipal.</p>',
            ],

            // ── Company Values ─────────────────────────────────────────────
            'value_subheading' => [
                'en' => 'OUR VALUES',
                'id' => 'NILAI KAMI',
            ],
            'value_heading' => [
                'en' => 'Our Vision, Mission & Commitment',
                'id' => 'Visi, Misi & Komitmen Kami',
            ],
            'value_description' => [
                'en' => 'We are experienced in recruiting and placing the best workforce to join cruise ship companies.',
                'id' => 'Kami berpengalaman dalam merekrut dan menempatkan tenaga kerja terbaik untuk bergabung dengan perusahaan kapal pesiar..',
            ],
            'value_image' => $this->parentPath('values/company-value-image.webp'),
            'value_items' => [
                'en' => [
                    [
                        'title'   => 'Grand Vision',
                        'content' => '<p>To be universally recognized as the undisputed leading Indonesian migrant professional worker placement agency matrix, perfectly bridging the challenging gap existing between immensely talented domestic workers and rewarding lucrative career opportunities flourishing in the global hospitality and worldwide marine tourism industry.</p>',
                    ],
                    [
                        'title'   => 'Focused Mission',
                        'content' => '<ol><li>Consistently conduct ethical, highly professional, strictly transparent, and absolutely scam-free candidate recruitment screening frameworks.</li><li>To nurture and actively foster genuinely mutually beneficial, long-lasting strategic business partnerships.</li><li>Successfully manage our corporate institutional assets through transparent, high-accountability good governance practices.</li></ol>',
                    ],
                    [
                        'title'   => 'Unwavering Commitment',
                        'content' => '<p>Relentlessly dedicated to upholding unquestionable integrity, providing highly personalized individual support services, and passionately promoting radically fair employment labor standards for all citizens everywhere in Indonesia.</p>',
                    ],
                ],
                'id' => [
                    [
                        'title'   => 'Visi',
                        'content' => '<p>Menjadi agen penempatan pekerja migran Indonesia yang terdepan dan menjembatani kesenjangan antara pekerja dengan peluang kerja di industri pariwisata dunia.</p>',
                    ],
                    [
                        'title'   => 'Misi',
                        'content' => '<ul><li>Melakukan proses rekrutmen dan penempatan tenaga kerja dengan penuh profesionalisme dengan proses yang transparan.</li><li>Menyelenggarakan kerja sama yang saling menguntungkan antara pekerja, industri, dan pihak lainnya.</li><li>Mengelola kelembagaan dengan tata kelola yang baik dan pelayanan yang inovatif.</li></ul>',
                    ],
                    [
                        'title'   => 'Komitmen',
                        'content' => '<p>Berdedikasi pada integritas, layanan personal, dan mempromosikan ketenagakerjaan yang adil di Indonesia.</p>',
                    ],
                ],
            ],

            // ── Collaboration ─────────────────────────────────────────────
            'collaboration_heading' => [
                'en' => 'In Collaboration with Campus of Dream',
                'id' => 'In Collaboration with Campus of Dream',
            ],
            'collaboration_description' => [
                'en' => 'We collaborate exclusively with Mediterranean Bali, a leading tourism vocational institution in Indonesia, which graduates thousands of alumni each year who have successfully built careers on cruise ships and in five-star hotels both internationally and domestically.',
                'id' => 'Kami berkolaborasi eksklusif dengan Mediterranean Bali, lembaga vokasi pariwisata terkemuka di Indonesia, yang setiap tahun meluluskan ribuan alumni yang telah sukses berkarir di kapal pesiar dan hotel berbintang luar negeri maupun dalam negeri.

'
            ],
            'collaboration_image' => $this->parentPath('collaboration/mediterraneanbali.webp'),
            'collaboration_video_link' => 'https://res.cloudinary.com/ddl6ef7ib/video/upload/v1772549599/VIDEO_MEDITERRANEAN_BALI_zyzim0.mp4',
            'collaboration_video_target_url' => 'https://www.youtube.com/@MediBaliChannel/videos',

            // ── Certified ─────────────────────────────────────────────────
            'certified_heading' => [
                'en' => 'We Are Certified',
                'id' => 'Kami Tersertifikasi',
            ],
            'certified_description' => [
                'en' => 'Certified Quality Management System (QMS) ISO 9001:2015 by TUV Rheinland Germany and meets compliance with MLC 2006, certified by Lloyd\'s Register (LR) Asia.',
                'id' => 'Tersertifikasi Sistem Manajemen Mutu (SMM) ISO 9001:2015 oleh TUV Rheinland Germany dan memenuhi kepatuhan terhadap MLC 2006, yang disertifikasi oleh Lloyd\'s Register (LR) Asia.',
            ],
            'certified_logos' => [
                ['logo_image' => $this->parentPath('certifications/lloyds-register.webp')],
                ['logo_image' => $this->parentPath('certifications/tuv-rheinland-certified.webp')],

            ],
            'certified_image' => $this->parentPath('certified/TÜV-Rheinland-Building.webp'),

            // ── Professional Team ─────────────────────────────────────────
            'team_heading' => [
                'en' => 'Professional Team',
                'id' => 'Tim Profesional',
            ],
            'team_description' => [
                'en' => 'Our professional team consists of experts with years of experience in five-star hotels and cruise ships, prioritizing integrity, excellent service, and outstanding hospitality quality.',
                'id' => 'Tim profesional kami terdiri dari para ahli berpengalaman di hotel bintang lima dan kapal pesiar, yang mengutamakan integritas, pelayanan terbaik, dan kualitas hospitality yang unggul.',
            ],

            // ── SEO ───────────────────────────────────────────────────────
            'seo_title' => [
                'en' => 'About PT Las Olas Indonesia | Our Vision, Mission & Commitment',
                'id' => 'Tentang Kami PT Las Olas Indonesia | Visi, Misi & Komitmen',
            ],
            'seo_description' => [
                'en' => 'Discover the core vision, mission, and ethical commitments of PT Las Olas Indonesia in connecting elite Indonesian hospitality talent with world-class international cruise and luxury travel careers.',
                'id' => 'Temukan visi, misi, dan komitmen etis PT Las Olas Indonesia dalam menghubungkan talenta hospitality elit Indonesia dengan karier kapal pesiar internasional dan perjalanan mewah kelas dunia.',
            ],
            'seo_keywords' => [
                'en' => 'about las olas company profile, indonesian official licensed certified p3mi manning agency, elite marine maritime cruise ship offshore corporate recruiter partner, international global luxury hotel hospitality placement service consultant experts',
                'id' => 'seluk beluk usul asal usul tentang profil biodata resume legal hukum riwayat kami data perusahaan, pt las olas terkemuka biro p3mi pjtki bersertifikat lisensi resmi negara agen penyalur msc agen tki tkw formal naker, penyedia perekrut eksklusif terakreditasi pengawakan tenaga kapal pesiar karibia amerika eropa mewah eksotis karir perhotelan kelasi awak pelaut abk',
            ],
            'seo_og_image' => $this->parentPath('seo/main-logo-loi.webp'),

        ]);
    }
}
