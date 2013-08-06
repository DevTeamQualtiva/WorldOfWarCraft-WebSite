<!-- Start: Sidebar -->
<?php
$sidebar_data = "'sotd', 'forums'";
?>
<?php
if(WoW_Account::IsLoggedIn() && WoW_Account::IsHaveActiveCharacter()) {
    $sidebar_data = "'auctions','guild-news','friends','forums','sotd'";
?>

<div class="sidebar-module" id="sidebar-auctions">
    <div class="sidebar-title">
        <h3 class="title-auctions"><?php echo WoW_Locale::GetString('template_auction_auction'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>

<div class="sidebar-module" id="sidebar-guild-news">
    <div class="sidebar-title">
        <h3 class="title-guild-news"><?php echo WoW_Locale::GetString('template_guild_news_sidebar'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>

<div class="sidebar-module" id="sidebar-friends">
    <div class="sidebar-title">
        <h3 class="title-friends"><?php echo WoW_Locale::GetString('template_character_friends_sidebar'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>

<?php
}
?>
<div class="sidebar-module" id="sidebar-forums">
    <div class="sidebar-title">
        <h3 class="title-forums"><?php echo WoW_Locale::GetString('template_forums_sidebar_title'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>
<div class="sidebar-module" id="sidebar-sotd">
    <div class="sidebar-title">
        <h3 class="title-sotd"><?php echo WoW_Locale::GetString('template_sotd_sidebar_title'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>
<script type="text/javascript">
    //<![CDATA[
        $(function() {
            App.sidebar([<?php echo $sidebar_data; ?>]);
        });
    //]]>
</script>
<!-- End: Sidebar -->
