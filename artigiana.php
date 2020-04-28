<?php

use Artigiana\Factories\FormFactory;
use Artigiana\Generators\FormGenerator;
use Symfony\Component\Yaml\Yaml;

require 'vendor/autoload.php';

$yaml = Yaml::parseFile('sample.yaml');

foreach ($yaml as $resource => $form)
{
    foreach ($form as $name => $fields)
    {
        $formObject = FormFactory::create($resource,$name, $fields);
        (new FormGenerator())->generate($formObject);
    }
}