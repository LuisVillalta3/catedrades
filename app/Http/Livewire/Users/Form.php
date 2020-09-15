<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Form extends Component
{
  public User $user;
  public $roles;
  public $rol;

  public function mount($id = null)
  {
    $this->user = User::firstOrNew(['id' => $id]);
    $this->roles = Role::all();
    if (!$this->user->id) {
      $this->rol = Role::first()->name;
    } else {
      $this->rol = $this->user->roles->pluck('name')->first();
    }
  }

  protected $rules = [
    'user.name'  =>  'required',
    'user.email' =>  'required|email',
    'rol'        =>  'required'
  ];

  public function render()
  {
    return view('livewire.users.form');
  }

  public function save()
  {
    $this->validate();

    if (!$this->user->id) {
      $this->user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
    }
    $this->user->save();
    if (!$this->user->id) {
      $rol = (Role::find($this->rol))->name;
      $this->user->assignRole($rol);
    } else {
      $rol = Role::where('name', $this->rol)->first()->id;
      $this->user->roles()->sync([$rol]);
    }

    return redirect()->route('usuarios.editar', $this->user->id);
  }

  public function destroy()
  {
    User::where('id', $this->user->id)->delete();
    return redirect()->route('usuarios');
  }
}
