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
            ['id' => '3b1df1d1-c1e5-4099-ae60-33b88b835c3b', 'name' => '¿Qué es el estado (state) en React?'],
            ['id' => 'e073d7e4-d46b-4b02-bf3b-4df3e74df540', 'name' => '¿Cómo se pasa información entre componentes en React?'],
            ['id' => 'f5b2cc93-17ef-485c-9462-5f3e423d5075', 'name' => '¿Qué es JSX en React?'],
            ['id' => 'ae56f0b8-78ef-4a36-93e4-7e9a3b76b6d8', 'name' => '¿Qué función tiene el Hook useState?'],
            ['id' => 'b3a0e6d7-2e1a-43a8-bc37-5c9b8b1e9640', 'name' => '¿Cómo se maneja el ciclo de vida de un componente en React?'],
            ['id' => '2d8e1e4e-1fd9-432f-8cde-1e3b0e2d071c', 'name' => '¿Qué es un Hook en React?'],
            ['id' => 'ce74e97e-312c-4b7e-a82e-2290aabbec0c', 'name' => '¿Cómo se puede optimizar el rendimiento en React?'],
            ['id' => 'abc8f4d9-2ef6-4f4d-918a-9d10eb0f383d', 'name' => '¿Qué diferencia hay entre un componente funcional y un componente de clase en React?']
        ];

        foreach ($preguntas as $pregunta) {
            Question::updateOrCreate(['id' => $pregunta['id']], [
                'module_id' => '9b1efdfa-47a6-4a28-8e1f-7f6baf1d0a2d',
                'name' => $pregunta['name']
            ]);
        }
    }
}
