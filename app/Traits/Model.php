<?php
namespace App\Traits;

Trait Model
{
    public function modelName($item)
    {
        return strtolower(collect(explode('\\',get_class($item)))->last());
    }
}
