<?php
  ini_set('display_errors',1);
?>
<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>
<?php require_once 'functions.php'; ?>
<?php add(); ?>

<?php include(HEADER_ADMIN_TEMPLATE); ?>

<h2>Novos Dados</h2>
 

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
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="customer[cpf]">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">CEP</label>
      <input type="text" class="form-control" name="customer[cep]">
    </div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2"></div>
  
    <div class="form-group col-md-5">
      <label for="campo1">Rua</label>
      <input type="text" class="form-control" name="customer[rua]">
    </div>

  <div class="form-group col-md-1">
      <label for="campo1">Número</label>
      <input type="text" class="form-control" name="customer[numero]">
  </div>

  <div class="form-group col-md-2">
      <label for="campo1">Complemento</label>
      <input type="text" class="form-control" name="customer[complemento]">
  </div>

  <div class="form-group col-md-2"></div>

  <div class="form-group col-md-2"></div>

  <div class="form-group col-md-3">
      <label for="campo1">Bairro</label>
      <input type="text" class="form-control" name="customer[bairro]">
  </div>

  <div class="form-group col-md-3">
      <label for="campo1">Cidade</label>
      <input type="text" class="form-control" name="customer[cidade]">
  </div>

  <div class="form-group col-md-2">
      <label for="campo1">Estado</label>
      <input type="text" class="form-control" name="customer[estado]">
  </div>

  <div class="form-group col-md-2"></div>

  <div class="form-group col-md-4"></div>

  <div class="form-group col-md-4">
      <label for="campo1">Telefone</label>
      <input type="text" class="form-control" name="customer[telefone]">
  </div>

  <div class="form-group col-md-4"></div>

  <div class="form-group col-md-2"></div>

  <div class="form-group col-md-4">
      <label for="campo1"><b>Email *</b></label>
      <input type="text" class="form-control" name="customer[email]">
  </div>

  <div class="form-group col-md-4">
      <label for="campo1"><b>Senha *</b></label>
      <input type="text" class="form-control" name="customer[senha]">
  </div>

  <div class="form-group col-md-2"></div>

</div>

<br>
<br>

  <div id="acao" class="row">

  <div class="form-group col-md-5"></div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="../../adm/usuarios/index.php" class="btn btn-warning">Cancelar</a>
    </div>

    <div class="form-group col-md-4"></div>

  </div>
</form>


<?php include(FOOTER_ADMIN_TEMPLATE); ?>