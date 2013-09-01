<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es" xmlns:xml="http://www.w3.org/XML/1998/namespace" class="chrome chrome8"><!--<![endif]-->
<head>
<title><?php echo WoW_Layout::GetPageTitle(); ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo WoW::GetWoWPath(); ?>/account/local-common/images/favicons/bam.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/ru-ru/data/opensearch" title="Поиск по Battle.net" />
<?php echo WoW_Layout::PrintCSSForBNPage(); ?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/core.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '<?php echo WoW::GetWoWPath(); ?>/account';
Core.sharedStaticUrl= '<?php echo WoW::GetWoWPath(); ?>/account/local-common';
Core.baseUrl = '<?php echo WoW::GetWoWPath(); ?>/account';
Core.project = 'bam';
Core.locale = '<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/Y';
Core.loggedIn = true;
Flash.videoPlayer = '<?php echo WoW::GetWoWPath(); ?>/player/videoplayer.swf';
Flash.videoBase = '<?php echo WoW::GetWoWPath(); ?>/media/videos';
Flash.ratingImage = '<?php echo WoW::GetWoWPath(); ?>/player/rating-pegi.jpg';
//]]>
</script>
</head>
