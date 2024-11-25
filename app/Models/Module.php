<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_id',
        'type',
        'session',
        'name',
        'description',
        'source_type',
        'source',
        'duration',
        'attemps',
        'order',
        'aprove_with',
    ];

    public function course()
    {
        return $this->hasOne(Products::class, 'id', 'course_id');
    }
    public function sources()
    {
        return $this->hasMany(Source::class, 'module_id', 'id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'module_id', 'id');
    }

    public function attemps()
    {
        return $this->hasMany(Attemp::class, 'evaluation_id', 'id');
    }
}
