<?php

namespace Database\Seeders;

use App\Models\CompanyIdentity;
use App\Models\FooterSetting;
use Illuminate\Database\Seeder;

class GlobalSettingsSeeder extends Seeder
{
        private function footerBrandPath(string $filename): string
    {
        return 'footer/brands/' . $filename;
    }
    public function run(): void
    {
        // ─── Company Identity ─────────────────────────────────────────────────
        CompanyIdentity::truncate();

        CompanyIdentity::create([
            'company_name' => 'PT. Las Olas Indonesia',

            'tagline' => [
                'en' => 'Connecting Talents to The World.',
                'id' => 'Connecting Talents to The World.',
            ],
            
            'floating_whatsapp_link' => 'https://wa.me/6281999988900',

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
                     'address'         => 'Jalan Hayam Wuruk No. 274, Denpasar, Bali - Indonesia 80239',
                        'google_maps_link' => 'https://maps.app.goo.gl/f7RW2EMeQQqXG9ZH8',
                        'map_embed_url'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.236273999955!2d115.23827738366776!3d-8.669066169148937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2405fb087eefd%3A0xacbd8d9a47566a14!2sMediterranean%20Bali%20-%20Denpasar%20(Headquarters)!5e0!3m2!1sid!2sid!4v1772507865632!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
                    ],
                    [
                        'title'           => 'Operational Office',
                        'category'        => 'operational',
                        'address'         => 'Jl. Bypass Ngurah Rai No. 50, Kesiman Petilan, Denpasar Timur, Denpasar, Bali',
                        'google_maps_link' => 'https://maps.app.goo.gl/t325PB33dbUqcV6v9',
                        'map_embed_url'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.9819083202246!2d115.23541537568805!3d-8.693267291355237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2418e6203fc35%3A0x2726eb57a9dd871!2sPT.%20Las%20Olas%20Indonesia!5e0!3m2!1sid!2sid!4v1772511977569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
                    ],
                ],
                'id' => [
                    [
                        'title'           => 'Kantor Pusat',
                        'category'        => 'headOffice',
                        'address'         => 'Jalan Hayam Wuruk No. 274, Denpasar, Bali - Indonesia 80239',
                        'google_maps_link' => 'https://maps.app.goo.gl/f7RW2EMeQQqXG9ZH8',
                        'map_embed_url'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.236273999955!2d115.23827738366776!3d-8.669066169148937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2405fb087eefd%3A0xacbd8d9a47566a14!2sMediterranean%20Bali%20-%20Denpasar%20(Headquarters)!5e0!3m2!1sid!2sid!4v1772507865632!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
                    ],
                    [
                        'title'           => 'Kantor Operasional',
                        'category'        => 'operational',
                        'address'         => 'Jl. Bypass Ngurah Rai No. 50, Kesiman Petilan, Denpasar Timur, Denpasar, Bali',
                        'google_maps_link' => 'https://maps.app.goo.gl/t325PB33dbUqcV6v9',
                        'map_embed_url'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.9819083202246!2d115.23541537568805!3d-8.693267291355237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2418e6203fc35%3A0x2726eb57a9dd871!2sPT.%20Las%20Olas%20Indonesia!5e0!3m2!1sid!2sid!4v1772511977569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
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
                    ['title' => 'Explora Journeys', 'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'MSC Cruises',      'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Turkey',            'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Bulgaria',          'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Maldives',          'url' => 'https://tms.lasolas.id/jobs'],
                ],
                'id' => [
                    ['title' => 'Explora Journeys', 'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'MSC Cruises',      'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Turki',             'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Bulgaria',          'url' => 'https://tms.lasolas.id/jobs'],
                    ['title' => 'Maldives',          'url' => 'https://tms.lasolas.id/jobs'],
                ],
            ],

            'footer_left_description' => [
                'en' => 'Official Recruitment Agency',
                'id' => 'Agensi Perekrutan Resmi',
            ],

            'footer_brand_logos' => [
                ['logo_image' => $this->footerBrandPath('explora_journey_white.webp')],
                ['logo_image' => $this->footerBrandPath('msc_white.webp')],
            ],

            'footer_copyright_text' => [
                'en' => 'Copyright © :year PT. Las Olas Indonesia | All Rights Reserved.',
                'id' => 'Hak Cipta © :year PT. Las Olas Indonesia | Seluruh Hak Dilindungi Undang-Undang.',
            ],
        ]);
    }
}
