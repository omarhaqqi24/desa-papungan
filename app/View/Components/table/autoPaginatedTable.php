<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class autoPaginatedTable extends Component
{
    /**
     * Create a new component instance.
     */
    
     public LengthAwarePaginator $data;
     

    public $jenisTabel;

    public array $headers;

    public function __construct(LengthAwarePaginator $data, array $headers = [], string $jenisTabel = '')
     {
         $this->data = $data;
         $this->jenisTabel = $jenisTabel;
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.auto-paginated-table', ['data' => $this->data]);
    }
}
