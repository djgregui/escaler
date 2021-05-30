<?php
    require 'config.php';
    require COMPOSER;
	$mp = new MercadoPago\SDK;
    $mp::setAccessToken(MP_API_TOKEN);
    $paymentId = 15005204329;
	$payment = $mp->get(
		"/v1/payments/". $paymentId
	);
    echo json_encode($payment['body']['transaction_details']);
?>