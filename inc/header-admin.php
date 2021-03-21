<?php
    session_start();
    if($_SESSION['loggedin_escaler'] != 1) { header("Location: ".BASEURL."adm/logout.php");}
?>
<!-- Tipo do Documento -->
<!DOCTYPE html>

<!-- Configuração de Linguagem -->
<meta charset="UTF-8">

<!-- Linkagem dessa página no arquivo de css -->
<link rel="stylesheet" href="<?=BASEURL?>estilocss/estilo.css">

<!-- Título na Aba -->
<title>Escaler</title>

<!-- Favicon na Aba -->
<link rel="shortcut icon" href="<?=BASEURL?>img/Logo/favicon.png" type="image/x-icon"/>

<!-- Instalação das Bibliotecas -->
<script src="<?=BASEURL?>vendor/jquery.js"></script> <!-- jQuery by Google -->
<script src="<?=BASEURL?>vendor/jquery.mask.min.js"></script>
<script src="<?=BASEURL?>vendor/popper.min.js"></script> <!-- Popper by Twitter -->
<script src="<?=BASEURL?>vendor/bootstrap/js/bootstrap.js"></script> <!-- Bootstrap by Twitter -->
<link rel="stylesheet" href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>


<!-- Comando para fixagem de Informação/Elementos -->
<div class="fixed-top">

  <!-- Área de Fixagem -->
  <!-- Barra Superior com Slogan -->
  <div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
    <div class="col-11 text-center"; style="padding-left: 130px">ESCALER - Sua Compra com Compromisso e Segurança</div>
      <div class="col-1 text-right";>
        <a href="<?=BASEURL?>adm/logout.php">
        <b style="color: white; padding-right: 10px">Sair</b>
        </a>
      </div>
    </div>


    <!-- Barra Principal de Menu com Itens de PEsquisa e Expansíveis -->
    <nav class="navbar navbar-expand-sm bg-light navbar-right  justify-content-end">

<!-- Logo -->
    <a class="navbar-brand" href="<?=BASEURL?>adm/paginas">
        <img src="<?=BASEURL?>img/Logo/Logo fundo trasp.png" alt="logo" style="max-height: 55px">
    </a>

    <div class="collapse navbar-collapse w-100 order-3 d-flex flex-md-fill flex-shrink-1 justify-content-end" id="navbarSupportedContent">
    <div class="form-inline my-0 my-lg-0">

<!-- Botão Home -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="<?=BASEURL?>adm/index.php" class="nav-link botao-menu-superior">Home</a>
      </li>  

<!-- Barra de Pesquisa -->
      <form class="form-inline my-0 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>

<!-- Menu Expansível com Páginas -->
      <li class="nav-item dropdown">
        <a class="nav-link botao-menu-superior " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bars fa-2x"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="<?=BASEURL?>adm/index.php" class="dropdown-item botao-menu-superior">DashBoard</a>
            <a href="<?=BASEURL?>adm/perfil/index.php" class="dropdown-item botao-menu-superior">Perfil</a>
            <a href="<?=BASEURL?>adm/usuarios/index.php" class="dropdown-item botao-menu-superior">Usuários Cadastrados</a>
            <a href="<?=BASEURL?>adm/produtos/index.php" class="dropdown-item botao-menu-superior">Produtos</a>
            <a href="<?=BASEURL?>adm/pedidos/index.php" class="dropdown-item botao-menu-superior">Pedidos</a>
            <a href="<?=BASEURL?>adm/relatorios/index.php" class="dropdown-item botao-menu-superior">Relatórios</a>
            <a href="<?=BASEURL?>adm/configuracoes/index.php" class="dropdown-item botao-menu-superior">Configurações</a>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>

</div>


<!-- Comando para separar Topo Fixado e Informações Abaixo Que Movimentam -->
<main role="main" class="container-fluid" style="margin-top: 135px">