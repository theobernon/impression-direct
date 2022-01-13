<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommandeTable extends Component
{
public $commandes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($commandes)
    {
        $this->commandes=$commandes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commande-table');
    }
}
