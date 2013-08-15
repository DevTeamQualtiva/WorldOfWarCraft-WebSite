
<div>
	<div class="sidebar-title">
		<h3 class="title-forums">
			<a href="<?php echo WoW::GetWoWPath(); ?>/wow/forum/"><?php echo WoW_Locale::GetString('template_menu_forums'); ?></a>
		</h3>
	</div>

	<div class="sidebar-content poptopic-list">
            <?php
            $popular = WoW_Forums::GetPopularThreads();
            if(is_array($popular)) {
                foreach($popular as $thread) {
                    echo sprintf('<a href="%s/wow/forum/topic/%d">
				<span class="int">
					<span class="title">
						%s
					</span>
					<span class="desc">
						%s <span class="loc">%s</span>
					</span>
				</span>
			</a>', WoW::GetWoWPath(), $thread['thread_id'], $thread['title'], WoW_Locale::GetString('template_forums_in'), $thread['categoryTitle']);
                }
            }
            ?>
	</div>
</div>
