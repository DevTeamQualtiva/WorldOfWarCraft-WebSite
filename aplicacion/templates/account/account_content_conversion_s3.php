<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="account-progress">
<?php echo sprintf(WoW_Locale::GetString('template_account_conversion_progress'), 100, 3, 3); ?>
<div id="progress-bar" class="border-3">
<div id="current-progress" class="border-3" style="width: 100%"></div>
</div>
</div>
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo WoW_Locale::GetString('template_account_conversion_required_fields'); ?></span>
<h2 class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_management'); ?></h2>
<h3 class="headline"><?php echo WoW_Locale::GetString('template_account_conversion_confirmation'); ?></h3>
</div>
<div id="page-content">
<p><?php echo WoW_Locale::GetString('template_account_conversion_warning_account_name'); ?></p>
<div class="conversion-content">
<div class="stats">
<span class="old-account-notice"><del class="caption"><?php echo $_SESSION['conversion_userName']; ?></del></span>
<div class="conversion-msg">
<div class="merge-arrow"></div>
<span class="caption"><?php echo WoW_Locale::GetString('template_account_conversion_new_account_name'); ?></span>
</div>
<p class="new-account border-5">
<span class="headline"><?php echo WoW_Account::GetUserName(); ?></span>
</p>
</div>
<p><?php echo WoW_Locale::GetString('template_account_conversion_details_header'); ?></p>
<div class="conversion-details">
<ul>
<?php echo sprintf(WoW_Locale::GetString('template_account_conversion_details_list'), WoW_Account::GetUserName()); ?>
</ul>
</div>
<form method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/management/wow-account-conversion.html" id="convert-submit">
<input type="hidden" name="csrftoken" value="3ea60088-b2d5-4734-9577-efd4b518a963" />
<div class="input-hidden">
<input type="hidden" id="convert-target-page" name="targetpage" value="finish" />
</div>
<fieldset class="ui-controls section-buttons">
<button class="ui-button button1" type="submit" tabindex="1">
<span>
<span><?php echo WoW_Locale::GetString('template_account_conversion_complete'); ?></span>
</span>
</button>
<a class="ui-cancel" href="#" tabindex="1"><span><?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_cancel'); ?></span></a>
</fieldset>
</form>
</div>
</div>
<!--[if lt IE 7]> <script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/account/local-common/js/third-party/DD_belatedPNG.js"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.merge-arrow');
DD_belatedPNG.fix('.conversion-details li');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>