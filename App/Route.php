<? 
    namespace App;
    class Route{
        private $routes;

        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        public function getRoutes(){
            return $this->routes;
        }
        public function setRoutes(array $routes){
            $this->routes = $routes;
        }

        public function initRoutes(){
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' =>  'index'
            );

            $routes['sobre_nos']= array(
                'route' => '/sobre_nos',
                'controller' => 'indexController',
                'action' => 'sobreNos'
            );

            $this->setRoutes($routes);
        }

        public function run($url){
            foreach($this->getRoutes() as $path => $route){
                if($url == $route['route']){
                    $class = "App\\Controllers\\".ucfirst($route['controller']);
                    
                    // instanciando uma classe de forma din�mica
                    $controller = new $class;
                    // chamando uma fun��o de forma din�mina na classe din�mica
                    $action = $route['action'];
                    // usando o valor contido na variavel action para chamar uma fun��o
                    $controller->$action() ;

                }
            }
        }

        function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }
?>