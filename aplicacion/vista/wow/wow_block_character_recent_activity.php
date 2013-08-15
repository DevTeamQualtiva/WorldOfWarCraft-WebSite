<div class="profile-recentactivity">
	<h3 class="category "><?php echo WoW_Locale::GetString('template_profile_recent_activity'); ?>
</h3>
					<div class="profile-box-simple">
	<ul class="activity-feed">
    <?php
    $feed = WoW_Characters::GetFeed();
    if($feed) {
        $i = 0;
        foreach($feed as $event) {
            if($i >= 5) {
                break;
            }
            switch($event['type']) {
                case TYPE_ACHIEVEMENT_FEED:
                    $ach_link = sprintf('<a href="%sachievement#%d:a%d" rel="np" onmouseover="Tooltip.show(this, \'#achv-tooltip-%d\');">%s</a>', WoW_Characters::GetURL(), $event['category'], $event['id'], $i, $event['name']);
                    if($event['category'] == ACHIEVEMENTS_CATEGORY_FEATS) {
                        $locale_text = sprintf(WoW_Locale::GetString('template_feed_fos'), $ach_link);
                    }
                    else {
                        $locale_text = sprintf(WoW_Locale::GetString('template_feed_achievement'), $ach_link, $event['points']);
                    }
                    echo sprintf('<li class="ach">
                    <dl><dd><a href="%sachievement#%d:a%d" rel="np" onmouseover="Tooltip.show(this, \'#achv-tooltip-%d\');">
                    <span  class="icon-frame frame-18" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg");\'></span></a>
                    %s
                    <div id="achv-tooltip-%d" style="display: none"><div class="item-tooltip"><span class="icon-frame frame-56" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/56/%s.jpg");\'></span>
                    <h3>%s</h3><div class="color-tooltip-yellow">%s</div>
                    </div></div></dd><dt>%s</dt></dl>
                    </li>', WoW_Characters::GetURL(), $event['category'], $event['id'], $i, $event['icon'], $locale_text,
                    $i, $event['icon'], $event['name'], $event['desc'], $event['date']);
                    break;
                case TYPE_ITEM_FEED:
                    $item_link = sprintf('<a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="color-q%d" data-item="%s">%s</a>', WoW::GetWoWPath(), $event['id'], $event['quality'], $event['data-item'], $event['name']);
                    echo sprintf('<li>
                    <dl><dd><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="color-q%d" data-item="%s"> 
                    <span  class="icon-frame frame-18" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg");\'></span></a>
                    %s
                    </dd><dt>%s</dt></dl>
                    </li>', WoW::GetWoWPath(), $event['id'], $event['quality'], $event['data-item'], $event['icon'], sprintf(WoW_Locale::GetString('template_feed_obtained_item'), $item_link), $event['date']);
                    break;
                case TYPE_BOSS_FEED:
                    echo sprintf('<li class="bosskill"><dl><dd><span class="icon"></span>%s: %d</dd><dt>%s</dt></dl></li>', $event['name'], $event['count'], $event['date']);
                    break;
            }
            $i++;
        }
    }
    ?>
	</ul>
	<a class="profile-linktomore" href="<?php echo WoW_Characters::GetURL(); ?>feed" rel="np"><?php echo WoW_Locale::GetString('template_profile_more_activity_feed'); ?></a>

	<span class="clear"><!-- --></span>
					</div>

				</div>