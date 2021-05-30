<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ?>

<?php
    $db=open_database(); $id = (int) $_GET['id'];
    $query=$db->query('SELECT * FROM colecoes WHERE id="'.$id.'"');
    $colecao=$query->fetch_assoc();
?>


<!-- CORPO DA PÁGINA -->
 
<div class="py-3">
    <p class="text-center display h2" style="font-family: 'Arapey'; font-weight: 400;"><?=$colecao['nome']?></p>
    <div style="width:10%;margin: 0 auto; border-bottom:1px solid"></div>
    <!-- <div class="a"><i>Organizar por</i> <div class=button-classificar><i>Mais Vendidos</i></div></div> -->
</div>
<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

    <?php
            // Entra no banco de dados
            $db = open_database();
            // Acessa o banco específico que quero a informação (em select . * traz todos itens e )
            $query = $db->query("SELECT * FROM produtos WHERE id_colecao = '$id' LIMIT 50");
            // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
            while($produto=$query->fetch_assoc()){
                $produto_id=$produto['id'];$imagens = ($db->query("SELECT * FROM produto_imagens WHERE id_produto = '$produto_id'"))->fetch_assoc();
        ?>

        <div class="col-md-6 col-lg-3 col-12 py-3">
            <div class="card">
                <div class="card-body">
                    <a href="<?=BASEURL?>produto.php?id=<?=$produto['id']?>" class="text-decoration-none text-reset">
                    <div style="width: 100%;min-height:150px;aspect-ratio: 1/1;background: url(<?=BASEURL.$imagens['url']?>);background-repeat:no-repeat;background-size: contain;background-position-x: center;"></div>
                        <!-- <img src="<?=BASEURL?>" alt="Snow" style="width:100%; aspect-ratio: 1/1"> -->
                        <div style="height:10px"></div>
                        <p class='h4 text-center'><b style=""><?=$produto['nome']?></b></p>
                    </a>
                </div>
            </div>
        </div>

        <?php
            }
        ?>

    </div>
</div>
<br>  <!-- Pular Linha -->
<?php require FOOTER_SITE_TEMPLATE;