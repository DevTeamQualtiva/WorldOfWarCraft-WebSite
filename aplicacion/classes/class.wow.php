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

Class WoW {
    private static $total_news_count = 0;
    private static $current_news_page = 0;
    private static $pager_data = array('prev' => false, 'next' => false);
    private static $last_news = array();
    private static $blog_contents = array();
    private static $carousel_data = array();
    private static $wow_path = '';
    private static $realmsStatusCache = array();
    
    public static function SelfTests() {
        $errorMessage = '';
        // Core checks
        // Database revision check
        $database_revision = DB::WoW()->selectCell("SELECT `version` FROM `DBPREFIX_db_version` LIMIT 1");
        if($database_revision != DB_VERSION) {
            $errorMessage .= '<li>You have outdated DB (current version: ' . DB_VERSION . ', your version: ' . ($database_revision != null ? $database_revision : '<none>') . '). Please, update project DB with SQL updates from "sql/updates" folder.</li>';
        }
        if(CONFIG_VERSION != WoWConfig::$ConfigVersion) {
            $errorMessage .= '<li>You have outdated configuration file (current version: ' . CONFIG_VERSION . ', your version: ' . WoWConfig::$ConfigVersion . '). Please, update WoWConfig.php from WoWConfig.php.default.</li>';
        }
        if($errorMessage != '') {
            die('<em><strong style="color:#ff0000">Some error(s) appeared during core self testing:</strong></em><ul>' . $errorMessage . '</ul>Please, solve this problem(s) and <a href="">refresh</a> this page again.');
        }
        return true;
    }
    
    public static function GetCarouselData() {
        if(!self::$carousel_data) {
            self::LoadCarouselData();
        }
        return self::$carousel_data;
    }
    
    private static function LoadCarouselData() {
        self::$carousel_data = DB::WoW()->select("SELECT `id`, `slide_position`, `image`, `title_%s` AS `title`, `desc_%s` AS `desc`, `url` FROM `DBPREFIX_carousel` WHERE `active` = 1 ORDER BY `id` DESC LIMIT 6", WoW_Locale::GetLocale(), WoW_Locale::GetLocale());
        $count = count(self::$carousel_data);
        for($i = 0; $i < $count; $i++) {
            self::$carousel_data[$i] = (object) self::$carousel_data[$i];
        }
    }
    
    public static function GetLastNews($limit = 20, $start = 0) {
        if(!self::$last_news) {
            self::LoadLastNews($limit, $start);
        }
        return self::$last_news;
    }
    
    public static function GetFeaturedNews() {
        return DB::WoW()->select("SELECT `id`, `image`, `title_%s` AS `title` FROM `DBPREFIX_news` LIMIT 5", WoW_Locale::GetLocale());
    }
    
    private static function LoadLastNews($limit, $start) {
        if($start > 0) {
            self::$current_news_page = $start;
            $offset = ($start * $limit);
        }
        else {
            $offset = 0;
        }
        self::$last_news = DB::WoW()->select("SELECT `id`, `image`, `header_image`, `title_%s` AS `title`, `desc_%s` AS `desc`, `author`, `postdate` FROM `DBPREFIX_news` ORDER BY `postdate` DESC LIMIT %d, %d", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), $offset, $limit);
        $count = count(self::$last_news);
        for($i = 0; $i < $count; $i++) {
            self::$last_news[$i]['comments_count'] = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_blog_comments` WHERE `blog_id` = %d", self::$last_news[$i]['id']);
        }
        self::$total_news_count = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_news`");
        if(self::$current_news_page > 0) {
            self::$pager_data['prev'] = true;
            if(($limit * ($start + 1)) < self::$total_news_count) {
                self::$pager_data['next'] = true;
            }
        }
        else {
            self::$pager_data['prev'] = false;
            if(self::$total_news_count > $limit) {
                self::$pager_data['next'] = true;
            }
        }
    }
    
    public static function GetPrevPage() {
        return self::$pager_data['prev'] ? self::$current_news_page - 1 : -1;
    }
    
    public static function GetNextPage() {
        return self::$pager_data['next'] ? self::$current_news_page + 1 : -1;
    }
    
    public static function GetUrlData($type = NULL) {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        if(!is_array($url_array)) {
            return false;
        }
        $count = count($url_array);
        $urldata = array();
        //print_r($url_array);
        switch($type) {
            case 'item':
                $urldata['tooltip'] = false;
                $urldata['item_entry'] = 0;
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'item':
                            $urldata['item_entry'] = (isset($url_array[$i + 1])) ? $url_array[$i + 1] : 0;
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j + 2) ]) && $url_array[ $i + ($j + 2) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j + 2)];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                        case 'tooltip':
                            $urldata['tooltip'] = true;
                            break;
                    }
                }
                break;
            case 'forum':
                $urldata['category_id'] = 0;
                $urldata['thread_id'] = 0;
                for($i = 0; $i < $count; $i++) {
                    $urldata['action' . $i] = $url_array[$i];
                    switch($url_array[$i]) {
                        case 'forum':
                            $urldata['category_id'] = (isset($url_array[$i + 1])) ? (int) $url_array[$i + 1] : 0;
                            break;
                        case 'topic':
                            $urldata['thread_id'] = (isset($url_array[$i + 1])) ? (int) $url_array[$i + 1] : 0;
                            break;
                        default:
                            continue;
                        }
                    }
                break;
            case 'blog':
                $urldata['blog_id'] = 0;
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'blog':
                            $urldata['blog_id'] = (isset($url_array[$i + 1])) ? $url_array[$i + 1] : -1;
                            if($tmp = explode('#', $urldata['blog_id'])) {
                                $urldata['blog_id'] = $tmp[0];
                            }
                            break;
                    }
                }
                break;
            case 'discussion':
                $urldata['blog_id'] = 0;
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'discussion':
                            if(isset($url_array[$i + 1]) ) {
                                $urldata['blog_id'] = substr($url_array[$i + 1], 5);
                            }
                            break;
                    }
                }
                break;
            case 'character':
                $urldata['realmName'] = null;
                $urldata['name'] = null;
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'character':
                            $urldata['realmName'] = (isset($url_array[$i + 1])) ? urldecode($url_array[$i + 1]) : null;
                            $urldata['name'] = (isset($url_array[$i + 2])) ? urldecode($url_array[$i + 2]) : null;
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j + 3) ]) && $url_array[ $i + ($j + 3) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j + 3)];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'guild':
                $urldata['realmName'] = null;
                $urldata['name'] = null;
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'guild':
                            $urldata['realmName'] = (isset($url_array[$i + 1])) ? $url_array[$i + 1] : null;
                            $urldata['name'] = (isset($url_array[$i + 2])) ? $url_array[$i + 2] : null;
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j + 3) ]) && $url_array[ $i + ($j + 3) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j + 3)];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'vault':
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'vault':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j ) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j )];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'management':
                // Account Management Page
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'account':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j ) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j )];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'support':
                // Support Page
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'account':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j ) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j )];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'zone':
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'zone':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j ) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j )];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'game':
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'game':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j)];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
            case 'faction':
                for($i = 0; $i < $count; $i++) {
                    switch($url_array[$i]) {
                        case 'faction':
                            for($j = 0; $j < 10; $j++) {
                                if(isset($url_array[ $i + ($j) ]) && $url_array[ $i + ($j) ] != null) {
                                    $urldata['action' . $j] = $url_array[$i + ($j)];
                                }
                                else {
                                    $urldata['action' . $j] = null;
                                }
                            }
                            break;
                    }
                }
                break;
			case 'services':
				for($i = 0; $i < $count; $i++){
					switch($url_array[$i]){
						case 'services':
								for($j = 0; $j < 10; $j++){
									if(isset($url_array[$i + ($j) ]) && $url_array[ $i + ($j) ] != null){
										$urldata['action' . $j] = $url_array[$i + ($j)];
									}else{
										$urldata['action' . $j] = null;
									}
								}
						break;
					}
				}
			break;
            //this is used for auto navigation menu generator
            default:
                for($i = 2; $i < ($count); $i++) {
                      if(isset($url_array[$i]) && $url_array[$i] != null) {
                          $urldata[($i - 2)] = ($url_array[$i] == WoW_Locale::GetLocale()) ? '/' : '/'.$url_array[$i].'/';
                      }
                }
                break;
        }
        return $urldata;
    }
    
    public static function GetRealmStatus($realmID = false) {
        if($realmID === false) {
            $realmList = DB::Realm()->select("SELECT `id`, `name`, `address`, `port`, `icon`, `timezone` FROM `realmlist`");
        }
        else {
            if (!WoWConfig::$UseRealmsStatus)
                return false;
            if(isset(self::$realmsStatusCache[$realmID])) {
                return self::$realmsStatusCache[$realmID];
            }
            $realmList[] = DB::Realm()->selectRow("SELECT `id`, `name`, `address`, `port`, `icon`, `timezone` FROM `realmlist` WHERE `id` = %d", $realmID);
        }
        if(!$realmList) {
            return false;
        }
        $size = count($realmList);
        for($i = 0; $i < $size; ++$i) {
            $errNo = 0;
            $errStr = 0;
            $realmList[$i]['status'] = @fsockopen($realmList[$i]['address'], $realmList[$i]['port'], $errNo, $errStr, 1) ? 'up' : 'down';
            switch($realmList[$i]['icon']) {
                default:
                case 0:
                case 4:
                    $realmList[$i]['type'] = 'PvE';
                    break;
                case 1:
                    $realmList[$i]['type'] = 'PvP';
                    break;
                case 6:
                    $realmList[$i]['type'] = WoW_Locale::GetString('template_realm_status_type_roleplay');
                    break;
                case 8:
                    $realmList[$i]['type'] = WoW_Locale::GetString('template_realm_status_type_rppvp');
                    break;
            }
            switch($realmList[$i]['timezone']) {
                default:
                    $realmList[$i]['language'] = 'Development Realm';
                    break;
                case 8:
                    $realmList[$i]['language'] = WoW_Locale::GetString('template_locale_en');
                    break;
                case 9:
                    $realmList[$i]['language'] = WoW_Locale::GetString('template_locale_de');
                    break;
                case 10:
                    $realmList[$i]['language'] = WoW_Locale::GetString('template_locale_fr');
                    break;
                case 11:
                    $realmList[$i]['language'] = WoW_Locale::GetString('template_locale_es');
                    break;
                case 12:
                    $realmList[$i]['language'] = WoW_Locale::GetString('template_locale_ru');
                    break;
            }
            self::$realmsStatusCache[$realmList[$i]['id']] = $realmList[$i];
        }
        return $realmList;
    }
    
    public static function RedirectToCorrectProfilePage($current_type = '') {
        if($current_type == 'simple' && !preg_match('/simple/i', $_SERVER['REQUEST_URI'])) {
            if(isset($_COOKIE['wow_character_summary_view']) && in_array($_COOKIE['wow_character_summary_view'], array('simple', 'advanced'))) {
                header(sprintf('Location: %s%s%s', $_SERVER['REQUEST_URI'], substr($_SERVER['REQUEST_URI'], (strlen($_SERVER['REQUEST_URI']) - 1), 1) == '/' ? '' : '/', $_COOKIE['wow_character_summary_view']));
                exit;
            }
        }
    }
    
    public static function LoadBlog($blog_id) {
        $blog_data = DB::WoW()->selectRow("SELECT `id`, `image`, `header_image`, `title_%s` AS `title`, `text_%s` AS `text`, `author`, `postdate` FROM `DBPREFIX_news` WHERE `id` = %d LIMIT 1", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), $blog_id);
        if(!$blog_data) {
            WoW_Log::WriteError('%s : blog entry #%d was not found in DB.', __METHOD__, $blog_id);
            return false;
        }
        self::$blog_contents['blog'] = $blog_data;
        unset($blog_data);
        self::$blog_contents['comments'] = DB::WoW()->select("SELECT * FROM `DBPREFIX_blog_comments` WHERE `blog_id` = %d", $blog_id);
        self::$blog_contents['blog']['comments_count'] = count(self::$blog_contents['comments']);
        return true;
    }
    
    public static function GetBlogData($data) {
        if(!is_array(self::$blog_contents) || !isset(self::$blog_contents['blog']) || !is_array(self::$blog_contents['blog'])) {
            return false;
        }
        return isset(self::$blog_contents['blog'][$data]) ? self::$blog_contents['blog'][$data] : null;
    }
    
    public static function GetBlogComments() {
        if(!is_array(self::$blog_contents) || !isset(self::$blog_contents['comments']) || !is_array(self::$blog_contents['comments'])) {
            return false;
        }
        return self::$blog_contents['comments'];
    }
    
    public static function GetWoWPath() {
        return WoWConfig::$WoW_Path;
    }
	
	public static function GetURL(){
		return 'http://' . $_SERVER['SERVER_NAME'] . "/";
	}	
    
    public static function IsRealm($realmName) {
        foreach(WoWConfig::$Realms as $realm) {
            if($realm['name'] == $realmName) {
                return true;
            }
        }
        return false;
    }
    
    public static function CatchOperations(&$loaded) {
        // Perform log in (if required)
        if(isset($_GET['login']) || preg_match('/\?login/', $_SERVER['REQUEST_URI'])) {
            // $_SERVER['REQUEST_URI'] check is required for mod_rewrited URL cases.
            header('Location: ' . WoW::GetWoWPath() . '/login/');
            exit;
        }
        // Perform logout (if required)
        if(isset($_GET['logout']) || preg_match('/\?logout/', $_SERVER['REQUEST_URI'])) {
            // $_SERVER['REQUEST_URI'] check is required for mod_rewrited URL cases.
            WoW_Account::PerformLogout();
            header('Location: ' . WoW::GetWoWPath() . '/');
            exit;
        }
        // Locale
        if(isset($_GET['locale']) && !preg_match('/lookup/', $_SERVER['REQUEST_URI'])) {
            if(WoW_Locale::IsLocale($_GET['locale'], WoW_Locale::GetLocaleIDForLocale($_GET['locale']))) {
                WoW_Locale::SetLocale($_GET['locale'], WoW_Locale::GetLocaleIDForLocale($_GET['locale']));
                $loaded = true;
                setcookie('wow_locale', WoW_Locale::GetLocale(), strtotime('NEXT YEAR'), '/');
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
                else {
                    header('Location: ' . WoW::GetWoWPath() . '/');
                    exit; 
                }
            }
        }
    }
    
    public static function RedirectTo($url = '') {
        header('Location: /' . $url);
        exit; // Terminate script
    }
    
    public static function GetBattleGroup($id = 1, $name = '') {
        $activeBG = false;
        if($name != null) {
            // Find BG with provided name
            foreach(WoWConfig::$BattleGroups as &$bg) {
                if($bg['name'] == $name) {
                    $activeBG = $bg;
                }
            }
        }
        else {
            if(isset(WoWConfig::$BattleGroups[$id])) {
                $activeBG = WoWConfig::$BattleGroups[$i];
            }
        }
        if($activeBG && isset($activeBG['realms'])) {
            foreach($activeBG['realms'] as &$realm) {
                $realm = isset(WoWConfig::$Realms[$realm]) ? WoWConfig::$Realms[$realm] : null;
                if(!$realm) {
                    unset($realm);
                }
            }
            return $activeBG;
        }
        return false;
    }
    
    public static function GetServerType($realmID) {
        return isset(WoWConfig::$Realms[$realmID]['type']) ? WoWConfig::$Realms[$realmID]['type'] : UNK_SERVER;
    }
}
?>
