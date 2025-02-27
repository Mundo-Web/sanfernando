<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Galerie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Products;
use App\Models\Specifications;
use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use SoDe\Extend\File;
use SoDe\Extend\Text;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    use Importable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new class implements ToModel
        {
            public function model(array $row)
            {
                if (!is_numeric($row[0])) return null;

                $category = Category::updateOrCreate(['id' => $row[1]], [
                    'id' => $row[1],
                    // 'name' => $row[2],
                    // 'slug' => str_replace(' ', '-', strtolower($row[2])),
                    'url_image' => 'images/img/',
                    'name_image' => 'noimagen.jpg'
                ]);

                if ($row[3] == '') $subcategory = new SubCategory();
                else {
                    $subcategory = SubCategory::updateOrCreate(['id' => $row[2]], [
                        'category_id' => $category->id,
                        // 'name' => $row[4],
                        // 'slug' => str_replace(' ', '-', strtolower($row[4])),
                        'status' => true,
                        'visible' => true
                    ]);
                }

                $price = str_replace(',', '.', Text::keep($row[8] ?? '', '0123456789,'));
                $cost = str_replace(',', '.', Text::keep($row[11] ?? '', '0123456789,'));
                $discount = str_replace(',', '.', Text::keep($row[7] ?? '', '0123456789,'));

                $product = Products::updateOrCreate(['sku' => $row[3]], [
                    'uuid' => Str::uuid(),
                    'categoria_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'sku' => $row[3],
                    'producto' => $row[4],
                    'extract' => $row[5],
                    'description' => $row[6],
                    'description2' => $row[9],
                    'que_lograras' => $row[10],
                    'descuento' => $discount ? $discount : 0,
                    'precio' => $price ? $price : 0,
                    'costo_x_art' => $cost ? $cost : 0,
                    'stock' => 1,
                    'imagen' => 'images/img/noimagen.jpg',
                    'imagen_ambiente' => 'images/img/noimagen.jpg',
                    'status' => true,
                    'visible' => true
                ]);

                $path2search = "public/storage/images/products/{$category->id}/";

                $images = [];
                try {
                    $images = File::scan($path2search, [
                        'type' => 'file',
                        'startsWith' => $product->sku,
                        'desc' => true
                    ]);
                } catch (\Throwable $th) {}

                foreach ($images as $key => $image_name) {
                    $image = "storage/images/products/{$category->id}/{$image_name}";
                    if ($key == 0) $product->imagen = $image;
                    if ($key == 1) $product->imagen_ambiente = $image;
                    else Galerie::create([
                        'product_id' => $product->id,
                        'imagen' => $image
                    ]);
                }
                $product->save();
            }
        }, 'storage/app/utils/Products.xlsx');
    }
}
