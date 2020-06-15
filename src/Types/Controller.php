<?php


namespace BlueprintLite\Types;


class Controller
{
    private $name;
    private $properties;
    private $methods = [];
    private $statements = '';

    public function __construct($name, $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
        $this->setMethods();
    }

    private function setMethods()
    {
        foreach ($this->properties as $name => $statements) {
            $method = new Method($this->name, $name, $statements);
            $this->statements .= $method->prepStatements();
        }
    }

    public function getName()
    {
        return ucfirst($this->name) . 'Controller';
    }

    public function getStatements()
    {
        return $this->statements;
    }

}