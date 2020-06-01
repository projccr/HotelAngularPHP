<?php

//crud.php

include('../database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$idtipo = '';
$nometipo = '';
$descricao = '';
$valordiaria = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM tipos WHERE idtipo='".$form_data->idtipo."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['nometipo'] = $row['nometipo'];
		$output['descricao'] = $row['descricao'];
		$output['valordiaria'] = $row['valordiaria'];
	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM tipos WHERE idtipo='".$form_data->idtipo."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Excluído com sucesso';
	}
}
else
{
	if(empty($form_data->nometipo))
	{
		$error[] = 'O nome é obrigatório';
	}
	else
	{
		$nometipo = $form_data->nometipo;
	}

	if(empty($form_data->descricao))
	{
		$error[] = 'A descrição é obrigatória';
	}
	else
	{
		$descricao = $form_data->descricao;
	}

	if(empty($form_data->valordiaria))
	{
		$error[] = 'O valor é obrigatório';
	}
	else
	{
		$valordiaria = $form_data->valordiaria;
	}

	if(empty($error))
	{
		if($form_data->action == 'Cadastrar')
		{
			$data = array(
				':nometipo'		=>	$nometipo,
				':descricao'		=>	$descricao,
				':valordiaria'		=>	$valordiaria
			);
			$query = "
			INSERT INTO tipos 
				(nometipo, descricao, valordiaria) VALUES 
				(:nometipo, :descricao, :valordiaria)
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
				':nometipo'	=>	$nometipo,
				':descricao'	=>	$descricao,
				':valordiaria'		=>	$valordiaria,
				':idtipo'			=>	$form_data->idtipo
			);
			$query = "
			UPDATE tipos 
			SET nometipo = :nometipo, descricao = :descricao, valordiaria = :valordiaria 
			WHERE idtipo = :idtipo
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