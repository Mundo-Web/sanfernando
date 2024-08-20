<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends BasicController
{
    public $model = Question::class;
    public $softDeletion = false;

    public function afterSave(Request $request, object $jpa)
    {
        $jpa->answers = $jpa->answers()->get();
        return $jpa;
    }
}
