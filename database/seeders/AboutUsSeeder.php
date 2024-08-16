<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::updateOrCreate(['titulo' => 'TITULO'], [
            'descripcion' => 'Innovación y Liderazgo en la Gestión Pública'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'OBJETIVO'], [
            'descripcion' => 'Nuestro objetivo es proporcionar formación de alta calidad a funcionarios y trabajadores del sector público, capacitándolos con los conocimientos necesarios para implementar acciones efectivas que contribuyan al desarrollo y mejora continua de las políticas públicas en el Perú. Nos comprometemos a ser líderes en educación y capacitación, impulsando la innovación y la ética en la gestión pública para generar un impacto positivo y duradero en nuestra sociedad'
        ]);
    }
}
