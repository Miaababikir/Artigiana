<?php


namespace BlueprintLite\Factories;


use BlueprintLite\Generators\ModelGenerator;
use BlueprintLite\Types\Model;

class ModelsFactory implements FactoryContract
{

    public static function create($data)
    {
        foreach ($data as $name => $properties) {
            $model = new Model($name, $properties);
            $generator = new ModelGenerator();
            $generator->generate($model);
        }
    }
}