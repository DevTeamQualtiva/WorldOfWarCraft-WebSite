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
    if($error_code & ERORR_INVALID_PASSWORD_RECOVERY_ANSWER) {
        echo '<p class="error.email.invalid">'.WoW_Locale::GetString('template_account_password_reset_error_answer').'</p>';
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
        <h2 class="subcategory"><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval'); ?></h2>
        <h3 class="headline"><?php echo WoW_Locale::GetString('login_help_title'); ?></h3>
      </div> 
      <form id="support-form" method="POST" action="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset-success.html">
        <div class="form-row">
          <span class="form-left"><?php echo WoW_Locale::GetString('template_account_password_reset_question'); ?></span>
          <span class="form-right"><?php echo WoW_Locale::GetString('template_account_creation_secret_question_'.$_SESSION['wow_password_recovery']['question_id']); ?></span>
        </div>       
        <div class="form-row required">
          <label for="secretAnswer" class="label-full ">
            <strong><?php echo WoW_Locale::GetString('template_account_password_reset_answer'); ?></strong>
            <span class="form-required">*</span>
          </label> 
          <input type="text" id="secretAnswer" name="secretAnswer" value="" class="input border-5 glow-shadow-2" maxlength="200" tabindex="1"    />
        </div>
        <fieldset class="ui-controls " > 
          <button class="ui-button button1 disabled" type="submit" disabled="disabled" id="support-submit">
            <span><span><?php echo WoW_Locale::GetString('template_account_password_reset_next'); ?></span></span>
          </button> 
          <a class="ui-cancel" href="password-reset-select.html" tabindex="1"><span><?php echo WoW_Locale::GetString('template_account_password_reset_back'); ?></span></a>
          </fieldset>
      </form>  
    </div>
  </div>
</div>
