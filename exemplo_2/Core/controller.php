<?php

Class Controller{

    public $dados;
    public $dados2;

    public function __construct()
    {
        $this->dados = array();
        $this->dados2 = array();
    }
    

    //Chamado por todos os CONTROLLERS
    public function carregarTemplate($nomeView, $dadosModel = array(), $dados2 = array())
    {
        $this->dados = $dadosModel;
        $this->dados2 = $dados2;
        require 'Views/template.php';
        
    }
    //Chamado no Template
    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){

        extract($dadosModel);
        require 'Views/'.$nomeView.'.php'; //dinamico
    }

}
