<?php

namespace App\Http\Livewire\Movements;

use App\Models\Movement;
use Livewire\Component;

class Preview extends Component
{
  public Movement $movement;

  public function mount($id = null)
  {
    $this->movement = Movement::firstOrNew(['id' => $id]);
  }

  public function redirectToMovements()
  {
    return redirect()->route('movimientos');
  }

  public function render()
  {
    return view('livewire.movements.preview');
  }
}
