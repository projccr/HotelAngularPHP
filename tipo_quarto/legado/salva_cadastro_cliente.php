<?php
    
include_once("banco/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Cliente</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container theme-showcase" role="main">
		<?php
        $nome_completo      = $_POST['nome_completo'];
        $data_nascimento    = $_POST['data_nascimento'];
        $cpf                = $_POST['cpf'];
        $rg                 = $_POST['rg'];
        $tel_residencial    = $_POST['tel_residencial'];
        $tel_celular        = $_POST['tel_celular'];
        $cep                = $_POST['cep'];
        $rua                = $_POST['rua'];
        $bairro             = $_POST['bairro'];
        $cidade             = $_POST['cidade'];
        $estado             = $_POST['uf'];
        $numero             = $_POST['numero'];
        $complemento        = $_POST['complemento'];
        $email              = $_POST['email'];
        $senha              = $_POST['senha'];

        $crypt = md5($senha);
        $id_situacao = ('Ativo'); 
            
		$result_cadastro_cliente = "INSERT INTO cliente (id_situacao, nome_completo, data_nascimento, cpf, rg, telefone_residencial, telefone_celular, cep, rua, bairro, cidade, estado, numero, complemento, email, senha, data_inclusao ,data_alteracao) VALUES ('$id_situacao', '$nome_completo','$data_nascimento','$cpf','$rg', '$tel_residencial','$tel_celular','$cep','$rua','$bairro','$cidade','$estado','$numero','$complemento','$email', '$crypt', now(), null) ";
            
		$result_cadastro_cliente = mysqli_query($conn, $result_cadastro_cliente);		
		
		if(mysqli_affected_rows($conn) > 0){ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Cliente cadastrado com Sucesso!</h4>
						</div>
						<div class="modal-body">
							<?php echo $nome_completo; ?>
						</div>
						<div class="modal-footer">
							<a href="CRUD.php"><button type="button" class="btn btn-success">Ok</button></a>
						</div>
					</div>
				</div>
			</div>				
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php }else{ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Erro ao cadastrar cliente! Tente novamente.</h4>
						</div>
						<div class="modal-body">								
							<?php echo $nome_completo; ?>
						</div>
						<div class="modal-footer">
							<a href="CRUD.php"><button type="button" class="btn btn-danger">Ok</button></a>
						</div>
					</div>
				</div>
			</div>			
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php } ?>
		</div>
	</body>
</html>