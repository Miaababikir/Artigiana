<?php


namespace BlueprintLite\Factories;


use BlueprintLite\Form;

class FormFactory
{

    public static function create($resource, $name, $form)
    {
        return new Form($resource, $name, $form);
    }
}