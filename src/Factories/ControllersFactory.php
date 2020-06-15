<?php


namespace BlueprintLite\Factories;


use BlueprintLite\Generators\ControllerGenerator;
use BlueprintLite\Types\Controller;

class ControllersFactory implements FactoryContract
{

    public static function create($data)
    {
        foreach ($data as $name => $properties) {
            $controller = new Controller($name, $properties);
            $generator = new ControllerGenerator();
            $generator->generate($controller);
        }
    }
}