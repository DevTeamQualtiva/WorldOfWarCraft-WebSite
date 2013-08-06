<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="wiki" class="wiki directory wiki-index">
		<div class="title">
			<h2><?php echo WoW_Locale::GetString('template_game_guide_title'); ?></h2>
			<p class="desc"><?php echo WoW_Locale::GetString('template_game_subwelcome'); ?></p>
			<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" class="beginners-guide">
				<strong><?php echo WoW_Locale::GetString('template_game_beginners_guide_title'); ?></strong>
				<span><?php echo WoW_Locale::GetString('template_game_guide_desc'); ?></span>
			</a>
		</div>
		<div class="index">
			<div class="panel">
	<div class="column" style="width: 295px;">
		<div class="box first-child">
				<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/race/"><?php echo WoW_Locale::GetString('template_game_race_title'); ?></a></h2>
				<?php
                $horde_races = array(
                    'goblin' => 9,
                    'orc' => RACE_ORC,
                    'forsaken' => RACE_UNDEAD,
                    'tauren' => RACE_TAUREN,
                    'troll' => RACE_TROLL,
                    'blood-elf' => RACE_BLOODELF
                );
                $alliance_races = array(
                    'worgen' => 22,
                    'gnome'  => RACE_GNOME,
                    'dwarf'  => RACE_DWARF,
                    'draenei' => RACE_DRAENEI,
                    'night-elf' => RACE_NIGHTELF,
                    'human' => RACE_HUMAN
                );
                $races = array(
                    'alliance' => $alliance_races,
                    'horde' => $horde_races
                );
                foreach($races as $faction_name => $races) {
                    echo sprintf('<h4 class="subcategory ">%s</h4>', WoW_Locale::GetString('faction_' . $faction_name));
                    $i = 0;
                    foreach($races as $race_name => $race_id) {
                        if($i == 0 || $i == round((count($races) / 2))) {
                            echo '<ul class="double">';
                        }
                        echo sprintf('<li>
                        <a href="race/%s">
                            <span class="icon-frame frame-14 ">
                                <img src="http://eu.media.blizzard.com/wow/icons/18/race_%s_male.jpg" alt="" width="14" height="14" />
                            </span>
                            %s
                        </a>
                    </li>', $race_name, $race_name, WoW_Locale::GetString('character_race_' . $race_id));
                        if($i == (round((count($races) / 2)) - 1) || $i == (count($races) - 1)) {
                            echo '</ul>';
                        }
                        ++$i;
                    }
                    if($faction_name == 'alliance') {
                        echo '	<span class="clear"><!-- --></span><br />';
                    }
                }
                ?>

	<span class="clear"><!-- --></span>
		</div>
		<div class="box">
				<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/"><?php echo WoW_Locale::GetString('template_game_class_title'); ?></a></h2>
                <?php
                $classes = array(
                    'warrior' => CLASS_WARRIOR,
                    'druid' => CLASS_DRUID,
                    'priest' => CLASS_PRIEST,
                    'mage' => CLASS_MAGE,
                    'hunter' => CLASS_HUNTER,
                    'paladin' => CLASS_PALADIN,
                    'rogue' => CLASS_ROGUE,
                    'death-knight' => CLASS_DK,
                    'warlock' => CLASS_WARLOCK,
                    'shaman' => CLASS_SHAMAN
                );
                $i = 0;
                foreach($classes as $class_name => $class_id) {
                    if($i == 0 || $i == round((count($classes) / 2))) {
                        echo '<ul class="double">';
                    }
                    echo sprintf('<li>
						<a href="class/%s">
		<span class="icon-frame frame-14 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/class_%s.jpg" alt="" width="14" height="14" />
		</span>%s</a>
				</li>', $class_name, $class_name, WoW_Locale::GetString('character_class_' . $class_id));
                    if($i == (round((count($classes) / 2)) - 1) || $i == (count($classes) + 1)) {
                        echo '</ul>';
                    }
                    ++$i;
                }
                ?>
	<span class="clear"><!-- --></span>
		</div>
	</div>

	<div class="column" style="margin: 0 19px; width: 235px;">
			<div class="box first-child">
					<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/zone/"><?php echo WoW_Locale::GetString('template_game_dungeons_and_raids'); ?></a></h2>
				<ul>
                        <?php
                        for($i = 3; $i >= 0; --$i) {
                            echo sprintf('<li><a href="%s/wow/zone/#expansion=%d">%s</a></li>', WoW::GetWoWPath(), $i, WoW_Locale::GetString('template_game_expansion_' . $i));
                        }
                        ?>
				</ul>
			</div>

			<div class="box">
					<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/"><?php echo WoW_Locale::GetString('template_game_factions'); ?></a></h2>
				<ul>
						<?php
                        for($i = 3; $i >= 0; --$i) {
                            echo sprintf('<li><a href="%s/wow/faction/#expansion=%d">%s</a></li>', WoW::GetWoWPath(), $i, WoW_Locale::GetString('template_game_expansion_' . $i));
                        }
                        ?>
				</ul>
			</div>

			<div class="box">
					<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/lore/"><?php echo WoW_Locale::GetString('template_game_lore'); ?></a></h2>
				<ul>
					<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/lore/#latest-story-so-far"><?php echo WoW_Locale::GetString('template_game_lore_title'); ?></a></li>
					<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/lore/#leader-story"><?php echo WoW_Locale::GetString('template_game_lore_story'); ?></a></li>
					<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/lore/#latest-short-story"><?php echo WoW_Locale::GetString('template_game_lore_leaders'); ?></a></li>
				</ul>
			</div>
	</div>

	<div class="column" style="width: 315px;">
			<div class="box first-child">
					<h2 class="header "><a href="<?php echo WoW::GetWoWPath(); ?>/wow/profession/"><?php echo WoW_Locale::GetString('template_guild_roster_professions'); ?></a></h2>


					<?php
                    $primary_professions = array(
                        'alchemy' => SKILL_ALCHEMY,
                        'mining' => SKILL_MINING,
                        'engneering' => SKILL_ENGINERING,
                        'leatherworking' => SKILL_LEATHERWORKING,
                        'blacksmithing' => SKILL_BLACKSMITHING,
                        'enchanting' => SKILL_ENCHANTING,
                        'inscription' => SKILL_INSCRIPTION,
                        'tailoring' => SKILL_TAILORING,
                        'skinning' => SKILL_SKINNING,
                        'herbalism' => SKILL_HERBALISM,
                        'jewelcrafting' => SKILL_JEWELCRAFTING
                    );
                    echo sprintf('<h4 class="subcategory ">%s</h4>', WoW_Locale::GetString('template_game_primary_professions'));
                    $professions = DB::WoW()->select("SELECT `name_%s` AS `name`, LOWER(`name_en`) AS `key`, `icon` FROM `DBPREFIX_professions` WHERE `id` IN (%s)", WoW_Locale::GetLocale(), array_values($primary_professions));
                    if(is_array($professions)) {
                        $i = 0;
                        foreach($professions as $prof) {
                            if($i == 0 || $i == round((count($professions) / 2))) {
                                echo '<ul class="double">';
                            }
                            echo sprintf('<li><a href="%s/wow/profession/%s">
                            <span class="icon-frame frame-14 ">
                                <img src="http://eu.media.blizzard.com/wow/icons/18/%s.jpg" alt="" width="14" height="14" />
                            </span>%s
                        </a>
                    </li>', WoW::GetWoWPath(), $prof['key'], $prof['icon'], $prof['name']);
                            if($i == (round((count($professions) / 2)) - 1) || $i == (count($professions) - 1)) {
                                echo '</ul>';
                            }
                            ++$i;
                        }
                    }
                    ?>

	<span class="clear"><!-- --></span>
				<br />
                    <?php
                    $secondary_professions = array(
                        'archaeology' => SKILL_ARCHAEOLOGY,
                        'cooking' => SKILL_COOKING,
                        'first-aid' => SKILL_FIRST_AID,
                        'fishing' => SKILL_FISHING
                    );
                    echo sprintf('<h4 class="subcategory ">%s</h4>', WoW_Locale::GetString('template_game_secondary_professions'));
                    $professions = DB::WoW()->select("SELECT `name_%s` AS `name`, LOWER(`name_en`) AS `key`, `icon` FROM `DBPREFIX_professions` WHERE `id` IN (%s)", WoW_Locale::GetLocale(), array_values($secondary_professions));
                    if(is_array($professions)) {
                        $i = 0;
                        foreach($professions as $prof) {
                            if($i == 0 || $i == round((count($professions) / 2))) {
                                echo '<ul class="double">';
                            }
                            echo sprintf('<li><a href="%s/wow/profession/%s">
                            <span class="icon-frame frame-14 ">
                                <img src="http://eu.media.blizzard.com/wow/icons/18/%s.jpg" alt="" width="14" height="14" />
                            </span>%s
                        </a>
                    </li>', WoW::GetWoWPath(), str_replace(' ', '-', $prof['key']), $prof['icon'], $prof['name']);
                            if($i == (round((count($professions) / 2)) - 1) || $i == (count($professions) - 1)) {
                                echo '</ul>';
                            }
                            ++$i;
                        }
                    }
                    ?>

	<span class="clear"><!-- --></span>
			</div>
	</div>

	<span class="clear"><!-- --></span>
			</div>

			<div class="extras">
				<ul>
						<li class="pvp">
							<a href="<?php echo WoW::GetWoWPath(); ?>/wow/pvp/arena/">
								<span class="icon"></span>
								PvP<br />
								<span><?php echo WoW_Locale::GetString('template_game_arena_season_desc'); ?></span>
							</a>
						</li>
						<li class="realm">
							<a href="<?php echo WoW::GetWoWPath(); ?>/wow/status">
								<span class="icon"></span>
								<?php echo WoW_Locale::GetString('template_game_realm_status_title'); ?><br />
								<span><?php echo WoW_Locale::GetString('template_game_realm_status_desc'); ?></span>
							</a>
						</li>
						<li class="patches">
							<a href="<?php echo WoW::GetWoWPath(); ?>/game/patch-notes/">
								<span class="icon"></span>
								<?php echo WoW_Locale::GetString('template_game_patch_notes_title'); ?><br />
								<span><?php echo WoW_Locale::GetString('template_game_patch_notes_desc'); ?></span>
							</a>
						</li>
				</ul>

	<span class="clear"><!-- --></span>
			</div>
		</div>
	

	<span class="clear"><!-- --></span>
	</div>
</div>
</div>
</div>
