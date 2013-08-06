<?php WoW_Template::LoadTemplate('block_header'); ?>
<body class="<?php echo sprintf('%s%s', WoW_Locale::GetLocale(LOCALE_DOUBLE), WoW_Account::IsLoggedIn() ? ' logged-in' : null); ?>">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<div id="search-bar">
<form action="<?php echo WoW::GetWoWPath(); ?>/search" method="get" id="search-form">
<div>
<input type="text" name="q" id="search-field" value="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" maxlength="35" alt="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" tabindex="50" accesskey="q" />
<input type="submit" id="search-button" value="" title="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" tabindex="50" />
</div>
</form>
</div>
<h1 id="logo"><a href="<?php echo WoW::GetWoWPath(); ?>/<?php echo WoW_Locale::GetLocale(); ?>/" tabindex="50" accesskey="h">Battle.net</a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2 class="isolated"><?php echo WoW_Locale::GetString('template_management_account_creation'); ?></h2>
<span class="clear"><!-- --></span>
</div>
<span class="clear"></span>
</div>
</div>
<?php WoW_Template::LoadTemplate('block_service', true); ?>
</div>
</div>
<?php
switch(WoW_Template::GetPageIndex()) {
    case 'management':
        WoW_Template::LoadTemplate('content_management');
        break;
    case 'dashboard':
        WoW_Template::LoadTemplate('content_dashboard');
        break;
    case 'creation_tos':
        WoW_Template::LoadTemplate('content_creation_tos');
        break;
    case 'creation_success':
        WoW_Template::LoadTemplate('content_creation_success');
        break;
    case 'add_game':
        WoW_Template::LoadTemplate('content_add_game');
        break;
}
?>
<div id="layout-bottom">
<div class="wrapper">
<?php WoW_Template::LoadTemplate('block_footer', true); ?>
</div>
</div>
<?php WoW_Template::LoadTemplate('block_js_messages', true); ?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/js/bam.js?v19"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/tooltip.js?v17"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/menu.js?v17"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = '<?php echo WoW::GetWoWPath(); ?>/data/i18n.frag';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery.pngFix.pack.js?v17"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<?php
switch(WoW_Template::GetPageIndex()) {
    case 'management':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/management/lobby.js?v19"></script>';
        break;
    case 'dashboard':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/local-common/js/third-party/swfobject.js?v17"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/management/dashboard.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/management/wow/dashboard.js?v19"></script>';
        break;
    case 'creation_tos':
    case 'creation_success':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/inputs.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/account-creation/streamlined-creation.js?v19"></script>';
        break;
    case 'add_game':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/management/add-game.js?v19"></script>';
        break;
}
?>

<script type="text/javascript">
//<![CDATA[
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/overlay.js?v17");
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/search.js?v17");
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v17");
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery.mousewheel.min.js?v17");
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v17");
Core.load("<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/login.js?v17", false, function() {
Login.embeddedUrl = '<?php echo WoW::GetWoWPath(); ?>/login/login.frag';
});
//]]>
</script>
</body>
</html>
