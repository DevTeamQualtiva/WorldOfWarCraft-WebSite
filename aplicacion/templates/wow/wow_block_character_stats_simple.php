<div id="summary-stats-simple" class="summary-stats-simple"<?php echo WoW_Template::GetPageIndex() == 'character_profile_advanced' ? ' style="display:none;"' : null; ?>>
			<div class="summary-stats-simple-base">

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
        ?>
	<li data-id="strength" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_strength'); ?></span>
		<span class="value"><?php echo $strength['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>

	<li data-id="agility" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_agility'); ?></span>
		<span class="value"><?php echo $agility['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="stamina" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_stamina'); ?></span>
		<span class="value color-q2"><?php echo $stamina['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="intellect" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_intellect'); ?></span>
		<span class="value color-q2"><?php echo $intellect['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spirit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_spirit'); ?></span>
		<span class="value color-q2"><?php echo $spirit['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="mastery" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_mastery'); ?></span>
		<span class="value">0,0</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
			</div>
			<div class="summary-stats-simple-other">
				<a id="summary-stats-simple-arrow" class="summary-stats-simple-arrow" href="javascript:;"></a>
	<div class="summary-stats-column" style="<?php echo WoW_Characters::GetRole() != ROLE_MELEE ? 'display: none;' : null; ?>">
		<h4><?php echo WoW_Locale::GetString('template_profile_melee_stats'); ?></h4>
		<ul>
	<li data-id="meleedamage" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_damage'); ?></span>
		<span class="value"><?php echo sprintf('%d - %d', $melee_stats['damage']['min'], $melee_stats['damage']['max']); ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleedps" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_dps'); ?></span>
		<span class="value"><?php echo $melee_stats['damage']['dps']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleeattackpower" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_attack_power'); ?></span>
		<span class="value"><?php echo $melee_stats['attack_power']['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleespeed" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_haste'); ?></span>
		<span class="value"><?php echo $melee_stats['haste_rating']['value']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehaste" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_haste_rating'); ?></span>
		<span class="value"><?php echo $melee_stats['haste_rating']['hastePercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_hit'); ?></span>
		<span class="value">+<?php echo $melee_stats['hit_rating']['increasedHitPercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleecrit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_crit'); ?></span>
		<span class="value"><?php echo $melee_stats['crit_rating']['percent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="expertise" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_expertise'); ?></span>
		<span class="value"><?php echo $melee_stats['expertise_rating']['value']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="<?php echo WoW_Characters::GetRole() != ROLE_RANGED ? 'display: none;' : null; ?>">
		<h4><?php echo WoW_Locale::GetString('template_profile_ranged_stats'); ?></h4>
		<ul>
	<li data-id="rangeddamage" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_damage'); ?></span>
		<span class="value"><?php echo sprintf('%s - %d', $ranged_stats['damage']['min'], $ranged_stats['damage']['max']); ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangeddps" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_dps'); ?></span>
		<span class="value"><?php echo $ranged_stats['damage']['dps']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedattackpower" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_attack_power'); ?></span>
		<span class="value"><?php echo $ranged_stats['attack_power']['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedspeed" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_haste'); ?></span>
		<span class="value"><?php echo $ranged_stats['haste_rating']['value']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedhaste" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_haste_rating'); ?></span>
		<span class="value"><?php echo $ranged_stats['haste_rating']['hastePercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedhit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_hit'); ?></span>
		<span class="value">+<?php echo $melee_stats['hit_rating']['increasedHitPercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedcrit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_crit'); ?></span>
		<span class="value"><?php echo $melee_stats['crit_rating']['percent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="<?php echo (WoW_Characters::GetRole() != ROLE_CASTER && WoW_Characters::GetRole() != ROLE_HEALER) ? 'display: none;' : null; ?>">
		<h4><?php echo WoW_Locale::GetString('template_profile_spell_stats'); ?></h4>
		<ul>
	<li data-id="spellpower" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_spell_power'); ?></span>
		<span class="value"><?php echo $spell['power']['value']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellhaste" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_spell_haste'); ?></span>
		<span class="value"><?php echo $spell['haste_rating']['hastePercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellhit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_hit'); ?></span>
		<span class="value">+<?php echo $spell['hit_rating']['increasedHitPercent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellcrit" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_crit'); ?></span>
		<span class="value"><?php echo $spell['crit_rating']['value']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellpenetration" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_spell_penetration'); ?></span>
		<span class="value"><?php echo $spell['hit_rating']['penetration']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="manaregen" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_mana_regen'); ?></span>
		<span class="value"><?php echo $spell['mana_regen']['notCasting']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="combatregen" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_combat_regen'); ?></span>
		<span class="value"><?php echo $spell['mana_regen']['casting']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="<?php echo WoW_Characters::GetRole() != ROLE_TANK ? 'display: none' : null; ?>">
		<h4><?php echo WoW_Locale::GetString('template_profile_defense_stats'); ?></h4>
		<ul>
	<li data-id="armor" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_armor'); ?></span>
		<span class="value"><?php echo $defense['armor']['effective']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="dodge" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_dodge'); ?></span>
		<span class="value"><?php echo $defense['dodge']['percent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="parry" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_parry'); ?></span>
		<span class="value"><?php echo $defense['parry']['percent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="block" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_block'); ?></span>
		<span class="value"><?php echo $defense['block']['percent']; ?>%</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="resilience" class="">
		<span class="name"><?php echo WoW_Locale::GetString('stat_resilience'); ?></span>
		<span class="value"><?php echo $defense['resilience']['value']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="display: none">
		<h4><?php echo WoW_Locale::GetString('template_profile_resistances_stats'); ?></h4>
		<ul>
	<li data-id="arcaneres" class=" has-icon">
			<span class="icon"> 
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/resist_arcane.jpg" alt="" width="12" height="12" />
		</span>
</span>
		<span class="name"><?php echo WoW_Locale::GetString('stat_resistance_arcane'); ?></span>
		<span class="value"><?php echo $resistances['resistance']['arcane']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="fireres" class=" has-icon">
			<span class="icon"> 
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/resist_fire.jpg" alt="" width="12" height="12" />
		</span>
</span>
		<span class="name"><?php echo WoW_Locale::GetString('stat_resistance_fire'); ?></span>
		<span class="value"><?php echo $resistances['resistance']['fire']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="frostres" class=" has-icon">
			<span class="icon"> 
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/resist_frost.jpg" alt="" width="12" height="12" />
		</span>
</span>
		<span class="name"><?php echo WoW_Locale::GetString('stat_resistance_frost'); ?></span>
		<span class="value"><?php echo $resistances['resistance']['frost']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="natureres" class=" has-icon">
			<span class="icon">
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/resist_nature.jpg" alt="" width="12" height="12" />
		</span>
</span>
		<span class="name"><?php echo WoW_Locale::GetString('stat_resistance_nature'); ?></span>
		<span class="value"><?php echo $resistances['resistance']['nature']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="shadowres" class=" has-icon">
			<span class="icon">
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/resist_shadow.jpg" alt="" width="12" height="12" />
		</span>
</span>
		<span class="name"><?php echo WoW_Locale::GetString('stat_resistance_shadow'); ?></span>
		<span class="value"><?php echo $resistances['resistance']['shadow']; ?></span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
			</div>
			<div class="summary-stats-end"></div>
		</div>