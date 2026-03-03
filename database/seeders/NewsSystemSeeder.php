<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;

class NewsSystemSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'example/' . $filename;
    }

    public function run(): void
    {
        // ─── Sample News Posts from dataNews.ts ────────────────────────────────
        NewsPost::truncate();

        // 1. Grand Opening Campus Dream Bali
        NewsPost::create([
            'title' => [
                'en' => 'Grand Opening Campus Dream Bali by PT Las Olas',
                'id' => 'Grand Opening Gedung Baru Campus of Dream Cabang Bali',
            ],
            'slug' => [
                'en' => 'grand-opening-campus-dream-bali',
                'id' => 'grand-opening-gedung-baru-campus-dream-bali',
            ],
            'published_at' => now()->subDays(24),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>Campus of Dream proudly announces the official opening of our newest branch campus in Denpasar, Bali. This facility is equipped with a 5-star hotel room replica, cruise ship standard kitchen, and a modern language laboratory.</p><p>The inauguration event was attended by local tourism officials and representatives from various cruise line agencies. "This is a major step for us to bring quality education closer to young talents in Eastern Indonesia," said the Director of Campus of Dream in his remarks.</p><h3>Featured Facilities</h3><ul><li>Mock-up Suite Room</li><li>Bar & Restaurant Training Center</li><li>Computer Lab for CBT Marlin Test</li></ul>',
                'id' => '<p>Campus of Dream dengan bangga mengumumkan pembukaan resmi kampus cabang terbaru kami di Denpasar, Bali. Fasilitas ini dilengkapi dengan replika kamar hotel bintang 5, dapur standar kapal pesiar, dan laboratorium bahasa modern.</p><p>Acara peresmian dihadiri oleh pejabat Dinas Pariwisata setempat serta perwakilan dari berbagai agen kapal pesiar. "Ini adalah langkah besar kami untuk mendekatkan akses pendidikan berkualitas kepada talenta-talenta muda di Indonesia Timur," ujar Direktur Campus of Dream dalam sambutannya.</p><h3>Fasilitas Unggulan</h3><ul><li>Mock-up Suite Room</li><li>Bar & Restaurant Training Center</li><li>Computer Lab for CBT Marlin Test</li></ul>',
            ],
            'meta_title' => [
                'en' => 'Grand Opening Campus Dream Bali | Las Olas Indonesia',
                'id' => 'Grand Opening Gedung Baru Campus Dream Bali | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Peresmian fasilitas pelatihan standar internasional terbaru di jantung pariwisata Indonesia.',
                'id' => 'Peresmian fasilitas pelatihan standar internasional terbaru di jantung pariwisata Indonesia.',
            ],
        ]);

        // 2. MoU Holland America Line
        NewsPost::create([
            'title' => [
                'en' => 'Exclusive MoU with Holland America Line',
                'id' => 'Penandatanganan MoU Eksklusif dengan Holland America Line',
            ],
            'slug' => [
                'en' => 'mou-holland-america-line',
                'id' => 'kerjasama-mou-holland-america-line',
            ],
            'published_at' => now()->subDays(20),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>Campus of Dream continues to expand its network of partnerships. This time, we officially signed a Memorandum of Understanding (MoU) with Holland America Line, one of the oldest and most prestigious cruise companies in the world.</p><p>This partnership includes priority recruitment for our best graduates, as well as regular visits by Holland America recruitment team to campus for direct interviews. This is a golden opportunity for students to pursue careers on premium cruise lines.</p><p>"We seek high quality standards, and we see that potential in Campus of Dream\'s curriculum," said a representative from Holland America Line HR.</p>',
                'id' => '<p>Campus of Dream kembali memperluas jaringan kerjasamanya. Kali ini, kami resmi menandatangani Memorandum of Understanding (MoU) dengan Holland America Line, salah satu perusahaan kapal pesiar tertua dan paling prestisius di dunia.</p><p>Kerjasama ini mencakup prioritas rekrutmen bagi lulusan terbaik kami, serta kunjungan rutin tim rekrutmen Holland America ke kampus untuk melakukan direct interview. Ini adalah kesempatan emas bagi siswa untuk berkarir di jalur premium cruise line.</p><p>"Kami mencari standar kualitas yang tinggi, dan kami melihat potensi itu di kurikulum Campus of Dream," kata perwakilan HR Holland America Line.</p>',
            ],
            'meta_title' => [
                'en' => 'Holland America Line Partnership | Las Olas Indonesia',
                'id' => 'Kerjasama Holland America Line | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Peluang karir semakin terbuka lebar bagi lulusan Campus of Dream dengan adanya kerjasama strategis ini.',
                'id' => 'Peluang karir semakin terbuka lebar bagi lulusan Campus of Dream dengan adanya kerjasama strategis ini.',
            ],
        ]);

        // 3. International Career Seminar
        NewsPost::create([
            'title' => [
                'en' => 'International Career Seminar Success: Your Gateway to the World',
                'id' => 'Sukses Gelar Seminar Karir Internasional: Your Gateway to the World',
            ],
            'slug' => [
                'en' => 'international-career-seminar-2026',
                'id' => 'seminar-karir-internasional-2026',
            ],
            'published_at' => now()->subDays(15),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>The main hall of Campus of Dream was filled with youthful enthusiasm. Our annual International Career Seminar returned with speakers from practitioners who have traveled across 5 continents.</p><p>Participants gained insights into global work mindset, tips for passing foreign interviews, and physical fitness test simulations. The Q&A session was highly interactive, showing the high interest of young people to work abroad.</p><p>Thank you to all sponsors and participants who have made this event successful. See you at next year\'s seminar!</p>',
                'id' => '<p>Aula utama Campus of Dream dipenuhi oleh semangat muda. Seminar Karir Internasional tahunan kami kembali digelar dengan menghadirkan narasumber praktisi yang telah melalang buana di 5 benua.</p><p>Peserta mendapatkan wawasan tentang mentalitas kerja global, tips lulus wawancara user asing, dan simulasi tes fisik. Sesi tanya jawab berlangsung sangat interaktif, menunjukkan tingginya minat generasi muda untuk bekerja di luar negeri.</p><p>Terima kasih kepada seluruh sponsor dan peserta yang telah mensukseskan acara ini. Sampai jumpa di seminar tahun depan!</p>',
            ],
            'meta_title' => [
                'en' => 'Career Seminar 2026 | Las Olas Indonesia',
                'id' => 'Seminar Karir 2026 | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Ratusan peserta antusias mengikuti seminar pembekalan karir perhotelan dan kapal pesiar.',
                'id' => 'Ratusan peserta antusias mengikuti seminar pembekalan karir perhotelan dan kapal pesiar.',
            ],
        ]);

        // 4. Achievement Scholarship Program
        NewsPost::create([
            'title' => [
                'en' => 'Achievement Scholarship Program 2026/2027 Registration Open',
                'id' => 'Pendaftaran Beasiswa Prestasi Tahun Ajaran 2026/2027 Telah Dibuka',
            ],
            'slug' => [
                'en' => 'scholarship-program-2026',
                'id' => 'program-beasiswa-prestasi-2026',
            ],
            'published_at' => now()->subDays(10),
                'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>Good news for prospective students! Campus of Dream is opening the Achievement Scholarship Program again. This program provides full tuition waiver for 10 selected students with high academic grades and good English proficiency.</p><p>Registration requirements include minimum average report card of 8.5, recommendation letter from previous school, and passing the interview test. Registration closes at the end of April.</p><p>Don\'t miss this golden opportunity to change your future without being burdened by costs.</p>',
                'id' => '<p>Kabar gembira bagi calon siswa! Campus of Dream kembali membuka program Beasiswa Prestasi. Program ini memberikan pembebasan biaya pendidikan penuh bagi 10 siswa terpilih yang memiliki nilai akademik tinggi dan kemampuan bahasa Inggris yang baik.</p><p>Syarat pendaftaran meliputi nilai rata-rata rapor minimal 8.5, surat rekomendasi sekolah asal, dan lolos tes wawancara. Pendaftaran ditutup akhir bulan April.</p><p>Jangan lewatkan kesempatan mulia ini untuk mengubah masa depan Anda tanpa terbebani biaya.</p>',
            ],
            'meta_title' => [
                'en' => 'Achievement Scholarship 2026 | Las Olas Indonesia',
                'id' => 'Beasiswa Prestasi 2026 | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Kesempatan mendapatkan pendidikan vokasi gratis 100% bagi siswa berprestasi.',
                'id' => 'Kesempatan mendapatkan pendidikan vokasi gratis 100% bagi siswa berprestasi.',
            ],
        ]);

        // 5. Industrial Visit Ritz-Carlton
        NewsPost::create([
            'title' => [
                'en' => 'Hospitality Students Industrial Visit to The Ritz-Carlton Jakarta',
                'id' => 'Siswa Perhotelan Kunjungan Industri ke The Ritz-Carlton Jakarta',
            ],
            'slug' => [
                'en' => 'industrial-visit-ritz-carlton',
                'id' => 'kunjungan-industri-hotel-bintang-lima',
            ],
            'published_at' => now()->subDays(5),
                'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>50 hospitality students from Campus of Dream conducted an industrial visit to one of the most luxurious hotels in Jakarta, The Ritz-Carlton. This activity aims to show students the real operations of a 5-star hotel.</p><p>They were taken to see the Front Office, Housekeeping, and Kitchen areas which were very busy yet well-organized. The General Manager also took time to give a brief motivation about the importance of "Service from the Heart".</p><p>Visual experiences like this are very important in shaping a professional mindset from an early stage.</p>',
                'id' => '<p>Sebanyak 50 siswa jurusan Perhotelan Campus of Dream melakukan kunjungan industri (Hotel Tour) ke salah satu hotel termewah di Jakarta, The Ritz-Carlton. Kegiatan ini bertujuan memperlihatkan operasional nyata hotel bintang 5 kepada para siswa.</p><p>Mereka diajak berkeliling melihat area Front Office, Housekeeping, hingga Kitchen yang sangat sibuk namun terorganisir. General Manager hotel juga menyempatkan diri memberikan motivasi singkat tentang pentingnya "Service from the Heart".</p><p>Pengalaman visual seperti ini sangat penting untuk membentuk mindset profesional sejak dini.</p>',
            ],
            'meta_title' => [
                'en' => 'Ritz-Carlton Visit | Las Olas Indonesia',
                'id' => 'Kunjungan The Ritz-Carlton | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Belajar langsung standar pelayanan luxury dari ahlinya di lapangan.',
                'id' => 'Belajar langsung standar pelayanan luxury dari ahlinya di lapangan.',
            ],
        ]);

        // 6. Intensive German Course
        NewsPost::create([
            'title' => [
                'en' => 'New Program: Intensive German Course for Ausbildung Preparation',
                'id' => 'Program Baru: Kelas Intensif Bahasa Jerman untuk Persiapan Ausbildung',
            ],
            'slug' => [
                'en' => 'intensive-german-course',
                'id' => 'pelatihan-bahasa-jerman-intensif',
            ],
            'published_at' => now()->subDays(0),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>Seeing the increasing trend of demand for Indonesian workers in Germany, Campus of Dream launches the Intensive German Course program. This program targets achieving B1 level within 6 months.</p><p>We bring in native speaker teachers and use the standard Goethe-Institut curriculum. Graduates of this program will be projected to fill various Ausbildung (apprenticeship) positions in the hospitality and gastronomy sectors in Germany.</p><p>First wave registration is already open with limited quota of 15 people per class.</p>',
                'id' => '<p>Melihat tren peningkatan permintaan tenaga kerja Indonesia di Jerman, Campus of Dream meluncurkan program Intensive German Course. Program ini menargetkan pencapaian level B1 dalam waktu 6 bulan.</p><p>Kami mendatangkan pengajar native speaker dan menggunakan kurikulum standar Goethe-Institut. Lulusan program ini akan diproyeksikan untuk mengisi berbagai lowongan Ausbildung (magang) di sektor perhotelan dan gastronomi di Jerman.</p><p>Pendaftaran gelombang pertama sudah dibuka dengan kuota terbatas 15 orang per kelas.</p>',
            ],
            'meta_title' => [
                'en' => 'German Course | Las Olas Indonesia',
                'id' => 'Kelas Bahasa Jerman | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Merespon tingginya minat bekerja di Eropa, kami membuka kelas khusus Jerman.',
                'id' => 'Merespon tingginya minat bekerja di Eropa, kami membuka kelas khusus Jerman.',
            ],
        ]);

        // 7. Barista Curriculum Update
        NewsPost::create([
            'title' => [
                'en' => 'Update: Barista & Latte Art Module Now More Comprehensive',
                'id' => 'Update Kurikulum: Modul Barista & Latte Art Kini Lebih Lengkap',
            ],
            'slug' => [
                'en' => 'barista-curriculum-update',
                'id' => 'update-kurikulum-barista',
            ],
            'published_at' => now()->subDays(27),
             'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>The coffee world continues to evolve. Campus of Dream is updating the F&B Service training syllabus with the addition of advanced Barista modules. Students now not only learn basic espresso making, but also Latte Art techniques, Manual Brew, and knowledge about Indonesian coffee beans.</p><p>The practice laboratory coffee machine facilities have also been upgraded using competition-standard machines. This will equip graduates with highly relevant skills for working in modern coffee shops and cruise ships.</p><p>Let\'s brew a fragrant future together with us!</p>',
                'id' => '<p>Dunia kopi terus berkembang. Campus of Dream memperbarui silabus pelatihan F&B Service dengan penambahan modul Barista tingkat lanjut. Siswa kini tidak hanya belajar membuat espresso dasar, tapi juga teknik Latte Art, Manual Brew, dan pengetahuan tentang biji kopi nusantara.</p><p>Fasilitas mesin kopi di laboratorium praktik juga telah di-upgrade menggunakan mesin standar kompetisi. Ini akan membekali lulusan dengan skill yang sangat relevan untuk bekerja di coffee shop modern maupun kapal pesiar.</p><p>Mari menyeduh masa depan yang harum bersama kami!</p>',
            ],
            'meta_title' => [
                'en' => 'Barista Curriculum Update | Las Olas Indonesia',
                'id' => 'Update Kurikulum Barista | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Kami terus berinovasi mengikuti tren industri kopi kekinian.',
                'id' => 'Kami terus berinovasi mengikuti tren industri kopi kekinian.',
            ],
        ]);

        // 8. Social Donation Activity
        NewsPost::create([
            'title' => [
                'en' => 'Campus of Dream Shares: Social Service to Kasih Bunda Orphanage',
                'id' => 'Campus of Dream Berbagi: Bakti Sosial ke Panti Asuhan Kasih Bunda',
            ],
            'slug' => [
                'en' => 'social-donation-activity',
                'id' => 'donasi-sosial-panti-asuhan',
            ],
            'published_at' => now()->subDays(2),
                   'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>In the midst of academic busyness, the Campus of Dream community made time to share joy. Through the annual Social Service activity, we distributed groceries, decent clothes, and educational funds to Kasih Bunda Orphanage.</p><p>Students also entertained the children with games and stories. "Hospitality skills are not only for hotel guests, but also for serving fellow humans in need," said a student representative.</p><p>May this activity bring blessings to us all.</p>',
                'id' => '<p>Di tengah kesibukan akademik, keluarga besar Campus of Dream menyempatkan diri untuk berbagi kebahagiaan. Melalui kegiatan Bakti Sosial tahunan, kami menyalurkan bantuan sembako, pakaian layak pakai, dan dana pendidikan ke Panti Asuhan Kasih Bunda.</p><p>Siswa-siswi juga menghibur adik-adik panti dengan permainan dan dongeng. "Skill hospitality tidak hanya untuk tamu hotel, tapi juga untuk melayani sesama manusia yang membutuhkan," pesan perwakilan siswa.</p><p>Semoga kegiatan ini membawa berkah bagi kita semua.</p>',
            ],
            'meta_title' => [
                'en' => 'Social Service | Las Olas Indonesia',
                'id' => 'Bakti Sosial | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Membentuk karakter peduli sesama di kalangan civitas akademika.',
                'id' => 'Membentuk karakter peduli sesama di kalangan civitas akademika.',
            ],
        ]);

        // 9. Job Vacancy Hospitality Instructor
        NewsPost::create([
            'title' => [
                'en' => 'Career Opportunity: Join Us as Hospitality Instructor',
                'id' => 'Lowongan Karir: Bergabunglah Sebagai Instruktur Perhotelan',
            ],
            'slug' => [
                'en' => 'job-hospitality-instructor',
                'id' => 'lowongan-instruktur-perhotelan',
            ],
            'published_at' => now()->subDays(22),
             'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
            'content' => [
                'en' => '<p>Are you a hotel practitioner or former cruise ship crew with at least 5 years of experience? Have a passion for teaching? Campus of Dream is opening an opportunity for you to join as a Permanent or Part-time Instructor.</p><p>Positions needed:</p><ul><li>Housekeeping Instructor</li><li>F&B Service Instructor</li><li>Culinary Instructor</li></ul><p>Send your CV and portfolio to our official email. Be part of producing superior tourism human resources in Indonesia.</p>',
                'id' => '<p>Apakah Anda praktisi hotel atau mantan crew kapal pesiar dengan pengalaman minimal 5 tahun? Memiliki passion mengajar? Campus of Dream membuka kesempatan bagi Anda untuk bergabung sebagai Instruktur Tetap maupun paruh waktu.</p><p>Posisi yang dibutuhkan:</p><ul><li>Housekeeping Instructor</li><li>F&B Service Instructor</li><li>Culinary Instructor</li></ul><p>Kirimi CV dan portofolio Anda ke email resmi kami. Jadilah bagian dari pencetak SDM pariwisata unggul Indonesia.</p>',
            ],
            'meta_title' => [
                'en' => 'Job Vacancy | Las Olas Indonesia',
                'id' => 'Lowongan Kerja | Las Olas Indonesia',
            ],
            'meta_description' => [
                'en' => 'Kami mencari praktisi berpengalaman untuk membagikan ilmunya kepada generasi penerus.',
                'id' => 'Kami mencari praktisi berpengalaman untuk membagikan ilmunya kepada generasi penerus.',
            ],
        ]);
    }
}
