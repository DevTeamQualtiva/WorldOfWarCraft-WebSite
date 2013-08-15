<?php
$race = WoW_Game::GetRace();
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/race/" rel="np"><?php echo WoW_Locale::GetString('template_game_race_index'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/race/<?php echo WoW_Template::GetPageData('race'); ?>" rel="np"><?php echo WoW_Locale::GetString('character_race_' . $race['id']); ?></a></li>
</ol>-->
</div>
<div class="content-bot">
			<div id="content-subheader">
				<a class="race-parent" href="./"><?php echo WoW_Locale::GetString('template_game_races_title'); ?></a>
	      <span class="clear"><!-- --></span>
				<h4><?php echo WoW_Locale::GetString('character_race_' . $race['id']); ?></h4>
			</div>	<span class="clear"><!-- --></span>
			<div class="faction-req">
        <span class="group <?php echo WoW_Utils::GetFactionId($race['id']) == FACTION_ALLIANCE ? 'alliance' : 'horde'; ?>"><?php echo WoW_Locale::GetString('faction_' . (WoW_Utils::GetFactionId($race['id']) == FACTION_ALLIANCE ? 'alliance' : 'horde')) ?></span>
        <?php
        if($race['expansion'] > EXPANSION_CLASSIC) {
            echo '<span class="req ' . (($race['expansion'] == EXPANSION_BC) ? 'bc' : ($race['expansion'] == EXPANSION_WRATH ? 'wrath' : 'cataclysm')) . '">' . WoW_Locale::GetString('template_zone_expansion_required') . ' ' . WoW_Locale::GetString('template_expansion_' . $race['expansion']) . '</span>';
        }
        ?>
      </div>
	    <span class="clear"><!-- --></span>
			<div class="left-col">
				<div class="story-highlight"><?php echo $race['story']; ?></div>
				<div class="story-main"><?php echo $race['info']; ?></div>
<?php
if($race['location']) {
    echo '<div class="race-basic start-location" style="background-image:url(' . WoW::GetWoWPath() . '/wow/static/images/game/race/' . WoW_Template::GetPageData('race') . '/start-location.jpg)">
    <h5 class="basic-header"><span class="overview-icon"></span>' . WoW_Locale::GetString('template_game_race_location') . '<span>' . $race['location']. '</span></h5>
    <div class="basic-story">' . $race['location_info'] . '</div>';
}
if($race['homecity']) {
    echo '<div class="race-basic home-city" style="background-image:url(' . WoW::GetWoWPath() . '/wow/static/images/game/race/' . WoW_Template::GetPageData('race') . '/home.jpg)">
  			<h5 class="basic-header"><span class="overview-icon"></span>' . WoW_Locale::GetString(($race['id'] == RACE_WORGEN ? 'template_game_race_homecity_location' : 'template_game_race_homecity')) . '<span>' . $race['homecity'] . '</span></h5>
  			<div class="basic-story">' . $race['homecity_info'] . '</div>';
}
?>

      <div class="race-basic racial-mount" style="background-image:url(<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/race/<?php echo WoW_Template::GetPageData('race'); ?>/mount.jpg)">
  			<h5 class="basic-header"><span class="overview-icon"></span><?php echo WoW_Locale::GetString('template_game_race_mount') . '<span>' . $race['mount'] .' </span>'; ?></h5>
  			<div class="basic-story"><?php echo $race['mount_info']; ?></div>
  		<div class="race-basic leader" style="background-image:url(<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/race/<?php echo WoW_Template::GetPageData('race'); ?>/leader.jpg)">
  			<h5 class="basic-header"><span class="overview-icon"></span><?php echo WoW_Locale::GetString('template_game_race_leader') . '<span>' . $race['leader']; ?></span></h5>
  			<div class="basic-story"><?php echo $race['leader_info']; ?></div>
		</div>
	   <span class="clear"><!-- --></span>
		</div>
	   <span class="clear"><!-- --></span>
<?php
if($race['homecity']) {
    echo '</div>';
}
?>
	   <span class="clear"><!-- --></span>
<?php
if($race['location']) {
    echo '</div>';
}
?>
		  </div>
			<div class="right-col">
	<div class="game-scrollbox">
		<div class="scroll-title"><span><?php echo sprintf(WoW_Locale::GetString('template_game_race_racial_traits'), WoW_Locale::GetString('template_game_race_'.WoW_Template::GetPageData('race'))); ?></span></div>
		<div class="scroll-content">
			<div class="wrapper">
					<div class="feature-list">
<?php
if(isset($race['abilities']) && is_array($race['abilities'])) {
    foreach($race['abilities'] as $ability) {
        echo '
        <div class="feature-item clear-after">
            <span class="icon-frame-gloss float-left" style="background-image: url(' . WoW::GetWoWPath() . '/wow/icons/56/' . $ability['icon'] . ')">
                <span class="frame"></span>
            </span>
            <div class="feature-wrapper">
                <span class="feature-item-title">' . $ability['title'] . '</span>
                <p class="feature-item-desc">' . $ability['text'] . '</p>
            </div>
            <span class="clear"><!-- --></span>
        </div>';
    }
}
?>
					</div>
			</div>
		</div>
	</div>
	<div class="available-info-box ">
		<div class="available-info-box-title"><?php echo WoW_Locale::GetString('template_game_race_classes'); ?></div>
		<span class="available-info-box-desc"><?php
        echo sprintf(WoW_Locale::GetString('template_game_race_classes_desc'), WoW_Locale::GetString('character_race_' . $race['id'] . '_decl'));
        ?></span>
		<div class="list-box">
			<div class="wrapper">
					<ul>
