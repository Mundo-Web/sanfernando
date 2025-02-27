<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description', 'imagen', 'visible', 'status'];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'major_id');
    }
}
