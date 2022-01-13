<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $datas;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$datas,$name)
    {
        $this->label = $label;
        $this->datas = $datas;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
