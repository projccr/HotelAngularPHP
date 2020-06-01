<?php

//index.php

include('../database_connection.php');

$query = "SELECT cpf FROM cliente WHERE status = 'Ativo' ORDER BY cpf ASC ";
$statement = $connect->prepare($query);
$statement->execute();
$resultcpf = $statement->fetchAll();

$query = "SELECT idquartos,nome as quarto FROM quartos WHERE status = 'Disponivel' ORDER BY nome ASC";
$statement = $connect->prepare($query);
$statement->execute();
$resultqt = $statement->fetchAll();


//$query = "select idreserva, cliente.cpf as cpf, nome.quarto as quarto from reserva left join cliente on reserva.cliente_cpf = cliente.cpf left join quartos on reserva.quartos_idquartos = quartos.idquartos order by cliente.cpf
//";

?>

<html>  
    <head>  
        <title>Checkin e Checkout</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="jquery-editable-select.min.css" />
		<script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
		<script src="jquery-editable-select.min.js"></script>
		
		<style>
			body{
			background: red;
			color:#fff;
			}

			.btn{
				color:red;
				background: #fff;
				border: none;
				display: block;
				max-width: 200px;
			}


			.btn:hover{
				background: #fff;
				color:red;
				opacity: 0.8;
			}

			select option {color:#fff; background:red;}

			#cpf{
				color:#000;
			}

			input{color:#fff;}
			.es-list li{color:#000}

			.btn{
		color:red;
		background: #fff;
		border: none;
		display: block;
		max-width: 200px;
	}


.btn:hover{
    background: #fff;
    color:red;
    opacity: 0.8;
}
		
		
		
		
		
		
		
		
		</style>
		
    </head>  
    <body>  
        <div class="container">  
		<br />
		<br />
		<br />
        <br />  
				<a class="btn btn-primary" href="../index.html" role="button">Home</a>


			<br />
			<h2 align="center">Checkin e Checkout</h2><br />
			<div class="row">
			
				<div class="col-md-12">
					<form method="post" id="checkin_form">
						<div class="form-group">
							<label>Selecione o cpf</label>
							<select name="cpf" id="cpf" class="form-control">
							<?php
							foreach($resultcpf as $row)
							{
								echo '<option value="'.$row["cpf"].'">'.$row["cpf"].'</option>';
								
							}
							?>
							</select>
							<label>Selecione o quarto</label>
							<select name="quarto" id="quarto" class="form-control">
							<?php
							foreach($resultqt as $row)
							{
								echo '<option value="'.$row["quarto"].'">'.$row["quarto"].'</option>';
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<input type="hidden" name="action" id="action" value="add" />
							<input type="hidden" name="idquartos" id="idquartos" value="" /> 
							<input type="submit" name="checkin" id="checkin" class="btn btn-success" value="checkin" />
						</div>
					</form>
					<br />
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Codigo da reserva</th>
									<th>CPF</th>
									<th>Cliente</th>
									<th>Quarto</th>
									<th>Pagamento</th>
									<th>Checkin</th>
									<th>Checkout</th>
									<th></th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
			
			<br />
			<br />
			<br />
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){
	
	fetch_data();
	
	function fetch_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			success:function(data)
			{
				$('tbody').html(data);
			}
		});
	}
	
	$('#cpf').editableSelect();
	
	$('#checkin_form').on('submit', function(event){
		event.preventDefault();
		
		if($('#cpf').val() == '')
		{
			alert("Digite ou selecione um cpf");
			return false;
		}
		else if($('#quarto').val() == '')
		{
			alert("Selecione um quarto");
			return false;
		}
		else
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				success:function(data)
				{
					alert(data);
					$('#checkin_form')[0].reset();
					$('#action').val("add");
					$('#checkin').val('checkin');
				}
			});
			fetch_data();

		}
	});
	
	$(document).on('click', '.edit', function(){
		var idreserva = $(this).attr("idreserva");
		var action = 'edit';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{idreserva:idreserva, action:action},
			dataType:'json',
			success:function(data)
			{
				$('#checkin_form')[0].reset();

				$('#idreserva').val(idreserva);
				$('#action').val("edit");

			}
		});
		fetch_data();


	});

	// T14g

	$(document).on('click', '.pagseguro', function(){
		var idreserva = $(this).attr("idreserva");
		var action = 'pagseguro';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{idreserva:idreserva, action:action},
			dataType:'json',
			success:function(data)
			{
				$('#checkin_form')[0].reset();

				$('#idreserva').val(idreserva);
				$('#action').val("pagseguro");

			}
		});
		fetch_data();


	});


});  
</script>
