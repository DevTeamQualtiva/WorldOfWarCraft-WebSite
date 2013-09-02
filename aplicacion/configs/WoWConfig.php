<?php

/**
 * Copyright (C) 2013 Apocalypsecore <https://Apocalypsecore.tk>
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

Class WoWConfig {
    public static $UseCache          = false;
    public static $CacheLifeTime     = 86400; // In seconds
    public static $DefaultBGName     = 'Battle Net';
    public static $MinLevelToDisplay = 10;
    public static $MinLevelToSearch  = 0;
    public static $UseLog            = true;
    public static $LogLevel          = 2;
    public static $ConfigVersion     = '0808201101';
    public static $CheckVersionType  = 'show';
    public static $DefaultLocale     = 'en';
    public static $DefaultLocaleID   = 0;
    public static $SkipBanned        = false;
	/**
    * Without slash at the end of path. If your site is in root directory, leave this empty.
    * For example: site is available at http://example.org/wowcs/
    * That means that you should set this variable as '/wowcs'. 
	**/
    public static $WoW_Path          = '';
	
	/** 
	 * Your Expansion for Default "Register"
	 * Tu Expansion por defecto "Registro"
	 * 0 - Classic, 1 - Burning Crusade, 2 - Wrath, 3 - Cataclysm, 4 - Mists Of Pandaria 
	 **/
    public static $DefaultExpansion  = 4;
	
	/**
	 * Disable site? on maintenance page
	 * Deshabilitar La Pagina Web y ponerla en mantenimiento
	 *        true or false
	 **/
    public static $Maintenance       = false;
	
	/**
	 * Twitter account name. Leave it blank if you don't use any.
	 * Nombre de tu cuenta de Twiter
     * PD: No modificar si no poseen una:
	 **/
    public static $TwitterAccount    = 'YOUR TWITTER';

    /**
     * Facebook account name. Leave it blank if you don't use any.
     * Nombre de tu cuenta de Facebook
     * PD: No modificar si no poseen una:
     * TODAVIA NO FUNCIONA - THIS NOT COMPLETE
     **/
    public static $FacebookAccount    = 'YOUR FACEBOOK';

	/**
     * Try to detect realms statuses when building account's character list?
	 * Autodetectar el estado de reinos
	 *        true or false
	 **/
    public static $UseRealmsStatus   = false;
	
    /** 
	 * Enable Battle.net page (true - page will be displayed, false - you will be redirected to WoW portal)
	 * Habilitar pagina de Battle.net (true - Mostrara la pagina, false - Redireccionara a la pagina de WoW)
	 **/
    public static $EnableBNPage      = true;
	
    /**
     * All available realms
     * Structure:
     *      id - realm ID (should be the same as array index)
     *      name - Realm Name
     *      type - Realm type (can be SERVER_MANGOS, SERVER_TRINITY, SERVER_APOCALYPSECORE, depends on your server core. Note that this is a constant!)
     * You can create unlimited realms
	 * Warning! WoWConfig::$Realms array size MUST BE equal to DatabaseConfig::$world and DatabaseConfig::$characters size!
     **/
    public static $Realms = array(
        1 => array(
            'id'   => 1,
            'name' => 'ApocalypseCore',
            'type' => SERVER_TRINITY
        ),
    );

    /**
     * Server battlegroups
     * Structure:
     *      id - BattleGroup ID
     *      name - BG name
     *      realms - array of realm IDs that aplicacion into this BG
     * You can create unlimited battlegroups, but realms lists must be unique!
     **/
    public static $BattleGroups = array(
        1 => array(
            'id' => 1,
            'name' => 'Massive Network',
            'realms' => array(1, 2)
        )
    );
	
    /**
     * Mail Service
     * Servidor de correo
     **/
    public static $MailSender        = array(
        'smtp' => 'smtp.gmail.com',                        //smtp server url - for gmail use 'smtp.gmail.com'
        'name' => 'User Name Login - usuario del correo',  //smtp auth username - for gmail use your gmail login
        'pass' => 'Your Pass - Tu contraseña',             //smtp auth password - for gmail use your gmail password
        'port' => '465',                                   //smtp port - for gmail use '465'
        'security' => 'ssl',                               //security (ssl, tls or blank) - for gmail use 'ssl'
        'from' => 'Info@yourserver.com'                    //email adress
    );
}
?>
