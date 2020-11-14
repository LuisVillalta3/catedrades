<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Exports implements FromCollection, WithHeadings
{
  protected $model;
  protected $content;

  public function __construct($model, $content) {
    $this->model   = $model;
    $this->content = $content;
  }

  public function collection()
  {
    switch ($this->content) {
      case 'all':
        return $this->model::select($this->model::$selection)->withTrashed()->get();
        break;
      case 'normal':
        return $this->model::select($this->model::$selection)->get();
        break;
      case 'trash':
        return $this->model::select($this->model::$selection)->onlyTrashed()->get();
        break;
    }
  }

  public function headings(): array
  {
    return $this->model::$headers;
  }
}
