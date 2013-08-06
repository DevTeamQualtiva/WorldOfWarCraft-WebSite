<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_what_is_wow'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/guide/getting-started" rel="np"><?php echo WoW_Locale::GetString('template_menu_game_guide_playing_together'); ?></a></li>
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
				<?php echo WoW_Locale::GetString('template_guide_playing_together_title'); ?>
			</div>
			<div class="guide-intro-text"><?php echo WoW_Locale::GetString('template_guide_playing_together_intro'); ?></div>
		</div>
	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			$('#chat .dialog').hover(
				function() {
					$('#chat .bubble').fadeOut('fast');
					$('#chat .cb'+ $(this).data('bubble')).fadeIn('fast');
				},
				function() {
					$('#chat .bubble').fadeOut('fast');
				}
			);
		});
	//]]>
	</script>
	<div id="chat">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_title'); ?></div>
		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_playing_together_chat_intro'); ?>
		</div>
		<div class="box box-left chat-channel">
			<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_channels'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_playing_together_chat_channels_sub'); ?>
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-chat-1-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-chat-1.jpg" alt="" />
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
		<div class="box box-right chat-voice">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_voice'); ?></div>
      <?php echo WoW_Locale::GetString('template_guide_playing_together_chat_voice_sub'); ?>
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-chat-2-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-chat-2.jpg" alt="" />
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
		<div class="box chat-other">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_other'); ?></div>
			<div class="box"><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_other_desc'); ?></div>
			<div class="bubble cb1" id="bubble-1-1"></div>
			<div class="bubble cb1" id="bubble-1-2"></div>
			<div class="bubble cb2" id="bubble-2-1"></div>
			<div class="bubble cb2" id="bubble-2-2"></div>
			<div class="bubble cb3" id="bubble-3-1"></div>
			<div class="dialog d1" data-bubble="1">
				<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_say'); ?></h3>
				<?php echo WoW_Locale::GetString('template_guide_playing_together_chat_say_desc'); ?>
			</div>
			<div class="dialog d2" data-bubble="2">
				<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_yell'); ?></h3>
				<?php echo WoW_Locale::GetString('template_guide_playing_together_chat_yell_desc'); ?>
			</div>
			<div class="dialog d3" data-bubble="3">
				<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_chat_whisp'); ?></h3>
				<?php echo WoW_Locale::GetString('template_guide_playing_together_chat_whisp_desc'); ?>
			</div>
		</div>
	</div>

	<div id="party">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_title'); ?></div>

		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_info'); ?>
		</div>

		<div class="party-info">
			<div class="left">
				<div class="box party-form">
					<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_party'); ?></div>
					<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_party_desc'); ?>
				</div>

				<div class="box party-rule">
					<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules'); ?></div>
					<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_desc'); ?>
				</div>
				
				<div class="party-rules">
					<ul>
						<li class="ffa">
							<div class="icon"></div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_ff'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_ff_desc'); ?>
						</li>
						<li class="robin">
							<div class="icon"></div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_rr'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_rr_desc'); ?>
						</li>
						<li class="group">
							<div class="icon"></div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_gl'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_gl_desc'); ?>
						</li>
						<li class="looter">
							<div class="icon"></div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_ml'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_ml_desc'); ?>
						</li>
						<li class="greed">
							<div class="icon"></div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_nbg'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_rules_nbg_desc'); ?>
						</li>
					</ul>
				</div>
			</div>

			<div class="right">
				<div class="box party-leader">
					<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_groups_leader'); ?></div>
					<?php echo WoW_Locale::GetString('template_guide_playing_together_groups_leader_desc'); ?>
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
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-party-1-large.jpg'}])">
					<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-party-1.jpg" alt="" />
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
	<span class="clear"><!-- --></span>
		</div>
	</div>


	<div id="guild">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_title'); ?></div>

		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_info'); ?>
		</div>

		<div class="box box-left guild-tabard">
			<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_tabart'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_tabart_desc'); ?>
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-1-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-1.jpg" alt="" />
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
		<div class="box guild-leader">
			<div class="leader-wrapper">
				<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_leadership'); ?></div>
				<p class="leader-p"><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_leadership_desc'); ?>
				<div class="guild-roles">
					<ul>
						<li class="ranks">
							<div class="icon"> </div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_ranks'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_ranks_desc'); ?>
						</li>
						<li class="promote">
							<div class="icon"> </div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_promote'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_promote_desc'); ?>
						</li>
						<li class="manage">
							<div class="icon"> </div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_members'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_members_desc'); ?>
						</li>
						<li class="leader">
							<div class="icon"> </div>
							<h3><?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_leader'); ?></h3>
							<?php echo WoW_Locale::GetString('template_guide_playing_together_guilds_leader_desc'); ?>
						</li>
					</ul>
	         <span class="clear"><!-- --></span>
				</div>
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
      		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-2-large.jpg'}])">
      				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-2.jpg" alt="" />
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
      	<table class="media-frame clickable">
      		<tr>
      			<td class="tl"></td>
      			<td class="tm"></td>
      			<td class="tr"></td>
      		</tr>
      		<tr>
      			<td class="ml"></td>
      			<td class="mm">
      		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-2b-large.jpg'}])">
      				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-2b.jpg" alt="" />
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
		<div class="box box-left guild-bank">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildbank_title'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildbank_info'); ?>
	<table class="media-frame clickable">
		<tr>
			<td class="tl"></td>
			<td class="tm"></td>
			<td class="tr"></td>
		</tr>
		<tr>
			<td class="ml"></td>
			<td class="mm">
		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-3-large.jpg'}])">
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-3.jpg" alt="" />
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
		<div class="box box-right guild-chat">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildchat_title'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildchat_info'); ?>
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-4-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-4.jpg" alt="" />
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
		<div class="box box-left guild-advance">
			<div class="guide-content-subtitle single-line"><?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildadvanced_title'); ?></div>
			<?php echo WoW_Locale::GetString('template_guide_playing_together_guild_guildadvanced_info'); ?>As your guild members grow in number and play together, your guild earns experience points that eventually translate into special perks and other bonuses for your guild as a whole. The more you play with other members of your guild, the more experience you earn for your guild.
    	<table class="media-frame clickable">
    		<tr>
    			<td class="tl"></td>
    			<td class="tm"></td>
    			<td class="tr"></td>
    		</tr>
    		<tr>
    			<td class="ml"></td>
    			<td class="mm">
    		<div class="magnifying-wrapper" onclick="Lightbox.loadImage([{ path: '', src:'<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-5-large.jpg'}])">
    				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/ss-guild-5.jpg" alt="" />
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
	<div id="friends">
		<div class="guide-content-title"><?php echo WoW_Locale::GetString('template_guide_playing_together_friends_title'); ?></div>
		<div class="box box-left intro">
			<?php echo WoW_Locale::GetString('template_guide_playing_together_friends_info'); ?>
		</div>
		<div class="friends">
			<div class="box friends-list">
				<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_playing_together_friends_list'); ?></div>
				<?php echo WoW_Locale::GetString('template_guide_playing_together_friends_list_desc'); ?>
			</div>
			<div class="box friends-realid">
				<div class="guide-content-subtitle"><?php echo WoW_Locale::GetString('template_guide_playing_together_friends_realid'); ?></div>
				<img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/playing-together/real-id.gif" alt=""  class="real-id" />
				<?php echo WoW_Locale::GetString('template_guide_playing_together_friends_realid_desc'); ?>
	    <span class="clear"><!-- --></span>
				<br/>
	      <a class="ui-button button2-next" href="http://us.battle.net/en/realid/"><span><span><?php echo WoW_Locale::GetString('template_guide_playing_together_friends_realid_more'); ?></span></span></a>
			</div>
		</div>
	</div>
		<div class="guide-page-nav">
			<span class="current-guide-title"><?php echo WoW_Locale::GetString('template_guide_nav_iii'); ?></span>
			<div class="nav-buttons">
				<a href="how-to-play" class="prev">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/how-to-play-prev.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_ii'); ?></span>
					</span>
				</a>
				<a href="late-game" class="next">
					<span>
						<span style="background-image:url('<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/guide/late-game-next.gif');"><?php echo WoW_Locale::GetString('template_guide_nav_iv'); ?></span>
					</span>
				</a>
			</div>
		</div>
</div>
</div>
