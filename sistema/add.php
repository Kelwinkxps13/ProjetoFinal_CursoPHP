<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="views/template/css/styles.css" rel="stylesheet" />
</head>

<body>

    <div class="container px-4">
        <h1 class="mt-4">Cadastro</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Cadastro</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Cadastro
            </div>
            <div class="card-body">
                <!-- Conteúdo real da página -->
                <form action="controllers/Cliente.php?action=insert" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Nome </label>
                                <input name="nome" type="text" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Produto" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Email </label>
                                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Produto" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label cpf"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> CPF </label>
                                <input name="cpf" type="text" class="form-control" id="cpf" placeholder1="Nome do Produto" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Senha </label>
                                <input name="senha" type="password" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Produto" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Tipo de Acesso </label>
                                <select name="tipoAcesso" class="form-select" aria-label="Default select example" required>
                                    <option value=""> Escolha seu tipo de usuário </option>
                                    <option value="cliente"> Cliente </option>
                                    <option value="medico"> Médico </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Cargo </label>
                                <input name="cargo" type="text" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Produto" required>
                            </div>
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

    <script type="text/javascript">
			$(document).ready(function(){
				$('.cpf').mask('000.000.000-00', {reverse: true});
				$('.cep').mask('00000-000');
			});
	</script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="views/template/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="views/template/js/datatables-simple-demo.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</body>

</html>