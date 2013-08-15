<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">
World of Warcraft
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
		<div class="left-col">
			<div class="section-title">
				<span><?php echo WoW_Locale::GetString('template_game_welcome'); ?></span>
				<p><?php echo WoW_Locale::GetString('template_game_subwelcome'); ?></p>
			</div>
			<div class="main-game-contents">
<?php
$pages_guides = array('guide', 'race', 'class', 'patch-notes', 'lore');
$count = 1;
foreach($pages_guides as $guide) {
    echo sprintf('<a href="%s/" class="main-content-banner %s-bnr bnr0%d" style="background-image:url(\'%s/wow/static/images/game/landing/thumb-main-content-%d.jpg\');">
	<span class="banner-title">%s</span>
	<span class="banner-desc">%s</span>
</a>
', $guide, $count % 2 ? 'left' : 'right', $count, WoW::GetWoWPath(), $count, WoW_Locale::GetString('template_game_' . str_replace('-', '_', $guide) . '_title'), WoW_Locale::GetString('template_game_' . str_replace('-', '_', $guide) . '_desc'));
    ++$count;
}
?>
	<span class="clear"><!-- --></span>
			</div>
		</div>
		<div class="right-col">
			<div class="sub-game-contents">
				<div class="recent-updates">
					<div class="sub-title">
						<span><?php echo WoW_Locale::GetString('template_game_updates'); ?></span>
					</div>
					<ul>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/wow/guide/">Руководство для начинающих<span>4 декабря 2010 г.</span></a>
							</li>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/wow/race/">Расы World of Warcraft<span>4 декабря 2010 г.</span></a>
							</li>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/wow/class/">Классы World of Warcraft<span>4 декабря 2010 г.</span></a>
							</li>
					</ul>
				</div>


				<div class="game-services">
					<div class="sub-title">
						<span><?php echo WoW_Locale::GetString('template_game_web_features'); ?></span>
					</div>
					<div class="content-block">
						<ul>
								<li>
									<span class="block content-2">
										<span class="content-title"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/pvp/arena/"><?php echo WoW_Locale::GetString('template_game_arena_season_title'); ?></a></span>
										<span class="content-desc">
											<?php echo WoW_Locale::GetString('template_game_arena_season_desc'); ?>
											<span class="content-block-arenalinks">
                                            <?php
                                            for($i = 2; $i < 6; $i++) {
                                                if($i == 2 || ($i > 2 && $i % 2)) {
                                                    echo sprintf('<a href="%s/wow/pvp/arena/%dv%d/">%s</a>', WoW::GetWoWPath(), $i, $i, sprintf(WoW_Locale::GetString('template_team_type_format'), $i, $i));
                                                    if($i < 5) {
                                                        echo ' - ';
                                                    }
                                                }
                                            }
                                            ?>
											</span>
										</span>
									</span>
								</li>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/wow/status" class="content-1">
									<span class="content-title"><?php echo WoW_Locale::GetString('template_game_realm_status_title'); ?></span>
									<span class="content-desc"><?php echo WoW_Locale::GetString('template_game_realm_status_desc'); ?></span>
								</a>
							</li>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/armory" class="content-3">
									<span class="content-title"><?php echo WoW_Locale::GetString('template_game_armory_title'); ?></span>
									<span class="content-desc"><?php echo WoW_Locale::GetString('template_game_armory_desc'); ?></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="game-moreinfo">
					<div class="sub-title">
						<span><?php echo WoW_Locale::GetString('template_game_learn_more'); ?></span>
					</div>
					<div class="content-block">
						<ul>
								<li>
									<a href="http://<?php echo WoW_Locale::GetLocale() != 'en' ? WoW_Locale::GetLocale() : 'www'; ?>.wowhead.com" class="content-1" onclick="return Core.open(this);">
										<span class="content-title"><?php echo WoW_Locale::GetString('template_game_wowhead_title'); ?></span>
										<span class="content-desc"><?php echo WoW_Locale::GetString('template_game_wowhead_desc'); ?></span>
									</a>
								</li>
								<li>
									<a href="http://wowpedia<?php echo WoW_Locale::GetLocale() == 'ru' ? '.ru' : '.org'; ?>/" class="content-2" onclick="return Core.open(this);">
										<span class="content-title"><?php echo WoW_Locale::GetString('template_game_wowpedia_title'); ?></span>
										<span class="content-desc"><?php echo WoW_Locale::GetString('template_game_wowpedia_desc'); ?></span>
									</a>
								</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>

	<span class="clear"><!-- --></span>
</div>
</div>
</div>
