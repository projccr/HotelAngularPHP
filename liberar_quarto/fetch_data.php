<?php

//fetch_data.php

include('../quarto/database_connection.php');

$query = "SELECT * FROM quartos WHERE status != 'Disponivel' ORDER BY idquartos";
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