<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Http\Requests\StoreAttempRequest;
use App\Http\Requests\UpdateAttempRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttempController extends BasicController
{
    public $model = Attemp::class;

    public function beforeSave(Request $request)
    {
        $body = $request->all();
        $body['user_id'] = Auth::user()->id;
        return $body;
    }
}
