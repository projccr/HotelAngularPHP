<?php
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $banco    = "legado";
    
    $conn = mysqli_connect($servidor,$usuario,$senha,$banco);
	
	$conn->set_charset('utf8mb4');
?>