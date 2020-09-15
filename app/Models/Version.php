<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
  protected $fillable = [
    'action',
    'user_id',
    'versionable_id',
    'versionable_type',
  ];

  public function versionable()
  {
    return $this->morphTo();
  }

  public function getUserNameAttribute()
  {
    return
      !($this->user_id)   ?
      'System'            :
      (User::find($this->user_id))
        ->name;
  }
}
