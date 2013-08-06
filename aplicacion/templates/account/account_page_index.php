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
<h1 id="logo"><a href="<?php echo WoW::GetWoWPath() . '/' . WoW_Locale::GetLocale(); ?>/" tabindex="50" accesskey="h">Battle.net</a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/"> <?php echo WoW_Locale::GetString('template_management_account_management'); ?>
</a></h2>
<ul>
<li<?php echo WoW_Template::GetMenuIndex() == 'management' ? ' class="active"' : null; ?>>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_information'); ?></a>
<span></span>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'settings' ? ' class="active"' : null; ?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'settings'); return false;"><?php echo WoW_Locale::GetString('template_management_menu_parameters'); ?></a>
<span></span>
<div class="flyout-menu" id="settings-menu" style="display: none">
<ul>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/settings/change-email.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_email'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/settings/change-password.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_password'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/settings/change-communication.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_communication'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/parental-controls/index.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_parental_control'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wallet.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_payment_method'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/address-book.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_address_book'); ?></a></li>
</ul>
</div>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'games' ? ' class="active"' : null; ?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'games'); return false;"><?php echo WoW_Locale::GetString('template_management_menu_games'); ?></a>
<span></span>
<div class="flyout-menu" id="games-menu" style="display: none">
<ul>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/creation/wow/signup/index.xml"><?php echo WoW_Locale::GetString('template_management_menu_games_add_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/get-a-game.html"><?php echo WoW_Locale::GetString('template_management_menu_games_get_a_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow-account-conversion.html"><?php echo WoW_Locale::GetString('template_management_menu_games_wow_conversion'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/download/"><?php echo WoW_Locale::GetString('template_management_menu_games_download'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/beta-profile.html"><?php echo WoW_Locale::GetString('template_management_menu_games_beta_profile'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/redemption/redeem.html"><?php echo WoW_Locale::GetString('template_management_menu_games_redeem'); ?></a></li>
</ul>
</div>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'orders' ? ' class="active"' : null; ?>>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/orders.html" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_operations'); ?></a>
<span></span>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'security' ? ' class="active"' : null; ?>>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/authenticator.html" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_security'); ?></a>
<span></span>
</li>
</ul>
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
    case 'account_conversion':
        WoW_Template::LoadTemplate('content_conversion_s' . WoW_Template::GetPageData('conversion_page'));
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
    case 'account_conversion':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/inputs.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/account/js/management/wow/merge/account-merge.js?v19"></script>';
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
Login.embeddedUrl = '<?php echo WoW::GetWoWPath(); ?>/login/<?php echo WoW_Locale::GetLocale(); ?>/login.frag';
});
//]]>
</script>
</body>
</html>
