<?php

namespace Demander;

class Model
{
    private $values = []; // armazena valores do banco de dados.

    public function __call($name, $args)
    {
        $method_action = substr(strtolower($name), 0, 3); // retorna as 3 primeiras letras de "$name" (armazena "set" ou "get")
        $fieldname = substr(strtolower($name), 3, strlen($name)); // retorna, a partir da 4 letra, as últimas letras de "$name"

        switch ($method_action) {
            case 'get':
                return (isset($this->values[$fieldname]) ? $this->values[$fieldname] : NULL);
                break;

            case 'set':
                $this->values[$fieldname] = $args[0]; // "setkey" => value
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Cria métodos dinamicamente.
     * 
     * @param array $data Array que contém nomes de colunas e seus respectivos valores.
     */
    public function setData($data = array())
    {
        foreach ($data as $key => $value) {
            $this->{'set' . $key}($value); // setkey(value)
        }
    }

    public function getValues(): array
    {
        return $this->values;
    }
}