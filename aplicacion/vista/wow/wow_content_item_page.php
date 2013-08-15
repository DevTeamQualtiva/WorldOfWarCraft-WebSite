<?php
$proto = WoW_Template::GetPageData('proto');
?>
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
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_items'); ?>
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/?classId=<?php echo $proto->class; ?>" rel="np">
<?php echo $proto->class_name; ?>
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/?classId=<?php echo sprintf('%d&amp;subClassId=%d', $proto->class, $proto->subclass); ?>" rel="np">
<?php echo $proto->subclass_name; ?>
</a>
</li>
<?php
if(in_array($proto->class, array(ITEM_CLASS_WEAPON, ITEM_CLASS_ARMOR))) {
    echo sprintf('<li>
<a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/?classId=%s" rel="np">
%s
</a>
</li>', WoW::GetWoWPath(), sprintf('%d&amp;subClassId=%d&InventoryType=%d', $proto->class, $proto->subclass, $proto->InventoryType), WoW_Locale::GetString('template_item_invtype_' . $proto->InventoryType));
}

?>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/<?php echo $proto->entry; ?>" rel="np">
<?php echo $proto->name; ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="wiki" class="wiki wiki-item">
		<div class="sidebar">
    <?php
    if(in_array($proto->class, array(ITEM_CLASS_ARMOR, ITEM_CLASS_WEAPON))) {
        if(!in_array($proto->InventoryType, array(INV_TYPE_FINGER, INV_TYPE_NECK, INV_TYPE_RANGED, INV_TYPE_RELIC, INV_TYPE_TRINKET))) {
            echo sprintf('<div class="snippet">
		<div class="model" id="model-%d">
			<div class="viewer" style="background-image: url(http://eu.media.blizzard.com/wow/renders/items/item%d.jpg);"></div>
	   </div>
	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Item.model = new ModelRotator("#model-%d");
			});
	//]]>
	</script>
	</div>', $proto->entry, $proto->entry, $proto->entry);
        }
    }
    ?>
	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_item_quick_facts'); ?></h3>
		<ul class="fact-list">
                <?php
                if($proto->RequiredDisenchantSkill > 0) {
                    echo sprintf('<li>%s</li>', sprintf(WoW_Locale::GetString('template_item_disenchant_fact'), $proto->RequiredDisenchantSkill));
                }
                ?>
		</ul>
	</div>

	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_item_learn_more'); ?></h3>

		<span id="fansite-links"></span>
	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Fansite.generate('#fansite-links', "item|<?php echo sprintf('%d|%s', $proto->entry, $proto->name); ?>");
			});
	//]]>
	</script>
	</div>
		</div>
		<div class="info">
		<div class="title">
			<h2 class="color-q<?php echo $proto->Quality; ?>"><?php echo $proto->name; ?></h2>
		</div>
		<?php WoW_Template::LoadTemplate('page_item_tooltip'); ?>
		</div>
	<span class="clear"><!-- --></span>
    <?php
    $item_tabs = WoW_Items::GetItemTabsNames($proto->entry);
    if(is_array($item_tabs)) {
        echo '<div class="related"><div class="tabs "><ul id="related-tabs">';
        foreach($item_tabs as $tab) {
            if(!is_array($tab)) {
                continue;
            }
            echo sprintf('<li>
            <a href="#%s" data-key="%s" id="tab-%s">
                <span><span>%s</span></span>
            </a>
        </li>', $tab['type'], $tab['type'], $tab['type'], sprintf(WoW_Locale::GetString('template_item_tab_' . $tab['type']), $tab['count']));
        }
        echo '</ul><span class="clear"> </span></div><div id="related-content" class="loading"></div></div>';
    }
    ?>
	<script type="text/javascript">
	//<![CDATA[
				$(function() {
					Wiki.pageUrl = '<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/<?php echo $proto->entry; ?>/';
				});
	//]]>
	</script>
	</div>
</div>
</div>
</div>
