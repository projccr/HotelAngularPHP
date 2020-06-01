<?php

//crud.php

include('../quarto/database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$nome = '';
$tipos_idtipo = '';
$status = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM quartos WHERE idquartos='".$form_data->idquartos."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['nome'] = $row['nome'];
		$output['tipos_idtipo'] = $row['tipos_idtipo'];
		$output['status'] = $row['status'];
	}
}
elseif($form_data->action == "Atender")
{
	$query = "
	UPDATE quartos
	SET status='Atendimento' WHERE idquartos='".$form_data->idquartos."'
	";
	var_dump($idquartos);
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Quarto em Atendimento';
	}
}
else
{
	if($form_data->action == "Liberar")
	{
		$query = "
	
		UPDATE quartos
		SET status='Disponivel' WHERE idquartos='".$form_data->idquartos."'
		";
		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			$output['message'] = 'Quarto Liberado';
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}



echo json_encode($output);

?>