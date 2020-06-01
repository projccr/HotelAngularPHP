<?php require_once("../conexao.php"); ?>
<?php

class Quarto
{
    
    private $pdo;
 
    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }


    public function add_quarto($atributos){
     
        $sql_insert = "INSERT INTO quartos (nome, tipos_idtipo, status)
        VALUES ( :nome, :tipo, :status_quarto)";

        $resultado = $this->pdo->prepare($sql_insert);

        $dados_quarto = array(
        ':nome' => $atributos['nome'],
        ':tipo' => $atributos['idtipo'],
        ':status_quarto' => "Disponível"
        );

        $resultado->execute($dados_quarto);  
    }

    public function edita_quarto($atributos){
        $sql = "UPDATE quarto SET nome=?, preco=?, status_quarto=? WHERE id_quarto=?";
        $this->pdo->prepare($sql)->execute([$atributos['nome'], $atributos['preco'], $atributos['status_quarto'], $atributos['id_do_quarto']]);
    }

    public function lista_quartos(){
        $sql = "SELECT * FROM quarto";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function deleta_quarto($id){
        $sql = "DELETE FROM quarto WHERE id_quarto  = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
    }

    public function get_quarto($id){
        $sql = "SELECT * FROM quarto WHERE id_quarto  = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
        $result = $query->fetch();
        return $result;
    }

}