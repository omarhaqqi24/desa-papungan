<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modalpf extends Component
{

    public $judul;
    

    public $judulPenjelasan;

    public $namaInputTextarea;
    

        

    public $subJudulPenjelasan;

    public $namaInputFoto;

    public $idModal;

    public function __construct($judul, $judulPenjelasan, $namaInputTextarea, $subJudulPenjelasan, $namaInputFoto, $idModal)
    {
        //
        $this->judul = $judul;
        $this->judulPenjelasan = $judulPenjelasan;
        $this->namaInputTextarea = $namaInputTextarea;
        $this->subJudulPenjelasan = $subJudulPenjelasan;
        $this->namaInputFoto = $namaInputFoto;
        $this->idModal = $idModal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modalpf');
    }
}
