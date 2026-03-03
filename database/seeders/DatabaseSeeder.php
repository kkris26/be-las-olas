<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ── Admin user ────────────────────────────────────────────────────
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@admin.com',
                'username' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        // ── CMS content ───────────────────────────────────────────────────
        $this->call(HomePageSeeder::class);
        $this->call(AboutPageSeeder::class);

        // ── Page Settings ─────────────────────────────────────────────────
        $this->call(OnboardingSettingSeeder::class);
        $this->call(ArticleSettingSeeder::class);
        $this->call(NewsSettingSeeder::class);
        $this->call(ContactSettingSeeder::class);

        // ── Global Settings ─────────────────────────────────────────────────
        $this->call(GlobalSettingsSeeder::class);

        // ── News Management ──────────────────────────────────────────────────
        $this->call(NewsSystemSeeder::class);

        // ── Onboarding Management ────────────────────────────────────────────
        $this->call(OnboardingSystemSeeder::class);

        // ── Article Management ───────────────────────────────────────────────
        $this->call(ArticleSystemSeeder::class);

        // ── Section Settings, Testimonials & Team Members ────────────────────
        $this->call(SectionAndContentSeeder::class);

        // ── Service Lists ─────────────────────────────────────────────────────
        $this->call(CruiseServiceSeeder::class);
        $this->call(LandServiceSeeder::class);
    }
}

