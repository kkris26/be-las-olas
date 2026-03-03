<?php

namespace Database\Seeders;

use App\Models\LandService;
use Illuminate\Database\Seeder;

class LandServiceSeeder extends Seeder

{
        private function parentPath(string $filename): string
    {
        return 'services/land/' . $filename;
    }

    public function run(): void
    {
        LandService::truncate();
        $this->command?->info('Seeding Land Services…');

        $services = [
            [
                'image'       => $this->parentPath('turkey.webp'),
                'heading'     => [
                    'id' => 'Turki',
                    'en' => 'Turkey',
                ],
                'description' => [
                    'id' => 'Turki adalah surga bagi pekerja migran dengan ekonomi yang berkembang pesat, peluang karier tak terbatas, dan lokasi strategis di pusat perdagangan global.',
                    'en' => 'Turkey is a haven for migrant workers with a rapidly growing economy, limitless career opportunities, and a strategic location at the center of global trade.',
                ],
                'button_text' => [
                    'id' => 'Lamar Sekarang',
                    'en' => 'Apply Now',
                ],
                'button_link' => 'https://tms.lasolas.id/jobs',
                'sort_order'  => 1,
            ],
            [
                'image'       => $this->parentPath('bulgaria.webp'),
                'heading'     => [
                    'id' => 'Bulgaria',
                    'en' => 'Bulgaria',
                ],
                'description' => [
                    'id' => 'Bulgaria menawarkan prospek kerja yang menjanjikan dengan pertumbuhan sektor industri dan perhotelan, kebutuhan tenaga kerja yang tinggi, serta peluang karier menjanjikan di kawasan Eropa.',
                    'en' => 'Bulgaria offers promising job prospects with a growing industrial and hospitality sector, high labor demand, and promising career opportunities in the European region.',
                ],
                'button_text' => [
                    'id' => 'Lamar Sekarang',
                    'en' => 'Apply Now',
                ],
                'button_link' => 'https://tms.lasolas.id/jobs',
                'sort_order'  => 2,
            ],
            [
                'image'       => $this->parentPath('maldives.webp'),
                'heading'     => [
                    'id' => 'Maldives',
                    'en' => 'Maldives',
                ],
                'description' => [
                    'id' => 'Destinasi wisata internasional kelas dunia dengan kebutuhan tenaga kerja tinggi di sektor perhotelan dan resort mewah. Peluang untuk berbagai posisi hospitality dengan standar global dan lingkungan profesional multinasional.',
                    'en' => 'A world-class international tourist destination with high labor needs in the hospitality and luxury resort sectors. Opportunities for various hospitality positions with global standards and a multinational professional environment.',
                ],
                'button_text' => [
                    'id' => 'Lamar Sekarang',
                    'en' => 'Apply Now',
                ],
                'button_link' => 'https://tms.lasolas.id/jobs',
                'sort_order'  => 3,
            ],
        ];

        foreach ($services as $data) {
            LandService::create($data);
        }
    }
}
