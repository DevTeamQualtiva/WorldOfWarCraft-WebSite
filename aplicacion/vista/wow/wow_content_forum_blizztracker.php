<div id="content">
  <div class="content-top">
    <div class="content-trail">
      <?php WoW_Template::NavigationMenu(); ?>
    </div>
<div class="content-bot">
    <div id="forum-content" class="bluetracker">
		<div class="forum-actions top">
			<div class="actions-panel">
<?php
// paging
$total_blizz_posts = WoW_Forums::GetTotalBlizzPosts();
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), $total_blizz_posts, 15, 'blizztracker');
?>
			</div>
		</div>

    <div id="posts-container">
			<table id="posts" cellspacing="0" class="simple">
				<thead>
					<tr class="post-th">
						<td></td>
						<td colspan="2">Subject</td>
						<td>Author</td>
					</tr>
				</thead>
				<tbody class="bluetracker-body">
<?php
$blizz_posts = WoW_Forums::GetLoadedBlizzPosts(WoW_Template::GetPageData('current_page'));
if(is_array($blizz_posts)) {
    foreach($blizz_posts as $post) {
        if($post['post_days'] > 0)
          $before_text = sprintf(WoW_Locale::getString('template_blizztracker_posted_before_days'), $post['post_days'], $post['post_hours']);
        elseif($post['post_days'] == 0 && $post['post_hours'] > 0)
          $before_text = sprintf(WoW_Locale::getString('template_blizztracker_posted_before_hours'), $post['post_hours'], $post['post_minutes']);
        elseif($post['post_hours'] == 0)
          $before_text = sprintf(WoW_Locale::getString('template_blizztracker_posted_before_minutes'), $post['post_minutes']);
        
        echo  sprintf('<tr id="postRow%d" class="blizzard">
		<td class="post-icon">
			<div class="forum-post-icon">
					<div class="blizzard_icon"><a href="../topic/%d#%d" data-tooltip="%s"></a></div>
			</div>
		</td>
		<td class="post-title">
				<div class="content"><a href="../topic/%d?page=13#%d">‘%s’</a></div>
				<div class="desc">[<a href="../%d/" class="forum-source">%s</a>] <a href="../topic/%d?page=13#%d">%s</a> - %s</div>
		</td>
		<td class="post-pageNav">&#160;</td>
		<td class="post-author">
				<span class="type-blizzard">%s<img src="/wow/static/images/layout/cms/icon_blizzard.gif" alt="" />
				</span>
		</td>
	</tr>', $post['thread_id'], $post['thread_id'], $post['post_id'], WoW_Locale::getString('template_blizztracker_jump_first'), $post['thread_id'], $post['thread_id'], $post['message_short'], $post['cat_id'], $post['categoryTitle'], $post['thread_id'], $post['post_id'], $post['threadTitle'], $before_text, $post['author'] );
    }
}
?>
					</tbody>
			</table>
    </div>
		<div class="forum-actions topic-bottom">
			<div class="actions-panel">
<?php
// paging
echo WoW_Paginator::Initialize(WoW_Template::GetPageData('current_page'), $total_blizz_posts, 15, 'blizztracker');
?>
			</div>
        </div>
    </div>
</div>
</div>
</div>
