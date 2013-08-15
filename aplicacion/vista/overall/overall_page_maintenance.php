<!DOCTYPE html>
<html lang="en-us">
<head>

    <title>Battle.net</title>

    <!--[if IE]>
    <meta content="false" http-equiv="imagetoolbar" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <![endif]-->

    <meta name="robots" content="none" />
    <meta http-equiv="refresh" content="120" />

    <link rel="icon" type="image/png" href="<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/favicons/root.png" />
    <!--[if IE]>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/favicons/root.ico" />
    <![endif]-->

    <style>
    html, body, div, span, object, iframe, h1, p, img { margin: 0; padding: 0; border: 0; outline: 0; font-size: 100%; }
    html, body { background: #000 url("<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/layout/bg.jpg") 50% 0 no-repeat; color: #aaafb8; font: normal 12px/1.5 "Trebuchet MS", "Arial", sans-serif; }

    a { color:#007ca5; text-decoration: none; }
    a:hover,
    a:focus { color: #0c536a; }

    ::-moz-selection { color: #eee;  background: #006a9b; }
    ::selection { color: #eee;  background: #006a9b; }

    .wrapper { width: 960px; margin: 0 auto; }

    .notice { width: 500px; margin: 0 auto; }
    .notice .logo { padding: 48px 0; margin: 0 auto; width: 402px; height: 92px; overflow: hidden; overflow: hidden; -moz-user-select: none; -webkit-user-select: none; user-select: none; }
    .notice .logo span { text-indent: -9999px; display: block; width: 402px; height: 92px; overflow: hidden; background: url("<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/logos/bnet-default.png"); }

    .info { padding: 32px; background: #07090b; background: rgba(0,0,0,.42); -moz-border-radius: 16px; -webkit-border-radius: 16px; border-radius: 16px; }
    .info .title { text-align: center; font-size: 44px; line-height: 1.25; letter-spacing: -.05em; color: #fff; font-family: "Lucida Sans Unicode", "Lucida Grande", "Arial", sans-serif; }
    .info .short { font-size: 16px; line-height: 1.5; margin: 1.5em 0; color: #aaafb8; }
    .info .twitter { color: #7499b2; font-size: 20px; font-family: "Georgia", "Times New Roman", "Times", serif; padding: 16px 100px 16px 16px; background: #2a3035 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD4AAAArCAMAAAAXBMteAAAAM1BMVEUqMDVPZXRLXmx0mbI9SlRYcYNmhZprjKIvNz1BUVxhf5M4RE1vkqozPUVdeItGWGRTa3sDgm/dAAAAAXRSTlMAQObYZgAAATxJREFUeF6dldeOhDAMRV3SK///tbujjBBDTArnFR079g0Ay0SEt7iAlm3F+srOhhvlVe+vbci90ZttD8oDAYuX7YNPTH3WPw2E+oqvhAwyvi3Hy0c/SRFkbHtufxdUmdd8fzZAdy3a+W62o6Sz1HySPjHfT2BYQIm2U/o6o29rFwiizjc0gGYRMT3T+ZllSE7+TmqCvLxItyE0LxMsM8cuug1SH0DWaVE26KDXj7BmF1T/3Cr4xDsc8EvckU0/e11UNVIUs7dLk8MjHstUrzDAsIz8xu/Pr2EATfU80t1sewhDHIZRBXud3Ev5qTTQfwVNnY0boTlj1MbN0cIP1J5XMJKdZSb4zCl84AkkRlV4ieRBBlfskOGJOL/oBCMoDWV0MMbhY2K2yTN8kRprD8soDJcpTKEI26hGngp/RZwUt0YqVl8AAAAASUVORK5CYII=) no-repeat 350px center; -moz-border-radius: 12px; -webkit-border-radius: 12px; border-radius: 12px; line-height: 1.25; }

    .footer { border-top: 1px solid #414a56; font-size: 10px; text-transform: uppercase; padding: 12px 0; margin: 32px 0; -moz-user-select: none; -webkit-user-select: none; user-select: none; font-family: "Lucida Sans Unicode", "Lucida Grande", "Arial", sans-serif; }
    .footer .copyright { color: #2a2c2f; display: inline-block; vertical-align: top; margin: 0 1em 0 0; }
    .footer .legal { display: inline-block; vertical-align: top; }
    .footer .legal a { display: inline-block; vertical-align: top; color: #b2bac7; margin: 0 .5em 0 0; }
    .footer .legal a:hover,
    .footer .legal a:focus { color: #dcdcdc; }
    .footer .language { color: #697489; float: right; display: inline-block; vertical-align: top; text-align: right; white-space: nowrap; }
    .footer .privacy { margin: 32px 0 0 0; text-align: right; }
    .footer .privacy a { display: inline-block; vertical-align: top; }
    .footer .privacy img { border: 0; }
    .footer .contact { margin: 32px 0 0 0; text-align: center; color: #9b9898; text-transform: none; }

    body.ko-kr { font-family: "Dotum", "돋움", "Helvetica", "AppleGothic", sans-serif; }
    body.ko-kr .info .title,
    body.ko-kr .info .twitter,
    body.ko-kr .footer { font-family: "Malgun Gothic", "맑은 고딕", "AppleGothic", "Dotum", "돋움", "Trebuchet MS", "Arial", sans-serif; }
    body.ko-kr .footer { font-size: 11px; }

    body.zh-cn,
    body.zh-cn .info .title,
    body.zh-cn .info .twitter,
    body.zh-cn .footer { font-family: "微软雅黑", "Microsoft YaHei", "Helvetica", "Tahoma", "StSun", "宋体", "SimSun", sans-serif; }
    body.zh-cn .info .twitter { font-size: 16px; }
    body.zh-cn .footer { font-size: 12px; }
    body.zh-cn .notice .logo span { background: url("<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/logos/bnet-default-cn.png"); }
    body.zh-cn .info .twitter { line-height: 1.5; background-image: url(data:image/png;base64,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); }
    body.zh-cn .short { text-align: center; }

    body.zh-tw,
    body.zh-tw .info .title,
    body.zh-tw .info .twitter,
    body.zh-tw .footer { font-family: "微軟正黑", "Microsoft JhengHei", "Helvetica", "Tahoma", "新明細體", "PMingLiU", "SimSun", sans-serif; }
    body.zh-tw .info .twitter { line-height: 1.5; }
    body.zh-tw .footer { font-size: 12px; }
    </style>

    <!--[if LT IE 9]>
    <style>
    .notice .logo span { background-image: url("<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/logos/bnet-default.gif"); }
    .info .twitter { background-image: url("<?php echo WoW::GetWoWPath(); ?>/static/maintenance/bnet/images/twitter.png"); }
    .footer .copyright { zoom: 1; float: left; }
    .footer .legal { zoom: 1; float: left; }
    .footer .legal a { zoom: 1; float: left; }
    .footer .language { zoom: 1; white-space: normal; }
    .footer .privacy a { zoom: 1; }

    body.zh-cn .notice .logo span { background-image: url("<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/logos/bnet-default-cn.gif"); }
    body.zh-cn .info .twitter { background-image: url("<?php echo WoW::GetWoWPath(); ?>/static/maintenance/bnet/images/twitter-cn.png"); }
    </style>
    <![endif]-->

    <!--[if IE 6]>
    <script>
    try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
    </script>
    <![endif]-->

    <script>
    var css = 'class';
    var locale = (function() {
        var doc = document;
        var nav = navigator;
        var cookie = doc.cookie || '';
        var query = doc.location.search || '';
        var all = ['de-de', 'en-us', 'en-gb', 'es-es', 'es-mx', 'fr-fr', 'it-it', 'ko-kr', 'pl-pl', 'pt-br', 'ru-ru', 'zh-cn', 'zh-tw'];
        var test = -1;
        var start;
        var i;
        var loc;

        function getIndex(haystack) {
            return function(pin) {
                pin = pin.toLowerCase();
                pin = pin.replace('_', '-');

                for (i = 0; loc = haystack[i]; i++) {
                    if (loc === pin) {
                        return i;
        }
                }

                pin = pin.substr(0, 2);

                for (i = 0; loc = haystack[i]; i++) {
                    if (loc.substr(0, 2) === pin) {
                        return i;
            }
        }

                return -1;
            }
        };

        var index = getIndex(all);

        start = query.indexOf('loc=');
        if (start > -1) {
            test = index(encodeURIComponent(query.substr(start + 4, 5)));
            if (test > -1) {
                return all[test];
            }
        }

        start = cookie.indexOf('loc=');
        if (start > -1) {
            test = index(encodeURIComponent(cookie.substr(start + 4, 5)));
            if (test > -1) {
                return all[test];
            }
        }

        test = nav.userLanguage || nav.language;
        test = index(test);
        if (test > -1) {
            return all[test];
        }

        return 'en-us';
    })();

    (function(currentLocale) {
        var doc = document;
        var html = doc.getElementsByTagName('html')[0];
        html.setAttribute('lang', currentLocale);
    })(locale);
    </script>

    <!--[if lt IE 8]>
    <script>
    var css = 'className';
    </script>
    <![endif]-->

</head>
<body class="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>">

    <script>
    (function(currentLocale) {
        var doc = document;
        var body = doc.getElementsByTagName('body')[0];
        body.setAttribute(css, currentLocale);
    })(locale);
    </script>

    <div class="wrapper">

        <!-- US -->

        <div class="notice" id="en-us:notice">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">We’ll be back soon!</div>
                <p class="short">The Blizzard family of websites is currently undergoing maintenance to improve your browsing experience. Thank you for your patience!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    For updates, follow <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> on Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="es-mx:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">¡Regresaremos pronto!</div>
                <p class="short">Los sitios web de Blizzard no están disponibles por el momento. ¡Gracias por tu paciencia!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Para más información, sigue <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> en Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="pt-br:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Voltaremos logo!</div>
                <p class="short">Os websites da Blizzard estão em manutenção para melhorar sua experiência de navegação. Obrigado por sua paciência!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Para mais informações, siga <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> no Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <!-- EU -->

        <div class="notice" id="en-gb:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">We’ll be back soon!</div>
                <p class="short">The Blizzard family of websites is currently undergoing maintenance to improve your browsing experience. Thank you for your patience!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    For updates, follow <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> on Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="de-de:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Wir sind bald zurück!</div>
                <p class="short">Die Blizzard-Webseiten werden derzeit gewartet, es werden Inhalte integriert, die eure Browsing-Erfahrung zukünftig verbessern werden. Vielen Dank für eure Geduld!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Weitere Informationen erhaltet ihr über <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> auf Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="es-es:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">¡Volvemos en un periquete!</div>
                <p class="short">Las páginas web de Blizzard están temporalmente bajo mantenimiento para asegurar la máxima calidad del servicio. ¡Agradecemos tu paciencia!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Puedes mantenerte informado del estado en Twitter: <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a>
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="fr-fr:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Nous serons bientôt de retour !</div>
                <p class="short">Les sites Blizzard sont en maintenance pour le moment, afin d'améliorer votre expérience en ligne. Nous vous remercions pour votre patience et votre compréhension.</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Suivez <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> sur Twitter pour obtenir les informations les plus récentes.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="it-it:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Torniamo subito!</div>
                <p class="short">Le pagine web di Blizzard sono momentaneamente fuori servizio. Ti ringraziamo per la pazienza!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Per tenerti informato, segui <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> suTwitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="pl-pl:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Niedługo wracamy!</div>
                <p class="short">Na stronach Blizzard trwają właśnie prace administracyjne. Dziękujemy za cierpliwość!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Aktualne informacje można znaleźć śledząc profil <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> na Twitterze.
                </div>';
                }
                ?>
            </div>
        </div>

        <div class="notice" id="ru-ru:notice" style="display: none;">
            <h1 class="logo"><span>Battle.net</span></h1>
            <div class="info">
                <div class="title">Мы скоро вернемся!</div>
                <p class="short">На сайтах Blizzard в настоящий момент проводится техобслуживание, чтобы потом вам было еще приятнее ими пользоваться. Благодарим вас за терпение и понимание!</p>
                <?php
                if(WoWConfig::$TwitterAccount != null) {
                    echo '<div class="twitter">
                    Информация об открытии сайтов будет сразу размещена на <a tabindex="1" target="_blank" href="http://twitter.com/' . WoWConfig::$TwitterAccount . '">@' . WoWConfig::$TwitterAccount . '</a> на Twitter.
                </div>';
                }
                ?>
            </div>
        </div>

        <script>
        (function(currentLocale) {
            var doc = document;
            var notice;
            var us;
            if (currentLocale !== 'en-us') {
                notice = doc.getElementById(currentLocale + ':notice');
                us = doc.getElementById('en-us:notice');
                notice.style.display = 'block';
                us.style.display = 'none';
            }
        })(locale);
        </script>

        <!-- US -->

        <div class="footer" id="en-us:footer">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Terms of Use</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Privacy Policy</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright Infringement</a>
            </span>

            <span class="language">Americas – English (US)</span>

            <div class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validate TRUSTe privacy certification">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validate TRUSTe privacy certification" width="143" height="45" />
				</a>
            </div>

        </div>

        <div class="footer" id="es-mx:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos los derechos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Condiciones de Uso</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Políticas</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Derechos de autor</a>
            </span>

            <span class="language">América – Español (AL)</span>

            <div class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validar certificado de privacidad TRUSTe">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validar certificado de privacidad TRUSTe" width="143" height="45" />
				</a>
            </div>

        </div>

        <div class="footer" id="pt-br:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos os direitos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Termos de Uso</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Políticas</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Quebra de Direito Autorais</a>
            </span>

            <span class="language">Américas – Português</span>

            <div class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validate TRUSTe privacy certification">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validate TRUSTe privacy certification" width="143" height="45" />
				</a>
            </div>

        </div>

        <!-- EU -->

        <div class="footer" id="en-gb:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Terms of Use</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Privacy Policy</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright Infringement</a>
            </span>

            <span class="language">Europe – English (EU)</span>

        </div>

        <div class="footer" id="de-de:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Alle Rechte vorbehalten</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Nutzungsbestimmungen</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Rechtliches</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Datenschutzrichtlinien</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright-Verstoß</a>
            </span>

            <span class="language">Europa – Deutsch</span>

        </div>

        <div class="footer" id="es-es:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos los derechos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Condiciones de Uso</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Política de protección de datos</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Derechos de autor</a>
            </span>

            <span class="language">Europa – Español (EU)</span>

        </div>

        <div class="footer" id="fr-fr:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Tous droits réservés</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Conditions d’utilisation</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Mentions légales</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Politique de confidentialité</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Droits</a>
            </span>

            <span class="language">Europe – Français</span>

        </div>

        <div class="footer" id="it-it:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Tutti i diritti riservati</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Condizioni d’uso</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Informazioni legali</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Politica sulla privacy</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Menzioni sul</a>
            </span>

            <span class="language">Europa – Italiano</span>

        </div>

        <div class="footer" id="pl-pl:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Wszystkie prawa zastrzeżone</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Warunki użytkowania</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Prawne</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Polityka prywatności</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Naruszenie praw autorskich</a>
            </span>

            <span class="language">Europa – Polski</span>

        </div>

        <div class="footer" id="ru-ru:footer" style="display: none;">

            <span class="copyright">© Blizzard Entertainment, 2011 г.<br />Все права защищены</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Пользовательское соглашение</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Соглашения</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Политика конфиденциальности</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Авторское право</a>
            </span>

            <span class="language">Европа – Русский</span>

        </div>

        <script>
        (function(currentLocale) {
            var doc = document;
            var notice;
            var us;
            if (currentLocale !== 'en-us') {
                notice = doc.getElementById(currentLocale + ':footer');
                us = doc.getElementById('en-us:footer');
                notice.style.display = 'block';
                us.style.display = 'none';
            }
        })(locale);
        </script>

    </div>

</body>
</html>
