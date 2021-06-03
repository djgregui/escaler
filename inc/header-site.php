<?php
  require COMMON;
  if(isset($_SESSION['loggedin_escaler'])) {
    header_user($_SESSION['id_user']);
  }
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Escaler</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?=BASEURL?>estilocss/estilo.css">
  <link rel="shortcut icon" href="<?=BASEURL?>img/Logo/favicon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="<?=BASEURL?>vendor/jquery.js"></script> <!-- jQuery by Google -->
  <script src="<?=BASEURL?>vendor/popper.min.js"></script> <!-- Popper by Twitter -->
  <script src="<?=BASEURL?>vendor/bootstrap/js/bootstrap.js"></script> <!-- Bootstrap by Twitter -->
  <style>.bg-escaler {background: rgb(157, 2, 1);}</style>
  <script>
		n = 0;
		$(function(){
      <?php if(isset($_SESSION['loggedin_escaler'])) { ?>
			initializeCart();
      <?php } ?>
		});
    function cartsubmit() {
      document.querySelector("#cart-area").submit();
    }
		function initializeCart() {
			if(JSON.parse(localStorage.cart).length > 0) {
        JSON.parse(localStorage.cart).forEach(function(item){
          renderToCart(item);
        });
        $("#dropdownMenuLink span.badge").html(JSON.parse(localStorage.cart).length);
				$("#scart-ac-keep").hide();$("#scart-ac-submit").show();
			} else {
        $("#dropdownMenuLink span.badge").html("0");
      }
		}
		function addToCart(id) {
			$.getJSON('/usuario/carrinho/ajax.php?id='+id,null,function(res){
        temp=JSON.parse(localStorage.cart);
        console.log(res);
        temp.push(res);
        localStorage.cart = JSON.stringify(temp);
        if(JSON.parse(localStorage.cart).length > 0) {
          $("#scart-ac-keep").hide();$("#scart-ac-submit").show();
        }
        renderToCart(res);
        $("#dropdownMenuLink span.badge").html(JSON.parse(localStorage.cart).length); 
			})
		}
		function toggleCart() { $('#drop1').css('margin-top','3px').css('margin-right','60px').toggle(); }
		function renderToCart(item) {
			$('#cart-area').append(`
				<div class="form-group row mb-1" id='cart${n}'>
					<input type="hidden" name="produto[]" value="${item.idv}">
					<div class="col-12">
						<div class="row">
							<div class="col-4 text-center">
								<img src="/${item.img}" alt="" style="height:48px;display:inline-block;margin-bottom:32px">
                <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="position: absolute;bottom: 0px;left: 30%;"><i class="fas fa-minus"></i></a>
							</div>
							<div class="col-8">
								<div class="row">
									<div class="col-12" style="margin-bottom:24px">${item.nome}</div>
									<div class="col-12" style="position:absolute;bottom:0px;">R$ ${(parseFloat(item.valor)).toFixed(2)}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dropdown-divider" style='margin: .5rem -15px;'></div>
			`);
			n++;
		} 
	</script>
</head>
<body>
<!-- Comando para fixagem de Informação/Elementos -->
<div class="fixed-top">

  <!-- Área de Fixagem -->
  <!-- Barra Superior com Slogan -->
  <?php if(isset($_SESSION['loggedin_escaler'])) { ?>
    <div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
      <div class="col-12 col-md-8 col-lg-9 text-center text-uppercase" style="line-height:30px">ESCALER - Sua Compra com Compromisso e Segurança</div>
      <div class="col-12 col-md-4 col-lg-3 d-md-block d-lg-block d-none text-right" style='padding-right:20px'>
      <a href="<?=BASEURL?>usuario" class="btn btn-sm btn-default pl-2"><?php if($usuario['profile_pic'] == null) echo '<i class="fas fa-user"></i>'; else echo '<img style="width:24px;height:25px;border-radius:50%;margin-top:-4px;margin-bottom:-2px" src="'.$usuario['profile_pic'].'">'; ?></a>
      <!-- <a href="#" class='btn btn-sm btn-dark text-light pl-2'> -->
        <a class="btn btn-sm btn-dark" href="javascript:toggleCart()" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart" style="color: white"></i>&nbsp;Carrinho&nbsp;<span class="badge badge-light">0</span>
        </a>
        <div class="dropdown-menu px-4 dropdown-menu-right" style='width:300px;max-height: 70vh;overflow-x: auto;overflow-x:hidden' id="drop1" aria-labelledby="dropdownMenuLink">
          <h6 class="text-center text-muted">Carrinho</h6>
          <div class="dropdown-divider" style='margin: .5rem -15px;'></div>
          <form action="<?=BASEURL?>usuario/shop.php?cart" method="post" id="cart-area">
          
          </form>
          <div class="row" style='margin-right:-30px'>
            <div class="col-12 text-right">
              <a href="javascript:cartsubmit()" class="btn btn-danger float-right" style="">Concluir compra</a>
            </div>
          </div>
        </div>
        <!-- </a> -->
        <a href="<?=BASEURL?>usuario/processa.php?tipo=logout" class='btn btn-sm btn-dark pr-2'><i class="fas fa-user-times"></i></a>
      </div>
    </div>
  <?php } else { ?>
    <div class="text-center py-1 text-light" style="background: rgb(157, 2, 1)">ESCALER - Compromisso e Segurança</div>
  <?php } ?>


    <!-- Barra Principal de Menu com Itens de PEsquisa e Expansíveis -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?=BASEURL?>"><img src="<?=BASEURL?>img/lhColor.png" style="height:48px" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?=BASEURL?>">Ínicio <span class="sr-only">(current)</span></a>
          </li>
          <?php if(isset($_SESSION['loggedin_escaler'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php $query = (open_database())->query("SELECT * FROM colecoes"); while($colecao=$query->fetch_assoc()){ ?>  
                  <a href="<?=BASEURL?>colecao.php?id=<?=$colecao['id']?>" class="dropdown-item "><?=$colecao['nome']?></a>  
                <?php } ?>
              </div>
            </li>
            <li class="nav-item">
              <a href="<?=BASEURL?>usuario/dados-pessoais/" class="nav-link">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a href="<?=BASEURL?>usuario/pedidos/" class="nav-link">Compras</a>
            </li>
            <li class="nav-item">
              <a href="<?=BASEURL?>usuario/favoritos/" class="nav-link">Favoritos</a>
            </li>
            <li class="nav-item">
              <a href="<?=BASEURL?>usuario/pedidos/mensagens/" class="nav-link">Mensagens</a>
            </li>
            <li class="nav-item">
              <a href="<?=BASEURL?>usuario/processa.php?tipo=logout" class="nav-link">Sair</a>
            </li>
          <?php } else { ?>
            <?php $query = (open_database())->query("SELECT * FROM colecoes"); while($colecao=$query->fetch_assoc()){ ?>  
              <li class="nav-item">
                <a href="<?=BASEURL?>colecao.php?id=<?=$colecao['id']?>" class="nav-link "><?=$colecao['nome']?></a>  
              </li>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>
    </nav>


</div>
<?php if(!isset($_SESSION['loggedin_escaler'])) { ?>
  <div style="z-index: 1031;width: fit-content;float: right;left: unset !important;right: 10px;position:fixed;top:4px">
    <a href="<?=BASEURL?>usuario/pagina-login.php" class='text-light text-decoration-none font-weight-bold pr-2'>Entrar</a>
  </div>
<?php } ?>

<!-- Comando para separar Topo Fixado e Informações Abaixo Que Movimentam -->
<main role="main" class="" style="margin-top: 120px"><!-- container-fluid -->