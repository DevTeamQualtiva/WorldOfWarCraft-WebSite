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

class WoW_StatSystem {
    private static $player_levelstats =array();
    private static $player_classlevelstats = array();
    private static $stats_loaded = false;
    private static $player_stats = array();
    
    // MaNGOS-ported fields
    private static $m_values = array();
    private static $m_createStats = array();
    private static $m_canModifyStats = false;
    private static $m_spellPenetrationItemMod = 0;
    private static $m_ammoDPS = 0;
    private static $m_weaponDamage = array();
    private static $m_modAttackSpeedPct = array();
    private static $m_auraModifiersGroup = array();
    private static $m_attackTimer = array();
    private static $m_modMeleeHitChance = 0;
    private static $m_modRangedHitChance = 0;
    private static $m_modSpellHitChance = 0;
    private static $m_baseSpellCritChance = 0;
    private static $m_auraBaseMod = array();
    private static $m_baseSpellPower = 0;
    private static $m_baseRatingValue = array();
    
    public static function InitStatSystem() {
        if(!WoW_Characters::IsCorrect()) {
            WoW_Log::WriteError('%s : character was not found!', __METHOD__);
            return false;
        }
        DB::ConnectToDB(DB_CHARACTERS, WoW_Characters::GetRealmID());
        
        self::$stats_loaded = false;
        
        self::$m_attackTimer[BASE_ATTACK] = 0;
        self::$m_attackTimer[OFF_ATTACK] = 0;
        self::$m_attackTimer[RANGED_ATTACK] = 0;
        
        self::$m_modAttackSpeedPct[BASE_ATTACK] = 1.0;
        self::$m_modAttackSpeedPct[OFF_ATTACK] = 1.0;
        self::$m_modAttackSpeedPct[RANGED_ATTACK] = 1.0;
        
        for($i = 0; $i < UNIT_MOD_END; ++$i) {
            self::$m_auraModifiersGroup[$i][BASE_VALUE] = 0.0;
            self::$m_auraModifiersGroup[$i][BASE_PCT] = 1.0;
            self::$m_auraModifiersGroup[$i][TOTAL_VALUE] = 0.0;
            self::$m_auraModifiersGroup[$i][TOTAL_PCT] = 1.0;
        }
        // implement 50% base damage from offhand
        self::$m_auraModifiersGroup[UNIT_MOD_DAMAGE_OFFHAND][TOTAL_PCT] = 0.5;
        
        for($i = 0; $i < MAX_ATTACK; ++$i) {
            self::$m_weaponDamage[$i][MINDAMAGE] = BASE_MINDAMAGE;
            self::$m_weaponDamage[$i][MAXDAMAGE] = BASE_MAXDAMAGE;
        }
        
        for($i = 0; $i < MAX_STATS; ++$i) {
            self::$m_createStats[$i] = 0;
        }
        self::$m_modMeleeHitChance = 0.0;
        self::$m_modRangedHitChance = 0.0;
        self::$m_modSpellHitChance = 0.0;
        self::$m_baseSpellCritChance = 5;
        
        for($i = CR_WEAPON_SKILL; $i < MAX_COMBAT_RATING; ++$i) {
            self::$m_baseRatingValue[$i] = 0;
        }
        
        self::LoadInitialStats();
        self::LoadPlayerStats();
        self::HandleStats();
    }
    
    private static function LoadInitialStats() {
        if(!WoW_Characters::IsCorrect()) {
            WoW_Log::WriteError('%s : character was not found!', __METHOD__);
            return false;
        }
        self::$player_levelstats = DB::World()->selectRow("SELECT `str` AS `strength`, `agi` AS `agility`, `sta` AS `stamina`, `inte` AS `intellect`, `spi` AS `spirit` FROM `player_levelstats` WHERE `race` = %d AND `class` = %d AND `level` = %d LIMIT 1", WoW_Characters::GetRaceID(), WoW_Characters::GetClassID(), WoW_Characters::GetLevel());
        if(!self::$player_levelstats) {
            WoW_Log::WriteError('%s : unable to find player_levelstats data for player %s (GUID: %d, raceID: %d, classID: %d, level: %d)!', __METHOD__, WoW_Characters::GetName(), WoW_Characters::GetGUID(), WoW_Characters::GetRaceID(), WoW_Characters::GetClassID(), WoW_Characters::GetLevel());
            return false;
        }
        self::$player_classlevelstats = DB::World()->selectRow("SELECT `basehp`, `basemana` FROM `player_classlevelstats` WHERE `class` = %d AND `level` = %d LIMIT 1", WoW_Characters::GetClassID(), WoW_Characters::GetLevel());
        if(!self::$player_levelstats) {
            WoW_Log::WriteError('%s : unable to find player_classlevelstats data for player %s (GUID: %d, raceID: %d, classID: %d, level: %d)!', __METHOD__, WoW_Characters::GetName(), WoW_Characters::GetGUID(), WoW_Characters::GetRaceID(), WoW_Characters::GetClassID(), WoW_Characters::GetLevel());
            return false;
        }
        for($i = OBJECT_FIELD_GUID; $i <= PLAYER_END; ++$i) {
            self::SetInt32Value($i, 0);
        }
        return true;
    }
    
    private static function LoadPlayerStats() {
        if(!WoW_Characters::IsCorrect()) {
            WoW_Log::WriteError('%s : character was not found!', __METHOD__);
            return false;
        }
        self::$player_stats = DB::Characters()->selectRow("SELECT * FROM `character_stats` WHERE `guid` = %d", WoW_Characters::GetGUID());
        if(!self::$player_stats) {
            WoW_Log::WriteError('%s : unable to find player stats for player %s (GUID: %d)!', __METHOD__, WoW_Characters::GetName(), WoW_Characters::GetGUID());
            return false;
        }
        self::$stats_loaded = true;
        return true;
    }
    
    public static function IsStatsLoaded() {
        return self::$stats_loaded;
    }
    
    private static function HandleStats() {
        self::InitStatsForLevel(true);
        //self::_LoadSkills(); // Already loaded in WoW_Characters::LoadSkills();
        self::_LoadAuras();
        self::_LoadSpells();
        self::_LoadTalents();
        self::InitTalentForLevel();
        self::learnDefaultSpells();
        //self::_LoadInventory(); // Already loaded in WoW_Characters::LoadCharacter();
        self::SetCanModifyStats(true);
        self::UpdateAllStats();
    }
    
    ///-----------------------------------------------
    /// All methods below were ported from MaNGOS core
    ///-----------------------------------------------
    
    private static function _LoadSkills() {
        //TODO: _LoadSkills
    }
    
    private static function _LoadAuras() {
        //TODO: _LoadAuras
    }
    
    private static function _LoadSpells() {
        //TODO: _LoadSpells
    }
    
    private static function _LoadTalents() {
        //TODO: _LoadTalents
    }
    
    private static function InitTalentForLevel() {
        //TODO: InitTalentForLevel
    }
    
    private static function learnDefaultSpells() {
        //TODO: learnDefaultSpells
    }
    
    private static function _RemoveAllStatBonuses() {
        self::SetCanModifyStats(false);
        
        self::_RemoveAllItemMods();
        self::_RemoveAllAuraMods();
        
        self::SetCanModifyStats(true);
        
        self::UpdateAllStats();
    }
    
    private static function _RemoveAllItemMods() {
        $item_slots = array(
            EQUIPMENT_SLOT_HEAD,
            EQUIPMENT_SLOT_NECK,
            EQUIPMENT_SLOT_SHOULDERS,
            EQUIPMENT_SLOT_BACK,
            EQUIPMENT_SLOT_CHEST,
            EQUIPMENT_SLOT_BODY,
            EQUIPMENT_SLOT_TABARD,
            EQUIPMENT_SLOT_WRISTS,
            EQUIPMENT_SLOT_HANDS,
            EQUIPMENT_SLOT_WAIST,
            EQUIPMENT_SLOT_LEGS,
            EQUIPMENT_SLOT_FEET,
            EQUIPMENT_SLOT_FINGER1,
            EQUIPMENT_SLOT_FINGER2 ,
            EQUIPMENT_SLOT_TRINKET1,
            EQUIPMENT_SLOT_TRINKET2 ,
            EQUIPMENT_SLOT_MAINHAND,
            EQUIPMENT_SLOT_OFFHAND,
            EQUIPMENT_SLOT_RANGED
        );
        foreach($item_slots as $slot) {
            $item = WoW_Characters::GetItem($slot);
            if(!$item) {
                continue;
            }
            $proto = $item->GetProto();
            if(!$proto) {
                continue;
            }
            if($item->IsBroken()) {
                continue;
            }
            self::ApplyEnchantment($item, false);
            $attackType = self::GetAttackBySlot($slot);
            if($attackType < MAX_ATTACK) {
                self::_ApplyWeaponDependentAuraMods($item, $attackType, false);
            }
            self::_ApplyItemBonuses($proto, $slot, false);
        }
    }
    
