<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cellar extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'ubication'
  ];

  public static $headers = [
    '#',
    'Nombre',
    'Ubicación',
    'Fecha de registro',
    'Fecha de eliminación'
  ];

  public static $selection = [
    'id', 'name', 'ubication', 'created_at', 'deleted_at'
  ];
}
