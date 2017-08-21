<?php
/* Smarty version 3.1.30, created on 2017-08-21 11:45:19
  from "/var/www/Webasyst/views/default/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599a9d9f560e99_53741398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0474dae7bc9e9fc327e742e7c790de67af1a001' => 
    array (
      0 => '/var/www/Webasyst/views/default/header.tpl',
      1 => 1503305118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599a9d9f560e99_53741398 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <?php echo '<script'; ?>
 src="/templates/js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/js/jquery.validate.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/js/main.js"><?php echo '</script'; ?>
>

    <link href="/templates/css/style.css" rel="stylesheet">
</head>
<body>


<?php }
}
