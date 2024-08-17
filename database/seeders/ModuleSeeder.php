<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Module::updateOrCreate([
      'id' => '1a7bfcbe-0819-4e18-8d9f-9ad29f7340c2'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Introducción a React',
      'description' => 'Una introducción básica a los conceptos fundamentales de React.',
      'source_type' => 'video',
      'source' => 'KEpG6oTptYo',
      'order' => 1
    ]);

    Module::updateOrCreate([
      'id' => 'd4f5a7c6-0f89-4f67-b3c3-b1e2cb1b3c0a'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'JSX y Componentes',
      'description' => 'Exploración de JSX y la creación de componentes en React.',
      'source_type' => 'video',
      'source' => '7ShHDDAWG2I',
      'order' => 2
    ]);

    Module::updateOrCreate([
      'id' => '8c3fae36-5d89-4c69-9a1f-80aaf91bc7c4'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Estados y Props en React',
      'description' => 'Profundización en el manejo de estados y props dentro de componentes React.',
      'source_type' => 'video',
      'source' => 'zpZup1Ak9yM',
      'order' => 3
    ]);

    Module::updateOrCreate([
      'id' => 'bafd3e69-21e1-4622-a3f1-1e7d5bcf9e5b'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Ciclo de Vida de Componentes',
      'description' => 'Entendiendo el ciclo de vida de los componentes en React y cómo gestionarlo.',
      'source_type' => 'video',
      'source' => '6Ma-l8rS2RU',
      'order' => 4
    ]);

    Module::updateOrCreate([
      'id' => '4deaa245-1108-4232-98b4-9f9c60b39345'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Fundamentos de React',
      'description' => 'Un breve examen para evaluar tu conocimiento sobre los fundamentos de React.',
      'source_type' => 'video',
      'source' => 'A0f7bzP3-Zg',
      'order' => 5
    ]);

    Module::updateOrCreate([
      'id' => '0b7fc9db-7f19-42cf-8c35-8a2e0e55f3f2'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Manejo de Eventos en React',
      'description' => 'Aprende cómo manejar eventos en componentes React.',
      'source_type' => 'video',
      'source' => 'x-AjSnrA2Co',
      'order' => 6
    ]);

    Module::updateOrCreate([
      'id' => '70a4b7fb-e6a1-4c4a-8edc-2a8e3a8a3d68'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Renderizado Condicional y Listas',
      'description' => 'Cómo renderizar condicionalmente y manejar listas en React.',
      'source_type' => 'video',
      'source' => 'qhNpI6DFwWE',
      'order' => 7
    ]);

    Module::updateOrCreate([
      'id' => 'd5a2892e-f2b6-4e88-b314-4589b6b2b920'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Uso de Formularios en React',
      'description' => 'Construcción y validación de formularios en React.',
      'source_type' => 'video',
      'source' => '9U1XW3g-xUw',
      'order' => 8
    ]);

    Module::updateOrCreate([
      'id' => '3f7f1c2b-df5a-42fa-bf3b-5f6f1f3e3a2b'
    ], [
      'course_id' => 1,
      'type' => 'session',
      'name' => 'Hooks Básicos en React',
      'description' => 'Introducción al uso de Hooks en React.',
      'source_type' => 'video',
      'source' => 'TGaIYGhMl0M',
      'order' => 9
    ]);

    Module::updateOrCreate([
      'id' => '9b1efdfa-47a6-4a28-8e1f-7f6baf1d0a2d'
    ], [
      'course_id' => 1,
      'type' => 'final-exam',
      'name' => 'Dominio de React',
      'description' => 'Examen final para evaluar tu dominio de React y sus conceptos clave.',
      'source_type' => 'video',
      'source' => 'EhRfM3KJXfA',
      'order' => 10
    ]);
  }
}
