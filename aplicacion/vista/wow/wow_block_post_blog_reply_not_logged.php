    <form action="<?php echo WoW::GetWoWPath(); ?>/wow/discussion/blog.<?php echo WoW::GetBlogData('id'); ?>/comment?d_ref=%2F<?php echo WoW::GetWoWPath(); ?>%2Fwow%2Fblog%2F<?php echo WoW::GetBlogData('id'); ?>" method="post" onsubmit="return Cms.Comments.validateComment(this);" id="comment-form-reply" class="nested">
    	<fieldset>
            <input type="hidden" id="replyTo" name="replyTo" value=""/>
            <input type="hidden" name="xstoken" value=""/>
            <input type="hidden" name="sessionPersist" value="discussion.comment"/>
        </fieldset>
        <div class="new-post loggedOut">
            <div class="comment">
	<table class="dynamic-center">
		<tr>
			<td>
	<a class="ui-button button1" href="?login" onclick="return Login.open('<?php echo WoW::GetWoWPath(); ?>/login/login.frag')">
		<span>
			<span><?php echo WoW_Locale::GetString('template_blog_add_post'); ?></span>
		</span>
	</a>
</td>
		</tr>
	</table>
            </div>
        </div>
    </form>
	<script type="text/javascript">
		//<![CDATA[
			var textAreaFocused = false;
		//]]>
	</script>
    <form action="<?php echo WoW::GetWoWPath(); ?>/wow/discussion/blog.<?php echo WoW::GetBlogData('id'); ?>/comment?d_ref=%2F<?php echo WoW::GetWoWPath(); ?>%2Fwow%2Fblog%2F<?php echo WoW::GetBlogData('id'); ?>" method="post" onsubmit="return Cms.Comments.validateComment(this);" id="comment-form">
    	<fieldset>
            <input type="hidden" name="xstoken" value=""/>
            <input type="hidden" name="sessionPersist" value="discussion.comment"/>
        </fieldset>
        <div class="new-post loggedOut">
            <div class="comment">
	<table class="dynamic-center">
		<tr>
			<td>
	<a class="ui-button button1 " href="?login" onclick="return Login.open('<?php echo WoW::GetWoWPath(); ?>/login/login.frag')">
		<span>
			<span><?php echo WoW_Locale::GetString('template_blog_add_post'); ?></span>
		</span>
	</a>
</td>
		</tr>
	</table>
            </div>
        </div>
    </form>