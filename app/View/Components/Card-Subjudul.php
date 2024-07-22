<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardSubjudul extends Component
{
    public $jenisJudul;
    public $judul;
    public $deskripsi;
    public function __construct($jenisJudul, $judul, $deskripsi)
    {
        $this->jenisJudul = $jenisJudul;
        $this->judul = $judul;
        $this->deskripsi = $deskripsi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-subjudul');
    }
}
