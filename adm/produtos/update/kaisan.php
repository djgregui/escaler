<?php
    require '../../../config.php';
    require DBAPI;
    ini_set('display_errors',1);
    $id = filter_var($_GET['id'],FILTER_SANITIZE_URL);
    $db = open_database();
    $integracao = (($db)->query("SELECT * FROM integracoes WHERE id_produto_versao = '$id'"))->fetch_assoc();
    $url = $integracao['url'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);     
    $array = explode(PHP_EOL,$output);
    $output = $array;
    foreach($output as $string) {
        if(preg_match('/produtoQty\[\''.$integracao['idp'].'\'\]/',$string)) {
            $output = $string;
            $strpos = strpos($output,"produtoQty['");
            $output = substr($output,$strpos + 10 + 10 + 4);
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
    $query2 = $db->query("SELECT * FROM produto_versoes WHERE id = '$id'");
    var_dump($output);  
    $id_produto = ($query2->fetch_assoc())['id_produto'];
    header("Location: /adm/produtos/view.php?id=$id_produto");
