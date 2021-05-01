<?php require_once '../../../config.php'; ?>
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
    $query = $db->query("SELECT * FROM produtos");
    // Guarda informações executadas dentro da varíavel
    $conjunto = $query->fetch_all(MYSQLI_ASSOC);
}
index();
?>

<div class="row">
                    <div class="col-12">
                        <br>
                        <p class="a font-weight-bold h2">Configurações - Páginas/Menu - Página de Coleção</p>
					</div>
</div>

<!-- TABELA DOS PRODUTOS -->

<main role="main">

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">
    
        <div class="col-6 py-3">
                <div class="container-black">
                    <a href="<?=BASEURL?>adm/configuracoes/paginas/home.php" class="btn btn-lg btn-block btn-success">
                        Quantidade de Produtos
                    </a>
                </div>
        </div>

        <div class="col-6 py-3">
                <div class="container-black">
                    <a href="<?=BASEURL?>adm/configuracoes/paginas/colecao.php" class="btn btn-lg btn-block btn-success">
                        Ordem de Apresentação Inicial
                    </a>
                </div>
        </div>

        <div class="col-6 py-3">
                <div class="container-black">
                    <a href="<?=BASEURL?>adm/configuracoes/paginas/informativas.php" class="btn btn-lg btn-block btn-success">
                        Título
                    </a>
                </div>
        </div>
        
        <div class="col-6 py-3"></div>

        <div class="col-2 py-3"></div>

        <div class="col-8 py-3">
                <div class="container-black">
                    <div class="h6">Pré-Visualização</div>
                    <div href="#" class="btn btn-sm btn-warning">Recarregar</div>
                </div>
            
            <br>    

                <input type="text" name="Nome" style="height:600px; width: 400px" />

        </div>

        <div class="col-2 py-3"></div>

    </div>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->

</main>

<?php include(FOOTER_ADMIN_TEMPLATE); ?> 