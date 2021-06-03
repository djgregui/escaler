<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ?>


 
<!-- CORPO DA PÁGINA -->


<!-- Formulário de Login -->
<div class="text-center">
    <br>
    <h1 style="color:#990e0e">Entrar</h1>
    <br>
    <div style="left:50%">
        <form action="<?=BASEURL?>adm/login.php" method="POST">
            <?php if(isset($_GET['e'])){?>
            <div class="alert alert-danger font-weight-bold">Usuário/Senha Incorreta</div>
            <?php } ?>
            <b>Email:</b> 
            <input type="text" style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:10px" 
            id="inputEmail" placeholder="email@email.com" required="" autofocus="" name="usuario"><br />
            <br>
            <b>Senha:</b> 
            <input type="password" style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:10px" 
            id="inputPassword"  placeholder="******" required="" name="senha"><br />
            
            <br>

            <button class="btn px-4 font-weight-bold text-uppercase btn-danger" type="submit" style="border-radius:6px;">Entrar</button>
        </form>
    </div>
</div>

 



<?php include(FOOTER_SITE_TEMPLATE); ?>




