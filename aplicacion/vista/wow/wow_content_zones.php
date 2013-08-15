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
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/zone/" rel="np">
<?php echo WoW_Locale::GetString('template_game_dungeons_and_raids'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="wiki" class="wiki directory wiki-zone">

		<div class="title">
			<h2><?php echo WoW_Locale::GetString('template_game_dungeons_and_raids'); ?></h2>

			<div class="desc"><?php echo WoW_Locale::GetString('template_zones_desc'); ?></div>
		</div>

		<div class="wrapper">
			<div class="groups">
            <?php
            $all_zones = WoW_Game::GetZones();
            if(is_array($all_zones)) {
                $modes = array('dungeons', 'raids');
                foreach($all_zones as $expansionId => $zones) {
                    echo sprintf('<div class="group" id="expansion-%d"%s>', $expansionId, $expansionId != EXPANSION_CATA ? ' style="display: none"' : null);
                    foreach($modes as $currentMode) {
                        echo sprintf('
                        <div class="group-column">
                        <h3>%s</h3>
                        ', WoW_Locale::GetString('template_zones_' . $currentMode));
                        // Print dungeons
                        if(isset($zones[$currentMode]) && is_array($zones[$currentMode])) {
                            echo '<ul>
                            ';
                            $dungeonGroups = array();
                            foreach($zones[$currentMode] as $dungeon) {
                                if($dungeon['dungeonGroup'] > 0 && !in_array($dungeon['dungeonGroup'], $dungeonGroups)) {
                                    // Add current dungeonGroup into $dungeonGroups array
                                    $dungeonGroups[] = $dungeon['dungeonGroup'];
                                    // And display separator
                                    echo sprintf('<li><span class="separator">%s</span></li>', $dungeon['dungeonGroupName']);
                                }
                                // Generate tooltip
                                $tooltip_template = '<span data-tooltip="%s" class="icon-heroic-skull"></span>';
                                $tooltipRequired = true;
                                $instance_tooltip = '';
                                if($dungeon['expansion'] != $expansionId) {
                                    // Seems that we have revamped dungeon. Let's check it
                                    if($dungeon['flags'] & INSTANCE_FLAG_REVAMPED && $dungeon['flags'] & INSTANCE_FLAG_CATA_REVAMP) {
                                        // Set tooltip as classic
                                        $instance_tooltip = $instance_tooltip = sprintf($tooltip_template, sprintf(WoW_Locale::GetString('template_zones_heroic_mode_available'), $dungeon['maxLevel']));
                                    }
                                    else {
                                        $tooltipRequired = false;
                                    }
                                }
                                else {
                                    // Check for revamp (we have to set "normal mode available")
                                    if($dungeon['flags'] & INSTANCE_FLAG_REVAMPED && $dungeon['flags'] & INSTANCE_FLAG_CATA_REVAMP) {
                                        if($dungeon['flags'] & INSTANCE_FLAG_NORMAL) {
                                            $instance_tooltip = sprintf($tooltip_template, sprintf(WoW_Locale::GetString('template_zones_normal_mode_available'), $dungeon['minLevelExtra'], $dungeon['maxLevelExtra']));
                                        }
                                        elseif($dungeon['flags'] & INSTANCE_FLAG_HEROIC_ONLY) {
                                            $instance_tooltip = sprintf($tooltip_template, WoW_Locale::GetString('template_zones_heroic_mode_only'));
                                        }
                                        else {
                                            $tooltipRequired = false;
                                        }
                                    }
                                    else {
                                        if($dungeon['flags'] & INSTANCE_FLAG_HEROIC) {
                                            $instance_tooltip = sprintf($tooltip_template, sprintf(WoW_Locale::GetString('template_zones_heroic_mode_available'), $dungeon['flags'] & INSTANCE_FLAG_EXTRA_HEROIC_LEVEL ? $dungeon['maxLevelExtra'] : $dungeon['maxLevel']));
                                        }
                                        elseif($dungeon['flags'] & INSTANCE_FLAG_NORMAL) {
                                            $instance_tooltip = sprintf($tooltip_template, WoW_Locale::GetString('template_zones_normal_mode_available'), $dungeon['minLevelExtra'], $dungeon['minLevelExtra']);
                                        }
                                        elseif($dungeon['flags'] & INSTANCE_FLAG_HEROIC_ONLY) {
                                            $instance_tooltip = sprintf($tooltip_template, WoW_Locale::GetString('template_zones_heroic_mode_only'));
                                        }
                                        else {
                                            $tooltipRequired = false;
                                        }
                                    }
                                }
                                // Generate level info
                                $levelInfo = $dungeon['minLevel'] == $dungeon['maxLevel'] ? $dungeon['maxLevel'] : sprintf('%d–%d', $dungeon['minLevel'], $dungeon['maxLevel']);
                                // Check for revamp
                                if($dungeon['expansion'] != $expansionId) {
                                    if($dungeon['flags'] & INSTANCE_FLAG_REVAMPED && $dungeon['flags'] & INSTANCE_FLAG_CATA_REVAMP) {
                                        // Set levels as classic
                                        $levelInfo = $dungeon['minLevelExtra'] == $dungeon['maxLevelExtra'] ? $dungeon['maxLevelExtra'] : sprintf('%d–%d', $dungeon['minLevelExtra'], $dungeon['maxLevelExtra']);
                                    }
                                }
                                echo sprintf('
                                <li>
                                    <a href="%s/wow/zone/%s/">
                                        <span class="zone-thumbnail thumb-%s"></span>
                                        <span class="level-range">
                                        %s
                                        </span>
                                        <span class="name">
                                        %s
                                        %s
                                        </span>
                                        %s
                                        <span class="clear"><!-- --></span>
                                    </a>
                                </li>', WoW::GetWoWPath(), $dungeon['zone_key'], $dungeon['zone_key'], $levelInfo,
                                $dungeon['name'], ($tooltipRequired && $instance_tooltip != null) ? $instance_tooltip : null, ($dungeon['patch'] != null && !($dungeon['flags'] & INSTANCE_FLAG_SKIP_INTRODUCED_INFO)) ? sprintf('<span class="patch">%s</span>', sprintf(WoW_Locale::GetString('template_zones_since_patch'), $dungeon['patch'])) : null);
                            }
                            echo '
                            </ul>';
                        }
                        echo '
                        </div>';
                    }
                    echo '
                    <span class="clear"><!-- --></span></div>';
                }
            }
            ?>
			
					</div>
			</div>
			
			<ul class="navigation">
                    <?php
                    for($i = 3; $i >= 0; --$i) {
                        echo sprintf('<li>
						<a href="javascript:;"
						   id="nav-%d"
						   onclick="WikiDirectory.view(this, %d);"
						   class="expansion-%d'.(($i == 3) ? ' nav-active' : '').'">
							%s
						</a>
					</li>
                    ', $i, $i, $i, WoW_Locale::GetString('template_expansion_' . $i));
                    }
                    ?>
			</ul>
		</div>

	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				WikiDirectory.initialize(3);
			});
	//]]>
	</script>


	<span class="clear"><!-- --></span>
	</div>

</div>
</div>
