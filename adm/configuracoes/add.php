<?php
require '../../config.php';
require DBAPI;
require HEADER_ADMIN_TEMPLATE;
?>
<h2 class="text-center">Adicionar Conf.</h2>
<div class="container">
    <form action="<?=BASEURL?>adm/processa.php?tipo=add_conf" method="POST">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12 form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="col-md-6 col-lg-6 col-12 form-group">
                <label for="valor">Valor:</label>
                <input type="text" class="form-control" name="valor">
            </div>
            <div class="col-12 text-right mt-4 mb-2">
                <div class="btn-group">
                    <input class="btn btn-danger" type="submit" value="Salvar">
                    <a href="index.php" class="btn btn-warning">Voltar</a>
                </div>
            </div>
        </div>
    </form>
</div>