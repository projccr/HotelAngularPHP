<?php

include('../../database_connection.php');


$id = $_GET["id"];

// $id = $_POST["idreserva"];
$sql = "SELECT r.* ,c.nome, q.tipos_idtipo, t.valordiaria,t.nometipo from reserva as r inner JOIN quartos as q on r.quartos_idquartos=q.idquartos INNER JOIN tipos as t on q.tipos_idtipo = t.idtipo inner JOIN cliente as c on c.cpf = r.cliente_cpf WHERE r.idreserva = ".$id."";
$query = $connect->prepare($sql);
$query->execute();
$result = $query->fetch();

$cpf  = $result['cliente_cpf'];
$nome = $result['nome'];
$valor = floatval($result['valordiaria']);
$valor = number_format($valor, 2, '.', '');
$email_cliente = "c58160434391288429416@sandbox.pagseguro.com.br"; // Pegar o email do cliente de teste no pagseguro e a senha pro teste
$dias = 1; //1 diária / padrão
$descr = $result['nometipo'];


//T14g - Não fuçar aqui obrigado HEAUHAEUEAHUAEH

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
$data['email'] = 'paulodbatista@gmail.com';
$data['token'] = '9C466057B1784AAFAE3E5882216E206C';
$data['currency'] = 'BRL';
$data['itemId1'] = $id;
$data['itemDescription1'] = $descr;
$data['itemAmount1'] = $valor;
$data['itemQuantity1'] = intval($dias);
$data['itemWeight1'] = 0;
$data['reference'] = $id; //id da reserva
$data['senderName'] = $nome;
$data['senderEmail'] = $email_cliente;
//var_dump($data);
$data = http_build_query($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);
if($xml == 'Unauthorized'){
echo "Unauthorized";
exit();
}
curl_close($curl);


$xml= simplexml_load_string($xml);
var_dump($xml);

header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?email='.$data['email'].'&code='.$xml->code);