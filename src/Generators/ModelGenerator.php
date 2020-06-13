<?php


namespace Artigiana\Generators;


use Artigiana\Types\Migration;
use Artigiana\Types\Model;

class ModelGenerator
{
    public function generate(Model $model)
    {
        $content = file_get_contents('src/stubs/model.stub');
        $content = "\n" . str_replace('{{ name }}', $model->getName(), $content);

        file_put_contents("build/{$model->getName()}.php", $content);

        $generator = new MigrationGenerator();

        $generator->generate(new Migration($model->getName(), $model->getProperties()));
    }
}