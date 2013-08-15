<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_what_is_wow'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/getting-started" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_how_to_play'); ?></a></li>
</li>
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
				<?php echo WoW_Locale::GetString('template_guide_how_to_play_title'); ?>
			</div>
			<div class="guide-intro-text"><?php echo WoW_Locale::GetString('template_guide_how_to_play_intro'); ?></div>
		</div>

		<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui'); ?>UI Overview</span>
		<div class="guide-sub-desc">
			<?php echo WoW_Locale::GetString('template_guide_how_to_play_uidesc'); ?>
		</div>

		<div class="interface">
			<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_subtitle'); ?></span>
			<div id="interface-viewer">
						<div class="div01 hidden"></div>
						<div class="div02 hidden"></div>
						<div class="div03 hidden"></div>
						<div class="div04 hidden"></div>
						<div class="div05 hidden"></div>
						<div class="div06 hidden"></div>
						<div class="div07 hidden"></div>
						<div class="div08 hidden"></div>
						<div class="div09 hidden"></div>
						<div class="div10 hidden"></div>
						<div class="div11 hidden"></div>
						<div class="div12 hidden"></div>
			</div>
			<ul id="interface-list">
					<li><a href="javascript:;" class="l-01"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_charportrait'); ?></a></li>
					<li><a href="javascript:;" class="l-02"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_charhealth'); ?></a></li>
					<li><a href="javascript:;" class="l-03"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_charresource'); ?></a></li>
					<li><a href="javascript:;" class="l-04"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_targethealth'); ?></a></li>
					<li><a href="javascript:;" class="l-05"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_targetresource'); ?></a></li>
					<li><a href="javascript:;" class="l-06"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_targetportrait'); ?></a></li>
					<li><a href="javascript:;" class="l-07"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_map'); ?></a></li>
					<li><a href="javascript:;" class="l-08"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_special'); ?></a></li>
					<li><a href="javascript:;" class="l-09"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_bar'); ?></a></li>
					<li><a href="javascript:;" class="l-10"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_menu'); ?></a></li>
					<li><a href="javascript:;" class="l-11"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_inv'); ?></a></li>
					<li><a href="javascript:;" class="l-12"><?php echo WoW_Locale::GetString('template_guide_how_to_play_ui_tip'); ?></a></li>
			</ul>
	<script type="text/javascript">
	//<![CDATA[
				$(function(){
					function toggleVis(which){
						
						var source = which.currentTarget;
						if(!$(source).attr('class')) { return } 
						
						var	target = $(source).attr('class').replace('l-','div');
						$("."+target).toggleClass('hidden');
					}
					$('#interface-list a').mouseover(toggleVis).mouseout(toggleVis);
					
					function listHover(which){
						
						var source = which.currentTarget,
							target = $(source).attr('class').split(' ')[0].replace('div','l-');	
						
						$(source).toggleClass('hidden')
						$("."+target).toggleClass(target+'-hover');
					}
					
					$('#interface-viewer > div').mouseover(listHover).mouseout(listHover);
				});
	//]]>
	</script>
		</div>
		
		<div class="htp-2">
			<div class="left-col">
				<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_how_to_play_abilities_title'); ?></span>
				<div class="guide-sub-desc">
					<?php echo WoW_Locale::GetString('template_guide_how_to_play_abilities_info'); ?>
				</div>
				<div class="character-image">
				</div>
			</div>
			<div class="right-col">
				<div class="parchment parchment-tall"><div class="parchment-interior">
					<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_how_to_play_abilities_subtitle'); ?></span>
					<?php echo WoW_Locale::GetString('template_guide_how_to_play_abilities_desc'); ?>
				</div></div>
			</div>
	     <span class="clear"><!-- --></span>
			<div class="section2">
				<div class="left-col">
					<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_how_to_play_talents_title'); ?></span>
					<div class="guide-sub-desc">
						<?php echo WoW_Locale::GetString('template_guide_how_to_play_talents_info'); ?>
					</div>
				</div>
				<div class="right-col">
        	<table class="media-frame clickable">
        		<tr>
        			<td class="tl"></td>
        			<td class="tm"></td>
        			<td class="tr"></td>
        		</tr>
        		<tr>
        			<td class="ml"></td>
        			<td class="mm">
        		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/how-to-play/talent-screenshot-large.jpg'}])">
        						<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/how-to-play/talent-screenshot.jpg" alt="" />
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
	     <span class="clear"><!-- --></span>
			<div class="section3">
				<div class="section3-image">
				</div>
				<div class="left-col">
					<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_title'); ?></span>
					<div class="guide-sub-desc">
						<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_info'); ?>
					</div>
				</div>
	       <span class="clear"><!-- --></span>
				<div class="left-col">
					<div class="section-list">
						<div class="column-break">
							<div class="left-col">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet1"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_givers'); ?></td>
        					</tr></table>
								</div>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_giversdesc'); ?> 
								</div>
							</div>
							<div class="right-col">
								<div class="section-list-image img1"></div>
							</div>
						</div>
						<div class="column-break">
							<div class="left-col">
								<div class="section-list-image img2"></div>
							</div>
							<div class="right-col">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet2"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_items'); ?></td>
        					</tr></table>
								</div>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_itemsdesc'); ?>
								</div>
							</div>
						</div>
						<div class="column-break">
							<div class="left-col">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet3"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_objects'); ?></td>
        					</tr></table>
								</div>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_objectsdesc'); ?>
								</div>
							</div>
							<div class="right-col">
								<div class="section-list-image img3"></div>
							</div>
						</div>
						<div class="column-break">
							<div class="left-col">
								<div class="section-list-image img4"></div>
							</div>
							<div class="right-col">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet4"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_complete'); ?></td>
        					</tr></table>
								</div>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_completedesc'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="right-col">
					<div class="section3-parchment">
						<div class="parchment parchment-short"><div class="parchment-interior">
							<span class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_subtitle'); ?></span>
							<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_desc'); ?>
							<div class="quest-type">
										<div class="quest-type-title img1"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_normal'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_normal_desc'); ?>
										</div>
										<div class="quest-type-title img2"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_group'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_group'); ?>
										</div>
										<div class="quest-type-title img3"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_dungeon'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_dungeon'); ?>
										</div>
										<div class="quest-type-title img4"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_heroic'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_heroic'); ?>
										</div>
										<div class="quest-type-title img5"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_raid'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_raid'); ?>
										</div>
										<div class="quest-type-title img6"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_pvp'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_pvp'); ?>
										</div>
										<div class="quest-type-title img7"><?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_daily'); ?></div>
										<div class="quest-type-desc">
											<?php echo WoW_Locale::GetString('template_guide_how_to_play_quests_daily'); ?>
										</div>
							</div>
						</div></div>
					</div>
				</div>
	       <span class="clear"><!-- --></span>
				<div class="section4">
					<div class="left-col">
						<span class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_title'); ?></span>
						<div class="guide-sub-desc">
							<?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_info'); ?>
						</div>
					</div>
					<div class="right-col">
						<div class="section-list">
							<div class="column-break">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet5"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_backpack'); ?></td>
        					</tr></table>
								</div>							
								<div class="left-col">
									<div class="bullet-desc">
										<?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_backpackdesc'); ?>
									</div>
								</div>
								<div class="right-col">
									<div class="section-list-image img5"></div>
								</div>
							</div>
							<div class="column-break">
								<div class="left-col">
									<div class="section-list-image img6"></div>
								</div>
								<div class="right-col">
									<div class="guide-content-subtitle">
          					<table><tr>
          					<td class="bullet-img"><div class="icon-bullet bullet6"></div></td>
          					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_bank'); ?></td>
          					</tr></table>
									</div>
									<div class="bullet-desc">
										<?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_bankdesc'); ?>
									</div>
								</div>
							</div>
							<div class="column-break">
								<div class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet7"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_auction'); ?></td>
        					</tr></table>
								</div>
								<div class="left-col">								
									<div class="bullet-desc">
										<?php echo WoW_Locale::GetString('template_guide_how_to_play_inventory_auctiondesc'); ?>
									</div>
								</div>
								<div class="right-col">
									<div class="section-list-image img7"></div>
								</div>
							</div>
						</div>
					</div>
	         <span class="clear"><!-- --></span>
				</div>
			</div>
	     <span class="clear"><!-- --></span>
			<div class="section5">
				<span class="guide-content-title">
					<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends'); ?>
					<span class="guide-content-subtitle aside">
						<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_comment'); ?>
					</span>
				</span>
				<div class="left-col">
					<div class="guide-sub-desc">
						<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_info'); ?>
					</div>
					<div class="guide-sub-desc image-buffer">
						<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_info2'); ?>
					</div>
				</div>
				<div class="right-col">
					<div class="section3-parchment">
						<div class="parchment parchment-short"><div class="parchment-interior">
							<div class="">
								<span class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet11"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_chat'); ?></td>
        					</tr></table>
								</span>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_chatdesc'); ?>
								</div>
							</div>
							<div class="">
								<span class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet8"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_groups'); ?></td>
        					</tr></table>
								</span>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_groupsdesc'); ?>
								</div>
							</div>
							<div class="">
								<span class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet9"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_guilds'); ?></td>
        					</tr></table>
								</span>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_guildsdesc'); ?> 
								</div>
							</div>
							<div class="">
								<span class="guide-content-subtitle">
        					<table><tr>
        					<td class="bullet-img"><div class="icon-bullet bullet10"></div></td>
        					<td><?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_friends'); ?></td>
        					</tr></table>
								</span>
								<div class="bullet-desc">
									<?php echo WoW_Locale::GetString('template_guide_how_to_play_friends_friendsdesc'); ?> 
								</div>
							</div>
						</div></div>
					</div>
				</div>
	       <span class="clear"><!-- --></span>
			</div>
		</div>
		<div class="guide-page-nav">
			<span class="current-guide-title"><?php echo WoW_Locale::GetString('template_guide_nav_ii'); ?></span>
			<div class="nav-buttons">
				<a href="getting-started" class="prev">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/getting-started-prev.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_i'); ?></span>
					</span>
				</a>
				<a href="playing-together" class="next">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together-next.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_iii'); ?></span>
					</span>
				</a>
			</div>
		</div>
</div>
</div>
</div>
