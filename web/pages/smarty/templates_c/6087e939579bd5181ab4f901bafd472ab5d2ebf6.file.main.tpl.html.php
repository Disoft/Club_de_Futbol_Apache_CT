<?php /* Smarty version Smarty-3.1.10, created on 2013-06-10 04:12:41
         compiled from "web\pages\smarty\templates\main.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:417751b018af91bd74-45413849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6087e939579bd5181ab4f901bafd472ab5d2ebf6' => 
    array (
      0 => 'web\\pages\\smarty\\templates\\main.tpl.html',
      1 => 1370837558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '417751b018af91bd74-45413849',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_51b018afa5ac71_83284727',
  'variables' => 
  array (
    'pageTitle' => 0,
    'styles' => 0,
    'stylesheet' => 0,
    'scripts' => 0,
    'script' => 0,
    'logoTitle' => 0,
    'logoUrl' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b018afa5ac71_83284727')) {function content_51b018afa5ac71_83284727($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value){
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
" type="text/css"/>
        <?php } ?>
        <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
        <script src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"></script>
        <?php } ?>
    </head>
    <body>
        <div id="dv_wrapper">
            <div id="dv_header">
                <img id="img_logo" title="<?php echo $_smarty_tpl->tpl_vars['logoTitle']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['logoUrl']->value;?>
">
            </div>
            <div id="dv_container">
                <div id="dv_left">
                        <ul>
                            <li><a title="Inicio" href="#">Inicio</a></li>
                            <li><a title="Historia" href="#">Historia</a></li>
                        </ul>
                    </div>
                </div>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['content']->value)===null||$tmp==='' ? '' : $tmp);?>

            <div id="dv_footer">
                2013 - Apache F&uacute;tbol Club. Todos los derechos reservados.
            </div>
        </div>
    </body>
</html><?php }} ?>