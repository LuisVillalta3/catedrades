<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movement extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'provider_id',
    'cellar_id',
    'product_id',
    'qty',
    'cost',
    'type'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function cellar()
  {
    return $this->belongsTo(Cellar::class);
  }

  public function provider()
  {
    return $this->belongsTo(Provider::class);
  }

  public function getTipoAttribute()
  {
    return ($this->type == 1) ? 'Entrada' : 'Salida';
  }
}
