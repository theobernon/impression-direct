<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputCommission extends Component
{
    public $datas;
    public $label;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datas,$label,$name)
    {
        $this->datas = $datas;
        $this->label = $label;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-commission');
    }
}
