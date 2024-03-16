<?php

    # incluindo os arquivos necessarios
    include_once '../models/Config.php';
    include_once Config::pathBase()."/models/Connect.php";
    include_once Config::pathBase()."/models/Manager.php";

    # instnciando um objeto do tipo manager
    $manager = new Manager;

    # setando variaveis com base nos posts
    $email = $_POST['email'];
    $senha = $_POST['senha'];
   
    # armazenando em uma variavel a consulta de um usuario com o email digitado, com o limite de 1
    $login = $manager->select_common("usuarios", null, ["email"=>$email], " limit 1");

    # caso nao tenha um usuario com esse email, redireciona pra tela inicial com erro
    if(!$login){
        //echo "sem ocorrencias com esse email";
        header("location: ".Config::urlBase()."?error=login_error");
    }
    
    # caso tenha um usuario com esse email, e a senha encontrada seja diferente do sha1 da senha digitada
    elseif($login[0]["senha"] != sha1($senha)){
        //echo "erro de senha";
        header("location: ".Config::urlBase()."?error=login_error");
    }
    
    # o que acontece caso dê tudo certo
    else{
        
        # inicia uma sessao
        session_start();

        # tira a senha da sessao pra ela nao ficar rodando pela sessao
        unset($login[0]['senha']);

        # coloca na posicao sha1("user_data") no array _SESSION, os dados do usuario (Exceto a senha)
        $_SESSION[sha1("user_data")] = $login;

        # redireciona pra tela inicial
        header("location: ".Config::urlBase());
    
    }



?>