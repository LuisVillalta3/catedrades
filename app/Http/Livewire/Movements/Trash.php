<?php

namespace App\Http\Livewire\Movements;

use App\Models\Movement;
use Livewire\Component;

class Trash extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.movements.trash', [
      'elements' => Movement::onlyTrashed()->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Movement::onlyTrashed()->where('id', $id)->forceDelete();
  }

  public function recovery($id)
  {
    foreach (Movement::onlyTrashed()->get() as $move) {
      try {
        if ($move->type == 0 && $move->product->stock >= $move->qty) {
          $move->product->stock -= $move->qty;
          $move->product->save();
          Movement::onlyTrashed()->where('id', $id)->restore();
        } else {
          if ($move->type == 1) {
            $move->product->stock += $move->qty;
            $move->product->save();
            Movement::onlyTrashed()->where('id', $id)->restore();
          }
        }
      } catch (\Throwable $th) {
        //throw $th;
      }
    }
  }

  public function recoveryAll()
  {
    foreach (Movement::onlyTrashed()->get() as $move) {
      try {
        if ($move->type == 0 && $move->product->stock >= $move->qty) {
          $move->product->stock -= $move->qty;
          $move->product->save();
          Movement::onlyTrashed()->where('id', $move->id)->restore();
        } else {
          if ($move->type == 1) {
            $move->product->stock += $move->qty;
            $move->product->save();
            Movement::onlyTrashed()->where('id', $move->id)->restore();
          }
        }
      } catch (\Throwable $th) {
        //throw $th;
      }
    }
    return redirect()->route('movimientos');
  }

  public function destroyAll()
  {
    Movement::onlyTrashed()->forceDelete();
    return redirect()->route('movimientos');
  }
}
