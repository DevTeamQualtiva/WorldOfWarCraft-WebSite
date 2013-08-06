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

class Faction extends Controller {
    public function main() {
        WoW_Template::SetPageData('body_class', sprintf('%s  faction-index expansion-3', WoW_Locale::GetLocale(LOCALE_DOUBLE)));
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::SetPageIndex('faction');
        WoW_Template::SetPageData('page', 'faction');
        $url_data = WoW::GetUrlData('faction');
        if(isset($url_data['action2']) && $url_data['action2'] != null) {
            exit; // [PH]
        }
        if(isset($url_data['action1']) && $url_data['action1'] != null) {
            // Try to find zone
            if(WoW_Game::IsZone($url_data['action1'])) {
                WoW_Template::SetPageIndex('zone');
                WoW_Template::SetPageData('page', 'zone');
                WoW_Game::LoadZone($url_data['action1']); // save in memory
            }
        }
        WoW_Template::SetMenuIndex('menu-game');
        WoW_Template::LoadTemplate('page_index');
    }
}
?>