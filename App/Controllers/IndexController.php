<?php 
    namespace App\Controllers;

use stdClass;

class IndexController{

        private $view;

        public function __construct(){
            $this->view = new stdClass();
        }

        public function index() {
            $this->view->dados = array('Sofá', 'Cadeira', 'Cama');
            $this->render('index');
        }
        public function sobreNos() {
            $this->view->dados = array('Notebook', 'Smartphone');
            $this->render('index');
        }

        public function render($view){
            $classAtual = get_class($this);
            $classAtual = str_replace('App\\Controllers\\', '', $classAtual);
            $classAtual =  strtolower( str_replace('Controller', '', $classAtual));
            echo get_class($this);
            require_once "../App/Views/".$classAtual."/".$view.".phtml";
        }
    }
?>