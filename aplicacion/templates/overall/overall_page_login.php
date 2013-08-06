<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo WoW_Locale::GetString('login_page_title'); ?></title>
<meta http-equiv="imagetoolbar" content="false"/>
<link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/css/common.css?v"/>
<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/css/common-ie.css?v"/><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/css/common-ie6.css?v"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/css/common-ie7.css?v"/><![endif]-->
<link rel="shortcut icon" href="<?php echo WoW::GetWoWPath(); ?>/login/static/_themes/bam/img/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/_themes/bam/css/master.css?v"/>
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/_themes/bam/css/master-ie6.css?v" /><![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo WoW::GetWoWPath(); ?>/login/static/_themes/bam/css/_lang/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>.css?v"/>
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/js/third-party/jquery-1.4.2.min.js?v"></script>

<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/login/static/local-common/js/core.js?"></script>
<script type="text/javascript">
Core.baseUrl = '<?php echo WoW::GetWoWPath(); ?>/login/<?php echo WoW_Locale::GetLocale(); ?>/';
</script>
</head>
<body class="<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>">
<div id="wrapper">
<h1 id="logo"><a href="<?php echo WoW::GetWoWPath(); ?>/">Battle.net</a></h1>
<div id="content" class="login">
<?php
if(WoW_Account::GetLastErrorCode() != ERROR_NONE) {
    echo '<div id="errors">
<ul>';
    $error_code = WoW_Account::GetLastErrorCode();
    if($error_code & ERROR_EMPTY_USERNAME) {
        echo '<li>' . WoW_Locale::GetString('login_error_empty_username_title') . '</li>';
    }
    if($error_code & ERROR_EMPTY_PASSWORD) {
        echo '<li>' . WoW_Locale::GetString('login_error_empty_password_title') . '</li>';
    }
    if($error_code & ERROR_WRONG_USERNAME_OR_PASSWORD) {
        echo '<li>' . WoW_Locale::GetString('login_error_wrong_username_or_password_title') . '</li>';
    }
    if($error_code & ERORR_INVALID_PASSWORD_FORMAT) {
        echo '<li>' . WoW_Locale::GetString('login_error_invalid_password_format_title') . '</li>';
    }
    echo '
</ul>
</div>';
}
?>
<div id="left">
<h2><?php echo WoW_Locale::GetString('login_page_auth_title'); ?></h2>
<form method="post" id="form" action="">
<?php
if(isset($_GET['ref'])) {
    echo '<input type="hidden" name="ref" value="' . $_GET['ref'] . '" />';
}
?>
<p><label for="accountName" class="label"><?php echo WoW_Locale::GetString('login_title'); ?></label>
<input id="accountName" value="<?php echo WoW_Account::GetUserName(); ?>" name="accountName" maxlength="320" type="text" tabindex="1" class="input" /></p>

<p><label for="password" class="label"><?php echo WoW_Locale::GetString('password_title'); ?></label>
<input id="password" name="password" maxlength="16" type="password" tabindex="2" autocomplete="off" class="input"/></p>
<p>
<span id="remember-me">
<label for="persistLogin">
<input type="checkbox" checked="checked" name="persistLogin" id="persistLogin" />
<?php echo WoW_Locale::GetString('remember_me_title'); ?>
</label>
</span>
<button class="ui-button button1" type="submit" data-text="<?php echo WoW_Locale::GetString('login_processing_title'); ?>">
    <span>
        <span><?php echo WoW_Locale::GetString('login_page_auth_title'); ?></span>
    </span>
</button>
</p>
</form>

<ul id="help-links">
<li class="icon-pass">
<a href="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset.html"><?php echo WoW_Locale::GetString('login_help_title'); ?></a>
</li>
<li class="icon-signup">
<?php echo WoW_Locale::GetString('have_no_account_title'); ?> <a href="<?php echo WoW::GetWoWPath(); ?>/account/creation/tos.html"><?php echo WoW_Locale::GetString('create_account_title'); ?></a>
</li>
<li class="icon-secure">
<a href="<?php echo WoW::GetWoWPath(); ?>/security/"><?php echo WoW_Locale::GetString('account_security_title'); ?></a>
</li>
</ul>

</div>
<div id="right">
<h2><?php echo WoW_Locale::GetString('have_no_account_title');?> </h2>
<h3><?php echo WoW_Locale::GetString('login_page_create_account_title'); ?></h3>
<a class="ui-button button1 " href="<?php echo WoW::GetWoWPath(); ?>/account/creation/tos.html">
<span>
<span><?php echo WoW_Locale::GetString('login_page_create_account_link_title'); ?></span>
</span>
</a>
</div>
<span class="clear"><!-- --></span>
<script type="text/javascript">
$(function() {
$('#accountName').focus();
});
</script>

</div>
<?php
WoW_Template::LoadTemplate('block_footer', true);
?>
</div>
</body>
</html>