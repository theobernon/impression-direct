<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class inputList extends Component
{
    public $datas;
    public $label;
    public $name;
    public $list;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datas,$label,$name,$list,$value)
    {
        $this->datas = $datas;
        $this->label = $label;
        $this->name = $name;
        $this->list = $list;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-list');
    }
}
