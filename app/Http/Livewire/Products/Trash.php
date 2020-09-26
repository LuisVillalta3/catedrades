<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Trash extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.products.trash', [
      'elements' => Product::onlyTrashed()->where('name', 'like', "%{$this->name}%")->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Product::onlyTrashed()->where('id', $id)->forceDelete();
  }

  public function recovery($id)
  {
    Product::onlyTrashed()->where('id', $id)->restore();
  }

  public function recoveryAll()
  {
    Product::onlyTrashed()->restore();
    return redirect()->route('productos');
  }

  public function destroyAll()
  {
    Product::onlyTrashed()->forceDelete();
    return redirect()->route('productos');
  }
}
