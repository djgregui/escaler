<?php
/**
 *  Cadastro de Produtos
 */
function add() {

  if (!empty($_POST['customer'])) {
    
    $customer = $_POST['customer'];
    
    save('produtos', $customer);
    header('location: ../produtos/index.php');
  }
}