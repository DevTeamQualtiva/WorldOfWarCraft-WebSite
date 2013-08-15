<?php
$char = WoW_Account::GetActiveCharacter();
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">
World of Warcraft
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li>
<a href="<?php echo $char['url']; ?>" rel="np">
<?php echo sprintf('%s @ %s', $char['name'], $char['realmName']); ?>
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/<?php echo WoW_Template::GetPageData('auction_side'); ?>/" rel="np">
<?php echo WoW_Locale::GetString('template_auction_title'); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/<?php echo WoW_Template::GetPageData('auction_side'); ?>/auctions" rel="np">
<?php echo WoW_Locale::GetString('template_auction_menu_lots'); ?>
</a>
</li>
</ol>-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo $char['faction_text']; ?> profile-wrapper-<?php echo $char['faction_text']; ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">

		<div class="profile-sidebar-crest">

			<a href="<?php echo $char['url']; ?>" rel="np" class="profile-sidebar-character-model" style="background-image: url(<?php echo WoW::GetWoWPath(); ?>/wow/static/images/2d/inset/<?php echo $char['race']; ?>-<?php echo $char['gender']; ?>.jpg);">
				<span class="hover"></span>
				<span class="fade"></span>
			</a>

			<div class="profile-sidebar-info">
				<div class="name"><a href="<?php echo $char['url']; ?>" rel="np"><?php echo $char['name']; ?></a></div>
				
				<div class="under-name color-c<?php echo $char['class']; ?>">
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/race/<?php echo $char['race_key']; ?>" class="race"><?php echo $char['race_text']; ?></a>-<a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/<?php echo $char['class_key']; ?>" class="class"><?php echo $char['class_text']; ?></a> <span class="level"><strong><?php echo $char['level']; ?></strong></span> <?php echo WoW_Locale::GetString('template_lvl'); ?>
				</div>
				
					<?php
                    if($char['guildId'] > 0) {
                        echo sprintf('<div class="guild">
						<a href="%s">%s</a>
					</div>', $char['guildUrl'], $char['guildName']);
                    }
                    ?>

				<div class="realm">
					<span id="profile-info-realm" class="tip" data-battlegroup="<?php echo WoWConfig::$DefaultBGName; ?>"><?php echo $char['realmName']; ?></span>
				</div>

	<div id="money">

		<span class="icon-gold">--</span>
		<span class="icon-silver">--</span>
		<span class="icon-copper">--</span>
		<span class="in-game" style="display: none"><?php echo WoW_Locale::GetString('template_auction_in_game'); ?></span>
	</div>

			</div>
		</div>

	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
			<li>

	<a href="<?php echo $char['url']; ?>" class="back-to" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_menu_character_info'); ?></span></span></a>
</li>
			<li class="">
	<a href="index" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_auction_menu_index'); ?></span></span></a>
			</li>
			<li class="">
	<a href="browse" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_auction_menu_browse'); ?></span></span></a>
			</li>
			<li class="">
	<a href="create" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_auction_menu_create'); ?></span></span></a>
			</li>
			<li class="">
	<a href="bids" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_auction_menu_bids'); ?>
		(<b id="total-bids">0</b>)</span></span></a>
			</li>
			<li class=" active">
	<a href="auctions" class="" rel="np"><span class="arrow"><span class="icon"><?php echo WoW_Locale::GetString('template_auction_menu_lots'); ?>
		(<b id="total-auctions"><?php echo WoW_Auction::GetSellingItemsCount(); ?></b>)</span></span></a>
			</li>
	</ul>

		</div>
				</div>
			</div>
		</div>
		
		<div class="profile-contents">
			<div class="faction tabard-<?php echo WoW_Template::GetPageData('auction_side'); ?>">
				<strong><?php echo WoW_Locale::GetString('faction_' . WoW_Account::GetActiveCharacterInfo('faction_text')); ?></strong><br />

				<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/neutral/"><?php echo WoW_Locale::GetString('template_auction_switch_to_neutral'); ?></a>
			</div>
		

		<div class="profile-section-header">
				<h3 class="category "><?php echo WoW_Locale::GetString('template_auction_menu_lots'); ?></h3>

		</div>

	<span class="clear"><!-- --></span>

	<script type="text/javascript">
	//<![CDATA[
			$(function() {
					var active = new Table('#auctions-active', { column: 2, method: 'numeric' });

				var sold = new Table('#auctions-sold', { column: 4, method: 'numeric', type: 'desc' });
				var ended = new Table('#auctions-ended', { column: 4, method: 'numeric' });
			});
	//]]>
	</script>

		<div class="auction-house auctions">

			<div id="auctions-active" class="table-section">
            <?php
            if(WoW_Auction::GetSellingItemsCount() > 0) {
                WoW_Template::LoadTemplate('block_auction_my_lots');
            }
            else {
                echo sprintf('<div class="table-bar bar-disabled">
						<span class="toggler">%s</span>
					</div>

					<div class="empty-result">
						%s
					</div>', WoW_Locale::GetString('template_auction_active_auctions'), WoW_Locale::GetString('template_auction_no_active_auctions'));
            }
            ?>
			</div>

			<div id="auctions-sold" class="table-section">
					<div class="table-bar bar-disabled">
						<span class="toggler"><?php echo WoW_Locale::GetString('template_auction_sold_auctions'); ?></span>
					</div>

					<div class="empty-result">
						<?php echo WoW_Locale::GetString('template_auction_no_sold_auctions'); ?>
					</div>
			</div>

			
			<div id="auctions-ended" class="table-section">
					<div class="table-bar bar-disabled">
						<span class="toggler"><?php echo WoW_Locale::GetString('template_auction_expired_auctions'); ?></span>
					</div>

					<div class="empty-result">
						<?php echo WoW_Locale::GetString('template_auction_no_expired_auctions'); ?>
					</div>
			</div>
		</div>


	<div style="display: none">
		<div class="dialog" id="template-dialog">
			<div class="inner"><div class="row"></div></div>
			<a href="javascript:;" class="close"> </a>
		</div>

		<div class="bar" id="template-bid" style="display: none">
			

	<button class="ui-button button2 float-right "	type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_auction_bid'); ?></span>
		</span>
	</button>
			<?php echo WoW_Locale::GetString('template_auction_enter_bid'); ?>
			<span class="icon-gold"><input type="text" size="5" tabindex="5" name="gold" maxlength="6" class="input align-right" /></span>
			<span class="icon-silver"><input type="text" size="1" tabindex="6" name="silver" maxlength="2" class="input align-right" /></span>
			<span class="icon-copper"><input type="text" size="1" tabindex="7" name="copper" maxlength="2" class="input align-right" /></span>
	<span class="clear"><!-- --></span>
		</div>

		<div class="bar" id="template-buyout" style="display: none">
		
	<button class="ui-button button2 float-right " type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_auction_buyout'); ?></span>
		</span>
	</button>
			<?php echo WoW_Locale::GetString('template_auction_buyout_confirm'); ?> &#160;
			<span class="price">
				<span class="icon-gold">0</span>
				<span class="icon-silver">0</span>
				<span class="icon-copper">0</span>
			</span>
	<span class="clear"><!-- --></span>
		</div>

		<div class="bar" id="template-cancel" style="display: none">
		
	<button class="ui-button button2 float-right " type="submit">
		<span>
			<span><?php echo WoW_Locale::GetString('template_auction_buyout_confirm_btn'); ?></span>
		</span>
	</button>
    <?php echo WoW_Locale::GetString('template_auction_cancel_warning'); ?>
	<span class="clear"><!-- --></span>
		</div>
	</div>
	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Toast.options.timer = 5000;

			Auction.page = 'auctions';

			Auction.status = {
				hardLogin: true,
				wowRemote: false
			};
			
			Auction.toasts = {
			 <?php
             $js_strings = array('bid', 'sold', 'won', 'cancelled', 'created', 'outbid', 'expired', 'claim', 'subscription', 'interrupted', 'totalCreated', 'transaction', 'transactionMax');
             $count = count($js_strings);
             $i = 0;
             foreach($js_strings as $str) {
                echo sprintf('%s: \'%s\'', $str, WoW_Locale::GetString('template_auction_js_' . $str));
                ++$i;
                if($i < $count) {
                    echo ",\n";
                }
             }
             ?>
			};
		});
	//]]>
	</script>
		</div>

	<span class="clear"><!-- --></span>
	</div>

	<script type="text/javascript">
	//<![CDATA[
		var MsgProfile = {
			tooltip: {
				feature: {
					notYetAvailable: "<?php echo WoW_Locale::GetString('template_feature_not_available'); ?>"
				},
				vault: {
					character: "<?php echo WoW_Locale::GetString('template_vault_auth_required'); ?>",
					guild: "<?php echo WoW_Locale::GetString('template_vault_guild'); ?>"
				}
			}
		};
	//]]>
	</script>
</div>
</div>
</div>
