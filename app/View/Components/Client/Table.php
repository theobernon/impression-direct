<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

class Table extends Component
{
    public $clients;
    public $pagination;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($clients,$pagination)
    {
        $this->clients = $clients;
        $this->pagination = $pagination;
        $this->action = route('client.create');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.table');
    }
}
