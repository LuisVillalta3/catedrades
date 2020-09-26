<?php

namespace App\Http\Livewire\Movements;

use App\Models\Cellar;
use App\Models\Movement;
use App\Models\Product;
use App\Models\Provider;
use Livewire\Component;

class Form extends Component
{
  public Movement $movement;
  public $providers;
  public $cellars;
  public $products;
  public $minavailble;

  public function mount($id = null)
  {
    $this->movement   = Movement::firstOrNew(['id' => $id], ['type' => 0]);
    $this->providers  = Provider::all();
    $this->cellars    = Cellar::all();
    $this->products   = Product::all();
  }

  protected $rules = [
    'movement.type'         =>  'required',
    'movement.provider_id'  =>  'required',
    'movement.cellar_id'    =>  'required',
    'movement.product_id'   =>  'required',
    'movement.cost'         =>  'required|numeric|min:1',
    'movement.qty'          =>  'required|numeric|min:1'
  ];

  public function save()
  {
    $this->validate();
    $product = Product::find($this->movement->product_id);
    if ($this->movement->type == 1) {
      $this->movement->save();
      $product->stock += $this->movement->qty;
      $product->save();

      return redirect()->route('movimientos');
    }

    if ($this->movement->type == 0 && ($product->stock >= $this->movement->qty)) {
      $this->movement->save();
      $product->stock -= $this->movement->qty;
      $product->save();

      return redirect()->route('movimientos');
    }
    $this->movement->qty = 0;
    $this->validate();
  }

  public function destroy()
  {
    Movement::where('id', $this->movement->id)->delete();
    return redirect()->route('movimientos');
  }

  public function render()
  {
    $this->minavailble = false;
    return view('livewire.movements.form');
  }
}
