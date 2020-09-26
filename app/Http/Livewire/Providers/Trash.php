<?php

namespace App\Http\Livewire\Providers;

use App\Models\Provider;
use Livewire\Component;

class Trash extends Component
{
  public $name;
  public $email;
  public $phone;
  public $fax;

  public function render()
  {
    return view('livewire.providers.trash', [
      'elements' =>
        Provider::onlyTrashed()->where('name', 'like', "%{$this->name}%")
                ->where('email', 'like', "%{$this->email}%")
                ->where('phone', 'like', "%{$this->phone}%")
                ->where('fax', 'like', "%{$this->fax}%")
                ->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Provider::onlyTrashed()->where('id', $id)->forceDelete();
  }

  public function recovery($id)
  {
    Provider::onlyTrashed()->where('id', $id)->restore();
  }

  public function recoveryAll()
  {
    Provider::onlyTrashed()->restore();
    return redirect()->route('proveedores');
  }

  public function destroyAll()
  {
    Provider::onlyTrashed()->forceDelete();
    return redirect()->route('proveedores');
  }
}
