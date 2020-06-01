<?php

//crud.php

include('../itens/database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$nome = '';
$valor = '';
$quantidade = '';
$iditens = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM itens WHERE iditens='".$form_data->iditens."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['nome'] = $row['nome'];
		$output['valor'] = $row['valor'];
		$output['quantidade'] = $row['quantidade'];
	}

	// var_dump($output);
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM itens WHERE iditens ='".$form_data->iditens."'
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
		$error[] = 'O  nome é obrigatório';
	}
	else
	{
		$nome = $form_data->nome;
	}

	if(empty($form_data->valor))
	{
		$error[] = 'O valor é obrigatório';
	}
	else
	{
		$valor = $form_data->valor;
	}

	if(empty($form_data->quantidade))
	{
		$error[] = 'A quantidade or é obrigatória';
	}
	else
	{
		$quantidade = $form_data->quantidade;
	}

	if(empty($error))
	{
		if($form_data->action == 'Cadastrar')
		{
			$data = array(
				':nome'		=>	$form_data->nome,
				':valor'		=>	$form_data->valor,
				':quantidade'	=> $form_data->quantidade
			);
			$query = "
			INSERT INTO itens 
				(nome, valor, quantidade) VALUES 
				(:nome, :valor, :quantidade)
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
				':nome'		=>	$form_data->nome,
				':valor'		=>	$form_data->valor,
				':quantidade'	=> $form_data->quantidade,
				':iditens'			=>	$form_data->iditens
			);
			$query = "
			UPDATE itens 
			SET nome = :nome, valor = :valor , quantidade = :quantidade
			WHERE iditens = :iditens
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