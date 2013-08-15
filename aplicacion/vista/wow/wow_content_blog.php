<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">
World of Warcraft
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>" rel="np">
<?php echo WoW::GetBlogData('title'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">	
	<script type="text/javascript">
	//<![CDATA[
	$(function(){ Cms.Blog.init(); })
		var addthis_config = {
			 username: "blizzardwebteam"
		};
	//]]>
	</script>
	<div id="blog-wrapper">
    <div id="left">
        <div id="blog-container">
  <?php WoW_Template::LoadTemplate('block_featured_news'); ?>
            <div id="blog">
					<h3 class="blog-title">
						<?php echo WoW::GetBlogData('title'); ?>
					</h3>
					<div class="byline">
						<div class="blog-info">
                    	<a href="<?php echo WoW::GetWoWPath(); ?>/wow/search?a=<?php echo WoW::GetBlogData('author'); ?>&amp;f=article"><?php echo WoW::GetBlogData('author'); ?></a>
							<span>//</span> <?php echo date('d M Y H:i', WoW::GetBlogData('postdate')); ?>
						</div>
							<a class="comments-link" href="#comments"><?php echo WoW::GetBlogData('comments_count'); ?></a>
	<span class="clear"><!-- --></span>
					</div>
						<div class="header-image">
							<img alt="<?php echo WoW::GetBlogData('title'); ?>" src="<?php echo WoW::GetWoWPath(); ?>/cms/blog_header/<?php echo WoW::GetBlogData('header_image'); ?>" />
						</div>
					<div class="detail"><div>
	<?php echo WoW::GetBlogData('text'); ?>
</div>
<style type="text/css">
#blog .detail img {
-moz-border-radius:4px;
-webkit-border-radius:4px;
border-radius:4px;
-moz-box-shadow:0 0 20px #000000;
-webkit-box-shadow:0 0 20px #000000;
box-shadow:0 0 20px #000000;
border: 1px solid #372511;
max-width: 570px !important;
padding: 1px;
}
#blog .detail td:hover > a img, #blog .detail a img:hover {
border: 1px solid #CD9000;
}</style>
</div>
					<div class="keyword-list">
					</div>
            </div>
	<script type="text/javascript">
	//<![CDATA[
		$(function(){
			Cms.Comments.commentInit();
		});
	//]]>
	</script>
	<!--[if IE 6]>
	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Cms.Comments.commentInitIe();
		});
	//]]>
	</script>
	<![endif]-->
    <div id="report-post">
            <table id="report-table">
                <tr>
                    <td class="report-desc"> </td>
                    <td class="report-detail report-data"> <?php echo WoW_Locale::GetString('template_blog_report_post'); ?> </td>
                    <td class="post-info"></td>
                </tr>
                <tr>
                    <td class="report-desc"><div><?php echo WoW_Locale::GetString('template_blog_report_reason'); ?></div></td>
                    <td class="report-detail">
                    	<select id="report-reason">
                                	<?php echo WoW_Locale::GetString('template_blog_report_reasons'); ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="report-desc"><div><?php echo WoW_Locale::GetString('template_blog_report_description'); ?></div></td>
                    <td class="report-detail"><textarea id="report-detail" class="post-editor" cols="78" rows="13"></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" class="report-submit">
                    	<div>
                            <a href="javascript:;" onclick="Cms.Topic.reportSubmit('comments')"><?php echo WoW_Locale::GetString('template_blog_send_report'); ?></a>
                             |
                            <a href="javascript:;" onclick="Cms.Topic.reportCancel()"><?php echo WoW_Locale::GetString('template_blog_cancel_report'); ?></a>
                        </div></td>
                </tr>
            </table>
            <div id="report-success" style="text-align:center">
            	<h4><?php echo WoW_Locale::GetString('template_blog_report_success'); ?></h4>
            	[<a href='javascript:;' onclick='$("#report-post").hide()'><?php echo WoW_Locale::GetString('template_blog_close_report'); ?></a>]
            </div>
    </div>
    <span id="comments"></span>
    <div id="page-comments">
    	<div class="page-comment-interior">
            <h3>
                <?php echo sprintf('%s (%d)', WoW_Locale::GetString('template_blog_comments'), WoW::GetBlogData('comments_count')); ?>
            </h3>
			<div class="comments-container">
	<script type="text/javascript">
		//<![CDATA[
			var textAreaFocused = false;
		//]]>
	</script>

