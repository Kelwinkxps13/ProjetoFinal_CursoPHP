<?php

include_once 'models/Connect.php';
include_once 'models/Manager.php';


$choice = (new Manager)->select_common("usuarios", ["nome", "cpf"], ['tipoAcesso' => "medico"], null);

?>
<div class="container-fluid px-4">
    <?php if (isset($_GET['insertion'])) : ?>
        <?php if ($_GET['insertion'] == "false") : ?>
            <h3 class="text-center">Já existe um agendamento nesse horário!!</h3>
        <?php endif; ?>
    <?php endif; ?>
    <h1 class="mt-4"><?= $titleSection; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $titleSection; ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <?= $titleSection; ?>
        </div>
        <div class="card-body">
            <!-- Conteúdo real da página -->
            <form action="<?= Config::urlBase(); ?>/controllers/Agendamentos.php" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Nome e CPF do Médico </label>
                            <select name="cpfMedico" class="form-select" aria-label="Default select example" required>
                                <option value="">Escolha o Médico</option>
                                <?php foreach ($choice as $value) : ?>
                                    <option value="<?= $value["cpf"] ?>"><?= $value["nome"] . " - " . $value["cpf"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Data da Consulta </label>
                            <input name="dataC" type="date" class="form-control" id="data" placeholder1="Nome do Produto" value="" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Hora da Consulta </label>
                        <select name="horaC" class="form-select" aria-label="Default select example" required>
                            <option value="">Escolha a hora</option>
                            <?php for ($i = 7; $i < 22; $i++) : ?>
                                <?php if ($i < 10) : ?>
                                    <option value="<?= "0" . $i . ":00:00" ?>"><?= "0" . $i . ":00:00" ?></option>
                                <?php elseif ($i > 9) : ?>
                                    <option value="<?= $i . ":00:00" ?>"><?= $i . ":00:00" ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <input type="hidden" value="insert" name="action">

                    <div class="col-12 mt-3">
                        <p class="text-end">
                            <button class="btn btn-outline-success" type="submit">
                                <span class="iconify" data-icon="material-symbols:save-sharp" style="color: #198754;"></span>
                                Salvar Dados
                            </button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        var amanha = new Date();
        amanha.setDate(amanha.getDate() + 1);

        var ano = amanha.getFullYear();
        var mes = ("0" + (amanha.getMonth() + 1)).slice(-2);
        var dia = ("0" + amanha.getDate()).slice(-2);

        var dataAmanha = ano + "-" + mes + "-" + dia;

        document.getElementById('data').min = dataAmanha;
    }
</script>