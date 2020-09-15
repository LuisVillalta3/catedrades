<?php

namespace App\Http\Livewire\Providers;

use App\Models\Provider;
use Livewire\Component;

class Form extends Component
{
  public Provider $provider;

  public function mount($id = null)
  {
    $this->provider = Provider::firstOrNew(['id' => $id]);
  }

  protected $rules = [
    'provider.name'  =>  'required',
    'provider.email' =>  'required|email',
    'provider.phone' =>  'required',
    'provider.fax' =>  '',
    'provider.ubication' =>  'required'
  ];

  public function render()
  {
    return view('livewire.providers.form');
  }

  public function save()
  {
    $this->validate();
    $this->provider->save();

    return redirect()->route('proveedores.editar', $this->provider->id);
  }

  public function destroy()
  {
    Provider::where('id', $this->provider->id)->delete();
    return redirect()->route('proveedores');
  }
}
