<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use Notifiable, SoftDeletes;

  // Me aseguro que la tabla y el id tengan el nombre que quiero
  protected $table = 'comments';

  protected $primaryKey = 'comment_id';

// Y relleno...
  protected $fillable = [
      'order_id', 'rating', 'content',
  ];

  // Relaciones...
  public function order() {
    return $this->belongsTo(Order::class, "order_id");
  }
  
}
