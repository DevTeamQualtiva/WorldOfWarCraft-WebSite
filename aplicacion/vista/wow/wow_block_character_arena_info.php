<div class="summary-arena">
						<h3 class="category"><?php echo WoW_Locale::GetString('template_js_arena'); ?></h3>
						<div class="profile-box-full">
	<div class="arena-columns">
<?php
$teams = WoW_Characters::GetArenaTeams();
$formats = array(2, 3, 5);
if(is_array($teams)) {
    for($i = 2; $i >= 0; --$i) {
        if(!isset($teams[$i])) {
            echo '<div class="arena-column column-disabled">
			<div class="cell-top">
				<div class="cell-top-inner">
					<h2>' . sprintf(WoW_Locale::GetString('template_team_type_format'), $formats[$i], $formats[$i]) . '</h2>
				</div>
			</div>
		</div>';
            continue;
        }
        $team = &$teams[$i];
        $team_member = $team->GetMember();
        $stats = $team->GetTeamStats();
?>
    <div class="arena-column">
		<div class="cell-top">
			<div class="cell-top-inner">
				<h2><?php echo sprintf(WoW_Locale::GetString('template_team_type_format'), $team->GetTeamType(), $team->GetTeamType()); ?></h2>
				<div class="rating">
					<span class="tip" data-tooltip="<?php echo WoW_Locale::GetString('template_character_pvp_personal_rating'); ?>"><?php echo $team_member['personalRating']; ?></span>
				</div>
				<span class="gameswon"><?php echo $team_member['gamesSeason']; ?></span> &#8211;
				<span class="gameslost"><?php echo $team_member['winsSeason']; ?></span>
				<span class="percentwon">(<?php echo WoW_Utils::GetPercent($team_member['gamesSeason'], $team_member['winsSeason']); ?>%)</span>
			</div>
		</div>
		<div class="cell-mid">
			<a href="<?php echo $team->GetTeamURL(); ?>"><?php echo $team->GetTeamName(); ?></a>
			<div class="rating-rank">
				<span class="rating tip" data-tooltip="<?php echo WoW_Locale::GetString('template_character_team_rating'); ?>"><?php echo $stats['rating']; ?></span>
				<span class="rank">
                        <?php
                        if($stats['rank'] > 0) {
                            echo '#' . $stats['rank'];
                        }
                        else {
                            echo '<span class="unranked">' . WoW_Locale::GetString('template_character_pvp_unranked') . '</span>';
                        }
                        ?>
				</span>
			</div>
                <?php
                $members = $team->GetTeamMembers();
                foreach($members as &$member) {
                    echo '<a href="' . $member['url'] . '" rel="allow">
                    <span class="icon-frame frame-14 ">
                    <img src="http://eu.media.blizzard.com/wow/icons/18/class_' . $member['classId'] . '.jpg" alt="" width="14" height="14" />
                    </span></a>';
                }
                ?>
						
		</div>
	</div>
<?php
    }
}
?>

	<span class="clear"><!-- --></span>
	<div class="profile-linktomore">
		<a href="<?php echo WoW_Characters::GetURL(); ?>pvp" rel="np">PvP</a>
	</div>

	<span class="clear"><!-- --></span>
	</div>

						</div>
					</div>
