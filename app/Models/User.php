<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstName',
        'lastName',
        'dayOfBirth',
        'sex',
        'image',
        'email',
        'phone',
        'password',
        'role',
    ];
    

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function userReviews() {
        return $this->hasMany(UserReview::class);
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function orders() {
        return $this->hasMany(Order::class, 'uid');
    }

    public function userAddresses() {
        return $this->hasMany(UserAddress::class, 'userID');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
