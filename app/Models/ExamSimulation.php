<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSimulation extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['title', 'description', 'imagen', 'visible', 'status'];

    public function questions()
    {
        return $this->belongsToMany(QuestionExam::class, 'exam_question', 'exam_simulation_id', 'question_exam_id')
            ->withPivot('score');
    }
    
}
