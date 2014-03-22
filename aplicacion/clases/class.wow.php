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
            $errorMessage .= '<li>You have outdated DB (current version: ' . DB_VERSION . ', your version: ' . ($database_revision != null ? $database_revision : '<none>') . '). Please, update project DB with SQL updates from <strong style="color:#0097cc">"sql/updates"</strong> folder.</li>';
        }
        if(CONFIG_VERSION != WoWConfig::$ConfigVersion) {
            $errorMessage .= '<li>You have outdated configuration file (current version: ' . CONFIG_VERSION . ', your version: ' . WoWConfig::$ConfigVersion . '). Please, update WoWConfig.php from WoWConfig.php.default.</li>';
        }
        if($errorMessage != '') {
            die('
		<head>

			<title>BattleCMS</title>

			<!--[if IE]>
			<meta content="false" http-equiv="imagetoolbar" />
			<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
			<![endif]-->

			<meta name="robots" content="none" />
			<meta http-equiv="refresh" content="120" />

			<link rel="icon" type="image/png" href="' . WoW::GetWoWPath() . '/static/local-common/images/favicons/root.png" />
			<!--[if IE]>
			<link rel="shortcut icon" type="image/x-icon" href="' . WoW::GetWoWPath() . '/static/local-common/images/favicons/root.ico" />
			<![endif]-->

			<style>
			html, body, div, span, object, iframe, h1, p, img { margin: 0; padding: 0; border: 0; outline: 0; font-size: 100%; }
			html, body { background: #000 url("' . WoW::GetWoWPath() . '/estatico/acdev/bg-top.jpg") 50% 0 no-repeat; color: #aaafb8; font: normal 12px/1.5 "Trebuchet MS", "Arial", sans-serif; }

			a { color:#007ca5; text-decoration: none; }
			a:hover,
			a:focus { color: #0c536a; }

			::-moz-selection { color: #eee;  background: #006a9b; }
			::selection { color: #eee;  background: #006a9b; }

			.wrapper { width: 960px; margin: 0 auto; }

			.notice { width: 500px; margin: 0 auto; }
			.notice .logo { padding: 48px 0; margin: 0 auto; width: 402px; height: 92px; overflow: hidden; overflow: hidden; -moz-user-select: none; -webkit-user-select: none; user-select: none; }
			.notice .logo span { text-indent: -9999px; display: block; width: 402px; height: 92px; overflow: hidden; background: url("' .  WoW::GetWoWPath() . '/estatico/acdev/bnet-cms.png"); }

			.info { padding: 32px; background: #07090b; background: rgba(0,0,0,.42); -moz-border-radius: 16px; -webkit-border-radius: 16px; border-radius: 16px; }
			.info .title { text-align: center; font-size: 44px; line-height: 1.25; letter-spacing: -.05em; color: #fff; font-family: "Lucida Sans Unicode", "Lucida Grande", "Arial", sans-serif; }
			.info .short { font-size: 16px; line-height: 1.5; margin: 1.5em 0; color: #aaafb8; }
			.info .twitter { color: #7499b2; font-size: 20px; font-family: "Georgia", "Times New Roman", "Times", serif; padding: 16px 100px 16px 16px; background: #2a3035 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD4AAAArCAMAAAAXBMteAAAAM1BMVEUqMDVPZXRLXmx0mbI9SlRYcYNmhZprjKIvNz1BUVxhf5M4RE1vkqozPUVdeItGWGRTa3sDgm/dAAAAAXRSTlMAQObYZgAAATxJREFUeF6dldeOhDAMRV3SK///tbujjBBDTArnFR079g0Ay0SEt7iAlm3F+srOhhvlVe+vbci90ZttD8oDAYuX7YNPTH3WPw2E+oqvhAwyvi3Hy0c/SRFkbHtufxdUmdd8fzZAdy3a+W62o6Sz1HySPjHfT2BYQIm2U/o6o29rFwiizjc0gGYRMT3T+ZllSE7+TmqCvLxItyE0LxMsM8cuug1SH0DWaVE26KDXj7BmF1T/3Cr4xDsc8EvckU0/e11UNVIUs7dLk8MjHstUrzDAsIz8xu/Pr2EATfU80t1sewhDHIZRBXud3Ev5qTTQfwVNnY0boTlj1MbN0cIP1J5XMJKdZSb4zCl84AkkRlV4ieRBBlfskOGJOL/oBCMoDWV0MMbhY2K2yTN8kRprD8soDJcpTKEI26hGngp/RZwUt0YqVl8AAAAASUVORK5CYII=) no-repeat 350px center; -moz-border-radius: 12px; -webkit-border-radius: 12px; border-radius: 12px; line-height: 1.25; }

			.footer { border-top: 1px solid #414a56; font-size: 10px; text-transform: uppercase; padding: 12px 0; margin: 32px 0; -moz-user-select: none; -webkit-user-select: none; user-select: none; font-family: "Lucida Sans Unicode", "Lucida Grande", "Arial", sans-serif; }
			.footer .copyright { color: #2a2c2f; display: inline-block; vertical-align: top; margin: 0 1em 0 0; }
			.footer .legal { display: inline-block; vertical-align: top; }
			.footer .legal a { display: inline-block; vertical-align: top; color: #b2bac7; margin: 0 .5em 0 0; }
			.footer .legal a:hover,
			.footer .legal a:focus { color: #dcdcdc; }
			.footer .language { color: #697489; float: right; display: inline-block; vertical-align: top; text-align: right; white-space: nowrap; }
			.footer .privacy { margin: 32px 0 0 0; text-align: right; }
			.footer .privacy a { display: inline-block; vertical-align: top; }
			.footer .privacy img { border: 0; }
			.footer .contact { margin: 32px 0 0 0; text-align: center; color: #9b9898; text-transform: none; }

			body.ko-kr { font-family: "Dotum", "돋움", "Helvetica", "AppleGothic", sans-serif; }
			body.ko-kr .info .title,
			body.ko-kr .info .twitter,
			body.ko-kr .footer { font-family: "Malgun Gothic", "맑은 고딕", "AppleGothic", "Dotum", "돋움", "Trebuchet MS", "Arial", sans-serif; }
			body.ko-kr .footer { font-size: 11px; }

			body.zh-cn,
			body.zh-cn .info .title,
			body.zh-cn .info .twitter,
			body.zh-cn .footer { font-family: "微软雅黑", "Microsoft YaHei", "Helvetica", "Tahoma", "StSun", "宋体", "SimSun", sans-serif; }
			body.zh-cn .info .twitter { font-size: 16px; }
			body.zh-cn .footer { font-size: 12px; }
			body.zh-cn .notice .logo span { background: url("' . WoW::GetWoWPath() . '/estatico/acdev/bnet-cms.png"); }
			body.zh-cn .info .twitter { line-height: 1.5; background-image: url(data:image/png;base64,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); }
			body.zh-cn .short { text-align: center; }

			body.zh-tw,
			body.zh-tw .info .title,
			body.zh-tw .info .twitter,
			body.zh-tw .footer { font-family: "微軟正黑", "Microsoft JhengHei", "Helvetica", "Tahoma", "新明細體", "PMingLiU", "SimSun", sans-serif; }
			body.zh-tw .info .twitter { line-height: 1.5; }
			body.zh-tw .footer { font-size: 12px; }
			</style>

			<!--[if LT IE 9]>
			<style>
			.notice .logo span { background-image: url("' . WoW::GetWoWPath() . '/estatico/acdev/bnet-cms.png"); }
			.info .twitter { background-image: url("' . WoW::GetWoWPath() . '/static/maintenance/bnet/images/twitter.png"); }
			.footer .copyright { zoom: 1; float: left; }
			.footer .legal { zoom: 1; float: left; }
			.footer .legal a { zoom: 1; float: left; }
			.footer .language { zoom: 1; white-space: normal; }
			.footer .privacy a { zoom: 1; }

			body.zh-cn .notice .logo span { background-image: url("' . WoW::GetWoWPath() . '/estatico/acdev/bnet-cms.png"); }
			body.zh-cn .info .twitter { background-image: url("' . WoW::GetWoWPath() . '/static/maintenance/bnet/images/twitter-cn.png"); }
			</style>

		</head>
		<body class="' .  WoW_Locale::GetLocale(LOCALE_DOUBLE) . '">

			<div class="wrapper">

				<!-- Contenido de la pagina-->

				<div class="notice" id="' .  WoW_Locale::GetLocale(LOCALE_DOUBLE) . ':notice">
					<h1 class="logo"><span>Battle.net</span></h1>
					<div class="info">
						<div class="title">Some error(s) appeared during core self testing:</div>
						<p class="short"><ul>' . $errorMessage . '</ul>Please, solve this problem(s) and <a href="">refresh</a> this page again.</p>
						<br />
						<div class="twitter">
							<li>For updates, follow <a tabindex="1" target="_blank" href="http://www.twitter.com/ApocalypseTeamDev">@ApocalypseTeamDev</a> on Twitter.
							<br />
							<a tabindex="1" target="_blank" href="https://www.facebook.com/Apocalypsecore">@Apocalypsecore</a> on Facebook.</li>
							<li>Contact Us: <a href="mailto:info@Apocalypsecore.tk">info@Apocalypsecore.tk</a></li>
						</div>
					</div>
				</div>
			</div>
        <div class="footer" id="' .  WoW_Locale::GetLocale(LOCALE_DOUBLE) . ':footer">

            <span class="copyright">©2013 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="sitemap">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Terms of Use</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Privacy Policy</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright Infringement</a>
            </span>

            <span class="language">Americas – English (US) </span>

			<div id="blizzard" class="png-fix">
				<a href="http://apocalypsecore.tk" tabindex="100">
					<img src="' . WoW::GetWoWPath() . '/wow/static/local-common/images/logos/blizz-wow.png" alt="" />
				</a>
			</div>

        </div>
		</body>');
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
