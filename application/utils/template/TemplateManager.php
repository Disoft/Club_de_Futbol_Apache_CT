<?php

class TemplateManager {

    private function __construct() {
        
    }

    public static function get_smarty_instance() {
        $smarty = new Smarty();

        $smarty->setTemplateDir(Config::get_value('smarty', 'template.dir'));
        $smarty->setCompileDir(Config::get_value('smarty', 'compile.dir'));
        $smarty->setCacheDir(Config::get_value('smarty', 'cache.dir'));
        $smarty->setConfigDir(Config::get_value('smarty', 'config.dir'));

        return $smarty;
    }

}

?>