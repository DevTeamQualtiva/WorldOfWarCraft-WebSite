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

Class WoW_Template {
    private static $is_initialized = false;
    private static $page_index = null;
    private static $page_data = array();
    private static $main_menu = array();
    private static $carousel_data = array();
    private static $menu_index = null;
    private static $template_theme = null;
    private static $is_redirect = false;
    private static $is_error_page = false;
    
    public static function ErrorPage($code, $error_profile = null, $bn_error = false) {
        switch($code) {
            case 403:
            case 404:
            case 500:
                self::SetTemplateTheme(($bn_error ? 'bn' : 'wow'));
                self::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE));
                self::SetPageIndex(($bn_error ? 'landing' : '404'));
                self::SetPageData(($bn_error ? 'landing' : 'page'), '404');
                if(!$error_profile) {
                    self::SetPageData('errorProfile', 'template_404');
                }
                else {
                    self::SetPageData('errorProfile', $error_profile);
                }
                self::SetPageData('errorCode', $code);
                self::LoadTemplate(($bn_error ? 'page_landing' : 'page_index'));
                self::$is_error_page = true; // Set this variable as "true" only after WoW_Template::LoadTemplate call!
                break;
            default:
                return false;
        }
    }
    
    public static function InitializeTemplate() {
        
    }
    
    public static function SetTemplateTheme($theme) {
        self::$template_theme = $theme;
    }
    
    public static function GetTemplateTheme() {
        return self::$template_theme != null ? self::$template_theme : 'overall';
    }
    
    public static function LoadTemplate($template_name, $overall = false) {
        if(self::$is_error_page || self::$is_redirect) {
            return false; // Do not load any templates if error page was triggered or page is redirecting.
        }
        if($overall) {
            $template = TEMPLATES_DIR . 'overall' . DS . 'overall_' . $template_name . '.php';
        }
        else {
            $template = TEMPLATES_DIR . self::GetTemplateTheme() . DS . self::GetTemplateTheme() . '_' . $template_name . '.php';
        }
        if(file_exists($template)) {
            include($template);
        }
        else {
            WoW_Log::WriteError('%s : unable to find template "%s" (template theme: %s, overall: %d, path: %s)!', __METHOD__, $template_name, self::GetTemplateTheme(), (int) $overall, $template);
        }
    }
    
    public static function GetMainMenu() {
        if(!self::$main_menu) {
            self::$main_menu = DB::WoW()->select("SELECT `key`, `icon`, `href`, `title_%s` AS `title` FROM `DBPREFIX_main_menu`", WoW_Locale::GetLocale());
        }
        return self::$main_menu;
    }
    
    public static function GetCarousel() {
        if(!self::$carousel_data) {
            self::$carousel_data = DB::WoW()->select("SELECT `id`, `slide_position`, `image`, `title_%s` AS `title`, `desc_%s` AS `desc`, `url` FROM `DBPREFIX_carousel` WHERE `active` = 1 ORDER BY `slide_position`", WoW_Locale::GetLocale(), WoW_Locale::GetLocale());
        }
        return self::$carousel_data;
    }
    
    public static function GetMenuIndex() {
        return self::$menu_index;
    }
    
    public static function SetMenuIndex($index) {
        self::$menu_index = $index;
    }
    
    public static function GetPageIndex() {
        return self::$page_index;
    }
    
    public static function SetPageIndex($index) {
        self::$page_index = $index;
        if(in_array($index, array('404', '403', '500'))) {
            self::AddToPageData('body_class', ' server-error');
        }
    }
    
    public static function GetPageData($index) {
        return (isset(self::$page_data[$index])) ? self::$page_data[$index] : null;
    }
    
    public static function SetPageData($index, $data) {
        self::$page_data[$index] = $data;
    }
    
    public static function AddToPageData($index, $data) {
        if(!isset(self::$page_data[$index])) {
            return true;
        }
        self::$page_data[$index] .= $data;
    }
    
    // used to navigation menu
    private static function array_searchRecursive($needle, $haystack, $strict = false, $path = array()) {
        if(!is_array($haystack) ) {
            return false;
        }
        foreach($haystack as $key => $val) {
            if(is_array($val) && $subPath = self::array_searchRecursive($needle, $val, $strict, $path) ) {
                $path['label'] = @$val['label'];
                $path = array_merge($path, array($key), $subPath);
                return $path;
            }
            elseif((!$strict && $val == $needle) || ($strict && $val === $needle)) {
                $path[] = $key;
                return $path;
            }
        }
        return false;
    }
    
    public static function NavigationMenu() {
		// Maybe breadcrumb content should be filled from appropriate page controller? // Shadez
        $navigationMenu[0] = WoW_Locale::$navigation;
        $url_data = WoW::GetUrlData();
        $path_data = NULL;
        $path_search_data = NULL;
        $last = false;
        $dynamic_content = false;
        switch($url_data[1]) {
            case '/zone/':
                $dynamic_content = true;
                @$zone_info = WoW_Game::GetZone();
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/zone/',
                    3 => '/zone/#expansion=' . @$zone_info['expansion'] . '&type=' . @$zone_info['type'] . 's',
                    4 => '/zone/' . @$url_data[2],
                    5 => '/zone/' . @$url_data[2] . '/' . @$url_data[3],
                );
                for($a = 0; $a <= count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                if(isset($url_data[2])){
                    $path_search_data[4] = $_data[4];
                }
                break;
            case '/faction/':
                $dynamic_content = true;
                /**
                *  WoW_Game::GetFaction() is not defined    
                *                           
                *  TODO
                *  Create function WoW_Game::GetFaction() with same rules as WoW_Game::GetZone()
                *  and edit wow_content_faction.php template to load datas from DB same as wow_content_zones.php template
                *  
                *  Create template and DB data to load and display each faction details.                              
                */
                //@$faction_info = WoW_Game::GetFaction();
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/faction/',
                    3 => '/faction/#expansion='.@$faction_info['expansion'],
                    4 => '/faction/'.@$url_data[2],
                );
                for($a = 0; $a <= count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                if(isset($url_data[2])){
                    $path_search_data[4] = $_data[4];
                }
                break;
            case '/item/':
                $dynamic_content = true;
                //WoW_Items::GetBreadCrumbsForItem($_GET) is NOT needed now
                if(isset($url_data[2])) {
                    $preg = preg_match('/\/(\?classId=([0-9]+)((&subClassId=([0-9]+))?(&invType=([0-9]+))?)?)|([0-9]+)\/{0,1}/i', $url_data[2], $matches);
                }
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/item/',
                    3 => NULL,
                    4 => NULL,
                    5 => NULL,
                );
                for($a=0;$a<=count($url_data);++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                if(isset($matches) && array_key_exists(8, $matches)) {
                    $proto = new WoW_ItemPrototype();
                    $proto->LoadItem($matches[8]);
                    $matches[2] = $proto->class;
                    $matches[5] = $proto->subclass;
                    if($matches[2] == 4 && in_array($matches[5], array(0,1,2,3,4))) {
                        $matches[7] = $proto->InventoryType;
                        $path_search_data[6] = '/item/'.$matches[8];
                        $label[6] = $proto->name;
                    }
                    else {
                        unset($matches[7]);
                        $path_search_data[5] = '/item/'.$matches[8];
                        $label[5] = $proto->name;
                    }
                }
                if(isset($matches) && (array_key_exists(2, $matches) || array_key_exists(8, $matches))) {
                    $path_search_data[3] = '/item/?classId='.$matches[2];
                }
                if(isset($matches) && (array_key_exists(5, $matches) || array_key_exists(8, $matches))) {
                    $path_search_data[4] = '/item/?classId='.$matches[2].'&subClassId='.$matches[5];
                }
                if(isset($matches) && (array_key_exists(7, $matches))) {
                    $path_search_data[5] = '/item/?classId='.$matches[2].'&subClassId='.$matches[5].'&invType='.$matches[7];
                }
              break;
            case '/profession/':
                $dynamic_content = true;
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/profession/',
                    3 => '/profession/' . @$url_data[2],
                );
                for($a = 0; $a <= count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                break;
            case '/pvp/':
                $dynamic_content = true;
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/pvp/',
                    3 => '/pvp/' . @$url_data[2],
                );
                for($a = 0; $a <= count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                break;
            case '/status/':
                $dynamic_content = true;
                $_data = array(
                    0 => '/',
                    1 => '/game/',
                    2 => '/status/',
                    3 => '/status/'.@$url_data[2],
                );
                for($a = 0; $a <= count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                break;
            case '/character/':
                $dynamic_content = true;
                $subdata4 = '';
                $data3 = '';
                $count = 0;
                @$url_data[3] = @urldecode($url_data[3]);
                if(isset($url_data[4])) {
                    if(in_array($url_data[4], array('/simple/', '/advanced/'))) {
                        $count = 2;
                        $subdata4 = @$url_data[4];
                    }
                    elseif($url_data[4] == '/achievement/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_achievements');
                    }
                    elseif($url_data[4] == '/statistic/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_statistics');
                    }
                    elseif($url_data[4] == '/reputation/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_reputation');
                    }
                    elseif($url_data[4] == '/pvp/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = 'PvP';
                    }
                    elseif($url_data[4] == '/feed/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_feed');
                    }
                    elseif($url_data[4] == '/mount/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_mounts');
                    }
                    elseif($url_data[4] == '/companion/') {
                        $count = 3;
                        $data3 = '/character/'.@$url_data[2].@$url_data[3].@$url_data[4];
                        $label[3] = WoW_Locale::GetString('template_profile_companions');
                    }
                }
                $label[2] = str_replace(array('/', '+'), array('', ' '), @$url_data[3].' @ '.@$url_data[2]);
                
                $_data = array(0 => '/',
                               1 => '/game/',
                               2 => '/character/'.@$url_data[2].@$url_data[3].$subdata4,
                               3 => $data3,
                               4 => NULL,
                               5 => NULL,
                              );
                for($a=0;$a<=$count;++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
              break;
            case '/blog/':
                $dynamic_content = true;
                $_data = array(0 => '/',
                               1 => '/blog/'.@$url_data[2],
                              );
                $label[1] = WoW::GetBlogData('title');
                for($a=0;$a<count($_data);++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
              break;
            case '/forum/':
                $dynamic_content = true;
                $_data = array(
                    0 => '/',
                    1 => '/forum/',
                    2 => '/forum/#forum'.WoW_Forums::GetGlobalCategoryId(),
                    3 => '/forum/'.WoW_Forums::GetCategoryId().'/',
                    4 => '/forum/topic/'.WoW_Forums::GetThreadId().'/',
                    5 => '/forum/topic/post/'.@$url_data[4].'/edit',
                    6 => '/forum/topic/post/'.@$url_data[4].'/delete',
                    7 => '/forum/blizztracker/'
                );
                for($a = 0; $a < count($url_data); ++$a) {
                    $path_search_data[$a] = $_data[$a];
                }
                if(isset($url_data[2]) && $url_data[2] != '/topic/'){
                    if(isset($url_data[2]) && $url_data[2] == '/blizztracker/'){
                        $path_search_data[2] = $_data[7];
                        $label[2] = WoW_Locale::GetString('template_blizztracker_title');
                        unset($path_search_data[3]);
                    }
                    else {
                        $path_search_data[3] = $_data[3];
                    }
                }
                if(isset($url_data[2]) && $url_data[2] == '/topic/') {
                    if($url_data[3] == '/post/'){
                        $path_search_data[3] = $_data[3];
                        $path_search_data[4] = $_data[5];
                        $label[4] = WoW_Forums::GetThreadTitle();
                        unset($path_search_data[5]);
                        unset($path_search_data[6]);
                    }
                    else{
                        $path_search_data[3] = $_data[3];
                        $path_search_data[4] = $_data[4];
                        $label[4] = WoW_Forums::GetThreadTitle();
                    }
                }
                break;
            default:
                $path_search_data = $url_data;
                break;
        }
        echo '<ol class="ui-breadcrumb">';
        $path_data = '';
        for($i = 0; $i < count($path_search_data); ++$i) {
            if($i == count($path_search_data)-1) {
                $last = true;
            }
            if($dynamic_content) {
                $path_data = $path_search_data[$i];
            }
            else {
                $path_data .= $url_data[$i];
            }
            $path_data = str_replace('//', '/', $path_data);
            
            if(!isset($label[$i])) {
                $menu = self::array_searchRecursive($path_data, $navigationMenu);
            }
            else {
                $menu['label'] = $label[$i];
            }
            echo '<li' . ($last == true ? ' class="last"' : null) . '><a href="' . WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . $path_data . '" rel="np">' . $menu['label'] . '</a></li>';
        }
        echo '</ol>';
    }
}
?>
