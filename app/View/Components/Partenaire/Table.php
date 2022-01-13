<?php

namespace App\View\Components\Partenaire;

use Illuminate\View\Component;

class Table extends Component
{
    public $partenaires;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($partenaires)
    {
        $this->partenaires = $partenaires;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partenaire.table');
    }
}
