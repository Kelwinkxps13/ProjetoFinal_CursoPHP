<div class="container-fluid px-4">
    <h1 class="mt-4 text-center"><?= $titleSection; ?></h1>

    <p>
    <ul> <h3>o que há de novo? </h3> </ul>
        <li> melhorias no crud </li>
        <li> os usuarios nao podem mais realizar dois agendamentos no mesmo horario </li>
        <li> tabelas de pacientes e agendamentos de cada medico adicionadas </li>
        <li> os medicos nao podem excluir seus pacientes do banco de dados </li>
        <li> os agendamentos cuja data já passou, serão marcados como 'Expirado' na tabela </li>
        <li> caso o usuario seja admin, ele nao podera mais nem ver, nem excluir os outros usuarios do tipo admin. <br>
        motivo: ele poderia simplesmente se excluir da tabela
        </li>
    </p>

</div>