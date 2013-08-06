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
<li>
<a href="<?php echo WoW_Guild::GetGuildURL(); ?>" rel="np">
<?php echo sprintf('%s @ %s', WoW_Guild::GetGuildName(), WoW_Guild::GetGuildRealmName()); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Guild::GetGuildURL(); ?>roster" rel="np">
<?php echo WoW_Locale::GetString('template_guild_menu_roster'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">	
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php WoW_Guild::GetGuildFactionText(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
		<div class="profile-sidebar-tabard">
			<div class="guild-tabard">
		<canvas id="guild-tabard" width="240" height="240">
			<div class="guild-tabard-default tabard-<?php WoW_Guild::GetGuildFactionText(); ?>" ></div>
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
				<div class="tabard-overlay"></div>
				<div class="crest"></div>
				<a class="tabard-link" href="<?php echo WoW_Guild::GetGuildURL(); ?>"></a>
			</div>
			<div class="profile-sidebar-info">
				<div class="name"><a href="<?php echo WoW_Guild::GetGuildURL(); ?>"><?php echo WoW_Guild::GetGuildName(); ?></a></div>
				<div class="under-name">
					<?php echo sprintf(WoW_Locale::GetString('template_guild_under_name'), WoW_Guild::GetGuildLevel(), WoW_Locale::GetString(sprintf('faction_' . WoW_Guild::GetGuildFactionText()))); ?>
				</div>
				<div class="realm">
					<span id="profile-info-realm" class="tip" data-battlegroup="<?php echo WoWConfig::$DefaultBGName; ?>"><?php echo WoW_Guild::GetGuildRealmName(); ?></span>
				</div>
			</div>
		</div>
	<?php WoW_Template::LoadTemplate('block_guild_menu'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="profile-section-header">
	<div class="ui-dropdown" id="roster-view">
		<select>
			<option value="achievementPoints" selected="selected"><?php echo WoW_Locale::GetString('template_guild_roster_achievements'); ?></option>
			<option value="guildActivity"><?php echo WoW_Locale::GetString('template_guild_roster_activity'); ?></option>
			<option value="professions"><?php echo WoW_Locale::GetString('template_guild_roster_professions'); ?></option>
						</select>
					</div>
	<h3 class="category"><?php echo WoW_Locale::GetString('template_guild_menu_roster'); ?></h3>
		</div>
		<div class="profile-section">
			<form id="roster-form" action="">
				<div class="roster-filters clear-after">
					<input type="hidden" name="view" id="filter-view" />
					<div id="roster-buttons">						
	<button class="ui-button button2 " type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_guild_roster_filter'); ?></span>
		</span>
	</button>
						<a href="javascript:;" onclick="Guild.reset();"><?php echo WoW_Locale::GetString('template_guild_roster_reset_filter'); ?></a>
					</div>
					<div class="selection">
						<label for="filter-name"><?php echo WoW_Locale::GetString('template_search_table_charname'); ?></label>
						<input type="text" name="name" class="input character" id="filter-name" data-column="0" value="" data-filter="column" alt="Введите имя"/>
					</div>
					<div class="selection">
						<label for="filter-minLvl"><?php echo WoW_Locale::GetString('template_search_table_level'); ?></label>
						<input type="text" name="minLvl" id="filter-minLvl" class="input level" value="1" maxlength="2" data-min="1" data-filter="range" data-column="3" /> -
						<input type="text" name="maxLvl" id="filter-maxLvl" class="input level" value="80" maxlength="2" data-max="80" data-filter="range" data-column="3" />
		</div>
					<div class="selection">
						<label for="filter-race"><?php echo WoW_Locale::GetString('template_search_table_race'); ?></label>
						<select name="race" class="input class" id="filter-race" data-column="1" data-filter="column">
							    <option value=""><?php echo Wow_Locale::GetString('template_guild_roster_all_races'); ?></option>
                                <?php
                                switch(WoW_Guild::GetGuildFactionID()) {
                                    default:
                                    case FACTION_ALLIANCE:
                                        $allowed_races = array(RACE_HUMAN, RACE_DWARF, RACE_NIGHTELF, RACE_GNOME, RACE_DRAENEI);
                                        break;
                                    case FACTION_HORDE:
                                        $allowed_races = array(RACE_ORC, RACE_UNDEAD, RACE_TAUREN, RACE_TROLL, RACE_BLOODELF);
                                        break;
                                }
                                foreach($allowed_races as $race) {
                                    echo sprintf('<option value="%d">%s</option>', $race, WoW_Locale::GetString('character_race_' . $race, GENDER_MALE));
                                }
                                ?>
						</select>
					</div>
					<div class="selection">
						<label for="filter-class"><?php echo WoW_Locale::GetString('template_search_table_class'); ?></label>
						<select name="class" class="input class" id="filter-class" data-column="2" data-filter="column">
							<option value=""><?php echo WoW_Locale::GetString('template_guild_roster_all_classes'); ?></option>
                                <?php
                                for($i = CLASS_WARRIOR; $i < MAX_CLASSES; ++$i) {
                                    if($i == 10) {
                                        continue;
                                    }
                                    echo sprintf('<option value="%d">%s</option>', $i, WoW_Locale::GetString('character_class_' . $i, GENDER_MALE));
                                }
                                ?>
						</select>
					</div>
					<div class="selection inputs-rank">
						<label for="filter-rank"><?php echo WoW_Locale::GetString('template_guild_roster_guild_rank'); ?></label>
						<select name="rank" class="input guildrank" id="filter-rank" data-column="4" data-filter="column">
							<option value=""><?php echo WoW_Locale::GetString('template_guild_roster_all_ranks'); ?></option>
                            <?php
                            $ranks = WoW_Guild::GetGuildRanks();
                            foreach($ranks as $rank) {
                                echo sprintf('<option value="%d">%d</option>', $rank['rankID'], $rank['rankID']);
                            }
                            ?>
						</select>
					</div>
				</div>
			</form>
	<div class="table-options">
			<div class="option">
	<ul class="ui-pagination">
				<li class="current">
                    <a href="?page=1">1</a>
				</li>
				<li>
                    <a href="?page=2">2</a>
				</li>
				<li>
                    <a href="?page=3">3</a>
				</li>
				<li>
                    <a href="?page=4">4</a>
				</li>
			<li class="cap-item"><a href="?page=2"><?php echo WoW_Locale::GetString('template_articles_full_caption'); ?></a></li>
	</ul>
			</div>
			<?php echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), 1, WoW_Guild::GetFilteredGuildMembersCount(), WoW_Guild::GetGuildMembersCount()); ?>
	<span class="clear"><!-- --></span>
	</div>
	<div id="roster" class="table">
		<table>
			<thead>
				<tr>
						<th class="name">
	<a href="?sort=name&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_charname'); ?>
</span>
	</a>
						</th>
						<th class="race">
	<a href="?sort=race&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_race'); ?>
</span>
	</a>
						</th>
						<th class="cls">
	<a href="?sort=class&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_class'); ?>
</span>
	</a>
						</th>
						<th class="lvl">
	<a href="?sort=lvl&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_level'); ?>
</span>
	</a>
						</th>
						<th class="rank">
	<a href="?sort=rank&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_guild_roster_guild_rank'); ?>
</span>
	</a>
						</th>
						<th class="ach-points">
	<a href="?sort=achievements&amp;dir=d" class="sort-link">
		<span class="arrow up"><?php echo WoW_Locale::GetString('template_guild_roster_achievements'); ?>
</span>
	</a>
						</th>
				</tr>
			</thead>
			<tbody>
            <?php
            $roster = WoW_Guild::GetGuildMembers();
            $toggleStyle = 2;
            foreach($roster as $char) {
                echo sprintf('<tr class="row%d" data-level="%d">
				<td class="name"><a href="%s" class="color-c%d">%s</a></td>
				<td class="race" data-raw="%d">
					<img src="%s/wow/static/images/icons/race/%d-%d.gif" class="img" alt="" data-tooltip="%s" />
				</td>
				<td class="cls" data-raw="%d">
					<img src="%s/wow/static/images/icons/class/%d.gif" class="img" alt="" data-tooltip="%s" />
				</td>
				<td class="lvl">%d</td>
				<td class="rank" data-raw="%d">
					<span >%s</span>
				</td>
				<td class="ach-points">
					<span class="ach-icon">%d</span>
				</td>
			</tr>', $toggleStyle % 2 ? '1' : '2', $char['level'], $char['url'], $char['classID'], $char['name'],
            $char['raceID'], WoW::GetWoWPath(), $char['raceID'], $char['genderID'], $char['race_text'],
            $char['classID'], WoW::GetWoWPath(), $char['classID'], $char['class_text'],
            $char['level'], $char['rankID'], $char['rankID'] > 0 ? sprintf(WoW_Locale::GetString('template_guild_roster_rank'), $char['rankID']) : WoW_Locale::GetString('template_guild_roster_guild_master'), $char['achievement_points']);
                ++$toggleStyle;
            }
            ?>
			</tbody>
		</table>
	</div>
	<div class="table-options">
			<div class="option">
	<ul class="ui-pagination">
				<li class="current">
                    <a href="?page=1">1</a>
				</li>
				<li>
                    <a href="?page=2">2</a>
				</li>
				<li>
                    <a href="?page=3">3</a>
				</li>
				<li>
                    <a href="?page=4">4</a>
				</li>
			<li class="cap-item"><a href="?page=2"><?php echo WoW_Locale::GetString('template_articles_full_caption'); ?></a></li>
	</ul>
			</div>
			<?php echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), 1, WoW_Guild::GetFilteredGuildMembersCount(), WoW_Guild::GetGuildMembersCount()); ?>
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
