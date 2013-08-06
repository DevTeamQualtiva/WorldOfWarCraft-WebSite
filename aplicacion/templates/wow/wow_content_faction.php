<div id="content">
  <div class="content-top">
    <div class="content-trail">
      <?php WoW_Template::NavigationMenu(); ?>
      <!--<ol class="ui-breadcrumb">
        <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np"> World of Warcraft</a></li>
        <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
        <li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_factions'); ?></a></li>
      </ol>-->
    </div>
    <div class="content-bot">
      <div id="wiki" class="wiki directory wiki-faction">
        <div class="title">
          <h2><?php echo WoW_Locale::GetString('template_menu_game_factions'); ?></h2>
          <div class="desc"><?php echo WoW_Locale::GetString('template_menu_game_factions_intro'); ?></div>
        </div>
        <div class="wrapper">
          <div class="groups">
            <div class="group" id="expansion-3" >
              <div class="group-column">
                <ul>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/baradins-wardens"> Baradin&#39;s Wardens
                    <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/dragonmaw-clan"> Dragonmaw Clan
                    <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/guardians-of-hyjal"> Guardians of Hyjal </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/hellscreams-reach"> Hellscream&#39;s Reach
                    <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                </ul>
              </div>
              <div class="group-column">
                <ul>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ramkahen"> Ramkahen </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-earthen-ring"> The Earthen Ring </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/therazane"> Therazane </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/wildhammer-clan"> Wildhammer Clan
                    <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                </ul>
              </div>
              <span class="clear">
                <!-- -->
              </span>
            </div>
            <div class="group" id="expansion-2" style="display: none">
              <div class="group-column">
                <ul>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/argent-crusade"> Argent Crusade </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/kirin-tor"> Kirin Tor </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/knights-of-the-ebon-blade"> Knights of the Ebon Blade </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-ashen-verdict"> The Ashen Verdict </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-kaluak"> The Kalu&#39;ak </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-sons-of-hodir"> The Sons of Hodir </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-wyrmrest-accord"> The Wyrmrest Accord </a></li>
                </ul>
              </div>
              <div class="group-column">
                <ul>
                  <li>
                  <span class="separator"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/alliance-vanguard"> Alliance Vanguard
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a>
                  </span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/explorers-league"> Explorers&#39; League
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-frostborn"> The Frostborn
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-silver-covenant"> The Silver Covenant
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/valiance-expedition"> Valiance Expedition
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li>
                  <span class="separator">
                    <a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/horde-expedition"> Horde Expedition
                      <span class="icon-faction-1" data-tooltip="Horde">
                      </span></a>
                  </span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-hand-of-vengeance"> The Hand of Vengeance
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-sunreavers"> The Sunreavers
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child">
                    <a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-taunka"> The Taunka
                      <span class="icon-faction-1" data-tooltip="Horde">
                      </span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/warsong-offensive"> Warsong Offensive
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><span class="separator"> Sholazar Basin</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/frenzyheart-tribe"> Frenzyheart Tribe </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-oracles"> The Oracles </a></li>
                </ul>
              </div> 
              <span class="clear">
                <!-- -->
              </span>
            </div>
            <div class="group" id="expansion-1" style="display: none">
              <div class="group-column">
                <ul>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ashtongue-deathsworn"> Ashtongue Deathsworn </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/cenarion-expedition"> Cenarion Expedition </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/honor-hold"> Honor Hold
                    <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/keepers-of-time"> Keepers of Time </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/kurenai"> Kurenai
                    <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/netherwing"> Netherwing </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ogrila"> Ogri&#39;la </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/sporeggar"> Sporeggar </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-consortium"> The Consortium </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-maghar"> The Mag&#39;har
                    <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-scale-of-the-sands"> The Scale of the Sands </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-violet-eye"> The Violet Eye </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/thrallmar"> Thrallmar
                    <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/tranquillien"> Tranquillien
                    <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                </ul>
              </div>
              <div class="group-column">
                <ul>
                  <li><span class="separator"> Shattrath City</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/lower-city"> Lower City </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/shatari-skyguard"> Sha&#39;tari Skyguard </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/shattered-sun-offensive"> Shattered Sun Offensive </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-aldor"> The Aldor </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-scryers"> The Scryers </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-shatar"> The Sha&#39;tar </a></li>
                </ul>
              </div> 
              <span class="clear">
                <!-- -->
              </span>
            </div>
            <div class="group" id="expansion-0" style="display: none">
              <div class="group-column">
                <ul>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/argent-dawn"> Argent Dawn </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/bloodsail-buccaneers"> Bloodsail Buccaneers </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/brood-of-nozdormu"> Brood of Nozdormu </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/cenarion-circle"> Cenarion Circle </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/darkmoon-faire"> Darkmoon Faire </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/gelkis-clan-centaur"> Gelkis Clan Centaur </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/hydraxian-waterlords"> Hydraxian Waterlords </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/magram-clan-centaur"> Magram Clan Centaur </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ravenholdt"> Ravenholdt </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/shendralar"> Shen&#39;dralar </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/syndicate"> Syndicate </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/thorium-brotherhood"> Thorium Brotherhood </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/timbermaw-hold"> Timbermaw Hold </a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/wintersaber-trainers"> Wintersaber Trainers
                    <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/zandalar-tribe"> Zandalar Tribe </a></li>
                </ul>
              </div>
              <div class="group-column">
                <ul>
                  <li><span class="separator"> Alliance</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/darnassus"> Darnassus
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/exodar"> Exodar
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/gilneas"> Gilneas
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/gnomeregan"> Gnomeregan
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ironforge"> Ironforge
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/stormwind"> Stormwind
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li><span class="separator"> Alliance Forces</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/silverwing-sentinels"> Silverwing Sentinels
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/stormpike-guard"> Stormpike Guard
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-league-of-arathor"> The League of Arathor
                      <span class="icon-faction-0" data-tooltip="Alliance"></span></a></li>
                  <li>
                  <span class="separator"> Horde</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/bilgewater-cartel"> Bilgewater Cartel
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/darkspear-trolls"> Darkspear Trolls
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/orgrimmar"> Orgrimmar
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/silvermoon-city"> Silvermoon City
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/thunder-bluff"> Thunder Bluff
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/undercity"> Undercity
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><span class="separator"> Horde Forces</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/frostwolf-clan"> Frostwolf Clan
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/the-defilers"> The Defilers
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/warsong-outriders"> Warsong Outriders
                      <span class="icon-faction-1" data-tooltip="Horde"></span></a></li>
                  <li><span class="separator"> Steamwheedle Cartel</span></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/booty-bay"> Booty Bay </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/everlook"> Everlook </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/gadgetzan"> Gadgetzan </a></li>
                  <li class="child"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/faction/ratchet"> Ratchet </a></li>
                </ul>
              </div> 
              <span class="clear">
                <!-- -->
              </span>
            </div>
          </div>
          <ul class="navigation">
            <li><a href="javascript:;" id="nav-3" onclick="WikiDirectory.view(this, 3);" class="expansion-3 nav-active">Cataclysm</a></li>
            <li><a href="javascript:;" id="nav-2" onclick="WikiDirectory.view(this, 2);" class="expansion-2 ">Wrath of the Lich King</a></li>
            <li><a href="javascript:;" id="nav-1" onclick="WikiDirectory.view(this, 1);" class="expansion-1 "> The Burning Crusade</a></li>
            <li><a href="javascript:;" id="nav-0" onclick="WikiDirectory.view(this, 0);" class="expansion-0 "> Classic</a></li>
          </ul>
        </div>
<script type="text/javascript">
//<![CDATA[
$(function() {
WikiDirectory.initialize(3);
});
//]]>
</script>
        <span class="clear">
          <!-- -->
        </span>
      </div>
    </div>
  </div>
</div>
