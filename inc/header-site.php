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
<script src="<?=BASEURL?>vendor/popper.min.js"></script> <!-- Popper by Twitter -->
<script src="<?=BASEURL?>vendor/bootstrap/js/bootstrap.js"></script> <!-- Bootstrap by Twitter -->
<link rel="stylesheet" href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Arapey&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />



<!-- Comando para fixagem de Informação/Elementos -->
<div class="fixed-top">

  <!-- Área de Fixagem -->
  <!-- Barra Superior com Slogan -->
  <div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
    <div class="col-10 text-center"; style="padding-left: 130px">ESCALER - Sua Compra com Compromisso e Segurança</div>
      <div class="col-1 text-right";>
        <a href="<?=BASEURL?>usuario/pagina-login.php">
        <b style="color: white; padding-right: 10px">Acesso Geral</b>
        </a>
      </div>
      <div class="col-1 text-right";>
        <a href="<?=BASEURL?>adm/pagina-login.php">
        <b style="color: white; padding-right: 10px">Acesso Adm</b>
        </a>
      </div>
    </div>


    <!-- Barra Principal de Menu com Itens de PEsquisa e Expansíveis -->
    <nav class="navbar navbar-expand-sm bg-light navbar-right  justify-content-end">

<!-- Logo -->
<a class="navbar-brand" href="<?=BASEURL?>index.php">
        <img src="<?=BASEURL?>img/Logo/Logo fundo trasp.png" alt="logo" style="max-height: 55px">
    </a>

    <div class="collapse navbar-collapse w-100 order-3 d-flex flex-md-fill flex-shrink-1 justify-content-end" id="navbarSupportedContent">
    <div class="form-inline my-0 my-lg-0">

<!-- Botão Home -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="<?=BASEURL?>index.php" class="nav-link botao-menu-superior">Home</a>
      </li>  

<!-- Barra de Pesquisa -->
      <form class="form-inline my-0 my-lg-0" action="<?=BASEURL?>site/paginas/pesquisa/search.php" method="get">
        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" aria-label="Search" name="pesquisa">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>

<!-- Menu Expansível com Páginas -->
      <li class="nav-item dropdown">
        <a class="nav-link botao-menu-superior " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bars fa-2x"></i>
        </a>
        
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <?php
            // Entra no banco de dados
            $db = open_database();
            // Acessa o banco específico que quero a informação (o limite é a quantidade de itens seguidos mostrado)
            $query = $db->query("SELECT * FROM colecoes");
            // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
            while($colecao=$query->fetch_assoc()){
        ?>
          <a href="<?=BASEURL?>site/paginas/colecao.php?id=<?=$colecao['id']?>" class="dropdown-item botao-menu-superior"><?=$colecao['nome']?></a>  
        <?php
            }
        ?>
        
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>

</div>


<!-- Comando para separar Topo Fixado e Informações Abaixo Que Movimentam -->
<main role="main" class="container-fluid" style="margin-top: 120px">