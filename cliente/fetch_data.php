<?php
 
//fetch_data.php

include('../database_connection.php');

//$connect = new PDO("mysql:host=localhost;dbname=hoteldb", "hotel_owner", "hotel_owner123");

$query = "SELECT * FROM cliente";
// $query = "SELECT * FROM cliente ORDER BY cpf";

$statement = $connect->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	//var_dump ($data);
	}
	echo json_encode($data);
	
	// var_dump($data);
    }

?>
