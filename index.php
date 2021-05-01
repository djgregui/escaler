<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ?>


<!-- CORPO DA PÁGINA -->





    <!-- SISTEMA DE SLIDES -->

<!-- Comando para Exibir Slides -->
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicadores de Movimentação do Carrossel Inferiores-->
    <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <!-- <li data-target="#demo" data-slide-to="2"></li> -->
    </ul>
  
    <!-- Imagens dos Slides -->
    <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?=BASEURL?>img/site/homem_com_relogio2.jpg" alt="Chicago" style="width: 100%;margin-left: 0%; margin-right: 0%; max-height: 100%;">
    </div>
    <div class="carousel-item">
            <img src="<?=BASEURL?>img/site/fashion-toronto-watch_4472x2.jpg" alt="Chicago" style="width: 100%;margin-left: 0%; margin-right: 0%; max-height: 100%;">
    </div>
       <!-- <div class="carousel-item">
            <img src="sunglasses-making-a-splash_4472x2.jpg" alt="New York" style="width: 100%;margin-left: 0%; margin-right: 0%; max-height: 100%;">
      </div> -->
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
<div class="display container-black h3 py-4" style="font-family: 'Arapey'; font-size: 19px;
font-style: normal; font-weight: 700">
    <p class="text-center">
        Seja bem vindo à ESCALER!
    </p>
    <p class="text-center">
        Trabalhamos com diversos seguimentos, com fornecedores nacionais e importados.
    </p>
    <p class="text-center text-muted">
        Queremos que sua experiência seja a melhor possível, com um atendimento de primeira, melhores formas de pagamento, e os melhores produtos do mercado.
    </p>
</div>
</div>


<div class="py-3">
    <p class="text-center display h2">Lista de Coleções</p>
    <p class="text-center">________</p>
    <br>  <!-- Pular Linha -->
</div>

<!-- Fotos Miniaturas de Coleções -->
<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
        <div class="row">

        <?php
            // Entra no banco de dados
            $db = open_database();
            // Acessa o banco específico que quero a informação (o limite é a quantidade de itens seguidos mostrado)
            $query = $db->query("SELECT * FROM colecoes LIMIT 5");
            // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
            while($colecao=$query->fetch_assoc()){
        ?>
            <!-- Botão das coleções -->
            <div class="col-<?=$colecao['tamanho']?> py-3">
                <div class="container"  >
                    <a href="<?=BASEURL?>site/paginas/colecao.php?id=<?=$colecao['id']?>">
                        <img src="<?=BASEURL?><?=$colecao['url']?>" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white"><?=$colecao['nome']?></div>
                    </a>
                  </div> 
            </div>

        <?php
            }
        ?>
    
        </div>
    </div>
    
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<!-- PRINCIPAIS PRODUTOS -->

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

    <?php
        function view($id) {
            global $produto;
            $db = open_database();
            $query = $db->query("SELECT * FROM produtos WHERE id='$id'");
            $produto = $query->fetch_assoc();
            $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
            global $produto_imagens;
            $produto_imagens = $query2->fetch_all(MYSQLI_ASSOC);   
        }
        $db = open_database();
            $query = $db->query("SELECT * FROM configuracoes WHERE nome='home_produto'");
            $configuracao = $query->fetch_assoc();
        view($id = (int) $configuracao['valor']);
        ?>


        <div class="col-3 py-3"></div>

        <div class="col-3 py-3">
            <div class="container-black">
                <a href="<?=BASEURL?>site/paginas/produto.php?id=<?=$produto['id']?>">
                    <img src="<?=BASEURL?><?=$produto_imagens[0]['url']?>" alt="Snow" style="width:100%;">
                </a>  
            </div> 
        </div>
        <div class="container-black">
                <a href="<?=BASEURL?>site/paginas/produto.php?id=<?=$produto['id']?>">
                <h1 style="color: black;"><?=$produto['nome']?></h1></a>
                <h3 id="produto_versao_preco"></h3>

                <script>
                function troca_produto(id,valor){
                    $('.btn-versao').attr('class','btn btn-outline-primary btn-versao')
                    $('#btn-p'+id).attr('class','btn btn-primary btn-versao')
                    document.getElementById('produto_versao_preco').innerText = 'R$ ' + parseFloat(valor).toFixed(2)
                    document.getElementById('btn-shop').setAttribute("href",'<?=BASEURL?>shop.php?id='+id)
                }
                $(function(){
                    <?php $id_produto = $produto['id']; $query = $db->query("SELECT * FROM produto_versoes WHERE id_produto='$id_produto'"); $produto_versao=$query->fetch_assoc(); $id_versao = $produto_versao['id']; ?>
                    troca_produto(<?=$produto_versao['id']?>,<?=$produto_versao['valor']?>)
                })
                </script>

                -------<br>
                Tamanho/Versão<br>
                
                <?php
                    // Entra no banco de dados
                    $db = open_database();
                    // Acessa o banco específico que quero a informação (o limite é a quantidade de itens seguidos mostrado)
                    $id_produto = $produto['id'];
                    $query = $db->query("SELECT * FROM produto_versoes WHERE id_produto='$id_produto'");
                    // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
                    while($versao=$query->fetch_assoc()){
                ?>
                    <a href="#"id='btn-p<?=$versao['id']?>' onclick="troca_produto(<?=$versao['id']?>,<?=$versao['valor']?>)" class="btn btn<?php if($versao['id'] != $id_versao){echo '-outline';}?>-primary btn-versao"><?=$versao['versao']?></a>  
                <?php
                }
                ?>

                </p>
                <br>
                <!-- <div class="btn btn-lg btn-outline-danger"><b>Adicionar Ao Carrinho</b></div> -->
                <!-- <br><br> -->
                <a href="#" id="btn-shop" class="btn btn-lg btn-warning font-weight-bold">Comprar Agora</a>
            </div>
        <div class="col-3 py-3"></div>
    </div>
</div>
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->

<!-- BARRA DE NEWSLETTER -->

<div class="barra-newsletter py-4">
    <div class="text-center" style="font-family: 'Old Standard TT';">
        <br>  <!-- Pular Linha -->
        <br>  <!-- Pular Linha -->
    <h2><b>Receber nosso newsletter</b></h2>
    </div>
    <div class="text-center" style="font-family: 'Arapey';">
    <p><b>Promoções, novos produtos e vendas. Diretamente para sua caixa de entrada.</b></p>

    <p>_____________________</p>
    </div>

    <br>  <!-- Pular Linha -->

    <div class="text-center" style="font-family: 'Arapey'">
    <form action="#" onsubmit="alert('seu email é: '+email.value);return false">
        <input type="email" name="email" id="" style="border-radius: 5px; width: 500px; height: 50px; border: none">
        <input type="submit" value="enviar" style="border-radius: 5px; width: 100px; height: 50px; color: white; background-color: black;">
    </form>
    <br>
</div>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->




<?php include(FOOTER_SITE_TEMPLATE); ?>