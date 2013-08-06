<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_what_is_wow'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/getting-started" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_late_game'); ?></a></li>
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
				<?php echo WoW_Locale::GetString('template_guide_late_game_title'); ?>
			</div>
			<div class="guide-intro-text"><?php echo WoW_Locale::GetString('template_guide_late_game_intro'); ?></div>
		</div>
	<div id="dungeons">
		<div class="dungeon-info">
			<div class="box dungeon-finder">
				<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_finder'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_finder_desc'); ?>
			</div>
			<div class="box dungeon-instance">
				<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_instance'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_instance_desc'); ?>
			</div>
			<div class="box dungeon-monsters">
				<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_boss'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_boss_desc'); ?>
			</div>
			<div class="box dungeon-wipe">
				<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_fire'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_fire_desc'); ?>
			</div>
			<div class="box dungeon-loot">
				<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_glitt'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_late_game_dungeons_glitt_desc'); ?>
			</div>
		</div>
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_late_game_dungeons'); ?></div>
		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_late_game_sungeons_sub'); ?>
		</div>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-dungeons-1-large.jpg'}])">
			<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-dungeons-1.jpg" alt="" />
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

	<span class="clear"><!-- --></span>
	</div>

	<div id="raids">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_late_game_raids'); ?></div>

		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_late_game_raids_sub'); ?>
		</div>

		<div class="box box-left raid-challenge">
			<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_late_game_raids_chalenge'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_raids_chalenge_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-1-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-1.jpg" alt="" />
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

		<div class="box box-right raid-experience">
			<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_late_game_raids_exp'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_raids_exp_desc'); ?>
	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-2-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-2.jpg" alt="" />
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

		<div class="box box-left raid-reward">
			<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_late_game_raids_reward'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_raids_reward_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-3-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-raids-3.jpg" alt="" />
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
	</div>

	<div id="pvp">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp'); ?></div>

		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_late_game_pvp_sub'); ?>
		</div>

		<div class="box box-left pvp-bg">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp_bg'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_pvp_bg_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-2-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-2.jpg" alt="" />
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

		<div class="box box-right pvp-arena">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp_arena'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_pvp_arena_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-4-large.jpg'}])">
					<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-4.jpg" alt="" />
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

		<div class="box box-left pvp-objective">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp_obj'); ?></div>
      <?php echo WoW_Locale::GetString('template_guide_late_game_pvp_obj_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-3-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-3.jpg" alt="" />
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

		<div class="box box-right pvp-duels">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp_duels'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_pvp_duels_desc'); ?> 

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-5-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-5.jpg" alt="" />
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

		<div class="box box-left pvp-world">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_late_game_pvp_world'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_late_game_pvp_world_desc'); ?>

	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-1-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game/ss-pvp-1.jpg" alt="" />
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
	</div>
	
	<div id="finale">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_late_game_finale'); ?></div>
		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_late_game_finale_desc'); ?>
		</div>
	</div>
		<div class="guide-page-nav">
			<span class="current-guide-title"><?php echo WoW_Locale::GetString('template_guide_nav_iv'); ?></span>
			<div class="nav-buttons">
				<a href="playing-together" class="prev">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together-prev.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_iii'); ?></span>
					</span>
				</a>
				<a href="./" class="next">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow-next.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_title'); ?></span>
					</span>
				</a>
			</div>
		</div>
  </div>
</div>
