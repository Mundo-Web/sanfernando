<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'botontext1', 'link1', 'botontext2', 'link2', 'url_image', 'name_image', 'url_image_second', 'name_image_second', 'status', 'visible', 'color'];
}
