<?php

namespace Database\Seeders\Catalog\Product;

use Database\Factories\Catalog\Product\TypeFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $typeNames = [
            'Рибай',
            'Стейки',
            'Black Angus',
            'Стриплойн',
        ];

        foreach ($typeNames as $name) {
            TypeFactory::new()->create(['name' => $name]);
        }
    }
}
