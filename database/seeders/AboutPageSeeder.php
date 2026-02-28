<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    private function examplePath(string $filename): string
    {
        return 'example/' . $filename;
    }

    public function run(): void
    {
        AboutPage::truncate();

        $this->command?->info('Creating About Page seed record…');

        AboutPage::create([

            // ── Banner ────────────────────────────────────────────────────
            'banner_title' => [
                'en' => 'About Our Company',
                'id' => 'Tentang Perusahaan Kami',
            ],
            'banner_image' => $this->examplePath('example-desktop.png'),

            // ── Owner Message ─────────────────────────────────────────────
            'owner_headline' => [
                'en' => 'A Message From Our Management',
                'id' => 'Sebuah Pesan Dari Manajemen Kami',
            ],
            'owner_message' => [
                'en' => '<p>At PT Las Olas Indonesia, we are driven by integrity, professionalism, and a profound commitment to empowering Indonesian talents to succeed on the global stage. Since our founding, we have built more than just a recruitment agency — we have built sturdy bridges between towering dreams and career opportunities, establishing connections between skilled professionals and world-class organizations that highly value human resources excellence.</p><p>Our strategic partnership with MSC Cruises and Explora Journeys is a powerful testament to the recruitment quality metrics we uphold daily. Every single candidate we place not only carries our endorsement, but also our solid promise that they are fully prepared, thoroughly supported, and positioned for long-term career success.</p>',
                'id' => '<p>Di PT Las Olas Indonesia, setiap langkah kami senantiasa didorong oleh integritas, profesionalisme tinggi, dan komitmen mendalam untuk memberdayakan talenta cemerlang Indonesia agar sukses berjaya di panggung kancah global. Sejak awal didirikan, kami telah membangun lebih dari sekadar agen rekrutmen — kami berhasil merajut jembatan kokoh antara impian-impian besar dan realitas peluang kerja nyata, antara individu profesional terampil dan organisasi korporat kelas dunia yang menjunjung tinggi keunggulan sumber daya manusia.</p><p>Kemitraan strategis jangka panjang kami bersama MSC Cruises dan Explora Journeys menjadi bukti nyata metrik kualitas yang kami jaga setiap hari. Setiap telenta kandidat yang kami tempatkan membawa tidak hanya sekadar surat rekomendasi formal kami, tetapi juga mengemban janji bahwa mereka secara mental dan fisik telah mutlak siap, senantiasa didukung penuh, dan diarahkan secara presisi menuju tingkat kesuksesan jangka panjang.</p>',
            ],
            'owner_name' => [
                'en' => 'Rizky Pratama, S.E.',
                'id' => 'Rizky Pratama, S.E.',
            ],
            'owner_position' => [
                'en' => 'Founder & Managing Director',
                'id' => 'Pendiri & Direktur Pengelola',
            ],
            'owner_image' => $this->examplePath('example-desktop.png'),

            // ── About Company ─────────────────────────────────────────────
            'about_headline' => [
                'en' => 'Who We Truly Are',
                'id' => 'Siapa Profil Kami Sebenarnya',
            ],
            'about_description' => [
                'en' => '<p>PT Las Olas Indonesia is an official, government-licensed Indonesian Migrant Worker Placement Agency (P3MI) and the exclusive accredited entity authorized to actively recruit on behalf of MSC Cruises and Explora Journeys — unarguably two of the world\'s most prestigious and luxurious ocean vessel lines. We proudly specialize in meticulously matching highly skilled and ambitious Indonesian hospitality professionals with spectacular international career opportunities extending across both modern cruise fleets and land-based luxury hotel sectors.</p><p>Backed by decades of collective experience alongside an impeccable, proven track record of consistently successful global placements, our dedicated team comprehensively guides aspiring candidates through every single critical stage of employment: starting deliberately from the initial intensive screening phase and vocational skills competency training, all the way flawlessly through complex visa document processing and seamless final onboarding port support.</p>',
                'id' => '<p>PT Las Olas Indonesia adalah sebuah Perusahaan Penempatan Pekerja Migran Indonesia (P3MI) resmi berlisensi pemerintah yang bangga menjadi satu-satunya entitas terakreditasi untuk aktif merekrut mewakili nama besar perusahaan MSC Cruises dan Explora Journeys — yang tak terbantahkan merupakan dua dari beberapa perusahaan spesialis kapal pesiar mewah paling bergengsi di dunia saat ini. Kemahiran sejati kami berspesialisasi utuh dalam secara cerdik mencocokkan barisan para profesional hospitalitas mumpuni Indonesia dengan letupan peluang rekrutmen karir internasional paling spektakuler yang terbentang melintasi armada laut super modern hingga lini perhotelan darat mewah.</p><p>Berbekal pondasi puluhan tahun gabungan pengalaman eksekutif kolektif yang dipadukan bersama rekam jejak sempurna nan terbukti berupa data murni penempatan sukses secara global, barisan tim berdedikasi kami akan merangkul secara intensif setiap kandidat di dalam melintasi tiap fase titik kritis perjalanan kerja: secara teratur berawal dari tahap awal pemilihan latar seleksi, berlanjut ke pendidikan kompetensi standar kemahiran bidang vokasional khusus, diakhiri dengan proses mulus penanganan kerumitan validitas pengurusan dokumen visa operasional bersama sokongan total tahapan terakhir port orientasi onboarding.</p>',
            ],

            // ── Company Values ─────────────────────────────────────────────
            'value_subheading' => [
                'en' => 'Our Enduring Core Principles',
                'id' => 'Prinsip Nilai Dasar Abadi Kami',
            ],
            'value_heading' => [
                'en' => 'Our Vision, Mission & Integrity',
                'id' => 'Visi, Misi & Komitmen Integritas',
            ],
            'value_description' => [
                'en' => 'Every single daily action and structural decision we execute is fundamentally guided by our crystal-clear core values that passionately prioritize human progress above all else.',
                'id' => 'Keutuhan setiap aktivitas teknis harian kami bersama segenap rangkaian putusan manajerial operasional dipandu secara asali oleh pilar landasan nilai-nilai dasar murni kami yang secara intens menempatkan prioritas absolut bagi kemajuan individu di atas kepentingan segalanya.',
            ],
            'value_image' => $this->examplePath('example-desktop.png'),
            'value_items' => [
                'en' => [
                    [
                        'title'   => 'Grand Vision',
                        'content' => '<p>To be universally recognized as the undisputed leading Indonesian migrant professional worker placement agency matrix, perfectly bridging the challenging gap existing between immensely talented domestic workers and rewarding lucrative career opportunities flourishing in the global hospitality and worldwide marine tourism industry.</p>',
                    ],
                    [
                        'title'   => 'Focused Mission',
                        'content' => '<ul><li>Consistently conduct ethical, highly professional, strictly transparent, and absolutely scam-free candidate recruitment screening frameworks.</li><li>To nurture and actively foster genuinely mutually beneficial, long-lasting strategic business partnerships.</li><li>Successfully manage our corporate institutional assets through transparent, high-accountability good governance practices.</li></ul>',
                    ],
                    [
                        'title'   => 'Unwavering Commitment',
                        'content' => '<p>Relentlessly dedicated to upholding unquestionable integrity, providing highly personalized individual support services, and passionately promoting radically fair employment labor standards for all citizens everywhere in Indonesia.</p>',
                    ],
                ],
                'id' => [
                    [
                        'title'   => 'Visi Agung',
                        'content' => '<p>Untuk dapat merajai posisinya secara mutlak dan lekas diakui sejagad sebagai entitas agen penggerak penempatan pekerja terampil migran asal bumi pertiwi yang tiada tandingannya, menjadi garda depan penghubung kesenjangan kualifikasi batas kemahiran sempit yang kerap terjalin antara lumbung tenaga insani teramat piawai yang ada di seantero negeri dengan pusaran ladang peluang menguntungkan karir cerah menyongsong cakrawala yang bermekaran subur tiada putusnya di jagat pusaran gelanggang industri keramahan bahari sekaligus dunia pariwisata internasional tanpa sekat negara.</p>',
                    ],
                    [
                        'title'   => 'Misi Terarah',
                        'content' => '<ul><li>Menahan patokan teguh dan utuh di dalam kerangka kerja merekrut profil pelamar secara sepenuhnya berprinsip kokoh, tergolong mutlak pada derajat tingkatan etis super profesional secara lugas, dan terbebas utuh dari cacat muslihat rekayasa terselubung apapun.</li><li>Guna memoles hingga secara teliti menumbuhkan kerangka kemitraan bisnis jaringan strategis kolektif fungsional secara serempak yang berprinsip tulus sama-sama dapat mendulang laba kemajuan sinergi manfaat ganda dengan ikatan kokoh hingga mampu berumur panjang mengarung keabadian lintasan zaman di masa-masa mendatang kelak.</li><li>Rutin cekatan mengoperasikan penata-kelolaan korporasi kelembagaan aset-aset institusionil lewat standar parameter tingkat kualitas asas panduan tatakelola (good governance) prima berlandaskan pilar moral pertanggung-jawaban rasional nan tembus pandang (transparan) seutuhnya.</li></ul>',
                    ],
                    [
                        'title'   => 'Komitmen Pantang Patah',
                        'content' => '<p>Terfokus menyerahkan setiap detik napas pengabdian sejati tak kenal lelah merawat tonggak nilai integritas perbuatan terbukti teruji utuh tak tergoyahkan sangsi, ikhlas sudi menyajikan jaminan dukungan spesifikasi pelayanan khusus individual prima personal, selagi turut lantang menyalakan suar obor penegakan hak-hak pakem tenaga buruh adil bermartabat bagi kemaslahatan paripurna milik segenap para anak bangsa secara hakiki berlandas ke sejagad nusantara ini seutuhnya.</p>',
                    ],
                ],
            ],

            // ── Collaboration ─────────────────────────────────────────────
            'collaboration_heading' => [
                'en' => 'Strategic Synergy With Higher Educational Campus & Industrial Training Partners',
                'id' => 'Sinergi Kerjasama Terpadu Bersama Insan Terpelajar Perguruan & Mitra Ahli Kejuruan Pelatihan',
            ],
            'collaboration_description' => [
                'en' => 'We actively secure direct alliances alongside Indonesia\'s leading premier hospitality management universities and specialized vocational training centers aiming to meticulously construct an unbreakable, steady supply pipeline containing exceptionally well-prepared, globally competent, intellectually competitive elite-tier candidates ready to dispatch.',
                'id' => 'Kami bahu-membahu menancapkan aliansi kawan kolaborasi operasional seutuhnya secara interaktif selaras serentak melibatkan deretan panggung wadah manajemen fakultas strata perhotelan peringkat top elit bersama institusi perakitan program vokasi pelatihan ketangkasan terkemuka bangsa secara utuh berjejer se-seantero nusantara raya ini di ikhtiar tajam buat telaten membangun rantaian alur jaringan yang membludak dipenuhi gerombolan suplai gelombang cetakan bibit unggulan super terkemas tuntas, yang secara nalar piawai berdaya tarung sikut sangat kompetitif bertaraf pentas sejagad.',
            ],
            'collaboration_image' => $this->examplePath('example-desktop.png'),

            // ── Certified ─────────────────────────────────────────────────
            'certified_heading' => [
                'en' => 'Certified Credentials & Fully Accredited Legal Standing',
                'id' => 'Bukti Tanda Kredensial Lisensi & Legalitas Sah Berpijak Terakreditasi Lengkap',
            ],
            'certified_description' => [
                'en' => 'We securely retain all constitutionally mandated federal business licenses, regulatory recruitment permits, and stringent international compliance certifications essential to transparently maneuver as a 100% legally recognized, state-registered P3MI organizational entity operating within Indonesian jurisdiction.',
                'id' => 'Kami kokoh mencengkram segala jajaran lembar kertas surat perizinan wajib sah dari tangan pelaksana yurisdiksi konstitusi operasional perdagangan sentral beserta bermacam lisensi regulasi restu rekrutasi negara ditambah berderet sertifikat kepatuhan mutlak kualifikasi kelaiakan jaminan pakem internasional yang krusial guna menavigasikan jalannya aktivitas terlampau sangat tembus cahaya secara terang benderang bertindak dalam hakikat sah secara paripurna sebagai lembaga organisasi instansi P3MI tunggal tercatat riwayatnya beraksi bernaung dalam batas-batas teritorial NKRI merdeka ini.',
            ],
            'certified_logos' => [
                ['logo_image' => $this->examplePath('example-desktop.png')],
                ['logo_image' => $this->examplePath('example-desktop.png')],
                ['logo_image' => $this->examplePath('example-desktop.png')]
            ],
            'certified_image' => $this->examplePath('example-desktop.png'),

            // ── Directors & Team ──────────────────────────────────────────
            'director_heading' => [
                'en' => 'The Esteemed Board of Directors',
                'id' => 'Barisan Singgasana Dewan Eksekutif Para Direksi',
            ],
            'director_description' => [
                'en' => 'The absolute brilliance driving our visionary leadership team securely anchors an impressive combined multi-decade footprint forged through raw execution within large-scale corporate talent recruitment mapping, specialized five-star maritime hospitality provisioning, and complex global cross-border trade business dynamics.',
                'id' => 'Ragam pijar kejeniusan absolut yang memanaskan tonggak kemudi barisan nahkoda jajaran pucuk tampuk wibawa kepemimpinan sang perumus visi masa depan kita secara presisi menjangkar kuat gumpalan pengalaman padat bersenyawa menembus dimensi bertahun-tahun gabungan memori jam terbang dari leksikon rekam serbuan yang terus-menerus ditempa gempuran penumpasan laju perburuan pengerahan raksasa korporat rekrutmen bibit pencari ceruk pasokan armada pelayaran perhotelan nautika kelasi berbintang sejagad dipadu lincahnya sepak terjang sirkus meliuk di jantung geliat urat nadi pusaran labirin bisnis seberang perbatasan niaga multinasional teramat rumit ini.',
            ],
            'team_heading' => [
                'en' => 'Our Core Force of Dedicated Operational Professional Staff',
                'id' => 'Detasemen Inti Gugus Depan Operasional Para Pakar Staf Pekerja Tersumpah Kinerja Penuh',
            ],
            'team_description' => [
                'en' => 'Methodically structured firmly standing behind every single celebrated deployment flight success resides our passionately devoted elite battalion unit of seasoned operational professionals who systematically toil day and night effortlessly orchestrating exhaustive support networks to exclusively pamper our courageous candidates alongside respected corporate partner alliances.',
                'id' => 'Tersusun rapi secara terstruktur presisi lurus persis tegap bertengger kokoh tepat mengawal bayang-bayang di balik gemuruh keriuhan sorak sorai perayaan pesta syukuran tiupan kemenangan di hari-hari di kala rilis jam keberangkatan jadwal penerbangan rombongan pencapaian anak buah angkatan kerja seutuhnya ini, bersembunyilah di markas rahasianya berupa pasukan unit detasemen khusus kami yang dipenuhi pakar-pakar jawara staf tangguh elit bertempur dedikasi militan yang dengan tenang tanpa kenal kata menyerah tak henti letih bertaruh darah membanting keringat beralaskan kerja mesin tanpa putus siang malam berharmoni merajut rajutan pelik jaring penopang perlindungan keamanan paripurna di bawah niat memanjakan sepenuhnya keberanian hati peserta asuhan kandidat tangguh pelaut kami beriringan memeluk selaras para kolega raksasa mitra aliansi komersial korporat sejati kami.',
            ],

            // ── SEO ───────────────────────────────────────────────────────
            'seo_title' => [
                'en' => 'About PT Las Olas Indonesia | Discover Our Elite Corporate Hospitality Recruitment Vision',
                'id' => 'Tentang Kami PT Las Olas Indonesia | Selidiki Jejak Visi Ambisi Elit Korporasi Rekrutmen Maritim Hospitalitas Bahari',
            ],
            'seo_description' => [
                'en' => 'Comprehensively dive deeper into uncovering the core foundational vision, grand operational mission statements, and our steadfast ethical commitments actively propelling PT Las Olas Indonesia toward continuously achieving massive deployment benchmarks successfully introducing seasoned elite professional Indonesian hospitality manpower smoothly into the extremely demanding global commercial luxury travel and maritime cruise industry circuit.',
                'id' => 'Silakan untuk segera secara menyeluruh tajam menghujam ke relung sanubari kedalaman dalam demi niat menyingkap tabir asli susunan pilar kerangka patokan visi pondasi hakiki dasar, jejeran untai deklarasi agung manifestasi maklumat misi teknis operasional, digabung berbalut janji integritas komitmen kuat menancap erat teguh yang acap kali gencar tak henti memacu turbin tenaga mesin PT Las Olas Indonesia meletus meroket tiada rem dalam arah mengejar target capaian kuota pengiriman utusan masal sembari gemilang dengan amat lihainya mampu terus-terusan mengoles susup selundupkan secara rapi tatanan bibit elit kualitas maestro pakar pekerja pesiar perhotelan warga kebangsaan Indonesia masuk telak dengan begitu halusnya ke muara gelanggang lingkar sirkuit pusaran ombak kejam persaingan ganas industri perdagangan hiburan bisnis pesiar lautan karang perjalanan komersial elit kelas eksekutif sejagat maya ini kelak kemudian hari nanti.',
            ],
            'seo_keywords' => [
                'en' => 'about las olas company profile, indonesian official licensed certified p3mi manning agency, elite marine maritime cruise ship offshore corporate recruiter partner, international global luxury hotel hospitality placement service consultant experts',
                'id' => 'seluk beluk usul asal usul tentang profil biodata resume legal hukum riwayat kami data perusahaan, pt las olas terkemuka biro p3mi pjtki bersertifikat lisensi resmi negara agen penyalur msc agen tki tkw formal naker, penyedia perekrut eksklusif terakreditasi pengawakan tenaga kapal pesiar karibia amerika eropa mewah eksotis karir perhotelan kelasi awak pelaut abk',
            ],
            'seo_og_image' => $this->examplePath('example-desktop.png'),

        ]);
    }
}
