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

class WoW_ArenaTeam {
    private $m_realmId = 0;
    private $m_realmName = '';
    
    private $m_teamId = 0;
    private $m_teamType = 0;
    private $m_teamName = '';
    private $m_teamEmblem = array();
    private $m_teamCaptain = 0;
    private $m_teamFaction = -1;
    private $m_teamStats = array();
    private $m_teamMembers = array();
    
    private $m_teamURL = '';
    
    private $m_cacheMember = array();
    
    public function WoW_ArenaTeam($realmID, $teamName, $teamID = 0) {
        if(!isset(WoWConfig::$Realms[$realmID])) {
            WoW_Log::WriteError('%s : realm %d was not found!', __METHOD__, $realmID);
            return false;
        }
        if(!$teamName && $teamID <= 0) {
            WoW_Log::WriteError('%s : teamName must be a string!', __METHOD__);
            return false;
        }
        elseif($teamID > 0 && !$this->IsDBTeam($teamID)) {
            WoW_Log::WriteError('%s : team #%d was not found in DB!', __METHOD__, $teamID);
            return false;
        }
        DB::ConnectToDB(DB_CHARACTERS, $realmID);
        if(!DB::Characters()->TestLink()) {
            return false;
        }
        $this->m_teamId = $teamID;
        $this->m_teamName = $teamName;
        $this->m_realmId = $realmID;
        $this->m_realmName = WoWConfig::$Realms[$realmID]['name'];

        if($this->m_teamId == 0) {
            $this->m_teamId = DB::Characters()->selectCell("SELECT `arenateamid` FROM `arena_team` WHERE `name` = '%s'", $this->m_teamName);
        }
        $this->LoadTeam();
    }
    
    private function IsDBTeam(&$teamID) {
        return DB::Characters()->selectCell("SELECT 1 FROM `arena_team` WHERE `arenateamid` = %d", $teamID);
    }
    
    public function IsCorrect() {
        return $this->m_realmId > 0 && $this->m_teamName != '' && $this->m_teamId > 0;
    }
    
