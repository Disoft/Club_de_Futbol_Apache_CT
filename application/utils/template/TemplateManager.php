<?php

class TemplateManager {

    private function __construct() {
        
    }

    public static function get_smarty_instance() {
        $smarty = new Smarty();

        $smarty->setTemplateDir(Config::getValue('smarty', 'template.dir'));
        $smarty->setCompileDir(Config::getValue('smarty', 'compile.dir'));
        $smarty->setCacheDir(Config::getValue('smarty', 'cache.dir'));
        $smarty->setConfigDir(Config::getValue('smarty', 'config.dir'));

        return $smarty;
    }

}

?>