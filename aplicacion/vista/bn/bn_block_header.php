<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<title><?php echo WoW_Layout::GetPageTitle() != null ? WoW_Layout::GetPageTitle() : 'Battle.net'; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/favicons/root.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/data/opensearch" title="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" />
<?php echo WoW_Layout::PrintCSSForBNPage(); ?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/core.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/tooltip.js"></script>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/static/css/bnet-ie.css" />
<![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/static/css/bnet-ie6.css" />
<![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/static/css/bnet-ie7.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../static/css/locale/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>.css" />
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<meta name="description" content="<?php echo WoW_Locale::GetString('template_bn_description'); ?>" />
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/common-game-site.min.js"></script>
<script type="text/javascript">
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '<?php echo WoW::GetWoWPath(); ?>/static';
Core.baseUrl = '';
Core.project = 'root';
Core.locale = '<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>';
Core.buildRegion = 'eu';
Core.loggedIn = <?php echo WoW_Account::IsLoggedIn() ? 'true' : 'false'; ?>;
Flash.videoPlayer = '<?php echo WoW::GetWoWPath(); ?>/wow/player/videoplayer.swf';
Flash.videoBase = '<?php echo WoW::GetWoWPath(); ?>/wow/media/videos';
Flash.ratingImage = '<?php echo WoW::GetWoWPath(); ?>/wow/player/rating-pegi.jpg';
//]]>
</script>
<meta name="robots" content="NOODP" />
</head>