<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('profile.vision', 'Menjadi portal berita online terdepan dan terpercaya di Indonesia yang memberikan informasi berkualitas, akurat, dan berimbang untuk mencerdaskan bangsa.');
        $this->migrator->add('profile.mission', "<p>Menyajikan berita yang faktual, berimbang, dan dapat dipertanggungjawabkan</p><p>Memberikan informasi yang edukatif dan bermanfaat bagi masyarakat</p><p>Menjunjung tinggi kode etik jurnalistik dan nilai-nilai kebenaran</p><p>Mendukung transparansi dan akuntabilitas publik</p>");
    }
};
