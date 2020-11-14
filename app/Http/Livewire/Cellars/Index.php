<?php

namespace App\Http\Livewire\Cellars;

use App\Models\Cellar;
use Livewire\Component;

class Index extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.cellars.index', [
      'elements' => Cellar::where('name', 'like', "%{$this->name}%")->paginate(10),
      'model'    => Cellar::class
    ]);
  }

  public function destroy($id)
  {
    Cellar::where('id', $id)->delete();
  }
}
