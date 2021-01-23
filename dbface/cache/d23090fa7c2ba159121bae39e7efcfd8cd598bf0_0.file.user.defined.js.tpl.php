<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/user.defined.js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf86f766_00638749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd23090fa7c2ba159121bae39e7efcfd8cd598bf0' => 
    array (
      0 => '/var/www/application/views/inc/user.defined.js.tpl',
      1 => 1609885970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75bf86f766_00638749 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['customer_additonal_js_files']->value)) {?> <?php
$__section_i_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customer_additonal_js_files']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_5_total = $__section_i_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_5_total !== 0) {
for ($__section_i_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_5_iteration <= $__section_i_5_total; $__section_i_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['customer_additonal_js_files']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" charset="utf-8"><?php echo '</script'; ?>
> <?php
}
}
?> <?php }
}
}
