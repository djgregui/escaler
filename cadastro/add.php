<?php
  ini_set('display_errors',1);
?>
<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>
<?php require_once 'functions.php'; ?>
<?php add(); ?>

<?php include(HEADER_SITE_TEMPLATE); ?>

<h2>Cadastro de Usuário</h2>


<form action="add.php" method="post">
  <!-- area de campos do form -->

  <!-- Linha Divisória de Página -->
  <hr />
  
  <!-- Informações -->
  <div class="row">

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-3">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="customer[nome]">
    </div>

    <div class="form-group col-md-5">
      <label for="name">Sobrenome</label>
      <input type="text" class="form-control" name="customer[sobrenome]">
    </div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-4">
      <label for="campo1">Email</label>
      <input type="text" class="form-control" name="customer[email]">
    </div>

    <div class="form-group col-md-4">
      <label for="campo1">Senha</label>
      <input type="text" placeholder="●●●●●●" autocomplete="off" class="form-control" name="customer[senha]">
    </div>
  </div>

<br>
<br>

  <div id="acao" class="row">

  <div class="form-group col-md-5"></div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <a href="../usuario/pagina-login.php" class="btn btn-warning">Cancelar</a>
    </div>

    <div class="form-group col-md-4"></div>

  </div>
</form>


<?php include(FOOTER_SITE_TEMPLATE); ?>