<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:56
  from '/var/www/application/views/console_home/side.createapp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75c08b2247_39625108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f377658e43b7c5981e978956e2e6f0852afd5a1' => 
    array (
      0 => '/var/www/application/views/console_home/side.createapp.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75c08b2247_39625108 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
?>
<div class="awsui-util-container"> <div class="awsui-util-container-header"> <h2><?php echo smarty_modifier_translate('homeBuildApplicationTitle');?>
</h2> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Applications');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCreateApplicationDesc');?>
</span> <a class="link-spacer link-external" href="#module=Appbuilder&action=create&apptype=list" name="?module=Appbuilder&action=create&apptype=list" onclick="return dbfaceMenu.onItemClick(this);"><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Query');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCreateQueryDesc');?>
</span> <a class="link-spacer link-external" href="#module=Analytize&action=create" name="?module=Analytize&action=create" onclick="return dbfaceMenu.onItemClick(this);"><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Query Dashboard');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCreateQueryDashboardDesc');?>
</span> <a class="link-spacer link-external" href="#module=Openkit&action=create_dashboard" name="?module=Openkit&action=create_dashboard" onclick="return dbfaceMenu.onItemClick(this);"><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Notebook');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCreateNotebookDesc');?>
</span> <a class="link-spacer link-external" href="#module=Notebook&action=create" name="?module=Notebook&action=create" onclick="return dbfaceMenu.onItemClick(this);" title=""> <span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> <div class="sidebar-section-item"> <div class="sidebar-section-container"> <h4><?php echo smarty_modifier_translate('Bundle Product');?>
</h4> <p> <span> </span><span><?php echo smarty_modifier_translate('HomeCreateBundleProductDesc');?>
</span> <a class="link-spacer link-external" href="#module=Productbuilder" name="?module=Productbuilder" onclick="return dbfaceMenu.onItemClick(this);"><span><?php echo smarty_modifier_translate('General_GetStarted');?>
</span> </a><span> </span></p> </div> </div> </div><?php }
}
