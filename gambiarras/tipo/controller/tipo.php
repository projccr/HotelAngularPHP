<?php require_once("./model/tipo.php"); ?>

<?php
class TipoController 
{
    
    private $atributos = array();
    //Variável do model

    public function __construct(){
        $this->tipo = new Tipo();
        //Verifica se o formulário foi enviado 
        $this->form_enviado();
        //Carrega a view adequada
        $this->view();
 
    }

    //Preenche o array $atributos com os atributos do cão encontrado
    public function form_enviado(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(!empty($_POST['nome'])){
                $this->atributos['nome'] = $_POST['nome'];
            }else{
                $this->atributos['nome'] = "";
            }

            if(!empty($_POST['preco'])){
                $this->atributos['preco'] = $_POST['preco'];
            }else{
                $this->atributos['preco'] = "";
            }

            if(!empty($_POST['status_quarto'])){
                $this->atributos['status_quarto'] = $_POST['status_quarto'];
            }else{
                $this->atributos['status_quarto'] = "";
            }

            if(!empty($_POST['id_do_quarto'])){
                $this->atributos['id_do_quarto'] = $_POST['id_do_quarto'];
            }else{
                $this->atributos['id_do_quarto'] = "";
            }

            if(!empty($_POST['descr'])){
                $this->atributos['descr'] = $_POST['descr'];
            }else{
                $this->atributos['descr'] = "";
            }

            //Chama o model para add o quarto
            if(isset($_GET['action']) && $_GET['action'] == 'add'){
                $this->tipo->add_tipo($this->atributos);
            }else if(isset($_GET['action']) && $_GET['action'] == 'edit'){
                $this->quarto->edita_quarto($this->atributos);
            }
            

            // header("Location: ?action=list");
        }
    
    }

    public function view(){

        if($_GET['action'] == 'add'){

            include('view/add.php');

        }else if($_GET['action'] == 'list'){
            $quartos = $this->tipo->lista_quartos();
            include('view/list.php');

        }else if($_GET['action'] == 'edit' && isset($_GET['id'])){
            $quarto = $this->tipo->get_quarto($_GET['id']);
            include('view/edit.php');
        }else if($_GET['action'] == 'delete' && isset($_GET['id']) ){

            $quartos = $this->tipo->deleta_quarto($_GET['id']);
            header("Location: ?action=list");

        }else{
            echo "DENIED";
            // header("Location: ../index.html");
        }
    }

}