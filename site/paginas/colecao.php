<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ?>

<?php
    $db=open_database(); $id = (int) $_GET['id'];
    $query=$db->query('SELECT * FROM colecoes WHERE id="'.$id.'"');
    $colecao=$query->fetch_assoc();
?>


<!-- CORPO DA PÁGINA -->
 
<div class="py-3">
    <p class="a display h2" style="font-family: 'Arapey'; font-weight: 400;"><?=$colecao['nome']?></p>
    <p class="a">________</p>
    <!-- <div class="a"><i>Organizar por</i> <div class=button-classificar><i>Mais Vendidos</i></div></div> -->
    <br>  <!-- Pular Linha -->
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

    <?php
            // Entra no banco de dados
            $db = open_database();
            // Acessa o banco específico que quero a informação (em select . * traz todos itens e )
            $query = $db->query("SELECT * FROM produtos WHERE id_colecao = '$id' LIMIT 20");
            // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
            while($produto=$query->fetch_assoc()){
                $produto_id=$produto['id'];$imagens = ($db->query("SELECT * FROM produto_imagens WHERE id_produto = '$produto_id'"))->fetch_assoc();
        ?>

        <div class="col-3 py-3">
            <div class="container-black">
                <a href="<?=BASEURL?>site/paginas/produto.php?id=<?=$produto['id']?>" style="color: black;">
                    <img src="<?=BASEURL?><?=$imagens['url']?>" alt="Snow" style="width:100%; aspect-ratio: 1/1">
                    <p><b><?=$produto['nome']?></b></p>
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