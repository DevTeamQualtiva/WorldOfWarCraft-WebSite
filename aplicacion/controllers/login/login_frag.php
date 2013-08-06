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

class Login_frag extends Controller {
    public function main() {
        WoW_Template::SetTemplateTheme('bn');
        WoW_Template::SetPageIndex('login_frag');
        if(isset($_POST['accountName'])) {
            $username = $_POST['accountName'];
            $password = $_POST['password'];
            $persistLogin = isset($_POST['persistLogin']) ? true : false;
            WoW_Account::DropLastErrorCode();
            if(mb_strlen($password) <= 7) {
                WoW_Account::SetLastErrorCode(ERORR_INVALID_PASSWORD_FORMAT);
            }
            if($username == null) {
                WoW_Account::SetLastErrorCode(ERROR_EMPTY_USERNAME);
            }
            if($password == null) {
                WoW_Account::SetLastErrorCode(ERROR_EMPTY_PASSWORD);
            }
            if(WoW_Account::PerformLogin($username, $password, $persistLogin)) {
                header('Location: ' . WoW::GetWoWPath() . '/login/login.frag');
                exit;
            }
            // Other error messages will appear automaticaly.
        }
        WoW_Template::LoadTemplate('page_login_frag');
    }
}

?>
