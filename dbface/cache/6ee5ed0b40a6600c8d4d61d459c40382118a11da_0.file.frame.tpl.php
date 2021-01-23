<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:55
  from '/var/www/application/views/new/frame.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75bf824bf3_43251338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ee5ed0b40a6600c8d4d61d459c40382118a11da' => 
    array (
      0 => '/var/www/application/views/new/frame.tpl',
      1 => 1609885970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/allcss.tpl' => 1,
    'file:inc/inc.notification.tpl' => 1,
    'file:new/menu.yaml.tpl' => 1,
    'file:skeleton.tpl' => 1,
    'file:inc/inc.log.viewer.tpl' => 1,
    'file:inc/alljs.tpl' => 1,
    'file:inc/inc.analytics.tpl' => 1,
  ),
),false)) {
function content_600b75bf824bf3_43251338 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
?>
<!DOCTYPE html> <html class="layout-pf layout-pf-fixed"> <head> <meta charset="UTF-8"> <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
</title> <?php $_smarty_tpl->_subTemplateRender("file:inc/allcss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </head> <body class="cards-pf"> <nav class="navbar navbar-pf-vertical navbar-pf-contextselector" id="global_navbar"> <div class="navbar-header"> <button type="button" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <span class="navbar-brand brand-font hidden-xs" id="logo" title="Logo"> <?php if (isset($_smarty_tpl->tpl_vars['custom_yaml_menu']->value) && isset($_smarty_tpl->tpl_vars['custom_yaml_menu']->value['title'])) {?> <span style="display:block;max-height:35px;"><?php echo $_smarty_tpl->tpl_vars['custom_yaml_menu']->value['title'];?>
</span> <?php } else { ?> <?php if (isset($_smarty_tpl->tpl_vars['customlogo']->value) && $_smarty_tpl->tpl_vars['customlogo']->value) {?> <span style="display:block;max-height:35px;"><?php echo $_smarty_tpl->tpl_vars['customlogo']->value;?>
</span> <?php } else { ?> <img title="Logo" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 's_base');?>
/website/dbface_logo.png"> <?php }?> <?php }?> </span> <div class="nav contextselector-pf hidden-sm" id="context_selector_parent"> <?php if (isset($_smarty_tpl->tpl_vars['context_selector']->value) && !empty($_smarty_tpl->tpl_vars['context_selector']->value)) {?> <select class="selectpicker" id="context_select_conn" data-live-search="true"> <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['context_selector']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <option value="<?php echo $_smarty_tpl->tpl_vars['context_selector']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['selected_context_id']->value == $_smarty_tpl->tpl_vars['context_selector']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['context_selector']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['title'];?>
</option> <?php
}
}
?> </select> <?php }?> </div> </div> <nav class="collapse navbar-collapse"> <ul class="nav navbar-nav navbar-right navbar-iconic"> <?php if (isset($_smarty_tpl->tpl_vars['show_purchse_btn']->value) && $_smarty_tpl->tpl_vars['show_purchse_btn']->value) {?> <li> <a class="nav-item-iconic" id="purchase_license_btn" href="https://www.paypal.me/dbface/549usd" target="_blank"></a> </li> <?php }?> <li style="display:none" id="waiting_widget_in_bar"> <a class="nav-item-iconic"> <div class="spinner spinner-inverse"></div> </a> </li> <li> <a class="nav-item-iconic" data-widget="app-search" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a> </li> <li> <a class="nav-item-iconic" id="global_filters"> <span class="pficon pficon-filter" title="Filters"></span> </a> </li> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0 || $_smarty_tpl->tpl_vars['login_permission']->value == 1) {?> <li> <a class="nav-item-iconic" id="view_app_log"> <span class="pficon pficon-thumb-tack-o" title="DbFace Logs"></span> </a> </li> <li> <a class="nav-item-iconic" href="javascript:;" onclick="open_sql_workshop('<?php echo $_smarty_tpl->tpl_vars['connid']->value;?>
');"> <span class="fab fa-creative-commons-nd" title="SQL Workshop"></span> </a> </li> <li> <a href="?module=Ide" title="Coding Workspace" target="_blank" class="nav-item-iconic"> <span class="fa fa-code" title="Coding Workspace"></span> </a> </li> <?php }?> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0) {?> <li> <a class="nav-item-iconic" onclick="return dbfaceMenu.onItemClick(this);" name="?module=Appbuilder&action=create&apptype=list" href="#module=Appbuilder&action=create&apptype=list"><i class="fa fa-plus" aria-hidden="true"></i></a> </li> <li> <a class="nav-item-iconic" onclick="return dbfaceMenu.onItemClick(this);" name="?module=Productbuilder" href="#module=Productbuilder"> <i class="pficon pficon-services" aria-hidden="true"></i> </a> </li> <?php }?> <li class="dropdown"> <a class="dropdown-toggle nav-item-iconic" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span title="<?php echo $_smarty_tpl->tpl_vars['login_username']->value;?>
" class="fas fa-user"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['login_username']->value;?>
 <span class="caret"></span> </a> <ul class="dropdown-menu" aria-labelledby="dropdownMenu3"> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0) {?> <li><a onclick="return dbfaceMenu.onItemClick(this);" name="?module=Account" href="#module=Account"><?php echo smarty_modifier_translate('strSubAccounts');?>
</a></li> <li><a onclick="return dbfaceMenu.onItemClick(this);" name="?module=Conn" href="#module=Conn"><?php echo smarty_modifier_translate('strConnections');?>
</a></li> <?php }?> <li><a onclick="return dbfaceMenu.onItemClick(this);" name="?module=Account&action=editprofile" href="#module=Account&action=editprofile"><?php echo smarty_modifier_translate('strSettings');?>
</a></li> <li role="separator" class="divider"></li> <li><a onclick="show_about_dialog();" href="javascript:;"><?php echo smarty_modifier_translate('strAbountDbFace');?>
</a></li> <li role="separator" class="divider"></li> <li><a href="?module=Logout"><?php echo smarty_modifier_translate('General_Logout');?>
</a></li> </ul> </li> </ul> <?php $_smarty_tpl->_subTemplateRender("file:inc/inc.notification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </nav> </nav> <div class="nav-pf-vertical nav-pf-vertical-with-sub-menus nav-pf-persistent-secondary hidden-xs"> <?php if (isset($_smarty_tpl->tpl_vars['custom_yaml_menu']->value) && isset($_smarty_tpl->tpl_vars['custom_yaml_menu']->value['apps'])) {?> <?php $_smarty_tpl->_subTemplateRender("file:new/menu.yaml.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php } else { ?> <ul class="list-group"> <li class="list-group-item active"> <a href="#module=Dashboard" name="?module=Dashboard" onclick="dbfaceMenu.onItemClick(this)"> <span class="fa fa-dashboard" data-toggle="tooltip" title="<?php echo smarty_modifier_translate('strDashboard');?>
"></span> <span class="list-group-item-value"><?php echo smarty_modifier_translate('strDashboard');?>
</span> </a> </li> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value != 9 && isset($_smarty_tpl->tpl_vars['tables']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 1 && !$_smarty_tpl->tpl_vars['enable_developer_datamodule']->value) {?> <?php } else { ?> <li class="list-group-item secondary-nav-item-pf"> <a> <span class="fa <?php if (isset($_smarty_tpl->tpl_vars['data_module_icon']->value)) {
echo $_smarty_tpl->tpl_vars['data_module_icon']->value;
} else { ?>fa-database<?php }?>" data-toggle="tooltip"></span> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Data');?>
</span> </a> <div id="datamodule-secondary" class="nav-pf-secondary-nav"> <div class="nav-item-pf-header"> <a class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a> <span><?php if (isset($_smarty_tpl->tpl_vars['default_data_category_name']->value)) {
echo $_smarty_tpl->tpl_vars['default_data_category_name']->value;
} else {
echo smarty_modifier_translate('Data');
}?></span> </div> <ul class="list-group"> <?php if ($_smarty_tpl->tpl_vars['tables']->value) {?> <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['tables']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <li class="list-group-item"> <a title="<?php echo $_smarty_tpl->tpl_vars['tables']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" href="?module=App&connid=<?php echo $_smarty_tpl->tpl_vars['connid']->value;?>
&viewname=<?php echo $_smarty_tpl->tpl_vars['tables']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" name="?module=App&connid=<?php echo $_smarty_tpl->tpl_vars['connid']->value;?>
&viewname=<?php echo $_smarty_tpl->tpl_vars['tables']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo $_smarty_tpl->tpl_vars['tables']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</span> </a> </li> <?php
}
}
?> <?php }?> </ul> </div> </li> <?php }?> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['favorite_apps']->value)) {?> <li class="list-group-item secondary-nav-item-pf" data-target="#favorite-secondary"> <a> <span class="fa fa-star" data-toggle="tooltip"></span> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Favorites');?>
</span> </a> <div id="favorite-secondary" class="nav-pf-secondary-nav"> <div class="nav-item-pf-header"> <a class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a> <span><?php echo smarty_modifier_translate('Favorites');?>
</span> </div> <ul class="list-group"> <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['favorite_apps']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <li class="list-group-item"> <a title="<?php echo $_smarty_tpl->tpl_vars['favorite_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="?module=App&appid=<?php echo $_smarty_tpl->tpl_vars['favorite_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1" name="?module=App&appid=<?php echo $_smarty_tpl->tpl_vars['favorite_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['favorite_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'])===null||$tmp==='' ? 'Untitled Application' : $tmp);?>
</span> </a> </li> <?php
}
}
?> </ul> </div> </li> <?php }?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryapps']->value, 'apps', false, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['apps']->value) {
?> <li class="list-group-item secondary-nav-item-pf" data-target="#app-secondary-<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
"> <a> <span data-category="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
" class="fa <?php if (isset($_smarty_tpl->tpl_vars['category_icons']->value[$_smarty_tpl->tpl_vars['category']->value])) {
echo $_smarty_tpl->tpl_vars['category_icons']->value[$_smarty_tpl->tpl_vars['category']->value];
} else { ?>fa-area-chart<?php }?>" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
"></span> <span class="list-group-item-value"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</span> </a> <div id="app-secondary-<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
" class="nav-pf-secondary-nav"> <div class="nav-item-pf-header"> <a class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a> <span><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</span> </div> <ul class="list-group"> <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['apps']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ((($_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['type'] == 'usermodule') {?> <li class="list-group-item"> <a title="<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" onclick="return dbfaceMenu.onItemClick(this);" name="?module=UserModule&mid=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
" href="#module=UserModule&mid=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
"> <span class="list-group-item-value"><?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</span> </a> </li> <?php } elseif ((($_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['type'] == 'ok_dashboard') {?> <li class="list-group-item"> <a title="<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" onclick="return dbfaceMenu.onItemClick(this);" name="?module=Ok&did=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['title'];?>
" href="#module=Ok&did=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['title'];?>
"> <span class="list-group-item-value"><?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 </span> </a> </li> <?php } else { ?> <li class="list-group-item"> <a title="<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" onclick="return dbfaceMenu.onItemClick(this);" name="?module=App&appid=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1" href="#module=App&appid=<?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1"> <span class="list-group-item-value"><?php echo $_smarty_tpl->tpl_vars['apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 </span> </a> </li> <?php }?> <?php
}
}
?> </ul> </div> </li> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0 || $_smarty_tpl->tpl_vars['login_permission']->value == 1) {?> <li class="list-group-item secondary-nav-item-pf" data-target="#settings-secondary"> <a> <span class="fa fa-cog" data-toggle="tooltip" title="<?php echo smarty_modifier_translate('General_Settings');?>
"></span> <span class="list-group-item-value"><?php echo smarty_modifier_translate('General_Settings');?>
</span> </a> <div id="-secondary" class="nav-pf-secondary-nav"> <div class="nav-item-pf-header"> <a class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a> <span><?php echo smarty_modifier_translate('General_Settings');?>
</span> </div> <ul class="list-group"> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0) {?> <li class="list-group-item"> <a href="?module=Conn" name="?module=Conn" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('strConnections');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Account" name="?module=Account" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('strSubAccounts');?>
</span> </a> </li> <?php }?> <li class="list-group-item"> <a href="?module=Dashboard&action=apps" name="?module=Dashboard&action=apps" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Applications');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=CategoryManager" name="?module=CategoryManager" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Category');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Parameters" name="?module=Parameters" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Parameters');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Remoteapi" name="?module=Remoteapi" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Remote API');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Code" name="?module=Code" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('CloudCode');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Hosting" name="?module=Hosting" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Hosting');?>
</span> </a> </li> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0) {?> <li class="list-group-item"> <a href="?module=Account&action=api_service" name="?module=Account&action=api_service" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('API Service');?>
</span> </a> </li> <?php }?> <?php if ($_smarty_tpl->tpl_vars['login_permission']->value == 0 && $_smarty_tpl->tpl_vars['self_host']->value) {?> <li class="list-group-item"> <a href="?module=CssEditor" name="?module=CssEditor" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Customization');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Snapshots" name="?module=Snapshots" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Snapshots');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Sessions" name="?module=Sessions" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Sessions');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Querystat" name="?module=Querystat" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Query Stats');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=AuditLog" name="?module=AuditLog" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Audit Log');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Terminal" name="?module=Terminal" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('XTerm');?>
</span> </a> </li> <li class="list-group-item"> <a href="?module=Admin&action=phpinfo" name="?module=Admin&action=phpinfo" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('PHP Information');?>
</span> </a> </li> <?php }?> <li class="list-group-item"> <a href="?module=Account&action=editprofile" name="?module=Account&action=editprofile" onclick="return dbfaceMenu.onItemClick(this);"> <span class="list-group-item-value"><?php echo smarty_modifier_translate('Settings_General');?>
</span> </a> </li> </ul> </div> </li> <?php }?> </ul> <?php }?> </div> <div class="container-fluid container-pf-nav-pf-vertical nav-pf-persistent-secondary no-padding right-side" id="content"> <section class="content-header"> <h1>&nbsp;</h1> </section> <section class="content"> <?php $_smarty_tpl->_subTemplateRender("file:skeleton.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </section> </div> <div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div> <?php $_smarty_tpl->_subTemplateRender("file:inc/inc.log.viewer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender("file:inc/alljs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php echo '<script'; ?>
>dbfaceMenu=new menu();var production="<?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'production')) {?>1<?php } else { ?>0<?php }?>";window.static_base_path="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 's_base');?>
";dbface=dbface||[];$(function(){dbfaceMenu=dbfaceMenu||new menu();dbfaceMenu.init();dbfaceMenu.loadFirstSection();broadcast.init();$().setupVerticalNavigation(true);$.post("?module=CoreHome&action=check_msg",function(a){if(a&&a!=""){$("#div_check_msg").remove();$(a).appendTo($("body")).fadeIn()}});$.post("?module=CoreHome&action=clean",function(a){},"json");$("#context_select_conn").selectpicker().change(function(){let context_id=$("#context_select_conn").val();if(!context_id){return}$.post("?module=CoreHome&action=change_context",{context_id:context_id},function(a){if(a.result=="ok"){let main_ele=$("section.content");let displayedAppId=main_ele.attr("data-main-appid");if(displayedAppId){broadcast.propagateAjax("module=App&appid="+displayedAppId+"&o=1",false)}}},"json")});$("a#global_filters").click(function(){let $drawer=$(".drawer-pf");if($drawer.hasClass("hide")){let params={};loadContentIntoDrawer("?module=Filter&action=get_global_filters",params)}else{$(".drawer-pf-close").trigger("click")}});$('a[data-widget="app-search"]').click(function(){let ele=$(this);$.post("?module=CoreHome&action=searchbox",function(a){ele.w2overlay({name:"search_overlay",selectable:false,openAbove:false,align:"right",html:a})})});$.get("?module=CoreHome&action=get_install_info",function(a){if(a&&a.result=="ok"){dbface=dbface||[];dbface.install_info=a.data}},"json")});<?php echo '</script'; ?>
> <?php $_smarty_tpl->_subTemplateRender('file:inc/inc.analytics.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </body> </html><?php }
}
