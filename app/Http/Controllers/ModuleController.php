<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Products;
use App\Models\Source;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SoDe\Extend\Crypto;
use SoDe\Extend\Response;
use SoDe\Extend\Text;

class ModuleController extends BasicController
{
  public $model = Module::class;
  public $reactView = 'Admin/Modules';
  public $softDeletion = false;

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

  public function beforeSave(Request $request)
  {
    $body = $request->all();

    if ($request->hasFile('source') && $request->source_type == 'image') {
      $source = $request->file('source');

      $route = 'sources/';
      $name = Crypto::randomUUID() . '.' . $source->getClientOriginalExtension();
      if (!file_exists($route)) {
        mkdir($route, 0777, true);
      }
      Storage::put($route . $name, file_get_contents($source));

      $body['source'] = $name;
    } else if ($request->source_type == 'video') {
      $body['source'] = Text::getYTVideoId($body['source']);
    }

    return $body;
  }

  public function afterSave(Request $request, object $jpa)
  {
    $sources = explode(',', $request->sources);
    Source::whereIn('id', $sources)
      ->update([
        'module_id' => $jpa->id
      ]);
  }

  public function byCourse(Request $request, string $course)
  {
    $response = Response::simpleTryCatch(function (Response $response) use ($request, $course) {
      $modules = Module::with(['sources', 'questions', 'questions.answers'])
        ->where('course_id', $course)
        ->get();
      return $modules;
    });

    return response($response->toArray(), $response->status);
  }

  public function redirectModule(Request $request, string $courseId)
  {
    try {
      $module = Module::select([
        'modules.*'
      ])
        ->join('products AS course', 'course.id', 'modules.course_id')
        ->where('course.uuid', $courseId)
        ->orderBy('order', 'ASC')
        ->first();
      if (!$module) throw new Exception('El id enviado no tiene modulos activos');
      return redirect("/micuenta/session/{$courseId}/{$module->id}");
    } catch (\Throwable $th) {
      return redirect('/micuenta');
    }
  }
}
