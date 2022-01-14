<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{

    public $label;
    public $value;
    public $name;
    public $type;
    public $id;
    public $step;
    public $required;
    public $readonly;
    public $oninput;


    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($label,$value,$name,$type,$step,$oninput, $id,$readonly,$required)
    {
        $this->label=$label;
        $this->value=$value;
        $this->name = $name;
        $this->type = $type;
        $this->step = $step;
        $this->required = $required;
        $this->oninput = $oninput;
        $this->id = $id;
        $this->readonly = $readonly;
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
