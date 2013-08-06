<?php
$boss = WoW_Game::GetBoss();
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
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/ru/game/" rel="np">
Игра
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/ru/zone/" rel="np">
Подземелья и рейды
</a>
</li>
<li>
<a href="<?php echo WoW::GetWoWPath(); ?>/wow/ru/zone/#expansion=3&amp;type=dungeons" rel="np">
Cataclysm
</a>
</li>
<li>
<a href="/wow/ru/zone/the-vortex-pinnacle/" rel="np">
Вершина Смерча
</a>
</li>
<li class="last">
<a href="/wow/ru/zone/the-vortex-pinnacle/asaad" rel="np">
Асаад
</a>
</li> 
</ol>-->
</div>
<div class="content-bot">
	
	<div id="wiki" class="wiki wiki-boss">
		<div class="sidebar">



	<div class="snippet">

	<div class="model-viewer">
			<div class="model "	id="model-<?php echo $boss['id']; ?>">
				
				<div class="loading">
					<div class="viewer" style="background-image: url('http://eu.media.blizzard.com/wow/renders/npcs/rotate/creature<?php echo $boss['id']; ?>.jpg');"></div>
				</div>

				<a href="javascript:;" class="zoom"></a>
				<a href="javascript:;" class="rotate"></a>
			</div>


        <script type="text/javascript">
        //<![CDATA[
				$(function() {
					Npc.models = {
						"<?php echo $boss['id']; ?>": new ModelRotator("#model-<?php echo $boss['id']; ?>")
					};
				});
        //]]>
        </script>
	</div>
	</div>
		
	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_item_quick_facts'); ?></h3>

		<ul class="fact-list">

			<li>
				<span class="term"><?php echo WoW_Locale::GetString('template_boss_level'); ?>:</span>
					<?php
                    echo $boss['level'] . ' ';
                    if($boss['flags'] & BOSS_FLAG_BOSS_RANK) {
                        echo WoW_Locale::GetString('template_boss_boss_rank');
                    }
                    else {
                        echo WoW_Locale::GetString('template_boss_elite_rank');
                    }
                    if($boss['flags'] & BOSS_FLAG_EXTRA_LEVEL) {
                        echo ' (<span class="color-yellow">' . ($boss['level'] + 3) . '</span> ' . WoW_Locale::GetString('template_item_heroic') . ')';
                    }
                    ?>
			</li>

			<li>
				<span class="term"><?php echo WoW_Locale::GetString('template_boss_health'); ?>:</span>
					<?php
                    if($boss['health_n'] > 999999) {
                        $letter = 'M'; // Latin "M"
                    }
                    else {
                        $letter = 'T'; // Latin "T"
                    }
                    echo substr($boss['health_n'], 0, 1) . ',' . substr($boss['health_n'], 1, 1) . $letter;
                    if ($boss['health_h'] > 0) {
                        echo ' (<span class="color-yellow">' . substr($boss['health_h'], 0, 1) . ',' . substr($boss['health_h'], 1, 1) . $letter . '</span> ' . WoW_Locale::GetString('template_item_heroic') . ')';
                    }
                    ?>
						
			</li>

				<li>
					<span class="term"><?php echo WoW_Locale::GetString('template_boss_type'); ?>:</span>
						<?php echo WoW_Locale::GetString('template_boss_type_' . $boss['type']); ?>
				</li>

			<li>
				<span class="term"><?php echo WoW_Locale::GetString('template_zone_location'); ?></span>
						<a href="<?php echo WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale(); ?>/zone/<?php echo $boss['zone_key']; ?>/" data-zone="<?php echo $boss['instance_id']; ?>"><?php echo $boss['zoneName']; ?></a>
			</li>



		</ul>
	</div>

	<div class="snippet">
			<h3><?php echo WoW_Locale::GetString('template_zone_fansites'); ?></h3>

		<span id="fansite-links"></span>
        <script type="text/javascript">
        //<![CDATA[
			$(function() {
				Fansite.generate('#fansite-links', "npc|<?php echo $boss['id']; ?>|<?php echo $boss['name']; ?>");
			});
        //]]>
        </script>
	</div>
		</div>

		<div class="info">

		<div class="title">

			<span class="parent">
				<a href="<?php echo WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale(); ?>/zone/<?php echo $boss['zone_key']; ?>/" data-zone="<?php echo $boss['instance_id']; ?>"><?php echo $boss['zoneName']; ?></a>
			</span>

			<h2>
				<?php echo $boss['name']; ?>
			</h2>
			
				<?php echo $boss['subName'] != null ? '<span class="boss-title">' . $boss['subName'] . '</span>' : null; ?>
		</div>

		<p class="intro">
			<?php echo $boss['description']; ?>
		</p>


		<div class="panel">
			<div class="panel-title"><?php echo WoW_Locale::GetString('template_boss_abilities'); ?></div>

			<div class="abilities" id="abilities">
            <?php
            echo '<ul id="ability-' . $boss['id'] . '">';
            if($boss['abilities']) {
                foreach($boss['abilities'] as $ability) {
                    echo '<li>
                        <span  class="icon-frame frame-36 " style=\'background-image: url("http://eu.media.blizzard.com/wow/icons/36/' . $ability['icon'] . '.jpg");\'> </span>
                        <strong>' . $ability['name'] . '</strong><br />' . $ability['description'] . '
                    </li>';
                }
            }
            else {
                echo '<li class="no-spells">' . WoW_Locale::GetString('template_boss_no_abilities') . '</li>';
            }
            echo '</ul>';
            ?>
			</div>
		</div>



        <script type="text/javascript">
        //<![CDATA[
				$(function() {
					Npc.total = 1;
					Npc.npcs = {
						"<?php echo $boss['id']; ?>": {
							"id": <?php echo $boss['id']; ?>,
							
							"name": "<?php echo $boss['name']; ?>",
							"slug": "<?php echo $boss['key']; ?>"
						}
					};
				});
        //]]>
        </script>

		</div>

	<span class="clear"><!-- --></span>


			<div class="related">
				<div class="tabs ">
					<ul id="related-tabs">
								<li>
									<a href="#loot" data-key="loot" id="tab-loot">
										<span><span>
												<?php echo WoW_Locale::GetString('template_source_drop'); ?>
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#quests" data-key="quests" id="tab-quests">
										<span><span>
												<?php echo WoW_Locale::GetString('template_source_quest'); ?>
												(<em>0</em>)
										</span></span>
									</a>
								</li>
								<li>
									<a href="#comments" data-key="comments" id="tab-comments">
										<span><span>
												<?php echo WoW_Locale::GetString('template_blog_comments'); ?>
												(<em>0</em>)
										</span></span>
									</a>
								</li>
					</ul>

	<span class="clear"><!-- --></span>
				</div>

				<div id="related-content" class="loading">
				</div>
			</div>

        <script type="text/javascript">
        //<![CDATA[
				$(function() {
					Wiki.pageUrl = '<?php echo WoW::GetWoWPath() . '/wow/' . WoW_Locale::GetLocale(); ?>/zone/<?php echo $boss['zone_key'] . '/' . $boss['key']; ?>/';
				});
        //]]>
        </script>
	</div>
</div>
</div>
</div>
