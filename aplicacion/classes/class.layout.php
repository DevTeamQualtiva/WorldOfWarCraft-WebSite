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

class WoW_Layout {
    public static function PrintCSSForBNPage() {
        switch(WoW_Template::GetTemplateTheme()) {
            case 'account':
                $root_path = WoWConfig::$WoW_Path . '/account';
                break;
            default:
                $root_path = WoWConfig::$WoW_Path . '/static';
                break;
        }
        $css_data = array(
            array(
                'path' => '/local-common/css/common.css',
                'version' => 15,
                'browser' => false,
                'skip_path' => false
            ),
            array(
                'path' => '/local-common/css/common-ie.css',
                'version' => 15,
                'browser' => 'IE',
                'skip_path' => false
            ),
            array(
                'path' => '/local-common/css/common-ie6.css',
                'version' => 15,
                'browser' => 'IE 6',
                'skip_path' => false
            ),
            array(
                'path' => '/local-common/css/common-ie7.css',
                'version' => 15,
                'browser' => 'IE 7',
                'skip_path' => false
            ),
            array(
                'path' => '/css/bnet.css',
                'version' => 5,
                'browser' => false,
                'skip_path' => false
            ),
            array(
                'path' => '/css/bnet-ie.css',
                'version' => 5,
                'browser' => 'IE',
                'skip_path' => false
            ),
            array(
                'path' => '/css/bnet-ie6.css',
                'version' => 5,
                'browser' => 'IE 6',
                'skip_path' => false
            ),
            array(
                'path' => '/css/bnet-ie7.css',
                'version' => 5,
                'browser' => 'IE 7',
                'skip_path' => false
            )
        );
        switch(WoW_Template::GetPageIndex()) {
            default:
                $css_data_page = array(
                    array(
                        'path' => '/css/homepage.css',
                        'version' => 5,
                        'browser' => false,
                        'skip_path' => false
                    )
                );
                break;
            case 'management':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'version' => 19,
                        'media' => 'print',
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie6.css',
                        'version' => 19,
                        'browser' => 'IE 6',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie7.css',
                        'version' => 19,
                        'browser' => 'IE 7',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/lobby.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/lobby-ie.css',
                        'version' => 19,
                        'browser' => 'IE',
                        'skip_path' => false
                    ),
                );
                break;
            case 'dashboard':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'media' => 'print',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/dashboard.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/wow/dashboard.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/wow/dashboard-ie.css',
                        'version' => 19,
                        'browser' => 'IE',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/wow/dashboard-ie6.css',
                        'version' => 19,
                        'browser' => 'IE 6',
                        'skip_path' => false
                    ),
                );
                break;
            case 'landing':
                switch(WoW_Template::GetPageData('landing')) {
                    case 'what_is':
                        $css_data_page = array(
                            array(
                                'path' => '/css/landing/info.css',
                                'version' => 5,
                                'browser' => false,
                                'skip_path' => false
                            ),
                            array(
                                'path' => '/css/landing/info-ie6.css',
                                'version' => 5,
                                'browser' => 'IE 6',
                                'skip_path' => false
                            )
                        );
                        break;
                    case '404':
                        $css_data_page = array(
                            array(
                                'path' => '/css/error.css',
                                'version' => 6,
                                'browser' => false,
                                'skip_path' => false
                            )
                        );
                        break;
                }
                break;
            case 'creation_tos':
            case 'creation_success':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'version' => 19,
                        'media' => 'print',
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie6.css',
                        'version' => 19,
                        'browser' => 'IE 6',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie7.css',
                        'version' => 19,
                        'browser' => 'IE 7',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/account-creation/streamlined-creation.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/account-creation/streamlined-creation-ie6.css',
                        'version' => 19,
                        'browser' => 'IE 6',
                        'skip_path' => false
                    ),
                    array(
                        'path' =>  '/css/account-creation/streamlined-creation-ie7.css',
                        'version' => 19,
                        'browser' => 'IE 7',
                        'skip_path' => false
                    )
                );
                break;
            case 'add_game':
                $css_data_page = array(
                    array(
                        'path' => '/css/management/add-game.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                   )
                );
                break;
            case 'password_reset':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'version' => 19,
                        'media' => 'print',
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/cant-login/cant-login.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                );
                    
                break;
            case 'password_reset_select':
            case 'password_reset_secred_answer':
            case 'password_reset_success':
            case 'password_reset_confirm':
            case 'password_reset_changed':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'version' => 19,
                        'media' => 'print',
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/support/support.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                );
                break;
            case 'account_conversion':
                $css_data_page = array(
                    array(
                        'path' => '/css/bnet-print.css',
                        'version' => 19,
                        'media' => 'print',
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs.css',
                        'version' => 19,
                        'browser' => false,
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie6.css',
                        'version' => 19,
                        'browser' => 'IE 6',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/inputs-ie7.css',
                        'version' => 19,
                        'browser' => 'IE 7',
                        'skip_path' => false
                    ),
                    array(
                        'path' => '/css/management/wow/merge/wow-merge.css',
                        'version' => 19,
                        'media' => 'all',
                        'browser' => false,
                        'skip_path' => false
                    )
                );
                break;
        }
        $cssList = array_merge($css_data, $css_data_page);
        $cssList[] = array(
            'path' => sprintf('/local-common/css/locale/%s.css', WoW_Locale::GetLocale(LOCALE_DOUBLE)),
            'version' => 15,
            'browser' => false,
            'skip_path' => false
        );
        $cssList[] = array(
            'path' => sprintf('/css/locale/%s.css', WoW_Locale::GetLocale(LOCALE_DOUBLE)),
            'version' => 5,
            'browser' => false,
            'skip_path' => false
        );
        $css_str = '';
        foreach($cssList as &$sheet) {
            if($sheet['skip_path']) {
                $css_str .= self::PrintCSS($sheet['path'], $sheet['version'], $sheet['browser'], isset($sheet['media']) ? $sheet['media'] : false);
            }
            else {
                $css_str .= self::PrintCSS($root_path . $sheet['path'], $sheet['version'], $sheet['browser'], isset($sheet['media']) ? $sheet['media'] : false);
            }
        }
        return $css_str;
    }
    
    public static function PrintCSSForPage() {
        $css_data = array(
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/common.css',
                'version' => 15,
                'browser' => false,
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/common-ie.css',
                'version' => 15,
                'browser' => 'IE',
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/common-ie6.css',
                'version' => 15,
                'browser' => 'IE 6',
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/common-ie7.css',
                'version' => 15,
                'browser' => 'IE 7',
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/css/wow.css',
                'version' => 3,
                'browser' => false,
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/css/wow-ie.css',
                'version' => 3,
                'browser' => 'IE',
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/css/wow-ie7.css',
                'version' => 3,
                'browser' => 'IE 7',
            ),
            array(
                'path' => WoW::GetWoWPath() . '/wow/static/css/wow-ie6.css',
                'version' => 3,
                'browser' => 'IE 6',
            )
        );
        
        switch(WoW_Template::GetPageIndex()) {
            case 'index':
            default:
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/homepage.css',
                        'version' => 15,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/blog.css',
                        'version' => 15,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/cms-common.css',
                        'version' => 15,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 3,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 3,
                        'browser' => 'IE 6',
                    )
                );
                break;
            case 'search':
            case 'search_results':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/search.css',
                        'version' => 16,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/search.css',
                        'version' => 7,
                        'browser' => false
                    )
                );
                break;
            case 'character_profile_simple':
            case 'character_profile_advanced':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/summary.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/summary-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/summary-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    )
                );
                break;
            case 'character_talents':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/talent.css',
                        'version' => 6,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/talent-ie6.css',
                        'version' => 6,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/tool/talent-calculator.css',
                        'version' => 6,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/tool/talent-calculator-ie.css',
                        'version' => 6,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/tool/talent-calculator-ie6.css',
                        'version' => 6,
                        'browser' => 'IE 6'
                    )
                );
                break;
            case 'character_achievements':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/achievement.css',
                        'version' => 7,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/achievement-ie6.css',
                        'version' => 7,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/achievement-ie7.css',
                        'version' => 7,
                        'browser' => 'IE 7'
                    ),
                );
                break;
            case 'character_statistics':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/statistic.css',
                        'version' => 7,
                        'browser' => false
                    )
                );
                break;
            case 'character_feed':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/feed.css',
                        'version' => 7,
                        'browser' => false
                    )
                );
                break;
            case 'character_companions_mounts':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/companion.css',
                        'version' => 12,
                        'browser' => false
                    )
                );
                break;
            case 'blog':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/lightbox.css',
                        'version' => 7,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/blog.css',
                        'version' => 17,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/comments.css',
                        'version' => 17,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 7,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 7,
                        'browser' => 'IE 6'
                    )
                );
                break;
            case 'forum_index':
            case 'forum_category':
            case 'forum_thread':
            case 'forum_new_topic':
            case 'forum_edit_post':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/forums.css',
                        'version' => 19,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/comments.css',
                        'version' => 19,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/cms-common.css',
                        'version' => 19,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6'
                    )
                );
                break;
            case 'forum_blizztracker':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/forums.css',
                        'version' => 19,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/cms-common.css',
                        'version' => 19,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6'
                    )
                );
                break;
            case 'item':
            case 'item_list':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki-ie6.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/item.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'guild_page':
            case 'guild_perks':
            case 'guild_achievements':
            case 'guild_roster':
            case 'guild_professions':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/guild.css',
                        'version' => 6,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/summary.css',
                        'version' => 6,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/summary-ie6.css',
                        'version' => 6,
                        'browser' => 'IE 6'
                    )
                );
                if(WoW_Template::GetPageIndex() == 'guild_perks') {
                    $css_data_page[] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/perks.css',
                        'version' => 7,
                        'browser' => false
                    );
                }
                elseif(in_array(WoW_Template::GetPageIndex(), array('guild_roster', 'guild_professions'))) {
                    $css_data_page[] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/roster.css',
                        'version' => 7,
                        'browser' => false
                    );
                    $css_data_page[] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/roster-ie.css',
                        'version' => 7,
                        'browser' => 'IE'
                    );
                    $css_data_page[] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/guild/roster-ie6.css',
                        'version' => 7,
                        'browser' => 'IE 6'
                    );
                }
                break;
            case 'realm_status':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/realmstatus.css',
                        'version' => 7,
                        'browser' => false
                    )
                );
                break;
            case 'character_reputation':
            case 'character_reputation_tabular':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/reputation.css',
                        'version' => 7,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/reputation-ie.css',
                        'version' => 7,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/reputation-ie6.css',
                        'version' => 7,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/reputation-ie7.css',
                        'version' => 7,
                        'browser' => 'IE 7'
                    ),
                );
                break;
            case 'character_pvp':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 4,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 4,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 4,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/pvp.css',
                        'version' => 7,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/pvp-ie.css',
                        'version' => 7,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/arena/arena.css',
                        'version' => 7,
                        'browser' => false
                    )
                );
                break;
            case 'game':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki-ie.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-index.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'game_guide_what_is_wow':
            case 'game_guide_getting_started':
            case 'game_guide_how_to_play':
            case 'game_guide_playing_together':
            case 'game_guide_late_game':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-common.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-common.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-ie6.css.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-common-ie6.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/lightbox.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                if(WoW_Template::GetPageIndex() == 'game_guide_what_is_wow') {
                    $css_data_page[2] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-what-is-wow.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                elseif(WoW_Template::GetPageIndex() == 'game_guide_getting_started') {
                    $css_data_page[2] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-getting-started.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                elseif(WoW_Template::GetPageIndex() == 'game_guide_how_to_play') {
                    $css_data_page[2] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-how-to-play.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                elseif(WoW_Template::GetPageIndex() == 'game_guide_playing_together') {
                    $css_data_page[2] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-playing-together.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                elseif(WoW_Template::GetPageIndex() == 'game_guide_late_game') {
                    $css_data_page[2] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-guide-late-game.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                break;
            case 'game_race_index':
            case 'game_race':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/cms-common.css',
                        'version' => 15,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 15,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-race.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                if(WoW_Template::GetPageIndex() == 'game_race') {
                    $css_data_page[3] = array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-common.css',
                        'version' => 10,
                        'browser' => false
                    );
                }
                break;
            case 'game_class_index':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-class.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'game_class':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-common.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/game/game-class.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'faction':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/faction.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'account_status':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/forums.css',
                        'version' => 17,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/cms-common.css',
                        'version' => 17,
                        'browser' => false
                    )
                );
                break;
            case 'auction_lots':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/profile-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/auction.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/character/auction-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6'
                    )
                );
                break;
			case 'services':
				$css_data_page = array(
					array(
						'path' => WoW::GetWoWPath() . '/wow/static/css/services-index.css',
						'version' => 10,
						'browser' => false,
					),
				);
				break;
            case 'zones':
                $css_data_page =array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki-ie.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/zone.css',
                        'version' => 10,
                        'browser' => false
                    )
                );
                break;
            case 'zone':
                $css_data_page =array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki-ie.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/zone.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/lightbox.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/comments.css',
                        'version' => 20,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 10,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6',
                    )
                );
                break;
            case 'boss':
                $css_data_page =array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/wiki-ie.css',
                        'version' => 10,
                        'browser' => 'IE'
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/wiki/boss.css',
                        'version' => 14,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/lightbox.css',
                        'version' => 10,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/local-common/css/cms/comments.css',
                        'version' => 20,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms.css',
                        'version' => 10,
                        'browser' => false,
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/cms-ie6.css',
                        'version' => 10,
                        'browser' => 'IE 6',
                    )
                );
                break;
            case 'pvp_arena':
            case 'pvp_arena_ladder':
                $css_data_page = array(
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/pvp/pvp.css',
                        'version' => 11,
                        'browser' => false
                    ),
                    array(
                        'path' => WoW::GetWoWPath() . '/wow/static/css/pvp/pvp-ie6.css',
                        'version' => 11,
                        'browser' => 'IE 6'
                    )
                );
                break;
        }
        $cssList = array_merge($css_data, $css_data_page);
        $cssList[] = array(
            'path' => sprintf('%s/wow/static/local-common/css/locale/%s.css', WoW::GetWoWPath(), WoW_Locale::GetLocale(LOCALE_DOUBLE)),
            'version' => 15,
            'browser' => false
        );
        $cssList[] = array(
            'path' => sprintf('%s/wow/static/css/locale/%s.css', WoW::GetWoWPath(), WoW_Locale::GetLocale(LOCALE_DOUBLE)),
            'version' => 15,
            'browser' => false
        );
        $css_str = '';
        foreach($cssList as &$sheet) {
            $css_str .= self::PrintCSS($sheet['path'], $sheet['version'], $sheet['browser']);
        }
        return $css_str;
    }
    
    private static function PrintCSS($path, $version = 0, $browser = false, $media = false) {
        if(!$browser) {
            return sprintf("<link rel=\"stylesheet\" type=\"text/css\" media=\"%s\" href=\"%s?v%d\" />\n", $media ? $media : 'all', $path, $version);
        }
        else {
            return sprintf("<!--[if %s]><link rel=\"stylesheet\" type=\"text/css\" media=\"%s\" href=\"%s?v%d\" /><![endif]-->\n", $browser, $media ? $media : 'all', $path, $version);
        }
    }
    
    public static function GetPageTitle() {
        switch(WoW_Template::GetPageIndex()) {
            case 'character_profile_simple':
            case 'character_profile_advanced':
                return sprintf('%s @ %s - %s - ' , WoW_Characters::GetName(), WoW_Characters::GetRealmName(), WoW_Locale::GetString('template_menu_game'));
            case 'character_talents':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_profile_talents'), WoW_Locale::GetString('template_menu_game'));
            case 'character_achievements':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_profile_achievements'), WoW_Locale::GetString('template_menu_game'));
            case 'character_reputation':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_profile_reputation'), WoW_Locale::GetString('template_menu_game'));
            case 'character_statistics':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_profile_statistics'), WoW_Locale::GetString('template_menu_game'));
            case 'character_pvp':
                return sprintf('PvP - %s - ', WoW_Locale::GetString('template_menu_game'));
            case 'character_feed':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_character_feed'), WoW_Locale::GetString('template_menu_game'));
            case 'item':
                return sprintf('%s - ', WoW_Template::GetPageData('itemName'));
            case 'item_list':
                return sprintf('%s - ', WoW_Template::GetPageData('last-crumb'));
            case 'guild_page':
                return sprintf('%s @ %s - ', WoW_Guild::GetGuildName(), WoW_Guild::GetGuildRealmName());
            case 'guild_perks':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_guild_menu_perks'), WoW_Locale::GetString('template_menu_game'));
            case 'guild_roster':
            case 'guild_professions':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_guild_menu_roster'), WoW_Locale::GetString('template_menu_game'));
            case 'search':
                return WoW_Search::GetSearchQuery() != null ? sprintf('%s - %s - ', WoW_Search::GetSearchQuery(), WoW_Locale::GetString('template_search')) : sprintf('%s - ', WoW_Locale::GetString('template_search'));
            case 'realm_status':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_realm_status'), WoW_Locale::GetString('template_menu_game'));
            case 'blog':
                return sprintf('%s - ', WoW_Template::GetPageData('blog_title'));
            case 'game':
                return sprintf('%s - ', WoW_Locale::GetString('template_menu_game'));
            case 'game_guide_what_is_wow':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_menu_game_guide_what_is_wow'), WoW_Locale::GetString('template_menu_game'));
            case 'game_guide_getting_started':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_menu_game_guide_getting_started'), WoW_Locale::GetString('template_menu_game'));
            case 'game_guide_how_to_play':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_menu_game_guide_how_to_play'), WoW_Locale::GetString('template_menu_game'));
            case 'game_guide_playing_together':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_menu_game_guide_playing_together'), WoW_Locale::GetString('template_menu_game'));
            case 'game_guide_late_game':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_menu_game_guide_late_game'), WoW_Locale::GetString('template_menu_game'));
            case 'game_race_index':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_game_race_index'), WoW_Locale::GetString('template_menu_game'));
            case 'game_race':
                return sprintf('%s - %s - ', WoW_Locale::GetString('character_race_' . WoW_Template::GetPageData('raceId')), WoW_Locale::GetString('template_menu_game'));
            case 'game_class_index':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_game_class_index'), WoW_Locale::GetString('template_menu_game'));
            case 'game_class':
                return sprintf('%s - %s - ', WoW_Locale::GetString('character_class_' . WoW_Template::GetPageData('classId')), WoW_Locale::GetString('template_menu_game'));
            case 'password_reset':
                return sprintf('%s - Battle.Net', WoW_Locale::GetString('login_help_title'));
            case 'password_reset_select':
            case 'password_reset_secred_answer':
            case 'password_reset_success':
            case 'password_reset_confirm':
            case 'password_reset_changed':
                return sprintf('%s - Battle.Net', WoW_Locale::GetString('template_account_password_reset_title'));
            case 'dashboard':
                return sprintf('%s - Battle.Net', WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion()));
            case 'landing':
                switch(WoW_Template::GetPageData('landing')) {
                    case 'what_is':
                        return sprintf('%s - Battle.Net', WoW_Locale::GetString('template_bn_what_is_it_title'));
                }
                break;
            case 'creation_tos':
            case 'creation_success':
            case 'account_conversion':
            case 'management':
                return WoW_Locale::GetString('template_management_main_title'); //[PH]
            case 'auction_lots':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_auction_menu_lots'), WoW_Locale::GetString('template_menu_game'));
            case 'forum_index':
                return sprintf('%s - ', WoW_Locale::GetString('template_menu_forums'));
            case 'forum_category':
                return sprintf('%s - %s - ', WoW_Template::GetPageData('forum_category_title'), WoW_Locale::GetString('template_menu_forums'));
            case 'forum_thread':
                return sprintf('%s - %s - ', WoW_Template::GetPageData('forum_thread_title'), WoW_Locale::GetString('template_menu_forums'));
            case 'forum_blizztracker':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_blizztracker_title'), WoW_Locale::GetString('template_menu_forums'));
            case 'zones':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_game_dungeons_and_raids'), WoW_Locale::GetString('template_menu_game'));
            case 'zone':
                return sprintf('%s - %s - ' , WoW_Template::GetPageData('zone_name'), WoW_Locale::GetString('template_menu_game'));
            case 'pvp_arena':
                return sprintf('PvP - %s - ', WoW_Locale::GetString('template_menu_game'));
            case 'character_companions_mounts':
                return sprintf('%s - %s - ', WoW_Locale::GetString('template_profile_' . WoW_Template::GetPageData('category') . 's'), WoW_Locale::GetString('template_menu_game'));
            default:
                return '';
        }
    }
    
    public static function PrintMainMenu() {
        $main_menu = "<ul id=\"menu\">\n%s\n</ul>";
        $menu_item = '<li class="%s"><a href="%s/wow/%s%s" class="%s"><span>%s</span></a></li>';
        $full_menu = null;
        $global_menu = WoW_Template::GetMainMenu();
        foreach($global_menu as &$menu) {
            $full_menu .= sprintf($menu_item, $menu['key'], WoW::GetWoWPath(), WoW_Locale::GetLocale(), $menu['href'], (WoW_Template::GetMenuIndex() == $menu['key']) ? 'active' : null, $menu['title']);
            $full_menu .= "\n";
        }
        return sprintf($main_menu, $full_menu);
    }
}
?>
