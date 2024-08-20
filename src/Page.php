<?php

namespace Demander;

use Rain\Tpl;

class Page {
    private $tpl;

    public function __construct($params = array(), $tpl_dir = 'views/')
    {   
        // rain tpl config
        $config = array(
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $tpl_dir,
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        //var_dump($config);

        // Configure the template
        Tpl::configure($config);

        // Create the Tpl object
        $this->tpl = new Tpl;

        $this->setData($params);
    }

    private function setData($data = array())
    {
        foreach ($data as $key => $value) {
            // Cria uma variável tpl de nome $key com valor $value
            $this->tpl->assign($key, $value);
        }
    }

    public function setTemplate($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);
        return $this->tpl->draw($name, $returnHTML);
    }
}
