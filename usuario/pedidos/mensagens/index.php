<?php
require '../../../config.php';
require DBAPI;
require HEADER_USUARIO_TEMPLATE;
?>
<h2 class="text-center">Mensagens</h2>
<div style="height:20px"></div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mensagem</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-12 text-right">
        <a href="../../" class="btn btn-primary">
            Voltar
        </a>
    </div>
</div>