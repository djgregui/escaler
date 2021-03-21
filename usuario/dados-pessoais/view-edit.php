<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_USUARIO_TEMPLATE); ini_set('display_errors',1); ?>



<?php
function view($id) {
    global $usuario;
    $db = open_database();
    $query = $db->query("SELECT * FROM usuario WHERE id='$id'");
    $usuario = $query->fetch_assoc();
}
view($_SESSION['id_user']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<script>
$(function(){
    $("#cpf").inputmask({
        mask: "###.###.###-##",
        removeMaskOnSubmit:true
    });
    $("#cep").inputmask({
        mask: "#####-###",
        removeMaskOnSubmit:true
    });
    $("#telefone").inputmask({
        mask: "(##) ####[#]-####",
        removeMaskOnSubmit:true
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
        <div class="col-4">
                <h6>CPF</h6>
                <input type="int" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['cpf']?>"
                name="cpf" id='cpf'>
                <!-- placeholder="<?php echo $usuario['cpf']; ?> -->
        </div>
        <div class="col-4">
                <h6>CEP</h6>
                <input type="int" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['cep']; ?>"
                name="cep" id='cep'>
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-5">
                <h6>Rua</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['rua']; ?>"
                name="rua">
        </div>
        <div class="col-1">
                <h6>Número</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['numero']; ?>"
                name="numero">
        </div>
        <div class="col-2">
                <h6>Complemento</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['complemento']; ?>"
                name="complemento">
        </div>
        <div class="col-2"></div>

        <div class="col-2"></div>
        <div class="col-3">
                <h6>Bairro</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['bairro']; ?>"
                name="bairro">
        </div>
        <div class="col-3">
                <h6>Cidade</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['cidade']; ?>"
                name="cidade">
        </div>
        <div class="col-2">
                <h6>Estado</h6>
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['estado']; ?>"
                name="estado">
        </div>
        <div class="col-2"></div>

        <div class="col-4"></div>
        <div class="col-4">
                <h6>Telefone</h6>
                <input type="int" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                value="<?php echo $usuario['telefone']; ?>"
                name="telefone" id='telefone'>
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
                <input type="text" style="border-radius:6px; background-color:white; height:40px; width: 100%; line-height:40px; padding-left:20px" 
                placeholder="●●●●●●" autocomplete="off"
                name="senha">
        </div>

        <div class="col-2"></div>
   </div>


<br>
<br>

<div class="container">



<div class="container">
<div class="row">

    <div class="col-12 text-right">
        <div class="btn-group">
                <a href="<?=BASEURL?>usuario/dados-pessoais/index.php" class="btn btn-warning">Voltar</a>
                <button type="submit" value="Salvar" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</div>

</div>
</form>
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->


<?php include(FOOTER_USUARIO_TEMPLATE); ?>