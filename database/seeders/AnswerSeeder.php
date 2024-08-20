<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $respuestas = [
            [
                'question_id' => '6b9fef6a-99c3-402c-bcc7-6150fc7b1284', // ¿Qué es React?
                'answers' => [
                    ['name' => 'Una biblioteca de JavaScript para construir interfaces de usuario', 'correct' => true],
                    ['name' => 'Un lenguaje de programación', 'correct' => false],
                    ['name' => 'Un marco de trabajo (framework) para aplicaciones móviles', 'correct' => false],
                    ['name' => 'Un entorno de ejecución de JavaScript', 'correct' => false],
                    ['name' => 'Una biblioteca de JavaScript para gestionar el DOM', 'correct' => true],
                    ['name' => 'Un servidor web', 'correct' => false],
                ]
            ],
            [
                'question_id' => 'cb02c4ae-b676-4c6b-a62d-2c1caffd7e97', // ¿Cómo se crea un componente en React?
                'answers' => [
                    ['name' => 'Usando una función o una clase', 'correct' => true],
                    ['name' => 'Definiendo una variable con un HTML string', 'correct' => false],
                    ['name' => 'Mediante una función que retorna JSX', 'correct' => true],
                    ['name' => 'Escribiendo HTML directamente en el archivo JavaScript', 'correct' => false],
                    ['name' => 'Instalando un plugin especial en Node.js', 'correct' => false],
                    ['name' => 'Creando un archivo .html y vinculándolo a React', 'correct' => false],
                ]
            ],
            [
                'question_id' => '7e2d3f21-67eb-4f70-99b8-35e8ef676a6b', // ¿Qué es JSX?
                'answers' => [
                    ['name' => 'Una extensión de la sintaxis de JavaScript', 'correct' => true],
                    ['name' => 'Un nuevo lenguaje de programación', 'correct' => false],
                    ['name' => 'Una biblioteca de CSS', 'correct' => false],
                    ['name' => 'Un tipo de documento HTML', 'correct' => false],
                    ['name' => 'Un lenguaje de marcado para JavaScript', 'correct' => true],
                    ['name' => 'Una herramienta de construcción para React', 'correct' => false],
                ]
            ],
            [
                'question_id' => 'e82a9e31-4f78-4786-83a5-c98cf0563d6a', // ¿Qué es un estado en React?
                'answers' => [
                    ['name' => 'Un objeto que guarda información dinámica en un componente', 'correct' => true],
                    ['name' => 'Una variable global en JavaScript', 'correct' => false],
                    ['name' => 'Un método para definir estilos CSS en un componente', 'correct' => false],
                    ['name' => 'Una función que se ejecuta cuando el componente se monta', 'correct' => false],
                    ['name' => 'Una estructura que almacena datos que pueden cambiar con el tiempo', 'correct' => true],
                    ['name' => 'Una API externa para gestionar datos en la aplicación', 'correct' => false],
                ]
            ],
            [
                'question_id' => '4c3f75b8-8b0a-4e6b-b3fa-eed9f08e9a4e', // ¿Cuál es el uso de los hooks en React?
                'answers' => [
                    ['name' => 'Permitir el uso de estados y efectos en componentes funcionales', 'correct' => true],
                    ['name' => 'Crear rutas en aplicaciones React', 'correct' => false],
                    ['name' => 'Agregar bibliotecas de terceros a un componente', 'correct' => false],
                    ['name' => 'Manipular el DOM directamente', 'correct' => false],
                    ['name' => 'Ejecutar lógica de ciclo de vida en componentes funcionales', 'correct' => true],
                    ['name' => 'Importar módulos en un archivo JavaScript', 'correct' => false],
                ]
            ],
            [
                'question_id' => 'bb73f172-b2b7-4a79-8180-b21f08ec3f65', // ¿Qué hace el hook useState en React?
                'answers' => [
                    ['name' => 'Crea una variable de estado y su función para actualizarla', 'correct' => true],
                    ['name' => 'Agrega estilos CSS a un componente', 'correct' => false],
                    ['name' => 'Define un contexto global para la aplicación', 'correct' => false],
                    ['name' => 'Permite cambiar el estado de un componente de clase', 'correct' => false],
                    ['name' => 'Gestiona efectos secundarios en componentes funcionales', 'correct' => false],
                    ['name' => 'Inicializa un valor de estado en un componente funcional', 'correct' => true],
                ]
            ],
            [
                'question_id' => '2a9f88d4-4a29-4b68-8adf-3f237c76a7d4', // ¿Qué es Redux en el contexto de React?
                'answers' => [
                    ['name' => 'Una biblioteca para gestionar el estado global de la aplicación', 'correct' => true],
                    ['name' => 'Una herramienta para crear componentes en React', 'correct' => false],
                    ['name' => 'Un servidor para aplicaciones React', 'correct' => false],
                    ['name' => 'Un método para crear rutas en React', 'correct' => false],
                    ['name' => 'Un patrón de arquitectura para gestionar el estado de la aplicación', 'correct' => true],
                    ['name' => 'Una librería para hacer peticiones HTTP', 'correct' => false],
                ]
            ],
            [
                'question_id' => '1e65338f-fb08-4713-8333-1486ed7bb6bc', // ¿Cómo se pasan datos de un componente padre a un componente hijo en React?
                'answers' => [
                    ['name' => 'Usando props', 'correct' => true],
                    ['name' => 'Mediante el hook useState', 'correct' => false],
                    ['name' => 'A través del hook useEffect', 'correct' => false],
                    ['name' => 'Con el hook useContext', 'correct' => false],
                    ['name' => 'Por medio de estados globales', 'correct' => false],
                    ['name' => 'Mediante el uso de callbacks y props', 'correct' => true],
                ]
            ],
            [
                'question_id' => '0d06a50e-1f6f-4d53-9147-7eaf1891dd8c', // ¿Cuál es el propósito del hook useEffect en React?
                'answers' => [
                    ['name' => 'Realizar efectos secundarios en componentes funcionales', 'correct' => true],
                    ['name' => 'Actualizar el estado de un componente de clase', 'correct' => false],
                    ['name' => 'Gestionar los ciclos de vida en componentes funcionales', 'correct' => true],
                    ['name' => 'Definir rutas en aplicaciones React', 'correct' => false],
                    ['name' => 'Establecer conexiones con bases de datos', 'correct' => false],
                    ['name' => 'Renderizar componentes condicionalmente', 'correct' => false],
                ]
            ],
            [
                'question_id' => 'f8473761-5c9d-4d8a-8df3-67fd5a31d154', // ¿Qué es el Context API en React?
                'answers' => [
                    ['name' => 'Un sistema para pasar datos entre componentes sin props', 'correct' => true],
                    ['name' => 'Una API para gestionar estados locales en componentes', 'correct' => false],
                    ['name' => 'Una herramienta para optimizar el rendimiento de React', 'correct' => false],
                    ['name' => 'Una función para crear efectos secundarios', 'correct' => false],
                    ['name' => 'Una API para gestionar el estado global sin Redux', 'correct' => true],
                    ['name' => 'Un método para realizar peticiones HTTP', 'correct' => false],
                ]
            ]
        ];

        foreach ($respuestas as $respuesta) {
            foreach ($respuesta['answers'] as $answer) {
                Answer::updateOrCreate([
                    'name' => $answer['name'],
                    'question_id' => $respuesta['question_id'],
                ], [
                    'module_id' => '9b1efdfa-47a6-4a28-8e1f-7f6baf1d0a2d',
                    'correct' => $answer['correct']
                ]);
            }
        }
    }
}
