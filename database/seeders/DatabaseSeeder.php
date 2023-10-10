<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\Language::factory()->create([
            'label' => 'Русский',
            'code'  => 'ru',
        ]);

        \App\Models\Language::factory()->create([
            'label' => 'Английский',
            'code'  => 'en',
        ]);

        \App\Models\Currency::factory()->create([
            'label'         => 'Рубль',
            'code'          => 'rub',
            'exchange_rate' => 1
        ]);

        \App\Models\Currency::factory()->create([
            'label'         => 'Доллар',
            'code'          => 'usd',
            'exchange_rate' => 100
        ]);
    }
}
