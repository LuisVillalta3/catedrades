<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
  public $name;
  public $email;

  public function render()
  {
    return view('livewire.users.index', [
      'elements' => User::where('name', 'like', "%{$this->name}%")->where('email', 'like', "%{$this->email}%")->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    User::where('id', $id)->delete();
  }
}
