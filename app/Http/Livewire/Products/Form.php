<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
  public Product $product;

  public function mount($id = null)
  {
    $this->product = Product::firstOrNew(['id' => $id]);
  }

  protected $rules = [
    'product.name'  =>  'required',
    'product.description' =>  'required',
    'product.price' =>  'required|numeric'
  ];

  public function render()
  {
    return view('livewire.products.form');
  }

  public function save()
  {
    $this->validate();
    $this->product->save();

    return redirect()->route('productos.editar', $this->product->id);
  }

  public function destroy()
  {
    Product::where('id', $this->product->id)->delete();
    return redirect()->route('productos');
  }
}
