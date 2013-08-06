<div id="content">
  <div class="content-top">
    <div class="content-trail">
      <?php WoW_Template::NavigationMenu(); ?>
    </div>
    <div class="content-bot">
  	<script type="text/javascript">
  	//<![CDATA[
          $(function(){
  			Cms.Topic.topicInit(<?php echo WoW_Forums::GetThreadId() ?>,<?php echo WoW_Forums::GetCategoryId(); ?>,1);
  		});
  	//]]>
  	</script>
    <!--[if IE 6]>
  	<script type="text/javascript">
  	//<![CDATA[
  		$(function(){ Cms.Topic.topicInitIe(); });
  	//]]>
  	</script>
  	<![endif]-->
	  <div id="forum-content"> 
      <div class="section-header">
        <?php
        $FirstBlizzPost = WoW_Forums::GetNextBlizzPostInThread(true);
        echo ($FirstBlizzPost != false) ? sprintf('<div class="blizzard_icon"><a class="nextBlizz" href="../topic/%d%s" data-tooltip="%s"></a></div>', WoW_Forums::GetThreadId(), $FirstBlizzPost, WoW_Locale::GetString('template_forum_jump_first_blizz')) : NULL;
        ?>
        <span class="topic"><?php echo WoW_Locale::GetString('template_forum_topic'); ?></span>
        <?php 
            $flags = WoW_Forums::GetThreadFlags();
            if($flags != 0){
                if($flags & THREAD_FLAG_FEATURED){
                    $flag[] = WoW_Locale::GetString('template_forum_thread_featured');
                }
                if($flags & THREAD_FLAG_PINNED){
                    $flag[] = WoW_Locale::GetString('template_forum_thread_sticky');
                }
                if($flags & THREAD_FLAG_CLOSED){
                    $flag[] = WoW_Locale::GetString('template_forum_thread_closed');
                }
                
                if(isset($flag)){
                    echo '('.implode(' ', $flag).')';
                }
            }
        ?>
        <span class="sub-title"><?php echo WoW_Forums::GetThreadTitle(); ?></span>
      </div>
      <div class="forum-actions top">
  		  <div class="actions-panel">
