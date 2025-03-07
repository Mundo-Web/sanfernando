<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ClientLogos;
use App\Models\Discount;
use App\Models\Galerie;
use App\Models\Major;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
use App\Models\ProductTag;
use App\Models\QuestionExam;
use App\Models\ResponseExam;
use App\Models\SaleDetail;
use App\Models\Specifications;
use App\Models\SubCategory;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SoDe\Extend\File;
use SoDe\Extend\JSON;
use SoDe\Extend\Text;

class SaveItems implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private array $items;
  private string $image_route_pattern;

  public function __construct(array $items, string $image_route_pattern)
  {
    $this->items = $items;
    $this->image_route_pattern = $image_route_pattern;
  }

  public function handle()
  {

    $path2search = "./storage/images/questions/";
    // $path2size = "storage/images/sizes/";


    $images = [];
    try {
      $images = File::scan($path2search);
    
    } catch (\Throwable $th) {
      dump($th->getMessage());
    }


    try {
     
      $esCount = Major::count();
      $qsCount = QuestionExam::count();
      $rsCount = ResponseExam::count();
      
      // Major::query()->delete();
      // QuestionExam::query()->delete();
      // ResponseExam::query()->delete();
      

      dump("Productos: {$esCount} - Productos: {$qsCount} - Productos: {$rsCount}");
      
    } catch (\Throwable $th) {
      dump('Error: ' . $th->getMessage());
    }

    dump('Inició la carga masiva: ' . count($this->items) . ' items');

    foreach ($this->items as $item) {
      try {
        $imageRoute = $item[0];
        
        $productImages = \array_filter($images, function ($image) use ($imageRoute) {
          $fileName = pathinfo($image, PATHINFO_FILENAME);
          return $fileName === $imageRoute;
        });

        // Searching or Creating a Category
        $majorJpa = Major::updateOrCreate([
          'name' => $item[1]
        ], [
          'name' => $item[1],
          'visible' => 1,
          'status' => 1,
        ]);
        

        $questionJpa = QuestionExam::updateOrCreate([
          'question' => $item[2],
        ], [
          'cod_pregunta' => $item[0] ?? null,
          'question' => $item[2],
          'imagen' => null,
          'major_id' => $majorJpa->id,
          'status' => 1,
        ]);


        $responseJpa = ResponseExam::updateOrCreate([
          'response' => $item[3],
          'question_id' => $questionJpa->id,
        ], [
          'response' => $item[3],
          'is_correct' => $item[4],
          'question_id' => $questionJpa->id,
          'status' => 1,
        ]);


        if (!empty($productImages)) {
          $firstImage = 'storage/images/questions/' . reset($productImages);
          if (file_exists(public_path($firstImage))) {
              $questionJpa->imagen = $firstImage;
              $questionJpa->save();
          }
        }

        dump("{$questionJpa->question}\n {$responseJpa->response} \n {$responseJpa->is_correct} \n {$questionJpa->imagen}");
      } catch (\Throwable $th) {
        dump($item[0] . ': ' . $th->getMessage());
      }
    }

    dump('Finalizó la carga masiva');
  }
}
