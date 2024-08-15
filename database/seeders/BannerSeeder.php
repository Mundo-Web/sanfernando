<?php

namespace Database\Seeders;

use App\Models\Banners;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class BannerSeeder extends Seeder
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

                    Banners::updateOrCreate([
                        'id' => $row[0]
                    ], [
                        'id' => $row[0],
                        'title' => $row[1],
                        'description' => $row[2],
                        'image' => 'images/banner-' . $row[0] . '.jpg',
                    ]);
                }
            },
            'storage/app/utils/Banners.xlsx'
        );
    }
}
