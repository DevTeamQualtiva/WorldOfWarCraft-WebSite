<ul class="service-bar">
			<li class="service-cell service-home"><a href="<?php echo WoW::GetWoWPath(); ?>/" tabindex="50" accesskey="1" title="Battle.net"> </a></li>
				<li class="service-cell service-welcome">
					<?php
                    if(WoW_Account::IsLoggedIn()) {
                        echo sprintf(WoW_Locale::GetString('template_servicebar_welcome_caption'), WoW_Account::GetFirstName());
                    }
                    else {
                        echo WoW_Locale::GetString('template_servicebar_auth_caption');
                    } ?>
				</li>
			<li class="service-cell service-account"><a href="<?php echo WoW::GetWoWPath(); ?>/account/management/?lnk=1" class="service-link" tabindex="50" accesskey="3"><?php echo WoW_Locale::GetString('template_servicebar_account'); ?></a></li>
				<li class="service-cell service-support"><a href="http://eu.blizzard.com/support/" class="service-link" tabindex="50" accesskey="4"><?php echo WoW_Locale::GetString('template_servicebar_support'); ?></a></li>

			<li class="service-cell service-explore">
				<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript"><?php echo WoW_Locale::GetString('template_servicebar_explore'); ?></a>

				<div class="explore-menu" id="explore-menu" style="display:none;">
					<div class="explore-primary">
						<ul class="explore-nav">
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/" tabindex="55">
									<strong class="explore-caption"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_home_title'); ?></strong>
									<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_home_description'); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/?lnk=2" tabindex="55">
									<strong class="explore-caption"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_account_title'); ?></strong>
									<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_account_description'); ?>
								</a>
							</li>
								<li>
									<a href="http://eu.blizzard.com/support/" tabindex="55">
										<strong class="explore-caption"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_support_title'); ?></strong>
										<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_support_description'); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/get-a-game.html" tabindex="55">
										<strong class="explore-caption"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_buy_title'); ?></strong>
										<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_buy_description'); ?>
									</a>
								</li>
						</ul>

						<div class="explore-links">
							<h2 class="explore-caption"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_title'); ?></h2>

							<ul>
									<li><a href="<?php echo WoW::GetWoWPath(); ?>/what-is/" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link1'); ?></a></li>
									<li><a href="http://eu.battle.net/realid/" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link2'); ?></a></li>
									<li><a href="<?php echo WoW::GetWoWPath(); ?>/account/parental-controls/index.html" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link3'); ?></a></li>
									<li><a href="http://eu.battle.net/security/" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link4'); ?></a></li>
									<li><a href="http://eu.battle.net/games/classic" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link5'); ?></a></li>
									<li><a href="https://eu.battle.net/account/support/index.html" tabindex="55"><?php echo WoW_Locale::GetString('template_servicebar_explore_menu_more_link6'); ?></a></li>
							</ul>
						</div>

	<span class="clear"><!-- --></span>
					</div>

					<ul class="explore-secondary">
							<li class="explore-game explore-game-sc2">
								<a href="http://eu.battle.net/sc2/" tabindex="55">
									<strong class="explore-caption">StarCraft II</strong>
									<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_starcraft'); ?>
								</a>
							</li>
							<li class="explore-game explore-game-wow">
								<a href="http://eu.battle.net/wow/" tabindex="55">
									<strong class="explore-caption">World of Warcraft</strong>
									<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_worldofwarcraft'); ?>
								</a>
							</li>
							<li class="explore-game explore-game-d3">
								<a href="http://eu.battle.net/games/d3" tabindex="55">
									<strong class="explore-caption">Diablo III</strong>
									<?php echo WoW_Locale::GetString('template_servicebar_explore_menu_diablo'); ?> 
								</a>
							</li>
					</ul>
				</div>
			</li>
		</ul>