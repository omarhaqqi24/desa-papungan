<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminEditButton extends Component
{
    
    
    public $forValue;
    
    

    public $nameTextarea;

    

    public $nameInputPhoto;


    public $judulPenjelasan;

    public $subPenjelasan;

    
    public $valueTextarea;
    

    public $valueFoto;

    public function __construct($forValue, $nameTextarea, $nameInputPhoto, $judulPenjelasan, $subPenjelasan, $valueTextarea, $valueFoto)
    {
        //
        $this->forValue = $forValue;
        $this->nameTextarea = $nameTextarea;
        $this->nameInputPhoto = $nameInputPhoto;
        $this->judulPenjelasan = $judulPenjelasan;
        $this->subPenjelasan = $subPenjelasan;
        $this->valueTextarea = $valueTextarea;
        $this->valueFoto = $valueFoto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-show');
    }
}
