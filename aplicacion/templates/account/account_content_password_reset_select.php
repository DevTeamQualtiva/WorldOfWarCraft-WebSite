<div id="layout-middle">
  <div class="wrapper">
    <div id="content">    
      <div id="page-header">
        <h2 class="subcategory"><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval'); ?></h2>
        <h3 class="headline"><?php echo WoW_Locale::GetString('login_help_title'); ?></h3>
      </div> 
      <p><?php echo sprintf(WoW_Locale::GetString('template_account_password_reset_retrieval_intro'), $_SESSION['wow_password_recovery']['username'], $_SESSION['wow_password_recovery']['email']); ?></p>
      <form id="support-form" method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/support/password-reset-secred-answer.html">
        <h3 class="caption choose"><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval_method'); ?></h3>  
        <div class="wide-radio-button">
          <div class="form-row-checkbox required">
            <span class="checkbox">
              <input type="radio" name="verificationMethod" value="SECURITY_QUESTION" class="required" id="verificationMethod-0" tabindex="1"/>
            </span>
            <label class="required" for="verificationMethod-0" >
              <strong><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval_method_Q'); ?></strong>
            </label>
          </div>
          <div class="indented">
            <a href="http://eu.blizzard.com/support/article.xml?locale=en_GB&amp;tag=authkeyhelp" onclick="window.open(this.href);return false;">
              <img height='16' width='16' src='<?php echo WoW::GetWoWPath(); ?>/account/images/icons/tooltip-help.gif' alt=''/><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval_where'); ?></a>
          </div>
          <div id="footnote">
            <p><?php echo WoW_Locale::GetString('template_account_password_reset_retrieval_note'); ?></p>
          </div>
        </div>
        <fieldset class="ui-controls " > 
          <button class="ui-button button1 disabled" type="submit" disabled="disabled" id="support-submit">
            <span><span><?php echo WoW_Locale::GetString('template_account_password_reset_next'); ?></span></span>
          </button> 
          <a class="ui-cancel" href="password-reset.html" tabindex="1"><span><?php echo WoW_Locale::GetString('template_account_password_reset_back'); ?></span></a>
          </fieldset>
      </form> 
    </div>
  </div>
</div>
