<?php require_once("../conexao.php"); 

$conn = Conexao::getConexao();

$id = $_GET['id'];




    $sql = "UPDATE cliente SET status= 'Inadimplente' WHERE cpf = ".$id."";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: index.php");



?>