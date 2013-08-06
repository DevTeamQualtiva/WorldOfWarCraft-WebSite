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
    public function GetTopTeams($format, $bg_id, $limit = 3, $offset = 0, $count = false) {
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
        $counter = 0;
        foreach($realms as $realmId) {
            DB::ConnectToDB(DB_CHARACTERS, $realmId);
            if(!DB::Characters()->TestLink()) {
                continue;
            }
            if(WoW::GetServerType($realmId) == SERVER_MANGOS) {
                if($count) {
                    $counter += DB::Characters()->selectCell("
                    SELECT COUNT(*)
                    FROM `arena_team` AS `a`
                    LEFT JOIN `arena_team_stats` AS `b` ON `b`.`arenateamid` = `a`.`arenateamid`
                    WHERE `a`.`type` = %d
                    AND `b`.`rank` > 0 AND `b`.`rank` < 4", $format);
                    continue;
                }
                $teams = DB::Characters()->select("SELECT
                `a`.`arenateamid` AS `id`,
                `a`.`rank`,
                `a`.`rating`,
                '%d' AS `realmId`,
                `b`.`type`
                FROM `arena_team_stats` AS `a`
                LEFT JOIN `arena_team` AS `b` ON `b`.`arenateamid` = `a`.`arenateamid`
                WHERE `a`.`rank` > 0 AND `a`.`rank` < 4 AND `b`.`type` = %d ORDER BY `rank`, `rating` LIMIT %d, %d", $realmId, $format, $offset, $limit);
            }
            else {
                $teams = DB::Characters()->select("SELECT `arenaTeamId` AS `id`, `rank`, `rating`, '%d' AS `realmId`, `type` FROM `arena_team` WHERE `rank` > 0 AND `rank` < 4 AND `type` = %d ORDER BY `rank`, `rating` LIMIT %d, %d", $realmId, $format, $offset, $limit);
            }
            if(!$teams) {
                continue;
            }
            $top_teams_data[] = array(
                'realmId' => $realmId,
                'teamsId' => $teams
            );
        }
        if($count) {
            return $counter;
        }
        // Find top 3 teams
        $top_teams = array();
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
        // Create objects
        $top_teams_objects = array();
        foreach($top_teams as &$team) {
            $top_teams_objects[] = new WoW_ArenaTeam($team['realmId'], '', $team['id']);
        }
        unset($top_teams, $top_teams_data, $team, $teams);
        return $top_teams_objects;
    }
}
?>