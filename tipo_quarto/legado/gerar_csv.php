
<?php
//include database configuration file

//cpf, nome_completo, telefone_celular, email, cidade, endereco, numero, bairro, estado, cep FROM cliente');


//Declara a função de ajuste do charset
function encodeCSV(&$value, $key){
	$value = iconv('UTF-8', 'Windows-1252', $value);
}
   

include_once('banco/conexao.php');

date_default_timezone_set('America/Sao_Paulo');



//get records from database
$query = $conn->query("SELECT * FROM cliente");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = date('d/m/y H:i') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'r+');
 
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
		$lineData = array($row['cpf'], $row['id_situacao'], $row['nome_completo'], $row['telefone_celular'], $row['email'], $row['cidade'], $row['rua'], $row['numero'], $row['bairro'], $row['estado'],$row['cep']);
        
        $lineData = array_map("utf8_decode", $lineData);
        
		fputcsv($f, $lineData, $delimiter);

    }
    
    //move back to beginning of file
    fseek($f, 0);

    //Cria um arquivo para ser gravado com a retirada das aspas duplas
    $f2 = fopen('php://memory', 'r+');

    //Substitui linha a linha do arquivo anterior e escreve os novos dados no novo arquivo
    while (!feof($f)) {

        $linha = fgets($f);
        $linha = str_replace('"', '', $linha);
        fwrite($f2, $linha);

    }

    //Retorna o ponteiro ao iniício do arquivo $f2
    fseek($f2,0);

    //set headers to download file rather than displayed
    header("Content-Type: aplication/csv; charset= utf8");
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //Limpa o buffer de saída para não constar linha em branco
    ob_clean();

    //output all remaining data on a file pointer
    fpassthru($f2);
    

}

exit;

?>