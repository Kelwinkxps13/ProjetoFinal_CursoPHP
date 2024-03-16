
<div class="container-fluid">
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
            <table class="table table-bordered table-hover table-stripped text-center" id="datatablesSimple">
                <thead class="text-center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo Acesso</th>
                    <th>Cargo</th>
                    <th>Cadastro</th>
                    <?php if ($_SESSION[sha1("user_data")][0]["tipoAcesso"] != "medico") : ?>
                    <th>Ações</th>
                    <?php endif; ?>
                </thead>
                <tbody>
                    <?php foreach ($lista as $l): ?>
                        <?php if (!($l['tipoAcesso'] == "admin")) : ?>
                            <tr>
                                <td><?=$l['id'];?></td>    
                                <td><?=$l['nome'];?></td>    
                                <td><?=$l['email'];?></td>    
                                <td><?=$l['tipoAcesso'];?></td>    
                                <td><?=$l['cargo'];?></td>  
                                <td><?=$l['criadoEm'];?></td>
                                <?php if ($_SESSION[sha1("user_data")][0]["tipoAcesso"] != "medico") : ?>
                                <td>

                                    <a href="?pagina=atualizarUsuario&id=<?=$l['id']?>" class="btn btn-sm btn-secondary">
                                        <span class="iconify" data-icon="ph:pencil-bold"></span>
                                    </a>

                                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $l['id']; ?>">
                                        <span class="iconify" data-icon="ph:trash-bold"></span>
                                    </button>
                                </td>
                                <?php endif; ?>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-<?= $l['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?=Config::urlBase();?>/controllers/cliente.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Excluir Usuario
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir o Usuario 
                                                    <strong><?= $l['nome']; ?></strong>?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= $l['id']; ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-danger">Sim, excluir! </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php //LibHtml::criarTabela($lista, ["class"=>"table table-bordered table-hover table-stripped","id"=>"datatablesSimple"], $links) ?>

        </div>
    </div>
</div>