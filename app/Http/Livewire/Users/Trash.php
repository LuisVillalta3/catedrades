<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Trash extends Component
{
  public $name;
  public $email;

  public function render()
  {
    return view('livewire.users.trash', [
      'elements' => User::onlyTrashed()->where('name', 'like', "%{$this->name}%")->where('email', 'like', "%{$this->email}%")->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    User::onlyTrashed()->where('id', $id)->forceDelete();
  }

  public function recovery($id)
  {
    User::onlyTrashed()->where('id', $id)->restore();
  }

  public function recoveryAll()
  {
    User::onlyTrashed()->restore();
    return redirect()->route('usuarios');
  }

  public function destroyAll()
  {
    User::onlyTrashed()->forceDelete();
    return redirect()->route('usuarios');
  }
}
