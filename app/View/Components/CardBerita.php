<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardBerita extends Component
{
    /**
     * Create a new component instance.
     */
    public $foto;
    public $judul;
    public $isi;
    public $createdAt;

    public function __construct($foto, $judul, $isi, $createdAt)
    {
        $this->foto = $foto;
        $this->judul = $judul;
        $this->isi = $isi;
        $this->createdAt= $createdAt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-berita');
    }


}
