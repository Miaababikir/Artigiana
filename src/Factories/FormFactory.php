<?php


namespace Artigiana\Factories;


use Artigiana\Form;

class FormFactory
{

    public static function create($resource, $name, $form)
    {
        return new Form($resource, $name, $form);
    }
}