		<div id="what-is-bnet">
            <?php
            $what_is = array(
                'intro', 'community', 'match', 'play', 'compete', 'cloud', 'media', 'modding', 'connect'
            );
            foreach($what_is as $what) {
                echo sprintf('
			<div class="cell" id="%s">
				<h2>%s</h2>
				<p>%s</p>
			</div>
            
',
                $what == $what_is[0] ? $what : 'info-' . $what, WoW_Locale::GetString('template_bn_what_is_it_' . $what . '_header'), WoW_Locale::GetString('template_bn_what_is_it_' . $what . '_text') );
            }
            ?>

			<br />
            <p class="align-center">
                <a class="ui-button button1" href="<?php echo WoW::GetWoWPath(); ?>/account/creation/tos.html"><span><span><?php echo WoW_Locale::GetString('template_bn_new_account'); ?></span></span></a>
                    <span style="padding-left: 10px">
                        <?php echo WoW_Locale::GetString('template_bn_got_account'); ?> <a href="?login" onclick="return Login.open('/login/login.frag')"><?php echo WoW_Locale::GetString('template_bn_log_in'); ?></a>
                    </span>
                </p>
            <br />
        </div>