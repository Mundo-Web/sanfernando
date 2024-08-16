<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $icons = [
            [
                'name' => 'Clock',
                'path' => 'images/iconos/Clock.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 52, 5),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 57, 48),
            ],
            [
                'name' => 'CurrencyDollar',
                'path' => 'images/iconos/CurrencyDollarSimple.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 5),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 5),
            ],
            [
                'name' => 'Envelope',
                'path' => 'images/iconos/Envelope.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 16),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 16),
            ],
            [
                'name' => 'facebook',
                'path' => 'images/iconos/facebook.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
            [
                'name' => 'Monitor',
                'path' => 'images/iconos/Monitor.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
            [
                'name' => 'Notebook',
                'path' => 'images/iconos/Notebook.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
            [
                'name' => 'Stack',
                'path' => 'images/iconos/Stack.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
            [
                'name' => 'Trophy',
                'path' => 'images/iconos/Trophy.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
            [
                'name' => 'whatsapp',
                'path' => 'images/iconos/whatsapp.png',
                'created_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
                'updated_at' => Carbon::create(2024, 8, 16, 12, 58, 32),
            ],
        ];

        DB::table('icons')->insert($icons);
    }
}