<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommandeClientTable extends Component
{
    public $commandes;
    public $action;
    public $pagination;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($commandes,$action,$pagination)
    {
        $this->commandes = $commandes;
        $this->action = $action;
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commande-client-table');
    }
}
