<?php require_once '../config.php'; ?>
<html lang="en"><head>
        <title>Login - Escaler</title>
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
        <style>.absolute-bottom, .absolute-bottom a.text-reset {color: white !important;}</style>
    </head>
    <body>
    <div class="fixed-top d-md-block d-lg-block d-none">
        <div class="py-1 text-center text-light text-uppercase pt-2" style="">ESCALER - Compromisso e Segurança</div>
    </div>
        <div class="limiter">
            <div class="container-login100" style="background: rgb(157, 2, 1);">
                <div class="wrap-login100" style="box-shadow: 6px 6px 12px 0px rgba(0,0,0,0.58);padding-top:34px">
                    <form class="login100-form validate-form" action="login.php" method="post">
                        <span class="login100-form-title p-b-5">
                            <img class="mb-4" src="<?=BASEURL?>img/logo2.png" alt="LOGO" style="width:60%">
                        </span>
                        <?php if(isset($_GET['e'])) { ?>
                        <div class="alert alert-danger text-center mx-0 px-2 py-1" style='font-size:smaller'><?php if($_GET['e'] == '425') { echo 'Este email ainda não foi confirmado.<br><a href="processa.php?tipo=reac&email='.filter_var($_GET['email'],FILTER_SANITIZE_EMAIL).'" class="alert-link">Reenviar Email de Confirmação</a>'; } elseif($_GET['e'] == '401') { echo 'Usuário/senha incorreta'; } elseif($_GET['e'] == '424') { echo 'Seu cadastro foi criado, um email de confirmação foi enviado para seu email.'; } elseif($_GET['e'] == '203') { echo 'Sua conta foi verificada. :)'; } else { echo 'Houve um erro temporário. Tente novamente mais tarde'; } ?></div>
                        <?php } ?>
                        <span class="login100-form-title p-b-13">Bem-Vindo</span>
                        <div class="wrap-input100 mb-2 validate-input" data-validate="Email válido: nome@email.com">
                            <input class="input100 has-val" type="email" name="usuario" placeholder="email@email.com">
                        </div>
                        <div class="wrap-input100 mb-2 validate-input" data-validate="Insira a senha">
                            <input class="input100 has-val" type="password" name="senha" placeholder="Senha">
                        </div>
                        <div class="container-login100-form-btn d-none">
                            <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                                <input type="submit" class="login100-form-btn" style="background: #ff4a01;">
                            </div>
                        </div>
                        <br>
                        <?php if(isset($_GET['shop'])){?>
                            <input type='hidden' name='shop' value='<?=$_GET["shop"]?>'>
                        <?php }?> 
                        <button type="submit" class="login100-form-btn" style="background: rgb(157, 2, 1);border-radius:25px">Entrar</button>
                        <div style="height:10px">&nbsp;</div>
                        <div class="text-center">
                            Ainda não é usuário? <a href="cadastro.php" class="text-dark" style='text-decoration:underline'>Se cadastre</a>
                        </div>
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
<!-- Formulário de Login -->
<!-- <div class="text-center bg-escaler" style='margin:0 auto;width:50%;max-width:400px;border-radius:20px;padding:15px 10px;'>
    <img src="" style="width:80%;margin:0 auto;max-width:200px">
    <h2 class='mt-2' style="color:white">Entrar</h2>
    <div>
        <form action="<?=BASEURL?>usuario/login.php" method="POST">
            <?php if(isset($_GET['e'])){ ?>
            <div class="alert alert-danger"><?php if($_GET['e'] == '401') { echo 'Usuário/Senha Incorreta'; } ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-1">&nbsp;</div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-2 text-light font-weight-bold" style="height:40px;line-height:40px">Email:</div>
                        <div class="col-10" style="">
                            
                        </div>
                    </div>
                    <div style="heihgt:10px">&nbsp;</div>
                    <div class="row">
                        <div class="col-2 text-light font-weight-bold" style='height:40px;line-height:40px'>Senha:</div>
                        <div class="col-10" style=''>
                            <input type="password" class='form-control' style="border-radius:6px; background-color:white; height:40px; line-height:40px; padding-left:10px" id="inputPassword"  placeholder="******" required="" name="senha">
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="text-center pt-2">
                <button class="btn font-weight-bold text-uppercase btn-default text-light" type="submit">Entrar</button>
                <div style="height:5px">&nbsp;</div>
                <p class="text-light">Ainda não é usuário? Se <a href="<?=BASEURL?>cadastro/add.php" class="text-uppercase text-reset text-decoration-none">Cadastre</a></p>
            </div>
        </form>
    </div>
</div> -->
<?php include(FOOTER_USUARIO_TEMPLATE); ?>