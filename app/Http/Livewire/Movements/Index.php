<?php

namespace App\Http\Livewire\Movements;

use App\Models\Movement;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.movements.index', [
      'elements' => Movement::paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Movement::where('id', $id)->delete();
  }
}
