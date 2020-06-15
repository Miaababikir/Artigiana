<?php


namespace BlueprintLite\Types;


class Method
{
    private $name;
    private $class;
    private $statements;

    const INDENT = '        ';

    public function __construct($class, $name, $statements)
    {
        $this->class = $class;
        $this->name = $name;
        $this->statements = $statements;

        $this->prepStatements();
    }

    private function getClassName() {
        return ucfirst($this->class);
    }

    public function prepStatements()
    {
        $generatedStatements = '';

        foreach ($this->statements as $type => $statement) {
            switch ($type) {
                case 'query': {
                    $generatedStatements .= $this->getClassName() . '::' . $statement . '();';
                    break;
                }

                case 'render': {
                    $array = explode(' ', $statement);
                    $generatedStatements .= "\n" . self::INDENT . "return view('" . $array[0] . "')";
                    if (count($array) > 1) {
                        $withs = str_replace('with:', '', $array[1]);
                        $withs = explode(',', $withs);
                        foreach ($withs as $with) {
                            $generatedStatements .= '->with' . ucfirst($with) . '()';
                        }
                    }
                    $generatedStatements .= ';';
                    break;
                }
            }
        }

        return $generatedStatements;
    }


}