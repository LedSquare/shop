<?php

namespace Database\Seeders\Catalog;

use Database\Factories\Catalog\CatalogFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogTitles = [
            'Лопатка',
            'Толстый край',
            'Тонкий край',
            'Кострец',
            'Задок',
            'Грудинка',
            'Голяшка',
            'Покромка',
            'Пашина',
        ];

        foreach ($catalogTitles as $title) {
            CatalogFactory::new()->create(['title' => $title]);
        }
    }
}
