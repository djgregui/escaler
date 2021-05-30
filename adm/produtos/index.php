<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ?>




<!-- PHP CONECTANDO COM BANCO DE DADOS -->
<?php
// Função criada
function index() {
    global $conjunto;
    $conjunto = ((open_database())->query("SELECT * FROM produtos"))->fetch_all(MYSQLI_ASSOC);
}
index();
?>
<main role="main">
    <div class="container-fluid"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
        <div class="row mb-3">
            <div class="col-md-10 col-lg-10 col-8 text-center">
                <p class="mb-0 font-weight-bold h2">Produtos</p>
            </div>
            <div class="col-md-2 col-lg-2 col-4 text-right ">
                <a href="<?=BASEURL?>adm/produtos/add.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                <a href="<?=BASEURL?>adm/produtos/import.php" class="btn btn-success"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background-color: pink;">
                <thead class="thead-dark">
                    <tr>  <!-- "tr" é como uma linha de excel -->
                        <th scope="col">#</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Versões</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Comando em php para executar um conjunto em itens separados -->
                    <?php foreach($conjunto as $item) { ?>
                        <tr>
                            <th style='white-space:nowrap' scope="row"><?=$item['id']?></th>
                            <td style='white-space:nowrap'><?=$item['marca']?> <?=$item['modelo']?></td>
                            <td style=''><?php if(strlen($item['descricao']) > 120) { echo substr($item['descricao'],0,120) . "..."; } else { echo $item['descricao']; } ?></td>
                            <td style='white-space:nowrap'>
                                <?php
                                    $versoes = get_versoes_produto($item['id']);
                                    foreach($versoes as $versao) {
                                        $vers = $versao['versao']; $valor = number_format($versao['valor'],2,',','.');
                                        echo "$vers: R$ $valor<br>";
                                    }
                                ?>
                            </td>
                            <td style='white-space:nowrap'>
                                <div class="btn-group">
                                    <a href="<?=BASEURL?>adm/produtos/view.php?id=<?=$item['id']?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="<?=BASEURL?>adm/produtos/edit.php?id=<?=$item['id']?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="<?=BASEURL?>adm/produtos/delete.php?id=<?=$item['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</main>

<?php include(FOOTER_ADMIN_TEMPLATE); ?> 