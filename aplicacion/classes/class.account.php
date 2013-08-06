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
 * WoW_Account class
 * 
 * This is account class which allows to perform some specific operations such as:
 *  - User authorization
 *  - User logout
 *  - User's characters loading
 *  - User's characters handling
 *  etc.
 * 
 * @package WoWCS
 * @author  Shadez <https://github.com/Shadez>
 **/
Class WoW_Account {
    
    /**
     * User ID (from DB)
     * @access    private
     * @staticvar int $userid
     * @return    int
     **/
    private static $userid = 0;
    
    /**
     * User name (from DB)
     * @access    private
     * @staticvar string $username
     * @return    string
     **/
    private static $username = null;
    
    /**
     * User password
     * @access    private
     * @staticvar string $password
     * @return    string
     **/
    private static $password = null;
    
    /**
     * User sha1 hash (from DB)
     * @access    private
     * @staticvar string $sha_pass_hash
     * @return    string
     **/
    private static $sha_pass_hash = null;
    
    /**
     * User access level (from DB)
     * @access    private
     * @staticvar int $gm_level
     * @return    int
     **/
    private static $gm_level = 0;
    
    /**
     * User E-Mail address (from DB)
     * @access    private
     * @staticvar string $email
     * @return    string
     **/
    private static $email = null;
    
    /**
     * User expansion level (from DB)
     * @access    public
     * @staticvar int $expansion
     * @return    int
     **/
    private static $expansion = 0;
    
    /**
     * User's characters storage
     * @access    private
     * @staticvar array $characters_data
     * @return    array
     **/
    private static $characters_data = array();
    
    /**
     * Last error code (account class)
     * @access    private
     * @staticvar int $last_error_code
     * @return    int
     **/
    private static $last_error_code = 0;
    
    /**
     * User session ID (from DB)
     * @access    private
     * @staticvar string $sid
     * @return    string
     **/
    private static $sid = null;
    
    /**
     * User session hash
     * @access    private
     * @staticvar string $session_hash
     * @return    string
     **/
    private static $session_hash = null;
    
    /**
     * User session string (saved as session data)
     * @access    private
     * @staticvar string $session_string
     * @return    string
     **/
    private static $session_string = null;
    
    /**
     * User's login state
     * @access    private
     * @staticvar int $login_state
     * @return    int
     **/
    private static $login_state = null;
    
    /**
     * User login time (Unix Timestamp)
     * @access    private
     * @staticvar int $login_time
     * @return    int
     **/
    private static $login_time = null;
    
    /**
     * User's country code
     * @access    private
     * @staticvar string $country_code
     * @return    string
     **/
    private static $country_code = '';
    
    /**
     * User (pseudo-) Battle.Net ID. Used as user's real name index.
     * @access     private
     * @staticvar  int $bnet_id
     * @deprecated
     * @return     int
     **/
    private static $bnet_id = 0;
    
    /**
     * User's first name
     * @access    private
     * @staticvar string $first_name
     * @return    string
     **/
    private static $first_name = null;
    
    /**
     * User's last name
     * @access    private
     * @staticvar string $last_name
     * @return    string
     **/
    private static $last_name = null;
    
    /**
     * Selected character
     * @access    private
     * @staticvar array $active_character
     * @return    array
     **/
    private static $active_character = array();
    
    /**
     * Characters storage checker
     * @access    private
     * @staticvar bool $characters_loaded
     * @return    bool
     **/
    private static $characters_loaded = false;
    
    /**
     * Selected character's info
     * @access    private
     * @staticvar array $character_info
     * @return    array
     **/
    private static $character_info = array();
    
    /**
     * Selected character's friends data
     * @access    private
     * @staticvar array $friends_data
     * @return    array
     **/
    private static $friends_data = array();
    
    /**
     * Ban checker
     * @access    private
     * @staticvar bool $is_banned;
     * @deprecated
     * @return    bool
     **/
    private static $is_banned = false;
    
    /**
     * Number of created game accounts on realm
     * @access    private
     * @staticvar int $myGames;
     * @return    int
     **/
    private static $myGames = 0;
    
    /**
     * Array of created game accounts on realm associated with user
     * @access    private
     * @staticvar array $myGamesList;
     * @return    array
     **/
    private static $myGamesList = array();
    
    /**
     * All realm game accounts data
     * @access    private
     * @staticvar array $userGames;
     * @return    array
     **/
    private static $userGames = array();
    
    private static $gameAccountData = array();
    
    /**
     * Return Q&A, userdatas for recovery password
     * @access    private
     * @staticvar array $password_recovery_data;
     * @return    array
     **/
    private static $password_recovery_data = array();
    
    /**
     * Selected account data for WoW dashboard page
     * @access    private
     * @staticvar array $dashboard_account
     * @return    array
     **/
    private static $dashboard_account = array();
    
    /**
     * Class constructor.
     * 
     * @access   public
     * @static   WoW_Account::Initialize()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function Initialize() {
        if(self::GetSessionInfo('wow_sid') != null) {
            // Build account info from session hash.
            return self::BuildAccountInfo();
        }
        return true;
    }
    
    /**
     * Returns true if user is logged in and false if not.
     * 
     * @access   public
     * @static   WoW_Account::IsLoggedIn()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function IsLoggedIn() {
        return self::GetSessionInfo('wow_sid') != null;
    }
    
    /**
     * Returns true if user is banned and false if not.
     * 
     * @access   public
     * @static   WoW_Account::IsBanned()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function IsBanned() {
        return isset(self::$dashboard_account['banned']) ? self::$dashboard_account['banned'] : false;
    }
    
    /**
     * Re-builds account info from session data (if exists).
     * 
     * @access   public
     * @static   WoW_Account::BuildAccountInfo()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function BuildAccountInfo() {
        if(!self::GetSessionInfo('wow_sid')) {
            WoW_Log::WriteError('%s : unable to build info: session was not found.', __METHOD__);
            return false;
        }
        self::$session_string = self::GetSessionInfo('wow_sid_string');
        self::$session_hash = md5(self::$session_hash);
        self::$sid = md5(self::$session_hash);
        $sess_data = explode(':', self::$session_string);
        if(!is_array($sess_data)) {
            self::DestroyUserData();
            self::DestroySession();
            WoW_Log::WriteError('%s : broken session data, unable to continue.', __METHOD__);
            return false;
        }
        self::$userid = $sess_data[0];
        self::$username = self::NormalizeStringForSessionString($sess_data[1], NORMALIZE_FROM);
        self::$password = self::NormalizeStringForSessionString($sess_data[2], NORMALIZE_FROM);
        self::$sha_pass_hash = self::NormalizeStringForSessionString($sess_data[3], NORMALIZE_FROM);
        self::$login_time = $sess_data[5];
        self::$first_name = self::NormalizeStringForSessionString($sess_data[6], NORMALIZE_FROM);
        self::$last_name = self::NormalizeStringForSessionString($sess_data[7], NORMALIZE_FROM);
        self::$country_code = $sess_data[8];
        self::SetLoginState(ACCMGR_LOGGED_IN);
        return true;
    }
    
    /**
     * Creates SHA1 hash for EMAIL:PASSWORD combination.
     * 
     * @access   public
     * @static   WoW_Account::CreateShaPassHash()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function CreateShaPassHash() {
        if(!self::$email || !self::$password) {
            WoW_Log::WriteError('%s : username/password was not defined!', __METHOD__);
            return false;
        }
        self::$sha_pass_hash = sha1(strtoupper(self::$email) . ':' . strtoupper(self::$password));
        return true;
    }
    
    /**
     * Sets username.
     * 
     * @access   public
     * @static   WoW_Account::SetUserName(string $username)
     * @param    string $username
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetUserName($username) {
        self::$username = addslashes($username);
        return true;
    }
    
    /**
     * Sets password
     * 
     * @access   public
     * @static   WoW_Account::SetPassword(string $password)
     * @param    string $password
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetPassword($password) {
        self::$password = $password;
    }
    
    /**
     * Sets email
     * 
     * @access   public
     * @static   WoW_Account::SetEmail(string $email)
     * @param    string $email
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetEmail($email) {
        self::$email = $email;
    }
    
    /**
     * Returns user BNID
     * 
     * @access   public
     * @static   WoW_Account::GetUserID()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetUserID() {
        return self::$userid;
    }
    
    /**
     * Returns user name
     * 
     * @access   public
     * @static   WoW_Account::GetUserName()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetUserName() {
        return self::$username;
    }
    /**
     * Returns user password
     * 
     * @access   public
     * @static   WoW_Account::GetPassword()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetPassword() {
        return self::$password;
    }
    
    /**
     * Returns first name
     * 
     * @access   public
     * @static   WoW_Account::GetFirstName()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetFirstName() {
        if(self::$first_name) {
            return self::$first_name;
        }
        return self::$username;
    }
    
    /**
     * Returns last name
     * 
     * @access   public
     * @static   WoW_Account::GetLastName()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetLastName() {
        if(self::$last_name) {
            return self::$last_name;
        }
        return self::$username;
    }
    
    
    /**
     * Returns full name
     * 
     * @access   public
     * @static   WoW_Account::GetFullName()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetFullName() {
        if(self::GetFirstName() == self::GetLastName()) {
            return self::GetFirstName(); // Account name
        }
        return self::GetFirstName() . ' ' . self::GetLastName();
    }
    
    /**
     * Returns user SHA1 hash for LOGIN:PASSWORD combination.
     * 
     * @access   public
     * @static   WoW_Account::GetShaPassHash()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetShaPassHash() {
        if(!self::$sha_pass_hash) {
            self::CreateShaPassHash();
        }
        return self::$sha_pass_hash;
    }
    
    /**
     * Returns all realm game accounts
     * 
     * @access   public
     * @static   WoW_Account::GetUserGames()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetUserGames() {
        return self::$userGames;
    }
    
    /**
     * Returns GM Level
     * 
     * @access   public
     * @static   WoW_Account::GetGMLevel()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetGMLevel() {
        return self::$gm_level;
    }
    
    /**
     * Returns E-mail address
     * 
     * @access   public
     * @static   WoW_Account::GetEmail()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetEmail() {
        return self::$email;
    }
    
    /**
     * Returns login timestamp
     * 
     * @access   public
     * @static   WoW_Account::GetLoginTimeStamp()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetLoginTimeStamp() {
        return self::$login_time;
    }
    
    /**
     * Returns account expansion
     * 
     * @access   public
     * @static   WoW_Account::GetExpansion()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetExpansion() {
        return isset(self::$dashboard_account['expansion']) ? self::$dashboard_account['expansion'] : 0;
    }
    
    /**
     * Returns country code
     * 
     * @access   public
     * @static   WoW_Account::GetCountryCode()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetCountryCode() {
        return self::$country_code;
    }
    
    /**
     * Returns account characters
     * 
     * @access   public
     * @static   WoW_Account::GetCharactersData()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetCharactersData() {
        if(!self::IsCharactersLoaded()) {
            self::LoadCharacters();
        }
        return self::$characters_data;
    }
    
    /**
     * Adds new error code to the last error code mask
     * 
     * @access   public
     * @static   WoW_Account::SetLastErrorCode($code)
     * @param    int $code
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetLastErrorCode($code) {
        self::$last_error_code |= $code;
        return true;
    }
    
    /**
     * Returns account characters
     * 
     * @access   public
     * @static   WoW_Account::GetLastErrorCode()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetLastErrorCode() {
        return self::$last_error_code;
    }
    
    /**
     * Drops last error code
     * 
     * @access   public
     * @static   WoW_Account::DropLastErrorCode()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function DropLastErrorCode() {
        self::$last_error_code = ERROR_NONE;
        return true;
    }
    
    /**
     * Changes login state
     * 
     * @access   public
     * @static   WoW_Account::SetLoginState($state)
     * @param    int $state
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetLoginState($state) {
        self::$login_state = $state;
        return true;
    }
    
    /**
     * Returns number of created game accounts on realm
     * 
     * @access   public
     * @static   WoW_Account::GetMyGames()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetMyGames() {
        return self::$myGames;
    }
    
    /**
     * Creates new session
     * 
     * @access   private
     * @category Account Manager Class
     * @static   WoW_Account::CreateSession()
     * @return   bool
     **/
    private static function CreateSession() {
        self::$session_string = sprintf('%d:%s:%s:%s:%s:%d:%s:%s:%s',
            self::GetUserID(), // [0]
            self::NormalizeStringForSessionString(self::GetEmail(), NORMALIZE_TO), // [1]
            self::NormalizeStringForSessionString(self::GetPassword(), NORMALIZE_TO), // [2]
            self::GetShaPassHash(),    // [3]
            $_SERVER['REMOTE_ADDR'],    // [4]
            self::GetLoginTimeStamp(), // [5]
            self::NormalizeStringForSessionString(self::$first_name, NORMALIZE_TO), // [6]
            self::NormalizeStringForSessionString(self::$last_name, NORMALIZE_TO),  // [7]
            self::$country_code // [8]
        );
        self::$session_hash = md5(self::$session_string);
        self::$sid = md5(self::$session_hash);
        $_SESSION['wow_sid'] = self::$sid;
        $_SESSION['wow_sid_string'] = self::$session_string;
        $_SESSION['wow_sid_hash'] = self::$session_hash;
        $_SESSION['wow_logged_in'] = true;
        $_SESSION['wow_account_hash'] = sprintf('EU-%d-%s', rand(), md5(rand()));
        $_SESSION['wow_ban'] = self::$is_banned;
        return true;
    }
    
    /**
     * Destroys active session
     * 
     * @access   private
     * @static   WoW_Account::DestroySession()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function DestroySession() {
        if(!isset($_SESSION['wow_sid'])) {
            return true; // Already destroyed
        }
        self::$session_string = null;
        self::$session_hash = null;
        self::$sid = null;
        unset($_SESSION['wow_sid'], $_SESSION['wow_sid_string'], $_SESSION['wow_sid_hash'], $_SESSION['wow_logged_in']);
        return true;
    }
    
    /**
     * Destroys user data
     * 
     * @access   private
     * @static   WoW_Account::DestroyUserData()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function DestroyUserData() {
        self::$userid = 0;
        self::$username = null;
        self::$password = null;
        self::$sha_pass_hash = null;
        self::$login_state = ACCMGR_LOGGED_OFF;
        self::$login_time = 0;
        self::$email = null;
        self::$gm_level = 0;
        self::$last_error_code = ERROR_NONE;
        self::$characters_data = array();
        self::$first_name = null;
        self::$last_name = null;
        self::$bnet_id = 0;
        self::$is_banned = false;
        self::$expansion = 0;
        return true;
    }
    
    /**
     * Returns some session info
     * 
     * @access   private
     * @static   WoW_Account::GetSessionInfo()
     * @category Account Manager Class
     * @param    string $info
     * @return   string
     **/
    public static function GetSessionInfo($info) {
        if(!isset($_SESSION[$info])) {
            return null;
        }
        return $_SESSION[$info];
    }
    
    /**
     * Replace ":" (colon) to special string and vice-versa
     * 
     * @access   private
     * @static   WoW_Account::NormalizeStringForSessionString($string, $action = NORMALIZE_TO)
     * @param    string $string
     * @param    int $action = NORMALIZE_TO
     * @category Account Manager Class
     * @return   string
     **/
    private static function NormalizeStringForSessionString($string, $action = NORMALIZE_TO) {
        switch($action) {
            case NORMALIZE_TO:
            default:
                $string = str_replace(':', '__WOWCSSTRING__', $string);
                break;
            case NORMALIZE_FROM:
                $string = str_replace('__WOWCSSTRING__', ':', $string);
                break;
        }
        return $string;
    }
    
    /**
     * Login handler
     * 
     * @access   public
     * @static   WoW_Account::PerformLogin($username, $password)
     * @param    string $email
     * @param    string $password
     * @category Account Manager Class
     * @return   bool
     **/
    public static function PerformLogin($username, $password, $persistLogin = false, $from_cookie_session = false) {
//        self::SetEmail($email);
        self::SetEmail($username);
        self::SetPassword($password);
        ($from_cookie_session == true) ? (self::$sha_pass_hash=$password) : self::CreateShaPassHash();
        // No SQL injection
        $user_data = DB::WoW()->selectRow("SELECT `id`, `first_name`, `last_name`, `email`, `sha_pass_hash`, `country_code` FROM `DBPREFIX_users` WHERE `email` = '%s' LIMIT 1", self::GetEmail());
        if(!$user_data) {
            WoW_Log::WriteLog('%s : user %s was not found in `DBPREFIX_users` table!', __METHOD__, self::GetEmail());
            self::SetLastErrorCode(ERROR_WRONG_USERNAME_OR_PASSWORD);
            return false;
        }
        if($user_data['sha_pass_hash'] != self::GetShaPassHash()) {
            WoW_Log::WriteLog('%s : user %s tried to perform login with wrong password!', __METHOD__, self::GetEmail());
            self::SetLastErrorCode(ERROR_WRONG_USERNAME_OR_PASSWORD);
            return false;
        }
        self::$userid = $user_data['id'];
        self::$first_name = $user_data['first_name'];
        self::$last_name = $user_data['last_name'];
        self::$country_code = $user_data['country_code'];
        self::UserGames();
        
        self::CreateSession();
        self::SetLoginState(ACCMGR_LOGGED_IN);
        self::$login_time = time();
        self::DropLastErrorCode(); // All fine, we can drop it now.
        if($persistLogin || isset($_COOKIE['wow_session'])) {
            self::saveToCookieSession();
        }
        
        return true;
    }
    
    public static function loadFromCookieSession() {
        $user_data = DB::WoW()->selectRow("SELECT `email`, `sha_pass_hash` FROM `DBPREFIX_users` WHERE `cookie_session_key` = '%s' LIMIT 1", $_COOKIE['wow_session']);
        if(!$user_data) {
            WoW_Log::WriteLog('%s : cookie_session %s was not found in `DBPREFIX_users` table!', __METHOD__, $_COOKIE['wow_session']);
            unset($_COOKIE['wow_session']); 
            return false;
        }
        else {
            self::PerformLogin($user_data['email'], $user_data['sha_pass_hash'], true, true);
            return true;
        }
    }
    
    public static function saveToCookieSession() {
        $cookie_session = sha1(self::$email.'='.time().'/'.self::$userid);
        
        if(DB::WoW()->query("UPDATE `DBPREFIX_users` SET `cookie_session_key` = '%s' WHERE `first_name` = '%s' AND `email` = '%s' LIMIT 1", $cookie_session, self::$first_name, self::$email)) {
            setcookie('wow_session', $cookie_session, strtotime('NEXT YEAR'), '/');
            return true;
        }
        else {
            return false;
        }
    }
    
    /**
     * Game accounts handler
     * 
     * @access   public
     * @static   WoW_Account::UserGames()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function UserGames() {
        self::$myGames = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_users_accounts` WHERE `id` = %d", self::GetUserID());
        self::$myGamesList = DB::WoW()->select("SELECT `account_id` FROM `DBPREFIX_users_accounts` WHERE `id` = %d", self::GetUserID());
        $account_ids = array();
        $count = count(self::$myGamesList);
        for($i = 0; $i < $count; ++$i) {
            $account_ids[] = self::$myGamesList[$i]['account_id'];
        }
        if(!empty($account_ids)) {
            self::$userGames = DB::Realm()->select("SELECT a.*, b.`bandate`, b.`unbandate`, b.`banreason`, b.`bannedby`, b.`active` AS `active_ban` FROM `account` a LEFT JOIN `account_banned` b ON b.`id` IN (%s) WHERE a.`id` IN (%s)", $account_ids, $account_ids);     
        }
        
        for($i=0;$i<count(self::$userGames);$i++) {
            self::$gameAccountData[strtolower(self::$userGames[$i]['username'])] = self::$userGames[$i];
        }
        return true;
    }
    
    /**
     * Game accounts registration
     * 
     * @access   public
     * @static   WoW_Account::RegisterGameAccount($account_data)
     * @param    array $account_data
     * @category Account Manager Class
     * @return   bool
     **/
    public static function RegisterGameAccount($account_data) {
        if(!isset($account_data['username']) || !isset($account_data['sha'])) {
            return false;
        }
        if(DB::Realm()->selectCell("SELECT 1 FROM `account` WHERE `username` = '%s' LIMIT 1", $account_data['username'])) {
            WoW_Template::SetPageData('creation_error', true);
            return false;
        }
        if(DB::Realm()->query("INSERT INTO `account` (`username`, `sha_pass_hash`, `email`, `expansion`) VALUES ('%s', '%s', '%s', %d)", $account_data['username'], $account_data['sha'], self::GetUserName(), WoWConfig::$DefaultExpansion)) {
            $account_data['id'] = DB::Realm()->selectCell("SELECT `id` FROM `account` WHERE `username` = '%s' LIMIT 1", $account_data['username']);
            DB::WoW()->query("INSERT INTO `DBPREFIX_users_accounts` (`id`, `account_id`) VALUES ('%s', '%s')", self::GetUserID(), $account_data['id']);
        }
        self::UserGames();
        return true;
    }
    
    /**
     * Logoff user. Destroy session/user data from here.
     * 
     * @access   public
     * @static   WoW_Account::PerformLogout()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function PerformLogout() {
        self::DestroySession();
        self::DestroyUserData();
        setcookie('wow_session', '', strtotime('LAST YEAR'), '/');
        unset($_COOKIE['wow_session']);
        return true;
    }
    
    /**
     * Checks if user has active (primary) character
     * 
     * @access   public
     * @static   WoW_Account::IsHaveActiveCharacter()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function IsHaveActiveCharacter() {
        if(self::IsLoggedIn()) {
            if(!self::$characters_data && self::IsCharactersLoaded()) {
                return false;
            }
            elseif(!self::$characters_data && !self::IsCharactersLoaded()) {
                self::LoadCharacters();
            }
            if(!self::$characters_data) {
                return false;
            }
            return true;
        }
        else{
            return false;
        }
    }
    
    /**
     * Checks if user has any character on selected realm
     * 
     * @access   public
     * @static   WoW_Account::IsHaveActiveCharacter($realmName)
     * @param    string $realmName
     * @category Account Manager Class
     * @return   bool
     **/
    public static function IsHaveCharacterOnRealm($realmName) {
        if(!self::$characters_data && self::IsCharactersLoaded()) {
            return false;
        }
        elseif(!self::$characters_data && !self::IsCharactersLoaded()) {
            self::LoadCharacters();
        }
        if(!self::$characters_data) {
            return false;
        }
        foreach(self::$characters_data as $char) {
            if($char['realmName'] == $realmName) {
                return true;
            }
        }
        unset($char);
        return false;
    }
    
    /**
     * Returns active (primary) character info
     * 
     * @access   public
     * @static   WoW_Account::GetActiveCharacterInfo($info)
     * @param    string $info
     * @category Account Manager Class
     * @return   mixed
     **/
    public static function GetActiveCharacterInfo($info) {
        if(!self::IsCharactersLoaded()) {
            self::LoadCharacters();
        }
        return (isset(self::$active_character[$info])) ? self::$active_character[$info] : false;
    }
    
    /**
     * Returns active (primary) character
     * 
     * @access   public
     * @static   WoW_Account::GetActiveCharacter()
     * @param    string $info
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetActiveCharacter() {
        if(!self::IsCharactersLoaded()) {
            self::LoadCharacters();
        }
        return self::$active_character;
    }
    
    /**
     * Returns character by GUID and RealmID
     * 
     * @access   public
     * @static   WoW_Account::GetCharacter($guid, $realm_id)
     * @param    int $guid
     * @param    int $realm_id
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetCharacter($guid, $realm_id) {
        $db = DB::ConnectToDB(DB_CHARACTERS, $realm_id);
        if(!$db) {
            return false;
        }
        $char_data = DB::Characters()->selectRow("SELECT `guid`, `name`, `class`, `race`, `level`, `gender` FROM `characters` WHERE `guid` = %d LIMIT 1", $guid);
        if(!$char_data) {
            WoW_Log::WriteError('%s : character %d was not found in `characters` table!', __METHOD__, $guid);
            return false;
        }
        $char_data['realmName'] = WoWConfig::$Realms[$realm_id]['name'];
        return $char_data;
    }
    
    /**
     * Loads all characters from DB
     * 
     * @access   public
     * @static   WoW_Account::LoadCharacters()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function LoadCharacters() {
        self::$characters_loaded = false;
        self::$myGamesList = DB::WoW()->select("SELECT `account_id` FROM `DBPREFIX_users_accounts` WHERE `id` = %d", self::GetUserID());
        $account_ids = array();
        $accounts_count = count(self::$myGamesList);
        for($i = 0; $i < $accounts_count; ++$i) {
            $account_ids[] = self::$myGamesList[$i]['account_id'];
        }
        if(is_array($account_ids) && $accounts_count > 0) {
            $total_chars_count = DB::Realm()->selectCell("SELECT SUM(`numchars`) FROM `realmcharacters` WHERE `acctid` IN (%s)", implode(', ', $account_ids));
            sprintf("SELECT SUM(`numchars`) FROM `realmcharacters` WHERE `acctid` IN (%s)",  implode(', ', $account_ids));
            self::$characters_data = DB::WoW()->select("SELECT * FROM `DBPREFIX_user_characters` WHERE `account` IN (%s) ORDER BY `index`",  implode(', ', $account_ids));
		}
        else {
            $total_chars_count = 0;
        }
        if(!self::$characters_data || count(self::$characters_data) != $total_chars_count) {
            self::LoadCharactersFromWorld();
        }
        else {
            self::$characters_loaded = true;
            for($i = 0; $i < $total_chars_count; ++$i) {
                // Rebuild *_text fields
                self::$characters_data[$i]['class_text'] = WoW_Locale::GetString('character_class_' . self::$characters_data[$i]['class'], self::$characters_data[$i]['gender']);
                self::$characters_data[$i]['race_text'] = WoW_Locale::GetString('character_race_' . self::$characters_data[$i]['race'], self::$characters_data[$i]['gender']);
                self::$characters_data[$i]['faction_text'] = (WoW_Utils::GetFactionId(self::$characters_data[$i]['race']) == FACTION_ALLIANCE) ? 'alliance' : 'horde';
                
                // Rebuild character url
                self::$characters_data[$i]['url'] = sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), self::$characters_data[$i]['realmName'], self::$characters_data[$i]['name']);
                
                // Realm status
                $status = WoW::GetRealmStatus(self::$characters_data[$i]['realmId']);
                self::$characters_data[$i]['realmStatus'] = isset($status[0], $status[0]['status']) ? $status[0]['status'] : 'down';
                
                if(self::$characters_data[$i]['isActive']) {
                    self::$active_character = self::$characters_data[$i];
                }
            }
            return true;
        }
        if(!self::$characters_data) {
            return false;
        }
        $active_set = false;
        $index = 0;
        DB::WoW()->query("DELETE FROM `DBPREFIX_user_characters` WHERE `account` IN (%s)", $account_ids);
        foreach(self::$characters_data as $char) {
            DB::WoW()->query("INSERT INTO `DBPREFIX_user_characters` VALUES (%d, %d, %d, %d, '%s', %d, '%s', '%s', %d, '%s', '%s', %d, %d, %d, '%s', %d, %d, '%s', %d, '%s', '%s', '%s')",
                self::GetUserID(),
                $char['account'],
                $index,
                $char['guid'],
                $char['name'],
                $char['class'],
                $char['class_text'],
                $char['class_key'],
                $char['race'],
                $char['race_text'],
                $char['race_key'],
                $char['gender'],
                $char['level'],
                $char['realmId'],
                $char['realmName'],
                $active_set ? 0 : 1,
                $char['faction'],
                $char['faction_text'],
                $char['guildId'],
                $char['guildName'],
                $char['guildUrl'],
                $char['url']
            );
            if(!$active_set) {
                self::$active_character = $char;
                $active_set = true;
            }
            ++$index;
        }
        self::$characters_loaded = true;
        return true;
    }
    
    /**
     * Loads all characters from world DBs
     * 
     * @access   public
     * @static   WoW_Account::LoadCharactersFromWorld()
     * @category Account Manager Class
     * @return   void
     **/
    private static function LoadCharactersFromWorld() {
        $db = null;
        $chars_data = array();
        self::$characters_data = array();
        $index = 0;
        
        $account_ids = array();
        $count = count(self::$myGamesList);
        if($count == 0) {
            return false;
        }
        for($i = 0; $i < $count; ++$i) { 
          $account_ids[] = self::$myGamesList[$i]['account_id'];
        }
        foreach(WoWConfig::$Realms as $realm_info) {
            $db = DB::ConnectToDB(DB_CHARACTERS, $realm_info['id']);
            $chars_data = DB::Characters()->select("
                SELECT
                `characters`.`guid`,
                `characters`.`account`,
                `characters`.`name`,
                `characters`.`class`,
                `characters`.`race`,
                `characters`.`gender`,
                `characters`.`level`,
                `guild_member`.`guildid` AS `guildId`,
                `guild`.`name` AS `guildName`
                FROM `characters` AS `characters`
                LEFT JOIN `guild_member` AS `guild_member` ON `guild_member`.`guid`=`characters`.`guid`
                LEFT JOIN `guild` AS `guild` ON `guild`.`guildid`=`guild_member`.`guildid`
                WHERE `account` IN (%s)",  $account_ids);
            if(!$chars_data) {
                continue;
            }
            foreach($chars_data as $char) {
                $status = WoW::GetRealmStatus($realm_info['id']);
                $tmp_char_data = array(
                    'account' => $char['account'],
                    'index' => $index,
                    'guid' => $char['guid'],
                    'name' => $char['name'],
                    'class' => $char['class'],
                    'class_text' => WoW_Locale::GetString('character_class_' . $char['class'], $char['gender']),
                    'class_key' => Data_Classes::$classes[$char['class']]['key'],
                    'race' => $char['race'],
                    'race_text' => WoW_Locale::GetString('character_race_' . $char['race'], $char['gender']),
                    'race_key' => Data_Races::$races[$char['race']]['key'],
                    'gender' => $char['gender'],
                    'level' => $char['level'],
                    'realmName' => $realm_info['name'],
                    'realmId' => $realm_info['id'],
                    'isActive' => 0,
                    'faction' => WoW_Utils::GetFactionId($char['race']),
                    'faction_text' => (WoW_Utils::GetFactionId($char['race']) == FACTION_ALLIANCE) ? 'alliance' : 'horde',
                    'guildId' => $char['guildId'],
                    'guildName' => $char['guildName'],
                    'guildUrl' => sprintf('%s/wow/%s/guild/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), urlencode($realm_info['name']), urlencode($char['guildName'])),
                    'url' => sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), urlencode($realm_info['name']), urlencode($char['name'])),
                    'realmStatus' => isset($status[0], $status[0]['status']) ? $status[0]['status'] : 'down'
                );
                self::$characters_data[] = $tmp_char_data;
                ++$index;
            }
        }
    }
    
    /**
     * Checks if characters loaded
     * 
     * @access   public
     * @static   WoW_Account::IsCharactersLoaded()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function IsCharactersLoaded() {
        return self::$characters_loaded;
    }
    
    /**
     * Generates and returns some characters-related strings
     * 
     * @access   public
     * @static   WoW_Account::PrintAccountCharacters($type, $only_primary = false)
     * @param    string $type
     * @param    bool $only_primary = false
     * @category Account Manager Class
     * @return   bool
     **/
    public static function PrintAccountCharacters($type, $only_primary = false) {
        if(!self::IsCharactersLoaded()) {
            if(!self::LoadCharacters()) {
                return false;
            }
        }
        switch($type) {
            case 'characters-wrapper':
            default:
                $template = '<a href="%s/wow/%s/character/%s/%s/" onclick="CharSelect.pin(%d, this); return false;" class="char%s" rel="np"><span class="pin"></span><span class="name">%s</span><span class="class color-c%d">%d %s %s</span><span class="realm">%s</span></a>';
                $characters_string = sprintf($template, WoW::GetWoWPath(), WoW_Locale::GetLocale(), urlencode(self::GetActiveCharacterInfo('realmName')), urlencode(self::GetActiveCharacterInfo('name')), 0, ' pinned', self::GetActiveCharacterInfo('name'), self::GetActiveCharacterInfo('class'), self::GetActiveCharacterInfo('level'), self::GetActiveCharacterInfo('race_text'), self::GetActiveCharacterInfo('class_text'), self::GetActiveCharacterInfo('realmName'));
                break;
            case 'characters-overview':
                $template = '<a href="%s/wow/%s/character/%s/%s/" class="color-c%d" rel="np" onclick="CharSelect.pin(%d, this); return false;" onmouseover="Tooltip.show(this, $(this).children(\'.hide\').text());"><img src="%s/wow/static/images/icons/race/%d-%d.gif" alt="" /><img src="%s/wow/static/images/icons/class/%d.gif" alt="" />%d %s<span class="hide">%s %s (%s)</span></a>';
                $characters_string = sprintf($template, WoW::GetWoWPath(), WoW_Locale::GetLocale(), urlencode(self::GetActiveCharacterInfo('realmName')), urlencode(self::GetActiveCharacterInfo('name')), self::GetActiveCharacterInfo('class'), 0, WoW::GetWoWPath(), self::GetActiveCharacterInfo('race'), self::GetActiveCharacterInfo('gender'), WoW::GetWoWPath(), self::GetActiveCharacterInfo('class'), self::GetActiveCharacterInfo('level'), self::GetActiveCharacterInfo('name'), self::GetActiveCharacterInfo('race_text'), self::GetActiveCharacterInfo('class_text'), self::GetActiveCharacterInfo('realmName'));
                break;
            case 'characters-list-js':
                $template = '{type: "friend", id: "%d", locale: Core.formatLocale(2,\'_\'), term: "%s", title: "%s", url: "%s/wow/%s/character/%s/%s/"}%s';
                $characters_string = sprintf($template, self::GetActiveCharacterInfo('guid'), self::GetActiveCharacterInfo('name'), self::GetActiveCharacterInfo('name'), WoW::GetWoWPath(), WoW_Locale::GetLocale(), urlencode(self::GetActiveCharacterInfo('realmName')), urlencode(self::GetActiveCharacterInfo('name')), ', ');
                break;
        }
        if($only_primary) {
            return $characters_string;
        }
        $index = 1;
        foreach(self::$characters_data as $character) {
            if($character['name'] == self::GetActiveCharacterInfo('name') && $character['realmName'] == self::GetActiveCharacterInfo('realmName')) {
                // Primary character was already printed.
                continue;
            }
            switch($type) {
                case 'characters-wrapper':
                default:
                    $tmp_string = sprintf(
                        $template,
                        urlencode($character['realmName']),
                        urlencode($character['name']),
                        $index,
                        null,
                        $character['name'],
                        $character['class'],
                        $character['level'],
                        $character['race_text'],
                        $character['class_text'],
                        $character['realmName']
                    );
                    break;
                case 'characters-overview':
                    $tmp_string = sprintf(
                        $template,
                        urlencode($character['realmName']),
                        urlencode($character['name']),
                        $character['class'],
                        $index,
                        $character['race'],
                        $character['gender'],
                        $character['class'],
                        $character['level'],
                        $character['name'],
                        $character['race_text'],
                        $character['class_text'],
                        $character['realmName']
                    );
                    break;
                case 'characters-list-js':
                    $tmp_string = sprintf(
                        $template,
                        $character['guid'],
                        $character['name'],
                        $character['name'],
                        urlencode($character['realmName']),
                        urlencode($character['name']),
                        ($index == self::GetCharactersCount(true, 1)) ? ', ' : null
                    );
                    break;
            }
            $characters_string .= $tmp_string;
            $index++;
        }
        return $characters_string;
    }
    
    /**
     * Returns characters count
     * 
     * @access   public
     * @static   WoW_Account::GetCharactersCount($without_primary = false, $start = 0)
     * @param    bool $without_primary = false
     * @param    int $start = 0
     * @category Account Manager Class
     * @return   bool
     **/
    public static function GetCharactersCount($without_primary = false, $start = 0) {
        if(!$without_primary && $start == 0) {
            return count(self::$characters_data);
        }
        elseif($without_primary && $start == 0) {
            return (count(self::$characters_data) - 1);
        }
        elseif($without_primary && $start != 0) {
            return (count(self::$characters_data) - 1) + $start;
        }
        else {
            return (count(self::$characters_data) + 1);
        }
    }
    
    /**
     * Loads friends list for active (primary) character
     * 
     * @access   public
     * @static   WoW_Account::LoadFriendsListForPrimaryCharacter()
     * @category Account Manager Class
     * @return   bool
     **/
    private static function LoadFriendsListForPrimaryCharacter() {
        if(!self::GetSessionInfo('wow_sid')) {
            return false;
        }
        if(!self::IsHaveActiveCharacter()) {
            return false;
        }
        if(self::$friends_data) {
            return true;
        }
        if(!self::IsCharactersLoaded()) {
            if(!self::LoadCharacters()) {
                return false;
            }
        }
        DB::ConnectToDB(DB_CHARACTERS, (self::GetActiveCharacterInfo('realmId') | 1 ));
        self::$friends_data = DB::Characters()->select("
        SELECT
        `character_social`.`friend`,
        `characters`.`guid`,
        `characters`.`name`,
        `characters`.`race` AS `race_id`,
        `characters`.`class` AS `class_id`,
        `characters`.`gender`,
        `characters`.`level`
         FROM `character_social`
         JOIN `characters` ON `characters`.`guid` = `character_social`.`friend`
         WHERE `character_social`.`guid` = %d", self::GetActiveCharacterInfo('guid'));
        return true;
    }
    
    /**
     * Returns friends list for active (primary) character
     * 
     * @access   public
     * @static   WoW_Account::GetFriendsListForPrimaryCharacter()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetFriendsListForPrimaryCharacter() {
        if(!self::$friends_data) {
            self::LoadFriendsListForPrimaryCharacter();
            $count = count(self::$friends_data);
            for($i = 0; $i < $count; $i++) {
                self::$friends_data[$i]['class_string'] = WoW_Locale::GetString('character_class_' . self::$friends_data[$i]['class_id'], self::$friends_data[$i]['gender']);
                self::$friends_data[$i]['race_string'] = WoW_Locale::GetString('character_race_' . self::$friends_data[$i]['race_id'], self::$friends_data[$i]['gender']);
                self::$friends_data[$i]['url'] = sprintf('%s/wow/%s/character/%s/%s', WoW::GetWoWPath(), WoW_Locale::GetLocale(), self::GetActiveCharacterInfo('realmName'), self::$friends_data[$i]['name']);
            }
        }
        return self::$friends_data;
    }
    
    /**
     * Returns friends list count
     * 
     * @access   public
     * @static   WoW_Account::GetFriendsListCount()
     * @category Account Manager Class
     * @return   int
     **/
    public static function GetFriendsListCount() {
        return count(self::$friends_data);
    }
    
    /**
     * Checks if active character (WoW_Characters class) is on current account
     * 
     * @access   public
     * @static   WoW_Account::IsAccountCharacter()
     * @category Account Manager Class
     * @uses     WoW_Characters
     * @return   bool
     **/
    public static function IsAccountCharacter() {
        if(!self::IsLoggedIn()) {
            return false;
        }
        if(!self::IsCharactersLoaded()) {
            self::LoadCharacters();
        }
        $name = WoW_Characters::GetName();
        $realm = WoW_Characters::GetRealmName();
        foreach(self::$characters_data as $char) {
            if($char['name'] == $name && $char['realmName'] == $realm) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Registers user (BNACCOUNT)
     * 
     * @access   public
     * @static   WoW_Account::RegisterUser($user_data, $auto_session = false)
     * @param    array $user_data
     * @param    bool $auto_session = false
     * @category Account Manager Class
     * @uses     WoW_Characters
     * @return   bool
     **/
    public static function RegisterUser($user_data, $auto_session = false) {
        if(!is_array($user_data)) {
            return false;
        }
        if(DB::WoW()->selectCell("SELECT 1 FROM `DBPREFIX_users` WHERE `email` = '%s' LIMIT 1", $user_data['email'])) {
            WoW_Template::SetPageData('creation_error', true);
            WoW_Template::SetPageData('account_creation_error_msg', WoW_Locale::GetString('template_account_creation_error_email_used'));
            return false;
        }
        $reg_result = DB::WoW()->query("
        INSERT INTO `DBPREFIX_users`
        (
            `first_name`, `last_name`, `treatment`, `email`,
            `sha_pass_hash`, `question_id`, `question_answer`, `birthdate`, `country_code`
        )
        VALUES
        (
            '%s', '%s', %d, '%s', '%s', %d, '%s', %d, '%s'
        )
        ",
            $user_data['first_name'], $user_data['last_name'], $user_data['treatment'], $user_data['email'],
            $user_data['sha'], $user_data['question_id'], $user_data['question_answer'],
            $user_data['birthdate'], $user_data['country_code']
        );
        if($reg_result) {
            if($auto_session) {
                self::PerformLogin($user_data['email'], $user_data['password']);
            }
            return true;
        }
        // Unknown exception
        WoW_Template::SetPageData('creation_error', true);
        WoW_Template::SetPageData('account_creation_error_msg', WoW_Locale::GetString('template_account_creation_error_exception'));
        return false;
    }
    
    /** 
     * @access   public
     * @static   WoW_Account::RecoverPasswordSelect($user_data)
     * @param    array $user_data
     * @category Account Manager Class
     * @return   bool
     **/
    public static function RecoverPasswordSelect($user_data) {
        if(self::$password_recovery_data = DB::WoW()->selectRow("SELECT `question_id`,`question_answer`, `first_name` AS `username`, `email` FROM `DBPREFIX_users` WHERE `first_name` = '%s' AND `email` = '%s' LIMIT 1", $user_data['username'], $user_data['email']) ) {
            return true;
        }
        else {
            return false;
        }
    }
    
    /** 
     * @access   public
     * @static   WoW_Account::GetRecoverPasswordData()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetRecoverPasswordData() {
        return self::$password_recovery_data;
    }
    
    /** 
     * @access   public
     * @static   WoW_Account::SetRecoverPasswordData($data_from_session)
     * @param    array $data_from_session
     * @category Account Manager Class
     * @return   bool
     **/
    public static function SetRecoverPasswordData($data_from_session) {
        self::$password_recovery_data = $data_from_session;
        return true;
    }
    
    /** 
     * Sets password recovery ticket and sends email with ticket link for type new password
     *         
     * @access   public
     * @static   WoW_Account::RecoverPasswordSuccess($secretAnswer)
     * @param    array $secretAnswer
     * @category Account Manager Class
     * @return   bool
     **/
    public static function RecoverPasswordSuccess($secretAnswer) {
        if(strtolower(self::$password_recovery_data['question_answer']) == strtolower($secretAnswer)) {
            $ticket = self::GenerateTicket();
            
            if(DB::WoW()->query("UPDATE `DBPREFIX_users` SET `pass_reset_ticket` = '%s' WHERE `first_name` = '%s' AND `email` = '%s' LIMIT 1", $ticket, self::$password_recovery_data['username'], self::$password_recovery_data['email'])) {
                //make here email sender with new password generator
                //because swiftmail is huge use it only if it is needed
                require_once(APLICACION_DIR . 'swiftmailer' . DS . 'swift_required.php');
                //Create the Transport the call setUsername() and setPassword()
                $transport = Swift_SmtpTransport::newInstance(WoWConfig::$MailSender['smtp'], WoWConfig::$MailSender['port'], WoWConfig::$MailSender['security'])
                  ->setUsername(WoWConfig::$MailSender['name'])
                  ->setPassword(WoWConfig::$MailSender['pass'])
                  ;
                
                //Create the Mailer using your created Transport
                $mailer = Swift_Mailer::newInstance($transport);
                
                //Create a message
                $message = Swift_Message::newInstance(WoW_Locale::GetString('mailer_password_ticked_subject'))
                  ->setFrom(array(WoWConfig::$MailSender['from']))
                  ->setTo(array(self::$password_recovery_data['email']))
                  ->setBody(sprintf(WoW_Locale::GetString('mailer_password_ticked_body'), 'http://'.$_SERVER['SERVER_NAME'].'/account/support/password-reset-confirm.xml?ticket='.$ticket, 'http://'.$_SERVER['SERVER_NAME'].'/account/support/password-reset-confirm.xml?ticket='.$ticket, 'http://'.$_SERVER['SERVER_NAME'].'/account/support/'), 'text/html')
                  ;
                //Send the message
                if($mailer->send($message))
                {
                    return true;
                }
            }
            return false;
        }
        else {
            return false;
        }
    }
    
    /**
     * Generate unique ticket for password recovery
     * 
     * @access   private
     * @static   WoW_Account::GenerateTicket()
     * @category Account Manager Class
     * @return   string
     **/
    private static function GenerateTicket() {
        $ticket = md5(uniqid());
        if(DB::WoW()->selectCell("SELECT 1 FROM `DBPREFIX_users` WHERE `pass_reset_ticket` = '%s' LIMIT 1", $ticket)) {
          self::GenerateTicket();
        }
        else {
          return $ticket;
        }
    }
    
    /**
     * Check if ticket exists
     * 
     * @access   public
     * @static   WoW_Account::validTicket()
     * @category Account Manager Class
     * @return   bool
     **/
    public static function validTicket($ticket) {
        if($recovery = DB::WoW()->selectRow("SELECT `email`, `first_name` FROM `DBPREFIX_users` WHERE `pass_reset_ticket` = '%s' LIMIT 1", $ticket)) {
          $_SESSION['password_recovery_email'] = $recovery['email'];
          $_SESSION['password_recovery_first_name'] = $recovery['first_name'];
          $_SESSION['password_recovery_ticket'] = $ticket;
          return true;
        }
        else {
          return false;
        }
    }
    
    /**
     * Change password in DB
     * 
     * @access   public
     * @static   WoW_Account::RecoverPasswordChange()
     * @param    string $password     
     * @category Account Manager Class
     * @return   bool
     **/
    public static function RecoverPasswordChange($password) {
        $sha_pass_hash = sha1(strtoupper($_SESSION['password_recovery_email']) . ':' . strtoupper($password));
        $ticket = $_SESSION['password_recovery_ticket'];
        if(DB::WoW()->query("UPDATE `DBPREFIX_users` SET `sha_pass_hash` = '%s', `pass_reset_ticket` = NULL WHERE `pass_reset_ticket` = '%s' LIMIT 1", $sha_pass_hash, $ticket)) {
            //make here email sender
            //because swiftmail is huge use it only if it is needed
            require_once(APLICACION_DIR . 'swiftmailer' . DS . 'swift_required.php');
            //Create the Transport the call setUsername() and setPassword()
            $transport = Swift_SmtpTransport::newInstance(WoWConfig::$MailSender['smtp'], WoWConfig::$MailSender['port'], WoWConfig::$MailSender['security'])
              ->setUsername(WoWConfig::$MailSender['name'])
              ->setPassword(WoWConfig::$MailSender['pass'])
              ;
            
            //Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);
            
            //Create a message
            $message = Swift_Message::newInstance(WoW_Locale::GetString('mailer_password_changed_subject'))
              ->setFrom(array(WoWConfig::$MailSender['from']))
              ->setTo(array($_SESSION['password_recovery_email']))
              ->setBody(sprintf(WoW_Locale::GetString('mailer_password_changed_body'), $_SESSION['password_recovery_first_name'], $_SESSION['password_recovery_email'], 'http://'.$_SERVER['SERVER_NAME'].'/account/support/'), 'text/html')
              ;
            //Send the message
            $mailer->send($message);
            
            unset($_SESSION['password_recovery_email']);
            unset($_SESSION['password_recovery_first_name']);
            unset($_SESSION['password_recovery_ticket']);
            return true;
        }
        else {
          return false;
        }
    }
    
    /**
     * Initializes account for dashboard page
     * 
     * @access   public
     * @static   WoW_Account::InitializeAccount($accountName)
     * @param    string $accountName
     * @category Account Manager Class
     * @return   void
     **/
    public static function InitializeAccount($accountName) {
        if(array_key_exists(strtolower($accountName), self::$gameAccountData) ) {
            $accountData = DB::Realm()->selectRow("SELECT * FROM `account` WHERE `username` = '%s'", $accountName);
            if(!$accountData) {
                header('Location: ' . WoW::GetWoWPath() . '/account/management/');
                exit;
            }
            self::$dashboard_account = $accountData;
    
            if(DB::Realm()->selectCell("SELECT 1 FROM `account_banned` WHERE `id` = %d AND `active` = 1", self::$dashboard_account['id'])) {
                self::$dashboard_account['banned'] = true;
            }
            else {
                self::$dashboard_account['banned'] = false;
            }
        }
        else {
            header('Location: ' . WoW::GetWoWPath() . '/account/management/');
            exit;
        }
    }
    
    /**
     * Returns dashboard account name
     * 
     * @access   public
     * @static   WoW_Account::GetAccountName()
     * @category Account Manager Class
     * @return   string
     **/
    public static function GetAccountName() {
        return isset(self::$dashboard_account['username']) ? self::$dashboard_account['username'] : null;
    }
    
    /**
     * Returns game accounts count
     * 
     * @access   public
     * @static   WoW_Account::GetGameAccountsCount()
     * @category Account Manager Class
     * @return   array
     **/
    public static function GetGameAccountsCount() {
        return self::$myGames;
    }
    
    /**
     * Performs account conversion (merging) step
     * 
     * @access   public
     * @static   WoW_Account::PerformConversionStep($step, $post_data = false)
     * @param    int $step
     * @param    array $post_data = false
     * @category Account Manager Class
     * @return   bool
     **/
    public static function PerformConversionStep($step, $post_data = false) {
        switch($step) {
            case 1:
                // Find account in realm DB and check passwords matching
                if(!is_array($post_data)) {
                    // Wrong post data
                    WoW_Template::SetPageData('conversion_error', true);
                    WoW_Template::SetPageData('account_creation_error_msg', WoW_Locale::GetString('template_account_conversion_error1'));
                    return false;
                }
                $info = DB::Realm()->selectRow("SELECT `id`, `sha_pass_hash` FROM `account` WHERE `username` = '%s' LIMIT 1", $post_data['username']);
                $sha = sha1(strtoupper($post_data['username']) . ':' . strtoupper($post_data['password']));
                if(!$info || $info['sha_pass_hash'] != $sha) {
                    // Wrong post data
                    WoW_Template::SetPageData('conversion_error', true);
                    WoW_Template::SetPageData('account_creation_error_msg', WoW_Locale::GetString('template_account_conversion_error1'));
                    return false;
                }
                // Check account link
                if(DB::WoW()->selectCell("SELECT 1 FROM `DBPREFIX_users_accounts` WHERE `account_id` = %d", $info['id'])) {
                    // Already linked
                    WoW_Template::SetPageData('conversion_error', true);
                    WoW_Template::SetPageData('account_creation_error_msg', WoW_Locale::GetString('template_account_conversion_error2'));
                    return false;
                }
                // All fine
                $_SESSION['conversion_userName'] = $post_data['username'];
                $_SESSION['conversion_userID'] = $info['id'];
                break;
            case 3:
                // Check session
                $conversion_allowed = true;
                if(!isset($_SESSION['conversion_userName']) || !isset($_SESSION['conversion_userID'])) {
                    $conversion_allowed = false;
                }
                else {
                    if($_SESSION['conversion_userName'] == null) {
                        $conversion_allowed = false;
                    }
                    if($_SESSION['conversion_userID'] == 0) {
                        $conversion_allowed = false;
                    }
                }
                if(!$conversion_allowed) {
                    header('Location: ' . WoW::GetWoWPath() . '/account/management/wow-account-conversion.html');
                    exit;
                }
                // Link account
                if(DB::WoW()->query("INSERT INTO `DBPREFIX_users_accounts` VALUES (%d, %d)", self::GetUserID(), ((int) $_SESSION['conversion_userID']))) {
                    header('Location: ' . WoW::GetWoWPath() . '/account/management/wow/dashboard.html?accountName=' . $_SESSION['conversion_userName'] . '&region=EU');
                    exit;
                }
                break;
            default:
                return false;
        }
        return true;
    }
}
?>
