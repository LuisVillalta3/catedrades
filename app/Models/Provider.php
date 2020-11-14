<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'email',
    'phone',
    'fax',
    'ubication'
  ];

  public static $headers = [
    '#',
    'Nombre',
    'Correo electrónico',
    'Teléfono',
    'Fax',
    'Fecha de registro',
    'Fecha de eliminación'
  ];

  public static $selection = [
    'id', 'name', 'email', 'phone', 'fax', 'created_at', 'deleted_at'
  ];
}
