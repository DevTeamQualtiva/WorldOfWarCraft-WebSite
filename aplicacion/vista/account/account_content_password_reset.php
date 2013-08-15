<div id="layout-middle">
<div class="wrapper">
<div id="content">
<?php
if(WoW_Account::GetLastErrorCode() != ERROR_NONE) {
    echo '<div class="alert error closeable border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong>'.WoW_Locale::GetString('template_account_password_reset_error').'</strong></p>
';
    $error_code = WoW_Account::GetLastErrorCode();
    if($error_code & ERORR_INVALID_PASSWORD_RECOVERY_COMBINATION) {
        echo '<p class="error.email.invalid">'.WoW_Locale::GetString('template_account_password_reset_error_invalid_combination').'</p>';
    }
    echo '
</div>
</div>
<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;">'.WoW_Locale::GetString('template_account_password_reset_error_close').'</a>
<span class="clear"><!-- --></span>
</div>';
}
?>
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo WoW_Locale::GetString('template_account_password_reset_required_fields'); ?></span>
<h3 class="headline"><?php echo WoW_Locale::GetString('login_help_title'); ?></h3>
</div>
<p class="introduction"><?php echo WoW_Locale::GetString('template_account_password_reset_intro'); ?></p>
<ul class="form-titles">
<li>
<a href="#form-password" class="form-anchor">
<span class="icon-32 closed"></span>
<span class="icon-32-label form-name"><?php echo WoW_Locale::GetString('template_account_password_reset_forgot_title'); ?></span>
</a>
<div class="sub-form hide-element" id="form-password">
<form method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset-select.html" id="support-form">
<input type="hidden" name="csrftoken" value="1d06ae50-e1c7-40fc-9563-a5ba3b31523f" />
<div class="form-row required">
<label for="email" class="label-full"><strong><?php echo WoW_Locale::GetString('template_account_password_reset_email'); ?>:</strong><span class="form-required">*</span></label>
<input type="text" id="email" name="email" value="" class=" input border-5 glow-shadow-2" maxlength="150" tabindex="1" />
</div>
<div class="form-row required">
<label for="firstName" class="label-full"><strong><?php echo WoW_Locale::GetString('template_account_password_reset_account'); ?>:</strong><span class="form-required">*</span></label>
<input type="text" id="firstName" name="firstName" value="" class=" input border-5 glow-shadow-2" maxlength="200" tabindex="2" />
</div>
<fieldset class="ui-controls " >
<button class="ui-button button1 disabled" type="submit" disabled="disabled" id="support-submit" tabindex="1">
<span><span><?php echo WoW_Locale::GetString('template_account_password_reset_next'); ?></span></span>
</button>
</fieldset>
</form>
</div>
</li>
<li>
<a href="#form-hacked" class="form-anchor">
<span class="icon-32 closed"></span>
<span class="icon-32-label form-name"><?php echo WoW_Locale::GetString('template_account_password_reset_hacked_title'); ?></span>
</a>
<div class="sub-form hide-element" id="form-hacked">
<p class="small-subtitle"><?php echo WoW_Locale::GetString('template_account_password_reset_hacked_subtitle'); ?></p>
<ul class="signs-list">
<?php echo WoW_Locale::GetString('template_account_password_reset_hacked_signs'); ?>
</ul>
<p class="small-subtitle"><?php echo WoW_Locale::GetString('template_account_password_reset_recovery_title'); ?></p>
<p><?php echo WoW_Locale::GetString('template_account_password_reset_recovery_subtitle'); ?></p>
<fieldset class="ui-controls " >
<a class="ui-button button1 " href="<?php echo WoW::GetWoWPath(); ?>/account/support/account-recovery.html">
<span><span><?php echo WoW_Locale::GetString('template_account_password_reset_recovery'); ?></span></span>
</a>
</fieldset>
</div>
</li>

</ul>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
