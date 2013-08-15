<div class="post-user-details ">
          <h4><?php echo WoW_Locale::GetString('template_forum_reply_thread'); ?></h4>
          <div class="post-user ajax-update">
<?php
$character = WoW_Account::GetActiveCharacter();

$character_url = sprintf('%s/wow/%s/character/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $character['realmName'], $character['name']);
$character_search_url = sprintf('%s/wow/search?f=post&amp;a=%s&amp;sort=time', WoW::GetWoWPath(), $character['name']);
$guild_url = sprintf('%s/wow/%s/guild/%s/%s/', WoW::GetWoWPath(), WoW_Locale::GetLocale(), $character['realmName'], $character['guildName']);
$character_links = sprintf('<a href="%s" title="%s" rel="np" class="icon-posts link-first link-last">%s</a>', $character_search_url, WoW_Locale::GetString('template_blog_lookup_forum_messages'), WoW_Locale::GetString('template_blog_lookup_forum_messages'));
$character_description = sprintf('<div class="character-desc"><span>%s</span></div>
                                  <div class="guild"><a href="%s">%s</a></div>
                                  <div class="achievements">--</div>',
                                  $character['level'].' '.$character['race_text'].' '.$character['class_text'], $guild_url, $character['guildName']);

$realms = WoW::GetRealmStatus($character['realmId']);
?>
            <div class="avatar">
              <div class="avatar-interior">
                <a href="<?php echo $character_url; ?>">
                  <img height="84" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/2d/avatar/<?php echo $character['race']; ?>-<?php echo $character['gender']; ?>.jpg" alt="" /></a>
              </div>
            </div>
            <div class="character-info">
              <div class="user-name">
                <span class="char-name-code" style="display: none"><?php echo $character['name']; ?></span>
                <div id="context-5" class="ui-context character-select" style="display: none; ">
                  <div class="context">
                    <a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
                    <div class="context-user">
                      <strong><?php echo $character['name']; ?></strong><br />
                      <span class="realm <?php echo $realms[0]['status']; ?>"><?php echo $realms[0]['name']; ?></span>
                    </div> 
                    <div class="context-links">
                      <a href="<?php echo $character_url; ?>" title="<?php echo WoW_Locale::GetString('template_profile_caption'); ?>" rel="np" class="icon-profile link-first"><?php echo WoW_Locale::GetString('template_profile_caption'); ?></a>
                      <a href="<?php echo $character_search_url; ?>" title="<?php echo WoW_Locale::GetString('template_my_forum_posts_caption'); ?>" rel="np" class="icon-posts"> </a>
                      <a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/vault/character/auction/horde/" title="<?php echo WoW_Locale::GetString('template_browse_auction_caption'); ?>" rel="np" class="icon-auctions"> </a>
                      <a href="<?php echo WoW::GetWoWPath(); ?>/wow/<?php echo WoW_Locale::GetLocale(); ?>/vault/character/event" title="<?php echo WoW_Locale::GetString('template_browse_events_caption'); ?>" rel="np" class="icon-events link-last"> </a>
                    </div>
                  </div>
                  <div class="character-list">
                    <div class="primary chars-pane">
                      <div class="char-wrapper">
<?php
echo sprintf('<a href="javascript:;"
class="char pinned"
rel="np">
<span class="pin"></span>
<span class="name">%s</span>
<span class="class color-c%d">%d %s %s</span>
<span class="realm">%s</span>
</a>', WoW_Account::GetActiveCharacterInfo('name'), WoW_Account::GetActiveCharacterInfo('class'), WoW_Account::GetActiveCharacterInfo('level'), WoW_Account::GetActiveCharacterInfo('race_text'), WoW_Account::GetActiveCharacterInfo('class_text'), WoW_Account::GetActiveCharacterInfo('realmName'));

$all_characters = WoW_Account::GetCharactersData();
if(is_array($all_characters)) {
    foreach($all_characters as $char) {
        if($char['guid'] == WoW_Account::GetActiveCharacterInfo('guid') && $char['realmId'] == WoW_Account::GetActiveCharacterInfo('realmId')) {
            continue; // Skip active character
        }
        echo sprintf('<a href="%s" onclick="CharSelect.pin(%d, this); return false;" class="char "rel="np"><span class="pin"></span><span class="name">%s</span><span class="class color-c%d">%d %s %s</span><span class="realm">%s</span></a>', $char['url'], $char['index'], $char['name'], $char['class'], $char['level'], $char['race_text'], $char['class_text'], $char['realmName']);
    }
}
?>
                      </div>
                    </div> 
                  </div>
                </div>
                <a href="<?php echo $character_url; ?>" class="context-link color-c<?php echo WoW_Account::GetActiveCharacterInfo('class'); ?>" rel="np"><?php echo WoW_Account::GetActiveCharacterInfo('name'); ?></a>
              </div> 
              <div class="userCharacter">
                <div class="character-desc">
                  <span><?php echo WoW_Account::GetActiveCharacterInfo('level').' '.WoW_Account::GetActiveCharacterInfo('race_text').' '.WoW_Account::GetActiveCharacterInfo('class_text'); ?></span>
                </div>
                <div class="guild">
                  <a href="<?php echo $guild_url; ?>"><?php echo $character['guildName']; ?></a>
                </div>
                <!--<div class="achievements">460</div>-->
              </div>
            </div>
          </div>
        </div>
        <div class="post-edit">
          <div id="post-errors">
          </div>
          <div class="talkback-controls">
            <a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'preview')" class="preview-btn">
              <span class="arr"></span>
              <span class="r"></span>
              <span class="c"><?php echo WoW_Locale::GetString('template_forum_preview'); ?></span>
            </a>
            <a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'edit')" class="edit-btn selected">
              <span class="arr"></span>
              <span class="r"></span>
              <span class="c"><?php echo WoW_Locale::GetString('template_forum_edit'); ?></span>
            </a>
          </div>  
          <div class="editor1" id="post-edit">
            <a id="editorMax" rel="5000"></a> 
<textarea id="detail" name="detail" class="post-editor" cols="78" rows="13"></textarea> 
<script type="text/javascript" src="<?php echo WoW::GetWoWPath(); ?>/wow/static/local-common/js/bml.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Wow.addBmlCommands();
BML.initialize('#post-edit', false);
});
//]]>
</script>
          </div> 
          <div class="post-detail" id="post-preview">
          </div> 
          <div class="talkback-btm">
            <table class="dynamic-center ">
              <tr>
                <td>
                  <div id="submitBtn"> 
                    <button class="ui-button button1 " type="submit">
                      <span>
                        <span><?php echo WoW_Locale::GetString('template_forum_submit'); ?></span>
                      </span>
                    </button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
