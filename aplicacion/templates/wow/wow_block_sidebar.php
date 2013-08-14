<!-- Start: Sidebar -->
<?php
$sidebar_data = "'sotd', 'forums'";
?>
<?php
if(WoW_Account::IsLoggedIn() && WoW_Account::IsHaveActiveCharacter()) {
    $sidebar_data = "'auctions','guild-news','friends','forums','sotd'";
?>

<div class="sidebar-module" id="sidebar-under-dev" style="">
	<div class="sidebar-title">
		<h3 class="category title-under-dev">
		    <a href="/wow/es/game/patch-notes/under-dev"><?php echo WoW_Locale::GetString('template_under_development'); ?></a>
		</h3>
	</div>
		<div class="sidebar-content">
		<a href="/wow/es/game/patch-notes/under-dev" class="sidebar-under-dev"></a>
		<ul id="under-dev" class="trending-topics"></ul>
	</div>
</div>

<div class="sidebar-module " id="sidebar-social-media" style="">
	<div class="sidebar-title">
	    <h3 class="category title-social-media">Permanece conectado</h3>
	</div>
	<div class="sidebar-content">
		<ul class="social-media">
			<li class="atom-feed">
				<a href="/wow/es/feed/news" target="_blank"></a>
			</li>
				<li class="facebook">
					<a href="http://www.facebook.com/WarcraftES" title="World of Warcraft en Facebook"></a>
				</li>
				<li class="vk">
					<a href="" title=""></a>
				</li>
				<li class="twitter">
					<a href="http://twitter.com/warcraft_Es" title="World of Warcraft en Twitter"></a>
				</li>
				<li class="youtube">
					<a href="http://www.youtube.com/user/WorldofWarcraftES" title="World of Warcraft en Youtube"></a>
				</li>
				<li class="reddit">
					<a href="http://www.reddit.com/r/wow" title="World of Warcraft on reddit"></a>
				</li>
		<span class="clear"><!-- --></span>
		</ul>
	</div>
</div>

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
<!-- Under-DEV / En Desarrollo Start --> 
<div class="sidebar-module " id="sidebar-under-dev" style="">
	<div class="sidebar-title">
		<h3 class="category title-under-dev">
		    <a href="/wow/es/game/patch-notes/under-dev"><?php echo WoW_Locale::GetString('template_under_development'); ?></a>
		</h3>
	</div>
		<div class="sidebar-content">
		<a href="/wow/es/game/patch-notes/under-dev" class="sidebar-under-dev"></a>
		<ul id="under-dev" class="trending-topics"><ul></ul></ul>
	</div>
</div>
<!-- Under-DEV / En Desarrollo finish --> 

<div class="sidebar-module" id="sidebar-sotd">
    <div class="sidebar-title">
        <h3 class="title-sotd"><?php echo WoW_Locale::GetString('template_sotd_sidebar_title'); ?></h3>
    </div>
    <div class="sidebar-content loading"></div>
</div>

<!-- Social-Media / Social-Media Start --> 
<div class="sidebar-module " id="sidebar-social-media" style="">
	<div class="sidebar-title">
	    <h3 class="category title-social-media"><?php echo WoW_Locale::GetString('template_stay_connected'); ?></h3>
	</div>
	<div class="sidebar-content">
		<ul class="social-media">
			<li class="atom-feed">
				<a href="/wow/es/feed/news" target="_blank"></a>
			</li>
				<li class="facebook">
					<a href="You URL / Tu URL Facebook" title="World of Warcraft en Facebook"></a>
				</li>
				<li class="vk">
					<a href="" title=""></a>
				</li>
				<li class="twitter">
					<a href="You URL / Tu URL Twitter" title="World of Warcraft en Twitter"></a>
				</li>
				<li class="youtube">
					<a href="You URL / Tu URL Yotube" title="World of Warcraft en Youtube"></a>
				</li>
				<li class="reddit">
					<a href="You URL / Tu URL Reddit" title="World of Warcraft on reddit"></a>
				</li>
		<span class="clear"><!-- --></span>
		</ul>
	</div>
</div>
<!-- Social-Media / Social-Media finish --> 

<!-- Forums / Foro Start --> 
<div class="sidebar-module" id="sidebar-forums">
    <div class="sidebar-title">
        <h3 class="title-forums"><?php echo WoW_Locale::GetString('template_forums_sidebar_title'); ?></h3>
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
