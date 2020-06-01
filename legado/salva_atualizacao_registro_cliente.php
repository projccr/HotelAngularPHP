<?php

session_start();
    
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
            $id_cliente         = $_POST['id_cliente'];
            $id_situacao        = $_POST['id_situacao'];
            $nome_completo      = $_POST['nome_completo'];
            $data_nascimento    = $_POST['data_nascimento'];
            $cpf                = $_POST['cpf'];
            $rg                 = $_POST['edita_rg'];
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
            
            $result_usuario = "UPDATE cliente SET id_situacao = '$id_situacao', nome_completo='$nome_completo', data_nascimento='$data_nascimento', cpf= '$cpf', rg='$rg', telefone_residencial='$tel_residencial', telefone_celular='$tel_celular', cep='$cep', rua='$rua', bairro='$bairro', cidade='$cidade', estado='$estado', numero='$numero', complemento='$complemento', email='$email', senha='$crypt', data_alteracao= now() WHERE id_cliente='$id_cliente' ";
            
            $resultado_usuario = mysqli_query($conn, $result_usuario);
	
		
		if(mysqli_affected_rows($conn) > 0){ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Ajuste Realizado com Sucesso!</h4>
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
							<h4 class="modal-title" id="myModalLabel">Erro ao Editar cadastro de cliente! Tente novamente.</h4>
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