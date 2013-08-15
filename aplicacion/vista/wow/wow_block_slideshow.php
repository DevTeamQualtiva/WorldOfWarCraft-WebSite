<!-- START: Slideshow -->
<div id="slideshow">
        <div class="container">
<?php
$carousel = WoW_Template::GetPageData('carousel');
$i = 0;
$paging_text = null;
$js_string = null;
if(is_array($carousel)) {
    foreach($carousel as $carousel_item) {
        echo sprintf('<div class="slide" id="slide-%d" style="background-image: url(\'%s/cms/carousel_header/%s\');%s">
                    </div>', $i, WoW::GetWoWPath(), $carousel_item->image, $i > 0 ? ' display: none;' : null);
        $paging_text .= sprintf('<a href="javascript:;" id="paging-%d" onclick="Slideshow.jump(%d, this);" onmouseover="Slideshow.preview(%d);"%s></a>', $i, $i, $i, $i == 0 ? ' class="current"' : null);
        $js_string .= sprintf('{
                        image: "%s/cms/carousel_header/%s",
                        desc: "%s",
                        title: "%s",
                        url: "%s",
                        id: "%d"
                    },', WoW::GetWoWPath(), $carousel_item->image, $carousel_item->desc, $carousel_item->title, $carousel_item->url, $carousel_item->id);
        $i++;
    }
}
?>
		</div>
			<div class="paging"><?php echo $paging_text; ?></div>
		<div class="caption">
            <?php
            if(is_array($carousel)) {
                echo sprintf('<h3><a href="#" class="link">%s</a></h3>%s', $carousel[0]->title, $carousel[0]->desc);
            }
            ?>
		</div>
		<div class="preview"></div>
		<div class="mask"></div>
    </div>

	<script type="text/javascript">
	//<![CDATA[
        $(function() {
            Slideshow.initialize('#slideshow', [
<?php echo $js_string; ?>
            ]);

        });
	//]]>
	</script>
<!-- END: Slideshow -->
