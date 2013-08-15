<?php
$bg = WoW_Template::GetPageData('bg');
$format = WoW_Template::GetPageData('teamFormat');
if(isset($_GET['page'])) {
    $page = (int) ($_GET['page'] - 1);
}
else {
    $page = 0;
}
$offset = $page * 50;
// Generate global URL (for sorting and pagination)
$global_url = '';
$url_changed = false;
if(isset($_GET['comp'])) {
    if(!$url_changed) {
        $global_url .= '?';
        $url_changed = true;
    }
    $global_url .= 'comp=' . $_GET['comp'];
}
$options = array('team', 'realm', 'faction', 'minRating', 'maxRating', 'compType');
foreach($options as $opt) {
    if(isset($_GET[$opt])) {
        if(!$url_changed) {
            $global_url .= '?';
            $url_changed = true;
        }
        else {
            $global_url .= '&amp;';
        }
        $global_url .= $opt . '=' . $_GET[$opt];
    }
}
if($url_changed) {
    $global_url .= '&amp;';
}
else {
    $global_url .= '?';
}
?>
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
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/arena/" rel="np">
PvP
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/arena/<?php echo WoW_Template::GetPageData('activeBG'); ?>/<?php echo Wow_Template::GetPageData('teamFormatS'); ?>" rel="np">
<?php echo sprintf(WoW_Locale::GetString('template_pvp_ladder_format'), $format, $format); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div class="content-header">
				<h2 class="header ">PvP</h2>
	<span class="clear"><!-- --></span>
	</div>

	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Ladder.maxComps = <?php echo $format; ?>;
			Ladder.classes = {
				0: '<?php echo WoW_Locale::GetString('template_pvp_ladder_filter_comp_any'); ?>',
                <?php
                $class_specs = WoW_Utils::GetClassSpecs();
                $i = 0;
                while($i < 30) {
                    echo $class_specs[$i]['class'] . ': ' . '[\'' . $class_specs[$i]['name'] . '\', \'' . $class_specs[$i + 1]['name'] . '\', \'' . $class_specs[$i + 2]['name'] . '\'],';
                    $i += 3;
                }
                ?>
			};

			Ladder.initialize('<?php echo isset($_GET['comp']) ? urldecode($_GET['comp']) : null; ?>');
		});
	//]]>
	</script>

	<div class="pvp pvp-ladder">
		<div class="pvp-right">
			<div class="ladder-title">
	<h3 class="category "><?php echo sprintf(WoW_Locale::GetString('template_pvp_ladder_header'), $format, $format); ?> - <span><?php echo $bg['name']; ?></span>
