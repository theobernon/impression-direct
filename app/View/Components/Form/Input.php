<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{

    public $label;
    public $value;
    public $readonly;
    public $name;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$value,$readonly,$name,$required)
    {
        $this->label=$label;
        $this->value=$value;
        $this->readonly=$readonly;
        $this->name=$name;
        $this->required=$required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
