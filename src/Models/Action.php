<?php

namespace Demander\Models;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

use Demander\Model;

class Action extends Model
{   
    private $values;

    public function __construct(string $name)
    {   
        $values = $this->actionFromWeb($name);
        $this->setData($values);
    }

    // Faz requisição à API.
    private function actionFromWeb($name): array
    {
        $json_response = file_get_contents(
            'https://brapi.dev/api/quote/'. $name . '?token=' . $_ENV['BRAPI']
        );

        if ($json_response !== false) {
            // Retorna array com os dados de cada mês dos últimos 20 anos.
            return json_decode($json_response, true)['results'][0];
        } else { 
            echo "Request failed."; 
        }
    }

    public function getAction(): array
    {
        return $this->getValues();
    }
}
