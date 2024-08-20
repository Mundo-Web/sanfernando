<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

class AnswerController extends BasicController
{
  public $model = Answer::class;
  public $softDeletion = false;

  public function afterSave(Request $request, object $jpa)
  {
    return $jpa;
  }

  public function status(Request $request)
  {
    $response = Response::simpleTryCatch(function (Response $response) use ($request) {
      $this->model::where('id', $request->id)
        ->update([
          'correct' => $request->status
        ]);
      return $this->model::find($request->id);
    });
    return response($response->toArray(), $response->status);
  }
}
