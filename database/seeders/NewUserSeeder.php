<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@sanfernandoacademy.com'
        ],[
            'name' => 'San Fernando Academy',
            'email' => 'admin@sanfernandoacademy.com',
            'password' => Hash::make('sanfernandoacademy2025#'),
        ])->assignRole('Admin');
    }
}
