<?php

namespace App\Http\Livewire\Providers;

use App\Models\Provider;
use Livewire\Component;

class Index extends Component
{
  public $name;
  public $email;
  public $phone;
  public $fax;

  public function render()
  {
    return view('livewire.providers.index', [
      'elements' =>
        Provider::where('name', 'like', "%{$this->name}%")
                ->where('email', 'like', "%{$this->email}%")
                ->where('phone', 'like', "%{$this->phone}%")
                ->where('fax', 'like', "%{$this->fax}%")
                ->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    Provider::where('id', $id)->delete();
  }
}