    private static function _RemoveAllAuraMods() {
        //Not required
    }
    
    private static function _ApplyAllStatBonuses() {
        self::SetCanModifyStats(false);
        
        self::_ApplyAllAuraMods();
        self::_ApplyAllItemMods();
        
        self::SetCanModifyStats(true);
        
        self::UpdateAllStats();
    }
    
    private static function _ApplyAllAuraMods() {
        //Not required
    }
    
    private static function _ApplyAllItemMods() {
        $item_slots = array(
            EQUIPMENT_SLOT_HEAD,
            EQUIPMENT_SLOT_NECK,
            EQUIPMENT_SLOT_SHOULDERS,
            EQUIPMENT_SLOT_BACK,
            EQUIPMENT_SLOT_CHEST,
            EQUIPMENT_SLOT_BODY,
            EQUIPMENT_SLOT_TABARD,
            EQUIPMENT_SLOT_WRISTS,
            EQUIPMENT_SLOT_HANDS,
            EQUIPMENT_SLOT_WAIST,
            EQUIPMENT_SLOT_LEGS,
            EQUIPMENT_SLOT_FEET,
            EQUIPMENT_SLOT_FINGER1,
            EQUIPMENT_SLOT_FINGER2 ,
            EQUIPMENT_SLOT_TRINKET1,
            EQUIPMENT_SLOT_TRINKET2 ,
            EQUIPMENT_SLOT_MAINHAND,
            EQUIPMENT_SLOT_OFFHAND,
            EQUIPMENT_SLOT_RANGED
        );
        foreach($item_slots as $slot) {
            $item = WoW_Characters::GetItem($slot);
            if(!$item) {
                continue;
            }
            if(!$item->IsCorrect() || $item->IsBroken()) {
                continue;
            }
            $proto = $item->GetProto();
            if(!$proto) {
                continue;
            }
            if(!$proto->IsCorrect()) {
                continue;
            }
            $attacktype = self::GetAttackBySlot($slot);
            if($attacktype < MAX_ATTACK) {
                self::_ApplyWeaponDependentAuraMods($item, $attacktype, true);
            }
            self::_ApplyItemBonuses($proto, $slot, true);
            self::ApplyEnchantment($item, true);
        }
    }
    
    private static function ApplyEnchantment($item, $apply) {
        for($i = 0; $i < MAX_ENCHANTMENT_SLOT; ++$i) {
            self::ApplyEnchantmentSlot($item, $i, $apply);
        }
    }
    
