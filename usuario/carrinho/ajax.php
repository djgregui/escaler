<?php 
require_once '../../config.php'; 
require_once DBAPI; 
function view($id) {
    $db = open_database();
    $query = $db->query("SELECT produtos.nome, produtos.id, produto_versoes.versao, produto_versoes.valor, produto_versoes.id as idv FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '".$id."'");
    $produto = $query->fetch_assoc();
    unset($produto['imagens']);
    $produto['img'] = ($db->query("SELECT * FROM produto_imagens WHERE id_produto = '".$produto['id']."' ORDER BY id ASC"))->fetch_assoc()['url'];
    return $produto;
}
header('Content-Type: application/json');
echo json_encode(view($_GET['id']));