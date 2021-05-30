<?php
require_once '../../config.php';
require_once DBAPI;
require_once HEADER_USUARIO_TEMPLATE;
$idusuario = $_SESSION['id_user'];
$pedidos = ((open_database())->query("SELECT pedidos.*, usuario.nome AS usuario_nome, usuario.sobrenome AS usuario_sobrenome FROM pedidos LEFT JOIN usuario ON pedidos.idusuario=usuario.id WHERE pedidos.status != 5 AND pedidos.idusuario = '$idusuario' OR status != 7 AND pedidos.idusuario = '$idusuario'"))->fetch_all(MYSQLI_ASSOC);

?>
<h2 class="text-center">Compras</h2>
<br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-borderless border border-light">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Produtos</th>
                    <th style='text-align:right'>Valor</th>
                    <th class='text-center'>Pagamento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($pedidos) > 0) { ?>
                    <?php foreach($pedidos as $pedido) { ?>
                        <tr>
                            <th><?=$pedido['id']?></th>
                            <td colspan='2'>
                                <?php
                                    foreach(json_decode($pedido['idproduto'],true) as $produto) {
                                        $sql = "SELECT produto_versoes.valor, produtos.nome FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '$produto'";
                                        $produt = ((open_database())->query($sql))->fetch_assoc();
                                        echo "<li style='list-style-type:none'>". $produt['nome']. "<span style='float:right'>R$". number_format(floatval($produt['valor']),2,',','.') . "</span></li>";
                                    }
                                ?>
                            </td>
                            <td class='text-center'><?php if($pedido['payment_type'] == 'credit_card') { echo '<img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_circles_92px_2x.png" style="height:32px"><img src="https://usa.visa.com/dam/VCOM/regional/lac/ENG/Default/Partner%20With%20Us/Payment%20Technology/visapos/full-color-800x450.jpg" style="height:26px">';} else {echo '<img src="https://logodownload.org/wp-content/uploads/2019/06/mercado-pago-logo.png" style="height:32px">';} ?></td>
                            <td><?=switch_status($pedido['status'])?></td>
                            <td class='btn-group'>
                                <a href="view.php?id=<?=$pedido['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                                <?php if($pedido['status'] == '0') {?>
                                    <a href="<?=BASEURL?>usuario/shop-pay.php?tp=repay&id=<?=$pedido['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-dollar-sign"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else {?>
                    <tr>
                        <th colspan='6'>Não foram encontrados nenhum pedido no momento.</th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-right">
        <a href="<?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER'];} else {echo BASEURL.'usuario';}?>" class="btn btn-danger">Voltar</a>
    </div>
</div>