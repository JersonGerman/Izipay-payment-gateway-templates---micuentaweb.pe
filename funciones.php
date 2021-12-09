<?php
// require_once __DIR__ . '/conexion.php';

/*
function getIPNSimulatedPOSTData() {
    $post = array();
    $post["kr-answer-type"] = "V3.1/IPNRequest";
    $post["kr-hash"] = "9074a0bd1b926fd78ed91eec074affc8d844ed26439fc471e0ca4e6723fa049e";
    $post["kr-hash-key"] = "password";
    $post["kr-hash-algorithm"] =  "sha256_hmac";
    $post["kr-answer"] = "{\"shopId\":\"69876357\",\"orderCycle\":\"CLOSED\",\"orderStatus\":\"PAID\",\"serverDate\":\"2018-11-08T08:35:09+00:00\",\"orderDetails\":{\"orderTotalAmount\":990,\"orderCurrency\":\"EUR\",\"mode\":\"TEST\",\"orderId\":\"myOrderId-187033\",\"_type\":\"V4/OrderDetails\"},\"customer\":{\"billingDetails\":{\"address\":null,\"category\":null,\"cellPhoneNumber\":null,\"city\":null,\"country\":null,\"district\":null,\"firstName\":null,\"identityCode\":null,\"language\":\"FR\",\"lastName\":null,\"phoneNumber\":null,\"state\":null,\"streetNumber\":null,\"title\":null,\"zipCode\":null,\"_type\":\"V4/Customer/BillingDetails\"},\"email\":\"sample@example.com\",\"reference\":null,\"shippingDetails\":{\"address\":null,\"address2\":null,\"category\":null,\"city\":null,\"country\":null,\"deliveryCompanyName\":null,\"district\":null,\"firstName\":null,\"identityCode\":null,\"lastName\":null,\"legalName\":null,\"phoneNumber\":null,\"shippingMethod\":null,\"shippingSpeed\":null,\"state\":null,\"streetNumber\":null,\"zipCode\":null,\"_type\":\"V4/Customer/ShippingDetails\"},\"extraDetails\":{\"browserAccept\":null,\"fingerPrintId\":null,\"ipAddress\":\"37.1.253.83\",\"browserUserAgent\":\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36\",\"_type\":\"V4/Customer/ExtraDetails\"},\"shoppingCart\":{\"insuranceAmount\":null,\"shippingAmount\":null,\"taxAmount\":null,\"cartItemInfo\":null,\"_type\":\"V4/Customer/ShoppingCart\"},\"_type\":\"V4/Customer/Customer\"},\"transactions\":[{\"shopId\":\"69876357\",\"uuid\":\"971b6b3b9e364e87bfbe9886b3a75df4\",\"amount\":990,\"currency\":\"EUR\",\"paymentMethodType\":\"CARD\",\"paymentMethodToken\":null,\"status\":\"PAID\",\"detailedStatus\":\"AUTHORISED\",\"operationType\":\"DEBIT\",\"effectiveStrongAuthentication\":\"DISABLED\",\"creationDate\":\"2018-11-08T08:35:09+00:00\",\"errorCode\":null,\"errorMessage\":null,\"detailedErrorCode\":null,\"detailedErrorMessage\":null,\"metadata\":null,\"transactionDetails\":{\"liabilityShift\":\"NO\",\"effectiveAmount\":990,\"effectiveCurrency\":\"EUR\",\"creationContext\":\"CHARGE\",\"cardDetails\":{\"paymentSource\":\"EC\",\"manualValidation\":\"NO\",\"expectedCaptureDate\":\"2018-11-08T08:35:09+00:00\",\"effectiveBrand\":\"CB\",\"pan\":\"497010XXXXXX0055\",\"expiryMonth\":11,\"expiryYear\":2021,\"country\":\"FR\",\"emisorCode\":null,\"effectiveProductCode\":\"F\",\"legacyTransId\":\"900147\",\"legacyTransDate\":\"2018-11-08T08:35:03+00:00\",\"paymentMethodSource\":\"NEW\",\"authorizationResponse\":{\"amount\":990,\"currency\":\"EUR\",\"authorizationDate\":\"2018-11-08T08:35:09+00:00\",\"authorizationNumber\":\"3fe034\",\"authorizationResult\":\"0\",\"authorizationMode\":\"FULL\",\"_type\":\"V4/PaymentMethod/Details/Cards/CardAuthorizationResponse\"},\"captureResponse\":{\"refundAmount\":null,\"captureDate\":null,\"captureFileNumber\":null,\"refundCurrency\":null,\"_type\":\"V4/PaymentMethod/Details/Cards/CardCaptureResponse\"},\"threeDSResponse\":{\"authenticationResultData\":{\"transactionCondition\":\"COND_3D_ERROR\",\"enrolled\":\"UNKNOWN\",\"status\":\"UNKNOWN\",\"eci\":null,\"xid\":null,\"cavvAlgorithm\":null,\"cavv\":null,\"signValid\":null,\"brand\":\"VISA\",\"_type\":\"V4/PaymentMethod/Details/Cards/CardAuthenticationResponse\"},\"_type\":\"V4/PaymentMethod/Details/Cards/ThreeDSResponse\"},\"installmentNumber\":null,\"markAuthorizationResponse\":{\"amount\":null,\"currency\":null,\"authorizationDate\":null,\"authorizationNumber\":null,\"authorizationResult\":null,\"_type\":\"V4/PaymentMethod/Details/Cards/MarkAuthorizationResponse\"},\"_type\":\"V4/PaymentMethod/Details/CardDetails\"},\"fraudManagement\":null,\"parentTransactionUuid\":null,\"mid\":\"6969696\",\"sequenceNumber\":1,\"_type\":\"V4/TransactionDetails\"},\"_type\":\"V4/PaymentTransaction\"}],\"_type\":\"V4/Payment\"}";
  
    return $post;
}*/

function saveTransaction($transaction){

    // $cn = new Conexion();
    // $pdo = $cn->conectar();
    $pdo = new PDO('mysql:host=localhost;dbname=id17066705_luz05','id17066705_draaco09','!~3eC3x]w%\fD_Xg');
    $registro = $pdo->prepare("INSERT INTO tb_transaccion(id_transaction,ordenStatus,order_Id,email,uuid,amount,fechaCreacion,token,card)VALUES(:idTransaction,:orderStatus,:orderId,:email,:uuid,:amount,:fechaCreacion,:token,:card)");
     
    $registro->bindParam(':idTransaction',$transaction['idTransaction'],PDO::PARAM_STR);
    $registro->bindParam(':orderStatus',$transaction['orderStatus'], PDO::PARAM_STR);
    $registro->bindParam(':orderId',$transaction['orderId'], PDO::PARAM_STR);
    $registro->bindParam(':email',$transaction['email'], PDO::PARAM_STR);
    $registro->bindParam(':uuid',$transaction['uuid'], PDO::PARAM_STR);
    $registro->bindParam(':amount',$transaction['amount'], PDO::PARAM_STR);
    $registro->bindParam(':fechaCreacion',$transaction['fechaCreacion'], PDO::PARAM_STR);
    $registro->bindParam(':token',$transaction['token'], PDO::PARAM_STR);
    $registro->bindParam(':card',$transaction['card'], PDO::PARAM_STR);

    if($registro->execute()){
        //echo 'Datos Guardados correctamente...';
        $registro = null;
    }else{
        echo 'No se ha podido guardar los datos...';
    }

}