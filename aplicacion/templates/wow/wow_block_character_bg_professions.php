<div class="summary-stats-bottom">

							<div class="summary-battlegrounds">
	<ul>
		<li class="rating"><span class="name"><?php echo WoW_Locale::GetString('template_rated_bg_rating'); ?></span><span class="value">0</span>	<span class="clear"><!-- --></span>
</li>
		<li class="kills"><span class="name"><?php echo WoW_Locale::GetString('template_honorable_kills'); ?></span><span class="value"><?php echo WoW_Characters::GetTotalKills(); ?></span>	<span class="clear"><!-- --></span>
</li>
	</ul>
							</div>

							<div class="summary-professions">
	<ul>
				
	    
	
    <?php
    // Professions
    $professions = WoW_Characters::GetProfessions();
    if(is_array($professions)) {
        for($i = 0; $i < 2; $i++) {
            if(!isset($professions[$i])) {
                echo sprintf('<li class="empty">
					<span class="profession-details">
						<span class="icon"> 
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/inv_misc_questionmark.jpg" alt="" width="12" height="12" />
		</span>
</span>
						<span class="name">%s</span>
					</span>
				</li>', WoW_Locale::GetString('template_profile_no_professions'));
            }
            else {
                echo sprintf('<li><div class="profile-progress border-3" >
		<div class="bar border-3" style="width: %d%%"></div>
			<div class="bar-contents"><span class="profession-details">
							<span class="icon"> 
		<span class="icon-frame frame-12">
			<img src="http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg" alt="" width="12" height="12" />
		</span>
</span>
							<span class="name">%s</span>
							<span class="value">%d</span>
						</span>

	<a href="javascript:;" data-fansite="skill|%d|%s" class="fansite-link fansite-small"> </a>
</div>
	</div></li>', WoW_Utils::GetPercent($professions[$i]['max'], $professions[$i]['value']), $professions[$i]['icon'], $professions[$i]['name'], $professions[$i]['value'], $professions[$i]['id'], $professions[$i]['name']);
            }
        }
    }
    ?>
				
	</ul>
							</div>

	<span class="clear"><!-- --></span>

						</div>
