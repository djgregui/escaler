<?php
    require '../config.php';
    require DBAPI;

    // path of the log file where errors need to be logged
    // $log_file = "./log.log";
    // ini_set("log_errors", TRUE); 
    // ini_set('error_log', $log_file);
    // error_reporting(E_ALL);
    // function registerlog() {
    //     error_log(error_get_last());
    // }
    // register_shutdown_function('registerlog');
    $REQUEST = json_encode($_REQUEST);
    $db = open_database();
    
    // Cria verificação
    // $req = json_decode(file_get_contents('log.log'),true);
    // Parse the query params
    // $mode = $req['hub_mode'];
    // $token = $req['hub_verify_token'];
    // $challenge = $req['hub_challenge'];
    // // Checks if a token and mode is in the query string of the request
    // if (is_string($mode) && $token) {
    //     // Checks the mode and token sent is correct
    //     if ($mode == 'subscribe' && $token == VERIFY_TOKEN) {
    //         // Responds with the challenge token from the request
    //         // console.log('WEBHOOK_VERIFIED');
    //         http_response_code(200); echo($challenge);
    //     } else {
    //         // Responds with '403 Forbidden' if verify tokens do not match
    //         http_response_code(403);      
    //     }
    // }


    // file_put_contents('log.log',file_get_contents('log.log').file_get_contents('php://input').PHP_EOL);
    
    $req = json_decode($REQUEST,true);   
    $req['body'] = json_decode(file_get_contents('php://input'),true);
    // error_log(json_encode($req['body']));
    // error_log(json_encode($req));
    // $timestamp = (date_create_from_format('U' ,($req['body']['entry'][0]['time'])) )->format("Y-m-d H:i:s");
    $timestamp = date('Y-m-d H:i:s');
    $msg = $content = $req['body']['entry'][0]['messaging'][0]['message']['text'];
    $raw = json_encode($req['body']);
    $sender = $req['body']['entry'][0]['messaging'][0]['sender']['id'];
    $page = $req['body']['entry'][0]['messaging'][0]['recipient']['id'];
    $context = "START";
    $query = ($db->query("SELECT * FROM fb_webhook WHERE sender = '$sender'  ORDER BY id DESC LIMIT 1"));
    if($query->num_rows > 0) {
        $context = $query->fetch_assoc()['context'];
    }
    // handleMessageText($sender,"Sua mensagem: $context . $content");
    switch($context) {
        case "END":
            switch($content) {
                case "Rastreamento":
                    $context = "RASTREAMENTO_1";
                    $sent = "Rastreamento, ok. Me informa o seu email vinculado ao pedido.";
                break;
                case "Cancelamento":
                case "Ajuda Humana":
                    $protocolo = (date("Y") . date('m') . mt_rand(10000001,19082100));
                    $context = "HUMAN_SUPPORT";
                    $sent = "Foi gerado um protocolo deste atendimento: " . $protocolo;
                    $db->query("INSERT INTO protocolos VALUES (NULL,NULL,'$protocolo','$sender')");
                    handleMessageText($sender,$sent);
                    $sent = "Ok. Agora me informa o seu email para continuarmos.";
                break;
                case "Sair":
                default:
                    $context = "START";
                    $sent = "Muito obrigado pela preferência, Escaler agradece. Até mais.";
                break;
            }
        break;
        case "MID_END":
            $context = "END";
            $sent = "Há algo mais que possa ajudar? Digite 'Rastreamento', 'Cancelamento', 'Ajuda Humana' ou 'Sair'.";
        break;
        case "HUMAN_SUPPORT":
            $context = "MID_END";
            $email = filter_var($content,FILTER_SANITIZE_EMAIL);
            $db->query("UPDATE protocolos SET email = '$email' WHERE senderid = '$sender'");
            $sent = "Um agente de suporte foi notificado e dará continuidade ao seu atendimento por email.";
        break;
        case "RASTREAMENTO_1":
            $msg = filter_var($msg,FILTER_SANITIZE_EMAIL);
            
            $sent = 'Estou consultando seu email: '. $msg . ". ";
            handleMessageText($sender,$sent);
            $usuario = (open_database())->query("SELECT * FROM usuario WHERE usuario.email = '$msg' ");
            if($usuario->num_rows == 0) {
                $sent = "Não encontramos nenhum registro. Digite outro email.";
            } else {
                $pedidos = (open_database())->query("SELECT * FROM pedidos LEFT JOIN usuario ON pedidos.idusuario=usuario.id WHERE usuario.email = '$msg' AND pedidos.status = '1' OR usuario.email = '$msg' AND pedidos.status = '2' ");
                if($pedidos->num_rows > 2) {
                    // $context = "RASTREAMENTO_2";
                    $sent = "Você possui vários pedidos em andamento, poderia me informar o código do Pedido, encontrado na sua conta no site.";
                    handleMessageText($sender,$sent);
                    
                } else {
                    $context = "MID_END";
                    $sent = "Encontrei seu pedido, um momento. ";
                    if($pedidos->fetch_assoc()['status'] == '2') {
                        $sent .= "Ele já está com a transportadora";
                    } else {
                        $sent .= "Ele está sendo enviado para a transportadora, logo você receberá os dados de rastreio por email.";
                    }
                }
            }
        break;
        case "START_2":
            switch($content) {
                case "Rastreamento":
                    $context = "RASTREAMENTO_1";
                    $sent = "Rastreamento, ok. Me informa o seu email vinculado ao pedido.";
                break;
                case "Cancelamento":
                case "Ajuda Humana":
                    $protocolo = (date("Y") . date('m') . mt_rand(10000001,19082100));
                    $context = "HUMAN_SUPPORT";
                    $sent = "Foi gerado um protocolo deste atendimento: " . $protocolo;
                    (open_database())->query("INSERT INTO protocolos VALUES (NULL,NULL,'$protocolo','$sender')");
                    handleMessageText($sender,$sent);
                    $sent = "Ok. Agora me informa o seu email para continuarmos.";
                break;
                default:
                    $sent = "Não entendi. Digite 'Rastreamento', 'Cancelamento' ou 'Ajuda Humana'.";
                break;
            }
        break;
        case "START":         
        default:
            $context = "START_2";
            $sent = "Olá, bem vindo à Escaler! Como podemos ajudar? Digite 'Rastreamento', 'Cancelamento' ou 'Ajuda Humana'.";
        break;

    }
    // Grava novo evento
    $SQL = "INSERT INTO fb_webhook VALUES (NULL,'$timestamp','$content','$raw','$context','$sender','$page')";
    $db->query($SQL);
    // Enviar a resposta correta
    handleMessageText($sender,$sent);
    
    // Arruma dados da resposta para envio
    function handleMessageText($sender_psid,$text) {
        $response = 
        [
            "text" => $text       
        ];
        callSendAPI($sender_psid, $response);
    }
    
    // Envia as respostas via SendAPI
    function callSendAPI($sender_psid, $msg_text) {
        $request_body = [
            "recipient" => 
            [
                "id"  => $sender_psid
            ],
            "message" => $msg_text
        ];
        $request_body = json_encode($request_body);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v2.6/me/messages?access_token=EAAEpuZBlzV7ABACGFC1fptEyTVNcqqUfqXT7L1rJvw11djir00ZAzZB2t939qttb0iJby5luM3HIbQW3hgRZAVDCz7IWzEQ3ZAJ8634lMKZCB0vedvxwP2vKQT6zxQ3tu9ZBw0LrNBWh2LbdqS0nvAFKLDPtPVMWJ59CjS299EjLu0G6KFT6BuH',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $request_body,
        CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        // error_log(json_encode($response));
    }

    http_response_code(200);