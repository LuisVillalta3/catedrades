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
}
