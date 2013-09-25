<?php

/**
 * Copyright (C) 2011 - 2013 Apocalypsecore <https://Apocalypsecore.tk>
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


/*
|--------------------------------------------------------------------------
| WoWConfig
|--------------------------------------------------------------------------
| WoW Config General 
| we recommend not to change this code -> Class WoWConfig { <-
| to maintain Default operation script.
|
*/
Class WoWConfig {

/*
|--------------------------------------------------------------------------
| Cache Web 
|--------------------------------------------------------------------------
| Use Cache on use :
|    false or true
| Cache Life Time = 86400; <- In seconds
|
*/
public static $UseCache          = false;
public static $CacheLifeTime     = 86400;

/*
|--------------------------------------------------------------------------
| Default BG Name
|--------------------------------------------------------------------------
| Default BG Name on Battle.net
|
*/
public static $DefaultBGName     = 'Battle Net';

/*
|--------------------------------------------------------------------------
| Level To Display and Search
|--------------------------------------------------------------------------
| MinLevelToDisplay
| MinLevelToSearch
|
*/
public static $MinLevelToDisplay = 10;
public static $MinLevelToSearch  = 0;

/*
|--------------------------------------------------------------------------
| Log WebSite
|--------------------------------------------------------------------------
| UseLog 
|     false or true
| LogLevel = Level
|
*/
public static $UseLog            = true;
public static $LogLevel          = 2;

/*
|--------------------------------------------------------------------------
| Config Version
|--------------------------------------------------------------------------
| ConfigVersion
| CheckVersionType
|
*/
public static $ConfigVersion     = '0808201101';
public static $CheckVersionType  = 'show';

/*
|--------------------------------------------------------------------------
| Default Locale 
|--------------------------------------------------------------------------
| Default Locale Web
| For example: public static $DefaultLocale     = 'en'; = http://example.org/en/
|
*/
public static $DefaultLocale     = 'en';
public static $DefaultLocaleID   = 0;

/*
|--------------------------------------------------------------------------
| Skip Banned
|--------------------------------------------------------------------------
| Skip Banned player on Web
|
*/
public static $SkipBanned        = false;

/*
|--------------------------------------------------------------------------
| Root Directory
|--------------------------------------------------------------------------
|
| Without slash at the end of path. If your site is in root directory, leave this empty.
| For example: site is available at http://example.org/wowcs/
| That means that you should set this variable as '/wowcs'.
|
*/
public static $WoW_Path          = '';
	
/*
|--------------------------------------------------------------------------
| Base Site URL - Your Domain
|--------------------------------------------------------------------------
|
| URL to your Server. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://localhost/
|
| If this is not set then CMS will guess the protocol, domain and
| path to your installation.
|
*/
public static $YourDomain       = 'http://localhost/';

/*
|--------------------------------------------------------------------------
| Expansion for Default
|--------------------------------------------------------------------------
|
| Your Expansion for Default "Register"
| Tu Expansion por defecto "Registro"
| 0 - Classic, 1 - Burning Crusade, 2 - Wrath, 3 - Cataclysm, 4 - Mists Of Pandaria
|
*/
public static $DefaultExpansion  = 4;

/*
|--------------------------------------------------------------------------
| Maintenance Page
|--------------------------------------------------------------------------
|
| Disable site? on maintenance page
| Deshabilitar La Pagina Web y ponerla en mantenimiento
|        true or false
|
*/
public static $Maintenance       = false;

/*
|--------------------------------------------------------------------------
| Server name
|--------------------------------------------------------------------------
|
| Your Server name.
| For example: server name = 'World of Warcraft'
| Nombre de tu servidor
| Por Ejemplo: nombre del servidor = 'World of Warcraft'
|
*/
public static $ServerName    = 'YOUR SERVER NAME';

/*
|--------------------------------------------------------------------------
| Twitter Account Name
|--------------------------------------------------------------------------
|
| Twitter account name. Leave it blank if you don't use any.
| Nombre de tu cuenta de Twitter. Dejar en blanco si no poseen una.
|
*/
public static $TwitterAccount    = 'YOUR TWITTER';

/*
|--------------------------------------------------------------------------
| Facebook Account Name
|--------------------------------------------------------------------------
|
| Facebook account name. Leave it blank if you don't use any.
| Nombre de tu cuenta de Facebook. Dejar en blanco si no poseen una.
|
*/
public static $FacebookAccount    = 'YOUR FACEBOOK';

/*
|--------------------------------------------------------------------------
| YouTube Channel Name
|--------------------------------------------------------------------------
|
| YouTube Channel name. Leave it blank if you don't use any.
| Nombre de tu Canal de Youtube. Dejar en blanco si no poseen una.
|
*/
public static $YoutubeAccount    = 'YOUR YOUTUBE CHANNEL';

/*
|--------------------------------------------------------------------------
| Reddit Account Name
|--------------------------------------------------------------------------
|
| Reddit account name. Leave it blank if you don't use any.
| Nombre de tu cuenta de Reddit. Dejar en blanco si no poseen una.
|
*/
public static $RedditAccount    = 'YOUR REDDIT';

/*
|--------------------------------------------------------------------------
| Detect Realms
|--------------------------------------------------------------------------
|
| Try to detect realms statuses when building account's character list?
| Autodetectar el estado de reinos
|        true or false
|
*/
public static $UseRealmsStatus   = false;

/*
|--------------------------------------------------------------------------
| Enable BN Page
|--------------------------------------------------------------------------
|
| Enable Battle.net page (true - page will be displayed, false - you will be redirected to WoW portal)
| Habilitar pagina de Battle.net (true - Mostrara la pagina, false - Redireccionara a la pagina de WoW)
|
*/
public static $EnableBNPage      = true;

/*
|--------------------------------------------------------------------------
| Realms
|--------------------------------------------------------------------------
|
| All available realms
| Structure:
|      id - realm ID (should be the same as array index)
|      name - Realm Name
|      type - Realm type (can be SERVER_MANGOS, SERVER_TRINITY, SERVER_APOCALYPSECORE, depends on your server core. Note that this is a constant!)
| You can create unlimited realms
| Warning! WoWConfig::$Realms array size MUST BE equal to DatabaseConfig::$world and DatabaseConfig::$characters size!
|
*/
public static $Realms = array(
	1 => array(
		'id'   => 1,
		'name' => 'ApocalypseCore',
		'type' => SERVER_TRINITY
	),
);

/*
|--------------------------------------------------------------------------
| Realms
|--------------------------------------------------------------------------
|
| Server battlegroups
| Structure:
|      id - BattleGroup ID
|      name - BG name
|      realms - array of realm IDs that aplicacion into this BG
| You can create unlimited battlegroups, but realms lists must be unique!
|
*/
public static $BattleGroups = array(
	1 => array(
		'id' => 1,
		'name' => 'Massive Network',
		'realms' => array(1, 2)
	)
);

/*
|--------------------------------------------------------------------------
| Mail Service
|--------------------------------------------------------------------------
| Mail Service
| Servidor de correo
|
|	'smtp' => 'smtp.gmail.com',                        -> smtp server url - for gmail use 'smtp.gmail.com'
|	'name' => 'User Name Login - usuario del correo',  -> smtp auth username - for gmail use your gmail login
|	'pass' => 'Your Pass - Tu contraseña',             -> smtp auth password - for gmail use your gmail password
|	'port' => '465',                                   -> smtp port - for gmail use '465'
|	'security' => 'ssl',                               -> security (ssl, tls or blank) - for gmail use 'ssl'
|	'from' => 'Info@yourserver.com'                    -> email adress
|
*/
public static $MailSender        = array(
	'smtp' => 'smtp.gmail.com',
	'name' => 'User Name Login - usuario del correo',
	'pass' => 'Your Pass - Tu contraseña',
	'port' => '465',
	'security' => 'ssl',
	'from' => 'Info@yourserver.com'
);

}

/* End of file WoWConfig.php */
/* Location: ./aplication/configs/WoWConfig.php */
?>
