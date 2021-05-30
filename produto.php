<?php
 error_reporting(E_ALL);
 ini_set('display_errors',1);
 require_once 'config.php';
 require_once DBAPI;
 require_once HEADER_SITE_TEMPLATE; 
 $produto = get_produto($id = (int) $_GET['id']);
 $q_versoes = get_versoes_produto($produto['id']); 
 $favoritos = get_favoritos($produto);
?>

<!-- CORPO DA PÁGINA -->
<script>
    function troca_produto(id,valor){
        $('.btn-versao').attr('class','btn btn-outline-danger btn-versao');
        $('#btn-p'+id).attr('class','btn btn-danger btn-versao');
        document.getElementById('produto_versao_preco').innerText = 'R$ ' + parseFloat(valor).toFixed(2);
        document.getElementById('btn-shop').setAttribute("href",'<?=BASEURL?>shop.php?id='+id);
        document.getElementById('btn-addcart').setAttribute('onclick',`addToCart(${id})`)}
    $(function(){
        <?php echo "troca_produto(".$q_versoes[0]['id'].",".$q_versoes[0]['valor'].");";?>
    });
</script>
<div class="py-3">
    <p class="text-center display h2 pb-2" style="font-family: 'Arapey'; font-weight: 400;">Produto</p>
    <div style="border-bottom:1px solid grey; width: 20%; margin: 0 auto"></div>
    <br>  <!-- Pular Linha -->
</div>
<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">
        <div class="col-md-6 col-lg-6 col-12 py-3">
            <div class="container-black">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><style>.carousel-control-prev-icon,.carousel-control-next-icon {height: 100px;width: 100px;background-size: 100%, 100%;border-radius: 50%;background-image: none;}.carousel-control-next-icon:after{content: '»';font-size: 55px;color: black;}.carousel-control-prev-icon:after {content: '«';font-size: 55px;color: black;}</style><div class="carousel-item active"><img class="d-block w-100" src="<?=BASEURL?><?=$produto['imagens'][0]['url']?>" alt="First slide"></div><?php for($n=1;$n<count($produto['imagens']);$n++) { ?><div class="carousel-item"><img class="d-block w-100" src="<?=BASEURL?><?=$produto['imagens'][$n]['url']?>" alt=" slide"></div><?php } ?></div><a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
            </div> 
        </div>
        <div class="col-md-6 col-lg-6 col-12 py-3">
            <div class="container-black">
                <h4 class='text-center'><?=$produto['nome']?></h4>
                <?php  if($produto['video'] != '') { ?>
                    <div id="iframe-video">
                        <br>
                        <iframe style="width: 100%;aspect-ratio: 16/9;height: calc(100%);" id="video" width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?=substr($produto['video'],32)?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php } ?>
                <h4 class='text-center' id="produto_versao_preco"></h4>
                <div class="mt-4 mb-4" style="border-bottom:1px solid grey;width:50%;margin:0 auto"></div>
                <?php if(count($q_versoes) > 0) { ?> 
                    <p class="text-center h4">Tamanho/Versão</p>
                    <p class="text-center d-block">
                        <?php foreach($q_versoes as $versao) {
                            echo "<a href='javascript:void(0)' id='btn-p".$versao['id']."' class='btn btn-outline-danger' onclick='troca_produto(".$versao['id'].",".$versao['valor'].")'>".$versao['versao']."</a>";
                        } ?>
                    </p>
                <?php } ?>
                <p class="text-center">
                    <?php if(isset($_SESSION['loggedin_escaler'])) { $out = 'outline-'; $acao='add'; if(count($favoritos) > 0) { $out=''; $acao='rem'; } ?>
                        <a href="<?=BASEURL?>usuario/favoritos/processa.php?tipo=<?=$acao?>&id=<?=$produto['id']?>" class="btn btn-<?=$out?>danger" id="btn-heart"><i class="fas fa-heart"></i></a>
                        <a href="javascript:void(0)" id="btn-addcart" class="btn btn-outline-danger">Adicionar ao Carrinho</a>
                    <?php } ?>
                    <?php if(count($q_versoes) > 0) { ?> 
                        <a href="javascript:void(0)" id="btn-shop" class="btn btn-danger font-weight-bold">Comprar</a>
                    <?php } else { ?>
                        <p class="text-danger text-center h2">Indisponível</p>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
    <div style="color: black">
        <h6>Resumo</h6>
        <p><?=$produto['descricao']?></p>
        <?php if(strlen($produto['long_descricao']) > 10) {echo '<h6>Características</h6>'.$produto['long_descricao'];} ?>
        
    </div>
</div>

<br>  <!-- Pular Linha -->
<?php require FOOTER_SITE_TEMPLATE;