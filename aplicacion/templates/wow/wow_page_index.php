<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>" lang="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>">
<?php
WoW_Template::LoadTemplate('block_header');
?>
<body class="<?php echo WoW_Template::GetPageData('body_class'); ?>">
    <div id="wrapper">
        <div id="header">
            <div id="search-bar">
                <form action="<?php echo WoW::GetWoWPath(); ?>/wow/search" method="get" id="search-form">
                    <div>
                        <input type="submit" id="search-button" value="" tabindex="41" /> <input type="text" name="q" id="search-field" maxlength="200" tabindex="40" alt="<?php echo WoW_Locale::GetString('template_search_site');?>" value="<?php echo WoW_Search::GetSearchQuery() != null ? WoW_Search::GetSearchQuery() : WoW_Locale::GetString('template_search_site'); ?>" />
                    </div>
                </form>
            </div>
            <h1 id="logo"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/">World of Warcraft</a></h1>
            <div class="header-plate-wrapper header-plate">
<?php
echo WoW_Layout::PrintMainMenu();
if(WoW_Account::IsLoggedIn()) {
    if(WoW_Account::IsHaveActiveCharacter()) {
        WoW_Template::LoadTemplate('block_user_meta_auth');
    }
    else {
        WoW_Template::LoadTemplate('block_user_meta_no_chars');
    }
}
else {
    WoW_Template::LoadTemplate('block_user_meta');
}
?>
            </div>
        </div>
<?php
// <div id="content"> starts here!
switch(WoW_Template::GetPageIndex()) {
    case 'item':
        WoW_Template::LoadTemplate('content_item_page');
        break;
    case 'item_list':
        WoW_Template::LoadTemplate('content_item_table');
        break;
    case 'game':
        WoW_Template::LoadTemplate('static_game_index');
        break;
    case 'game_guide_what_is_wow':
        WoW_Template::LoadTemplate('static_game_guide_what_is_wow');
        break;
    case 'game_guide_getting_started':
        WoW_Template::LoadTemplate('static_game_guide_getting_started');
        break;
    case 'game_guide_how_to_play':
        WoW_Template::LoadTemplate('static_game_guide_how_to_play');
        break;
    case 'game_guide_playing_together':
        WoW_Template::LoadTemplate('static_game_guide_playing_together');
        break;
    case 'game_guide_late_game':
        WoW_Template::LoadTemplate('static_game_guide_late_game');
        break;
    case 'game_race_index':
    case 'game_class_index':
        WoW_Template::LoadTemplate('static_' . WoW_Template::GetPageIndex());
        break;
    case 'game_class_index':
        WoW_Template::LoadTemplate('static_game_class_index');
        break;
    case 'forum_edit_post':
        WoW_Template::LoadTemplate('content_forum_edit_post');
        break;
    default:
        WoW_Template::LoadTemplate('content_' . WoW_Template::GetPageIndex());
        break;
}
WoW_Template::LoadTemplate('block_footer', true);
WoW_Template::LoadTemplate('block_service', true);
?>
    </div>
<?php
WoW_Template::LoadTemplate('block_js_messages', true);
?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/menu.js?v15"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/js/wow.js?v4"></script>
<script type="text/javascript">
friendData = [
];
$(function(){
    //
    Menu.initialize('<?php echo WoW::GetWoWPath(); ?>/data/menu.json');
    Search.init('<?php echo WoW::GetWoWPath(); ?>/ta/lookup');
});
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v15"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/cms.js?v4"></script>
<?php
switch(WoW_Template::GetPageData('page')) {
    case 'character_profile':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v4"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/summary.js?v4"></script>';
        break;
    case 'character_talents':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v4"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/talent.js?v6"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/tool/talent-calculator.js?v6"></script>';
        break;
    case 'character_achievements':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/achievement.js?v7"></script>';
        break;
    case 'character_feed':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v6"></script>';
        break;
    case 'item':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/wiki.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/item.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/cms.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v19"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/model-rotator.js?v19"></script>';
        break;
    case 'guild_page':
    case 'guild_perks':
    case 'guild_roster':
    case 'guild_professions':
        if(in_array(WoW_Template::GetPageData('page'), array('guild_roster', 'guild_professions'))) {
            echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v17"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v17"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/dropdown.js?v17"></script>
';
        }
        if(WoW_Template::GetPageData('page') == 'guild_professions') {
            echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/guild/professions.js?v7"></script>';
        }
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v6"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/guild-tabard.js?v6"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/guild/guild.js?v7"></script>';
        break;
    case 'search':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/guild-tabard.js?v7"></script>';
        break;
    case 'realm_status':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/services/realm-status.js?v7"></script>';
        break;
    case 'character_reputation':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/reputation.js?v7"></script>';
        break;
    case 'character_pvp':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/dropdown.js?v16"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/pvp.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/arena-flag.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/pvp/arena.js?v7"></script>';
        break;
    case 'character_statistics':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v7"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/statistic.js?v7"></script>';
        break;
    case 'character_companions_mounts':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v12"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/companion.js?v12"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v23"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/dataset.js?v23"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/model-rotator.js?v23"></script>';
        break;
    case 'blog':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/lightbox.js?v17"></script>';
        break;
    case 'auction_lots':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/profile.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/character/auction.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v19"></script>';
        break;
    case 'forum_index':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/cms.js?v19"></script>';
        break;
    case 'zones':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/wiki.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v20"></script>';
        break;
    case 'zone':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/wiki.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/zone.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v20"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/cms.js?v20"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v20"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/lightbox.js?v20"></script>';
        break;
    case 'game_guide_what_is_wow':
    case 'game_guide_getting_started':
    case 'game_guide_how_to_play':
    case 'game_guide_playing_together':
    case 'game_guide_late_game':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/lightbox.js?v20"></script>';
        break;
    case 'faction':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/wiki.js?v10"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v20"></script>';
        break;
    case 'pvp_arena':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/dynamic-menu.js?v21"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/pvp/pvp.js?v11"></script>';
        break;
    case 'pvp_arena_ladder':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/dynamic-menu.js?v21"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/pvp/ladder.js?v11"></script>';
        break;
    case 'boss':
        echo '<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/wiki.js?v14"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/js/wiki/npc.js?v14"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/utility/model-rotator.js?v27"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/table.js?v27"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/cms.js?v27"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/filter.js?v27"></script>
<script type="text/javascript" src="' . WoW::GetWoWPath() . '/wow/static/local-common/js/lightbox.js?v27"></script>';
        break;
}
?>

<script type="text/javascript">
//<![CDATA[
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/overlay.js?v15");
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/search.js?v16");
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v15");
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v15");
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/third-party/jquery.tinyscrollbar.min.js?v15");
    Core.load("<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/login.js?v15", false, function() {
        Login.embeddedUrl = '<?php echo WoW::GetWoWPath(); ?>/login/<?php echo WoW_Locale::GetLocale() ?>/login.frag';
    });
//]]>
</script>
</body>
</html>
