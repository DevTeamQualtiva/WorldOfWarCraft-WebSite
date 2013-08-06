<?php
$allowed_types = array(
    'dropCreatures',
    'dropGameObjects',
    'vendors',
    'currencyForItems',
    'rewardFromQuests',
    'skinnedFromCreatures',
    'pickPocketCreatures',
    'minedFromCreatures',
    'createdBySpells',
    'reagentForSpells',
    'disenchantItems',
    'comments'
);
$filtered_types = array(
    'dropCreatures',
    'dropGameObjects',
    'vendors',
    'currencyForItems',
    'rewardFromQuests',
    'skinnedFromCreatures',
    'pickPocketCreatures',
    'minedFromCreatures',
    'createdBySpells',
    'disenchantItems',
);
$tab_type = WoW_Template::GetPageData('tab_type');
$entry = WoW_Template::GetPageData('item_entry');
$all_item_tabs = WoW_Items::GetItemTabsNames($entry);
$allowed_item_tabs = array();
foreach($all_item_tabs as $tab) {
    $allowed_item_tabs[] = $tab['type'];
}
?>
<div class="related-content" id="related-<?php echo $tab_type; ?>">
<?php
if(in_array($tab_type, $allowed_types)) {
    if(in_array($tab_type, $filtered_types)) {
        echo sprintf('<div class="filters inline">
        <div class="keyword">
            <input id="filter-name-%s" type="text" class="input filter-name" data-filter="row" maxlength="25" title="%s" value="%s" />
        </div>
        <span class="clear"><!-- --></span>
    </div>', $tab_type, WoW_Locale::GetString('template_filter_caption'), WoW_Locale::GetString('template_filter_caption'));
    }
    if($tab_type == 'currencyForItems') {
        // Extra filter
        echo sprintf('<div class="filter">
				<label for="filter-class">%s</label>

				<select class="input select filter-class" data-filter="class" data-name="class">', WoW_Locale::GetString('template_item_tab_content_filter_for'));
        echo sprintf('<option value="">%s</option>', WoW_Locale::GetString('template_item_tab_content_all_classes'));
        for($i = CLASS_WARRIOR; $i < MAX_CLASSES; ++$i) {
            if($i == 10) {
                continue;
            }
            echo sprintf('<option value="class-%d">%s</option>', $i, WoW_Locale::GetString('character_class_' . $i));
        }
        echo sprintf('
				</select>
			</div>
			<div class="filter" style="padding-top: 3px;">
				<label for="filter-isEquippable-%s">
					<input id="filter-isEquippable-%s" type="checkbox" class="input checkbox filter-isEquippable" data-name="isEquippable" data-filter="class" data-value="is-equipment" />
					%s
				</label>
			</div>', $tab_type, $tab_type, WoW_Locale::GetString('template_item_tab_content_equipment_only'));
    }
}
?>
    <?php
    $result_table = WoW_Items::GetItemTabContents($entry, $tab_type, $allowed_item_tabs);
    if(is_array($result_table)) {
        echo sprintf('<div class="table-options-top">
	<div class="table-options">%s<span class="clear"><!-- --></span>
	</div>
		</div><div class="table full-width">
		<table>
				<thead>
					<tr>', WoW_Locale::GetString('template_guild_roster_results_count'));
        if(isset($result_table['table_headers']) && is_array($result_table['table_headers'])) {
            foreach($result_table['table_headers'] as $header) {
                echo sprintf('<th>
                    <a href="javascript:;" class="sort%s"><span class="arrow">%s</span></a>
                </th>', $header['class'], WoW_Locale::GetString('template_item_tab_header_' . $header['type']));
            }
        }
        echo '</tr></thead>';
        if(isset($result_table['table_contents']) && is_array($result_table['table_contents'])) {
            echo '<tbody>';
            $toggleStyle = 2;
            foreach($result_table['table_contents'] as $content) {
                echo sprintf('<tr class="row%d">', $toggleStyle % 2 ? 1 : 2);
                if(is_array($content)) {
                    foreach($content as $cell) {
                        echo sprintf('<td%s>%s</td>', $cell['td'] != null ? $cell['td'] : null, $cell['text']);
                    }
                }
                echo '</tr>';
                ++$toggleStyle;
            }
            echo sprintf('<tr class="no-results">
			<td colspan="3" class="align-center">
				%s
			</td>
		</tr>
        </tbody></table>
	</div>
		<div class="table-options-bottom">
	<div class="table-options">
        %s
	<span class="clear"><!-- --></span>
	</div>
		</div>', WoW_Locale::GetString('template_item_tab_content_no_results'), WoW_Locale::GetString('template_guild_roster_results_count'));
        }
    }
    ?>
		
	<script type="text/javascript">
	//<![CDATA[
		Wiki.related['<?php echo $tab_type; ?>'] = new WikiRelated('<?php echo $tab_type; ?>', {
			paging: true,
			totalResults: 0,
			results: 50,
			column: 0
		});
	//]]>
	</script>
</div>
