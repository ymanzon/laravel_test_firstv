<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

//extends Authenticatable implements JWTSubject
//class User extends Model
class User extends Authenticatable implements JWTSubject
{
    //use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'user_scheme';
    protected $fillable = ['nombre','email','usuario_alta','fecha_alta','fecha_modificacion', 'imagen', 'activo'];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }

}
