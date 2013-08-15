<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="account-progress">
<?php echo sprintf(WoW_Locale::GetString('template_account_conversion_progress'), 66, 2, 3); ?>
<div id="progress-bar" class="border-3">
<div id="current-progress" class="border-3" style="width: 66%"></div>
</div>
</div>
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo WoW_Locale::GetString('template_account_conversion_required_fields'); ?></span>
<h2 class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_management'); ?></h2>
<h3 class="headline"><?php echo WoW_Locale::GetString('template_account_conversion_merging_accounts'); ?></h3>
</div>
<div id="page-content">
<p class="caption"><?php echo WoW_Locale::GetString('template_account_conversion_merging_head'); ?></p>
<p><?php echo WoW_Locale::GetString('template_account_conversion_merging_text'); ?></p>
<div class="conversion-multi">
<p class="large-caption"><?php echo WoW_Locale::GetString('template_account_conversion_confirm_sole_user'); ?></p>
</div>
<form method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/management/wow-account-conversion.html" id="convert-submit">
<input type="hidden" name="csrftoken" value="05276b85-cfa1-417e-a284-87fd5cee0502" />
<div class="input-hidden">
<input type="hidden" id="convert-target-page" name="targetpage" value="3" />
</div>
<fieldset class="ui-controls section-buttons">
<button
class="ui-button button1 "
type="submit"
tabindex="1">
<span>
<span><?php echo WoW_Locale::GetString('template_account_conversion_confirm_sole_user_yes'); ?></span>
</span>
</button>
<a class="ui-cancel "
href="<?php echo WoW::GetWoWPath(); ?>/account/management/"
tabindex="1">
<span>
<?php echo WoW_Locale::GetString('template_account_conversion_confirm_sole_user_no'); ?></span>
</a>
</fieldset>
</form>
</div>
</div>
</div>
</div>