<?php


# funçao para validar as paginas com base no get
function validarPagina()
{

    # inclui os arquivos necessarios
    include_once Config::pathBase() . "/models/Connect.php";
    include_once Config::pathBase() . "/models/Manager.php";

    # caso nao exista um get pagina, ele retorna falso
    if (!isset($_GET['pagina'])) {
        return false;
    }

    # casos possiveis pro get pagina
    switch ($_GET['pagina']) {

            # redireciona para a dashboard
        case 'dashboard':
            $titleSection = "Tela de Inicio";
            include_once Config::pathBase() . "/views/modulos/dashboard/dashboard.php";
            break;

            # redireciona para a inserçao do agendamento
        case 'inserirAgendamento':
            $titleSection = "Inserir Agendamento";
            include_once Config::pathBase() . "/views/modulos/agendamentos/add.php";
            break;

            # redireciona para atualizar o usuario
        case 'atualizarUsuario':
            $data = (new Manager)->select_common("usuarios", null, ['id' => $_GET['id']], null)[0];
            $titleSection = "Atualizar Usuario";
            include_once Config::pathBase() . "/views/modulos/clientes/atualizar.php";
            break;

            # redireciona para atualizar um agendamento
        case 'atualizarAgendamento':
            $titleSection = "Atualizar Agendamento";
            include_once Config::pathBase() . "/views/modulos/agendamentos/atualizar.php";
            break;

            # redirecinoa para a listagem de medicos
        case "listarMedicos":

            # caso exista um tipo acesso setado
            if (isset($_SESSION[sha1("user_data")][0]["tipoAcesso"])) {

                # casos possiveis para o tipo acesso
                switch ($_SESSION[sha1("user_data")][0]["tipoAcesso"]) {

                    case "admin":
                        $titleSection = "Lista de Medicos";

                        # armazena em uma variavel a consulta de todos os medicos
                        $lista = (new Manager)->select_common("usuarios", null, ['tipoAcesso' => "medico"], null);

                        # caso tenha algum medico, redireciona para a listagem
                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/clientes/lista.php";
                        }

                        # senao ele retorna uma mensagem
                        else {
                            echo "nenhum resultado correspondente";
                        }
                        break;

                        # obs: medico nao pode ver a listagem de medicos
                    case "cliente":
                        $titleSection = "Lista de Medicos Disponiveis";

                        # armazena em uma variavel a consulta de todos os medicos
                        $lista = (new Manager)->select_common("usuarios", null, ['tipoAcesso' => "medico"], null);

                        # caso tenha algum medico, redireciona para a listagem
                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/clientes/lista.php";
                        }

                        # senao ele retorna uma mensagem
                        else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                }
            }
            break;

        case "listarPacientes":

            # caso exista um tipo acesso setado
            if (isset($_SESSION[sha1("user_data")][0]["tipoAcesso"])) {

                # casos possiveis para o tipo de acesso
                switch ($_SESSION[sha1("user_data")][0]["tipoAcesso"]) {

                    case "admin":
                        $titleSection = "Lista de Pacientes";

                        # armazena em uma variavel a consulta de todos os clientes
                        $lista = (new Manager)->select_common("usuarios", null, ['tipoAcesso' => "cliente"], null);

                        # caso tenha algum cliente, ele redireciona para a listagem
                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/clientes/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                    case "medico":

                        $titleSection = "Seus Pacientes";

                        # pesquisa no banco de dados os ids dos usuarios do medico que esta logado
                        $lista = (new Manager)->select_common("agendamentos", ['idCliente'], ['idMedico'=>$_SESSION[sha1("user_data")][0]["id"]], null);

                        # cria um array pra armazenar os ids
                        $idClientes = [];

                        # armazena os ids no array
                        foreach ($lista as $value) {
                            $idClientes[] = $value['idCliente'];
                        }

                        # transforma os ids encontrados em uma string
                        $idCliente_toString = implode(", ", $idClientes);

                        # armazena em uma variavel a consulta de todos os ids
                        $lista = (new Manager)->select_common("usuarios", null, null, " where id in($idCliente_toString)");

                        # caso tenha algum cliente, ele redireciona para a listagem
                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/clientes/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                        break;
                }
            }

            break;

        case "listarUsuarios":

            # caso exista um tipo acesso setado
            if (isset($_SESSION[sha1("user_data")][0]["tipoAcesso"])) {

                # casos possiveis para cada tipo de acesso
                switch ($_SESSION[sha1("user_data")][0]["tipoAcesso"]) {
                    case "admin":
                        $titleSection = "Lista de Usuarios";

                        # armazena em uma variavel a consulta de todos os usuarios
                        $lista = (new Manager)->select_common("usuarios", null, null, null);

                        # caso haja algum usuario, ele redireciona pra a listagem
                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/clientes/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                }
            }

            break;

        case "listarAgendamentos":
            if (isset($_SESSION[sha1("user_data")][0]["tipoAcesso"])) {
                switch ($_SESSION[sha1("user_data")][0]["tipoAcesso"]) {
                    case "admin":
                        $titleSection = "Lista de Agendamentos";
                        $lista = (new Manager)->select_common("agendamentos", null, null, null);

                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/agendamentos/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                    case "medico":

                        # agendamentos dos paciente do medico logado
                        $titleSection = "Lista de Agendamentos";
                        $lista = (new Manager)->select_common("agendamentos", null, ['idMedico'=>$_SESSION[sha1("user_data")][0]["id"]], null);

                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/agendamentos/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                    case "cliente":
                        $titleSection = "Seus Agendamentos";

                        # armazena em uma variavel a consulta de todos os agendamentos do cliente logado pelo seu cpf
                        $lista = (new Manager)->select_common("agendamentos", null, ['cpfCliente' => $_SESSION[sha1("user_data")][0]["cpf"]], null);

                        if ($lista) {
                            include_once Config::pathBase() . "/views/modulos/agendamentos/lista.php";
                        } else {
                            echo "nenhum resultado correspondente";
                        }
                        break;
                }
            }

            break;
    }
}
