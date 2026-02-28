<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    public function run(): void
    {
        ContactSetting::truncate();

        ContactSetting::create([
            'banner_image' => null,

            'banner_title' => [
                'en' => 'Contact Us',
                'id' => 'Hubungi Kami',
            ],

            'contact_heading' => [
                'en' => 'Contact Us',
                'id' => 'Hubungi Kami',
            ],

            'contact_description' => [
                'en' => 'Contact us for registration information or collaboration. We are ready to assist with professional services and answer your questions.',
                'id' => 'Hubungi kami untuk informasi pendaftaran atau kerjasama. Kami siap membantu dengan layanan profesional.',
            ],

            // SEO
            'seo_title' => [
                'en' => 'Contact Us | Las Olas Indonesia',
                'id' => 'Hubungi Kami | Las Olas Indonesia',
            ],
            'seo_description' => [
                'en' => 'Get in touch with Las Olas Indonesia for registration information, collaboration opportunities, or any inquiries. We are here to help.',
                'id' => 'Hubungi Las Olas Indonesia untuk informasi pendaftaran, peluang kerjasama, atau pertanyaan lainnya. Kami siap membantu Anda.',
            ],
            'seo_keywords' => [
                'en' => 'contact, inquiry, collaboration, registration, Las Olas Indonesia',
                'id' => 'kontak, pertanyaan, kerjasama, pendaftaran, Las Olas Indonesia',
            ],
            'seo_og_image' => null,
        ]);
    }
}
