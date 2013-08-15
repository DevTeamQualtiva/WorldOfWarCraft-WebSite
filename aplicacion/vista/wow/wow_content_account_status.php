<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">
World of Warcraft
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="cms-account-status" class="ajax-update">
			<div id="forum-content">
				<div class="section-header">
					<?php
                    if(WoW_Template::GetPageData('account-status') == 'no_subscribe') {
                        echo WoW_Locale::GetString('template_account_status_posting_disabled');
                    }
                    ?>
				</div>
				<div class="bannedInfo">
					<div class="banned-int">
							<div class="center">
								<?php echo WoW_Locale::GetString('template_account_status_info_' . WoW_Template::GetPageData('account-status')); ?>
                            </div>
					</div>
				</div>
			</div>
	<div class="center">
		<?php
        if(WoW_Template::GetPageData('account-status') == 'no_subscribe') {
            echo sprintf('%s<div><a class="ui-button button1 " href="?logout"><span><span>%s</span></span></a></div>', WoW_Locale::GetString('template_account_status_clear_session'), WoW_Locale::GetString('template_account_status_log_out'));
        }
        ?>
	</div>
	</div>
</div>
</div>
</div>
