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
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Guild::GetGuildFactionText(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
		<div class="profile-sidebar-tabard">
			<div class="guild-tabard">
		<canvas id="guild-tabard" width="240" height="240">
			<div class="guild-tabard-default tabard-<?php echo WoW_Guild::GetGuildFactionText(); ?>" ></div>
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
			<option value="achievementPoints"><?php echo WoW_Locale::GetString('template_guild_roster_achievements'); ?></option>
			<option value="guildActivity"><?php echo WoW_Locale::GetString('template_guild_roster_activity'); ?></option>
			<option value="professions" selected="selected"><?php echo WoW_Locale::GetString('template_guild_roster_professions'); ?></option>
						</select>
					</div>
	<h3 class="category "><?php echo WoW_Locale::GetString('template_guild_menu_roster'); ?></h3>
		</div>
		<div class="profile-section">
			<form id="roster-form" action="">
				<div class="roster-filters clear-after">
	<button class="ui-button button2 " type="button" id="reset-button" onclick="Professions.reset();">
		<span>
			<span><?php echo WoW_Locale::GetString('template_guild_roster_reset_filter'); ?></span>
		</span>
	</button>
					<div class="selection">
						<label for="filter-name"><?php echo WoW_Locale::GetString('template_search_table_charname'); ?>:</label>
						<input type="text" class="input character" id="filter-name" data-column="0" data-filter="column" alt="Enter name"/>
					</div>
					<div class="selection">
						<label for="filter-skill"><?php echo WoW_Locale::GetString('template_guild_roster_profession'); ?>:</label>
						<select class="input" id="filter-skill" data-column="4" data-filter="column">
							<option value=""><?php echo WoW_Locale::GetString('template_guild_roster_all_professions'); ?></option>
                            <?php
                            $skills_professions = array(
                                SKILL_BLACKSMITHING,
                                SKILL_LEATHERWORKING,
                                SKILL_ALCHEMY,
                                SKILL_HERBALISM,
                                SKILL_MINING,
                                SKILL_TAILORING,
                                SKILL_ENGINERING,
                                SKILL_ENCHANTING,
                                SKILL_SKINNING,
                                SKILL_JEWELCRAFTING,
                                SKILL_INSCRIPTION
                            );
                            foreach($skills_professions as $prof) {
                                echo sprintf('<option value="%d">%s</option>', $prof, DB::WoW()->selectCell("SELECT `name_%s` FROM `DBPREFIX_professions` WHERE `id` = %d LIMIT 1", WoW_Locale::GetLocale(), $prof));
                            }
                            ?>
						</select>
					</div>
					<div class="selection inputs-skill">
						<label for="filter-minSkill"><?php echo WoW_Locale::GetString('template_guild_roster_skill_level'); ?>:</label>
						<input type="text" id="filter-minSkill" class="input skill" value="1" maxlength="3" data-min="1" data-column="4" data-filter="range" /> -
						<input type="text" id="filter-maxSkill" class="input skill" value="<?php echo MAX_PROFESSION_SKILL_VALUE; ?>" maxlength="3" data-max="<?php echo MAX_PROFESSION_SKILL_VALUE; ?>" data-column="4" data-filter="range" />
					</div>
					<div class="selection">
						<input class="input show-max-skill" id="filter-onlyMaxSkill" value="0" type="checkbox" data-column="4" data-filter="column" />
						<label for="filter-onlyMaxSkill" class="show-max-skill-label"><?php echo WoW_Locale::GetString('template_guild_roster_only_max_skill'); ?></label>
					</div>
	<span class="clear"><!-- --></span>
				</div>
			</form>
	<div id="profession-tables" class="profession-tables">
	<div id="professions" class="table">
		<table>
			<thead>
				<tr>
						<th class="name">
								<a href="javascript:;" class="sort-link">
									<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_charname'); ?></span>
								</a>
						</th>
						<th class="race">
								<a href="javascript:;" class="sort-link">
									<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_race'); ?></span>
								</a>
						</th>
						<th class="cls">
								<a href="javascript:;" class="sort-link">
									<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_class'); ?></span>
								</a>
						</th>
						<th class="lvl">
								<a href="javascript:;" class="sort-link numeric">
									<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_level'); ?></span>
								</a>
						</th>
						<th class="skill">
								<a href="javascript:;" class="sort-link numeric">
									<span class="arrow"><?php echo WoW_Locale::GetString('template_guild_roster_profession_skill'); ?></span>
								</a>
						</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
	//<![CDATA[
			$(function() {
					Professions.table = new Table('#professions', { column: 0 });
			});
	//]]>
	</script>
            <?php
            $professions = WoW_Guild::GetGuildProfessions();
            $roster = WoW_Guild::GetGuildMembers();
            if(is_array($professions)) {
                foreach($professions as $prof_id => $prof) {
                    $prof_info = DB::WoW()->selectRow("SELECT `name_%s` AS `name`, `icon` FROM `DBPREFIX_professions` WHERE `id` = %d LIMIT 1", WoW_Locale::GetLocale(), $prof_id);
                    if(!$prof_info) {
                        continue;
                    }
                    echo sprintf('<div id="professions-%d" class="parentTable">
                    <a href="javascript:;" class="table-bar" onclick="Professions.toggleSection(this);">
						<span class="toggler">
		<span  class="icon-frame frame-18" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg");\'>
		</span>
							%s (<span class="total">%d</span>)
						</span>
					</a>
                    <div id="professions-table-%d" class="table childTable">
		<table>
			<thead><tr>
						<th class="name">
								<a href="javascript:;" class="sort-link">
									<span class="arrow">Name</span>
								</a>
						</th>
						<th class="race">
								<a href="javascript:;" class="sort-link">
									<span class="arrow">Race</span>
								</a>
						</th>
						<th class="cls">
								<a href="javascript:;" class="sort-link">
									<span class="arrow">Class</span>
								</a>
						</th>
						<th class="lvl">
								<a href="javascript:;" class="sort-link numeric">
									<span class="arrow">Level</span>
								</a>
						</th>
						<th class="skill">
								<a href="javascript:;" class="sort-link numeric">
									<span class="arrow">Skill</span>
								</a>
						</th>
				</tr>
			</thead>
			<tbody>', $prof_id, $prof_info['icon'], $prof_info['name'], count($prof), $prof_id);
                    $toggleStyle = 2;
                    foreach($roster as $char) {
                        if(!isset($char['professions'])) {
                            continue;
                        }
                        if(!is_array($char['professions'])) {
                            continue;
                        }
                        if(isset($char['professions'][0]) && $char['professions'][0]['skill'] == $prof_id) {
                            $index = 0;
                        }
                        elseif(isset($char['professions'][1]) && $char['professions'][1]['skill'] == $prof_id) {
                            $index = 1;
                        }
                        else {
                            continue;
                        }
                        echo sprintf('<tr class="row%d" data-level="%d" data-skill="%d">
										<td class="name">
											<a href="%s" class="color-c%d">
												%s
											</a>
										</td>
										<td class="race" data-raw="%s">
											<img src="%s/wow/static/images/icons/race/%d-%d.gif" class="img" alt="" data-tooltip="%s" />
										</td>
										<td class="cls" data-raw="%s">
											<img src="%s/wow/static/images/icons/class/%d.gif" class="img" alt="" data-tooltip="%s" />
										</td>
										<td class="lvl">%d</td>
										<td class="skill" data-raw="%d">%d</td>
									</tr>', $toggleStyle % 2 ? '1' : '2', $char['level'], $char['professions'][$index]['value'],
                                    $char['url'], $char['classID'], $char['name'],
                                    $char['race_text'], WoW::GetWoWPath(), $char['raceID'], $char['genderID'], $char['race_text'],
                                    $char['class_text'], WoW::GetWoWPath(), $char['classID'], $char['class_text'],
                                    $char['level'],
                                    $char['professions'][$index]['value'], $char['professions'][$index]['value']
                            );
                        ++$toggleStyle;
                    }
                    echo sprintf('<tr class="no-results" style="display: none">
							<td colspan="8">Nothing found.</td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            <script type="text/javascript">
                            //<![CDATA[
                                $(function() {
                                    Professions.tables.push( new Table(\'#professions-table-%d\', { column: 0 }) );
                                });
                            //]]>
                        </script>
                    </div>', $prof_id);
                }
            }
            ?>
		<div id="professions-noResults" class="no-results" style="display: none">
			Nothing found.
		</div>
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
