<?php
require '../../config.php';
require DBAPI;
require HEADER_ADMIN_TEMPLATE;
$conf = get_full_conf((int) $_GET['id']);
?>
<h2 class="text-center mb-2">Configuração: <?=$conf['nome']?></h2>
<div class="container">
    <form action="<?=BASEURL?>adm/processa.php?tipo=conf" method="post">
    <input type="hidden" name="id" value="<?=$conf['id']?>">
        <div class="row">
            <div class="col-12">
                <label for="valor">Valor:</label>
                <input type="text" class="form-control" name="valor" value='<?=$conf['valor']?>'>
            </div>
            <div class="col-12 text-right mb-2 mt-2">
                <div class="btn-group">
                    <input type="submit" class="btn btn-sm btn-danger" value="Salvar">
                    <a href="index.php" class="btn btn-sm btn-warning">Voltar</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require FOOTER_ADMIN_TEMPLATE;