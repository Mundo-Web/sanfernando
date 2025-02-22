<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseExam extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable=['question_id', 'response', 'description', 'imagen', 'is_correct', 'status'];

    public function questions()
    {
        return $this->belongsTo(QuestionExam::class, 'question_id');
    }
}
