<?php

Class Controller{

    public $dados;

    public function __construct()
    {
        $this->dados = array();
    }
    

    //Chamado por todos os CONTROLLERS
    public function carregarTemplate($nomeView, $dadosModel = array())
    {
        $this->dados = $dadosModel;
        require 'Views/template.php';
        
    }
    //Chamado no Template
    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){

        extract($dadosModel);
        require 'Views/'.$nomeView.'.php'; //dinamico
    }

}
