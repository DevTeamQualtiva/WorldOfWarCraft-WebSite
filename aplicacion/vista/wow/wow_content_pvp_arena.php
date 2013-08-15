<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/" rel="np">
World of Warcraft
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/arena/" rel="np">
PvP
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div class="content-header">
				<h2 class="header ">PvP</h2>
	<span class="clear"><!-- --></span>
	</div>
	<div class="pvp pvp-summary">
		<div class="pvp-right">
			<div class="top-title">
					<h3 class="category "><?php echo WoW_Locale::GetString('template_pvp_arena_top_teams'); ?></h3>
				<select class="input select" id="filter-bg">
                        <?php
                        $active_bg = WoWConfig::$BattleGroups[1];
                        foreach(WoWConfig::$BattleGroups as &$bg) {
                            echo '<option value="' . mb_strtolower($bg['name']) . '"';
                            if((isset($_GET['battlegroup']) && mb_strtolower($_GET['battlegroup']) == mb_strtolower($bg['name'])) || ($bg['id'] == 1)) {
                                echo ' selected="selected"';
                                $active_bg = $bg;
                            }
                            echo '>' . $bg['name'] . '</option>';
                        }
                        ?>
			</select>

	<span class="clear"><!-- --></span>
			</div>

			<div class="top-teams">
   <?php
   $formats = array(2, 3, 5);
   $li_classes = array(1 => 'first', 2 => 'second', 3 => 'third');
   for($i = 0; $i < 3; ++$i) {
   ?>
	<div class="column top-<?php echo $formats[$i] . 'v' . $formats[$i]; ?>">
		<h2><a href="<?php echo WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . '/pvp/arena/' . mb_strtolower($bg['name']) . '/' . $formats[$i] . 'v' . $formats[$i] . '/'; ?>"><?php echo sprintf(WoW_Locale::GetString('template_team_type_format'), $formats[$i], $formats[$i]); ?></a></h2>
        <?php
        $top_teams = WoW_Arena::GetTopTeams($formats[$i], $active_bg['id']);
        if(is_array($top_teams)) {
            echo '<ul>';
            foreach($top_teams as &$team) {
                echo '<li class="' . $li_classes[$team->GetTeamRank()] . '">
                <span class="ranking">' . $team->GetTeamRank() . '</span>
                
                <div class="name">
                    <a href="' . $team->GetTeamURL() . '">' . $team->GetTeamName() . '</a>
                </div>
                <div class="rating-realm">
                    <span class="rating">' . $team->GetTeamRating() . '</span>
                    <span class="realm">' . $team->GetTeamRealmName() . '</span>
                </div>
                <div class="members">
                ';
                $members = $team->GetTeamMembers();
                if(is_array($members)) {
                    foreach($members as &$member) {
                        echo '<a href="' . $member['url'] . '">
                            <span class="icon-frame frame-14 ">
                            <img src="http://eu.media.blizzard.com/wow/icons/18/class_' . $member['classId'] . '.jpg" alt="" width="14" height="14" />
                            </span>
                        </a>';
                    }
                }
                echo '</div>
                </li>
                ';
            }
            echo '</ul>';
        }
        ?>
        <a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/arena/<?php echo mb_strtolower($bg['name']) . '/' . $formats[$i] . 'v' . $formats[$i]; ?>" class="all"><?php echo sprintf(WoW_Locale::GetString('template_pvp_browse_rating_caption'), $formats[$i], $formats[$i]); ?></a>
	</div>
    <?php
    }
    ?>

	<span class="clear"><!-- --></span>
			</div>
		</div>
	
		<div class="pvp-left">
        <?php WoW_Template::LoadTemplate('block_arena_ladder_menu'); ?>
		</div>

	<span class="clear"><!-- --></span>
	</div>
	
</div>
</div>
</div>
