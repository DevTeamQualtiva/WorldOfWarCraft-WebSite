<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div class="dashboard <?php echo sprintf('%s %s', WoW_Account::GetExpansion() > 0 ? 'wowx' . WoW_Account::GetExpansion() : 'wowc', WoW_Locale::GetLocale());?>">
<div class="primary">
<div class="header">
<h2 class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_management'); ?></h2>
<h3 class="headline"><?php echo WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion()); ?></h3>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow/dashboard.html?region=EU&amp;accountName=<?php echo WoW_Account::GetUserName(); ?>"><img src="/account/local-common/images/game-icons/wow<?php echo WoW_Account::GetExpansion() > 0 ? 'x' . WoW_Account::GetExpansion() : 'c'; ?>.png?v17" alt="World of Warcraft®" title="" width="48" height="48" /></a>
</div>
<div class="account-summary">
<div class="account-management">
<div class="section box-art" id="box-art">
<img src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/images/game-boxes/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/wow<?php echo WoW_Account::GetExpansion() > 0 ? 'x' . WoW_Account::GetExpansion() : 'c'; ?>-big.png?v17" alt="World of Warcraft®" title="" width="242" height="288" id="box-img" />
</div>
<div class="section account-details">
<dl>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_management_account_name'); ?></dt>
<dd class="account-name"><?php echo WoW_Account::GetAccountName(); ?></dd>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_account_status'); ?></dt>
<dd class="account-status"> <span><strong class="<?php echo WoW_Account::IsBanned() ? 'frozen' : 'active'; ?>"><?php echo WoW_Locale::GetString(sprintf('template_wow_dashboard_account_%s', WoW_Account::IsBanned() ? 'banned' : 'active')); ?></strong></span>
</dd>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashborad_subscribe'); ?></dt>
<dd class="account-details"> <?php echo WoW_Locale::GetString('template_wow_dashboard_unlimited_sub'); ?>
</dd>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_product_level'); ?></dt>
<dd class="account primary-account"><span class="account-history"><?php echo str_replace('World of Warcraft&reg;: ', '', WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion())); ?><em><?php echo WoW_Locale::GetString('template_wow_dashboard_standart_edition'); ?></em></span></dd>
<?php
for($i = WoW_Account::GetExpansion()-1; $i > -1; --$i) {
    echo sprintf('<dd class="account secondary-account%s">%s</dd>', $i == 0 ? ' oldest-account' : null, $i == 0 ? WoW_Locale::GetString('expansion_' . $i) : str_replace('World of Warcraft&reg;: ', '', WoW_Locale::GetString('expansion_' . $i)));
}
?>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_region'); ?></dt>
<dd class="region eu"><?php echo WoW_Locale::GetString('locale_region'); ?> (EU)</dd>
<dt class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_wowremote'); ?></dt>
<dd><strong class="unsubscribed"><?php echo WoW_Locale::GetString('template_wow_dashboard_wowremote_unsub'); ?></strong></dd>
</dl>
</div>
<div class="section available-actions">
<ul class="game-time">
<li class="change-payment-method">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/payment-method.html?accountName=<?php echo WoW_Account::GetAccountName(); ?>"><?php echo WoW_Locale::GetString('template_wow_dashboard_buy_game_time'); ?></a>
</li>
<li class="add-game-card">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/gamecard.html?accountName=<?php echo WoW_Account::GetAccountName(); ?>"><?php echo WoW_Locale::GetString('template_wow_dashboard_active_timecard'); ?></a>
</li>
<li class="payment-history">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/payment-history.html?accountName=<?php echo WoW_Account::GetAccountName(); ?>"><?php echo WoW_Locale::GetString('template_wow_dashboard_view_account_history'); ?></a>
</li>
<li class="download-client">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/download/#wow-downloads"><?php echo WoW_Locale::GetString('template_wow_dashboard_download_game_client'); ?></a>
</li>
</ul>
</div>
</div>
<div class="dashboard-form" id="enter-game-key">
<form action="<?php echo WoW::GetWoWPath(); ?>/account/management/add-game.html?style=upgrade-wow" method="post">
<div class="hiddenInputWrapper">
<input type="hidden" name="confirmed" value="true" />
<input type="hidden" name="codeType" value="WOW" />
<input type="hidden" name="wowAccountLabel" value="<?php echo WoW_Account::GetAccountName(); ?>" />
<input type="hidden" name="legalAgreementAccepted" value="false" />
<input type="hidden" name="product" value="" />
<input type="hidden" name="region" value="EU" />
</div>
<h4><?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_enter_cdkey'); ?></h4>
<p></p>
<p class="simple-input">
<input type="text" name="gameKey" value="" class="input border-5 glow-shadow-2" maxlength="320" tabindex="1" />
<button
class="ui-button button1 disabled"
type="submit"
disabled="disabled"
tabindex="1">
<span>
<span><?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_header'); ?></span>
</span>
</button>
<a class="ui-cancel " href="#" onclick="DashboardForm.hide($('#enter-game-key')); return false;" tabindex="1">
<span>
<?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_cancel'); ?> </span>
</a>
</p>
<p><?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_note'); ?></p>
</form>
</div>
</div>
</div>
<div class="secondary">
<div class="service-selection character-services">
<ul class="wow-services">
<li class="category"><a href="#character-services" class="character-services"><?php echo WoW_Locale::GetString('template_wow_dashboard_character_services'); ?></a></li>
<li class="category"><a href="#additional-services" class="additional-services"><?php echo WoW_Locale::GetString('template_wow_dashboard_additional_services'); ?></a></li>
<li class="category"><a href="#referrals-rewards" class="referrals-rewards"><?php echo WoW_Locale::GetString('template_wow_dashboard_referral_services'); ?></a></li>
<li class="category"><a href="#game-time-subscriptions" class="game-time-subscriptions"><?php echo WoW_Locale::GetString('template_wow_dashboard_game_time_services'); ?></a></li>
</ul>
<div class="service-links">
<div class="position"></div>
<div class="content character-services" id="character-services">
<ul>
<li class="wow-service pct">
<a href="http://www.wow-europe.com/character/character-transfer-intro.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_transfer_title'), WoW_Locale::GetString('template_wow_dashboard_service_transfer_title'));
?>
</a>
</li>
<li class="wow-service pfc">
<a href="http://www.wow-europe.com/character/faction-change-intro.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_faction_title'), WoW_Locale::GetString('template_wow_dashboard_service_faction_title'));
?>
</a>
</li>
<li class="wow-service prc">
<a href="http://www.wow-europe.com/character/race-change-intro.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_race_title'), WoW_Locale::GetString('template_wow_dashboard_service_race_title'));
?>
</a>
</li>
<li class="wow-service pnc">
<a href="http://www.wow-europe.com/character/pcnc/intro.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_name_title'), WoW_Locale::GetString('template_wow_dashboard_service_name_title'));
?>
</a>
</li>
<li class="wow-service pcc">
<a href="http://www.wow-europe.com/character/character-customization-intro.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_apperance_title'), WoW_Locale::GetString('template_wow_dashboard_service_apperance_title'));
?>
</a>
</li>
<li class="wow-service char-move">
<a href="http://www.wow-europe.com/character/character-move.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_migration_title'), WoW_Locale::GetString('template_wow_dashboard_service_migration_title'));
?>
</a>
</li>
</ul>
</div>
<div class="content additional-services" id="additional-services">
<ul>
<li class="wow-service ptr-copy">
<a href="https://www.wow-europe.com/ptr/?accountName=<?php echo WoW_Account::GetAccountName(); ?>&amp;locale=ru_RU">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_ptr_title'), WoW_Locale::GetString('template_wow_dashboard_service_ptr_title'));
?>
</a>
</li>
<li class="wow-service arena-tournament-closed">
<a href="" onclick="return Core.open(this);">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_arenapass_title'), WoW_Locale::GetString('template_wow_dashboard_service_arenapass_title'));
?>
</a>
</li>
<li class="wow-service parental-controls">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/parental-controls/index.html">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_parental_title'), WoW_Locale::GetString('template_wow_dashboard_service_parental_title'));
?>
</a>
</li>
</ul>
</div>
<div class="content referrals-rewards" id="referrals-rewards">
<ul>
<li class="wow-service raf">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow/services/raf-invite.html?l=<?php echo WoW_Account::GetAccountName(); ?>&amp;r=EU">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_recruit_title'), WoW_Locale::GetString('template_wow_dashboard_service_recruit_title'));
?>
</a>
</li>
<li class="wow-service resurrection-scroll">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow/services/sor-invite.html?l=<?php echo WoW_Account::GetAccountName(); ?>&amp;r=EU">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_scroll_title'), WoW_Locale::GetString('template_wow_dashboard_service_scroll_title'));
?>
</a>
</li>
</ul>
</div>
<div class="content game-time-subscriptions" id="game-time-subscriptions">
<ul>
<li class="wow-service add-game-card">
<a href="https://www.wow-europe.com/account/gamecard.html?accountName=<?php echo WoW_Account::GetAccountName(); ?>">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_gamecard_title'), WoW_Locale::GetString('template_wow_dashboard_service_gamecard_title'));
?>
</a>
</li>
<li class="wow-service wow-anywhere">
<a href="https://www.wow-europe.com/account/wow-remote-payment-method.html?accountName=<?php echo WoW_Account::GetAccountName(); ?>">
<span class="icon glow-shadow-3"></span>
<?php
echo sprintf('<strong>%s</strong>%s', WoW_Locale::GetString('template_wow_dashboard_service_wowremote_title'), WoW_Locale::GetString('template_wow_dashboard_service_wowremote_title'));
?>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!--[if lt IE 7]> <script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/DD_belatedPNG.js?v17"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.download a .icon');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>