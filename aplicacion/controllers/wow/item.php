<?php

/**
 * Copyright (C) 2011 Shadez <https://github.com/Shadez>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

class Item extends Controller {
    public function main() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::SetPageIndex('item_info');
        WoW_Template::SetPageData('page', 'item_info');
        WoW_Template::SetMenuIndex('menu-game');
        $url_data = WoW::GetUrlData('item');
        if(!$url_data) {
            if(!isset($_GET['t'])) {
                WoW_Template::ErrorPage(404);
            }
            exit;
        }
        $item_entry = $url_data['item_entry'];
        if($item_entry == 0) {
            $breadcrumbs = WoW_Items::GetBreadCrumbsForItem($_GET);
            WoW_Template::SetPageIndex('item_list');
            WoW_Template::SetPageData('body_class', 'item-index');
            WoW_Template::SetPageData('page', 'item_list');
            WoW_Template::SetPageData('breadcrumbs', $breadcrumbs);
            WoW_Template::SetPageData('last-crumb', is_array($breadcrumbs) ? $breadcrumbs[(sizeof($breadcrumbs))-1]['caption'] : WoW_Locale::GetString('template_menu_items'));
            WoW_Template::LoadTemplate('page_index');
            exit;
        }
        // Load proto
        $proto = new WoW_ItemPrototype();
        $proto->LoadItem($item_entry);
        if(!$proto->IsCorrect()) {
            if(!isset($_GET['t']) && (!isset($url_data['action0']) || $url_data['action0'] != 'tooltip')) {
                WoW_Template::ErrorPage(404);
            }
            exit;
        }
        WoW_Template::SetPageData('item_entry', $item_entry);
        // SSD and SSV data
        $ssd = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_ssd` WHERE `entry` = %d", $proto->ScalingStatDistribution);
        $ssd_level = MAX_PLAYER_LEVEL;
        if(isset($_GET['pl'])) {
            $ssd_level = (int) $_GET['pl'];
            if(is_array($ssd) && $ssd_level > $ssd['MaxLevel']) {
                $ssd_level = $ssd['MaxLevel'];
            }
        }
        $ssv = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_ssv` WHERE `level` = %d", $ssd_level);
        if(isset($_GET['t'])) {
            $url_data['tooltip'] = true;
        }
        if($url_data['tooltip'] == true) {
            WoW_Template::SetPageIndex('item_tooltip');
            WoW_Template::SetPageData('tooltip', true);
            WoW_Template::SetPageData('page', 'item_tooltip');
            WoW_Template::SetPageData('proto', $proto);
            WoW_Template::SetPageData('ssd', $ssd);
            WoW_Template::SetPageData('ssd_level', $ssd_level);
            WoW_Template::SetPageData('ssv', $ssv);
            WoW_Template::LoadTemplate('page_item_tooltip');
        }
        else {
            if(isset($url_data['action0']) && $url_data['action0'] != null) {
                WoW_Template::SetPageData('tab_type', $url_data['action0']);
                WoW_Template::LoadTemplate('page_item_tab');
                exit;
            }
            WoW_Template::SetPageIndex('item');
            WoW_Template::SetPageData('tooltip', false);
            WoW_Template::SetPageData('itemName', $proto->name);
            WoW_Template::SetPageData('page', 'item');
            WoW_Template::SetPageData('proto', $proto);
            WoW_Template::SetPageData('ssd', $ssd);
            WoW_Template::SetPageData('ssd_level', $ssd_level);
            WoW_Template::SetPageData('ssv', $ssv);
            WoW_Template::LoadTemplate('page_index');
        }
        unset($proto);
    }
}

?>
