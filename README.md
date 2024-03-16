<div align="center">

# ProjetoFinal_CursoPHP

</div>

### projeto final do curso de php 

<br>
<Br>
<Br>

#### observaçoes:
- senha padrao dos usuarios: 1234
- provedor de email padrão dos usuarios: @email.com

## A base do projeto consiste no projeto do modulo 4 so que melhorado

### o que há de novo?
- melhorias no crud
    - os usuarios nao podem mais realizar dois agendamentos no mesmo horario
    - tabelas de pacientes e agendamentos de cada medico adicionadas
- os agendamentos cuja data já passou, serão marcados como 'Expirado' na tabela
- resolvendo um grave erro
    - caso o usuario seja admin, ele nao podera mais nem ver, nem excluir os outros usuarios do tipo admin
    - motivo: ele poderia simplesmente se excluir da tabela
  
### melhorias futuras:
- soft-delete
- os usuarios pra terem um agendamento, o medico precisa primeiro confirmar o agendamento, assim ele será marcado
- menu de 'Ver Conta' no canto superior direito
- cada usuario podera alterar sua senha