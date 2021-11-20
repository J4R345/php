<?php

Class homeController extends Controller{
 
    public function index() // Padrão www.nome.com/
    {
          // chama um model
          
          // chama um view
          // Fazer a juncao de back end com front end

          $this->carregarTemplate('home');
    }

}