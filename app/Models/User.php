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
                $query->select('course_id', 'user_id')
                ->selectRaw('MAX(score) as score, MAX(questions) as questions')
                ->from('attemps')
                ->where('finished', true)
                    ->whereRaw('score > (questions / 2)')
                    ->groupBy('course_id', 'user_id');
            },
            'best_attemps',
            function ($join) {
                $join->on('products.id', '=', 'best_attemps.course_id')
                ->on('attemps.user_id', '=', 'best_attemps.user_id');
            }
        )
            ->groupBy('products.id', 'best_attemps.score', 'best_attemps.questions', 'best_attemps.user_id');
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
