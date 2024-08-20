<?php

namespace Demander\Models;

use Demander\Model;
use Demander\DB\Sql;
use Demander\Models\Action;

class Frame extends Model
{
    function __construct(string $name = '')
    {   
        if ($name !== '') {
            $action = new Action($name); // Instancia e faz requisição da ação
            $data = $action->getValues();
    
            $values = array(
                'name' => $name,
                'symbol' => $data['symbol'],
                'largura' => $data['regularmarketprice'], // 
                'variacao' => $data['regularmarketchangepercent'], //
                'logo_url' => $data['logourl']
            );
    
            $this->setData($values); // Atribui o valores recebidos aos atributos do objeto.*/
            $this->save(); // Salva dados da API no BD
        } else {
            return array();
        }
    }

    // Retorna todos os frames do BD.
    public function getFrames(): array
    {
        $sql = new Sql;
        return $sql->select("SELECT * FROM tb_frames ORDER BY id_frame;");
    }

    // Salva o frame no BD.
    public function save(): void
    {
        $sql = new Sql;
        $sql->query("INSERT INTO tb_frames (name, symbol, largura, variacao, logo_url) VALUES (:name, :symbol, :largura, :variacao, :logo_url);", array(
            ':name' => $this->getname(),
            ':symbol' => $this->getsymbol(),
            ':largura' => $this->getlargura(),
            ':variacao' => $this->getvariacao(),
            ':logo_url' => $this->getlogo_url()
        ));
    }

    // Pega os dados do frame armazenado no objeto.
    public function getFrame(): array
    {
        return $this->getValues();
    }
}
