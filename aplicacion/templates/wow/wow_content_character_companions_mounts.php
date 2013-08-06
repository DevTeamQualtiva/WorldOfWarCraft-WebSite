<?php
$mounts = WoW_Characters::GetMounts();
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<?php WoW_Template::NavigationMenu(); ?>
<!--
<ol class="ui-breadcrumb">
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/" rel="np">
World of Warcraft
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/game/" rel="np">
<?php echo WoW_Locale::GetString('template_menu_game'); ?>
</a>
</li>
<li>
<a href="<?php echo WoW_Characters::GetURL(); ?>" rel="np">
<?php echo sprintf('%s @ %s', WoW_Characters::GetName(), WoW_Characters::GetRealmName()); ?>
</a>
</li>
<li class="last">
<a href="<?php echo WoW_Characters::GetURL() . WoW_Template::GetPageData('category'); ?>" rel="np">
<?php echo WoW_Locale::GetString('template_profile_' . WoW_Template::GetPageData('category') . 's'); ?>
</a>
</li>
</ol>
-->
</div>
<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-<?php echo WoW_Characters::GetFactionName(); ?>">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
        <?php
        WoW_Template::LoadTemplate('block_profile_crest');
        WoW_Template::LoadTemplate('block_profile_menu');
        ?>
        </div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
		<div class="profile-section-header">
	<ul>
			<li<?php echo WoW_Template::GetPageData('category') == 'companion' ? ' class="tab-active"' : null; ?>>
				<a href="companion" rel="np">
					<span class="r"><span class="m">
						<?php echo WoW_Locale::GetString('template_profile_companions'); ?>
					</span></span>
				</a>
			</li>
			<li<?php echo WoW_Template::GetPageData('category') == 'mount' ? ' class="tab-active"' : null; ?>>
				<a href="mount" rel="np">
					<span class="r"><span class="m">
						<?php echo WoW_Locale::GetString('template_profile_mounts'); ?>
					</span></span>
				</a>
			</li>
	</ul>
		</div>

		<div class="profile-section">
	<div class="profile-filters" id="filters">
		<div class="keyword">
			<span class="view"></span>
			<span class="reset" style="display: none"></span>
			<input class="input" id="filter-keyword" type="text" value="<?php echo WoW_Locale::GetString('template_filter_caption'); ?>" alt="<?php echo WoW_Locale::GetString('template_filter_caption'); ?>" data-filter="row" data-name="filter" />
		</div>
		<div class="tabs">
			<a href="javascript:;" data-status="is-collected">
				<?php echo sprintf(WoW_Locale::GetString('template_companion_collected'), WoW_Characters::GetCollectedMountsCount()); ?>
			</a>

			<a href="javascript:;" data-status="not-collected">
				<?php echo sprintf(WoW_Locale::GetString('template_companion_not_collected'), WoW_Characters::GetNotCollectedMountsCount()); ?>
			</a>
		</div>
		<div class="mode">
			<span class="advanced-togglers" id="advanced-toggle">
				<a href="javascript:;" onclick="Companion.toggleAdvanced(this, true);" class="advanced-toggle">
					<?php echo WoW_Locale::GetString('template_companion_show_filters'); ?>
				</a>

				<a href="javascript:;" onclick="Companion.toggleAdvanced(this, false);" class="advanced-toggle" style="display: none">
					<?php echo WoW_Locale::GetString('template_companion_hide_filters'); ?>
				</a>
			</span>
            <?php
            if(WoW_Template::GetPageData('category') == 'mount') {
                $modes = array('all', 'ground', 'flying', 'aquatic');
                foreach($modes as $mode) {
                    echo '
                    <label for="mode-' . $mode . '">
                        <input type="radio" name="mode" id="mode-' . $mode . '" data-filter="class" data-name="mode" value="' . ($mode != 'all' ? $mode : null) . '"' . ($mode == 'all' ? ' checked="checked"' : null) . ' />' . WoW_Locale::GetString('template_companion_js_mount_' . $mode) . '
                    </label>
                    ';
                }
            }
            ?>
	<span class="clear"><!-- --></span>
		</div>
		<div class="advanced" id="advanced-filters" style="display: none">
			<div class="group advanced-filters-quality" style="">
				<span class="group-name"><?php echo WoW_Locale::GetString('template_rarity_filter'); ?></span>

				<ul>        
                    <?php
                    for($i = 4; $i > 0; --$i) {
                        if($i == 2) {
                            continue;
                        }
                        echo '
                        <li>
                            <label for="quality-' . $i . '" class="color-q' . $i . '">
                            <input type="checkbox" name="type" data-name="quality" value="' . $i . '" data-filter="column" id="quality-' . $i . '" />
                            ' . WoW_Locale::GetString('template_rarity_' . $i) . '
                        </label>
                        </li>';
                    }
                    ?>
				</ul>
			</div>
			<div class="group advanced-filters-source">
				<span class="group-name"><?php echo WoW_Locale::GetString('template_companion_source'); ?></span>
                <?php
                $sources = array(
                    array('drop', 'quest', 'vendor', 'prof'),
                    array('achv', 'faction', 'event', 'promo'),
                    array('store', 'tcg', 'other')
                );
                foreach($sources as $list) {
                    echo '<ul>';
                    foreach($list as $source) {
                        echo '
                            <li>
                                <label for="type-' . $source . '">
                                    <input type="checkbox" name="type" data-name="source" value="' . $source . '" data-filter="column" id="type-' . $source . '" />
                                    ' . WoW_Locale::GetString('template_source_' . $source) . '
                                </label>
                            </li>';
                    }
                    echo '</ul>';
                }
                ?>
			</div>

	<span class="clear"><!-- --></span>
		</div>
	</div>

			<div id="companions-loading"></div>
			<div class="companion-grid all-view" id="companions">
	<div class="table-options data-options table-top">
			<div class="option">

		<ul class="ui-pagination"></ul>
			</div>
            <?php echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), 1, 24, WoW_Characters::GetCollectedMountsCount()); ?>
	<span class="clear"><!-- --></span>
	</div>


    <div class="data-container">
    <?php
    foreach($mounts as $mount) {
        $type = '';
        switch($mount['source']) {
            case SOURCE_TYPE_QUEST:
                $type = 'quest';
                break;
            case SOURCE_TYPE_DROP:
                $type = 'drop';
                break;
            case SOURCE_TYPE_PROFESSION:
                $type = 'prof';
                break;
            case SOURCE_TYPE_ACHIEVEMENT:
                $type = 'achv';
                break;
            case SOURCE_TYPE_FACTION:
                $type = 'faction';
                break;
            case SOURCE_TYPE_EVENT:
                $type = 'event';
                break;
            case SOURCE_TYPE_PROMOTION:
                $type = 'promo';
                break;
            case SOURCE_TYPE_PET_STORE:
                $type = 'store';
                break;
            case SOURCE_TYPE_CARD_GAME:
                $type = 'tgc';
                break;
            case SOURCE_TYPE_TRAINER:
            case SOURCE_TYPE_OTHER:
                $type = 'other';
                break;
            case SOURCE_TYPE_VENDOR:
                $type = 'vendor';
                break;
        }
        echo '<div data-raw="' . $mount['source_type'] . ' ' . $mount['quality'] . '" class="grid-item ' . $mount['add_styles'] . '" >
            <a class="preview" data-companion="' . $mount['spell'] . '" href="' . WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . '/item/' . $mount['item_id'] . '" rel="np">
                <span class="render">
                    <span class="render-model" style="background-image: url(http://eu.media.blizzard.com/wow/renders/npcs/grid/creature' . $mount['npc_id'] . '.jpg)"></span>
                </span>
                
                <span class="name color-q' . $mount['quality'] . '">' . $mount['name'] . '</span>
            </a>
        </div>
        ';
    }
    ?>

					<div class="no-results" id="no-results" style="display: none">
						<span class="is-collected">
								<?php
                                if(WoW_Characters::GetCollectedMountsCount() > 0) {
                                    echo WoW_Locale::GetString('template_no_results');
                                }
                                else {
                                    echo WoW_Locale::GetString('template_companion_no_' . WoW_Template::GetPageData('category'));
                                }
                                ?>
						</span>

						<span class="not-collected" style="display: none">
								<?php echo WoW_Locale::GetString('template_no_results'); ?>
						</span>
					</div>

	<span class="clear"><!-- --></span>
				</div>
	<div class="table-options data-options table-bottom">
			<div class="option">
		<ul class="ui-pagination"></ul>
			</div>
			<?php echo sprintf(WoW_Locale::GetString('template_guild_roster_results_count'), 1, 24, WoW_Characters::GetCollectedMountsCount()); ?>

	<span class="clear"><!-- --></span>
	</div>
			</div>
	<div id="model-popup" class="model-popup" style="display: none">
	<div class="model-viewer">
			<div class="model " id="model-cm">
				
				<div class="loading">
					<div class="viewer" style="background-image: url('');"></div>
				</div>

				<a href="javascript:;" class="zoom"></a>
				<a href="javascript:;" class="rotate"></a>
			</div>


	</div>

		<div class="details"></div>

	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Companion.modelViewer = new ModelRotator("#model-cm", {
					zoom: false,
					rotate: false,
					dragCallback: Companion.dragCallback
				});
			});
	//]]>
	</script>
	</div>
		</div>

	<script type="text/javascript">
	//<![CDATA[
			$(function() {
				Companion.renderPath = 'http://eu.media.blizzard.com/wow/renders/npcs/grid/creature{id}.jpg';
				Companion.itemPath = '<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/item/{id}'; 
				Companion.setData({
				    <?php
                    foreach($mounts as &$mount) {
                        echo sprintf('
                        %d: {name: "%s", icon: "%s", spellId: %d, qualityId: %d, npcId: %d, source: "%s"%s%s},',
                            $mount['spell'], $mount['name'], $mount['icon'], $mount['spell'], $mount['quality'], $mount['npc_id'],
                            str_replace(array('"', '/wow/' . WoW_Locale::GetLocale() . '/'), array('\"', WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale() . '/'), $mount['sourceText']),
                            $mount['item_id'] > 0 ? ', itemId: ' . $mount['item_id'] : null,
                            $mount['type'] == 1 ? ', type: ' . $mount['type'] : null
                        );
                    }
                    ?>
				});
				Companion.grid = new DataSet('#companions', {
					elementControls: '.data-options',
					elementRow: '.grid-item, .no-results',
					altRows: false,
					results: 24,
					totalResults: <?php echo (WoW_Characters::GetCollectedMountsCount() + WoW_Characters::GetNotCollectedMountsCount()); ?>,
					paging: true,
					cache: true,
					afterProcess: Companion.afterProcess
				});
				Companion.msg = {
	companion: '<?php echo WoW_Locale::GetString('template_companion_js_companion'); ?>',
	mount: '<?php echo WoW_Locale::GetString('template_companion_js_mount'); ?>',
	mountTypes: {
		'1': '<?php echo WoW_Locale::GetString('template_companion_js_mount_ground'); ?>',
		'2': '<?php echo WoW_Locale::GetString('template_companion_js_mount_flying'); ?>',
		'3': '<?php echo WoW_Locale::GetString('template_companion_js_mount_aquatic'); ?>'
	}
				};
			});
	//]]>
	</script>
	
		</div>

	<span class="clear"><!-- --></span>
	</div>

	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Profile.url = '<?php echo WoW_Characters::GetURL(); ?>companion';
		});

		var MsgProfile = {
			tooltip: {
				feature: {
					notYetAvailable: "<?php echo WoW_Locale::GetString('template_feature_not_available'); ?>"
				},
				vault: {
					character: "<?php echo WoW_Locale::GetString('template_vault_auth_required'); ?>",
					guild: "<?php echo WoW_Locale::GetString('template_vault_guild'); ?>"
				}
			}
		};
	//]]>
	</script>
</div>
</div>
</div>
