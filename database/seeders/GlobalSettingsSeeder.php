<?php

namespace Database\Seeders;

use App\Models\CompanyIdentity;
use App\Models\FooterSetting;
use Illuminate\Database\Seeder;

class GlobalSettingsSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Company Identity ─────────────────────────────────────────────────
        CompanyIdentity::truncate();

        CompanyIdentity::create([
            'company_name' => 'PT. Las Olas Indonesia',

            'tagline' => [
                'en' => 'Professional Recruitment. Global Placement.',
                'id' => 'Perekrutan Profesional. Penempatan Global.',
            ],

            // contact_items — stored per locale; non-translatable fields
            // (icon_key, value, link) are identical in both locales.
            'contact_items' => [
                'en' => [
                    [
                        'label'    => 'Email',
                        'icon_key' => 'email',
                        'value'    => 'admin.recruitment@lasolas.id',
                        'link'     => 'mailto:admin.recruitment@lasolas.id',
                    ],
                    [
                        'label'    => 'Phone',
                        'icon_key' => 'phone',
                        'value'    => '+62 361 478 3865',
                        'link'     => 'tel:+623614783865',
                    ],
                    [
                        'label'    => 'WhatsApp',
                        'icon_key' => 'whatsapp',
                        'value'    => '+62 819 9998 8900',
                        'link'     => 'https://wa.me/6281999988900',
                    ],
                ],
                'id' => [
                    [
                        'label'    => 'Email',
                        'icon_key' => 'email',
                        'value'    => 'admin.recruitment@lasolas.id',
                        'link'     => 'mailto:admin.recruitment@lasolas.id',
                    ],
                    [
                        'label'    => 'Telepon',
                        'icon_key' => 'phone',
                        'value'    => '+62 361 478 3865',
                        'link'     => 'tel:+623614783865',
                    ],
                    [
                        'label'    => 'WhatsApp',
                        'icon_key' => 'whatsapp',
                        'value'    => '+62 819 9998 8900',
                        'link'     => 'https://wa.me/6281999988900',
                    ],
                ],
            ],

            'location_items' => [
                'en' => [
                    [
                        'title'           => 'Head Office',
                        'category'        => 'headOffice',
                        'address'         => '274 Hayam Wuruk Street, Denpasar, Bali - Indonesia 80239',
                        'google_maps_link' => '',
                        'map_embed_url'   => '',
                    ],
                    [
                        'title'           => 'Operational Office',
                        'category'        => 'operational',
                        'address'         => '818 Tukad Badung Street, Renon, Denpasar, Bali - Indonesia 80226',
                        'google_maps_link' => '',
                        'map_embed_url'   => '',
                    ],
                ],
                'id' => [
                    [
                        'title'           => 'Kantor Pusat',
                        'category'        => 'headOffice',
                        'address'         => 'Jalan Hayam Wuruk No. 274, Denpasar, Bali - Indonesia 80239',
                        'google_maps_link' => '',
                        'map_embed_url'   => '',
                    ],
                    [
                        'title'           => 'Kantor Operasional',
                        'category'        => 'operational',
                        'address'         => 'Jl. Tukad Badung No. 818, Renon, Denpasar, Bali - Indonesia 80226',
                        'google_maps_link' => '',
                        'map_embed_url'   => '',
                    ],
                ],
            ],

            // social_items — no translation, stored as plain JSON array
            'social_items' => [
                ['platform_name' => 'Instagram', 'icon_key' => 'instagram', 'url' => 'https://instagram.com/lasolasindonesia'],
                ['platform_name' => 'Facebook',  'icon_key' => 'facebook',  'url' => 'https://facebook.com/lasolasindonesia'],
                ['platform_name' => 'LinkedIn',  'icon_key' => 'linkedin',  'url' => 'https://linkedin.com/company/lasolasindonesia'],
                ['platform_name' => 'TikTok',    'icon_key' => 'tiktok',    'url' => 'https://tiktok.com/@lasolasindonesia'],
            ],
        ]);

        // ─── Footer Setting ───────────────────────────────────────────────────
        FooterSetting::truncate();

        FooterSetting::create([
            'footer_link_heading' => [
                'en' => 'Quick Links',
                'id' => 'Link Cepat',
            ],
            'footer_service_heading' => [
                'en' => 'Our Services',
                'id' => 'Layanan Kami',
            ],
            'footer_location_heading' => [
                'en' => 'Visit Us',
                'id' => 'Kunjungi Kami',
            ],

            // footer_services — stored per locale (title is translatable)
            'footer_services' => [
                'en' => [
                    ['title' => 'Explora Journeys', 'url' => '/onboarding/explora-journeys'],
                    ['title' => 'MSC Cruises',      'url' => '/onboarding/msc-cruises'],
                    ['title' => 'Turkey',            'url' => '/onboarding/turkey'],
                    ['title' => 'Bulgaria',          'url' => '/onboarding/bulgaria'],
                ],
                'id' => [
                    ['title' => 'Explora Journeys', 'url' => '/onboarding/explora-journeys'],
                    ['title' => 'MSC Cruises',      'url' => '/onboarding/msc-cruises'],
                    ['title' => 'Turki',             'url' => '/onboarding/turkey'],
                    ['title' => 'Bulgaria',          'url' => '/onboarding/bulgaria'],
                ],
            ],

            'footer_left_description' => [
                'en' => 'Official Recruitment Agency',
                'id' => 'Agensi Perekrutan Resmi',
            ],

            'footer_brand_logos' => [], // logos are uploaded via admin panel

            'footer_copyright_text' => [
                'en' => 'Copyright © :year PT. Las Olas Indonesia | All Rights Reserved.',
                'id' => 'Hak Cipta © :year PT. Las Olas Indonesia | Seluruh Hak Dilindungi Undang-Undang.',
            ],
        ]);
    }
}
