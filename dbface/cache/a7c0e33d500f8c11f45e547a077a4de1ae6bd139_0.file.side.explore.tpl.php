<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:56
  from '/var/www/application/views/console_home/side.explore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75c08bc9c5_21295102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c0e33d500f8c11f45e547a077a4de1ae6bd139' => 
    array (
      0 => '/var/www/application/views/console_home/side.explore.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75c08bc9c5_21295102 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
?>
<div class="awsui-util-container"> <div class="awsui-util-container-header"> <h2><?php echo smarty_modifier_translate('Explore DbFace');?>
</h2> </div> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value === 0) {?> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Connect Data Source');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeConnectDataSourceDesc');?>
</span> <a class="link-spacer link-external" href="#module=Conn&action=create" name="?module=Conn&action=create" onclick="return dbfaceMenu.onItemClick(this);"><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('strSubAccounts');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeSubAccountDesc');?>
</span> <a class="link-spacer link-external" href="#module=Account" name="?module=Account" onclick="return dbfaceMenu.onItemClick(this);" title=""><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <?php }?> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('CloudCode');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCloudCodeDesc');?>
</span> <a class="link-spacer link-external" href="#module=Code" name="?module=Code" onclick="return dbfaceMenu.onItemClick(this);"> <span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> </div><?php }
}
