<?php


namespace Artigiana;


class Field
{
    public $name;
    private $attribute;

    /**
     * @param $name
     * @param $attribute
     */
    public function __construct($name, $attribute)
    {
        $this->name = $name;
        $this->attribute = new Attribute($attribute);
    }

    public function attributes()
    {
        return $this->attribute;
    }


}