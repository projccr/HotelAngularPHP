<?php require_once("../conexao.php"); 

$conn = Conexao::getConexao();

$id = $_GET['id'];




    $sql = "UPDATE cliente SET status= 'Ativo' WHERE cpf = ".$id."";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: index.php");



?>