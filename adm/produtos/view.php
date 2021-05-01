<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_ADMIN_TEMPLATE); ini_set('display_errors',1); ?>



<?php
function view($id) {
    global $produto;
    $db = open_database();
    $query = $db->query("SELECT * FROM produtos WHERE id='$id'");
    $produto = $query->fetch_assoc();
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    global $produto_imagens;
    $produto_imagens = $query2->fetch_all(MYSQLI_ASSOC);
    
}
view($id = (int) $_GET['id']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<script src="https://www.paypal.com/sdk/js?client-id=AbBxOeUIjFIS1-81Aut-rUBpUVGzP_ndgmQOTTWDUPfNK7jJKDE5FyZpUA8OpX-D-esWdlE9pzqJjBAv"></script>
<script>
    paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
</script>
<!-- CORPO DA PÁGINA -->

<div class="py-3">
    <p class="a display h2" style="font-family: 'Arapey'; font-weight: 400;">Produto</p>
    <p class="a">________</p>
    <br>  <!-- Pular Linha -->
</div>

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

        <div class="col-6 py-3">
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
                        <img class="d-block w-100" src="<?=BASEURL?><?=$produto_imagens[0]['url']?>" alt="First slide">
                    </div>
                    <?php for($n=1;$n<count($produto_imagens);$n++) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?=BASEURL?><?=$produto_imagens[$n]['url']?>" alt=" slide">
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

        <div class="col-6 py-3">
            <div class="container-black">
                <h1><?=$produto['nome']?></h1>
                <h3>79,00</h3>
                -------<br>
                Size<br>
                PP P M G GG EG
                </p>
                <br>
                <div class=button-adcarrinho><b>Adicionar Ao Carrinho</b></div>
                <br>
                <br>
                <div class=button-comprarpaypal><b>Comprar com Paypal</b></div>
                <div id="paypal-button-container"></div>
                <div class="a" style="color: black;"><b>Mais opções de pagamento</b></div>
            </div>
        </div>
    </div>
    <div style="color: black">
        <h6>Características</h6><br>
        <p><?=$produto['descricao']?></p>
    </div>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->


<?php include(FOOTER_ADMIN_TEMPLATE); ?>