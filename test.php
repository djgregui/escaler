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

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="padding-bottom: 40px; background: transparent">

    <!-- COPIAR A PARTIR DAQUI -->
    <style>
    .login-special {
        display: block;
        margin: 0 auto 1px auto;
        width: 300px;
        text-align: left;
        text-indent: 1em;
        border-radius: 18px;
        color: #000;
        outline: 0;
        font-family: inherit;
        border: 1px #b5b6ba solid;
    }
    </style>
    <script>
    $(window).on('resize', function(){
        $(".cell").css('height',$(".wrapper").outerHeight())
    });
    $(function(){
        $(".cell").css('height',$(".wrapper").outerHeight())
        $(window).on('resize', function(){
            $(".cell").css('height',$(".wrapper").outerHeight())
        }); 
    })
    </script>
    <?php foreach(((open_database())->query("SELECT * FROM contrato"))->fetch_all(MYSQLI_ASSOC) as $contrato) { ?>
        <div style="width:95%;margin-left:2.5%;padding:15px 10px;background:black;margin-top:4vh;border-radius:15px">
            <div class="row">
            
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 style='padding-bottom:5px;border-bottom: 1px solid #ff4a01;color:#ff4a01;'>Sem-Fio > Captive > <?=$contrato['razao_social']?></h4>
        </div>
        <?php $id_contrato = $contrato['id']; ?>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 style="color:#ff4a01;" class="mb-0">Visual</h4>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="wrapper" style="width:100%;aspect-ratio:9/16;pointer-events:none;background: url(https://i.imgur.com/4IhZ9Qk.jpg); background-size:cover;">
                <?php $settings = []; foreach(((open_database())->query("SELECT * FROM settings WHERE id_contrato = '$id_contrato'"))->fetch_all(MYSQLI_ASSOC) as $setting) { $settings[$setting['param']] = $setting['value']; }?>
                <div class="cell" style="display: table-cell;vertical-align: middle;">
                    <form class="vertical-form" name="login" action="authorized.php" method="post" style="">
                        <div style="margin:0;padding:0;display:inline"></div>
                        <p class="text-center">
                            <img class="logo" src="https://vtc.albertotrevisan.com.br<?=$settings['ad_img']?>" style="max-width: 178px;max-height: 179px;width: 200px;"> 
                            <img class="logo" src="https://vtc.albertotrevisan.com.br<?=$settings['captive_img']?>" style="width:80%;max-width:200px"> 
                            <div style="height:20px">&nbsp;</div>
                            <input class="login-special" required="" name="nome" type="text" value="" placeholder="Nome Completo" size="30" minlength="10"> 
                            <input class="login-special" required="" name="email" type="text" value="" placeholder="Email" size="30"> 
                            <input class="login-special" required="" autocomplete="off" name="idade" type="number" label="false" placeholder="Idade" size="30" max="99" min="10" pattern="/[0-9]{2}/">
                            <div style="height:10px">&nbsp;</div>
                            <label for="tos" style="width:300px;margin: 0 auto;color:white;text-align:center;display:block !important"><input type="checkbox" name="tos" id="">&nbsp;Concordo com os <a href="#" style="color:white">Termos de Serviços</a></label>
                            <div style="height:10px">&nbsp;</div>

                            <input name="submit" type="submit" value="Entrar" style="width:25%; margin-left: 37.5%; background: #ff4a01; color: white; border-radius:15px; font-size: 16px;">
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="table-responsive">
                <table class="table table-borderless" style="border: 2px solid #ff4a01">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="color:black;border-bottom:0" class="text-left">Configuração</th>
                            <th scope="col" style="color:black;border-bottom:0" class="text-left">Valor Atual</th>
                            <th scope="col" style="color:black;border-bottom:0" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='ad_img' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=ad_img" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='ad_url' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=ad_url" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='captive_img' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=captive_img" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='captive_name' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=captive_name" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='site_unifi' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=site_unifi" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='uplink_limit' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=uplink_limit" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='downlink_limit' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=downlink_limit" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='datalink_limit' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=datalink_limit" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='captive_link' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=captive_link" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='ad_option' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=ad_option" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='ad_video' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=ad_video" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param='ssid_modifier' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                            <th><?=$setting['note']?></th>
                            <td><?=$setting['value']?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?=$setting['id_contrato']?>&type=ssid_modifier" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>    
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 style="color:#ff4a01;" class="mb-0">Pop-up</h4>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="wrapper" style="width:100%;aspect-ratio:1;pointer-events:none;background:white;">
                <?php $settings = []; foreach(((open_database())->query("SELECT * FROM settings WHERE id_contrato = '$id_contrato'"))->fetch_all(MYSQLI_ASSOC) as $setting) { $settings[$setting['param']] = $setting['value']; } 
                if(!is_string($settings['popup_img'])) { $settings['popup_img'] = '/crm/img/image-placeholder.png'; } ?>
                <div class="cell2" style=" width:100%">
                    <div class="row" style="">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left:20px">
                            <h5 class="h5 my-4 font-weight-bold"><?=$settings['popup_titulo']?> </h5>
                            <hr class="border-bottom">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <img src="https://vtc.albertotrevisan.com.br<?=$settings['popup_img']?>" style="width: 100%">
                            <div style="height:10px"></div>
                            <div class="text-center w-100">
                                <a href="intent://send?phone=5515997141835#Intent;package=com.whatsapp;scheme=whatsapp;end&amp;phone=5515997141835" class="btn btn-success text-light">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="mailto:nigrogessos@gmail.com" class="btn btn-warning">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <a class="btn btn-dark text-light">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="intent://www.instagram.com/nigrogessos/#Intent;package=com.instagram.android;scheme=https;end" class="btn btn-danger text-light">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="intent://profile/100056472384733#Intent;package=com.facebook.katana;scheme=fb;end" class="btn btn-primary text-light">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                            <div style="height:10px"></div>
                        </div>
                    </div>
                                    
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <table class="table table-borderless" style="border: 2px solid #ff4a01">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="color:black;border-bottom:0" class="text-left">Configuração</th>
                        <th scope="col" style="color:black;border-bottom:0" class="text-left">Valor Atual</th>
                        <th scope="col" style="color:black;border-bottom:0" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_img' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_img" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_titulo' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_titulo" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_whats' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_whats" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_email' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_email" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_place' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_place" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_insta' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_insta" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php $setting = ((open_database())->query("SELECT * FROM settings WHERE param = 'popup_face' AND id_contrato = '$id_contrato'"))->fetch_assoc(); ?>
                        <th><?=$setting['note']?></th>
                        <td><?=$setting['value']?></td></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?=$setting['id_contrato']?>&type=popup_face" class="btn btn-sm btn-interfi"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    <br>
</div>
<?php } ?>
<!-- TERMINAR AQUI -->


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