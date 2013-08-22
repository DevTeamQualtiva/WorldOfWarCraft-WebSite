<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
</div>
<div class="content-bot">	
<script type="text/javascript">
        //<![CDATA[
		$(document).ready(function(){
			Input.bind('#wowcharacter');
			Input.bind('#wowguild');
		});
        //]]>
</script>
	    <div id="left">
		<div class="profiles">
			<h4><?php echo WoW_locale::GetString('template_community_title'); ?></h4>
			<div class="profiles-section">
				<div class="sidebar-module " id="sidebar-profiles-search">
				<div class="sidebar-title">
					<h3 class="category title-profiles-search"><?php echo WoW_locale::GetString('template_community_perfil'); ?></h3>
				</div>
				<div class="sidebar-content">
					<div class="profiles-search-block">
						<span class="profiles-search-title"><?php echo WoW_locale::GetString('template_community_personaje'); ?></span>
							<form action="<?php echo WoW::GetWoWPath(); ?>/wow/search?q=" method="get">
								<input type="hidden" name="f" value="wowcharacter" />
								<input type="text" id="wowcharacter" alt="Nombre" name="q" />
								<button class="ui-button button1" type="submit">
									<span>
										<span><?php echo WoW_locale::GetString('template_community_search'); ?></span>
									</span>
								</button>
							</form>
						</div>
						<div class="profiles-search-block">
							<span class="profiles-search-title"><?php echo WoW_locale::GetString('template_community_guild'); ?></span>
							<form action="<?php echo WoW::GetWoWPath(); ?>/wow/search?q=" method="get">
								<input type="hidden" name="f" value="wowguild" />
								<input type="text" id="wowguild" alt="Nombre" name="q" />
									<button
										class="ui-button button1" type="submit">
										<span>
											<span><?php echo WoW_locale::GetString('template_community_search'); ?></span>
										</span>
									</button>
							</form>
						</div>
					</div>
				</div>
				<p class="profiles-tip"><?php echo WoW_locale::GetString('template_community_tip'); ?></p>
				<span class="clear"><!-- --></span>
			</div>
		</div>
			<div class="main-feature">
				<div class="main-feature-wrapper">
					<div class="sidebar-module " id="sidebar-leaderboards">
						<div class="sidebar-title">
							<h3 class="category title-leaderboards"><?php echo WoW_locale::GetString('template_community_marcadores'); ?></h3>
						</div>
						<div class="sidebar-content">
							<div id="challenge-mode" class="leaderboard-content-block">
								<a href="../challenge/dungeon/gate-of-the-setting-sun/index.html" class="leaderboard-content-title"><?php echo WoW_locale::GetString('template_community_mdd'); ?></a>
								<span class="leaderboard-content-desc"><?php echo WoW_locale::GetString('template_community_time'); ?></span>
								<div class="group">
									<a href="../challenge/dungeon/gate-of-the-setting-sun/index.html">
										<span class="group-thumbnail thumb-gate-of-the-setting-sun"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_door_sun'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/mogushan-palace/index.html">
										<span class="group-thumbnail thumb-mogushan-palace"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_mogu_shan'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/scarlet-halls/index.html">
										<span class="group-thumbnail thumb-scarlet-halls"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_hs'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/scarlet-monastery/index.html">
										<span class="group-thumbnail thumb-scarlet-monastery"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_sm'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/scholomance/index.html">
										<span class="group-thumbnail thumb-scholomance"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_scholomance'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/shadopan-monastery/index.html">
										<span class="group-thumbnail thumb-shadopan-monastery"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_som'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/siege-of-niuzao-temple/index.html">
										<span class="group-thumbnail thumb-siege-of-niuzao-temple"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_atn'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/stormstout-brewery/index.html">
										<span class="group-thumbnail thumb-stormstout-brewery"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_ct'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
									<a href="../challenge/dungeon/temple-of-the-jade-serpent/index.html">
										<span class="group-thumbnail thumb-temple-of-the-jade-serpent"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_tdj'); ?></span>
	                                    <span class="clear"><!-- --></span>
									</a>
								</div>
							</div>
							<div id="pvp-ladder" class="leaderboard-content-block">
								<a href="../pvp/index.html" class="leaderboard-content-title"><?php echo WoW_locale::GetString('template_community_jcj'); ?></a>
								<span class="leaderboard-content-desc"><?php echo WoW_locale::GetString('template_community_jcj_descripcion'); ?></span>
								<div class="group">
									<a href="../pvp/index.html">
										<span class="group-thumbnail thumb-pvp-overview"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_jcj_general'); ?>
										<span class="group-desc"><?php echo WoW_locale::GetString('template_community_jcj_general_descripcion'); ?></span>
										</span>
										<span class="clear"><!-- --></span>
									</a>
									<a href="../pvp/battlegrounds/index.html">
										<span class="group-thumbnail thumb-battlegrounds"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_cb'); ?></span>
										<span class="clear"><!-- --></span>
									</a>
									<a href="../pvp/arena/bloodlust/2v2html.html">
										<span class="group-thumbnail thumb-arena-2v2"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_arena2'); ?></span>
										<span class="clear"><!-- --></span>
									</a>
									<a href="../pvp/arena/bloodlust/3v3html.html">
										<span class="group-thumbnail thumb-arena-3v3"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_arena3'); ?></span>
										<span class="clear"><!-- --></span>
									</a>
									<a href="../pvp/arena/bloodlust/5v5html.html">
										<span class="group-thumbnail thumb-arena-5v5"></span>
										<span class="group-name"><?php echo WoW_locale::GetString('template_community_arena5'); ?></span>
										<span class="clear"><!-- --></span>
									</a>
								</div>	
							</div>
							<span class="clear"><!-- --></span>
				        </div>
			        </div>
				</div>
			</div>
		</div>
			
			<div id="right">
			<div class="sidebar-module " id="sidebar-auction-house">
				<div class="sidebar-title">
			        <h3 class="category title-auction-house"><?php echo WoW_locale::GetString('template_community_auction_house'); ?></h3>
				</div>

				<div class="sidebar-content">
					<ul>
						<li>
							<a href="../vault/character/auction/index.html" class="web-auction-house block">
								<span class="content-icon"></span>
								<span class="content-title"><?php echo WoW_locale::GetString('template_community_auction_house_web'); ?></span>
								<span class="content-desc"><?php echo WoW_locale::GetString('template_community_auction_house_web_descripcion'); ?></span>
			                    <span class="clear"><!-- --></span>
							</a>
						</li>
						<li>
							<a href="../services/mobile-armory/index.html" class="mobile-armory block">
								<span class="content-icon"></span>
								<span class="content-title"><?php echo WoW_locale::GetString('template_community_movil_app')?></span>
								<span class="content-desc"><?php echo WoW_locale::GetString('template_community_movil_app_descripcion')?></span>
			                    <span class="clear"><!-- --></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			    <div class="sidebar-module " id="sidebar-social-media">
					<div class="sidebar-title">
			            <h3 class="category title-social-media"><?php echo WoW_locale::GetString('template_community_social_titulo')?></h3>
					</div>
				<div class="sidebar-content">
					<ul class="social-media">
						<li class="atom-feed">
							<a href="../feed/newshtml.html" target="_blank"></a>
						</li>
							<li class="facebook">
								<a href="http://www.facebook.com/ApocalypseCore" title="World of Warcraft en Facebook"></a>
							</li>
							<li class="twitter">
								<a href="http://twitter.com/ApocalypseCore" title="World of Warcraft en Twitter"></a>
							</li>
							<li class="youtube">
								<a href="http://www.youtube.com/ApocalypseCore" title="World of Warcraft en Youtube"></a>
							</li>
			            <span class="clear"><!-- --></span>
					</ul>
				</div>
			</div>
				
			<div class="sidebar-module " id="sidebar-blizzard-community">
				<div class="sidebar-title">
			        <h3 class="category title-blizzard-community"><?php echo WoW_locale::GetString('template_community_contenido_blizzard')?></h3>
				</div>
				<div class="sidebar-content">
					<ul>
						<li>
							<a href="http://us.blizzard.com/es-mx/community/insider/" class="blizzard-insider block" target="_blank">
								<span class="content-icon"></span>
								<span class="content-title"><?php echo WoW_locale::GetString('template_community_blizzard_insider')?></span>
								<span class="content-desc"><?php echo WoW_locale::GetString('template_community_blizzard_insider_descripcion')?></span>
			                    <span class="clear"><!-- --></span>
							</a>
						</li>
						<li>
							<a href="http://us.blizzard.com/es-mx/community/blizzcast/" class="blizzcast block" target="_blank">
								<span class="content-icon"></span>
								<span class="content-title"><?php echo WoW_locale::GetString('template_community_blizzcast')?></span>
								<span class="content-desc"><?php echo WoW_locale::GetString('template_community_blizzcast_descripcion')?></span>
			                    <span class="clear"><!-- --></span>
							</a>
						</li>
						<li>
							<a href="http://us.blizzard.com/es-mx/community/contests/" class="contests block" target="_blank">
								<span class="content-icon"></span>
								<span class="content-title"><?php echo WoW_locale::GetString('template_community_concursos')?></span>
								<span class="content-desc"><?php echo WoW_locale::GetString('template_community_concursos_descripcion')?></span>
			                    <span class="clear"><!-- --></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
				
	<div class="sidebar-module " id="sidebar-fan-contributions">
		<div class="sidebar-title">
			<h3 class="category title-fan-contributions"><?php echo WoW_locale::GetString('template_community_fans')?></h3>
		</div>

		<div class="sidebar-content">
			<ul>
				<li>
					<a href="../media/fanart/index.html" class="fanart block" target="_blank">
						<span class="content-thumb"></span>
						<span class="content-title"><?php echo WoW_locale::GetString('template_community_fan_art')?></span>
			            <span class="clear"><!-- --></span>
					</a>
					<a href="http://us.blizzard.com/es-mx/community/fanart/rules.html" class="tosubmit external"><?php echo WoW_locale::GetString('template_community_send')?></a>
				</li>
			
				<li>
					<a href="../media/comics/index.html" class="comics block" target="_blank">
						<span class="content-thumb"></span>
						<span class="content-title"><?php echo WoW_locale::GetString('template_community_comics')?></span>
			            <span class="clear"><!-- --></span>
					</a>
					<a href="http://us.blizzard.com/es-mx/community/contests/comic/" class="tosubmit external"><?php echo WoW_locale::GetString('template_community_send')?></a>
				</li>
			
				<li>
					<a href="../media/screenshots/index.html" class="screenshot block" target="_blank">
						<span class="content-thumb"></span>
						<span class="content-title"><?php echo WoW_locale::GetString('template_community_screenshot')?></span>
			            <span class="clear"><!-- --></span>
					</a>
					<a href="http://us.blizzard.com/es-mx/community/screenshots/index.html" class="tosubmit external"><?php echo WoW_locale::GetString('template_community_send')?></a>
				</li>
			
				<li>
					<a href="../media/wallpapers/fan-arthtml.html" class="wallpaper block" target="_blank">
						<span class="content-thumb"></span>
						<span class="content-title"><?php echo WoW_locale::GetString('template_community_screenshot_fan')?></span>
			            <span class="clear"><!-- --></span>
					</a>
					<a href="http://us.blizzard.com/es-mx/community/fanart/rules.html" class="tosubmit external"><?php echo WoW_locale::GetString('template_community_send')?></a>
				</li>
			</ul>
		</div>
	</div>
	<span class="clear"><!-- --></span>
	</div>
	<span class="clear"><!-- --></span>
</div>
</div>
</div>
