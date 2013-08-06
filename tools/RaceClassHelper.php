<?php

/**
 * @author Shadez
 * @copyright 2011
 */

include('../includes/WoW_Loader.php');
    $weapons = array(
        'axe', 'axe2', 'bow', 'gun', 'mace', 'mace2', 'polearm', 'sword', 'sword2', 'staff', 'fist', 'dagger',
        'thrown', 'crossbow', 'wand'
    );
    $roles = array('melee', 'ranged', 'caster', 'healer', 'tank');
if(isset($_POST['helper'])) {
    $races_mask = 0;
    $classes_mask = 0;
    $armor_mask = 0;
    $weapons_mask = 0;
    $roles_mask = 0;
    $classes_info = array(
        1 => CLASS_MASK_WARRIOR,
        2 => CLASS_MASK_PALADIN,
        3 => CLASS_MASK_HUNTER,
        4 => CLASS_MASK_ROGUE,
        5 => CLASS_MASK_PRIEST,
        6 => CLASS_MASK_DK,
        7 => CLASS_MASK_SHAMAN,
        8 => CLASS_MASK_MAGE,
        9 => CLASS_MASK_WARLOCK,
        11 => CLASS_MASK_DRUID,
    );
    $races_info = array(
        1 => RACE_MASK_HUMAN,
        2 => RACE_MASK_ORC,
        3 => RACE_MASK_DWARF,
        4 => RACE_MASK_NIGHTELF,
        5 => RACE_MASK_UNDEAD,
        6 => RACE_MASK_TAUREN,
        7 => RACE_MASK_GNOME,
        8 => RACE_MASK_TROLL,
        9 => RACE_MASK_GOBLIN,
        10 => RACE_MASK_BLOODELF,
        11 => RACE_MASK_DRAENEI,
        22 => RACE_MASK_WORGEN,
    );
    for($i = 1; $i < 12; ++$i) {
        if (isset($_POST['race_' . $i]) && $_POST['race_' . $i] == 1) {
            $races_mask |= $races_info[$i];
        }
    }
    if (isset($_POST['race_22']) && $_POST['race_22'] == 1) {
        $races_mask |= $races_info[22];
    }
    for($i = 1; $i < 12; ++$i) {
        if ($i == 10) continue;
        if (isset($_POST['class_' . $i]) && $_POST['class_' . $i] == 1) {
            $classes_mask |= $classes_info[$i];
        }
    }
    $armors = array(
        'cloth', 'leather', 'mail', 'plate', 'shield'
    );
    foreach($armors as &$armor) {
        if (isset($_POST['armor_' . $armor]) && $_POST['armor_' . $armor] == 1)
            $armor_mask |= constant('ITEM_SUBCLASS_MASK_' . strtoupper($armor));
    }
    foreach($weapons as &$weapon) {
        if (isset($_POST['weapon_' . $weapon]) && $_POST['weapon_' . $weapon] == 1)
        {
            $weapons_mask |= constant('ITEM_SUBCLASS_MASK_' . strtoupper($weapon));
        }
    }
    foreach($roles as &$role) {
        if (isset($_POST['role_' . $role]) && $_POST['role_' . $role] == 1) {
            $roles_mask |= constant('ROLE_MASK_' .strtoupper($role));
        }
    }
    // output
    echo 'races_mask: <input type="text" value="' . $races_mask . '" /><br />
    classes_mask: <input type="text" value="' . $classes_mask . '" /><br />
    armors_mask: <input type="text" value="' . $armor_mask . '" /><br />
    weapons_mask: <input type="text" value="' . $weapons_mask . '" /><br />
    roles_mask: <input type="text" value="' . $roles_mask . '" /><br />
    <a href="1.php">Back</a>';
    die;
}
echo '<form action="" method="POST">
    <input type="hidden" name="helper" value="1" />
    <strong>Allowable races:</strong><br />';
    for($i = 1; $i < 12; ++$i) {
        echo '<label for="race_' . $i . '">'. WoW_Locale::GetString('character_race_' . $i) . '</label> <input type="checkbox"  name="race_' . $i . '" id="race_' . $i . '" value="1" /><br />';
    }
    echo '<label for="race_22">'. WoW_Locale::GetString('character_race_22') . '</label> <input type="checkbox"  name="race_22" id="race_22" value="1" /><br />';
    
    echo '<br />
    <strong>Allowable classes:</strong><br />';
    for($i = 1; $i < 12; ++$i) {
        if($i == 10) {
            continue;
        }
        echo '<label for="class_' . $i . '">'. WoW_Locale::GetString('character_class_' . $i) . '</label> <input type="checkbox"  name="class_' . $i . '" id="class_' . $i . '" value="1" /><br />';
    }
    echo '<br />
    <strong>Armor:</strong><br />
    <label for="armor_cloth">Cloth</label> <input type="checkbox"  value="1" name="armor_cloth" id="armor_cloth" /><br />
    <label for="armor_leather">Leather</label> <input type="checkbox"  value="1" name="armor_leather" id="armor_leather" /><br />
    <label for="armor_mail">Mail</label> <input type="checkbox"  value="1" name="armor_mail" id="armor_mail" /><br />
    <label for="armor_plate">Plate</label> <input type="checkbox"  value="1" name="armor_plate" id="armor_plate" /><br />
    <label for="armor_shield">Shield</label> <input type="checkbox"  value="1" name="armor_shield" id="armor_shield" /><br />
    <br />
    <strong>Weapons:</strong><br />';
    foreach($weapons as &$weapon) {
        echo '<label for="weapon_' . $weapon . '">' . ucfirst($weapon) . '</label> <input type="checkbox"  value="1" name="weapon_'.$weapon.'" id="weapon_' . $weapon . '" /><br />';
    }
    echo '<br /><strong>Roles:</strong><br />';
    foreach($roles as $role) {
        echo '<label for="role_' . $role . '">'.$role.' </label><input type="checkbox" name="role_'.$role.'" id="role_'.$role.'" value="1"  /><br />';
    }
    echo '<br /><br /><input type="submit" value="Create" />';
echo '</form>';
?>