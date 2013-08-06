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

$Menu =
array(
   'label' => 'World of Warcraft',
   'url' => '/',
   'children' => 
  array (
    array(
       'label' => 'Game',
       'url' => '/game/',
       'children' => 
      array (
        array(
           'label' => 'Beginner’s Guide',
           'url' => '/game/guide/',
           'children' => 
          array (
            array(
               'label' => 'Beginner’s Guide',
               'url' => '/game/guide/',
            ),
            array(
               'label' => 'Chapter I: Getting Started',
               'url' => '/game/guide/getting-started/',
            ),
            array(
               'label' => 'Chapter II: How to Play',
               'url' => '/game/guide/how-to-play/',
            ),
            array(
               'label' => 'Chapter III: Playing Together',
               'url' => '/game/guide/playing-together/',
            ),
            array(
               'label' => 'Chapter IV: The Late Game',
               'url' => '/game/guide/late-game/',
            ),
          ),
        ),
        array(
           'label' => 'Game Content',
           'url' => '',
        ),
        array(
           'label' => 'Classes',
           'url' => '/game/class/',
           'children' => 
          array (
            array(
               'label' => 'Death Knight',
               'url' => '/game/class/death-knight/',
            ),
            array(
               'label' => 'Druid',
               'url' => '/game/class/druid/',
            ),
            array(
               'label' => 'Hunter',
               'url' => '/game/class/hunter/',
            ),
            array(
               'label' => 'Mage',
               'url' => '/game/class/mage/',
            ),
            array(
               'label' => 'Paladin',
               'url' => '/game/class/paladin/',
            ),
            array(
               'label' => 'Priest',
               'url' => '/game/class/priest/',
            ),
            array(
               'label' => 'Rogue',
               'url' => '/game/class/rogue/',
            ),
            array(
               'label' => 'Shaman',
               'url' => '/game/class/shaman/',
            ),
            array(
               'label' => 'Warlock',
               'url' => '/game/class/warlock/',
            ),
            array(
               'label' => 'Warrior',
               'url' => '/game/class/warrior/',
            ),
          ),
        ),
        array(
           'label' => 'Dungeons & Raids',
           'url' => '/zone/',
           'children' => 
          array (
            array(
               'label' => 'Dungeons',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/zone/#expansion=3&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Blackrock Caverns',
                   'url' => '/zone/blackrock-caverns/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Rom\'ogg Bonecrusher',
                       'url' => '/zone/blackrock-caverns/romogg-bonecrusher/',
                    ),
                    array(
                       'label' => 'Corla, Herald of Twilight',
                       'url' => '/zone/blackrock-caverns/corla-herald-of-twilight/',
                    ),
                    array(
                       'label' => 'Karsh Steelbender',
                       'url' => '/zone/blackrock-caverns/karsh-steelbender/',
                    ),
                    array(
                       'label' => 'Beauty',
                       'url' => '/zone/blackrock-caverns/beauty/',
                    ),
                    array(
                       'label' => 'Ascendant Lord Obsidius',
                       'url' => '/zone/blackrock-caverns/ascendant-lord-obsidius/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Deadmines',
                   'url' => '/zone/deadmines/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Glubtok',
                       'url' => '/zone/deadmines/glubtok/',
                    ),
                    array(
                       'label' => 'Helix Gearbreaker',
                       'url' => '/zone/deadmines/helix-gearbreaker/',
                    ),
                    array(
                       'label' => 'Foe Reaper 5000',
                       'url' => '/zone/deadmines/foe-reaper-5000/',
                    ),
                    array(
                       'label' => 'Admiral Ripsnarl',
                       'url' => '/zone/deadmines/admiral-ripsnarl/',
                    ),
                    array(
                       'label' => '"Captain" Cookie',
                       'url' => '/zone/deadmines/captain-cookie/',
                    ),
                    array(
                       'label' => 'Vanessa VanCleef',
                       'url' => '/zone/deadmines/vanessa-vancleef/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Grim Batol',
                   'url' => '/zone/grim-batol/',
                   'children' => 
                  array (
                    array(
                       'label' => 'General Umbriss',
                       'url' => '/zone/grim-batol/general-umbriss/',
                    ),
                    array(
                       'label' => 'Forgemaster Throngus',
                       'url' => '/zone/grim-batol/forgemaster-throngus/',
                    ),
                    array(
                       'label' => 'Drahga Shadowburner',
                       'url' => '/zone/grim-batol/drahga-shadowburner/',
                    ),
                    array(
                       'label' => 'Erudax',
                       'url' => '/zone/grim-batol/erudax/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Halls of Origination',
                   'url' => '/zone/halls-of-origination/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Temple Guardian Anhuur',
                       'url' => '/zone/halls-of-origination/temple-guardian-anhuur/',
                    ),
                    array(
                       'label' => 'Earthrager Ptah',
                       'url' => '/zone/halls-of-origination/earthrager-ptah/',
                    ),
                    array(
                       'label' => 'Anraphet',
                       'url' => '/zone/halls-of-origination/anraphet/',
                    ),
                    array(
                       'label' => 'Isiset',
                       'url' => '/zone/halls-of-origination/isiset/',
                    ),
                    array(
                       'label' => 'Ammunae',
                       'url' => '/zone/halls-of-origination/ammunae/',
                    ),
                    array(
                       'label' => 'Setesh',
                       'url' => '/zone/halls-of-origination/setesh/',
                    ),
                    array(
                       'label' => 'Rajh',
                       'url' => '/zone/halls-of-origination/rajh/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Lost City of the Tol\'vir',
                   'url' => '/zone/lost-city-of-the-tolvir/',
                   'children' => 
                  array (
                    array(
                       'label' => 'General Husam',
                       'url' => '/zone/lost-city-of-the-tolvir/general-husam/',
                    ),
                    array(
                       'label' => 'High Prophet Barim',
                       'url' => '/zone/lost-city-of-the-tolvir/high-prophet-barim/',
                    ),
                    array(
                       'label' => 'Lockmaw',
                       'url' => '/zone/lost-city-of-the-tolvir/lockmaw/',
                    ),
                    array(
                       'label' => 'Augh',
                       'url' => '/zone/lost-city-of-the-tolvir/augh/',
                    ),
                    array(
                       'label' => 'Siamat',
                       'url' => '/zone/lost-city-of-the-tolvir/siamat/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Shadowfang Keep',
                   'url' => '/zone/shadowfang-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Baron Ashbury',
                       'url' => '/zone/shadowfang-keep/baron-ashbury/',
                    ),
                    array(
                       'label' => 'Baron Silverlaine',
                       'url' => '/zone/shadowfang-keep/baron-silverlaine/',
                    ),
                    array(
                       'label' => 'Commander Springvale',
                       'url' => '/zone/shadowfang-keep/commander-springvale/',
                    ),
                    array(
                       'label' => 'Lord Walden',
                       'url' => '/zone/shadowfang-keep/lord-walden/',
                    ),
                    array(
                       'label' => 'Lord Godfrey',
                       'url' => '/zone/shadowfang-keep/lord-godfrey/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Stonecore',
                   'url' => '/zone/the-stonecore/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Corborus',
                       'url' => '/zone/the-stonecore/corborus/',
                    ),
                    array(
                       'label' => 'Slabhide',
                       'url' => '/zone/the-stonecore/slabhide/',
                    ),
                    array(
                       'label' => 'Ozruk',
                       'url' => '/zone/the-stonecore/ozruk/',
                    ),
                    array(
                       'label' => 'High Priestess Azil',
                       'url' => '/zone/the-stonecore/high-priestess-azil/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Vortex Pinnacle',
                   'url' => '/zone/the-vortex-pinnacle/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Grand Vizier Ertan',
                       'url' => '/zone/the-vortex-pinnacle/grand-vizier-ertan/',
                    ),
                    array(
                       'label' => 'Altairus',
                       'url' => '/zone/the-vortex-pinnacle/altairus/',
                    ),
                    array(
                       'label' => 'Asaad',
                       'url' => '/zone/the-vortex-pinnacle/asaad/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Throne of the Tides',
                   'url' => '/zone/throne-of-the-tides/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Lady Naz\'jar',
                       'url' => '/zone/throne-of-the-tides/lady-nazjar/',
                    ),
                    array(
                       'label' => 'Commander Ulthok',
                       'url' => '/zone/throne-of-the-tides/commander-ulthok/',
                    ),
                    array(
                       'label' => 'Mindbender Ghur\'sha',
                       'url' => '/zone/throne-of-the-tides/mindbender-ghursha/',
                    ),
                    array(
                       'label' => 'Ozumat',
                       'url' => '/zone/throne-of-the-tides/ozumat/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Zul\'Aman',
                   'url' => '/zone/zulaman/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Akil\'zon',
                       'url' => '/zone/zulaman/akilzon/',
                    ),
                    array(
                       'label' => 'Nalorakk',
                       'url' => '/zone/zulaman/nalorakk/',
                    ),
                    array(
                       'label' => 'Jan\'alai',
                       'url' => '/zone/zulaman/janalai/',
                    ),
                    array(
                       'label' => 'Halazzi',
                       'url' => '/zone/zulaman/halazzi/',
                    ),
                    array(
                       'label' => 'Hex Lord Malacrass',
                       'url' => '/zone/zulaman/hex-lord-malacrass/',
                    ),
                    array(
                       'label' => 'Daakara',
                       'url' => '/zone/zulaman/daakara/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Zul\'Gurub',
                   'url' => '/zone/zulgurub/',
                   'children' => 
                  array (
                    array(
                       'label' => 'High Priest Venoxis',
                       'url' => '/zone/zulgurub/high-priest-venoxis/',
                    ),
                    array(
                       'label' => 'Bloodlord Mandokir',
                       'url' => '/zone/zulgurub/bloodlord-mandokir/',
                    ),
                    array(
                       'label' => 'Cache of Madness',
                       'url' => '/zone/zulgurub/cache-of-madness/',
                    ),
                    array(
                       'label' => 'High Priestess Kilnara',
                       'url' => '/zone/zulgurub/high-priestess-kilnara/',
                    ),
                    array(
                       'label' => 'Zanzil',
                       'url' => '/zone/zulgurub/zanzil/',
                    ),
                    array(
                       'label' => 'Jin\'do the Godbreaker',
                       'url' => '/zone/zulgurub/jindo-the-godbreaker/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/zone/#expansion=2&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Ahn\'kahet: The Old Kingdom',
                   'url' => '/zone/ahnkahet-the-old-kingdom/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Elder Nadox',
                       'url' => '/zone/ahnkahet-the-old-kingdom/elder-nadox/',
                    ),
                    array(
                       'label' => 'Prince Taldaram',
                       'url' => '/zone/ahnkahet-the-old-kingdom/prince-taldaram/',
                    ),
                    array(
                       'label' => 'Jedoga Shadowseeker',
                       'url' => '/zone/ahnkahet-the-old-kingdom/jedoga-shadowseeker/',
                    ),
                    array(
                       'label' => 'Herald Volazj',
                       'url' => '/zone/ahnkahet-the-old-kingdom/herald-volazj/',
                    ),
                    array(
                       'label' => 'Amanitar',
                       'url' => '/zone/ahnkahet-the-old-kingdom/amanitar/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Azjol-Nerub',
                   'url' => '/zone/azjolnerub/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Krik\'thir the Gatewatcher',
                       'url' => '/zone/azjolnerub/krikthir-the-gatewatcher/',
                    ),
                    array(
                       'label' => 'Hadronox',
                       'url' => '/zone/azjolnerub/hadronox/',
                    ),
                    array(
                       'label' => 'Anub\'arak',
                       'url' => '/zone/azjolnerub/anubarak/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Drak\'Tharon Keep',
                   'url' => '/zone/draktharon-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Trollgore',
                       'url' => '/zone/draktharon-keep/trollgore/',
                    ),
                    array(
                       'label' => 'Novos the Summoner',
                       'url' => '/zone/draktharon-keep/novos-the-summoner/',
                    ),
                    array(
                       'label' => 'King Dred',
                       'url' => '/zone/draktharon-keep/king-dred/',
                    ),
                    array(
                       'label' => 'The Prophet Tharon\'ja',
                       'url' => '/zone/draktharon-keep/the-prophet-tharonja/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Gundrak',
                   'url' => '/zone/gundrak/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Slad\'ran',
                       'url' => '/zone/gundrak/sladran/',
                    ),
                    array(
                       'label' => 'Drakkari Colossus',
                       'url' => '/zone/gundrak/drakkari-colossus/',
                    ),
                    array(
                       'label' => 'Eck the Ferocious',
                       'url' => '/zone/gundrak/eck-the-ferocious/',
                    ),
                    array(
                       'label' => 'Moorabi',
                       'url' => '/zone/gundrak/moorabi/',
                    ),
                    array(
                       'label' => 'Gal\'darah',
                       'url' => '/zone/gundrak/galdarah/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Halls of Lightning',
                   'url' => '/zone/halls-of-lightning/',
                   'children' => 
                  array (
                    array(
                       'label' => 'General Bjarngrim',
                       'url' => '/zone/halls-of-lightning/general-bjarngrim/',
                    ),
                    array(
                       'label' => 'Volkhan',
                       'url' => '/zone/halls-of-lightning/volkhan/',
                    ),
                    array(
                       'label' => 'Ionar',
                       'url' => '/zone/halls-of-lightning/ionar/',
                    ),
                    array(
                       'label' => 'Loken',
                       'url' => '/zone/halls-of-lightning/loken/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Halls of Reflection',
                   'url' => '/zone/halls-of-reflection/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Falric',
                       'url' => '/zone/halls-of-reflection/falric/',
                    ),
                    array(
                       'label' => 'Marwyn',
                       'url' => '/zone/halls-of-reflection/marwyn/',
                    ),
                    array(
                       'label' => 'Escaped from Arthas',
                       'url' => '/zone/halls-of-reflection/escaped-from-arthas/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Halls of Stone',
                   'url' => '/zone/halls-of-stone/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Krystallus',
                       'url' => '/zone/halls-of-stone/krystallus/',
                    ),
                    array(
                       'label' => 'Maiden of Grief',
                       'url' => '/zone/halls-of-stone/maiden-of-grief/',
                    ),
                    array(
                       'label' => 'Tribunal of Ages',
                       'url' => '/zone/halls-of-stone/tribunal-of-ages/',
                    ),
                    array(
                       'label' => 'Sjonnir The Ironshaper',
                       'url' => '/zone/halls-of-stone/sjonnir-the-ironshaper/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Pit of Saron',
                   'url' => '/zone/pit-of-saron/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Forgemaster Garfrost',
                       'url' => '/zone/pit-of-saron/forgemaster-garfrost/',
                    ),
                    array(
                       'label' => 'Krick',
                       'url' => '/zone/pit-of-saron/krick/',
                    ),
                    array(
                       'label' => 'Scourgelord Tyrannus',
                       'url' => '/zone/pit-of-saron/scourgelord-tyrannus/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Culling of Stratholme',
                   'url' => '/zone/the-culling-of-stratholme/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Meathook',
                       'url' => '/zone/the-culling-of-stratholme/meathook/',
                    ),
                    array(
                       'label' => 'Salramm the Fleshcrafter',
                       'url' => '/zone/the-culling-of-stratholme/salramm-the-fleshcrafter/',
                    ),
                    array(
                       'label' => 'Chrono-Lord Epoch',
                       'url' => '/zone/the-culling-of-stratholme/chronolord-epoch/',
                    ),
                    array(
                       'label' => 'Mal\'Ganis',
                       'url' => '/zone/the-culling-of-stratholme/malganis/',
                    ),
                    array(
                       'label' => 'Infinite Corruptor',
                       'url' => '/zone/the-culling-of-stratholme/infinite-corruptor/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Forge of Souls',
                   'url' => '/zone/the-forge-of-souls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Bronjahm',
                       'url' => '/zone/the-forge-of-souls/bronjahm/',
                    ),
                    array(
                       'label' => 'Devourer of Souls',
                       'url' => '/zone/the-forge-of-souls/devourer-of-souls/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Nexus',
                   'url' => '/zone/the-nexus/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Frozen Commander',
                       'url' => '/zone/the-nexus/frozen-commander/',
                    ),
                    array(
                       'label' => 'Grand Magus Telestra',
                       'url' => '/zone/the-nexus/grand-magus-telestra/',
                    ),
                    array(
                       'label' => 'Anomalus',
                       'url' => '/zone/the-nexus/anomalus/',
                    ),
                    array(
                       'label' => 'Ormorok the Tree-Shaper',
                       'url' => '/zone/the-nexus/ormorok-the-treeshaper/',
                    ),
                    array(
                       'label' => 'Keristrasza',
                       'url' => '/zone/the-nexus/keristrasza/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Oculus',
                   'url' => '/zone/the-oculus/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Drakos the Interrogator',
                       'url' => '/zone/the-oculus/drakos-the-interrogator/',
                    ),
                    array(
                       'label' => 'Varos Cloudstrider',
                       'url' => '/zone/the-oculus/varos-cloudstrider/',
                    ),
                    array(
                       'label' => 'Mage-Lord Urom',
                       'url' => '/zone/the-oculus/magelord-urom/',
                    ),
                    array(
                       'label' => 'Ley-Guardian Eregos',
                       'url' => '/zone/the-oculus/leyguardian-eregos/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Trial of the Champion',
                   'url' => '/zone/trial-of-the-champion/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Grand Champions',
                       'url' => '/zone/trial-of-the-champion/grand-champions/',
                    ),
                    array(
                       'label' => 'Argent Champion',
                       'url' => '/zone/trial-of-the-champion/argent-champion/',
                    ),
                    array(
                       'label' => 'The Black Knight',
                       'url' => '/zone/trial-of-the-champion/the-black-knight/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Utgarde Keep',
                   'url' => '/zone/utgarde-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Prince Keleseth',
                       'url' => '/zone/utgarde-keep/prince-keleseth/',
                    ),
                    array(
                       'label' => 'Skarvald the Constructor',
                       'url' => '/zone/utgarde-keep/skarvald-the-constructor/',
                    ),
                    array(
                       'label' => 'Ingvar the Plunderer',
                       'url' => '/zone/utgarde-keep/ingvar-the-plunderer/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Utgarde Pinnacle',
                   'url' => '/zone/utgarde-pinnacle/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Svala Sorrowgrave',
                       'url' => '/zone/utgarde-pinnacle/svala-sorrowgrave/',
                    ),
                    array(
                       'label' => 'Gortok Palehoof',
                       'url' => '/zone/utgarde-pinnacle/gortok-palehoof/',
                    ),
                    array(
                       'label' => 'Skadi the Ruthless',
                       'url' => '/zone/utgarde-pinnacle/skadi-the-ruthless/',
                    ),
                    array(
                       'label' => 'King Ymiron',
                       'url' => '/zone/utgarde-pinnacle/king-ymiron/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Violet Hold',
                   'url' => '/zone/violet-hold/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Erekem',
                       'url' => '/zone/violet-hold/erekem/',
                    ),
                    array(
                       'label' => 'Moragg',
                       'url' => '/zone/violet-hold/moragg/',
                    ),
                    array(
                       'label' => 'Ichoron',
                       'url' => '/zone/violet-hold/ichoron/',
                    ),
                    array(
                       'label' => 'Xevozz',
                       'url' => '/zone/violet-hold/xevozz/',
                    ),
                    array(
                       'label' => 'Lavanthor',
                       'url' => '/zone/violet-hold/lavanthor/',
                    ),
                    array(
                       'label' => 'Zuramat the Obliterator',
                       'url' => '/zone/violet-hold/zuramat-the-obliterator/',
                    ),
                    array(
                       'label' => 'Cyanigosa',
                       'url' => '/zone/violet-hold/cyanigosa/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'The Burning Crusade',
               'url' => '/zone/#expansion=1&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Auchenai Crypts',
                   'url' => '/zone/auchenai-crypts/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Shirrak the Dead Watcher',
                       'url' => '/zone/auchenai-crypts/shirrak-the-dead-watcher/',
                    ),
                    array(
                       'label' => 'Exarch Maladaar',
                       'url' => '/zone/auchenai-crypts/exarch-maladaar/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Hellfire Ramparts',
                   'url' => '/zone/hellfire-ramparts/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Watchkeeper Gargolmar',
                       'url' => '/zone/hellfire-ramparts/watchkeeper-gargolmar/',
                    ),
                    array(
                       'label' => 'Omor the Unscarred',
                       'url' => '/zone/hellfire-ramparts/omor-the-unscarred/',
                    ),
                    array(
                       'label' => 'Vazruden the Herald',
                       'url' => '/zone/hellfire-ramparts/vazruden-the-herald/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Magister\'s Terrace',
                   'url' => '/zone/magisters-terrace/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Selin Fireheart',
                       'url' => '/zone/magisters-terrace/selin-fireheart/',
                    ),
                    array(
                       'label' => 'Vexallus',
                       'url' => '/zone/magisters-terrace/vexallus/',
                    ),
                    array(
                       'label' => 'Priestess Delrissa',
                       'url' => '/zone/magisters-terrace/priestess-delrissa/',
                    ),
                    array(
                       'label' => 'Kael\'thas Sunstrider',
                       'url' => '/zone/magisters-terrace/kaelthas-sunstrider/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Mana-Tombs',
                   'url' => '/zone/manatombs/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Pandemonius',
                       'url' => '/zone/manatombs/pandemonius/',
                    ),
                    array(
                       'label' => 'Tavarok',
                       'url' => '/zone/manatombs/tavarok/',
                    ),
                    array(
                       'label' => 'Nexus-Prince Shaffar',
                       'url' => '/zone/manatombs/nexusprince-shaffar/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Opening of the Dark Portal',
                   'url' => '/zone/opening-of-the-dark-portal/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Chrono Lord Deja',
                       'url' => '/zone/opening-of-the-dark-portal/chrono-lord-deja/',
                    ),
                    array(
                       'label' => 'Temporus',
                       'url' => '/zone/opening-of-the-dark-portal/temporus/',
                    ),
                    array(
                       'label' => 'Aeonus',
                       'url' => '/zone/opening-of-the-dark-portal/aeonus/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Sethekk Halls',
                   'url' => '/zone/sethekk-halls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Darkweaver Syth',
                       'url' => '/zone/sethekk-halls/darkweaver-syth/',
                    ),
                    array(
                       'label' => 'Talon King Ikiss',
                       'url' => '/zone/sethekk-halls/talon-king-ikiss/',
                    ),
                    array(
                       'label' => 'Anzu',
                       'url' => '/zone/sethekk-halls/anzu/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Shadow Labyrinth',
                   'url' => '/zone/shadow-labyrinth/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ambassador Hellmaw',
                       'url' => '/zone/shadow-labyrinth/ambassador-hellmaw/',
                    ),
                    array(
                       'label' => 'Blackheart the Inciter',
                       'url' => '/zone/shadow-labyrinth/blackheart-the-inciter/',
                    ),
                    array(
                       'label' => 'Grandmaster Vorpil',
                       'url' => '/zone/shadow-labyrinth/grandmaster-vorpil/',
                    ),
                    array(
                       'label' => 'Murmur',
                       'url' => '/zone/shadow-labyrinth/murmur/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Arcatraz',
                   'url' => '/zone/the-arcatraz/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Zereketh the Unbound',
                       'url' => '/zone/the-arcatraz/zereketh-the-unbound/',
                    ),
                    array(
                       'label' => 'Dalliah the Doomsayer',
                       'url' => '/zone/the-arcatraz/dalliah-the-doomsayer/',
                    ),
                    array(
                       'label' => 'Wrath-Scryer Soccothrates',
                       'url' => '/zone/the-arcatraz/wrathscryer-soccothrates/',
                    ),
                    array(
                       'label' => 'Harbinger Skyriss',
                       'url' => '/zone/the-arcatraz/harbinger-skyriss/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Blood Furnace',
                   'url' => '/zone/the-blood-furnace/',
                   'children' => 
                  array (
                    array(
                       'label' => 'The Maker',
                       'url' => '/zone/the-blood-furnace/the-maker/',
                    ),
                    array(
                       'label' => 'Broggok',
                       'url' => '/zone/the-blood-furnace/broggok/',
                    ),
                    array(
                       'label' => 'Keli\'dan the Breaker',
                       'url' => '/zone/the-blood-furnace/kelidan-the-breaker/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Botanica',
                   'url' => '/zone/the-botanica/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Commander Sarannis',
                       'url' => '/zone/the-botanica/commander-sarannis/',
                    ),
                    array(
                       'label' => 'High Botanist Freywinn',
                       'url' => '/zone/the-botanica/high-botanist-freywinn/',
                    ),
                    array(
                       'label' => 'Thorngrin the Tender',
                       'url' => '/zone/the-botanica/thorngrin-the-tender/',
                    ),
                    array(
                       'label' => 'Laj',
                       'url' => '/zone/the-botanica/laj/',
                    ),
                     array(
                       'label' => 'Warp Splinter',
                       'url' => '/zone/the-botanica/warp-splinter/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Escape From Durnholde',
                   'url' => '/zone/the-escape-from-durnholde/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Lieutenant Drake',
                       'url' => '/zone/the-escape-from-durnholde/lieutenant-drake/',
                    ),
                    array(
                       'label' => 'Captain Skarloc',
                       'url' => '/zone/the-escape-from-durnholde/captain-skarloc/',
                    ),
                    array(
                       'label' => 'Epoch Hunter',
                       'url' => '/zone/the-escape-from-durnholde/epoch-hunter/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Mechanar',
                   'url' => '/zone/the-mechanar/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Mechano-Lord Capacitus',
                       'url' => '/zone/the-mechanar/mechanolord-capacitus/',
                    ),
                    array(
                       'label' => 'The Gatewatchers',
                       'url' => '/zone/the-mechanar/the-gatewatchers/',
                    ),
                    array(
                       'label' => 'Nethermancer Sepethrea',
                       'url' => '/zone/the-mechanar/nethermancer-sepethrea/',
                    ),
                    array(
                       'label' => 'Pathaleon the Calculator',
                       'url' => '/zone/the-mechanar/pathaleon-the-calculator/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Shattered Halls',
                   'url' => '/zone/the-shattered-halls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Grand Warlock Nethekurse',
                       'url' => '/zone/the-shattered-halls/grand-warlock-nethekurse/',
                    ),
                    array(
                       'label' => 'Blood Guard Porung',
                       'url' => '/zone/the-shattered-halls/blood-guard-porung/',
                    ),
                    array(
                       'label' => 'Warbringer O\'mrogg',
                       'url' => '/zone/the-shattered-halls/warbringer-omrogg/',
                    ),
                    array(
                       'label' => 'Warchief Kargath Bladefist',
                       'url' => '/zone/the-shattered-halls/warchief-kargath-bladefist/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Slave Pens',
                   'url' => '/zone/the-slave-pens/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Mennu the Betrayer',
                       'url' => '/zone/the-slave-pens/mennu-the-betrayer/',
                    ),
                    array(
                       'label' => 'Rokmar the Crackler',
                       'url' => '/zone/the-slave-pens/rokmar-the-crackler/',
                    ),
                    array(
                       'label' => 'Quagmirran',
                       'url' => '/zone/the-slave-pens/quagmirran/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Steamvault',
                   'url' => '/zone/the-steamvault/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Hydromancer Thespia',
                       'url' => '/zone/the-steamvault/hydromancer-thespia/',
                    ),
                    array(
                       'label' => 'Mekgineer Steamrigger',
                       'url' => '/zone/the-steamvault/mekgineer-steamrigger/',
                    ),
                    array(
                       'label' => 'Warlord Kalithresh',
                       'url' => '/zone/the-steamvault/warlord-kalithresh/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Underbog',
                   'url' => '/zone/the-underbog/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Hungarfen',
                       'url' => '/zone/the-underbog/hungarfen/',
                    ),
                    array(
                       'label' => 'Ghaz\'an',
                       'url' => '/zone/the-underbog/ghazan/',
                    ),
                    array(
                       'label' => 'Swamplord Musel\'ek',
                       'url' => '/zone/the-underbog/swamplord-muselek/',
                    ),
                    array(
                       'label' => 'The Black Stalker',
                       'url' => '/zone/the-underbog/the-black-stalker/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Classic',
               'url' => '/zone/#expansion=0&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Blackfathom Deeps',
                   'url' => '/zone/blackfathom-deeps/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ghamoo-Ra',
                       'url' => '/zone/blackfathom-deeps/ghamoora/',
                    ),
                    array(
                       'label' => 'Lady Sarevess',
                       'url' => '/zone/blackfathom-deeps/lady-sarevess/',
                    ),
                    array(
                       'label' => 'Gelihast',
                       'url' => '/zone/blackfathom-deeps/gelihast/',
                    ),
                    array(
                       'label' => 'Lorgus Jett',
                       'url' => '/zone/blackfathom-deeps/lorgus-jett/',
                    ),
                    array(
                       'label' => 'Old Serra\'kis',
                       'url' => '/zone/blackfathom-deeps/old-serrakis/',
                    ),
                    array(
                       'label' => 'Twilight Lord Kelris',
                       'url' => '/zone/blackfathom-deeps/twilight-lord-kelris/',
                    ),
                    array(
                       'label' => 'Aku\'mai',
                       'url' => '/zone/blackfathom-deeps/akumai/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Blackrock Depths',
                   'url' => '/zone/blackrock-depths/',
                   'children' => 
                  array (
                    array(
                       'label' => 'High Interrogator Gerstahn',
                       'url' => '/zone/blackrock-depths/high-interrogator-gerstahn/',
                    ),
                    array(
                       'label' => 'Lord Roccor',
                       'url' => '/zone/blackrock-depths/lord-roccor/',
                    ),
                    array(
                       'label' => 'Houndmaster Grebmar',
                       'url' => '/zone/blackrock-depths/houndmaster-grebmar/',
                    ),
                    array(
                       'label' => 'Ring of Law',
                       'url' => '/zone/blackrock-depths/ring-of-law/',
                    ),
                    array(
                       'label' => 'Pyromancer Loregrain',
                       'url' => '/zone/blackrock-depths/pyromancer-loregrain/',
                    ),
                    array(
                       'label' => 'Lord Incendius',
                       'url' => '/zone/blackrock-depths/lord-incendius/',
                    ),
                    array(
                       'label' => 'Warder Stilgiss',
                       'url' => '/zone/blackrock-depths/warder-stilgiss/',
                    ),
                    array(
                       'label' => 'Fineous Darkvire',
                       'url' => '/zone/blackrock-depths/fineous-darkvire/',
                    ),
                    array(
                       'label' => 'Bael\'Gar',
                       'url' => '/zone/blackrock-depths/baelgar/',
                    ),
                    array(
                       'label' => 'General Angerforge',
                       'url' => '/zone/blackrock-depths/general-angerforge/',
                    ),
                    array(
                       'label' => 'Golem Lord Argelmach',
                       'url' => '/zone/blackrock-depths/golem-lord-argelmach/',
                    ),
                    array(
                       'label' => 'Hurley Blackbreath',
                       'url' => '/zone/blackrock-depths/hurley-blackbreath/',
                    ),
                    array(
                       'label' => 'Phalanx',
                       'url' => '/zone/blackrock-depths/phalanx/',
                    ),
                    array(
                       'label' => 'Ribbly Screwspigot',
                       'url' => '/zone/blackrock-depths/ribbly-screwspigot/',
                    ),
                    array(
                       'label' => 'Plugger Spazzring',
                       'url' => '/zone/blackrock-depths/plugger-spazzring/',
                    ),
                    array(
                       'label' => 'Ambassador Flamelash',
                       'url' => '/zone/blackrock-depths/ambassador-flamelash/',
                    ),
                    array(
                       'label' => 'The Seven',
                       'url' => '/zone/blackrock-depths/the-seven/',
                    ),
                    array(
                       'label' => 'Magmus',
                       'url' => '/zone/blackrock-depths/magmus/',
                    ),
                    array(
                       'label' => 'Emperor Dagran Thaurissan',
                       'url' => '/zone/blackrock-depths/emperor-dagran-thaurissan/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Blackrock Spire',
                   'url' => '/zone/blackrock-spire/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Highlord Omokk',
                       'url' => '/zone/blackrock-spire/highlord-omokk/',
                    ),
                    array(
                       'label' => 'Shadow Hunter Vosh\'gajin',
                       'url' => '/zone/blackrock-spire/shadow-hunter-voshgajin/',
                    ),
                    array(
                       'label' => 'War Master Voone',
                       'url' => '/zone/blackrock-spire/war-master-voone/',
                    ),
                    array(
                       'label' => 'Mother Smolderweb',
                       'url' => '/zone/blackrock-spire/mother-smolderweb/',
                    ),
                    array(
                       'label' => 'Urok Doomhowl',
                       'url' => '/zone/blackrock-spire/urok-doomhowl/',
                    ),
                    array(
                       'label' => 'Quartermaster Zigris',
                       'url' => '/zone/blackrock-spire/quartermaster-zigris/',
                    ),
                    array(
                       'label' => 'Halycon',
                       'url' => '/zone/blackrock-spire/halycon/',
                    ),
                    array(
                       'label' => 'Gizrul the Slavener',
                       'url' => '/zone/blackrock-spire/gizrul-the-slavener/',
                    ),
                    array(
                       'label' => 'Overlord Wyrmthalak',
                       'url' => '/zone/blackrock-spire/overlord-wyrmthalak/',
                    ),
                    array(
                       'label' => 'Pyroguard Emberseer',
                       'url' => '/zone/blackrock-spire/pyroguard-emberseer/',
                    ),
                    array(
                       'label' => 'Solakar Flamewreath',
                       'url' => '/zone/blackrock-spire/solakar-flamewreath/',
                    ),
                    array(
                       'label' => 'Warchief Rend Blackhand',
                       'url' => '/zone/blackrock-spire/warchief-rend-blackhand/',
                    ),
                    array(
                       'label' => 'The Beast',
                       'url' => '/zone/blackrock-spire/the-beast/',
                    ),
                    array(
                       'label' => 'General Drakkisath',
                       'url' => '/zone/blackrock-spire/general-drakkisath/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Deadmines',
                   'url' => '/zone/deadmines/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Glubtok',
                       'url' => '/zone/deadmines/glubtok/',
                    ),
                    array(
                       'label' => 'Helix Gearbreaker',
                       'url' => '/zone/deadmines/helix-gearbreaker/',
                    ),
                    array(
                       'label' => 'Foe Reaper 5000',
                       'url' => '/zone/deadmines/foe-reaper-5000/',
                    ),
                    array(
                       'label' => 'Admiral Ripsnarl',
                       'url' => '/zone/deadmines/admiral-ripsnarl/',
                    ),
                    array(
                       'label' => '"Captain" Cookie',
                       'url' => '/zone/deadmines/captain-cookie/',
                    ),
                    array(
                       'label' => 'Vanessa VanCleef',
                       'url' => '/zone/deadmines/vanessa-vancleef/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Dire Maul',
                   'url' => '/zone/dire-maul/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Zevrim Thornhoof',
                       'url' => '/zone/dire-maul/zevrim-thornhoof/',
                    ),
                    array(
                       'label' => 'Hydrospawn',
                       'url' => '/zone/dire-maul/hydrospawn/',
                    ),
                    array(
                       'label' => 'Lethtendris',
                       'url' => '/zone/dire-maul/lethtendris/',
                    ),
                    array(
                       'label' => 'Alzzin the Wildshaper',
                       'url' => '/zone/dire-maul/alzzin-the-wildshaper/',
                    ),
                    array(
                       'label' => 'Tendris Warpwood',
                       'url' => '/zone/dire-maul/tendris-warpwood/',
                    ),
                    array(
                       'label' => 'Illyanna Ravenoak',
                       'url' => '/zone/dire-maul/illyanna-ravenoak/',
                    ),
                    array(
                       'label' => 'Magister Kalendris',
                       'url' => '/zone/dire-maul/magister-kalendris/',
                    ),
                    array(
                       'label' => 'Immol\'thar',
                       'url' => '/zone/dire-maul/immolthar/',
                    ),
                    array(
                       'label' => 'Prince Tortheldrin',
                       'url' => '/zone/dire-maul/prince-tortheldrin/',
                    ),
                    array(
                       'label' => 'Guard Mol\'dar',
                       'url' => '/zone/dire-maul/guard-moldar/',
                    ),
                    array(
                       'label' => 'Stomper Kreeg',
                       'url' => '/zone/dire-maul/stomper-kreeg/',
                    ),
                    array(
                       'label' => 'Guard Fengus',
                       'url' => '/zone/dire-maul/guard-fengus/',
                    ),
                    array(
                       'label' => 'Guard Slip\'kik',
                       'url' => '/zone/dire-maul/guard-slipkik/',
                    ),
                    array(
                       'label' => 'Captain Kromcrush',
                       'url' => '/zone/dire-maul/captain-kromcrush/',
                    ),
                    array(
                       'label' => 'Cho\'Rush the Observer',
                       'url' => '/zone/dire-maul/chorush-the-observer/',
                    ),
                    array(
                       'label' => 'King Gordok',
                       'url' => '/zone/dire-maul/king-gordok/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Gnomeregan',
                   'url' => '/zone/gnomeregan/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Grubbis',
                       'url' => '/zone/gnomeregan/grubbis/',
                    ),
                    array(
                       'label' => 'Viscous Fallout',
                       'url' => '/zone/gnomeregan/viscous-fallout/',
                    ),
                    array(
                       'label' => 'Electrocutioner 6000',
                       'url' => '/zone/gnomeregan/electrocutioner-6000/',
                    ),
                    array(
                       'label' => 'Crowd Pummeler 9-60',
                       'url' => '/zone/gnomeregan/crowd-pummeler-960/',
                    ),
                    array(
                       'label' => 'Mekgineer Thermaplugg',
                       'url' => '/zone/gnomeregan/mekgineer-thermaplugg/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Maraudon',
                   'url' => '/zone/maraudon/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Noxxion',
                       'url' => '/zone/maraudon/noxxion/',
                    ),
                    array(
                       'label' => 'Razorlash',
                       'url' => '/zone/maraudon/razorlash/',
                    ),
                    array(
                       'label' => 'Lord Vyletongue',
                       'url' => '/zone/maraudon/lord-vyletongue/',
                    ),
                    array(
                       'label' => 'Celebras the Cursed',
                       'url' => '/zone/maraudon/celebras-the-cursed/',
                    ),
                    array(
                       'label' => 'Landslide',
                       'url' => '/zone/maraudon/landslide/',
                    ),
                    array(
                       'label' => 'Tinkerer Gizlock',
                       'url' => '/zone/maraudon/tinkerer-gizlock/',
                    ),
                    array(
                       'label' => 'Rotgrip',
                       'url' => '/zone/maraudon/rotgrip/',
                    ),
                    array(
                       'label' => 'Princess Theradras',
                       'url' => '/zone/maraudon/princess-theradras/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ragefire Chasm',
                   'url' => '/zone/ragefire-chasm/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Oggleflint',
                       'url' => '/zone/ragefire-chasm/oggleflint/',
                    ),
                    array(
                       'label' => 'Jergosh the Invoker',
                       'url' => '/zone/ragefire-chasm/jergosh-the-invoker/',
                    ),
                    array(
                       'label' => 'Bazzalan',
                       'url' => '/zone/ragefire-chasm/bazzalan/',
                    ),
                    array(
                       'label' => 'Taragaman the Hungerer',
                       'url' => '/zone/ragefire-chasm/taragaman-the-hungerer/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Razorfen Downs',
                   'url' => '/zone/razorfen-downs/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Tuten\'kash',
                       'url' => '/zone/razorfen-downs/tutenkash/',
                    ),
                    array(
                       'label' => 'Mordresh Fire Eye',
                       'url' => '/zone/razorfen-downs/mordresh-fire-eye/',
                    ),
                    array(
                       'label' => 'Glutton',
                       'url' => '/zone/razorfen-downs/glutton/',
                    ),
                    array(
                       'label' => 'Amnennar the Coldbringer',
                       'url' => '/zone/razorfen-downs/amnennar-the-coldbringer/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Razorfen Kraul',
                   'url' => '/zone/razorfen-kraul/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Death Speaker Jargba',
                       'url' => '/zone/razorfen-kraul/death-speaker-jargba/',
                    ),
                    array(
                       'label' => 'Roogug',
                       'url' => '/zone/razorfen-kraul/roogug/',
                    ),
                    array(
                       'label' => 'Aggem Thorncurse',
                       'url' => '/zone/razorfen-kraul/aggem-thorncurse/',
                    ),
                    array(
                       'label' => 'Overlord Ramtusk',
                       'url' => '/zone/razorfen-kraul/overlord-ramtusk/',
                    ),
                    array(
                       'label' => 'Agathelos the Raging',
                       'url' => '/zone/razorfen-kraul/agathelos-the-raging/',
                    ),
                    array(
                       'label' => 'Charlga Razorflank',
                       'url' => '/zone/razorfen-kraul/charlga-razorflank/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Scarlet Monastery',
                   'url' => '/zone/scarlet-monastery/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Interrogator Vishas',
                       'url' => '/zone/scarlet-monastery/interrogator-vishas/',
                    ),
                    array(
                       'label' => 'Bloodmage Thalnos',
                       'url' => '/zone/scarlet-monastery/bloodmage-thalnos/',
                    ),
                    array(
                       'label' => 'Houndmaster Loksey',
                       'url' => '/zone/scarlet-monastery/houndmaster-loksey/',
                    ),
                    array(
                       'label' => 'Arcanist Doan',
                       'url' => '/zone/scarlet-monastery/arcanist-doan/',
                    ),
                    array(
                       'label' => 'Herod',
                       'url' => '/zone/scarlet-monastery/herod/',
                    ),
                    array(
                       'label' => 'High Inquisitor Fairbanks',
                       'url' => '/zone/scarlet-monastery/high-inquisitor-fairbanks/',
                    ),
                    array(
                       'label' => 'Scarlet Commander Mograine',
                       'url' => '/zone/scarlet-monastery/scarlet-commander-mograine/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Scholomance',
                   'url' => '/zone/scholomance/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Kirtonos the Herald',
                       'url' => '/zone/scholomance/kirtonos-the-herald/',
                    ),
                    array(
                       'label' => 'Jandice Barov',
                       'url' => '/zone/scholomance/jandice-barov/',
                    ),
                    array(
                       'label' => 'Rattlegore',
                       'url' => '/zone/scholomance/rattlegore/',
                    ),
                    array(
                       'label' => 'Marduk Blackpool',
                       'url' => '/zone/scholomance/marduk-blackpool/',
                    ),
                    array(
                       'label' => 'Vectus',
                       'url' => '/zone/scholomance/vectus/',
                    ),
                    array(
                       'label' => 'Ras Frostwhisper',
                       'url' => '/zone/scholomance/ras-frostwhisper/',
                    ),
                    array(
                       'label' => 'Instructor Malicia',
                       'url' => '/zone/scholomance/instructor-malicia/',
                    ),
                    array(
                       'label' => 'Doctor Theolen Krastinov',
                       'url' => '/zone/scholomance/doctor-theolen-krastinov/',
                    ),
                    array(
                       'label' => 'Lorekeeper Polkelt',
                       'url' => '/zone/scholomance/lorekeeper-polkelt/',
                    ),
                    array(
                       'label' => 'The Ravenian',
                       'url' => '/zone/scholomance/the-ravenian/',
                    ),
                    array(
                       'label' => 'Lord Alexei Barov',
                       'url' => '/zone/scholomance/lord-alexei-barov/',
                    ),
                    array(
                       'label' => 'Lady Illucia Barov',
                       'url' => '/zone/scholomance/lady-illucia-barov/',
                    ),
                    array(
                       'label' => 'Darkmaster Gandling',
                       'url' => '/zone/scholomance/darkmaster-gandling/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Shadowfang Keep',
                   'url' => '/zone/shadowfang-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Baron Ashbury',
                       'url' => '/zone/shadowfang-keep/baron-ashbury/',
                    ),
                    array(
                       'label' => 'Baron Silverlaine',
                       'url' => '/zone/shadowfang-keep/baron-silverlaine/',
                    ),
                    array(
                       'label' => 'Commander Springvale',
                       'url' => '/zone/shadowfang-keep/commander-springvale/',
                    ),
                    array(
                       'label' => 'Lord Walden',
                       'url' => '/zone/shadowfang-keep/lord-walden/',
                    ),
                    array(
                       'label' => 'Lord Godfrey',
                       'url' => '/zone/shadowfang-keep/lord-godfrey/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Stormwind Stockade',
                   'url' => '/zone/stormwind-stockade/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Randolph Moloch',
                       'url' => '/zone/stormwind-stockade/randolph-moloch/',
                    ),
                    array(
                       'label' => 'Lord Overheat',
                       'url' => '/zone/stormwind-stockade/lord-overheat/',
                    ),
                    array(
                       'label' => 'Hogger',
                       'url' => '/zone/stormwind-stockade/hogger/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Stratholme',
                   'url' => '/zone/stratholme/',
                   'children' => 
                  array (
                    array(
                       'label' => 'The Unforgiven',
                       'url' => '/zone/stratholme/the-unforgiven/',
                    ),
                    array(
                       'label' => 'Hearthsinger Forresten',
                       'url' => '/zone/stratholme/hearthsinger-forresten/',
                    ),
                    array(
                       'label' => 'Timmy the Cruel',
                       'url' => '/zone/stratholme/timmy-the-cruel/',
                    ),
                    array(
                       'label' => 'Willey Hopebreaker',
                       'url' => '/zone/stratholme/willey-hopebreaker/',
                    ),
                    array(
                       'label' => 'Commander Malor',
                       'url' => '/zone/stratholme/commander-malor/',
                    ),
                    array(
                       'label' => 'Instructor Galford',
                       'url' => '/zone/stratholme/instructor-galford/',
                    ),
                    array(
                       'label' => 'Balnazzar',
                       'url' => '/zone/stratholme/balnazzar/',
                    ),
                    array(
                       'label' => 'Baroness Anastari',
                       'url' => '/zone/stratholme/baroness-anastari/',
                    ),
                    array(
                       'label' => 'Nerub\'enkan',
                       'url' => '/zone/stratholme/nerubenkan/',
                    ),
                    array(
                       'label' => 'Maleki the Pallid',
                       'url' => '/zone/stratholme/maleki-the-pallid/',
                    ),
                    array(
                       'label' => 'Magistrate Barthilas',
                       'url' => '/zone/stratholme/magistrate-barthilas/',
                    ),
                    array(
                       'label' => 'Ramstein the Gorger',
                       'url' => '/zone/stratholme/ramstein-the-gorger/',
                    ),
                    array(
                       'label' => 'Lord Aurius Rivendare',
                       'url' => '/zone/stratholme/lord-aurius-rivendare/',
                    ),
                  ),
                ),
                 array(
                   'label' => 'Sunken Temple',
                   'url' => '/zone/sunken-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Avatar of Hakkar',
                       'url' => '/zone/sunken-temple/avatar-of-hakkar/',
                    ),
                    array(
                       'label' => 'Jammal\'an the Prophet',
                       'url' => '/zone/sunken-temple/jammalan-the-prophet/',
                    ),
                    array(
                       'label' => 'Dragonkin',
                       'url' => '/zone/sunken-temple/dragonkin/',
                    ),
                    array(
                       'label' => 'Shade of Eranikus',
                       'url' => '/zone/sunken-temple/shade-of-eranikus/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Uldaman',
                   'url' => '/zone/uldaman/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Revelosh',
                       'url' => '/zone/uldaman/revelosh/',
                    ),
                    array(
                       'label' => 'The Lost Dwarves',
                       'url' => '/zone/uldaman/the-lost-dwarves/',
                    ),
                    array(
                       'label' => 'Ironaya',
                       'url' => '/zone/uldaman/ironaya/',
                    ),
                    array(
                       'label' => 'Ancient Stone Keeper',
                       'url' => '/zone/uldaman/ancient-stone-keeper/',
                    ),
                    array(
                       'label' => 'Galgann Firehammer',
                       'url' => '/zone/uldaman/galgann-firehammer/',
                    ),
                    array(
                       'label' => 'Grimlok',
                       'url' => '/zone/uldaman/grimlok/',
                    ),
                    array(
                       'label' => 'Archaedas',
                       'url' => '/zone/uldaman/archaedas/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Wailing Caverns',
                   'url' => '/zone/wailing-caverns/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Lady Anacondra',
                       'url' => '/zone/wailing-caverns/lady-anacondra/',
                    ),
                    array(
                       'label' => 'Lord Cobrahn',
                       'url' => '/zone/wailing-caverns/lord-cobrahn/',
                    ),
                    array(
                       'label' => 'Kresh',
                       'url' => '/zone/wailing-caverns/kresh/',
                    ),
                    array(
                       'label' => 'Lord Pythas',
                       'url' => '/zone/wailing-caverns/lord-pythas/',
                    ),
                    array(
                       'label' => 'Skum',
                       'url' => '/zone/wailing-caverns/skum/',
                    ),
                    array(
                       'label' => 'Lord Serpentis',
                       'url' => '/zone/wailing-caverns/lord-serpentis/',
                    ),
                    array(
                       'label' => 'Verdan the Everliving',
                       'url' => '/zone/wailing-caverns/verdan-the-everliving/',
                    ),
                    array(
                       'label' => 'Mutanus the Devourer',
                       'url' => '/zone/wailing-caverns/mutanus-the-devourer/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Zul\'Farrak',
                   'url' => '/zone/zulfarrak/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Hydromancer Velratha',
                       'url' => '/zone/zulfarrak/hydromancer-velratha/',
                    ),
                    array(
                       'label' => 'Gahz\'rilla',
                       'url' => '/zone/zulfarrak/gahzrilla/',
                    ),
                    array(
                       'label' => 'Antu\'sul',
                       'url' => '/zone/zulfarrak/antusul/',
                    ),
                    array(
                       'label' => 'Theka the Martyr',
                       'url' => '/zone/zulfarrak/theka-the-martyr/',
                    ),
                    array(
                       'label' => 'Witch Doctor Zum\'rah',
                       'url' => '/zone/zulfarrak/witch-doctor-zumrah/',
                    ),
                    array(
                       'label' => 'Nekrum Gutchewer',
                       'url' => '/zone/zulfarrak/nekrum-gutchewer/',
                    ),
                    array(
                       'label' => 'Shadowpriest Sezz\'ziz',
                       'url' => '/zone/zulfarrak/shadowpriest-sezzziz/',
                    ),
                    array(
                       'label' => 'Chief Ukorz Sandscalp',
                       'url' => '/zone/zulfarrak/chief-ukorz-sandscalp/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Raids',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/zone/#expansion=3&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Baradin Hold',
                   'url' => '/zone/baradin-hold/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Argaloth',
                       'url' => '/zone/baradin-hold/argaloth/',
                    ),
                    array(
                       'label' => 'Occu\'thar',
                       'url' => '/zone/baradin-hold/occuthar/',
                    ),
                  ),
                ),
                 array(
                   'label' => 'Blackwing Descent',
                   'url' => '/zone/blackwing-descent/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Omnotron Defense System',
                       'url' => '/zone/blackwing-descent/omnotron-defense-system/',
                    ),
                    array(
                       'label' => 'Magmaw',
                       'url' => '/zone/blackwing-descent/magmaw/',
                    ),
                    array(
                       'label' => 'Atramedes',
                       'url' => '/zone/blackwing-descent/atramedes/',
                    ),
                    array(
                       'label' => 'Chimaeron',
                       'url' => '/zone/blackwing-descent/chimaeron/',
                    ),
                    array(
                       'label' => 'Maloriak',
                       'url' => '/zone/blackwing-descent/maloriak/',
                    ),
                    array(
                       'label' => 'Nefarian\'s End',
                       'url' => '/zone/blackwing-descent/nefarians-end/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Bastion of Twilight',
                   'url' => '/zone/the-bastion-of-twilight/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Halfus Wyrmbreaker',
                       'url' => '/zone/the-bastion-of-twilight/halfus-wyrmbreaker/',
                    ),
                    array(
                       'label' => 'Theralion and Valiona',
                       'url' => '/zone/the-bastion-of-twilight/theralion-and-valiona/',
                    ),
                    array(
                       'label' => 'Ascendant Council',
                       'url' => '/zone/the-bastion-of-twilight/ascendant-council/',
                    ),
                    array(
                       'label' => 'Cho\'gall',
                       'url' => '/zone/the-bastion-of-twilight/chogall/',
                    ),
                    array(
                       'label' => 'Sinestra',
                       'url' => '/zone/the-bastion-of-twilight/sinestra/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Throne of the Four Winds',
                   'url' => '/zone/throne-of-the-four-winds/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Conclave of Wind',
                       'url' => '/zone/throne-of-the-four-winds/conclave-of-wind/',
                    ),
                    array(
                       'label' => 'Al\'Akir',
                       'url' => '/zone/throne-of-the-four-winds/alakir/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Firelands',
                   'url' => '/zone/firelands/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Beth\'tilac',
                       'url' => '/zone/firelands/bethtilac/',
                    ),
                    array(
                       'label' => 'Lord Rhyolith',
                       'url' => '/zone/firelands/lord-rhyolith/',
                    ),
                    array(
                       'label' => 'Shannox',
                       'url' => '/zone/firelands/shannox/',
                    ),
                    array(
                       'label' => 'Alysrazor',
                       'url' => '/zone/firelands/alysrazor/',
                    ),
                    array(
                       'label' => 'Baleroc',
                       'url' => '/zone/firelands/baleroc/',
                    ),
                    array(
                       'label' => 'Majordomo Staghelm',
                       'url' => '/zone/firelands/majordomo-staghelm',
                    ),
                    array(
                       'label' => 'Ragnaros',
                       'url' => '/zone/firelands/ragnaros/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/zone/#expansion=2&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Icecrown Citadel',
                   'url' => '/zone/icecrown-citadel/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Lord Marrowgar',
                       'url' => '/zone/icecrown-citadel/lord-marrowgar/',
                    ),
                    array(
                       'label' => 'Lady Deathwhisper',
                       'url' => '/zone/icecrown-citadel/lady-deathwhisper/',
                    ),
                    array(
                       'label' => 'Icecrown Gunship Battle',
                       'url' => '/zone/icecrown-citadel/icecrown-gunship-battle/',
                    ),
                    array(
                       'label' => 'Deathbringer Saurfang',
                       'url' => '/zone/icecrown-citadel/deathbringer-saurfang/',
                    ),
                    array(
                       'label' => 'Rotface',
                       'url' => '/zone/icecrown-citadel/rotface/',
                    ),
                    array(
                       'label' => 'Festergut',
                       'url' => '/zone/icecrown-citadel/festergut/',
                    ),
                    array(
                       'label' => 'Professor Putricide',
                       'url' => '/zone/icecrown-citadel/professor-putricide/',
                    ),
                    array(
                       'label' => 'Blood Council',
                       'url' => '/zone/icecrown-citadel/blood-council/',
                    ),
                    array(
                       'label' => 'Blood-Queen Lana\'thel',
                       'url' => '/zone/icecrown-citadel/bloodqueen-lanathel/',
                    ),
                    array(
                       'label' => 'Valithria Dreamwalker',
                       'url' => '/zone/icecrown-citadel/valithria-dreamwalker/',
                    ),
                    array(
                       'label' => 'Sindragosa',
                       'url' => '/zone/icecrown-citadel/sindragosa/',
                    ),
                    array(
                       'label' => 'The Lich King',
                       'url' => '/zone/icecrown-citadel/the-lich-king/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Naxxramas',
                   'url' => '/zone/naxxramas/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Anub\'Rekhan',
                       'url' => '/zone/naxxramas/anubrekhan/',
                    ),
                    array(
                       'label' => 'Grand Widow Faerlina',
                       'url' => '/zone/naxxramas/grand-widow-faerlina/',
                    ),
                    array(
                       'label' => 'Maexxna',
                       'url' => '/zone/naxxramas/maexxna/',
                    ),
                    array(
                       'label' => 'Noth the Plaguebringer',
                       'url' => '/zone/naxxramas/noth-the-plaguebringer/',
                    ),
                    array(
                       'label' => 'Heigan the Unclean',
                       'url' => '/zone/naxxramas/heigan-the-unclean/',
                    ),
                    array(
                       'label' => 'Loatheb',
                       'url' => '/zone/naxxramas/loatheb/',
                    ),
                    array(
                       'label' => 'Instructor Razuvious',
                       'url' => '/zone/naxxramas/instructor-razuvious/',
                    ),
                    array(
                       'label' => 'Gothik the Harvester',
                       'url' => '/zone/naxxramas/gothik-the-harvester/',
                    ),
                    array(
                       'label' => 'The Four Horsemen',
                       'url' => '/zone/naxxramas/the-four-horsemen/',
                    ),
                    array(
                       'label' => 'Patchwerk',
                       'url' => '/zone/naxxramas/patchwerk/',
                    ),
                    array(
                       'label' => 'Grobbulus',
                       'url' => '/zone/naxxramas/grobbulus/',
                    ),
                    array(
                       'label' => 'Gluth',
                       'url' => '/zone/naxxramas/gluth/',
                    ),
                    array(
                       'label' => 'Thaddius',
                       'url' => '/zone/naxxramas/thaddius/',
                    ),
                    array(
                       'label' => 'Sapphiron',
                       'url' => '/zone/naxxramas/sapphiron/',
                    ),
                    array(
                       'label' => 'Kel\'Thuzad',
                       'url' => '/zone/naxxramas/kelthuzad/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Onyxia\'s Lair',
                   'url' => '/zone/onyxias-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Onyxia',
                       'url' => '/zone/onyxias-lair/onyxia/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Eye of Eternity',
                   'url' => '/zone/the-eye-of-eternity/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Malygos',
                       'url' => '/zone/the-eye-of-eternity/malygos/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Obsidian Sanctum',
                   'url' => '/zone/the-obsidian-sanctum/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Sartharion',
                       'url' => '/zone/the-obsidian-sanctum/sartharion/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Ruby Sanctum',
                   'url' => '/zone/the-ruby-sanctum/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Halion',
                       'url' => '/zone/the-ruby-sanctum/halion/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Trial of the Crusader',
                   'url' => '/zone/trial-of-the-crusader/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Northrend Beasts',
                       'url' => '/zone/trial-of-the-crusader/northrend-beasts/',
                    ),
                    array(
                       'label' => 'Lord Jaraxxus',
                       'url' => '/zone/trial-of-the-crusader/lord-jaraxxus/',
                    ),
                    array(
                       'label' => 'Faction Champions',
                       'url' => '/zone/trial-of-the-crusader/faction-champions/',
                    ),
                    array(
                       'label' => 'Val\'kyr Twins',
                       'url' => '/zone/trial-of-the-crusader/valkyr-twins/',
                    ),
                    array(
                       'label' => 'Anub\'arak',
                       'url' => '/zone/trial-of-the-crusader/anubarak/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ulduar',
                   'url' => '/zone/ulduar/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Flame Leviathan',
                       'url' => '/zone/ulduar/flame-leviathan/',
                    ),
                    array(
                       'label' => 'Ignis the Furnace Master',
                       'url' => '/zone/ulduar/ignis-the-furnace-master/',
                    ),
                    array(
                       'label' => 'Razorscale',
                       'url' => '/zone/ulduar/razorscale/',
                    ),
                    array(
                       'label' => 'XT-002 Deconstructor',
                       'url' => '/zone/ulduar/xt002-deconstructor/',
                    ),
                    array(
                       'label' => 'The Assembly of Iron',
                       'url' => '/zone/ulduar/the-assembly-of-iron/',
                    ),
                    array(
                       'label' => 'Kologarn',
                       'url' => '/zone/ulduar/kologarn/',
                    ),
                    array(
                       'label' => 'Auriaya',
                       'url' => '/zone/ulduar/auriaya/',
                    ),
                    array(
                       'label' => 'Hodir',
                       'url' => '/zone/ulduar/hodir/',
                    ),
                    array(
                       'label' => 'Thorim',
                       'url' => '/zone/ulduar/thorim/',
                    ),
                    array(
                       'label' => 'Freya',
                       'url' => '/zone/ulduar/freya/',
                    ),
                    array(
                       'label' => 'Mimiron',
                       'url' => '/zone/ulduar/mimiron/',
                    ),
                    array(
                       'label' => 'General Vezax',
                       'url' => '/zone/ulduar/general-vezax/',
                    ),
                    array(
                       'label' => 'Yogg-Saron',
                       'url' => '/zone/ulduar/yoggsaron/',
                    ),
                    array(
                       'label' => 'Algalon the Observer',
                       'url' => '/zone/ulduar/algalon-the-observer/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Vault of Archavon',
                   'url' => '/zone/vault-of-archavon/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Archavon the Stone Watcher',
                       'url' => '/zone/vault-of-archavon/archavon-the-stone-watcher/',
                    ),
                    array(
                       'label' => 'Emalon the Storm Watcher',
                       'url' => '/zone/vault-of-archavon/emalon-the-storm-watcher/',
                    ),
                    array(
                       'label' => 'Koralon the Flame Watcher',
                       'url' => '/zone/vault-of-archavon/koralon-the-flame-watcher/',
                    ),
                    array(
                       'label' => 'Toravon the Ice Watcher',
                       'url' => '/zone/vault-of-archavon/toravon-the-ice-watcher/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'The Burning Crusade',
               'url' => '/zone/#expansion=1&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Black Temple',
                   'url' => '/zone/black-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'High Warlord Naj\'entus',
                       'url' => '/zone/black-temple/high-warlord-najentus/',
                    ),
                    array(
                       'label' => 'Supremus',
                       'url' => '/zone/black-temple/supremus/',
                    ),
                    array(
                       'label' => 'Shade of Akama',
                       'url' => '/zone/black-temple/shade-of-akama/',
                    ),
                    array(
                       'label' => 'Teron Gorefiend',
                       'url' => '/zone/black-temple/teron-gorefiend/',
                    ),
                    array(
                       'label' => 'Gurtogg Bloodboil',
                       'url' => '/zone/black-temple/gurtogg-bloodboil/',
                    ),
                    array(
                       'label' => 'Reliquary of Souls',
                       'url' => '/zone/black-temple/reliquary-of-souls/',
                    ),
                    array(
                       'label' => 'Mother Shahraz',
                       'url' => '/zone/black-temple/mother-shahraz/',
                    ),
                    array(
                       'label' => 'The Illidari Council',
                       'url' => '/zone/black-temple/the-illidari-council/',
                    ),
                    array(
                       'label' => 'Illidan Stormrage',
                       'url' => '/zone/black-temple/illidan-stormrage/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Gruul\'s Lair',
                   'url' => '/zone/gruuls-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'High King Maulgar',
                       'url' => '/zone/gruuls-lair/high-king-maulgar/',
                    ),
                    array(
                       'label' => 'Gruul the Dragonkiller',
                       'url' => '/zone/gruuls-lair/gruul-the-dragonkiller/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Karazhan',
                   'url' => '/zone/karazhan/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Attumen the Huntsman',
                       'url' => '/zone/karazhan/attumen-the-huntsman/',
                    ),
                    array(
                       'label' => 'Moroes',
                       'url' => '/zone/karazhan/moroes/',
                    ),
                    array(
                       'label' => 'Maiden of Virtue',
                       'url' => '/zone/karazhan/maiden-of-virtue/',
                    ),
                    array(
                       'label' => 'Opera Event',
                       'url' => '/zone/karazhan/opera-event/',
                    ),
                    array(
                       'label' => 'The Curator',
                       'url' => '/zone/karazhan/the-curator/',
                    ),
                    array(
                       'label' => 'Chess Event',
                       'url' => '/zone/karazhan/chess-event/',
                    ),
                    array(
                       'label' => 'Terestian Illhoof',
                       'url' => '/zone/karazhan/terestian-illhoof/',
                    ),
                    array(
                       'label' => 'Shade of Aran',
                       'url' => '/zone/karazhan/shade-of-aran/',
                    ),
                    array(
                       'label' => 'Netherspite',
                       'url' => '/zone/karazhan/netherspite/',
                    ),
                    array(
                       'label' => 'Prince Malchezaar',
                       'url' => '/zone/karazhan/prince-malchezaar/',
                    ),
                    array(
                       'label' => 'Nightbane',
                       'url' => '/zone/karazhan/nightbane/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Magtheridon\'s Lair',
                   'url' => '/zone/magtheridons-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Magtheridon',
                       'url' => '/zone/magtheridons-lair/magtheridon/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Serpentshrine Cavern',
                   'url' => '/zone/serpentshrine-cavern/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Hydross the Unstable',
                       'url' => '/zone/serpentshrine-cavern/hydross-the-unstable/',
                    ),
                    array(
                       'label' => 'The Lurker Below',
                       'url' => '/zone/serpentshrine-cavern/the-lurker-below/',
                    ),
                    array(
                       'label' => 'Leotheras the Blind',
                       'url' => '/zone/serpentshrine-cavern/leotheras-the-blind/',
                    ),
                    array(
                       'label' => 'Fathom-Lord Karathress',
                       'url' => '/zone/serpentshrine-cavern/fathomlord-karathress/',
                    ),
                    array(
                       'label' => 'Morogrim Tidewalker',
                       'url' => '/zone/serpentshrine-cavern/morogrim-tidewalker/',
                    ),
                    array(
                       'label' => 'Lady Vashj',
                       'url' => '/zone/serpentshrine-cavern/lady-vashj/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Tempest Keep',
                   'url' => '/zone/tempest-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Al\'ar',
                       'url' => '/zone/tempest-keep/alar/',
                    ),
                    array(
                       'label' => 'Void Reaver',
                       'url' => '/zone/tempest-keep/void-reaver/',
                    ),
                    array(
                       'label' => 'High Astromancer Solarian',
                       'url' => '/zone/tempest-keep/high-astromancer-solarian/',
                    ),
                    array(
                       'label' => 'Kael\'thas Sunstrider',
                       'url' => '/zone/tempest-keep/kaelthas-sunstrider/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Battle for Mount Hyjal',
                   'url' => '/zone/the-battle-for-mount-hyjal/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Rage Winterchill',
                       'url' => '/zone/the-battle-for-mount-hyjal/rage-winterchill/',
                    ),
                    array(
                       'label' => 'Anetheron',
                       'url' => '/zone/the-battle-for-mount-hyjal/anetheron/',
                    ),
                    array(
                       'label' => 'Kaz\'rogal',
                       'url' => '/zone/the-battle-for-mount-hyjal/kazrogal/',
                    ),
                    array(
                       'label' => 'Azgalor',
                       'url' => '/zone/the-battle-for-mount-hyjal/azgalor/',
                    ),
                    array(
                       'label' => 'Archimonde',
                       'url' => '/zone/the-battle-for-mount-hyjal/archimonde/',
                    ),
                  ),
                ),
                array(
                   'label' => 'The Sunwell',
                   'url' => '/zone/the-sunwell/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Kalecgos',
                       'url' => '/zone/the-sunwell/kalecgos/',
                    ),
                    array(
                       'label' => 'Brutallus',
                       'url' => '/zone/the-sunwell/brutallus/',
                    ),
                    array(
                       'label' => 'Felmyst',
                       'url' => '/zone/the-sunwell/felmyst/',
                    ),
                    array(
                       'label' => 'Eredar Twins',
                       'url' => '/zone/the-sunwell/eredar-twins/',
                    ),
                    array(
                       'label' => 'M\'uru',
                       'url' => '/zone/the-sunwell/muru/',
                    ),
                    array(
                       'label' => 'Kil\'jaeden',
                       'url' => '/zone/the-sunwell/kiljaeden/',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Classic',
               'url' => '/zone/#expansion=0&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Ahn\'Qiraj Temple',
                   'url' => '/zone/ahnqiraj-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'The Prophet Skeram',
                       'url' => '/zone/ahnqiraj-temple/the-prophet-skeram/',
                    ),
                    array(
                       'label' => 'Silithid Royalty',
                       'url' => '/zone/ahnqiraj-temple/silithid-royalty/',
                    ),
                    array(
                       'label' => 'Battleguard Sartura',
                       'url' => '/zone/ahnqiraj-temple/battleguard-sartura/',
                    ),
                    array(
                       'label' => 'Fankriss the Unyielding',
                       'url' => '/zone/ahnqiraj-temple/fankriss-the-unyielding/',
                    ),
                    array(
                       'label' => 'Viscidus',
                       'url' => '/zone/ahnqiraj-temple/viscidus/',
                    ),
                    array(
                       'label' => 'Princess Huhuran',
                       'url' => '/zone/ahnqiraj-temple/princess-huhuran/',
                    ),
                    array(
                       'label' => 'Twin Emperors',
                       'url' => '/zone/ahnqiraj-temple/twin-emperors/',
                    ),
                    array(
                       'label' => 'Ouro',
                       'url' => '/zone/ahnqiraj-temple/ouro/',
                    ),
                    array(
                       'label' => 'C\'Thun',
                       'url' => '/zone/ahnqiraj-temple/cthun/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Blackwing Lair',
                   'url' => '/zone/blackwing-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Razorgore the Untamed',
                       'url' => '/zone/blackwing-lair/razorgore-the-untamed/',
                    ),
                    array(
                       'label' => 'Vaelastrasz the Corrupt',
                       'url' => '/zone/blackwing-lair/vaelastrasz-the-corrupt/',
                    ),
                    array(
                       'label' => 'Broodlord Lashlayer',
                       'url' => '/zone/blackwing-lair/broodlord-lashlayer/',
                    ),
                    array(
                       'label' => 'Firemaw',
                       'url' => '/zone/blackwing-lair/firemaw/',
                    ),
                    array(
                       'label' => 'Ebonroc',
                       'url' => '/zone/blackwing-lair/ebonroc/',
                    ),
                    array(
                       'label' => 'Flamegor',
                       'url' => '/zone/blackwing-lair/flamegor/',
                    ),
                    array(
                       'label' => 'Chromaggus',
                       'url' => '/zone/blackwing-lair/chromaggus/',
                    ),
                    array(
                       'label' => 'Nefarian',
                       'url' => '/zone/blackwing-lair/nefarian/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Molten Core',
                   'url' => '/zone/molten-core/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Lucifron',
                       'url' => '/zone/molten-core/lucifron/',
                    ),
                    array(
                       'label' => 'Magmadar',
                       'url' => '/zone/molten-core/magmadar/',
                    ),
                    array(
                       'label' => 'Gehennas',
                       'url' => '/zone/molten-core/gehennas/',
                    ),
                    array(
                       'label' => 'Garr',
                       'url' => '/zone/molten-core/garr/',
                    ),
                    array(
                       'label' => 'Shazzrah',
                       'url' => '/zone/molten-core/shazzrah/',
                    ),
                    array(
                       'label' => 'Baron Geddon',
                       'url' => '/zone/molten-core/baron-geddon/',
                    ),
                    array(
                       'label' => 'Sulfuron Harbinger',
                       'url' => '/zone/molten-core/sulfuron-harbinger/',
                    ),
                    array(
                       'label' => 'Golemagg the Incinerator',
                       'url' => '/zone/molten-core/golemagg-the-incinerator/',
                    ),
                    array(
                       'label' => 'Majordomo Executus',
                       'url' => '/zone/molten-core/majordomo-executus/',
                    ),
                    array(
                       'label' => 'Ragnaros',
                       'url' => '/zone/molten-core/ragnaros/',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ruins of Ahn\'Qiraj',
                   'url' => '/zone/ruins-of-ahnqiraj/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Kurinnaxx',
                       'url' => '/zone/ruins-of-ahnqiraj/kurinnaxx/',
                    ),
                    array(
                       'label' => 'General Rajaxx',
                       'url' => '/zone/ruins-of-ahnqiraj/general-rajaxx/',
                    ),
                    array(
                       'label' => 'Moam',
                       'url' => '/zone/ruins-of-ahnqiraj/moam/',
                    ),
                    array(
                       'label' => 'Buru the Gorger',
                       'url' => '/zone/ruins-of-ahnqiraj/buru-the-gorger/',
                    ),
                    array(
                       'label' => 'Ayamiss the Hunter',
                       'url' => '/zone/ruins-of-ahnqiraj/ayamiss-the-hunter/',
                    ),
                    array(
                       'label' => 'Ossirian the Unscarred',
                       'url' => '/zone/ruins-of-ahnqiraj/ossirian-the-unscarred/',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Factions',
           'url' => '/faction/',
           'children' => 
          array (
            array(
               'label' => 'Cataclysm',
               'url' => '/faction/#expansion=3',
               'children' => 
              array (
                array(
                   'label' => 'Baradin\'s Wardens',
                   'url' => '/faction/baradins-wardens/',
                ),
                array(
                   'label' => 'Dragonmaw Clan',
                   'url' => '/faction/dragonmaw-clan/',
                ),
                array(
                   'label' => 'Guardians of Hyjal',
                   'url' => '/faction/guardians-of-hyjal/',
                ),
                 array(
                   'label' => 'Hellscream\'s Reach',
                   'url' => '/faction/hellscreams-reach/',
                ),
                array(
                   'label' => 'Ramkahen',
                   'url' => '/faction/ramkahen/',
                ),
                array(
                   'label' => 'The Earthen Ring',
                   'url' => '/faction/the-earthen-ring/',
                ),
                array(
                   'label' => 'Therazane',
                   'url' => '/faction/therazane/',
                ),
                array(
                   'label' => 'Wildhammer Clan',
                   'url' => '/faction/wildhammer-clan/',
                ),
              ),
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/faction/#expansion=2',
               'children' => 
              array (
                array(
                   'label' => 'Argent Crusade',
                   'url' => '/faction/argent-crusade/',
                ),
                array(
                   'label' => 'Kirin Tor',
                   'url' => '/faction/kirin-tor/',
                ),
                array(
                   'label' => 'Knights of the Ebon Blade',
                   'url' => '/faction/knights-of-the-ebon-blade/',
                ),
                array(
                   'label' => 'The Ashen Verdict',
                   'url' => '/faction/the-ashen-verdict/',
                ),
                array(
                   'label' => 'The Kalu\'ak',
                   'url' => '/faction/the-kaluak/',
                ),
                array(
                   'label' => 'The Sons of Hodir',
                   'url' => '/faction/the-sons-of-hodir/',
                ),
                array(
                   'label' => 'The Wyrmrest Accord',
                   'url' => '/faction/the-wyrmrest-accord/',
                ),
                array(
                   'label' => 'Alliance Vanguard',
                ),
                array(
                   'label' => 'Explorers\' League',
                   'url' => '/faction/explorers-league/',
                ),
                array(
                   'label' => 'The Frostborn',
                   'url' => '/faction/the-frostborn/',
                ),
                array(
                   'label' => 'The Silver Covenant',
                   'url' => '/faction/the-silver-covenant/',
                ),
                array(
                   'label' => 'Valiance Expedition',
                   'url' => '/faction/valiance-expedition/',
                ),
                array(
                   'label' => 'Horde Expedition',
                ),
                array(
                   'label' => 'The Hand of Vengeance',
                   'url' => '/faction/the-hand-of-vengeance/',
                ),
                array(
                   'label' => 'The Sunreavers',
                   'url' => '/faction/the-sunreavers/',
                ),
                array(
                   'label' => 'The Taunka',
                   'url' => '/faction/the-taunka/',
                ),
                array(
                   'label' => 'Warsong Offensive',
                   'url' => '/faction/warsong-offensive/',
                ),
                array(
                   'label' => 'Sholazar Basin',
                ),
                array(
                   'label' => 'Frenzyheart Tribe',
                   'url' => '/faction/frenzyheart-tribe/',
                ),
                array(
                   'label' => 'The Oracles',
                   'url' => '/faction/the-oracles/',
                ),
              ),
            ),
            array(
               'label' => 'The Burning Crusade',
               'url' => '/faction/#expansion=1',
               'children' => 
              array (
                array(
                   'label' => 'Ashtongue Deathsworn',
                   'url' => '/faction/ashtongue-deathsworn/',
                ),
                array(
                   'label' => 'Cenarion Expedition',
                   'url' => '/faction/cenarion-expedition/',
                ),
                array(
                   'label' => 'Honor Hold',
                   'url' => '/faction/honor-hold/',
                ),
                array(
                   'label' => 'Keepers of Time',
                   'url' => '/faction/keepers-of-time/',
                ),
                array(
                   'label' => 'Kurenai',
                   'url' => '/faction/kurenai/',
                ),
                array(
                   'label' => 'Netherwing',
                   'url' => '/faction/netherwing/',
                ),
                array(
                   'label' => 'Ogri\'la',
                   'url' => '/faction/ogrila/',
                ),
                array(
                   'label' => 'Sporeggar',
                   'url' => '/faction/sporeggar/',
                ),
                array(
                   'label' => 'The Consortium',
                   'url' => '/faction/the-consortium/',
                ),
                array(
                   'label' => 'The Mag\'har',
                   'url' => '/faction/the-maghar/',
                ),
                array(
                   'label' => 'The Scale of the Sands',
                   'url' => '/faction/the-scale-of-the-sands/',
                ),
                array(
                   'label' => 'The Violet Eye',
                   'url' => '/faction/the-violet-eye/',
                ),
                array(
                   'label' => 'Thrallmar',
                   'url' => '/faction/thrallmar/',
                ),
                array(
                   'label' => 'Tranquillien',
                   'url' => '/faction/tranquillien/',
                ),
                array(
                   'label' => 'Shattrath City',
                ),
                array(
                   'label' => 'Lower City',
                   'url' => '/faction/lower-city/',
                ),
                array(
                   'label' => 'Sha\'tari Skyguard',
                   'url' => '/faction/shatari-skyguard/',
                ),
                array(
                   'label' => 'Shattered Sun Offensive',
                   'url' => '/faction/shattered-sun-offensive/',
                ),
                array(
                   'label' => 'The Aldor',
                   'url' => '/faction/the-aldor/',
                ),
                array(
                   'label' => 'The Scryers',
                   'url' => '/faction/the-scryers/',
                ),
                array(
                   'label' => 'The Sha\'tar',
                   'url' => '/faction/the-shatar/',
                ),
              ),
            ),
            array(
               'label' => 'Classic',
               'url' => '/faction/#expansion=0',
               'children' => 
              array (
                array(
                   'label' => 'Argent Dawn',
                   'url' => '/faction/argent-dawn/',
                ),
                array(
                   'label' => 'Bloodsail Buccaneers',
                   'url' => '/faction/bloodsail-buccaneers/',
                ),
                array(
                   'label' => 'Brood of Nozdormu',
                   'url' => '/faction/brood-of-nozdormu/',
                ),
                array(
                   'label' => 'Cenarion Circle',
                   'url' => '/faction/cenarion-circle/',
                ),
                array(
                   'label' => 'Darkmoon Faire',
                   'url' => '/faction/darkmoon-faire/',
                ),
                array(
                   'label' => 'Gelkis Clan Centaur',
                   'url' => '/faction/gelkis-clan-centaur/',
                ),
                array(
                   'label' => 'Hydraxian Waterlords',
                   'url' => '/faction/hydraxian-waterlords/',
                ),
                array(
                   'label' => 'Magram Clan Centaur',
                   'url' => '/faction/magram-clan-centaur/',
                ),
                array(
                   'label' => 'Ravenholdt',
                   'url' => '/faction/ravenholdt/',
                ),
                array(
                   'label' => 'Shen\'dralar',
                   'url' => '/faction/shendralar/',
                ),
                array(
                   'label' => 'Syndicate',
                   'url' => '/faction/syndicate/',
                ),
                array(
                   'label' => 'Thorium Brotherhood',
                   'url' => '/faction/thorium-brotherhood/',
                ),
                array(
                   'label' => 'Timbermaw Hold',
                   'url' => '/faction/timbermaw-hold/',
                ),
                array(
                   'label' => 'Wintersaber Trainers',
                   'url' => '/faction/wintersaber-trainers/',
                ),
                array(
                   'label' => 'Zandalar Tribe',
                   'url' => '/faction/zandalar-tribe/',
                ),
                array(
                   'label' => 'Alliance',
                ),
                array(
                   'label' => 'Darnassus',
                   'url' => '/faction/darnassus/',
                ),
                array(
                   'label' => 'Exodar',
                   'url' => '/faction/exodar/',
                ),
                array(
                   'label' => 'Gilneas',
                   'url' => '/faction/gilneas/',
                ),
                array(
                   'label' => 'Gnomeregan',
                   'url' => '/faction/gnomeregan/',
                ),
                array(
                   'label' => 'Ironforge',
                   'url' => '/faction/ironforge/',
                ),
                array(
                   'label' => 'Stormwind',
                   'url' => '/faction/stormwind/',
                ),
                array(
                   'label' => 'Alliance Forces',
                ),
                array(
                   'label' => 'Silverwing Sentinels',
                   'url' => '/faction/silverwing-sentinels/',
                ),
                array(
                   'label' => 'Stormpike Guard',
                   'url' => '/faction/stormpike-guard/',
                ),
                array(
                   'label' => 'The League of Arathor',
                   'url' => '/faction/the-league-of-arathor/',
                ),
                array(
                   'label' => 'Horde',
                ),
                array(
                   'label' => 'Bilgewater Cartel',
                   'url' => '/faction/bilgewater-cartel/',
                ),
                array(
                   'label' => 'Darkspear Trolls',
                   'url' => '/faction/darkspear-trolls/',
                ),
                array(
                   'label' => 'Orgrimmar',
                   'url' => '/faction/orgrimmar/',
                ),
                array(
                   'label' => 'Silvermoon City',
                   'url' => '/faction/silvermoon-city/',
                ),
                array(
                   'label' => 'Thunder Bluff',
                   'url' => '/faction/thunder-bluff/',
                ),
                array(
                   'label' => 'Undercity',
                   'url' => '/faction/undercity/',
                ),
                array(
                   'label' => 'Horde Forces',
                ),
                array(
                   'label' => 'Frostwolf Clan',
                   'url' => '/faction/frostwolf-clan/',
                ),
                array(
                   'label' => 'The Defilers',
                   'url' => '/faction/the-defilers/',
                ),
                array(
                   'label' => 'Warsong Outriders',
                   'url' => '/faction/warsong-outriders/',
                ),
                array(
                   'label' => 'Steamwheedle Cartel',
                ),
                array(
                   'label' => 'Booty Bay',
                   'url' => '/faction/booty-bay/',
                ),
                array(
                   'label' => 'Everlook',
                   'url' => '/faction/everlook/',
                ),
                array(
                   'label' => 'Gadgetzan',
                   'url' => '/faction/gadgetzan/',
                ),
                array(
                   'label' => 'Ratchet',
                   'url' => '/faction/ratchet/',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Items',
           'url' => '/item/',
           'children' => 
          array (
            array(
               'label' => 'Weapon',
               'url' => '/item/?classId=2',
               'children' => 
              array (
                array(
                   'label' => 'One-Handed Axes',
                   'url' => '/item/?classId=2&subClassId=0',
                ),
                array(
                   'label' => 'Two-Handed Axes',
                   'url' => '/item/?classId=2&subClassId=1',
                ),
                array(
                   'label' => 'Bows',
                   'url' => '/item/?classId=2&subClassId=2',
                ),
                array(
                   'label' => 'Guns',
                   'url' => '/item/?classId=2&subClassId=3',
                ),
                array(
                   'label' => 'One-Handed Maces',
                   'url' => '/item/?classId=2&subClassId=4',
                ),
                array(
                   'label' => 'Two-Handed Maces',
                   'url' => '/item/?classId=2&subClassId=5',
                ),
                array(
                   'label' => 'Polearms',
                   'url' => '/item/?classId=2&subClassId=6',
                ),
                array(
                   'label' => 'One-Handed Swords',
                   'url' => '/item/?classId=2&subClassId=7',
                ),
                array(
                   'label' => 'Two-Handed Swords',
                   'url' => '/item/?classId=2&subClassId=8',
                ),
                array(
                   'label' => 'Staves',
                   'url' => '/item/?classId=2&subClassId=10',
                ),
                array(
                   'label' => 'Fist Weapons',
                   'url' => '/item/?classId=2&subClassId=13',
                ),
                array(
                   'label' => 'Miscellaneous',
                   'url' => '/item/?classId=2&subClassId=14',
                ),
                array(
                   'label' => 'Daggers',
                   'url' => '/item/?classId=2&subClassId=15',
                ),
                array(
                   'label' => 'Thrown',
                   'url' => '/item/?classId=2&subClassId=16',
                ),
                array(
                   'label' => 'Crossbows',
                   'url' => '/item/?classId=2&subClassId=18',
                ),
                array(
                   'label' => 'Wands',
                   'url' => '/item/?classId=2&subClassId=19',
                ),
                array(
                   'label' => 'Fishing Poles',
                   'url' => '/item/?classId=2&subClassId=20',
                ),
              ),
            ),
            array(
               'label' => 'Armour',
               'url' => '/item/?classId=4',
               'children' => 
              array (
                array(
                   'label' => 'Miscellaneous',
                   'url' => '/item/?classId=4&subClassId=0',
                   'children' => 
                  array (
                    array(
                       'label' => 'Head',
                       'url' => '/item/?classId=4&subClassId=0&invType=1',
                    ),
                    array(
                       'label' => 'Neck',
                       'url' => '/item/?classId=4&subClassId=0&invType=2',
                    ),
                    array(
                       'label' => 'Shirt',
                       'url' => '/item/?classId=4&subClassId=0&invType=4',
                    ),
                    array(
                       'label' => 'Finger',
                       'url' => '/item/?classId=4&subClassId=0&invType=11',
                    ),
                    array(
                       'label' => 'Trinket',
                       'url' => '/item/?classId=4&subClassId=0&invType=12',
                    ),
                    array(
                       'label' => 'Held in off-hand',
                       'url' => '/item/?classId=4&subClassId=0&invType=23',
                    ),
                  ),
                ),
                array(
                   'label' => 'Cloth',
                   'url' => '/item/?classId=4&subClassId=1',
                   'children' => 
                  array (
                    array(
                       'label' => 'Head',
                       'url' => '/item/?classId=4&subClassId=1&invType=1',
                    ),
                    array(
                       'label' => 'Shoulder',
                       'url' => '/item/?classId=4&subClassId=1&invType=3',
                    ),
                    array(
                       'label' => 'Chest',
                       'url' => '/item/?classId=4&subClassId=1&invType=5',
                    ),
                    array(
                       'label' => 'Waist',
                       'url' => '/item/?classId=4&subClassId=1&invType=6',
                    ),
                    array(
                       'label' => 'Legs',
                       'url' => '/item/?classId=4&subClassId=1&invType=7',
                    ),
                    array(
                       'label' => 'Feet',
                       'url' => '/item/?classId=4&subClassId=1&invType=8',
                    ),
                    array(
                       'label' => 'Wrists',
                       'url' => '/item/?classId=4&subClassId=1&invType=9',
                    ),
                    array(
                       'label' => 'Hands',
                       'url' => '/item/?classId=4&subClassId=1&invType=10',
                    ),
                    array(
                       'label' => 'Back',
                       'url' => '/item/?classId=4&subClassId=1&invType=16',
                    ),
                  ),
                ),
                array(
                   'label' => 'Leather',
                   'url' => '/item/?classId=4&subClassId=2',
                   'children' => 
                  array (
                    array(
                       'label' => 'Head',
                       'url' => '/item/?classId=4&subClassId=2&invType=1',
                    ),
                    array(
                       'label' => 'Shoulder',
                       'url' => '/item/?classId=4&subClassId=2&invType=3',
                    ),
                    array(
                       'label' => 'Chest',
                       'url' => '/item/?classId=4&subClassId=2&invType=5',
                    ),
                    array(
                       'label' => 'Waist',
                       'url' => '/item/?classId=4&subClassId=2&invType=6',
                    ),
                    array(
                       'label' => 'Legs',
                       'url' => '/item/?classId=4&subClassId=2&invType=7',
                    ),
                    array(
                       'label' => 'Feet',
                       'url' => '/item/?classId=4&subClassId=2&invType=8',
                    ),
                    array(
                       'label' => 'Wrists',
                       'url' => '/item/?classId=4&subClassId=2&invType=9',
                    ),
                    array(
                       'label' => 'Hands',
                       'url' => '/item/?classId=4&subClassId=2&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Mail',
                   'url' => '/item/?classId=4&subClassId=3',
                   'children' => 
                  array (
                    array(
                       'label' => 'Head',
                       'url' => '/item/?classId=4&subClassId=3&invType=1',
                    ),
                    array(
                       'label' => 'Shoulder',
                       'url' => '/item/?classId=4&subClassId=3&invType=3',
                    ),
                    array(
                       'label' => 'Chest',
                       'url' => '/item/?classId=4&subClassId=3&invType=5',
                    ),
                    array(
                       'label' => 'Waist',
                       'url' => '/item/?classId=4&subClassId=3&invType=6',
                    ),
                    array(
                       'label' => 'Legs',
                       'url' => '/item/?classId=4&subClassId=3&invType=7',
                    ),
                    array(
                       'label' => 'Feet',
                       'url' => '/item/?classId=4&subClassId=3&invType=8',
                    ),
                    array(
                       'label' => 'Wrists',
                       'url' => '/item/?classId=4&subClassId=3&invType=9',
                    ),
                    array(
                       'label' => 'Hands',
                       'url' => '/item/?classId=4&subClassId=3&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Plate',
                   'url' => '/item/?classId=4&subClassId=4',
                   'children' => 
                  array (
                    array(
                       'label' => 'Head',
                       'url' => '/item/?classId=4&subClassId=4&invType=1',
                    ),
                    array(
                       'label' => 'Shoulder',
                       'url' => '/item/?classId=4&subClassId=4&invType=3',
                    ),
                    array(
                       'label' => 'Chest',
                       'url' => '/item/?classId=4&subClassId=4&invType=5',
                    ),
                    array(
                       'label' => 'Waist',
                       'url' => '/item/?classId=4&subClassId=4&invType=6',
                    ),
                    array(
                       'label' => 'Legs',
                       'url' => '/item/?classId=4&subClassId=4&invType=7',
                    ),
                    array(
                       'label' => 'Feet',
                       'url' => '/item/?classId=4&subClassId=4&invType=8',
                    ),
                    array(
                       'label' => 'Wrists',
                       'url' => '/item/?classId=4&subClassId=4&invType=9',
                    ),
                    array(
                       'label' => 'Hands',
                       'url' => '/item/?classId=4&subClassId=4&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Shields',
                   'url' => '/item/?classId=4&subClassId=6',
                ),
                array(
                   'label' => 'Librams',
                   'url' => '/item/?classId=4&subClassId=7',
                ),
                array(
                   'label' => 'Idols',
                   'url' => '/item/?classId=4&subClassId=8',
                ),
                array(
                   'label' => 'Totems',
                   'url' => '/item/?classId=4&subClassId=9',
                ),
                array(
                   'label' => 'Sigils',
                   'url' => '/item/?classId=4&subClassId=10',
                ),
                array(
                   'label' => 'Relic',
                   'url' => '/item/?classId=4&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Container',
               'url' => '/item/?classId=1',
               'children' => 
              array (
                array(
                   'label' => 'Bag',
                   'url' => '/item/?classId=1&subClassId=0',
                ),
                array(
                   'label' => 'Soul Bag',
                   'url' => '/item/?classId=1&subClassId=1',
                ),
                array(
                   'label' => 'Herb Bag',
                   'url' => '/item/?classId=1&subClassId=2',
                ),
                array(
                   'label' => 'Enchanting Bag',
                   'url' => '/item/?classId=1&subClassId=3',
                ),
                array(
                   'label' => 'Engineering Bag',
                   'url' => '/item/?classId=1&subClassId=4',
                ),
                array(
                   'label' => 'Gem Bag',
                   'url' => '/item/?classId=1&subClassId=5',
                ),
                array(
                   'label' => 'Mining Bag',
                   'url' => '/item/?classId=1&subClassId=6',
                ),
                array(
                   'label' => 'Leatherworking Bag',
                   'url' => '/item/?classId=1&subClassId=7',
                ),
                array(
                   'label' => 'Inscription Bag',
                   'url' => '/item/?classId=1&subClassId=8',
                ),
                array(
                   'label' => 'Tackle Box',
                   'url' => '/item/?classId=1&subClassId=9',
                ),
              ),
            ),
            array(
               'label' => 'Consumable',
               'url' => '/item/?classId=0',
               'children' => 
              array (
                array(
                   'label' => 'Potion',
                   'url' => '/item/?classId=0&subClassId=1',
                ),
                array(
                   'label' => 'Elixir',
                   'url' => '/item/?classId=0&subClassId=2',
                ),
                array(
                   'label' => 'Flask',
                   'url' => '/item/?classId=0&subClassId=3',
                ),
                array(
                   'label' => 'Scroll',
                   'url' => '/item/?classId=0&subClassId=4',
                ),
                array(
                   'label' => 'Food & Drink',
                   'url' => '/item/?classId=0&subClassId=5',
                ),
                array(
                   'label' => 'Item Enhancement',
                   'url' => '/item/?classId=0&subClassId=6',
                ),
                array(
                   'label' => 'Bandage',
                   'url' => '/item/?classId=0&subClassId=7',
                ),
                array(
                   'label' => 'Other',
                   'url' => '/item/?classId=0&subClassId=8',
                ),
              ),
            ),
            array(
               'label' => 'Glyph',
               'url' => '/item/?classId=16',
               'children' => 
              array (
                array(
                   'label' => 'Warrior',
                   'url' => '/item/?classId=16&subClassId=1',
                ),
                array(
                   'label' => 'Paladin',
                   'url' => '/item/?classId=16&subClassId=2',
                ),
                array(
                   'label' => 'Hunter',
                   'url' => '/item/?classId=16&subClassId=3',
                ),
                array(
                   'label' => 'Rogue',
                   'url' => '/item/?classId=16&subClassId=4',
                ),
                array(
                   'label' => 'Priest',
                   'url' => '/item/?classId=16&subClassId=5',
                ),
                array(
                   'label' => 'Death Knight',
                   'url' => '/item/?classId=16&subClassId=6',
                ),
                array(
                   'label' => 'Shaman',
                   'url' => '/item/?classId=16&subClassId=7',
                ),
                array(
                   'label' => 'Mage',
                   'url' => '/item/?classId=16&subClassId=8',
                ),
                array(
                   'label' => 'Warlock',
                   'url' => '/item/?classId=16&subClassId=9',
                ),
                array(
                   'label' => 'Druid',
                   'url' => '/item/?classId=16&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Trade Goods',
               'url' => '/item/?classId=7',
               'children' => 
              array (
                array(
                   'label' => 'Parts',
                   'url' => '/item/?classId=7&subClassId=1',
                ),
                array(
                   'label' => 'Explosives',
                   'url' => '/item/?classId=7&subClassId=2',
                ),
                array(
                   'label' => 'Devices',
                   'url' => '/item/?classId=7&subClassId=3',
                ),
                array(
                   'label' => 'Jewelcrafting',
                   'url' => '/item/?classId=7&subClassId=4',
                ),
                array(
                   'label' => 'Cloth',
                   'url' => '/item/?classId=7&subClassId=5',
                ),
                array(
                   'label' => 'Leather',
                   'url' => '/item/?classId=7&subClassId=6',
                ),
                array(
                   'label' => 'Metal & Stone',
                   'url' => '/item/?classId=7&subClassId=7',
                ),
                array(
                   'label' => 'Meat',
                   'url' => '/item/?classId=7&subClassId=8',
                ),
                array(
                   'label' => 'Herb',
                   'url' => '/item/?classId=7&subClassId=9',
                ),
                array(
                   'label' => 'Elemental',
                   'url' => '/item/?classId=7&subClassId=10',
                ),
                array(
                   'label' => 'Other',
                   'url' => '/item/?classId=7&subClassId=11',
                ),
                array(
                   'label' => 'Enchanting',
                   'url' => '/item/?classId=7&subClassId=12',
                ),
                array(
                   'label' => 'Materials',
                   'url' => '/item/?classId=7&subClassId=13',
                ),
                array(
                   'label' => 'Item Enchantment',
                   'url' => '/item/?classId=7&subClassId=14',
                ),
              ),
            ),
            array(
               'label' => 'Recipe',
               'url' => '/item/?classId=9',
               'children' => 
              array (
                array(
                   'label' => 'Book',
                   'url' => '/item/?classId=9&subClassId=0',
                ),
                array(
                   'label' => 'Leatherworking',
                   'url' => '/item/?classId=9&subClassId=1',
                ),
                array(
                   'label' => 'Tailoring',
                   'url' => '/item/?classId=9&subClassId=2',
                ),
                array(
                   'label' => 'Engineering',
                   'url' => '/item/?classId=9&subClassId=3',
                ),
                array(
                   'label' => 'Blacksmithing',
                   'url' => '/item/?classId=9&subClassId=4',
                ),
                array(
                   'label' => 'Cooking',
                   'url' => '/item/?classId=9&subClassId=5',
                ),
                array(
                   'label' => 'Alchemy',
                   'url' => '/item/?classId=9&subClassId=6',
                ),
                array(
                   'label' => 'First Aid',
                   'url' => '/item/?classId=9&subClassId=7',
                ),
                array(
                   'label' => 'Enchanting',
                   'url' => '/item/?classId=9&subClassId=8',
                ),
                array(
                   'label' => 'Fishing',
                   'url' => '/item/?classId=9&subClassId=9',
                ),
                array(
                   'label' => 'Jewelcrafting',
                   'url' => '/item/?classId=9&subClassId=10',
                ),
                array(
                   'label' => 'Inscription',
                   'url' => '/item/?classId=9&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Gem',
               'url' => '/item/?classId=3',
               'children' => 
              array (
                array(
                   'label' => 'Red',
                   'url' => '/item/?classId=3&subClassId=0',
                ),
                array(
                   'label' => 'Blue',
                   'url' => '/item/?classId=3&subClassId=1',
                ),
                array(
                   'label' => 'Yellow',
                   'url' => '/item/?classId=3&subClassId=2',
                ),
                array(
                   'label' => 'Purple',
                   'url' => '/item/?classId=3&subClassId=3',
                ),
                array(
                   'label' => 'Green',
                   'url' => '/item/?classId=3&subClassId=4',
                ),
                array(
                   'label' => 'Orange',
                   'url' => '/item/?classId=3&subClassId=5',
                ),
                array(
                   'label' => 'Meta',
                   'url' => '/item/?classId=3&subClassId=6',
                ),
                array(
                   'label' => 'Simple',
                   'url' => '/item/?classId=3&subClassId=7',
                ),
                array(
                   'label' => 'Prismatic',
                   'url' => '/item/?classId=3&subClassId=8',
                ),
                array(
                   'label' => 'Hydraulic',
                   'url' => '/item/?classId=3&subClassId=9',
                ),
                array(
                   'label' => 'Cogwheel',
                   'url' => '/item/?classId=3&subClassId=10',
                ),
              ),
            ),
            array(
               'label' => 'Miscellaneous',
               'url' => '/item/?classId=15',
               'children' => 
              array (
                array(
                   'label' => 'Junk',
                   'url' => '/item/?classId=15&subClassId=0',
                ),
                array(
                   'label' => 'Reagent',
                   'url' => '/item/?classId=15&subClassId=1',
                ),
                array(
                   'label' => 'Pet',
                   'url' => '/item/?classId=15&subClassId=2',
                ),
                array(
                   'label' => 'Holiday',
                   'url' => '/item/?classId=15&subClassId=3',
                ),
                array(
                   'label' => 'Other',
                   'url' => '/item/?classId=15&subClassId=4',
                ),
                array(
                   'label' => 'Mount',
                   'url' => '/item/?classId=15&subClassId=5',
                ),
              ),
            ),
            array(
               'label' => 'Quest',
               'url' => '/item/?classId=12',
            ),
          ),
        ),
        array(
           'label' => 'Expanded Universe',
           'url' => '/game/lore/',
           'children' => 
          array (
            array(
               'label' => 'Leader Short Stories',
               'url' => '/game/lore/leader-story/',
               'children' => 
              array (
                array(
                   'label' => 'Genn Greymane',
                   'url' => '/game/lore/leader-story/genn-greymane/1/',
                ),
                array(
                   'label' => 'Garrosh Hellscream',
                   'url' => '/game/lore/leader-story/garrosh-hellscream/1/',
                ),
                array(
                   'label' => 'Gallywix',
                   'url' => '/game/lore/leader-story/gallywix/1/',
                ),
                array(
                   'label' => 'The Council of Three Hammers',
                   'url' => '/game/lore/leader-story/the-council-of-three-hammers/1/',
                ),
                array(
                   'label' => 'Vol\'jin',
                   'url' => '/game/lore/leader-story/voljin/1/',
                ),
                array(
                   'label' => 'Gelbin Mekkatorque',
                   'url' => '/game/lore/leader-story/gelbin-mekkatorque/1/',
                ),
              ),
            ),
            array(
               'label' => 'Short Stories',
               'url' => '/game/lore/short-story/',
               'children' => 
              array (
                array(
                   'label' => 'Road To Damnation',
                   'url' => '/game/lore/short-story/damnation/1/',
                ),
                array(
                   'label' => 'The War of the Shifting Sands',
                   'url' => '/game/lore/short-story/shifting-sands/1/',
                ),
                array(
                   'label' => 'Unbroken',
                   'url' => '/game/lore/short-story/unbroken/1/',
                ),
              ),
            ),
            array(
               'label' => 'The History of Warcraft',
               'url' => '/game/lore/story-so-far/',
               'children' => 
              array (
                array(
                   'label' => 'Chapter I: Mythos',
                   'url' => '/game/lore/story-so-far/chapter-1/1/',
                ),
                array(
                   'label' => 'Chapter II: The New World',
                   'url' => '/game/lore/story-so-far/chapter-2/1/',
                ),
                array(
                   'label' => 'Chapter III: The Doom of Draenor',
                   'url' => '/game/lore/story-so-far/chapter-3/1/',
                ),
                array(
                   'label' => 'Chapter IV: Alliance And Horde',
                   'url' => '/game/lore/story-so-far/chapter-4/1/',
                ),
                array(
                   'label' => 'Chapter V: Return of the Burning Legion',
                   'url' => '/game/lore/story-so-far/chapter-5/1/',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Professions',
           'url' => '/profession/',
           'children' => 
          array (
            array(
               'label' => 'Primary',
            ),
            array(
               'label' => 'Alchemy',
               'url' => '/profession/alchemy/',
            ),
            array(
               'label' => 'Blacksmithing',
               'url' => '/profession/blacksmithing/',
            ),
            array(
               'label' => 'Enchanting',
               'url' => '/profession/enchanting/',
            ),
            array(
               'label' => 'Engineering',
               'url' => '/profession/engineering/',
            ),
            array(
               'label' => 'Herbalism',
               'url' => '/profession/herbalism/',
            ),
            array(
               'label' => 'Inscription',
               'url' => '/profession/inscription/',
            ),
            array(
               'label' => 'Jewelcrafting',
               'url' => '/profession/jewelcrafting/',
            ),
            array(
               'label' => 'Leatherworking',
               'url' => '/profession/leatherworking/',
            ),
            array(
               'label' => 'Mining',
               'url' => '/profession/mining/',
            ),
            array(
               'label' => 'Skinning',
               'url' => '/profession/skinning/',
            ),
            array(
               'label' => 'Tailoring',
               'url' => '/profession/tailoring/',
            ),
            array(
               'label' => 'Secondary',
            ),
            array(
               'label' => 'Archaeology',
               'url' => '/profession/archaeology/',
            ),
            array(
               'label' => 'Cooking',
               'url' => '/profession/cooking/',
            ),
            array(
               'label' => 'First Aid',
               'url' => '/profession/first-aid/',
            ),
            array(
               'label' => 'Fishing',
               'url' => '/profession/fishing/',
            ),
          ),
        ),
        array(
           'label' => 'Races',
           'url' => '/game/race/',
           'children' => 
          array (
            array(
               'label' => 'Alliance',
               'url' => '',
            ),
            array(
               'label' => 'Draenei',
               'url' => '/game/race/draenei/',
            ),
            array(
               'label' => 'Dwarf',
               'url' => '/game/race/dwarf/',
            ),
            array(
               'label' => 'Human',
               'url' => '/game/race/human/',
            ),
            array(
               'label' => 'Gnome',
               'url' => '/game/race/gnome/',
            ),
            array(
               'label' => 'Night Elf',
               'url' => '/game/race/night-elf/',
            ),
            array(
               'label' => 'Worgen',
               'url' => '/game/race/worgen/',
            ),
            array(
               'label' => 'Horde',
               'url' => '',
            ),
            array(
               'label' => 'Blood Elf',
               'url' => '/game/race/blood-elf/',
            ),
            array(
               'label' => 'Forsaken',
               'url' => '/game/race/forsaken/',
            ),
            array(
               'label' => 'Goblin',
               'url' => '/game/race/goblin/',
            ),
            array(
               'label' => 'Orc',
               'url' => '/game/race/orc/',
            ),
            array(
               'label' => 'Tauren',
               'url' => '/game/race/tauren/',
            ),
            array(
               'label' => 'Troll',
               'url' => '/game/race/troll/',
            ),
          ),
        ),
        array(
           'label' => 'Web Features',
           'url' => '',
        ),
        array(
           'label' => 'Patch Notes',
           'url' => '/game/patch-notes/',
           'children' => 
          array (
            array(
               'label' => 'Rage of the Firelands',
               'url' => '/game/patch-notes/4-2/',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/game/patch-notes/4-0/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 4.0.1',
                   'url' => '/game/patch-notes/4-0-1/',
                ),
                array(
                   'label' => 'Patch 4.0.3',
                   'url' => '/game/patch-notes/4-0-3/',
                ),
                array(
                   'label' => 'Patch 4.0.6',
                   'url' => '/game/patch-notes/4-0-6/',
                ),
              ),
            ),
            array(
               'label' => 'Fall of the Lich King',
               'url' => '/game/patch-notes/3-3/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 3.3.0',
                   'url' => '/game/patch-notes/3-3-0/',
                ),
                array(
                   'label' => 'Patch 3.3.0a',
                   'url' => '/game/patch-notes/3-3-0a/',
                ),
                array(
                   'label' => 'Patch 3.3.2',
                   'url' => '/game/patch-notes/3-3-2/',
                ),
                array(
                   'label' => 'Patch 3.3.3',
                   'url' => '/game/patch-notes/3-3-3/',
                ),
                array(
                   'label' => 'Patch 3.3.5',
                   'url' => '/game/patch-notes/3-3-5/',
                ),
              ),
            ),
            array(
               'label' => 'Call of the Crusade',
               'url' => '/game/patch-notes/3-2/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 3.2.0',
                   'url' => '/game/patch-notes/3-2-0/',
                ),
                array(
                   'label' => 'Patch 3.2.2',
                   'url' => '/game/patch-notes/3-2-2/',
                ),
                array(
                   'label' => 'Patch 3.2.2a',
                   'url' => '/game/patch-notes/3-2-2a/',
                ),
              ),
            ),
            array(
               'label' => 'Secrets of Ulduar',
               'url' => '/game/patch-notes/3-1/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 3.1.0',
                   'url' => '/game/patch-notes/3-1-0/',
                ),
                array(
                   'label' => 'Patch 3.1.1',
                   'url' => '/game/patch-notes/3-1-1/',
                ),
                array(
                   'label' => 'Patch 3.1.2',
                   'url' => '/game/patch-notes/3-1-2/',
                ),
                array(
                   'label' => 'Patch 3.1.3',
                   'url' => '/game/patch-notes/3-1-3/',
                ),
              ),
            ),
            array(
               'label' => 'Wrath of Lich King',
               'url' => '/game/patch-notes/3-0/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 3.0.2',
                   'url' => '/game/patch-notes/3-0-2/',
                ),
                array(
                   'label' => 'Patch 3.0.3',
                   'url' => '/game/patch-notes/3-0-3/',
                ),
                array(
                   'label' => 'Patch 3.0.8',
                   'url' => '/game/patch-notes/3-0-8/',
                ),
                array(
                   'label' => 'Patch 3.0.9',
                   'url' => '/game/patch-notes/3-0-9/',
                ),
              ),
            ),
            array(
               'label' => 'Fury of the Sunwell',
               'url' => '/game/patch-notes/2-4/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 2.4.0',
                   'url' => '/game/patch-notes/2-4-0/',
                ),
                array(
                   'label' => 'Patch 2.4.1',
                   'url' => '/game/patch-notes/2-4-1/',
                ),
                array(
                   'label' => 'Patch 2.4.2',
                   'url' => '/game/patch-notes/2-4-2/',
                ),
                array(
                   'label' => 'Patch 2.4.3',
                   'url' => '/game/patch-notes/2-4-3/',
                ),
              ),
            ),
            array(
               'label' => 'The Gods of Zul’Aman',
               'url' => '/game/patch-notes/2-3/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 2.3.0',
                   'url' => '/game/patch-notes/2-3-0/',
                ),
                array(
                   'label' => 'Patch 2.3.2',
                   'url' => '/game/patch-notes/2-3-2/',
                ),
                array(
                   'label' => 'Patch 2.3.3',
                   'url' => '/game/patch-notes/2-3-3/',
                ),
              ),
            ),
            array(
               'label' => 'The Black Temple',
               'url' => '/game/patch-notes/2-1/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 2.1.0',
                   'url' => '/game/patch-notes/2-1-0/',
                ),
                array(
                   'label' => 'Patch 2.1.1',
                   'url' => '/game/patch-notes/2-1-1/',
                ),
                array(
                   'label' => 'Patch 2.1.2',
                   'url' => '/game/patch-notes/2-1-2/',
                ),
                array(
                   'label' => 'Patch 2.1.3',
                   'url' => '/game/patch-notes/2-1-3/',
                ),
              ),
            ),
            array(
               'label' => 'Burning Crusade',
               'url' => '/game/patch-notes/2-0/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 2.0.1',
                   'url' => '/game/patch-notes/2-0-1/',
                ),
                array(
                   'label' => 'Patch 2.0.3',
                   'url' => '/game/patch-notes/2-0-3/',
                ),
                array(
                   'label' => 'Patch 2.0.4',
                   'url' => '/game/patch-notes/2-0-4/',
                ),
                array(
                   'label' => 'Patch 2.0.5',
                   'url' => '/game/patch-notes/2-0-5/',
                ),
                array(
                   'label' => 'Patch 2.0.6',
                   'url' => '/game/patch-notes/2-0-6/',
                ),
                array(
                   'label' => 'Patch 2.0.7',
                   'url' => '/game/patch-notes/2-0-7/',
                ),
                array(
                   'label' => 'Patch 2.0.8',
                   'url' => '/game/patch-notes/2-0-8/',
                ),
                array(
                   'label' => 'Patch 2.0.10',
                   'url' => '/game/patch-notes/2-0-10/',
                ),
                array(
                   'label' => 'Patch 2.0.12',
                   'url' => '/game/patch-notes/2-0-12/',
                ),
              ),
            ),
            array(
               'label' => 'Shadow of the Necropolis',
               'url' => '/game/patch-notes/1-11/',
               'children' => 
              array (
                array(
                   'label' => 'Patch 1.11.0',
                   'url' => '/game/patch-notes/1-11-0/',
                ),
                array(
                   'label' => 'Patch 1.11.1',
                   'url' => '/game/patch-notes/1-11-1/',
                ),
                array(
                   'label' => 'Patch 1.11.2',
                   'url' => '/game/patch-notes/1-11-2/',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'PvP',
           'url' => '/pvp/',
           'children' => 
          array (
            array(
               'label' => '2v2 Arena Ladder',
               'url' => '/pvp/arena/2v2/',
            ),
            array(
               'label' => '3v3 Arena Ladder',
               'url' => '/pvp/arena/3v3/',
            ),
            array(
               'label' => '5v5 Arena Ladder',
               'url' => '/pvp/arena/5v5/',
            ),
            array(
               'label' => 'Rated Battlegrounds Ladder',
               'url' => '/pvp/battlegrounds/',
            ),
          ),
        ),
        array(
           'label' => 'Realm Status',
           'url' => '/status/',
        ),
      ),
    ),
    array(
       'label' => 'Community',
       'url' => '/community/',
    ),
    array(
       'label' => 'Media',
       'url' => '/media/',
       'children' => 
      array (
        array(
           'label' => 'Artwork',
           'url' => '/media/artwork/',
           'children' => 
          array (
            array(
               'label' => 'WarCraft I',
               'url' => '/media/artwork/warcraft1/',
            ),
            array(
               'label' => 'WarCraft II',
               'url' => '/media/artwork/warcraft2/',
            ),
            array(
               'label' => 'WarCraft III',
               'url' => '/media/artwork/warcraft3/',
            ),
            array(
               'label' => 'World of Warcraft: Classic',
               'url' => '/media/artwork/wow-classic/',
            ),
            array(
               'label' => 'The Burning Crusade',
               'url' => '/media/artwork/wow-bc/',
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/media/artwork/wow-wrath/',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/media/artwork/wow-cataclysm/',
            ),
            array(
               'label' => 'Races',
               'url' => '/media/artwork/wow-races/',
            ),
            array(
               'label' => 'Classes',
               'url' => '/media/artwork/wow-classes/',
            ),
            array(
               'label' => 'Leaders',
               'url' => '/media/artwork/wow-leader/',
            ),
          ),
        ),
        array(
           'label' => 'Comics',
           'url' => '/media/comics/',
        ),
        array(
           'label' => 'Screenshots',
           'url' => '/media/screenshots/',
           'children' => 
          array (
            array(
               'label' => 'Classes',
               'url' => '/media/screenshots/classes/',
            ),
            array(
               'label' => 'Contests',
               'url' => '/media/screenshots/contests/',
            ),
            array(
               'label' => 'Dungeons',
               'url' => '/media/screenshots/dungeons/',
            ),
            array(
               'label' => 'Events',
               'url' => '/media/screenshots/events/',
               'children' => 
              array (
                array(
                   'label' => 'Argent Tournament',
                   'url' => '/media/screenshots/events/argent-tournament/',
                ),
                array(
                   'label' => 'Brewfest',
                   'url' => '/media/screenshots/events/brewfest/',
                ),
                array(
                   'label' => 'Children’s Week',
                   'url' => '/media/screenshots/events/childrens-week/',
                ),
                array(
                   'label' => 'Day of the Dead',
                   'url' => '/media/screenshots/events/day-of-the-dead/',
                ),
                array(
                   'label' => 'Hallow’s End',
                   'url' => '/media/screenshots/events/hallows-end/',
                ),
                array(
                   'label' => 'Harvest Festival',
                   'url' => '/media/screenshots/events/harvest-festival/',
                ),
                array(
                   'label' => 'Love is in the Air',
                   'url' => '/media/screenshots/events/love-is-in-the-air/',
                ),
                array(
                   'label' => 'Lunar Festival',
                   'url' => '/media/screenshots/events/lunar-festival/',
                ),
                array(
                   'label' => 'Midsummer',
                   'url' => '/media/screenshots/events/midsummer/',
                ),
                array(
                   'label' => 'New Years',
                   'url' => '/media/screenshots/events/new-years/',
                ),
                array(
                   'label' => 'Noble Garden',
                   'url' => '/media/screenshots/events/noble-garden/',
                ),
                array(
                   'label' => 'Pilgrim’s Bounty',
                   'url' => '/media/screenshots/events/pilgrims-bounty/',
                ),
                array(
                   'label' => 'Pirate’s Day',
                   'url' => '/media/screenshots/events/pirates-day/',
                ),
                array(
                   'label' => 'Scourge Invasion',
                   'url' => '/media/screenshots/events/scourge-invasion/',
                ),
                array(
                   'label' => 'Winter Veil',
                   'url' => '/media/screenshots/events/winter-veil/',
                ),
                array(
                   'label' => 'Zombie Invasion',
                   'url' => '/media/screenshots/events/zombie-invasion/',
                ),
              ),
            ),
            array(
               'label' => 'Flying Mounts',
               'url' => '/media/screenshots/flying-mounts/',
            ),
            array(
               'label' => 'Items',
               'url' => '/media/screenshots/items/',
            ),
            array(
               'label' => 'Mounts',
               'url' => '/media/screenshots/mounts/',
            ),
            array(
               'label' => 'Other',
               'url' => '/media/screenshots/other/',
            ),
            array(
               'label' => 'Pets',
               'url' => '/media/screenshots/pets/',
            ),
            array(
               'label' => 'Professions',
               'url' => '/media/screenshots/professions/',
            ),
            array(
               'label' => 'PvP',
               'url' => '/media/screenshots/pvp/',
            ),
            array(
               'label' => 'Races',
               'url' => '/media/screenshots/races/',
            ),
            array(
               'label' => 'Screenshot of the Day',
               'url' => '/media/screenshots/screenshot-of-the-day/',
               'children' => 
              array (
                array(
                   'label' => 'Classic',
                   'url' => '/media/screenshots/screenshot-of-the-day/classic/',
                ),
                array(
                   'label' => 'The Burning Crusade',
                   'url' => '/media/screenshots/screenshot-of-the-day/burning-crusade/',
                ),
                array(
                   'label' => 'Wrath of the Lich King',
                   'url' => '/media/screenshots/screenshot-of-the-day/wrath/',
                ),
                array(
                   'label' => 'Cataclysm',
                   'url' => '/media/screenshots/screenshot-of-the-day/cataclysm/',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Videos',
           'url' => '/media/videos/',
        ),
        array(
           'label' => 'Wallpapers',
           'url' => '/media/wallpapers/',
           'children' => 
          array (
            array(
               'label' => 'Dungeons & Bosses',
               'url' => '/media/wallpapers/bosses/',
            ),
            array(
               'label' => 'Cities',
               'url' => '/media/wallpapers/cities/',
            ),
            array(
               'label' => 'Classes',
               'url' => '/media/wallpapers/classes/',
            ),
            array(
               'label' => 'Comics',
               'url' => '/media/wallpapers/comics/',
            ),
            array(
               'label' => 'Covers',
               'url' => '/media/wallpapers/covers/',
            ),
            array(
               'label' => 'Events',
               'url' => '/media/wallpapers/events/',
            ),
            array(
               'label' => 'Fan Art',
               'url' => '/media/wallpapers/fan-art/',
            ),
            array(
               'label' => 'Mounts',
               'url' => '/media/wallpapers/mounts/',
            ),
            array(
               'label' => 'Other',
               'url' => '/media/wallpapers/other/',
            ),
            array(
               'label' => 'Patch',
               'url' => '/media/wallpapers/patch/',
            ),
            array(
               'label' => 'Pets',
               'url' => '/media/wallpapers/pets/',
            ),
            array(
               'label' => 'Races',
               'url' => '/media/wallpapers/races/',
            ),
            array(
               'label' => 'Regions',
               'url' => '/media/wallpapers/regions/',
            ),
            array(
               'label' => 'Trading Card Game',
               'url' => '/media/wallpapers/tcg/',
            ),
          ),
        ),
      ),
    ),
    array(
       'label' => 'Forums',
       'url' => '/forum/',
       'children' => 
      array (/*
        array(
           'label' => 'Support',
           'url' => '/forum/#forum874934',
           'children' => 
          array (
            array(
               'label' => 'Customer Support',
               'url' => '/forum/975485/',
            ),
            array(
               'label' => 'Technical Support',
               'url' => '/forum/874936/',
            ),
            array(
               'label' => 'Service Status',
               'url' => '/forum/1028280/',
            ),
          ),
        ),
        array(
           'label' => 'Community',
           'url' => '/forum/#forum874707',
           'children' => 
          array (
            array(
               'label' => 'Recruitment',
               'url' => '/forum/874708/',
            ),
            array(
               'label' => 'Raid and Guild Leadership',
               'url' => '/forum/874786/',
            ),
            array(
               'label' => 'Events and Fan Creations',
               'url' => '/forum/874787/',
            ),
            array(
               'label' => 'BlizzCon',
               'url' => '/forum/2132706/',
            ),
          ),
        ),
        array(
           'label' => 'Gameplay',
           'url' => '/forum/#forum872817',
           'children' => 
          array (
            array(
               'label' => 'Newcomers',
               'url' => '/forum/874698/',
            ),
            array(
               'label' => 'Quests',
               'url' => '/forum/874700/',
            ),
            array(
               'label' => 'Professions',
               'url' => '/forum/874699/',
            ),
            array(
               'label' => 'Achievements',
               'url' => '/forum/874701/',
            ),
            array(
               'label' => 'Role-Playing',
               'url' => '/forum/874702/',
            ),
            array(
               'label' => 'Story',
               'url' => '/forum/874703/',
            ),
            array(
               'label' => 'Raids and Dungeons',
               'url' => '/forum/874704/',
            ),
            array(
               'label' => 'General',
               'url' => '/forum/872818/',
            ),
            array(
               'label' => 'Interface and Macros',
               'url' => '/forum/874706/',
            ),
          ),
        ),
        array(
           'label' => 'Player versus Player',
           'url' => '/forum/#forum2265986',
           'children' => 
          array (
            array(
               'label' => 'Arena and Rated Battlegrounds',
               'url' => '/forum/2265987/',
            ),
            array(
               'label' => 'Battlegrounds and World PvP',
               'url' => '/forum/874705/',
            ),
          ),
        ),
        array(
           'label' => 'Class Roles',
           'url' => '/forum/#forum900515',
           'children' => 
          array (
            array(
               'label' => 'Damage Dealing',
               'url' => '/forum/896511/',
            ),
            array(
               'label' => 'Healing',
               'url' => '/forum/896512/',
            ),
            array(
               'label' => 'Tanking',
               'url' => '/forum/896513/',
            ),
          ),
        ),
        array(
           'label' => 'Classes',
           'url' => '/forum/#forum874788',
           'children' => 
          array (
            array(
               'label' => 'Death Knight',
               'url' => '/forum/874789/',
            ),
            array(
               'label' => 'Druid',
               'url' => '/forum/874790/',
            ),
            array(
               'label' => 'Hunter',
               'url' => '/forum/874791/',
            ),
            array(
               'label' => 'Mage',
               'url' => '/forum/874792/',
            ),
            array(
               'label' => 'Paladin',
               'url' => '/forum/874793/',
            ),
            array(
               'label' => 'Priest',
               'url' => '/forum/874794/',
            ),
            array(
               'label' => 'Rogue',
               'url' => '/forum/874795/',
            ),
            array(
               'label' => 'Shaman',
               'url' => '/forum/874796/',
            ),
            array(
               'label' => 'Warlock',
               'url' => '/forum/874929/',
            ),
            array(
               'label' => 'Warrior',
               'url' => '/forum/874930/',
            ),
          ),
        ),
        array(
           'label' => 'Development',
           'url' => '/forum/#forum874931',
           'children' => 
          array (
            array(
               'label' => 'Public Test Realm',
               'url' => '/forum/874932/',
            ),
          ),
        ),
        array(
           'label' => 'Gaming, Entertainment and Science',
           'url' => '/forum/#forum2256741',
           'children' => 
          array (
            array(
               'label' => 'Books and Comics',
               'url' => '/forum/2252142/',
            ),
            array(
               'label' => 'Games, Gaming and Hardware',
               'url' => '/forum/2252140/',
            ),
            array(
               'label' => 'Movies, TV and Entertainment',
               'url' => '/forum/2252141/',
            ),
            array(
               'label' => 'Tech and Science',
               'url' => '/forum/2252143/',
            ),
          ),
        ),
        array(
           'label' => 'Realm Forums',
           'url' => '/forum/#forum940631',
        ),*/
      ),
    ),
    array(
       'label' => 'Services',
       'url' => '/services/',
       'children' => 
      array (
        array(
           'label' => 'World of Warcraft Remote',
           'url' => '/services/wow-remote/',
        ),
        array(
           'label' => 'Mobile Armory',
           'url' => '/services/iphone/',
        ),
        array(
           'label' => 'World of Warcraft Rewards Visa',
           'url' => '/services/rewards-visa/',
           'children' => 
          array (
            array(
               'label' => 'World of Warcraft Rewards Visa FAQ',
               'url' => '/services/rewards-visa/faq/',
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
