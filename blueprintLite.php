<?php

use BlueprintLite\Factories\FormFactory;
use BlueprintLite\Generators\ModelGenerator;
use BlueprintLite\Types\Model;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

require 'vendor/autoload.php';

$yaml = Yaml::parseFile('sample.yaml');

foreach ($yaml as $type => $types) {

    $factory = 'BlueprintLite\\Factories\\' . ucfirst($type) . 'Factory';
    $factory::create($types);

}