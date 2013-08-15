<?php
$zone_info = WoW_Game::GetZone();
?>
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
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/zone/" rel="np">
<?php echo WoW_Locale::GetString('template_game_dungeons_and_raids'); ?>
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/zone/#expansion=<?php echo $zone_info['expansion']; ?>" rel="np">
<?php echo WoW_Locale::GetString('template_expansion_' . $zone_info['expansion']); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/zone/<?php echo WoW_Template::GetPageData('zone_key'); ?>/" rel="np">
<?php echo $zone_info['name']; ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	
	<div id="wiki" class="wiki wiki-zone">
		<div class="sidebar">
	<table class="media-frame">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<a href="javascript:;" class="thumbnail" onclick="Lightbox.loadImage([{ src: '<?php echo WoW::GetWoWPath(); ?>/wow/static/images/wiki/zone/screenshots/<?php echo $zone_info['zone_key']; ?>.jpg' }]);">
			<span class="view"></span>
			<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/wiki/zone/thumbnails/<?php echo $zone_info['zone_key'] ?>.jpg" width="265" alt="" />
		</a>
			</td>
			<td class="mr"></td>
		</tr>
		<tr>
			<td class="bl"></td>
			<td class="bm"></td>
			<td class="br"></td>
		</tr>
	</table>

	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_item_quick_facts'); ?></h3>

		<ul class="fact-list">

				<li>
					<span class="term"><?php echo WoW_Locale::GetString('template_zone_type'); ?></span>
					<?php echo WoW_Locale::GetString('template_zone_' . $zone_info['type']); ?>
				</li>

			<li>
				<span class="term"><?php echo WoW_Locale::GetString('template_zone_players'); ?></span>
				<?php echo $zone_info['players']; ?>
			</li>

			<li>
				<span class="term"><?php echo WoW_Locale::GetString('template_zone_suggested_level'); ?></span>

					<?php
                    echo $zone_info['suggested_level'];
                    if($zone_info['heroic_level'] > 0) {
                        echo sprintf(' (<span class="color-yellow">%d</span> %s)', $zone_info['heroic_level'], WoW_Locale::GetString('template_item_heroic'));
                    }
                    ?>

			</li>

				<?php
                if($zone_info['itemLevel'] > 0) {
                    echo sprintf('<li>
                    <span class="term">%s</span>
                    %s
                    </li>', WoW_Locale::GetString('template_zone_item_level'), $zone_info['itemLevel']);
                }
                ?>

				<li>
					<span class="term"><?php echo WoW_Locale::GetString('template_zone_location'); ?></span>
						<?php echo $zone_info['location_name']; ?>
				</li>
                
                <?php
                $tooltip = null;
                if($zone_info['flags'] & INSTANCE_FLAG_HEROIC) {
                    $tooltip = WoW_Locale::GetString('template_zone_heroic_mode_available');
                }
                elseif($zone_info['flags'] & INSTANCE_FLAG_HEROIC_ONLY) {
                    $tooltip = WoW_Locale::GetString('template_zones_heroic_mode_only');
                }
                if($tooltip != null) {
                    echo sprintf('<li>%s<span class="icon-heroic-skull"></span></li>', $tooltip);
                }
                if($zone_info['patch'] != null) {
                    echo sprintf('<li><span class="term">%s </span>%s</li>', WoW_Locale::GetString('template_zone_introduced_in_patch'), $zone_info['patch']);
                }
                ?>

		</ul>
	</div>



	
	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_zone_map'); ?></h3>

	<table class="media-frame">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
			<a href="javascript:;"
			   id="map-floors"
			   class="thumbnail"
			   style="background: url('http://eu.battle.net/wow-assets/static/images/maps/thumbs/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE) == 'en-gb' ? 'en-us' : WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/<?php echo $zone_info['zone_key']; ?>.jpg') 0 0 no-repeat;">
				<span class="view"></span>
			</a>
			</td>
			<td class="mr"></td>
		</tr>
		<tr>
			<td class="bl"></td>
			<td class="bm"></td>
			<td class="br"></td>
		</tr>
	</table>

	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Zone.floors = [
						<?php
                        if($zone_info['floorLevelsCount'] == 0) {
                            echo '
                            {
                                src: \'http://eu.media.blizzard.com/wow/media/artwork/dungeon-maps/' . (WoW_Locale::GetLocale(LOCALE_DOUBLE) == 'en-gb' ? 'en-us' : WoW_Locale::GetLocale(LOCALE_DOUBLE)) . '/' . $zone_info['zone_key'] . '/' . $zone_info['zone_key'] . '1-large.jpg\'
                            }';
                        }
                        else {
                            for($i = 0; $i < $zone_info['floorLevelsCount']; ++$i) {
                                echo '{
						title: \'' . addslashes($zone_info['floorLevels'][$i]) . '\',
						src: \'http://eu.media.blizzard.com/wow/media/artwork/dungeon-maps/' . (WoW_Locale::GetLocale(LOCALE_DOUBLE) == 'en-gb' ? 'en-us' : WoW_Locale::GetLocale(LOCALE_DOUBLE)) . '/' . $zone_info['zone_key'] . '/' . $zone_info['zone_key'] . ($i + 1) . '-large.jpg\'
					}' . ($i < $zone_info['floorLevelsCount'] ? ',' : null);
                            }
                        }
                        ?>
				];
			});
	//]]>
	</script>
    <?php
    if($zone_info['floorLevelsCount'] > 0) {
        echo '<div class="radio-buttons" id="map-radios">';
        for($i = 0; $i < $zone_info['floorLevelsCount']; ++$i) {
            echo '<a href="javascript:;" id="map-radio-' . ($i + 1) . '" data-id="' . ($i + 1) . '" data-tooltip="' . $zone_info['floorLevels'][$i] . '"' . ($i == 0 ? ' class="radio-active"' : null) . '> </a>';
        }
        echo '</div>';
    }
    ?>

	</div>

	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_zone_fansites'); ?></h3>

		<span id="fansite-links"></span>
	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Fansite.generate('#fansite-links', "zone|<?php echo $zone_info['zone_id']; ?>|<?php echo $zone_info['name']; ?>");
			});
	//]]>
	</script>
	</div>
		</div>

		<div class="info">

		<div class="title">
			<h2><?php echo $zone_info['name']; ?></h2>


	<?php
    if($zone_info['expansion'] > EXPANSION_CLASSIC) {
        echo sprintf('<span class="expansion-name color-ex%d">
		<a href="%s/wow/game/patch-notes/%s" class="color-ex%d">%s %s%s</a></span>', $zone_info['expansion'], WoW::GetWoWPath(), null, $zone_info['expansion'], WoW_Locale::GetString('template_zone_expansion_required'), WoW_Locale::GetString('template_expansion_' . $zone_info['expansion']),
        ($zone_info['flags'] & INSTANCE_FLAG_REVAMPED && $zone_info['flags'] & INSTANCE_FLAG_CATA_REVAMP) ? sprintf(' (%s)', WoW_Locale::GetString('template_item_heroic')) : null
        );
    }
    ?>
    
		</div>

		<p class="intro">
			<?php echo $zone_info['intro']; ?>
		</p>
		<div class="lore">
			<?php echo $zone_info['desc']; ?>
		</div>

	<div class="panel">
		<div class="panel-title"><?php echo WoW_Locale::GetString('template_zone_bosses'); ?></div>

		<div class="zone-bosses">

    <div class="boss-column-portrait">
     <?php
     if(is_array($zone_info['bosses'])) {
        $bossesCount = count($zone_info['bosses']);
        $limit = round($bossesCount / 2);
        $i = 0;
        $divOpened = false;
        foreach($zone_info['bosses'] as $boss) {
            if($i == 0) {
                $divOpened = true;
                echo '<div class="boss-column-portrait">';
            }
            echo sprintf('<div class="boss-avatar">
		<a href="%s/wow/%s/zone/%s/%s">
			<span class="boss-portrait"
				style="background-image: url(\'http://eu.media.blizzard.com/wow/renders/npcs/portrait/creature%d.jpg\');">
			</span>
			<span class="boss-details">
				<div class="boss-name">
					%s
				</div>
			</span>
		</a>
	</div>', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $zone_info['zone_key'], $boss['key'], $boss['id'], $boss['name']);
            if($i == $limit) {
                $divOpened = false;
                echo '</div>';
            }
            ++$i;
            if($i > $limit) {
                $i = 0;
            }
        }
        if($divOpened) {
            echo '</div>';
        }
     }
     ?>
     </div>


	<span class="clear"><!-- --></span>
		</div>

	<span class="clear"><!-- --></span>
	</div>


		</div>

	<span class="clear"><!-- --></span>


			<div class="related">
				<div class="tabs ">
					<ul id="related-tabs">
								<li>
									<a href="#loot" data-key="loot" id="tab-loot">
										<span><span>
												Добыча
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#quests" data-key="quests" id="tab-quests">
										<span><span>
												Задания
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#quest-rewards" data-key="quest-rewards" id="tab-quest-rewards">
										<span><span>
												Награды за задания
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#achievements" data-key="achievements" id="tab-achievements">
										<span><span>
												Достижения
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#comments" data-key="comments" id="tab-comments">
										<span><span>
												Комментарии
												(<em>0</em>)
										</span></span>
									</a>
								</li>
					</ul>

	<span class="clear"><!-- --></span>
				</div>

				<div id="related-content" class="loading">
				</div>
			</div>

	<script type="text/javascript">
	//<![CDATA[
				$(function() {
					Wiki.pageUrl = '<?php echo WoW::GetWoWPath(); ?>/wow/zone/<?php echo $zone_info['zone_key']; ?>/';
				});
	//]]>
	</script>
	</div>
</div>
</div>
</div>
