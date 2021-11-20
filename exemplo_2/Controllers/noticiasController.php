<?php

Class noticiasController extends Controller{
 
    // Exmplo: www.nomesite.com.br/noticias/getNoticia
    public function index() // Padrão www.nome.com/
    {
          // chama um model 

          $n = new Noticias();
          $dados = $n->getNoticias();
          //echo '<pre>';
          //print_r($dados);
          //echo '</pre>';
          //exit;
          
          // chama um view
          // Fazer a juncao de back end com front end

          $this->carregarTemplate('noticias', array(), $dados);
    }

    public function entretenimento($id_noticias) // Padrão www.nome.com/
    {
          // chama um model  
           $n = new Noticias();
           $dados = $n->getNoticiaPorId($id_noticias); 
           
           //echo '<pre>';
          // print_r($dados);
          // echo '</pre>';
          
          // chama um view
          // Fazer a juncao de back end com front end
          $this->carregarTemplate('entretenimento', $dados);
    }

    public function futebol($id_noticias) // Padrão www.nome.com/
    {
      
      $n = new Noticias();
      $dados = $n->getNoticiaPorId($id_noticias); 
      
          // chama um model
          // chama um view
          // Fazer a juncao de back end com front end

          $this->carregarTemplate('futebol', $dados);
    }
}