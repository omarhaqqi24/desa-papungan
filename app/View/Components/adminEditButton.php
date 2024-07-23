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

    public function __construct($forValue, $nameTextarea, $nameInputPhoto, $judulPenjelasan, $subPenjelasan)
    {
        //
        $this->forValue = $forValue;
        $this->nameTextarea = $nameTextarea;
        $this->nameInputPhoto = $nameInputPhoto;
        $this->judulPenjelasan = $judulPenjelasan;
        $this->subPenjelasan = $subPenjelasan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-edit-button');
    }
}
