<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagResource extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_resource',
        'etiqueta',
    ];
}
