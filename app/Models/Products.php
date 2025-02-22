<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Products extends Model
{
  use HasFactory;
  protected $fillable = [
    'producto',
    'precio',
    'descuento',
    'stock',
    'imagen',
    'imagen_2',
    'imagen_3',
    'imagen_4',
    'imagen_ambiente',
    'destacar',
    'recomendar',
    'atributes',
    'visible',
    'status',
    'extract',
    'description',
    'costo_x_art',
    'peso',
    'categoria_id',
    'subcategory_id',
    'color',
    'image_texture',
    'slug',
    'sku',
    'max_stock',
    'creditos',
    'duracion',
    'fecha_inicio',
    'beneficios',
    'curso_dirigido',
    'description2',
    'temario',
    'incluye',
    'que_lograras',
    'brochure_url',
    'offer_message',
    'tipo_portada',
    'portada_detalle',
    'is_exam',
    'examsimulation_id'
  ];

  public function categoria()
  {
    return Category::find($this->categoria_id);
  }
  public function category()
  {
    return $this->belongsTo(Category::class, 'categoria_id');
  }

  public function subcategory()
  {
    return SubCategory::find($this->subcategory_id);
  }

  public function galeria()
  {
    return $this->hasMany(Galerie::class, 'product_id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'tags_xproducts', 'producto_id', 'tag_id');
  }
  public function docentes()
  {
    return $this->belongsToMany(Staff::class, 'staff_xproducts', 'producto_id', 'staff_id');
  }

  public function scopeActiveDestacado($query)
  {
    return $query->where('status', true)->where('destacar', true);
  }

  public function attributeValues()
  {
    return $this->hasMany(AttributeProductValues::class);
  }

  public function attributes()
  {
    return $this->belongsToMany(Attributes::class, 'attribute_product_values', 'product_id', 'attribute_id')
      ->withPivot('attribute_value_id');
  }
  public function wishedByUsers()
  {
    return $this->hasMany(Wishlist::class, 'product_id');
  }

  static function byUser($userId)
  {
    return Products::select([
      'products.*'
    ])
      ->join('sale_details', 'sale_details.product_id', 'products.id')
      ->join('sales', 'sales.id', '=', 'sale_details.sale_id')
      ->where('user_id', $userId)
      ->where('sales.status_id', 3);
  }

  public function detalleSales(){
    return $this->hasMany(SaleDetail::class, 'product_id');
  }
}
