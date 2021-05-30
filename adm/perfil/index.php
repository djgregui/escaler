<?php
    require_once '../../config.php'; 
    require_once DBAPI; 
    include(HEADER_ADMIN_TEMPLATE); 
    
    function view($id) {
        $db = open_database();
        $query = $db->query("SELECT * FROM administrators WHERE id='$id'");
        return $usuario = $query->fetch_assoc();
    }
    $usuario = view($_SESSION['id_admuser']);
?>
<script>
    function enableEditAdmProfile() {
        if(document.querySelector("#state").value == '0') {
            $(".input-edit").removeAttr("disabled");
            $("#btn-submit").html("Salvar");
            $("#btn-cancel").toggleClass("btn-warning").toggleClass("btn-danger").html("Cancelar").attr("href","/adm/perfil");
            $("#badge2").hide();
            $("#state").val("1");
        } else {
            document.querySelector("form#form").submit();
        }
    }
</script>
<h2 class="text-center">Meus Dados</h2>
<hr />
<form action="../processa.php?tipo=perfil" method="post" id="form">
    <input type="hidden" id="state" value="0">
    <input type="hidden" name="id" value="<?=$usuario['id']?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12 mt-2">
                <h6>Nome</h6>
                <input name="nome" type="text" class="form-control input-edit" disabled="disabled" value="<?=$usuario['nome']?>">
            </div>
            <div class="col-md-6 col-lg-6 col-12 mt-2">
                <h6>Sobrenome</h6>
                <input name="sobrenome" type="text" class="form-control input-edit" disabled="disabled" value="<?=$usuario['sobrenome']?>">
            </div>
            <div class="col-md-8 col-lg-8 col-12 mt-2">
                <h6><b>Email *</b></h6>
                <input name="email" type="text" class="form-control input-edit" disabled="disabled" value="<?=$usuario['email']?>" >
            </div>
            <div class="col-md-4 col-lg-4 col-12 mt-2">
                <h6><b>Senha* <a href="javascript:enableEditPasswordProfile()" id="badge2" class="badge badge-danger"><i class="fas fa-pen"></i></a></b></h6>
                <input type="text" class="form-control" disabled="disabled" value="●●●●●●">
            </div>
            <div class="col-12 pt-4 text-right">
                <a href="<?=BASEURL?>adm/"   id="btn-cancel" class="btn btn-warning">Voltar</a>
                <a href="javascript:void(0)" id="btn-submit" onclick="enableEditAdmProfile()" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
</form>
 
<?php require FOOTER_ADMIN_TEMPLATE; ?>