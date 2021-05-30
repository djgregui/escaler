<?php 
    require_once '../../config.php'; 
    require_once DBAPI; 
    require_once HEADER_ADMIN_TEMPLATE; 
    $conjunto = get_clientes();
?>

<div class="row">
    <div class="col-12">
        <br>
        <p class="text-center font-weight-bold h2">Usuários Cadastrados</p>
    </div>
</div>


<div class="container-fluid mb-4">
    <div style="background-color: pink;" class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>  <!-- "tr" é como uma linha de excel -->
                    <th scope="col">#</th>
                    <th scope="col">Nome Completo</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                    <th scope="col">CPF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($conjunto as $item) { ?>
                    <tr>
                        <th style="white-space:nowrap" scope="row"><?=$item['id']?></th>
                        <td style="white-space:nowrap"><?=$item['nome']?> <?=$item['sobrenome']?></td>
                        <td style="white-space:nowrap"><?=mask($item['cpf'],'###.###.###-##')?></td>
                        <td style="white-space:nowrap"><?=mask($item['cep'],"#####-###")?></td>
                        <td style="white-space:nowrap">Rua <?=$item['rua']?>, <?=$item['numero']?><span class='d-md-block d-lg-block d-none'>, <?=$item['complemento']?>, <?=$item['bairro']?> - <?=$item['cidade']?>/ <?=$item['estado']?></span></td>
                        <td style="white-space:nowrap"><?php if(strlen($item['telefone'])>11) { echo $item['telefone']; } elseif(strlen($item['telefone'])==11) { echo mask($item['telefone'],'(##) #####-####');} else {echo mask($item['telefone'],'(##) ####-####');}?></td>
                        <td style="white-space:nowrap"><?=$item['email']?></td>
                        <td class="text-center">
                            <div class="btn-group"> <!-- Agrupa os Botões -->
                                <a href="<?=BASEURL?>adm/usuarios/view.php?id=<?=$item['id']?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <?php if($item['u_status'] != '2') { ?>
                                    <a href="<?=BASEURL?>adm/processa.php?tipo=deactivate_usuario&id=<?=$item['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require FOOTER_ADMIN_TEMPLATE; ?>