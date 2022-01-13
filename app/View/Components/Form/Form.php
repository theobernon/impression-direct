<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method='POST',$action)
    {
        $this->method=$method;
        $this->action=$action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form');
    }
}
