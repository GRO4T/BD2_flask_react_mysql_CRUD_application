<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 01:02:56
  from '/var/www/application/views/console_home/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600b75c0875d91_24528225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ca157bad42bfb403d78ead40b0fbc9bbc4af48d' => 
    array (
      0 => '/var/www/application/views/console_home/index.tpl',
      1 => 1609885968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:console_home/all_apps.tpl' => 1,
    'file:console_home/side.createapp.tpl' => 2,
    'file:console_home/side.explore.tpl' => 2,
    'file:console_home/inc.feedback.tpl' => 1,
  ),
),false)) {
function content_600b75c0875d91_24528225 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/application/libraries/Smarty/libs/plugins/modifier.translate.php','function'=>'smarty_modifier_translate',),));
if (isset($_smarty_tpl->tpl_vars['home_did']->value) && !empty($_smarty_tpl->tpl_vars['home_did']->value)) {?> <div data-console-did="<?php echo $_smarty_tpl->tpl_vars['home_did']->value;?>
"></div> <?php }?> <div class="awsui"> <div class="home-content awsui-grid awsui-util-ph-l awsui-util-pv-xxl"> <div class="awsui-row"> <div class="col-xxs-12 col-s-8 col-l-9 col-xl-10"> <div class="awsui-util-container" id="aws-services"> <div id="aws-services-container-search"> <div id="search-box"> <i class="fas fa-search" style="position:absolute;opacity:0.5;z-index: 1000;padding:8px"></i> <input autocomplete="off" class="awsui-input awsui-input-type-search" id="search-box-input" role="textbox" aria-autocomplete="list" aria-controls="search-box-input-dropdown" type="search" placeholder="<?php echo smarty_modifier_translate("AppSearchBoxPlaceHolder");?>
"> </div> </div> <div id="awsgnav"> <div class="collapsible-section" id="recentServices"> <awsui-expandable-section initialized="true"> <div class="awsui-expandable-section"> <div class="awsui-expandable-section-header awsui-expandable-section-header-borderless awsui-expandable-section-header-expanded" tabindex="0" role="link" aria-controls="awsui-expandable-section-0" aria-expanded="true"> <span class="awsui-expandable-section-header-icon awsui-expandable-section-header-icon-borderless"> <awsui-icon initialized="true"> <span class="awsui-icon awsui-icon-size-normal awsui-icon-variant-normal"> <i class="fas fa-angle-down"></i> </span> </awsui-icon> </span> <div awsui-expandable-section-region="header"> <span> <h4><?php echo smarty_modifier_translate('Recently visited applications');?>
</h4> </span> </div> </div> <div id="awsui-expandable-section-0" role="region" awsui-expandable-section-region="content" class="awsui-expandable-section-content awsui-expandable-section-content-borderless awsui-expandable-section-content-expanded"> <span> <div class="collapsible-section-items"> <awsui-column-layout id="recent-services" class="awsui-column-layout-home services"> <div class="awsui-column-layout-columns-1 awsui-column-layout-variant-default" awsui-column-layout-region="content"> <span> <div data-awsui-column-layout-root="true"> <div class="recent-services-column services-column home-column"> <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['history_apps']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <article class="service-group-container home-column-item"> <div class="service-group-icon ico-compute" type="icon">&nbsp; </div> <a class="service-name" href="#module=App&appid=<?php echo $_smarty_tpl->tpl_vars['history_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1" name="?module=App&appid=<?php echo $_smarty_tpl->tpl_vars['history_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['appid'];?>
&o=1" onclick="return dbfaceMenu.onItemClick(this);"> <span><?php echo $_smarty_tpl->tpl_vars['history_apps']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['message'];?>
</span> </a> </article> <?php
}
}
?> </div> </div> </span> </div> </awsui-column-layout> </div> </span> </div> </div> </awsui-expandable-section> </div> </div> <div id="awsgnav"> <?php $_smarty_tpl->_subTemplateRender("file:console_home/all_apps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </div> <div class="awsui-util-container-footer"> <a id="learnToBuildCard" class="link-external" href="?module=Dashboard&action=apps" name="?module=Dashboard&action=apps" onclick="return dbfaceMenu.onItemClick(this);"> <span><?php echo smarty_modifier_translate('All Applications');?>
</span> </a> </div> </div> </div> <div class="col-xxs-12 col-s-4 col-l-3 col-xl-2"> <section class="sidebar" id="side_bar"> <div class="awsui-util-container sideBarCard" id="accessResourcesCard"> <div class="awsui-util-container-header"> <h2><?php echo smarty_modifier_translate('Access applications');?>
</h2> </div> <div class="sideBarCard-section-with-icon"> <div> <div class="sideBarCard-section-icon"> <span><i class="fas fa-desktop fa-3x"></i></span> </div> <div> <p class="sideBarCard-section-detail"><?php echo smarty_modifier_translate('homeAccessAppsDesc');?>
</p> <a id="link_access_resources_mobile_app" class="link-spacer link-external" href="#module=Dashboard&action=apps" name="?module=Dashboard&action=apps" onclick="return dbfaceMenu.onItemClick(this);"> <span><?php echo smarty_modifier_translate('See All');?>
</span> </a> </div> </div> </div> </div> <?php if (count($_smarty_tpl->tpl_vars['conns']->value) > 0) {?> <?php $_smarty_tpl->_subTemplateRender("file:console_home/side.createapp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender("file:console_home/side.explore.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php } else { ?> <?php $_smarty_tpl->_subTemplateRender("file:console_home/side.explore.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?> <?php $_smarty_tpl->_subTemplateRender("file:console_home/side.createapp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?> <?php }?> <?php $_smarty_tpl->_subTemplateRender("file:console_home/inc.feedback.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </section> </div> </div> </div> </div> <?php echo '<script'; ?>
>$(function(){$("div.awsui-expandable-section-header").click(function(){var b=$(this).parents("div.collapsible-section");if(b.hasClass("collapsible-section-collapsed")){var c=$(this).parents("div.awsui-expandable-section");c.find('div[awsui-expandable-section-region="content"]').addClass("awsui-expandable-section-content-expanded");$(this).parents("div.collapsible-section").removeClass("collapsible-section-collapsed");$(this).find("i").attr("class","fas fa-angle-down")}else{var c=$(this).parents("div.awsui-expandable-section");c.find('div[awsui-expandable-section-region="content"]').removeClass("awsui-expandable-section-content-expanded");$(this).parents("div.collapsible-section").addClass("collapsible-section-collapsed");$(this).find("i").attr("class","fas fa-angle-right")}});var a=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.obj.whitespace("value"),queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:{url:"?module=AppManager&action=list_json",cache:false}});$("#search-box-input").typeahead({minLength:0,highlight:true,hint:true},{name:"app-search-list",display:"value",limit:20,source:function(c,b){if(c===""){b(a.all())}else{a.search(c,b)}}}).on("typeahead:select",function(b,c){broadcast.propagateAjax("module=App&appid="+c.appid+"&o=1",false)});let console_did=$("div[data-console-did]");if(console_did.length>0){$.post("?module=Ok&embed=1&did="+console_did.attr("data-console-did"),function(b){console_did.html(b)})}});<?php echo '</script'; ?>
><?php }
}
