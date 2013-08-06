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
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Guild::GetGuildURL(); ?>" rel="np">
<?php echo WoW_Guild::GetGuildName(); ?> @ <?php echo WoW_Guild::GetGuildRealmName(); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Guild::GetGuildFactionText(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
		<div class="profile-info-anchor profile-guild-info-anchor">
			<div class="guild-tabard">

		<canvas id="guild-tabard" width="240" height="240">
			<div class="guild-tabard-default " ></div>
		</canvas>
	<script type="text/javascript">
	//<![CDATA[
			$(document).ready(function() {
				var tabard = new GuildTabard('guild-tabard', {
                    <?php
                    $guild_emblem = WoW_Guild::GetGuildEmblemInfo();
                    echo sprintf("
                    'ring': '%s',
					'bg': [ 0, %d ],
					'border': [ %d, %d ],
					'emblem': [ %d, %d ]
                    ", WoW_Guild::GetGuildFactionText(), $guild_emblem['bg_color'], $guild_emblem['border_style'], $guild_emblem['border_color'], $guild_emblem['emblem_style'], $guild_emblem['emblem_color']);
                    ?>
				});
			});
	//]]>
	</script>
			</div>
			<div class="profile-info profile-guild-info">
				<div class="name"><a href="<?php echo WoW_Guild::GetGuildUrl(); ?>"><?php echo WoW_Guild::GetGuildName(); ?></a></div>
				<div class="under-name">
					<?php echo sprintf(WoW_Locale::GetString('template_guild_under_name'), WoW_Guild::GetGuildLevel(), WoW_Locale::GetString(sprintf('faction_' . WoW_Guild::GetGuildFactionText()))); ?><span class="comma">,</span>
                    <span class="realm tip" id="profile-info-realm" data-battlegroup="<?php echo WoWConfig::$DefaultBGName; ?>">
						<?php echo WoW_Guild::GetGuildRealmName(); ?>
					</span>
					&#8212;
					<span class="members"><?php echo sprintf(WoW_Locale::GetString('template_guild_members_count'), WoW_Guild::GetGuildMembersCount()); ?></span>
				</div>
				<div class="achievements"><a href="<?php echo WoW_Guild::GetGuildUrl(); ?>achievement">0</a></div>
			</div>
		</div>
        <?php
        WoW_Template::LoadTemplate('block_guild_menu');
        ?>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="summary">
			<div class="profile-section">
				<div class="summary-right">
	<?php
    if(WoW_Template::GetPageData('guild-authorized')) {
        $primary = WoW_Account::GetActiveCharacter();
        if(is_array($primary)) {
            echo sprintf('<div class="summary-characterspecific"><div class="summary-character">
		<a class="avatar" href="%s" rel="np" style="background-image: url(\'%s/wow/static/images/2d/avatar/%d-%d.jpg\');"></a>
		<div class="rest">
			<div class="name"><a href="%s" rel="np">%s</a></div>
			<div class="reputation">
				<div class="guild-progress guild-replevel-3">
					<span class="description">%s:
						<strong>%s</strong>
					</span>
	<div class="profile-progress border-2" >
		<div class="bar border-2 hover" style="width: 100%%"></div>
		<div class="bar-contents">0/ 3000 (0%%)</div>
   </div>
				</div>
			</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>
</div>', $primary['url'], WoW::GetWoWPath(), $primary['race'], $primary['gender'], $primary['url'], $primary['name'], WoW_Locale::GetString('template_reputation'), WoW_Locale::GetString('reputation_rank_3'));
        }
    }
    
    ?>
	<div class="summary-simple-list summary-perks">
	<h3 class="category "><?php echo WoW_Locale::GetString('template_guild_menu_perks'); ?>
</h3>
		<div class="profile-box-simple">
			<ul>
                                <?php
                                $perk = WoW_Guild::GetGuildPerkFromDB(1);
                                if(is_array($perk)) {
                                    echo sprintf('<li class="locked">
							<a href="%sperk#p1">
								<span class="icon-wrapper">
                                <span  class="icon-frame frame-36" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/36/%s.jpg");\'>
                                </span>
									<span class="symbol"></span>
								</span>
								<div class="text">
									<strong>%s</strong>
									<span class="desc" title="%s">%s</span>
								</div>
								<span class="type">%s</span>
	<span class="clear"><!-- --></span>
							</a>
						</li>', WoW_Guild::GetGuildURL(), $perk['icon'], $perk['name'], $perk['desc'], $perk['desc'], sprintf(WoW_Locale::GetString('template_guild_perk_level'), $perk['level']));
                                }
                                ?>
			</ul>
	<a class="profile-linktomore" href="<?php echo WoW_Guild::GetGuildUrl(); ?>perk" rel="np"><?php echo WoW_Locale::GetString('template_guild_perks_all_perks'); ?></a>
	<span class="clear"><!-- --></span>
		</div>
	</div>
	<div class="summary-weekly-contributors">
	<h3 class="category "><?php echo WoW_Locale::GetString('template_guild_top_contributors'); ?></h3>
		<div class="profile-box-simple">
            <?php echo WoW_Locale::GetString('template_guild_no_contributors'); ?>
		</div>
	</div>
				</div>
				<div class="summary-left">
    <?php
    if(WoW_Template::GetPageData('guild-authorized')) {
        echo sprintf('<div class="summary-motd">
			<div class="description"><span class="icon">%s</span></div>
		</div>', WoW_Guild::GetGuildMOTD());
    }
    ?>
	<div class="summary-activity">
	<h3 class="category "><?php echo WoW_Locale::GetString('template_guild_feed_recent_news'); ?></h3>
		<div class="profile-box-simple">
                    <?php WoW_Template::LoadTemplate('block_guild_news'); ?>
		</div>
	</div>
				</div>
	<span class="clear"><!-- --></span>
			</div>
		</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>
	<script type="text/javascript">
	//<![CDATA[
		var MsgProfile = {
			tooltip: {
				feature: {
					notYetAvailable: "<?php echo WoW_Locale::GetString('template_feature_not_available'); ?>"
				},
				vault: {
					character: "<?php echo WoW_Locale::GetString('template_vault_auth_required'); ?>",
					guild: "<?php echo WoW_Locale::GetString('template_vault_guild'); ?>"
				}
			}
		};
	//]]>
	</script>
</div>
</div>
</div>
