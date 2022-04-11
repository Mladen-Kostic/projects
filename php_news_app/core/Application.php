<?php
    namespace app\core;
    class Application {
        public string $layout = 'main';
        public string $category = 'all';

        public Database $db;
        public View $view;
        public Router $router;
        public Request $request;
        public Response $response;
        public $user = null;
        public Session $session;

        public static Application $app;
        public ?Controller $controller = null;
        public static string $ROOT_DIR;

        public function __construct($rootPath) {
            self::$ROOT_DIR = $rootPath;
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);
            $this->session = new Session();
            
            $this->db = new Database();
            $this->view = new View();

            $primaryValue = $this->session->get('user');

            $this->user = $this->db->appGetUser($primaryValue);

            self::$app = $this;
        }


        public function run() {
            echo $this->router->resolve();
        }

        public function getController(): \app\core\Controller {
            return $this->controller;
        }

        public function setController(\app\core\Controller $controller): void {
            $this->controller = $controller;
        }

        public function login(DbModel $user) {
            $this->user = $user;
            $primaryKey = $user->primaryKey();
            $primaryValue = $user->{$primaryKey};
            
            $this->session->set('user', $primaryValue);
            $this->session->setFlash('success', 'Logged in successfully!');
            return true;
        }

        public function logout() {
            $this->user = null;
            $this->session->remove('user');
        }

    }