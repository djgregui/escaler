<?php
function open_database() {
    $db = new mysqli('35.222.232.57','nano','mellany0801gui','hotspottest');
    $db->set_charset('utf8');
    return $db;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InterFI - Dashboard</title>
	<link href="https://admin.interfi.net/crm/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://admin.interfi.net/crm/css/datepicker3.css" rel="stylesheet">
	<!-- <link  href="https://admin.interfi.net/crm/bootstrap/css/bootstrap.css?random=1622571080" rel="stylesheet"> -->
    <link rel="shortcut icon" href="https://admin.interfi.net/favicon.ico" />
	<link  href="https://admin.interfi.net/crm/css/style.css?random=1622571080" rel="stylesheet">
	<link href="https://admin.interfi.net/crm/css/styles.css?random=1622571080" rel="stylesheet">
	<link href="https://admin.interfi.net/crm/css/style2.css?random=1622571080" rel="stylesheet">
	<script src="https://admin.interfi.net/crm/js/jquery-3.4.1.min.js"></script>
	<script src="https://admin.interfi.net/crm/js/bootstrap.min.js"></script>
	<script src="https://admin.interfi.net/crm/js/jquery.scrollTo.min.js"></script>
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<style>@media screen and (max-width: 766px) {#sidebar-collapse {padding-top: 60px;}nav.navbar {display:block;}}</style>
	<script>$(window).on('resize', function () {if(window.outerWidth > 766) {$("#sidebar-collapse").show();} else {$("#sidebar-collapse").setAttribute("css","display:none;height:unset !important;")}});</script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top hidden-sm hidden-md hidden-lg" role="navigation" style=''>
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="" onclick="$('#sidebar-collapse').toggle();$('#sidebar-collapse')[0].scrollIntoView();" data-target=""><span class="sr-only">Toggle navigation</span><!--  -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" style="text-transform: none !important;"href="#"><img src="https://admin.interfi.net/crm/img/new_white.png" style="max-width:115px;margin-top:-8px"></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<div class="container_image">
					<!-- <img src="img_avatar.png" alt="Avatar" class=""> -->
					<img src="https://admin.interfi.net/acesso/upload/440c1a5fd3c833cfaee5689173ef165fjpg" class=" image" alt=""> <!-- img-responsive -->
					<div class="overlay" onclick='void(0)'>
						<div class="text"> </div>
					</div>
				</div>
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Guilherme Gregório</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><i class="fas fa-crown text-warning" title="Administrador"></i>&nbsp;Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="divider"></div> -->
		<ul class="nav menu" style="margin: 0px !important">
			<!-- Início -->
			<li><a href="javascript:void(0)"><em class="fa fa-home">&nbsp;</em> Home </a></li>
            <li><a onclick="$('.submenu-semfio').toggle();$('.under-ubiquiti, .under-mikrotik, .under-usering').hide()" href="#"><em class="fa fa-wifi">&nbsp;</em> Sem-Fio </a></li>
			<li class="submenu-semfio" style="display: none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/equipamentos.php" style="color:black !important;font-weight:bold"><i class="fa fa-eye"></i>&nbsp;Equipamentos</a>
			</li>
			<li class="submenu-semfio" style="display:none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/relatorios.php" style="color:black !important;font-weight:bold;"><i class="fas fa-list-ul"></i>&nbsp;Relatórios</a>
			</li>
			<li class="submenu-semfio" style="display:none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/captive.php" style="color:black !important;font-weight:bold;"><i class="fas fa-satellite-dish"></i>&nbsp;Portal Usuário</a>
			</li>
			<li class="submenu-semfio" style="display:none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/usuarios.php" style="color:black !important;font-weight:bold;"><i class="fas fa-user"></i>&nbsp;Usuários</a>
			</li>
            <li><a onclick="$('.submenu-gps').toggle()" href="#"><em class="fa fa-satellite-dish">&nbsp;</em> GPS </a></li>
			<li class="submenu-gps" style="display:none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/gps/index.php" style="color: black !important;font-weight:bold">Equipamentos</a>
			</li>
            <li><a onclick="$('.submenu-multimidia').toggle()" href="#"><em class="fa fa-film">&nbsp;</em>&nbsp;Multimídia</a></li>
			<li class="submenu-multimidia" style="display: none; background-color: #ff4a01;">
				<a href="javascript:void(0)" data-oldlink="/crm/multimidia/index.php" style="color: black !important;font-weight:bold">Equipamentos</a>
			</li>
			<li class="submenu-multimidia" style="display: none; background-color: #ff4a01;">
				<a href="javascript:void(0)" data-oldlink="/crm/multimidia/atualizacoes.php" style="color: black !important;font-weight:bold">Atualizações</a>
			</li>
			<li class="submenu-multimidia" style="display: none; background-color: #ff4a01;">
				<a href="javascript:void(0)" data-oldlink="/crm/multimidia/filmes.php" style="color: black !important;font-weight:bold">Filmes</a>
			</li>
            <li><a onclick="$('.submenu-gestao').toggle();$('.under-transporte, .under-hotel').hide()" href="#"><em class="far fa-chart-bar">&nbsp;</em>&nbsp;Gestão ERP</a></li>
			<li class="submenu-gestao" style="display: none; background: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crm/parceiros/transporte.php" style="color:black !important"><em class="fa fa-bus">&nbsp;</em>&nbsp;Transporte</a> <!--  onclick="$('.under-transporte').toggle()" -->
			</li>
            <li><a onclick="$('.submenu-vpn').toggle()" href="#"><em class="fa fa-server">&nbsp;</em>&nbsp;VPN</a></li>
			<li class="submenu-vpn" style="display: none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/vpn/index.php" style="color: black !important;font-weight:bold">Usuários Ativos</a>
			</li>
			<li class="submenu-vpn" style="display: none; background-color: #ff4a01">
				<a href="javascript:void(0)" data-oldlink="/crm/vpn/acesso.php" style="color: black !important;font-weight:bold">Dados de Acesso</a>
			</li>
						<li><a onclick="$('.submenu-proxy').toggle()" href="#"><em class="fa fa-unlock-alt">&nbsp;</em>&nbsp;Controle de Sites</a></li>
			<li class="submenu-proxy" style="display: none; background-color: #ff4a01;">
				<a href="javascript:void(0)" data-oldlink="/crm/proxy/sites.php" style="color: black !important;font-weight:bold">Sites Acessados</a>
			</li>
			<li class="submenu-proxy" style="display: none; background-color: #ff4a01;">
				<a href="javascript:void(0)" data-oldlink="/crm/proxy/bloqueados.php" style="color: black !important;font-weight:bold">Sites Bloqueados</a>
			</li>
						<li><a onclick="$('.submenu-parceiros').toggle()" href="#"><em class="fas fa-handshake"></em>&nbsp;Parceiros</a></li>
						<li class="submenu-parceiros" style="display: none; background: #ff4a01;font-weight:bold">
				<a href="https://admin.ijavascript:void(0)" data-oldlink="/crm/parceiros/vivo.php" style="color:black !important;"><img src="https://admin.interfi.net/crm/img/vivo.png" style="width: 16px;height:16px">&nbsp;Vivo</a>
			</li>
			<li class="submenu-parceiros" style="display: none; background: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/sms.php" style="color:black !important;"><img src="https://admin.interfi.net/crm/img/vivo.png" style="width: 16px;height:16px">&nbsp;SMS</a>
			</li>
						<li class="submenu-parceiros" style="display: none; background: #ff4a01;font-weight:bold">
				<a href="https://admin.ijavascript:void(0)" data-oldlink="/crm/parceiros/escaler.php" style="color:black !important;"><img src="https://admin.interfi.net/crm/img/Escaler3.png" style="width: 16px;height:16px">&nbsp;Escaler</a>
			</li>
						<li><a onclick="$('.submenu-acessos').toggle()" href="#"><em class="fa fa-users">&nbsp;</em>&nbsp;Acessos </a></li>
			<li class="submenu-acessos" style="display: none; background-color: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crm/usuario/enviaracesso.php" style="color: black !important;" class="text-primary">Enviar login</a>
			</li>
			<li class="submenu-acessos" style='display: none; background-color: #ff4a01;font-weight:bold'>
				<a href="javascript:void(0)" data-oldlink="/crm/usuario/visitantes.php" style="color: black !important;" class="text-primary">Visitantes</a>
			</li>
						<li><a onclick="$('.submenu-gerencia').toggle()" href="javascript:void(0)"><em class="fa fa-user-cog">&nbsp;</em>&nbsp;Gerenciar</a></li>
			<li class="submenu-gerencia" style="display: none; background-color: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/solicitacoes.php" style="color: black !important;">Solicitações</a>
			</li>
			<li class="submenu-gerencia" style='display:none; background-color: #ff4a01;font-weight:bold'>
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/estoque.php" style="color: black !important;" class="text-primary">Estoque</a>
			</li>
			<li class="submenu-gerencia" style='display:none; background-color: #ff4a01;font-weight:bold'>
				<a href="javascript:void(0)" data-oldlink="/crm/aparelhos/equip-montados.php" style="color: black !important;" class="text-primary">Equip. Montados</a>
			</li>
			<li class="submenu-gerencia" style="display:none;background:#ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/planoacao.php" style="color:black !important" class="text-primary">Plano de Ação</a>
			</li>
			<li class="submenu-gerencia" style="display:none;background:#ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/externos.php" style="color:black !important">Acessos Externos</a>
			</li>
			<li class="submenu-gerencia" style="display:none;background:#ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/instalacoes.php" style="color:black !important">Instalações</a>
			</li>
						<li><a onclick="$('.submenu-geral').toggle()" href="#"><em class="fa fa-cog">&nbsp;</em> Geral </a></li>
			<li class="submenu-geral" style="display: none; background-color: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crm/funcionario" style="color: black !important;">Administradores</a>
			</li>
			<li class="submenu-geral" style="display: none; background-color: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crm/contratos" style="color: black !important;">Contratos</a>
			</li>
			<li class="submenu-geral" style="display:none;background:#ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crmhttps://admin.interfi.net/crm/suporte.php" style="color:black !important">Suporte</a>
			</li>
			<li class="submenu-geral" style="display: none; background: #ff4a01;font-weight:bold">
				<a href="javascript:void(0)" data-oldlink="/crm/logout.php" style="color:black !important"><em class="fa fa-power-off">&nbsp;</em>&nbsp;Sair</a>
			</li>
			
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="padding-bottom: 40px; padding-top:5vh; background: transparent">
        <div style="width:95%;margin-left:2.5%;margin-top:4vh;border-radius:15px;background:black;color:#ff4a01;padding:15px 10px;">
            <?php
            $backurl = "test.php";
            $type = filter_var($_GET['type'],FILTER_SANITIZE_STRING); $id_contrato = (int) $_GET['id'];
            $base = ((open_database())->query("SELECT * FROM settings WHERE param = '$type' AND id_contrato = '$id_contrato'"));
            if(!$base) { $base = ((open_database())->query("SELECT * FROM settings WHERE param = '$type'"))->fetch_assoc(); } else { $base = $base->fetch_assoc(); }
            $title = $base['note']; ?>
            <h4 class="padded-title">Sem-Fio > Captive > Editar <?=$title?></h4>

            <?php
            switch($type) {
                case "ad_img":
                // Implementar botão de upload
            ?>
            <div class="row px-4">
                <form action="processa.php" method="get">
                    <input type="hidden" name="id_contrato" value="<?=$base['id_contrato']?>">
                    <input type="hidden" name="param" value="ad_img">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="old">Valor Atual</label><input type="text" class="form-control" value="<?=$base['value']?>" disabled></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="new">Valor Novo</label><input type="text" class="form-control" name="value"></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <!-- <div style="height:24px">&nbsp;</div> -->
                        <input type="submit" class="btn btn-block btn-interfi" value="Salvar">
                        <a href="<?=$backurl?>" class="btn btn-block btn-interfi">Cancelar</a>
                    </div>
                </form>
            </div>
            <?php
                break;
                case "ad_url":
                // Implementar adição de link ao unifi hotspot pre-authorization unrestricted list
            ?>
            <div class="row px-4">
                <form action="processa.php" method="get">
                    <input type="hidden" name="id_contrato" value="<?=$base['id_contrato']?>">
                    <input type="hidden" name="param" value="ad_url">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="old">Valor Atual</label><input type="text" class="form-control" value="<?=$base['value']?>" disabled></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="new">Valor Novo</label><input type="text" class="form-control" name="value"></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <!-- <div style="height:24px">&nbsp;</div> -->
                        <input type="submit" class="btn btn-block btn-interfi" value="Salvar">
                        <a href="<?=$backurl?>" class="btn btn-block btn-interfi">Cancelar</a>
                    </div>
                </form>
            </div>
            <?php
                break;
                case "captive_img":
                    ?>
                    <div class="row px-4">
                        <form action="processa.php" method="get">
                            <input type="hidden" name="id_contrato" value="<?=$base['id_contrato']?>">
                            <input type="hidden" name="param" value="captive_img">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group"><label style="color:white" for="old">Valor Atual</label><input type="text" class="form-control" value="<?=$base['value']?>" disabled></div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group"><label style="color:white" for="new">Valor Novo</label><input type="text" class="form-control" name="value"></div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <!-- <div style="height:24px">&nbsp;</div> -->
                                <input type="submit" class="btn btn-block btn-interfi" value="Salvar">
                                <a href="<?=$backurl?>" class="btn btn-block btn-interfi">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <?php
                break;
                case "captive_name":
                break;
                case "site_unifi":
                break;
                case "uplink_limit":
                break;
                case "downlink_limit":
                break;
                case "datalink_limit":
                break;
                case "captive_link":
            ?>
            <div class="row px-4">
                <form action="processa.php" method="get">
                    <input type="hidden" name="id_contrato" value="<?=$base['id_contrato']?>">
                    <input type="hidden" name="param" value="captive_link">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="old">Valor Atual</label><input type="text" class="form-control" value="<?=$base['value']?>" disabled></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group"><label style="color:white" for="new">Valor Novo</label><input type="text" class="form-control" name="value"></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <!-- <div style="height:24px">&nbsp;</div> -->
                        <input type="submit" class="btn btn-block btn-interfi" value="Salvar">
                        <a href="<?=$backurl?>" class="btn btn-block btn-interfi">Cancelar</a>
                    </div>
                </form>
            </div>
            <?php
                break;
                case "ad_option":
                break;
                case "ad_video":
                break;
                case "ssid_modifier":
                break;
                case "popup_img":
                break;
                case "popup_titulo":
                break;
                case "popup_whats":
                break;
                case "popup_email":
                break;
                case "popup_place":
                break;
                case "popup_insta":
                break;
                case "popup_face":
                break;
            }
            ?>
        </div>
    </div>




    <div class="fixed-bottom row">
    <div class="col-sm-3 "></div>
    <div class="col-sm-9 ">
        <div style="position:fixed;bottom:0;left:0;right:0">
            <div class="row">
                <div class="col-sm-3 col-lg-2"></div>
                <div class="col-sm-9 col-lg-10">
                    <p class="back-link" style="color:black"><img src="https://admin.interfi.net/crm/img/lgPBInvertido.png" style="max-width:115px;margin-top:-8px"></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div><!--/.row-->
    </div>	<!--/.main-->
    <script src="https://admin.interfi.net/crm/js/jquery-1.11.1.min.js"></script>
    <script src="https://admin.interfi.net/crm/js/bootstrap.min.js"></script>
    <script src="https://admin.interfi.net/crm/js/chart.min.js"></script>
    <script src="https://admin.interfi.net/crm/js/easypiechart.js"></script>
    <script src="https://admin.interfi.net/crm/js/easypiechart-data.js"></script>
    <script src="https://admin.interfi.net/crm/js/bootstrap-datepicker.js"></script>
    <script src="https://admin.interfi.net/crm/js/custom.js"></script>
    </body>
</html>