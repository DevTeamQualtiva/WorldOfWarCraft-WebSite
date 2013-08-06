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

class Game extends Controller {
    public function main() {
        WoW_Template::SetPageData('body_class', sprintf('%s  game-index', WoW_Locale::GetLocale(LOCALE_DOUBLE)));
        WoW_Template::SetTemplateTheme('wow');
        $url_data = WoW::GetUrlData('game');
        if(empty($url_data['action1'])) {
            WoW_Template::SetPageIndex('game');
            WoW_Template::SetPageData('page', 'game');
        }
        elseif($url_data['action1'] == 'guide') {
            switch($url_data['action2']) {
                case 'getting-started':
                case 'how-to-play':
                case 'playing-together':
                case 'late-game':
                    WoW_Template::SetPageIndex('game_guide_' . str_replace('-', '_', $url_data['action2']));
                    WoW_Template::SetPageData('body_class', 'game-guide-' . $url_data['action2']);
                    WoW_Template::SetPageData('page', 'game_guide_' . str_replace('-', '_', $url_data['action2']));
                    break;
                default:
                    WoW_Template::SetPageIndex('game_guide_what_is_wow');
                    WoW_Template::SetPageData('body_class', 'game-guide-what-is-wow');
                    WoW_Template::SetPageData('page', 'game_guide_what_is_wow');
                    break;                
            }
        }
        elseif($url_data['action1'] == 'race') {
            $race_id = WoW_Utils::GetRaceIDByKey($url_data['action2']);
            if($race_id > 0) {
                WoW_Game::LoadRace($race_id);
                WoW_Template::SetPageIndex('game_race');
                WoW_Template::SetPageData('body_class', 'race-' . $url_data['action2']);
                WoW_Template::SetPageData('race', $url_data['action2']);
                WoW_Template::SetPageData('page', 'game_race');
                WoW_Template::SetPageData('raceId', $race_id);
            }
            else {
                WoW_Template::SetPageIndex('game_race_index');
                WoW_Template::SetPageData('body_class', 'game-race-index');
                WoW_Template::SetPageData('page', 'game_race_index');
            }
        }
        elseif($url_data['action1'] == 'class') {
            $class_id = WoW_Utils::GetClassIDByKey($url_data['action2']);
            if($class_id > 0) {
                WoW_Game::LoadClass($class_id);
                WoW_Template::SetPageIndex('game_class');
                WoW_Template::SetPageData('body_class', 'class-' . $url_data['action2']);
                WoW_Template::SetPageData('class', $url_data['action2']);
                WoW_Template::SetPageData('classId', $class_id);
                WoW_Template::SetPageData('page', 'game_class');
            }
            else {
                WoW_Template::SetPageIndex('game_class_index');
                WoW_Template::SetPageData('body_class', 'game-classes-index');
                WoW_Template::SetPageData('page', 'game_class_index');
            }
        }
        else {
            WoW_Template::ErrorPage(404);
        }
        WoW_Template::SetMenuIndex('menu-game');
        WoW_Template::LoadTemplate('page_index');
    }
}

?>