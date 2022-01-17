<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputSearch extends Component
{
    public $label;
    public $datas;
    public $arg;
    public $name;
    public $temp;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$datas,$arg,$name,$temp)
    {
        $this->label = $label;
        $this->datas = $datas;
        $this->arg = $arg;
        $this->name = $name;
        $this->temp = $temp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-search');
    }
}
