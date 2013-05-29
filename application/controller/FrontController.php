<?php

class Route {

    public $model;
    public $view;
    public $controller;

    public function __construct($model, $view, $controller) {
        $this->model = $model;
        $this->view = $view;
        $this->controller = $controller;
    }

}

class Router {

    private $table = array();

    public function __construct() {
        $this->table['home'] = new Route(null, 'HomeView', null);
        $this->table['login'] = new Route('UserModel', 'LoginView', 'LoginController');
    }

    public function getRoute($route) {
        $route = strtolower($route);
        return $this->table[$route];
    }

}

class FrontController {

    private $controller;
    private $view;

    public function __construct(Router $router, $routeName, $action = null) {
        $route = $router->getRoute($routeName);
        $modelName = $route->model;
        $controllerName = $route->controller;
        $viewName = $route->view;

        if ($modelName != null) {
            require 'classes/model/' . $modelName . '.php';
            $model = new $modelName;
        } else {
            $model = null;
        }

        if ($controllerName != null) {
            require 'classes/controller/' . $controllerName . '.php';
            $this->controller = new $controllerName($model);
        }
        
        require 'classes/view/' . $viewName . '.php';
        $this->view = new $viewName($routeName, $model);

        if (!empty($action))
            $this->controller->{$action}();
    }

    public function output() {
        $smarty = TemplateUtils::get_smarty_instance();

        $smarty->assign('content', $this->view->output());
        
        $smarty->assign('pageTitle', $this->view->pageTitle);
        $smarty->assign('styles', $this->view->styles);
        $smarty->assign('scripts', $this->view->scripts);
        if(($this->view->accountHref != '') && ($this->view->accountHref != '')) {
            $smarty->assign('accountHref', $this->view->accountHref);
            $smarty->assign('accountLink', $this->view->accountLink);
        }

        $smarty->display('main.tpl.html');
    }

}

?>
