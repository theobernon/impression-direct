<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommandeRow extends Component
{
    public $commande;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande=$commande;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commande-row');
    }
}
