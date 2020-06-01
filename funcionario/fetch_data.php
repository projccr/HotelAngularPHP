<?php

//fetch_data.php

include('../funcionario/database_connection.php');

//$connect = new PDO("mysql:host=localhost;dbname=hoteldb", "hotel_owner", "hotel_owner123");

$query = "SELECT cpf,nome,telefone,'endereco',cargo FROM funcionario ORDER BY cpf";
// $query = "SELECT * FROM funcionario ORDER BY cpf";

$statement = $connect->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	}
	echo json_encode($data);
    }

?>
