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
        AboutUs::updateOrCreate(['titulo' => 'INICIO-FIN'], [
            'descripcion' => '2007-2021'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'TITULO-OBJETIVO'], [
            'descripcion' => 'Compartimos conocimientos con el mundo'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCION-OBJETIVO'], [
            'descripcion' => 'Nuestro objetivo es proporcionar formación de alta calidad a funcionarios y trabajadores del sector público, capacitándolos con los conocimientos necesarios para implementar acciones efectivas que contribuyan al desarrollo y mejora continua de las políticas públicas en el Perú. Nos comprometemos a ser líderes en educación y capacitación, impulsando la innovación y la ética en la gestión pública para generar un impacto positivo y duradero en nuestra sociedad'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'TITULO-MISION'], [
            'descripcion' => 'Nuestra misión de mil millones suena audaz, y estamos de acuerdo'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCION-MISION'], [
            'descripcion' => 'Nuestro objetivo es proporcionar formación de alta calidad a funcionarios y trabajadores del sector público, capacitándolos con los conocimientos necesarios para implementar acciones efectivas que contribuyan al desarrollo y mejora continua de las políticas públicas en el Perú.'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'TITULO-GALERIA'], [
            'descripcion' => 'Llevamos aquí casi 17 años'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCION-GALERIA'], [
            'descripcion' => 'En estos casi 17 años, hemos sido testigos de innumerables momentos que reflejan nuestro compromiso con la excelencia en la gestión pública. Nuestra galería captura la esencia de nuestros logros, eventos, y la dedicación de aquellos que han formado parte de este camino. Explora nuestros recuerdos y descubre cómo hemos crecido junto a nuestros alumnos y colaboradores.'
        ]);
        AboutUs::updateOrCreate(['titulo' => 'CURSOS'], ['descripcion' => '6.3k']);
        AboutUs::updateOrCreate(['titulo' => 'ESTUDIANTES'], ['descripcion' => '26k']);
        AboutUs::updateOrCreate(['titulo' => 'INSTRUCTORES'], ['descripcion' => '+20']);
        AboutUs::updateOrCreate(['titulo' => 'TASA-EXITO'], ['descripcion' => '99.9%']);
        AboutUs::updateOrCreate(['titulo' => 'EMPRESAS'], ['descripcion' => '57']);
    }
}
