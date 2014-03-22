<?php

/**
 * Copyright (C) 2011 - 2014 Apocalypsecore <https://Apocalypsecore.tk>
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

/**
 * This class introduces simple ORM (Object Related Mapping) feature.
 * To use this, you should create new storage class with some options included:
 *  - fields list (table fields, see examples (/aplicacion/storages/*.php))
 *  - storage (table) name
 *  - storage (table) index field
 *  - database hanler
 * If you want to find all achievements with `factionFlag` = 1, you should do this:
 *  $achievement = new AchievementStorage();
 *  $achievement->SetSearchQuery(array('factionFlag' => -1))->FindEntry();
 *  print_r($achievement->GetData()); // will print all found data
 * If you want to find achievement with `id` = 6, you should do this:
 *  $achievement = new AchievementStorage();
 *  $achievement->FindEntry(6);
 *  print_r($achievement->GetData()); // will print all found data
 *  // or you can just simple write:
 *  echo 'Achievement #' . $achievement->id . ' name is "' . $achievement->name . '".'; // Will print 'Achievement #6 name is "Level 10".'
 **/
class WoW_DBStorage {
    /**
     * Table fields, must be defined in inherited class
     **/
    public $m_fields = array();
    
    /**
     * Table name
     **/
    protected $m_storageName = null;
    /**
     * Table index (default search row)
     **/
    protected $m_storageIndex = '';
    
    /**
     * Item entry (id to find)
     **/
    protected $m_entry = 0;
    
    /**
     * Search result
     **/
    protected $m_data = array();
    
    /**
     * Database link, must be defined in child InitStorage() method!
     **/
    protected $m_db = null;
    
    /**
     * WoW DB locale (_en, _ru, etc.), defined at object creation
     **/
    protected $m_locale = '';
    
    /**
     * World DB Locale ID (_loc1, _loc8, etc), defined at object creation, must be > 0
     **/
    protected $m_dbLocale = 0;
    
    /**
     * Advanced search options
     **/
    protected $m_searchOptions = array();
    
    /**
     * Use options or not, will be changed to 'true' in SetSearchOptions()
     **/
    protected $m_useOptions = false;
    
    /**
     * SQL Query data (query with parameters), generated automatically
     **/
    private $m_sqlData = array();
    
    /**
     * Class constructor, defines locale and inits storage
     **/
    public function __construct() {
        $this->m_locale = WoW_Locale::GetLocale();
        $this->m_dbLocale = WoW_Locale::GetLocaleID();
        $this->InitStorage();
        return true;
    }
    
    /**
     * Defines database, storage name and index. MUST BE re-defined in child class!
     **/
    protected function InitStorage() {
        exit;
    }
    
    /**
     * Returns data from search query
     **/
    public function GetData() {
        return $this->m_data;
    }
    
    /**
     * Some actions that will be executed before data loading, should be re-defined in child class (if required).
     **/
    protected function BeforeLoad() { return $this; }
    
    /**
     * Some actions that will be executed after data loading.
     * If you will re-define it in child class, add parent::AfterLoad(); in your method!
     **/
    protected function AfterLoad()  {
        $keys = array_keys($this->m_fields);
        // Find first field's alias
        if(isset($this->m_fields[$keys[0]]['alias']))
            $keys[0] = $this->m_fields[$keys[0]]['alias']; // Found, set as primary
        if(isset($this->m_data[$keys[0]]) && !is_array($this->m_data[$keys[0]])) {
            foreach($this->m_fields as $name => $field) {
                if(is_array($field) && isset($field['alias']))
                    $name = $field['alias'];
                $this->{$name} = $this->m_data[$name];
            }
        }
        unset($keys, $name, $field);
        return $this;
    }
    
    /**
     * Sets search options. Options must be sent as array:
     *  array('fieldName' => fieldValue, 'field2Name' => field2Value)
     **/
    public function SetSearchOptions($options) {
        if (!is_array($options)) {
            return false;
        }
        $this->m_searchOptions = $options;
        $this->m_useOptions = true;
        return $this;
    }
    
    /**
     * MUST BE called as last method in chain!
     * 
     * $achievement = new AchievementStorage();
     * $achievement->SetSearchOptions('factionFlag' => -1)->FindEntry();
     * 
     * or just
     * 
     * $achievement = new AchievementStorage();
     * $achievement->FindEntry();
     **/
    public function FindEntry($entry = 0) {
        $this->BeforeLoad();
        if((!$this->m_storageIndex && !$this->m_searchOptions) || !$this->m_storageName) {
            WoW_Log::WriteError('%s : fatal error: storage name or storage index was not defined!', __METHOD__);
            return false;
        }
        $this->m_entry = $entry;
        $sql_query = array(
            'query' => 'SELECT',
            'data' => array()
        );
        if(is_array($this->m_searchOptions) && $this->m_useOptions) {
            $this->AssignSearchData($sql_query)->SetSqlData($sql_query)->select();
        }
        else {
            $this->ParseFields($sql_query);
            $sql_query['query'] .= ' WHERE `' . $this->m_storageIndex . '` = \'%s\'';
            $sql_query['data'] = array($this->m_entry);
            $this->SetSqlData($sql_query)->selectRow();
        }        
        return $this->AfterLoad();
    }
    
    /**
     * Executes "selectRow" method of $this->m_db object.
     **/
    protected function selectRow() {
        if(!is_object($this->m_db) || !method_exists($this->m_db, 'selectRow'))
            return $this;
        $this->m_data = call_user_func_array(array($this->m_db, 'selectRow'), $this->m_sqlData);
        return $this;
    }
    
