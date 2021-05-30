<?php 
require_once '../config.php';
require_once DBAPI; 
require_once HEADER_USUARIO_TEMPLATE;
$idusuario = $_SESSION['id_user'];
$pedidos = ((open_database())->query("SELECT pedidos.*, produto_versoes.valor, produtos.nome, usuario.nome AS usuario_nome, usuario.sobrenome AS usuario_sobrenome FROM pedidos LEFT JOIN usuario ON pedidos.idusuario=usuario.id LEFT JOIN produto_versoes ON pedidos.idproduto=produto_versoes.id LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE pedidos.status != 5 AND pedidos.idusuario = '$idusuario' OR pedidos.status != 7 AND pedidos.idusuario = '$idusuario'"))->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-md-1 col-lg-1 col-12 d-none d-md-block d-lg-block">&nbsp;</div>
    <div class="col-md-10 col-lg-10 col-12">
        <p class="font-weight-bold h4 mb-2 text-center">Bem Vindo <?=$usuario['nome']?></p>
        <div class="btn-group w-100">
            <a href='<?=BASEURL?>usuario/dados-pessoais' class='btn btn-danger text-light d-md-block d-lg-block d-none'>Dados</a>
            <a href='<?=BASEURL?>usuario/pedidos' class='btn btn-danger text-light'>Compras</a>  
            <a href='<?=BASEURL?>usuario/favoritos' class='btn btn-danger text-light'>Favoritos</a> 
            <a href='<?=BASEURL?>usuario/pedidos/mensagens' class='btn btn-danger text-light'>Mensagens</a> 
            <a href='<?=BASEURL?>contact.php' class='btn btn-danger text-light'>Contato</a> 
        </div>

<div style="height:20px">&nbsp;</div>
    <h2 class="text-md-left text-lg-left text-center text-dark border-bottom border-danger text-sm-center text-xs-center pb-1">Compras</h2>
        <div class="table-responsive">
            <table class="table table-borderless table-striped border border-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Produtos</th>
                        <th class='text-right'>Valor</th>
                        <th class='d-none d-md-block d-lg-block'>Pagamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($pedidos) > 0) { ?>
                        <?php $n=0; foreach($pedidos as $pedido) { $n++; ?>
                            <tr>
                                <th><?=$n?></th>
                                <td>
                                    <?php
                                        foreach(json_decode($pedido['idproduto'],true) as $produto) {
                                            $sql = "SELECT produto_versoes.valor, produtos.nome FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '$produto'";
                                            $produt = ((open_database())->query($sql))->fetch_assoc();
                                            echo "<li style='list-style-type:none'>". $produt['nome'] . "</li>";
                                        }
                                        echo "</td><td>";
                                        foreach(json_decode($pedido['idproduto'],true) as $produto) {
                                            $sql = "SELECT produto_versoes.valor, produtos.nome FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '$produto'";
                                            $produt = ((open_database())->query($sql))->fetch_assoc();
                                            echo "<li style='list-style-type:none'><span style='float:right'>R$". number_format(floatval($produt['valor']),2,',','.') . "</span></li>";
                                        }
                                    ?>
                                </td>
                                <td class='text-center d-none d-md-block d-lg-block'>
                                    <?php if($pedido['payment_type'] == 'credit_card') { echo '<img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_circles_92px_2x.png" style="height:32px"><img src="https://usa.visa.com/dam/VCOM/regional/lac/ENG/Default/Partner%20With%20Us/Payment%20Technology/visapos/full-color-800x450.jpg" style="height:26px">';} else {echo '<img src="https://logodownload.org/wp-content/uploads/2019/06/mercado-pago-logo.png" style="height:32px">';} ?>
                                </td>
                                <td><?=switch_status($pedido['status'])?></td>
                                <td class='btn-group'>
                                    <a href="pedidos/view.php?id=<?=$pedido['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <th colspan='6'>Não há nenhum pedido registrado no momento.</th>
                        </re>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>