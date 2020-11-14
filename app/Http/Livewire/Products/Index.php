<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
  public $name;

  public function render()
  {
    return view('livewire.products.index', [
      'elements' => Product::where('name', 'like', "%{$this->name}%")->paginate(10),
      'model'    => Product::class
    ]);
  }

  public function destroy($id)
  {
    Product::where('id', $id)->delete();
  }
}
