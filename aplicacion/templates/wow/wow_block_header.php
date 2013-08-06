<head>
<title><?php echo WoW_Layout::GetPageTitle() . WoW_Locale::GetString('template_title'); ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/data/opensearch" title="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" />
<?php echo WoW_Layout::PrintCSSForPage(); ?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '<?php echo WoW::GetWoWPath(); ?>/wow/static';
Core.baseUrl = '<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>';
Core.project = 'wow';
Core.locale = '<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/Y';
Core.loggedIn = <?php echo WoW_Account::IsLoggedIn() ? 'true' : 'false'; ?>;
Flash.videoPlayer = '<?php echo WoW::GetWoWPath(); ?>/wow/player/videoplayer.swf';
Flash.videoBase = '<?php echo WoW::GetWoWPath(); ?>/wow/media/videos';
Flash.ratingImage = '<?php echo WoW::GetWoWPath(); ?>/wow/player/rating-pegi.jpg';
//]]>
</script>
<meta name="title" content="<?php echo WoW_Template::GetPageData('overall_meta_title') != null ? WoW_Template::GetPageData('overall_meta_title') : 'World of Warcraft'; ?>" />
<link rel="image_src" href="<?php echo WoW_Template::GetPageData('overall_meta_img') != null ? WoW_Template::GetPageData('overall_meta_img') :  WoW::GetWoWPath() . '/wow/static/images/icons/facebook/game.jpg'; ?>" />
<?php
switch(WoW_Template::GetPageData('page')) {
    case 'character_profile':
        echo sprintf('<style type="text/css">#content .content-top { background: url("%s/wow/static/images/character/summary/backgrounds/race/%d.jpg") left top no-repeat; }.profile-wrapper { background-image: url("%s/wow/static/images/2d/profilemain/race/%d-%d.jpg"); }</style>', WoW::GetWoWPath(), WoW_Characters::GetRaceID(), WoW::GetWoWPath(), WoW_Characters::GetRaceID(), WoW_Characters::GetGender());
        break;
    case 'character_talents':
        echo sprintf('<style type="text/css">.talentcalc-cell .icon .texture { background-image: url(%s/wow/wow-assets/static/images/talents/icons/%d-greyscale.jpg); }</style>', WoW::GetWoWPath(), WoW_Characters::GetClassID());
        break;
    case 'guild':
        echo sprintf('<style type="text/css">#content .content-top { background: url("%s/wow/static/images/guild/summary/bg-%s.jpg") left top no-repeat; }</style>', WoW::GetWoWPath(), WoW_Guild::GetGuildFactionText());
        break;
    case 'zone':
        echo sprintf('<style type="text/css">#content .content-top { background: url("%s/wow/static/images/wiki/zone/bgs/%s.jpg") 0 0 no-repeat; }</style>', WoW::GetWoWPath(), WoW_Template::GetPageData('zone_key'));
        break;
}
?>

</head>
