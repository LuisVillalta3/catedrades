<?php

namespace App\Http\Livewire\Cellars;

use App\Models\Cellar;
use Livewire\Component;

class Form extends Component
{
  public Cellar $cellar;

  public function mount($id = null)
  {
    $this->cellar = Cellar::firstOrNew(['id' => $id]);
  }

  protected $rules = [
    'cellar.name'  =>  'required',
    'cellar.ubication' =>  'required'
  ];

  public function render()
  {
    return view('livewire.cellars.form');
  }

  public function save()
  {
    $this->validate();
    $this->cellar->save();

    return redirect()->route('bodegas.editar', $this->cellar->id);
  }

  public function destroy()
  {
    Cellar::where('id', $this->cellar->id)->delete();
    return redirect()->route('bodegas');
  }
}
