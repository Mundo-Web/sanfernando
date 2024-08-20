<?php

namespace App\Http\Controllers;

use App\Models\AttempDetail;
use App\Http\Requests\StoreAttempDetailRequest;
use App\Http\Requests\UpdateAttempDetailRequest;

class AttempDetailController extends BasicController
{
    public $model = AttempDetail::class;
}
