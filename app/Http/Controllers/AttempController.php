<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Http\Requests\StoreAttempRequest;
use App\Http\Requests\UpdateAttempRequest;

class AttempController extends BasicController
{
    public $model = Attemp::class;
}
