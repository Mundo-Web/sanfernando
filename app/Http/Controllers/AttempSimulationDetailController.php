<?php

namespace App\Http\Controllers;

use App\Models\AttempSimulationDetail;
use Exception;
use Illuminate\Http\Request;

class AttempSimulationDetailController extends BasicController
{
    public $model = AttempSimulationDetail::class;

    public function beforeSave(Request $request)
    {
        $body = $request->all();

        $already = $this->model::where('question_id', $request->question_id)
            ->where('attemp_id', $request->attemp_id)
            ->exists();

        if ($already) throw new Exception('Esta pregunta ya ha sido resuelta');

        return $body;
    }
}

