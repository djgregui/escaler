<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ?>

<!-- PHP CONECTANDO COM BANCO DE DADOS -->
<?php
// Função criada
function index() {
    global $conjunto;
    // Abre o banco de dados
    $db = open_database();
    // Execução do comando para selecionar a tabela "produtos" 
    $query = $db->query("SELECT * FROM usuario");
    // Guarda informações executadas dentro da varíavel
    $conjunto = $query->fetch_all(MYSQLI_ASSOC);
}
index();
?>

<div class="row">
                    <div class="col-12">
                        <br>
                        <p class="a font-weight-bold h2">Usuários Cadastrados</p>
					</div>
</div>

<!-- TABELA DOS PRODUTOS -->

<main role="main">


<div class="container-fluid"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

        <div class="col-12 text-right py-3">
            <a href="<?=BASEURL?>adm/usuarios/add.php" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>
</div>


    <div class="container-fluid">
        <div style="background-color: pink;">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>  <!-- "tr" é como uma linha de excel -->
                        <th scope="col">Id</th>
                        <th scope="col">Nome Completo</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                        <th scope="col">Cpf</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>


                <!-- Comando em php para executar um conjunto em itens separados -->
                    <?php foreach($conjunto as $item) { ?>
                        <tr>
                            <th scope="row"><?=$item['id']?></th>
                            <td><?=$item['nome']?> <?=$item['sobrenome']?></td>
                            <td><?=mask($item['cpf'],'###.###.###-##')?></td>
                            <td><?=mask($item['cep'],"#####-###")?></td>
                            <td>Rua <?=$item['rua']?>, <?=$item['numero']?>, <?=$item['complemento']?>, <?=$item['bairro']?> - <?=$item['cidade']?>/ <?=$item['estado']?></td>
                            <td><?php if(strlen($item['telefone'])>10) {echo mask($item['telefone'],'(##) #####-####');} else {echo mask($item['telefone'],'(##) ####-####');}?></td>
                            <td><?=$item['email']?></td>
                            <td>

                            <div class="btn-group"> <!-- Agrupa os Botões -->

                                <a href="<?=BASEURL?>adm/usuarios/view.php?id=<?=$item['id']?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="<?=BASEURL?>adm/usuarios/view-edit.php?id=<?=$item['id']?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <a href="<?=BASEURL?>adm/usuarios/delete.php?id=<?=$item['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            
                            </div>

                                </td>
                        </tr>
                    <?php } ?>

                    
                </tbody>
            </table>
        </div>
    </div>

<br>
<br>
<br>
<br>


</main>


<?php include(FOOTER_ADMIN_TEMPLATE); ?>