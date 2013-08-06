<?php

/**
 * Copyright (C) 2011 Shadez <https://github.com/Shadez>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

class Vault extends Controller {
    public function main() {
        $url_data = WoW::GetUrlData('vault');
        // Check session
        if($url_data['action0'] != 'vault') {
            // Wrong URL parsing
            header('Location: ' . WoW::GetWoWPath() . '/wow/');
            exit;
        }
        if(!WoW_Account::IsLoggedIn()) {
            header('Location: ' . WoW::GetWoWPath() . '/login/?ref=' . urlencode($_SERVER['REQUEST_URI']));
            exit;
        }
        WoW_Template::SetTemplateTheme('wow');
        switch($url_data['action1']) {
            case 'character':
                switch($url_data['action2']) {
                    case 'auction':
                        $auction_side = $url_data['action3'];
                        if(!$auction_side || !in_array($auction_side, array('alliance', 'horde', 'neutral'))) {
                            WoW::RedirectTo('wow/' . WoW_Locale::GetLocale() . '/vault/character/auction/' . WoW_Account::GetActiveCharacterInfo('faction_text'));
                        }
                        // Check active character
                        if(WoW_Account::GetActiveCharacterInfo('guid') == 0) {
                            WoW::RedirectTo();
                        }
                        switch($url_data['action4']) {
                            default:
                                WoW_Template::SetPageData('auction_side', $auction_side);
                                WoW_Template::SetPageIndex('auction_lots');
                                WoW_Template::SetPageData('page', 'auction_lots');
                                break;
                            case 'cancel':
                                // Cancelling, adding, etc. requires core support!
                                if(!isset($_POST['auc'])) {
                                    exit;
                                }
                                $auction_id = (int) $_POST['auc'];
                                header('Content-type: text/plain');
                                echo WoW_Auction::CancelAuction($auction_id);
                                exit;
                                /*
                                if(isset($_POST['auc'])) {
                                    $auction_id = (int) $_POST['auc'];
                                    // WoW REMOTE FEATURE
                                }
                                file_put_contents('cancel.txt', print_r($_POST, true));
                                exit;
                                */
                                break;
                        }
                        break;
					default:
						WoW_Template::ErrorPage(404);
						break;
                }
                break;
			default:
				WoW_Template::ErrorPage(404);
				break;
        }
        WoW_Template::LoadTemplate('page_index');
    }
}
?>