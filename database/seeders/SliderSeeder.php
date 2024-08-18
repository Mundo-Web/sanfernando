<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class SliderSeeder extends Seeder
{
    use Importable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Excel::import(
            new class implements ToModel
            {
                public function model(array $row)
                {
                    if (!is_numeric($row[0])) return null;

                    Slider::updateOrCreate([
                        'id' => $row[0]
                    ], [
                        'id' => $row[0],
                        'title' => $row[1],
                        'description' => $row[2],
                        'url_image' => 'images/',
                        'name_image' => 'banner-' . $row[0] . '.jpg',
                        'botontext1' => 'DIPLOMADOS',
                        'link1' => '/catalogoGestion?category=diploma',
                        'botontext2' => 'CURSOS',
                        'link2' => '/catalogoGestion?category=courses',
                    ]);
                }
            },
            'storage/app/utils/Sliders.xlsx'
        );
    }
}
