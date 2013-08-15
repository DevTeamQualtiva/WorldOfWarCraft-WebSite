<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="lobby">
<div id="page-content" class="page-content">
<div id="lobby-account">
<h3 class="section-title"><?php echo WoW_Locale::GetString('template_management_account_details'); ?></h3>
<div class="lobby-box">
<h4 class="subcategory"><?php echo WoW_Locale::GetString('template_management_account_name'); ?></h4>
<p><?php echo WoW_Account::GetUserName(); ?>
<span class="edit">[<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/settings/change-email.html"><?php echo WoW_Locale::GetString('template_management_edit_link'); ?></a>]</span>
</p>
<h4 class="subcategory"><?php echo WoW_Locale::GetString('template_management_address'); ?></h4>
<p>
<span class="edit">[<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/edit-address.html?id=1"><?php echo WoW_Locale::GetString('template_management_edit_link'); ?></a>]</span>
</p>
</div>
<h3 class="section-title"><?php echo WoW_Locale::GetString('template_management_account_security'); ?></h3>
<div class="lobby-box security-box">
<p class="security" id="manage-security"><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/authenticator.html"><?php echo WoW_Locale::GetString('template_management_management_account_security'); ?></a></p>
</div>
</div>
<div id="lobby-games">
<h3 class="section-title"><?php echo WoW_Locale::GetString('template_management_your_games'); ?></h3>
<div id="games-list">
<?php
if(WoW_Account::GetGameAccountsCount() == 0) {
    echo '<ul><li class="cta border-4">' . WoW_Locale::GetString('template_account_no_wow_games') . '</li></ul>';
}
?>
<a href="#wow" class="games-title border-2 opened" rel="game-list-wow">World of Warcraft</a>
<ul id="game-list-wow">

<?php
$UserGames = WoW_Account::GetUserGames();
for($i=0;$i<count($UserGames);$i++)
{
?>
<li class="border-4" id="<?php echo strtoupper($UserGames[$i]['username']); ?>::EU">
<span class="game-icon">
<img src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/images/game-icons/wow<?php echo $UserGames[$i]['expansion'] > 0 ? 'x' . $UserGames[$i]['expansion'] : 'c'; ?>-32.png" alt="" width="32" height="32" />
</span>
<span class="account-info">
<span class="account-link">
<strong><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow/dashboard.html?accountName=<?php echo $UserGames[$i]['username']; ?>&amp;region=EU"><?php echo WoW_Locale::GetString('expansion_' . $UserGames[$i]['expansion']); ?></a></strong>
<span class="account-id">[<?php echo $UserGames[$i]['username']; ?>] </span>
<span class="account-region"><?php echo sprintf('%s (EU)', WoW_Locale::GetString('locale_region')); ?></span>
</span>
</span>
</li>
<?php
}
?>

</ul>
</div>
<div id="games-tools">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/creation/wow/signup/index.xml" id="add-game" class="border-5"><?php echo WoW_Locale::GetString('template_management_add_a_game'); ?></a>
<p>
<a href="get-a-game.html" class="" onclick="">
<span class="icon-16 icon-account-buy"></span>
<span class="icon-16-label"><?php echo WoW_Locale::GetString('template_management_menu_games_get_a_game'); ?></span>
</a>
</p>
<p>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow-account-conversion.html" class="" onclick="">
<span class="icon-16 icon-account-merge"></span>
<span class="icon-16-label"><?php echo WoW_Locale::GetString('template_management_menu_games_wow_conversion'); ?></span>
</a>
</p>
<p>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/download/" class="" onclick="">
<span class="icon-16 icon-account-download"></span>
<span class="icon-16-label"><?php echo WoW_Locale::GetString('template_management_menu_games_download'); ?></span>
</a>
</p>
<p>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/beta-profile.html" class="" onclick="">
<span class="icon-16 icon-account-beta"></span>
<span class="icon-16-label"><?php echo WoW_Locale::GetString('template_management_menu_games_beta_profile'); ?></span>
</a>
</p>
<p>
<a href="<?php echo WoW::GetWoWPath(); ?>/account/redemption/redeem.html" class="" onclick="">
<span class="icon-16 icon-account-add"></span>
<span class="icon-16-label"><?php echo WoW_Locale::GetString('template_management_menu_games_redeem'); ?></span>
</a>
</p>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/locales/<?php echo WoW_Locale::GetLocale(); ?>.js"></script>
<!--[if IE 6]> <script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/DD_belatedPNG.js?v17"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-16');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>
