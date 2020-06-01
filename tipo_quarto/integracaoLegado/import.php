<?php 
// include('../database_connection.php');
$connect = mysqli_connect("localhost", "root", "", "paulo");
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
          
            $sqlInsert = "INSERT into cliente (cpf, status, nome, telefone, email, cidade, endereco, numero, bairro, estado, cep)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "')";

            $result = mysqli_query($connect, $sqlInsert);
           
            
            if (! empty($result)) {
                $type = "success";
                $message = "Os dados do csv foram importado com sucesso";
            } else {
                $type = "error";
                $message = "Ocorreu um erro ao importar os dados do csv";
            }
        }
    }
}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>

        <title>Importar dados</title>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/angular.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/angular-datatables.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/datatables.bootstrap.css">

<style>
body {
	font-family: Arial;
    width: 550px;
    background:red;
    color:#fff;
}

.outer-scontainer {


	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-top: 0%;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

.outer-scontainer table {
	border-collapse: collapse;
	width: 100%;
}

.outer-scontainer th {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.outer-scontainer td {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
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



</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>
    <h2>Importação de base do legado por CSV</h2>
    
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php  if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
            <a class="btn btn-primary" href="../index.html" role="button">Home</a>
        <div class="row">

            <form  class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Selecione o arquivo</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn btn-success">Importar</button>
                    <br />

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM cliente";
            $result = mysqli_query($connect, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
            <table  id='cpf'>
            <thead>
                <tr>
                    <th>cpf</th>
                    <th>status</th>
                    <th>nome</th>
                    <th>telefone</th>
                    <th>email</th>
                    <th>cidade</th>
                    <th>endereco</th>
                    <th>numero</th>
                    <th>bairro</th>
                    <th>estado</th>
                    <th>cep</th>

                </tr>
            </thead>
<?php 
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    
                <tbody>
                <tr>
                    <td><?php  echo $row['cpf']; ?></td>
                    <td><?php  echo $row['status']; ?></td>
                    <td><?php  echo $row['nome']; ?></td>
                    <td><?php  echo $row['telefone']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['cidade']; ?></td>
                    <td><?php  echo $row['endereco']; ?></td>
                    <td><?php  echo $row['numero']; ?></td>
                    <td><?php  echo $row['bairro']; ?></td>
                    <td><?php  echo $row['estado']; ?></td>
                    <td><?php  echo $row['cep']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>

</body>

</html>
