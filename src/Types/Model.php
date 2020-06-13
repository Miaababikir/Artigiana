<?php


namespace Artigiana\Types;


class Model
{
    private $name;
    private $properties;

    public function __construct($name, $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
    }

    public function getName()
    {
        return ucfirst($this->name);
    }

    public function getProperties()
    {
        return $this->properties;
    }

}