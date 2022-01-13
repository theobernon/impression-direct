<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

class Form extends Component
{

    public $client;
    public $method;
    public $route;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($client=null, $action)
    {
        $this->client = $client;
        $this->route = route($client=null ? 'client.store' : 'client.update',['refClient'=>$client]);
//        $this->method = $clients==null ? 'POST' : 'PUT';
        $this->method = 'POST';
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.form');
    }
}
