<?php

namespace App\View\Components\Devis;

use Illuminate\View\Component;

class inputSearch extends Component
{
    public $label;
    public $name;
    public $datas;
    public $arg;
    public $arg2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$name,$datas,$arg,$arg2)
    {
        $this->label = $label;
        $this->name = $name;
        $this->datas = $datas;
        $this->arg = $arg;
        $this->arg2 = $arg2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.devis.input-search');
    }
}
