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

<form action="edit.php?id=<?php echo $usuario['id'];?>" method="post">

<!-- Informações -->
    <div class="row">

    <div class="col-2"></div>
        <div class="col-3">
                <h6>Nome</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['nome']?>"
                name="nome">
        </div>
        <div class="col-5">
                <h6>Sobrenome</h6>
                <input type="int" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['sobrenome']?>"
                name="sobrenome">
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-3">
                <h6><b>Email *</b></h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['email']; ?>" disabled
                name="email">
               <!-- <p style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:20px">
                    <?=$usuario['email']?>
                </p> -->
        </div>
        <div class="col-5">
                <h6><b>Senha *</b></h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                placeholder="●●●●●●" autocomplete="off"
                name="password">
        </div>
        <div class="col-2"></div>
   </div>


<br>
<br>

<div class="container">
<div class="row">

    <div class="col-md-10"></div>

    <div class="col-md-1">
      <a href="<?=BASEURL?>adm/perfil/index.php" class="btn btn-warning">Voltar</a>
    </div>

    <div class="col-md-1">
      <!-- <a href="../../painel-usuario/dados-pessoais/editar.php?id=<?=$_SESSION['id_user']?>" class="btn btn-primary">Salvar</a> -->
      <button type="submit" value="Salvar" class="btn btn-primary">Salvar</button>
    </div>
</div>
</div>
</form>
<br>  <!-- Pular Linha -->

<?php include(FOOTER_ADMIN_TEMPLATE); ?>