    private static function ApplyEnchantmentSlot($item, $slot, $apply, $apply_dur = true, $ignore_condition = false) {
        if(!$item) {
            return;
        }
        if(!$item->IsEquipped()) {
            return;
        }
        if($slot >= MAX_ENCHANTMENT_SLOT) {
            return;
        }
        $enchant_id = $item->GetEnchantmentIdBySlot($slot);
        if(!$enchant_id) {
            return;
        }
        $enchant = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_enchantment` WHERE `id` = %d", $enchant_id);
        if(!$enchant) {
            return;
        }
        if(!$item->IsBroken()) {
            for($s = 0; $s < 3; ++$s) {
                $enchant_display_type = $enchant['type_' . ($s + 1)];
                $enchant_amount = $enchant['amount_' . ($s + 1)];
                $enchant_spell_id = $enchant['spellid_' . ($s + 1)];
                
                switch($enchant_display_type) {
                    case ITEM_ENCHANTMENT_TYPE_NONE:
                        break;
                    case ITEM_ENCHANTMENT_TYPE_COMBAT_SPELL:
                        // processed in Player::CastItemCombatSpell
                        break;
                    case ITEM_ENCHANTMENT_TYPE_DAMAGE:
                        if($item->GetSlot() == EQUIPMENT_SLOT_MAINHAND) {
                            self::HandleStatModifier(UNIT_MOD_DAMAGE_MAINHAND, TOTAL_VALUE, $enchant_amount, $apply);
                        }
                        elseif($item->GetSlot() == EQUIPMENT_SLOT_OFFHAND) {
                            self::HandleStatModifier(UNIT_MOD_DAMAGE_OFFHAND, TOTAL_VALUE, $enchant_amount, $apply);
                        }
                        elseif($item->GetSlot() == EQUIPMENT_SLOT_RANGED) {
                            self::HandleStatModifier(UNIT_MOD_DAMAGE_RANGED, TOTAL_VALUE, $enchant_amount, $apply);
                        }
                        break;
                    case ITEM_ENCHANTMENT_TYPE_EQUIP_SPELL:
                        // Not required maybe?
                        break;
                    case ITEM_ENCHANTMENT_TYPE_RESISTANCE:
                        if(!$enchant_amount) {
                            $item_rand = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_randomsuffix` WHERE `id` = %d", abs($item->GetItemRandomPropertyId()));
                            if(is_array($item_rand)) {
                                for($k = 0; $k < 3; ++$k) {
                                    if($item_rand['ench_' . ($k + 1)] == $enchant_id) {
                                        $enchant_amount = (($item_rand['pref_' . ($k + 1)] * $item->GetItemSuffixFactor()) / 10000);
                                        break;
                                    }
                                }
                            }
                        }
                        self::HandleStatModifier(UNIT_MOD_RESISTANCE_START + $enchant_spell_id, TOTAL_VALUE, $enchant_amount, $apply);
                        break;
                    case ITEM_ENCHANTMENT_TYPE_STAT:
                        if(!$enchant_amount) {
                            $item_rand = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_randomsuffix` WHERE `id` = %d", abs($item->GetItemRandomPropertyId()));
                            if(is_array($item_rand)) {
                                for($k = 0; $k < 3; ++$k) {
                                    if($item_rand['ench_' . ($k + 1)] == $enchant_id) {
                                        $enchant_amount = (($item_rand['pref_' . ($k + 1)] * $item->GetItemSuffixFactor()) / 10000);
                                        break;
                                    }
                                }
                            }
                        }
                        switch($enchant_spell_id) {
                            case ITEM_MOD_MANA:
                                // DEBUG_LOG("+ %u MANA",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_MANA, BASE_VALUE, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_HEALTH:
                                // DEBUG_LOG("+ %u HEALTH",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_HEALTH, BASE_VALUE, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_AGILITY:
                                // DEBUG_LOG("+ %u AGILITY",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_STAT_AGILITY, TOTAL_VALUE, $enchant_amount, $apply);
                                self::ApplyStatBuffMod(STAT_AGILITY, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_STRENGTH:
                                // DEBUG_LOG("+ %u STRENGTH",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_STAT_STRENGTH, TOTAL_VALUE, $enchant_amount, $apply);
                                self::ApplyStatBuffMod(STAT_STRENGTH, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_INTELLECT:
                                // DEBUG_LOG("+ %u INTELLECT",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_STAT_INTELLECT, TOTAL_VALUE, $enchant_amount, $apply);
                                self::ApplyStatBuffMod(STAT_INTELLECT, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_SPIRIT:
                                // DEBUG_LOG("+ %u SPIRIT",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_STAT_SPIRIT, TOTAL_VALUE, $enchant_amount, $apply);
                                self::ApplyStatBuffMod(STAT_SPIRIT, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_STAMINA:
                                // DEBUG_LOG("+ %u STAMINA",$enchant_amount);
                                self::HandleStatModifier(UNIT_MOD_STAT_STAMINA, TOTAL_VALUE, $enchant_amount, $apply);
                                self::ApplyStatBuffMod(STAT_STAMINA, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_DEFENSE_SKILL_RATING:
                                self::ApplyRatingMod(CR_DEFENSE_SKILL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u DEFENCE", $enchant_amount);
                                break;
                            case  ITEM_MOD_DODGE_RATING:
                                self::ApplyRatingMod(CR_DODGE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u DODGE", $enchant_amount);
                                break;
                            case ITEM_MOD_PARRY_RATING:
                                self::ApplyRatingMod(CR_PARRY, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u PARRY", $enchant_amount);
                                break;
                            case ITEM_MOD_BLOCK_RATING:
                                self::ApplyRatingMod(CR_BLOCK, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u SHIELD_BLOCK", $enchant_amount);
                                break;
                            case ITEM_MOD_HIT_MELEE_RATING:
                                self::ApplyRatingMod(CR_HIT_MELEE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u MELEE_HIT", $enchant_amount);
                                break;
                            case ITEM_MOD_HIT_RANGED_RATING:
                                self::ApplyRatingMod(CR_HIT_RANGED, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u RANGED_HIT", $enchant_amount);
                                break;
                            case ITEM_MOD_HIT_SPELL_RATING:
                                self::ApplyRatingMod(CR_HIT_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u SPELL_HIT", $enchant_amount);
                                break;
                            case ITEM_MOD_CRIT_MELEE_RATING:
                                self::ApplyRatingMod(CR_CRIT_MELEE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u MELEE_CRIT", $enchant_amount);
                                break;
                            case ITEM_MOD_CRIT_RANGED_RATING:
                                self::ApplyRatingMod(CR_CRIT_RANGED, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u RANGED_CRIT", $enchant_amount);
                                break;
                            case ITEM_MOD_CRIT_SPELL_RATING:
                                self::ApplyRatingMod(CR_CRIT_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u SPELL_CRIT", $enchant_amount);
                                break;
    //                        Values from ITEM_STAT_MELEE_HA_RATING to ITEM_MOD_HASTE_RANGED_RATING are never used
    //                        in Enchantments
    //                        case ITEM_MOD_HIT_TAKEN_MELEE_RATING:
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_MELEE, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_HIT_TAKEN_RANGED_RATING:
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_RANGED, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_HIT_TAKEN_SPELL_RATING:
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_SPELL, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_CRIT_TAKEN_MELEE_RATING:
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_CRIT_TAKEN_RANGED_RATING:
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_CRIT_TAKEN_SPELL_RATING:
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_HASTE_MELEE_RATING:
    //                            self::ApplyRatingMod(CR_HASTE_MELEE, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_HASTE_RANGED_RATING:
    //                            self::ApplyRatingMod(CR_HASTE_RANGED, $enchant_amount, $apply);
    //                            break;
                            case ITEM_MOD_HASTE_SPELL_RATING:
                                self::ApplyRatingMod(CR_HASTE_SPELL, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_HIT_RATING:
                                self::ApplyRatingMod(CR_HIT_MELEE, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_HIT_RANGED, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_HIT_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u HIT", $enchant_amount);
                                break;
                            case ITEM_MOD_CRIT_RATING:
                                self::ApplyRatingMod(CR_CRIT_MELEE, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_CRIT_RANGED, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_CRIT_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u CRITICAL", $enchant_amount);
                                break;
    //                        Values ITEM_MOD_HIT_TAKEN_RATING and ITEM_MOD_CRIT_TAKEN_RATING are never used in Enchantment
    //                        case ITEM_MOD_HIT_TAKEN_RATING:
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_MELEE, $enchant_amount, $apply);
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_RANGED, $enchant_amount, $apply);
    //                            self::ApplyRatingMod(CR_HIT_TAKEN_SPELL, $enchant_amount, $apply);
    //                            break;
    //                        case ITEM_MOD_CRIT_TAKEN_RATING:
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $enchant_amount, $apply);
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $enchant_amount, $apply);
    //                            self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $enchant_amount, $apply);
    //                            break;
                            case ITEM_MOD_RESILIENCE_RATING:
                                self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u RESILIENCE", $enchant_amount);
                                break;
                            case ITEM_MOD_HASTE_RATING:
                                self::ApplyRatingMod(CR_HASTE_MELEE, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_HASTE_RANGED, $enchant_amount, $apply);
                                self::ApplyRatingMod(CR_HASTE_SPELL, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u HASTE", $enchant_amount);
                                break;
                            case ITEM_MOD_EXPERTISE_RATING:
                                self::ApplyRatingMod(CR_EXPERTISE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u EXPERTISE", $enchant_amount);
                                break;
                            case ITEM_MOD_ATTACK_POWER:
                                self::HandleStatModifier(UNIT_MOD_ATTACK_POWER, TOTAL_VALUE, $enchant_amount, $apply);
                                self::HandleStatModifier(UNIT_MOD_ATTACK_POWER_RANGED, TOTAL_VALUE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u ATTACK_POWER", $enchant_amount);
                                break;
                            case ITEM_MOD_RANGED_ATTACK_POWER:
                                self::HandleStatModifier(UNIT_MOD_ATTACK_POWER_RANGED, TOTAL_VALUE, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u RANGED_ATTACK_POWER", $enchant_amount);
                                break;
                            case ITEM_MOD_MANA_REGENERATION:
                                self::ApplyManaRegenBonus($enchant_amount, $apply);
                                // DEBUG_LOG("+ %u MANA_REGENERATION", $enchant_amount);
                                break;
                            case ITEM_MOD_ARMOR_PENETRATION_RATING:
                                self::ApplyRatingMod(CR_ARMOR_PENETRATION, $enchant_amount, $apply);
                                // DEBUG_LOG("+ %u ARMOR PENETRATION", $enchant_amount);
                                break;
                            case ITEM_MOD_SPELL_POWER:
                                self::ApplySpellPowerBonus($enchant_amount, $apply);
                                // DEBUG_LOG("+ %u SPELL_POWER", $enchant_amount);
                                break;
                            case ITEM_MOD_BLOCK_VALUE:
                                self::HandleBaseModValue(SHIELD_BLOCK_VALUE, FLAT_MOD, $enchant_amount, $apply);
                                break;
                            case ITEM_MOD_FERAL_ATTACK_POWER:
                            case ITEM_MOD_SPELL_HEALING_DONE:   // deprecated
                            case ITEM_MOD_SPELL_DAMAGE_DONE:    // deprecated
                            default:
                                break;
                        }
                        break;
                    case ITEM_ENCHANTMENT_TYPE_TOTEM: // Shaman Rockbiter Weapon
                        if(WoW_Characters::GetClassID() == CLASS_SHAMAN) {
                            $addValue = 0;
                            if($item->GetSlot() == EQUIPMENT_SLOT_MAINHAND) {
                                $addValue = ($enchant_amount * $item->GetProto()->delay / 1000);
                                self::HandleStatModifier(UNIT_MOD_DAMAGE_MAINHAND, TOTAL_VALUE, $addValue, $apply);
                            }
                            elseif($item->GetSlot() == EQUIPMENT_SLOT_OFFHAND) {
                                $addValue = ($enchant_amount * $item->GetProto()->delay / 1000);
                                self::HandleStatModifier(UNIT_MOD_DAMAGE_OFFHAND, TOTAL_VALUE, $addValue, $apply);
                            }
                        }
                        break;
                    case ITEM_ENCHANTMENT_TYPE_USE_SPELL:
                        // processed in Player::CastItemUseSpell
                        break;
                    case ITEM_ENCHANTMENT_TYPE_PRISMATIC_SOCKET:
                        // nothing do..
                        break;
                    default:
                        WoW_Log::WriteError('%s : unknown item enchantment (id = %d) display type: %d', __METHOD__, $enchant_id, $enchant_display_type);
                        break;
                }
            }
        }
        if($apply_dur) {
            if($apply) {
                // set duration
                $duration = $item->GetEnchantmentDurationBySlot($slot);
                if($duration > 0) {
                    self::AddEnchantmentDuration($item, $slot, $duration);
                }
            }
            else {
                // duration == 0 will remove EnchantDuration
                self::AddEnchantmentDuration($item, $slot, 0);
            }
        }
    }
    
    private static function AddEnchantmentDuration($item, $slot, $duration) {
        //TODO: AddEnchantmentDuration
        // Not required maybe?
    }
    
    private static function GetAttackBySlot($slot) {
        switch($slot) {
            case EQUIPMENT_SLOT_MAINHAND:
                return BASE_ATTACK;
            case EQUIPMENT_SLOT_OFFHAND:
                return OFF_ATTACK;
            case EQUIPMENT_SLOT_RANGED:
                return RANGED_ATTACK;
            default:
                return MAX_ATTACK;
        }
    }
    
    private static function _ApplyWeaponDependentAuraMods($item, $attackType, $apply) {
        //TODO: _ApplyWeaponDependentAuraMods
        // Not required maybe?
    }
    
    private static function _ApplyItemBonuses($proto, $slot, $apply, $only_level_scale = false) {
        if(!$proto) {
            return false;
        }
        $ssd = $proto->ScalingStatDistribution ? DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_ssd` WHERE `entry` = %d", $proto->ScalingStatDistribution) : null;
        if($only_level_scale && !$ssd) {
            return false;
        }
        $ssd_level = WoW_Characters::GetLevel();
        if($ssd && $ssd_level > $ssd['MaxLevel']) {
            $ssd_level = $ssd['MaxLevel'];
        }
        $ssv = $proto->ScalingStatValue ? DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_ssv` WHERE `id` = %d", $proto->ScalingStatValue) : null;
        if($only_level_scale && !$ssv) {
            return false;
        }
        for($i = 0; $i < MAX_ITEM_PROTO_STATS; ++$i) {
            $statType = 0;
            $val = 0;
            // If set ScalingStatDistribution need get stats and values from it
            if($ssd && $ssv) {
                if($ssd['StatMod_' . $i] < 0) {
                    continue;
                }
                $statType = $ssd['StatMod_' . $i];
                $val = (WoW_Items::GetSSDMultiplier($ssv, $proto->ScalingStatValue) * $ssd['Modifier_' . $i]) / 1000;
            }
            else {
                if($i >= $proto->StatsCount) {
                    continue;
                }
                $statType = $proto->ItemStat[$i]['type'];
                $val = $proto->ItemStat[$i]['value'];
            }
            if($val == 0) {
                continue;
            }
            switch($statType) {
                case ITEM_MOD_MANA:
                    self::HandleStatModifier(UNIT_MOD_MANA, BASE_VALUE, $val, $apply);
                    break;
                case ITEM_MOD_HEALTH:                           // modify HP
                    self::HandleStatModifier(UNIT_MOD_HEALTH, BASE_VALUE, $val, $apply);
                    break;
                case ITEM_MOD_AGILITY:                          // modify agility
                    self::HandleStatModifier(UNIT_MOD_STAT_AGILITY, BASE_VALUE, $val, $apply);
                    self::ApplyStatBuffMod(STAT_AGILITY, $val, $apply);
                    break;
                case ITEM_MOD_STRENGTH:                         //modify strength
                    self::HandleStatModifier(UNIT_MOD_STAT_STRENGTH, BASE_VALUE, $val, $apply);
                    self::ApplyStatBuffMod(STAT_STRENGTH, $val, $apply);
                    break;
                case ITEM_MOD_INTELLECT:                        //modify intellect
                    self::HandleStatModifier(UNIT_MOD_STAT_INTELLECT, BASE_VALUE, $val, $apply);
                    self::ApplyStatBuffMod(STAT_INTELLECT, $val, $apply);
                    break;
                case ITEM_MOD_SPIRIT:                           //modify spirit
                    self::HandleStatModifier(UNIT_MOD_STAT_SPIRIT, BASE_VALUE, $val, $apply);
                    self::ApplyStatBuffMod(STAT_SPIRIT, $val, $apply);
                    break;
                case ITEM_MOD_STAMINA:                          //modify stamina
                    self::HandleStatModifier(UNIT_MOD_STAT_STAMINA, BASE_VALUE, $val, $apply);
                    self::ApplyStatBuffMod(STAT_STAMINA, $val, $apply);
                    break;
                case ITEM_MOD_DEFENSE_SKILL_RATING:
                    self::ApplyRatingMod(CR_DEFENSE_SKILL, $val, $apply);
                    break;
                case ITEM_MOD_DODGE_RATING:
                    self::ApplyRatingMod(CR_DODGE, $val, $apply);
                    break;
                case ITEM_MOD_PARRY_RATING:
                    self::ApplyRatingMod(CR_PARRY, $val, $apply);
                    break;
                case ITEM_MOD_BLOCK_RATING:
                    self::ApplyRatingMod(CR_BLOCK, $val, $apply);
                    break;
                case ITEM_MOD_HIT_MELEE_RATING:
                    self::ApplyRatingMod(CR_HIT_MELEE, $val, $apply);
                    break;
                case ITEM_MOD_HIT_RANGED_RATING:
                    self::ApplyRatingMod(CR_HIT_RANGED, $val, $apply);
                    break;
                case ITEM_MOD_HIT_SPELL_RATING:
                    self::ApplyRatingMod(CR_HIT_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_MELEE_RATING:
                    self::ApplyRatingMod(CR_CRIT_MELEE, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_RANGED_RATING:
                    self::ApplyRatingMod(CR_CRIT_RANGED, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_SPELL_RATING:
                    self::ApplyRatingMod(CR_CRIT_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_HIT_TAKEN_MELEE_RATING:
                    self::ApplyRatingMod(CR_HIT_TAKEN_MELEE, $val, $apply);
                    break;
                case ITEM_MOD_HIT_TAKEN_RANGED_RATING:
                    self::ApplyRatingMod(CR_HIT_TAKEN_RANGED, $val, $apply);
                    break;
                case ITEM_MOD_HIT_TAKEN_SPELL_RATING:
                    self::ApplyRatingMod(CR_HIT_TAKEN_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_TAKEN_MELEE_RATING:
                    self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_TAKEN_RANGED_RATING:
                    self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_TAKEN_SPELL_RATING:
                    self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_HASTE_MELEE_RATING:
                    self::ApplyRatingMod(CR_HASTE_MELEE, $val, $apply);
                    break;
                case ITEM_MOD_HASTE_RANGED_RATING:
                    self::ApplyRatingMod(CR_HASTE_RANGED, $val, $apply);
                    break;
                case ITEM_MOD_HASTE_SPELL_RATING:
                    self::ApplyRatingMod(CR_HASTE_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_HIT_RATING:
                    self::ApplyRatingMod(CR_HIT_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_HIT_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_HIT_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_RATING:
                    self::ApplyRatingMod(CR_CRIT_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_HIT_TAKEN_RATING:
                    self::ApplyRatingMod(CR_HIT_TAKEN_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_HIT_TAKEN_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_HIT_TAKEN_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_CRIT_TAKEN_RATING:
                    self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_RESILIENCE_RATING:
                    self::ApplyRatingMod(CR_CRIT_TAKEN_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_TAKEN_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_CRIT_TAKEN_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_HASTE_RATING:
                    self::ApplyRatingMod(CR_HASTE_MELEE, $val, $apply);
                    self::ApplyRatingMod(CR_HASTE_RANGED, $val, $apply);
                    self::ApplyRatingMod(CR_HASTE_SPELL, $val, $apply);
                    break;
                case ITEM_MOD_EXPERTISE_RATING:
                    self::ApplyRatingMod(CR_EXPERTISE, $val, $apply);
                    break;
                case ITEM_MOD_ATTACK_POWER:
                    self::HandleStatModifier(UNIT_MOD_ATTACK_POWER, TOTAL_VALUE, $val, $apply);
                    self::HandleStatModifier(UNIT_MOD_ATTACK_POWER_RANGED, TOTAL_VALUE, $val, $apply);
                    break;
                case ITEM_MOD_RANGED_ATTACK_POWER:
                    self::HandleStatModifier(UNIT_MOD_ATTACK_POWER_RANGED, TOTAL_VALUE, $val, $apply);
                    break;
                case ITEM_MOD_MANA_REGENERATION:
                    self::ApplyManaRegenBonus($val, $apply);
                    break;
                case ITEM_MOD_ARMOR_PENETRATION_RATING:
                    self::ApplyRatingMod(CR_ARMOR_PENETRATION, $val, $apply);
                    break;
                case ITEM_MOD_SPELL_POWER:
                    self::ApplySpellPowerBonus($val, $apply);
                    break;
                case ITEM_MOD_SPELL_PENETRATION:
                    self::ApplyModInt32Value(PLAYER_FIELD_MOD_TARGET_RESISTANCE, -$val, $apply);
                    self::$m_spellPenetrationItemMod += $apply ? $val : (-$val);
                    break;
                case ITEM_MOD_BLOCK_VALUE:
                    self::HandleBaseModValue(SHIELD_BLOCK_VALUE, FLAT_MOD, $val, $apply);
                    break;
                // deprecated item mods
                case ITEM_MOD_FERAL_ATTACK_POWER:
                case ITEM_MOD_SPELL_HEALING_DONE:
                case ITEM_MOD_SPELL_DAMAGE_DONE:
                    break;
            }
        }
        if($ssv) {
            if($spellbonus = WoW_Items::GetSpellBonus($ssv, $proto->ScalingStatValue)) {
                self::ApplySpellPowerBonus($spellbonus, $apply);
            }
        }
        $armor = $proto->armor;
        if($ssv) {
            if($ssvarmor = WoW_Items::GetArmorMod($ssv, $proto->ScalingStatValue)) {
                $armor = $ssvarmor;
            }
        }
        // Add armor bonus from ArmorDamageModifier if > 0
        if($proto->ArmorDamageModifier > 0) {
            $armor += $proto->ArmorDamageModifier;
        }
        if($armor) {
            self::HandleStatModifier(UNIT_MOD_ARMOR, BASE_VALUE, $armor, $apply);
        }
        if($proto->block) {
            self::HandleBaseModValue(SHIELD_BLOCK_VALUE, FLAT_MOD, $proto->block, $apply);
        }
        if($proto->holy_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_HOLY, BASE_VALUE, $proto->holy_res, $apply);
        }
        if($proto->fire_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_FIRE, BASE_VALUE, $proto->fire_res, $apply);
        }
        if($proto->nature_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_NATURE, BASE_VALUE, $proto->nature_res, $apply);
        }
        if($proto->frost_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_FROST, BASE_VALUE, $proto->frost_res, $apply);
        }
        if($proto->shadow_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_SHADOW, BASE_VALUE, $proto->shadow_res, $apply);
        }
        if($proto->arcane_res) {
            self::HandleStatModifier(UNIT_MOD_RESISTANCE_ARCANE, BASE_VALUE, $proto->arcane_res, $apply);
        }
        $attType = BASE_ATTACK;
        $damage = 0.0;
        if($slot == EQUIPMENT_SLOT_RANGED && (in_array($proto->InventoryType, array(INV_TYPE_RANGED, INV_TYPE_THROWN, INV_TYPE_RANGED_RIGHT)))) {
            $attType = RANGED_ATTACK;
        }
        elseif($slot == EQUIPMENT_SLOT_OFFHAND) {
            $attType = OFF_ATTACK;
        }
        $minDamage = $proto->Damage[0]['min'];
        $maxDamage = $proto->Damage[0]['max'];
        $extraDPS = 0;
        if($ssv) {
            if($extraDPS = WoW_Items::GetDPSMod($ssv, $proto->ScalingStatValue)) {
                $average = $extraDPS * $proto->delay / 1000;
                $minDamage = 0.7 * $average;
                $maxDamage = 1.3 * $average;
            }
        }
        if($minDamage > 0) {
            $damage = $apply ? $minDamage : BASE_MINDAMAGE;
            self::SetBaseWeaponDamage($attType, MINDAMAGE, $damage);
        }
        if($maxDamage > 0) {
            $damage = $apply ? $maxDamage : BASE_MAXDAMAGE;
            self::SetBaseWeaponDamage($attType, MAXDAMAGE, $damage);
        }
        if($proto->delay) {
            if($slot == EQUIPMENT_SLOT_RANGED) {
                self::SetAttackTime(RANGED_ATTACK, $apply ? $proto->delay : BASE_ATTACK_TIME);
            }
            elseif($slot == EQUIPMENT_SLOT_MAINHAND) {
                self::SetAttackTime(BASE_ATTACK, $apply ? $proto->delay : BASE_ATTACK_TIME);
            }
            elseif($slot == EQUIPMENT_SLOT_OFFHAND) {
                self::SetAttackTime(OFF_ATTACK, $apply ? $proto->delay : BASE_ATTACK_TIME);
            }
        }
        if(self::CanModifyStats() && ($damage || $proto->delay)) {
            self::UpdateDamagePhysical($attType);
        }
    }
    
    private static function UpdateDamagePhysical($attType) {
        $mindamage = 0;
        $maxdamage = 0;
        
        self::CalculateMinMaxDamage($attType, false, $mindamage, $maxdamage);
        
        switch($attType) {
            case BASE_ATTACK:
            default:
                self::SetStatInt32Value(UNIT_FIELD_MINDAMAGE, $mindamage);
                self::SetStatInt32Value(UNIT_FIELD_MAXDAMAGE, $maxdamage);
                break;
            case OFF_ATTACK:
                self::SetStatInt32Value(UNIT_FIELD_MINOFFHANDDAMAGE, $mindamage);
                self::SetStatInt32Value(UNIT_FIELD_MAXOFFHANDDAMAGE, $maxdamage);
                break;
            case RANGED_ATTACK:
                self::SetStatInt32Value(UNIT_FIELD_MINRANGEDDAMAGE, $mindamage);
                self::SetStatInt32Value(UNIT_FIELD_MAXRANGEDDAMAGE, $maxdamage);
                break;
        }
    }
    
    private static function CalculateMinMaxDamage($attType, $normalized, &$min_damage, &$max_damage) {
        $unitMod = 0;
        $attPower = 0;
        
        switch($attType) {
            case BASE_ATTACK:
            default:
                $unitMod = UNIT_MOD_DAMAGE_MAINHAND;
                $attPower = UNIT_MOD_ATTACK_POWER;
                break;
            case OFF_ATTACK:
                $unitMod = UNIT_MOD_DAMAGE_OFFHAND;
                $attPower = UNIT_MOD_ATTACK_POWER;
                break;
            case RANGED_ATTACK:
                $unitMod = UNIT_MOD_DAMAGE_RANGED;
                $attPower = UNIT_MOD_ATTACK_POWER_RANGED;
                break;
        }
        
        $att_speed = self::GetAPMultiplier($attType, $normalized);
        
        $base_value = self::GetModifierValue($unitMod, BASE_VALUE) + self::GetTotalAttackPowerValue($attType) / 14.0 * $att_speed;
        $base_pct = self::GetModifierValue($unitMod, BASE_PCT);
        $total_value = self::GetModifierValue($unitMod, TOTAL_VALUE);
        $total_pct = self::GetModifierValue($unitMod, TOTAL_PCT);
        
        $weapon_mindamage = self::GetWeaponDamageRange($attType, MINDAMAGE);
        $weapon_maxdamage = self::GetWeaponDamageRange($attType, MAXDAMAGE);
        
        if($attType == RANGED_ATTACK) {
            $weapon_mindamage += self::GetAmmoDPS() * $att_speed;
            $weapon_maxdamage += self::GetAmmoDPS() * $att_speed;
        }
        $min_damage = (($base_value + $weapon_mindamage) * $base_pct + $total_value) * $total_pct;
        $max_damage = (($base_value + $weapon_maxdamage) * $base_pct + $total_value) * $total_pct;
    }
    
    private static function GetAmmoDPS() {
        return self::$m_ammoDPS;
    }
    
    private static function GetWeaponDamageRange($attType, $type) {
        if($attType == OFF_ATTACK && WoW_Characters::GetItem(EQUIPMENT_SLOT_OFFHAND) == null) {
            return 0.0;
        }
        return self::$m_weaponDamage[$attType][$type];
    }
    
    private static function GetAPMultiplier($attType, $normalized) {
        if(!$normalized) {
            return self::GetAttackTime($attType) / 1000;
        }
        $weapon = self::GetWeaponForAttack($attType, true, false);
        if(!$weapon) {
            return 2.4; // fist attack
        }
        switch($weapon->GetProto()->InventoryType) {
            case INVTYPE_2HWEAPON:
                return 3.3;
            case INVTYPE_RANGED:
            case INVTYPE_RANGEDRIGHT:
            case INVTYPE_THROWN:
                return 2.8;
            case INVTYPE_WEAPON:
            case INVTYPE_WEAPONMAINHAND:
            case INVTYPE_WEAPONOFFHAND:
            default:
                return $weapon->GetProto()->subclass == ITEM_SUBCLASS_WEAPON_DAGGER ? 1.7 : 2.4;
        }
    }
    
    private static function CanUseEquippedWeapon($attackType) {
        // Flags?
        return true;
    }
    
    private static function GetWeaponForAttack($attackType, $nonBroken, $useable) {
        $slot = 0;
        switch($attackType) {
            case BASE_ATTACK:
                $slot = EQUIPMENT_SLOT_MAINHAND;
                break;
            case OFF_ATTACK:
                $slot = EQUIPMENT_SLOT_OFFHAND;
                break;
            case RANGED_ATTACK:
                $slot = EQUIPMENT_SLOT_RANGED;
                break;
            default:
                return null;
        }
        $item = WoW_Characters::GetItem($slot);
        if(!$item || $item->GetProto()->class != ITEM_CLASS_WEAPON) {
            return null;
        }
        if($useable && !self::CanUseEquippedWeapon($attackType)) {
            return null;
        }
        if($nonBroken && $item->IsBroken()) {
            return null;
        }
        return $item;
    }
    
    private static function GetAttackTime($att) {
        return (int) self::GetInt32Value(UNIT_FIELD_BASEATTACKTIME + $att) / self::$m_modAttackSpeedPct[$att];
    }
    
    private static function GetModifierValue($unitMod, $modifierType) {
        if($unitMod >= UNIT_MOD_END || $modifierType >= MODIFIER_TYPE_END) {
            WoW_Log::WriteError('%s : attempt to access nonexistent modifier (%d) value from UnitMods (%d)!', __METHOD__, $modifierType, $unitMod);
            return 0.0;
        }
        if($modifierType == TOTAL_PCT && self::$m_auraModifiersGroup[$unitMod][$modifierType] <= 0.0) {
            return 0.0;
        }
        return self::$m_auraModifiersGroup[$unitMod][$modifierType];
    }
    
    private static function GetTotalAttackPowerValue($attType) {
        if($attType == RANGED_ATTACK) {
            $ap = self::GetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER) + self::GetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER_MODS);
            if($ap < 0) {
                return 0.0;
            }
            return $ap * (1 + self::GetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER_MULTIPLIER));
        }
        else {
            $ap = self::GetInt32Value(UNIT_FIELD_ATTACK_POWER) + self::GetInt32Value(UNIT_FIELD_ATTACK_POWER_MODS);
            if($ap < 0) {
                return 0.0;
            }
            return $ap * (1 + self::GetInt32Value(UNIT_FIELD_ATTACK_POWER_MULTIPLIER));
        }
    }
    
    private static function CanModifyStats() {
        return self::$m_canModifyStats;
    }
    
    private static function HandleStatModifier($unitMod, $modifierType, $amount, $apply) {
        if($unitMod >= UNIT_MOD_END || $modifierType >= MODIFIER_TYPE_END) {
            WoW_Log::WriteError('%s : ERROR in HandleStatModifier(): nonexistent UnitMods (%d) or wrong UnitModifierType (%d)!', __METHOD__, $unitMod, $modifierType);
            return false;
        }
        $val = 1.0;
        switch($modifierType) {
            case BASE_VALUE:
            case TOTAL_VALUE:
                self::$m_auraModifiersGroup[$unitMod][$modifierType] += $apply ? $amount : (-$amount);
                break;
            case BASE_PCT:
            case TOTAL_PCT:
                if($amount <= -100.0) {
                    //small hack-fix for -100% modifiers
                    $amount = -200.0;
                }
                $val = (100.0 + $amount) / 100.0;
                self::$m_auraModifiersGroup[$unitMod][$modifierType] *= $apply ? $val : (1.0 / $val);
                break;
            default:
                break;
        }
        if(!self::CanModifyStats()) {
            return false;
        }
        switch($unitMod) {
            case UNIT_MOD_STAT_STRENGTH:
            case UNIT_MOD_STAT_AGILITY:
            case UNIT_MOD_STAT_STAMINA:
            case UNIT_MOD_STAT_INTELLECT:
            case UNIT_MOD_STAT_SPIRIT:
                self::UpdateStats(self::GetStatByAuraGroup($unitMod));
                break;
            case UNIT_MOD_ARMOR:
                self::UpdateArmor();
                break;
            case UNIT_MOD_HEALTH:
                self::UpdateMaxHealth();
                break;
            case UNIT_MOD_MANA:
            case UNIT_MOD_RAGE:
            case UNIT_MOD_FOCUS:
            case UNIT_MOD_ENERGY:
            case UNIT_MOD_HAPPINESS:
            case UNIT_MOD_RUNE:
            case UNIT_MOD_RUNIC_POWER:
                self::UpdateMaxPower(self::GetPowerTypeByAuraGroup($unitMod));
                break;
            case UNIT_MOD_RESISTANCE_HOLY:
            case UNIT_MOD_RESISTANCE_FIRE:
            case UNIT_MOD_RESISTANCE_NATURE:
            case UNIT_MOD_RESISTANCE_FROST:
            case UNIT_MOD_RESISTANCE_SHADOW:
            case UNIT_MOD_RESISTANCE_ARCANE:
                self::UpdateResistances(self::GetSpellSchoolByAuraGroup($unitMod));
                break;
            case UNIT_MOD_ATTACK_POWER:
                self::UpdateAttackPowerAndDamage();
                break;
            case UNIT_MOD_ATTACK_POWER_RANGED:
                self::UpdateAttackPowerAndDamage(false);
                break;
            case UNIT_MOD_DAMAGE_MAINHAND:
                self::UpdateDamagePhysical(BASE_ATTACK);
                break;
            case UNIT_MOD_DAMAGE_OFFHAND:
                self::UpdateDamagePhysical(OFF_ATTACK);
                break;
            case UNIT_MOD_DAMAGE_RANGED:
                self::UpdateDamagePhysical(RANGED_ATTACK);
                break;
            default:
                break;
        }
        return true;
    }
    
    private static function UpdateStats($stat) {
        if($stat > STAT_SPIRIT) {
            return false;
        }
        
        $value = self::GetTotalStatValue($stat);
        
        self::SetStat($stat, $value);
        
        switch($stat) {
            case STAT_STRENGTH:
                self::UpdateShieldBlockValue();
                break;
            case STAT_AGILITY:
                self::UpdateArmor();
                self::UpdateAllCritPercentages();
                self::UpdateDodgePercentage();
                break;
            case STAT_STAMINA:
            case STAT_INTELLECT:
                self::UpdateMaxPower(POWER_MANA);
                self::UpdateAllSpellCritChances();
                self::UpdateArmor(); //SPELL_AURA_MOD_RESISTANCE_OF_INTELLECT_PERCENT, only armor currently
                break;
            case STAT_SPIRIT:
                break;
            default:
                break;
        }
        // Need update (exist AP from stat auras)
        self::UpdateAttackPowerAndDamage();
        self::UpdateAttackPowerAndDamage(true);
        
        self::UpdateSpellDamageAndHealingBonus();
        self::UpdateManaRegen();
        return true;
    }
    
    private static function UpdateManaRegen() {
        $intellect = self::GetStat(STAT_INTELLECT);
        // Mana regen from spirit and intellect
        $power_regen = sqrt($intellect) * self::OCTRegenMPPerSpirit();
        //TODO: UpdateManaRegen
    }
    
    private static function OCTRegenMPPerSpirit() {
        //TODO: OCTRegenMPPerSpirit
    }
    
    private static function GetStat($stat) {
        return self::GetInt32Value(UNIT_FIELD_STAT0 + $stat);
    }
    
    private static function UpdateSpellDamageAndHealingBonus() {
        //TODO: UpdateSpellDamageAndHealingBonus
    }
    
    private static function UpdateAllSpellCritChances() {
        //TODO: UpdateAllSpellCritChances
    }
    
    private static function UpdateAllCritPercentages() {
        $value = self::GetMeleeCritFromAgility();
        
        self::SetBaseModValue(CRIT_PERCENTAGE, PCT_MOD, $value);
        self::SetBaseModValue(OFFHAND_CRIT_PERCENTAGE, PCT_MOD, $value);
        self::SetBaseModValue(RANGED_CRIT_PERCENTAGE, PCT_MOD, $value);
        
        self::UpdateCritPercentage(BASE_ATTACK);
        self::UpdateCritPercentage(OFF_ATTACK);
        self::UpdateCritPercentage(RANGED_ATTACK);
    }
    
    private static function SetBaseModValue($modGroup, $modType, $value) {
        //TODO: SetBaseModValue
    }
    
    private static function GetMeleeCritFromAgility() {
        //TODO: GetMeleeCritFromAgility
    }
    
    private static function UpdateDodgePercentage() {
        //TODO: UpdateDodgePercentage
    }
    
    private static function GetTotalStatValue($stat) {
        $unitMod = UNIT_MOD_STAT_START + $stat;
        if(self::$m_auraModifiersGroup[$unitMod][TOTAL_PCT] <= 0.0) {
            return 0.0;
        }
        $value = self::$m_auraModifiersGroup[$unitMod][BASE_VALUE] + self::GetCreateStat($stat);
        $value *= self::$m_auraModifiersGroup[$unitMod][BASE_PCT];
        $value += self::$m_auraModifiersGroup[$unitMod][TOTAL_VALUE];
        $value *= self::$m_auraModifiersGroup[$unitMod][TOTAL_PCT];

        return $value;
    }
    
    private static function GetCreateStat($stat) {
        return self::$m_createStats[$stat];
    }
    
    private static function GetStatByAuraGroup($unitMod) {
        $stat = STAT_STRENGTH;
        
        switch($unitMod) {
            case UNIT_MOD_STAT_STRENGTH:
                $stat = STAT_STRENGTH;
                break;
            case UNIT_MOD_STAT_AGILITY:
                $stat = STAT_AGILITY;
                break;
            case UNIT_MOD_STAT_STAMINA:
                $stat = STAT_STAMINA;
                break;
            case UNIT_MOD_STAT_INTELLECT:
                $stat = STAT_INTELLECT;
                break;
            case UNIT_MOD_STAT_SPIRIT:
                $stat = STAT_SPIRIT;
                break;
            default:
                break;
        }
        return $stat;
    }
    
    private static function UpdateArmor() {
        //TODO: UpdateArmor
    }
    
    private static function UpdateMaxHealth() {
        //TODO: UpdateMaxHealth
    }
    
    private static function UpdateMaxPower($power) {
        //TODO: UpdateMaxPower
    }
    
    private static function GetPowerTypeByAuraGroup($unitMod) {
        //TODO: GetPowerTypeByAuraGroup
    }
    
    private static function UpdateResistances($school) {
        //TODO: UpdateResistances
    }
    
    private static function GetSpellSchoolByAuraGroup($unitMod) {
        //TODO: GetSpellSchoolByAuraGroup
    }
    
    private static function UpdateAttackPowerAndDamage($ranged = false) {
        //TODO: UpdateAttackPowerAndDamage
    }
    
    private static function ApplyStatBuffMod($stat, $val, $apply) {
        self::ApplyModSignedFloatValue(($val > 0 ? UNIT_FIELD_POSSTAT0 + $stat : UNIT_FIELD_NEGSTAT0 + $stat), $val, $apply);
    }
    
    private static function ApplyModSignedFloatValue($index, $val, $apply) {
        self::ApplyModInt32Value($index, $val, $apply);
    }
    
    private static function ApplyRatingMod($cr, $value, $apply) {
        self::$m_baseRatingValue[$cr] += ($apply ? $value : -$value);
        
        // explicit affected values
        switch($cr) {
            case CR_HASTE_MELEE:
                $RatingChange = $value * self::GetRatingMultiplier($cr);
                self::ApplyAttackTimePercentMod(BASE_ATTACK, $RatingChange, $apply);
                self::ApplyAttackTimePercentMod(OFF_ATTACK, $RatingChange, $apply);
                break;
            case CR_HASTE_RANGED:
                $RatingChange = $value * self::GetRatingMultiplier($cr);
                self::ApplyAttackTimePercentMod(RANGED_ATTACK, $RatingChange, $apply);
                break;
            case CR_HASTE_SPELL:
                $RatingChange = $value * self::GetRatingMultiplier($cr);
                self::ApplyCastTimePercentMod($RatingChange, $apply);
                break;
            default:
                break;
        }
        self::UpdateRating($cr);
    }
    
    private static function UpdateRating($cr) {
        //TODO: UpdateRating
    }
    
    private static function GetRatingMultiplier($cr) {
        //TODO: GetRatingMultiplier
    }
    
    private static function ApplyAttackTimePercentMod($att, $val, $apply) {
        if($val > 0) {
            self::ApplyPercentModFloatVar(self::$m_modAttackSpeedPct[$att], $val, !$apply);
            self::ApplyPercentModFloatValue(UNIT_FIELD_BASEATTACKTIME + $att, $val, !$apply);
        }
        else {
            self::ApplyPercentModFloatVar(self::$m_modAttackSpeedPct[$att], -$val, $apply);
            self::ApplyPercentModFloatValue(UNIT_FIELD_BASEATTACKTIME + $att, -$val, $apply);
        }
    }
    
    private static function ApplyCastTimePercentMod($val, $apply) {
        if($val > 0) {
            self::ApplyPercentModFloatValue(UNIT_MOD_CAST_SPEED, $val, !$apply);
        }
        else {
            self::ApplyPercentModFloatValue(UNIT_MOD_CAST_SPEED, -$val, $apply);
        }
    }
    
    private static function ApplyPercentModFloatVar(&$var, $val, $apply) {
        if($val == -100.0) {
            $val = -99.99;
        }
        $var *= ($apply ? (100.0 + $val) / 100.0 : 100.0 / (100.0 + $val));
    }
    
    private static function ApplyPercentModFloatValue($index, $val, $apply) {
        $val = $val != -100.0 ? $val : -99.9;
        self::SetInt32Value($index, self::GetInt32Value($index) * ($apply ? (100.0 + $val) / 100.0 : 100.0 / (100 + $val)));
    }
    
    private static function ApplyManaRegenBonus($amount, $apply) {
        //TODO: ApplyManaRegenBonus
    }
    
    private static function ApplySpellPowerBonus($amount, $apply) {
        self::$m_baseSpellPower += $apply ? $amount : -$amount;
        
        // For speed just update for client
        self::ApplyModInt32Value(PLAYER_FIELD_MOD_HEALING_DONE_POS, $amount, $apply);
        for($i = SPELL_SCHOOL_HOLY; $i < MAX_SPELL_SCHOOL; ++$i) {
            self::ApplyModInt32Value(PLAYER_FIELD_MOD_DAMAGE_DONE_POS + $i, $amount, $apply);
        }
    }
    
    private static function ApplyModInt32Value($index, $val, $apply) {
        $cur = self::GetInt32Value($index);
        $cur += ($apply ? $val : -$val);
        self::SetInt32Value($index, $cur);
    }
    
    private static function HandleBaseModValue($modGroup, $modType, $amount, $apply) {
        if($modGroup >= BASEMOD_END || $modType >= MOD_END) {
            WoW_Log::WriteError('%s : ERROR in HandleBaseModValue(): nonexistent BaseModGroup (%d) of wrong BaseModType (%d)!', __METHOD__, $modGroup, $modType);
            return false;
        }
        $val = 1.0;
        switch($modType) {
            case FLAT_MOD:
                self::$m_auraBaseMod[$modGroup][$modType] += $apply ? $amount : (-$amount);
                break;
            case PCT_MOD:
                if($amount <= -100.0) {
                    $amount = 200.0;
                }
                $val = (100.0 + $amount) / 100.0;
                self::$m_auraBaseMod[$modGroup][$modType] *= $apply ? $val : (1.0/$val);
        }
        if(!self::CanModifyStats()) {
            return;
        }
        switch($modGroup) {
            case CRIT_PERCENTAGE:
                self::UpdateCritPercentage(BASE_ATTACK);
                break;
            case RANGED_CRIT_PERCENTAGE:
                self::UpdateCritPercentage(RANGED_ATTACK);
                break;
            case OFFHAND_CRIT_PERCENTAGE:
                self::UpdateCritPercentage(OFF_ATTACK);
                break;
            case SHIELD_BLOCK_VALUE:
                self::UpdateShieldBlockValue();
                break;
            default:
                break;
        }
    }
    
    private static function UpdateShieldBlockValue() {
        //TODO: UpdateShieldBlockValue
    }
    
    private static function UpdateCritPercentage($attType) {
        //TODO: UpdateCritPercentage
    }
    
    private static function SetBaseWeaponDamage($attType, $damageRange, $value) {
        if(!isset(self::$m_weaponDamage[$attType])) {
            self::$m_weaponDamage[$attType] = array();
        }
        if(!isset(self::$m_weaponDamage[$attType][$damageRange])) {
            self::$m_weaponDamage[$attType][$damageRange] = 0;
        }
        self::$m_weaponDamage[$attType][$damageRange] = $value;
    }
    
    private static function SetAttackTime($attType, $val) {
        self::SetInt32Value(UNIT_FIELD_BASEATTACKTIME + $attType, $val * self::$m_modAttackSpeedPct[$attType]);
    }
    
    private static function SetCanModifyStats($modifyStats) {
        //TODO: SetCanModifyStats
    }
    
    private static function UpdateAllStats() {
        //TODO: UpdateAllStats
    }
    
    private static function InitStatsForLevel($reapplyMods = false) {
        if($reapplyMods) {
            //reapply stats values only on .reset stats (level) command
            self::_RemoveAllStatBonuses();
        }
        // reset before any aura state sources (health set/aura apply)
        self::SetInt32Value(UNIT_FIELD_AURASTATE, 0);
        
        // set default cast time multiplier
        self::SetInt32Value(UNIT_MOD_CAST_SPEED, 0);
        
        $stats = array(
            STAT_STRENGTH => 'strength',
            STAT_AGILITY => 'agility',
            STAT_STAMINA => 'stamina',
            STAT_INTELLECT => 'intellect',
            STAT_SPIRIT => 'spirit'
        );
        for($i = STAT_STRENGTH; $i < MAX_STATS; ++$i) {
            // save base values (bonuses already included in stored stats
            self::SetCreateStat($i, self::$player_levelstats[$stats[$i]]);
            self::SetStat($i, self::$player_levelstats[$stats[$i]]);
        }
        self::SetCreateHealth(self::$player_classlevelstats['basehp']);
        
        //set create powers
        self::SetCreateMana(self::$player_classlevelstats['basemana']);
        
        self::SetArmor(self::$m_createStats[STAT_AGILITY] * 2);
        self::InitStatBuffMods();
        
        //reset rating fields values
        for($index = PLAYER_FIELD_COMBAT_RATING_1; $index < PLAYER_FIELD_COMBAT_RATING_1 + MAX_COMBAT_RATING; ++$index) {
            self::SetInt32Value($index, 0);
        }
        
        self::SetInt32Value(PLAYER_FIELD_MOD_HEALING_DONE_POS, 0);
        for($i = 0; $i < MAX_SPELL_SCHOOL; ++$i) {
            self::SetInt32Value(PLAYER_FIELD_MOD_DAMAGE_DONE_NEG+$i, 0);
            self::SetInt32Value(PLAYER_FIELD_MOD_DAMAGE_DONE_POS+$i, 0);
            self::SetInt32Value(PLAYER_FIELD_MOD_DAMAGE_DONE_PCT+$i, 0);
        }
        
        //reset attack power, damage and attack speed fields
        self::SetInt32Value(UNIT_FIELD_BASEATTACKTIME, 2000);
        self::SetInt32Value(UNIT_FIELD_BASEATTACKTIME + 1, 2000); // offhand attack time
        self::SetInt32Value(UNIT_FIELD_RANGEDATTACKTIME, 2000);
        
        self::SetInt32Value(UNIT_FIELD_MINDAMAGE, 0);
        self::SetInt32Value(UNIT_FIELD_MAXDAMAGE, 0);
        self::SetInt32Value(UNIT_FIELD_MINOFFHANDDAMAGE, 0);
        self::SetInt32Value(UNIT_FIELD_MAXOFFHANDDAMAGE, 0);
        self::SetInt32Value(UNIT_FIELD_MINRANGEDDAMAGE, 0);
        self::SetInt32Value(UNIT_FIELD_MAXRANGEDDAMAGE, 0);
        
        self::SetInt32Value(UNIT_FIELD_ATTACK_POWER, 0);
        self::SetInt32Value(UNIT_FIELD_ATTACK_POWER_MODS, 0);
        self::SetInt32Value(UNIT_FIELD_ATTACK_POWER_MULTIPLIER, 0);
        self::SetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER, 0);
        self::SetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER_MODS, 0);
        self::SetInt32Value(UNIT_FIELD_RANGED_ATTACK_POWER_MULTIPLIER, 0);
        
        // Base crit values (will be recalculated in UpdateAllStats() at loading and in _ApplyAllStatBonuses() at reset
        self::SetInt32Value(PLAYER_CRIT_PERCENTAGE, 0);
        self::SetInt32Value(PLAYER_OFFHAND_CRIT_PERCENTAGE, 0);
        self::SetInt32Value(PLAYER_RANGED_CRIT_PERCENTAGE, 0);
        
        // Init spell schools (will be recalculated in UpdateAllStats() at loading and in _ApplyAllStatBonuses() at reset
        for($i = 0; $i < MAX_SPELL_SCHOOL; ++$i) {
            self::SetInt32Value(PLAYER_SPELL_CRIT_PERCENTAGE1, 0);
        }
        
        self::SetInt32Value(PLAYER_PARRY_PERCENTAGE, 0);
        self::SetInt32Value(PLAYER_BLOCK_PERCENTAGE, 0);
        self::SetInt32Value(PLAYER_SHIELD_BLOCK, 0);
        
        // Dodge percentage
        self::SetInt32Value(PLAYER_DODGE_PERCENTAGE, 0);
        
        // set armor (resistance 0) to original value (create_agility*2)
        self::SetArmor(self::$m_createStats[STAT_AGILITY] * 2);
        self::SetResistanceBuffMods(SPELL_SCHOOL_NORMAL, true, 0);
        self::SetResistanceBuffMods(SPELL_SCHOOL_NORMAL, false, 0);
        // set other resistance to original value (0)
        for($i = 1; $i < MAX_SPELL_SCHOOL; ++$i) {
            self::SetResistance($i, 0);
            self::SetResistanceBuffMods($i, true, 0);
            self::SetResistanceBuffMods($i, false, 0);
        }
        
        self::SetInt32Value(PLAYER_FIELD_MOD_TARGET_RESISTANCE, 0);
        self::SetInt32Value(PLAYER_FIELD_MOD_TARGET_PHYSICAL_RESISTANCE, 0);
        for($i = 0; $i < MAX_SPELL_SCHOOL; ++$i) {
            self::SetInt32Value(UNIT_FIELD_POWER_COST_MODIFIER + $i, 0);
            self::SetInt32Value(UNIT_FIELD_POWER_COST_MULTIPLIER + $i, 0);
        }
        // Reset no reagent cost field
        for($i = 0; $i < 3; ++$i) {
            self::SetInt32Value(PLAYER_NO_REAGENT_COST_1 + $i, 0);
        }
        // Init data for form but skip reapply item mods for form
        self::InitDataForForm($reapplyMods);
        
        // save new stats
        for($i = POWER_MANA; $i < MAX_POWERS; ++$i) {
            self::SetMaxPower($i, self::GetCreatePowers($i));
        }
        self::SetMaxHealth(self::$player_classlevelstats['basehp']);
        
        if($reapplyMods) {
            //reapply stats values only on .reset stats (level) command
            self::_ApplyAllStatBonuses();
        }
        
        // set current level health and mana/energy to maximum after applying all mods.
        self::SetHealth(self::GetMaxHealth());
        self::SetPower(POWER_MANA, self::GetMaxPower(POWER_MANA));
        self::SetPower(POWER_ENERGY, self::GetMaxPower(POWER_ENERGY));
        if(self::GetPower(POWER_RAGE) > self::GetMaxPower(POWER_RAGE)) {
            self::SetPower(POWER_RAGE, self::GetMaxPower(POWER_RAGE));
        }
        self::SetPower(POWER_FOCUS, 0);
        self::SetPower(POWER_HAPPINESS, 0);
        self::SetPower(POWER_RUNIC_POWER, 0);
    }
    
    private static function InitDataForForm($reapplyMods) {
        // Seems that it's not necessary.
    }
    
    private static function SetCreateStat($stat, $val) {
        self::$m_createStats[$stat] = $val;
    }
    
    private static function SetStat($stat, $val) {
        self::SetInt32Value(UNIT_FIELD_STAT0 + $stat, $val);
    }
    
    private static function SetCreateHealth($val) {
        self::SetInt32Value(UNIT_FIELD_BASE_HEALTH, $val);
    }
    
    private static function SetHealth($val) {
        $maxHealth = self::GetMaxHealth();
        if($maxHealth < $val) {
            $val = $maxHealth;
        }
        self::SetInt32Value(UNIT_FIELD_HEALTH, $val);
    }
    
    public static function GetHealth() {
        return self::GetInt32Value(UNIT_FIELD_HEALTH);
    }
    
    private static function SetMaxHealth($val) {
        $health = self::GetHealth();
        self::SetInt32Value(UNIT_FIELD_MAXHEALTH, $val);
        if($val < $health) {
            self::SetHealth($val);
        }
    }
    
    public static function GetMaxHealth() {
        return self::GetInt32Value(UNIT_FIELD_MAXHEALTH);
    }
    
    private static function SetCreateMana($val) {
        self::SetInt32Value(UNIT_FIELD_BASE_MANA, $val);
    }
    
    public static function GetCreateMana() {
        return self::GetInt32Value(UNIT_FIELD_BASE_MANA);
    }
    
    private static function SetArmor($val) {
        self::SetResistance(SPELL_SCHOOL_NORMAL, $val);
    }
    
    public static function GetArmor() {
        return self::GetResistance(SPELL_SCHOOL_NORMAL);
    }
    
    private static function SetResistance($school, $val) {
        self::SetStatInt32Value(UNIT_FIELD_RESISTANCES + $school, $val);
    }
    
    public static function GetResistance($school) {
        return self::GetInt32Value(UNIT_FIELD_RESISTANCES + $school);
    }
    
    private static function SetResistanceBuffMods($school, $positive, $val) {
        self::SetInt32Value($positive ? UNIT_FIELD_RESISTANCEBUFFMODSPOSITIVE + $school : UNIT_FIELD_RESISTANCEBUFFMODSNEGATIVE + $school, $val);
    }
    
    private static function SetInt32Value($index, $value) {
        self::$m_values[$index] = $value;
    }
    
    private static function SetStatInt32Value($index, $value) {
        if($value < 0) {
            $value = 0;
        }
        self::SetInt32Value($index, $value);
    }
    
    public static function GetInt32Value($index) {
        return isset(self::$m_values[$index]) ? self::$m_values[$index] : 0;
    }
    
    private static function InitStatBuffMods() {
        for($i = STAT_STRENGTH; $i < MAX_STATS; ++$i) {
            self::SetInt32Value(UNIT_FIELD_POSSTAT0 + $i, 0);
            self::SetInt32Value(UNIT_FIELD_NEGSTAT0 + $i, 0);
        }
    }
    
    private static function SetPower($power, $val) {
        if(self::GetPower($power) == $val) {
            return;
        }
        $maxPower = self::GetMaxPower($power);
        if($val < $maxPower) {
            $val = $maxPower;
        }
        self::SetStatInt32Value(UNIT_FIELD_POWER1 + $power, $val);
        
    }
    
    private static function SetMaxPower($power, $val) {
        $cur_power = self::GetPower($power);
        self::SetStatInt32Value(UNIT_FIELD_MAXPOWER1 + $power, $val);
        if($val < $cur_power) {
            self::SetPower($power, $val);
        }
    }
    
    public static function GetPower($power) {
        return self::GetInt32Value(UNIT_FIELD_POWER1 + $power);
    }
    
    public static function GetMaxPower($power) {
        return self::GetInt32Value(UNIT_FIELD_MAXPOWER1 + $power);
    }
    
    public static function GetCreatePowers($power) {
        switch($power) {
            case POWER_HEALTH:
                return 0;    // is it really should be here?
            case POWER_MANA:
                return self::GetCreateMana();
            case POWER_RAGE:
                return 1000;
            case POWER_FOCUS:
                return 0;
            case POWER_ENERGY:
                return 100;
            case POWER_HAPPINESS:
                return 0;
            case POWER_RUNE:
                return WoW_Characters::GetClassID() == CLASS_DK ? 8 : 0;
            case POWER_RUNIC_POWER:
                return WoW_Characters::GetClassID() == CLASS_DK ? 1000 : 0;
        }
        return 0;
    }
}
?>