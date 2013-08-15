<!-- START: Featured News -->
<div class="featured-news">
<?php
$wow_news = WoW::GetFeaturedNews();
for($i = 0; $i < 5; ++$i) {
    if(!isset($wow_news[$i])) {
        continue;
    }
    echo sprintf('<div class="featured">
            <a href="%s/wow/blog/%d#blog">
               <span class="featured-img" style="background-image: url(\'%s/cms/blog_thumbnail/%s\');"></span>
               <span class="featured-desc">%s</span>
            </a>
        </div>', WoW::GetWoWPath(), $wow_news[$i]['id'], WoW::GetWoWPath(), $wow_news[$i]['image'], $wow_news[$i]['title']);
}
?>
        <span class="clear"></span>
    </div>
<!-- END: Featured News -->