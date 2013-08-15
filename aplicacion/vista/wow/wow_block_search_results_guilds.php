<div id="left-results">
    <?php
    $searchResults = WoW_Search::GetSearchResults('wowguild');
    if(is_array($searchResults)) {
        foreach($searchResults as $guild) {
            echo sprintf('
    <div class="search-result">
        <div class="">
            <div class="result-title">
                <a href="%s/wow/%s/guild/%s/%s/" class="search-title">&lt;%s&gt;</a>
            </div>
            <div class="search-content">
                <div class="info">%s / %s</div>
            </div>
            <div class="search-results-url"> /wow/guild/%s/%s/</div>
        </div>
        <div class="clear"></div>
    </div>', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $guild['realmName'], $guild['name'], $guild['name'], $guild['realmName'], WoW_Locale::GetString(WoW_Utils::GetFactionId($guild['raceId']) == FACTION_ALLIANCE ? 'faction_alliance' : 'faction_horde'), $guild['realmName'], $guild['name']);
        }
    }
    ?>
</div>