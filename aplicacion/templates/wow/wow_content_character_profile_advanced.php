<?php
// Talents data
$talents = WoW_Characters::GetTalentsData();
// Character audit
$audit = WoW_Characters::GetAudit();
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
<li class="last">
<a href="<?php echo WoW_Characters::GetURL(); ?>advanced" rel="np">
<?php echo sprintf('%s @ %s', WoW_Characters::GetName(), WoW_Characters::GetRealmName()); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-advanced profile-wrapper-<?php echo WoW_Characters::GetFactionName(); ?> profile-wrapper-light">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
		<div class="profile-info-anchor">
			<div class="profile-info">
				<div class="name"><a href="<?php echo WoW_Characters::GetURL(); ?>" rel="np"><?php echo WoW_Characters::GetName(); ?></a></div>
				<div class="title-guild">
                    <?php
                    echo sprintf('<div class="title">%s</div>
                    <div class="guild">
							<a href="%s?character=%s">%s</a>
						</div>', WoW_Characters::GetTitleInfo('title'), WoW_Characters::GetGuildURL(), urlencode(WoW_Characters::GetName()), WoW_Characters::GetGuildName());
                    ?>						
				</div>
	<span class="clear"><!-- --></span>
				<div class="under-name color-c<?php echo WoW_Characters::GetClassID(); ?>">
						<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/race/<?php echo WoW_Characters::GetRaceKey(); ?>" class="race"><?php echo WoW_Characters::GetRaceName(); ?></a>-<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/<?php echo WoW_Characters::GetClassKey(); ?>" class="class"><?php echo WoW_Characters::GetClassName(); ?></a> (<span id="profile-info-spec" class="spec tip"><?php echo $talents['specsData'][WoW_Characters::GetActiveSpec()]['name']; ?></span>) <span class="level"><strong><?php echo WoW_Characters::GetLevel(); ?></strong></span> <?php echo WoW_Locale::GetString('template_lvl'); ?><span class="comma">,</span>
					<span class="realm tip" id="profile-info-realm" data-battlegroup="<?php echo WoWConfig::$DefaultBGName; ?>">
						<?php echo WoW_Characters::GetRealmName(); ?>
					</span>
				</div>
				<div class="achievements"><a href="<?php echo WoW_Characters::GetURL(); ?>achievement"><?php echo WoW_Achievements::GetAchievementsPoints(); ?></a></div>
			</div>
		</div>
	<?php
    WoW_Template::LoadTemplate('block_profile_menu');
    ?>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="summary-top">
			<div class="summary-top-right">
	<ul class="profile-view-options" id="profile-view-options-summary">
			<li>
				<a href="javascript:;" rel="np" class="threed disabled">
					3D
				</a>
			</li>
			<li class="current">
				<a href="<?php echo WoW_Characters::GetURL(); ?>advanced" rel="np" class="advanced">
					<?php echo WoW_Locale::GetString('template_profile_advanced_profile'); ?>
				</a>
			</li>
			<li>
				<a href="<?php echo WoW_Characters::GetURL(); ?>simple" rel="np" class="simple">
					<?php echo WoW_Locale::GetString('template_profile_simple_profile'); ?>
				</a>
			</li>
	</ul>
					<div class="summary-averageilvl">
	<div class="rest">
		<?php echo WoW_Locale::GetString('template_profile_avg_itemlevel'); ?><br />
		(<span class="equipped"><?php echo WoW_Characters::GetAVGEquippedItemLevel(); ?></span> <?php echo WoW_Locale::GetString('template_profile_avg_equipped_itemlevel'); ?>)
	</div>
	<div id="summary-averageilvl-best" class="best tip" data-id="averageilvl">
		<?php echo WoW_Characters::GetAVGItemLevel(); ?>
	</div>
					</div>
			</div>
				<div class="summary-top-inventory">
	<div id="summary-inventory" class="summary-inventory summary-inventory-advanced">
    <?php    
    $item_slots = array(
        EQUIPMENT_SLOT_HEAD      => array('slot' => 1,  'style' => ' left: 0px; top: 0px;',      'class' => 'slot slot-1 item-quality-%d'),
        EQUIPMENT_SLOT_NECK      => array('slot' => 2,  'style' => ' left: 0px; top: 58px;',     'class' => 'slot slot-2 item-quality-%d'),
        EQUIPMENT_SLOT_SHOULDERS => array('slot' => 3,  'style' => 'left: 0px; top: 116px;',     'class' => 'slot slot-3 item-quality-%d'),
        EQUIPMENT_SLOT_BACK      => array('slot' => 16, 'style' => ' left: 0px; top: 174px;',    'class' => 'slot slot-16 item-quality-%d'),
        EQUIPMENT_SLOT_CHEST     => array('slot' => 5,  'style' => ' left: 0px; top: 232px;',    'class' => 'slot slot-5 item-quality-%d'),
        EQUIPMENT_SLOT_BODY      => array('slot' => 4,  'style' => ' left: 0px; top: 290px;',    'class' => 'slot slot-4 item-quality-%d'),
        EQUIPMENT_SLOT_TABARD    => array('slot' => 19, 'style' => ' left: 0px; top: 348px;',    'class' => 'slot slot-19 item-quality-%d'),
        EQUIPMENT_SLOT_WRISTS    => array('slot' => 9,  'style' => ' left: 0px; top: 406px;',    'class' => 'slot slot-9 item-quality-%d'),
        EQUIPMENT_SLOT_HANDS     => array('slot' => 10, 'style' => ' top: 0px; right: 0px;',     'class' => 'slot slot-10 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_WAIST     => array('slot' => 6,  'style' => ' top: 58px; right: 0px;',    'class' => 'slot slot-6 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_LEGS      => array('slot' => 7,  'style' => ' top: 116px; right: 0px;',   'class' => 'slot slot-7 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_FEET      => array('slot' => 8,  'style' => ' top: 174px; right: 0px;',   'class' => 'slot slot-8 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_FINGER1   => array('slot' => 11, 'style' => ' top: 232px; right: 0px;',   'class' => 'slot slot-11 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_FINGER2   => array('slot' => 11, 'style' => ' top: 290px; right: 0px;',   'class' => 'slot slot-11 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_TRINKET1  => array('slot' => 12, 'style' => ' top: 348px; right: 0px;',   'class' => 'slot slot-12 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_TRINKET2  => array('slot' => 12, 'style' => ' top: 406px; right: 0px;',   'class' => 'slot slot-12 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_MAINHAND  => array('slot' => 15, 'style' => ' left: -6px; bottom: 0px;',  'class' => 'slot slot-15 slot-align-right item-quality-%d'),
        EQUIPMENT_SLOT_OFFHAND   => array('slot' => 22, 'style' => ' left: 271px; bottom: 0px;', 'class' => 'slot slot-22 item-quality-%d'),
        EQUIPMENT_SLOT_RANGED    => array('slot' => 28, 'style' => ' left: 548px; bottom: 0px;', 'class' => 'slot slot-28 item-quality-%d')
    );
    foreach($item_slots as $slot => $data) {
        $item_info = WoW_Characters::GetEquippedItemInfo($slot, true);
        if(!$item_info || $item_info['item_id'] == 0) {
            echo sprintf('<div data-id="%d" data-type="%d" class="slot slot-%d" style="%s"><div class="slot-inner"><div class="slot-contents"><a href="javascript:;" class="empty"><span class="frame"></span></a></div></div></div>', ($data['slot'] - 1), $data['slot'], $data['slot'], $data['style']);
            continue;
        }
        $socket_text = '';
        for($i = 0; $i < 3; ++$i) {
            if(is_array($item_info['g' . $i]) && isset($item_info['g' . $i]['item'])) {
                $socket_text .= sprintf('<span class="icon-socket socket-%d"><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="gem"><img src="http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg" alt="" /><span class="frame"></span></a></span>', $item_info['g' . $i]['color'], WoW::GetWoWPath(), $item_info['g' . $i]['item'], $item_info['g' . $i]['icon']);
            }
        }
        echo sprintf('<div data-id="%d" data-type="%d" class="%s" style="%s">
        <div class="slot-inner">
            <div class="slot-contents">
                <a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="item" data-item="%s"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/%s.jpg" alt="" /><span class="frame"></span></a>
                <div class="details">
                    <span class="name-shadow">%s</span>
                    <span class="name color-q%d">
                        %s
                        <a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" data-item="%s">%s</a>
                        %s
                    </span>
                    <span class="enchant-shadow">%s</span>
                    <div class="enchant color-q%d">%s%s%s</div>
                    <span class="level">%d</span>
                    %s
                </div>
            </div>
        </div>
    </div>
', 
        ($data['slot'] - 1), $data['slot'], sprintf($data['class'], $item_info['quality']), $data['style'],
        WoW::GetWoWPath(), $item_info['item_id'], $item_info['data-item'], $item_info['icon'],
        $item_info['name'],
        $item_info['quality'],
        (($data['slot'] >= 6 && $data['slot'] <= 12) && $item_info['enchid'] == 0 && $item_info['can_ench']) ? '<a href="javascript:;" class="audit-warning"></a>' : null,
        WoW::GetWoWPath(), $item_info['item_id'], $item_info['data-item'], $item_info['name'],
        (($data['slot'] < 6 || $data['slot'] > 12) && $item_info['enchid'] == 0 && $item_info['can_ench']) ? '<a href="javascript:;" class="audit-warning"></a>' : null, 
        isset($item_info['enchant_text']) ? $item_info['enchant_text'] : null, 
        isset($item_info['enchant_quality']) ? $item_info['enchant_quality'] : null, 
        isset($item_info['enchant_item']) ? $item_info['enchant_item'] > 0 ? sprintf('<a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d">', WoW::GetWoWPath(), $item_info['enchant_item']) : null : null, 
        isset($item_info['enchant_text']) ? $item_info['enchant_text'] : null,
        isset($item_info['enchant_item']) ? $item_info['enchant_item'] > 0 ? '</a>' : null : null,
        $item_info['item_level'], $socket_text != null ? sprintf('<span class="sockets">%s</span>', $socket_text) : null);
    }
    ?>
	</div>

	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			new Summary.Inventory({ view: "advanced" }, {
			<?php
            if(isset($item_slots) && is_array($item_slots)) {
                foreach($item_slots as $slot => $style) {
                    $item_info = WoW_Characters::GetEquippedItemInfo($slot);
                    if(!$item_info) {
                        continue;
                    }
                    echo sprintf('
             %d: {
                    name: "%s",
                    quality: %d,
                    icon: "%s"
                },', $slot, $item_info['name'], $item_info['quality'], $item_info['icon']);
                }
            }
            ?>
			});
		});
	//]]>
	</script>
				</div>
		</div>
			<div class="summary-middle">
				<div class="summary-middle-inner">
					<div class="summary-middle-right">
						<div class="summary-audit" id="summary-audit">
							<div class="category-right"><span class="tip" id="summary-audit-whatisthis"><?php echo WoW_Locale::GetString('template_character_audit_help'); ?></span></div>
								<h3 class="category "><?php echo WoW_Locale::GetString('template_character_audit'); ?></h3>
							<div class="profile-box-simple">
	<ul class="summary-audit-list">
    <?php
    $empty_sockets_slots_js = '';
    $unench_slots_js = '';
    $unenchanted_items_js = '';
    $nonop_armor_slots_js = '';
    $empty_sockets_js = '';
    if(isset($audit[AUDIT_TYPE_EMPTY_GLYPH_SLOT]) && $audit[AUDIT_TYPE_EMPTY_GLYPH_SLOT] > 0) {
        echo sprintf(WoW_Locale::GetString('template_character_audit_empty_glyph_slots'), $audit[AUDIT_TYPE_EMPTY_GLYPH_SLOT]);
    }
    if(isset($audit[AUDIT_TYPE_UNSPENT_TALENT_POINTS]) && $audit[AUDIT_TYPE_UNSPENT_TALENT_POINTS] > 0) {
        echo sprintf(WoW_Locale::GetString('template_character_audit_unspent_talent_points'), $audit[AUDIT_TYPE_UNSPENT_TALENT_POINTS]);
    }
    if(isset($audit[AUDIT_TYPE_UNENCHANTED_ITEM]) && is_array($audit[AUDIT_TYPE_UNENCHANTED_ITEM])) {
        $unench_slots = '';
        $unench_slots_js_tpl = '"unenchantedItems": {%s},';
        $count_unech_items = count($audit[AUDIT_TYPE_UNENCHANTED_ITEM]);
        for($i = 0; $i < $count_unech_items; ++$i) {
            if($i > 0 && $i < $count_unech_items) {
                $unench_slots .= ',';
                $unench_slots_js .= ",";
            }
            $unench_slots .= $audit[AUDIT_TYPE_UNENCHANTED_ITEM][$i][0];
            $unench_slots_js .= $audit[AUDIT_TYPE_UNENCHANTED_ITEM][$i][0] . ": 1";
        }
        $unenchanted_items_js = sprintf($unench_slots_js_tpl, $unench_slots_js);
        echo sprintf('<li data-slots="%s">
        <span class="tip">' . sprintf(WoW_Locale::GetString('template_character_audit_unenchanted_items'), $count_unech_items) . '</span>
        </li>', $unench_slots);
    }
    if(isset($audit[AUDIT_TYPE_EMPTY_SOCKET]) && is_array($audit[AUDIT_TYPE_EMPTY_SOCKET])) {
        $empty_sockets_slots = '';
        $empty_sockets_slots_js_tpl = '"itemsWithEmptySockets": {%s},';
        $count_empty_sockets = 0;
        $i = 0;
        foreach($audit[AUDIT_TYPE_EMPTY_SOCKET] as $tmp) {
            $count_empty_sockets += $tmp['count'];
            $empty_sockets_slots .= $tmp['slot'];
            $empty_sockets_slots_js .= $tmp['slot'] . ': ' . $tmp['count'];
            ++$i;
            if($i < count($audit[AUDIT_TYPE_EMPTY_SOCKET])) {
                $empty_sockets_slots .= ',';
                $empty_sockets_slots_js .= ',';
            }
        }
        $empty_sockets_js = sprintf($empty_sockets_slots_js_tpl, $empty_sockets_slots_js);
        echo sprintf('<li data-slots="%s">
        '. sprintf(WoW_Locale::GetString('template_character_audit_empty_sockets'), $count_empty_sockets, count($audit[AUDIT_TYPE_EMPTY_SOCKET])) .'
        </li>', $empty_sockets_slots);
    }
    if(isset($audit[AUDIT_TYPE_NONOPTIMAL_ARMOR]) && is_array($audit[AUDIT_TYPE_NONOPTIMAL_ARMOR]) && WoW_Characters::GetLevel() >= 40) {
        $nonop_armor_slots = '';
        $nonop_armor_slots_js_tpl = '"inappropriateArmorItems": {%s},';
        $nonop_armor_count = 0;
        foreach($audit[AUDIT_TYPE_NONOPTIMAL_ARMOR] as $tmp) {
            ++$nonop_armor_count;
        }
        echo sprintf('<li data-slots="%d">
        <span class="tip">%s</span>
        </li>', $nonop_armor_count, sprintf(WoW_Locale::GetString('template_character_audit_nonop_armor'), $nonop_armor_count, WoW_Utils::GetAppropriateItemClassForClassID(WoW_Characters::GetClassID())));
    }
    if(isset($audit[AUDIT_TYPE_MISSING_BELT_BUCKLE]) && $audit[AUDIT_TYPE_MISSING_BELT_BUCKLE] == true) {
        echo sprintf('<li data-slots="5">%s</li>', sprintf(WoW_Locale::GetString('template_character_audit_missing_belt_buckle'), BELT_BUCKLE_ID, WoW_Items::GetItemName(BELT_BUCKLE_ID)));
    }
    ?>
	</ul>
    <?php
    if(WoW_Characters::IsAuditPassed()) {
        echo WoW_Locale::GetString('template_character_audit_passed');
    }
    ?>
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			new Summary.Audit({
			 <?php
             echo $unenchanted_items_js . "\n";
             echo '             ' . $empty_sockets_js;
             ?>
             
             "foo": true
			});
		});
	//]]>
	</script>
							</div>
						</div>
						<div id="summary-reforging" class="summary-reforging">
								<h3 class="category "><?php echo WoW_Locale::GetString('template_character_reforge'); ?></h3>

							<div class="profile-box-simple"><?php echo WoW_Locale::GetString('template_character_reforge_none'); // Requires Cataclysm support ?></div>
						</div>
					</div>
					<div class="summary-middle-left">
						<div class="summary-bonus-tally">
								<h3 class="category "><?php echo WoW_Locale::GetString('template_gems_enchants_bonuses'); ?></h3>

							<div class="profile-box-simple">
            <?php
            if(!isset($audit[AUDIT_TYPE_STAT_BONUS]) || !is_array($audit[AUDIT_TYPE_STAT_BONUS])) {
                echo WoW_Locale::GetString('template_character_audit_no_bonuses');
            }
            else {
                echo '<div class="numerical"><ul>';
                foreach($audit[AUDIT_TYPE_STAT_BONUS] as $ench_type => $ench_bonus) {
                    echo sprintf('<li><span class="value">+%d</span> %s</li>', $ench_bonus, WoW_Locale::GetString('template_stat_name_' . $ench_type));
                }
                echo '</ul></div>';
                $weapon = WoW_Characters::GetEquippedItemInfo(EQUIPMENT_SLOT_MAINHAND, true); // Will be returned from cache
                $head = WoW_Characters::GetEquippedItemInfo(EQUIPMENT_SLOT_HEAD, true);
                $gem_data = array();
                if(is_array($head)) {
                    for($i = 0; $i < 3; ++$i) {
                        if($head['g' . $i]['color'] == 1) {
                            $gem_data = array(
                                'id' => $head['g' . $i]['item'],
                                'name' => $head['g' . $i]['name']
                            );
                        }
                    }
                }
                $other_str = null;
                if(is_array($weapon) && isset($weapon['enchant_item']) && $weapon['enchant_item'] > 0) {
                    $other_str .= sprintf('<span class="name"><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d">%s</a></span>%s ', WoW::GetWoWPath(), $weapon['enchant_item'], $weapon['enchant_text'], (is_array($gem_data) && isset($gem_data['name'])) ? '<span class="comma">,</span>' : null);
                }
                if(is_array($gem_data) && isset($gem_data['name'])) {
                    $other_str .= sprintf('<span class="name"><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d">%s</a></span>', WoW::GetWoWPath(), $gem_data['id'], $gem_data['name']);
                }
                if($other_str != null) {
                    echo sprintf('<div class="other">%s</div>', $other_str);
                }
            }
            ?>
							</div>
						</div>

						<div class="summary-gems">
								<h3 class="category "><?php echo WoW_Locale::GetString('template_used_gems'); ?></h3>
							<div class="profile-box-simple">
                <?php
                if(isset($audit[AUDIT_TYPE_USED_GEMS]) && is_array($audit[AUDIT_TYPE_USED_GEMS])) {
                    echo '<div class="summary-gems"><ul>';
                    foreach($audit[AUDIT_TYPE_USED_GEMS] as $gem) {
                        echo sprintf('<li>
                    <span class="value">%d</span>
                    <span class="times">x</span>
                    <span class="icon">	<span class="icon-socket socket-%d">
                    <a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="gem">
                    <img src="http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg" alt="" />
                    <span class="frame"></span>
                    </a>
                    </span>
                    </span>
                    <a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="name color-q%d">%s</a>
                    <span class="clear"><!-- --></span>
                </li>', $gem['counter'], $gem['color'], WoW::GetWoWPath(), $gem['item'], $gem['icon'], WoW::GetWoWPath(), $gem['item'], $gem['quality'], $gem['name']);
                    }
                    echo '</ul></div>';
                }
                else {
                    echo WoW_Locale::GetString('template_character_audit_no_gems');
                }
                ?>
							</div>
						</div>

	<span class="clear"><!-- --></span>
					</div>
	<span class="clear"><!-- --></span>
				</div>
			</div>
			<div class="summary-bottom">
				<?php WoW_Template::LoadTemplate('block_character_recent_activity'); ?>
				<div class="summary-bottom-left">
					<?php WoW_Template::LoadTemplate('block_character_talents_summary'); ?>
					<div class="summary-stats-profs-bgs">
	<div class="summary-stats" id="summary-stats">
			<div id="summary-stats-advanced" class="summary-stats-advanced">
				<div class="summary-stats-advanced-base">
	<div class="summary-stats-column">
		<h4><?php echo WoW_Locale::GetString('template_profile_stats'); ?></h4>
		<ul>
        <?php
        $strength = WoW_Characters::GetCharacterStrength();
        $agility = WoW_Characters::GetCharacterAgility();
        $stamina = WoW_Characters::GetCharacterStamina();
        $intellect = WoW_Characters::GetCharacterIntellect();
        $spirit = WoW_Characters::GetCharacterSpirit();
        $melee_stats = WoW_Characters::GetMeleeStats();
        $ranged_stats = WoW_Characters::GetRangedStats();
        $spell = WoW_Characters::GetSpellStats();
        $defense = WoW_Characters::GetDefenseStats();
        $resistances = WoW_Characters::GetResistanceStats();
        $appropriate_stats = WoW_Characters::GetAppropriateStatsForClassAndSpec();
        foreach($appropriate_stats['main'] as $main) {
            echo sprintf('<li data-id="%s" class="">
		<span class="name">%s</span>
		<span class="value">%s</span>
	<span class="clear"><!-- --></span>
	</li>', $main['name'], WoW_Locale::GetString($main['type']), $main['stat']);
        }
        ?>
		</ul>
	</div>
				</div>
				<div class="summary-stats-advanced-role">
	<div class="summary-stats-column">
		<h4><?php echo WoW_Locale::GetString('template_character_profile_other_stats'); ?></h4>
		<ul>
        <?php
        foreach($appropriate_stats['advanced'] as $advanced) {
            echo sprintf('<li data-id="%s" class="">
		<span class="name">%s</span>
		<span class="value">%s</span>
	<span class="clear"><!-- --></span>
	</li>', $advanced['name'], WoW_Locale::GetString($advanced['type']), $advanced['stat']);
        }
        ?>
		</ul>
	</div>
				</div>
				<div class="summary-stats-end"></div>
			</div>
            <?php WoW_Template::LoadTemplate('block_character_stats_simple'); ?>
			<a href="javascript:;" id="summary-stats-toggler" class="summary-stats-toggler"><span class="inner"><span class="arrow"><?php echo WoW_Locale::GetString('template_character_profile_toggle_stats_all'); ?></span></span></a>
	</div>
	<?php
    WoW_Template::LoadTemplate('block_profile_stats_js');
    WoW_Template::LoadTemplate('block_character_bg_professions');
    ?>
					</div>
				</div>
	<span class="clear"><!-- --></span>
    <?php
    if(WoW_Characters::IsHaveArenaTeam()) {
        WoW_Template::LoadTemplate('block_character_arena_info');
    }
    ?>
    <div class="summary-lastupdate">
        <?php echo WoW_Locale::GetString('template_profile_lastupdate') . ' ' . WoW_Characters::GetLastUpdateTimeStamp('d/m/Y'); ?>
	</div>
	<span class="clear"><!-- --></span>
			</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/js/locales/summary_<?php echo WoW_Locale::GetLocale(); ?>.js"></script>
</div>
</div>
</div>
