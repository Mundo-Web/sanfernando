<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;

class SignController extends BasicController
{
    public $model = Sign::class;
}
