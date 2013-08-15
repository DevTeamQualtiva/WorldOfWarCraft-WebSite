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
<?php WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li>
<a href="<?php echo WoW_Characters::GetURL(); ?>" rel="np">
<?php echo sprintf('%s @ %s', WoW_Characters::GetName(), WoW_Characters::GetRealmName()); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Characters::GetURL(); ?>feed" rel="np">
<?php echo WoW_Locale::GetString('template_character_feed'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">	
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Characters::GetFactionName(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
<?php
WoW_Template::LoadTemplate('block_profile_crest');
WoW_Template::LoadTemplate('block_profile_menu');
?>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="profile-section-header">
			<div class="activity-subscribe">
			</div>
				<h3 class="category "><?php echo WoW_Locale::GetString('template_profile_feed'); ?></h3>
		</div>
		<div class="profile-section">
	<ul class="activity-feed activity-feed-wide">
    <?php
    $feeds = WoW_Characters::GetFeed();
    if(is_array($feeds)) {
        $i = 0;
        foreach($feeds as $event) {
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
                    echo sprintf('<li><dl><dd><a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="color-q%d" data-item="%s">
                    <span  class="icon-frame frame-18" style=\'background-image: url("http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg");\'>
                    </span>
                    </a>
                    %s
                    </dd>
                    <dt>%s</dt>
                    </dl>
                    </li>', WoW::GetWoWPath(), $event['id'], $event['quality'], $event['data-item'],
                    $event['icon'],
                    sprintf(WoW_Locale::GetString('template_feed_obtained_item'), $item_link),
                    $event['date']
                    );
                    break;
                case TYPE_BOSS_FEED:
                    echo sprintf('<li class="bosskill"><dl><dd><span class="icon"></span>%s: %d
                    </dd>
                    <dt>%s</dt>
                    </dl>
                    </li>', $event['name'], $event['count'], $event['date']);
                    break;
            }
            ++$i;
        }
    }
    ?>
    </ul>
			<div class="activity-note"><?php echo WoW_Locale::GetString('template_character_feed_most_recent_events'); ?></div>
		</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>
    <script type="text/javascript">
	//<![CDATA[
		var MsgProfile = {
			tooltip: {
				feature: {
					notYetAvailable: "<?php echo WoW_Locale::GetString('template_feature_not_available'); ?>"
				},
				vault: {
					character: "<?php echo WoW_Locale::GetString('template_vault_auth_required'); ?>",
					guild: "<?php echo WoW_Locale::GetString('template_vault_guild'); ?>"
				}
			}
		};
	//]]>
	</script>
</div>
</div>
</div>
