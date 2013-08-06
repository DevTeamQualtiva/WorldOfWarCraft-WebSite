<div id="news-updates">
<?php
$wow_news = WoW_Template::GetPageData('wow_news');
for($i = 0; $i < 11; $i++) {
    if(!isset($wow_news[$i])) {
        continue;
    }
    echo sprintf('<div class="news-article first-child">
        <h3><a href="%s/wow/blog/%d#blog">%s</a></h3>
            <div class="by-line">
                <a href="%s/wow/search?f=article&amp;a=%s">%s</a>
                <span class="spacer">//</span> %s
                    <a href="%s/wow/blog/%d#comments" class="comments-link">%d</a>
            </div>
        <div class="article-left" style="background-image: url(\'%s/cms/blog_thumbnail/%s\');">
            <a href="%s/wow/blog/%d"><img src="%s/wow/static/images/homepage/thumb-frame.gif" alt="" /></a>
        </div>
        <div class="article-right">
            <div class="article-summary">
                %s
                <a href="%s/wow/blog/%d#blog" class="more">%s</a>
            </div>
        </div>
	<span class="clear"><!-- --></span>
    </div>',
        WoW::GetWoWPath(),
        $wow_news[$i]['id'], $wow_news[$i]['title'],
        WoW::GetWoWPath(), urlencode($wow_news[$i]['author']), $wow_news[$i]['author'],
        date('d M Y H:i', $wow_news[$i]['postdate']),
        WoW::GetWoWPath(), $wow_news[$i]['id'], $wow_news[$i]['comments_count'],
        WoW::GetWoWPath(), $wow_news[$i]['image'],
        WoW::GetWoWPath(), $wow_news[$i]['id'], WoW::GetWoWPath(),
        $wow_news[$i]['desc'],
        WoW::GetWoWPath(), $wow_news[$i]['id'], WoW_Locale::GetString('template_articles_full_caption')
    );
}
?>
    <?php
    // paging
    if(WoW::GetPrevPage() >= 0 || WoW::GetNextPage() >= 0) {
        echo '<div class="blog-paging">';
        if(WoW::GetNextPage() >= 0) {
            echo '<a class="ui-button button1 button1-next float-right " href="?page=' . (WoW::GetNextPage() + 1) . '"><span><span>Next</span></span></a>';
        }
        if(WoW::GetPrevPage() >= 0) {
            echo '<a class="ui-button button1 button1-previous " href="?page=' . (WoW::GetPrevPage() + 1) . '"><span><span>Prev</span></span></a>';
        }
        echo '<span class="clear"></span></div>';
    }
    ?>
</div>