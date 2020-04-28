<?php


namespace Artigiana;


class Attribute
{
    public $type;

    /**
     * Attribute constructor.
     * @param $attributes
     */
    public function __construct($attributes)
    {
        $attributes = explode(' ', $attributes);
        $this->type = $attributes[0];
    }


}