<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ?>




<!-- PHP CONECTANDO COM BANCO DE DADOS -->
<?php
// Função criada
function index() {
    global $conjunto;
    // Abre o banco de dados
    $db = open_database();
    // Execução do comando para selecionar a tabela "produtos" 
    $query = $db->query("SELECT * FROM produtos");
    // Guarda informações executadas dentro da varíavel
    $conjunto = $query->fetch_all(MYSQLI_ASSOC);
}
index();
?>

<div class="row">
                    <div class="col-12">
                        <br>
                        <p class="a font-weight-bold h2">Produtos</p>
					</div>
</div>

<!-- TABELA DOS PRODUTOS -->

<main role="main">


<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

        <div class="col-2 py-3"></div>
        <div class="col-2 py-3"></div>
        <div class="col-2 py-3"></div>
        <div class="col-2 py-3"></div>
        <div class="col-2 py-3"></div>

        <div class="col-2 py-3">
            <div class="container-black">
                <a href="<?=BASEURL?>adm/produtos/add.php" class="btn btn-success">
                    Adicionar
                </a>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <div style="background-color: pink;">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>  <!-- "tr" é como uma linha de excel -->
                        <th scope="col">#</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>


                <!-- Comando em php para executar um conjunto em itens separados -->
                    <?php foreach($conjunto as $item) { ?>
                        <tr>
                            <th scope="row"><?=$item['id']?></th>
                            <td><?=$item['marca']?> <?=$item['modelo']?></td>
                            <td><?php if(strlen($item['descricao']) > 120) { echo substr($item['descricao'],0,120) . "..."; } else { echo $item['descricao']; } ?></td>
                            <td>
                                <?php foreach(json_decode($item['tamanho'],true)[0] as $key => $value) {
                                    echo mb_strtoupper($key) . ": " . $value . "<br>";
                                } ?>
                            </td>
                            <td>
                                <a href="<?=BASEURL?>adm/produtos/view.php?id=<?=$item['id']?>" class="btn btn-success">Visualizar</a>
                                <a href="<?=BASEURL?>adm/produtos/delete.php?id=<?=$item['id']?>" class="btn btn-danger">Deletar</a>
                            </td>
                            </tr>
                    <?php } ?>

                    
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include(FOOTER_ADMIN_TEMPLATE); ?> 