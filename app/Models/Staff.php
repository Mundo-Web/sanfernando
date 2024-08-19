<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'cargo',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'status',
        'url_foto',
        'linkedin',
        'resume'
    ];

    public function productos()
    {
        return $this->belongsToMany(Products::class, 'staff_xproducts', 'staff_id', 'producto_id');
    }
}
