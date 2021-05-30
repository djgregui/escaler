<?php 
    require_once '../../config.php'; 
    require_once DBAPI;
    require_once HEADER_ADMIN_TEMPLATE; 
    $pedidos = get_pedidos();
    require COMPOSER;
	$mp = new MercadoPago\SDK;
    $mp::setAccessToken(MP_API_TOKEN);
    
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <p class="text-center font-weight-bold h2">Pedidos</p>
        </div>
    </div>
</div>
<div class="container mb-4">
    <div style="background-color: pink;" class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>  <!-- "tr" é como uma linha de excel -->
                    <th scope="col">Comprador</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                    <th scope="col">Produto</th>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($pedidos) > 0) { foreach($pedidos as $pedido) { $cliente = get_cliente($pedido['idusuario']); ?>
                    <tr>
                        <td style="white-space:nowrap"><a class='text-reset' href='<?=BASEURL?>adm/usuarios/view.php?id=<?=$pedido['idusuario']?>'><?=$cliente['nome']?></a></td>
                        <td style="white-space:nowrap"><?php foreach(json_decode($pedido['idproduto']) as $produto) { echo "<li>".  get_produto_versao2($produto)['nome']."</li>"; } ?></td>
                        <td style="white-space:nowrap" class='text-center'><?php if($pedido['payment_type'] == 'credit_card') { echo '<img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_circles_92px_2x.png" style="height:32px"><img src="https://usa.visa.com/dam/VCOM/regional/lac/ENG/Default/Partner%20With%20Us/Payment%20Technology/visapos/full-color-800x450.jpg" style="height:26px">';} else {echo '<img src="https://logodownload.org/wp-content/uploads/2019/06/mercado-pago-logo.png" style="height:32px">';} ?></td>
                        <td style="white-space:nowrap"><?php if($pedido['id_payment'] != 'null') { $paymentId = 15005204329; $payment = $mp->get("/v1/payments/". $paymentId); echo "R$". number_format($payment['body']['transaction_amount'],2,',','.'); } ?></td>
                        <td style="white-space:nowrap"><?=switch_status($pedido['status'])?></td>
                        <td style="white-space:nowrap"><?=(new DateTime($pedido['datacompra']))->format('d/m/Y H:i:s')?></td>
                        <td style="white-space:nowrap">
                            <div class="btn-group"> 
                                <a   href="view.php?id=<?=$pedido['id']?>" class="btn   btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="delete.php?id=<?=$pedido['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } } else { echo '<tr><td class="text-center" colspan="6">Não foi encontrado resultados</td></tr>'; }?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once FOOTER_ADMIN_TEMPLATE; 