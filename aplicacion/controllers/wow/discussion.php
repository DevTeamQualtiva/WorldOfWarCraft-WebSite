<?php

/**
 * Copyright (C) 2011 Shadez <https://github.com/Shadez>
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

class Discussion extends Controller {
    public function main() {
        $url_data = WoW::GetUrlData('discussion');
        $blog_id = $url_data['blog_id'];
        if(!$blog_id || !WoW_Account::IsLoggedIn()) {
            if(isset($_GET['d_ref'])) {
                header('Location: ' . $_GET['d_ref']);
            }
            else {
                header('Location: ' . WoW::GetWoWPath() . '/');
            }
            exit;
        }
        $replyToGuid = 0;
        $replyToComment = 0;
        $postDetail = isset($_POST['detail']) ? $_POST['detail'] : null;
        if(isset($_POST['replyTo'])) {
            // have reply
            $reply = explode(':', $_POST['replyTo']);
            if(is_array($reply) && isset($reply[1])) {
                $replyToGuid = $reply[0];
                $replyToComment = $reply[1];
            }
        }
        if($postDetail != null) {
            DB::WoW()->query("INSERT INTO `DBPREFIX_blog_comments` (blog_id, account, character_guid, realm_id, postdate, comment_text, answer_to) VALUES (%d, %d, %d, %d, %d, '%s', %d)", $blog_id, WoW_Account::GetUserID(), WoW_Account::GetActiveCharacterInfo('guid'), WoW_Account::GetActiveCharacterInfo('realmId'), time(), $postDetail, $replyToComment);
        }
        if(isset($_GET['d_ref'])) {
            header('Location: ' . $_GET['d_ref']);
        }
        else {
            header('Location: ' . WoW::GetWoWPath() . '/');
        }
    }
}

?>