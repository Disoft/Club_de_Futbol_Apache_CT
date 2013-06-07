<?php

abstract class View {

    protected $model;
    
    public $pageTitle;
    public $styles;
    public $scripts;
    public $logoTitle;
    public $logoUrl;

    public function __construct($model) {
        $this->model = $model;
        
        $this->pageTitle = '';
        
        /* default styles */
        $this->styles = array();
        $this->styles[] = Config::getValue('dir', 'base.dir') . Config::getValue('dir', 'css.dir') . 'main_layout.css';
        
        /* default scripts */
        $this->scripts = array();
        $this->scripts[] = Config::getValue('dir', 'base.dir') . Config::getValue('jquery', 'jquery.js');
        
        $this->logoTitle = 'Apache F&uacute;tbol Club Logo';
        
        $this->logoUrl = Config::getValue('dir', 'img.dir') . 'logo_400x150.png';
    }

    public abstract function output();
}

?>
