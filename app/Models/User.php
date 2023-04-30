<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Api\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasApiTokens ;

    /**
     * The attributes that are mass assignable.
     * /**
     **
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function crops()
    {
        $this->hasMany(Crop::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
