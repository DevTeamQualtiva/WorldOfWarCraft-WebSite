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
<a href="<?php echo WoW_Characters::GetURL(); ?>" rel="np">
<?php echo sprintf('%s @ %s', WoW_Characters::GetName(), WoW_Characters::GetRealmName()); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Characters::GetURL(); ?>statistic" rel="np">
<?php echo WoW_Locale::GetString('template_profile_statistics'); ?>
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
?>
<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
<li>
    <a href="<?php echo WoW_Characters::GetURL(); ?>" class="back-to" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_menu_character_info'); ?></span></span></a>
</li>
<li class="root-menu">
    <a href="<?php echo WoW_Characters::GetURL(); ?>statistic" class="back-to" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_profile_statistics'); ?></span></span></a>
</li>
<li class=" active">
    <a href="<?php echo WoW_Characters::GetURL(); ?>statistic#summary" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_profile_statistics'); ?></span></span></a>
</li>
<?php
$categories = WoW_Achievements::BuildCategoriesTree(true);
if(is_array($categories)) {
    foreach($categories as $category) {
        echo sprintf('<li class="">
    <a href="%sstatistic#%d" class="%s" rel="np"><span class="arrow"><span class="icon">%s</span></span></a>
', WoW_Characters::GetURL(), $category['id'], is_array($category['child']) ? 'has-submenu' : null, $category['name']);
        if(is_array($category['child'])) {
            echo '<ul>';
            foreach($category['child'] as $child) {
                echo sprintf('<li class=""><a href="%sstatistic#%d:%d" class="" rel="np"><span class="arrow"><span class="icon">%s</span></span></a></li>', WoW_Characters::GetURL(), $category['id'], $child['id'], $child['name']);
            }
            echo '</ul>';
        }
        echo '</li>';
    }
}
?>
</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="profile-section-header">
				<h3 class="category "><?php echo WoW_Locale::GetString('template_profile_statistics'); ?></h3>
			<div class="search-container" id="search-container">
				<form autocomplete="off">
					<div>
						<input alt="Filter statistics …" id="statistic-search" class="input" onkeyup="StatisticHandler.doSearch(this.value)" value="Filter statistics …" type="text" name="search-term" autocomplete="off" />
						<div id="symbol-cross" onclick="StatisticHandler.resetSearch()"></div>
					</div>
				</form>
			</div>
		</div>
		<div class="profile-section">
	<ul>
	<li id="cat-summary" class="table">
		<a name="ssummary"></a>
	<h4><?php echo WoW_Locale::GetString('template_character_statistic_update'); ?></h4>
    <?php
    $summary = WoW_Achievements::GetStatisticSummary();
    if(is_array($summary)) {
        $toggleStyle = 1;
        foreach($summary as $stat) {
            echo sprintf('<dl%s><dt>%s</dt><dd>%s</dd></dl>', $toggleStyle % 2 ? ' class="odd"' : null, $stat['name'], $stat['quantity']);
            ++$toggleStyle;
        }
    }
    ?>
	</li>
	</ul>
	<span id="search-error" class="table">
		Search Error
	</span>
	<div id="statistic-list" class="statistic-list"></div>
		</div>
		<script type="text/javascript">
		$(document).ready(function () {
			DynamicMenu.init({ "section": "statistic" });
			StatisticHandler.init();
		})
		</script>
		</div>
	<span class="clear"><!-- --></span>
	</div>
	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Profile.url = '<?php echo WoW_Characters::GetURL(); ?>statistic';
		});

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
