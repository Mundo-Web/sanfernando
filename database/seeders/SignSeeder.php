<?php

namespace Database\Seeders;

use App\Models\Sign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sign::updateOrCreate(['correlative' => 'left-sign'], [
            'sign_path' => 'images/img/left-sign.png',
            'name' => 'Leonardo Rivadeneyra',
            'occupation' => 'CEO'
        ]);
        Sign::updateOrCreate(['correlative' => 'middle-sign'], [
            'sign_path' => 'images/img/middle-sign.png',
            'name' => 'Grover Chavez',
            'occupation' => 'CEO'
        ]);
        Sign::updateOrCreate(['correlative' => 'right-sign'], [
            'sign_path' => 'images/img/right-sign.jpg',
            'name' => 'Julio Izquierdo',
            'occupation' => 'Director'
        ]);
    }
}
