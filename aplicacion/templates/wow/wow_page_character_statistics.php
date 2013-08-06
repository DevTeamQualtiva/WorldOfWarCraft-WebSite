<div xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="group">
<?php
$categoryID = WoW_Achievements::GetCategoryForTemplate();
if(!$categoryID) {
    WoW_Log::WriteError('Statistics : categoryID is not defined!');
    exit;
}
$categoryInfo = WoW_Achievements::GetCategoryInfoFromDB($categoryID);
if(!$categoryInfo) {
    WoW_Log::WriteError('Statistics : categoryInfo for categoryID %d was not found!', $categoryID);
    exit;
}

?>
	<ul>
	<li id="cat-<?php echo $categoryID; ?>" class="table">
		<a name="s<?php echo $categoryID; ?>"></a>
	<h4><?php echo $categoryInfo['name']; ?></h4>
    <?php
    $statistics = WoW_Achievements::StatisticCategory($categoryID);
    if(is_array($statistics)) {
        $toggleStyle = 1;
        foreach($statistics as $stat) {
            echo sprintf('<dl%s><dt>%s</dt><dd>%s</dd></dl>', $toggleStyle % 2 ? ' class="odd"' : null, $stat['name'], $stat['quantity']);
            ++$toggleStyle;
        }
    }
    ?>
	</li>
	</ul>
</div>