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

class AchievementStorage extends WoW_DBStorage {
    public $m_fields = array(
        'id' => array('type' => 'integer', 'alias' => 'entry'),
        'factionFlag' => array('type' => 'integer'),
        'parentAchievement' => array('type' => 'integer'),
        'name' => array('locale' => true),
        'description' => array('locale' => true),
        'categoryId' => array('type' => 'integer'),
        'points' => array('type' => 'integer'),
        'OrderInCategory' => array('type' => 'integer'),
        'flags' => array('type' => 'integer'),
        'iconID' => array('type' => 'integer'),
        'iconname' => array('type' => 'integer'),
        'titleReward' => array('locale' => true)
    );

    public function InitStorage() {
        $this->m_storageName = DB::WoW()->GetDatabaseInfo('prefix') . '_achievement';
        $this->m_storageIndex = 'id';
        $this->m_db = DB::WoW();
    }
}
?>