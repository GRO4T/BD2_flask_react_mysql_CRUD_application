<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:56
  from '/var/www/application/views/console_home/all_apps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75c08a0c00_69370480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8091a371dfeb89df90f9367ebac4acdd8fd33fa' => 
    array (
      0 => '/var/www/application/views/console_home/all_apps.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600b75c08a0c00_69370480 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
?>
<div class="collapsible-section" id="allServices"> <awsui-expandable-section> <div class="awsui-expandable-section"> <div class="awsui-expandable-section-header awsui-expandable-section-header-borderless awsui-expandable-section-header-expanded" tabindex="0" role="link" aria-controls="awsui-expandable-section-1" aria-expanded="true"> <span class="awsui-expandable-section-header-icon awsui-expandable-section-header-icon-borderless"> <awsui-icon initialized="true"> <span class="awsui-icon awsui-icon-size-normal awsui-icon-variant-normal"> <i class="fas fa-angle-down"></i> </span> </awsui-icon> </span> <div awsui-expandable-section-region="header"> <span><h4><?php echo smarty_modifier_translate('All Applications');?>
</h4></span> </div> </div> <div id="awsui-expandable-section-1" role="region" awsui-expandable-section-region="content" class="awsui-expandable-section-content awsui-expandable-section-content-borderless awsui-expandable-section-content-expanded"> <span> <div class="collapsible-section-items"> <awsui-column-layout class="awsui-column-layout-home services"> <div class="awsui-column-layout-columns-1 awsui-column-layout-variant-default" awsui-column-layout-region="content"> <span> <div data-awsui-column-layout-root="true"> <div class="all-services-column services-column home-column"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryapps']->value, 'categoryapp', false, 'categoryname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categoryname']->value => $_smarty_tpl->tpl_vars['categoryapp']->value) {
?> <article class="service-group-container home-column-item"> <div class="service-group"> <ul class="service-list"> <li> <h4 class="service-group-heading"><?php echo $_smarty_tpl->tpl_vars['categoryname']->value;?>
</h4> </li> <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['categoryapp']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?> <li class="service-list-item" id="all-services-item-ec2"> <?php if ((($_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] == 'usermodule') {?> <a href="?module=UserModule&mid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
" name="#module=UserModule&mid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
&o=1" onclick="return dbfaceMenu.onItemClick(this);" title="<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
</span> </a> <?php } elseif ((($_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] == 'notebook') {?> <a href="?module=Notebook&action=edit&appid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
" name="#module=Notebook&action=edit&appid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
" onclick="return dbfaceMenu.onItemClick(this);" title="<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
</span> </a> <?php } elseif ((($_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] == 'ok_query') {?> <a href="?module=Analytize&action=edit&qid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['title'];?>
" name="#module=Analytize&action=edit&qid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['title'];?>
" onclick="return dbfaceMenu.onItemClick(this);" title="<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
</span> </a> <?php } elseif ((($_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] !== null )) && $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['type'] == 'ok_dashboard') {?> <a href="?module=Ok&did=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['title'];?>
" name="#module=Ok&did=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['title'];?>
" onclick="return dbfaceMenu.onItemClick(this);" title="<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
</span> </a> <?php } else { ?> <a href="?module=App&appid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
&o=1" name="#module=App&appid=<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['appid'];?>
&o=1" onclick="return dbfaceMenu.onItemClick(this);" title="<?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['categoryapp']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
</span> </a> <?php }?> </li> <?php
}
}
?> </ul> </div> </article> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </div> </div> </span></div> </awsui-column-layout> </div> </span> </div> </div> </awsui-expandable-section> </div><?php }
}
