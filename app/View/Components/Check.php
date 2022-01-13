<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Check extends Component
{
    public $value;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value,$url)
    {
        $this->value=$value;
        $this->url=$url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.check');
    }
}
