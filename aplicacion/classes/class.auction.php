<?php

/**
 * Copyright (C) 2010-2011 Shadez <https://github.com/Shadez>
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

class WoW_Auction {
    private static $auction_side = 0;
    private static $active_guid = 0;
    private static $active_realm = 0;
    private static $auction_initialized = false;
    private static $items_storage = array();
    private static $myitems_storage = array();
    private static $mail_storage = array();
    private static $sold_count = 0;
    private static $selling_count = 0;
    private static $finished_count = 0;
    private static $won_count = 0;
    private static $rebided_count = 0;
    private static $lost_count = 0;
    private static $money_amount = 0;
    private static $won_money_amount = 0;
    private static $mail_count = 0;
    //private static $items_storage = array();
    private static $buyout_price = 0;
    
    public static function InitAuction() {
        if(!WoW_Account::IsLoggedIn()) {
            return false;
        }
        self::$active_guid = WoW_Account::GetActiveCharacterInfo('guid');
        if (self::$active_guid == 0) {
            return false;
        }
        self::$active_realm = WoW_Account::GetActiveCharacterInfo('realmId');
        self::$auction_initialized = true;
        DB::ConnectToDB(DB_CHARACTERS, self::$active_realm);
        self::$money_amount = DB::Characters()->selectCell("SELECT `money` FROM `characters` WHERE `guid` = %d", self::$active_guid);
        self::$won_money_amount = 0;
        self::LoadMyAuctions();
        self::LoadAuctionMails();
        self::HandleAuctionData();
        self::HandleSellingItems();
    }
    
    private static function LoadMyAuctions() {
        self::$myitems_storage = DB::Characters()->select("SELECT * FROM `auction` WHERE `itemowner` = %d", self::$active_guid);
    }
    
    private static function LoadAuctionMails() {
        self::$mail_storage = DB::Characters()->select("SELECT * FROM `mail` WHERE `receiver` = %d AND `messageType` = 2 AND `stationery` = 62", self::$active_guid);
    }
    
    private static function HandleAuctionData() {
        if(!is_array(self::$mail_storage)) {
            return false;
        }
        foreach(self::$mail_storage as $mail) {
            if($mail['has_items'] == 1 && $mail['money'] == 0) {
                self::$won_count++;
                self::$mail_count++;
            }
            elseif($mail['has_items'] == 0 && $mail['money'] > 0) {
                self::$won_money_amount += $mail['money'];
                self::$sold_count++;
                self::$mail_count++;
            }
        }
        self::$selling_count = count(self::$myitems_storage);
    }
    
    private static function HandleSellingItems() {
        if(self::$selling_count <= 0 || !is_array(self::$myitems_storage)) {
            return false;
        }
        $item_ids = array();
        $item_ids_guids = array();
        $items_data = array();
        foreach(self::$myitems_storage as $item) {
            $item_ids[] = $item['item_template'];
            $item_ids_guids[$item['itemguid']] = $item['item_template'];
            $items_data[$item['itemguid']] = $item;
        }
        $items = DB::World()->select("SELECT `entry`, `name`, `Quality`, `displayid` FROM `item_template` WHERE `entry` IN (%s)", $item_ids);
        if(!$items) {
            return false;
        }
        $items_storage = array();
        $displayids = array();
        foreach($items as $item) {
            $items_storage[$item['entry']] = $item;
            $displayids[] = $item['displayid'];
        }
        $icons = DB::WoW()->select("SELECT `displayid`, `icon` FROM `DBPREFIX_icons` WHERE `displayid` IN (%s)", $displayids);
        if(!$icons) {
            return false;
        }
        $icons_storage = array();
        foreach($icons as $icon) {
            $icons_storage[$icon['displayid']] = $icon['icon'];
        }
        unset($icons);
        self::$items_storage = array();
        self::$buyout_price = 0;
        foreach($item_ids_guids as $item_guid => $item_id) {
            if(isset($items_storage[$item_id])) {
                $item = new WoW_Item(WoWConfig::$Realms[WoW_Account::GetActiveCharacterInfo('realmId')]['type']);
                $item->LoadFromDBByEntry($item_guid, $item_id);
                $auc_time = $items_data[$item_guid]['time'];
                $now = time();
                $auction_time = 0;
                if(($now - $auc_time) <= (48 * IN_HOURS)) {
                    $auction_time = 3;
                }
                elseif(($now - $auc_time) <= (24 * IN_HOURS)) {
                    $auction_time = 2;
                }
                elseif(($now - $auc_time) <= (12 * IN_HOURS)) {
                    $auction_time = 1;
                }
                self::$items_storage[] = array(
                    'auction_id' => $items_data[$item_guid]['id'],
                    'guid' => $item_guid,
                    'id' => $items_storage[$item_id]['entry'],
                    'quality' => $items_storage[$item_id]['Quality'],
                    'name' => WoW_Locale::GetLocaleId() == LOCALE_EN ? $items_storage[$item_id]['name'] : WoW_Items::GetItemName($item_id),
                    'icon' => $icons_storage[$items_storage[$item_id]['displayid']],
                    'price_raw' => $items_data[$item_guid]['startbid'],
                    'price' => WoW_Utils::GetMoneyFormat($items_data[$item_guid]['startbid']),
                    'buyout_raw' => $items_data[$item_guid]['buyoutprice'],
                    'buyout' => WoW_Utils::GetMoneyFormat($items_data[$item_guid]['buyoutprice']),
                    'lastbid' => $items_data[$item_guid]['lastbid'],
                    'count' => $item->GetStackCount(),
                    'time' => $auction_time
                );
                self::$buyout_price += $items_data[$item_guid]['buyoutprice'];
            }
        }
        unset($items, $items_storage, $displayids);
        return true;
    }
    
    public static function CancelAuction($auction_id) {
        $item = self::GetAuction($auction_id);
        if(!$item) {
            return sprintf('{"error": {"code": 1004, "message": "%s"}}', WoW_Locale::GetString('template_auction_error_auc_not_found'));
        }
        $char = WoW_Account::GetActiveCharacter();
        return sprintf('{
            "auctionFaction": %d,
            "character": {
                "name" : "%s",
                "level" : %d,
                "genderId" : %d,
                "factionId" : %d,
                "classId" : %d,
                "className" : "%s",
                "raceId" : %d,
                "raceName" : "%s"
            },
            "auction": {
                "auctionId" : %d,
                "highBidder" : %s,
                "owner" : true,
                "ownerName" : "%s",
                "currentBid" : %d,
                "currentBidPerUnit" : %d,
                "nextBid" : %d,
                "nextBidPerUnit" : %d,
                "buyout" : %d,
                "buyoutPerUnit" : %d,
                "timeLeft" : %d,
                "name" : "%s",
                "params" : "i=%d&s=%d",
                "guid" : %d,
                "id" : %d,
                "icon" : "%s",
                "quality" : %d
            }
        }', $char['faction'],
            $char['name'],
            $char['level'],
            $char['gender'],
            $char['faction'],
            $char['class'], 
            $char['class_text'],
            $char['race'],
            $char['race_text'],
            
            $item['auction_id'],
            $item['lastbid'],
            $char['name'],
            $item['lastbid'] > 0 ? $item['lastbid'] : $item['price_raw'],
            $item['lastbid'] > 0 ? $item['lastbid'] : $item['price_raw'],
            $item['lastbid'] > 0 ? $item['lastbid'] : $item['price_raw'],
            $item['lastbid'] > 0 ? $item['lastbid'] : $item['price_raw'],
            $item['buyout_raw'],
            $item['buyout_raw'],
            $item['time'],
            $item['name'],
            $item['id'], $item['guid'],
            $item['guid'],
            $item['id'],
            $item['icon'],
            $item['quality']
        );
    }
    
    public static function GetSellingItemsCount() {
        return self::$selling_count;
    }
    
    public static function GetSoldItemsCount() {
        return self::$sold_count;
    }
    
    public static function GetWonMoneyAmount() {
        return self::$won_money_amount;
    }
    
    public static function GetMailsCount() {
        return self::$mail_count;
    }
    
    public static function GetWonItemsCount() {
        return self::$won_count;
    }
    
    public static function GetSellingItems() {
        return self::$items_storage;
    }
    
    public static function GetBuyOutTotalPrice() {
        return self::$buyout_price;
    }
    
    public static function GetAuction($auction_id) {
        if(!is_array(self::$items_storage)) {
            return false;
        }
        foreach(self::$items_storage as $item) {
            if($item['auction_id'] == $auction_id) {
                return $item;
            }
        }
        return false;
    }
}
?>