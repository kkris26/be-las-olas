<?php

namespace Database\Seeders;

use App\Models\OnboardingSetting;
use Illuminate\Database\Seeder;

class OnboardingSettingSeeder extends Seeder
{
    public function run(): void
    {
        OnboardingSetting::truncate();

        OnboardingSetting::create([
            'banner_image' => null,

            'banner_title' => [
                'en' => 'Onboarding Stories',
                'id' => 'Cerita Onboarding',
            ],

            'subheading' => [
                'en' => 'STORIES',
                'id' => 'STORIES',
            ],

            'heading' => [
                'en' => 'Onboarding Stories',
                'id' => 'Cerita Onboarding',
            ],

            'short_description' => [
                'en' => 'We are experienced in recruiting and placing the best workforce to join cruise ship companies and overseas job placements.',
                'id' => 'Kami berpengalaman dalam merekrut dan menempatkan tenaga kerja terbaik untuk bergabung dengan perusahaan kapal pesiar serta penempatan kerja keluar negeri.',
            ],

            // SEO
            'seo_title' => [
                'en' => 'Onboarding Stories | Las Olas Indonesia',
                'id' => 'Cerita Onboarding | Las Olas Indonesia',
            ],
            'seo_description' => [
                'en' => 'Read onboarding stories from our graduates who have successfully joined cruise ship companies and overseas job placements.',
                'id' => 'Baca cerita onboarding dari lulusan kami yang berhasil bergabung dengan perusahaan kapal pesiar dan penempatan kerja keluar negeri.',
            ],
            'seo_keywords' => [
                'en' => 'onboarding, cruise career, overseas jobs, hospitality, Las Olas Indonesia',
                'id' => 'onboarding, karier kapal pesiar, kerja luar negeri, perhotelan, Las Olas Indonesia',
            ],
            'seo_og_image' => null,
        ]);
    }
}
