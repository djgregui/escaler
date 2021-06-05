<?php
function get_produto_versao($id){
    $db = open_database();
    $query = $db->query('SELECT produtos.*,produto_versoes.versao , produto_versoes.valor , produto_versoes.id as versao_id FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.status = 1 AND produto_versoes.id = "'.$id.'" ');
    $produto = $query->fetch_assoc(); $id=$produto['id'];
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    $produto['imagens'] = $query2->fetch_all(MYSQLI_ASSOC);
    return $produto;
}

function get_produto_versao2($id){
    $db = open_database();
    $query = $db->query('SELECT produtos.*,produto_versoes.versao , produto_versoes.valor , produto_versoes.id as versao_id FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = "'.$id.'" ');
    $produto = $query->fetch_assoc(); $id=$produto['id'];
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    $produto['imagens'] = $query2->fetch_all(MYSQLI_ASSOC);
    return $produto;
}

function get_versoes_produto($id) {
    $db = open_database();
    $query = $db->query('SELECT versao, estoque, valor, id FROM produto_versoes WHERE status = 1 AND id_produto = "'.$id.'" ');
    $produto = $query->fetch_all(MYSQLI_ASSOC); 
    return $produto;
}

function header_user($id) {
    global $usuario;
    $db = open_database();
    $query = $db->query("SELECT * FROM usuario WHERE id='$id'");
    $usuario = $query->fetch_assoc();
}

function isJson($string) {
    return ((is_string($string) &&
            (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
}

function get_conf($param) {
    return (((open_database())->query("SELECT valor FROM configuracoes WHERE nome = '$param' LIMIT 1"))->fetch_assoc())['valor'];
}

function get_full_conf($param) {
    return (((open_database())->query("SELECT * FROM configuracoes WHERE id = '$param' LIMIT 1"))->fetch_assoc());
}

function get_confs() {
    return (((open_database())->query("SELECT * FROM configuracoes"))->fetch_all(MYSQLI_ASSOC));
}

function get_favoritos($produto) {
    $id_user = 0;
    if(isset($_SESSION['id_user'])) {
        $id_user = 
        $_SESSION['id_user'];
    }
    return $favoritos = ((open_database())->query("SELECT * FROM favoritos WHERE id_usuario = '$id_user' AND id_produto = '".$produto['id']."'"))->fetch_all(MYSQLI_ASSOC);
}

function get_produto($id) {
    $produto = ((open_database())->query("SELECT * FROM produtos WHERE id='$id'"))->fetch_assoc();
    $produto['imagens']=((open_database())->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'"))->fetch_all(MYSQLI_ASSOC);
    return $produto;
}

function get_first_versao($id) {
    return (((open_database())->query("SELECT * FROM produto_versoes WHERE status = '1' AND id_produto = '$id' ORDER BY valor ASC LIMIT 1"))->fetch_assoc());
}

function get_pedidos() { return $pedidos = ((open_database())->query("SELECT * FROM pedidos"))->fetch_all(MYSQLI_ASSOC); }

function get_pedido($id) { return $pedidos = ((open_database())->query("SELECT * FROM pedidos WHERE id = '$id'"))->fetch_assoc(); }

function get_clientes() { return $cliente = ((open_database())->query("SELECT * FROM usuario"))->fetch_all(MYSQLI_ASSOC); }

function get_cliente($id) { return $cliente = ((open_database())->query("SELECT * FROM usuario WHERE id='$id'"))->fetch_assoc(); }

function get_colecoes() { return $colecoes = ((open_database())->query("SELECT * FROM colecoes"))->fetch_all(MYSQLI_ASSOC); }

function switch_status($id) { switch($id) {
    case '0': return 'Pagamento pendente'; break;
    case '1': return 'Envio pendente';     break;
    case '2': return 'Em trânsito';        break;
    case '3': return 'Recebido';           break;
    case '4': return 'Retornado';          break; 
    case '5': return 'Cancelado';          break;
    case '6': return 'Em analise';         break;
    case '7': return 'Suspenso';           break;
} }

function switch_pstauts($id) { switch($id) {
    case '1': return "Aprovado"; break;
    case '0': default: return "Pendente"; break;
}}

function get_produtos_from_json($json) {
    $produtos=[]; foreach(json_decode($json) as $produto) { $produtos[]=get_produto_versao($produto); } return $produtos;
}