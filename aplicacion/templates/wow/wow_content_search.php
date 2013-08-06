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
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/search" rel="np">
<?php echo WoW_Locale::GetString('template_search'); ?>
</a>
</li>
</ol>-->
</div>
<?php
if(WoW_Search::GetSearchQuery() != null && WoW_Search::GetResultsCount() > 0) {
    WoW_Template::LoadTemplate('block_search_results');
}
else {
    WoW_Template::LoadTemplate('block_search_box');
}
?>
</div>
</div>
