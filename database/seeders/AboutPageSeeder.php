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
                'en' => 'A Message from Our Director',
                'id' => 'Pesan dari Direktur Kami',
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
                'en' => '<p>We are an Indonesian Migrant Worker Placement Agency (P3MI) specializing in the deployment of Indonesian Migrant Workers (PMI) to the global cruise line and land-based hospitality industries. Licensed by the Ministry of Manpower and the Ministry of Marine Affairs of the Republic of Indonesia, we ensure that every recruitment process is conducted in accordance with Quality Management System (QMS) ISO 9001:2015 standards and full compliance with MLC 2006 regulations.</p>
                <p>We are committed to carrying out recruitment processes based on transparency and accountability, ensuring that every PMI placed receives employment opportunities aligned with their expertise at reasonable and fair deployment costs. Supported by a management team with extensive managerial experience in the cruise and hospitality industries, we understand the specific requirements of our principals and are fully prepared to provide competent and industry-ready professionals.</p>
                <p>Through a selective recruitment system and a strong focus on service quality, we are dedicated to supporting Indonesian migrant workers in achieving global career success while contributing to the growth and success of our principals’ businesses.</p>',
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
                        'title'   => 'Vision',
                        'content' => '<p>To become a leading Indonesian migrant worker placement agency, bridging the gap between skilled professionals and global career opportunities in the tourism industry.</p>',
                    ],
                    [
                        'title'   => 'Mission',
                        'content' => '<ol>
                        <li>To conduct recruitment and workforce placement processes with the highest level of professionalism and transparency.</li>
                        <li>To establish mutually beneficial partnerships between workers, industry partners, and other stakeholders.</li>
                        <li>To manage the organization with strong governance and innovative service excellence.</li>
                        </ol>',
                    ],
                    [
                        'title'   => 'Commitment',
                        'content' => '<p>Dedicated to integrity, personalized service, and promoting fair employment practices in Indonesia.</p>',
                    ],
                ],
                'id' => [
                    [
                        'title'   => 'Visi',
                        'content' => '<p>Menjadi agen penempatan pekerja migran Indonesia yang terdepan dan menjembatani kesenjangan antara pekerja dengan peluang kerja di industri pariwisata dunia.</p>',
                    ],
                    [
                        'title'   => 'Misi',
                        'content' => '<ol><li>Melakukan proses rekrutmen dan penempatan tenaga kerja dengan penuh profesionalisme dengan proses yang transparan.</li><li>Menyelenggarakan kerja sama yang saling menguntungkan antara pekerja, industri, dan pihak lainnya.</li><li>Mengelola kelembagaan dengan tata kelola yang baik dan pelayanan yang inovatif.</li></ol>',
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
            'certified_image' => $this->parentPath('certified/tuv-rheinland-building.webp'),

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
