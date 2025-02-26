<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'password',
        'external_id',
        'external_auth',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }


    public function direccion()
    {
        return $this->hasMany(UserDetails::class);
    }
    public function wishlistItems()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function certificates()
    {
        return $this->hasManyThrough(Products::class, Attemp::class, 'user_id', 'id', 'id', 'course_id')
            ->select('products.*', 'best_attemps.score', 'best_attemps.questions')
            ->joinSub(
                function ($query) {
                    $query->select('attemps.course_id', 'attemps.user_id')
                        ->selectRaw('MAX(attemps.score) as score, MAX(attemps.questions) as questions')
                        ->from('attemps')
                        ->leftJoin('modules', 'modules.id', '=', 'attemps.evaluation_id')
                        ->where('attemps.finished', true)
                        ->whereRaw('(attemps.score * 20.0) / attemps.questions >= COALESCE(modules.aprove_with, attemps.questions / 2)')
                        ->groupBy('attemps.course_id', 'attemps.user_id');
                },
                'best_attemps',
                function ($join) {
                    $join->on('products.id', '=', 'best_attemps.course_id')
                        ->on('attemps.user_id', '=', 'best_attemps.user_id');
                }
            )
            ->groupBy(
                'products.id',
                'products.uuid',
                'products.producto',
                'products.precio',
                'products.descuento',
                'products.stock',
                'products.imagen',
                'products.imagen_2',
                'products.imagen_3',
                'products.imagen_4',
                'products.imagen_ambiente',
                'products.destacar',
                'products.recomendar',
                'products.atributes',
                'products.visible',
                'products.status',
                'products.extract',
                'products.description',
                'products.costo_x_art',
                'products.peso',
                'products.categoria_id',
                'products.subcategory_id',
                'products.color',
                'products.image_texture',
                'products.slug',
                'products.sku',
                'products.max_stock',
                'products.creditos',
                'products.duracion',
                'products.fecha_inicio',
                'products.beneficios',
                'products.curso_dirigido',
                'products.description2',
                'products.temario',
                'products.incluye',
                'products.que_lograras',
                'products.brochure_url',
                'products.offer_message',
                'products.created_at',
                'products.updated_at',
                'products.precio_reseller',
                'products.tipo_portada',
                'products.portada_detalle',
                'attemps.user_id',
                'best_attemps.score',
                'best_attemps.questions',
                'best_attemps.user_id',
            );
    }

    public function courses()
    {
        return $this->hasManyThrough(
            Products::class,
            SaleDetail::class,
            'user_id',
            'id',
            'id',
            'product_id'
        )
            ->join('sales', 'sales.id', '=', 'sale_details.sale_id')
            ->where('sales.status_id', 3);
    }
}
