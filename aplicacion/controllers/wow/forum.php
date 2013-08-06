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

class Forum extends Controller {
    public function main() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE));
        WoW_Template::SetMenuIndex('menu-forums');
        $url_data = WoW::GetUrlData('forum');
        $page = (isset($_GET['page']) && preg_match('/([0-9]+)/i', $_GET['page'])) ? $_GET['page'] : 1;
        WoW_Template::SetPageData('current_page', $page);
        // Clear category/thread values
        WoW_Forums::SetCategoryId(0);
        WoW_Forums::SetThreadId(0);
        // Check preview
        if(isset($url_data['action4'], $url_data['action5'], $url_data['action6']) && (($url_data['action4'].$url_data['action5'].$url_data['action6']) == 'topicpostpreview')) {
            $post_text = isset($_POST['post']) ? $_POST['post'] : null;
            if($post_text == null) {
                //This can not be here, it causes error when preview blank post text
                //WoW_Template::ErrorPage(500);
            }
            // Convert BB codes to HTML
            WoW_Forums::BBCodesToHTML($post_text);
            // Output json
            header('Content-type: text/json');
            echo '{"detail":"' . $post_text . '"}';
            exit;
        }
        // Set values (if any)
        if($url_data['category_id'] > 0) {
            if(!WoW_Forums::SetCategoryId($url_data['category_id'])) {
                WoW_Template::ErrorPage(404);
                exit;
            }
            if(isset($url_data['action5']) && $url_data['action5'] == 'topic' && WoW_Account::IsHaveActiveCharacter()) {
                // Check $_POST query
                if(isset($_POST['xstoken'])) {
                    $post_allowed = true;
                    $required_post_fields = array('xstoken', 'sessionPersist', 'subject', 'postCommand_detail');
                    foreach($required_post_fields as $field) {
                        if(!isset($_POST[$field])) {
                            $post_allowed = false;
                        }
                    }
                    if($post_allowed) {
                        $post_info = WoW_Forums::AddNewThread($url_data['category_id'], $_POST, false);
                        if(is_array($post_info)) {
                            header('Location: ' . WoW::GetWoWPath() . '/wow/'.WoW_Locale::GetLocale().'/forum/topic/' . $post_info['thread_id']);
                            exit;
                        }
                    }
                }
                // Topic create
                WoW_Template::SetPageIndex('forum_new_topic');
                WoW_Template::SetPageData('page', 'forum_new_topic');
            }
            else {
                WoW_Template::SetPageIndex('forum_category');
                WoW_Template::SetPageData('page', 'forum_category');
            }
        }
        elseif($url_data['thread_id'] > 0) {
            if(!WoW_Forums::SetThreadId($url_data['thread_id'])) {
                WoW_Template::ErrorPage(404);
                exit;
            }
            if(isset($url_data['action4']) && $url_data['action4'] == 'topic' && preg_match('/([0-9]+)/i', $url_data['action5']) && WoW_Account::IsHaveActiveCharacter()) {
                // Check $_POST query
                if(isset($_POST['xstoken'])) {
                    $post_allowed = true;
                    $required_post_fields = array('xstoken', 'sessionPersist', 'detail');
                    foreach($required_post_fields as $field) {
                        if(!isset($_POST[$field])) {
                            $post_allowed = false;
                        }
                    }
                    if($post_allowed) {
                        $post_info = WoW_Forums::AddNewPost(null, $url_data['thread_id'], $_POST);
                        if(is_array($post_info)) {
                            header('Location: ' . WoW::GetWoWPath() . '/wow/'.WoW_Locale::GetLocale().'/forum/topic/' . $url_data['thread_id']);
                            exit;
                        }
                    }
                }
            }
            WoW_Template::SetPageIndex('forum_thread');
            WoW_Template::SetPageData('page', 'forum_thread');
        }
        elseif(isset($url_data['action4']) && $url_data['action4'] == 'topic' 
                && isset($url_data['action5']) && $url_data['action5'] == 'post'
                && isset($url_data['action6']) && preg_match('/([0-9]+)/i', $url_data['action6'])) {
            if(isset($url_data['action7']) && WoW_Account::IsHaveActiveCharacter()){
                switch($url_data['action7']){
                    case 'frag':
                        $Quote = WoW_Forums::QuotePost($url_data['action6']);
                        header('Content-type: text/json');
                        echo '{"detail":"'.$Quote['message'].'","name":"'.$Quote['name'].'"}';
                        exit;
                      break;
                    case 'edit':
                        if(isset($_POST['xstoken'])) {
                            $post_allowed = true;
                            $required_post_fields = array('xstoken', 'sessionPersist', 'postCommand_detail');
                            foreach($required_post_fields as $field) {
                                if(!isset($_POST[$field])) {
                                    $post_allowed = false;
                                }
                            }
                            if($post_allowed) {
                                $thread_id = WoW_Forums::EditPost($url_data['action6'], $_POST);
                                if($thread_id) {
                                    header('Location: ' . WoW::GetWoWPath() . '/wow/'.WoW_Locale::GetLocale().'/forum/topic/' . $thread_id);
                                    exit;
                                }
                            }
                        }
                        
                        if($post = WoW_Forums::GetPost($url_data['action6'])) {
                            if(!WoW_Forums::SetThreadId($post['thread_id'])) {
                                WoW_Template::ErrorPage(404);
                                exit;
                            }
                            WoW_Template::SetPageData('edit_text', $post['message']);
                            WoW_Template::SetPageIndex('forum_edit_post');
                            WoW_Template::SetPageData('page', 'forum_edit_post');
                        }
                      break;
                }
            }
            
            
        }
        elseif($url_data['action4'] == 'blizztracker') {
            // Set Blizz tracker as active
            WoW_Forums::SetBlizzTrackerActive();
            // Init Blizz tracker!
            WoW_Forums::InitBlizzTracker(false, $page);
            WoW_Template::SetPageIndex('forum_blizztracker');
            WoW_Template::SetPageData('page', 'forum_blizztracker');
        }
        else {
            // Init Blizz tracker!
            WoW_Forums::InitBlizzTracker(true);
            WoW_Template::SetPageIndex('forum_index');
            WoW_Template::SetPageData('page', 'forum_index');
            WoW_Template::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE).' station-home');
        }
        // Init the forums!
        WoW_Forums::InitForums($page);
        WoW_Template::SetPageData('forum_category_title', WoW_Forums::GetCategoryTitle());
        WoW_Template::SetPageData('forum_thread_title', WoW_Forums::GetThreadTitle());
        
        WoW_Template::LoadTemplate('page_index');
    }
}

?>
