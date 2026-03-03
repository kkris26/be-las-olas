<?php

namespace Database\Seeders;

use App\Models\OnboardingPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OnboardingSystemSeeder extends Seeder
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
        OnboardingPost::truncate();

        $onboardingPosts = [
            [
                'title' => [
                    'id' => 'Triadi Micky Raih Penghargaan "The Best Employee of The Quarter" di Marriott USA!',
                    'en' => 'Triadi Micky Wins "The Best Employee of The Quarter" Award at Marriott USA!',
                ],
                'slug' => [
                    'id' => 'triadi-micky-best-employee-marriott-usa',
                    'en' => 'triadi-micky-wins-best-employee-of-the-quarter-award-at-marriott-usa',
                ],
                'content' => [
                    'id' => '<p>Kabar membanggakan datang dari salah satu alumni <strong>Campus of Dream</strong>, Triadi Micky, yang berhasil meraih penghargaan "The Best Employee of The Quarter" di salah satu properti Marriott di Amerika Serikat. Penghargaan ini diberikan kepada karyawan dengan kinerja terbaik berdasarkan penilaian manajemen, kedisiplinan kerja, pelayanan kepada tamu, serta kemampuan bekerja dalam tim.</p><p>Selama bekerja, Triadi Micky dikenal sebagai pribadi yang disiplin, ramah, dan cepat beradaptasi dengan lingkungan kerja internasional. Ia mampu menunjukkan standar pelayanan hospitality yang baik serta konsisten menjaga kualitas kerja dalam setiap tugas yang diberikan. Atas dedikasinya tersebut, manajemen hotel memberikan apresiasi khusus sebagai bentuk penghargaan atas kontribusinya.</p><h3>Bukti Kualitas Pendidikan</h3><p>Pencapaian ini menjadi bukti bahwa lulusan yang dipersiapkan dengan pelatihan, pembekalan sikap kerja, serta kemampuan komunikasi yang baik mampu bersaing di industri perhotelan internasional. Selain membanggakan secara pribadi, prestasi ini juga menjadi motivasi bagi siswa lainnya untuk terus belajar dan mempersiapkan diri sejak awal.</p><p>Campus of Dream menyampaikan apresiasi dan ucapan selamat atas prestasi yang diraih. Diharapkan keberhasilan ini dapat menginspirasi siswa dan calon peserta lainnya bahwa peluang karier internasional terbuka bagi siapa saja yang memiliki kemauan belajar, disiplin, dan kerja keras.</p><p>Semoga pencapaian ini menjadi langkah awal bagi Triadi Micky untuk meraih kesuksesan karier yang lebih tinggi di masa depan.</p>',
                    'en' => '<p>Great news from <strong>Campus of Dream</strong> alumni, Triadi Micky, who has won the "Best Employee of The Quarter" award at one of Marriott\'s properties in the United States. This award is given to employees with the best performance based on management assessment, work discipline, guest service, and teamwork abilities.</p><p>While working, Triadi Micky is known as a disciplined, friendly person who quickly adapts to an international work environment. He was able to demonstrate good hospitality service standards and consistently maintain work quality in every task. For his dedication, hotel management gave special appreciation as recognition of his contribution.</p><h3>Proof of Educational Quality</h3><p>This achievement is proof that graduates prepared with training, work attitude preparation, and good communication skills are able to compete in the international hospitality industry. Besides being personally proud, this achievement is also motivation for other students to continue learning and preparing from the start.</p><p>Campus of Dream expresses appreciation and congratulations for the achievement. It is hoped that this success can inspire students and prospective participants that international career opportunities are open to anyone who has the will to learn, discipline, and hard work.</p><p>Hopefully this achievement will be the first step for Triadi Micky to achieve higher career success in the future.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('10 Januari 2026'),
                     'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Triadi Micky Raih Penghargaan "The Best Employee of The Quarter" di Marriott USA!',
                    'en' => 'Triadi Micky Wins "The Best Employee of The Quarter" Award at Marriott USA!',
                ],
                'meta_description' => [
                    'id' => 'Kabar membanggakan dari alumni Campus of Dream yang berhasil menjadi karyawan terbaik di Amerika Serikat.',
                    'en' => 'Great news from Campus of Dream alumni who became the best employee in the United States.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Rina Setyawati Resmi Bergabung dengan Royal Caribbean International',
                    'en' => 'Rina Setyawati Officially Joins Royal Caribbean International',
                ],
                'slug' => [
                    'id' => 'rina-lolos-royal-caribbean',
                    'en' => 'rina-setyawati-officially-joins-royal-caribbean-international',
                ],
                'content' => [
                    'id' => '<p>Selamat kepada Rina Setyawati, alumni angkatan 2024 yang baru saja menandatangani kontrak pertamanya dengan <strong>Royal Caribbean International</strong> sebagai Assistant Waitress. Perjuangan Rina selama 6 bulan mengikuti pelatihan intensif di Campus of Dream akhirnya membuahkan hasil manis.</p><h3>Proses Seleksi yang Ketat</h3><p>Rina harus melewati 3 tahapan interview user yang sangat kompetitif. Kemampuan bahasa Inggris dan grooming Rina dinilai sangat excellent oleh pihak user. Rina akan segera berangkat pada bulan Maret mendatang untuk melayani tamu di rute Caribbean.</p><p>"Terima kasih kepada para instruktur yang sabar membimbing saya dari nol. Dulu saya takut bicara bahasa Inggris, sekarang saya siap keliling dunia," ujar Rina dengan penuh haru.</p>',
                    'en' => '<p>Congratulations to Rina Setyawati, class of 2024 alumna who just signed her first contract with <strong>Royal Caribbean International</strong> as an Assistant Waitress. Rina\'s struggle over 6 months of intensive training at Campus of Dream has finally borne sweet fruit.</p><h3>Rigorous Selection Process</h3><p>Rina had to go through 3 highly competitive user interview rounds. Rina\'s English language ability and grooming were rated excellent by the user. Rina will soon depart next March to serve guests on the Caribbean route.</p><p>"Thank you to the patient instructors who guided me from scratch. I used to be afraid of speaking English, now I\'m ready to travel the world," said Rina with emotion.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('15 Januari 2026'),
                   'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Rina Setyawati Resmi Bergabung dengan Royal Caribbean International',
                    'en' => 'Rina Setyawati Officially Joins Royal Caribbean International',
                ],
                'meta_description' => [
                    'id' => 'Satu lagi alumni kami yang sukses menembus seleksi ketat kapal pesiar terbesar di dunia.',
                    'en' => 'Another one of our alumni who successfully penetrated the strict selection of the world\'s largest cruise ship.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Inspiratif! Budi Santoso Promosi Menjadi Supervisor di Carnival Cruise Line',
                    'en' => 'Inspirational! Budi Santoso Promoted to Supervisor at Carnival Cruise Line',
                ],
                'slug' => [
                    'id' => 'budi-promosi-supervisor-carnival',
                    'en' => 'budi-santoso-promoted-to-supervisor-at-carnival-cruise-line',
                ],
                'content' => [
                    'id' => '<p>Kabar gembira datang dari laut lepas. Budi Santoso, alumni angkatan pertama, baru saja mendapatkan promosi jabatan menjadi <strong>Galley Supervisor</strong> di Carnival Cruise Line. Ini adalah pencapaian luar biasa mengingat Budi baru bekerja selama 3 kontrak (sekitar 2,5 tahun).</p><p>Budi dikenal sebagai pekerja yang ulet dan memiliki leadership yang kuat. Ia sering dipercaya untuk memimpin tim kecil dalam operasional dapur kapal yang sangat sibuk. Promosi ini juga diikuti dengan kenaikan gaji yang signifikan.</p><p>Semoga kesuksesan Budi bisa menjadi pelecut semangat bagi adik-adik kelas yang sedang berjuang di kampus.</p>',
                    'en' => '<p>Good news comes from the open sea. Budi Santoso, first batch alumnus, just received a promotion to <strong>Galley Supervisor</strong> at Carnival Cruise Line. This is an extraordinary achievement considering Budi has only worked for 3 contracts (about 2.5 years).</p><p>Budi is known as a hard-working person with strong leadership. He is often trusted to lead small teams in the ship\'s busy kitchen operations. This promotion also comes with a significant salary increase.</p><p>Hopefully Budi\'s success can be an inspiration to junior classmates who are still struggling on campus.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('20 Januari 2026'),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Inspiratif! Budi Santoso Promosi Menjadi Supervisor di Carnival Cruise Line',
                    'en' => 'Inspirational! Budi Santoso Promoted to Supervisor at Carnival Cruise Line',
                ],
                'meta_description' => [
                    'id' => 'Dari Galley Steward hingga menjadi Supervisor, perjalanan karir Budi membuktikan kerja keras tidak pernah mengkhianati hasil.',
                    'en' => 'From Galley Steward to Supervisor, Budi\'s career journey proves that hard work never betrays results.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Dian Pertiwi: Dari Magang hingga Menjadi Floor Manager di Hotel Bintang 5 Dubai',
                    'en' => 'Dian Pertiwi: From Internship to Floor Manager at 5-Star Hotel Dubai',
                ],
                'slug' => [
                    'id' => 'dian-manager-hotel-dubai',
                    'en' => 'dian-pertiwi-from-internship-to-floor-manager-at-5-star-hotel-dubai',
                ],
                'content' => [
                    'id' => '<p>Timur Tengah, khususnya Dubai, menjadi destinasi favorit alumni kami. Dian Pertiwi membuktikan bahwa wanita Indonesia bisa bersaing di level top management. Dian kini menjabat sebagai Floor Manager di salah satu hotel mewah dekat Burj Khalifa.</p><p>Berawal dari program internship yang difasilitasi oleh Campus of Dream, kinerja Dian yang luar biasa membuatnya langsung ditawari kontrak kerja permanen. Kini, Dian membawahi 20 staff dari berbagai negara.</p><p>"Kuncinya adalah jangan mudah mengeluh dan selalu mau belajar hal baru. Budaya kerja di sini sangat cepat, tapi sangat menghargai prestasi," pesan Dian.</p>',
                    'en' => '<p>The Middle East, especially Dubai, has become the favorite destination of our alumni. Dian Pertiwi proves that Indonesian women can compete at the top management level. Dian now serves as Floor Manager at one of the luxury hotels near Burj Khalifa.</p><p>Starting from an internship program facilitated by Campus of Dream, Dian\'s outstanding performance immediately led to a permanent work contract offer. Now, Dian oversees 20 staff from various countries.</p><p>"The key is not to complain easily and always be willing to learn new things. The work culture here is very fast, but very appreciative of achievement," Dian said.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('02 Februari 2026'),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Dian Pertiwi: Dari Magang hingga Menjadi Floor Manager di Hotel Bintang 5 Dubai',
                    'en' => 'Dian Pertiwi: From Internship to Floor Manager at 5-Star Hotel Dubai',
                ],
                'meta_description' => [
                    'id' => 'Kisah Dian menaklukkan industri perhotelan Timur Tengah dengan dedikasi dan senyuman khas Indonesia.',
                    'en' => 'Dian\'s story of conquering the Middle East hospitality industry with dedication and Indonesian charm.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Fajar Nugraha Lolos Program Ausbildung Perhotelan di Jerman',
                    'en' => 'Fajar Nugraha Passes Hospitality Ausbildung Program in Germany',
                ],
                'slug' => [
                    'id' => 'fajar-magang-jerman',
                    'en' => 'fajar-nugraha-passes-hospitality-ausbildung-program-in-germany',
                ],
                'content' => [
                    'id' => '<p>Jerman menjadi negara tujuan baru bagi lulusan Campus of Dream. Fajar Nugraha berhasil lolos seleksi program <strong>Ausbildung</strong> (pendidikan vokasi ganda) di bidang perhotelan. Fajar akan belajar sambil bekerja di Munich selama 3 tahun dengan gaji bulanan yang menarik.</p><p>Program ini sangat bergengsi karena memberikan sertifikasi standar Uni Eropa. Fajar telah mempersiapkan kemampuan bahasa Jerman (Level B1) selama 6 bulan terakhir di pusat bahasa rekanan kami.</p><p>Viel Glück, Fajar! Tunjukkan kualitas SDM Indonesia di tanah Eropa.</p>',
                    'en' => '<p>Germany becomes a new destination country for Campus of Dream graduates. Fajar Nugraha successfully passed the selection for the <strong>Ausbildung</strong> program (dual vocational education) in hospitality. Fajar will study while working in Munich for 3 years with an attractive monthly salary.</p><p>This program is highly prestigious as it provides EU standard certification. Fajar has prepared German language skills (Level B1) over the last 6 months at our language partner center.</p><p>Good luck, Fajar! Show the quality of Indonesian human resources in European land.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('05 Februari 2026'),
                'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Fajar Nugraha Lolos Program Ausbildung Perhotelan di Jerman',
                    'en' => 'Fajar Nugraha Passes Hospitality Ausbildung Program in Germany',
                ],
                'meta_description' => [
                    'id' => 'Mewujudkan mimpi bekerja di Eropa melalui jalur Ausbildung. Selamat kepada Fajar!',
                    'en' => 'Realizing the dream of working in Europe through the Ausbildung route. Congratulations to Fajar!',
                ],
            ],
            [
                'title' => [
                    'id' => 'Siti Rahma Menikmati Kantor "Surga" di Resort Mewah Maldives',
                    'en' => 'Siti Rahma Enjoys "Paradise Office" at Luxurious Maldives Resort',
                ],
                'slug' => [
                    'id' => 'siti-housekeeping-maldives',
                    'en' => 'siti-rahma-enjoys-paradise-office-at-luxurious-maldives-resort',
                ],
                'content' => [
                    'id' => '<p>Bekerja rasa liburan. Itulah yang dirasakan Siti Rahma yang kini bekerja sebagai Villa Attendant di salah satu resort privat di Maldives. Siti bertanggung jawab memastikan kenyamanan tamu-tamu VVIP yang menginap di villa atas air.</p><p>"Gajinya dalam USD, ditambah service charge yang besar karena resort mahal. Tapi yang paling mahal adalah pengalamannya. Saya bisa melihat hiu dan pari setiap pagi saat berangkat kerja," cerita Siti antusias.</p><p>Bagi kalian yang menyukai ketenangan dan alam, Maldives adalah tujuan karir yang patut diperhitungkan.</p>',
                    'en' => '<p>Working feels like vacation. That\'s what Siti Rahma feels as she now works as a Villa Attendant at one of Maldives\' private resorts. Siti is responsible for ensuring the comfort of VVIP guests staying in overwater villas.</p><p>"The salary is in USD, plus a large service charge because the resort is expensive. But the most expensive is the experience. I can see sharks and rays every morning when I go to work," Siti said enthusiastically.</p><p>For those who like peace and nature, Maldives is a career destination worth considering.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('12 Februari 2026'),
                   'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Siti Rahma Menikmati Kantor "Surga" di Resort Mewah Maldives',
                    'en' => 'Siti Rahma Enjoys "Paradise Office" at Luxurious Maldives Resort',
                ],
                'meta_description' => [
                    'id' => 'Siapa yang tidak ingin bekerja dengan pemandangan laut biru setiap hari? Simak cerita Siti di Maldives.',
                    'en' => 'Who doesn\'t want to work with a beautiful blue sea view every day? Read Siti\'s story in Maldives.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Pelepasan Siswa: Agus Siap Berlayar dengan Costa Cruises Eropa',
                    'en' => 'Student Release: Agus Ready to Set Sail with Costa Cruises Europe',
                ],
                'slug' => [
                    'id' => 'agus-kontrak-pertama-costa',
                    'en' => 'student-release-agus-ready-to-set-sail-with-costa-cruises-europe',
                ],
                'content' => [
                    'id' => '<p>Hari ini Campus of Dream secara resmi melepas keberangkatan Agus untuk bergabung dengan armada <strong>Costa Smeralda</strong>. Agus akan menempati posisi Assistant Buffet Steward. Rute pelayarannya akan melintasi Italia, Spanyol, dan Prancis.</p><p>Agus merupakan siswa yang sangat gigih. Meski sempat gagal di interview pertama, ia tidak menyerah dan terus memperbaiki diri. Semangat pantang menyerah inilah yang kami tanamkan kepada setiap peserta didik.</p><p>Safe flight and smooth seas, Agus!</p>',
                    'en' => '<p>Today Campus of Dream officially releases Agus for departure to join the <strong>Costa Smeralda</strong> fleet. Agus will serve as Assistant Buffet Steward. His sailing route will pass through Italy, Spain, and France.</p><p>Agus is a very determined student. Although he initially failed his first interview, he didn\'t give up and continued to improve himself. This never-give-up spirit is what we instill in every student.</p><p>Safe flight and smooth seas, Agus!</p>',
                ],
                'published_at' => $this->parseIndonesianDate('10 Februari 2026'),
              'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Pelepasan Siswa: Agus Siap Berlayar dengan Costa Cruises Eropa',
                    'en' => 'Student Release: Agus Ready to Set Sail with Costa Cruises Europe',
                ],
                'meta_description' => [
                    'id' => 'Satu lagi talenta muda yang siap mengharumkan nama bangsa di lautan Mediterania.',
                    'en' => 'One more young talent ready to bring honor to the nation on the Mediterranean Sea.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Eko Prasetyo: Meracik Cocktail di Bar Bintang Lima Tokyo',
                    'en' => 'Eko Prasetyo: Mixing Cocktails at 5-Star Bar Tokyo',
                ],
                'slug' => [
                    'id' => 'eko-bartender-jepang',
                    'en' => 'eko-prasetyo-mixing-cocktails-at-5-star-bar-tokyo',
                ],
                'content' => [
                    'id' => '<p>Keahlian meracik minuman (Mixology) sedang sangat dicari. Eko Prasetyo memanfaatkan peluang ini dengan baik. Berbekal sertifikat Bartender dari Campus of Dream, Eko kini bekerja di salah satu sky bar ternama di Ginza, Tokyo.</p><p>Eko menguasai teknik flaring dan pengetahuan tentang sake serta whiskey Jepang. "Tamu Jepang sangat detail dan menghargai perfection. Ini menantang saya untuk selalu presisi," kata Eko.</p><p>Karir di F&B Service, khususnya Bar, memang menawarkan peluang yang sangat luas dan dinamis.</p>',
                    'en' => '<p>Mixology skills are highly sought after. Eko Prasetyo takes good advantage of this opportunity. Armed with a Bartender certificate from Campus of Dream, Eko now works at one of Tokyo\'s famous sky bars in Ginza.</p><p>Eko masters flaring techniques and knowledge of Japanese sake and whiskey. "Japanese guests are very detailed and appreciate perfection. This challenges me to always be precise," said Eko.</p><p>A career in F&B Service, especially Bar, indeed offers a very wide and dynamic range of opportunities.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('18 Januari 2026'),
            'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Eko Prasetyo: Meracik Cocktail di Bar Bintang Lima Tokyo',
                    'en' => 'Eko Prasetyo: Mixing Cocktails at 5-Star Bar Tokyo',
                ],
                'meta_description' => [
                    'id' => 'Skill mixing drink Eko membawanya terbang ke Jepang. Simak perjalanannya.',
                    'en' => 'Eko\'s bartending skills took him flying to Japan. Read his journey.',
                ],
            ],
            [
                'title' => [
                    'id' => 'Putri Anggraini Terima "Award of Excellence" dari Princess Cruises',
                    'en' => 'Putri Anggraini Receives "Award of Excellence" from Princess Cruises',
                ],
                'slug' => [
                    'id' => 'putri-award-excellence',
                    'en' => 'putri-anggraini-receives-award-of-excellence-from-princess-cruises',
                ],
                'content' => [
                    'id' => '<p>Kualitas alumni Campus of Dream kembali diakui dunia. Putri Anggraini, yang bekerja di departemen Guest Services Princess Cruises, baru saja menerima pin "Award of Excellence". Penghargaan ini diberikan berdasarkan feedback positif dari penumpang (comment cards).</p><p>Putri dinilai sangat sabar dan solutif dalam menangani keluhan penumpang. Kemampuan <em>problem solving</em> dan empati adalah kunci sukses di bagian Front Office kapal pesiar.</p><p>Selamat Putri! Teruslah bersinar dan menginspirasi wanita Indonesia lainnya.</p>',
                    'en' => '<p>The quality of Campus of Dream alumni is recognized again by the world. Putri Anggraini, who works in Princess Cruises Guest Services department, just received the "Award of Excellence" pin. This award is given based on positive feedback from passengers (comment cards).</p><p>Putri is highly regarded as patient and solution-oriented in handling passenger complaints. Problem-solving ability and empathy are the keys to success in a cruise ship\'s Front Office.</p><p>Congratulations Putri! Keep shining and inspiring other Indonesian women.</p>',
                ],
                'published_at' => $this->parseIndonesianDate('14 Februari 2026'),
                       'featured_image_desktop' => null,
            'use_mobile_image' => true,
            'featured_image_mobile' => null,
                'meta_title' => [
                    'id' => 'Putri Anggraini Terima "Award of Excellence" dari Princess Cruises',
                    'en' => 'Putri Anggraini Receives "Award of Excellence" from Princess Cruises',
                ],
                'meta_description' => [
                    'id' => 'Dedikasi tinggi membawa Putri meraih penghargaan bergengsi di kontrak keduanya.',
                    'en' => 'High dedication brings Putri to win prestigious awards in her second contract.',
                ],
            ],
        ];

        foreach ($onboardingPosts as $post) {
            OnboardingPost::create($post);
        }
    }
}
