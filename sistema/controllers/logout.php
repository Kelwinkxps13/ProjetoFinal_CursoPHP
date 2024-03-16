<?php

    # inclui o arquivo necessario
    include_once "../models/Config.php";

    # inicia a sessao
    session_start();

    # e em seguida a destroi
    session_destroy();

    # edireciona para a tela inicial 
    header("location: ".Config::urlBase()."?success=session_finished");


?>