<?php
$class_masks = array(
    'CLASS_MASK_WARRIOR', 'CLASS_MASK_PALADIN', 'CLASS_MASK_HUNTER', 'CLASS_MASK_ROGUE', 'CLASS_MASK_PRIEST',
    'CLASS_MASK_DK', 'CLASS_MASK_SHAMAN', 'CLASS_MASK_MAGE', 'CLASS_MASK_WARLOCK', 'CLASS_MASK_DRUID'
);
foreach($class_masks as $mask) {
    if($race['classes_flag'] & constant($mask)) {
        $class_key = strtolower(substr($mask, 11));
        if($class_key == 'dk') {
            $class_key = 'death-knight';
        }
        $class_id = WoW_Utils::GetClassIDByKey($class_key);
        if(!$class_id) {
            continue;
        }
        echo '
        <li>
            <a href="../class/' . $class_key . '">
                <span class="icon-frame frame-36 class-icon-36 class-icon-36-' . $class_key . '">
                    <span class="frame"></span>
                </span>
                <span class="list-title">' . WoW_Locale::GetString('character_class_' . $class_id ) . '</span>
            </a>
        </li>';
    }
}
?>
					</ul>
        	<span class="clear"><!-- --></span>
        	<span class="clear"><!-- --></span>
			</div>
		</div>
	</div>
	<table class="media-frame">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/artwork/wow-races?view=&amp;keywords=<?php echo WoW_Template::GetPageData('race'); ?>"><img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/race/<?php echo WoW_Template::GetPageData('race'); ?>/thumb-artwork.jpg" alt="<?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>" title="<?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>" width="327" height="134" /></a>
					<div class="caption">
						<a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/artwork/wow-races?view=&amp;keywords=<?php echo WoW_Template::GetPageData('race'); ?>" class="view-all"><?php echo WoW_Locale::GetString('template_game_class_viewall'); ?></a>
            <?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>
	         <span class="clear"><!-- --></span>
					</div>
			</td>
			<td class="mr"></td>
		</tr>
		<tr>
			<td class="bl"></td>
			<td class="bm"></td>
			<td class="br"></td>
		</tr>
	</table>
	<table class="media-frame">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/screenshots/races?keywords=<?php echo WoW_Template::GetPageData('race'); ?>"><img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/race/<?php echo WoW_Template::GetPageData('race'); ?>/thumb-screenshot.jpg" alt="<?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>" title="<?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>" width="327" height="134" /></a>
					<div class="caption">
						<a href="javascript:;" class="view-all"><?php echo WoW_Locale::GetString('template_game_class_viewall'); ?></a>
						<?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>
	        <span class="clear"><!-- --></span>
					</div>
			</td>
			<td class="mr"></td>
		</tr>
		<tr>
			<td class="bl"></td>
			<td class="bm"></td>
			<td class="br"></td>
		</tr>
	</table>
				
				<div class="fansite-link-box">
					<div class="wrapper">
						<span class="fansite-box-title"><?php echo WoW_Locale::GetString('template_game_class_more'); ?></span>
						<p><?php echo sprintf(WoW_Locale::GetString('template_game_race_more_desc'), WoW_Locale::GetString('character_race_' . $race['id'])); ?></p>
						<div id="sdgksdngklsdngl35"></div>
	<script type="text/javascript">
	//<![CDATA[
							$(document).ready(function() {
								Fansite.generate($('#sdgksdngklsdngl35'), "race|<?php echo $race['id'] . '|' . WoW_Locale::GetString('character_race_' . $race['id']); ?>");
							});
	//]]>
	</script>
					</div>
				</div>
			</div>
	<span class="clear"><!-- --></span>

			<div class="guide-page-nav">
				<span class="current-guide-title"><?php echo WoW_Locale::GetString('character_race_' . $race['id']); ?></span>
<?php
if($race['id'] == RACE_DRAENEI) {
    $nextRaceId = RACE_WORGEN;
}
elseif($race['id'] == RACE_WORGEN) {
    $prevRaceId = RACE_DRAENEI;
    $nextRaceId = RACE_HUMAN;
}
elseif($race['id'] == RACE_HUMAN) {
    $prevRaceId = RACE_WORGEN;
}
if(!isset($prevRaceId)) {
    $prevRaceId = $race['id'] - 1;
}
if(!isset($nextRaceId)) {
    $nextRaceId = $race['id'] + 1;
}
?>
<a class="ui-button next-race button1-next" href="<?php echo WoW_Utils::GetRaceKeyById($nextRaceId); ?>"><span><span><?php echo sprintf(WoW_Locale::GetString('template_game_race_next'), WoW_Locale::GetString('character_race_' . $nextRaceId)); ?></span></span></a>
<a class="ui-button previous-race button1-previous" href="<?php echo WoW_Utils::GetRaceKeyById($prevRaceId); ?>"><span><span><?php echo sprintf(WoW_Locale::GetString('template_game_race_prev'), WoW_Locale::GetString('character_race_' . $prevRaceId)); ?></span></span></a>


			</div>
        </div>
	</div>
</div>
