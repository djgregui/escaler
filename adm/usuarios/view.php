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


<h2>Usuário ID nº:<?=$usuario['id']?></h2>


<!-- Linha Divisória de Página -->
<hr />

<!-- Informações -->
    <div class="row">

        <div class="col-2"></div>
        <div class="col-3">
                <h6>Nome</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['nome']?>
                </p>
        </div>
        <div class="col-5">
                <h6>Sobrenome</h6>
                <p style="border-radius:6px; border: 1px solid lightgrey; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['sobrenome']?>
                </p>
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-4">
        <!-- <div class="form-group">
            <label for="col-cpf">CPF</label>
            <input type="text" name="col-cpf" id="col-cpf" class="form-control">
        </div> -->
                <h6>CPF</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=mask($usuario['cpf'],'###.###.###-##')?>
                </p>
        </div>
        <div class="col-4">
                <h6>CEP</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=mask($usuario['cep'],'#####-###')?>
                </p>
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-5">
                <h6>Rua</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['rua']?>
                </p>
        </div>
        <div class="col-1">
            <!-- <div class="form-group">
                <label for="name">Casa</label>
                <input type="text" name="customer[casa]" id="input_name"  class="form-control" value="<?=$usuario['casa']?>">
            </div> -->
                <h6>Número</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['numero']?>
                </p>
        </div>
        <div class="col-2">
                <h6>Complemento</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['complemento']?>
                </p>
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-3">
                <h6>Bairro</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['bairro']?>
                </p>
        </div>
        <div class="col-3">
                <h6>Cidade</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['cidade']?>
                </p>
        </div>
        <div class="col-2">
                <h6>Estado</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['estado']?>
                </p>
        </div>
        <div class="col-2"></div>

        <div class="col-4"></div>
        <div class="col-4">
                <h6>Telefone</h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?php if(strlen($usuario['telefone']) > 10) { echo mask($usuario['telefone'],'(##) #####-####');} else{ echo mask($usuario['telefone'],'(##) ####-####');}?>
                </p>
        </div>
        <div class="col-4"></div>

        <div class="col-2"></div>
        <div class="col-4">
                <h6><b>Email *</b></h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['email']?>
                </p>
        </div>
        <div class="col-4">
                <h6><b>Senha *</b></h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                ●●●●●●
                </p>
        </div>
        <div class="col-2"></div>
</div>

<br>
<br>

<div class="container">

<div class="row">

    <div class="col-12 text-right">
        <div class="btn-group">
            <a href="../../adm/usuarios/index.php" class="btn btn-warning">Voltar</a>
            <a href="../../adm/usuarios/delete.php?id=<?=$_GET["id"]?>" class="btn btn-danger">Excluir</a>
            <a href="../../adm/usuarios/view-edit.php?id=<?=$_GET["id"]?>" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->


<?php include(FOOTER_ADMIN_TEMPLATE); ?>