<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Strength;

class BeneficiosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Strength::updateOrCreate(['titulo' => 'Desarrollo Profesional'], [
      'descripcionshort' => 'Oportunidades para crecer y mejorar en tu carrera en la gestión pública.'
    ]);
    Strength::updateOrCreate(['titulo' => 'Acceso a Expertos'], [
      'descripcionshort' => 'Acceso directo a profesionales y académicos con amplia experiencia en el sector.'
    ]);
    Strength::updateOrCreate(['titulo' => 'Red de Contactos'], [
      'descripcionshort' => 'Construcción de una red sólida de contactos en el ámbito público y privado.'
    ]);
    Strength::updateOrCreate(['titulo' => 'Formación Integral'], [
      'descripcionshort' => 'Programas educativos que abarcan todos los aspectos de la gestión pública.'
    ]);
  }
}
