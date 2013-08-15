<div class="summary-talents" id="summary-talents">
	<ul>
    <?php
    // Talents data
    $talents = WoW_Characters::GetTalentsData(); // Will be returned from cache.
    $i = 0;
    foreach($talents['specsData'] as $spec) {
        echo sprintf('<li class="summary-talents-1">
		<a href="%stalent/%s" class="%s"><span class="inner">
				%s
			<span class="icon"><img src="http://eu.battle.net/wow-assets/static/images/icons/36/%s.jpg" alt="" /><span class="frame"></span></span>
				<span class="roles">
							%s
				</span>
			<span class="name-build">
				<span class="name">%s</span>
				<span class="build">%d<ins>/</ins>%d<ins>/</ins>%d</span>
			</span>
		</span></a>
	</li>', WoW_Characters::GetURL(), ($i == WoW_Characters::GetActiveSpec()) ? 'primary' : 'secondary', $spec['active'] == 1 ? 'active' : null, $spec['active'] == 1 ? '<span class="checkmark"></span>' : null, $spec['icon'], $spec['roles'],
    $spec['name'], $spec['treeOne'], $spec['treeTwo'], $spec['treeThree']);
        $i++;
    }
    ?>
	</ul>
					</div>
<div class="summary-health-resource">
	<ul>
		<li class="health" id="summary-health" data-id="health"><span class="name"><?php echo WoW_Locale::GetString('stat_health'); ?></span><span class="value"><?php echo WoW_Characters::GetHealth(); ?></span></li>
		<li class="resource-<?php echo WoW_Characters::GetPowerType(); ?>" id="summary-power" data-id="power-<?php echo WoW_Characters::GetPowerType(); ?>"><span class="name"><?php echo WoW_Locale::GetString('stat_power' . WoW_Characters::GetPowerType()); ?></span><span class="value"><?php echo WoW_Characters::GetPowerValue(); ?></span></li>
	</ul>
					</div>
