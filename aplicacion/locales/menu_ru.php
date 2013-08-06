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
       'label' => 'Игра',
       'url' => '/game/',
       'children' => 
      array (
        array(
           'label' => 'Руководство для начинающих',
           'url' => '/game/guide/',
           'children' => 
          array (
            array(
               'label' => 'Руководство для начинающих',
               'url' => '/game/guide',
            ),
            array(
               'label' => 'Глава I: начало игры',
               'url' => '/game/guide/getting-started',
            ),
            array(
               'label' => 'Глава II: как играть',
               'url' => '/game/guide/how-to-play',
            ),
            array(
               'label' => 'Глава III: другие игроки',
               'url' => '/game/guide/playing-together',
            ),
            array(
               'label' => 'Глава IV: игра персонажем высокого уровня',
               'url' => '/game/guide/late-game',
            ),
          ),
        ),
        array(
           'label' => 'В игре',
           'url' => '',
        ),
        array(
           'label' => 'Классы',
           'url' => '/game/class/',
           'children' => 
          array (
            array(
               'label' => 'Рыцарь смерти',
               'url' => '/game/class/death-knight',
            ),
            array(
               'label' => 'Друид',
               'url' => '/game/class/druid',
            ),
            array(
               'label' => 'Охотник',
               'url' => '/game/class/hunter',
            ),
            array(
               'label' => 'Маг',
               'url' => '/game/class/mage',
            ),
            array(
               'label' => 'Паладин',
               'url' => '/game/class/paladin',
            ),
            array(
               'label' => 'Жрец',
               'url' => '/game/class/priest',
            ),
            array(
               'label' => 'Разбойник',
               'url' => '/game/class/rogue',
            ),
            array(
               'label' => 'Шаман',
               'url' => '/game/class/shaman',
            ),
            array(
               'label' => 'Чернокнижник',
               'url' => '/game/class/warlock',
            ),
            array(
               'label' => 'Воин',
               'url' => '/game/class/warrior',
            ),
          ),
        ),
        array(
           'label' => 'Подземелья и рейды',
           'url' => '/zone/',
           'children' => 
          array (
            array(
               'label' => 'Подземелья',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/zone/#expansion=3&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Вершина Смерча',
                   'url' => '/zone/the-vortex-pinnacle/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Великий визирь Эртан',
                       'url' => '/zone/the-vortex-pinnacle/grand-vizier-ertan',
                    ),
                    array(
                       'label' => 'Альтаирий',
                       'url' => '/zone/the-vortex-pinnacle/altairus',
                    ),
                    array(
                       'label' => 'Асаад',
                       'url' => '/zone/the-vortex-pinnacle/asaad',
                    ),
                  ),
                ),
                array(
                   'label' => 'Грим Батол',
                   'url' => '/zone/grim-batol/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Генерал Умбрисс',
                       'url' => '/zone/grim-batol/general-umbriss',
                    ),
                    array(
                       'label' => 'Начальник кузни Тронг',
                       'url' => '/zone/grim-batol/forgemaster-throngus',
                    ),
                    array(
                       'label' => 'Драгх Горячий Мрак',
                       'url' => '/zone/grim-batol/drahga-shadowburner',
                    ),
                    array(
                       'label' => 'Эрудакс',
                       'url' => '/zone/grim-batol/erudax',
                    ),
                  ),
                ),
                array(
                   'label' => 'Затерянный город Тол\'вир',
                   'url' => '/zone/lost-city-of-the-tolvir/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Генерал Хусам',
                       'url' => '/zone/lost-city-of-the-tolvir/general-husam',
                    ),
                    array(
                       'label' => 'Верховный пророк Барим',
                       'url' => '/zone/lost-city-of-the-tolvir/high-prophet-barim',
                    ),
                    array(
                       'label' => 'Зубохлоп',
                       'url' => '/zone/lost-city-of-the-tolvir/lockmaw',
                    ),
                    array(
                       'label' => 'Ауг',
                       'url' => '/zone/lost-city-of-the-tolvir/augh',
                    ),
                    array(
                       'label' => 'Сиамат',
                       'url' => '/zone/lost-city-of-the-tolvir/siamat',
                    ),
                  ),
                ),
                array(
                   'label' => 'Зул\'Аман',
                   'url' => '/zone/zulaman/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Акил\'зон',
                       'url' => '/zone/zulaman/akilzon',
                    ),
                    array(
                       'label' => 'Налоракк',
                       'url' => '/zone/zulaman/nalorakk',
                    ),
                    array(
                       'label' => 'Джан\'алай',
                       'url' => '/zone/zulaman/janalai',
                    ),
                    array(
                       'label' => 'Халаззи',
                       'url' => '/zone/zulaman/halazzi',
                    ),
                    array(
                       'label' => 'Повелитель проклятий Малакрасс',
                       'url' => '/zone/zulaman/hex-lord-malacrass',
                    ),
                    array(
                       'label' => 'Даакара',
                       'url' => '/zone/zulaman/daakara',
                    ),
                  ),
                ),
                array(
                   'label' => 'Зул\'Гуруб',
                   'url' => '/zone/zulgurub/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Верховный жрец Веноксис',
                       'url' => '/zone/zulgurub/high-priest-venoxis',
                    ),
                    array(
                       'label' => 'Мандокир Повелитель Крови',
                       'url' => '/zone/zulgurub/bloodlord-mandokir',
                    ),
                    array(
                       'label' => 'Тайник Безумия',
                       'url' => '/zone/zulgurub/cache-of-madness',
                    ),
                    array(
                       'label' => 'Верховная жрица Килнара',
                       'url' => '/zone/zulgurub/high-priestess-kilnara',
                    ),
                    array(
                       'label' => 'Занзил',
                       'url' => '/zone/zulgurub/zanzil',
                    ),
                    array(
                       'label' => 'Джин\'до Низвержитель Богов',
                       'url' => '/zone/zulgurub/jindo-the-godbreaker',
                    ),
                  ),
                ),
                array(
                   'label' => 'Каменные Недра',
                   'url' => '/zone/the-stonecore/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Корбор',
                       'url' => '/zone/the-stonecore/corborus',
                    ),
                    array(
                       'label' => 'Камнешкур',
                       'url' => '/zone/the-stonecore/slabhide',
                    ),
                    array(
                       'label' => 'Озрук',
                       'url' => '/zone/the-stonecore/ozruk',
                    ),
                    array(
                       'label' => 'Верховная жрица Азил',
                       'url' => '/zone/the-stonecore/high-priestess-azil',
                    ),
                  ),
                ),
                array(
                   'label' => 'Крепость Темного Клыка',
                   'url' => '/zone/shadowfang-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Барон Эшбери',
                       'url' => '/zone/shadowfang-keep/baron-ashbury',
                    ),
                    array(
                       'label' => 'Барон Сильверлейн',
                       'url' => '/zone/shadowfang-keep/baron-silverlaine',
                    ),
                    array(
                       'label' => 'Командир Спрингвейл',
                       'url' => '/zone/shadowfang-keep/commander-springvale',
                    ),
                    array(
                       'label' => 'Лорд Вальден',
                       'url' => '/zone/shadowfang-keep/lord-walden',
                    ),
                    array(
                       'label' => 'Лорд Годфри',
                       'url' => '/zone/shadowfang-keep/lord-godfrey',
                    ),
                  ),
                ),
                array(
                   'label' => 'Мертвые копи',
                   'url' => '/zone/deadmines/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Глубток',
                       'url' => '/zone/deadmines/glubtok',
                    ),
                    array(
                       'label' => 'Хеликс Отломчикс',
                       'url' => '/zone/deadmines/helix-gearbreaker',
                    ),
                    array(
                       'label' => 'Врагорез-5000',
                       'url' => '/zone/deadmines/foe-reaper-5000',
                    ),
                    array(
                       'label' => 'Адмирал Терзающий Рев',
                       'url' => '/zone/deadmines/admiral-ripsnarl',
                    ),
                    array(
                       'label' => '"Капитан" Пирожок',
                       'url' => '/zone/deadmines/captain-cookie',
                    ),
                    array(
                       'label' => 'Ванесса ван Клиф',
                       'url' => '/zone/deadmines/vanessa-vancleef',
                    ),
                  ),
                ),
                array(
                   'label' => 'Пещеры Черной горы',
                   'url' => '/zone/blackrock-caverns/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ром\'огг Костекрушитель',
                       'url' => '/zone/blackrock-caverns/romogg-bonecrusher',
                    ),
                    array(
                       'label' => 'Глашатай сумрака Корла',
                       'url' => '/zone/blackrock-caverns/corla-herald-of-twilight',
                    ),
                    array(
                       'label' => 'Карш Гнущий Сталь',
                       'url' => '/zone/blackrock-caverns/karsh-steelbender',
                    ),
                    array(
                       'label' => 'Красавица',
                       'url' => '/zone/blackrock-caverns/beauty',
                    ),
                    array(
                       'label' => 'Повелитель Перерожденных Обсидий',
                       'url' => '/zone/blackrock-caverns/ascendant-lord-obsidius',
                    ),
                  ),
                ),
                array(
                   'label' => 'Трон Приливов',
                   'url' => '/zone/throne-of-the-tides/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Леди Наз\'жар',
                       'url' => '/zone/throne-of-the-tides/lady-nazjar',
                    ),
                    array(
                       'label' => 'Командир Улток',
                       'url' => '/zone/throne-of-the-tides/commander-ulthok',
                    ),
                    array(
                       'label' => 'Подчиняющий разум Гур\'ша',
                       'url' => '/zone/throne-of-the-tides/mindbender-ghursha',
                    ),
                    array(
                       'label' => 'Озумат',
                       'url' => '/zone/throne-of-the-tides/ozumat',
                    ),
                  ),
                ),
                array(
                   'label' => 'Чертоги Созидания',
                   'url' => '/zone/halls-of-origination/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Храмовый страж Ануур',
                       'url' => '/zone/halls-of-origination/temple-guardian-anhuur',
                    ),
                    array(
                       'label' => 'Пта Ярость Земли',
                       'url' => '/zone/halls-of-origination/earthrager-ptah',
                    ),
                    array(
                       'label' => 'Анрафет',
                       'url' => '/zone/halls-of-origination/anraphet',
                    ),
                    array(
                       'label' => 'Изисет',
                       'url' => '/zone/halls-of-origination/isiset',
                    ),
                    array(
                       'label' => 'Аммунаэ',
                       'url' => '/zone/halls-of-origination/ammunae',
                    ),
                    array(
                       'label' => 'Сетеш',
                       'url' => '/zone/halls-of-origination/setesh',
                    ),
                    array(
                       'label' => 'Радж',
                       'url' => '/zone/halls-of-origination/rajh',
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
                   'label' => 'Азжол-Неруб',
                   'url' => '/zone/azjolnerub/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Крик\'тир Хранитель Врат',
                       'url' => '/zone/azjolnerub/krikthir-the-gatewatcher',
                    ),
                    array(
                       'label' => 'Хадронокс',
                       'url' => '/zone/azjolnerub/hadronox',
                    ),
                    array(
                       'label' => 'Ануб\'арак',
                       'url' => '/zone/azjolnerub/anubarak',
                    ),
                  ),
                ),
                array(
                   'label' => 'Аметистовая крепость',
                   'url' => '/zone/violet-hold/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Эрекем',
                       'url' => '/zone/violet-hold/erekem',
                    ),
                    array(
                       'label' => 'Морагг',
                       'url' => '/zone/violet-hold/moragg',
                    ),
                    array(
                       'label' => 'Гнойрон',
                       'url' => '/zone/violet-hold/ichoron',
                    ),
                    array(
                       'label' => 'Ксевозз',
                       'url' => '/zone/violet-hold/xevozz',
                    ),
                    array(
                       'label' => 'Лавантор',
                       'url' => '/zone/violet-hold/lavanthor',
                    ),
                    array(
                       'label' => 'Зурамат Уничтожитель',
                       'url' => '/zone/violet-hold/zuramat-the-obliterator',
                    ),
                    array(
                       'label' => 'Синигоса',
                       'url' => '/zone/violet-hold/cyanigosa',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ан\'кахет: Старое Королевство',
                   'url' => '/zone/ahnkahet-the-old-kingdom/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Старейшина Надокс',
                       'url' => '/zone/ahnkahet-the-old-kingdom/elder-nadox',
                    ),
                    array(
                       'label' => 'Принц Талдарам',
                       'url' => '/zone/ahnkahet-the-old-kingdom/prince-taldaram',
                    ),
                    array(
                       'label' => 'Джедога Искательница Теней',
                       'url' => '/zone/ahnkahet-the-old-kingdom/jedoga-shadowseeker',
                    ),
                    array(
                       'label' => 'Глашатай Волаж',
                       'url' => '/zone/ahnkahet-the-old-kingdom/herald-volazj',
                    ),
                    array(
                       'label' => 'Аманитар',
                       'url' => '/zone/ahnkahet-the-old-kingdom/amanitar',
                    ),
                  ),
                ),
                array(
                   'label' => 'Вершина Утгард',
                   'url' => '/zone/utgarde-pinnacle/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Свала Вечноскорбящая',
                       'url' => '/zone/utgarde-pinnacle/svala-sorrowgrave',
                    ),
                    array(
                       'label' => 'Горток Бледное Копыто',
                       'url' => '/zone/utgarde-pinnacle/gortok-palehoof',
                    ),
                    array(
                       'label' => 'Скади Безжалостный',
                       'url' => '/zone/utgarde-pinnacle/skadi-the-ruthless',
                    ),
                    array(
                       'label' => 'Король Имирон',
                       'url' => '/zone/utgarde-pinnacle/king-ymiron',
                    ),
                  ),
                ),
                array(
                   'label' => 'Гундрак',
                   'url' => '/zone/gundrak/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Слад\'ран',
                       'url' => '/zone/gundrak/sladran',
                    ),
                    array(
                       'label' => 'Колосс Драккари',
                       'url' => '/zone/gundrak/drakkari-colossus',
                    ),
                    array(
                       'label' => 'Эк Свирепый',
                       'url' => '/zone/gundrak/eck-the-ferocious',
                    ),
                    array(
                       'label' => 'Мураби',
                       'url' => '/zone/gundrak/moorabi',
                    ),
                    array(
                       'label' => 'Гал\'дара',
                       'url' => '/zone/gundrak/galdarah',
                    ),
                  ),
                ),
                array(
                   'label' => 'Залы Отражений',
                   'url' => '/zone/halls-of-reflection/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Фалрик',
                       'url' => '/zone/halls-of-reflection/falric',
                    ),
                    array(
                       'label' => 'Марвин',
                       'url' => '/zone/halls-of-reflection/marwyn',
                    ),
                    array(
                       'label' => 'Побег от Артаса',
                       'url' => '/zone/halls-of-reflection/escaped-from-arthas',
                    ),
                  ),
                ),
                array(
                   'label' => 'Испытание чемпиона',
                   'url' => '/zone/trial-of-the-champion/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Абсолютные чемпионы',
                       'url' => '/zone/trial-of-the-champion/grand-champions',
                    ),
                    array(
                       'label' => 'Чемпион Серебряного Авангарда',
                       'url' => '/zone/trial-of-the-champion/argent-champion',
                    ),
                    array(
                       'label' => 'Черный рыцарь',
                       'url' => '/zone/trial-of-the-champion/the-black-knight',
                    ),
                  ),
                ),
                array(
                   'label' => 'Крепость Драк\'Тарон',
                   'url' => '/zone/draktharon-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Кровотролль',
                       'url' => '/zone/draktharon-keep/trollgore',
                    ),
                    array(
                       'label' => 'Новос Призыватель',
                       'url' => '/zone/draktharon-keep/novos-the-summoner',
                    ),
                    array(
                       'label' => 'Король Дред',
                       'url' => '/zone/draktharon-keep/king-dred',
                    ),
                    array(
                       'label' => 'Пророк Тарон\'джа',
                       'url' => '/zone/draktharon-keep/the-prophet-tharonja',
                    ),
                  ),
                ),
                array(
                   'label' => 'Крепость Утгард',
                   'url' => '/zone/utgarde-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Принц Келесет',
                       'url' => '/zone/utgarde-keep/prince-keleseth',
                    ),
                    array(
                       'label' => 'Скарвальд Строитель',
                       'url' => '/zone/utgarde-keep/skarvald-the-constructor',
                    ),
                    array(
                       'label' => 'Ингвар Расхититель',
                       'url' => '/zone/utgarde-keep/ingvar-the-plunderer',
                    ),
                  ),
                ),
                array(
                   'label' => 'Кузня Душ',
                   'url' => '/zone/the-forge-of-souls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Броньям',
                       'url' => '/zone/the-forge-of-souls/bronjahm',
                    ),
                    array(
                       'label' => 'Пожиратель Душ',
                       'url' => '/zone/the-forge-of-souls/devourer-of-souls',
                    ),
                  ),
                ),
                array(
                   'label' => 'Нексус',
                   'url' => '/zone/the-nexus/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Замерзший командир',
                       'url' => '/zone/the-nexus/frozen-commander',
                    ),
                    array(
                       'label' => 'Великая ведунья Телестра',
                       'url' => '/zone/the-nexus/grand-magus-telestra',
                    ),
                    array(
                       'label' => 'Аномалус',
                       'url' => '/zone/the-nexus/anomalus',
                    ),
                    array(
                       'label' => 'Орморок Воспитатель Дерев',
                       'url' => '/zone/the-nexus/ormorok-the-treeshaper',
                    ),
                    array(
                       'label' => 'Керистраза',
                       'url' => '/zone/the-nexus/keristrasza',
                    ),
                  ),
                ),
                array(
                   'label' => 'Окулус',
                   'url' => '/zone/the-oculus/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Дракос Дознаватель',
                       'url' => '/zone/the-oculus/drakos-the-interrogator',
                    ),
                    array(
                       'label' => 'Варос Заоблачный Странник',
                       'url' => '/zone/the-oculus/varos-cloudstrider',
                    ),
                    array(
                       'label' => 'Маг-лорд Уром',
                       'url' => '/zone/the-oculus/magelord-urom',
                    ),
                    array(
                       'label' => 'Хранитель энергии Эрегос',
                       'url' => '/zone/the-oculus/leyguardian-eregos',
                    ),
                  ),
                ),
                array(
                   'label' => 'Очищение Стратхольма',
                   'url' => '/zone/the-culling-of-stratholme/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Мясной Крюк',
                       'url' => '/zone/the-culling-of-stratholme/meathook',
                    ),
                    array(
                       'label' => 'Салрамм Плоторез',
                       'url' => '/zone/the-culling-of-stratholme/salramm-the-fleshcrafter',
                    ),
                    array(
                       'label' => 'Хронолорд Эпох',
                       'url' => '/zone/the-culling-of-stratholme/chronolord-epoch',
                    ),
                    array(
                       'label' => 'Мал\'Ганис',
                       'url' => '/zone/the-culling-of-stratholme/malganis',
                    ),
                    array(
                       'label' => 'Осквернитель из рода Бесконечности',
                       'url' => '/zone/the-culling-of-stratholme/infinite-corruptor',
                    ),
                  ),
                ),
                array(
                   'label' => 'Чертоги Камня',
                   'url' => '/zone/halls-of-stone/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Кристаллус',
                       'url' => '/zone/halls-of-stone/krystallus',
                    ),
                    array(
                       'label' => 'Дева Скорби',
                       'url' => '/zone/halls-of-stone/maiden-of-grief',
                    ),
                    array(
                       'label' => 'Трибунал Веков',
                       'url' => '/zone/halls-of-stone/tribunal-of-ages',
                    ),
                    array(
                       'label' => 'Сьоннир Литейщик',
                       'url' => '/zone/halls-of-stone/sjonnir-the-ironshaper',
                    ),
                  ),
                ),
                array(
                   'label' => 'Чертоги Молний',
                   'url' => '/zone/halls-of-lightning/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Генерал Бьярнгрим',
                       'url' => '/zone/halls-of-lightning/general-bjarngrim',
                    ),
                    array(
                       'label' => 'Волхан',
                       'url' => '/zone/halls-of-lightning/volkhan',
                    ),
                    array(
                       'label' => 'Ионар',
                       'url' => '/zone/halls-of-lightning/ionar',
                    ),
                    array(
                       'label' => 'Локен',
                       'url' => '/zone/halls-of-lightning/loken',
                    ),
                  ),
                ),
                array(
                   'label' => 'Яма Сарона',
                   'url' => '/zone/pit-of-saron/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Начальник кузни Гархлад',
                       'url' => '/zone/pit-of-saron/forgemaster-garfrost',
                    ),
                    array(
                       'label' => 'Крик',
                       'url' => '/zone/pit-of-saron/krick',
                    ),
                    array(
                       'label' => 'Повелитель Плети Тираний',
                       'url' => '/zone/pit-of-saron/scourgelord-tyrannus',
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
                   'label' => 'Аркатрац',
                   'url' => '/zone/the-arcatraz/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Зерекет Бездонный',
                       'url' => '/zone/the-arcatraz/zereketh-the-unbound',
                    ),
                    array(
                       'label' => 'Даллия Глашатай Судьбы',
                       'url' => '/zone/the-arcatraz/dalliah-the-doomsayer',
                    ),
                    array(
                       'label' => 'Провидец Гнева Соккорат',
                       'url' => '/zone/the-arcatraz/wrathscryer-soccothrates',
                    ),
                    array(
                       'label' => 'Предвестник Скайрисс',
                       'url' => '/zone/the-arcatraz/harbinger-skyriss',
                    ),
                  ),
                ),
                array(
                   'label' => 'Аукенайские гробницы',
                   'url' => '/zone/auchenai-crypts/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ширрак Страж Мертвых',
                       'url' => '/zone/auchenai-crypts/shirrak-the-dead-watcher',
                    ),
                    array(
                       'label' => 'Экзарх Маладаар',
                       'url' => '/zone/auchenai-crypts/exarch-maladaar',
                    ),
                  ),
                ),
                array(
                   'label' => 'Бастионы Адского Пламени',
                   'url' => '/zone/hellfire-ramparts/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Начальник стражи Гарголмар',
                       'url' => '/zone/hellfire-ramparts/watchkeeper-gargolmar',
                    ),
                    array(
                       'label' => 'Омор Неодолимый',
                       'url' => '/zone/hellfire-ramparts/omor-the-unscarred',
                    ),
                    array(
                       'label' => 'Вазруден Глашатай',
                       'url' => '/zone/hellfire-ramparts/vazruden-the-herald',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ботаника',
                   'url' => '/zone/the-botanica/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Командир Сараннис',
                       'url' => '/zone/the-botanica/commander-sarannis',
                    ),
                    array(
                       'label' => 'Верховный ботаник Фрейвин',
                       'url' => '/zone/the-botanica/high-botanist-freywinn',
                    ),
                    array(
                       'label' => 'Скалезуб Скорбный',
                       'url' => '/zone/the-botanica/thorngrin-the-tender',
                    ),
                    array(
                       'label' => 'Ладж',
                       'url' => '/zone/the-botanica/laj',
                    ),
                    array(
                       'label' => 'Узлодревень',
                       'url' => '/zone/the-botanica/warp-splinter',
                    ),
                  ),
                ),
                array(
                   'label' => 'Гробницы Маны',
                   'url' => '/zone/manatombs/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Пандемоний',
                       'url' => '/zone/manatombs/pandemonius',
                    ),
                    array(
                       'label' => 'Таварок',
                       'url' => '/zone/manatombs/tavarok',
                    ),
                    array(
                       'label' => 'Принц Шаффар',
                       'url' => '/zone/manatombs/nexusprince-shaffar',
                    ),
                  ),
                ),
                array(
                   'label' => 'Кузня Крови',
                   'url' => '/zone/the-blood-furnace/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Мастер',
                       'url' => '/zone/the-blood-furnace/the-maker',
                    ),
                    array(
                       'label' => 'Броггок',
                       'url' => '/zone/the-blood-furnace/broggok',
                    ),
                    array(
                       'label' => 'Кели\'дан Разрушитель',
                       'url' => '/zone/the-blood-furnace/kelidan-the-breaker',
                    ),
                  ),
                ),
                array(
                   'label' => 'Механар',
                   'url' => '/zone/the-mechanar/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Механо-лорд Конденсарон',
                       'url' => '/zone/the-mechanar/mechanolord-capacitus',
                    ),
                    array(
                       'label' => 'Хранители Врат',
                       'url' => '/zone/the-mechanar/the-gatewatchers',
                    ),
                    array(
                       'label' => 'Пустомант Сепетрея',
                       'url' => '/zone/the-mechanar/nethermancer-sepethrea',
                    ),
                    array(
                       'label' => 'Паталеон Вычислитель',
                       'url' => '/zone/the-mechanar/pathaleon-the-calculator',
                    ),
                  ),
                ),
                array(
                   'label' => 'Нижетопь',
                   'url' => '/zone/the-underbog/',
                   'children' =>  
                  array (
                    array(
                       'label' => 'Топеглад',
                       'url' => '/zone/the-underbog/hungarfen',
                    ),
                    array(
                       'label' => 'Газ\'ан',
                       'url' => '/zone/the-underbog/ghazan',
                    ),
                    array(
                       'label' => 'Владыка болота Мусел\'ек',
                       'url' => '/zone/the-underbog/swamplord-muselek',
                    ),
                    array(
                       'label' => 'Черная Охотница',
                       'url' => '/zone/the-underbog/the-black-stalker',
                    ),
                  ),
                ),
                array(
                   'label' => 'Открытие Темного портала',
                   'url' => '/zone/opening-of-the-dark-portal/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Повелитель времени Дежа',
                       'url' => '/zone/opening-of-the-dark-portal/chrono-lord-deja',
                    ),
                    array(
                       'label' => 'Темпорус',
                       'url' => '/zone/opening-of-the-dark-portal/temporus',
                    ),
                    array(
                       'label' => 'Эонус',
                       'url' => '/zone/opening-of-the-dark-portal/aeonus',
                    ),
                  ),
                ),
                array(
                   'label' => 'Паровое подземелье',
                   'url' => '/zone/the-steamvault/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Гидромант Теспия',
                       'url' => '/zone/the-steamvault/hydromancer-thespia',
                    ),
                    array(
                       'label' => 'Анжинер Паропуск',
                       'url' => '/zone/the-steamvault/mekgineer-steamrigger',
                    ),
                    array(
                       'label' => 'Полководец Калитреш',
                       'url' => '/zone/the-steamvault/warlord-kalithresh',
                    ),
                  ),
                ),
                array(
                   'label' => 'Побег из Дарнхольда',
                   'url' => '/zone/the-escape-from-durnholde/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Лейтенант Дрейк',
                       'url' => '/zone/the-escape-from-durnholde/lieutenant-drake',
                    ),
                    array(
                       'label' => 'Капитан Скарлок',
                       'url' => '/zone/the-escape-from-durnholde/captain-skarloc',
                    ),
                    array(
                       'label' => 'Охотник Вечности',
                       'url' => '/zone/the-escape-from-durnholde/epoch-hunter',
                    ),
                  ),
                ),
                array(
                   'label' => 'Разрушенные залы',
                   'url' => '/zone/the-shattered-halls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Главный чернокнижник Пустоклят',
                       'url' => '/zone/the-shattered-halls/grand-warlock-nethekurse',
                    ),
                    array(
                       'label' => 'Кровавый страж Порунг',
                       'url' => '/zone/the-shattered-halls/blood-guard-porung',
                    ),
                    array(
                       'label' => 'О\'мрогг Завоеватель',
                       'url' => '/zone/the-shattered-halls/warbringer-omrogg',
                    ),
                    array(
                       'label' => 'Вождь Каргат Острорук',
                       'url' => '/zone/the-shattered-halls/warchief-kargath-bladefist',
                    ),
                  ),
                ),
                array(
                   'label' => 'Сетеккские залы',
                   'url' => '/zone/sethekk-halls/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Темнопряд Сит',
                       'url' => '/zone/sethekk-halls/darkweaver-syth',
                    ),
                    array(
                       'label' => 'Король воронов Айкисс',
                       'url' => '/zone/sethekk-halls/talon-king-ikiss',
                    ),
                    array(
                       'label' => 'Анзу',
                       'url' => '/zone/sethekk-halls/anzu',
                    ),
                  ),
                ),
                array(
                   'label' => 'Темный лабиринт',
                   'url' => '/zone/shadow-labyrinth/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Посол Гиблочрев',
                       'url' => '/zone/shadow-labyrinth/ambassador-hellmaw',
                    ),
                    array(
                       'label' => 'Черносерд Проповедник',
                       'url' => '/zone/shadow-labyrinth/blackheart-the-inciter',
                    ),
                    array(
                       'label' => 'Великий мастер Ворпил',
                       'url' => '/zone/shadow-labyrinth/grandmaster-vorpil',
                    ),
                    array(
                       'label' => 'Бормотун',
                       'url' => '/zone/shadow-labyrinth/murmur',
                    ),
                  ),
                ),
                array(
                   'label' => 'Терраса Магистров',
                   'url' => '/zone/magisters-terrace/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Селин Огненное Сердце',
                       'url' => '/zone/magisters-terrace/selin-fireheart',
                    ),
                    array(
                       'label' => 'Вексалиус',
                       'url' => '/zone/magisters-terrace/vexallus',
                    ),
                    array(
                       'label' => 'Жрица Делрисса',
                       'url' => '/zone/magisters-terrace/priestess-delrissa',
                    ),
                    array(
                       'label' => 'Кель\'тас Солнечный Скиталец',
                       'url' => '/zone/magisters-terrace/kaelthas-sunstrider',
                    ),
                  ),
                ),
                array(
                   'label' => 'Узилище',
                   'url' => '/zone/the-slave-pens/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Менну Предатель',
                       'url' => '/zone/the-slave-pens/mennu-the-betrayer',
                    ),
                    array(
                       'label' => 'Рокмар Трескун',
                       'url' => '/zone/the-slave-pens/rokmar-the-crackler',
                    ),
                    array(
                       'label' => 'Зыбун',
                       'url' => '/zone/the-slave-pens/quagmirran',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Классика',
               'url' => '/zone/#expansion=0&type=dungeons',
               'children' => 
              array (
                array(
                   'label' => 'Глубины Черной горы',
                   'url' => '/zone/blackrock-depths/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Верховный дознаватель Герштан',
                       'url' => '/zone/blackrock-depths/high-interrogator-gerstahn',
                    ),
                    array(
                       'label' => 'Лорд Роккор',
                       'url' => '/zone/blackrock-depths/lord-roccor',
                    ),
                    array(
                       'label' => 'Псарь Гребмар',
                       'url' => '/zone/blackrock-depths/houndmaster-grebmar',
                    ),
                    array(
                       'label' => 'Круг Закона',
                       'url' => '/zone/blackrock-depths/ring-of-law',
                    ),
                    array(
                       'label' => 'Пиромант Зерно Мудрости',
                       'url' => '/zone/blackrock-depths/pyromancer-loregrain',
                    ),
                    array(
                       'label' => 'Лорд Опалитель',
                       'url' => '/zone/blackrock-depths/lord-incendius',
                    ),
                    array(
                       'label' => 'Тюремщик Стилгисс',
                       'url' => '/zone/blackrock-depths/warder-stilgiss',
                    ),
                    array(
                       'label' => 'Финий Темнострой',
                       'url' => '/zone/blackrock-depths/fineous-darkvire',
                    ),
                    array(
                       'label' => 'Бейл\'Гор',
                       'url' => '/zone/blackrock-depths/baelgar',
                    ),
                    array(
                       'label' => 'Генерал Кузня Гнева',
                       'url' => '/zone/blackrock-depths/general-angerforge',
                    ),
                    array(
                       'label' => 'Повелитель големов Аргелмах',
                       'url' => '/zone/blackrock-depths/golem-lord-argelmach',
                    ),
                    array(
                       'label' => 'Харли Чернопых',
                       'url' => '/zone/blackrock-depths/hurley-blackbreath',
                    ),
                    array(
                       'label' => 'Фаланг',
                       'url' => '/zone/blackrock-depths/phalanx',
                    ),
                    array(
                       'label' => 'Риббли Крутипроб',
                       'url' => '/zone/blackrock-depths/ribbly-screwspigot',
                    ),
                    array(
                       'label' => 'Штоппор Наливалс',
                       'url' => '/zone/blackrock-depths/plugger-spazzring',
                    ),
                    array(
                       'label' => 'Посол Огнехлыст',
                       'url' => '/zone/blackrock-depths/ambassador-flamelash',
                    ),
                    array(
                       'label' => 'Семеро',
                       'url' => '/zone/blackrock-depths/the-seven',
                    ),
                    array(
                       'label' => 'Магмус',
                       'url' => '/zone/blackrock-depths/magmus',
                    ),
                    array(
                       'label' => 'Император Дагран Тауриссан',
                       'url' => '/zone/blackrock-depths/emperor-dagran-thaurissan',
                    ),
                  ),
                ),
                array(
                   'label' => 'Гномреган',
                   'url' => '/zone/gnomeregan/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Грязнюк',
                       'url' => '/zone/gnomeregan/grubbis',
                    ),
                    array(
                       'label' => 'Липкая муть',
                       'url' => '/zone/gnomeregan/viscous-fallout',
                    ),
                    array(
                       'label' => 'Электрошокер 6000',
                       'url' => '/zone/gnomeregan/electrocutioner-6000',
                    ),
                    array(
                       'label' => 'Толпогон 9-60',
                       'url' => '/zone/gnomeregan/crowd-pummeler-960',
                    ),
                    array(
                       'label' => 'Анжинер Термоштепсель',
                       'url' => '/zone/gnomeregan/mekgineer-thermaplugg',
                    ),
                  ),
                ),
                array(
                   'label' => 'Забытый Город',
                   'url' => '/zone/dire-maul/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Зеврим Терновое Копыто',
                       'url' => '/zone/dire-maul/zevrim-thornhoof',
                    ),
                    array(
                       'label' => 'Гидротварь',
                       'url' => '/zone/dire-maul/hydrospawn',
                    ),
                    array(
                       'label' => 'Лефтендрис',
                       'url' => '/zone/dire-maul/lethtendris',
                    ),
                    array(
                       'label' => 'Алззин Перевертень',
                       'url' => '/zone/dire-maul/alzzin-the-wildshaper',
                    ),
                    array(
                       'label' => 'Тендрис Криводрев',
                       'url' => '/zone/dire-maul/tendris-warpwood',
                    ),
                    array(
                       'label' => 'Иллиана Воронья Ольха',
                       'url' => '/zone/dire-maul/illyanna-ravenoak',
                    ),
                    array(
                       'label' => 'Магистр Календрис',
                       'url' => '/zone/dire-maul/magister-kalendris',
                    ),
                    array(
                       'label' => 'Бессмер\'тер',
                       'url' => '/zone/dire-maul/immolthar',
                    ),
                    array(
                       'label' => 'Принц Тортелдрин',
                       'url' => '/zone/dire-maul/prince-tortheldrin',
                    ),
                    array(
                       'label' => 'Стражник Мол\'дар',
                       'url' => '/zone/dire-maul/guard-moldar',
                    ),
                    array(
                       'label' => 'Топотун Криг',
                       'url' => '/zone/dire-maul/stomper-kreeg',
                    ),
                    array(
                       'label' => 'Стражник Фенгус',
                       'url' => '/zone/dire-maul/guard-fengus',
                    ),
                    array(
                       'label' => 'Стражник Слип\'кик',
                       'url' => '/zone/dire-maul/guard-slipkik',
                    ),
                    array(
                       'label' => 'Капитан Давигром',
                       'url' => '/zone/dire-maul/captain-kromcrush',
                    ),
                    array(
                       'label' => 'Чо\'Раш Наблюдатель',
                       'url' => '/zone/dire-maul/chorush-the-observer',
                    ),
                    array(
                       'label' => 'Король Гордок',
                       'url' => '/zone/dire-maul/king-gordok',
                    ),
                  ),
                ),
                array(
                   'label' => 'Затонувший храм',
                   'url' => '/zone/sunken-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Аватара Хаккара',
                       'url' => '/zone/sunken-temple/avatar-of-hakkar',
                    ),
                    array(
                       'label' => 'Джаммал\'ан Пророк',
                       'url' => '/zone/sunken-temple/jammalan-the-prophet',
                    ),
                    array(
                       'label' => 'Драконоры',
                       'url' => '/zone/sunken-temple/dragonkin',
                    ),
                    array(
                       'label' => 'Тень Эраникуса',
                       'url' => '/zone/sunken-temple/shade-of-eranikus',
                    ),
                  ),
                ),
                array(
                   'label' => 'Зул\'Фаррак',
                   'url' => '/zone/zulfarrak/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Гидромант Велрата',
                       'url' => '/zone/zulfarrak/hydromancer-velratha',
                    ),
                    array(
                       'label' => 'Газ\'рилла',
                       'url' => '/zone/zulfarrak/gahzrilla',
                    ),
                    array(
                       'label' => 'Анту\'сул',
                       'url' => '/zone/zulfarrak/antusul',
                    ),
                    array(
                       'label' => 'Тека Мученик',
                       'url' => '/zone/zulfarrak/theka-the-martyr',
                    ),
                    array(
                       'label' => 'Знахарь Зум\'рах',
                       'url' => '/zone/zulfarrak/witch-doctor-zumrah',
                    ),
                    array(
                       'label' => 'Некрум Кишкожуй',
                       'url' => '/zone/zulfarrak/nekrum-gutchewer',
                    ),
                    array(
                       'label' => 'Темный жрец Шезз\'зиз',
                       'url' => '/zone/zulfarrak/shadowpriest-sezzziz',
                    ),
                    array(
                       'label' => 'Вождь Укорз Песчаная Плешь',
                       'url' => '/zone/zulfarrak/chief-ukorz-sandscalp',
                    ),
                  ),
                ),
                array(
                   'label' => 'Крепость Темного Клыка',
                   'url' => '/zone/shadowfang-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Барон Эшбери',
                       'url' => '/zone/shadowfang-keep/baron-ashbury',
                    ),
                    array(
                       'label' => 'Барон Сильверлейн',
                       'url' => '/zone/shadowfang-keep/baron-silverlaine',
                    ),
                    array(
                       'label' => 'Командир Спрингвейл',
                       'url' => '/zone/shadowfang-keep/commander-springvale',
                    ),
                    array(
                       'label' => 'Лорд Вальден',
                       'url' => '/zone/shadowfang-keep/lord-walden',
                    ),
                    array(
                       'label' => 'Лорд Годфри',
                       'url' => '/zone/shadowfang-keep/lord-godfrey',
                    ),
                  ),
                ),
                array(
                   'label' => 'Курганы Иглошкурых',
                   'url' => '/zone/razorfen-downs/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Тутен\'каш',
                       'url' => '/zone/razorfen-downs/tutenkash',
                    ),
                    array(
                       'label' => 'Мордреш Огненный Глаз',
                       'url' => '/zone/razorfen-downs/mordresh-fire-eye',
                    ),
                    array(
                       'label' => 'Обжора',
                       'url' => '/zone/razorfen-downs/glutton',
                    ),
                    array(
                       'label' => 'Амненнар Хладовей',
                       'url' => '/zone/razorfen-downs/amnennar-the-coldbringer',
                    ),
                  ),
                ),
                array(
                   'label' => 'Лабиринты Иглошкурых',
                   'url' => '/zone/razorfen-kraul/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Вестник смерти Джаргба',
                       'url' => '/zone/razorfen-kraul/death-speaker-jargba',
                    ),
                    array(
                       'label' => 'Ругуг',
                       'url' => '/zone/razorfen-kraul/roogug',
                    ),
                    array(
                       'label' => 'Аггем Терновое Проклятие',
                       'url' => '/zone/razorfen-kraul/aggem-thorncurse',
                    ),
                    array(
                       'label' => 'Властитель Таранный Клык',
                       'url' => '/zone/razorfen-kraul/overlord-ramtusk',
                    ),
                    array(
                       'label' => 'Агателос Свирепый',
                       'url' => '/zone/razorfen-kraul/agathelos-the-raging',
                    ),
                    array(
                       'label' => 'Чарлга Остробок',
                       'url' => '/zone/razorfen-kraul/charlga-razorflank',
                    ),
                  ),
                ),
                array(
                   'label' => 'Мародон',
                   'url' => '/zone/maraudon/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ноксион',
                       'url' => '/zone/maraudon/noxxion',
                    ),
                    array(
                       'label' => 'Бритвохлест',
                       'url' => '/zone/maraudon/razorlash',
                    ),
                    array(
                       'label' => 'Лорд Злоязыкий',
                       'url' => '/zone/maraudon/lord-vyletongue',
                    ),
                    array(
                       'label' => 'Келебрас Проклятый',
                       'url' => '/zone/maraudon/celebras-the-cursed',
                    ),
                    array(
                       'label' => 'Обвал',
                       'url' => '/zone/maraudon/landslide',
                    ),
                    array(
                       'label' => 'Ремонтник Гизлок',
                       'url' => '/zone/maraudon/tinkerer-gizlock',
                    ),
                    array(
                       'label' => 'Гнилопасть',
                       'url' => '/zone/maraudon/rotgrip',
                    ),
                    array(
                       'label' => 'Принцесса Терадрас',
                       'url' => '/zone/maraudon/princess-theradras',
                    ),
                  ),
                ),
                array(
                   'label' => 'Мертвые копи',
                   'url' => '/zone/deadmines/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Глубток',
                       'url' => '/zone/deadmines/glubtok',
                    ),
                    array(
                       'label' => 'Хеликс Отломчикс',
                       'url' => '/zone/deadmines/helix-gearbreaker',
                    ),
                    array(
                       'label' => 'Врагорез-5000',
                       'url' => '/zone/deadmines/foe-reaper-5000',
                    ),
                    array(
                       'label' => 'Адмирал Терзающий Рев',
                       'url' => '/zone/deadmines/admiral-ripsnarl',
                    ),
                    array(
                       'label' => '"Капитан" Пирожок',
                       'url' => '/zone/deadmines/captain-cookie',
                    ),
                    array(
                       'label' => 'Ванесса ван Клиф',
                       'url' => '/zone/deadmines/vanessa-vancleef',
                    ),
                  ),
                ),
                array(
                   'label' => 'Монастырь Алого ордена',
                   'url' => '/zone/scarlet-monastery/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Дознаватель Вишас',
                       'url' => '/zone/scarlet-monastery/interrogator-vishas',
                    ),
                    array(
                       'label' => 'Волшебник крови Талнос',
                       'url' => '/zone/scarlet-monastery/bloodmage-thalnos',
                    ),
                    array(
                       'label' => 'Псарь Локси',
                       'url' => '/zone/scarlet-monastery/houndmaster-loksey',
                    ),
                    array(
                       'label' => 'Чародей Доан',
                       'url' => '/zone/scarlet-monastery/arcanist-doan',
                    ),
                    array(
                       'label' => 'Ирод',
                       'url' => '/zone/scarlet-monastery/herod',
                    ),
                    array(
                       'label' => 'Верховный инквизитор Фэйрбанкс',
                       'url' => '/zone/scarlet-monastery/high-inquisitor-fairbanks',
                    ),
                    array(
                       'label' => 'Командир Алого ордена Могрейн',
                       'url' => '/zone/scarlet-monastery/scarlet-commander-mograine',
                    ),
                  ),
                ),
                array(
                   'label' => 'Некроситет',
                   'url' => '/zone/scholomance/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Киртонос Глашатай',
                       'url' => '/zone/scholomance/kirtonos-the-herald',
                    ),
                    array(
                       'label' => 'Джандис Барова',
                       'url' => '/zone/scholomance/jandice-barov',
                    ),
                    array(
                       'label' => 'Громоклин',
                       'url' => '/zone/scholomance/rattlegore',
                    ),
                    array(
                       'label' => 'Мардук Блэкпул',
                       'url' => '/zone/scholomance/marduk-blackpool',
                    ),
                    array(
                       'label' => 'Вектус',
                       'url' => '/zone/scholomance/vectus',
                    ),
                    array(
                       'label' => 'Рас Ледяной Шепот',
                       'url' => '/zone/scholomance/ras-frostwhisper',
                    ),
                    array(
                       'label' => 'Инструктор Коварнесса',
                       'url' => '/zone/scholomance/instructor-malicia',
                    ),
                    array(
                       'label' => 'Доктор Теолен Крастинов',
                       'url' => '/zone/scholomance/doctor-theolen-krastinov',
                    ),
                    array(
                       'label' => 'Хранитель знаний Полкелт',
                       'url' => '/zone/scholomance/lorekeeper-polkelt',
                    ),
                    array(
                       'label' => 'Равениан',
                       'url' => '/zone/scholomance/the-ravenian',
                    ),
                    array(
                       'label' => 'Лорд Алексей Баров',
                       'url' => '/zone/scholomance/lord-alexei-barov',
                    ),
                    array(
                       'label' => 'Леди Иллюсия Барова',
                       'url' => '/zone/scholomance/lady-illucia-barov',
                    ),
                    array(
                       'label' => 'Темный магистр Гандлинг',
                       'url' => '/zone/scholomance/darkmaster-gandling',
                    ),
                  ),
                ),
                array(
                   'label' => 'Непроглядная Пучина',
                   'url' => '/zone/blackfathom-deeps/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Гхаму-ра',
                       'url' => '/zone/blackfathom-deeps/ghamoora',
                    ),
                    array(
                       'label' => 'Леди Саревесс',
                       'url' => '/zone/blackfathom-deeps/lady-sarevess',
                    ),
                    array(
                       'label' => 'Гелихаст',
                       'url' => '/zone/blackfathom-deeps/gelihast',
                    ),
                    array(
                       'label' => 'Лоргус Джетт',
                       'url' => '/zone/blackfathom-deeps/lorgus-jett',
                    ),
                    array(
                       'label' => 'Старина Серракис',
                       'url' => '/zone/blackfathom-deeps/old-serrakis',
                    ),
                    array(
                       'label' => 'Повелитель сумрака Келрис',
                       'url' => '/zone/blackfathom-deeps/twilight-lord-kelris',
                    ),
                    array(
                       'label' => 'Аку\'май',
                       'url' => '/zone/blackfathom-deeps/akumai',
                    ),
                  ),
                ),
                array(
                   'label' => 'Огненная Пропасть',
                   'url' => '/zone/ragefire-chasm/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Огглфлинт',
                       'url' => '/zone/ragefire-chasm/oggleflint',
                    ),
                    array(
                       'label' => 'Жергош Призыватель Духов',
                       'url' => '/zone/ragefire-chasm/jergosh-the-invoker',
                    ),
                    array(
                       'label' => 'Баззалан',
                       'url' => '/zone/ragefire-chasm/bazzalan',
                    ),
                    array(
                       'label' => 'Тарагаман Ненасытный',
                       'url' => '/zone/ragefire-chasm/taragaman-the-hungerer',
                    ),
                  ),
                ),
                array(
                   'label' => 'Пещеры Стенаний',
                   'url' => '/zone/wailing-caverns/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Леди Анакондра',
                       'url' => '/zone/wailing-caverns/lady-anacondra',
                    ),
                    array(
                       'label' => 'Лорд Кобран',
                       'url' => '/zone/wailing-caverns/lord-cobrahn',
                    ),
                    array(
                       'label' => 'Криг',
                       'url' => '/zone/wailing-caverns/kresh',
                    ),
                    array(
                       'label' => 'Лорд Питонас',
                       'url' => '/zone/wailing-caverns/lord-pythas',
                    ),
                    array(
                       'label' => 'Шкам',
                       'url' => '/zone/wailing-caverns/skum',
                    ),
                    array(
                       'label' => 'Лорд Серпентис',
                       'url' => '/zone/wailing-caverns/lord-serpentis',
                    ),
                    array(
                       'label' => 'Вердан Вечноживущий',
                       'url' => '/zone/wailing-caverns/verdan-the-everliving',
                    ),
                    array(
                       'label' => 'Мутанус Пожиратель',
                       'url' => '/zone/wailing-caverns/mutanus-the-devourer',
                    ),
                  ),
                ),
                array(
                   'label' => 'Пик Черной горы',
                   'url' => '/zone/blackrock-spire/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Вождь Омокк',
                       'url' => '/zone/blackrock-spire/highlord-omokk',
                    ),
                    array(
                       'label' => 'Темная охотница Вос\'гаджин',
                       'url' => '/zone/blackrock-spire/shadow-hunter-voshgajin',
                    ),
                    array(
                       'label' => 'Воевода Вун',
                       'url' => '/zone/blackrock-spire/war-master-voone',
                    ),
                    array(
                       'label' => 'Мать Дымная Паутина',
                       'url' => '/zone/blackrock-spire/mother-smolderweb',
                    ),
                    array(
                       'label' => 'Аррок Смертный Вопль',
                       'url' => '/zone/blackrock-spire/urok-doomhowl',
                    ),
                    array(
                       'label' => 'Интендант Зигрис',
                       'url' => '/zone/blackrock-spire/quartermaster-zigris',
                    ),
                    array(
                       'label' => 'Халикон',
                       'url' => '/zone/blackrock-spire/halycon',
                    ),
                    array(
                       'label' => 'Гизрул Поработитель',
                       'url' => '/zone/blackrock-spire/gizrul-the-slavener',
                    ),
                    array(
                       'label' => 'Властитель Змейталак',
                       'url' => '/zone/blackrock-spire/overlord-wyrmthalak',
                    ),
                    array(
                       'label' => 'Пиростраж Углевзор',
                       'url' => '/zone/blackrock-spire/pyroguard-emberseer',
                    ),
                    array(
                       'label' => 'Солакар Пламя Гнева',
                       'url' => '/zone/blackrock-spire/solakar-flamewreath',
                    ),
                    array(
                       'label' => 'Вождь Ренд Чернорук',
                       'url' => '/zone/blackrock-spire/warchief-rend-blackhand',
                    ),
                    array(
                       'label' => 'Зверь',
                       'url' => '/zone/blackrock-spire/the-beast',
                    ),
                    array(
                       'label' => 'Генерал Драккисат',
                       'url' => '/zone/blackrock-spire/general-drakkisath',
                    ),
                  ),
                ),
                array(
                   'label' => 'Стратхольм',
                   'url' => '/zone/stratholme/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Непрощенный',
                       'url' => '/zone/stratholme/the-unforgiven',
                    ),
                    array(
                       'label' => 'Певчий Форрестен',
                       'url' => '/zone/stratholme/hearthsinger-forresten',
                    ),
                    array(
                       'label' => 'Тимми Беспощадный',
                       'url' => '/zone/stratholme/timmy-the-cruel',
                    ),
                    array(
                       'label' => 'Вилли Разбивающий Надежды',
                       'url' => '/zone/stratholme/willey-hopebreaker',
                    ),
                    array(
                       'label' => 'Командир Малор',
                       'url' => '/zone/stratholme/commander-malor',
                    ),
                    array(
                       'label' => 'Инструктор Галфорд',
                       'url' => '/zone/stratholme/instructor-galford',
                    ),
                    array(
                       'label' => 'Бальназар',
                       'url' => '/zone/stratholme/balnazzar',
                    ),
                    array(
                       'label' => 'Баронесса Анастари',
                       'url' => '/zone/stratholme/baroness-anastari',
                    ),
                    array(
                       'label' => 'Неруб\'энкан',
                       'url' => '/zone/stratholme/nerubenkan',
                    ),
                    array(
                       'label' => 'Малекай Бледный',
                       'url' => '/zone/stratholme/maleki-the-pallid',
                    ),
                    array(
                       'label' => 'Мировой судья Бартилас',
                       'url' => '/zone/stratholme/magistrate-barthilas',
                    ),
                    array(
                       'label' => 'Рамштайн Ненасытный',
                       'url' => '/zone/stratholme/ramstein-the-gorger',
                    ),
                    array(
                       'label' => 'Лорд Аурий Ривендер',
                       'url' => '/zone/stratholme/lord-aurius-rivendare',
                    ),
                  ),
                ),
                array(
                   'label' => 'Тюрьма Штормграда',
                   'url' => '/zone/stormwind-stockade/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Рендольф Молох',
                       'url' => '/zone/stormwind-stockade/randolph-moloch',
                    ),
                    array(
                       'label' => 'Лорд Пережар',
                       'url' => '/zone/stormwind-stockade/lord-overheat',
                    ),
                    array(
                       'label' => 'Дробитель',
                       'url' => '/zone/stormwind-stockade/hogger',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ульдаман',
                   'url' => '/zone/uldaman/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ревелош',
                       'url' => '/zone/uldaman/revelosh',
                    ),
                    array(
                       'label' => 'Потерянные дворфы',
                       'url' => '/zone/uldaman/the-lost-dwarves',
                    ),
                    array(
                       'label' => 'Иронайа',
                       'url' => '/zone/uldaman/ironaya',
                    ),
                    array(
                       'label' => 'Древний каменный хранитель',
                       'url' => '/zone/uldaman/ancient-stone-keeper',
                    ),
                    array(
                       'label' => 'Галганн Огнемолот',
                       'url' => '/zone/uldaman/galgann-firehammer',
                    ),
                    array(
                       'label' => 'Гримлок',
                       'url' => '/zone/uldaman/grimlok',
                    ),
                    array(
                       'label' => 'Аркедас',
                       'url' => '/zone/uldaman/archaedas',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Рейды',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/zone/#expansion=3&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Крепость Барадин',
                   'url' => '/zone/baradin-hold/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Аргалот',
                       'url' => '/zone/baradin-hold/argaloth',
                    ),
                    array(
                       'label' => 'Оку\'тар',
                       'url' => '/zone/baradin-hold/occuthar',
                    ),
                  ),
                ),
                array(
                   'label' => 'Сумеречный бастион',
                   'url' => '/zone/the-bastion-of-twilight/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Халфий Змеерез',
                       'url' => '/zone/the-bastion-of-twilight/halfus-wyrmbreaker',
                    ),
                    array(
                       'label' => 'Тералион и Валиона',
                       'url' => '/zone/the-bastion-of-twilight/theralion-and-valiona',
                    ),
                    array(
                       'label' => 'Совет Перерожденных',
                       'url' => '/zone/the-bastion-of-twilight/ascendant-council',
                    ),
                    array(
                       'label' => 'Чо\'Галл',
                       'url' => '/zone/the-bastion-of-twilight/chogall',
                    ),
                    array(
                       'label' => 'Синестра',
                       'url' => '/zone/the-bastion-of-twilight/sinestra',
                    ),
                  ),
                ),
                array(
                   'label' => 'Твердыня Крыла Тьмы',
                   'url' => '/zone/blackwing-descent/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Защитная система "Омнитрон"',
                       'url' => '/zone/blackwing-descent/omnotron-defense-system',
                    ),
                    array(
                       'label' => 'Магмарь',
                       'url' => '/zone/blackwing-descent/magmaw',
                    ),
                    array(
                       'label' => 'Атрамед',
                       'url' => '/zone/blackwing-descent/atramedes',
                    ),
                    array(
                       'label' => 'Химерон',
                       'url' => '/zone/blackwing-descent/chimaeron',
                    ),
                    array(
                       'label' => 'Малориак',
                       'url' => '/zone/blackwing-descent/maloriak',
                    ),
                    array(
                       'label' => 'Гибель Нефариана',
                       'url' => '/zone/blackwing-descent/nefarians-end',
                    ),
                  ),
                ),
                array(
                   'label' => 'Трон Четырех Ветров',
                   'url' => '/zone/throne-of-the-four-winds/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Конклав Ветра',
                       'url' => '/zone/throne-of-the-four-winds/conclave-of-wind',
                    ),
                    array(
                       'label' => 'Ал\'акир',
                       'url' => '/zone/throne-of-the-four-winds/alakir',
                    ),
                  ),
                ),
                array(
                   'label' => 'Огненные просторы',
                   'url' => '/zone/firelands/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Бет\'тилак',
                       'url' => '/zone/firelands/bethtilac/',
                    ),
                    array(
                       'label' => 'Повелитель Риолит',
                       'url' => '/zone/firelands/lord-rhyolith/',
                    ),
                    array(
                       'label' => 'Шэннокс',
                       'url' => '/zone/firelands/shannox/',
                    ),
                    array(
                       'label' => 'Алисразор',
                       'url' => '/zone/firelands/alysrazor/',
                    ),
                    array(
                       'label' => 'Бейлрок',
                       'url' => '/zone/firelands/baleroc/',
                    ),
                    array(
                       'label' => 'Мажордом Фэндрал Олений Шлем',
                       'url' => '/zone/firelands/majordomo-staghelm',
                    ),
                    array(
                       'label' => 'Рагнарос',
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
                   'label' => 'Испытание крестоносца',
                   'url' => '/zone/trial-of-the-crusader/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Чудовища Нордскола',
                       'url' => '/zone/trial-of-the-crusader/northrend-beasts',
                    ),
                    array(
                       'label' => 'Лорд Джараксус',
                       'url' => '/zone/trial-of-the-crusader/lord-jaraxxus',
                    ),
                    array(
                       'label' => 'Чемпионы фракций',
                       'url' => '/zone/trial-of-the-crusader/faction-champions',
                    ),
                    array(
                       'label' => 'Валь\'киры-близнецы',
                       'url' => '/zone/trial-of-the-crusader/valkyr-twins',
                    ),
                    array(
                       'label' => 'Ануб\'арак',
                       'url' => '/zone/trial-of-the-crusader/anubarak',
                    ),
                  ),
                ),
                array(
                   'label' => 'Логово Ониксии',
                   'url' => '/zone/onyxias-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ониксия',
                       'url' => '/zone/onyxias-lair/onyxia',
                    ),
                  ),
                ),
                array(
                   'label' => 'Наксрамас',
                   'url' => '/zone/naxxramas/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ануб\'Рекан',
                       'url' => '/zone/naxxramas/anubrekhan',
                    ),
                    array(
                       'label' => 'Великая вдова Фарлина',
                       'url' => '/zone/naxxramas/grand-widow-faerlina',
                    ),
                    array(
                       'label' => 'Мексна',
                       'url' => '/zone/naxxramas/maexxna',
                    ),
                    array(
                       'label' => 'Нот Чумной',
                       'url' => '/zone/naxxramas/noth-the-plaguebringer',
                    ),
                    array(
                       'label' => 'Хейган Нечестивый',
                       'url' => '/zone/naxxramas/heigan-the-unclean',
                    ),
                    array(
                       'label' => 'Лотхиб',
                       'url' => '/zone/naxxramas/loatheb',
                    ),
                    array(
                       'label' => 'Инструктор Разувий',
                       'url' => '/zone/naxxramas/instructor-razuvious',
                    ),
                    array(
                       'label' => 'Готик Жнец',
                       'url' => '/zone/naxxramas/gothik-the-harvester',
                    ),
                    array(
                       'label' => 'Четыре всадника',
                       'url' => '/zone/naxxramas/the-four-horsemen',
                    ),
                    array(
                       'label' => 'Лоскутик',
                       'url' => '/zone/naxxramas/patchwerk',
                    ),
                    array(
                       'label' => 'Гроббулус',
                       'url' => '/zone/naxxramas/grobbulus',
                    ),
                    array(
                       'label' => 'Глут',
                       'url' => '/zone/naxxramas/gluth',
                    ),
                    array(
                       'label' => 'Таддиус',
                       'url' => '/zone/naxxramas/thaddius',
                    ),
                    array(
                       'label' => 'Сапфирон',
                       'url' => '/zone/naxxramas/sapphiron',
                    ),
                    array(
                       'label' => 'Кел\'Тузад',
                       'url' => '/zone/naxxramas/kelthuzad',
                    ),
                  ),
                ),
                array(
                   'label' => 'Обсидиановое святилище',
                   'url' => '/zone/the-obsidian-sanctum/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Сартарион',
                       'url' => '/zone/the-obsidian-sanctum/sartharion',
                    ),
                  ),
                ),
                array(
                   'label' => 'Око вечности',
                   'url' => '/zone/the-eye-of-eternity/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Малигос',
                       'url' => '/zone/the-eye-of-eternity/malygos',
                    ),
                  ),
                ),
                array(
                   'label' => 'Рубиновое святилище',
                   'url' => '/zone/the-ruby-sanctum/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Халион',
                       'url' => '/zone/the-ruby-sanctum/halion',
                    ),
                  ),
                ),
                array(
                   'label' => 'Склеп Аркавона',
                   'url' => '/zone/vault-of-archavon/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Аркавон Страж Камня',
                       'url' => '/zone/vault-of-archavon/archavon-the-stone-watcher',
                    ),
                    array(
                       'label' => 'Эмалон Страж Бури',
                       'url' => '/zone/vault-of-archavon/emalon-the-storm-watcher',
                    ),
                    array(
                       'label' => 'Коралон Страж Огня',
                       'url' => '/zone/vault-of-archavon/koralon-the-flame-watcher',
                    ),
                    array(
                       'label' => 'Торавон Страж Льда',
                       'url' => '/zone/vault-of-archavon/toravon-the-ice-watcher',
                    ),
                  ),
                ),
                array(
                   'label' => 'Ульдуар',
                   'url' => '/zone/ulduar/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Огненный Левиафан',
                       'url' => '/zone/ulduar/flame-leviathan',
                    ),
                    array(
                       'label' => 'Повелитель Горнов Игнис',
                       'url' => '/zone/ulduar/ignis-the-furnace-master',
                    ),
                    array(
                       'label' => 'Острокрылая',
                       'url' => '/zone/ulduar/razorscale',
                    ),
                    array(
                       'label' => 'Разрушитель XT-002',
                       'url' => '/zone/ulduar/xt002-deconstructor',
                    ),
                    array(
                       'label' => 'Железное Собрание',
                       'url' => '/zone/ulduar/the-assembly-of-iron',
                    ),
                    array(
                       'label' => 'Кологарн',
                       'url' => '/zone/ulduar/kologarn',
                    ),
                    array(
                       'label' => 'Ауриайя',
                       'url' => '/zone/ulduar/auriaya',
                    ),
                    array(
                       'label' => 'Ходир',
                       'url' => '/zone/ulduar/hodir',
                    ),
                    array(
                       'label' => 'Торим',
                       'url' => '/zone/ulduar/thorim',
                    ),
                    array(
                       'label' => 'Фрейя',
                       'url' => '/zone/ulduar/freya',
                    ),
                    array(
                       'label' => 'Мимирон',
                       'url' => '/zone/ulduar/mimiron',
                    ),
                    array(
                       'label' => 'Генерал Везакс',
                       'url' => '/zone/ulduar/general-vezax',
                    ),
                    array(
                       'label' => 'Йогг-Сарон',
                       'url' => '/zone/ulduar/yoggsaron',
                    ),
                    array(
                       'label' => 'Алгалон Наблюдатель',
                       'url' => '/zone/ulduar/algalon-the-observer',
                    ),
                  ),
                ),
                array(
                   'label' => 'Цитадель Ледяной Короны',
                   'url' => '/zone/icecrown-citadel/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Лорд Ребрад',
                       'url' => '/zone/icecrown-citadel/lord-marrowgar',
                    ),
                    array(
                       'label' => 'Леди Смертный Шепот',
                       'url' => '/zone/icecrown-citadel/lady-deathwhisper',
                    ),
                    array(
                       'label' => 'Битва на кораблях в Ледяной Короне',
                       'url' => '/zone/icecrown-citadel/icecrown-gunship-battle',
                    ),
                    array(
                       'label' => 'Саурфанг Смертоносный',
                       'url' => '/zone/icecrown-citadel/deathbringer-saurfang',
                    ),
                    array(
                       'label' => 'Гниломорд',
                       'url' => '/zone/icecrown-citadel/rotface',
                    ),
                    array(
                       'label' => 'Тухлопуз',
                       'url' => '/zone/icecrown-citadel/festergut',
                    ),
                    array(
                       'label' => 'Профессор Мерзоцид',
                       'url' => '/zone/icecrown-citadel/professor-putricide',
                    ),
                    array(
                       'label' => 'Кровавый Совет',
                       'url' => '/zone/icecrown-citadel/blood-council',
                    ),
                    array(
                       'label' => 'Кровавая королева Лана\'тель',
                       'url' => '/zone/icecrown-citadel/bloodqueen-lanathel',
                    ),
                    array(
                       'label' => 'Валитрия Сноходица',
                       'url' => '/zone/icecrown-citadel/valithria-dreamwalker',
                    ),
                    array(
                       'label' => 'Синдрагоса',
                       'url' => '/zone/icecrown-citadel/sindragosa',
                    ),
                    array(
                       'label' => 'Король-лич',
                       'url' => '/zone/icecrown-citadel/the-lich-king',
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
                   'label' => 'Битва за гору Хиджал',
                   'url' => '/zone/the-battle-for-mount-hyjal/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Лютый Хлад',
                       'url' => '/zone/the-battle-for-mount-hyjal/rage-winterchill',
                    ),
                    array(
                       'label' => 'Анетерон',
                       'url' => '/zone/the-battle-for-mount-hyjal/anetheron',
                    ),
                    array(
                       'label' => 'Каз\'рогал',
                       'url' => '/zone/the-battle-for-mount-hyjal/kazrogal',
                    ),
                    array(
                       'label' => 'Азгалор',
                       'url' => '/zone/the-battle-for-mount-hyjal/azgalor',
                    ),
                    array(
                       'label' => 'Архимонд',
                       'url' => '/zone/the-battle-for-mount-hyjal/archimonde',
                    ),
                  ),
                ),
                array(
                   'label' => 'Змеиное святилище',
                   'url' => '/zone/serpentshrine-cavern/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Гидросс Нестабильный',
                       'url' => '/zone/serpentshrine-cavern/hydross-the-unstable',
                    ),
                    array(
                       'label' => 'Скрытень из глубин',
                       'url' => '/zone/serpentshrine-cavern/the-lurker-below',
                    ),
                    array(
                       'label' => 'Леотерас Слепец',
                       'url' => '/zone/serpentshrine-cavern/leotheras-the-blind',
                    ),
                    array(
                       'label' => 'Повелитель глубин Каратресс',
                       'url' => '/zone/serpentshrine-cavern/fathomlord-karathress',
                    ),
                    array(
                       'label' => 'Морогрим Волноступ',
                       'url' => '/zone/serpentshrine-cavern/morogrim-tidewalker',
                    ),
                    array(
                       'label' => 'Леди Вайш',
                       'url' => '/zone/serpentshrine-cavern/lady-vashj',
                    ),
                  ),
                ),
                array(
                   'label' => 'Каражан',
                   'url' => '/zone/karazhan/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ловчий Аттумен',
                       'url' => '/zone/karazhan/attumen-the-huntsman',
                    ),
                    array(
                       'label' => 'Мороуз',
                       'url' => '/zone/karazhan/moroes',
                    ),
                    array(
                       'label' => 'Благочестивая дева',
                       'url' => '/zone/karazhan/maiden-of-virtue',
                    ),
                    array(
                       'label' => 'Опера',
                       'url' => '/zone/karazhan/opera-event',
                    ),
                    array(
                       'label' => 'Смотритель',
                       'url' => '/zone/karazhan/the-curator',
                    ),
                    array(
                       'label' => 'Шахматы',
                       'url' => '/zone/karazhan/chess-event',
                    ),
                    array(
                       'label' => 'Терестиан Больное Копыто',
                       'url' => '/zone/karazhan/terestian-illhoof',
                    ),
                    array(
                       'label' => 'Тень Арана',
                       'url' => '/zone/karazhan/shade-of-aran',
                    ),
                    array(
                       'label' => 'Гнев Пустоты',
                       'url' => '/zone/karazhan/netherspite',
                    ),
                    array(
                       'label' => 'Принц Малчезар',
                       'url' => '/zone/karazhan/prince-malchezaar',
                    ),
                    array(
                       'label' => 'Ночная Погибель',
                       'url' => '/zone/karazhan/nightbane',
                    ),
                  ),
                ),
                array(
                   'label' => 'Крепость Бурь',
                   'url' => '/zone/tempest-keep/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Ал\'ар',
                       'url' => '/zone/tempest-keep/alar',
                    ),
                    array(
                       'label' => 'Страж Бездны',
                       'url' => '/zone/tempest-keep/void-reaver',
                    ),
                    array(
                       'label' => 'Верховный звездочет Солариан',
                       'url' => '/zone/tempest-keep/high-astromancer-solarian',
                    ),
                    array(
                       'label' => 'Кель\'тас Солнечный Скиталец',
                       'url' => '/zone/tempest-keep/kaelthas-sunstrider',
                    ),
                  ),
                ),
                array(
                   'label' => 'Логово Груула',
                   'url' => '/zone/gruuls-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Король Молгар',
                       'url' => '/zone/gruuls-lair/high-king-maulgar',
                    ),
                    array(
                       'label' => 'Груул Драконобой',
                       'url' => '/zone/gruuls-lair/gruul-the-dragonkiller',
                    ),
                  ),
                ),
                array(
                   'label' => 'Логово Магтеридона',
                   'url' => '/zone/magtheridons-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Магтеридон',
                       'url' => '/zone/magtheridons-lair/magtheridon',
                    ),
                  ),
                ),
                array(
                   'label' => 'Солнечный Колодец',
                   'url' => '/zone/the-sunwell/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Калесгос',
                       'url' => '/zone/the-sunwell/kalecgos',
                    ),
                    array(
                       'label' => 'Бруталл',
                       'url' => '/zone/the-sunwell/brutallus',
                    ),
                    array(
                       'label' => 'Пророк Скверны',
                       'url' => '/zone/the-sunwell/felmyst',
                    ),
                    array(
                       'label' => 'Эредарские близнецы',
                       'url' => '/zone/the-sunwell/eredar-twins',
                    ),
                    array(
                       'label' => 'М\'ууру',
                       'url' => '/zone/the-sunwell/muru',
                    ),
                    array(
                       'label' => 'Кил\'джеден',
                       'url' => '/zone/the-sunwell/kiljaeden',
                    ),
                  ),
                ),
                array(
                   'label' => 'Черный храм',
                   'url' => '/zone/black-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Верховный полководец Надж\'ентус',
                       'url' => '/zone/black-temple/high-warlord-najentus',
                    ),
                    array(
                       'label' => 'Супремус',
                       'url' => '/zone/black-temple/supremus',
                    ),
                    array(
                       'label' => 'Тень Акамы',
                       'url' => '/zone/black-temple/shade-of-akama',
                    ),
                    array(
                       'label' => 'Терон Кровожад',
                       'url' => '/zone/black-temple/teron-gorefiend',
                    ),
                    array(
                       'label' => 'Гуртогг Кипящая Кровь',
                       'url' => '/zone/black-temple/gurtogg-bloodboil',
                    ),
                    array(
                       'label' => 'Реликварий Душ',
                       'url' => '/zone/black-temple/reliquary-of-souls',
                    ),
                    array(
                       'label' => 'Матушка Шахраз',
                       'url' => '/zone/black-temple/mother-shahraz',
                    ),
                    array(
                       'label' => 'Совет Иллидари',
                       'url' => '/zone/black-temple/the-illidari-council',
                    ),
                    array(
                       'label' => 'Иллидан Ярость Бури',
                       'url' => '/zone/black-temple/illidan-stormrage',
                    ),
                  ),
                ),
              ),
            ),
            array(
               'label' => 'Классика',
               'url' => '/zone/#expansion=0&type=raids',
               'children' => 
              array (
                array(
                   'label' => 'Логово Крыла Тьмы',
                   'url' => '/zone/blackwing-lair/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Бритвосмерт Неукротимый',
                       'url' => '/zone/blackwing-lair/razorgore-the-untamed',
                    ),
                    array(
                       'label' => 'Валестраз Порочный',
                       'url' => '/zone/blackwing-lair/vaelastrasz-the-corrupt',
                    ),
                    array(
                       'label' => 'Предводитель драконов Разящий Бич',
                       'url' => '/zone/blackwing-lair/broodlord-lashlayer',
                    ),
                    array(
                       'label' => 'Огнечрев',
                       'url' => '/zone/blackwing-lair/firemaw',
                    ),
                    array(
                       'label' => 'Черноскал',
                       'url' => '/zone/blackwing-lair/ebonroc',
                    ),
                    array(
                       'label' => 'Пламегор',
                       'url' => '/zone/blackwing-lair/flamegor',
                    ),
                    array(
                       'label' => 'Хромаггус',
                       'url' => '/zone/blackwing-lair/chromaggus',
                    ),
                    array(
                       'label' => 'Нефариан',
                       'url' => '/zone/blackwing-lair/nefarian',
                    ),
                  ),
                ),
                array(
                   'label' => 'Огненные Недра',
                   'url' => '/zone/molten-core/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Люцифрон',
                       'url' => '/zone/molten-core/lucifron',
                    ),
                    array(
                       'label' => 'Магмадар',
                       'url' => '/zone/molten-core/magmadar',
                    ),
                    array(
                       'label' => 'Гееннас',
                       'url' => '/zone/molten-core/gehennas',
                    ),
                    array(
                       'label' => 'Гарр',
                       'url' => '/zone/molten-core/garr',
                    ),
                    array(
                       'label' => 'Шаззрах',
                       'url' => '/zone/molten-core/shazzrah',
                    ),
                    array(
                       'label' => 'Барон Геддон',
                       'url' => '/zone/molten-core/baron-geddon',
                    ),
                    array(
                       'label' => 'Предвестник Сульфурон',
                       'url' => '/zone/molten-core/sulfuron-harbinger',
                    ),
                    array(
                       'label' => 'Големагг Испепелитель',
                       'url' => '/zone/molten-core/golemagg-the-incinerator',
                    ),
                    array(
                       'label' => 'Мажордом Экзекутус',
                       'url' => '/zone/molten-core/majordomo-executus',
                    ),
                    array(
                       'label' => 'Рагнарос',
                       'url' => '/zone/molten-core/ragnaros',
                    ),
                  ),
                ),
                array(
                   'label' => 'Руины Ан\'Киража',
                   'url' => '/zone/ruins-of-ahnqiraj/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Куриннакс',
                       'url' => '/zone/ruins-of-ahnqiraj/kurinnaxx',
                    ),
                    array(
                       'label' => 'Генерал Раджакс',
                       'url' => '/zone/ruins-of-ahnqiraj/general-rajaxx',
                    ),
                    array(
                       'label' => 'Моам',
                       'url' => '/zone/ruins-of-ahnqiraj/moam',
                    ),
                    array(
                       'label' => 'Буру Ненасытный',
                       'url' => '/zone/ruins-of-ahnqiraj/buru-the-gorger',
                    ),
                    array(
                       'label' => 'Аямисса Охотница',
                       'url' => '/zone/ruins-of-ahnqiraj/ayamiss-the-hunter',
                    ),
                    array(
                       'label' => 'Оссириан Неуязвимый',
                       'url' => '/zone/ruins-of-ahnqiraj/ossirian-the-unscarred',
                    ),
                  ),
                ),
                array(
                   'label' => 'Храм Ан\'Киража',
                   'url' => '/zone/ahnqiraj-temple/',
                   'children' => 
                  array (
                    array(
                       'label' => 'Пророк Скерам',
                       'url' => '/zone/ahnqiraj-temple/the-prophet-skeram',
                    ),
                    array(
                       'label' => 'Царственность силитида',
                       'url' => '/zone/ahnqiraj-temple/silithid-royalty',
                    ),
                    array(
                       'label' => 'Боевой страж Сартура',
                       'url' => '/zone/ahnqiraj-temple/battleguard-sartura',
                    ),
                    array(
                       'label' => 'Фанкрисс Непреклонный',
                       'url' => '/zone/ahnqiraj-temple/fankriss-the-unyielding',
                    ),
                    array(
                       'label' => 'Нечистотон',
                       'url' => '/zone/ahnqiraj-temple/viscidus',
                    ),
                    array(
                       'label' => 'Принцесса Хухуран',
                       'url' => '/zone/ahnqiraj-temple/princess-huhuran',
                    ),
                    array(
                       'label' => 'Императоры-близнецы',
                       'url' => '/zone/ahnqiraj-temple/twin-emperors',
                    ),
                    array(
                       'label' => 'Оуро',
                       'url' => '/zone/ahnqiraj-temple/ouro',
                    ),
                    array(
                       'label' => 'К\'Тун',
                       'url' => '/zone/ahnqiraj-temple/cthun',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Фракции',
           'url' => '/faction/',
           'children' => 
          array (
            array(
               'label' => 'Cataclysm',
               'url' => '/faction/#expansion=3',
               'children' => 
              array (
                array(
                   'label' => 'Батальон Адского Крика',
                   'url' => '/faction/hellscreams-reach',
                ),
                array(
                   'label' => 'Защитники Тол Барада',
                   'url' => '/faction/baradins-wardens',
                ),
                array(
                   'label' => 'Клан Громового Молота',
                   'url' => '/faction/wildhammer-clan',
                ),
                array(
                   'label' => 'Клан Драконьей Пасти',
                   'url' => '/faction/dragonmaw-clan',
                ),
                array(
                   'label' => 'Рамкахены',
                   'url' => '/faction/ramkahen',
                ),
                array(
                   'label' => 'Служители Земли',
                   'url' => '/faction/the-earthen-ring',
                ),
                array(
                   'label' => 'Стражи Хиджала',
                   'url' => '/faction/guardians-of-hyjal',
                ),
                array(
                   'label' => 'Теразан',
                   'url' => '/faction/therazane',
                ),
              ),
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/faction/#expansion=2',
               'children' => 
              array (
                array(
                   'label' => 'Драконий союз',
                   'url' => '/faction/the-wyrmrest-accord',
                ),
                array(
                   'label' => 'Калу\'ак',
                   'url' => '/faction/the-kaluak',
                ),
                array(
                   'label' => 'Кирин-Тор',
                   'url' => '/faction/kirin-tor',
                ),
                array(
                   'label' => 'Пепельный союз',
                   'url' => '/faction/the-ashen-verdict',
                ),
                array(
                   'label' => 'Рыцари Черного Клинка',
                   'url' => '/faction/knights-of-the-ebon-blade',
                ),
                array(
                   'label' => 'Серебряный Авангард',
                   'url' => '/faction/argent-crusade',
                ),
                array(
                   'label' => 'Сыны Ходира',
                   'url' => '/faction/the-sons-of-hodir',
                ),
                array(
                   'label' => 'Авангард Альянса',
                ),
                array(
                   'label' => 'Зиморожденные',
                   'url' => '/faction/the-frostborn',
                ),
                array(
                   'label' => 'Лига исследователей',
                   'url' => '/faction/explorers-league',
                ),
                array(
                   'label' => 'Серебряный союз',
                   'url' => '/faction/the-silver-covenant',
                ),
                array(
                   'label' => 'Экспедиция Отважных',
                   'url' => '/faction/valiance-expedition',
                ),
                array(
                   'label' => 'Низина Шолазар',
                ),
                array(
                   'label' => 'Оракулы',
                   'url' => '/faction/the-oracles',
                ),
                array(
                   'label' => 'Племя Бешеного Сердца',
                   'url' => '/faction/frenzyheart-tribe',
                ),
                array(
                   'label' => 'Экспедиция Орды',
                ),
                array(
                   'label' => 'Армия Песни Войны',
                   'url' => '/faction/warsong-offensive',
                ),
                array(
                   'label' => 'Карающая Длань',
                   'url' => '/faction/the-hand-of-vengeance',
                ),
                array(
                   'label' => 'Похитители Солнца',
                   'url' => '/faction/the-sunreavers',
                ),
                array(
                   'label' => 'Таунка',
                   'url' => '/faction/the-taunka',
                ),
              ),
            ),
            array(
               'label' => 'The Burning Crusade',
               'url' => '/faction/#expansion=1',
               'children' => 
              array (
                array(
                   'label' => 'Аметистовое Око',
                   'url' => '/faction/the-violet-eye',
                ),
                array(
                   'label' => 'Кенарийская экспедиция',
                   'url' => '/faction/cenarion-expedition',
                ),
                array(
                   'label' => 'Консорциум',
                   'url' => '/faction/the-consortium',
                ),
                array(
                   'label' => 'Крылья Пустоты',
                   'url' => '/faction/netherwing',
                ),
                array(
                   'label' => 'Куренай',
                   'url' => '/faction/kurenai',
                ),
                array(
                   'label' => 'Маг\'хары',
                   'url' => '/faction/the-maghar',
                ),
                array(
                   'label' => 'Огри\'ла',
                   'url' => '/faction/ogrila',
                ),
                array(
                   'label' => 'Оплот Чести',
                   'url' => '/faction/honor-hold',
                ),
                array(
                   'label' => 'Пеплоусты-служители',
                   'url' => '/faction/ashtongue-deathsworn',
                ),
                array(
                   'label' => 'Песчаная Чешуя',
                   'url' => '/faction/the-scale-of-the-sands',
                ),
                array(
                   'label' => 'Спореггар',
                   'url' => '/faction/sporeggar',
                ),
                array(
                   'label' => 'Траллмар',
                   'url' => '/faction/thrallmar',
                ),
                array(
                   'label' => 'Транквиллион',
                   'url' => '/faction/tranquillien',
                ),
                array(
                   'label' => 'Хранители Времени',
                   'url' => '/faction/keepers-of-time',
                ),
                array(
                   'label' => 'Город Шаттрат',
                ),
                array(
                   'label' => 'Алдоры',
                   'url' => '/faction/the-aldor',
                ),
                array(
                   'label' => 'Армия Расколотого Солнца',
                   'url' => '/faction/shattered-sun-offensive',
                ),
                array(
                   'label' => 'Нижний Город',
                   'url' => '/faction/lower-city',
                ),
                array(
                   'label' => 'Провидцы',
                   'url' => '/faction/the-scryers',
                ),
                array(
                   'label' => 'Стражи Небес Ша\'тар',
                   'url' => '/faction/shatari-skyguard',
                ),
                array(
                   'label' => 'Ша\'тар',
                   'url' => '/faction/the-shatar',
                ),
              ),
            ),
            array(
               'label' => 'World of Warcraft',
               'url' => '/faction/#expansion=0',
               'children' => 
              array (
                array(
                   'label' => 'Братство Тория',
                   'url' => '/faction/thorium-brotherhood',
                ),
                array(
                   'label' => 'Гидраксианские Повелители Вод',
                   'url' => '/faction/hydraxian-waterlords',
                ),
                array(
                   'label' => 'Древобрюхи',
                   'url' => '/faction/timbermaw-hold',
                ),
                array(
                   'label' => 'Кентавры из племени Гелкис',
                   'url' => '/faction/gelkis-clan-centaur',
                ),
                array(
                   'label' => 'Кентавры из племени Маграм',
                   'url' => '/faction/magram-clan-centaur',
                ),
                array(
                   'label' => 'Круг Кенария',
                   'url' => '/faction/cenarion-circle',
                ),
                array(
                   'label' => 'Пираты Кровавого Паруса',
                   'url' => '/faction/bloodsail-buccaneers',
                ),
                array(
                   'label' => 'Племя Зандалар',
                   'url' => '/faction/zandalar-tribe',
                ),
                array(
                   'label' => 'Род Ноздорму',
                   'url' => '/faction/brood-of-nozdormu',
                ),
                array(
                   'label' => 'Серебряный Рассвет',
                   'url' => '/faction/argent-dawn',
                ),
                array(
                   'label' => 'Синдикат',
                   'url' => '/faction/syndicate',
                ),
                array(
                   'label' => 'Укротители ледопардов',
                   'url' => '/faction/wintersaber-trainers',
                ),
                array(
                   'label' => 'Черный Ворон',
                   'url' => '/faction/ravenholdt',
                ),
                array(
                   'label' => 'Шен\'дралар',
                   'url' => '/faction/shendralar',
                ),
                array(
                   'label' => 'Ярмарка Новолуния',
                   'url' => '/faction/darkmoon-faire',
                ),
                array(
                   'label' => 'Альянс',
                ),
                array(
                   'label' => 'Гилнеас',
                   'url' => '/faction/gilneas',
                ),
                array(
                   'label' => 'Гномреган',
                   'url' => '/faction/gnomeregan',
                ),
                array(
                   'label' => 'Дарнас',
                   'url' => '/faction/darnassus',
                ),
                array(
                   'label' => 'Стальгорн',
                   'url' => '/faction/ironforge',
                ),
                array(
                   'label' => 'Штормград',
                   'url' => '/faction/stormwind',
                ),
                array(
                   'label' => 'Экзодар',
                   'url' => '/faction/exodar',
                ),
                array(
                   'label' => 'Картель Хитрой Шестеренки',
                ),
                array(
                   'label' => 'Кабестан',
                   'url' => '/faction/ratchet',
                ),
                array(
                   'label' => 'Круговзор',
                   'url' => '/faction/everlook',
                ),
                array(
                   'label' => 'Пиратская Бухта',
                   'url' => '/faction/booty-bay',
                ),
                array(
                   'label' => 'Прибамбасск',
                   'url' => '/faction/gadgetzan',
                ),
                array(
                   'label' => 'Орда',
                ),
                array(
                   'label' => 'Громовой Утес',
                   'url' => '/faction/thunder-bluff',
                ),
                array(
                   'label' => 'Картель Трюмных Вод',
                   'url' => '/faction/bilgewater-cartel',
                ),
                array(
                   'label' => 'Луносвет',
                   'url' => '/faction/silvermoon-city',
                ),
                array(
                   'label' => 'Оргриммар',
                   'url' => '/faction/orgrimmar',
                ),
                array(
                   'label' => 'Подгород',
                   'url' => '/faction/undercity',
                ),
                array(
                   'label' => 'Тролли Черного Копья',
                   'url' => '/faction/darkspear-trolls',
                ),
                array(
                   'label' => 'Силы Альянса',
                ),
                array(
                   'label' => 'Лига Аратора',
                   'url' => '/faction/the-league-of-arathor',
                ),
                array(
                   'label' => 'Среброкрылые Часовые',
                   'url' => '/faction/silverwing-sentinels',
                ),
                array(
                   'label' => 'Стража Грозовой Вершины',
                   'url' => '/faction/stormpike-guard',
                ),
                array(
                   'label' => 'Силы Орды',
                ),
                array(
                   'label' => 'Всадники Песни Войны',
                   'url' => '/faction/warsong-outriders',
                ),
                array(
                   'label' => 'Клан Северного Волка',
                   'url' => '/faction/frostwolf-clan',
                ),
                array(
                   'label' => 'Осквернители',
                   'url' => '/faction/the-defilers',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Предметы',
           'url' => '/item/',
           'children' => 
          array (
            array(
               'label' => 'Оружие',
               'url' => '/item/?classId=2',
               'children' => 
              array (
                array(
                   'label' => 'Одноручные топоры',
                   'url' => '/item/?classId=2&subClassId=0',
                ),
                array(
                   'label' => 'Двуручные топоры',
                   'url' => '/item/?classId=2&subClassId=1',
                ),
                array(
                   'label' => 'Луки',
                   'url' => '/item/?classId=2&subClassId=2',
                ),
                array(
                   'label' => 'Огнестрельное',
                   'url' => '/item/?classId=2&subClassId=3',
                ),
                array(
                   'label' => 'Одноручное дробящее',
                   'url' => '/item/?classId=2&subClassId=4',
                ),
                array(
                   'label' => 'Двуручное дробящее',
                   'url' => '/item/?classId=2&subClassId=5',
                ),
                array(
                   'label' => 'Древковое',
                   'url' => '/item/?classId=2&subClassId=6',
                ),
                array(
                   'label' => 'Одноручные мечи',
                   'url' => '/item/?classId=2&subClassId=7',
                ),
                array(
                   'label' => 'Двуручные мечи',
                   'url' => '/item/?classId=2&subClassId=8',
                ),
                array(
                   'label' => 'Посохи',
                   'url' => '/item/?classId=2&subClassId=10',
                ),
                array(
                   'label' => 'Кистевое',
                   'url' => '/item/?classId=2&subClassId=13',
                ),
                array(
                   'label' => 'Разное',
                   'url' => '/item/?classId=2&subClassId=14',
                ),
                array(
                   'label' => 'Кинжалы',
                   'url' => '/item/?classId=2&subClassId=15',
                ),
                array(
                   'label' => 'Метательное',
                   'url' => '/item/?classId=2&subClassId=16',
                ),
                array(
                   'label' => 'Арбалеты',
                   'url' => '/item/?classId=2&subClassId=18',
                ),
                array(
                   'label' => 'Жезлы',
                   'url' => '/item/?classId=2&subClassId=19',
                ),
                array(
                   'label' => 'Удочки',
                   'url' => '/item/?classId=2&subClassId=20',
                ),
              ),
            ),
            array(
               'label' => 'Доспехи',
               'url' => '/item/?classId=4',
               'children' => 
              array (
                array(
                   'label' => 'Разное',
                   'url' => '/item/?classId=4&subClassId=0',
                   'children' => 
                  array (
                    array(
                       'label' => 'Голова',
                       'url' => '/item/?classId=4&subClassId=0&invType=1',
                    ),
                    array(
                       'label' => 'Шея',
                       'url' => '/item/?classId=4&subClassId=0&invType=2',
                    ),
                    array(
                       'label' => 'Рубашка',
                       'url' => '/item/?classId=4&subClassId=0&invType=4',
                    ),
                    array(
                       'label' => 'Палец',
                       'url' => '/item/?classId=4&subClassId=0&invType=11',
                    ),
                    array(
                       'label' => 'Аксессуар',
                       'url' => '/item/?classId=4&subClassId=0&invType=12',
                    ),
                    array(
                       'label' => 'Левая рука',
                       'url' => '/item/?classId=4&subClassId=0&invType=23',
                    ),
                  ),
                ),
                array(
                   'label' => 'Тканевые',
                   'url' => '/item/?classId=4&subClassId=1',
                   'children' => 
                  array (
                    array(
                       'label' => 'Голова',
                       'url' => '/item/?classId=4&subClassId=1&invType=1',
                    ),
                    array(
                       'label' => 'Плечо',
                       'url' => '/item/?classId=4&subClassId=1&invType=3',
                    ),
                    array(
                       'label' => 'Грудь',
                       'url' => '/item/?classId=4&subClassId=1&invType=5',
                    ),
                    array(
                       'label' => 'Пояс',
                       'url' => '/item/?classId=4&subClassId=1&invType=6',
                    ),
                    array(
                       'label' => 'Ноги',
                       'url' => '/item/?classId=4&subClassId=1&invType=7',
                    ),
                    array(
                       'label' => 'Ступни',
                       'url' => '/item/?classId=4&subClassId=1&invType=8',
                    ),
                    array(
                       'label' => 'Запястья',
                       'url' => '/item/?classId=4&subClassId=1&invType=9',
                    ),
                    array(
                       'label' => 'Кисти рук',
                       'url' => '/item/?classId=4&subClassId=1&invType=10',
                    ),
                    array(
                       'label' => 'Спина',
                       'url' => '/item/?classId=4&subClassId=1&invType=16',
                    ),
                  ),
                ),
                array(
                   'label' => 'Кожаные',
                   'url' => '/item/?classId=4&subClassId=2',
                   'children' => 
                  array (
                    array(
                       'label' => 'Голова',
                       'url' => '/item/?classId=4&subClassId=2&invType=1',
                    ),
                    array(
                       'label' => 'Плечо',
                       'url' => '/item/?classId=4&subClassId=2&invType=3',
                    ),
                    array(
                       'label' => 'Грудь',
                       'url' => '/item/?classId=4&subClassId=2&invType=5',
                    ),
                    array(
                       'label' => 'Пояс',
                       'url' => '/item/?classId=4&subClassId=2&invType=6',
                    ),
                    array(
                       'label' => 'Ноги',
                       'url' => '/item/?classId=4&subClassId=2&invType=7',
                    ),
                    array(
                       'label' => 'Ступни',
                       'url' => '/item/?classId=4&subClassId=2&invType=8',
                    ),
                    array(
                       'label' => 'Запястья',
                       'url' => '/item/?classId=4&subClassId=2&invType=9',
                    ),
                    array(
                       'label' => 'Кисти рук',
                       'url' => '/item/?classId=4&subClassId=2&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Кольчужные',
                   'url' => '/item/?classId=4&subClassId=3',
                   'children' => 
                  array (
                    array(
                       'label' => 'Голова',
                       'url' => '/item/?classId=4&subClassId=3&invType=1',
                    ),
                    array(
                       'label' => 'Плечо',
                       'url' => '/item/?classId=4&subClassId=3&invType=3',
                    ),
                    array(
                       'label' => 'Грудь',
                       'url' => '/item/?classId=4&subClassId=3&invType=5',
                    ),
                    array(
                       'label' => 'Пояс',
                       'url' => '/item/?classId=4&subClassId=3&invType=6',
                    ),
                    array(
                       'label' => 'Ноги',
                       'url' => '/item/?classId=4&subClassId=3&invType=7',
                    ),
                    array(
                       'label' => 'Ступни',
                       'url' => '/item/?classId=4&subClassId=3&invType=8',
                    ),
                    array(
                       'label' => 'Запястья',
                       'url' => '/item/?classId=4&subClassId=3&invType=9',
                    ),
                    array(
                       'label' => 'Кисти рук',
                       'url' => '/item/?classId=4&subClassId=3&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Латные',
                   'url' => '/item/?classId=4&subClassId=4',
                   'children' => 
                  array (
                    array(
                       'label' => 'Голова',
                       'url' => '/item/?classId=4&subClassId=4&invType=1',
                    ),
                    array(
                       'label' => 'Плечо',
                       'url' => '/item/?classId=4&subClassId=4&invType=3',
                    ),
                    array(
                       'label' => 'Грудь',
                       'url' => '/item/?classId=4&subClassId=4&invType=5',
                    ),
                    array(
                       'label' => 'Пояс',
                       'url' => '/item/?classId=4&subClassId=4&invType=6',
                    ),
                    array(
                       'label' => 'Ноги',
                       'url' => '/item/?classId=4&subClassId=4&invType=7',
                    ),
                    array(
                       'label' => 'Ступни',
                       'url' => '/item/?classId=4&subClassId=4&invType=8',
                    ),
                    array(
                       'label' => 'Запястья',
                       'url' => '/item/?classId=4&subClassId=4&invType=9',
                    ),
                    array(
                       'label' => 'Кисти рук',
                       'url' => '/item/?classId=4&subClassId=4&invType=10',
                    ),
                  ),
                ),
                array(
                   'label' => 'Щиты',
                   'url' => '/item/?classId=4&subClassId=6',
                ),
                array(
                   'label' => 'Манускрипты',
                   'url' => '/item/?classId=4&subClassId=7',
                ),
                array(
                   'label' => 'Идолы',
                   'url' => '/item/?classId=4&subClassId=8',
                ),
                array(
                   'label' => 'Тотемы',
                   'url' => '/item/?classId=4&subClassId=9',
                ),
                array(
                   'label' => 'Печати',
                   'url' => '/item/?classId=4&subClassId=10',
                ),
                array(
                   'label' => 'Реликвия',
                   'url' => '/item/?classId=4&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Сумки',
               'url' => '/item/?classId=1',
               'children' => 
              array (
                array(
                   'label' => 'Сумка',
                   'url' => '/item/?classId=1&subClassId=0',
                ),
                array(
                   'label' => 'Сумка душ',
                   'url' => '/item/?classId=1&subClassId=1',
                ),
                array(
                   'label' => 'Сумка травника',
                   'url' => '/item/?classId=1&subClassId=2',
                ),
                array(
                   'label' => 'Сумка зачаровывателя',
                   'url' => '/item/?classId=1&subClassId=3',
                ),
                array(
                   'label' => 'Сумка инженера',
                   'url' => '/item/?classId=1&subClassId=4',
                ),
                array(
                   'label' => 'Сумка ювелира',
                   'url' => '/item/?classId=1&subClassId=5',
                ),
                array(
                   'label' => 'Сумка шахтера',
                   'url' => '/item/?classId=1&subClassId=6',
                ),
                array(
                   'label' => 'Сумка кожевника',
                   'url' => '/item/?classId=1&subClassId=7',
                ),
                array(
                   'label' => 'Сумка начертателя',
                   'url' => '/item/?classId=1&subClassId=8',
                ),
                array(
                   'label' => 'Ящик для рыболовных снастей',
                   'url' => '/item/?classId=1&subClassId=9',
                ),
              ),
            ),
            array(
               'label' => 'Расходуемые',
               'url' => '/item/?classId=0',
               'children' => 
              array (
                array(
                   'label' => 'Зелья',
                   'url' => '/item/?classId=0&subClassId=1',
                ),
                array(
                   'label' => 'Эликсиры',
                   'url' => '/item/?classId=0&subClassId=2',
                ),
                array(
                   'label' => 'Настойки',
                   'url' => '/item/?classId=0&subClassId=3',
                ),
                array(
                   'label' => 'Свитки',
                   'url' => '/item/?classId=0&subClassId=4',
                ),
                array(
                   'label' => 'Еда и напитки',
                   'url' => '/item/?classId=0&subClassId=5',
                ),
                array(
                   'label' => 'Улучшения',
                   'url' => '/item/?classId=0&subClassId=6',
                ),
                array(
                   'label' => 'Бинты',
                   'url' => '/item/?classId=0&subClassId=7',
                ),
                array(
                   'label' => 'Другое',
                   'url' => '/item/?classId=0&subClassId=8',
                ),
              ),
            ),
            array(
               'label' => 'Символы',
               'url' => '/item/?classId=16',
               'children' => 
              array (
                array(
                   'label' => 'Воин',
                   'url' => '/item/?classId=16&subClassId=1',
                ),
                array(
                   'label' => 'Паладин',
                   'url' => '/item/?classId=16&subClassId=2',
                ),
                array(
                   'label' => 'Охотник',
                   'url' => '/item/?classId=16&subClassId=3',
                ),
                array(
                   'label' => 'Разбойник',
                   'url' => '/item/?classId=16&subClassId=4',
                ),
                array(
                   'label' => 'Жрец',
                   'url' => '/item/?classId=16&subClassId=5',
                ),
                array(
                   'label' => 'Рыцарь смерти',
                   'url' => '/item/?classId=16&subClassId=6',
                ),
                array(
                   'label' => 'Шаман',
                   'url' => '/item/?classId=16&subClassId=7',
                ),
                array(
                   'label' => 'Маг',
                   'url' => '/item/?classId=16&subClassId=8',
                ),
                array(
                   'label' => 'Чернокнижник',
                   'url' => '/item/?classId=16&subClassId=9',
                ),
                array(
                   'label' => 'Друид',
                   'url' => '/item/?classId=16&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Хозяйственные товары',
               'url' => '/item/?classId=7',
               'children' => 
              array (
                array(
                   'label' => 'Части',
                   'url' => '/item/?classId=7&subClassId=1',
                ),
                array(
                   'label' => 'Взрывчатка',
                   'url' => '/item/?classId=7&subClassId=2',
                ),
                array(
                   'label' => 'Устройства',
                   'url' => '/item/?classId=7&subClassId=3',
                ),
                array(
                   'label' => 'Ювелирное дело',
                   'url' => '/item/?classId=7&subClassId=4',
                ),
                array(
                   'label' => 'Ткань',
                   'url' => '/item/?classId=7&subClassId=5',
                ),
                array(
                   'label' => 'Кожа',
                   'url' => '/item/?classId=7&subClassId=6',
                ),
                array(
                   'label' => 'Металл и камень',
                   'url' => '/item/?classId=7&subClassId=7',
                ),
                array(
                   'label' => 'Мясо',
                   'url' => '/item/?classId=7&subClassId=8',
                ),
                array(
                   'label' => 'Травы',
                   'url' => '/item/?classId=7&subClassId=9',
                ),
                array(
                   'label' => 'Стихии',
                   'url' => '/item/?classId=7&subClassId=10',
                ),
                array(
                   'label' => 'Другое',
                   'url' => '/item/?classId=7&subClassId=11',
                ),
                array(
                   'label' => 'Наложение чар',
                   'url' => '/item/?classId=7&subClassId=12',
                ),
                array(
                   'label' => 'Материалы',
                   'url' => '/item/?classId=7&subClassId=13',
                ),
                array(
                   'label' => 'Чары для предметов',
                   'url' => '/item/?classId=7&subClassId=14',
                ),
              ),
            ),
            array(
               'label' => 'Рецепт',
               'url' => '/item/?classId=9',
               'children' => 
              array (
                array(
                   'label' => 'Книга',
                   'url' => '/item/?classId=9&subClassId=0',
                ),
                array(
                   'label' => 'Кожевенное дело',
                   'url' => '/item/?classId=9&subClassId=1',
                ),
                array(
                   'label' => 'Портняжное дело',
                   'url' => '/item/?classId=9&subClassId=2',
                ),
                array(
                   'label' => 'Инженерное дело',
                   'url' => '/item/?classId=9&subClassId=3',
                ),
                array(
                   'label' => 'Кузнечное дело',
                   'url' => '/item/?classId=9&subClassId=4',
                ),
                array(
                   'label' => 'Кулинария',
                   'url' => '/item/?classId=9&subClassId=5',
                ),
                array(
                   'label' => 'Алхимия',
                   'url' => '/item/?classId=9&subClassId=6',
                ),
                array(
                   'label' => 'Первая помощь',
                   'url' => '/item/?classId=9&subClassId=7',
                ),
                array(
                   'label' => 'Наложение чар',
                   'url' => '/item/?classId=9&subClassId=8',
                ),
                array(
                   'label' => 'Рыболовство',
                   'url' => '/item/?classId=9&subClassId=9',
                ),
                array(
                   'label' => 'Ювелирное дело',
                   'url' => '/item/?classId=9&subClassId=10',
                ),
                array(
                   'label' => 'Начертание',
                   'url' => '/item/?classId=9&subClassId=11',
                ),
              ),
            ),
            array(
               'label' => 'Самоцветы',
               'url' => '/item/?classId=3',
               'children' => 
              array (
                array(
                   'label' => 'Красные',
                   'url' => '/item/?classId=3&subClassId=0',
                ),
                array(
                   'label' => 'Синие',
                   'url' => '/item/?classId=3&subClassId=1',
                ),
                array(
                   'label' => 'Желтые',
                   'url' => '/item/?classId=3&subClassId=2',
                ),
                array(
                   'label' => 'Фиолетовые',
                   'url' => '/item/?classId=3&subClassId=3',
                ),
                array(
                   'label' => 'Зеленые',
                   'url' => '/item/?classId=3&subClassId=4',
                ),
                array(
                   'label' => 'Оранжевые',
                   'url' => '/item/?classId=3&subClassId=5',
                ),
                array(
                   'label' => 'Особые',
                   'url' => '/item/?classId=3&subClassId=6',
                ),
                array(
                   'label' => 'Простые',
                   'url' => '/item/?classId=3&subClassId=7',
                ),
                array(
                   'label' => 'Радужные	',
                   'url' => '/item/?classId=3&subClassId=8',
                ),
                array(
                   'label' => 'Гидравлика	',
                   'url' => '/item/?classId=3&subClassId=9',
                ),
                array(
                   'label' => 'Зубчатое колесо',
                   'url' => '/item/?classId=3&subClassId=10',
                ),
              ),
            ),
            array(
               'label' => 'Разное',
               'url' => '/item/?classId=15',
               'children' => 
              array (
                array(
                   'label' => 'Хлам',
                   'url' => '/item/?classId=15&subClassId=0',
                ),
                array(
                   'label' => 'Реагенты',
                   'url' => '/item/?classId=15&subClassId=1',
                ),
                array(
                   'label' => 'Питомцы',
                   'url' => '/item/?classId=15&subClassId=2',
                ),
                array(
                   'label' => 'Праздничные предметы',
                   'url' => '/item/?classId=15&subClassId=3',
                ),
                array(
                   'label' => 'Другое',
                   'url' => '/item/?classId=15&subClassId=4',
                ),
                array(
                   'label' => 'Верховые животные',
                   'url' => '/item/?classId=15&subClassId=5',
                ),
              ),
            ),
            array(
               'label' => 'Задания',
               'url' => '/item/?classId=12',
            ),
          ),
        ),
        array(
           'label' => 'История',
           'url' => '/game/lore/',
           'children' => 
          array (
            array(
               'label' => 'Рассказы о правителях',
               'url' => '/game/lore/leader-story/',
               'children' => 
              array (
                array(
                   'label' => 'Генн Седогрив',
                   'url' => '/game/lore/leader-story/genn-greymane/1',
                ),
                array(
                   'label' => 'Гаррош Адский Крик',
                   'url' => '/game/lore/leader-story/garrosh-hellscream/1',
                ),
                array(
                   'label' => 'Галливикс',
                   'url' => '/game/lore/leader-story/gallywix/1',
                ),
                array(
                   'label' => 'Совет Трех Кланов',
                   'url' => '/game/lore/leader-story/the-council-of-three-hammers/1',
                ),
                array(
                   'label' => 'Вол’джин',
                   'url' => '/game/lore/leader-story/voljin/1',
                ),
                array(
                   'label' => 'Гелбин Меггакрут',
                   'url' => '/game/lore/leader-story/gelbin-mekkatorque/1',
                ),
              ),
            ),
            array(
               'label' => 'Рассказы',
               'url' => '/game/lore/short-story/',
               'children' => 
              array (
                array(
                   'label' => 'Проклятие',
                   'url' => '/game/lore/short-story/damnation/1',
                ),
                array(
                   'label' => 'Война зыбучих песков',
                   'url' => '/game/lore/short-story/shifting-sands/1',
                ),
                array(
                   'label' => 'Несломленный',
                   'url' => '/game/lore/short-story/unbroken/1',
                ),
              ),
            ),
            array(
               'label' => 'История Warcraft',
               'url' => '/game/lore/story-so-far/',
               'children' => 
              array (
                array(
                   'label' => 'Глава I. Мифы',
                   'url' => '/game/lore/story-so-far/chapter-1/1',
                ),
                array(
                   'label' => 'Глава II. Новый мир',
                   'url' => '/game/lore/story-so-far/chapter-2/1',
                ),
                array(
                   'label' => 'Глава III. Проклятие Дренора',
                   'url' => '/game/lore/story-so-far/chapter-3/1',
                ),
                array(
                   'label' => 'Глава IV. Альянс и Орда',
                   'url' => '/game/lore/story-so-far/chapter-4/1',
                ),
                array(
                   'label' => 'Глава V. Возвращение Пылающего Легиона',
                   'url' => '/game/lore/story-so-far/chapter-5/1',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Профессии',
           'url' => '/profession/',
           'children' => 
          array (
            array(
               'label' => 'Основные',
            ),
            array(
               'label' => 'Алхимия',
               'url' => '/profession/alchemy',
            ),
            array(
               'label' => 'Горное дело',
               'url' => '/profession/mining',
            ),
            array(
               'label' => 'Инженерное дело',
               'url' => '/profession/engineering',
            ),
            array(
               'label' => 'Кожевничество',
               'url' => '/profession/leatherworking',
            ),
            array(
               'label' => 'Кузнечное дело',
               'url' => '/profession/blacksmithing',
            ),
            array(
               'label' => 'Наложение чар',
               'url' => '/profession/enchanting',
            ),
            array(
               'label' => 'Начертание',
               'url' => '/profession/inscription',
            ),
            array(
               'label' => 'Портняжное дело',
               'url' => '/profession/tailoring',
            ),
            array(
               'label' => 'Снятие шкур',
               'url' => '/profession/skinning',
            ),
            array(
               'label' => 'Травничество',
               'url' => '/profession/herbalism',
            ),
            array(
               'label' => 'Ювелирное дело',
               'url' => '/profession/jewelcrafting',
            ),
            array(
               'label' => 'Второстепенные',
            ),
            array(
               'label' => 'Археология',
               'url' => '/profession/archaeology',
            ),
            array(
               'label' => 'Кулинария',
               'url' => '/profession/cooking',
            ),
            array(
               'label' => 'Первая помощь',
               'url' => '/profession/first-aid',
            ),
            array(
               'label' => 'Рыбная ловля',
               'url' => '/profession/fishing',
            ),
          ),
        ),
        array(
           'label' => 'Расы',
           'url' => '/game/race/',
           'children' => 
          array (
            array(
               'label' => 'Альянс',
               'url' => '',
            ),
            array(
               'label' => 'Дреней',
               'url' => '/game/race/draenei',
            ),
            array(
               'label' => 'Дворф',
               'url' => '/game/race/dwarf',
            ),
            array(
               'label' => 'Человек',
               'url' => '/game/race/human',
            ),
            array(
               'label' => 'Гном',
               'url' => '/game/race/gnome',
            ),
            array(
               'label' => 'Ночной эльф',
               'url' => '/game/race/night-elf',
            ),
            array(
               'label' => 'Ворген',
               'url' => '/game/race/worgen',
            ),
            array(
               'label' => 'Орда',
               'url' => '',
            ),
            array(
               'label' => 'Эльф крови',
               'url' => '/game/race/blood-elf',
            ),
            array(
               'label' => 'Отрекшийся',
               'url' => '/game/race/forsaken',
            ),
            array(
               'label' => 'Гоблин',
               'url' => '/game/race/goblin',
            ),
            array(
               'label' => 'Орк',
               'url' => '/game/race/orc',
            ),
            array(
               'label' => 'Таурен',
               'url' => '/game/race/tauren',
            ),
            array(
               'label' => 'Тролль',
               'url' => '/game/race/troll',
            ),
          ),
        ),
        array(
           'label' => 'На сайте',
           'url' => '',
        ),
        array(
           'label' => 'Описания обновлений',
           'url' => '/game/patch-notes/',
           'children' => 
          array (
            array(
               'label' => 'Ярость Огня',
               'url' => '/game/patch-notes/4-2',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/game/patch-notes/4-0',
               'children' => 
              array (
                array(
                   'label' => 'Cataclysm: обновление 4.0.1',
                   'url' => '/game/patch-notes/4-0-1',
                ),
                array(
                   'label' => 'Cataclysm: обновление 4.0.3',
                   'url' => '/game/patch-notes/4-0-3',
                ),
                array(
                   'label' => 'Обновление 4.0.6',
                   'url' => '/game/patch-notes/4-0-6',
                ),
              ),
            ),
            array(
               'label' => 'Падение Короля-лича',
               'url' => '/game/patch-notes/3-3',
               'children' => 
              array (
                array(
                   'label' => 'Падение Короля-лича: обновление 3.3.0',
                   'url' => '/game/patch-notes/3-3-0',
                ),
                array(
                   'label' => 'Падение Короля-лича: обновление 3.3.0a',
                   'url' => '/game/patch-notes/3-3-0a',
                ),
                array(
                   'label' => 'Падение Короля-лича: обновление 3.3.2',
                   'url' => '/game/patch-notes/3-3-2',
                ),
                array(
                   'label' => 'Падение Короля-лича: обновление 3.3.3',
                   'url' => '/game/patch-notes/3-3-3',
                ),
                array(
                   'label' => 'Падение Короля-лича: обновление 3.3.5',
                   'url' => '/game/patch-notes/3-3-5',
                ),
              ),
            ),
            array(
               'label' => 'Призыв Авангарда',
               'url' => '/game/patch-notes/3-2',
               'children' => 
              array (
                array(
                   'label' => 'Призыв Авангарда: обновление 3.2.0',
                   'url' => '/game/patch-notes/3-2-0',
                ),
                array(
                   'label' => 'Призыв Авангарда: обновление 3.2.2',
                   'url' => '/game/patch-notes/3-2-2',
                ),
                array(
                   'label' => 'Призыв Авангарда: обновление 3.2.2a',
                   'url' => '/game/patch-notes/3-2-2a',
                ),
              ),
            ),
            array(
               'label' => 'Тайны Ульдуара',
               'url' => '/game/patch-notes/3-1',
               'children' => 
              array (
                array(
                   'label' => 'Тайны Ульдуара: обновление 3.1.0',
                   'url' => '/game/patch-notes/3-1-0',
                ),
                array(
                   'label' => 'Тайны Ульдуара: обновление 3.1.1',
                   'url' => '/game/patch-notes/3-1-1',
                ),
                array(
                   'label' => 'Тайны Ульдуара: обновление 3.1.2',
                   'url' => '/game/patch-notes/3-1-2',
                ),
                array(
                   'label' => 'Тайны Ульдуара: обновление 3.1.3',
                   'url' => '/game/patch-notes/3-1-3',
                ),
              ),
            ),
            array(
               'label' => 'Wrath of Lich King',
               'url' => '/game/patch-notes/3-0',
               'children' => 
              array (
                array(
                   'label' => 'Wrath of Lich King: обновление 3.0.2',
                   'url' => '/game/patch-notes/3-0-2',
                ),
                array(
                   'label' => 'Wrath of Lich King: обновление 3.0.3',
                   'url' => '/game/patch-notes/3-0-3',
                ),
                array(
                   'label' => 'Wrath of Lich King: обновление 3.0.8',
                   'url' => '/game/patch-notes/3-0-8',
                ),
                array(
                   'label' => 'Wrath of Lich King: обновление 3.0.9',
                   'url' => '/game/patch-notes/3-0-9',
                ),
              ),
            ),
            array(
               'label' => 'Ярость Солнечного Колодца',
               'url' => '/game/patch-notes/2-4',
               'children' => 
              array (
                array(
                   'label' => 'Ярость Солнечного Колодца: обновление 2.4.0',
                   'url' => '/game/patch-notes/2-4-0',
                ),
                array(
                   'label' => 'Ярость Солнечного Колодца: обновление 2.4.1',
                   'url' => '/game/patch-notes/2-4-1',
                ),
                array(
                   'label' => 'Ярость Солнечного Колодца: обновление 2.4.2',
                   'url' => '/game/patch-notes/2-4-2',
                ),
                array(
                   'label' => 'Ярость Солнечного Колодца: обновление 2.4.3',
                   'url' => '/game/patch-notes/2-4-3',
                ),
              ),
            ),
            array(
               'label' => 'Боги Зул’Амана',
               'url' => '/game/patch-notes/2-3',
               'children' => 
              array (
                array(
                   'label' => 'Боги Зул’Амана: обновление 2.3.0',
                   'url' => '/game/patch-notes/2-3-0',
                ),
                array(
                   'label' => 'Боги Зул’Амана: обновление 2.3.2',
                   'url' => '/game/patch-notes/2-3-2',
                ),
                array(
                   'label' => 'Боги Зул’Амана: обновление 2.3.3',
                   'url' => '/game/patch-notes/2-3-3',
                ),
              ),
            ),
            array(
               'label' => 'Черный Храм',
               'url' => '/game/patch-notes/2-1',
               'children' => 
              array (
                array(
                   'label' => 'Черный Храм: обновление 2.1.0',
                   'url' => '/game/patch-notes/2-1-0',
                ),
                array(
                   'label' => 'Черный Храм: обновление 2.1.1',
                   'url' => '/game/patch-notes/2-1-1',
                ),
                array(
                   'label' => 'Черный Храм: обновление 2.1.2',
                   'url' => '/game/patch-notes/2-1-2',
                ),
                array(
                   'label' => 'Черный Храм: обновление 2.1.3',
                   'url' => '/game/patch-notes/2-1-3',
                ),
              ),
            ),
            array(
               'label' => 'Burning Crusade',
               'url' => '/game/patch-notes/2-0',
               'children' => 
              array (
                array(
                   'label' => 'Burning Crusade: обновление 2.0.1',
                   'url' => '/game/patch-notes/2-0-1',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.3',
                   'url' => '/game/patch-notes/2-0-3',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.4',
                   'url' => '/game/patch-notes/2-0-4',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.5',
                   'url' => '/game/patch-notes/2-0-5',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.6',
                   'url' => '/game/patch-notes/2-0-6',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.7',
                   'url' => '/game/patch-notes/2-0-7',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.8',
                   'url' => '/game/patch-notes/2-0-8',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.10',
                   'url' => '/game/patch-notes/2-0-10',
                ),
                array(
                   'label' => 'Burning Crusade: обновление 2.0.12',
                   'url' => '/game/patch-notes/2-0-12',
                ),
              ),
            ),
            array(
               'label' => 'Тень Некрополя',
               'url' => '/game/patch-notes/1-11',
               'children' => 
              array (
                array(
                   'label' => 'Тень Некрополя: обновление 1.11.0',
                   'url' => '/game/patch-notes/1-11-0',
                ),
                array(
                   'label' => 'Тень Некрополя: обновление 1.11.1',
                   'url' => '/game/patch-notes/1-11-1',
                ),
                array(
                   'label' => 'Тень Некрополя: обновление 1.11.2',
                   'url' => '/game/patch-notes/1-11-2',
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
               'label' => 'Рейтинг 2x2',
               'url' => '/pvp/arena/2v2',
            ),
            array(
               'label' => 'Рейтинг 3x3',
               'url' => '/pvp/arena/3v3',
            ),
            array(
               'label' => 'Рейтинг 5x5',
               'url' => '/pvp/arena/5v5',
            ),
            array(
               'label' => 'Рейтинговые поля боя',
               'url' => '/pvp/battlegrounds/',
            ),
          ),
        ),
        array(
           'label' => 'Состояние игровых миров',
           'url' => '/status',
        ),
      ),
    ),
    array(
       'label' => 'Сообщество',
       'url' => '/community/',
    ),
    array(
       'label' => 'Материалы',
       'url' => '/media/',
       'children' => 
      array (
        array(
           'label' => 'Композиции',
           'url' => '/media/artwork/',
           'children' => 
          array (
            array(
               'label' => 'WarCraft I',
               'url' => '/media/artwork/warcraft1',
            ),
            array(
               'label' => 'WarCraft II',
               'url' => '/media/artwork/warcraft2',
            ),
            array(
               'label' => 'WarCraft III',
               'url' => '/media/artwork/warcraft3',
            ),
            array(
               'label' => 'World of Warcraft: Classic',
               'url' => '/media/artwork/wow-classic',
            ),
            array(
               'label' => 'Burning Crusade',
               'url' => '/media/artwork/wow-bc',
            ),
            array(
               'label' => 'Wrath of the Lich King',
               'url' => '/media/artwork/wow-wrath',
            ),
            array(
               'label' => 'Cataclysm',
               'url' => '/media/artwork/wow-cataclysm',
            ),
            array(
               'label' => 'Расы',
               'url' => '/media/artwork/wow-races',
            ),
            array(
               'label' => 'Классы',
               'url' => '/media/artwork/wow-classes',
            ),
            array(
               'label' => 'Правители',
               'url' => '/media/artwork/wow-leader',
            ),
          ),
        ),
        array(
           'label' => 'Комиксы',
           'url' => '/media/comics/',
        ),
        array(
           'label' => 'Скриншоты',
           'url' => '/media/screenshots/',
           'children' => 
          array (
            array(
               'label' => 'Классы',
               'url' => '/media/screenshots/classes',
            ),
            array(
               'label' => 'Конкурсы',
               'url' => '/media/screenshots/contests',
            ),
            array(
               'label' => 'Подземелья ',
               'url' => '/media/screenshots/dungeons',
            ),
            array(
               'label' => 'События',
               'url' => '/media/screenshots/events/',
               'children' => 
              array (
                array(
                   'label' => 'Серебряный турнир ',
                   'url' => '/media/screenshots/events/argent-tournament',
                ),
                array(
                   'label' => 'Хмельной фестиваль',
                   'url' => '/media/screenshots/events/brewfest',
                ),
                array(
                   'label' => 'Детская неделя',
                   'url' => '/media/screenshots/events/childrens-week',
                ),
                array(
                   'label' => 'День мертвых',
                   'url' => '/media/screenshots/events/day-of-the-dead',
                ),
                array(
                   'label' => 'Тыквовин',
                   'url' => '/media/screenshots/events/hallows-end',
                ),
                array(
                   'label' => 'Неделя урожая',
                   'url' => '/media/screenshots/events/harvest-festival',
                ),
                array(
                   'label' => 'Любовная лихорадка',
                   'url' => '/media/screenshots/events/love-is-in-the-air',
                ),
                array(
                   'label' => 'Лунный фестиваль',
                   'url' => '/media/screenshots/events/lunar-festival',
                ),
                array(
                   'label' => 'Огненный солнцеворот',
                   'url' => '/media/screenshots/events/midsummer',
                ),
                array(
                   'label' => 'Новый год',
                   'url' => '/media/screenshots/events/new-years',
                ),
                array(
                   'label' => 'Сад чудес',
                   'url' => '/media/screenshots/events/noble-garden',
                ),
                array(
                   'label' => 'Пиршество странников',
                   'url' => '/media/screenshots/events/pilgrims-bounty',
                ),
                array(
                   'label' => 'День пирата',
                   'url' => '/media/screenshots/events/pirates-day',
                ),
                array(
                   'label' => 'Нашествие Плети',
                   'url' => '/media/screenshots/events/scourge-invasion',
                ),
                array(
                   'label' => 'Зимний Покров',
                   'url' => '/media/screenshots/events/winter-veil',
                ),
                array(
                   'label' => 'Нашествие зомби',
                   'url' => '/media/screenshots/events/zombie-invasion',
                ),
              ),
            ),
            array(
               'label' => 'Воздушные транспортные средства',
               'url' => '/media/screenshots/flying-mounts',
            ),
            array(
               'label' => 'Предметы',
               'url' => '/media/screenshots/items',
            ),
            array(
               'label' => 'Транспорт',
               'url' => '/media/screenshots/mounts',
            ),
            array(
               'label' => 'Другое ',
               'url' => '/media/screenshots/other',
            ),
            array(
               'label' => 'Питомцы',
               'url' => '/media/screenshots/pets',
            ),
            array(
               'label' => 'Профессии',
               'url' => '/media/screenshots/professions',
            ),
            array(
               'label' => 'PvP',
               'url' => '/media/screenshots/pvp',
            ),
            array(
               'label' => 'Расы',
               'url' => '/media/screenshots/races',
            ),
            array(
               'label' => 'Скриншот дня',
               'url' => '/media/screenshots/screenshot-of-the-day/',
               'children' => 
              array (
                array(
                   'label' => 'Classic',
                   'url' => '/media/screenshots/screenshot-of-the-day/classic',
                ),
                array(
                   'label' => 'Burning Crusade',
                   'url' => '/media/screenshots/screenshot-of-the-day/burning-crusade',
                ),
                array(
                   'label' => 'Wrath of the Lich King',
                   'url' => '/media/screenshots/screenshot-of-the-day/wrath',
                ),
                array(
                   'label' => 'Cataclysm',
                   'url' => '/media/screenshots/screenshot-of-the-day/cataclysm',
                ),
              ),
            ),
          ),
        ),
        array(
           'label' => 'Видеоролики',
           'url' => '/media/videos/',
        ),
        array(
           'label' => 'Обои',
           'url' => '/media/wallpapers/',
           'children' => 
          array (
            array(
               'label' => 'Боссы и подземелья',
               'url' => '/media/wallpapers/bosses',
            ),
            array(
               'label' => 'Города',
               'url' => '/media/wallpapers/cities',
            ),
            array(
               'label' => 'Классы',
               'url' => '/media/wallpapers/classes',
            ),
            array(
               'label' => 'Комиксы',
               'url' => '/media/wallpapers/comics',
            ),
            array(
               'label' => 'Обложки',
               'url' => '/media/wallpapers/covers',
            ),
            array(
               'label' => 'События',
               'url' => '/media/wallpapers/events',
            ),
            array(
               'label' => 'Фан-арт',
               'url' => '/media/wallpapers/fan-art',
            ),
            array(
               'label' => 'Транспорт',
               'url' => '/media/wallpapers/mounts',
            ),
            array(
               'label' => 'Другое',
               'url' => '/media/wallpapers/other',
            ),
            array(
               'label' => 'Обновление',
               'url' => '/media/wallpapers/patch',
            ),
            array(
               'label' => 'Питомцы',
               'url' => '/media/wallpapers/pets',
            ),
            array(
               'label' => 'Расы',
               'url' => '/media/wallpapers/races',
            ),
            array(
               'label' => 'Регионы',
               'url' => '/media/wallpapers/regions',
            ),
            array(
               'label' => 'Коллекционная карточная игра',
               'url' => '/media/wallpapers/tcg',
            ),
          ),
        ),
      ),
    ),
    array(
       'label' => 'Форумы',
       'url' => '/forum/',
       'children' => 
      array (/*
        array(
           'label' => 'Поддержка',
           'url' => '/forum/#forum896038',
           'children' => 
          array (
            array(
               'label' => 'Служба поддержки',
               'url' => '/forum/975484/',
            ),
            array(
               'label' => 'Техническая поддержка',
               'url' => '/forum/975483/',
            ),
            array(
               'label' => 'Состояние игровых миров',
               'url' => '/forum/1028284/',
            ),
          ),
        ),
        array(
           'label' => 'Сообщество',
           'url' => '/forum/#forum896039',
           'children' => 
          array (
            array(
               'label' => 'Поиск игроков',
               'url' => '/forum/896077/',
            ),
            array(
               'label' => 'Главы гильдий и лидеры рейдов',
               'url' => '/forum/896078/',
            ),
            array(
               'label' => 'Жизнь сообщества',
               'url' => '/forum/896079/',
            ),
            array(
               'label' => 'BlizzCon',
               'url' => '/forum/2132705/',
            ),
          ),
        ),
        array(
           'label' => 'Игровой процесс',
           'url' => '/forum/#forum896044',
           'children' => 
          array (
            array(
               'label' => 'Помощь новичкам',
               'url' => '/forum/896045/',
            ),
            array(
               'label' => 'Задания',
               'url' => '/forum/896046/',
            ),
            array(
               'label' => 'Профессии',
               'url' => '/forum/896047/',
            ),
            array(
               'label' => 'Достижения',
               'url' => '/forum/896048/',
            ),
            array(
               'label' => 'Ролевая игра',
               'url' => '/forum/896071/',
            ),
            array(
               'label' => 'История',
               'url' => '/forum/896072/',
            ),
            array(
               'label' => 'Рейды и подземелья',
               'url' => '/forum/896073/',
            ),
            array(
               'label' => 'Общие темы',
               'url' => '/forum/896074/',
            ),
            array(
               'label' => 'Интерфейс и макросы',
               'url' => '/forum/896076/',
            ),
          ),
        ),
        array(
           'label' => ' Бои между игроками (PvP)',
           'url' => '/forum/#forum2265984',
           'children' => 
          array (
            array(
               'label' => 'Арена и рейтинговые поля боя ',
               'url' => '/forum/2265985/',
            ),
            array(
               'label' => 'PvP на полях боя и за их пределами',
               'url' => '/forum/896075/',
            ),
          ),
        ),
        array(
           'label' => 'Классовые роли',
           'url' => '/forum/#forum900518',
           'children' => 
          array (
            array(
               'label' => 'Нанесение урона',
               'url' => '/forum/896544/',
            ),
            array(
               'label' => 'Лечение',
               'url' => '/forum/896545/',
            ),
            array(
               'label' => 'Танкование',
               'url' => '/forum/896546/',
            ),
          ),
        ),
        array(
           'label' => 'Классы',
           'url' => '/forum/#forum896040',
           'children' => 
          array (
            array(
               'label' => 'Воин',
               'url' => '/forum/896177/',
            ),
            array(
               'label' => 'Паладин',
               'url' => '/forum/896172/',
            ),
            array(
               'label' => 'Друид',
               'url' => '/forum/896081/',
            ),
            array(
               'label' => 'Разбойник',
               'url' => '/forum/896174/',
            ),
            array(
               'label' => 'Жрец',
               'url' => '/forum/896173/',
            ),
            array(
               'label' => 'Рыцарь смерти',
               'url' => '/forum/896080/',
            ),
            array(
               'label' => 'Маг',
               'url' => '/forum/896171/',
            ),
            array(
               'label' => 'Чернокнижник',
               'url' => '/forum/896176/',
            ),
            array(
               'label' => 'Охотник',
               'url' => '/forum/896170/',
            ),
            array(
               'label' => 'Шаман',
               'url' => '/forum/896175/',
            ),
          ),
        ),
        array(
           'label' => 'Разработка',
           'url' => '/forum/#forum896041',
           'children' => 
          array (
            array(
               'label' => 'Тестовый игровой мир',
               'url' => '/forum/896178/',
            ),
            array(
               'label' => 'Перевод и локализация',
               'url' => '/forum/896179/',
            ),
          ),
        ),
        array(
           'label' => 'Игры, кино и наука',
           'url' => '/forum/#forum2256740',
           'children' => 
          array (
            array(
               'label' => 'Книги и комиксы',
               'url' => '/forum/2252235/',
            ),
            array(
               'label' => 'Игры и «железо»',
               'url' => '/forum/2252233/',
            ),
            array(
               'label' => 'Фильмы и телешоу',
               'url' => '/forum/2252234/',
            ),
            array(
               'label' => 'Наука и техника',
               'url' => '/forum/2252236/',
            ),
          ),
        ),
        array(
           'label' => 'Игровые миры',
           'url' => '/forum/#forum940392',
           'children' => 
          array (
            array(
               'label' => 'Азурегос',
               'url' => '/forum/940979/',
            ),
            array(
               'label' => 'Борейская тундра',
               'url' => '/forum/940978/',
            ),
            array(
               'label' => 'Вечная Песня',
               'url' => '/forum/940976/',
            ),
            array(
               'label' => 'Галакронд',
               'url' => '/forum/940975/',
            ),
            array(
               'label' => 'Голдринн',
               'url' => '/forum/1318339/',
            ),
            array(
               'label' => 'Гордунни',
               'url' => '/forum/940974/',
            ),
            array(
               'label' => 'Гром',
               'url' => '/forum/940973/',
            ),
            array(
               'label' => 'Дракономор',
               'url' => '/forum/940917/',
            ),
            array(
               'label' => 'Король-лич',
               'url' => '/forum/940916/',
            ),
            array(
               'label' => 'Пиратская бухта',
               'url' => '/forum/940915/',
            ),
            array(
               'label' => 'Подземье',
               'url' => '/forum/940914/',
            ),
            array(
               'label' => 'Разувий',
               'url' => '/forum/940913/',
            ),
            array(
               'label' => 'Ревущий фьорд',
               'url' => '/forum/940912/',
            ),
            array(
               'label' => 'Свежеватель душ',
               'url' => '/forum/940911/',
            ),
            array(
               'label' => 'Седогрив',
               'url' => '/forum/940910/',
            ),
            array(
               'label' => 'Страж Смерти',
               'url' => '/forum/940909/',
            ),
            array(
               'label' => 'Термоштепсель',
               'url' => '/forum/940908/',
            ),
            array(
               'label' => 'Ткач Смерти',
               'url' => '/forum/940907/',
            ),
            array(
               'label' => 'Черный Шрам',
               'url' => '/forum/940653/',
            ),
            array(
               'label' => 'Ясеневый лес',
               'url' => '/forum/940652/',
            ),
          ),
        ),*/
      ),
    ),
    array(
       'label' => 'Услуги',
       'url' => '/services/',
       'children' => 
      array (
        array(
           'label' => 'World of Warcraft без границ',
           'url' => '/services/wow-remote/',
        ),
        array(
           'label' => '«Мобильная Оружейная»',
           'url' => '/services/iphone/',
        ),
        array(
           'label' => 'World of Warcraft Rewards Visa',
           'url' => '/services/rewards-visa/',
           'children' => 
          array (
            array(
               'label' => 'World of Warcraft Rewards Visa FAQ',
               'url' => '/services/rewards-visa/faq',
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
