<!-- START: Footer -->
<div id="footer">
	<div id="sitemap" <?php echo WoW_Template::GetTemplateTheme() == 'wow' ? ' class="promotions"' : null; ?>>
		<div class="column">
			<h3 class="bnet">
				<a href="<?php echo WoWConfig::$YourDomain ?>" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_home_title'); ?></a>
			</h3>
			<ul>
				<li><a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>/what-is/" data-action="Battle.net Home - ¿Qué es Battle.net?"><?php echo WoW_Locale::GetString('template_footer_home_link1'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/get-a-game.html" data-action="Battle.net Home - Comprar juegos"><?php echo WoW_Locale::GetString('template_footer_home_link2'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/" data-action="Battle.net Home - Cuenta"><?php echo WoW_Locale::GetString('template_footer_home_link3'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/support/" data-action="Battle.net Home - Soporte"><?php echo WoW_Locale::GetString('template_footer_home_link4'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/realid/" data-action="Battle.net Home - ID Real "><?php echo WoW_Locale::GetString('template_footer_home_link5'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/battletag/" data-action="Battle.net Home - BattleTag"><?php echo WoW_Locale::GetString('template_footer_home_link6'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="games">
				<a href="http://eu.battle.net/" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_games_title'); ?></a>
			</h3>
			<ul>
				<li><a href="http://eu.battle.net/sc2/"><?php echo WoW_Locale::GetString('template_footer_games_link1'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/"><?php echo WoW_Locale::GetString('template_footer_games_link2'); ?></a></li>
				<li><a href="http://eu.battle.net/games/d3"><?php echo WoW_Locale::GetString('template_footer_games_link3'); ?></a></li>
				<li><a href="http://eu.battle.net/games/classic"><?php echo WoW_Locale::GetString('template_footer_games_link4'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/download/"><?php echo WoW_Locale::GetString('template_footer_games_link5'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="account">
				<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/?lnk=4" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_account_title'); ?></a>
			</h3>
			<ul>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset.html"><?php echo WoW_Locale::GetString('template_footer_account_link1'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/creation/tos.html"><?php echo WoW_Locale::GetString('template_footer_account_link2'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/?lnk=5"><?php echo WoW_Locale::GetString('template_footer_account_link3'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/authenticator.html"><?php echo WoW_Locale::GetString('template_footer_account_link4'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/add-game.html"><?php echo WoW_Locale::GetString('template_footer_account_link5'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/redemption/redeem.html"><?php echo WoW_Locale::GetString('template_footer_account_link6'); ?></a></li>
			</ul>
		</div>
		<div class="column">
			<h3 class="support">
				<a href="<?php echo WoW::GetWoWPath(); ?>/support/" tabindex="100"><?php echo WoW_Locale::GetString('template_footer_support_title'); ?></a>
			</h3>
			<ul>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/support/"><?php echo WoW_Locale::GetString('template_footer_support_link1'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/parental-controls/index.html"><?php echo WoW_Locale::GetString('template_footer_support_link2'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/security/"><?php echo WoW_Locale::GetString('template_footer_support_link3'); ?></a></li>
				<li><a href="<?php echo WoW::GetWoWPath(); ?>/security/help"><?php echo WoW_Locale::GetString('template_footer_support_link4'); ?></a></li>
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
<span class="clear"><!-- --></span>
<!-- This - need Fix - start -->
<div id="international" style=": block; ">
	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_america'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=en-us/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to en-us'); return true;">
					English (US)
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=es-es/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to es-mx'); return true;">
					Español (AL)
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=pt-br/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to pt-br'); return true;">
					Português (AL)
				</a>
			</li>
		</ul>
	</div>
	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_euro'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=de-de/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to de-de'); return true;">
					Deutsch
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=en-gb/?" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to en-gb'); return true;">
					English (EU)
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=es-es/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to es-es'); return true;">
					Español (EU)
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=fr-fr/?" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to fr-fr'); return true;">
					Français
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=it-it/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to it-it'); return true;">
					Italiano
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=pt-pt/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to pt-pt'); return true;">
					Português (EU)
				</a>
			</li>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=ru-ru/?loc" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to ru-ru'); return true;">
					Русский
				</a>
			</li>
		</ul>
	</div>

	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_korea'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=ko-kr/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to ko-kr'); return true;">
					한국어
				</a>
			</li>
		</ul>
	</div>
	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_taiwan'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=zh-tw/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to zh-tw'); return true;">
					繁體中文
				</a>
			</li>
		</ul>
	</div>
	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_china'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=zh-cn/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to zh-cn'); return true;">
					简体中文
				</a>
			</li>
		</ul>
	</div>
	<div class="column">
	<h3><?php echo WoW_Locale::GetString('locale_region_sa'); ?></h3>
		<ul>
			<li>
				<a href="<?php echo WoWConfig::$YourDomain ?><?php echo WoW_Locale::GetLocale(); ?>?locale=en-us/" tabindex="100" onclick="Locale.trackEvent('Change Language', 'es-mx to en-us'); return true;">
					English (US)
				</a>
			</li>
		</ul>
	</div>
	<span class="clear"><!-- --></span>
</div>
</div>
<!-- This - need Fix - end -->
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
