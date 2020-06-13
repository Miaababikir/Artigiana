<?php


namespace Artigiana\Types;


use http\Exception;
use Illuminate\Support\Str;

class Migration
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
        return $this->name;
    }

    public function getClassName()
    {
        return "Create{$this->getName()}Table";
    }

    public function getTableName()
    {
        return Str::plural(lcfirst($this->getName()));
    }

    public function getMigrationName()
    {
        return date("Y_m_d_His") . '_create_' . $this->getTableName()  . '_table';
    }

    public function getColumns()
    {
        $content = '';

        foreach ($this->properties as $type => $name) {
            if ($type === array_key_first($this->properties)) {
                $content = "$" . "table->{$name}('$type');";
                continue;
            }
            $content .= "\n\t\t\t$" . "table->{$name}('$type');";
        }

        return $content;
    }

}