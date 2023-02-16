<?php 

    namespace App\Controllers;

    use DHF\Controller\Action;
    use App\Connection;
    use App\Models\Produto;

    class IndexController extends Action{

            public function index() {
                //$this->view->dados = array('Sofá', 'Cadeira', 'Cama');

                // instância da conexão
                // Por ser um método statico é possível chamalo sem criar a classe:

                $connection = Connection::getDb();
                // instanciar modelo
                $produto = new Produto($connection);

                $produtos = $produto->getProdutos();

                $this->view->dados = $produtos;

                $this->render('index', 'layout1');
            }
            public function sobreNos() {
                //$this->view->dados = array('Notebook', 'Smartphone');
                $this->render('index', 'layout2');
            }

        }
?>