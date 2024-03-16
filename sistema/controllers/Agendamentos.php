<?php

# incluindo os arquivos necessarios.
include_once "../models/Config.php";
include_once Config::pathBase() . "/models/Connect.php";
include_once Config::pathBase() . "/models/Manager.php";

# iniciando a sessao.
session_start();

# verificando se existe um action com o method post.
if ($_REQUEST['action']) {

    # removendo o action depois de verificado sua existencia.
    unset($_POST['action']);

    #instanciando um objeto do tipo manager.
    $manager = new Manager;

    # switch para ver os valores que o action pode assumir.
    switch ($_REQUEST['action']) {

        case 'delete':

            # deleta do banco de dados o registro escolhido.
            $manager->delete_common("agendamentos", ['id' => $_POST['id']], null);
            break;

        case 'insert':

            # ele pega o dataC e o horaC, e os junta em um post dataConsulta.
            $_POST['dataConsulta'] = $_POST['dataC'] . " " . $_POST['horaC'];

            # remove eles, pois nao serao usados mais.
            unset($_POST['dataC']);
            unset($_POST['horaC']);

            # verifica se já existe um agendamento no mesmo horário e no mesmo dia
            $verificarInsert = $manager->select_common("agendamentos", null, ['dataConsulta' => $_POST['dataConsulta']], null);

            # caso exista, ele retorna pra tela de agendamentos
            if ($verificarInsert) {
                header("location: " . Config::urlBase() . "/sistema.php?pagina=inserirAgendamento&insertion=false");
                exit;
            } else {
                # seta o idCliente com o session id.
                $_POST['idCliente'] = $_SESSION[sha1("user_data")][0]["id"];

                # seta o cpfCliente com o session cpf.
                $_POST['cpfCliente'] = $_SESSION[sha1("user_data")][0]["cpf"];

                # seta o nomeCLiente com o session nome.
                $_POST['nomeCliente'] = $_SESSION[sha1("user_data")][0]["nome"];

                # seta o email com o session email.
                $_POST['emailCliente'] = $_SESSION[sha1("user_data")][0]["email"];

                # consulta os dados necessarios do médico, por meio de seu cpf.
                $searchMedico = $manager->select_common("usuarios", ["id", "cargo", "nome"], ["cpf" => $_POST['cpfMedico']], null);

                # seta o idMedico.
                $_POST['idMedico'] = $searchMedico[0]["id"];

                # seta o nomeMedico.
                $_POST['nomeMedico'] = $searchMedico[0]["nome"];

                # seta o cargoMedico.
                $_POST['cargoMedico'] = $searchMedico[0]["cargo"];

                # Finalmente inserindo o agendamento no banco de dados.
                $manager->insert_common("agendamentos", $_POST, null);
                break;
            }

        case 'update':

            # ele pega o dataC e o horaC, e os junta em um post dataConsulta.
            $_POST['dataConsulta'] = $_POST['dataC'] . " " . $_POST['horaC'];

            # remove eles, pois nao serao usados mais.
            unset($_POST['dataC']);
            unset($_POST['horaC']);

            # verifica se já existe um agendamento no mesmo horário e no mesmo dia
            $verificarUpdate = $manager->select_common("agendamentos", null, ['dataConsulta' => $_POST['dataConsulta']], null);

            # caso exista, ele retorna pra tela de agendamentos
            if ($verificarUpdate) {
                header("location: " . Config::urlBase() . "/sistema.php?pagina=atualizarAgendamento&id=".$_POST['id']."&insertion=false");
                exit;
            } else {
                # consulta os dados necessarios do médico, por meio de seu cpf.
                $searchMedico = $manager->select_common("usuarios", ["id", "cargo", "nome"], ['cpf' => $_POST['cpfMedico']], null);

                # seta o idMedico.
                $_POST['idMedico'] = $searchMedico[0]["id"];

                # seta o nomeMedico.
                $_POST['nomeMedico'] = $searchMedico[0]["nome"];

                # seta o cargoMedico.
                $_POST['cargoMedico'] = $searchMedico[0]["cargo"];

                # atualizando o agendamento no banco de dados
                $manager->update_common("agendamentos", $_POST, ['id' => $_POST['id']], null);
                break;
            }
    }


    # if futuro caso haja alguma modificaçao nos redirecionamentos dos usuarios.

    # if para ver se existe um usuario com um acesso.
    if (isset($_SESSION[sha1("user_data")][0]["tipoAcesso"])) {

        # switch que diz pra onde cada usuario vai dependendo de seu tipo de acesso.
        switch ($_SESSION[sha1("user_data")][0]["tipoAcesso"]) {

            case "admin":
                header("location: " . Config::urlBase() . "/sistema.php?pagina=listarAgendamentos");
                exit;
                break;
            case "medico":
                header("location: " . Config::urlBase() . "/sistema.php?pagina=listarAgendamentos");
                exit;
                break;
            case "cliente":
                header("location: " . Config::urlBase() . "/sistema.php?pagina=listarAgendamentos");
                exit;
                break;
        }
    }
}
