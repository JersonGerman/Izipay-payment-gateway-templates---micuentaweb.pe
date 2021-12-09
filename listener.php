<?php

if( $_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: index.php');
    exit();
}
/**
 * Instant Payment Notification (IPN) merchant script example
 * 
 * To start the PHP server, go to 
 * https://github.com/lyra/rest-php-example
 *
 */



/**
 * I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';
require_once __DIR__ . '/helpers.php';

require_once 'funciones.php';
/**
 * para simular una llamada IPN con CURL, descomente el siguiente código:
 */
// $_POST = getIPNSimulatedPOSTData();

/* No POST data ? paid page in not called after a payment form */
if (empty($_POST)) {
    throw new Exception("no post data received!");
}

/** 
 * Initialize the SDK 
 * see keys.php
 */
$client = new Lyra\Client();  

/* No hay datos de correos ? la página de pago no se llama después de un formulario de pago * /*/
if (empty($_POST)) {
    throw new Exception('no post data received!');
}


//$ch = curl_init('https://api.micuentaweb.pe');
/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.micuentaweb.pe');
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
$response = curl_exec($ch);
curl_close($ch);*/



/* Check the signature using password */

if (!$client->checkHash()) {
    //something wrong, probably a fraud ....
    signature_error($formAnswer['kr-answer']['transactions'][0]['uuid'], $hashKey, 
                    $client->getLastCalculatedHash(), $_POST['kr-hash']);
    throw new Exception('invalid signature');
}

/* Recuperar el contenido de IPN */
$rawAnswer = $client->getParsedFormAnswer();
// $formAnswer = $rawAnswer['kr-answer'];
file_put_contents ("link.txt",$rawAnswer);

/*Verifico si realmente está pagado*/
if ($rawAnswer['kr-answer']['orderStatus'] != 'PAID') {
    $title = "Transacciónn no pagada !";
} else {
   $title = "Transacción pagada !";
   $formAnswer = $rawAnswer['kr-answer'];
   $transaction = $formAnswer['transactions'][0];

   $registro = array(
       "orderStatus" => $formAnswer['orderStatus'],
       "orderId" => $formAnswer['orderDetails']['orderId'],
       "email" => $formAnswer['customer']['email'],
       "idTransaction" => $transaction['transactionDetails']['cardDetails']['legacyTransId'],
       "uuid" => $transaction['uuid'],
       "amount" => $transaction['amount'],
       "fechaCreacion" => $transaction['creationDate'],
       "token" => $transaction['paymentMethodToken'],
       "card" => $transaction['transactionDetails']['cardDetails']['effectiveBrand']
   );

   saveTransaction($registro);


}
/* Recuperar la identificación de la transacción de los datos de IPN 
$transaction = $formAnswer['transactions'][0];*/

/* obtener algunos parámetros de la respuesta 
$orderStatus = $formAnswer['orderStatus'];
$orderId = $formAnswer['orderDetails']['orderId'];
$transactionUuid = $transaction['uuid'];*/

/* Actualizo mi base de datos si es necesario*/
/* Agrega aquí tu código personalizado*/ 

/**
 * Mensaje devuelto a la persona que llama a IPN
 * Puedes volver lo que quieras pero
 * El código de respuesta HTTP debe ser 200
 */
//header("HTTP/1.1 200 OK");
//print 'OK! OrderStatus is ' . $orderStatus;
?>