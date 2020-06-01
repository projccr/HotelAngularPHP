<?php require_once("../conexao.php"); ?>
<?php

class Tipo
{
    
    private $pdo;
 
    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }

    public function add_tipo($atributos){

        var_dump($atributos);
     
        $sql_insert = "INSERT INTO tipos (nometipo, descricao, valordiaria)
        VALUES ( :nome, :descr, :valor)";

        $resultado = $this->pdo->prepare($sql_insert);

        $dados_quarto = array(
        ':nome' => $atributos['nome'],
        ':descr' => $atributos['descr'],
        ':valor' => $atributos['preco']
        );

        $resultado->execute($dados_quarto);  
    }

    public function add_quarto($atributos){
     
        $sql_insert = "INSERT INTO quarto (nome, preco, status_quarto)
        VALUES ( :nome, :preco, :status_quarto)";

        $resultado = $this->pdo->prepare($sql_insert);

        $dados_quarto = array(
        ':nome' => $atributos['nome'],
        ':preco' => $atributos['preco'],
        ':status_quarto' => 1
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