</main>
<!-- Messenger Plugin de bate-papo Code -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
    xfbml            : true,
    version          : 'v10.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/pt_BR/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<br>
<div class="container text-center">
    <div class="row">
        <div class="col-6">
            <a href="<?=BASEURL?>informativos/termos-de-uso.php" style="text-decoration:none; color:black"><b>Termos de Serviço/Uso</b></a> <br/>
            <a href="<?=BASEURL?>informativos/politica-de-privacidade.php" style="text-decoration:none; color:black"><b>Política de Privacidade</b></a> <br/>
            <a href="<?=BASEURL?>informativos/politica-de-trocdev.php" style="text-decoration:none; color:black"><b>Trocas e Devoluções</b></a> <br/>
            <a href="<?=BASEURL?>informativos/prazos-e-pagamentos.php" style="text-decoration:none; color:black"><b>Prazos de Envio e Entrega</b></a> <br/>
        </div>
        <div class="col-6">
            <a href="https://www.instagram.com/escaler.store/" target="_blank" style="text-decoration:none; color:black"><i class="fab fa-instagram-square fa-3x"></i></b></a>
            <a href="https://www.facebook.com/escalerstore" target="_blank" style="text-decoration:none; color:black"><i class="fab fa-facebook-square fa-3x"></i></b></a>
            <a href="mailto:contato.escaler@gmail.com" target="_blank" style="text-decoration:none; color:black"><i class="fas fa-envelope-square fa-3x"></i> <br />
            <a href="#" style="text-decoration:none; color:black"><i class="fab fa-cc-mastercard fa-2x"></i>
            <a href="#" style="text-decoration:none; color:black"><i class="fab fa-cc-visa fa-2x"></i>
            <a href="#" style="text-decoration:none; color:black"><i class="fab fa-cc-paypal fa-2x"></i>
            <a href="#" style="text-decoration:none; color:black"><i class="fas fa-barcode fa-2x"></i>
            <!-- <a href="#" style="text-decoration:none; color:black"><i class="fab fa-bitcoin fa-2x"></i><br /> -->
        </div>
    </div>
</div>

<!-- Your Plugin de bate-papo code -->
<div class="fb-customerchat"
attribution="biz_inbox"
page_id="103597408587696">
</div>

<div style='height:10px'>&nbsp;</div>
<div class="text-center">2020 - <?=date('Y')?> <a href="/adm"><img src="<?=BASEURL?>img/Logo/favicon.png" alt="" style="width:16px"></a> Escaler</div>
<div style='height:10px'>&nbsp;</div>

<div style="display:none">
    <div class=" text-center absolute-bottom pb-1" style='position:absolute;width:100%;bottom:0' onload="">2020 - <?=date('Y')?> &copy;&nbsp;Escaler&nbsp;<a href="<?=BASEURL?>adm/pagina-login.php"><b style="color: black"><i class="fas fa-lock"></i></b></a> Desenvolvido por <img src='https://admin.interfi.net/acesso/img/syColor.png' style='width:16px;height:16px'>&nbsp;<a href='https://www.interfi.net' class='text-reset text-decoration-none'>InterFi</a></div>
    <script>
    $(function(){
        $('.absolute-bottom').hide().css('top',$('body').innerHeight() + 120 + 'px').show()
    })
    </script>
</div>