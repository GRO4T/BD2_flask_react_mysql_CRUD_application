<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/inc.log.viewer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf85eac2_84311596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86de23c7af56e5999630304ab35ee4bf30ede12e' => 
    array (
      0 => '/var/www/application/views/inc/inc.log.viewer.tpl',
      1 => 1609885970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75bf85eac2_84311596 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>$(function(){$("#view_app_log").click(function(){loadContentIntoDrawer("?module=Log&action=log_app",{})})});<?php echo '</script'; ?>
><?php }
}
