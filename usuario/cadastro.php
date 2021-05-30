<?php
 ini_set('display_errors',1); 
 require_once '../config.php';
 require_once DBAPI; 
 require_once 'functions.php';
 add();
?>
<html lang="pt-BR">
    <head>
        <title>Cadastro - Escaler</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/crm/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/css/util.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <style>.absolute-bottom, .absolute-bottom a.text-reset {color: white !important;}.wrap-input100{margin-bottom:5px !important;}::-webkit-input-placeholder {text-align: center;}:-moz-placeholder {text-align: center;}</style>
    </head>
    <body>
        <div class="fixed-top d-none">
            <div class="py-1 text-center text-light text-uppercase pt-2" style="background: rgb(157, 2, 1)">ESCALER - Compromisso e Segurança</div>
        </div>
        <div class="limiter">
            <div class="container-login100" style="background: rgb(157, 2, 1);">
                <div class="wrap-login100" style="box-shadow: 6px 6px 12px 0px rgba(0,0,0,0.58);padding-top:34px;">
                    <form class="login100-form validate-form" action="#" method="post" autocomplete="on">
                        <span class="login100-form-title p-b-5">
                            <img class="mb-2" src="<?=BASEURL?>img/logo2.png" alt="LOGO" style="width:50%">
                        </span>
                        <span class="login100-form-title p-b-13" style='color:rgb(157,2,1)'>Cadastro</span>
                        <?php if(isset($_GET['e'])) { ?>
                            <div class="alert alert-danger text-center mx-0 px-2 py-1" style='font-size:smaller'><?php if($_GET['e']=='425') { echo 'Este email não foi confirmado ainda, verifique sua caixa de entrada'; } elseif($_GET['e']=='400') { echo 'Este email já está em uso'; } ?></div>
                        <?php } ?>
                        <div class="wrap-input100 validate-input" data-validate="Email válido: nome@email.com">
                            <input class="input100 has-val" type="text" name="customer[nome]" placeholder="Nome" autocomplete="given-name">
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Email válido: nome@email.com">
                            <input class="input100 has-val" type="text" name="customer[sobrenome]" placeholder="Sobrenome" autocomplete="family-name">
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Email válido: nome@email.com">
                            <input class="input100 has-val" type="email" name="customer[email]" placeholder="Email" autocomplete="email">
                        </div>
                        <div class="wrap-input100 mb-3 validate-input" data-validate="Insira a senha">
                            <input class="input100 has-val" type="password" name="customer[senha]" placeholder="Senha" autocomplete="password">
                        </div>
                        <div class="container-login100-form-btn d-none">
                            <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                                <input type="submit" class="login100-form-btn" style="background: #ff4a01;">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="login100-form-btn" style="background: rgb(157, 2, 1);border-radius:25px">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="dropDownSelect1"></div>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/animsition/js/animsition.min.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/bootstrap/js/popper.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/select2/select2.min.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/daterangepicker/moment.min.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/vendor/countdowntime/countdowntime.js" type="text/javascript"></script>
        <script src="https://colorlib.com/etc/lf/Login_v2/js/main.js" type="text/javascript"></script>
    </body>
</html>
