<?php
    require_once '../config.php'; 
    require_once DBAPI; 
    require HEADER_ADMIN_TEMPLATE; 
?>
<script src="<?=BASEURL?>vendor/dist/apexcharts.min.js"></script>
<link rel="stylesheet" href="<?=BASEURL?>vendor/dist/apexcharts.css">
<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br>
                <p class="text-center font-weight-bold h2">Painel de Controle</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 py-3">
                <h4 class="text-center text-dark d-none">Vendas por Mês</h4>
                <div id="chart" class="w-100 bg-light p-2"></div>
                <!-- <img src="<?=BASEURL?>img/Terminando-o-primeiro-gráfico-de-combinação-no-Excel.png" alt="Snow" style="width:100%;"> -->
            </div>
            <div class="col-md-6 col-lg-6 col-12 d-none py-3">
                <img src="<?=BASEURL?>img/Terminando-o-primeiro-gráfico-de-combinação-no-Excel.png" alt="Snow" style="width:100%;">
            </div>
            <div class="col-md-4 col-md-4 col-12 d-none py-3">
                <img src="<?=BASEURL?>img/Terminando-o-primeiro-gráfico-de-combinação-no-Excel.png" alt="Snow" style="width:100%;">
            </div>
            <div class="col-md-4 col-md-4 col-12 d-none py-3">
                <img src="<?=BASEURL?>img/Terminando-o-primeiro-gráfico-de-combinação-no-Excel.png" alt="Snow" style="width:100%;">
            </div>
            <div class="col-md-4 col-md-4 col-12 d-none py-3">
                <img src="<?=BASEURL?>img/Terminando-o-primeiro-gráfico-de-combinação-no-Excel.png" alt="Snow" style="width:100%;">
            </div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
        </div>
    </div>
</main>
<?php
    $month = array(); $monthl = array();
    $today = new DateTime();
    $month[0] = $today->format('Y-m'); $monthl[0] = $today->format('m/Y');
    $t1 = $today->sub((new DateInterval('P1M')));
    $month[1] = $t1->format('Y-m'); $monthl[1] = $t1->format('m/Y');
    $t1 = $today->sub((new DateInterval('P1M')));
    $month[2] = $t1->format('Y-m'); $monthl[2] = $t1->format('m/Y');
    $t1 = $today->sub((new DateInterval('P1M')));
    $month[3] = $t1->format('Y-m'); $monthl[3] = $t1->format('m/Y');
    $value = []; $n = 0;
    foreach($month as $m) {
        $value[$n] = 0;
        $pedidos = ((open_database())->query("SELECT * FROM pedidos WHERE datacompra LIKE '$m%'"))->fetch_all(MYSQLI_ASSOC);
        foreach($pedidos as $pedido) {
            $produtos = json_decode($pedido['idproduto'],true);
            foreach($produtos as $produto) {
                $id=$produto; $dproduto = ((open_database())->query("SELECT * FROM produto_versoes WHERE id = '$id'"))->fetch_assoc();
                $value[$n] += $dproduto['valor'];
            }
        }
        $n++;
    }
?>
<script>
    var options = {
    series: [
        {
        name: 'Realizado',
        data: [<?=$value[3]?>, <?=$value[2]?>, <?=$value[1]?>, <?=$value[0]?>]
        }, {
        name: 'Meta',
        data: [15000, 15000, 15000, 15000]
        }
    ],
    chart: {
        type: 'area',
        height: 350,
    },
    stroke: {
        width: [0, 4]
    },
    title: {
        text: 'Vendas por Mês'
    },
    dataLabels: {
        enabled: true,
    },
    labels: ['<?=$monthl[3]?>', '<?=$monthl[2]?>', '<?=$monthl[1]?>', '<?=$monthl[0]?>'],
    xaxis: {
        type: 'text'
    },
    
    };
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<?php include(FOOTER_ADMIN_TEMPLATE); ?>