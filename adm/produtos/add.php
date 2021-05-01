<?php
  ini_set('display_errors',1);
?>
<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>
<?php require_once 'functions.php'; ?>
<?php add(); ?>

<?php include(HEADER_ADMIN_TEMPLATE); ?>

<h2>Novo Produto</h2>


<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-8">
      <label for="name">Nome do Produto</label>
      <input type="text" class="form-control" name="customer[nome]">
    </div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-8">
      <label for="name">Vídeo</label>
      <input type="text" class="form-control" name="customer[video]">
    </div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-8">
      <label for="campo2">Descrição</label>
      <input type="text" class="form-control" name="customer[descricao]">
    </div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2"></div>

    <div class="form-group col-md-2">
      <label for="campo3">Marca</label>
      <input type="text" class="form-control" name="customer[marca]">
    </div>
  
    <div class="form-group col-md-2">
      <label for="campo1">Modelo</label>
      <input type="text" class="form-control" name="customer[modelo]">
  </div>

  <div class="form-group col-md-4">
      <label for="campo1">Nº Coleção (1-Relóg..,2-Óculos..,3-Eletrôn..,4-Utens..,5-Moda)</label>
      <input type="text" class="form-control" name="customer[id_colecao]">
  </div>

  <div class="form-group col-md-2"></div>

</div>

<br>
<br>
<br>

  <div id="acao" class="row">

  <div class="form-group col-md-5"></div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="../index.php" class="btn btn-warning">Cancelar</a>
    </div>

    <div class="form-group col-md-4"></div>

  </div>
</form>


<?php include(FOOTER_ADMIN_TEMPLATE); ?>