<?php
if(WoW_Account::IsLoggedIn()){
	if(!WoW_Account::IsHaveActiveCharacter()){
		echo WoW_Locale::GetString('template_characters_not_found');
	}else{
		WoW_Template::LoadTemplate('block_post_blog_reply_logged');
	}
}
else {
    WoW_Template::LoadTemplate('block_post_blog_reply_not_logged');
}
?>
<?php
$comments = WoW::GetBlogComments();
if(is_array($comments)) {
    $i = 0;
    foreach($comments as $comment) {
        // Load char
        $character = DB::WoW()->selectRow("SELECT `guid`, `name`, `class`, `race`, `gender`, `level`, `realmName`, `url` FROM `DBPREFIX_user_characters` WHERE `guid` = %d AND `account` = %d AND `realmId` = %d", $comment['character_guid'], $comment['account'], $comment['realm_id']);
        if(!$character) {
            continue;
        }
        if($comment['answer_to'] > 0) {
            echo '<div class="nested">';
        }
        echo sprintf('<div style="z-index: %d;" class="comment" id="c-%d">', $i, $comment['comment_id']);
        // Portrait
        echo sprintf('<div class="avatar portrait-b">
            <a href="%s">
                <img height="64" src="%s/wow/static/images/2d/avatar/%d-%d.jpg" alt="" />
            </a>
        </div>', $character['url'], WoW::GetWoWPath(), $character['race'], $character['gender']);
        if(WoW_Account::IsLoggedIn()) {
            // Karma
            echo sprintf('<div class="karma" id="k-%d">
                    <div class="rate-btn-holder">
                        <a href="javascript:;" onclick="Cms.Topic.vote(%d,\'up\',1,\'comments\')" class="rateup rate-btn"><span>%s</span></a>
                    </div>
                    <div class="rate-btn-holder">
                        <a href="javascript:;" onclick="$(this).siblings(\'.rate-action\').show();" class="ratedown rate-btn"></a>
                        <div class="rate-action">
                            <div class="ui-dropdown">
                                <div class="dropdown-wrapper">
                                    <ul>
                                        <li><a href="javascript:;" onclick="Cms.Topic.vote(%d,\'down\',1,\'comments\')">%s</a></li>
                                        <li><a href="javascript:;" onclick="Cms.Topic.vote(%d,\'down\',2,\'comments\')">%s</a></li>
                                        <li><a href="javascript:;" onclick="Cms.Topic.vote(%d,\'down\',3,\'comments\')">%s</a></li>
                                        <li><a href="javascript:;" onclick="Cms.Topic.report(%d,\'%s\',\'c-%d\')" class="report">%s</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prev-vote">%s</div>
        	<span class="clear"><!-- --></span>
            </div>', $comment['comment_id'], $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_up'),
            $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_down'),
            $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_trolling'), 
            $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_spam'),
            $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_report'),
            $comment['comment_id'],
            $character['name'],
            $comment['comment_id'],
            WoW_Locale::GetString('template_blog_karma_already_rated')
            );
        }
        echo sprintf('<div class="comment-interior">
                <div class="character-info user">
                <div class="user-name">
        		<span class="char-name-code" style="display: none">
        			%s 
        		</span>
        	<div id="context-4" class="ui-context">
        		<div class="context">
        			<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
        			<div class="context-user">
        				<strong>%s</strong><br /><span>%s</span>
        			</div>
        			<div class="context-links">
        					<a href="%s" title="%s" rel="np" class="icon-profile link-first">
        					%s
        					</a>
        					<a href="%s/wow/search?f=post&amp;a=%s&amp;s=time" title="%s" rel="np" class="icon-posts">
        					</a>
        					<a href="javascript:;" title="%s" rel="np" class="icon-ignore link-last" onclick="Cms.ignore(%d, false); return false;">
        					</a>
        			</div>
        		</div>
        	</div>
                <a href="%s" class="context-link" rel="np">
                	%s
                </a>
            </div>
            <span class="time"><a href="#c-%d">%s</a></span>
            </div>
            <div class="content" >%s</div>
                <div class="comment-actions">
                    <a class="reply-link" href="#c-%d" onclick="Cms.Comments.replyTo(\'%d\',\'%d\',\'%s\'); return false;">%s</a>
                </div>
            </div>
         </div>',
            $character['name'],
            $character['name'], $character['realmName'],
            $character['url'], WoW_Locale::GetString('template_profile_caption'), WoW_Locale::GetString('template_profile_caption'),
            WoW::GetWoWPath(), urlencode($character['name'] . ' @ ' . $character['realmName']),
            WoW_Locale::GetString('template_blog_lookup_forum_messages'),
            WoW_Locale::GetString('template_blog_add_to_black_list'),
            $character['guid'], $character['url'], $character['name'], $comment['comment_id'],
            date('d M Y H:i', $comment['postdate']),
            $comment['comment_text'],
            $comment['comment_id'],
            $comment['comment_id'],
            $character['guid'],
            $character['name'],
            WoW_Locale::GetString('template_blog_answer'),
            WoW_Locale::GetString('template_profile_caption'));
        if($comment['answer_to'] > 0) {
            echo '</div>';
        }
        ++$i;
    }
}
?>

                <div class="page-nav-container">
                    <div class="page-nav-int">



        <!--<div class="pageNav">

            	<span class="active">1</span>


						<a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>?page=2#page-comments">2</a>

						<div class="page-sep"></div>
						<a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>?page=3#page-comments">3</a>

						<div class="page-sep"></div>
						<a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>?page=4#page-comments">4</a>

						<div class="page-sep"></div>

            	<div class="page-sep">
            		…
        		</div>

	            <a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>?page=14#page-comments">14</a>
		            	<a href="<?php echo WoW::GetWoWPath(); ?>/wow/blog/<?php echo WoW::GetBlogData('id'); ?>?page=2#page-comments"><?php echo WoW_Locale::GetString('template_articles_full_caption'); ?> &gt;</a>
        </div>-->


                    </div>
                </div>
			</div>
        </div>
    </div>
                </div>
        </div>

		<div id="right">
        <?php WoW_Template::LoadTemplate('block_sidebar'); ?>
		</div>

	<span class="clear"><!-- --></span>
	</div>
</div>
</div>
</div>
