	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo WoW_Locale::GetString('template_account_wow_title'); ?></title>
		<meta name="description" content="<?php echo WoW_Locale::GetString('template_account_wow_meta'); ?>"/>
		<link rel="shortcut icon" href="<?php echo WoW::GetWoWPath(); ?>/account/images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup.css"/>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup-footer.css"/>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup-promo-cataclysm.css"/>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/locale/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>.css"/>	
	
	<style type="text/css">
		body.<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?> a.watchCinematic{background-image:url(<?php echo WoW::GetWoWPath(); ?>/account/images/lightweight-account-creation/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/promo-cataclysm/buy-now.jpg)}
		body.<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?> a.learnMore{background-image:url(<?php echo WoW::GetWoWPath(); ?>/account/images/lightweight-account-creation/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/promo-cataclysm/learn-more.jpg)}
		body.<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?> span.new-age{background-image:url(<?php echo WoW::GetWoWPath(); ?>/account/images/lightweight-account-creation/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/promo-cataclysm/newage.jpg)}
	</style>

	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup-ie6.css"/>
		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup-promo-cataclysm-ie6.css"/>
	<![endif]-->

	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo WoW::GetWoWPath(); ?>/account/css/lightweight-account-creation/signup-ie7.css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/core.js"></script>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/js/lightweight-account-creation/signup.js"></script>
	<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/js/lightweight-account-creation/form-validation.js"></script>

	<script type="text/javascript">
		FormValidation.validators.required.errorProperties.text         = "<?php echo WoW_Locale::GetString('template_account_creation_error_fields'); ?>";
		FormValidation.validators.emailMatch.errorProperties.text       = "<?php echo WoW_Locale::GetString('template_account_wow_err1'); ?>";
		FormValidation.validators.captcha.errorProperties.text          = "<?php echo WoW_Locale::GetString('template_account_wow_err2'); ?>";
		FormValidation.validators.emailUnavailable.errorProperties.text = '<?php echo WoW_Locale::GetString('template_account_wow_err3'); ?>';
		FormValidation.validators.emailInvalid.errorProperties.text     = "<?php echo WoW_Locale::GetString('template_account_wow_err4'); ?>";
		FormValidation.validators.password.errorProperties.text         = "<?php echo WoW_Locale::GetString('template_account_wow_err5'); ?>";
		FormValidation.validators.cannotPaste.errorProperties.text      = "<?php echo WoW_Locale::GetString('template_account_wow_err6'); ?>";
		

		WowLanding.regionMenu.regionLabels = {
			us: "Americas",
			eu: "Europe",
			ru: "Россия"
		};

			var regionalSites = {
				US: 'http://<?php echo $_SERVER['SERVER_NAME']. WoW::GetWoWPath(); ?>',
				EU: 'http://<?php echo $_SERVER['SERVER_NAME']. WoW::GetWoWPath(); ?>',
				RU: 'http://<?php echo $_SERVER['SERVER_NAME']. WoW::GetWoWPath(); ?>' 
			};

			var enforceCaptcha = true;

	</script>


	</head>
	<body class="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>" onclick="WowLanding.regionMenu.hide();">
	<div class="positionWrapper">
		<div class="relative">
			<div class="page">
	<div class="leftColumn">
		<div class="flash-trailer">

			<div id="trailer"></div>
			<script type="text/javascript">

				var params = { allowScriptAccess: "always", wmode: "transparent", allowFullScreen: "true" };
				var atts = { id: "trailer" };
				swfobject.embedSWF('http://www.youtube.com/v/<?php echo WoW_Locale::GetLocaleID() == LOCALE_RU ? 'tp-utWVDpIQ' : 'Wq4Y7ztznKc'; ?>?enablejsapi=1&amp;amp;playerapiid=finalunlocked-video&amp;amp;fs=1&amp;amp;hd=1', "trailer", "432", "216", "8", null, null, params, atts);
                
			</script>
			<div class="cataclysm-logo"></div>
		</div>

		<span class="new-age"></span>

        <div class="gameWorld"><!-- --></div>
		<a class="watchCinematic" href="https://eu.battle.net/account/activation/landing.html?product=CAT" onclick="window.open(this.href); return false;">
			<img class="blank" src="/account/images/layout/blank.gif" alt="<?php echo WoW_Locale::GetString('template_account_wow_cata_cinematic'); ?>" />
		</a>
		<a class="learnMore" href="http://eu.blizzard.com/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/games/cataclysm/index.html" onclick="pageTracker._trackEvent('WoW Trial Signup', 'Learn More', 'EU', '<?php echo WoW_Locale::GetLocale(LOCALE_PATH); ?>'); window.open(this.href);return false;">
			<img class="blank" src="/account/images/layout/blank.gif" alt="<?php echo WoW_Locale::GetString('template_account_wow_cata_explore'); ?>" />
		</a>

	</div>
	<div class="rightColumn">
	    <table class="topLogin">
	    	<tr>
	    		<td class="left" valign="middle">
	    			<?php echo sprintf(WoW_Locale::GetString('template_account_wow_notify'), WoW_Account::GetUserName()); ?>
	    		</td>
	    		<td class="right" valign="middle">
			    	<a class="signIn" href="?logout=fast">
			    		<span><?php echo WoW_Locale::GetString('template_account_status_log_out'); ?></span>
			    	</a>
			    </td>
			</tr>
	    </table>

	    <div class="clear"><!-- --></div>
		<div id="parchment-container">
			<div class="wrapper-parchment-bottom">
				<div class="parchment-bottom">
					<div class="parchment-top">
						<div class="parchment-top-smoothener">
	<form id="signUpForm" name="signUpForm" class="signUpForm" action="." method="post"
		onsubmit="return FormValidation.validateForm(this);">

		<h1 class="formHeader"><?php echo WoW_Locale::GetString('tempalte_account_wow_creation'); ?></h1>


		<div class="relative">


	<div id="formValidation" class="messageBox" style="<?php echo WoW_Template::GetPageData('creation_error') ? null : 'display:none;'; ?>">
		<div class="background">
			<ul id="errorList">
                <li id="error.email.unavailable.trialSignup"><?php echo WoW_Locale::GetString('template_account_wow_err3'); ?></li>
			</ul>
		</div>
	</div>
		</div>

	<div class="formBackground">
		<div class="formTop">
			<div class="formBottom">
				<table class="accountInfo">
