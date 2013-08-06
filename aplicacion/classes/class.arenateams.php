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

class WoW_Arena {
    public function GetTopTeams($format, $bg_id) {
        if(!isset(WoWConfig::$BattleGroups[$bg_id])) {
            WoW_Log::WriteError('%s : battleGroupd #%d was not found!', __METHOD__, $bg_id);
            return false;
        }
        $realms = WoWConfig::$BattleGroups[$bg_id]['realms'];
        if(!$realms) {
            WoW_Log::WriteError('%s : no realms found for battleGroup #%d, using first available bg instead.', __METHOD__, $bg_id);
            $realms = WoWConfig::$BattleGroups[1]['realms'];
            if(!$realms) {
                WoW_Log::WriteError('%s : default BG has no realms, unable to continue.', __METHOD__);
                return false;
            }
        }
        $top_teams_data = array();
        foreach($realms as $realmId) {
            DB::ConnectToDB(DB_CHARACTERS, $realmId);
            if(!DB::Characters()->TestLink()) {
                continue;
            }
            $teams = DB::Characters()->select("SELECT `%s`, `rank`, `rating` FROM `arena_team` ORDER BY `rank` LIMIT 3", WoW::GetServerType($realmId) == SERVER_MANGOS ? 'arenateamid' : 'arenaTeamId');
            if(!$teams) {
                continue;
            }
            $top_teams_data[] = array(
                'realmId' => $realmId,
                'teamsId' => $teams
            );
        }
        // Find top 3 teams
        foreach($top_teams_data as &$teams) {
            foreach($teams['teamsId'] as &$team) {
                if(!isset($top_teams[$team['rank']])) {
                    $top_teams[$team['rank']] = $team;
                }
                if($top_teams[$team['rank']]['rating'] < $team['rating']) {
                    $top_teams[$team['rank']] = $team;
                }
            }
        }
        print_r($top_teams);
    }
}
?>