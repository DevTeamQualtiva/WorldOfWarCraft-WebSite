<div class="character-list">
		<div class="primary chars-pane">
			<div class="char-wrapper">
						<?php
                        echo sprintf('<a href="javascript:;" class="char pinned" rel="np">
								<span class="pin"></span>
								<span class="name">%s</span>
								<span class="class color-c%d">%d %s %s</span>
								<span class="realm %s">%s</span>
						</a>', WoW_Account::GetActiveCharacterInfo('name'),
                        WoW_Account::GetActiveCharacterInfo('class'),
                        WoW_Account::GetActiveCharacterInfo('level'), WoW_Account::GetActiveCharacterInfo('race_text'), WoW_Account::GetActiveCharacterInfo('class_text'),
                        WoW_Account::GetActiveCharacterInfo('realmStatus'),
                        WoW_Account::GetActiveCharacterInfo('realmName'));
                        $characters = WoW_Account::GetCharactersData();
                        if(is_array($characters)) {
                            foreach($characters as $char) {
                                if($char['guid'] == WoW_Account::GetActiveCharacterInfo('guid') && $char['realmId'] == WoW_Account::GetActiveCharacterInfo('realmId')) {
                                    continue; // Skip active character
                                }
                                echo sprintf('<a href="%s" onclick="CharSelect.pin(%d, this); return false;" class="char " rel="np">
                                <span class="pin"></span>
								<span class="name">%s</span>
								<span class="class color-c%d">%d %s %s</span>
								<span class="realm %s">%s</span></a>', $char['url'], $char['index'], $char['name'], $char['class'], $char['level'], $char['race_text'], $char['class_text'], $char['realmStatus'], $char['realmName']);
                            }
                        }
                        ?>
			</div>

				<a href="javascript:;" class="manage-chars" onclick="CharSelect.swipe('in', this); return false;">
					<span class="plus"></span>
                    <?php echo WoW_Locale::GetString('template_manage_characters_caption'); ?>
				</a>
		</div>
			
			<div class="secondary chars-pane" style="display: none">
				<div class="char-wrapper scrollbar-wrapper" id="scroll">
					<div class="scrollbar">
						<div class="track"><div class="thumb"></div></div>
					</div>

					<div class="viewport">
						<div class="overview">
                                    <?php
                                    echo sprintf('<a href="javascript:;" class="color-c%d pinned" rel="np" data-tooltip="%s %s (%s)">
										<img src="%s/wow/static/images/icons/race/%d-%d.gif" alt="" />
										<img src="%s/wow/static/images/icons/class/%d.gif" alt="" />
										%d %s
									</a>', WoW_Account::GetActiveCharacterInfo('class'),
                                    WoW_Account::GetActiveCharacterInfo('race_text'),
                                    WoW_Account::GetActiveCharacterInfo('class_text'),
                                    WoW_Account::GetActiveCharacterInfo('realmName'),
                                    WoW::GetWoWPath(),
                                    WoW_Account::GetActiveCharacterInfo('race'),
                                    WoW_Account::GetActiveCharacterInfo('gender'),
                                    WoW::GetWoWPath(), 
                                    WoW_Account::GetActiveCharacterInfo('class'),
                                    WoW_Account::GetActiveCharacterInfo('level'),
                                    WoW_Account::GetActiveCharacterInfo('name'));

                                    if(is_array($characters)) {
                                        foreach($characters as $char) {
                                            if($char['guid'] == WoW_Account::GetActiveCharacterInfo('guid') && $char['realmId'] == WoW_Account::GetActiveCharacterInfo('realmId')) {
                                                continue; // Skip active character
                                            }
                                            echo sprintf('<a href="%s" class="color-c%d" rel="np" onclick="CharSelect.pin(%d, this); return false;" data-tooltip="%s %s (%s)">
										<img src="%s/wow/static/images/icons/race/%d-%d.gif" alt="" />
										<img src="%s/wow/static/images/icons/class/%d.gif" alt="" />
										%d %s
									</a>', $char['url'], $char['class'], $char['index'], $char['race_text'], $char['class_text'], $char['realmName'],
                                    WoW::GetWoWPath(), $char['race'], $char['gender'], WoW::GetWoWPath(), $char['class'], $char['level'], $char['name']);
                                        }
                                    }
                                    ?>
							<div class="no-results hide"><?php echo WoW_Locale::GetString('template_characters_not_found'); ?></div>
						</div>
					</div>
				</div>

				<div class="filter">
					<input type="input" class="input character-filter" value="<?php echo WoW_Locale::GetString('template_filter_caption'); ?>" alt="<?php echo WoW_Locale::GetString('template_filter_caption'); ?>" /><br />
					<a href="javascript:;" onclick="CharSelect.swipe('out', this); return false;"><?php echo WoW_Locale::GetString('template_back_to_characters_list'); ?></a>
				</div>
			</div>
</div>