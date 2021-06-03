<?php 
    require '../../config.php';
    require DBAPI;
    require HEADER_ADMIN_TEMPLATE;
    $db = open_database();
    $indicativo_1 = count(($db->query("SELECT * FROM usuario"))->fetch_all(MYSQLI_ASSOC));
    $indicativo_2 = count(($db->query("SELECT * FROM tracking"))->fetch_all(MYSQLI_ASSOC));
    $indicativo_3 = count(($db->query("SELECT * FROM tracking_shop"))->fetch_all(MYSQLI_ASSOC));
?>
<h2 class="text-center">Relatórios</h2>
        
<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row bg-dark text-light py-3" style="border-radius:25px">
                    <div class="col-6 col-md-3 col-lg-3 border-left">
                        <div class="row">
                            <div class="text-center h1 font-weight-bold col-12"><?=$indicativo_1?></div>
                            <div class="text-center col-12">Usuários Cadastrados</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 border-left">
                        <div class="row">
                            <div class="text-center h1 font-weight-bold col-12"><?=$indicativo_2?></div>
                            <div class="text-center col-12">Visitas no Site</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 border-left">
                        <div class="row">
                            <div class="text-center h1 font-weight-bold col-12"><?=$indicativo_3?></div>
                            <div class="text-center col-12">Cliques em Comprar</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 border-left">
                        <div class="row">
                            <div class="text-center h1 font-weight-bold col-12">0</div>
                            <div class="text-center col-12">Produtos com Baixo Estoque</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right mt-4">
                <a href="../" class="btn btn-warning">Voltar</a>
            </div>
        </main>
    </div>
</div>