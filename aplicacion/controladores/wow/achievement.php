<?php

/**
 * Copyright (C) 2011 - 2013 Apocalypsecore <https://apocalypsecore.tk>
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

class Achievement extends Controller {
    public function main() {
        if(!isset($this->m_actions['action3']) || !isset($this->m_actions['action4'])) {
            WoW_Template::ErrorPage(404);
            exit;
        }
        $ach_id = (int) $this->m_actions['action3'];
        $isTooltip = $this->m_actions['action4'] == 'tooltip' ? true : false;
        if(!$isTooltip || !$ach_id) {
            WoW_Template::ErrorPage(404);
            exit;
        }
        $ach = WoW_Achievements::GetAchievement($ach_id);
        header('Content-type: text/xml');
        echo '<div class="wiki-tooltip">
            <span  class="icon-frame frame-56 " style=\'background-image: url("http://eu.media.blizzard.com/wow/icons/56/' . $ach['iconname'] . '.jpg");\'></span>
            <h3>
                <span class="float-right color-q0">' . $ach['points'] . ' очков</span>' . $ach['name'] . '
            </h3>
            <span class="color-tooltip-yellow">' . $ach['desc'] . '</span>
        </div>';
    }
}
?>