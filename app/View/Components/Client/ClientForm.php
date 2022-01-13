<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

class ClientForm extends Component
{

    public $client;
    public $method;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
//        $this->route = route($clients==null ? 'client.store' : 'client.update',['clients'=>$clients]);
//        $this->method = $clients==null ? 'POST' : 'PUT';
        $this->method = 'PUT';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.client-form');
    }
}
