<?php

//action.php

include('../database_connection.php');
$date = date('Y-m-d H:i:s');


if(isset($_POST["action"]))
{	
	
	if($_POST["action"] == "add")
	{
	
		$query = "SELECT idquartos FROM quartos WHERE nome = '".$_POST["quarto"]."'  LIMIT 1";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$resp = $idquartos['idquartos'] = $row["idquartos"];
				
		}
		//$date = date('d-m-Y H:i:s');
		$data = array(
			':cpf'		=>	$_POST["cpf"],
			':resp' 	=>	$resp,
			':date'		=>	$date,
			':pagamento' => "Pendente"

		);
		
		 $query = "
	
		INSERT INTO reserva (cliente_cpf, quartos_idquartos, datacheckin,pagamento) 
		VALUES (:cpf, :resp, :date, :pagamento)
		";
		$statement = $connect->prepare($query);
		if($statement->execute($data))
		{
		
			
			$query = "
	
			UPDATE quartos
			SET status='Ocupado' WHERE idquartos= $resp
			";
			$statement = $connect->prepare($query);
			if($statement->execute())
			{
				echo 'Checkin registrado com sucesso';
			}
			
		}


	}
	
	if($_POST["action"] == 'fetch_single')
	{
		
		$query = "
		select idreserva,cliente.cpf, cliente.nome, quartos.nome as quarto, datacheckin, datacheckout from reserva 
		INNER JOIN cliente on reserva.cliente_cpf = cliente.cpf
		INNER JOIN quartos on reserva.quartos_idquartos = quartos.idquartos WHERE idreserva='".$_POST["idreserva"]."';
";
		
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['idreserva'] = $row["idreserva"];
			$output['cpf'] = $row["cpf"];
			$output['nome'] = $row["nome"];
			$output['quarto'] = $row["quarto"];
			$output['datacheckin'] = $row["datacheckin"];
			$output['datacheckout'] = $row["datacheckout"];
			echo $row["cpf"];
		
		}
		//var_dump($output);
		echo json_encode($output);
	}


	if($_POST["action"] == "edit"){
		

		$data = array(
				':date'		=>	$date,
				':idreserva' =>	$_POST["idreserva"]
			
		);


		$query = "
		UPDATE reserva 
		SET datacheckout = :date
		WHERE idreserva = :idreserva
		";

		$statement = $connect->prepare($query);
		if($statement->execute($data))
		{
			// var_dump($data[':idreserva']);
			// echo "Oi";
			$query = "SELECT quartos_idquartos FROM reserva WHERE idreserva = '".$data[":idreserva"]."'  LIMIT 1";
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			foreach($result as $row)
			{
				printf("%s\n",$row[0]);
				$resp = $quartos_idquartos['quartos_idquartos'] = $row["quartos_idquartos"];
			}

			echo $resp;
			$query = "
		
			UPDATE quartos
			SET status = 'Limpar' WHERE idquartos = $resp
			";
			$statement = $connect->prepare($query);
			if($statement->execute())
			{
				echo 'Feito Checkout com sucesso';
			}
		}
	}

}

?>