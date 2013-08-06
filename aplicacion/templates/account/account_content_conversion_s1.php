<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="account-progress">
<?php echo sprintf(WoW_Locale::GetString('template_account_conversion_progress'), 33, 1, 3); ?>
<div id="progress-bar" class="border-3">
<div id="current-progress" class="border-3" style="width: 33%"></div>
</div>
</div>
<?php
if(WoW_Template::GetPageData('conversion_error') == true) {
    WoW_Template::LoadTemplate('block_account_creation_error');
}
?>
<div id="notKRAccount" class="noregion-merge" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo WoW_Locale::GetString('template_account_conversion_no_region_merge'); ?></strong></p>
<p><?php echo WoW_Locale::GetString('template_account_conversion_no_region_merge_text_kr'); ?></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="mergeNA" class="noregion-merge" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo WoW_Locale::GetString('template_account_conversion_no_region_merge'); ?></strong></p>
<p><?php echo WoW_Locale::GetString('template_account_conversion_no_region_merge_text'); ?></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="caution" id="kr-merge-alert" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p>If you lost you authenticator, please detach the authenticator first. (※ Security card service ended and automatically detached.) <a href="http://www.worldofwarcraft.co.kr/myworld/security/unbind-form.do" target="_blank">Detach authenticator</a><br/><br/><a href="http://kr.blizzard.com/support/article.xml?articleId=21140&amp;categoryId=1614&amp;parentCategoryId=&amp;pageNumber=1" target="_blank">Read more</a></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="caution" id="tw-warning" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong>If you use Phone Lock: please unlock your World of Warcraft account before merging.</strong></p>
<p>Taiwan: 0800-303-585<br /><em>(Not available 10-11AM every first Wed of the month)</em></p><p>Hong Kong &amp; Macau: 396-54666</p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo WoW_Locale::GetString('template_account_conversion_required_fields'); ?></span>
<h2 class="subcategory"><?php echo WoW_Locale::GetString('template_wow_dashboard_management'); ?></h2>
<h3 class="headline"><?php echo WoW_Locale::GetString('template_account_conversion_header'); ?></h3>
</div>
<p><?php echo WoW_Locale::GetString('template_account_conversion_info'); ?></p>
<div id="page-content">
<form method="post" action="<?php echo WoW::GetWoWPath(); ?>/account/management/wow-account-conversion.html" class="account-merge" id="account-merge">
<div class="input-hidden">
<input type="hidden" id="convert-target-page" name="targetpage" value="2" />
<input type="hidden" name="csrftoken" value="e6612910-483b-48e5-8f12-c8b370277606" />
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="wowRegion">
<span class="label-text">
<?php echo WoW_Locale::GetString('template_account_conversion_region_prompt'); ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-small">
<select name="wowRegion" id="wowRegion" class="small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="US"><?php echo WoW_Locale::GetString('template_account_conversion_region_us'); ?></option>
<option value="EU" selected="selected"><?php echo WoW_Locale::GetString('template_account_conversion_region_eu'); ?></option>
<option value="KR"><?php echo WoW_Locale::GetString('template_account_conversion_region_kr'); ?></option>
</select>
<span class="inline-message" id="wowRegion-message"> </span>
</span>
</span>
</div>
<div id="wowLogin">
<div class="input-row input-row-text">
<span class="input-left">
<label for="username">
<span class="label-text">
<?php echo WoW_Locale::GetString('template_account_conversion_account_name'); ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : null; ?>" id="username" class="small border-5 glow-shadow-2" autocomplete="off" tabindex="1" required="required" />
<span class="inline-message" id="username-message"> </span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="password">
<span class="label-text">
<?php echo WoW_Locale::GetString('template_account_conversion_account_password'); ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" />
<!--
<span class="inline-message" id="password-message"> <a class="icon-external" href="https://www.wow-europe.com/login-support/password.html" onclick="window.open(this.href);return false" tabindex="1">
<?php echo WoW_Locale::GetString('template_account_conversion_lost_password'); ?>
</a>
</span>
-->
</span>
</span>
</div>
</div>
<div class="submit-row">
<div class="input-left"></div>
<div class="input-right">
<button class="ui-button button1" type="submit" id="merge-submit" tabindex="1">
<span>
<span><?php echo WoW_Locale::GetString('template_account_conversion_next'); ?></span>
</span>
</button>
<a class="ui-cancel " href="<?php echo WoW::GetWoWPath(); ?>/account/" tabindex="1"><span><?php echo WoW_Locale::GetString('template_wow_dashboard_upgrade_account_cancel'); ?></span></a>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
(function() {
var mergeSubmit = document.getElementById('merge-submit');
mergeSubmit.disabled = 'disabled';
mergeSubmit.className = mergeSubmit.className + ' disabled';
})();
//]]>
</script>
</form>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
var inputs = new Inputs('#account-merge');
var mergeForm = new AccountMerge('#account-merge', {
captchaRegions: [ 'US', 'EU', 'KR' ],
accountCountry: '<?php echo WoW_Account::GetCountryCode(); ?>'
});
});
//]]>
</script>
</div>
</div>
</div>