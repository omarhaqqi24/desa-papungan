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

    public $valueTextarea;

    public $valueFoto;

    public function __construct($judul, $judulPenjelasan, $namaInputTextarea, $subJudulPenjelasan, $namaInputFoto, $idModal, $valueTextarea, $valueFoto)
    {
        //
        $this->judul = $judul;
        $this->judulPenjelasan = $judulPenjelasan;
        $this->namaInputTextarea = $namaInputTextarea;
        $this->subJudulPenjelasan = $subJudulPenjelasan;
        $this->namaInputFoto = $namaInputFoto;
        $this->idModal = $idModal;
        $this->valueTextarea = $valueTextarea;
        $this->valueFoto = $valueFoto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modalpf');
    }
}
