<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
	session_start();
    //require_once('valida_acesso_banco.php');
    include_once('banco/valida_acesso_banco_2.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <title >Dados de Cliente</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'dados_cliente.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="12" text align = center>Dados de Cliente</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
        $html .= '<td text align = center><b>Código Cliente</b></td>';
        $html .= '<td text align = center><b>Situação Cadastral</b></td>';
		$html .= '<td text align = center><b>Nome Completo</b></td>';
        $html .= '<td text align = center><b>RG</b></td>';
		$html .= '<td text align = center><b>CPF</b></td>';
		$html .= '<td text align = center><b>Data de Nascimento</b></td>';
		$html .= '<td text align = center><b>Telefone Residencial</b></td>';
        $html .= '<td text align = center><b>Telefone Celular</b></td>';
        $html .= '<td text align = center><b>CEP</b></td>';
        $html .= '<td text align = center><b>Endereço Completo</b></td>';
        $html .= '<td text align = center><b>E-mail</b></td>';
        $html .= '<td text align = center><b>Senha</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
    
        $result_msg_contatos = "SELECT id_cliente, id_situacao, nome_completo, rg, cpf, data_nascimento, telefone_residencial, telefone_celular, cep,  concat(rua, ' / ',bairro, ' / ', cidade, ' / ', estado, ' / ', cep, ' / ', numero,' / ', complemento) as endereco_completo, email,senha FROM cliente order by id_cliente";
		$resultado_msg_contatos = mysqli_query($con  , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td text align = center>'.$row_msg_contatos["id_cliente"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["id_situacao"].'</td>';
			$html .= '<td text align = center>'.$row_msg_contatos["nome_completo"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["rg"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["cpf"].'</td>';
			$html .= '<td text align = center>'.$row_msg_contatos["data_nascimento"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["telefone_residencial"].'</td>';
			$html .= '<td text align = center>'.$row_msg_contatos["telefone_celular"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["cep"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["endereco_completo"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["email"].'</td>';
            $html .= '<td text align = center>'.$row_msg_contatos["senha"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>