<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-mx" class="es-mx">
<?php
WoW_Template::LoadTemplate('block_header');
?>
<body class="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?> homepage">

        <div id="layout-top">
            <div class="wrapper">
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


        <!-- section/mygames start -->
		<?php
        if(WoW_Account::IsLoggedIn()) {
            WoW_Template::LoadTemplate('block_my_games_1');
        }
        else {
            WoW_Template::LoadTemplate('block_my_games_0');
        }
        ?>
        <!-- section/mygames end -->
                </div>

		<?php
		WoW_Template::LoadTemplate('block_service', true);
		?>

            </div>
        </div>
        <div id="layout-middle">
            <div class="wrapper">
                <div id="content">
					<div id="homepage">
						<div class="game-column" id="home-game-sc2">
							<a href="http://eu.battle.net/sc2/" class="game-promo"><span class="game-tip"><?php echo WoW_Locale::GetString('template_bn_sc2_cs'); ?></span></a>
						</div>

						<div class="game-column" id="home-game-wow">
							<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" class="game-promo"><span class="game-tip"><?php echo WoW_Locale::GetString('template_bn_wow_cs'); ?></span></a>
						</div>

						<div class="game-column" id="home-game-d3">
							<a href="http://eu.battle.net/d3" class="game-promo"><span class="game-tip"><?php echo WoW_Locale::GetString('template_bn_diablo3_cs'); ?></span></a>
						</div>
						
					
						<div class="game-column" id="home-game-hs">
							<a href="http://us.battle.net/hearthstone/" class="game-promo"><span class="game-tip"><?php echo WoW_Locale::GetString('template_bn_hs_cs'); ?></span></a>
						</div>

					<span class="clear"><!-- --></span>
					</div>
                </div>
            </div>
        </div>
        <div id="layout-bottom">
            <div class="wrapper">
                <?php WoW_Template::LoadTemplate('block_footer', true); ?>
            </div>
        </div>

<?php
WoW_Template::LoadTemplate('block_js_messages', true);
?>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/js/bnet.js?v5"></script>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/menu.js"></script>
<script type="text/javascript">
var friendData = [];
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Search.init('/ta/lookup');
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery.mousewheel.min.js");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/third-party/jquery.tinyscrollbar.min.js");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/overlay.js");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/search.js");
Core.load("<?php echo WoW::GetWoWPath(); ?>/static/local-common/js/login.js", false, function() {
Login.embeddedUrl = '<?php echo WoW::GetWoWPath(); ?>/login/<?php echo WoW_Locale::GetLocale(); ?>/login.frag';
});
//]]>
</script>
</body>
</html>
