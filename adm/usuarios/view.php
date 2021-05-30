<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ini_set('display_errors',1); ?>

 

<?php
function view($id) {
    global $usuario;
    $db = open_database();
    $query = $db->query("SELECT * FROM usuario WHERE id='$id'");
    $usuario = $query->fetch_assoc();
}
view($_GET['id']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<!-- CORPO DA PÁGINA -->
<div class="container mb-4">
    <h2 class="text-center">Usuário: <?=$usuario['nome']." ".$usuario['sobrenome']?></h2>
    <hr />
    <div class="row">
        <div class="mt-2 col-md-3 col-lg-3 col-6">
            <h6>Nome</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['nome']?>">
        </div>
        <div class="mt-2 col-md-5 col-lg-5 col-6">
            <h6>Sobrenome</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['sobrenome']?>">
        </div>
        <div class="mt-2 col-md-4 col-lg-4 col-5">
            <h6>CPF</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['cpf']?>">
        </div>
        <div class="mt-2 col-md-2 col-lg-2 col-5">
            <h6>CEP</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['cep']?>">
        </div>
        <div class="mt-2 col-md-5 col-lg-5 col-9">
            <h6>Rua</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['rua']?>">
        </div>
        <div class="mt-2 col-md-2 col-lg-2 col-3">
            <h6>Número</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['numero']?>">
        </div>
        <div class="mt-2 col-md-3 col-lg-3 col-6">
            <h6>Complemento</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['complemento']?>">
        </div>
        <div class="mt-2 col-md-3 col-lg-3 col-6">
            <h6>Bairro</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['bairro']?>">
        </div>
        <div class="mt-2 col-md-3 col-lg-3 col-9">
            <h6>Cidade</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['cidade']?>">
        </div>
        <div class="mt-2 col-md-2 col-lg-2 col-3">
            <h6>Estado</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['estado']?>">
        </div>
        <div class="mt-2 col-md-4 col-lg-4 col-12">
            <h6>Telefone</h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['telefone']?>">
        </div>
        <div class="mt-2 col-md-8 col-lg-8 col-12">
            <h6><b>Email*</b></h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="<?=$usuario['email']?>">
        </div>
        <div class="mt-2 col-md-4 col-lg-4 col-12">
            <h6><b>Senha*</b></h6>
            <input type="text" class="form-control input-editable form-control-plaintext" value="●●●●●●">
        </div>
        <div class="mt-2 mb-4 col-md-12 col-lg-12 col-12 text-right">
            <div class="btn-group">
                <a href="<?=BASEURL?>adm/usuarios" class="btn btn-warning">Voltar</a>
                <a href="<?=BASEURL?>adm/processa.php?tipo=deactivate_usuario&id=<?=$_GET["id"]?>" class="btn btn-danger">Desativar</a>
            </div>
        </div>
    </div>
</div>

<?php include(FOOTER_ADMIN_TEMPLATE); ?>