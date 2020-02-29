<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
  use Notifiable, SoftDeletes;

  // Me aseguro que la tabla y el id tengan el nombre que quiero
  protected $table = 'applications';

  protected $primaryKey = 'application_id';

    // Y relleno...
  protected $fillable = [
      'name', 'image_url', 'description', 'user_id', 'category_id', 'price',
  ];

  // Relaciones...
  public function category() {
    return $this->belongsTo(Category::class, "category_id");
  }
  public function order()
  {
    return $this->hasMany(Order::class, "application_id");
  }
  public function user() {
    return $this->belongsTo(User::class, "user_id");
  }
}
