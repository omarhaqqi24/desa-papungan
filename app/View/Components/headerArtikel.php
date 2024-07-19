<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headerArtikel extends Component
{
    public $subJudul;
    public $judul;
    public function __construct($subJudul, $judul)
    {
        $this->subJudul = $subJudul;
        $this->judul = $judul;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-artikel');
    }
}
