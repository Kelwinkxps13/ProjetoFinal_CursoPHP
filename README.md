<div align="center">

# ProjetoFinal_CursoPHP

</div>

### projeto final do curso de php 

<br>

<h3>Realizado por:</h3>

- [Kelwin Jhackson Gonçalves de Moura](https://github.com/Kelwinkxps13) <br>

<h3>Professor</h3>

- [Anthony Jefferson Gonçalves de Moura](https://github.com/anthonyjeff)<br>

<h3>Escola</h3>

- [Universidade do Trabalho Digital](https://www.cursosutd.inf.br/)

<h3>Curso</h3>

- Linguagem De Programação PHP (120h/A)

<h3>Linguagem utiizada</h3>

- PHP

<hr>

### Observaçoes:
- A base do projeto consiste no [projeto do modulo 4](https://github.com/Kelwinkxps13/Atividades_CursoPHP/tree/main/Modulo04/ExercicioDeProgressaoDeModulo) melhorado
- senha padrao dos usuarios: 1234
- provedor de email padrão dos usuarios: @email.com

### Como utilizar:
- metodo 1:
  - Instale o [xampp](https://www.apachefriends.org/pt_br/download.html)
  - Faça todo o procedimento para realizar a instalação do xampp
  - abra o xampp e ative o *apache* e o *mysql*
  - neste repositorio, realize o download
  - mova a pasta extraida para C:\xampp\htdocs
  - no seu navegador, abra o endereço localhost\phpmyadmin
  - digite o usuario padrao root com senha vazia
  - clique em **novo no menu principal do phpmyadmin(garanta que está clicado la)**
  - na parte superior direita, clique em importar
  - escolha o ficheiro em: **C:\xampp\htdocs\ProjetoFinal_CursoPHP\sistema\database** e escolha o arquivo **sistema(2).sql**
  - aperte no botao **importar** que irá aparecer embaixo
  - no seu navegador, digite o endereço localhost\ProjetoFinal_CursoPHP\sistema
  - pronto! voce ja pode utilizar o projeto
  
- metodo 2:
  - Instale o [laragon completo](https://laragon.org/download/index.html)
  - Faça todo o procedimento para realizar a instalação do laragon
  - abra o laragon e ative o *apache* em **Iniciar tudo** (o mysql por padrao ja vem ativo)
  - neste repositorio, realize o download
  - mova a pasta extraida para C:\laragon\www
  - no seu navegador, abra o endereço localhost\phpmyadmin
  - digite o usuario padrao root com senha vazia
  - clique em **novo no menu principal do phpmyadmin(garanta que está clicado la)**
  - na parte superior direita, clique em importar
  - escolha o ficheiro em: **C:\laragon\www\ProjetoFinal_CursoPHP\sistema\database** e escolha o arquivo **sistema(2).sql**
  - aperte no botao **importar** que irá aparecer embaixo
  - no seu navegador, digite o endereço localhost\ProjetoFinal_CursoPHP\sistema
  - pronto! voce ja pode utilizar o projeto

### motivo dessa utlização:
- o projeto nao esta hospedado em nenhum servidor

### o que há de novo?
- melhorias no crud
    - os usuarios nao podem mais realizar dois agendamentos no mesmo horario
    - tabelas de pacientes e agendamentos de cada medico adicionadas
- os medicos nao podem excluir seus pacientes do banco de dados
- os agendamentos cuja data já passou, serão marcados como 'Expirado' na tabela
- resolvendo um grave erro
    - caso o usuario seja admin, ele nao podera mais nem ver, nem excluir os outros usuarios do tipo admin
    - motivo: ele poderia simplesmente se excluir da tabela
  
### melhorias futuras:
- soft-delete
- os usuarios pra terem um agendamento, o medico precisa primeiro confirmar o agendamento, assim ele será marcado
- menu de 'Ver Conta' no canto superior direito
- cada usuario podera alterar sua senha
