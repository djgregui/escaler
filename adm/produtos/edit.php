<?php
ini_set("display_errors",1);
require '../../config.php';
require DBAPI;
require HEADER_ADMIN_TEMPLATE;
$id = (int) $_GET['id']; $dados = ((open_database())->query("SELECT produtos.*  FROM produtos LEFT JOIN colecoes ON produtos.id_colecao=colecoes.id WHERE produtos.id = '$id'"))->fetch_assoc();  $imagens = json_decode($dados['imagens'],true); $versoes = get_versoes_produto($dados['id']); $imgjson = ((open_database())->query("SELECT * FROM produto_imagens WHERE id_produto = '$id' LIMIT 4"))->fetch_all(MYSQLI_ASSOC); 
?>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script>
function addimg(n) {
    if((Array.from(document.querySelectorAll("#imgrow div")).length) < 12) {
        $("#imgrow").append(`
            <div class="form-group col" id='${n}'><label class="text-capitalize font-weight-bold" for="video"> <a href="javascript:deleteImg(${n})" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a> Imagem:</label>
            <input type="text" value="" name="imagem[]" id="imagem_${n}" class="form-control"></div>
        `);
        n++;
        $("#addbtn").attr("href",`javascript:addimg(${n})`)
    }
}
function deleteImg(n) {
    $(`#${n}`).remove()
}
function addVersao(x) {
    $("#versoes_row").append(`
        <div class="col-12 pb-1" id='rowv_${x}'>
            <div class="row">
                <div class="col-1 pl-0"><a href='javascript:delVersao(${x})' class='btn btn-danger'><i class='fa fa-trash-alt'></i></a></div>
                <div class="col-1 pr-0"><input type="text" name="" id="" class="form-control-plaintext text-right" readonly="readonly" value="Versão:"></div>
                <div class="col-7"><input type="text"      value="" name="versao[]" id="" placeholder="Versão" class="form-control"></div>
                <div class="col-3"><input type="text"      value="" name="valor[]" id="valor_${x}" placeholder="Valor" class="form-control"></div>
            </div>
        </div>
    `);
    x++;
    $("#addvbtn").attr("href",`javascript:addVersao(${x})`);
}
function delVersao(x) {
    if((document.querySelector(`#rowv_${x} input#valor_${x}`).name.substr(0,7) == "valor[g")) {
        $("#rowv_"+x).remove();
    } else {
        $("#rowv_"+x).addClass("d-none");
        $(`#rowv_${x} .row`).append(`<input type="hidden" name="delete[]" value="${x}">`);
    }
}
function submitForm() {
    document.querySelector("#form2").submit();
}
function changeImg(img_el,value) {
    console.log(img_el);
    $.get('https://<?=DOMAIN?>/'+value)
    .done(function() { 
        // exists code 
        $(`#${img_el}`).attr("src","https://<?=DOMAIN?>/"+value);
    })
}
function changeVideo(url) {
    if(url.length > 32) {
        if(url.substr(0,32) == "https://www.youtube.com/watch?v=") {

        } else {
            
        }
    } else {

    }
}
function isUrl(s) {
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    return regexp.test(s);
}
</script>
<br>
<div class='container'>
    <div class="row border-bottom pb-1 mb-2">
        <div class="col-md-11 col-lg-11 col-10">
            <h4 class="padded-title">Produto: <?=$dados['nome']?></h4>
        </div>
        <div class="col-md-1  col-lg-1  col-2 text-right">
            <a href="javascript:submitForm()" class="btn btn-primary"><i class="fas fa-save"></i></a>
        </div>
    </div>
    <form action="../processa.php?tipo=edit_produto&id=<?=$id?>" method="post" id="form2">
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-12">
                <label class="text-capitalize font-weight-bold" for="nome">nome:</label>
                <input type="text" value="<?=$dados['nome']?>" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-group col-md-6 col-lg-6 col-12">
                <label class="text-capitalize font-weight-bold" for="coleção">coleção:</label>
                <select name="colecao" id="colecao" class="form-control">
                    <?php foreach(get_colecoes() as $colecao) { ?>
                        <option value="<?=$colecao['id']?>" <?php if($colecao['id'] == $dados['id_colecao']) { echo 'selected'; } ?>><?=$colecao['nome']?></option>
                    <?php } ?>                
                </select>
            </div>
            <div class="form-group col-12">
                <label class="text-capitalize font-weight-bold" for="nome">Link do Fornecedor:</label>
                <input type="text" value="<?=$dados['original_url']?>" name="original_url" id="original_url" class="form-control">
            </div>
            <div class="form-group col-md-3 col-lg-3 col-6">
                <label class="text-capitalize font-weight-bold" for="marca">marca:</label>
                <input type="text" value="<?=$dados['marca']?>" name="marca" id="marca" class="form-control">
            </div>
            <div class="form-group col-md-3 col-lg-3 col-6">
                <label class="text-capitalize font-weight-bold" for="modelo">modelo:</label>
                <input type="text" value="<?=$dados['modelo']?>" name="modelo" id="modelo" class="form-control">
            </div>
            <div class="form-group col-md-6 col-lg-6 col-12">
                <label class="text-capitalize font-weight-bold" for="video">video:</label>
                <input type="text" value="<?=$dados['video']?>" name="video" id="video" class="form-control">
            </div>
            <div class="col-12">
                <h2 class=" border-bottom border-dark pb-1"><a href="javascript:addVersao(<?=count($versoes)?>)" class="btn btn-success" id="addvbtn"><i class="fas fa-plus"></i></a>&nbsp;Versões</h2>
            </div>
            <div class="col-12 pt-1 pb-2">
                <div class="row px-3" id="versoes_row">
                    <?php for($x=0; $x < count($versoes);$x++) { ?>
                        <div class="col-12 pb-1"  id='rowv_<?=$x?>'>
                            <div class="row">
                                <div class="col-1 pl-0"><a href='javascript:delVersao(${x})' class='btn btn-danger'><i class='fa fa-trash-alt'></i></a></div>
                                <div class="col-1 pr-0"><input type="text" name="" id="" class="form-control-plaintext text-right" readonly="readonly" value="Versão:"></div>
                                <div class="col-7"><input type="text"      value="<?=$versoes[$x]['versao']?>" name="versao[]" id="" placeholder="Versão" class="form-control"></div>
                                <div class="col-3"><input type="text"      value="<?=$versoes[$x]['valor']?>" name="valor[]" id="valor_<?=$x?>" placeholder="Valor" class="form-control"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12">
                <h2 class=" border-bottom border-dark pb-1"><a href="javascript:addimg(<?=rand(0,date('U'))?>)" class="btn btn-success"  id="addbtn"><i class="fas fa-plus"></i></a>&nbsp;Imagens</h2>
            </div>
            <div class="col-12 pb-2">
                <div class="row" id="imgrow">
                    
                    <?php $n=0; if($imgjson != '') { foreach($imgjson as $imagem) { ?>
                        <div class="form-group col-md col-lg col-6" id="ccol<?=$rand = rand(0,date('U'))?>">
                            <label class="text-capitalize font-weight-bold" for="video"> <a href="javascript:deleteImg('ccol<?=$rand?>')" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a> Imagem:</label>
                            <input type="text" onkeyup="changeImg('img_<?=$rand?>',document.querySelector('#imagem_<?=$rand?>').value)" value="<?=$imagem['url']?>" name="imagem[<?=$rand?>]" id="imagem_<?=$rand?>" class="form-control">
                            <div style="height:5px"></div>
                            <img id="img_<?=$rand?>" src="<?=BASEURL. $imagem['url']?>" alt="" style="width:100%">
                        </div>
                    <?php $n++; } }?>
                </div>
            </div>
            <div class="form-group col-12">
                <label class="text-capitalize font-weight-bold" for="descricao">descricao:</label>
                <div name="descricao" id="descricao" class=""><?=$dados['descricao']?></div>
            </div>
        </div>
    </form>
</div>
<div style='height:80px'></div> 
<script>
var editor = new Quill('#descricao', {
    theme: 'snow'
  });
</script>