<?php
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), WoW_Forums::GetTotalThreadPosts(), 20, 'forum');
?>
          <a class="ui-button button1<?php echo (WoW_Forums::IsClosedThread() || !WoW_Account::IsHaveActiveCharacter()) ? ' disabled' : null; ?>" href="<?php echo (WoW_Forums::IsClosedThread() || !WoW_Account::IsLoggedIn()) ? ' javascript:;' : '#new-post'; ?>"<?php echo !WoW_Account::IsLoggedIn() ? ' onclick="return Login.open(\'' . WoW::GetWoWPath() . '/login/login.frag\');"' : null; ?>>
        		<span>
        			<span><?php echo WoW_Locale::GetString('template_forum_add_reply');?></span>
        		</span>
	        </a>
          <span class="clear"><!-- --></span>
        </div>
      </div>
      <div id="thread">
            <?php
            $posts = WoW_Forums::GetThreadPosts();
            if(is_array($posts)) {
                $post_num = 1;
                foreach($posts as $post) {
                    // this function can be call only ONCE in foreach
                    $NextBlizzPost = ($post['blizzpost'] == 1) ? WoW_Forums::GetNextBlizzPostInThread($post) : false;
                    $blizz_icon_link = ($NextBlizzPost != false) ? sprintf('<div class="blizzard_icon"><a class="nextBlizz" href="../topic/%d%s" data-tooltip="%s"></a></div>', $post['thread_id'], $NextBlizzPost, WoW_Locale::GetString('template_forum_jump_next_blizz')) : NULL;
                    $character_url = sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $post['realmName'], $post['author']);
                    $character_search_url = sprintf('%s/wow/search?f=post&amp;a=%s&amp;sort=time', WoW::GetWoWPath(), $post['author']);
                    $guild_url = sprintf('%s/wow/%s/guild/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $post['realmName'], $post['guildName']);
                    $character_links = ($post['blizzpost'] == 1) ? sprintf('<a href="%s" title="%s" rel="np" class="icon-posts link-first link-last">%s</a>', $character_search_url, WoW_Locale::GetString('template_blog_lookup_forum_messages'), WoW_Locale::GetString('template_blog_lookup_forum_messages')) : 
                                                                   sprintf('<a href="%s" title="%s" rel="np" class="icon-profile link-first">%s</a>
                                                                            <a href="%s" title="%s" rel="np" class="icon-posts"> </a>
                                                                            <a href="javascript:;" title="%s" rel="np" class="icon-ignore link-last" onclick="Cms.ignore(23059292, false); return false;"> </a>', 
                                                                            $character_url, WoW_Locale::GetString('template_profile_caption'), WoW_Locale::GetString('template_profile_caption'), $character_search_url, WoW_Locale::GetString('template_blog_lookup_forum_messages'), WoW_Locale::GetString('template_blog_add_to_black_list'));
                    $character_description = sprintf('<div class="character-desc"><span>%s</span></div>
                                                      <div class="guild"><a href="%s">%s</a></div>
                                                      <div class="achievements">--</div>',
                                                      $post['level'].' '.$post['race_text'].' '.$post['class_text'], $guild_url, $post['guildName']);
                    $post_options = sprintf('<a class="ui-button button2 " href="post/%d/edit"><span><span>%s</span></span></a>
                                             <a class="ui-button button2 " href="javascript:;" onmouseover="Tooltip.show(this,\'%s\')" onclick="if(confirm(\'%s\')) $(\'#deletePost%d\').submit()"><span><span>%s</span></span></a>',
                                              $post['post_id'], WoW_Locale::GetString('template_forum_post_edit'), WoW_Locale::GetString('template_forum_post_delete_tooltip'), WoW_Locale::GetString('template_forum_post_delete_confirm'), $post['post_id'], WoW_Locale::GetString('template_forum_post_delete'));
                    $realms = WoW::GetRealmStatus($post['realmId']);
                    if($post['deleted'] != NULL){
                        echo sprintf('
                        <div class="post  hidden">
                          <form id="deletePost%d" action="post/%d/delete" method="POST">
                            <input type="hidden" name="xstoken" value="85d0d8a6-90e2-4197-ac61-602be6f70e19" />
                          </form>
                          <span id="%d"></span> 
                          <div class="deleted">
                            <table>
                              <tr>
                                <td class="post-character">
                                  <div class="character-info user-name-container">
                                    <div class="user-name">
                                      <span class="char-name-code" style="display: none">%s</span>
                                      <div id="context-10" class="ui-context">
                                        <div class="context">
                                          <a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
                                          <div class="context-user">
                                            <strong>%s</strong><br />
                                            <span class="realm %s">%s</span>
                                          </div> 
                                          <div class="context-links">%s</div>
                                        </div>
                                      </div>
                                      <a href="%s" class="context-link%s" rel="np">%s</a>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="post-detail">%s</div>
                                </td>
                                <td class="post-info">
                                  <div class="post-info-int">
                                    <div class="postData">
                                      <span class="lowrated">%s</span>
                                      <a href="#%d">#%d</a>
                                      <div class="date">%s</div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class="post-interior low-rated"></div>
                        </div>', 
                        $post['post_id'], $post['post_id'], $post_num, $post['author'], $post['author'], $realms[0]['status'], $realms[0]['name'], $character_links,
                        $character_url, $post['blizzpost'] ? null : ' color-c'.$post['class'], $post['author'], 
                        sprintf(WoW_Locale::GetString('template_forum_post_deleted_by'), $post['author']), WoW_Locale::GetString('template_forum_post_deleted'), $post_num, $post_num, 'before time');
                    }
                    else{
                        echo sprintf('
                        <div id="post-%d" class="post%s">
    					            <span id="%d"></span>
                          <div class="post-interior">
                            <table>
                              <tr>
                                <td class="post-character">
                                	<div class="post-user">
                                	  <div class="avatar avatar-interior">
                                      <a href="%s">
                                        <img height="84" src="/wow/static/images/2d/avatar/%d-%d.jpg" alt="" />
                                      </a>
                                    </div>
                                    <div class="character-info">
                                      <div class="user-name">
                                    		<span class="char-name-code" style="display: none">%s</span>
                                      	<div id="context-1" class="ui-context"%s>
                                      		<div class="context">
                                      			<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
                                      			<div class="context-user"><strong>%s</strong><br>%s</div>
                                      			<div class="context-links">
                                      					%s
                                      			</div>
                                      		</div>
    	                                  </div>
                                        <a href="%s" class="context-link%s" rel="np">%s</a>
                                      </div>
                                      <div%s>
                                        %s
                                      </div>
                                    </div>
    	                             </div>
    							               </td>
                                 <td>
                                   <div class="post-edited">%s</div>
                                   <div class="post-detail">%s</div>
                                 </td>
                                 <td class="post-info">
                                   <div class="post-info-int">
                                     <div class="postData">
    										               <a href="#%d">#%d</a>
                                       <div class="date" data-tooltip="%s">%s</div>
                                     </div>
                                     %s
                                     </div>
                                </td>
                              </tr>
                            </table>
                            <div class="post-options">
                              <div class="respond"> 
                                %s
                                <a class="ui-button button2 " href="#new-post"><span><span>%s</span></span></a> 
                                <a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote(%d);"><span><span><span class="icon-quote">%s</span></span></span></a> 
                              </div>
    	                        <span class="clear"><!-- --></span>
                            </div>
                        	</div>
                        </div>', $post['post_id'], $post['blizzpost'] ? ' blizzard' : null, $post_num, ($post['blizzpost'] ? 'javascript:;' : $character_url), $post['race'], $post['gender'], 
                        $post['author'], $post['blizzpost'] ? ' style="display: none; "' : null, $post['author'], $post['guildName'], $character_links, $post['blizzpost'] ? 'javascript:;' : $character_url, 
                        $post['blizzpost'] ? null : ' color-c'.$post['class'], $post['author'], $post['blizzpost'] ? ' class="blizzard-title"' : null, $post['blizzpost'] ? WoW_Locale::GetString('template_forum_blizz_title') : $character_description,
                        $post['edit_date'] != null ? sprintf(WoW_Locale::GetString('template_forum_post_edited'), $post['author'], $post['formated_edit_date']) : null, $post['message'], 
                        $post_num, $post_num, $post['fully_formated_date'], $post['formated_date'], $blizz_icon_link, ($post['bn_id'] == WoW_Account::GetUserID()) ? $post_options : null , WoW_Locale::GetString('template_blog_answer'), $post['post_id'], WoW_Locale::GetString('template_forum_post_quote'));
                    }
                ++$post_num;
                }
            }
            ?>
      </div>
      <div class="forum-actions bottom">
  		  <div class="actions-panel">
