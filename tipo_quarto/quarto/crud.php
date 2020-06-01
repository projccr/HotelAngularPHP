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
$idquartos = '';

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
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM quartos WHERE idquartos='".$form_data->idquartos."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Excluído com sucesso';
	}
}
else
{
	if(empty($form_data->nome))
	{
		$error[] = 'O nome é obrigatório';
	}
	else
	{
		$nome = $form_data->nome;
	}

	if(empty($form_data->tipos_idtipo))
	{
		$error[] = 'O código do tipo de quarto é obrigatório';
	}
	else
	{
		$tipos_idtipo = $form_data->tipos_idtipo;
	}
	
	if(empty($form_data->status))
	{
		$error[] = 'O status do quarto é obrigatório';
	}
	else
	{
		$status = $form_data->status;
	}

	if(empty($error))
	{
		if($form_data->action == 'Cadastrar')
		{
			$data = array(
				':nome'		=>	$nome,
				':tipos_idtipo'	=>	$tipos_idtipo,
				':status'	=>	$status
			);
			$query = "
			INSERT INTO quartos 
				(nome, tipos_idtipo, status) VALUES 
				(:nome, :tipos_idtipo, :status)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Cadastrado com sucesso';
			}
		}
		if($form_data->action == 'Atualizar')
		{
			$data = array(

				':idquartos'	=>	$idquartos,
				':nome'	=>	$nome,
				':tipos_idtipo'	=>	$tipos_idtipo,
				':status'	=>	$status
			);
			var_dump($idquartos, $nome, $tipos_idtipo, $status);
			$query = "
			UPDATE quartos 
			SET nome = :nome, tipos_idtipo = :tipos_idtipo, status = :status
			WHERE idquartos = :idquartos
			";

			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Atualizado com sucesso';
			}
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