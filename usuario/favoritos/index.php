<?php
require '../../config.php';
require DBAPI;
require HEADER_USUARIO_TEMPLATE;
$favoritos = ((open_database())->query("SELECT produtos.id, produtos.nome, favoritos.created FROM favoritos LEFT JOIN produtos ON favoritos.id_produto = produtos.id WHERE id_usuario = '".$_SESSION['id_user']."'"))->fetch_all(MYSQLI_ASSOC);
?>
<div class="container">
    <h2 class='text-center text-dark'>Favoritos</h2>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-light table-borderless border border-light">
            <thead class="thead-light">
                <tr>
                    <th><i class="fas fa-eye"></i></th>
                    <th>Item</th>
                    <th>Adicionado em</th>
                    <th>Comprar</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($favoritos) > 0) { ?>
                    <?php foreach($favoritos as $item){ ?>
                    <?php $url = (((open_database())->query("SELECT * FROM produto_imagens WHERE id_produto = '".$item['id']."' LIMIT 1"))->fetch_assoc())['url']; ?>
                        <tr>
                            <td><img style='max-width:60px' src='<?=BASEURL.$url?>'></td>
                            <td><?=$item['nome']?></td>
                            <td><?=(new DateTime($item['created']))->format('d/m/Y H:i')?></td>
                            <td>
                                <a href="<?=BASEURL?>produto.php?id=<?=$item['id']?>" class="btn btn-danger"><i class="fas fa-shopping-cart"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <th colspan="4">Nenhum item salvo.</th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div style="height:20px"></div>
    <div class="row">
        <div class="col-12 text-right"><a href="<?=BASEURL?>usuario" class="btn btn-primary">Voltar</a></div>
    </div>
</div>