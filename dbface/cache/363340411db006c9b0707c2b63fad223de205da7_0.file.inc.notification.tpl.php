<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/inc/inc.notification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf8584c4_11787735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '363340411db006c9b0707c2b63fad223de205da7' => 
    array (
      0 => '/var/www/application/views/inc/inc.notification.tpl',
      1 => 1609885970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75bf8584c4_11787735 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="drawer-pf hide drawer-pf-notifications"> <div class="drawer-pf-title"> <a class="drawer-pf-toggle-expand fa fa-angle-double-left hidden-xs"></a> <a class="drawer-pf-close pficon pficon-close"></a> <h3 class="text-center">&nbsp;</h3> </div> <div class="panel-group" id="notification-drawer-accordion"></div> </div> <?php echo '<script'; ?>
>$(function(){$(".drawer-pf-close").click(function(){var a=$(".drawer-pf");a.addClass("hide")});$(".drawer-pf-toggle-expand").click(function(){var b=$(".drawer-pf");var a=b.find(".drawer-pf-notification");if(b.hasClass("drawer-pf-expanded")){b.removeClass("drawer-pf-expanded");a.removeClass("expanded-notification")}else{b.addClass("drawer-pf-expanded");a.addClass("expanded-notification")}});$("#notification-drawer-accordion").initCollapseHeights(".panel-body");$(".drawer-pf").draggable({handle:$("div.drawer-pf-title",".drawer-pf")})});<?php echo '</script'; ?>
><?php }
}
