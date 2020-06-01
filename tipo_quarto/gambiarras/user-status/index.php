<?php require_once("../conexao.php"); 

$conn = Conexao::getConexao();


    $sql = "SELECT * FROM cliente";
      // $sql = "SELECT * FROM quartos ";

    $query = $conn->prepare($sql);
    $query->execute();
    $quartos = $query->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ativar e Desativar Usuários</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <style>
    body{background:red;color:#fff;}
    .centralizar{
      text-align: center;
      padding-top: 20px;
      padding-bottom: 10px;
    }
    
    .centro{
    		max-width:500px;
  			margin: auto;
  			margin-top: 25px !important;

		}
		header{
			background: #fff;
			color: #000 !important;
      padding-left: 40px !important;
      padding-right: 40px !important;

    }
    .fantasy{
      font-family: fantasy;
      font-size: 35px;
      letter-spacing: 3px;
    }
    footer{
      padding: 50px;
    }
    .flex{
      display: flex;
    }
    .corta img{
      max-width:87px;
      max-height:37px;
      width: auto;
      height: auto;
    }
    .borda{
      padding: 30px;
      border: 2px groove #8e8e8e;
      border-radius: 30px;
    }

    .table{
        max-width:1000px;
        margin:0 auto;
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

.table thead th,.table tbody td {color:#fff !important;}

    
    </style>
</head>
<body>
  
<div class="container">

<h2 class="text-center" style="margin:20px ;">Ativar e Desativar Clientes</h2>
<a href="../.." class="btn btn-danger">Home</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">CPF</th>
        <th scope="col">Nome</th>
        <th scope="col">Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($quartos as $q): ?>
      <tr>
        <td><?php echo $q['cpf']; ?></td>
        <td><?php echo $q['nome']; ?></td>
        <td><?php echo $q['status']; ?></td>

        <?php if($q['status'] == "Ativo"): ?>
          <td><a href="inativa.php?id=<?php echo $q['cpf']; ?>" class="btn btn-success">Inativar</a></td>
        <?php endif; ?>

        <?php if($q['status'] == "Inadimplente"): ?>
          <td><a href="ativa.php?id=<?php echo $q['cpf']; ?>" class="btn btn-success">Ativar</a></td>
        <?php endif; ?>
      </tr>
      <?php endforeach ;?>
    </tbody>
  </table>  
          
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>