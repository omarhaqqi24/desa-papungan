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
    public $actionUrl;
    public $formMethod;

    public function __construct($judul, $judulPenjelasan, $namaInputTextarea, $subJudulPenjelasan, $namaInputFoto, $idModal, $valueTextarea, $valueFoto, $actionUrl, $formMethod)
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
        $this->actionUrl = $actionUrl;
        $this->formMethod = $formMethod;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modalpf');
    }
}
