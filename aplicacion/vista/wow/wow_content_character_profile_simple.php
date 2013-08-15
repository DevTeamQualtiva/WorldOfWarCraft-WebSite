<?php
// Talents data
$talents = WoW_Characters::GetTalentsData();
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
<a href="<?php echo WoW_Characters::GetURL(); ?>simple" rel="np"><?php echo sprintf('%s @ %s', WoW_Characters::GetName(), WoW_Characters::GetRealmName()); ?></a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Characters::GetFactionName(); ?> profile-wrapper-light">
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
<?php WoW_Template::LoadTemplate('block_profile_menu'); ?>
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
			<li>
				<a href="<?php echo WoW_Characters::GetURL(); ?>advanced" rel="np" class="advanced">
					<?php echo WoW_Locale::GetString('template_profile_advanced_profile'); ?>
				</a>
			</li>
			<li class="current">
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
	<div id="summary-inventory" class="summary-inventory summary-inventory-simple">
    <?php
    $item_slots = array(
        EQUIPMENT_SLOT_HEAD      => array('slot' => 1,  'style' => ' left: 0px; top: 0px;'),
        EQUIPMENT_SLOT_NECK      => array('slot' => 2,  'style' => ' left: 0px; top: 58px;'),
        EQUIPMENT_SLOT_SHOULDERS => array('slot' => 3,  'style' => 'left: 0px; top: 116px;'),
        EQUIPMENT_SLOT_BACK      => array('slot' => 16, 'style' => ' left: 0px; top: 174px;'),
        EQUIPMENT_SLOT_CHEST     => array('slot' => 5,  'style' => ' left: 0px; top: 232px;'),
        EQUIPMENT_SLOT_BODY      => array('slot' => 4,  'style' => ' left: 0px; top: 290px;'),
        EQUIPMENT_SLOT_TABARD    => array('slot' => 19, 'style' => ' left: 0px; top: 348px;'),
        EQUIPMENT_SLOT_WRISTS    => array('slot' => 9,  'style' => ' left: 0px; top: 406px;'),
        EQUIPMENT_SLOT_HANDS     => array('slot' => 10, 'style' => ' top: 0px; right: 0px;'),
        EQUIPMENT_SLOT_WAIST     => array('slot' => 6,  'style' => ' top: 58px; right: 0px;'),
        EQUIPMENT_SLOT_LEGS      => array('slot' => 7,  'style' => ' top: 116px; right: 0px;'),
        EQUIPMENT_SLOT_FEET      => array('slot' => 8,  'style' => ' top: 174px; right: 0px;'),
        EQUIPMENT_SLOT_FINGER1   => array('slot' => 11, 'style' => ' top: 232px; right: 0px;'),
        EQUIPMENT_SLOT_FINGER2   => array('slot' => 11, 'style' => ' top: 290px; right: 0px;'),
        EQUIPMENT_SLOT_TRINKET1  => array('slot' => 12, 'style' => ' top: 348px; right: 0px;'),
        EQUIPMENT_SLOT_TRINKET2  => array('slot' => 12, 'style' => ' top: 406px; right: 0px;'),
        EQUIPMENT_SLOT_MAINHAND  => array('slot' => 21, 'style' => ' left: 241px; bottom: 0px;'),
        EQUIPMENT_SLOT_OFFHAND   => array('slot' => 22, 'style' => ' left: 306px; bottom: 0px;'),
        EQUIPMENT_SLOT_RANGED    => array('slot' => 28, 'style' => ' left: 371px; bottom: 0px;')
    );
    foreach($item_slots as $slot => $data) {
        $item_info = WoW_Characters::GetEquippedItemInfo($slot);
        if(!$item_info || $item_info['item_id'] == 0) {
            echo sprintf('<div data-id="%d" data-type="%d" class="slot slot-%d" style="%s">
            <div class="slot-inner">
            <div class="slot-contents"><a href="javascript:;" class="empty"><span class="frame"></span></a>
            </div>
            </div>
            </div>', ($data['slot']-1), $data['slot'], $data['slot'], $data['style']);
        }
        else {
            echo sprintf('<div data-id="%d" data-type="%d" class="slot slot-%d %s item-quality-%d" style="%s">
            <div class="slot-inner">
            <div class="slot-contents"><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="item" data-item="%s"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/%s.jpg" alt="" /><span class="frame"></span></a>
            </div>
            </div>
            </div>', ($data['slot']-1), $data['slot'], $data['slot'], ($slot >= 9 && $slot <= 15) ? 'slot-align-right' : null, $item_info['quality'], $data['style'], WoW::GetWoWPath(), $item_info['item_id'], $item_info['data-item'], $item_info['icon']);
        }
    }
    
    ?>
	</div>
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			new Summary.Inventory({ view: "simple" }, {
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
			<div class="summary-bottom">
				<?php WoW_Template::LoadTemplate('block_character_recent_activity'); ?>
				<div class="summary-bottom-left">
					<?php WoW_Template::LoadTemplate('block_character_talents_summary'); ?>
					<div class="summary-stats-profs-bgs">
	<div class="summary-stats" id="summary-stats">
		<?php WoW_Template::LoadTemplate('block_character_stats_simple'); ?>
	</div>
	<?php
    WoW_Template::LoadTemplate('block_profile_stats_js');
    WoW_Template::LoadTemplate('block_character_bg_professions');
    ?>
					</div>
				</div>
	<span class="clear"><!-- --></span>
	<span class="clear"><!-- --></span>
    <?php
    if(WoW_Characters::IsHaveArenaTeam()) {
        WoW_Template::LoadTemplate('block_character_arena_info');
    }
    ?>
    	<span class="clear"><!-- --></span>
				<div class="summary-lastupdate">
                    <?php echo WoW_Locale::GetString('template_profile_lastupdate') . ' ' . WoW_Characters::GetLastUpdateTimeStamp('d/m/Y'); ?>
				</div>
			</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/js/locales/summary_<?php echo WoW_Locale::GetLocale(); ?>.js"></script>
</div>
</div>
</div>
