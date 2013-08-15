<?php

/**
 * Copyright (C) 2010-2011 Shadez <https://github.com/Shadez>
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

class WoW_Cacher {
    const CACHE_EXT = '.wcf';
    const CACHE_DAT_EXT = '.wcdf';
    const SECTION_DELIMITER = '|wcd|';
    const DATA_DELIMITER = '|=|';
    private $m_pageId = '';
    private $m_cacheType = 0;
    private $m_pageUrl = '';
    private $m_cacheTimestamp = 0;
    private $m_cacheFile = '';
    private $m_cacheRawContents = null;
    private $m_cacheDataRawContents = null;
    private $m_cacheContents = null;
    private $m_cacheDataContents = null;

    public function __construct($pageId, $type) {
        return $this->SetData($pageId, $type);
    }

    public function SetData($pageId, $type) {
        $this->free();
        $this->m_pageId = $pageId;
        $this->m_cacheType = $type;
        if ($this->cacheAvailable()) {
            $data = $this->rebuildFromCache();
            return true;
        }
        $this->setTimestamp()->save();
        return $this;
    }

    public function writeCacheSection($section, $value) {
        $section = strtoupper($section);
        $this->m_cacheContents[$section] = array(
            'section' => $section,
            'value' => $value
        );
        return $this;
    }

    public function writeDataSection($section, $value) {
        $section = strtoupper($section);
        $this->m_cacheDataContents[$section] = array(
            'section' => $section,
            'value' => $value
        );
        return $this;
    }

    public function free() {
        $this->m_pageId = '';
        $this->m_cacheType = 0;
        $this->m_pageUrl = '';
        $this->m_cacheTimestamp = 0;
        $this->m_cacheFile = '';
        $this->m_cacheRawContents = null;
        $this->m_cacheDataRawContents = null;
        $this->m_cacheContents = null;
        $this->m_cacheDataContents = null;
        return true;
    }
    
    public function save() {
        return $this->writeCache()->writeCacheData();
    }

    private function cacheAvailable() {
        $this->m_cacheFile = $this->getCacheDirectory() . $this->m_pageId;
        if (!file_exists($this->m_cacheFile . self::CACHE_EXT)) {
            return false;
        }
        $this->getCache()->getCacheData();
        if(!$this->m_cacheDataContents) {
            return false;
        }
        $creation_stamp = $this->readDataSection('timestamp');
        if(!$creation_stamp || (($creation_stamp + WoWConfig::$CacheLifeTime) < time())) {
            $this->dropCache();
            return false;
        }
        return true;
    }

    private function dropCache() {
        if(!$this->m_cacheFile) {
            return false;
        }
        @unlink($this->m_cacheFile . self::CACHE_EXT);
        @unlink($this->m_cacheFile . self::CACHE_DAT_EXT);
        return true;
    }

    public function readDataSection($section) {
        $section = strtoupper($section);
        if(isset($this->m_cacheDataContents[$section]) && $this->m_cacheDataContents[$section]['section'] == $section) {
            return isset($this->m_cacheDataContents[$section]['value']) ? $this->m_cacheDataContents[$section]['value'] : null;
        }
        return null;
    }

    public function readCacheSection($section) {
        $section = strtoupper($section);
        if(isset($this->m_cacheContents[$section]) && $this->m_cacheContents[$section]['section'] == $section) {
            return isset($this->m_cacheContents[$section]['value']) ? $this->m_cacheContents[$section]['value'] : null;
        }
        return null;
    }

    private function getCacheDirectory() {
        switch($this->m_cacheType) {
            case CACHE_TYPE_CHARACTER_SIMPLE:
                $dir = 'characters' . DS . 'simple' . DS;
                break;
            case CACHE_TYPE_CHARACTER_ADVANCED:
                $dir = 'characters' . DS . 'advanced' . DS;
                break;
            case CACHE_TYPE_CHARACTER_ACHIEVEMENTS:
                $dir = 'characters' . DS . 'achievements' . DS;
                break;
            case CACHE_TYPE_ITEM:
                $dir = 'items' . DS;
                break;
            default:
                $dir = 'default' . DS;
                break;
        }
        $today = strtotime('TODAY 00:00:00');
        $full_dir = CACHE_DIR . $dir . $today;
        if (!is_dir($full_dir)) {
            mkdir($full_dir);
        }
        return $full_dir . DS;
    }

    private function rebuildFromCache() {
        return $this->m_cacheRawContents;
    }

    private function writeCacheData() {
        $data = '';
        if($this->m_cacheDataContents) {
            foreach($this->m_cacheDataContents as &$section) {
                if(!is_array($section) || !isset($section['section']) || !isset($section['value'])) {
                    continue;
                }
                $data .= $section['section'] . self::DATA_DELIMITER . $section['value'] . self::SECTION_DELIMITER;
            }
        }
        $this->m_cacheDataRawContents = $data;
        @file_put_contents($this->m_cacheFile . self::CACHE_DAT_EXT, $data);
        return $this;
    }

    private function writeCache() {
        $data = '';
        if($this->m_cacheContents) {
            foreach($this->m_cacheContents as &$section) {
                if(!is_array($section) || !isset($section['section']) || !isset($section['value'])) {
                    continue;
                }
                $data .= $section['section'] . self::DATA_DELIMITER . $section['value'] . self::SECTION_DELIMITER;
            }
        }
        $this->m_cacheRawContents = $data;
        @file_put_contents($this->m_cacheFile . self::CACHE_EXT, $data);
        return $this;
    }
    
    public function cache() {
        return $this->m_cacheRawContents;
    }
    
    public function cacheData() {
        return $this->m_cacheDataRawContents;
    }

    public function cacheSections() {
        return $this->m_cacheContents;
    }

    public function dataSections() {
        return $this->m_cacheDataContents;
    }

    private function getCacheData() {
        $this->m_cacheDataRawContents = file_get_contents($this->m_cacheFile . self::CACHE_DAT_EXT);
        if(!$this->m_cacheDataRawContents) {
            return $this;
        }
        $this->m_cacheDataContents = explode(self::SECTION_DELIMITER, $this->m_cacheDataRawContents);
        if($this->m_cacheDataContents) {
            $data = array();
            foreach($this->m_cacheDataContents as $content) {
                $tmp = explode(self::DATA_DELIMITER, $content);
                if($tmp && isset($tmp[0], $tmp[1])) {
                    $data[$tmp[0]] = array('section' => $tmp[0], 'value' => $tmp[1]);
                }
            }
            $this->m_cacheDataContents = $data;
        }
        return $this;
    }

    private function getCache() {
        $this->m_cacheRawContents = file_get_contents($this->m_cacheFile . self::CACHE_EXT);
        if(!$this->m_cacheRawContents) {
            return $this;
        }
        $this->m_cacheContents = explode(self::SECTION_DELIMITER, $this->m_cacheRawContents);
        if($this->m_cacheContents) {
            $data = array();
            foreach($this->m_cacheContents as $content) {
                $tmp = explode(self::DATA_DELIMITER, $content);
                if($tmp && isset($tmp[0], $tmp[1])) {
                    $data[$tmp[0]] = array('section' => $tmp[0], 'value' => $tmp[1]);
                }
            }
            $this->m_cacheContents = $data;
        }
        return $this;
    }

    private function setTimestamp($timestamp = 0) {
        if($timestamp == 0) {
            $timestamp = time();
        }
        return $this->writeDataSection('TIMESTAMP', $timestamp);
    }
}
?>