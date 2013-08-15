<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/race/" rel="np"><?php echo WoW_Locale::GetString('template_game_race_index'); ?></a></li>
</ol>-->
</div>
<div class="content-bot">
	<div class="section-title">
		<h2><?php echo WoW_Locale::GetString('template_game_race_index'); ?></h2>
	</div>
	<p class="main-header-desc"><?php echo WoW_Locale::GetString('template_game_race_intro'); ?></p>
    <?php
    $alliance_races = array(
        'worgen' => 22,
        'draenei' => RACE_DRAENEI,
        'dwarf'  => RACE_DWARF,
        'gnome'  => RACE_GNOME,
        'human' => RACE_HUMAN,
        'night-elf' => RACE_NIGHTELF
    );
    $horde_races = array(
        'goblin' => 9,
        'blood-elf' => RACE_BLOODELF,
        'orc' => RACE_ORC,
        'tauren' => RACE_TAUREN,
        'troll' => RACE_TROLL,
        'forsaken' => RACE_UNDEAD
    );
    $races = array(
        'alliance' => $alliance_races,
        'horde' => $horde_races
    );
    $exp_races = array(
        'cataclysm' => array('worgen', 'goblin'),
        'bc' =>  array('draenei', 'blood-elf')
    );
    foreach($races as $faction_name => $races) {
        echo sprintf('<div class="racegroup %s"><span class="race-title">%s</span>', $faction_name, WoW_Locale::GetString('faction_' . $faction_name));
        $i = 0;
        foreach($races as $race_name => $race_id) {
            if(in_array($race_name, $exp_races['cataclysm']) ) {
                $req = sprintf('<em class="class-req cataclysm">%s</em>', WoW_Locale::GetString('template_zone_expansion_required') . ' ' . WoW_Locale::GetString('template_expansion_3'));
            }
            elseif(in_array($race_name, $exp_races['bc']) ) {
                $req = sprintf('<em class="class-req bc">%s</em>', WoW_Locale::GetString('template_zone_expansion_required') . ' ' . WoW_Locale::GetString('template_expansion_1'));
            }
            else {
                $req = '';
            }
            echo sprintf('<div class="flag-card %s">
            <div class="wrapper">
                <a href="%s">
                    <span class="class-name">%s</span>%s
                    <span class="class-desc">%s</span>
                </a>
            </div>
        </div>', $race_name, $race_name, WoW_Locale::GetString('character_race_' . $race_id), $req, WoW_Locale::GetString('template_game_race_' . $race_name . '_info') );
              ++$i;
            }
            echo '</div>';
        }
    ?>

<span class="clear"><!-- --></span>
</div>
</div>
</div>
