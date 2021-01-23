<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/allcss.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf840e50_70708957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a71e01d5aa6130f07d89ea8559b55f041ca31065' => 
    array (
      0 => '/var/www/application/views/inc/allcss.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/sitemeta.tpl' => 1,
    'file:inc/fonts.css.tpl' => 1,
    'file:inc/allcss.inc.tpl' => 1,
    'file:inc/user.defined.css.tpl' => 1,
    'file:inc/inc.html.head.tpl' => 1,
  ),
),false)) {
function content_600b75bf840e50_70708957 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/sitemeta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender("file:inc/fonts.css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css" rel="stylesheet"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/> <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/antd/antd.min.css"/> <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/layui/css/layui.css"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet"> <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'production')) {?> <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/patternfly/css/patternfly.css"> <?php } else { ?> <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/patternfly/css/patternfly.css"> <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/patternfly/css/patternfly-additions.css"> <?php }?> <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/bootstrap3-editable/css/bootstrap-editable.css"/> <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'production')) {?> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/theme/css/dbface.css?v=<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'buildid');?>
" rel="stylesheet" type="text/css"/> <?php } else { ?> <?php $_smarty_tpl->_subTemplateRender("file:inc/allcss.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }?> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/bootstrap/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/fullcalendar/fullcalendar.min.css" rel="stylesheet"/> <link href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/theme/css/iCheck/all.css" rel="stylesheet"/> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/jquery/jquery-2.2.4.min.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/jquery/jquery-ui.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/vue.min.js"><?php echo '</script'; ?>
> <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/leaflet/leaflet.css"/> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/leaflet/leaflet.js"><?php echo '</script'; ?>
> <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/summernote/summernote.css"/> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/summernote/summernote.min.js"><?php echo '</script'; ?>
> <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/handsontable/handsontable.full.min.css"/> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/handsontable/handsontable.full.min.js"><?php echo '</script'; ?>
> <?php $_smarty_tpl->_subTemplateRender("file:inc/user.defined.css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <link rel="stylesheet" href="?module=Files&action=custom_css"/> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/i18n.js"><?php echo '</script'; ?>
> <?php echo '<script'; ?>
>var dbfaceMenu;var dbface=[];dbface.userAccess="admin";dbface.static_url="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 's_base');?>
";var site_lang="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'site_language');?>
";i18n.locale=site_lang;$(function(){$.getScript("?module=CoreHome&action=load_custom_js")});<?php echo '</script'; ?>
> <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'assets_base_url');?>
/libs/locales/locales.js"><?php echo '</script'; ?>
> <?php $_smarty_tpl->_subTemplateRender("file:inc/inc.html.head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
