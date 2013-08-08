<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
</div>
<div class="content-bot">	
	<div class="bg-body">
		<div class="bg-bottom">		
			<div class="contents-wrapper">
			
				<div class="left-col" align="left">
					<div class="section-title">
						<span><?php echo WoW_Locale::GetString('template_services_title'); ?></span>
						<p><?php echo WoW_Locale::GetString('template_services_description'); ?></p>
					</div>
					<div class="main-services">
					<a href="game-purchase" class="main-services-banner left-bnr" style="background-image:url('<?php echo WoW::GetURL(); ?>wow/static/images/services/thumbnails/thumb-main-services-6.jpg');">
						<span class="banner-title"><?php echo WoW_Locale::GetString('template_services_subscription_title'); ?></span>
						<span class="banner-desc"><?php echo WoW_Locale::GetString('template_services_subscription_description'); ?></span>
					</a>
					<a href="scroll-of-resurrection" class="main-services-banner left-bnr" style="background-image:url('<?php echo WoW::GetURL(); ?>wow/static/images/services/thumbnails/thumb-main-services-2.jpg');">
						<span class="banner-title"><?php echo WoW_Locale::GetString('template_services_scroll_of_resurrection_title'); ?></span>
						<span class="banner-desc"><?php echo WoW_Locale::GetString('template_services_scroll_of_resurrection_description'); ?></span>
					</a>
					<a href="mobile-armory" class="main-services-banner left-bnr" style="background-image:url('<?php echo WoW::GetURL(); ?>wow/static/images/services/thumbnails/thumb-main-services-3.jpg');">
						<span class="banner-title"><?php echo WoW_Locale::GetString('template_services_armory_title'); ?></span>
						<span class="banner-desc"><?php echo (sprintf(WoW_Locale::GetString('template_services_armory_description'), WoW_Locale::GetString('template_title'))); ?></span>
					</a>
					<a href="recruit-a-friend" class="main-services-banner right-bnr" style="background-image:url('<?php echo WoW::GetURL(); ?>wow/static/images/services/thumbnails/thumb-main-services-4.jpg');">
						<span class="banner-title"><?php echo WoW_Locale::GetString('template_services_recruit_a_friend_title'); ?></span>
						<span class="banner-desc"><?php echo (sprintf(WoW_Locale::GetString('template_services_recruit_a_friend_description'), WoW_Locale::GetString('template_title'))); ?></span>
					</a>
					<a href="http://us.blizzard.com/store/browse.xml?f=f:1" class="main-services-banner left-bnr" style="background-image:url('<?php echo WoW::GetURL(); ?>wow/static/images/services/thumbnails/thumb-main-services-1.jpg');">
						<span class="banner-title"><?php echo WoW_Locale::GetString('template_services_blizzard_store_title'); ?></span>
						<span class="banner-desc"><?php echo WoW_Locale::GetString('template_services_blizzard_store_description'); ?></span>
					</a>
						<span class="clear"><!-- --></span>
					</div>
				</div>
				
				<div class="right-col">
					<div class="sub-services">					
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo WoW_Locale::GetString('template_services_account_services'); ?></span>
								</div>
								<ul>
								<li><a href="ban-list.php" class="c3-l6"><span><?php echo WoW_Locale::GetString('template_services_ban_list'); ?></span></a></li>
								<li><a href="javascript:;" class="c1-l1"><span><?php echo WoW_Locale::GetString('template_services_manage_your_account'); ?></span></a></li>
								<li><a href="javascript:;" class="c1-l2"><span><?php echo WoW_Locale::GetString('template_services_account_security'); ?></span></a></li>
										<li><a href="javascript:;" class="c1-l3"><span><?php echo WoW_Locale::GetString('template_services_add_an_authenticator'); ?></span></a></li>
										<li><a href="javascript:;" class="c1-l4"><span><?php echo WoW_Locale::GetString('template_services_authenticator_faq'); ?></span></a></li>
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo WoW_Locale::GetString('template_services_osap'); ?></span>
								</div>
								<ul>
										<li><a href="javascript:;" class="c4-l1"><span><?php echo WoW_Locale::GetString('template_services_Keep_your_friends_in_game'); ?></span></a></li>
										<li><a href="javascript:;" class="c4-l2"><span><?php echo WoW_locale::GetString('template_services_wow_magazine'); ?></span></a></li>
										<li><a href="javascript:;" class="c4-l3"><span><?php echo WoW_locale::GetString('template_services_raf'); ?></span></a></li>
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo WoW_locale::GetString('template_services_character_services'); ?></span>
								</div>
								<ul>
										<li><a href="javascript:;" class="c3-l1"><span><?php echo WoW_locale::GetString('template_services_trade_characters'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l2"><span><?php echo WoW_locale::GetString('template_services_character_name_change'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l3"><span><?php echo WoW_locale::GetString('template_services_character_race_change'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l4"><span><?php echo WoW_locale::GetString('template_services_character_faction_change'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l5"><span><?php echo WoW_locale::GetString('template_services_character_customization'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l6"><span><?php echo WoW_locale::GetString('template_services_free_character_migration'); ?></span></a></li>
										<li><a href="javascript:;" class="c3-l7"><span><?php echo WoW_locale::GetString('template_services_public_test_realm'); ?></span></a></li>
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo WoW_locale::GetString('template_services_website_options'); ?></span>
								</div>
								<ul>
								<li><a href="javascript:;" class="c2-l1"><span><?php echo WoW_locale::GetString('template_services_change_website_theme'); ?></span></a></li>
								<li><a href="services.php?ref=avatar" class="c4-20"><span><?php echo WoW_locale::GetString('template_services_change_avatar'); ?></span></a></li>
								<li><a href="javascript:;" class="c2-l2"><span><?php echo WoW_locale::GetString('template_services_request_gm_application'); ?></span></a></li>
								<li><a href="javascript:;" class="c2-l3"><span><?php echo WoW_locale::GetString('template_services_request_gm_trial'); ?></span></a></li>
								<li><a href="game_client.php" class="c2-l4"><span><?php echo WoW_locale::GetString('template_services_download_wow_client'); ?></span></a></li>
										<li><a href="javascript:;" class="c2-l5"><span><?php echo WoW_locale::GetString('template_services_download_language_pack'); ?></span></a></li>
								</ul>
                            </div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo WoW_locale::GetString('template_services_multimedia'); ?></span>
								</div>
								<ul>
									<li><a href="/media/send_media.php" class="c1-l3"><span><?php echo WoW_locale::GetString('template_services_send_multimedia'); ?></span></a></li>
										
								</ul>					
							</div>                                					
					</div>
					</div>	
				
				<br />
				<span class="clear"><!-- --></span>
				<span class="clear"><!-- --></span>
				<span class="clear"><!-- --></span>
			</div>
		</div>
	</div>
</div>
</div>
</div>