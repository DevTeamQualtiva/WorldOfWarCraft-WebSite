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

/**
 * @todo TOTALLY REWRITE THIS CLASS
 **/
Class WoW_Forums {
    private static $forum_categories = array();
    private static $category_threads = array();
    private static $thread_posts = array();
    private static $blizz_tracker = array();
    private static $loaded_blizz_posts = array();
    private static $total_blizz_posts = 0;
    private static $blizz_tracker_active = false;
    
    private static $thread_data = array();
    
    private static $active_global_category_id = 0;
    private static $active_global_category_title = '';
    private static $active_category_id = 0;
    private static $active_category_title = '';
    private static $active_thread_id = 0;
    private static $active_thread_flags = 0;
    private static $active_thread_title = '';
    private static $active_thread_blizzard_posts_max = 0;
    private static $active_thread_blizzard_posts_current = 0;
    private static $active_thread_blizzard_posts = array();
    
    private static $page = 1;
    private static $total_category_threads = 0;
    private static $total_thread_posts = 1;
    
    public static function InitForums($page = 1) {
        self::$page = $page;
        if(self::GetCategoryId() == 0 && self::GetThreadId() == 0) {
            self::LoadCategories();
        }
        elseif(self::GetCategoryId() > 0 && self::GetThreadId() == 0) {
            self::LoadThreads($page);
        }
        elseif(self::GetCategoryId() == 0 && self::GetThreadId() > 0) {
            self::LoadThread($page);
        }
        else {
            WoW_Log::WriteError('%s : unhandled exception (category ID: %d, thread ID: %d)!', __METHOD__, self::GetCategoryId(), self::GetThreadId());
            return false;
        }
        return true;
    }
    
    private static function LoadCategories() {
        self::LoadForumCategories();
    }
    
    private static function LoadThreads($page = 1) {
        self::LoadCategoryInfo();
        self::LoadCategoryThreads($page);
    }
    
    private static function LoadThread($page) {
        self::LoadCategoryInfo();
        self::LoadThreadPosts($page);
    }
    
    private static function LoadCategoryInfo() {
        if(self::GetCategoryId() > 0) {
            $category = DB::WoW()->selectRow("
              SELECT `a`.`title_%s` AS `title`, `a`.`parent_cat`,
              IF(`a`.`parent_cat` != -1, (SELECT `title_%s` FROM `DBPREFIX_forum_category` WHERE `cat_id` = `a`.`parent_cat`), NULL) AS `category_group` 
              FROM `DBPREFIX_forum_category` AS `a`
              WHERE `a`.`cat_id` = %d AND `a`.`header` = 0", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), self::GetCategoryId());
        }
        elseif(self::GetThreadId() > 0) {
            $category = DB::WoW()->selectRow("
              SELECT `a`.`cat_id`, `a`.`title_%s` AS `title`, `a`.`parent_cat`, `b`.`title` AS `threadTitle`,
              IF(`a`.`parent_cat` != -1, (SELECT `title_%s` FROM `DBPREFIX_forum_category` WHERE `cat_id` = `a`.`parent_cat`), NULL) AS `category_group` 
              FROM `DBPREFIX_forum_category` AS `a`
              LEFT JOIN `DBPREFIX_forum_threads` AS `b`
                ON `b`.`cat_id` = `a`.`cat_id` AND `b`.`thread_id` = %d
              WHERE `a`.`cat_id` = (SELECT `cat_id` FROM `DBPREFIX_forum_threads` WHERE `thread_id` = %d) AND `a`.`header` = 0", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), self::GetThreadId(), self::GetThreadId());
            
            self::$active_thread_title = $category['threadTitle'];
            self::SetCategoryId($category['cat_id']);
        }
        else {
            $category = false;
        }
        if(!$category) {
            return false;
        }
        self::$active_category_title = $category['title'];
        self::$active_global_category_id = $category['parent_cat'];
        self::$active_global_category_title = $category['category_group'];
        return true;
    }
    
    public static function InitBlizzTracker($last = false, $page = 0) {
        self::LoadBlizzPosts($last, $page);
    }
    
    private static function LoadForumCategories() {
        if(WoW_Account::IsLoggedIn()) {
            $user_gm_level = WoW_Account::GetGMLevel();
        }
        else {
            $user_gm_level = 0;
        }
        self::$forum_categories = DB::WoW()->select("SELECT `cat_id`, `header`, `parent_cat`, `short`, `realm_cat`, `title_%s` AS `title`, `desc_%s` AS `desc`, `icon` FROM `DBPREFIX_forum_category` WHERE `gmlevel` <= %d", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), $user_gm_level);
        self::HandleForumCategories();
    }
    
    private static function HandleForumCategories() {
        if(!is_array(self::$forum_categories)) {
            return false;
        }
        // First of all, create category header
        $forum_categories = array();
        foreach(self::$forum_categories as $category) {
            if($category['header'] == 1) {
                $forum_categories[$category['cat_id']] = array();
                $forum_categories[$category['cat_id']]['category_info'] = $category;
                $forum_categories[$category['cat_id']]['subcategories'] = array();
            }
        }
        // Load subcategories into parent categories. Each category can have only level 1 subcategories.
        foreach(self::$forum_categories as $category) {
            if($category['header'] == 0 && $category['parent_cat'] > 0) {
                if(!isset($forum_categories[$category['parent_cat']])) {
                    // Unknown category, continue.
                    WoW_Log::WriteError('%s : forum category %d ("%s") has parent_cat %d, but this category was not found.', __METHOD__, $category['cat_id'], $category['title'], $category['parent_cat']);
                    continue;
                }
                $forum_categories[$category['parent_cat']]['subcategories'][] = $category;
            }
        }
        // Save handled categories
        self::$forum_categories = $forum_categories;
        unset($forum_categories, $category);
        return true;
    }
    
    private static function LoadCategoryThreads($page = 1) {
        self::$total_category_threads = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_forum_threads` WHERE `cat_id` = %d", self::GetCategoryId());
        self::$category_threads = DB::WoW()->select("
        SELECT DISTINCT
          `a`.*,
          `b`.`name` AS `author`,
          `c`.`post_id`,
          `c`.`blizzpost`,
          `c`.`blizz_name`,
          `c`.`message`,
          `c`.`post_date`,
          DATE_FORMAT(`c`.`post_date`, '%%d/%%c/%%Y') AS `formated_date`,
          `c`.`author_ip`,
          `c`.`edit_date`,
          
          `e`.`name` AS `last_post_author`,
          `d`.`character_guid` AS `last_post_author_id`,
          `d`.`post_id` AS `last_post_id`,
          `d`.`blizzpost` AS `last_blizzpost`,
          `d`.`blizz_name` AS `last_blizz_name`,
          `d`.`message` AS `last_message`,
          `d`.`post_date` AS `last_post_date`,
          DATE_FORMAT(`d`.`post_date`, '%%d/%%c/%%Y') AS `last_formated_date`,
          `d`.`author_ip` AS `last_author_ip`,
          `d`.`edit_date` AS `last_edit_date`,
          
          IF(`a`.`flags` & %s, 2, (IF(`a`.`flags` & %s, 1, 0))) AS `flags_order`,
          
          IF(`f`.`read_date` >= `d`.`post_date`, 'read', '') AS `status`,
          `f`.`page` AS `last_read_page`,
          CEIL((SELECT COUNT(`thread_id`) FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id`)/20 ) AS `pages`,
          (SELECT COUNT(*)-1 FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id`) AS `replies`,
          (SELECT `post_id` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` AND `blizzpost` = 1 ORDER BY `post_date` DESC LIMIT 1) AS  `first_blizz_post_id`
        
        FROM `DBPREFIX_forum_threads` AS `a`
        LEFT JOIN `DBPREFIX_user_characters` AS `b` 
          ON `b`.`bn_id` = `a`.`bn_id` AND `b`.`guid` = `a`.`character_guid`
        LEFT JOIN `DBPREFIX_forum_posts` AS `c`
          ON `c`.`thread_id` = `a`.`thread_id` AND `c`.`post_id` = (SELECT `post_id` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` ORDER BY `post_date` ASC LIMIT 1)
        LEFT JOIN `DBPREFIX_forum_posts` AS `d`
          ON `d`.`thread_id` = `a`.`thread_id` AND `d`.`post_id` = (SELECT `post_id` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` ORDER BY `post_date` DESC LIMIT 1)
        LEFT JOIN `DBPREFIX_user_characters` AS `e` 
          ON `e`.`bn_id` = `d`.`bn_id` AND `e`.`guid` = `d`.`character_guid`
        LEFT JOIN `DBPREFIX_forum_threads_reads` AS `f` 
          ON `f`.`bn_id` = %d AND `f`.`thread_id` = `a`.`thread_id`
        WHERE `a`.`cat_id` = %d
        ORDER BY `flags_order` DESC, `c`.`post_date` DESC
        LIMIT %s%s", THREAD_FLAG_FEATURED, THREAD_FLAG_PINNED, WoW_Account::GetUserID(), self::GetCategoryId(), ($page > 0) ? (($page-1)*20).', ' : null, '20' );
        self::HandleCategoryThreads();
    }
    
    private static function HandleCategoryThreads() {
        if(!is_array(self::$category_threads)) {
            return false;
        }
        $threads = array(
            'featured' => array(),
            'sticky' => array(),
            'regular' => array()
        );
        foreach(self::$category_threads as $thread) {
            if(mb_strlen($thread['message']) > 250) {
                $thread['message_short'] = str_replace('\"', '"', mb_substr($thread['message'], 0, 250)) . '…';
            }
            else {
                $thread['message_short'] = str_replace('\"', '"', $thread['message']);
            }
            $thread['author'] = $thread['blizzpost'] == 1 ? '<span class="type-blizzard">'.$thread['author'].' <img src="/wow/static/images/layout/cms/icon_blizzard.gif" alt="" /></span>' : $thread['author'];
            $thread['last_author'] = $thread['last_blizzpost'] == 1 ? '<span class="type-blizzard">'.$thread['last_post_author'].' <img src="/wow/static/images/layout/cms/icon_blizzard.gif" alt="" /></span>' : $thread['last_post_author'];
            $thread['closed'] = ($thread['flags'] & THREAD_FLAG_CLOSED) ? true : false;
            if($thread['flags'] & THREAD_FLAG_FEATURED) {
                $threads['featured'][] = $thread;
            }
            elseif($thread['flags'] & THREAD_FLAG_PINNED) {
                $threads['sticky'][] = $thread;
            }
            else {
                $threads['regular'][] = $thread;
            }
        }
        self::$category_threads = $threads;
        unset($threads, $thread);
        return true;
    }
    
    private static function LoadThreadPosts($page = 1) {
        if(WoW_Account::IsLoggedIn()) {
            DB::WoW()->query("REPLACE INTO `DBPREFIX_forum_threads_reads` 
            SET `read_date` = NOW(), `thread_id` = %d, `bn_id` = %d, `page` = %d, `last_post_id` = (SELECT `post_id` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = %d ORDER BY `post_date` DESC LIMIT 1)", self::GetThreadId(), WoW_Account::GetUserID(), self::$page, self::GetThreadId());
        }
        self::$total_thread_posts = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_forum_posts` WHERE `thread_id` = %d", self::GetThreadId());
        self::$thread_data = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_forum_threads` WHERE `thread_id` = %d", self::GetThreadId());
        DB::WoW()->query("SET @blizz=0, @tmp_row=0");
        self::$thread_posts = DB::WoW()->select("
        SELECT DISTINCT
          `a`.*,
          DATE_FORMAT(`a`.`post_date`, '%%d/%%c/%%Y') AS `formated_date`,
          DATE_FORMAT(`a`.`post_date`, '%%d.%%c.%%Y %%H:%%i:%%s') AS `fully_formated_date`,
          DATE_FORMAT(`a`.`edit_date`, '%%d/%%c/%%Y %%H:%%i') AS `formated_edit_date`,
          `b`.`title` AS `threadTitle`,
          `c`.`title_%s` AS `categoryTitle`,
          `d`.`name` AS `author`,
          `d`.`class`,
          `d`.`class_text`,
          `d`.`class_key`,
          `d`.`race`,
          `d`.`race_text`,
          `d`.`race_key`,
          `d`.`gender`,
          `d`.`level`,
          `d`.`realmId`,
          `d`.`realmName`,
          `d`.`guildId`,
          `d`.`guildName`,
          `a`.`post_date`,
          IF((SELECT `post_date` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` AND `cat_id` = `a`.`cat_id` AND `post_date` > `a`.`post_date` AND `blizzpost` = 1 LIMIT 1) IS NOT NULL, NULL, 1) AS totaly_last_post, 
  
          IF((SELECT `e`.`blizzpost` FROM `DBPREFIX_forum_posts` AS `e` WHERE `e`.`post_date` > `a`.`post_date` AND `e`.`thread_id` = `a`.`thread_id` AND `e`.`cat_id` = `a`.`cat_id` LIMIT 1) = 1, @tmp_row:=@blizz:=@tmp_row+1, @tmp_row:=@tmp_row+1) AS `ROW`,
          IF(@blizz = @tmp_row, IF(`a`.`blizzpost` = 1, @blizz+1, NULL), IF(`a`.`blizzpost` = 1, @blizz:=@tmp_row+1+(SELECT COUNT(*) FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` AND `cat_id` = `a`.`cat_id` AND `post_date` BETWEEN `a`.`post_date` AND (SELECT `post_date` FROM `DBPREFIX_forum_posts` WHERE `thread_id` = `a`.`thread_id` AND `cat_id` = `a`.`cat_id` AND `post_date` > `a`.`post_date` AND `blizzpost` = 1 LIMIT 1) AND `blizzpost` = 0), NULL)) AS `nextBlizzPost`
        
        FROM `DBPREFIX_forum_posts` AS `a`
        LEFT JOIN `DBPREFIX_forum_threads` AS `b` ON `b`.`thread_id` = `a`.`thread_id`
        LEFT JOIN `DBPREFIX_forum_category` AS `c` ON `c`.`cat_id` = `a`.`cat_id`
        LEFT JOIN `DBPREFIX_user_characters` AS `d` ON `d`.`bn_id` = `a`.`bn_id` AND `d`.`guid` = `a`.`character_guid`
        WHERE `a`.`thread_id` = %d
        ORDER BY `a`.`post_date` ASC
        LIMIT %s%s", WoW_Locale::GetLocale(), self::GetThreadId(), ($page > 0) ? (($page-1)*20).', ' : null, '20');  
        self::HandleThreadPosts();
        self::UpdateThreadViews();
    }
    
    private static function HandleThreadPosts() {
        foreach(self::$thread_posts as $post) {
            $post['message'] = self::BBCodesToHTML($post['message']);
            $posts[] = $post;
        }
        self::$thread_posts = $posts;
    }
    
    private static function LoadBlizzPosts($last, $page = 0) {
        self::$total_blizz_posts = DB::WoW()->selectCell("SELECT COUNT(`post_id`) FROM `DBPREFIX_forum_posts` WHERE `blizzpost` = 1");
        self::$loaded_blizz_posts = DB::WoW()->select("
        SELECT DISTINCT
        `a`.`post_id`,
        `a`.`thread_id`,
        `a`.`cat_id`,
        `a`.`bn_id`,
        `a`.`character_guid`,
        `a`.`message`,
        `a`.`post_date`,
        DATE_FORMAT(`a`.`post_date`, '%%d/%%c/%%Y') AS `formated_date`,
        `b`.`title` AS `threadTitle`,
        `c`.`title_%s` AS `categoryTitle`,
        `d`.`name` AS `author`,
        DATEDIFF(NOW(), `a`.`post_date`) AS `post_days`,
        HOUR(SUBTIME(NOW(), DATE_FORMAT(`a`.`post_date`, '%%H:%%i:%%s'))) AS `post_hours`,
        MINUTE(SUBTIME(NOW(), DATE_FORMAT(`a`.`post_date`, '%%H:%%i:%%s'))) AS `post_minutes`,
        (SELECT COUNT(*)+1 FROM `DBPREFIX_forum_posts` WHERE `post_id` < `a`.`post_id` AND`thread_id` = `a`.`thread_id` ORDER BY `a`.`post_date` ASC ) AS `ROW`
        FROM `DBPREFIX_forum_posts` AS `a`
        LEFT JOIN `DBPREFIX_forum_threads` AS `b` ON `b`.`thread_id` = `a`.`thread_id`
        LEFT JOIN `DBPREFIX_forum_category` AS `c` ON `c`.`cat_id` = `a`.`cat_id`
        LEFT JOIN `DBPREFIX_user_characters` AS `d` ON `d`.`bn_id` = `a`.`bn_id` AND `d`.`guid` = `a`.`character_guid`
        WHERE `a`.`blizzpost` = 1
        ORDER BY `a`.`post_date` DESC
        LIMIT %s%s", WoW_Locale::GetLocale(), ($page > 0) ? (($page-1)*15).', ' : null, $last ? '14' : '15' );       
        if(self::$blizz_tracker_active) {
            self::$blizz_tracker = self::$loaded_blizz_posts;
        }
        self::HandleBlizzPosts();
    }
    
    private static function HandleBlizzPosts() {
        if(is_array(self::$loaded_blizz_posts)) {
            $blizz_posts = self::$loaded_blizz_posts;
        }
        elseif(is_array(self::$blizz_tracker) && self::$blizz_tracker_active) {
            $blizz_posts = self::$blizz_tracker;
        }
        else {
            return false;
        }
        if(self::$blizz_tracker_active) {
            $message_len = 400;
        }
        else {
            $message_len = 115;
        }
        $posts = array();
        foreach($blizz_posts as $post) {
            // Crop message
            if(mb_strlen($post['message']) > $message_len) {
                $post['message_short'] = sprintf('%s…', mb_substr($post['message'], 0, $message_len));
            }
            else {
                $post['message_short'] = $post['message'];
            }
            $post['message_short'] = self::BBCodesToHTML($post['message_short']);
            $post['message'] = self::BBCodesToHTML($post['message']);
            // Crop thread title
            if(mb_strlen($post['threadTitle']) > 28) {
                $post['threadTitle_short'] = sprintf('%s…', mb_substr($post['threadTitle'], 0, 28));
            }
            else {
                $post['threadTitle_short'] = $post['threadTitle'];
            }
            // Set default author name
            if($post['author'] == '') {
                $post['author'] = 'Blizzard';
            }
            $page = floor($post['ROW']/20);
            $onPage = ceil($post['ROW']/20);
            $post['ROW'] = ($post['ROW'] > 20) ? ($post['ROW'] - $page*20) : $post['ROW'];       
            $post['link'] = ($onPage > 1) ? (sprintf('?page=%d#%d', $onPage, $post['ROW'])) : (sprintf('#%d', $post['ROW']));
            $posts[] = $post;
        }
        if(is_array(self::$loaded_blizz_posts)) {
            self::$loaded_blizz_posts = $posts;
        }
        elseif(is_array(self::$blizz_tracker) && self::$blizz_tracker_active) {
            self::$blizz_tracker = $posts;
        }
        else {
            unset($posts, $post);
            return false;
        }
        unset($posts, $post);
        return true;
    }
    
    public static function SetBlizzTrackerActive() {
        self::$blizz_tracker_active = true;
    }
    
    public static function SetCategoryId($cat_id) {
        if($cat_id < 0) {
            WoW_Log::WriteError('%s : wrong category ID (%d), unable to handle.', __METHOD__, $cat_id);
            return false;
        }
        if(!DB::WoW()->selectCell("SELECT 1 FROM `DBPREFIX_forum_category` WHERE `cat_id` = %d", $cat_id)) {
            return false;
        }
        self::$active_category_id = $cat_id;
        return true;
    }
    
    public static function SetThreadId($thread_id) {
        if($thread_id < 0) {
            WoW_Log::WriteError('%s : wrong thread ID (%d), unable to handle.', __METHOD__, $thread_id);
            return false;
        }
        $flags = DB::WoW()->selectCell("SELECT `flags` FROM `DBPREFIX_forum_threads` WHERE `thread_id` = %d", $thread_id);
        self::$active_thread_id = $thread_id;
        self::$active_thread_flags = $flags;
        return true;
    }
    
    public static function GetCategoryId() {
        return self::$active_category_id;
    }
    
    public static function GetThreadId() {
        return self::$active_thread_id;
    }
    
    public static function GetForumCategories() {
        if(!is_array(self::$forum_categories)) {
            self::LoadForumCategories();
        }
        return self::$forum_categories;
    }
    
    public static function GetCategoryThreads($page = 1) {
        if(!is_array(self::$category_threads)) {
            self::LoadCategoryThreads($page);
        }
        return self::$category_threads;
    }
    
    public static function GetThreadPosts() {
        if(!is_array(self::$thread_posts)) {
            self::LoadThreadPosts();
        }
        return self::$thread_posts;
    }
    
    public static function GetLoadedBlizzPosts() {
        if(!is_array(self::$loaded_blizz_posts)) {
            self::LoadBlizzPosts(true);
        }
        return self::$loaded_blizz_posts;
    }
    
    public static function GetTotalBlizzPosts() {
        if(!is_array(self::$loaded_blizz_posts)) {
            self::LoadBlizzPosts(true);
        }
        return self::$total_blizz_posts;
    }
    
    public static function GetBlizzPosts($page) {
        if(!is_array(self::$blizz_tracker)) {
            self::LoadBlizzPosts(false, $page);
        }
        return self::$blizz_tracker;
    }
    
    public static function GetGlobalCategoryTitle() {
        return self::$active_global_category_title;
    }
    
    public static function GetGlobalCategoryId() {
        return self::$active_global_category_id;
    }
    
    public static function GetCategoryTitle() {
        return self::$active_category_title;
    }
    
    public static function GetThreadTitle() {
        return self::$active_thread_title;
    }
    
    public static function GetThreadFlags() {
        return self::$active_thread_flags;
    }
    
    public static function GetTotalCategoryThreads() {
        return self::$total_category_threads;
    }
    
    public static function GetTotalThreadPosts() {
        return self::$total_thread_posts;
    }
    
    public static function GetPopularThreads() {
        return DB::WoW()->select("
        SELECT
        `a`.*,
        `b`.`title_%s` AS `categoryTitle`
        FROM `DBPREFIX_forum_threads` AS `a`
        LEFT JOIN `DBPREFIX_forum_category` AS `b` ON `b`.`cat_id` = `a`.`cat_id`
        ORDER BY `a`.`views` DESC
        LIMIT 10", WoW_Locale::GetLocale());
    }

    public static function GetNextBlizzPostInThread($post) {
        if($post === true) {
            foreach(self::$thread_posts as $BlizzPost) {
                if($BlizzPost['blizzpost'] == 1) {
                    $BlizzPost['ROW'] = ($BlizzPost['ROW'] >= 20) ? ($BlizzPost['ROW']-((self::$page-1)*20)) : ($BlizzPost['ROW']);
                    return (self::$page > 1) ? (sprintf('?page=%d#%d', self::$page, $BlizzPost['ROW'])) : (sprintf('#%d', $BlizzPost['ROW']));
                }
            }
        }
        else {
            if($post['blizzpost'] == 1 && $post['totaly_last_post'] == NULL) {
                $post['nextBlizzPost'] = ($post['ROW'] >= 20) ? ($post['nextBlizzPost']-(($post['ROW'] == 20 ? self::$page : self::$page-1)*20)) : ($post['nextBlizzPost']);
                return (self::$page > 1 || $post['ROW'] == 20) ? (sprintf('?page=%d#%d', ($post['ROW'] == 20 ? self::$page+1 : self::$page), $post['nextBlizzPost'])) : (sprintf('#%d', $post['nextBlizzPost']));
            }
        }
    }
    
    public static function BBCodesToHTML($post_text) {
        $matches = array();
        if(preg_match_all('/\[item\=(.+?)\/]/x', $post_text, $matches)) {
            $count = count($matches[0]);
            // Replace [item] tag
            for($i = 0; $i < $count; ++$i) {
                $info = WoW_Items::GetItemInfo(isset($matches[1][$i]) ? str_replace('"', '', $matches[1][$i]) : 0);
                if(!$info) {
                    continue;
                }
                $post_text = str_replace($matches[0][$i], sprintf('<a href="%s/wow/%s/item/%d" class="bml-link-item color-q%d"><span class="icon-frame frame-10"><img src="http://eu.battle.net/wow-assets/static/images/icons/18/%s.jpg"> </span>%s</a>', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $info['entry'], $info['Quality'], WoW_Items::GetItemIcon(0, $info['displayid']), WoW_Items::GetItemName($info['entry'])), $post_text);
            }
        }
        // Replace [quote] tag
        $post_text = str_replace('[quote', '<blockquote', $post_text);
        // Replace other tags
        $post_text = str_replace(array('[', ']', "\n"), array('<', '>', '<br/>'), $post_text);
        $post_text = str_replace('"', '\"', $post_text);
        return $post_text;
    }
    
    public static function AddNewThread($category_id, &$post_data, $return_id = false) {
        if(WoW_Account::IsLoggedIn()) {
            DB::WoW()->query("INSERT INTO `DBPREFIX_forum_threads` (`cat_id`, `bn_id`, `character_guid`, `title`, `views`, `flags`) VALUES (%d, %d, %d, '%s', 0, %d)",
                $category_id, WoW_Account::GetUserID(), WoW_Account::GetActiveCharacterInfo('guid'), $post_data['subject'], (WoW_Account::GetGMLevel() >= 3 ? (THREAD_FLAG_BLIZZARD) : 0));
            if(!$return_id) {
                return self::AddNewPost($category_id, DB::WoW()->GetInsertID(), $post_data);
            }
            return DB::WoW()->GetInsertID();
        }
        else {
            return false;
        }
    }
    
    public static function AddNewPost($category_id, $thread_id, &$post_data) {
        if(WoW_Account::IsHaveActiveCharacter()) {
            $post_data['message'] = isset($post_data['postCommand_detail']) ? $post_data['postCommand_detail'] : $post_data['detail'];
            //self::BBCodesToHTML($post_data['message']);
            if($category_id == null){
                $category_id = DB::WoW()->selectCell("SELECT `cat_id` FROM `DBPREFIX_forum_threads` WHERE `thread_id` = %d LIMIT 1", $thread_id);
            }
            
            DB::WoW()->query("
            INSERT INTO `DBPREFIX_forum_posts`
            (
                `thread_id`, `cat_id`, `bn_id`, `character_guid`, `blizzpost`,
                `blizz_name`, `message`, `post_date`, `author_ip` 
            )
            VALUES
            (
                %d, %d, %d, %d, %d, '%s', '%s', NOW(), '%s'
            )
            ",
                $thread_id, $category_id, WoW_Account::GetUserID(), WoW_Account::GetActiveCharacterInfo('guid'), isset($post_data['blizz']) ? 1 : 0,
                (isset($post_data['blizzName'])) ? $post_data['blizzName'] : null, $post_data['message'], $_SERVER['REMOTE_ADDR']
            );
            return array('cat_id' => $category_id, 'thread_id' => $thread_id, 'post_id' => DB::WoW()->GetInsertID());
        }
        else {
            return false;
        }
    }
    
    public static function UpdateThreadViews() {
        DB::WoW()->query("UPDATE `DBPREFIX_forum_threads` SET `views` = `views` + 1 WHERE `thread_id` = %d", self::GetThreadId());
    }
    
    public static function IsClosedThread() {
        return self::$thread_data['flags'] & THREAD_FLAG_CLOSED;
    }
    
    public static function GetTimeDifference($start, $end)
    {
        if($end >= $start )
        {
            $diff = $end - $start;
            if($days=intval((floor($diff/86400))))
                $diff = $diff % 86400;
            if($hours=intval((floor($diff/3600))))
                $diff = $diff % 3600;
            if($minutes=intval((floor($diff/60))))
                $diff = $diff % 60;
            $diff = intval($diff);            
            return(array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff));
        }
        else
        {
            return false;
        }
        return false;
    }
    
    public static function QuotePost($post) {
        return DB::WoW()->selectRow("
        SELECT `a`.`message`, `b`.`name`
        FROM `DBPREFIX_forum_posts` AS `a`
        JOIN `DBPREFIX_user_characters` AS `b` 
          ON `b`.`guid` = `a`.`character_guid`
        WHERE `a`.`post_id` = %d
        LIMIT 1", $post);
    }
    
    public static function GetPost($post) {
        if($post_to_edit = DB::WoW()->selectRow("SELECT `message`, `thread_id` FROM `DBPREFIX_forum_posts` WHERE `post_id` = %d AND `bn_id` = %d LIMIT 1", $post, WoW_Account::GetUserID())) {
            return $post_to_edit;
        }
        else {
            return false;
        }
    }
    
    public static function EditPost($post_id, &$post_data) {
        if(WoW_Account::IsHaveActiveCharacter()) {
            $post_data['message'] = isset($post_data['postCommand_detail']) ? $post_data['postCommand_detail'] : $post_data['detail'];
            //self::BBCodesToHTML($post_data['message']);
            $thread_id = DB::WoW()->selectCell("SELECT `thread_id` FROM `DBPREFIX_forum_posts` WHERE `post_id` = %d LIMIT 1", $post_id);

            DB::WoW()->query("
            UPDATE `DBPREFIX_forum_posts`
            SET `character_guid` = %d,
                `message` = '%s',
                `edit_date` = NOW()
            WHERE `post_id` = %d AND bn_id = %d",
                WoW_Account::GetActiveCharacterInfo('guid'), $post_data['message'], $post_id, WoW_Account::GetUserID());
            
            return $thread_id;
        }
        else {
            return false;
        }
    }
}
?>
