<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionExam extends Model
{   
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable=['major_id', 'question', 'description', 'imagen', 'status'];

    public function majors()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function answers()
    {
        return $this->hasMany(ResponseExam::class, 'question_id', 'id');
    }

    public function exams()
    {
        return $this->belongsToMany(ExamSimulation::class, 'exam_question', 'question_exam_id', 'exam_simulation_id')
            ->withPivot('score');
    }

    public function randomAnswers () {
        $correctAnswer = $this->answers()
        ->select(['id', 'response'])
            ->where('is_correct', 1)
            ->inRandomOrder()
            ->first();
        $incorrectAnswers = $this->answers()
        ->select(['id', 'response'])
            ->where('is_correct', 0)
            ->inRandomOrder()
            ->take(3)
            ->get();
        $answers = collect([$correctAnswer])->merge($incorrectAnswers);
        return $answers->shuffle();
    }
}
