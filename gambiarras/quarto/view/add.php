<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de quarto</title>

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
    
    </style>
</head>
<body>
  
<div class="container">



  <form class="centro" method="POST" > 
    <h1>CADASTRO DE QUARTO</h1> 
      <?php if(isset($_SESSION['erro'])):?>
        <h3 style="color:red;font-weight:600;"><?php echo $_SESSION['erro']; ?></h3>
        <?php unset($_SESSION['erro']); ?>
      <?php endif;?>
 
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome" required autofocus>
    </div>
    
    <div class="form-group">
      <label>Id do tipo ( só vale digitar de 2 ou 3)</label>
      <input type="text" class="form-control" name="idtipo" placeholder="" required autofocus>
    </div>

    <button type="submit" class="btn btn-dark">Cadastrar</button>
    <a href="../../" class="btn btn-danger btn-cancelar">Cancelar</a>

    </form>
  
  
          
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>