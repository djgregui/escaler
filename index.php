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
    
            <div class="col-6 py-3">
                <div class="container"  >
                    <a href="<?=BASEURL?>site/paginas/colecao-relogios-e-smartwatchs.php">
                        <img src="<?=BASEURL?>img/collections/colecao-relogios2.png" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white">Relógios & SmartWatchs</div>
                    </a>
                  </div> 
            </div>
    
            <div class="col-6 py-3">
                <div class="container">
                    <a href="<?=BASEURL?>site/paginas/colecao-oculos-de-sol.php">
                        <img src="<?=BASEURL?>img/collections/colecao-oculos2.png" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white">Óculos de Sol</div>
                    </a>
                </div> 
            </div>

            <div class="col-4 py-3">
                <div class="container">
                    <a href="<?=BASEURL?>site/paginas/colecao-acessorios-eletronicos.php">
                        <img src="<?=BASEURL?>img/collections/colecao-eletronicos2.png" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white">Acessórios Eletrônicos</div>
                    </a>
                </div> 
            </div>
            <div class="col-4 py-3">
                <div class="container">
                    <a href="<?=BASEURL?>site/paginas/colecao-utensilios.php">
                        <img src="<?=BASEURL?>img/collections/colecao-utensilios2.png" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white">Utensílios</div>
                    </a>
                </div> 
            </div>
            <div class="col-4 py-3">
                <div class="container">
                    <a href="<?=BASEURL?>site/paginas/colecao-moda-masculina.php">
                        <img src="<?=BASEURL?>img/collections/colecao-moda-masculina2.png" alt="Snow" style="width:100%;">
                        <div class="centered h1" style="font-family: 'Arapey'; color: white">Moda Masculina</div>
                    </a>
                </div> 
            </div>
        </div>
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
                <a href="<?=BASEURL?>site/paginas/produto.php">
                    <img src="<?=BASEURL?><?=$produto_imagens[0]['url']?>" alt="Snow" style="width:100%;">
                </a>  
            </div> 
        </div>

        <div class="col-3 py-3">
            <div class="container-black">
                <a href="<?=BASEURL?>site/paginas/produto.php" style="color: black;"><h1><?=$produto['nome']?></h1></a>
                <p>R$ 79,90<br>
                -------<br>
                Size<br>
                PP P M G GG EG
                </p>
                <br>
                <div class=button-adcarrinho><b>Adicionar Ao Carrinho</b></div>
                </div> <br>
                <div class=button-comprarpaypal><b>Comprar com Paypal</b></div>
                <div class="a" style="color: black;"><b>Mais opções de pagamento</b></div>
            </div>
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