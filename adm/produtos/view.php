<?php 
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    require_once '../../config.php'; 
    require_once DBAPI; 
    require_once HEADER_ADMIN_TEMPLATE; 
    $produto = get_produto((int) $_GET['id']);
    
?>
<div class="py-3">
    <p class="text-center display h2" style="font-weight: 400;">Produto</p>
    <div class="text-center" style="width:50px; border-bottom:1px solid #9d0201;margin:0 auto"></div>
</div>
<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">
        <?php if(count($produto['imagens']) > 0) { ?>
            <div class="col-md-6 col-lg-6 col-12 py-3">
                <div class="container-black">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <style>
                            .carousel-control-prev-icon,
                            .carousel-control-next-icon {
                            height: 100px;
                            width: 100px;
                            background-size: 100%, 100%;
                            border-radius: 50%;
                            background-image: none;
                            }

                            .carousel-control-next-icon:after
                            {
                            content: '»';
                            font-size: 55px;
                            color: black;
                            }

                            .carousel-control-prev-icon:after {
                            content: '«';
                            font-size: 55px;
                            color: black;
                            }
                        </style>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?=BASEURL?><?=$produto['imagens'][0]['url']?>" alt="First slide">
                        </div>
                        <?php for($n=1;$n<count($produto['imagens']);$n++) { ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=BASEURL?><?=$produto['imagens'][$n]['url']?>" alt=" slide">
                            </div>
                        <?php } ?>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> 
            </div>
        <?php } ?>
        <div class="col-md-6 col-lg-6 col-12 py-3">
            <h3><?=$produto['nome']?></h3>
            <p class="text-center"><a href="<?=$produto['original_url']?>" class="btn btn-primary">Ver Original</a>&nbsp; </p>
            <p class="border-bottom border-dark"></p>
            <?php  if($produto['video'] != '') { ?>
                <div id="iframe-video">
                    <br>
                    <iframe style="width: 100%;aspect-ratio: 16/9;height: calc(100%);" id="video" width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?=substr($produto['video'],32)?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } ?>
            <table class="table table-light">
            <thead><tr><th colspan='4' class='text-center border border-dark'>
                <div class="row">
                    <div class="col-8 text-left" style="font-size:x-large">Versões:</div>
                    <div class="col-4 text-right"><a href="edit.php?id=<?=$produto['id']?>" class="btn btn-success"><i class="fas fa-plus"></i></a></div>
                </div>
            </th></tr></thead>
                <tbody>
                    <?php
                        
                        foreach(get_versoes_produto($produto['id']) as $versao) { 
                        $id = $versao['id'];
                        $integracao=array(
                            "script_fornecedor" => "javascript:void(0)"
                        );
                        $sql = "SELECT * FROM integracoes WHERE id_produto_versao = '$id'";
                        $integracao = ((open_database())->query($sql))->fetch_assoc();
                        if($produto['id_fornecedor'] == "3") { $integracao['script_fornecedor'] = '/adm/produtos/update/bolsaspararevendas.php'; }
                        // if($produto['id_fornecedor'] == "1") { $integracao['script_fornecedor'] = '/adm/produtos/update/grupoltm.php'; }
                        ?>
                            <tr>
                                <td class='text-left border-top border-bottom border-left border-dark'><?=$versao['id']?></td>
                                <td class='text-right border-top border-bottom border-dark'><?=$versao['versao']?></td>
                                <td class='text-right border-top border-bottom border-dark'>R$<?=number_format($versao['valor'],2,',','.')?></td>
                                <td class='text-right border-top border-bottom border-right border-dark'>
                                    <?=$versao['estoque']?>&nbsp;
                                    <a href="<?=$integracao['script_fornecedor']?>?id=<?=$versao['id']?>" class="btn btn-danger"><i class="fas fa-sync-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
            
            </p>
        </div>
    </div>
    <div style="color: black">
        <h2>Resumo:</h2>
        <div style="height:10px">   </div>
        <p><?=$produto['descricao']?></p>
        <?php if(strlen($produto['long_descricao']) > 1) { ?>
            <style>
                #descricao img {
                    width:100%;
                }
            </style>
            <h2>Características:</h2>
            <div  id="descricao"><?=$produto['long_descricao']?></div>
        <?php } ?>
    </div>
</div>


<?php include(FOOTER_ADMIN_TEMPLATE); ?>