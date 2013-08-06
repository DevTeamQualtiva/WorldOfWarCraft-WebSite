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
    if($error_code & ERORR_NEW_PASSWORD_NOT_MATCH) {
        echo '<p class="error.pass.notmatch">'.WoW_Locale::GetString('template_account_password_error_pass_not_match').'</p>';
    }
    elseif($error_code & ERORR_NEW_PASSWORD_FAIL) {
        echo '<p class="error"></p>';
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
        <span class="float-right"><span class="form-req">*</span><?php echo WoW_Locale::GetString('template_account_password_reset_required_fields'); ?></span>
        <h2 class="subcategory"><?php echo WoW_Locale::GetString('template_account_password_reset_title'); ?></h2>
        <h3 class="headline"><?php echo WoW_Locale::GetString('template_account_password_reset_change_title'); ?></h3>
      </div>
      <div id="page-content" class="page-content">
        <p><?php echo WoW_Locale::GetString('template_account_password_reset_change_intro'); ?></p>
        <form method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset-confirm.xml" id="change-settings">
          <div class="hidden-inputs">
            <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['password_recovery_email']; ?>"/>
            <input type="hidden" id="ticket" name="ticket" value="<?php echo $_SESSION['password_recovery_ticket']; ?>"/>
          </div>       
          <div class="form-row required">
            <label for="newPassword" class="label-full ">
              <strong><?php echo WoW_Locale::GetString('template_account_password_reset_change_newpass'); ?></strong>
              <span class="form-required">*</span>
            </label> 
            <input type="password" id="newPassword" name="newPassword" value="" class="input border-5 glow-shadow-2" maxlength="16" tabindex="1" /> 
            <div class="ui-note">
              <div class="form-note toggle-note border-5 glow-shadow" id="newPassword-note">
                <div class="note"> 
                  <p>
                    <h5><?php echo WoW_Locale::GetString('template_account_password_reset_rules_title'); ?></h5>
                    <ul>
                      <?php echo WoW_Locale::GetString('template_account_password_reset_rules'); ?>
                    </ul>
                  </p>
                  <a href="#" class="close-note" rel="newPassword-note"></a> 
                </div>
                <div class="note-arrow">
                </div>
              </div>
              <a href="#" class="note-toggler" rel="newPassword-note">
                <img src="<?php echo WoW::GetWoWPath(); ?>/account/images/icons/tooltip-help.gif" alt="?" width="16" height="16" /></a>
            </div>
          </div>      
          <div class="form-row required">
            <label for="reNewPassword" class="label-full ">
              <strong><?php echo WoW_Locale::GetString('template_account_password_reset_change_confirm'); ?></strong>
              <span class="form-required">*</span>
            </label> 
            <input type="password" id="reNewPassword" name="reNewPassword" value="" class="input border-5 glow-shadow-2" maxlength="16" tabindex="1" />
          </div>
          <fieldset class="ui-controls"> 
            <button class="ui-button button1 disabled" type="submit" disabled="disabled" id="settings-submit" tabindex="1">
              <span><span><?php echo WoW_Locale::GetString('template_account_password_reset_next'); ?></span></span>
            </button>
            </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
