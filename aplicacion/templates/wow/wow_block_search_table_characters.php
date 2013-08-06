<table class="table">
						<thead>
							<tr>
								<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_charname'); ?></span></a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_level'); ?></span></a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_race'); ?></span></a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_class'); ?></span></a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_faction'); ?></span></a></th>
								<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_guild'); ?></span></a></th>
								<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_realm'); ?></span></a></th>
								<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo WoW_Locale::GetString('template_search_table_battlegroup'); ?></span></a></th>
							</tr>
						</thead>
						<tbody>
                                <?php
                                $searchResults = WoW_Search::GetSearchResults('wowcharacter');
                                $toggleStyle = 2;
                                if(is_array($searchResults)) {
                                    foreach($searchResults as $char) {
                                        echo sprintf('<tr class="row%d">
									<td class="table-link">
										<a 	href="%s/wow/%s/character/%s/%s/"
											class="color-c%d">
											<span class="list-icon border-c%d">
												<img src="%s/wow/static/images/2d/avatar/%d-%d.jpg" alt="" />
											</span>
											%s
										</a>
									</td>
									<td class="iconCol">
										%d
									</td>
									<td class="iconCol" data-raw="%d">
										<img data-tooltip="%s" alt="" src="%s/wow/static/images/icons/race/%d-%d.gif" />
									</td>
									<td class="iconCol" data-raw="%d">
										<img data-tooltip="%s" alt="" src="%s/wow/static/images/icons/class/%d.gif" />
									</td>
									<td class="iconCol" data-raw="%d">
										<img data-tooltip="%s" alt="" src="%s/wow/static/images/icons/faction/%d.gif" />
									</td>
									<td>
                                        <a href="%s/wow/%s/guild/%s/%s/">%s</a>
									</td>
									<td>
										%s
									</td>
									<td>
										%s
									</td>
								</tr>
                                ',
                                    $toggleStyle % 2 ? 1 : 2,
                                    WoW::GetWoWPath(), WoW_Locale::GetLocale(), $char['realmName'], $char['name'],
                                    $char['classId'],
                                    $char['classId'],
                                    WoW::GetWoWPath(), $char['raceId'], $char['gender'],
                                    $char['name'], $char['level'],
                                    $char['raceId'],
                                    WoW_Locale::GetString('character_race_' . $char['raceId'], $char['gender']), 
                                    WoW::GetWoWPath(), $char['raceId'], $char['gender'],
                                    $char['classId'],
                                    WoW_Locale::GetString('character_class_' . $char['classId'], $char['gender']),
                                    WoW::GetWoWPath(), $char['classId'],
                                    WoW_Utils::GetFactionId($char['raceId']),
                                    WoW_Locale::GetString('faction_' . (WoW_Utils::GetFactionId($char['raceId']) == FACTION_ALLIANCE ? 'alliance' : 'horde')),
                                    WoW::GetWoWPath(),
                                    WoW_Utils::GetFactionId($char['raceId']),
                                    WoW::GetWoWPath(), Wow_Locale::GetLocale(), $char['realmName'], $char['guildName'], $char['guildName'],
                                    $char['realmName'],
                                    WoWConfig::$DefaultBGName
                                );
                                    ++$toggleStyle;
                                    }
                                }
                                ?>
						</tbody>
					</table>

	<script type="text/javascript">
	//<![CDATA[
						$(function(){
							var table = new Table('.table');
						});
	//]]>
	</script>