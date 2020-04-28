<?php


namespace Artigiana;


class Form
{
    private $resource;
    private $name;
    private $fields;

    /**
     * @param $resource
     * @param $name
     * @param $fields
     */
    public function __construct($resource, $name, $fields)
    {
        $this->resource = $resource;
        $this->name = $name;
        $this->setFields($fields);
    }

    private function setFields($fields)
    {
        foreach ($fields as $attribute => $name) {
            $this->fields[] = new Field($attribute, $name);
        }
    }

    public function fields()
    {
        return $this->fields;
    }


}