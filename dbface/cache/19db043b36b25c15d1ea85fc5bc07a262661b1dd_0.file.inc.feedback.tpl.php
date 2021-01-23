<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:56
  from '/var/www/application/views/console_home/inc.feedback.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75c08c02f8_33259854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19db043b36b25c15d1ea85fc5bc07a262661b1dd' => 
    array (
      0 => '/var/www/application/views/console_home/inc.feedback.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75c08c02f8_33259854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
?>
<section> <div class="awsui-util-container sideBarCard"> <div class="awsui-util-container-header"> <h2><?php echo smarty_modifier_translate('HomeFeedbackTitle');?>
</h2> </div> <div class="sideBarCard-section-with-icon"> <div> <div class="sideBarCard-section-icon feedbackCard-sideBarCard-section-icon"> <span> <i class="far fa-paper-plane fa-3x"></i> </span> </div> <div> <p class="sideBarCard-section-detail"><?php echo smarty_modifier_translate('HomeFeedbackDesc');?>
</p> </div> </div> </div> </div> </section><?php }
}
