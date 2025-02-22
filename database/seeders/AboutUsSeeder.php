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
       
        
        AboutUs::updateOrCreate(['titulo' => 'TITULO-NOSOTROS'], [
            'descripcion' => 'Nuestra Misión: Transformar el Aprendizaje Médico'
        ]);
       
        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCION-NOSOTROS'], [
            'descripcion' => 'Conectamos a estudiantes y médicos con conocimientos actualizados, herramientas prácticas y expertos de renombre. Nuestro objetivo es ayudarte a alcanzar tus metas profesionales a través de una experiencia de aprendizaje única y efectiva.'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCIONSECOND-NOSOTROS'], [
            'descripcion' => 'Somos más que una plataforma de cursos. Somos tu aliado en cada etapa de tu carrera médica'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'IMAGEN-NOSOTROS'], [
            'imagen' => 'images/academia/bannerf.png'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'TITULO-CONTACTO'], [
            'descripcion' => 'iEstamos a Solo un Mensaje de Distancia'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'IMAGEN-CONTACTO'], [
            'imagen' => 'images/academia/imagencontacto.png'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'TITULO-FAQ'], [
            'descripcion' => 'FAQ: Encuentra la Información que Buscas'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'DESCRIPCION-FAQ'], [
            'descripcion' => 'Respuestas a las Preguntas Más Comunes'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'TITULO-RECURSOS'], [
            'descripcion' => 'Recursos Útiles para Tu Formación Médica'
        ]);

        AboutUs::updateOrCreate(['titulo' => 'DESCRIPTION-RECURSOS'], [
            'descripcion' => 'Accede a documentos oficiales, guías y materiales diseñados para apoyar tu desarrollo como profesional de la salud.'
        ]);
      
    }
}
