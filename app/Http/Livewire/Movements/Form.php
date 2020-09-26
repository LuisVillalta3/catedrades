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
    'movement.cost'         =>  'required',
    'movement.qty'          =>  'required|numeric'
  ];

  public function save()
  {
    $this->validate();
    $this->movement->save();

    return redirect()->route('movimientos');
  }

  public function destroy()
  {
    Movement::where('id', $this->movement->id)->delete();
    return redirect()->route('movimientos');
  }

  public function render()
  {
    return view('livewire.movements.form');
  }
}
