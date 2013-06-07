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
    }

    public function getRoute($route) {
        $route = strtolower($route);
        return $this->table[$route];
    }

}

class FrontController {

    private $controller;
    private $view;

    public function __construct($router, $routeName, $action = null) {
        $route = $router->getRoute($routeName);
        $modelName = $route->model;
        $controllerName = $route->controller;
        $viewName = $route->view;

        if ($modelName != null) {
            require Config::getValue('model', 'model.dir') . $modelName . '.php';
            $model = new $modelName;
        } else {
            $model = null;
        }

        if ($controllerName != null) {
            require Config::getValue('controller', 'controller.dir') . $controllerName . '.php';
            $this->controller = new $controllerName($model);
        }
        
        require Config::getValue('view', 'view.dir') . $viewName . '.php';
        $this->view = new $viewName($model);

        if (!empty($action))
            $this->controller->{$action}();
    }

    public function output() {
        $smarty = TemplateManager::get_smarty_instance();
        
        $smarty->assign('pageTitle', $this->view->pageTitle);
        $smarty->assign('styles', $this->view->styles);
        $smarty->assign('scripts', $this->view->scripts);
        
        $smarty->assign('logoTitle', $this->view->logoTitle);
        $smarty->assign('logoUrl', $this->view->logoUrl);
        
        $smarty->assign('content', $this->view->output());
        
        $smarty->display('main.tpl.html');
    }

}

?>
