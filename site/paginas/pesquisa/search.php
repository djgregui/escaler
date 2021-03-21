<?php require_once '../../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ini_set('display_errors',1); ?>



<?php
function view() {
    $pesquisa = filter_input(INPUT_GET,'pesquisa',FILTER_SANITIZE_STRING);
    global $produto;
    $db = open_database();
    $query = $db->query("SELECT * FROM produtos WHERE nome LIKE '%$pesquisa%'");
    $produto = $query->fetch_all(MYSQLI_ASSOC);
    
}
view();
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!-- CORPO DA PÁGINA -->

<div class="py-3">
    <p class="a display h2" style="font-family: 'Arapey'; font-weight: 400;">Produto</p>
    <p class="a">________</p>
    <br>  <!-- Pular Linha -->
</div>

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">
    <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>  <!-- "tr" é como uma linha de excel -->
                        <th scope="col">#</th>  <!-- "th" é como uma célula formatada de excel ("td" é sem formatação) -->
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>


                <!-- Comando em php para executar um conjunto em itens separados -->
                    <?php foreach($produto as $item) { ?>
                        <tr>
                            <th scope="row"><?=$item['id']?></th>
                            <td><?=$item['marca']?> <?=$item['modelo']?></td>
                            <td><?php if(strlen($item['descricao']) > 120) { echo substr($item['descricao'],0,120) . "..."; } else { echo $item['descricao']; } ?></td>
                            <td>
                                <?php foreach(json_decode($item['tamanho'],true)[0] as $key => $value) {
                                    echo mb_strtoupper($key) . ": " . $value . "<br>";
                                } ?>
                            </td>
                            <td>
                                <a href="<?=BASEURL?>adm/produtos/view.php?id=<?=$item['id']?>" class="btn btn-success">Visualizar</a>
                            </td>
                            </tr>
                    <?php } ?>

                    
                </tbody>
            </table>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center text-dark">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->


<?php include(FOOTER_SITE_TEMPLATE); ?>