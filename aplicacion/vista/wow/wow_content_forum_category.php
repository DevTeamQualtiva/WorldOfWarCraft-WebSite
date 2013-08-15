<div id="content">
  <div class="content-top">
    <div class="content-trail">
      <?php WoW_Template::NavigationMenu(); ?>
    </div>
    <div class="content-bot">            
      <div id="forum-content">
    		<script type="text/javascript">
    		//<![CDATA[
    			$(function(){ Cms.Forum.threadListInit('<?php echo WoW_Forums::GetCategoryId(); ?>'); });
    		//]]>
    	  </script>
		    <div class="forum-options">
          <a href="javascript:;"  class="active" onclick="Cms.Forum.setView('advanced',this)"><?php echo WoW_Locale::GetString('template_forums_type_advanced'); ?></a>
        	<a href="javascript:;"  onclick="Cms.Forum.setView('simple',this)"><?php echo WoW_Locale::GetString('template_forums_type_simple'); ?></a>
        </div>
        <div class="forum-actions top">
      		<div class="actions-panel">
    				<form action="<?php echo WoW::GetWoWPath(); ?>/wow/search" class="forum-search" method="get">
    					<div>
    						<input type="text" name="q" value="Search this forum…" alt="Search this forum…" id="forum-search-field" />
    						<input type="hidden" name="f" value="post" />
    						<input type="hidden" name="forum" value="<?php echo WoW_Forums::GetCategoryId(); ?>" />
    					</div>
    				</form>
          	<script type="text/javascript">
          	//<![CDATA[
          					$(function() { Input.bind('#forum-search-field'); });
          	//]]>
          	</script>
          	<a class="ui-button button1<?php echo (WoW_Account::IsLoggedIn() && !WoW_Account::IsHaveActiveCharacter()) ? ' disabled' : null; ?>" href="topic"<?php echo !WoW_Account::IsLoggedIn() ? ' onclick="return Login.open(\'' . WoW::GetWoWPath() . '/login/login.frag\');"' : null; ?>>
          		<span><span><?php echo WoW_Locale::GetString('template_forums_create_thread'); ?></span></span>
          	</a>
      	    <span class="clear"><!-- --></span>
          </div>
<?php
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), WoW_Forums::GetTotalCategoryThreads(), 20, 'forum');
?>
          <span class="clear"><!-- --></span>
        </div>
        <div id="posts-container">
    			<table id="posts" cellspacing="0" class="advanced">
    				<thead>
    					<tr class="post-th">
    						<td></td>
    						<td colspan="2"><?php echo WoW_Locale::GetString('template_forums_table_thread'); ?></td>
    						<td><?php echo WoW_Locale::GetString('template_forums_table_author'); ?></td>
  							<td class="replies"><?php echo WoW_Locale::GetString('template_forums_table_replies'); ?></td>
  							<td class="views"><?php echo WoW_Locale::GetString('template_forums_table_views'); ?></td>
  							<td class="poster"><?php echo WoW_Locale::GetString('template_forums_table_last_post'); ?></td>
    					</tr>
    				</thead>
                <?php
                $threads = WoW_Forums::GetCategoryThreads(WoW_Template::GetPageData('current_page'));
                if(is_array($threads)) {
                    $types = array(
                        'featured' => 'featured',
                        'sticky' => 'sticky',
                        'regular' => 'regular'
                    );
                    foreach($types as $type => $style) {
                        echo sprintf('<tbody class="%s">', $type);
                        if(is_array($threads[$type])) {
                            foreach($threads[$type] as $thread) {
                                echo sprintf('
                                <tr id="postRow%d" class="%s %s">
                                  <td class="post-icon">
                                    <div class="forum-post-icon">', $thread['thread_id'], $style, $thread['status']);
                                if($thread['first_blizz_post_id'] > 0) {
                                    echo sprintf('<div class="blizzard_icon"><a href="../topic/%d#%d" data-tooltip="%s"></a></div>', $thread['thread_id'], $thread['first_blizz_post_id'], WoW_Locale::GetString('template_forums_first_blizz_post'));
                                }
                                echo '
                                    </div>
                                  </td>
                                  <td class="post-title">';
                                if($type != 'regular') {
                                    echo sprintf('<span class="post-status">[%s]</span>', WoW_Locale::GetString('template_forum_thread_'.$type));
                                }
                                $thread['closed'] = ($thread['closed'] == true) ? '<img src="/wow/static/images/layout/cms/post_locked.gif" alt="" />' : '';
                                echo sprintf('
                                <div id="thread_tt_%d" style="display:none">
                                  <div class="tt_detail">%s</div>
                                  <div class="tt_time">%s</div>
                                  <div class="tt_info">
                                  %s<br />
                                  %s %s (%s)
                                  </div>
                                </div><a href="../topic/%d" data-tooltip="#thread_tt_%d" data-tooltip-options=\'{"location": "mouse"}\'>%s%s</a></div>', 
                                $thread['thread_id'], $thread['message_short'], $thread['formated_date'], sprintf(WoW_Locale::GetString('template_forums_views_replies_category'), $thread['views'], $thread['replies']),
                                WoW_Locale::GetString('template_forums_last_reply'), $thread['last_author'], $thread['last_formated_date'], $thread['thread_id'], $thread['thread_id'], $thread['title'], $thread['closed']);
                                $jump_link = ($thread['last_read_page'] != NULL) ? sprintf('<a class="last-read" data-tooltip="%s" href="../topic/%d?page=%d"></a>', WoW_Locale::GetString('template_forum_jump_last'), $thread['thread_id'], $thread['last_read_page']) : '';
                                $pages_nav = WoW_Paginator::Initialize(NULL, $thread['replies']+1, 20, 'mini', array('thread_id' => $thread['thread_id']));
                                echo '
                                  </td>';
                                echo sprintf('
                                  <td class="post-pageNav">%s%s</td>', $jump_link, $pages_nav);
                                echo sprintf('
                                  <td class="post-author">%s</td>
                                  <td class="post-replies">%d</td>
                                  <td class="post-views">%d</td>
                                  <td class="post-lastPost"><a href="../topic/%d%s#%s" data-tooltip="%s">%s</a>'.(($thread['last_blizzpost'] != 1)?'<span class="more-arrow"></span>':'').'</td>
                                </tr>', $thread['author'], $thread['replies'], $thread['views'], $thread['thread_id'], ($thread['pages'] > 1) ? '?page='.$thread['pages'] : NULL, 
                                $thread['replies'] > 0 ? $thread['replies']+1 : 1, $thread['last_formated_date'], $thread['last_author']);
                            }
                        }
                        echo '</tbody>';
                    }
                }
                ?>
    			</table>
        </div>
        <div class="forum-info">
          <div class="forum-actions topic-bottom">
        		<div class="actions-panel">
<?php
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), WoW_Forums::GetTotalCategoryThreads(), 20, 'forum');
?>
          	  <a class="ui-button button1<?php echo (WoW_Account::IsLoggedIn() && !WoW_Account::IsHaveActiveCharacter()) ? ' disabled' : null; ?>" href="topic"<?php echo !WoW_Account::IsLoggedIn() ? ' onclick="return Login.open(\'' . WoW::GetWoWPath() . '/login/login.frag\');"' : null; ?>>
            		<span>
            			<span><?php echo WoW_Locale::GetString('template_forums_create_thread'); ?></span>
            		</span>
            	</a>
        	    <span class="clear"><!-- --></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
