<?php
require_once '../../config.php';
require_once DBAPI;
require_once HEADER_USUARIO_TEMPLATE;
$idusuario = $_SESSION['id_user'];
$pedidos = ((open_database())->query("SELECT pedidos.*, produto_versoes.valor, produtos.nome, usuario.nome AS usuario_nome, usuario.sobrenome AS usuario_sobrenome FROM pedidos LEFT JOIN usuario ON pedidos.idusuario=usuario.id LEFT JOIN produto_versoes ON pedidos.idproduto=produto_versoes.id LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE pedidos.status != 5 AND pedidos.idusuario = '$idusuario' OR status != 7 AND pedidos.idusuario = '$idusuario'"))->fetch_all(MYSQLI_ASSOC);
function switch_status($id) {
    switch($id) {
        case '0':
            return 'Pagamento pendente';
        break;
        case '1':
            return 'Envio pendente';
        break;
        case '2':
            return 'Em trânsito';
        break;
        case '3':
            return 'Recebido';
        break;
        case '4':
            return 'Retornado';
        break;
        case '5':
            return 'Cancelado';
        break;
        case '6':
            return 'Em analise';
        break;
        case '7':
            return 'Suspenso';
        break;
    }
}
?>
<h2 class="text-center">Pedidos</h2>
<br>
<div class="table-responsive">
    <table class="table table-borderless">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Produtos</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $pedido) { ?>
                <tr>
                    <th><?=$pedido['id']?></th>
                    <td><?=$pedido['usuario_nome']." ".$pedido['usuario_sobrenome']?></td>
                    <td><?=$pedido['nome']?></td>
                    <td>R$<?=number_format(floatval($pedido['valor']),2,',','.')?></td>
                    <td><?=switch_status($pedido['status'])?></td>
                    <td class='btn-group'>
                        <a href="view.php?id=<?=$pedido['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>