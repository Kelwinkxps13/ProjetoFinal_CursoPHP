<?php

    # inclui os arquivos necessarios
    include_once 'models/Config.php';
    include_once 'controllers/validate.php';

    # inicia uma sessao
    session_start();

    # se NAO existir uma sessao na posicao sha1(user_data), ele leva de volta para a pagina de login
    if(!isset($_SESSION[sha1('user_data')])){
        header("location: ".Config::urlBase()."?error=access_denied");
    }

    # armazena os dados do usuario atual em uma variavel
    $userData = $_SESSION[sha1('user_data')];

    # funcao que controla o conteudo da pagina
    function pageContent(){

        # chama a funcao validar pagina para controlar o conteudo
        validarPagina();
    }

    # inclui o layout
    include_once 'views/layout.php';


?>