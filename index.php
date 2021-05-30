<?php 
    require_once 'config.php'; 
    require_once DBAPI; 
    require_once HEADER_SITE_TEMPLATE; 
    $slides = json_decode(get_conf('home_slides'));
?>
<style>
.text-responsive-collection {
    font-family:Arial;color:white;font-size:3vw;text-shadow:2px 3px 3px black
} .text-mobile-collection {
    font-family:Arial;color:white;font-size:xxx-large;text-shadow: 2px 3px 3px black;
}
</style>
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <?php for($n=0;$n<count($slides);$n++) {?>
            <li data-target="#demo" data-slide-to="<?=$n?>" <?php if($n==0) { echo 'class="active"'; } ?>></li>
        <?php } ?>
        <!-- <li data-target="#demo" data-slide-to="1"></li> -->
    </ul>
    <div class="carousel-inner">
        <?php for($n=0;$n<count($slides);$n++) { ?>
            <div class="carousel-item <?php if($n==0) { echo 'active'; } ?>">
                <img src="<?=$slides[$n]?>" alt="Slide" style="width: 100%;margin-left: 0%; margin-right: 0%; max-height: 100%;">
            </div>
        <?php } ?>
    </div>
  
    <!-- Botões de Movimentação do Carrossel Laterais-->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>


<!-- CORPO DA PÁGINA -->
 
<div class="container">
<div class="display container-black h3 py-4" style="font-family: 'Arapey'; font-size: 19px;font-style: normal; font-weight: 700">
    <p class="text-center display font-weight-bold h2">Bem vindo à Escaler!</p>
    <p class="text-center">Trabalhamos com diversos seguimentos,<br class="d-md-none d-lg-none d-block"> com fornecedores nacionais e internacionais.</p>
    <p class="text-justify text-md-center text-lg-center text-muted">Queremos que sua experiência seja a melhor possível, com um atendimento de primeira, melhores formas de pagamento e os melhores produtos do mercado.</p>
</div>
</div>


<div class="py-3">
    <p class="text-center display h2">Coleções</p>
    <p class="text-center mb-0" style='margin-top: -15px;color: grey;'>________</p>
    <br>  <!-- Pular Linha -->
</div>

<!-- Fotos Miniaturas de Coleções -->
<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
        <div class="row">
        <!-- py-3 py-2 -->
        <?php $query = (open_database())->query("SELECT * FROM colecoes LIMIT 6"); while($colecao=$query->fetch_assoc()){ ?>
            <!-- Botão das coleções -->
            <div class="col-md-<?=$colecao['tamanho']?> col-lg-<?=$colecao['tamanho']?> col-12 mb-2">
                <a href="<?=BASEURL?>colecao.php?id=<?=$colecao['id']?>">
                    <img src="<?=BASEURL?><?=$colecao['url']?>" alt="Snow" style="width:100%; aspect-ratio:<?php if($colecao['tamanho'] == '6') { echo '16/9';} elseif($colecao['tamanho'] == '4') { echo '16/9';} ?>">
                    <div class="centered d-md-block d-lg-block d-none text-center display pr-2 pl-2 text-responsive-collection"><?=$colecao['nome']?></div>
                    <div class="centered d-md-none  d-lg-none  d-block text-center display pr-2 pl-2 h4 text-light text-mobile-collection"><?=$colecao['nome']?></div>
                </a>
            </div>

        <?php
            }
        ?>
    
        </div>
    </div>
    
<br>  <!-- Pular Linha -->


<!-- PRINCIPAIS PRODUTOS -->

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <h2 class="mb-4 text-center display h2 font-weight-bold" style="color:rgb(157, 2, 1)">Destaque</h2>
    <p class="text-center mb-0" style='margin-top: -30px;color: grey;'>________</p>
    <div style="height:10px">&nbsp;</div>
    <div class="row mb-4">
    <?php $id_produto = get_conf('home_produto'); $home_produto = get_produto($id_produto); ?>
        <div class="col-md-4 col-lg-6 py-3 text-center">
            <a href="<?=BASEURL?>produto.php?id=<?=$home_produto['id']?>">
                <img src="<?=BASEURL?><?=$home_produto['imagens'][0]['url']?>" alt="Snow" style="width:100%;max-width:250px">
            </a>  
        </div>
        <div class="col-md-8 col-lg-6 py-3">
            <p class="text-center"><a href="<?=BASEURL?>produto.php?id=<?=$home_produto['id']?>" class="h1 text-reset text-decoration-none"><?=$home_produto['nome']?></a></p>
            <p class="text-center">A partir de R$ <?=number_format(get_first_versao($home_produto['id'])['valor'],2,',','.')?></p>
            <div class="mb-4 mt-4" style="border-bottom:1px solid;margin:0 auto;max-width:200px"></div>
            <p class="text-center">
                <a href="<?=BASEURL?>produto.php?id=<?=$home_produto['id']?>" class="btn btn-lg btn-danger font-weight-bold">Ver mais</a>
            </p>
        </div>
    </div>
</div>
<!-- <br>  Pular Linha -->
<!-- <br>  Pular Linha -->

<!-- BARRA DE NEWSLETTER -->

<div class="barra-newsletter py-4">
    <div class="text-center" style="font-family: 'Old Standard TT';">
        <br>
    <h2><b>Receber nosso newsletter</b></h2>
    </div>
    <div class="text-center" style="font-family: 'Arapey';">
    <p><b>Promoções, novos produtos e novidades.<br class='d-md-none d-lg-none d-block'> Diretamente para sua caixa de entrada.</b></p>

    <div style='border-bottom:1px solid;width:30%;margin:0 auto'></div>
    </div>

    <br>  <!-- Pular Linha -->

    <div class="text-center" style="font-family: 'Arapey'">
    <form method="post" action="<?=BASEURL?>usuario/processa.php?tipo=newsletter">
        <input type="email" name="email" placeholder="exemplo@escaler.com.br" style="width: 60%;height: 50px;border: none;max-width: 500px;    text-indent: .5em;font-family: Arial;">
        <button type="submit" value="enviar" style="border-radius: 5px;width: 50px;height: 50px;color: white;background-color: black;margin-top: -19px;"><i class="fas fa-paper-plane"></i></button>
        <!-- <input type="submit" value="enviar" style="border-radius: 5px; width: 100px; height: 50px; color: white; background-color: black;"> -->
    </form>
    <br>
</div>
</div>

<?php require FOOTER_SITE_TEMPLATE;