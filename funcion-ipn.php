<?php


function saveTransaction($transaction){

    // $cn = new Conexion();
    // $pdo = $cn->conectar();
    $pdo = new PDO('mysql:host=localhost;dbname=id17066705_luz05','id17066705_draaco09','!~3eC3x]w%\fD_Xg');
    $registro = $pdo->prepare("INSERT INTO tb_transaccion(id_transaction,ordenStatus,order_Id,email,uuid,amount,fechaCreacion,token,card,new_email,new_terms,new_hidden)VALUES(:idTransaction,:orderStatus,:orderId,:email,:uuid,:amount,:fechaCreacion,:token,:card,:new_email,:new_terms,new_hidden)");
     
    $registro->bindParam(':idTransaction',$transaction['idTransaction'],PDO::PARAM_STR);
    $registro->bindParam(':orderStatus',$transaction['orderStatus'], PDO::PARAM_STR);
    $registro->bindParam(':orderId',$transaction['orderId'], PDO::PARAM_STR);
    $registro->bindParam(':email',$transaction['email'], PDO::PARAM_STR);
    $registro->bindParam(':uuid',$transaction['uuid'], PDO::PARAM_STR);
    $registro->bindParam(':amount',$transaction['amount'], PDO::PARAM_STR);
    $registro->bindParam(':fechaCreacion',$transaction['fechaCreacion'], PDO::PARAM_STR);
    $registro->bindParam(':token',$transaction['token'], PDO::PARAM_STR);
    $registro->bindParam(':card',$transaction['card'], PDO::PARAM_STR);
    $registro->bindParam(':new_email',$transaction['newEmail'], PDO::PARAM_STR);
    $registro->bindParam(':new_terms',$transaction['newTerms'], PDO::PARAM_STR);
    $registro->bindParam(':new_hidden',$transaction['newHidden'], PDO::PARAM_STR);

    if($registro->execute()){
        echo 'Datos Guardados correctamente.IPN..';
        $registro = null;
    }else{
        echo 'No se ha podido guardar los datos IPN...';
    }

}