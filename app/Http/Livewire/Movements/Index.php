<?php

namespace App\Http\Livewire\Movements;

use App\Models\Movement;
use Livewire\Component;

class Index extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.movements.index', [
      'elements' => Movement::paginate(10),
      'model'    => Movement::class
    ]);
  }

  public function destroy($id)
  {
    try {
      $movement = Movement::find($id);
      $product = $movement->product;
      if ($movement->type == 1) {
        $product->stock -= $movement->qty;
      } else {
        $product->stock += $movement->qty;
      }
      $product->save();
    } catch (\Throwable $th) {
      //throw $th;
    }
    Movement::where('id', $id)->delete();
  }
}
