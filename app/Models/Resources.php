<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'imagen',
        'archive',
        'download',
        'count',
        'visible',
        'status',
    ];
}
