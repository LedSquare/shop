<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\Catalog\CatalogFactory;
use Database\Factories\Localization\LangFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        MoonshineUser::factory()->create([
            'email' => 'admin@mail.com',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'moonshine_user_role_id' => 1,
        ]);

        LangFactory::new()->create([
            'title' => 'en',
        ]);

        CatalogFactory::new()->create([
            'title' => 'Срез'
        ]);
    }
}
