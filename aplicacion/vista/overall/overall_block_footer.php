<!-- START: Footer -->
<div id="footer">
	<div id="sitemap" <?php echo WoW_Template::GetTemplateTheme() == 'wow' ? ' class="promotions"' : null; ?>>
		<div class="column">
			<h3 class="bnet">
				<a href="http://eu.battle.net/" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_home_title'); ?></a>
			</h3>
			<ul>
				<li><a href="http://eu.battle.net/what-is/" data-action="Battle.net Home - ¿Qué es Battle.net?"><?php echo WoW_Locale::GetString('template_footer_home_link1'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/get-a-game.html" data-action="Battle.net Home - Comprar juegos"><?php echo WoW_Locale::GetString('template_footer_home_link2'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/" data-action="Battle.net Home - Cuenta"><?php echo WoW_Locale::GetString('template_footer_home_link3'); ?></a></li>
				<li><a href="http://eu.blizzard.com/support/" data-action="Battle.net Home - Soporte"><?php echo WoW_Locale::GetString('template_footer_home_link4'); ?></a></li>
				<li><a href="http://eu.battle.net/realid/" data-action="Battle.net Home - ID Real "><?php echo WoW_Locale::GetString('template_footer_home_link5'); ?></a></li>
				<li><a href="http://us.battle.net/battletag/" data-action="Battle.net Home - BattleTag"><?php echo WoW_Locale::GetString('template_footer_home_link6'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="games">
				<a href="http://eu.battle.net/" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_games_title'); ?></a>
			</h3>
			<ul>
				<li><a href="http://eu.battle.net/sc2/"><?php echo WoW_Locale::GetString('template_footer_games_link1'); ?></a></li>
				<li><a href="http://eu.battle.net/wow/"><?php echo WoW_Locale::GetString('template_footer_games_link2'); ?></a></li>
				<li><a href="http://eu.battle.net/games/d3"><?php echo WoW_Locale::GetString('template_footer_games_link3'); ?></a></li>
				<li><a href="http://eu.battle.net/games/classic"><?php echo WoW_Locale::GetString('template_footer_games_link4'); ?></a></li>
				<li><a href="https://eu.battle.net/account/download/"><?php echo WoW_Locale::GetString('template_footer_games_link5'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="account">
				<a href="https://eu.battle.net/account/management/?lnk=4" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_account_title'); ?></a>
			</h3>
			<ul>
				<li><a href="https://eu.battle.net/account/support/password-reset.html"><?php echo WoW_Locale::GetString('template_footer_account_link1'); ?></a></li>
				<li><a href="https://eu.battle.net/account/creation/tos.html"><?php echo WoW_Locale::GetString('template_footer_account_link2'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/?lnk=5"><?php echo WoW_Locale::GetString('template_footer_account_link3'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/authenticator.html"><?php echo WoW_Locale::GetString('template_footer_account_link4'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/add-game.html"><?php echo WoW_Locale::GetString('template_footer_account_link5'); ?></a></li>
				<li><a href="https://eu.battle.net/account/management/redemption/redeem.html"><?php echo WoW_Locale::GetString('template_footer_account_link6'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="support">
				<a href="http://eu.blizzard.com/support/" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_support_title'); ?></a>
			</h3>
			<ul>
				<li><a href="http://eu.blizzard.com/support/"><?php echo WoW_Locale::GetString('template_footer_support_link1'); ?></a></li>
				<li><a href="https://eu.battle.net/account/parental-controls/index.html"><?php echo WoW_Locale::GetString('template_footer_support_link2'); ?></a></li>
				<li><a href="http://eu.battle.net/security/"><?php echo WoW_Locale::GetString('template_footer_support_link3'); ?></a></li>
				<li><a href="http://eu.battle.net/security/help"><?php echo WoW_Locale::GetString('template_footer_support_link4'); ?></a></li>
			</ul>
		</div>
<?php
if(WoW_Template::GetTemplateTheme() == 'wow') {
    echo'<div id="footer-promotions">
			<div class="sidebar-content"></div>
				<div id="sidebar-marketing" class="sidebar-module">
					<div class="bnet-offer">'; ?>
					<!-- -->
						<div class="bnet-offer-bg">
							<a href="<?php echo WoW::GetWoWPath(); ?>/account/landing.xml" target="_blank" id="ad3023837" class="bnet-offer-image" onclick="BnetAds.trackEvent('campaignId:3023837 - imgId:3023042', 'WoWtrialLatAm', 'wow', true);">
							<img src="<?php echo WoW::GetWoWPath(); ?>/cms/ad_300x100/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>.jpg" width="300" height="100" alt=""/>
							</a>
						</div>
					<script type="text/javascript">
					//<![CDATA[
					if(typeof (BnetAds.addEvent) != "undefined" )
					BnetAds.addEvent(window, 'load', function(){ BnetAds.trackEvent('campaignId:3023837 - imgId:3023042', 'WoWtrialLatAm', 'wow'); } );
					else
					BnetAds.trackEvent('3023837', 'WoWtrialLatAm', 'wow');
					//]]>
					</script>
				<?php  echo'</div>
			</div>
		</div>';
}
?>
	<span class="clear"><!-- --></span>
	</div>
<div id="copyright">
	<a href="javascript:;" tabindex="100" id="change-language">
		<span><?php echo sprintf('%s - %s', WoW_Locale::GetString('locale_region'), WoW_Locale::GetString('locale_name')); ?></span>
	</a>
	<?php echo WoW_Locale::GetString('copyright_bottom_title'); ?>
	<a onclick="return Core.open(this);" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="100" data-action="Footer - Terms of Use"><?php echo WoW_Locale::GetString('copyright_bottom_tos'); ?></a>
	<a onclick="return Core.open(this);" href="http://eu.blizzard.com/company/legal/" tabindex="100" data-action="Footer - Legal"><?php echo WoW_Locale::GetString('copyright_bottom_legal'); ?></a>
	<a onclick="return Core.open(this);" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="100" data-action="Footer - Privacy Policy"><?php echo WoW_Locale::GetString('copyright_bottom_privacy'); ?></a>
	<a onclick="return Core.open(this);" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="100" data-action="Footer - Copyright Infringement"><?php echo WoW_Locale::GetString('copyright_bottom_copyright'); ?></a>
</div>
<div id="international"></div>
<?php
if(WoW_Template::GetTemplateTheme() == 'wow') {
    echo'<div id="legal">
			<div id="legal-ratings" class="png-fix">
				<a rel="nofollow" class="truste-link" href="http://privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" target="_blank">
					<img class="legal-image" src="' . WoW::GetWoWPath() . '/wow/static/images/legal/seal_m.png" alt="Validar certificado de privacidad TRUSTe"/>
				</a>
				<a href="http://www.pegi.info/" onclick="return Core.open(this);">
					<img class="legal-image" alt="" src="' . WoW::GetWoWPath() . '/wow/static/local-common/images/legal/eu/pegi-wow.png" />
				</a>
			</div>
			<div id="blizzard" class="png-fix">
				<a href="http://blizzard.com" tabindex="100">
					<img src="' . WoW::GetWoWPath() . '/wow/static/local-common/images/logos/blizz-wow.png" alt="" />
				</a>
			</div>
			<center>
				<div id="acore" class="png-fix">
					<a href="http://www.apocalypsecore.tk" onclick="return Core.open(this);">
						<img class="legal-image" src="' . WoW::GetWoWPath() . '/estatico/cms/Acdocs/logo/aclogo.png" alt="World Of WarCraft CMS" title="ApocalypseCore DeVTeam"/>
					</a>
				</div>
			</center>
			<span class="clear"><!-- --></span>
		</div>';
}
?>
</div>
<!-- END: Footer -->
