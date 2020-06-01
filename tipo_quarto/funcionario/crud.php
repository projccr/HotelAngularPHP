<?php

//crud.php

include('../funcionario/database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$cpf = '';
$nome = '';
$telefone = '';
$endereco = '';
$cargo= '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM funcionario WHERE cpf='".$form_data->cpf."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['cpf'] = $row['cpf'];
		$output['nome'] = $row['nome'];
		$output['telefone'] = $row['telefone'];
		$output['endereco'] = $row['endereco'];
		$output['cargo'] = $row['cargo'];

	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM funcionario WHERE cpf='".$form_data->cpf."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Excluído com sucesso';
	}
}
else
{
	if(empty($form_data->cpf))
	{
		$error[] = 'O CPF é obrigatório';
	}
	else
	{
		$cpf = $form_data->cpf;
	}
	
	if(empty($form_data->nome))
	{
		$error[] = 'O nome é obrigatório';
	}
	else
	{
		$nome = $form_data->nome;
	}

	if(empty($form_data->telefone))
	{
		$error[] = 'O telefone é obrigatório';
	}
	else
	{
		$telefone = $form_data->telefone;
	};

	if(empty($form_data->endereco))
	{
		$error[] = 'O telefone é obrigatório';
	}
	else
	{
		$endereco = $form_data->endereco;
	}
	
	if(empty($form_data->cargo))
	{
		$error[] = 'O telefone é obrigatório';
	}
	else
	{
		$cargo = $form_data->cargo;
	}

	if(empty($error))
	{
		if($form_data->action == 'Cadastrar')
		{
			$data = array(
				':cpf'		=>	$cpf,
				':nome'		=>	$nome,
				':telefone'		=>	$telefone,
				':endereco'		=>	$endereco,
				':cargo'		=>	$cargo
			);
			$query = "
			INSERT INTO funcionario 
				(cpf, nome, telefone, endereco, cargo) VALUES 
				(:cpf, :nome, :telefone, :endereco, :cargo)
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
				':cpf'	=>	$cpf,
				':nome'	=>	$nome,
				':telefone'	=>	$form_data->telefone,
				':endereco'	=>	$form_data->endereco,
				':cargo'	=>	$form_data->cargo
			);
			$query = "
			UPDATE funcionario 
			SET cpf = :cpf, nome = :nome, telefone = :telefone, endereco = :endereco, cargo = :cargo 
			WHERE cpf = :cpf
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
