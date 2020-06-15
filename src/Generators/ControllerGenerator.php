<?php


namespace BlueprintLite\Generators;


use BlueprintLite\Types\Controller;
use BlueprintLite\Types\Migration;
use BlueprintLite\Types\Model;

class ControllerGenerator
{
    public function generate(Controller $controller)
    {
        $content = file_get_contents('src/stubs/controller/class.stub');
        $content = "\n" . str_replace('DummyClass', $controller->getName(), $content);

        $methodContent = file_get_contents('src/stubs/controller/method.stub');
        $methodContent = str_replace('//', $controller->getStatements(), $methodContent);

        $content = str_replace('DummyMethods', $methodContent, $content);

        if (!is_dir($directory = 'build/controllers')) {
            mkdir($directory, 0755, true);
        }
        file_put_contents("build/controllers/{$controller->getName()}.php", $content);

    }
}