<?php
//$connect = mysqli_connectect("localhost", "root", "test", "phpsamples");
//INSERT INTO cliente 
//				(cpf, nome, telefone, email, cidade, endereco, numero, bairro, estado, cep) VALUES 
//				(:cpf, :nome, :telefone, :email, :cidade, :endereco, :numero, :bairro, :estado, :cep)
//			";

include('../cliente/database_connection.php');

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into cliente (cpf, nome, telefone, email, cidade, endereco, numero, bairro, estado, cep)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
            echo $column[1];
            $result = mysqli_query($connect, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>