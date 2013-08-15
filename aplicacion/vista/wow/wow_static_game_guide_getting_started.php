<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_what_is_wow'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/getting-started" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_getting_started'); ?></a></li>
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
				<?php echo WoW_Locale::GetString('template_guide_getting_started_title'); ?>
			</div>
			<div class="guide-intro-text"><?php echo WoW_Locale::GetString('template_guide_getting_started_intro'); ?></div>
		</div>
	<div class="step1-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_title'); ?></span>
		<div class="wrapper">
			<div class="left-col">			
				<div class="guide-sub-desc choose-realm-desc">
					<?php echo WoW_Locale::GetString('template_guide_getting_started_step1_info'); ?>
        	<table class="media-frame clickable">
        		<tr>
        			<td class="tl"></td>
        			<td class="tm"></td>
        			<td class="tr"></td>
        		</tr>
        		<tr>
        			<td class="ml"></td>
        			<td class="mm">
        		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/getting-started/step1-ss1-large.jpg'}])">
        						<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/getting-started/step1-ss1.jpg" alt="" />
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
			<div class="right-col">	
				<div class="sever-type-list">
					<div class="guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_subdesc'); ?></div>
					<ul>
						<?php echo WoW_Locale::GetString('template_guide_getting_started_step1_realms'); ?>
					</ul>
				</div>
			</div>
	<span class="clear"><!-- --></span>
			<div class="raf-desc">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_recruit'); ?></span>
				<?php echo WoW_Locale::GetString('template_guide_getting_started_step1_recruit_info'); ?>
			</div>				
		</div>
				
		<div class="interface">
			<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_char_interface'); ?></span>
	<table class="media-frame">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
				<div id="interface-viewer">
						<a href="javascript:;" id="div01"></a>
						<a href="javascript:;" id="div02"></a>
						<a href="javascript:;" id="div03"></a>
						<a href="javascript:;" id="div04"></a>
						<a href="javascript:;" id="div05"></a>
						<a href="javascript:;" id="div06"></a>
						<a href="javascript:;" id="div07"></a>
						<a href="javascript:;" id="div08"></a>
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
			<ul id="interface-list">
					<li><a href="javascript:;" class="l-01"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_race'); ?></a></li>
					<li><a href="javascript:;" class="l-02"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_gender'); ?></a></li>
					<li><a href="javascript:;" class="l-03"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_class'); ?></a></li>
					<li><a href="javascript:;" class="l-04"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_custom'); ?></a></li>
					<li><a href="javascript:;" class="l-05"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_trans'); ?></a></li>
					<li><a href="javascript:;" class="l-06"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_name'); ?></a></li>
					<li><a href="javascript:;" class="l-07"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_racedesc'); ?></a></li>
					<li><a href="javascript:;" class="l-08"><?php echo WoW_Locale::GetString('template_guide_getting_started_step1_classdesc'); ?></a></li>
			</ul>
	<script type="text/javascript">
	//<![CDATA[
				$(document).ready(function(){
					$('#interface-list').find('a').mouseover(function(){
						$('#'+ $(this).attr('class').replace('l-','div')).addClass('over');
					});
					$('#interface-list').find('a').mouseout(function(){
						$('#'+$(this).attr('class').replace('l-','div')).removeClass('over');
					});
					$('#interface-viewer').find('a').mouseover(function(){
						$('#interface-list .'+ $(this).attr('id').replace('div','l-')).addClass('over');
					});
					$('#interface-viewer').find('a').mouseout(function(){
						$('#interface-list .'+$(this).attr('id').replace('div','l-')).removeClass('over');
					});
				});
	//]]>
	</script>
		</div>
	</div>

	<div class="step2-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_title'); ?></span>
		<div class="guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_info'); ?></div>
		<div class="races-list">
			<div class="alliance-group races-group">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_alliance'); ?></span>
				<ul>
							<li>
								<a href="../race/worgen">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_worgen_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_worgen'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/draenei">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_draenei_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_draenei'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/dwarf">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_dwarf_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_dwarf'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/gnome">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_gnome_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_gnome'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/human">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_human_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_human'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/night-elf">
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_night-elf_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_nightelf'); ?></span>
								</a>
							</li>
				</ul>
			</div>
			<div class="horde-group races-group">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_horde'); ?></span>
				<ul>
							<li>
								<a href="../race/goblin">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_goblin_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_goblin'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/blood-elf">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_blood-elf_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_blodelf'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/orc">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_orc_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_orc'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/tauren">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_tauren_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_tauren'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/troll">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_troll_female.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_troll'); ?></span>
								</a>
							</li>
							<li>
								<a href="../race/forsaken">
								
									<span class="icon-frame frame-36" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/race_forsaken_male.jpg);"><span class="frame"></span></span>
									<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_forsaken'); ?></span>
								</a>
							</li>
				</ul>
			</div>
  	<span class="clear"><!-- --></span>
    <a class="ui-button button2-next" href="<?php echo WoW::GetWoWPath(); ?>/wow/game/race/"><span><span><?php echo WoW_Locale::GetString('template_guide_getting_started_step2_more'); ?></span></span></a>
		</div>
	</div>

	<div class="step3-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_title'); ?></span>
		<div class="content-col-left">
			<div class="guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_info'); ?></div>
			<div class="class-group">
				<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_subtitle'); ?></span>
				<ul>
						<li>
							<a href="../class/warrior">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_warrior.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_warrior'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/paladin">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_paladin.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_paladin'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/hunter">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_hunter.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_hunter'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/rogue">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_rogue.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_rogue'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/priest">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_priest.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_priest'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/death-knight">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_death-knight.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_deathknight'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/shaman">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_shaman.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_shaman'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/mage">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_mage.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_mage'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/warlock">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_warlock.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_warlock'); ?></span>
							</a>
						</li>
						<li>
							<a href="../class/druid">
								<span class="icon-frame frame-36"
									style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/icons/36/class_druid.jpg);">
									<span class="frame"></span>
								</span>
								<span class="list-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_druid'); ?></span>
							</a>
						</li>
				</ul>
    	<span class="clear"><!-- --></span>
    	<a class="ui-button button2-next" href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/"><span><span><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_more'); ?></span></span></a>
			</div>
		</div>
		<div class="content-col-right">
			<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_class'); ?></span>
			<div class="class-role">
				<div class="tank">
					<span class="class-role-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_tanks'); ?></span>
					<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_tanks_desc'); ?></div>
				</div>
				<div class="healer">
					<span class="class-role-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_healers'); ?></span>
					<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_healers_desc'); ?></div>
				</div>
				<div class="dealer">
					<span class="class-role-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_damage'); ?></span>
					<div class="guide-detail-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step3_damage_desc'); ?></div>
				</div>
			</div>
		</div>
	<span class="clear"><!-- --></span>
	</div>

	<div class="step4-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step4_title'); ?></span>
		<div class="guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step4_info'); ?></div>
	</div>
	<div class="step5-div">
		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_getting_started_step5_title'); ?></span>
		<div class="guide-sub-desc"><?php echo WoW_Locale::GetString('template_guide_getting_started_step5_info'); ?></div>
	</div>


		<div class="guide-page-nav">
			<span class="current-guide-title"><?php echo WoW_Locale::GetString('template_guide_nav_i'); ?></span>
			<div class="nav-buttons">
				<a href="./" class="prev">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/what-is-wow-prev.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_title'); ?></span>
					</span>
				</a>
				<a href="how-to-play" class="next">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/how-to-play-next.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_ii'); ?></span>
					</span>
				</a>
			</div>
		</div>
	</div>
</div>
</div>
