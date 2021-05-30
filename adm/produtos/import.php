<?php
ini_set('display_errors',1);
require '../../config.php';
require DBAPI;
if(!isset($_GET['tipo'])) { $_GET['tipo'] = 'cat';}
$tipo = filter_var($_GET['tipo'],FILTER_SANITIZE_STRING);
if($tipo == 'cat') {
    require HEADER_ADMIN_TEMPLATE;
    echo "<div class='text-center' style='font-size:x-large;margin-bottom:2em;'>Importar produtos</div><div class='container'><form action='import.php' method='get'><div class='row'><div class='col-1 text-right font-weight-bold'><input type='hidden' name='tipo' value='subcat'><label for='categoria'>Categoria:</label></div><div class='col-10 text-center'><select name='categoria' id='categoria' class='form-control'>";
    $file = 
    file_get_contents('http://gw.api.taobao.com/router/rest?app_key=32738332&method=aliexpress.affiliate.category.get&v=2.0&sign=89D972101519D876343DBE74A892EED4&timestamp=2021-05-11+10%3A13%3A43&partner_id=top-apitools&format=json&sign_method=hmac&force_sensitive_param_fuzzy=true');
    $result = json_encode(json_decode($file,true),JSON_PRETTY_PRINT);
    foreach(json_decode($file,true)['aliexpress_affiliate_category_get_response']['resp_result']['result']['categories']['category'] as $categorias) {
        if(!isset($categorias['parent_category_id'])) {
            $id = $categorias['category_id']; $nome = $categorias['category_name'];echo "<option value='$id'>$nome</option>";
        }
    }
    echo "</select></div><div class='col-1 text-left'><button type='submit' class='btn btn-primary'>Selecionar</button></div></form></div>";
    // echo "<pre>",$result,"</pre>";
} elseif($tipo == 'subcat') {
    require HEADER_ADMIN_TEMPLATE;
    echo "<div class='text-center' style='font-size:x-large;margin-bottom:2em;'>Importar produtos</div><div class='container'><form action='import.php' method='get'><div class='row'><div class='col-2 text-right font-weight-bold'><input type='hidden' name='tipo' value='product'><label for='categoria'>Subategoria:</label></div><div class='col-8 text-center'><select name='categoria' id='categoria' class='form-control'>";
    $file = 
    file_get_contents('http://gw.api.taobao.com/router/rest?app_key=32738332&method=aliexpress.affiliate.category.get&v=2.0&sign=89D972101519D876343DBE74A892EED4&timestamp=2021-05-11+10%3A13%3A43&partner_id=top-apitools&format=json&sign_method=hmac&force_sensitive_param_fuzzy=true');
    $result = json_encode(json_decode($file,true),JSON_PRETTY_PRINT);
    foreach(json_decode($file,true)['aliexpress_affiliate_category_get_response']['resp_result']['result']['categories']['category'] as $categorias) {
        if($categorias['parent_category_id'] == (int) $_GET['categoria']) {
            $id = $categorias['category_id']; $nome = $categorias['category_name'];echo "<option value='$id'>$nome</option>";
        }
    }
    echo "</select></div><div class='col-2 text-left'><button type='submit' class='btn btn-primary'>OK</button></form><form style='display:inline;margin-left:3px' action='import.php' method='get'><input type='hidden' name='tipo' value='cat'><button type='submit' class='btn btn-primary'><</button></form></div></div>";
} elseif($tipo == 'raw') {
    $import = json_decode($_GET['import'],true);
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Escaler</title>
        <link rel="stylesheet" href="<?=BASEURL?>estilocss/estilo.css">
        <link rel="shortcut icon" href="<?=BASEURL?>img/Logo/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
        <script src="<?=BASEURL?>vendor/jquery.js"></script> <!-- jQuery by Google -->
        <script src="<?=BASEURL?>vendor/popper.min.js"></script> <!-- Popper by Twitter -->
        <script src="<?=BASEURL?>vendor/bootstrap/js/bootstrap.js"></script> <!-- Bootstrap by Twitter -->
        <style>
        .bg-escaler {
            background: rgb(157, 2, 1);
        }
        </style>
        <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet"> --> 
        <!-- <link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Arapey&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet"> -->
        <script>
            window.onload = function() {
                stringmaster = `<?=str_replace('< img','<img',$import['variants'])?>`;
                // alert(stringmaster)
                objs = new Array; variants = new Array; objs2 = new Array;
                stringmaster.split('<').forEach(function(item){
                    objs.push(item)
                }); 
                objs = objs.filter(item => item);
                objs.forEach(function(item){
                    objs2.push('<'+item)
                })
                objs2.forEach(function(txt){
                    var parser = new DOMParser(); 
                    var htmlDoc = parser.parseFromString(txt, 'text/html');
                    variants.push( {src: htmlDoc.querySelector('img').src, alt: htmlDoc.querySelector('img').alt}); 
                }); 
                variants.forEach(function(item,index) {
                    label = document.createElement("label")
                    label.innerText = item.alt;
                    $("#formappend").append(`<div class='col-12 mt-1 mb-1'><div class="input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text">Variante</span></div><input type="text" name="alt[${index}]" id="" class="form-control" value="${item.alt}"><div class="input-group-append"><span class="input-group-text"><input type="hidden" name="img[${index}]" class="form-control mb-2" value="${item.src}"><img src="${item.src}" style="height: calc(48px - 1.1rem);aspect-ratio:1"></span></div></div>`)
                });
            }
        </script>
    </head>
    <body>
        <div class="fixed-top">
            <div class="row py-1 text-light" style="background: rgb(157, 2, 1)">
                <div class="col-11 text-center"; style="padding-left: 130px">ESCALER - Sua Compra com Compromisso e Segurança</div>
                <div class="col-1 text-right";>
                    <a href="<?=BASEURL?>adm/logout.php">
                    <b style="color: white; padding-right: 10px">Sair</b>
                    </a>
                </div>
            </div>
            <!-- Barra Principal de Menu com Itens de PEsquisa e Expansíveis -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?=BASEURL?>"><img src="<?=BASEURL?>img/Logo/Logo fundo trasp.png" alt="logo" style="max-height: 55px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/index.php">Início</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/perfil/index.php">Perfil</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/usuarios/index.php">Usuários</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/produtos/index.php">Produtos</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/pedidos/index.php">Pedidos</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/relatorios/index.php">Relatórios</a></li>
                    <li class='nav-item'><a class="nav-link" href="<?=BASEURL?>adm/configuracoes/index.php">Configurações</a></li>
                </ul>
                </div>
            </nav>
        </div>
        <main role="main" class="container-fluid" style="margin-top: 135px">
            <div class="container">
                <form action="import.php" method="post" id="form2">
                    <input type="hidden" name="tipo" value="form_product">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Título</span></div>
                            <input type="text" name="" id="" class="form-control" value="<?=$import['title']?>">
                        </div>
                        <div style="height:5px"></div>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Preço</span></div>
                            <input type="text" name="" id="" class="form-control" value="<?=$import['price']?>">
                        </div>
                        <div style="height:5px"></div>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Preço original</span></div>
                            <input type="text" name="" id="" class="form-control" value="<?=$import['originalprice']?>">
                        </div>

                    </div>
                    <div id="formappend"></div>
                    <div style="height:10px"></div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
    <?php
} elseif($tipo == 'form_product') {
    
}