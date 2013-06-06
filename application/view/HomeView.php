<?php

class HomeView extends View {
    
    public function __construct($model) {
        parent::__construct($model);
    }
    
    public function output() {
        $this->pageTitle = 'Apache F&uacute;tbol Club - Inicio';
        
        $smarty = TemplateManager::get_smarty_instance();
        
        return $smarty->fetch('content_text.tpl.html');
    }
}

?>
