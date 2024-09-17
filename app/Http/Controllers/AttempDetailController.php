<?php

namespace App\Http\Controllers;

use App\Models\AttempDetail;
use App\Http\Requests\StoreAttempDetailRequest;
use App\Http\Requests\UpdateAttempDetailRequest;
use Exception;
use Illuminate\Http\Request;

class AttempDetailController extends BasicController
{
    public $model = AttempDetail::class;

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
