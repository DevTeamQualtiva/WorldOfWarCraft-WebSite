<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
    <li class="<?php echo WoW_Template::GetPageData('guild-page') == 'summary' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Guild::GetGuildUrl(); ?>" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_summary'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-page') == 'roster' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Guild::GetGuildUrl(); ?>roster" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_roster'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-page') == 'news' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Guild::GetGuildUrl(); ?>news" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_news'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-authorized') == false ? ' disabled' : null; echo WoW_Template::GetPageData('guild-page') == 'events' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Template::GetPageData('guild-authorized') == true ? '/vault/guild/event' : 'javascript:;'; ?>" class=" vault" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_events'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-page') == 'achievements' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Guild::GetGuildUrl(); ?>achievement" class=" has-submenu" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_achievements'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-page') == 'perks' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Guild::GetGuildUrl(); ?>perk" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_perks'); ?></span></span></a>
    </li>
    <li class="<?php echo WoW_Template::GetPageData('guild-authorized') == false ? ' disabled' : null; echo WoW_Template::GetPageData('guild-page') == 'rewards' ? ' active' : null; ?>">
        <a href="<?php echo WoW_Template::GetPageData('guild-authorized') == true ? '/vault/guild/reward' : 'javascript:;'; ?>" class=" vault" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_guild_menu_rewards'); ?></span></span></a>
    </li>
</ul>
