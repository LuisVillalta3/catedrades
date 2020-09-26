<?php

namespace App\Http\Livewire\Cellars;

use App\Models\Cellar;
use Livewire\Component;

class Trash extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.cellars.trash', [
      'elements' => Cellar::onlyTrashed()->where('name', 'like', "%{$this->name}%")->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Cellar::onlyTrashed()->where('id', $id)->forceDelete();
  }

  public function recovery($id)
  {
    Cellar::onlyTrashed()->where('id', $id)->restore();
  }

  public function recoveryAll()
  {
    Cellar::onlyTrashed()->restore();
    return redirect()->route('bodegas');
  }

  public function destroyAll()
  {
    Cellar::onlyTrashed()->forceDelete();
    return redirect()->route('bodegas');
  }
}
