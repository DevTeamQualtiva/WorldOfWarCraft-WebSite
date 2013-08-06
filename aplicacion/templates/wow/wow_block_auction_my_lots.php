<a href="javascript:;" class="table-bar" onclick="Auction.toggleSection(this, 'auctions-active');">
						<span class="toggler">
							<?php echo WoW_Locale::GetString('template_auction_active_auctions'); ?>
							(<span id="total-auctions-active"><?php echo WoW_Auction::GetSellingItemsCount(); ?></span>)
						</span>
					</a>
					<div class="table">
						<table>
							<thead>
								<tr>
									<th>	<a href="javascript:;" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_auction_lots_table_name'); ?></span>
	</a>
</th>
									<th>	<a href="javascript:;" class="sort-link numeric">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_auction_lots_table_count'); ?></span>
	</a>
</th>
									<th>	<a href="javascript:;" class="sort-link numeric">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_auction_lots_table_time'); ?></span>
	</a>
</th>
									<th>	<a href="javascript:;" class="sort-link">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_auction_lots_table_high_bidder'); ?></span>
	</a>
</th>
									<th>
										<div class="table-menu-wrapper">
												<a href="javascript:;" class="sort-link numeric">
		<span class="arrow"><?php echo WoW_Locale::GetString('template_auction_lots_table_buyout'); ?></span>
	</a>

											<a href="javascript:;" class="table-menu-button" onclick="Auction.openSubMenu('menu-money', this);"> </a>
											<div id="menu-money" class="table-menu" style="display: none">
												<a href="?sort=bid"><?php echo WoW_Locale::GetString('template_auction_bid_price'); ?></a>
												<a href="?sort=unitBid"><?php echo WoW_Locale::GetString('template_auction_bid_price_per_item'); ?></a>
												<a href="?sort=buyout"><?php echo WoW_Locale::GetString('template_auction_buyout_price'); ?></a>
												<a href="?sort=unitBuyout"><?php echo WoW_Locale::GetString('template_auction_buyout_price_per_item'); ?></a>
											</div>
										</div>
									</th>
									<th><span class="sort-tab">&#160;</span></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th colspan="4" class="align-right"><strong><?php echo WoW_Locale::GetString('template_auction_buyout_total'); ?></strong></th>
									<th class="price" id="buyout-total">
                                        <?php
                                        $total_price = WoW_Auction::GetBuyOutTotalPrice();
                                        $money_format = WoW_Utils::GetMoneyFormat($total_price);
                                        echo sprintf('<span class="hide">%d</span><span class="icon-gold">%d</span>
			<span class="icon-silver">%d</span>
			<span class="icon-copper">%d</span>', $total_price, $money_format['gold'], $money_format['silver'], $money_format['copper']);
                                        ?>

									</th>
									<th> </th>
								</tr>
							</tfoot>
							<tbody>
                            <?php
                            $auction_items = WoW_Auction::GetSellingItems();
                            if(is_array($auction_items)) {
                                $toggleStyle = 2;
                                foreach($auction_items as $item) {
                                    echo sprintf('<tr id="auction-%d" class="row%d">
											<td class="item" data-raw="-4 %s">
												<a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" data-item="t=true&amp;i=%d&amp;s=%d" class="icon-frame frame-36" style="background-image: url(\'http://eu.media.blizzard.com/wow/icons/36/%s.jpg\');"> </a>
												<a href="%s/wow/' . WoW_Locale::GetLocale() . '/item/%d" data-item="t=true&amp;i=%d&amp;s=%d" class="color-q%d"><strong>%s</strong></a><br />
												<a href="%s">%s</a>

		<span class="png-fix" data-tooltip="%s">
			<img src="%s/wow/static/images/character/auction/me.png" alt="" style="margin-bottom: -3px" />
		</span>
											</td>
											<td class="quantity">%d</td>
											<td class="time" data-raw="%d">
	<span class="time-verylong" data-tooltip="%s">%s</span>
</td>
											<td class="status">
													<span class="text-red">%s</span>
											</td>
											<td class="price" data-raw="%d"
												data-tooltip="#price-tooltip-%d" data-tooltip-options=\'{"location": "middleRight"}\'>
												<div class="price-bid">
			<span class="icon-gold">%d</span>
			<span class="icon-silver">%d</span>
			<span class="icon-copper">%d</span>
</div>
<div class="price-buyout">
			<span class="icon-gold">%d</span>
			<span class="icon-silver">%d</span>
			<span class="icon-copper">%d</span>
</div>
	<div id="price-tooltip-%d" style="display: none">
		<div class="price price-tooltip">
			<span class="float-right">
			<span class="icon-gold">%d</span>
			<span class="icon-silver">%d</span>
			<span class="icon-copper">%d</span>
</span>
			%s
				<br /><span class="float-right">
			<span class="icon-gold">%d</span>
			<span class="icon-silver">%d</span>
			<span class="icon-copper">%d</span>
</span>
				%s
	<span class="clear"><!-- --></span>
		</div>
	</div>
											</td>
											<td class="options">
												<a href="browse?itemId=%d" class="ah-button">%s</a>
												<a href="javascript:;" class="ah-button" onclick="Auction.openCancel(%d);">%s</a>
											</td>
										</tr>',
                                        $item['auction_id'], $toggleStyle % 2 ? '1' : '2',
                                        $item['name'], WoW::GetWoWPath(), $item['id'], $item['id'], $item['guid'], $item['icon'],
                                        WoW::GetWoWPath(), $item['id'], $item['id'], $item['guid'], $item['quality'], $item['name'],
                                        WoW_Account::GetActiveCharacterInfo('url'), WoW_Account::GetActiveCharacterInfo('name'),
                                        WoW_Locale::GetString('template_auction_you_are_the_seller'),
                                        WoW::GetWoWPath(),
                                        $item['count'], $item['time'], WoW_Locale::GetString('template_auction_title_time_' . $item['time']), WoW_Locale::GetString('template_auction_text_time_' . $item['time']),
                                        WoW_Locale::GetString('template_auction_no_bids'),
                                        $item['price_raw'], $item['auction_id'], $item['price']['gold'], $item['price']['silver'], $item['price']['copper'],
                                        $item['buyout']['gold'], $item['buyout']['silver'], $item['buyout']['copper'],
                                        $item['auction_id'], $item['price']['gold'], $item['price']['silver'], $item['price']['copper'],
                                        WoW_Locale::GetString('template_auction_price_per_unit'),
                                        $item['buyout']['gold'], $item['buyout']['silver'], $item['buyout']['copper'],
                                        WoW_Locale::GetString('template_auction_buyout_per_unit'),
                                        $item['id'],
                                        WoW_Locale::GetString('template_auction_browse'),
                                        $item['auction_id'],
                                        WoW_Locale::GetString('template_blog_cancel_report')
                                        );
                                    ++$toggleStyle;
                                }
                            }
                            ?>
							</tbody>
						</table>
					</div>