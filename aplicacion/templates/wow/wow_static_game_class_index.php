<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/" rel="np"><?php echo WoW_Locale::GetString('template_game_class_index'); ?></a></li>
</ol>-->
</div>
    <div class="content-bot">
      <div class="section-title">
        <h2><?php echo WoW_Locale::GetString('template_game_class_index'); ?></h2>
      </div> 
      <p class="main-header-desc"><?php echo WoW_Locale::GetString('template_game_class_intro'); ?></p>
<?php
$classes = array(
    'warrior' => CLASS_WARRIOR,
    'paladin' => CLASS_PALADIN,
    'hunter' => CLASS_HUNTER,
    'rogue' => CLASS_ROGUE,
    'priest' => CLASS_PRIEST,
    'death-knight' => CLASS_DK,
    'shaman' => CLASS_SHAMAN,
    'mage' => CLASS_MAGE,
    'warlock' => CLASS_WARLOCK,
    'druid' => CLASS_DRUID
);
$exp_classes = array(
    'wrath' => array('death-knight')
);
$i = 0;
foreach($classes as $class_name => $class_id) {
    if(in_array($class_name, $exp_classes['wrath']) ) {
        $req = sprintf('<em class="class-req wrath">%s</em>', WoW_Locale::GetString('template_zone_expansion_required') . ' ' . WoW_Locale::GetString('template_expansion_2'));
    }
    else {
        $req = '';
    }
    echo sprintf('<div class="flag-card %s">
        <div class="wrapper">
        <a href="%s">
        	<span class="class-name">%s</span>
        	<span class="class-type">%s</span>%s
        	<span class="class-desc">%s</span>
        </a>
        </div>
        </div>', $class_name, $class_name, WoW_Locale::GetString('character_class_' . $class_id), WoW_Utils::GetClassRolesInfo(WoW_Game::GetClassRole($class_id)), $req, WoW_Locale::GetString('template_game_class_' . $class_name . '_info') );
    ++$i;
}
?>
      <span class="clear">
        <!-- -->
      </span>
    </div>
  </div>
</div>
