<div id="section">
			<div id="game-showcase">
				<div id="game-selections">
						<div class="selection-block">
							<h3 class="selection-title"><?php echo WoW_Locale::GetString('template_bn_my_games'); ?> <span>(<?php echo WoW_Account::GetMyGames(); ?>)</span></h3>
<?php
$UserGames = WoW_Account::GetUserGames();
$count = count($UserGames);
for($i = 0; $i < $count; ++$i) {
?>
		<div class="game-selection " id="game-WOW<?php echo $UserGames[$i]['expansion'] > 0 ? 'X' . $UserGames[$i]['expansion'] . '-' . $i : 'C-' . $i; ?>" onclick="openGameDialog(this, '#dialog-WOW<?php echo $UserGames[$i]['expansion'] > 0 ? 'X' . $UserGames[$i]['expansion'] . '-'  . $i : 'C-' . $i; ?>');" title="<?php echo WoW_Locale::GetString('expansion_' . $UserGames[$i]['expansion']); ?>">
			<img class="box" src="<?php echo WoW::GetWoWPath(); ?>/static/local-common/images/game-boxes/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/wow<?php echo $UserGames[$i]['expansion'] > 0 ? 'X' . $UserGames[$i]['expansion'] : 'C'; ?>.png" alt="" />
			<span class="plus"></span>
			<div class="game-label"><?php echo WoW_Locale::GetString('expansion_' . $UserGames[$i]['expansion']); ?></div>


			<span class="pointer"></span>
		</div>
<?php
}
?>
						</div>
	<span class="clear"><!-- --></span>
				</div>
				<div id="game-dialogs">
<?php
for($i = 0; $i < $count; ++$i) {
?>
    <div class="game-selection-dialog" id="dialog-WOW<?php echo $UserGames[$i]['expansion'] > 0 ? 'X' . $UserGames[$i]['expansion'] . '-' . $i : 'C-' . $i; ?>" style="display: none">
			<div class="game-label">
				<?php echo WoW_Locale::GetString('expansion_' . $UserGames[$i]['expansion']); ?>
			</div>
				<a href="<?php echo WoW::GetWoWPath(); ?>/account/management/wow/dashboard.html?accountName=<?php echo $UserGames[$i]['username']; ?>" class="dialog-button manage-game">
					<span><?php echo WoW_Locale::GetString('template_bn_manage_game'); ?></span>
				</a>
				<a href="<?php echo WoW::GetWoWPath(); ?>/wow/" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>
	<span class="clear"><!-- --></span>
		</div>
<?php
}
?>
				</div>
			</div>
	<span class="clear"><!-- --></span>
			<div id="community-section">
				<h3 class="selection-title"><?php echo WoW_Locale::GetString('template_bn_game_cs'); ?></h3>
			</div>
		</div>