    private function LoadTeam() {
        switch(WoW::GetServerType($this->m_realmId)) {
            case SERVER_MANGOS:
                $this->LoadMaNGOS();
                break;
            case SERVER_TRINITY:
                $this->LoadTrinity();
                break;
            default:
                WoW_Log::WriteError('%s : unknown realm type: %d (realm ID: %d)', __METHOD__, WoW::GetServerType($this->m_realmId), $this->m_realmId);
                return false;
        }
        $this->m_teamURL = sprintf('%s/wow/%s/arena/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $this->GetTeamRealmName(), $this->GetTeamName());
        return true;
    }
    
    private function LoadMaNGOS() {
        $team = DB::Characters()->selectRow("
        SELECT
        `a`.*,
        `b`.*,
        `c`.`race`
        FROM `arena_team` AS `a`
        LEFT JOIN `arena_team_stats` AS `b` ON `b`.`arenateamid` = `a`.`arenateamid`
        LEFT JOIN `characters` AS `c` ON `c`.`guid` = `a`.`captainguid`
        WHERE `a`.`arenateamid` = %d", $this->m_teamId);
        if(!$team) {
            WoW_Log::WriteError('%s : team "%s" (%d) was not found in DB!', __METHOD__, $this->m_teamName, $this->m_teamId);
            return false;
        }
        // Fill class field
        $this->m_teamName = $team['name'];
        $this->m_teamId = $team['arenateamid'];
        
        $this->m_teamCaptain = $team['captainguid'];
        $this->m_teamEmblem = array(
            'bgColor' => $team['BackgroundColor'],
            'eStyle' => $team['EmblemStyle'],
            'eColor' => $team['EmblemColor'],
            'bStyle' => $team['BorderStyle'],
            'bColor' => $team['BorderColor']
        );
        $this->m_teamFaction = WoW_Utils::GetFactionId($team['race']);
        $this->m_teamStats = array(
            'rating' => $team['rating'],
            'games_week' => $team['games_week'],
            'games_season' => $team['games_season'],
            'wins_week' => $team['wins_week'],
            'wins_season' => $team['wins_season'],
            'loses_week' => $team['games_week'] - $team['wins_week'],
            'loses_season' => $team['games_season'] - $team['wins_season'],
            'rank' => $team['rank']
        );
        $this->m_teamType = $team['type'];
        
        // Load member list
        $members = DB::Characters()->select("
        SELECT
        `a`.`played_week`,
        `a`.`wons_week`,
        `a`.`played_season`,
        `a`.`wons_season`,
        (`a`.`played_week` - `a`.`wons_week`) AS `loses_week`,
        (`a`.`played_season` - `a`.`wons_season`) AS `loses_season`,
        `a`.`personal_rating`,
        `b`.`guid`,
        `b`.`name`,
        `b`.`class`,
        `b`.`race`,
        `b`.`gender`,
        `b`.`level`
        FROM `arena_team_member` AS `a`
        LEFT JOIN `characters` AS `b` ON `b`.`guid` = `a`.`guid`
        WHERE `a`.`arenateamid` = %d", $this->m_teamId);
        if(!$members) {
            WoW_Log::WriteError('%s : team "%s" (%d) has empty member list', __METHOD__, $this->m_teamName, $this->m_teamId);
            return false;
        }

        foreach($members as $member) {
            $this->m_teamMembers[] = array(
                'guid' => $member['guid'],
                'name' => $member['name'],
                'classId' => $member['class'],
                'class_text' => WoW_Locale::GetString('character_class_' . $member['class'], $member['gender']),
                'raceId' => $member['race'],
                'race_text' => WoW_Locale::GetString('character_race_' . $member['race'], $member['gender']),
                'factionId' => WoW_Utils::GetFactionId($member['race']),
                'faction_text' => WoW_Utils::GetFactionId($member['race']) == FACTION_ALLIANCE ? 'alliance' : 'horde',
                'genderId' => $member['gender'],
                'level' => $member['level'],
                'url' => sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $this->GetTeamRealmName(), $member['name']),
                'gamesWeek' => $member['played_week'],
                'winsWeek' => $member['wons_week'],
                'losesWeek' => $member['loses_week'],
                'gamesSeason' => $member['played_season'],
                'winsSeason' => $member['wons_season'],
                'losesSeason' => $member['loses_season'],
                'personalRating' => $member['personal_rating'],
                'teamId' => $this->m_teamId,
                'matchMakerRating' => 0 // TC field, for compatibility
            );
        }
        unset($members, $member, $team);
        // Loaded successfully
        return true;
    }
    
    private function LoadTrinity(&$team) {
        $team = DB::Characters()->selectRow("
        SELECT
        `a`.*,
        `b`.`race`
        FROM `arena_team` AS `a`
        LEFT JOIN `characters` AS `b` ON `b`.`guid` = `a`.`captainguid`
        WHERE `a`.`arenaTeamId` = %d", $this->m_teamId);
        if(!$team) {
            WoW_Log::WriteError('%s : team "%s" (%d) was not found in DB!', __METHOD__, $this->m_teamName, $this->m_teamId);
            return false;
        }
        // Fill class field
        $this->m_teamName = $team['name'];
        $this->m_teamId = $team['arenaTeamId'];
        
        $this->m_teamCaptain = $team['captainGuid'];
        $this->m_teamEmblem = array(
            'bgColor' => $team['backgroundColor'],
            'eStyle' => $team['emblemStyle'],
            'eColor' => $team['emblemColor'],
            'bStyle' => $team['borderStyle'],
            'bColor' => $team['borderColor']
        );
        $this->m_teamFaction = WoW_Utils::GetFactionId($team['race']);
        $this->m_teamStats = array(
            'rating' => $team['rating'],
            'games_week' => $team['weekGames'],
            'games_season' => $team['seasonGames'],
            'wins_week' => $team['weekWins'],
            'wins_season' => $team['seasonWins'],
            'loses_week' => $team['weekGames'] - $team['weekWins'],
            'loses_season' => $team['seasonGames'] - $team['seasonWins'],
            'rank' => $team['rank']
        );
        $this->m_teamType = $team['type'];
        
        // Load member list
        $members = DB::Characters()->select("
        SELECT
        `a`.`weekGames`,
        `a`.`weekWins`,
        `a`.`seasonGames`,
        `a`.`seasonWins`,
        (`a`.`weekGames` - `a`.`weekWins`) AS `loses_week`,
        (`a`.`seasonGames` - `a`.`seasonWins`) AS `loses_season`,
        `a`.`personalRating`,
        `b`.`guid`,
        `b`.`name`,
        `b`.`class`,
        `b`.`race`,
        `b`.`gender`,
        `b`.`level`
        FROM `arena_team_member` AS `a`
        LEFT JOIN `characters` AS `b` ON `b`.`guid` = `a`.`guid`
        WHERE `a`.`arenateamid` = %d", $this->m_teamId);
        if(!$members) {
            WoW_Log::WriteError('%s : team "%s" (%d) has empty member list', __METHOD__, $this->m_teamName, $this->m_teamId);
            return false;
        }

        foreach($members as $member) {
            $this->m_teamMembers[] = array(
                'guid' => $member['guid'],
                'name' => $member['name'],
                'classId' => $member['class'],
                'class_text' => WoW_Locale::GetString('character_class_' . $member['class'], $member['gender']),
                'raceId' => $member['race'],
                'race_text' => WoW_Locale::GetString('character_race_' . $member['race'], $member['gender']),
                'factionId' => WoW_Utils::GetFactionId($member['race']),
                'faction_text' => WoW_Utils::GetFactionId($member['race']) == FACTION_ALLIANCE ? 'alliance' : 'horde',
                'genderId' => $member['gender'],
                'level' => $member['level'],
                'url' => sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $this->GetTeamRealmName(), $member['name']),
                'gamesWeek' => $member['weekGames'],
                'winsWeek' => $member['weekWins'],
                'losesWeek' => $member['loses_week'],
                'gamesSeason' => $member['seasonGames'],
                'winsSeason' => $member['seasonWins'],
                'losesSeason' => $member['loses_season'],
                'personalRating' => $member['personalRating'],
                'teamId' => $this->m_teamId,
                'matchMakerRating' => DB::Characters()->selectCell("SELECT `matchMakerRating` FROM `character_arena_stats` WHERE `guid` = %d AND `slot` = %d", $member['guid'], $this->m_teamType)
            );
        }
        unset($members, $member, $team);
        // Loaded successfully
        return true;
    }
    
    public function GetTeamName() {
        return $this->m_teamName;
    }
    
    public function GetTeamID() {
        return $this->m_teamId;
    }
    
    public function GetTeamURL() {
        return $this->m_teamURL;
    }
    
    public function GetTeamRealmName() {
        return $this->m_realmName;
    }
    
    public function GetTeamMembers() {
        return $this->m_teamMembers;
    }
    
    public function GetMember($guid = 0) {
        if($guid == 0) {
            $guid = WoW_Characters::GetGUID();
        }
        if(isset($this->m_cacheMember[$guid])) {
            return $this->m_cacheMember[$guid];
        }
        foreach($this->m_teamMembers as $member) {
            if($member['guid'] == $guid) {
                $this->m_cacheMember[$guid] = $member;
                return $this->m_cacheMember[$guid];
            }
        }
        return null;
    }
    
    public function GetTeamStats() {
        return $this->m_teamStats;
    }
    
    public function GetTeamEmblem() {
        return $this->m_teamEmblem;
    }
    
    public function GetTeamFaction() {
        return $this->m_teamFaction;
    }
    
    public function GetTeamType() {
        return $this->m_teamType;
    }
    
    public function GetTeamRank() {
        return $this->m_teamStats['rank'];
    }
    
    public function GetTeamRating() {
        return $this->m_teamStats['rating'];
    }
}
?>