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
<<<<<<< Updated upstream
    public $required;
    public $readonly;
    public $onchange;
=======
    public $oninput;
    public $readonly;
>>>>>>> Stashed changes

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< Updated upstream
    public function __construct($label,$value,$name,$type,$step,$onchange,$required,$readonly)
=======
    public function __construct($label,$value,$name,$type,$step,$oninput, $id,$readonly)
>>>>>>> Stashed changes
    {
        $this->label=$label;
        $this->value=$value;
        $this->name = $name;
        $this->type = $type;
        $this->step = $step;
<<<<<<< Updated upstream
        $this->onchange = $onchange;
        $this->required = $required;
=======
        $this->oninput = $oninput;
        $this->id = $id;
>>>>>>> Stashed changes
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
