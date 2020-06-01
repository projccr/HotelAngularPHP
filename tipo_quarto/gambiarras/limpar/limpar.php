<?php require_once("../conexao.php"); 

$conn = Conexao::getConexao();

$id = $_GET['id'];

    $sql = "UPDATE quartos SET status= 'Disponível' WHERE idquartos = ".$id."";
    $query = $conn->prepare($sql);
    $query->execute();
   
    header("Location: index.php");



?>