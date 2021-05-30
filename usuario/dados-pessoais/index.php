<?php
require_once '../../config.php'; 
require_once DBAPI; 
include(HEADER_USUARIO_TEMPLATE); ini_set('display_errors',1); 
function switch_estado($id) {
    switch($id) {
        case 'AC' : return 'Acre'; break;
        case 'AL' : return 'Alagoas'; break;
        case 'AP' : return 'Amapá'; break;
        case 'AM' : return 'Amazonas'; break;
        case 'BA' : return 'Bahia'; break;
        case 'CE' : return 'Ceará'; break;
        case 'DF' : return 'Distrito Federal'; break;
        case 'ES' : return 'Espírito Santo'; break;
        case 'GO' : return 'Goiás'; break;
        case 'MA' : return 'Maranhão'; break;
        case 'MT' : return 'Mato Grosso'; break;
        case 'MS' : return 'Mato Grosso do Sul'; break;
        case 'MG' : return 'Minas Gerais'; break;
        case 'PA' : return 'Pará'; break;
        case 'PB' : return 'Paraíba'; break;
        case 'PR' : return 'Paraná'; break;
        case 'PE' : return 'Pernambuco'; break;
        case 'PI' : return 'Piauí'; break;
        case 'RJ' : return 'Rio de Janeiro'; break;
        case 'RN' : return 'Rio Grande do Norte'; break;
        case 'RS' : return 'Rio Grande do Sul'; break;
        case 'RO' : return 'Rondônia'; break;
        case 'RR' : return 'Roraima'; break;
        case 'SC' : return 'Santa Catarina'; break;
        case 'SP' : return 'São Paulo'; break;
        case 'SE' : return 'Sergipe'; break;
        case 'TO' : return 'Tocantins'; break;
        default : return 'Não informado.'; break;
    }
}
?>
<script>
$(function(){
    // $("#col-cpf").inputMask({mask: "###.###.###-##"});
});
function edp() {
    if(document.getElementById('state').value == 0) {
        document.getElementById('state').value = 1;
        $(".bg-edit").removeAttr("readonly");$("#estado").removeAttr("disabled");
        $("#btn-cedp").show();
    } else {
        document.getElementById("form").submit();
    }
}
function ui() {
    if(document.getElementById('istate').value == 0) {
        document.getElementById('istate').value = 1;
        $("#btn-cei").show(); $("#campo").html(`<form action='edit.php?tipo=i' enctype="multipart/form-data" method='post' id="form2"><input type='hidden' name='id' value='<?=$_SESSION['id_user']?>'><h4>Foto</h4><input name="userfile" type="file" style="color:transparent !important" /></form><div style="height:15px;"></div>`).show();
    } else {
        document.getElementById("form2").submit();
    }
}
</script>
<h2 class="text-center">Usuário <?=$usuario['nome']." ".$usuario['sobrenome']?></h2>
<hr />
<div class="container" style="color:black">
    <div class="row">
        <div class="col-md-12 pt-3 col-lg-2 col-12 text-center">
            <img style="width:100%;max-width:250px" src="<?php if($usuario['profile_pic'] != null) { echo $usuario['profile_pic']; } else { echo 'https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png'; } ?>"><div style="height:10px"></div><div id="campo"></div><a href="javascript:ui()" class="btn btn-danger btn-lg" id="btn-ei"><i class="fas fa-camera"></i></a>&nbsp;<a href="./" class="btn btn-lg btn-danger" style="display:none" id="btn-cei"><i class="fas fa-times"></i></a>
            </div>
        <div class="col-md-12 col-lg-10 col-12">
            <form action="edit.php?tipo=dp" method="post" id="form">
                <div class="row">
                    <input type="hidden" name="state" id="state" value="0" disabled>
                    <input type="hidden" name="istate" id="istate" value="0" disabled>
                    <input type="hidden" name="id" id="id" value="<?=$_SESSION['id_user']?>">
                    <div class="col-md-7 col-lg-7 col-6">
                        <h6 class='text-left mt-2'>Nome</h6>
                        <input class='form-control bg-edit' type="text" name="nome" id="nome" readonly="readonly" value="<?=$usuario['nome']?>">
                    </div>
                    <div class="col-md-5 col-lg-5 col-6">
                        <h6 class='text-left mt-2'>Sobrenome</h6>
                        <input class='form-control bg-edit' type="text" name="sobrenome" id="sobrenome" readonly="readonly" value="<?=$usuario['sobrenome']?>">
                    </div>
                    <div class="col-md-4 col-lg-4 col-6">
                        <h6 class='text-left mt-2'>Data de Nascimento</h6>
                        <input class='form-control bg-edit' type="text" name="nascimento" id="nascimento" readonly="readonly" value="<?=$usuario['nascimento']?>">
                    </div>
                    <div class="col-md-4 col-lg-4 col-6">
                        <h6 class='text-left mt-2'>CPF</h6>
                        <input class='form-control bg-edit' type="text" name="cpf" id="cpf" readonly="readonly" value="<?=$usuario['cpf']?>">
                    </div>
                    <div class="col-md-4 col-lg-4 col-12">
                        <h6 class='text-left mt-2'>Telefone</h6>
                        <input class='form-control bg-edit' type="text" name="telefone" id="telefone" readonly="readonly" value="<?=$usuario['telefone']?>">
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <h6 class='text-left mt-2'><b>Email**</b></h6>
                        <input class='form-control bg-edit2' type="text" name="email" id="email" readonly="readonly" value="<?=$usuario['email']?>" disabled>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <h6 class='text-left mt-2'><b>Senha* <a href='javascript:editP()' class='badge badge-danger'><i class="fas fa-pen"></i></a></b></h6>
                        <input class='form-control bg-edit2' type="text" name="●●●●●●" id="●●●●●●" readonly="readonly" value="●●●●●●" disabled>
                    </div>
                    <div class="col-md-5 col-lg-5 col-9">
                        <h6 class='text-left mt-2'>Rua</h6>
                        <input class='form-control bg-edit' type="text" name="rua" id="rua" readonly="readonly" value="<?=$usuario['rua']?>">
                    </div>
                    <div class="col-md-2 col-lg-2 col-3">
                        <h6 class='text-left mt-2'>Número</h6>
                        <input class='form-control bg-edit' type="text" name="numero" id="numero" readonly="readonly" value="<?=$usuario['numero']?>">
                    </div>
                    <div class="col-md-2 col-lg-2 col-4">
                        <h6 class='text-left mt-2'>Complemento</h6>
                        <input class='form-control bg-edit' type="text" name="complemento" id="complemento" readonly="readonly" value="<?=$usuario['complemento']?>">
                    </div>
                    <div class="col-md-3 col-lg-3 col-4">
                        <h6 class='text-left mt-2'>CEP</h6>
                        <input class='form-control bg-edit' type="text" name="cep" id="cep" readonly="readonly" value="<?=$usuario['cep']?>">
                    </div>
                    <div class="col-md-5 col-lg-5 col-4">
                        <h6 class='text-left mt-2'>Bairro</h6>
                        <input class='form-control bg-edit' type="text" name="bairro" id="bairro" readonly="readonly" value="<?=$usuario['bairro']?>">
                    </div>
                    <div class="col-md-4 col-lg-4 col-7">
                        <h6 class='text-left mt-2'>Cidade</h6>
                        <input class='form-control bg-edit' type="text" name="cidade" id="cidade" readonly="readonly" value="<?=$usuario['cidade']?>">
                    </div>
                    <div class="col-md-3 col-lg-3 col-5">
                        <h6 class='text-left mt-2'>Estado</h6>
                        <select name="estado" id="estado" class="form-control bg-edit" disabled>
                            <option <?php if($usuario['estado'] == 'AC') { echo 'selected';}?> value="AC">Acre</option>
                            <option <?php if($usuario['estado'] == 'AL') { echo 'selected';}?> value="AL">Alagoas</option>
                            <option <?php if($usuario['estado'] == 'AP') { echo 'selected';}?> value="AP">Amapá</option>
                            <option <?php if($usuario['estado'] == 'AM') { echo 'selected';}?> value="AM">Amazonas</option>
                            <option <?php if($usuario['estado'] == 'BA') { echo 'selected';}?> value="BA">Bahia</option>
                            <option <?php if($usuario['estado'] == 'CE') { echo 'selected';}?> value="CE">Ceará</option>
                            <option <?php if($usuario['estado'] == 'DF') { echo 'selected';}?> value="DF">Distrito Federal</option>
                            <option <?php if($usuario['estado'] == 'ES') { echo 'selected';}?> value="ES">Espírito Santo</option>
                            <option <?php if($usuario['estado'] == 'GO') { echo 'selected';}?> value="GO">Goiás</option>
                            <option <?php if($usuario['estado'] == 'MA') { echo 'selected';}?> value="MA">Maranhão</option>
                            <option <?php if($usuario['estado'] == 'MT') { echo 'selected';}?> value="MT">Mato Grosso</option>
                            <option <?php if($usuario['estado'] == 'MS') { echo 'selected';}?> value="MS">Mato Grosso do Sul</option>
                            <option <?php if($usuario['estado'] == 'MG') { echo 'selected';}?> value="MG">Minas Gerais</option>
                            <option <?php if($usuario['estado'] == 'PA') { echo 'selected';}?> value="PA">Pará</option>
                            <option <?php if($usuario['estado'] == 'PB') { echo 'selected';}?> value="PB">Paraíba</option>
                            <option <?php if($usuario['estado'] == 'PR') { echo 'selected';}?> value="PR">Paraná</option>
                            <option <?php if($usuario['estado'] == 'PE') { echo 'selected';}?> value="PE">Pernambuco</option>
                            <option <?php if($usuario['estado'] == 'PI') { echo 'selected';}?> value="PI">Piauí</option>
                            <option <?php if($usuario['estado'] == 'RJ') { echo 'selected';}?> value="RJ">Rio de Janeiro</option>
                            <option <?php if($usuario['estado'] == 'RN') { echo 'selected';}?> value="RN">Rio Grande do Norte</option>
                            <option <?php if($usuario['estado'] == 'RS') { echo 'selected';}?> value="RS">Rio Grande do Sul</option>
                            <option <?php if($usuario['estado'] == 'RO') { echo 'selected';}?> value="RO">Rondônia</option>
                            <option <?php if($usuario['estado'] == 'RR') { echo 'selected';}?> value="RR">Roraima</option>
                            <option <?php if($usuario['estado'] == 'SC') { echo 'selected';}?> value="SC">Santa Catarina</option>
                            <option <?php if($usuario['estado'] == 'SP') { echo 'selected';}?> value="SP">São Paulo</option>
                            <option <?php if($usuario['estado'] == 'SE') { echo 'selected';}?> value="SE">Sergipe</option>
                            <option <?php if($usuario['estado'] == 'TO') { echo 'selected';}?> value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
            </form>
            <div style="height:10px"></div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <p class="small text-muted text-left">* Não pode ser alterados diretamente.<br>** Para alterar, entre em <a href='<?=BASEURL?>contact.php' class='text-reset'>contato</a>.</p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <p class="text-right">
                        <a href="<?=BASEURL?>usuario/" class="btn btn-warning">Voltar</a>
                        <a href="javascript:edp()" class="btn btn-primary">Editar</a>
                        <a href="./" class="btn btn-danger" id="btn-cedp" style="display:none">Cancelar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // include(FOOTER_USUARIO_TEMPLATE); ?>