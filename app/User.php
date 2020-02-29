<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     // Me aseguro que la tabla y el id tengan el nombre que quiero
     protected $table = 'users';

     protected $primaryKey = 'id';


     // Y relleno...
    protected $fillable = [
        'name', 'email', 'password', 'isDev'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relaciones...
    public function orders() {
      return $this->hasMany(Order::class, "user_id");
    }

    public function applications() {
      return $this->hasMany(Application::class, "user_id");
    }
}
