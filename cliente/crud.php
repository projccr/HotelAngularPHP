<?php

//crud.php

include('../database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$cpf = '';
$status = '';
$nome = '';
$telefone = '';
$email = '';
$cidade = '';
$endereco = '';
$numero = '';
$bairro = '';
$estado = '';
$cep = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM cliente WHERE cpf='".$form_data->cpf."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['cpf'] = $row['cpf'];
		$output['status'] = $row['status'];
		$output['nome'] = $row['nome'];
		$output['telefone'] = $row['telefone'];
		$output['email'] = $row['email'];
		$output['cidade'] = $row['cidade'];
		$output['endereco'] = $row['endereco'];
		$output['numero'] = $row['numero'];
		$output['bairro'] = $row['bairro'];
		$output['estado'] = $row['estado'];
		$output['cep'] = $row['cep'];

	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM cliente WHERE cpf='".$form_data->cpf."'
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

	if(empty($form_data->email))
	{
		$error[] = 'O email é obrigatório';
	}
	else
	{
		$email = $form_data->email;
	}
	
	if(empty($form_data->cidade))
	{
		$error[] = 'O cidade é obrigatório';
	}
	else
	{
		$cidade = $form_data->cidade;
	}

	if(empty($form_data->endereco))
	{
		$error[] = 'O endereço é obrigatório';
	}
	else
	{
		$endereco = $form_data->endereco;
	}
	if(empty($form_data->numero))
	{
		$error[] = 'O número é obrigatório';
	}
	else
	{
		$numero = $form_data->numero;
	}
	if(empty($form_data->bairro))
	{
		$error[] = 'O bairro é obrigatório';
	}
	else
	{
		$bairro = $form_data->bairro;
	}
	if(empty($form_data->estado))
	{
		$error[] = 'O estado é obrigatório';
	}
	else
	{
		$estado = $form_data->estado;
	}
	if(empty($form_data->cep))
	{
		$error[] = 'O cep é obrigatório';
	}
	else
	{
		$cep = $form_data->cep;
	}
	if(empty($error))
	{
		if($form_data->action == 'Cadastrar')
		{
			$data = array(
				':cpf'		=>	$cpf,
				':nome'		=>	$nome,
				':status'		=>	$status,
				':telefone'		=>	$telefone,
				':email'		=>	$email,
				':cidade'		=>	$cidade,
				':endereco'		=>	$endereco,
				':numero'		=>	$numero,
				':bairro'		=>	$bairro,
				':estado'		=>	$estado,
				':cep'		=>	$cep
			);
			$query = "
			INSERT INTO cliente 
				(cpf, status, nome, telefone, email, cidade, endereco, numero, bairro, estado, cep) VALUES 
				(:cpf, :nome, :telefone, :email, :cidade, :endereco, :numero, :bairro, :estado, :cep)
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
				':status'	=>	$form_data->status,
				':nome'	=>	$nome,
				':telefone'	=>	$form_data->telefone,
				':email'	=>	$form_data->email,
				':cidade'	=>	$form_data->cidade,
				':endereco'	=>	$form_data->endereco,
				':numero'	=>	$form_data->numero,
				':bairro'	=>	$form_data->bairro,
				':estado'	=>	$form_data->estado,
				':cep'	=>	$form_data->cep
			);
			$query = "
			UPDATE cliente 
			SET cpf = :cpf,status = :status, nome = :nome, telefone = :telefone, email = :email, cidade = :cidade, endereco = :endereco, numero = :numero, bairro = :bairro, estado = :estado, cep = :cep 
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
