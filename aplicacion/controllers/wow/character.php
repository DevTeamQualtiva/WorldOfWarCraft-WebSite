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

class Character extends Controller {
    public function main() {
        WoW_Template::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE));
        WoW_Template::SetTemplateTheme('wow');
        $url_data = WoW::GetUrlData('character');
        if(!$url_data) {
            WoW_Template::SetPageIndex('404');
            WoW_Template::SetPageData('page', '404');
            WoW_Template::SetPageData('errorProfile', 'template_404');
        }
        else {
            if($url_data['action0'] == 'advanced') {
                // Set "wow.character.summary.view" cookie as "advanced"
                setcookie('wow.character.summary.view', 'advanced', strtotime('NEXT YEAR'), '/' . WoW::GetWoWPath() . '/character/');
            }
            elseif($url_data['action0'] == null && (isset($url_data['name']) && isset($url_data['realmName']))) {
                WoW::RedirectToCorrectProfilePage('simple');  //change to WoW::RedirectTo()?
            }
            elseif($url_data['action0'] == 'simple') {
                // Set "wow.character.summary.view" cookie as "simple"
                setcookie('wow.character.summary.view', 'simple', strtotime('NEXT YEAR'), '/' . WoW::GetWoWPath() . '/character/');
            }
            $load_result = WoW_Characters::LoadCharacter($url_data['name'], WoW_Utils::GetRealmIDByName($url_data['realmName']), true, true);
            if(!WoW_Characters::IsCorrect() || $load_result != 3) {
                if($url_data['action0'] == 'tooltip') {
                    exit;
                }
                if($load_result == 2) {
                    WoW_Template::SetPageData('errorProfile', 'template_lowlevel');
                }
                else {
                    WoW_Template::SetPageData('errorProfile', 'template_404');
                }
                WoW_Template::SetPageIndex('404');
                WoW_Template::SetPageData('page', '404');
            }
            else {
                WoW_Achievements::Initialize();
                WoW_Template::SetPageData('characterName', WoW_Characters::GetName());
                WoW_Template::SetPageData('characterRealmName', WoW_Characters::GetRealmName());
                switch($url_data['action0']) {
                    default:
                        WoW_Template::SetPageIndex('character_profile_simple');
                        WoW_Template::SetPageData('page', 'character_profile');
                        WoW_Characters::CalculateStats(true);
                        break;
                    case 'advanced':
                        WoW_Template::SetPageIndex('character_profile_advanced');
                        WoW_Template::SetPageData('page', 'character_profile');
                        WoW_Characters::CalculateStats(true);
                        break;
                    /*
                    case 'talent':
                        WoW_Template::SetPageIndex('character_talents');
                        WoW_Template::SetPageData('page', 'character_talents');
                        WoW_Template::SetPageData('talents', 'primary');
                        if($url_data['action1'] == 'secondary') {
                            WoW_Template::SetPageData('talents', 'secondary');
                        }
                        break;
                    */
                    case 'tooltip':
                        WoW_Template::LoadTemplate('page_character_tooltip');
                        exit;
                        break;
                    case 'achievement':
                        for($i = 2; $i > 0; $i--) {
                            if(isset($url_data['action' . $i]) && $url_data['action' . $i] != null) {
                                WoW_Achievements::SetCategoryForTemplate($url_data['action' . $i]);
                                WoW_Template::LoadTemplate('page_character_achievements');
                                exit;
                            }
                        }
                        WoW_Template::SetPageIndex('character_achievements');
                        WoW_Template::SetPageData('page', 'character_achievements');
                        break;
                    case 'reputation':
                        if(isset($url_data['action1']) && $url_data['action1'] == 'tabular') {
                            WoW_Template::SetPageIndex('character_reputation_tabular');
                        }
                        else {
                            WoW_Template::SetPageIndex('character_reputation');
                        }
                        WoW_Template::SetPageData('page', 'character_reputation');
                        WoW_Reputation::InitReputation(WoW_Characters::GetGUID());
                        break;
                    case 'pvp':
                        WoW_Template::SetPageIndex('character_pvp');
                        WoW_Template::SetPageData('page', 'character_pvp');
                        WoW_Characters::InitPvP();
                        break;
                    case 'statistic':
                        for($i = 2; $i > 0; $i--) {
                            if(isset($url_data['action' . $i]) && $url_data['action' . $i] != null) {
                                WoW_Achievements::SetCategoryForTemplate($url_data['action' . $i]);
                                WoW_Template::LoadTemplate('page_character_statistics');
                                exit;
                            }
                        }
                        WoW_Template::SetPageIndex('character_statistics');
                        WoW_Template::SetPageData('page', 'character_statistics');
                        break;
                    case 'feed':
                        WoW_Template::SetPageIndex('character_feed');
                        WoW_Template::SetPageData('page', 'character_feed');
                        break;
                    case 'companion':
                    case 'mount':
                        WoW_Template::SetPageIndex('character_companions_mounts');
                        WoW_Template::SetPageData('page', 'character_companions_mounts');
                        WoW_Template::SetPageData('category', $url_data['action0']);
                        WoW_Characters::InitMounts();
                        break;
                }
            }
        }
        WoW_Template::SetMenuIndex('menu-game');
        WoW_Template::LoadTemplate('page_index');
    }
}
?>
