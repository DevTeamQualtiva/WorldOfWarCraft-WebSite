<form action="<?php echo WoW::GetWoWPath(); ?>/wow/discussion/blog.<?php echo WoW::GetBlogData('id'); ?>/comment?d_ref=%2F<?php echo WoW::GetWoWPath(); ?>%2Fwow%2Fblog%2F<?php echo WoW::GetBlogData('id'); ?>" method="post" onsubmit="return Cms.Comments.validateComment(this);" id="comment-form-reply" class="nested">
    	<fieldset>
            <input type="hidden" id="replyTo" name="replyTo" value=""/>
            <input type="hidden" name="xstoken" value="<?php echo WoW_Account::GetSessionInfo('wow_sid'); ?>"/>
            <input type="hidden" name="sessionPersist" value="discussion.comment"/>
            <input type="hidden" name="commentId" value=""/>
        </fieldset>
        <div class="new-post">
            <div class="comment">
					<div class="portrait-c ajax-update">
								<div class="avatar-interior">
									<?php
                                    echo sprintf('<a href="%s">
										<img height="64" src="%s/wow/static/images/2d/avatar/%d-%d.jpg" alt="" />
									</a>', WoW_Account::GetActiveCharacterInfo('url'), WoW::GetWoWPath(), WoW_Account::GetActiveCharacterInfo('race'), WoW_Account::GetActiveCharacterInfo('gender'));
                                    ?>
								</div>
					</div>
                    <div class="comment-interior">
                        <div class="character-info user ajax-update">
                        <!--commentThrottle[]-->
    <div class="user-name">
		<span class="char-name-code" style="display: none">
			<?php echo WoW_Account::GetActiveCharacterInfo('name'); ?> 
		</span>
	<div id="context-2" class="ui-context character-select">
		<div class="context">
			<?php
            $primary_character_context = sprintf('<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
			<div class="context-user">
				<strong>%s</strong><br /><span class="realm up">%s</span>
			</div>
			<div class="context-links">
					<a href="%s" title="%s" rel="np" class="icon-profile link-first">%s</a>
					<a href="%s/wow/search?f=post&amp;a=%s&amp;s=time" title="%s" rel="np" class="icon-posts"> </a>
					<a href="%s/wow/vault/character/auction/horde/" title="%s" rel="np" class="icon-auctions"> </a>
					<a href="%s/wow/vault/character/event" title="%s" rel="np" class="icon-events link-last"> </a>
			</div>',
            WoW_Account::GetActiveCharacterInfo('name'), WoW_Account::GetActiveCharacterInfo('realmName'),
            WoW_Account::GetActiveCharacterInfo('url'), WoW_Locale::GetString('template_profile_caption'), WoW_Locale::GetString('template_profile_caption'),
            WoW::GetWoWPath(), urlencode(WoW_Account::GetActiveCharacterInfo('name') . '@' . WoW_Account::GetActiveCharacterInfo('realmName')), WoW_Locale::GetString('template_my_forum_posts_caption'),
            WoW::GetWoWPath(), WoW_Locale::GetString('template_browse_auction_caption'),
            WoW::GetWoWPath(), WoW_Locale::GetString('template_browse_events_caption')
            );
            echo $primary_character_context;
            ?>
		</div>
<?php WoW_Template::LoadTemplate('block_user_characters'); ?>
	</div>
        <?php
        echo sprintf('<a href="%s" class="context-link" rel="np">%s</a>', WoW_Account::GetActiveCharacterInfo('url'), WoW_Account::GetActiveCharacterInfo('name'));
        ?>
    </div>
                        </div>
						
                        <div class="content">
                            <div class="comment-ta">
                                <textarea id="comment-ta-reply" cols="78" rows="3" name="detail" onfocus="textAreaFocused = true;" onblur="textAreaFocused = false;"></textarea>
                            </div>
                            <div class="action">
                            	<div class="cancel">
                                	<span class="spacer">|</span>
                                	<a href="javascript:;" onclick="$('#comment-form-reply').slideUp();"><?php echo WoW_Locale::GetString('template_blog_cancel_report'); ?></a>
                                </div>
                            	<div class="submit">
	<button class="ui-button button1 comment-submit" type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_blog_add_post_button'); ?></span>
		</span>
	</button>
                                </div>
	<span class="clear"><!-- --></span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </form>
	<script type="text/javascript">
		//<![CDATA[
			var textAreaFocused = false;
		//]]>
	</script>
    <form action="<?php echo WoW::GetWoWPath(); ?>/wow/discussion/blog.<?php echo WoW::GetBlogData('id'); ?>/comment?d_ref=%2Fwow%2Fblog%2F<?php echo WoW::GetBlogData('id'); ?>" method="post" onsubmit="return Cms.Comments.validateComment(this);" id="comment-form">
    	<fieldset>
            <input type="hidden" name="xstoken" value="<?php echo WoW_Account::GetSessionInfo('wow_sid'); ?>"/>
            <input type="hidden" name="sessionPersist" value="discussion.comment"/>
        </fieldset>
        <div class="new-post">
            <div class="comment">
					<div class="portrait-b ajax-update">
								<div class="avatar-interior">
									<?php
                                    echo sprintf('<a href="%s">
										<img height="64" src="%s/wow/static/images/2d/avatar/%d-%d.jpg" alt="" />
									</a>', WoW_Account::GetActiveCharacterInfo('url'), WoW::GetWoWPath(), WoW_Account::GetActiveCharacterInfo('race'), WoW_Account::GetActiveCharacterInfo('gender'));
                                    ?>
								</div>
					</div>
                    <div class="comment-interior">
                        <div class="character-info user ajax-update">
                        <!--commentThrottle[]-->
    <div class="user-name">
		<span class="char-name-code" style="display: none">
			Тонкс 
		</span>
	<div id="context-3" class="ui-context character-select">
		<div class="context">
			<?php
            echo $primary_character_context;
            ?>
		</div>
<?php WoW_Template::LoadTemplate('block_user_characters'); ?>
	</div>
        <?php
        echo sprintf('<a href="%s" class="context-link" rel="np">%s</a>', WoW_Account::GetActiveCharacterInfo('url'), WoW_Account::GetActiveCharacterInfo('name'));
        ?>
    </div>
                        </div>
                        <div class="content">
                            <div class="comment-ta">
                                <textarea id="comment-ta" cols="78" rows="3" name="detail" onfocus="textAreaFocused = true;" onblur="textAreaFocused = false;"></textarea>
                            </div>
                            <div class="action">
                            	<div class="cancel">
                                	<span class="spacer">|</span>
                                	<a href="javascript:;" onclick="$('#comment-form-reply').slideUp();"><?php echo WoW_Locale::GetString('template_blog_cancel_report'); ?></a>
                                </div>
                            	<div class="submit">
	<button class="ui-button button1 comment-submit " type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_blog_add_post_button'); ?></span>
		</span>
	</button>
                                </div>
	<span class="clear"><!-- --></span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </form>