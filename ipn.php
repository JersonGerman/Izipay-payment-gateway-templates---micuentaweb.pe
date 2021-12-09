<?php

if( $_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: index.php');
    exit();
}


/**
 * I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';
require_once __DIR__ . '/helpers.php';

require_once 'funcion-ipn.php';
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
   
   $newEmail = $rawAnswer['kr-email'];
   $newTerms = $rawAnswer['kr-terms'];
   $newHidden = $rawAnswer['kr-hidden'];

   $registro = array(
       "orderStatus" => $formAnswer['orderStatus'],
       "orderId" => $formAnswer['orderDetails']['orderId'],
       "email" => $formAnswer['customer']['email'],
       "idTransaction" => $transaction['transactionDetails']['cardDetails']['legacyTransId'],
       "uuid" => $transaction['uuid'],
       "amount" => $transaction['amount'],
       "fechaCreacion" => $transaction['creationDate'],
       "token" => $transaction['paymentMethodToken'],
       "card" => $transaction['transactionDetails']['cardDetails']['effectiveBrand'],
       'newEmail' => $newEmail,
       'newTerms' => $newTerms,
        'newHidden' => $newHiddens
   );

   saveTransaction($registro);


}

?>