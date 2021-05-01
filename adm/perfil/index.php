<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ini_set('display_errors',1); ?>

 

<?php
function view($id) {
    global $usuario;
    $db = open_database();
    $query = $db->query("SELECT * FROM administrators WHERE id='$id'");
    $usuario = $query->fetch_assoc();
}
view($_SESSION['id_user']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<script>
$(function(){
    $("#col-cpf").inputMask({
        mask: "###.###.###-##"
    });
    
    //  $ = Inicia a variavel javascript.jquery
    //  () = javascript.jquery.selector
})
</script>
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
        <div class="col-3">
                <h6><b>Email *</b></h6>
                <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['email']?>
                </p>
        </div>
        <div class="col-5">
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

    <div class="col-md-10"></div>

    <div class="col-md-1">
      <a href="<?=BASEURL?>adm/index.php" class="btn btn-warning">Voltar</a>
    </div>

    <div class="col-md-1">
      <a href="<?=BASEURL?>adm/perfil/view-edit.php" class="btn btn-primary">Editar</a>
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