    /**
     * Executes "select" method of $this->m_db object.
     **/
    protected function select() {
        if(!is_object($this->m_db) || !method_exists($this->m_db, 'select'))
            return $this;
        $this->m_data = call_user_func_array(array($this->m_db, 'select'), $this->m_sqlData);
        return $this;
    }
    
    /**
     * Generates $this->m_sqlData array
     **/
    private function SetSqlData($sql_query) {
        $this->m_sqlData = array($sql_query['query']);
        foreach($sql_query['data'] as $element) {
            $this->m_sqlData[] = $element;
        }
        return $this;
    }
    
    /**
     * Assigns search options
     **/
    private function AssignSearchData(&$query) {
        $this->ParseFields($query)
             ->ParseSearchOptions($query);
        return $this;
    }
    
    /**
     * Performs search options parsing
     **/
    private function ParseSearchOptions(&$query) {
        $query['query'] .= ' WHERE';
        $count = count($this->m_searchOptions);
        $current = 1;
        foreach($this->m_searchOptions as $table => $value) {
            if(!is_string($table)) {
                WoW_Log::WriteLog('%s : skipping index "%s"', __METHOD__, $table);
                ++$current;
                continue;
            }
            if(!isset($this->m_fields[$table])) {
                WoW_Log::WriteLog('%s : unknown field "%s" in "%s" storage, ignore.', __METHOD__, $table, $this->m_storageName);
                continue;
            }
            $query['query'] .= ' `' . $this->GetAppropriateFieldName($table) . '` = \'%s\'';
            $query['data'][] = $value;
            if($current < $count) {
                $query['query'] .= ' AND';
            }
            ++$current;
        }
        return $this;
    }
    
    /**
     * Returns correct table name
     **/
    private function GetAppropriateFieldName($f) {
        foreach($this->m_fields as $name => &$field) {
            if(!is_string($name)) {
                continue;
            }
            if($f == $name) {
                if(isset($field['locale']) && $field['locale'] == true) {
                    return $name . '_' . $this->m_locale;
                }
                elseif(isset($field['dbLocale']) && $field['dbLocale'] == true) {
                    return $name . '_loc' . $this->m_dbLocale;
                }
                else {
                    return $name;
                }
            }
        }
        return $f;
    }
    
    /**
     * Performs model fields parsing
     **/
    private function ParseFields(&$query) {
        if(!$this->m_fields) {
            WoW_Log::WriteError('%s : no fields were found for Model "%s"!', __METHOD__, $this->m_storageName);
            return false;
        }
        $count = count($this->m_fields);
        $current = 0;
        $query['query'] .= ' ';
        foreach($this->m_fields as $name => $field) {
            if(!is_string($name) && (is_array($field))) {
                WoW_Log::WriteLog('%s : skipping index "%s"', __METHOD__, $name);
                ++$current;
                continue;
            }
            elseif(isset($field['locale']) && $field['locale']) {
                $query['query'] .= '`' . $name . '_' . $this->m_locale . '` AS `' . $this->FieldAlias($field, $name) . '`';
            }
            elseif(isset($field['dbLocale']) && $field['dbLocale']) {
                $query['query'] .= '`' . $name . '_loc' . $this->m_dbLocale . '` AS `' . $this->FieldAlias($field, $name) . '`';
            }
            elseif(isset($field['alias'])) {
                $query['query'] .= '`' . $name . '` AS `' . $field['alias'] . '`';
            }
            else {
                $query['query'] .= '`' . $name . '`';
            }
            ++$current;
            if($current < $count) {
                $query['query'] .= ', ';
            }
        }
        $query['query'] .= ' FROM `' . $this->m_storageName . '`';
        return $this;
    }
    
    /**
     * Returns table alias (if exists)
     **/
    private function FieldAlias(&$field, $name) {
        if(isset($field['alias'])) {
            return $field['alias'];
        }
        return $name;
    }
    
    /**
     * Joins one or more storages into one.
     * Usage:
     *  $ach = new AchievementStorage();
     *  $ach->FindEntry(6)->Join('CharacterAchievementStorage', 6, 'achievement');   
     **/
    public function Join($storage_name, $storage_entry, $storage_index = '') {
        $storage = new $storage_name();
        if(!$storage) {
            WoW_Log::WriteError('%s : storage %s was not found, unable to perform joining!', __METHOD__, $storage_name);
            return false;
        }
        if($storage_index != '') {
            $storage->SetSearchOptions(array($storage_index => $storage_entry))->FindEntry();
        }
        else {
            $storage->FindEntry($storage_entry);
        }
        $db_data = $storage->GetData();
        $data = array();
        $i = 0;
        if(is_array($db_data)) {
            foreach($db_data as $field => $value) {
                if(is_array($value)) {
                    foreach($value as $key => $val) {
                        $data[$i][$key] = $val;
                    }
                    ++$i;
                }
                else {
                    $data[$field][$value];
                }
            }
        }
        $tmp = array();
        foreach($data as $index => $value) {
            if(is_Array($value)) {
                $tmp = array();
                foreach($value as $key => $val) {
                    $tmp[$key] = $val;
                }
                $this->m_data[] = $tmp;
            }
            else {
                if(isset($this->m_data[$index])) {
                    $index .= '_' . $storage_name;
                }
                $this->m_data[$index] = $value;
            }
        }
        return $this;
    }
}
?>
