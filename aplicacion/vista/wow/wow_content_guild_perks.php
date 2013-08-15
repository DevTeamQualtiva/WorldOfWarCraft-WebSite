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
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li>
<a href="<?php echo WoW_Guild::GetGuildUrl(); ?>" rel="np">
<?php echo sprintf('%s @ %s', WoW_Guild::GetGuildName(), WoW_Guild::GetGuildRealmName()); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Guild::GetGuildUrl(); ?>perk" rel="np">
Perks
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Guild::GetGuildFactionText(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
		<div class="profile-sidebar-tabard">
			<div class="guild-tabard">
		<canvas id="guild-tabard" width="240" height="240">
			<div class="guild-tabard-default " ></div>
		</canvas>
	<script type="text/javascript">
	//<![CDATA[
			$(document).ready(function() {
				var tabard = new GuildTabard('guild-tabard', {
                    <?php
                    $guild_emblem = WoW_Guild::GetGuildEmblemInfo();
                    echo sprintf("
                    'ring': '%s',
					'bg': [ 0, %d ],
					'border': [ %d, %d ],
					'emblem': [ %d, %d ]
                    ", WoW_Guild::GetGuildFactionText(), $guild_emblem['bg_color'], $guild_emblem['border_style'], $guild_emblem['border_color'], $guild_emblem['emblem_style'], $guild_emblem['emblem_color']);
                    ?>
				});
			});
	//]]>
	</script>
				<div class="tabard-overlay"></div>
				<div class="crest"></div>
				<a class="tabard-link" href="<?php echo WoW_Guild::GetGuildUrl(); ?>"></a>
			</div>
			<div class="profile-sidebar-info">
				<div class="name"><a href="<?php echo WoW_Guild::GetGuildUrl(); ?>"><?php echo WoW_Guild::GetGuildName(); ?></a></div>
				<div class="under-name">
					<?php echo sprintf(WoW_Locale::GetString('template_guild_under_name'), WoW_Guild::GetGuildLevel(), WoW_Locale::GetString(sprintf('faction_' . WoW_Guild::GetGuildFactionText()))); ?>
				</div>
				<div class="realm">
					<span id="profile-info-realm" class="tip" data-battlegroup="<?php echo WoWConfig::$DefaultBGName; ?>"><?php echo WoW_Guild::GetGuildRealmName(); ?></span>
				</div>
			</div>
		</div>
        <?php
        WoW_Template::LoadTemplate('block_guild_menu');
        ?>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="profile-section-header">
				<h3 class="category "><?php echo WoW_Locale::GetString('template_guild_menu_perks'); ?></h3>
		</div>
		<div class="profile-section">
	<div class="list-filter-wrapper">
		<div class="list-filter">
			<label for="list-filter"><?php echo WoW_Locale::GetString('template_guild_perks_filter'); ?>:</label>
			<select class="input" id="list-filter" onchange="Guild.filter('#perks-list', 'li', this.value)">
				<option value="all"><?php echo WoW_Locale::GetString('template_guild_perks_all'); ?></option>
				<option value="unlocked"><?php echo WoW_Locale::GetString('template_guild_perks_unlocked'); ?></option>
				<option value="locked"><?php echo WoW_Locale::GetString('template_guild_perks_locked'); ?></option>
			</select>
		</div>
	</div>
	<div class="list-header">
		<strong class="level"><?php echo WoW_Locale::GetString('template_guild_perks_guild_level'); ?></strong>
		<strong class="perk"><?php echo WoW_Locale::GetString('template_guild_perks_perk_desc'); ?></strong>
	</div>	
	<div id="perks-list" class="perks-list">
		<ul>
            <?php
            WoW_Guild::InitPerks();
            $perks = WoW_Guild::GetGuildPerksData();
            if(is_array($perks)) {
                foreach($perks as $perk) {
                    echo sprintf('<li class="locked" id="p%d">
                    <div class="level">%d</div>
                    <div class="icon-wrapper">
                    <span class="icon-frame frame-50"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/%s.jpg" alt="" width="50" height="50" /></span>
					<div class="symbol"></div></div>
                    <div><strong>%s</strong><p>%s</p></div>
                    <span class="clear"><!-- --></span></li>', 
                    $perk['id'], $perk['level'], $perk['icon'], $perk['name'], $perk['desc']);
                }
            }
            ?>
		</ul>
	</div>
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
