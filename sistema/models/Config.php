<?php

    # classe de configuraçao do projeto
    class Config {

        # onde o projeto se localiza
        public static $project = "ProjetoFinal_CursoPHP/sistema"; 

        # funçao que mostra a urlBase
        public static function urlBase(){

            # $_SERVER['SERVER_NAME'] serve para pegar o nome do servidor, por exemplo, localhost
            return "http://".$_SERVER['SERVER_NAME']."/".self::$project;
        }

        # funcao que mostra o path base
        public static function pathBase(){

            # $_SERVER['DOCUMENT_ROOT'] serve para pegar a pasta raiz onde começa o servidor
            return $_SERVER['DOCUMENT_ROOT']."/".self::$project;
        }


        # funcao de debug
        public static function debug_array($array){
            var_dump($array);
            die();
        }

        
    }
