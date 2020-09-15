<?php

namespace App\Models\Concerns;

use App\Models\Version;

trait Versionable {
  public function versions()
  {
    return $this->morphMany(Version::class, 'versionable');
  }
}
