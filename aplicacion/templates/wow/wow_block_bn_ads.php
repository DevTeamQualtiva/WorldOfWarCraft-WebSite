<!-- START: Battle.Net ADs -->
<div>
	<!-- try -->


		<div class="promo promo-wow">
			<a href="<?php echo WoW::GetWoWPath(); ?>/account/landing.xml" class="free-trial png-fix" data-ad="Classic: Trial">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/sidebar/free-trial/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>.png" alt="Загрузите бесплатную пробную версию" />
			</a>

			<span class="buy-now">
				<?php echo WoW_Locale::GetString('template_buy_now'); ?>
			</span>
		</div>


	<script type="text/javascript">
	//<![CDATA[
		BnetAds.trackImpression('World of Warcraft [Up-sell Ad]', 'Impression', 'Classic: Trial');
		BnetAds.bindTracking('.promo .free-trial', 'World of Warcraft [Up-sell Ad]', 'Click-through');
	//]]>
	</script>
</div>
<!-- END: Battle.Net ADs -->