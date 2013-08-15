<?php
$breadcrumbs = WoW_Items::GetBreadCrumbsForItem($_GET);
$global_url = '/wow/' . WoW_Locale::GetLocale() . '/item/';
$breadcrumb_nav = '';
if(is_array($breadcrumbs)) {
    foreach($breadcrumbs as $crumb) {
        $breadcrumb_nav .= sprintf('<li%s><a href="%s" rel="np">%s</a></li>', $crumb['last'] ? ' class="last"' : null, $crumb['link'], $crumb['caption']);
        if($crumb['last']) {
            $global_url = $crumb['link'];
        }
    }
}
if(strpos($global_url, '?') == 0) {
    $global_url .= '?';
}
else {
    $global_url .= '&amp;';
}
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$items = WoW_Items::GetItemsForTable($page, isset($_GET['classId']) ? $_GET['classId'] : -1, isset($_GET['subClassId']) ? $_GET['subClassId'] : -1, isset($_GET['invType']) ? $_GET['invType'] : -1);
$items_count = 0;
if(is_array($items)) {
    $items_count = $items['count'];
}
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
<li<?php echo $breadcrumb_nav == '' ? ' class="last"' : null; ?>>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/' . WoW_Locale::GetLocale() . '/item/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_items'); ?>
</a>
</li>
<?php echo $breadcrumb_nav; ?>
</ol>-->
</div>
<div class="content-bot">
	<div id="wiki" class="wiki directory wiki-item">
		<div class="title">
			<h2><?php echo WoW_Locale::GetString('template_menu_items'); ?></h2>
		</div>
		<div class="item-results" id="item-results">
	<div class="table-options">
			<div class="option">
	<ul class="ui-pagination">
                <?php
                $start = ($page - 1) * 50;
                $prev = $page - 1;
                $next = $page + 1;
                $total_pages = ceil($items_count / 50);
                $pagination = '';
                
                $display_min = (($page - 1) * 50) + 1;
                $display_max = min($page * 50, $items_count);
                
                if($page > 1) {
                    $pagination .= sprintf('<li class="cap-item">
                        <a href="%spage=%d">
                            %s
                        </a>
                    </li>
                ', $global_url, $prev, WoW_Locale::GetString('template_item_table_prev'));
                }
                if($total_pages <= 7) {
                    for($i = 1; $i <= $total_pages; ++$i) {
                        $pagination .= sprintf('
                        <li%s>
                            <a href="%spage=%d">
                            %d
                        </a>
                    </li>
                ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                    }
                }
                elseif($total_pages > 7) {
                    if($page < 7) {
                        for($i = 1; $i < 8; ++$i) {
                            $pagination .= sprintf('
                        <li%s>
                            <a href="%spage=%d">
                            %d
                        </a>
                    </li>
                ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                        }
                        $pagination .= sprintf('<li class="expander">…</li>
                        <li>
                            <a href="%spage=%d">
                            %d
                        </a>
                </li>
                ', $global_url, $total_pages, $total_pages);
                    }
                    elseif($total_pages - 6 > $page && $page > 6) {
                        $pagination .= sprintf('<li>
                        <a href="%spage=1">
                            1
                        </a>
                    </li>
                    <li class="expander">
                    …
                    </li>
                    ', $global_url);
                        for($i = ($page - 3); $i <= ($page + 3); ++$i) {
                            $pagination .= sprintf('
                        <li%s>
                            <a href="%spage=%d">
                            %d
                        </a>
                    </li>
                ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                        }
                        $pagination .= sprintf('<li class="expander">…</li><li><a href="%spage=%d">%d</a></li>', $global_url, $total_pages, $total_pages);
                    }
                    else {
                        $pagination .= sprintf('<li>
                        <a href="%spage=1">
                            1
                        </a>
                    </li>
                    <li class="expander">
                    …
                    </li>', $global_url);
                        for($i = $total_pages - 8; $i <= $total_pages; ++$i) {
                            $pagination .= sprintf('
                        <li%s>
                            <a href="%spage=%d">
                            %d
                        </a>
                    </li>
                ', $i == $page ? ' class="current"' : null, $global_url, $i, $i);
                        }
                    }
                }
                if($page < $total_pages) {
                    $pagination .= sprintf('<li class="cap-item">
                    <a href="%spage=%d">
                        %s
                    </a>
                </li>', $global_url, ($page + 1), WoW_Locale::GetString('template_item_table_next'));
                }
                if($total_pages > 1) {
                    echo $pagination;
                }
                ?>
	</ul>
			</div>
			<?php
            echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), $display_min, $display_max, isset($items['count']) ? $items['count'] : 0); ?>

	<span class="clear"><!-- --></span>
	</div>

			<div class="table full-width">
				<table>
					<thead>
						<tr>
							<th>	<span class="sort-tab"><?php echo WoW_Locale::GetString('template_item_table_name'); ?></span>
</th>
							<th>	<span class="sort-tab"><?php echo WoW_Locale::GetString('template_item_table_level'); ?></span>
</th>
							<th>	<span class="sort-tab"><?php echo WoW_Locale::GetString('template_item_table_required_level'); ?></span>
</th>
							<th>	<span class="sort-tab"><?php echo WoW_Locale::GetString('template_item_table_source'); ?></span>
</th>
							<th>	<span class="sort-tab"><?php echo WoW_Locale::GetString('template_item_table_type'); ?></span>
</th>
						</tr>
					</thead>
					<tbody>
                <?php
                if(is_array($items) && isset($items['items']) && is_array($items['items'])) {
                    $toggleStyle = 2;
                    foreach($items['items'] as $item) {
                        echo sprintf('
                            <tr class="row%d">
                                <td data-raw="0 %s">
                                    <a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" class="item-link color-q%d">
                                        <span  class="icon-frame frame-18 " style=\'background-image: url("http://eu.media.blizzard.com/wow/icons/18/%s.jpg");\'> </span>
                                        <strong>%s</strong>
                                        %s
                                        %s
                                    </a>
                                </td>
                                <td class="align-center">%d</td>
                                <td class="align-center" data-raw="1">%d</td>
                                <td>%s</td>
                                <td>%s</em></td>
                            </tr>', $toggleStyle % 2 ? 1 : 2, $item['name'], WoW::GetWoWPath(), $item['entry'], $item['Quality'], $item['icon'], $item['name'], 
                            $item['faction'] >= 0 ? sprintf('<span class="icon-faction-%d"></span>', $item['faction']) : null,
                            $item['heroic'] == 1 ? '<span class="icon-heroic-skull"></span>' : null,
                            $item['ItemLevel'], $item['RequiredLevel'], $item['source'], $item['type']);
                        ++$toggleStyle;
                    }
                }
                ?>

					</tbody>
				</table>
			</div>
	<div class="table-options">
			<div class="option">

	<ul class="ui-pagination">
				<?php
                if($total_pages > 1) {
                    echo $pagination;
                }
                ?>
	</ul>
			</div>
            <?php echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), $display_min, $display_max, isset($items['count']) ? $items['count'] : 0); ?>

	<span class="clear"><!-- --></span>
	</div>
		</div>
	

	<span class="clear"><!-- --></span>
	</div>
</div>
</div>
</div>
