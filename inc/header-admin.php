<?php if($_SESSION['loggedin_admescaler'] != 1) { header("Location: ".BASEURL."adm/logout.php");} require COMMON; ?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?=BASEURL?>estilocss/estilo.css">
  <title>Escaler</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="<?=BASEURL?>img/Logo/favicon.png" type="image/x-icon"/>
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
</head>
<body>
  <div class="fixed-top">
    <div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
      <div class="col-md-11 col-lg-11 col-9 text-center">ESCALER - Compromisso e Segurança</div>
        <div class="col-md-1 col-lg-1 col-3 text-right">
          <a href="<?=BASEURL?>adm/logout.php"><b style="color: white; padding-right: 10px">Sair</b></a>
        </div>
      </div>
      <!-- Barra Principal de Menu com Itens de PEsquisa e Expansíveis -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?=BASEURL?>"><img src="<?=BASEURL?>img/lhColor.png" alt="logo" style="height:48px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/index.php">Início</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/perfil/index.php">Perfil</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/usuarios/index.php">Usuários</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/produtos/index.php">Produtos</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/pedidos/index.php">Pedidos</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/relatorios/index.php">Relatórios</a></li>
            <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/configuracoes/index.php">Configurações</a></li>
          </ul>
        </div>
      </nav>
  </div>
  <main role="main" class="container-fluid" style="margin-top: 135px">