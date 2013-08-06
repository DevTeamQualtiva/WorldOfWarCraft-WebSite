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

class Pvp extends Controller {
    public function main() {
        if(!isset($this->m_actions['action3'])) {
            $this->m_actions['action3'] = 'arena';
        }
        WoW_Template::SetTemplateTheme('wow');
        switch($this->m_actions['action3']) {
            default:
            case 'arena':
                if(isset($this->m_actions['action4']) && $this->m_actions['action4'] != null) {
                    // Try to find BG with provided name
                    $bg_found = false;
                    foreach(WoWConfig::$BattleGroups as &$bg) {
                        if(mb_strtolower($bg['name']) == mb_strtolower(urldecode($this->m_actions['action4']))) {
                            // BG was found
                            $bg_found = true;
                            WoW_Template::SetPageData('activeBG', mb_strtolower($bg['name']));
                            WoW_Template::SetPageData('bg', $bg);
                        }
                    }
                    if(!$bg_found) {
                        WoW_Template::ErrorPage(404);
                        return false;
                    }
                    WoW_Template::SetPageIndex('pvp_arena_ladder');
                    WoW_Template::SetPageData('page', 'pvp_arena_ladder');
                    // Set team format
                    if(!isset($this->m_actions['action4']) || $this->m_actions['action4'] == null) {
                        $this->m_actions['action4'] = '2v2';
                        WoW_Template::SetPageData('teamFormat', 2);
                        WoW_Template::SetPageData('teamFormatS', '2v2');
                    }
                    else {
                        $format = substr($this->m_actions['action5'], 0, 1);
                        if(!in_array($format, array('2', '3', '5'))) {
                            $format = 2;
                        }
                        WoW_Template::SetPageData('teamFormat', $format);
                        WoW_Template::SetPageData('teamFormatS', $format . 'v' . $format);
                    }
                }
                else {
                    WoW_Template::SetPageIndex('pvp_arena');
                    WoW_Template::SetPageData('page', 'pvp_arena');
                }
                WoW_Template::LoadTemplate('page_index');
                break;
            case 'trending':
                break;
        }
    }
}
?>