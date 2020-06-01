<?php include('../../database_connection.php'); ?>
<?php


header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
$code = $_POST['notificationCode'];
$type = $_POST['notificationType'];
if($type == 'transaction'){
$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/".$code."?email=dev@webprodutora.com.br&token=FBCCB19697E74B6E9B2329C755306CBD";
$content = file_get_contents($url);
$xml = simplexml_load_string($content);

  var_dump($xml);
  // echo $xml->reference;


  // echo $xml->status;


   // // Guarda Status da transação retornado
  //Pago
  if($xml->status == 3){
    
    $sql = "UPDATE reserva SET pagamento = 'Pago' WHERE idreserva = :id";
    $resultado = $connect->prepare($sql);
    $dados_quarto = array(
    ':id' => $xml->reference
    );

    $resultado->execute($dados_quarto); 

  }elseif($xml->status == 7){//cancelado
    $sql = "UPDATE reserva SET pagamento = 'Cancelado' WHERE idreserva = :id";
    $resultado = $connect->prepare($sql);
    $dados_quarto = array(
    ':id' => $xml->reference
    );
    
    $resultado->execute($dados_quarto); 
  }

    
    

    // var_dump($xml);
}