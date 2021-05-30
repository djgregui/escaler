<?php
require_once '../../config.php';
require_once DBAPI;
require_once HEADER_ADMIN_TEMPLATE;
$configuracoes = get_confs();
?>

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">
        <div class="col-11 py-2">
            <p class="text-center  h2">Configurações</p>
        </div>
        <div class="col-1 py-2">
            <p class="text-center"><a href="add.php" class="btn btn-success"><i class="fas fa-plus"></i></a></p>
        </div>
    </div>
    <div class="table-responsive mb-4 border border-dark" >
        <table class="table table-striped table-borderless mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Configuração</th>
                    <th>Valor</th>
                    <th class="text-center"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($configuracoes) > 0) { foreach($configuracoes as $conf) { ?>
                    <tr>
                        <td><?=$conf['nome']?></td>
                        <td><?=$conf['valor']?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="edit.php?id=<?=$conf['id']?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                <a href="<?=BASEURL?>adm/processa.php?tipo=rem_add&id=<?=$conf['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } } else { echo '<tr><td colspan="3" class="text-center">Não foram encontrado resultados.</td></tr>'; } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once FOOTER_ADMIN_TEMPLATE;