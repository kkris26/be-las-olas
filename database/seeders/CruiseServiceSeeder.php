<?php

namespace Database\Seeders;

use App\Models\CruiseService;
use Illuminate\Database\Seeder;

class CruiseServiceSeeder extends Seeder
{
        private function parentPath(string $filename): string
    {
        return 'services/cruise/' . $filename;
    }
    public function run(): void
    {
        CruiseService::truncate();
        $this->command?->info('Seeding Cruise Services…');

        $services = [
            [
                'image'       => $this->parentPath('msc_cruises.webp'),
                'heading'     => [
                    'id' => 'MSC Cruises',
                    'en' => 'MSC Cruises',
                ],
                'description' => [
                    'id' => 'MSC Cruises, salah satu kapal pesiar terbesar di dunia, menawarkan pengalaman mewah dengan layanan unggul dan destinasi internasional.',
                    'en' => "MSC Cruises, one of the world's largest cruise lines, offers a luxury experience with superior service and incredible international destinations.",
                ],
                'button_text' => [
                    'id' => 'Lamar Sekarang',
                    'en' => 'Apply Now',
                ],
                'button_link' => 'https://tms.lasolas.id/jobs',
                'sort_order'  => 1,
            ],
            [
                'image'       => $this->parentPath('explora_journeys.webp'),
                'heading'     => [
                    'id' => 'Explora Journeys',
                    'en' => 'Explora Journeys',
                ],
                'description' => [
                    'id' => 'Salah satu ultra luxury cruises yang menghadirkan perjalanan eksklusif dengan layanan personal dan destinasi global yang luar biasa.',
                    'en' => 'One of the ultra-luxury cruises that presents an exclusive journey with highly personalized service and amazing global boutique destinations.',
                ],
                'button_text' => [
                    'id' => 'Lamar Sekarang',
                    'en' => 'Apply Now',
                ],
                'button_link' => 'https://tms.lasolas.id/jobs',
                'sort_order'  => 2,
            ],
        ];

        foreach ($services as $data) {
            CruiseService::create($data);
        }
    }
}
