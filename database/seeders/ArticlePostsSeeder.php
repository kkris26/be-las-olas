<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlePostsSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'example/' . $filename;
    }

    private function parseIndonesianDate($dateString)
    {
        $months = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December',
        ];
        
        $englishDate = strtr($dateString, $months);
        return Carbon::createFromFormat('d F Y', $englishDate);
    }

    public function run(): void
    {
        $articlePosts = [
            [
                'title' => json_encode([
                    'id' => 'Panduan Lengkap Karir Kapal Pesiar 2026: Gaji, Syarat, dan Cara Melamar',
                    'en' => 'Complete Guide to Cruise Ship Career 2026: Salary, Requirements, and How to Apply',
                ]),
                'slug' => json_encode([
                    'id' => 'panduan-lengkap-karir-kapal-pesiar-2026',
                    'en' => 'complete-guide-to-cruise-ship-career-2026',
                ]),
                'content' => json_encode([
                    'id' => '<p>Bekerja di kapal pesiar masih menjadi impian banyak orang di Indonesia. Selain kesempatan untuk <strong>keliling dunia secara gratis</strong>, penghasilan dalam mata uang Dollar atau Euro menjadi daya tarik utama. Namun, persaingan di tahun 2026 semakin ketat. Berikut adalah panduan lengkap yang perlu Anda ketahui.</p><h3>Berapa Gaji Standar Kru Kapal Pesiar?</h3><p>Gaji bervariasi tergantung posisi dan perusahaan (cruise line). Untuk posisi <em>entry-level</em> seperti:</p><ul><li><strong>Galley Steward (Kitchen):</strong> $800 - $1,200 per bulan.</li><li><strong>Housekeeping Cleaner:</strong> $900 - $1,500 (termasuk tips).</li><li><strong>Assistant Waiter:</strong> $1,500 - $2,500 (tergantung gratuity).</li></ul><h3>Persyaratan Umum</h3><p>Sebelum melamar, pastikan Anda memenuhi kriteria berikut:</p><ol><li>Usia minimal 21 tahun (beberapa perusahaan menerima 19 tahun).</li><li>Pengalaman kerja minimal 6 bulan di hotel bintang 4/5 atau restoran internasional.</li><li>Kemampuan Bahasa Inggris aktif (Lisan & Tulisan).</li><li>Sehat jasmani dan rohani (Lulus Medical Check-up).</li><li>Memiliki dokumen lengkap: Paspor, BST (Basic Safety Training), dan Seaman Book.</li></ol><p>Jangan ragu untuk menghubungi <strong>Las Olas Indonesia</strong> untuk konsultasi gratis mengenai penempatan kerja yang sesuai dengan keahlian Anda.</p>',
                    'en' => '<p>Working on a cruise ship is still a dream for many people in Indonesia. Besides the opportunity to <strong>travel the world for free</strong>, earning in dollars or euros is the main attraction. However, competition in 2026 is getting tougher. Here is a complete guide you need to know.</p><h3>What is the Standard Salary for Cruise Ship Crew?</h3><p>Salary varies depending on position and company (cruise line). For <em>entry-level</em> positions such as:</p><ul><li><strong>Galley Steward (Kitchen):</strong> $800 - $1,200 per month.</li><li><strong>Housekeeping Cleaner:</strong> $900 - $1,500 (including tips).</li><li><strong>Assistant Waiter:</strong> $1,500 - $2,500 (depending on gratuity).</li></ul><h3>General Requirements</h3><p>Before applying, make sure you meet the following criteria:</p><ol><li>Minimum age of 21 years (some companies accept 19 years).</li><li>Minimum 6 months work experience in 4/5-star hotel or international restaurant.</li><li>Active English language skills (Speaking & Writing).</li><li>Physically and mentally healthy (Pass Medical Check-up).</li><li>Have complete documents: Passport, BST (Basic Safety Training), and Seaman Book.</li></ol><p>Don\'t hesitate to contact <strong>Las Olas Indonesia</strong> for free consultation regarding job placement that suits your skills.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('20 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Panduan Lengkap Karir Kapal Pesiar 2026: Gaji, Syarat, dan Cara Melamar',
                    'en' => 'Complete Guide to Cruise Ship Career 2026: Salary, Requirements, and How to Apply',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Ingin bekerja sambil keliling dunia? Simak panduan lengkap memulai karir di kapal pesiar tahun 2026, mulai dari estimasi gaji hingga persyaratan dokumen.',
                    'en' => 'Want to work while traveling the world? Check out the complete guide to starting a cruise ship career in 2026.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => '5 Posisi Paling Dicari di Kapal Pesiar Mewah Eropa Tahun Ini',
                    'en' => '5 Most Sought Positions on Luxurious European Cruise Ships This Year',
                ]),
                'slug' => json_encode([
                    'id' => '5-posisi-paling-dicari-kapal-pesiar-eropa',
                    'en' => '5-most-sought-positions-on-luxurious-european-cruise-ships',
                ]),
                'content' => json_encode([
                    'id' => '<p>Industri pelayaran Eropa seperti MSC, Costa, dan AIDA sedang membuka banyak lowongan untuk kru dari Asia, khususnya Indonesia yang dikenal dengan keramahannya. Berikut 5 posisi yang paling <em>urgent</em>:</p><h3>1. Assistant Cook / Commis Chef</h3><p>Skill memasak masakan internasional sangat dibutuhkan. Jika Anda memiliki pengalaman di bagian <em>Cold Kitchen</em> atau <em>Hot Kitchen</em>, peluang untuk diterima sangat besar.</p><h3>2. Bar Waiter / Bar Server</h3><p>Peran ini membutuhkan pengetahuan tentang minuman (cocktail, wine) yang baik serta kemampuan <em>upselling</em>. Komunikasi adalah kunci di posisi ini.</p><h3>3. Cabin Steward</h3><p>Bertanggung jawab atas kebersihan kamar tamu. Posisi ini kerja keras namun sangat menguntungkan dari sisi <em>tipping</em>.</p><h3>4. Laundry Attendant</h3><p>Posisi di balik layar yang vital. Cocok bagi Anda yang pekerja keras namun kurang percaya diri dengan Bahasa Inggris tingkat <em>advance</em> (tetap butuh basic).</p><h3>5. Photographer</h3><p>Jika Anda memiliki hobi fotografi dan portofolio yang bagus, kapal pesiar adalah tempat terbaik untuk berkarya sambil melayani tamu.</p>',
                    'en' => '<p>European shipping industry such as MSC, Costa, and AIDA are opening many vacancies for crew from Asia, especially Indonesia known for its friendliness. Here are 5 most urgent positions:</p><h3>1. Assistant Cook / Commis Chef</h3><p>International cooking skills are highly needed. If you have experience in <em>Cold Kitchen</em> or <em>Hot Kitchen</em>, your chances of being accepted are very high.</p><h3>2. Bar Waiter / Bar Server</h3><p>This role requires good knowledge of beverages (cocktails, wine) and <em>upselling</em> abilities. Communication is key in this position.</p><h3>3. Cabin Steward</h3><p>Responsible for guest room cleanliness. This position is hard work but very profitable in terms of tipping.</p><h3>4. Laundry Attendant</h3><p>A vital behind-the-scenes position. Suitable for those who work hard but lack confidence with advanced English level (still need basic).</p><h3>5. Photographer</h3><p>If you have a passion for photography and a good portfolio, cruise ships are the best place to work while serving guests.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('18 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => '5 Posisi Paling Dicari di Kapal Pesiar Mewah Eropa Tahun Ini',
                    'en' => '5 Most Sought Positions on Luxurious European Cruise Ships This Year',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Perusahaan kapal pesiar Eropa sedang gencar merekrut tenaga kerja Indonesia. Inilah 5 posisi dengan kuota terbanyak dan peluang diterima tertinggi.',
                    'en' => 'European cruise companies are actively recruiting Indonesian workers. Here are 5 positions with the highest quotas and acceptance chances.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Kisah Sukses: Budi Santoso, Dari Desa ke Kapal Pesiar Royal Caribbean',
                    'en' => 'Success Story: Budi Santoso, From Village to Royal Caribbean Cruise Ship',
                ]),
                'slug' => json_encode([
                    'id' => 'kisah-sukses-alumni-las-olas-bali-karibia',
                    'en' => 'success-story-budi-santoso-royal-caribbean',
                ]),
                'content' => json_encode([
                    'id' => '<p><em>"Jangan takut bermimpi, tapi takutlah jika Anda tidak pernah mencoba mewujudkannya."</em> Itulah moto hidup Budi Santoso (24), pemuda asal Bali yang kini sukses berkarir sebagai <strong>Chef de Partie</strong> di salah satu armada Royal Caribbean.</p><h3>Awal Perjuangan</h3><p>Budi bukanlah berasal dari keluarga berada. Setelah lulus SMK pariwisata, ia sempat bekerja serabutan. Titik balik kehidupannya dimulai saat ia mengikuti program pelatihan intensif di <strong>Kampus Las Olas Indonesia</strong>.</p><p>"Di Las Olas, saya tidak hanya diajari masak, tapi juga mental. Mental baja itu yang paling penting di kapal," ujar Budi mengenang masa pelatihannya.</p><h3>Tantangan di Laut Lepas</h3><p>Bekerja jauh dari keluarga selama 8 bulan kontrak pertama bukanlah hal mudah. <em>Homesick</em>, mabuk laut, dan tekanan pekerjaan sempat membuatnya ingin menyerah. Namun, dukungan mentor dan teman-teman sesama kru membuatnya bertahan.</p><p>Kini, Budi telah berhasil merenovasi rumah orang tuanya dan menabung untuk modal usaha di hari tua nanti. Kisah Budi membuktikan bahwa dengan tekad yang kuat, kesuksesan bisa diraih oleh siapa saja.</p>',
                    'en' => '<p><em>"Don\'t be afraid to dream, but be afraid if you never try to make it happen."</em> That\'s the life motto of Budi Santoso (24), a young man from Bali who is now successfully pursuing a career as a <strong>Chef de Partie</strong> at one of Royal Caribbean\'s fleets.</p><h3>Beginning of the Struggle</h3><p>Budi did not come from a wealthy family. After graduating from tourism vocational school, he worked various jobs. The turning point in his life came when he participated in an intensive training program at <strong>Las Olas Indonesia Campus</strong>.</p><p>"At Las Olas, I was not only taught to cook, but also mentality. Steel mentality is the most important thing on a ship," said Budi reminiscing about his training days.</p><h3>Challenges on the Open Sea</h3><p>Working far from family during his first 8-month contract was not easy. Homesickness, seasickness, and work pressure made him want to give up. However, the support of mentors and fellow crew members kept him going.</p><p>Now, Budi has successfully renovated his parents\' house and saved for business capital for his retirement. Budi\'s story proves that with strong determination, success can be achieved by anyone.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('15 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Kisah Sukses: Budi Santoso, Dari Desa ke Kapal Pesiar Royal Caribbean',
                    'en' => 'Success Story: Budi Santoso, From Village to Royal Caribbean Cruise Ship',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Baca perjalanan inspiratif Budi, alumni Las Olas Indonesia yang berhasil mengubah nasib keluarganya dengan bekerja di kapal pesiar terbesar di dunia.',
                    'en' => 'Read Budi\'s inspiring journey, a Las Olas Indonesia alumnus who successfully changed his family\'s fortune by working on the world\'s largest cruise ship.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Rahasia Lolos Interview User Kapal Pesiar dalam Sekali Coba',
                    'en' => 'Secret to Passing Cruise Ship User Interview in One Try',
                ]),
                'slug' => json_encode([
                    'id' => 'rahasia-lolos-interview-user-kapal-pesiar',
                    'en' => 'secret-to-passing-cruise-ship-user-interview-in-one-try',
                ]),
                'content' => json_encode([
                    'id' => '<p>Tahap <em>User Interview</em> seringkali menjadi gerbang terakhir yang menggugurkan banyak kandidat potensial. Padahal secara skill teknis mereka mumpuni. Apa rahasianya agar lolos?</p><h3>1. Kuasai \'Marlin Test\'</h3><p>Tes Bahasa Inggris standar maritim ini sering jadi acuan. Pastikan vocabulary Anda seputar istilah kapal (galley, bridge, starboard, portside) sudah di luar kepala.</p><h3>2. Teknik Menjawab dengan Metode S.T.A.R</h3><p>Saat ditanya pengalaman, jangan jawab pendek. Gunakan struktur:</p><ul><li><strong>S (Situation):</strong> Jelaskan situasi yang dihadapi.</li><li><strong>T (Task):</strong> Apa tugas Anda saatitu.</li><li><strong>A (Action):</strong> Apa yang ANDA lakukan (bukan \'kami\').</li><li><strong>R (Result):</strong> Apa hasil positifnya.</li></ul><h3>3. Grooming & Attitude</h3><p>Penampilan rapi (rambut pendek, wajah bersih) menunjukkan profesionalisme. Senyum adalah senjata utama. User Amerika menyukai kandidat yang energik dan <em>outgoing</em>.</p>',
                    'en' => '<p>The <em>User Interview</em> stage is often the last gate that eliminates many potential candidates. Yet technically they are competent. What\'s the secret to passing?</p><h3>1. Master the \'Marlin Test\'</h3><p>This standard maritime English test is often a reference. Make sure your vocabulary around ship terms (galley, bridge, starboard, portside) is second nature.</p><h3>2. Answer Technique with S.T.A.R Method</h3><p>When asked about experience, don\'t answer short. Use this structure:</p><ul><li><strong>S (Situation):</strong> Explain the situation faced.</li><li><strong>T (Task):</strong> What was your task at that time.</li><li><strong>A (Action):</strong> What YOU did (not \'we\').</li><li><strong>R (Result):</strong> What positive result.</li></ul><h3>3. Grooming & Attitude</h3><p>Neat appearance (short hair, clean face) shows professionalism. A smile is your main weapon. American users like candidates who are energetic and outgoing.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('10 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Rahasia Lolos Interview User Kapal Pesiar dalam Sekali Coba',
                    'en' => 'Secret to Passing Cruise Ship User Interview in One Try',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Gagal interview berkali-kali? Mungkin ada yang salah dengan teknik Anda. Pelajari strategi \'STARS\' dan body language yang disukai user asing.',
                    'en' => 'Failed interviews repeatedly? Maybe there\'s something wrong with your technique. Learn \'STARS\' strategy and body language foreign users like.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Hidup di Kapal Pesiar: Mitos vs Fakta yang Wajib Diketahui',
                    'en' => 'Living on a Cruise Ship: Myths vs Facts You Must Know',
                ]),
                'slug' => json_encode([
                    'id' => 'hidup-di-kapal-pesiar-mitos-fakta',
                    'en' => 'living-on-a-cruise-ship-myths-vs-facts',
                ]),
                'content' => json_encode([
                    'id' => '<p>Media sosial sering menampilkan sisi glamor kehidupan kru kapal pesiar: jalan-jalan di Santorini, pesta di dek kapal. Tapi bagaimana realitanya?</p><h3>Mitos 1: Makan Enak Setiap Hari Seperti Tamu</h3><p><strong>Fakta:</strong> Kru memiliki kantin sendiri (Crew Mess). Makanannya bergizi dan bervariasi, tapi tidak semewah menu penumpang. Meski begitu, sesekali ada <em>special night</em> untuk kru.</p><h3>Mitos 2: Bisa Jalan-Jalan Terus</h3><p><strong>Fakta:</strong> Benar, TAPI hanya jika jam kerja Anda sedang <em>off</em>. Seringkali kapal sandar saat Anda sedang bertugas (on duty). Kru harus pintar membagi waktu istirahat dan rekreasi.</p><h3>Mitos 3: Tidur di Kabin Mewah</h3><p><strong>Fakta:</strong> Sebagian besar kru tinggal di kabin bunk bed (ranjang susun) berukuran kecil yang dihuni 2-4 orang. Privasi adalah barang mewah di kapal.</p><p>Meski terdengar berat, pengalaman persahabatan lintas negara dan tabungan yang cepat terkumpul membuat semua pengorbanan itu sepadan.</p>',
                    'en' => '<p>Social media often showcases the glamorous side of cruise ship crew life: sightseeing in Santorini, parties on the deck. But what\'s the reality?</p><h3>Myth 1: Great Food Every Day Like Guests</h3><p><strong>Fact:</strong> Crew have their own canteen (Crew Mess). The food is nutritious and varied, but not as luxurious as the guest menu. Still, there are occasional <em>special nights</em> for crew.</p><h3>Myth 2: Can Sightsee All the Time</h3><p><strong>Fact:</strong> True, BUT only if you\'re off duty. Often the ship docks while you\'re on duty. Crew must be smart about dividing rest and recreation time.</p><h3>Myth 3: Sleep in Luxury Cabins</h3><p><strong>Fact:</strong> Most crew live in small bunk bed cabins occupied by 2-4 people. Privacy is a luxury on a ship.</p><p>Despite sounding tough, the experience of international friendships and quick savings make all sacrifices worthwhile.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('05 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Hidup di Kapal Pesiar: Mitos vs Fakta yang Wajib Diketahui',
                    'en' => 'Living on a Cruise Ship: Myths vs Facts You Must Know',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Banyak anggapan keliru tentang kehidupan kru di kapal pesiar. Kami bongkar mitos makan tidur enak versus fakta kerja keras 12 jam sehari.',
                    'en' => 'Many misconceptions about crew life on cruise ships. We debunk the myth of luxurious dining/sleeping versus the fact of hard work.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Mengapa Sertifikat BST & CCM Wajib Dimiliki Calon Pelaut?',
                    'en' => 'Why BST & CCM Certificates Are Mandatory for Prospective Seafarers?',
                ]),
                'slug' => json_encode([
                    'id' => 'pentingnya-sertifikat-bst-ccm',
                    'en' => 'importance-of-bst-and-ccm-certificates',
                ]),
                'content' => json_encode([
                    'id' => '<p>Dalam dunia pelayaran internasional, keselamatan adalah prioritas nomor satu. Oleh karena itu, regulasi STCW (Standards of Training, Certification and Watchkeeping) mewajibkan setiap kru memiliki sertifikat dasar.</p><h3>Apa itu BST (Basic Safety Training)?</h3><p>Pelatihan dasar keselamatan yang mencakup:</p><ul><li>Teknik memadamkan api (Fire Fighting).</li><li>P3K dasar (First Aid).</li><li>Teknik bertahan hidup di laut (Personal Survival Technique).</li><li>Keselamatan diri dan tanggung jawab sosial.</li></ul><h3>Apa itu CCM (Crowd Crisis Management)?</h3><p>Pelatihan khusus bagi kru kapal penumpang (kapal pesiar/ferry). Anda dilatih untuk mengarahkan dan menenangkan ribuan penumpang dalam situasi darurat agar tidak terjadi kepanikan massal.</p><p>Las Olas Indonesia bekerja sama dengan lembaga diklat terpercaya untuk membantu siswa mendapatkan sertifikat ini dengan biaya terjangkau & resmi.</p>',
                    'en' => '<p>In the international maritime world, safety is the number one priority. Therefore, STCW (Standards of Training, Certification and Watchkeeping) regulations require every crew to have a basic certificate.</p><h3>What is BST (Basic Safety Training)?</h3><p>Basic safety training that includes:</p><ul><li>Fire Fighting techniques.</li><li>Basic First Aid.</li><li>Personal Survival Techniques at sea.</li><li>Personal Safety and Social Responsibility.</li></ul><h3>What is CCM (Crowd Crisis Management)?</h3><p>Special training for passenger ship crew (cruise ships/ferries). You are trained to direct and calm thousands of passengers in emergency situations to prevent mass panic.</p><p>Las Olas Indonesia works with trusted training institutions to help students obtain these certificates at affordable and official costs.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('01 Februari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Mengapa Sertifikat BST & CCM Wajib Dimiliki Calon Pelaut?',
                    'en' => 'Why BST & CCM Certificates Are Mandatory for Prospective Seafarers?',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Sebelum melamar, pahami dulu dokumen wajib Basic Safety Training (BST) dan Crowd Crisis Management (CCM). Tanpa ini, Anda tidak bisa berangkat.',
                    'en' => 'Before applying, understand the mandatory Basic Safety Training and Crowd Crisis Management documents. Without them, you cannot depart.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => '7 Destinasi Kapal Pesiar Terpopuler yang Akan Anda Kunjungi',
                    'en' => '7 Most Popular Cruise Ship Destinations You Will Visit',
                ]),
                'slug' => json_encode([
                    'id' => 'destinasi-kapal-pesiar-terpopuler-2026',
                    'en' => '7-most-popular-cruise-ship-destinations',
                ]),
                'content' => json_encode([
                    'id' => '<p>Salah satu <em>perk</em> terbaik menjadi kru kapal pesiar adalah paspor yang penuh dengan cap imigrasi dari berbagai negara. Berikut adalah destinasi impian yang paling sering disinggahi:</p><h3>1. Caribbean Islands</h3><p>Surga tropis dengan pantai pasir putih. Bahamas, Jamaica, Cozumel adalah rute "wajib" bagi pemula terutama kapal-kapal base Amerika.</p><h3>2. Mediterranean (Eropa Selatan)</h3><p>Barcelona (Spanyol), Roma (Italia), hingga Santorini (Yunani). Rute ini menawarkan wisata sejarah dan budaya yang kental.</p><h3>3. Alaska, USA</h3><p>Pemandangan gletser raksasa dan satwa liar. Rute ini biasanya hanya buka di musim panas (Mei - September). Udaranya sangat segar!</p><h3>4. Fjords, Norway</h3><p>Keindahan tebing-tebing curam dan air terjun alami yang menakjubkan. Salah satu rute paling fotogenik di dunia.</p><p>Siapkan kamera Anda, karena momen-momen ini tak ternilai harganya!</p>',
                    'en' => '<p>One of the best perks of being cruise ship crew is a passport full of immigration stamps from various countries. Here are the dream destinations most often visited:</p><h3>1. Caribbean Islands</h3><p>Tropical paradise with white sandy beaches. Bahamas, Jamaica, Cozumel are "must-visit" routes for beginners especially American-based ships.</p><h3>2. Mediterranean (Southern Europe)</h3><p>Barcelona (Spain), Rome (Italy), to Santorini (Greece). This route offers rich historical and cultural tourism.</p><h3>3. Alaska, USA</h3><p>Giant glacier scenery and wildlife. This route is usually only open in summer (May - September). The air is very fresh!</p><h3>4. Fjords, Norway</h3><p>The beauty of steep cliffs and amazing natural waterfalls. One of the most photogenic routes in the world.</p><p>Get your camera ready, because these moments are priceless!</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('28 Januari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => '7 Destinasi Kapal Pesiar Terpopuler yang Akan Anda Kunjungi',
                    'en' => '7 Most Popular Cruise Ship Destinations You Will Visit',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Bayangkan bekerja sambil mengunjungi Alaska, Mediterania, hingga Karibia. Inilah rute pelayaran paling favorit di tahun 2026.',
                    'en' => 'Imagine working while visiting Alaska, Mediterranean, to Caribbean. These are the most favorite cruise routes in 2026.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Wanita Berkarir di Kapal Pesiar: Apakah Aman dan Menjanjikan?',
                    'en' => 'Women Career on Cruise Ships: Is It Safe and Promising?',
                ]),
                'slug' => json_encode([
                    'id' => 'wanita-karir-di-kapal-pesiar',
                    'en' => 'women-career-on-cruise-ships-safe-and-promising',
                ]),
                'content' => json_encode([
                    'id' => '<p>Zaman telah berubah. Kini, persentase kru wanita di kapal pesiar terus meningkat. Banyak posisi strategis seperti <em>Guest Service Manager</em> hingga <em>Cruise Director</em> kini diisi oleh wanita tangguh.</p><h3>Keamanan & Aturan Ketat</h3><p>Setiap perusahaan kapal pesiar memiliki kebijakan <strong>Zero Tolerance</strong> terhadap pelecehan (Harassment). CCTV beroperasi 24 jam di lorong-lorong kru, dan sistem pelaporan sangat transparan. Keamanan wanita sangat dijaga.</p><h3>Peluang Karir</h3><p>Wanita seringkali unggul di departemen yang membutuhkan empati dan ketelitian tinggi seperti:</p><ul><li><strong>Guest Relations (Front Office)</strong></li><li><strong>Spa Therapist</strong></li><li><strong>Retail / Shop Assistant</strong></li><li><strong>Kids & Youth Staff</strong></li></ul><p>Jadi <em>Girls</em>, jangan takut untuk melangkah! Samudra luas menunggu kehebatan kalian.</p>',
                    'en' => '<p>Times have changed. Now, the percentage of female crew on cruise ships is constantly increasing. Many strategic positions like <em>Guest Service Manager</em> to <em>Cruise Director</em> are now held by strong women.</p><h3>Safety & Strict Rules</h3><p>Every cruise ship company has a <strong>Zero Tolerance</strong> policy against harassment. CCTV operates 24 hours in crew corridors, and the reporting system is very transparent. Women\'s safety is well protected.</p><h3>Career Opportunities</h3><p>Women often excel in departments requiring empathy and high attention to detail such as:</p><ul><li><strong>Guest Relations (Front Office)</strong></li><li><strong>Spa Therapist</strong></li><li><strong>Retail / Shop Assistant</strong></li><li><strong>Kids & Youth Staff</strong></li></ul><p>So <em>Girls</em>, don\'t be afraid to take a step! The vast ocean awaits your greatness.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('25 Januari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Wanita Berkarir di Kapal Pesiar: Apakah Aman dan Menjanjikan?',
                    'en' => 'Women Career on Cruise Ships: Is It Safe and Promising?',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Menepis stigma negatif tentang wanita pelaut. Simak bagaimana industri kapal pesiar menjamin keamanan dan kesetaraan karir bagi perempuan.',
                    'en' => 'Debunking the negative stigma about female seafarers. Read how the cruise industry ensures safety and career equality for women.',
                ]),
            ],
            [
                'title' => json_encode([
                    'id' => 'Tips Cerdas Mengelola Gaji Dolar Agar Cepat Kaya Sepulang Kontrak',
                    'en' => 'Smart Tips to Manage Dollar Salary to Get Rich After Contract Ends',
                ]),
                'slug' => json_encode([
                    'id' => 'tips-hemat-gaji-kru-kapal',
                    'en' => 'smart-tips-to-manage-dollar-salary-to-get-rich',
                ]),
                'content' => json_encode([
                    'id' => '<p>Banyak cerita sedih mantan pelaut yang kembali ke tanah air tanpa membawa tabungan karena gaya hidup hedon saat kapal sandar. Jangan sampai ini terjadi pada Anda.</p><h3>1. Kirim Uang Otomatis (Auto-Debit)</h3><p>Begitu gaji masuk (biasanya ditransfer ke kartu debit khusus kru seperti OceanPay), segera transfer 70-80% ke rekening bank di Indonesia. Sisakan hanya 20% untuk jajan di pelabuhan.</p><h3>2. Hindari Belanja Barang Brended Berlebihan</h3><p>Godaan Duty-Free di kapal dan outlet di Eropa memang besar. Boleh beli sesekali sebagai <em>reward</em>, tapi ingat tujuan utama Anda bekerja: Investasi masa depan.</p><h3>3. Investasi Emas atau Properti</h3><p>Uang tunai nilainya tergerus inflasi. Belilah aset yang nilainya naik seperti tanah, rumah, atau logam mulia. Lakukan ini sejak kontrak pertama!</p><p>Ingat, Anda tidak akan bekerja di kapal selamanya. Siapkan "sekoci" finansial Anda dari sekarang.</p>',
                    'en' => '<p>Many sad stories of former sailors returning home with no savings because of hedonistic lifestyle when the ship docked. Don\'t let this happen to you.</p><h3>1. Send Money Automatically (Auto-Debit)</h3><p>Once your salary comes in (usually transferred to a special crew debit card like OceanPay), immediately transfer 70-80% to a bank account in Indonesia. Save only 20% for spending at ports.</p><h3>2. Avoid Excessive Branded Shopping</h3><p>The temptation of Duty-Free on the ship and outlets in Europe is indeed great. You can buy occasionally as a <em>reward</em>, but remember your main goal for working: Future investment.</p><h3>3. Invest in Gold or Property</h3><p>Cash value is eroded by inflation. Buy assets that appreciate in value like land, houses, or precious metals. Start doing this from your first contract!</p><p>Remember, you won\'t work on a ship forever. Prepare your financial "lifeboat" now.</p>',
                ]),
                'published_at' => $this->parseIndonesianDate('20 Januari 2026'),
                'featured_image_desktop' => $this->examplePath('example-desktop.png'),
                'use_mobile_image' => true,
                'featured_image_mobile' => $this->examplePath('example-potrait.png'),
                'meta_title' => json_encode([
                    'id' => 'Tips Cerdas Mengelola Gaji Dolar Agar Cepat Kaya Sepulang Kontrak',
                    'en' => 'Smart Tips to Manage Dollar Salary to Get Rich After Contract Ends',
                ]),
                'meta_description' => json_encode([
                    'id' => 'Jangan sampai gaji besar numpang lewat! Ikuti tips manajemen keuangan khusus pelaut agar bisa beli rumah dan aset produktif setelah pensiun.',
                    'en' => 'Don\'t let big salaries pass by! Follow the seaman\'s financial management tips so you can buy a house and productive assets after retirement.',
                ]),
            ],
        ];

        foreach ($articlePosts as $post) {
            DB::table('article_posts')->insert(array_merge($post, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
