<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_what_is_wow'); ?></a></li>
</ol>-->
</div>
<div class="content-bot">
		<div class="guide-top-nav">
<?php
$game_guide_menu = array('game_guide_what_is_wow', 'game_guide_getting_started', 'game_guide_how_to_play', 'game_guide_playing_together', 'game_guide_late_game');
foreach($game_guide_menu as $active_menu) {
    $menu_id = str_replace(array('game_guide_', '_'), array('', '-'), $active_menu);
    if(WoW_Template::GetPageIndex() == $active_menu) {
        echo '				<a class="btn-'.$menu_id.' selected">
					<span>'.WoW_Locale::GetString('template_menu_game_chapter_'.$menu_id).'</span>
				</a>';
    }
    else {
        echo '				<a href="'.WoW::GetWoWPath().'/wow/game/guide/'.($menu_id == 'what-is-wow' ? '' : $menu_id).'" class="btn-'.$menu_id.'">
					<span>'.WoW_Locale::GetString('template_menu_game_chapter_'.$menu_id).'</span>
				</a>';
    }
}
?>		
	<span class="clear"><!-- --></span>
		</div>
		<div class="guide-intro-part">
			<div class="guide-section-title">
				<a href="<?php echo WoW::GetWoWPath(); ?>/wow/"><?php echo WoW_Locale::GetString('template_guide_title'); ?>
				<?php echo WoW_Locale::GetString('template_guide_what_is_wow_title'); ?>
			</div>
			<div class="guide-intro-text"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_intro'); ?></div>
		</div>


	<div class="part1-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part1_title'); ?></span>
		<div class="part1-desc01 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part1_subdesc'); ?></div>		
		<div class="part1-detail">			
			<div class="multiplayer">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_multiplayer_subtitle'); ?></span>
				<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_multiplayer_desc'); ?></div>
			</div>
	    <span class="clear"><!-- --></span>
			<div class="online">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_online_subtitle'); ?></span>
				<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_online_desc'); ?></div>
			</div>
	    <span class="clear"><!-- --></span>
			<div class="role-playing">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_role-playing_subtitle'); ?></span>
				<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_role-playing_desc'); ?></div>
			</div>
	    <span class="clear"><!-- --></span>
		</div>
		<div class="part1-desc02 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part1_subdesc2'); ?></div>
	</div>
	<div class="part2-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part2_title'); ?></span>
		<div>
			<div class="part2-desc01 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part2_subdesc'); ?></div>
			<div class="part2-desc02">
				<em><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part2_factions'); ?></em>
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_factions'); ?></span>
				<div class="race-alliance guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_alliance'); ?></div>
				<div class="race-horde guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_horde'); ?></div>
			</div>
			<div class="part2-desc03 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_factions_desc'); ?></div>
	<span class="clear"><!-- --></span>
		</div>
	</div>
	<div class="part3-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part3_title'); ?></span>
		<div class="part3-desc01 guide-sub-desc">
			<?php echo WoW_Locale::GetString('template_guide_what_is_wow_part3_subdesc'); ?>
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/part3-ss1-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/part3-ss1.jpg" alt="" />
    			<span class="magnifying-glass"></span>
    		</div>
    			</td>
    			<td class="mr"></td>
    		</tr>
    		<tr>
    			<td class="bl"></td>
    			<td class="bm"></td>
    			<td class="br"></td>
    		</tr>
    	</table>
		</div>
		<div class="part3-desc02">
			<em><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part3_classesraces'); ?></em>
			<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part3_subtitle'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part3_subdesc2'); ?></div>
		</div>
	</div>
	<span class="clear"><!-- --></span>
	<div class="part4-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part4_title'); ?></span>
		<div class="part4-desc01 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part4_subdesc'); ?></div>
		<div class="part4-desc02">
			<span class="guide-content-subtitle" style="background:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/icon-dungeon.gif')"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_dungeons'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_dungeons_desc'); ?></div>
			<span class="guide-content-subtitle" style="background:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/icon-raid.gif')"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_raids'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_raids_desc'); ?></div>		
		</div>
		<div class="part4-desc03">
			<span class="guide-content-subtitle" style="background:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/icon-pvp.gif')"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_pvp'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_pvp_desc'); ?></div>
			<span class="guide-content-subtitle" style="background:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/icon-battleGround.gif')"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_bg'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_bg_desc'); ?></div>
			<span class="guide-content-subtitle" style="background:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow/icon-arena.gif')"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_arena'); ?></span>
			<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_arena_desc'); ?></div>
		</div>
	
	</div>
	<div class="part5-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part5_title'); ?></span>
		<div class="part5-desc01 guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_what_is_wow_part5_subdesc'); ?></div>	
	</div>
	<span class="clear"><!-- --></span>

		<div class="guide-page-nav">
			<span class="current-guide-title"><?php echo WoW_Locale::GetString('template_guide_nav_title'); ?></span>
			<div class="nav-buttons">
				<a href="late-game" class="prev">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game-prev.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_iv'); ?></span>
					</span>
				</a>
				<a href="getting-started" class="next">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/getting-started-next.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_i'); ?></span>
					</span>
				</a>
			</div>
		</div>
</div>
</div>
</div>
