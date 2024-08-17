<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

class ModuleController extends BasicController
{
  public $model = Module::class;
  public $reactView = 'Admin/Modules';

  public function setReactViewProperties()
  {
    $courses = Products::select()
      ->where('status', true)
      ->where('visible', true)
      ->get();

    return [
      'courses' => $courses
    ];
  }

  public function byCourse (Request $request, string $course) {
    $response = Response::simpleTryCatch(function (Response $response) use ($request, $course) {
      $modules = Module::where('course_id', $course)->get();
      return $modules;
    });

    return response($response->toArray(), $response->status);
  }
}
