<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/user.defined.css.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf854810_96656368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a8d1f1a15d9ca693dadf803350b14eb21658be2' => 
    array (
      0 => '/var/www/application/views/inc/user.defined.css.tpl',
      1 => 1609885970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75bf854810_96656368 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['customer_additional_css']->value)) {?> <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['customer_additional_css']->value;?>
"/> <?php }?> <link rel="stylesheet" href="./static/custom.css"/> <?php if (isset($_smarty_tpl->tpl_vars['customer_additonal_css_files']->value)) {?> <?php
$__section_i_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customer_additonal_css_files']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_4_total = $__section_i_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_4_total !== 0) {
for ($__section_i_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_4_iteration <= $__section_i_4_total; $__section_i_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['customer_additonal_css_files']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"/> <?php
}
}
?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['custom_css']->value) {
echo $_smarty_tpl->tpl_vars['custom_css']->value;
}
}
}
