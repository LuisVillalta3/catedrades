<?php

namespace App\Http\Livewire\Movements;

use App\Models\Movement;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;

class Preview extends Component
{
  public Movement $movement;

  public function mount($id = null)
  {
    $this->movement = Movement::firstOrNew(['id' => $id]);
  }

  public function downloadMovement()
  {
    $uri = route('movimientos.download', $this->movement->id);
    dd(file_get_contents($uri));
    $name = $this->movement->created_at->timestamp . '-movement-'. $this->movement->id;
    $location = public_path('storage/pdfs/' . $name);
    // Browsershot::url($uri)->savePdf($location);
    return response()->download($location);
  }

  public function render()
  {
    return view('livewire.movements.preview');
  }
}
