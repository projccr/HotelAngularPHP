<?php

//fetch.php

include('../database_connection.php');

$query = "
select idreserva,pagamento, cliente.cpf, cliente.nome, quartos.nome as quarto, datacheckin, datacheckout from reserva 
INNER JOIN cliente on reserva.cliente_cpf = cliente.cpf
INNER JOIN quartos on reserva.quartos_idquartos = quartos.idquartos where datacheckout is null ORDER BY cliente.nome ASC
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row["idreserva"].'</td>
			<td>'.$row["cpf"].'</td>
			<td>'.$row["nome"].'</td>
			<td>'.$row["quarto"].'</td>
			<td>'.$row["pagamento"].'</td>
			<td>'.$row["datacheckin"].'</td>
			<td>'.$row["datacheckout"].'</td>
			<td><button type="button" name="edit" class="btn btn-primary  edit" idreserva="'.$row["idreserva"].'">Checkout</button></td>
			<td><a href="pagseguro/pagamento.php?id='.$row['idreserva'].'" name="pagseguro" class="btn btn-success  pagseguro" idreserva="'.$row["idreserva"].'">Pagar</a></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="3" align="center">Não há registros</td>
	</tr>
	';
}

echo $output;

?>