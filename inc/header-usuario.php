<?php
	// session_start();
	if($_SESSION['loggedin_escaler'] != 1) { header("Location: ".BASEURL."usuario/processa.php?tipo=logout");}
	require COMMON;
	header_user($_SESSION['id_user']);
?>
<!-- Tipo do Documento -->
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?=BASEURL?>estilocss/estilo.css">
	<title>Escaler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="<?=BASEURL?>img/Logo/favicon.png" type="image/x-icon"/>
	<link rel="stylesheet" href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.css">
	<script src="<?=BASEURL?>vendor/jquery.js"></script> <!-- jQuery by Google -->
	<script src="<?=BASEURL?>vendor/jquery.mask.min.js"></script>
	<!-- <script src="<?=BASEURL?>vendor/popper.min.js"></script> --><!-- Popper by Twitter -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?=BASEURL?>vendor/bootstrap/js/bootstrap.js"></script> <!-- Bootstrap by Twitter -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
	<script>
		n = 0;
		$(function(){
			if(window.location.pathname != '/usuario/shop.php') {
			initializeCart();
			} else {
				document.querySelector('#dropdownMenuLink').style.display = 'none'
			}
		});
		function initializeCart() {
			JSON.parse(localStorage.cart).forEach(function(item){
				renderToCart(item);
			});
			$("#dropdownMenuLink span.badge").html(JSON.parse(localStorage.cart).length);
			if(JSON.parse(localStorage.cart).length > 0) {
				$("#scart-ac-keep").hide();$("#scart-ac-submit").show();
			}
		}
		function addToCart(id) {
			$.getJSON('/usuario/carrinho/ajax.php?id='+id,null,function(res){
				console.log(res);
			})
		}
		function toggleCart() { $('#drop1').css('margin-top','3px').css('margin-right','60px').toggle(); }
		function renderToCart(item) {
			$('#cart-area').append(`
				<div class="form-group row mb-1" id='cart${n}'>
					<input type="hidden" name="produto[]" value="${item.idv}">
					<div class="col-10">
						<div class="row">
							<div class="">
								<img src="/${item.img}" alt="" style="height:48px;display:inline-block">
							</div>
							<div class="col-9">
								<div class="row">
									<div class="col-12">${item.nome}</div>
									<div class="col-12">R$ ${item.valor}</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-2" style='line-height:46px'>
						<a href="#" class="btn btn-sm btn-outline-danger" id="btn-checkout" style="display:none"><i class="fas fa-minus"></i></a>
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
  	<div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
		<div class="col-12 col-md-8 col-lg-9 text-center text-uppercase" style="line-height:30px">ESCALER - Compromisso e Segurança</div>
	  	<div class="col-12 col-md-4 col-lg-3 d-md-block d-lg-block d-none text-right" style='padding-right:20px'>
		  	<a href="<?=BASEURL?>usuario" class="btn btn-sm btn-default pl-2"><?php if($usuario['profile_pic'] == null) echo '<i class="fas fa-user"></i>'; else echo '<img style="width:24px;height:25px;border-radius:50%;margin-top:-4px;margin-bottom:-2px" src="'.$usuario['profile_pic'].'">'; ?></a>
			<!-- <a href="#" class='btn btn-sm btn-dark text-light pl-2'> -->
				<a class="btn btn-sm btn-dark" href="javascript:toggleCart()" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-shopping-cart" style="color: white"></i>&nbsp;Carrinho&nbsp;<span class="badge badge-light">0</span>
				</a>
				<div class="dropdown-menu px-4 dropdown-menu-right" style='width:300px;max-height: 70vh;overflow-y: scroll;' id="drop1" aria-labelledby="dropdownMenuLink">
					<h6 class="text-center text-muted">Carrinho</h6>
					<div class="dropdown-divider" style='margin: .5rem -15px;'></div>
					<form action="<?=BASEURL?>usuario/shop.php?cart" method="post" id="">
						<div id="cart-area"></div>
						<div class="row" style='margin-right:-30px'>
							<div class="col-12 text-right">
								<button type="submit"  id="scart-ac-submit" class="btn btn-danger float-right" style="display:none">Concluir compra</button>
								<a href="<?=BASEURL?>" id="scart-ac-keep" type="submit" class="btn btn-danger float-right">Continuar navegando</a>
							</div>
						</div>
					</form>
				</div>
			<!-- </a> -->
			<a href="<?=BASEURL?>usuario/processa.php?tipo=logout" class='btn btn-sm btn-dark pr-2'><i class="fas fa-user-times"></i></a>
		</div>

	</div>
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
			</ul>
		</div>
	</nav>
</div>

<!-- Comando para separar Topo Fixado e Informações Abaixo Que Movimentam -->
<main role="main" class="container-fluid" style="margin-top: 135px;">