<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'module_id',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function randomAnswers () {
        $correctAnswer = $this->answers()
        ->select(['id', 'name'])
            ->where('correct', 1)
            ->inRandomOrder()
            ->first();
        $incorrectAnswers = $this->answers()
        ->select(['id', 'name'])
            ->where('correct', 0)
            ->inRandomOrder()
            ->take(3)
            ->get();
        $answers = collect([$correctAnswer])->merge($incorrectAnswers);
        return $answers->shuffle();
    }
}
