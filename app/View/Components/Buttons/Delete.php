<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Delete extends Component
{
    public $route;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route,$class)
    {
        $this->route = $route;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.delete');
    }
}
