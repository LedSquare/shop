<?php

namespace Database\Seeders\Catalog;

use Database\Factories\Catalog\CatalogFactory;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogNames = [
            'Лопатка',
            'Толстый край',
            'Тонкий край',
            'Кострец',
            'Задок',
            'Грудинка',
            'Голяшка',
            'Покромка',
            'Пашина',
            'Субпродукты',
        ];

        foreach ($catalogNames as $name) {
            CatalogFactory::new()->create(['name' => $name]);
        }
    }
}
