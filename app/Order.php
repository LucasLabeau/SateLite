<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use Notifiable, SoftDeletes;

  // Me aseguro que la tabla y el id tengan el nombre que quiero
  protected $table = 'orders';

  protected $primaryKey = 'order_id';

  // Y relleno...
  protected $fillable = [
        'user_id', 'application_id', 'price',
  ];

  // Relaciones...
  public function user() {
    return $this->belongsTo(User::class, "user_id");
  }
}
