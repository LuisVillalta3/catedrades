<?php

namespace App\Exports;

use App\Models\Movement;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MovementsExports implements FromView
{
  protected $content;
  protected $date;
  protected $since;
  protected $until;
  protected $id;
  protected $filter;

  public function __construct($content, $date, $since, $until, $id, $filter) {
    $this->content = $content;
    $this->date    = $date;
    $this->since   = $since;
    $this->until   = $until;
    $this->id      = $id;
    $this->filter  = $filter;
  }

  public function view(): View
  {
    return view('exports.movements', [
      'elements' => $this->elements()
    ]);
  }

  protected function elements()
  {
    if ($this->filter != 'all') {
      if ($this->date && $this->id) {
        if ($this->content == 'normal') { return Movement::where('type', $this->filter)->whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
        if ($this->content == 'all') { return Movement::where('type', $this->filter)->withTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
        if ($this->content == 'trash') { return Movement::where('type', $this->filter)->onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      }
  
      if ($this->date) {
        if ($this->content == 'normal') { return Movement::where('type', $this->filter)->whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
        if ($this->content == 'all') { return Movement::where('type', $this->filter)->withTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
        if ($this->content == 'trash') { return Movement::where('type', $this->filter)->onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      }
  
      if ($this->id) {
        if ($this->content == 'normal') { return Movement::where('type', $this->filter)->where('product_id', $this->id)->get(); }
        if ($this->content == 'all') { return Movement::where('type', $this->filter)->withTrashed()->where('product_id', $this->id)->get(); }
        if ($this->content == 'trash') { return Movement::where('type', $this->filter)->onlyTrashed()->where('product_id', $this->id)->get(); }
      }
  
      if ($this->content == 'normal') { return Movement::where('type', $this->filter)->get(); }
      if ($this->content == 'all') { return Movement::withTrashed()->where('type', $this->filter)->get(); }
      if ($this->content == 'trash') { return Movement::onlyTrashed()->where('type', $this->filter)->get(); }
    }

    if ($this->date && $this->id) {
      if ($this->content == 'normal') { return Movement::whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      if ($this->content == 'all') { return Movement::withTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      if ($this->content == 'trash') { return Movement::onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->where('product_id', $this->id)->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
    }

    if ($this->date) {
      if ($this->content == 'normal') { return Movement::whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      if ($this->content == 'all') { return Movement::withTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
      if ($this->content == 'trash') { return Movement::onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($this->since))->whereDate('created_at', '<=', Carbon::parse($this->until))->get(); }
    }

    if ($this->id) {
      if ($this->content == 'normal') { return Movement::where('product_id', $this->id)->get(); }
      if ($this->content == 'all') { return Movement::withTrashed()->where('product_id', $this->id)->get(); }
      if ($this->content == 'trash') { return Movement::onlyTrashed()->where('product_id', $this->id)->get(); }
    }

    if ($this->content == 'normal') { return Movement::all(); }
    if ($this->content == 'all') { return Movement::withTrashed()->get(); }
    if ($this->content == 'trash') { return Movement::onlyTrashed()->get(); }
  }
}
