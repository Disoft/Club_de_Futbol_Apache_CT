<?php

session_start();

require_once 'config/Config.php';
require_once Config::getValue('smarty', 'Smarty.class.php');
require_once Config::getValue('template', 'TemplateManager.php');
require_once Config::getValue('view', 'View.php');
require_once Config::getValue('controller', 'FrontController.php');


if (!isset($_GET['route'])) {
    $_GET['route'] = 'home';
}

$frontController = new FrontController(new Router(), $_GET['route'], isset($_GET['action']) ? $_GET['action'] : null);
echo $frontController->output();

?>