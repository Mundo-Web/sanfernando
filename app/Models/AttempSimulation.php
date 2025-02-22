<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttempSimulation extends Model
{
   
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'finished',
        'evaluation_id',
        'course_id',
        'user_id',
        'score',
        'questions'
    ];

    public function evaluation()
    {
        return $this->hasOne(ExamSimulation::class, 'id', 'evaluation_id');
    }

    public function course()
    {
        return $this->hasOne(Products::class, 'id', 'course_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function details()
{
    return $this->hasMany(AttempSimulationDetail::class, 'answer_id', 'id');
}
}
