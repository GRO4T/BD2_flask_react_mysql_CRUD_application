<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/alljs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf86b167_74628528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88ec8c13bdc7d6f1725cb820d7efca885d6c6bbc' => 
    array (
      0 => '/var/www/application/views/inc/alljs.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/alljs.inc.tpl' => 1,
    'file:inc/user.defined.js.tpl' => 1,
    'file:inc/inc.fontloader.tpl' => 1,
  ),
),false)) {
function content_600b75bf86b167_74628528 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'production')) {?> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 's_base');?>
/all.js?v=<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'buildid');?>
" crossorigin><?php echo '</script'; ?>
> <?php } else { ?> <?php $_smarty_tpl->_subTemplateRender("file:inc/alljs.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['use_thirdpart_cdn']->value) {?> <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" charset="utf-8"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-language_tools.js" charset="utf-8"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-beautify.js" charset="utf-8"><?php echo '</script'; ?>
> <?php } else { ?> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/ace/ace.js" charset="utf-8"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/ace/ext-language_tools.js" charset="utf-8"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/ace/ext-beautify.js" charset="utf-8"><?php echo '</script'; ?>
> <?php }?> <?php echo '<script'; ?>
 crossorigin src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/antd/antd-with-locales.min.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 crossorigin src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/layui/layui.all.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/dbface-helper.js" crossorigin><?php echo '</script'; ?>
> <?php $_smarty_tpl->_subTemplateRender("file:inc/user.defined.js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php if (isset($_smarty_tpl->tpl_vars['no_custom_js']->value) && $_smarty_tpl->tpl_vars['no_custom_js']->value) {?> <?php } else { ?> <?php if (!isset($_smarty_tpl->tpl_vars['ignore_custom_css']->value)) {?> <?php echo '<script'; ?>
 src="./static/custom.js"><?php echo '</script'; ?>
> <?php } else { ?> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/static/custom.js"><?php echo '</script'; ?>
> <?php }?> <?php }?> <?php echo '<script'; ?>
 type="text/javascript" src="?module=Files&action=custom_js" charset="utf-8"><?php echo '</script'; ?>
> <?php $_smarty_tpl->_subTemplateRender("file:inc/inc.fontloader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php echo '<script'; ?>
>if("serviceWorker" in navigator){window.addEventListener("load",function(){navigator.serviceWorker.register("sw.js").then(function(a){console.log("ServiceWorker registration successful with scope: ",a.scope)},function(a){console.log("ServiceWorker registration failed: ",a)})})};<?php echo '</script'; ?>
><?php }
}
