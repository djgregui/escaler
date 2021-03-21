<?php
/**
 *  Cadastro de Clientes
 */
function add() {

  if (!empty($_POST['customer'])) {
    
    $customer = $_POST['customer'];
    
    save('usuario', $customer);
    header('location: ../../adm/usuarios/index.php');
  }
}