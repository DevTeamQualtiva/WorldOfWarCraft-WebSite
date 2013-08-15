<?php
$formats = array(2, 3, 5);
?>
	<ul class="dynamic-menu" id="menu-pvp">
				<li class="root-item<?php echo WoW_Template::GetPageData('teamFormat') == null ? ' item-active' : null; ?>">
					<a href="<?php WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/pvp/">
						<span class="arrow"><?php echo WoW_Locale::GetString('template_pvp_arena_summary'); ?></span>
					</a>
				</li>
                <?php
                for($i = 0; $i < 3; ++$i) {
                    echo '<li class="has-submenu' . (WoW_Template::GetPageData('teamFormat') == $formats[$i] ? ' item-active' : null) . '">
                        <a href="' . WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . '/pvp/arena/' . $formats[$i] . 'v' . $formats[$i] . '">
                            <span class="arrow">' . sprintf(WoW_Locale::GetString('template_team_type_format'), $formats[$i], $formats[$i]) . '</span>
                        </a>
                    <ul class="dynamic-menu" id="menu-pvp-' . $formats[$i] . 'v' . $formats[$i] . '">';
                    foreach(WoWConfig::$BattleGroups as &$bg) {
                        echo '
                        <li' . (WoW_Template::GetPageData('activeBG') == mb_strtolower($bg['name']) ? ' class="item-active"' : null) . '>
                            <a href="' . WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . '/pvp/arena/' . mb_strtolower($bg['name']) . '/' . $formats[$i] . 'v' . $formats[$i] . '">
                                <span class="arrow">' . $bg['name'] . '</span>
                            </li>';
                    }
                    echo '
                    </ul>
                    </li>
                    ';
                }
                ?>
				<li>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/arena/">
						<span class="arrow"><?php echo WoW_Locale::GetString('template_pvp_arena_pass'); ?></span>
					</a>
				</li>
	</ul>
