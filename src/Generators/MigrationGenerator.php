<?php


namespace Artigiana\Generators;


use Artigiana\Types\Migration;

class MigrationGenerator
{
    public function generate(Migration $migration)
    {
        $content = file_get_contents('src/stubs/migration.stub');
        $content = str_replace('DummyClass', $migration->getClassName(), $content);
        $content = str_replace('DummyTable', $migration->getTableName(), $content);
        $content = str_replace('DummyColumns', $migration->getColumns(), $content);


        if (!is_dir($directory = 'build/database/Migrations')) {
            mkdir($directory, 0755, true);
        }
        file_put_contents("build/database/Migrations/{$migration->getMigrationName()}.php", $content);
    }
}