</h3>
			</div>

			<form action="" method="get" onsubmit="return Ladder.submit();" id="pvp-filters" class="table-filters">
				<input type="hidden" name="comp" id="filter-comp" value="" />
			<div class="filter">
					<label for="filter-team"><?php echo WoW_Locale::GetString('template_character_team_name'); ?>:</label>
					<input type="text" class="input" id="filter-team" name="team" value="<?php echo isset($_GET['team']) ? $_GET['team'] : null; ?>" maxlength="30" />
				</div>

				<div class="filter">
				<label for="filter-realm"><?php echo WoW_Locale::GetString('template_pvp_ladder_filter_realm'); ?>:</label>

					<select class="input select" id="filter-realm" name="realm">
					<option value=""<?php echo !isset($_GET['realm']) ? ' selected="selected"' : null; ?>><?php echo WoW_Locale::GetString('template_realm_status_all'); ?></option>
                    <?php
                    foreach(WoWConfig::$Realms as $realm) {
                        if(in_array($realm['id'], $bg['realms'])) {
                            echo '<option value="' . $realm['id'] . '"' . ((isset($_GET['realm']) && $realm['id'] == (int) $_GET['realm']) ? ' selected="selected"' : null) . '>' . $realm['name'] . '</option>';
                        }
                    }
                    ?>
				</select>
			</div>

			<div class="filter">
					<label for="filter-faction"><?php echo WoW_Locale::GetString('template_js_faction'); ?>:</label>

					<select class="input select" id="filter-faction" name="faction">
						<option value=""<?php echo !isset($_GET['faction']) ? ' selected="selected"' : null; ?>><?php echo WoW_Locale::GetString('template_realm_status_all'); ?></option>
							<option value="0"<?php echo (isset($_GET['faction']) && $_GET['faction'] == FACTION_ALLIANCE) ? ' selected="selected"' : null; ?>><?php echo WoW_Locale::GetString('faction_alliance'); ?></option>
							<option value="1"<?php echo (isset($_GET['faction']) && $_GET['faction'] == FACTION_HORDE) ? ' selected="selected"' : null; ?>><?php echo WoW_Locale::GetString('faction_horde'); ?></option>
					</select>
				</div>

				<div class="filter">
					<label for="filter-rating-min"><?php echo WoW_Locale::GetString('template_pvp_ladder_rating'); ?>:</label>
					<input type="text" class="input align-center" name="minRating" id="filter-rating-min" maxlength="4" value="<?php echo (isset($_GET['minRating']) && (int) $_GET['minRating'] > 0) ? (int) $_GET['minRating'] : null;  ?>" /> -
					<input type="text" class="input align-center" name="maxRating" id="filter-rating-max" maxlength="4" value="<?php echo (isset($_GET['maxRating']) && (int) $_GET['maxRating'] > 0) ? (int) $_GET['maxRating'] : null;  ?>" />
				</div>

	<span class="clear"><!-- --></span>

				<div class="filter checkbox">
					<input type="radio" name="compType" value="all" id="filter-comp-all"<?php echo (!isset($_GET['comp']) || $_GET['comp'] == null) ? ' checked="checked"' : null; ?> />
					<label for="filter-comp-all"><?php echo WoW_Locale::GetString('template_pvp_ladder_filter_comp_all'); ?></label>
				</div>

				<div class="filter checkbox">
					<input type="radio" name="compType" value="filter" id="filter-comp-edit"<?php echo (isset($_GET['comp']) && $_GET['comp'] != null) ? ' checked="checked"' : null; ?> />
					<label for="filter-comp-edit"><?php echo WoW_Locale::GetString('template_pvp_ladder_filter_comp_edit'); ?></label>
				</div>

	<span class="clear"><!-- --></span>

				<div id="team-composition" style="display: none">
					<div class="filter comp" id="comp-base" data-index="0">
						<a href="javascript:;" onclick="Ladder.removeComp(this);" class="remove"></a>

						<select class="input select class">
							<option value=""><?php echo WoW_Locale::GetString('template_pvp_ladder_filter_any_class'); ?></option>
                            <?php
                            for($i = 1; $i < 12; ++$i) {
                                if($i == 10) {
                                    continue;
                                }
                                echo '<option value="' . $i . '">' . WoW_Locale::GetString('character_class_' . $i) . '</option>';
                            }
                            ?>
				</select>

						<br />

						<select class="input select spec" style="display: none"></select>
			</div>

					<div id="comp-add" class="filter">
						<a href="javascript:;" onclick="Ladder.addComp();"><?php echo WoW_Locale::GetString('template_pvp_ladder_add_class'); ?></a>
			</div>
				</div>

	<span class="clear"><!-- --></span>
            
            <?php
            if(isset($_GET['comp']) && $_GET['comp'] != null) {
                echo '<div id="current-filters">';
                $filter_comp = explode(',', $_GET['comp']);
                if($filter_comp) {
                    $i = 0;
                    foreach($filter_comp as $filter) {
                        $class_info = explode(':', $filter);
                        if(!$class_info) {
                            continue;
                        }
                        echo '
                        <span id="comp-filter-' . $i . '">
                        <strong class="color-c' . $class_info[0] . '">' . WoW_Locale::GetString('character_class_' . $class_info[0]) . ':</strong>
                            <span>
                                ' . WoW_Characters::GetTalentSpecNameFromDB($class_info[1] - 1, $class_info[0]) . '
                                    <a href="javascript:;" onclick="Ladder.removeFitler(\'' . $i . '\', this);"></a>
                            </span>
                        </span>
                    ';
                        ++$i;
                    }
                }
                echo '(<a href="javascript:;" onclick="Ladder.openFilters(this);">' . WoW_Locale::GetString('template_pvp_ladder_change_filter') . '</a>)</div>';
            }
            ?>


				<div id="filter-buttons">
					

	<button class="ui-button button1 " type="submit" id="submit-button">
		<span>
			<span><?php echo WoW_Locale::GetString('template_filter_caption'); ?></span>
		</span>
	</button>
	<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/arena/<?php echo WoW_Template::GetPageData('activeBG'); ?>/<?php echo WoW_Template::GetPageData('teamFormatS'); ?>"><?php echo WoW_Locale::GetString('template_guild_roster_reset_filter'); ?></a>
		</div>
			</form>
	<div id="ladders">
	<div class="table-options">
    <div class="option">

            <?php
            $teams = WoW_Arena::GetTopTeams($format, $bg['id'], 50, $offset);
            $total_count = WoW_Arena::GetTopTeams($format, $bg['id'], 0, 0, true);
            $pagination = '<ul class="ui-pagination">';
            $start = ($page - 1) * 50;
            $prev = $page - 1;
            $next = $page + 1;
            $total_pages = ceil($total_count / 50);
            $pagination = '';
            
            $display_min = (($page - 1) * 50) + 1;
            $display_max = min($page * 50, $total_count);
            
            if($page > 1) {
                $pagination .= sprintf('<li class="cap-item">
                    <a href="%spage=%d">
                        %s
                    </a>
                </li>
            ', $global_url, $prev, WoW_Locale::GetString('template_item_table_prev'));
            }
            if($total_pages <= 7) {
                for($i = 1; $i <= $total_pages; ++$i) {
                    $pagination .= sprintf('
                    <li%s>
                        <a href="%spage=%d">
                        %d
                    </a>
                </li>
            ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                }
            }
            elseif($total_pages > 7) {
                if($page < 7) {
                    for($i = 1; $i < 8; ++$i) {
                        $pagination .= sprintf('
                    <li%s>
                        <a href="%spage=%d">
                        %d
                    </a>
                </li>
            ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                    }
                    $pagination .= sprintf('<li class="expander">…</li>
                    <li>
                        <a href="%spage=%d">
                        %d
                    </a>
            </li>
            ', $global_url, $total_pages, $total_pages);
                }
                elseif($total_pages - 6 > $page && $page > 6) {
                    $pagination .= sprintf('<li>
                    <a href="%spage=1">
                        1
                    </a>
                </li>
                <li class="expander">
                …
                </li>
                ', $global_url);
                    for($i = ($page - 3); $i <= ($page + 3); ++$i) {
                        $pagination .= sprintf('
                    <li%s>
                        <a href="%spage=%d">
                        %d
                    </a>
                </li>
            ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                    }
                    $pagination .= sprintf('<li class="expander">…</li><li><a href="%spage=%d">%d</a></li>', $global_url, $total_pages, $total_pages);
                }
                else {
                    $pagination .= sprintf('<li>
                    <a href="%spage=1">
                        1
                    </a>
                </li>
                <li class="expander">
                …
                </li>', $global_url);
                    for($i = $total_pages - 8; $i <= $total_pages; ++$i) {
                        $pagination .= sprintf('
                    <li%s>
                        <a href="%spage=%d">
                        %d
                    </a>
                </li>
            ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                    }
                }
            }
            if($page < $total_pages) {
                $pagination .= sprintf('<li class="cap-item">
                <a href="%spage=%d">
                    %s
                </a>
            </li>', $global_url, ($page + 1), WoW_Locale::GetString('template_item_table_next'));
            }
            $pagination .= '</ul>';
            if($total_pages > 1) {
                echo $pagination;
            }
            echo '
			</div>';
            $ladder_results = sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), ($offset * 50 + 1), count($teams), $total_count);
            echo $ladder_results;
            ?>
	<span class="clear"><!-- --></span>
	</div>
	<div class="table ">
		<table>
				<thead>
					<tr>
							<th>
	<a href="<?php echo $global_url; ?>sort=ranking&amp;dir=d" class="sort-link">
		<span class="arrow up">#</span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=name&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_character_team_name'); ?></span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=realm&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_realm'); ?></span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=faction&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_faction'); ?></span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=wins&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_pvp_ladder_wins'); ?></span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=losses&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_pvp_ladder_loses'); ?></span>
	</a>
							</th>
							<th>
	<a href="<?php echo $global_url; ?>sort=rating&amp;dir=a" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_pvp_ladder_rating'); ?></span>
	</a>
							</th>
					</tr>
				</thead>
			<tbody>
                <?php
                if($teams) {
                    $toggleStyle = 2;
                    foreach($teams as &$team) {
                        $stats = &$team->GetTeamStats();
                        $members = &$team->GetTeamMembers();
                        if(!$stats || !$members) {
                            continue;
                        }
                        echo '<tr clas="row' . ($toggleStyle % 2 ? '1' : '2') . '" id="rank-' . $stats['rank'] . '">
                            <td class="ranking">' . $stats['rank'] . '
                            <span id="rank-tooltip-0" style="display: none">
                            ' . WoW_Locale::GetString('template_pvp_ladder_tooltip_ph') . '
                            </span>
                            <span class="arrow-new" data-tooltip="#rank-tooltip-0"></span>
                            </td>
                            <td>
                            <div class="player-icons">';
                            foreach($members as &$member) {
                                echo '<a href="' . $member['url'] . '">
                                <span class="icon-frame frame-14 ">
                                <img src="http://eu.media.blizzard.com/wow/icons/18/class_' . $member['classId'] . '.jpg" alt="" width="14" height="14" />
                                </span></a>';
                            }
                            echo '</div>
                            <a href="' . $team->GetTeamURL() . '">' . $team->GetTeamName() . '</a>
                            </td>
                            <td>' . $team->GetTeamRealmName() . '</td>
                            <td class="align-center">
                                <span class="icon-frame frame-14" data-tooltip="' . WoW_Locale::GetString('faction_' . ($team->GetTeamFaction() == FACTION_ALLIANCE ? 'alliance' : 'horde')) . '">
                                    <img src="http://eu.media.blizzard.com/wow/icons/18/faction_' . ($team->GetTeamFaction() == FACTION_ALLIANCE ? '0' : '1')  . '.jpg" alt="" width="14" height="14" />
                                </span>
                            </td>
                            <td class="align-center"><span class="win">' . $stats['wins_season'] . '</span></td>
                            <td class="align-center"><span class="loss">' . $stats['loses_season'] . '</span></td>
                            <td class="align-center"><span class="rating">' . $stats['rating'] . '</span></td>
                            </tr>
                            ';
                        ++$toggleStyle;
                    }
                }
                ?>
			</tbody>
		</table>
	</div>
	<div class="table-options">
            <?php
            if($total_pages > 1) {
                echo '<div class="option">' . $pagination . '</div>';
            }
            echo $ladder_results; ?>
	<span class="clear"><!-- --></span>
	</div>
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
