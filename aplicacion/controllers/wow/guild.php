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

class Guild extends Controller {
    public function main() {
        WoW_Template::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE));
        WoW_Template::SetTemplateTheme('wow');
        $url_data = WoW::GetUrlData('guild');
        $guild_error = false;
        if(!$url_data) {
            WoW_Template::ErrorPage(404);
        }
        elseif(!WoW_Guild::LoadGuild($url_data['name'], WoW_Utils::GetRealmIDByName($url_data['realmName']))) {
            WoW_Template::ErrorPage(404);
        }
        else {
            $primary = WoW_Account::GetActiveCharacter();
            WoW_Template::SetPageData('guild-authorized', false);
            if(is_array($primary) && isset($primary['realmName'])) {
                if($primary['realmName'] == WoW_Guild::GetGuildRealmName() && $primary['guildId'] == WoW_Guild::GetGuildID()) {
                    WoW_Template::SetPageData('guild-authorized', true);
                }
            }
            switch($url_data['action0']) {
                default:
                    WoW_Template::SetPageData('guild-page', 'summary');
                    WoW_Template::SetPageIndex('guild_page');
                    WoW_Template::SetPageData('page', 'guild_page');
                    break;
                case 'perk':
                    WoW_Template::SetPageData('guild-page', 'perks');
                    WoW_Template::SetPageIndex('guild_perks');
                    WoW_Template::SetPageData('page', 'guild_perks');
                    break;
                case 'roster':
                    switch($url_data['action1']) {
                        default:
                            WoW_Template::SetPageIndex('guild_roster');
                            WoW_Template::SetPageData('page', 'guild_roster');
                            break;
                        case 'professions':
                            WoW_Guild::InitProfessions();
                            WoW_Template::SetPageIndex('guild_professions');
                            WoW_Template::SetPageData('page', 'guild_professions');
                            break;
                    }
                    WoW_Template::SetPageData('guild-page', 'roster');
                    break;
            }
            WoW_Template::SetPageData('guildName', $url_data['name']);
            WoW_Template::SetPageData('realmName', $url_data['realmName']);
            WoW_Template::SetMenuIndex('menu-game');
        }
        WoW_Template::LoadTemplate('page_index');
    }
}

?>