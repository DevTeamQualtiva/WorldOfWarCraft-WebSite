<div class="alert error closeable border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo WoW_Locale::GetString('template_js_unexpectedError'); ?></strong></p>
<p class="error.email.unavailable"><?php echo WoW_Template::GetPageData('account_creation_error_msg') ?></p>
</div>
</div>
<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;"><?php echo WoW_Locale::GetString('template_blog_close_report'); ?></a>
<span class="clear"><!-- --></span>
</div>