<tr id="emailAddressRow" class="<?php echo WoW_Template::GetPageData('creation_error') ? 'invalid' : null; ?>">
		<td class="leftCol">
			<label for="emailAddress"><?php echo WoW_Locale::GetString('template_management_account_name'); ?></label>
		</td>
		<td class="rightCol">
    <input type="text" id="emailAddress" name="emailAddress" value="<?php echo isset($_POST['emailAddress']) ? $_POST['emailAddress'] : null; ?>" class='text validate required emailMatch <?php echo WoW_Template::GetPageData('creation_error') ? 'emailUnavailable emailInvalid' : null; ?>' onclick='$("#accountNote").show();' onfocus='$("#accountNote").show();' onblur='$("#accountNote").hide();FormValidation.validateField(this, event);PasswordValidation.validate(event)' maxlength='320'    />

			<div class="validField"><!-- --></div>
			<div class="clear"><!-- --></div>
			<div id="accountNote" class="messageBox" style="display:none">
				<div class="arrowLeft"><!-- --></div>
				<div class="background">
					<p>
						<strong><?php echo WoW_Locale::GetString('template_account_wow_emailHint'); ?></strong>
					</p>
				</div>
			</div>
		</td>
	</tr>
	<tr id="passwordRow" class="">
		<td class="leftCol">
			<label for="password"><?php echo WoW_Locale::GetString('password_title'); ?></label>
		</td>
		<td class="rightCol">
    <input type="password" id="password" name="password" value="" class='text validate required password' onkeyup='FormValidation.validateField(this, event);' onblur='FormValidation.validateField(this, event);' maxlength='16'    />

			<div class="validField"><!-- --></div>
			<div class="clear"><!-- --></div>
		</td>
	</tr>
				</table>
			</div>
		</div>
	</div>
		<div class="clear"><!-- --></div>
		<div id="captchaExtension">
			<table class="accountInfo">
	<tr>
		<td class="rightCol" colspan="2">
			<input id="prepopulate" name="prepopulate" type="hidden" value="false" />
			<input name="regionRef" type="hidden" value=""/>
			<input id="btnSubmit" type="submit" class="submit" value="<?php echo WoW_Locale::GetString('template_account_wow_submit'); ?>" />
		</td>
	</tr>
			</table>
		</div>
	</form>
						</div>
					</div>
				</div>
			</div>
			<div class="parchment-bottom-edge">

			</div>
		</div>
	</div>

	<div class="clear"><!-- --></div>
	<div class="footer">


		<div class="needHelp">
			<?php echo WoW_Locale::GetString('copyright_bottom_questions'); ?><br />
			<a href="http://eu.blizzard.com/support/index.xml?locale=<?php echo WoW_Locale::GetLocale(LOCALE_PATH); ?>" onclick="window.open(this.href);return false;"><?php echo WoW_Locale::GetString('copyright_bottom_support'); ?></a>
		</div>

			<div class="legal">
				<a class="blizzard" onclick="window.open(this.href);return false;" href="http://eu.blizzard.com/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/"> </a>
				<a class="bnet" onclick="window.open(this.href);return false;" href="http://eu.battle.net?locale=<?php echo WoW_Locale::GetLocale(LOCALE_PATH); ?>"> </a>
	
				<a href="http://eu.blizzard.com/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/company/about/privacy.html" onclick="window.open(this.href);return false;"><?php echo WoW_Locale::GetString('copyright_bottom_privacy'); ?></a>
	
				<span class="divider">|</span>
	
				<a href="http://eu.blizzard.com/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/company/about/termsofuse.html" onclick="window.open(this.href);return false;"><?php echo WoW_Locale::GetString('copyright_bottom_legal'); ?></a><br />
	
				<a href="http://eu.blizzard.com/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/company/about/legal-faq.html" onclick="window.open(this.href);return false;"><?php echo WoW_Locale::GetString('copyright_bottom_title'); ?></a>
	
				<div class="clear"> </div>
			</div>

	</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		FormValidation.initialize("signUpForm", true);
		//returning user
		ReturningUser.check();
	</script>
	</body>
	</html>