<?php
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), WoW_Forums::GetTotalThreadPosts(), 20, 'forum');
echo WoW_Template::NavigationMenu();
?>
          <span class="clear"><!-- --></span>
        </div>
      </div>
      <div class="talkback"><a id="new-post"></a>
        <form method="post" onsubmit="return Cms.Topic.postValidate(this);" action="#new-post">
    			<div>
            <input type="hidden" name="xstoken" value="fbc9d52f-99bf-4639-b2b5-7a535e7f31fe"/>
            <input type="hidden" name="sessionPersist" value="forum.topic.post"/>
            <div class="post ">
<?php
if(WoW_Forums::IsClosedThread()) {
    echo sprintf('<table class="dynamic-center "><tr><td>%s</td></tr></table>', WoW_Locale::GetString('template_forum_topic_closed'));
}
elseif(!WoW_Account::IsLoggedIn()) {
    echo sprintf('<table class="dynamic-center "><tr><td><a class="ui-button button1 " href="?login" onclick="return Login.open(\'%s/login/login.frag\')"><span><span>%s</span></span></a></td></tr></table>', WoW::GetWoWPath(), WoW_Locale::GetString('template_forum_add_reply'));
}
elseif(WoW_Account::IsHaveActiveCharacter()) {
    WoW_Template::LoadTemplate('content_forum_new_post');
}
else {
    echo sprintf('<table class="dynamic-center "><tr><td><div class="noCharacter"><p>%s</p></div></td></tr></table>', WoW_Locale::GetString('template_forum_need_char_to_post'));
}
?>

            </div>
    			</div>
        </form>
	      <span class="clear"><!-- --></span>
        <div class="talkback-code">
          <div class="talkback-code-interior">
            <div class="talkback-icon">
              <h4 class="code-header">Please report any Code of Conduct violations, including:</h4>
              <p>Threats of violence. <strong>We take these seriously and will alert the proper authorities.</strong></p>
              <p>Posts containing personal information about other players. <strong>This aplicacion physical addresses, e-mail addresses, phone numbers, and inappropriate photos and/or videos.</strong></p>
              <p>Harassing or discriminatory language. <strong>This will not be tolerated.</strong></p>
              <p>Click <a href="<?php echo WoW::GetWoWPath(); ?>/community/conduct">here</a> to view the Forums Code of Conduct.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div id="report-post">
      <table id="report-table">
        <tr>
          <td class="report-desc"> </td>
          <td class="report-detail report-data"> Сообщить модераторам о сообщении #<span id="report-postID"></span> игрока <span id="report-poster"></span> </td>
          <td class="post-info"></td>
        </tr>
        <tr>
          <td class="report-desc"><div>Причина</div></td>
          <td class="report-detail">
          	<select id="report-reason">
                      	<option value="SPAMMING">Спам</option>
                      	<option value="REAL_LIFE_THREATS">Угрозы в реальной жизни</option>
                      	<option value="BAD_LINK">«Битая» ссылка</option>
                      	<option value="ILLEGAL">Противозаконно</option>
                      	<option value="ADVERTISING_STRADING">Реклама</option>
                      	<option value="HARASSMENT">Оскорбления</option>
                      	<option value="OTHER">Иное</option>
                      	<option value="NOT_SPECIFIED">Не указано</option>
                      	<option value="TROLLING">Троллинг</option>
              </select>
          </td>
          <td></td>
        </tr>
        <tr>
          <td class="report-desc"><div>Объяснение <small>(не более 256 символов)</small></div></td>
          <td class="report-detail"><textarea id="report-detail" class="post-editor" cols="78" rows="13"></textarea></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td colspan="2" class="report-submit">
          	<div>
              <a href="javascript:;" onclick="Cms.Topic.reportSubmit('')">Отправить</a> | <a href="javascript:;" onclick="Cms.Topic.reportCancel()">Отмена</a>
            </div>
          </td>
        </tr>
    </table>
    <div id="report-success" style="text-align:center">
    	<h4>Готово!</h4>[<a href='javascript:;' onclick='$("#report-post").hide()'>Закрыть</a>]
    </div>
    </div>
    </div>
  </div>
</div>
