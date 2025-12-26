<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Nasional',
                'description' => 'Berita terkini seputar peristiwa, kebijakan, dan isu penting di tingkat nasional di Indonesia.'
            ],
            [
                'name' => 'Daerah',
                'description' => 'Informasi terbaru mengenai peristiwa, budaya, dan perkembangan di berbagai daerah di Indonesia.'
            ],
            [
                'name' => 'Politik',
                'description' => 'Kabar dan analisis seputar dinamika politik, pemilu, kebijakan pemerintah, dan aktivitas partai politik.'
            ],
            [
                'name' => 'Hukum',
                'description' => 'Berita mengenai peraturan, kasus hukum, dan perkembangan di bidang yustisi serta penegakan hukum.'
            ],
            [
                'name' => 'Kriminal',
                'description' => 'Laporan terbaru tentang kejahatan, investigasi polisi, dan kasus kriminal yang terjadi di masyarakat.'
            ],
            [
                'name' => 'Olahraga',
                'description' => 'Informasi seputar dunia olahraga, termasuk hasil pertandingan, prestasi atlet, dan event olahraga terkini.'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description']
            ]);
        }
    }
}
