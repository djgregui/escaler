<?php
/**
 *  Cadastro de Clientes
 */
function add() {

  if (!empty($_POST['customer'])) {
    
    $customer = $_POST['customer'];
    $customer['senha'] = hash('sha256',$customer['senha']);

    save('usuario', $customer);
    header('location: ../usuario/pagina-login.php');
  }
}