<?php echo'<div id="what-is-bnet">
			<div class="cell" id="intro">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_intro_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_intro_text') . '</p>
			</div>
			<div class="cell" id="info-community">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_community_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_community_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-match">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_match_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_match_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-play">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_play_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_play_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-compete">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_compete_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_compete_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-cloud">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_cloud_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_cloud_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-media">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_media_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_media_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-modding">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_modding_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_modding_text') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>

			<div class="cell" id="info-connect">
				<h2>' . WoW_Locale::GetString('template_bn_what_is_it_connect_header') . '</h2>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_connect_text') . '</p>
				<p>' . WoW_Locale::GetString('template_bn_what_is_it_connect_text_real_id') . '</p>
				<a href="#what-is-bnet" class="back-link">' . WoW_Locale::GetString('template_bn_what_is_it_top') . '</a>
			</div>';
?>
			<br />

				<p class="align-center">
				<a class="ui-button button1" href="<?php echo WoW::GetWoWPath(); ?>/account/creation/tos.html">
				<span class="button-left"><span class="button-right"><?php echo WoW_Locale::GetString('template_bn_new_account'); ?></span></span></a>
					<span style="padding-left: 10px">
						<?php echo WoW_Locale::GetString('template_bn_got_account'); ?> <a href="<?php echo WoW::GetWoWPath(); ?>?login" onclick="return Login.open('<?php echo WoW::GetWoWPath(); ?>/login/login.frag')" tabindex="1"><?php echo WoW_Locale::GetString('template_bn_log_in'); ?></a>
					</span>
				</p>

			<br />
		</div>
