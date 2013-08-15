<div id="left-results">
<?php
$searchResults = WoW_Search::GetSearchResults('article');
    if(is_array($searchResults)) {
        foreach($searchResults as $article) {
            echo sprintf('  <div class="search-result">
        <div class="">
        <div class="result-title">
        <a href="%s/wow/blog/%d" class="search-title">%s</a>
        </div>
        <div class="by-line">
        <a href="?a=%s&amp;s=time">%s</a> -  %s <a href="%s/wow/blog/%d#comments" class="comments-link">%d</a>
        </div>
        <div class="search-content">
        <div class="result-image">
        <a href="%s/wow/blog/%d"><img alt="%s" src="%s/cms/blog_thumbnail/%s"/></a>
        </div>%s<br />
        </div>
        <div class="search-results-url"> /wow/blog/%d</div>
        </div>
        <div class="clear"></div>
        </div>', 
            WoW::GetWoWPath(), $article['id'], $article['title'],
            urlencode($article['author']), $article['author'], date('d.m.Y H:i', $article['postdate']), WoW::GetWoWPath(), $article['id'], 0,
            WoW::GetWoWPath(), $article['id'], $article['title'], WoW::GetWoWPath(), $article['image'],
            $article['desc'], $article['id']);
        }
    }
?>
</div>