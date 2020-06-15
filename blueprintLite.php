<?php

use BlueprintLite\Factories\FormFactory;
use BlueprintLite\Generators\ModelGenerator;
use BlueprintLite\Types\Model;
use Symfony\Component\Yaml\Yaml;

require 'vendor/autoload.php';

$yaml = Yaml::parseFile('sample.yaml');

foreach ($yaml as $type => $types) {
    foreach ($types as $name => $properties) {
        $model = new Model($name, $properties);
        $generator = new ModelGenerator();
        $generator->generate($model);
    }
}