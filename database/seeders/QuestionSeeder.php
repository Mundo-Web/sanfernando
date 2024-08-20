<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas = [
            ['id' => '6b9fef6a-99c3-402c-bcc7-6150fc7b1284', 'name' => '¿Qué es React?'],
            ['id' => 'cb02c4ae-b676-4c6b-a62d-2c1caffd7e97', 'name' => '¿Cómo se crea un componente en React?'],
            ['id' => '7e2d3f21-67eb-4f70-99b8-35e8ef676a6b', 'name' => '¿Qué es JSX?'],
            ['id' => 'e82a9e31-4f78-4786-83a5-c98cf0563d6a', 'name' => '¿Qué es un estado en React?'],
            ['id' => '4c3f75b8-8b0a-4e6b-b3fa-eed9f08e9a4e', 'name' => '¿Cuál es el uso de los hooks en React?'],
            ['id' => 'bb73f172-b2b7-4a79-8180-b21f08ec3f65', 'name' => '¿Qué hace el hook useState en React?'],
            ['id' => '2a9f88d4-4a29-4b68-8adf-3f237c76a7d4', 'name' => '¿Qué es Redux en el contexto de React?'],
            ['id' => '1e65338f-fb08-4713-8333-1486ed7bb6bc', 'name' => '¿Cómo se pasan datos de un componente padre a un componente hijo en React?'],
            ['id' => '0d06a50e-1f6f-4d53-9147-7eaf1891dd8c', 'name' => '¿Cuál es el propósito del hook useEffect en React?'],
            ['id' => 'f8473761-5c9d-4d8a-8df3-67fd5a31d154', 'name' => '¿Qué es el Context API en React?']
        ];

        foreach ($preguntas as $pregunta) {
            Question::updateOrCreate(['id' => $pregunta['id']], [
                'module_id' => '9b1efdfa-47a6-4a28-8e1f-7f6baf1d0a2d',
                'name' => $pregunta['name']
            ]);
        }
    }
}
