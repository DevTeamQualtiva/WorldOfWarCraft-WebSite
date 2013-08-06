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

class Sidebar extends Controller {
    public function main() {
        if(!isset($this->m_actions['action3'])) {
            exit;
        }
        $exploded = explode('?', $this->m_actions['action3']);
        if($exploded) {
            $this->m_actions['action3'] = $exploded[0];
        }
        $this->m_actions['action3'] = str_replace(array('-', '.'), '_', $this->m_actions['action3']);
        switch($this->m_actions['action3']) {
            case 'auctions':
            case 'events':
            case 'forums':
            case 'friends':
            case 'guild_news':
            case 'sotd':
                $this->{'action_' . $this->m_actions['action3']}();
                break;
        }
    }
    
    public function action_auctions() {
        header('Content-type: text/xml');
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::LoadTemplate('character_auctions_page');
    }
    
    public function action_events() {
        return;
    }
    
    public function action_forums() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::LoadTemplate('page_forums_sidebar');
    }
    
    public function action_friends() {
        header('Content-type: text/xml');
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::LoadTemplate('character_friends_page');
    }
    
    public function action_guild_news() {
        if(!WoW_Account::IsLoggedIn()) {
            exit;
        }
        $guild_name = WoW_Account::GetActiveCharacterInfo('guildName');
        $guild_realm = WoW_Account::GetActiveCharacterInfo('realmId');
        if(!$guild_name || !$guild_realm) {
            exit;
        }
        if(!WoW_Guild::LoadGuild($guild_name, $guild_realm)) {
            exit;
        }
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::LoadTemplate('guild_news_page');
    }
    
    public function action_sotd() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::LoadTemplate('sotd_page');
    }
}

?>