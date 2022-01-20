<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Group extends Component
{
    public $value;
    public $label;
    public $type;
    public $required;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value,$label,$type,$id,$required)
    {
        $this->value = $value;
        $this->label = $label;
        $this->type = $type;
        $this->id = $id;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.group');
    }
}
