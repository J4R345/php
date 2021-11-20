<?php

Class Core{

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        $parametros = array();

        if(isset($_GET['pag']))
        {
            
            $url = $_GET['pag'];

        }
        
        if(!empty($url))

        // Se entrar neste if, existe informação apos o dominio (wwww.estesite.com) 
        // Classe
        // Metodo-Função
        // Parametros
        
        {
            $url = explode('/', $url);
            $controller = $url[0].'Controller'; //noticias
            // O array_shift elimina o primeiro valor do array
            array_shift($url);
            // Enviou somente o Metodo
            if(isset($url[0]) && !empty($url[0]))
            {
                $metodo = $url[0];
                array_shift($url); 
            }else // Enviou somente a classe
            {
                $metodo = 'index';
            }

            if(count($url) > 0 )
            {
                $parametros = $url;
            } 

        } else //www.nomesite.com
        
        {
            $controller = 'homeController';
            $metodo = 'index';

        }
                                
        $caminho = 'exemplo_1/Controllers/'.$controller.'.php';
        //Localizar arquivo
        if(!file_exists($caminho) && !method_exists($controller, $metodo))
        {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $c = new $controller;
           
        call_user_func_array(array($c,$metodo), $parametros);
    
    }

   }
