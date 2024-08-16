<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::updateOrCreate(['name' => 'Laura Pérez'], [
            'testimonie' => 'Los cursos de esta escuela han sido fundamentales para mi crecimiento profesional. Los profesores son realmente expertos y se nota la pasión que tienen por enseñar.',
            'visible' => true,
            'status' => true
        ]);
        Testimony::updateOrCreate(['name' => 'Carlos Ramírez'], [
            'testimonie' => 'La calidad de los contenidos es excelente, y los conocimientos adquiridos me han permitido mejorar mi desempeño en el sector público.',
            'visible' => true,
            'status' => true
        ]);
        Testimony::updateOrCreate(['name' => 'Ana Torres'], [
            'testimonie' => 'Estoy muy satisfecha con la formación recibida. Las herramientas y técnicas aprendidas son directamente aplicables en mi trabajo diario.',
            'visible' => true,
            'status' => true
        ]);
        Testimony::updateOrCreate(['name' => 'Jorge Fernández'], [
            'testimonie' => 'La metodología de enseñanza es muy práctica y efectiva. He logrado entender conceptos complejos de una manera sencilla y aplicable.',
            'visible' => true,
            'status' => true
        ]);
        Testimony::updateOrCreate(['name' => 'María Gómez'], [
            'testimonie' => 'Recomiendo estos cursos a cualquiera que quiera avanzar en su carrera en la gestión pública. La experiencia ha sido muy enriquecedora.',
            'visible' => true,
            'status' => true
        ]);
    }
}
