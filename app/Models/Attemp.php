<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attemp extends Model
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
        return $this->hasOne(Module::class, 'id', 'evaluation_id');
    }

    public function course()
    {
        return $this->hasOne(Products::class, 'id', 'course_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    // public function getScore()
    // {
    //     $corrects = AttempDetail::select([
    //         'attemp_details.*',
    //     ])
    //         ->join('answers', 'answers.id', 'attemp_details.answer_id')
    //         ->where('answers.correct', true)
    //         ->where('attemp_id', $this->id)
    //         ->count();
    //     $this->questions = Module::find($this->evaluation_id)->questions()->count();
    //     $this->score = $corrects;
    // }
}
