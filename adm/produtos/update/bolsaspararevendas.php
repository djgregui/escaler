<?php
    require '../../../config.php';
    require DBAPI;
    ini_set('display_errors',1);
    // $id = 
    $id = filter_var($_GET['id'],FILTER_SANITIZE_URL);
    $db = open_database();
    $produto = (($db)->query("SELECT * FROM produto_versoes WHERE id = '$id'"))->fetch_assoc(); $id_produto = $produto['id_produto'];
    $integracao = (($db)->query("SELECT * FROM produtos WHERE id = '$id_produto'"))->fetch_assoc();
    $url = $integracao['original_url'];
    // $url = "https://www.bolsaspararevenda.com.br/bolsa-carteira-feminina-atacado-l9099-a";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);     
    $array = explode(PHP_EOL,$output);
    $output = $array;
    foreach($output as $string) {
        if(preg_match('/qtde_estoque/',$string)) {
            $output = $string;
            $strpos = strpos($output,"qtde_estoque");
            $output = substr($output,$strpos);
            // $strpos = strpos($output,"'");
            // $output = substr($output,0,$strpos);
            // $output = intval($output);
            $output = filter_var($output,FILTER_SANITIZE_NUMBER_INT);
        }
    }
    $status_changer = '';
    if(is_array($output)) {
        $output = 0; 
        // $status_changer = ', status = 0';
    }
    $sql = "UPDATE produto_versoes SET estoque = '$output' $status_changer WHERE id = '$id'";
    $db->query($sql);
    var_dump($output);  
    header("Location: /adm/produtos/view.php?id=$id_produto");

