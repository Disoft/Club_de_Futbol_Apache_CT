<?php

session_start();

require_once 'config/Config.php';
require_once Config::get_value('adodb', 'adodb.inc.php');
require_once Config::get_value('dbconnection', 'MySqlConnectionManager.php');
require_once Config::get_value('smarty', 'Smarty.class.php');
require_once Config::get_value('template', 'TemplateUtils.php');
require_once 'classes/model/DataAccessModel.php'; /* General model class. */
require 'classes/controller/FrontController.php'; /* Application front controller. */

if (!isset($_GET['route'])) {
    $_GET['route'] = 'home';
}

$frontController = new FrontController(new Router(), $_GET['route'], isset($_GET['action']) ? $_GET['action'] : null);
echo $frontController->output();
?>