<div>
	<div class="sidebar-title">
		<h3 class="title-auctions">
			<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/"><?php echo WoW_Locale::GetString('template_auction_auction'); ?></a>
		</h3>
	</div>

		<div class="sidebar-content">
		
		<div class="sidebar-cell">
			<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/auctions"><?php echo WoW_Locale::GetString('template_auction_my_lots'); ?></a>

			<ul>
				<li>
					<?php echo WoW_Locale::GetString('template_auction_sold'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/auctions">
						<span>
                        <?php
                        if(WoW_Auction::GetSoldItemsCount() > 0) {
                            echo '<strong>' . WoW_Auction::GetSoldItemsCount() . '</strong>';
                        }
                        else {
                            echo '0';
                        }
                        ?></span>
					</a>
				</li>
				<li>
					<?php echo WoW_Locale::GetString('template_auction_selling'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/auctions">
						<span>
                        <?php
                        if(WoW_Auction::GetSellingItemsCount() > 0) {
                            echo '<strong>' . WoW_Auction::GetSellingItemsCount() . '</strong>';
                        }
                        else {
                            echo '0';
                        }
                        ?></span>
					</a>
				</li>		
				<li>
					<?php echo WoW_Locale::GetString('template_auction_ended'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/auctions">
		
							<span>0</span>
					</a>
				</li>
			</ul>
		</div>		
		
		<div class="sidebar-cell">
			<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/bids"><?php echo WoW_Locale::GetString('template_auction_my_bids'); ?></a>
			
			<ul>
				<li>
					<?php echo WoW_Locale::GetString('template_auction_won'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/bids">
						<span>
                        <?php
                        if(WoW_Auction::GetWonItemsCount() > 0) {
                            echo '<strong>' . WoW_Auction::GetWonItemsCount() . '</strong>';
                        }
                        else {
                            echo '0';
                        }
                        ?></span>
					</a>
				</li>
				<li>
					<?php echo WoW_Locale::GetString('template_auction_winning'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/bids">
		
							<span>0</span>
					</a>
				</li>	
				<li>
					<?php echo WoW_Locale::GetString('template_auction_lost'); ?>
					<a href="<?php echo WoW::GetWoWPath(); ?>/wow/vault/character/auction/horde/bids">
							<span>0</span>
					</a>
				</li>
			</ul>
		</div>
		
		

	<span class="clear"><!-- --></span>

		<ul class="sidebar-list">
			<li>
				<span class="float-right">
        <?php
        $money_won = WoW_Auction::GetWonMoneyAmount();
        $money = WoW_Utils::GetMoneyFormat($money_won);
        ?>
		<span class="icon-gold"><?php echo $money['gold'] > 0 ? $money['gold'] : '--'; ?> </span>
		<span class="icon-silver"><?php echo $money['gold'] > 0 ? $money['silver'] : '--'; ?></span>
		<span class="icon-copper"><?php echo $money['gold'] > 0 ? $money['copper'] : '--'; ?></span>
</span>
				<?php echo WoW_Locale::GetString('template_auction_earned'); ?>
			</li>
			<li>
				<span class="float-right">
					<?php echo WoW_Auction::GetMailsCount() ?>/50
					(<?php echo WoW_Utils::GetPercent(50, WoW_Auction::GetMailsCount()); ?>%)
				</span>
				<?php echo WoW_Locale::GetString('template_auction_mailbox'); ?>
			</li>
		</ul>
		</div>
</div>