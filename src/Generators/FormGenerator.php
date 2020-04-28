<?php

namespace Artigiana\Generators;

use Artigiana\Form;

class FormGenerator
{
    public function generate(Form $form)
    {
        $this->generateFields($form->fields());
    }

    private function generateFields($fields)
    {
        $generatedFields = '';

        foreach ($fields as $field) {
            $content = file_get_contents('src/stubs/input.stub');
            $content = "\n" . str_replace('{{ type }}', $field->attributes()->type, $content);
            $content = "\n" . str_replace('{{ name }}', $field->name, $content);

            $generatedFields .= $content;
        }

        $content = file_get_contents('src/stubs/form.stub');
        $content = "\n" . str_replace('{{ fields }}', $generatedFields, $content);

        file_put_contents('build/form.blade.php', $content);

    }
}