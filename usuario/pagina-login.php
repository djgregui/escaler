<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ?>



<!-- CORPO DA PÁGINA -->


<!-- Formulário de Login -->
<div class="text-center">
        <img src="<?=BASEURL?>img/Logo/Logo fundo trasp.png" style="width: 20%;">
        <h1 style="font-family: 'Arapey'; color:#990e0e">Entrar</h1>
        <br>
        <br>


        <!-- Leva para análise no arquivo de autenticação -->
    <div style="left:50%">
        <form action="<?=BASEURL?>usuario/login.php" method="POST">

            <!-- Mensagem de Erro -->
            <?php if(isset($_GET['e'])){?>
            <div class="alert alert-danger font-weight-bold">Usuário/Senha Incorreta</div>
            <?php } ?>

            <!-- Inserção dos dados de login para acesso -->
            <b>Email:</b> <input type="text" style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:10px" 
            id="inputEmail" placeholder="email@email.com" required="" autofocus="" name="usuario"><br />
            
            <br>

            <b>Senha:</b> <input type="password" style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:10px" 
            id="inputPassword"  placeholder="******" required="" name="senha"><br />
            
            <?php if(isset($_GET['shop'])){?>
                <input type='hidden' name='shop' value='<?=$_GET["shop"]?>'>
            <?php }?> 

            <br>
            
            <button class="btn px-4 font-weight-bold text-uppercase btn-danger" type="submit">Entrar</button>
        </form>
        <a href="<?=BASEURL?>cadastro/add.php" class="btn px-3 py-1 font-weight-bold text-uppercase btn-primary mt-2 btn-sm">Cadastrar</a>
    </div>
</div>



<div class="fixed-bottom">
<div class="text-center">
@2020Escaler
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
</div>
</div>


<?php include(FOOTER_USUARIO_TEMPLATE); ?>




