<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use Notifiable, SoftDeletes;

// Me aseguro que la tabla y el id tengan el nombre que quiero
  protected $table = 'categories';

  protected $primaryKey = 'category_id';

// Y relleno...
  protected $fillable = [
      'name',
  ];

  // Relaciones...
  public function application() {
    return $this->hasMany(Application::class, "category_id");
  }
}
