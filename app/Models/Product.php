<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'stock',
    'description',
    'price'
  ];

  public static $headers = [
    '#',
    'Nombre',
    'Descripción',
    'Precio',
    'Stock',
    'Fecha de registro',
    'Fecha de eliminación'
  ];

  public static $selection = [
    'id', 'name', 'description', 'price', 'stock', 'created_at', 'deleted_at'
  ];

  public function movements()
  {
    return $this->hasMany(Movement::class);
  }
}
