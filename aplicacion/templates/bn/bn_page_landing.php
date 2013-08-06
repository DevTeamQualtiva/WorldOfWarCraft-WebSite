<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru">
<?php
WoW_Template::LoadTemplate('block_header');
?>
<body class="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?> landing-bnet">
<div id="wrapper">
    <div id="header">
        <div id="search-bar">
            <form action="<?php echo WoW::GetWoWPath(); ?>/search" method="get" id="search-form">
                <div>
                    <input type="submit" id="search-button" value="" tabindex="41" />
                    <input type="text" name="q" id="search-field" tabindex="40" value="<?php echo WoW_Locale::GetString('template_bn_search'); ?>"  maxlength="200" alt="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" />
                </div>
            </form>
        </div>
        <h1 id="logo"><a href="<?php echo WoW::GetWoWPath(); ?>/">Battle.net</a></h1>
    </div>
<?php
switch(WoW_Template::GetPageData('landing')) {
    case 'what_is':
        WoW_Template::LoadTemplate('content_what_is');
        break;
    case '404':
        WoW_Template::LoadTemplate('content_404');
        break;
}
WoW_Template::LoadTemplate('block_footer', true);
WoW_Template::LoadTemplate('block_service', true);
WoW_Template::LoadTemplate('block_js_messages', true);
?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/js/bnet.js?v5"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/menu.js?v15"></script>
<script type="text/javascript">
var friendData = [];
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Search.init('/ta/lookup');
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery.pngFix.pack.js?v15"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v15");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/overlay.js?v15");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/search.js?v15");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/login.js?v15", false, function() {
Login.embeddedUrl = '<?php echo WoW::GetWoWPath(); ?>/login/login.frag';
});
//]]>
</script>
</body>
</html>