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

class Account extends Controller {
    public function main() {
        $url_data = WoW::GetUrlData('management');
        if(!is_array($url_data) || !isset($url_data['action1'])) {
            header('Location: ' . WoW::GetWoWPath() . '/account/management/');
            exit;
        }
        if($url_data['action1'] == 'creation') {
            include(CONTROLLERS_DIR . 'account' . DS . 'creation.php');
            $controller = new Creation($this->m_actions, 'account');
            $controller->main();
            exit;
        }
        if(!WoW_Account::IsLoggedIn()) {
            if($url_data['action1'] == 'support') {
                WoW_Template::SetTemplateTheme('account');
                switch($url_data['action2']) {
                    default:
                    case 'password-reset.html':
                        WoW_Template::SetPageIndex('password_reset');
                        WoW_Template::SetPageData('page', 'password_reset');  
                        break;
                    case 'password-reset-select.html':
                        if(isset($_POST['csrftoken'])) {
                            $user_data = array(
                                'email' => $_POST['email'],
                                'username' => $_POST['firstName']
                            );
                            WoW_Account::DropLastErrorCode();
                            if(WoW_Account::RecoverPasswordSelect($user_data)) {
                                $_SESSION['wow_password_recovery'] = WoW_Account::GetRecoverPasswordData();
                                WoW_Template::SetPageIndex('password_reset_select');
                                WoW_Template::SetPageData('page', 'password_reset_select');
                            }
                            else {
                                WoW_Account::SetLastErrorCode(ERORR_INVALID_PASSWORD_RECOVERY_COMBINATION);
                                WoW_Template::SetPageIndex('password_reset');
                                WoW_Template::SetPageData('page', 'password_reset');
                            }
                        }
                        break;
                    case 'password-reset-secred-answer.html':
                        WoW_Account::SetRecoverPasswordData($_SESSION['wow_password_recovery']);
                        if(isset($_POST['verificationMethod']) && $_POST['verificationMethod'] == 'SECURITY_QUESTION') {
                            WoW_Template::SetPageIndex('password_reset_secred_answer');
                            WoW_Template::SetPageData('page', 'password_reset_secred_answer');
                        }
                        else {
                            WoW_Template::SetPageIndex('password_reset_select');
                            WoW_Template::SetPageData('page', 'password_reset_select');
                        }
                        break;
                    case 'password-reset-success.html':
                        WoW_Account::SetRecoverPasswordData($_SESSION['wow_password_recovery']);
                        if(isset($_POST['secretAnswer'])) {
                            WoW_Account::DropLastErrorCode();
                            if(WoW_Account::RecoverPasswordSuccess($_POST['secretAnswer'])) {
                                WoW_Template::SetPageIndex('password_reset_success');
                                WoW_Template::SetPageData('page', 'password_reset_success');
                            }
                            else {
                                WoW_Account::SetLastErrorCode(ERORR_INVALID_PASSWORD_RECOVERY_ANSWER);
                                WoW_Template::SetPageIndex('password_reset_secred_answer');
                                WoW_Template::SetPageData('page', 'password_reset_secred_answer');
                            }
                        }
                        break;
                    case 'password-reset-confirm.xml':
                        if(isset($_POST['email']) && isset($_POST['ticket'])) {
                            $data = array(
                                'newPassword' => $_POST['newPassword'],
                                'reNewPassword' => $_POST['reNewPassword']
                            );
                            
                            WoW_Account::DropLastErrorCode();
                            if($data['newPassword'] != $data['reNewPassword']) {
                                WoW_Account::SetLastErrorCode(ERORR_NEW_PASSWORD_NOT_MATCH);
                                WoW_Template::SetPageIndex('password_reset_confirm');
                                WoW_Template::SetPageData('page', 'password_reset_confirm');
                            }
                            elseif(WoW_Account::RecoverPasswordChange($data['newPassword'])) {
                                WoW_Template::SetPageIndex('password_reset_changed');
                                WoW_Template::SetPageData('page', 'password_reset_confirm');
                            }
                            else {
                                WoW_Account::SetLastErrorCode(ERORR_NEW_PASSWORD_FAIL);
                                WoW_Template::SetPageIndex('password_reset_confirm');
                                WoW_Template::SetPageData('page', 'password_reset_confirm');
                            }
                        }
                        break;
                }
                if(preg_match('/password-reset-confirm.xml\?ticket=([a-z0-9A-Z]{32})$/i', $url_data['action2'], $matches)) {
                    if(WoW_Account::validTicket($matches[1])) {
                        WoW_Template::SetPageIndex('password_reset_confirm');
                        WoW_Template::SetPageData('page', 'password_reset_confirm');
                    }
                }
                WoW_Template::LoadTemplate('support_index');
                exit;
            }
            else {
                header('Location: ' . WoW::GetWoWPath() . '/login/');
                exit;
            }
        }
        WoW_Template::SetTemplateTheme('account');
        WoW_Account::UserGames();
        WoW_Template::SetPageIndex('management');
        WoW_Template::SetMenuIndex('management');
        WoW_Template::SetPageData('page', 'management');

        if($url_data['action2'] == 'wow' && preg_match('/dashboard.html/i', $url_data['action3'])) {
            WoW_Account::InitializeAccount($_GET['accountName']);
            WoW_Template::SetPageIndex('dashboard');
            WoW_Template::SetMenuIndex('games');
            WoW_Template::SetPageData('page', 'dashboard');
            WoW_Template::LoadTemplate('page_index');
        }
        elseif($url_data['action2'] == 'wow-account-conversion.html') {
            WoW_Template::SetPageData('conversion_page', 1);
            if(isset($_POST['targetpage'])) {
                switch($_POST['targetpage']) {
                    case '2':
                        if(isset($_POST['username']) && isset($_POST['password'])) {
                            if(WoW_Account::PerformConversionStep(1, array('username' => $_POST['username'], 'password' => $_POST['password']))) {
                                WoW_Template::SetPageData('conversion_page', 2);
                            }
                            else {
                                WoW_Template::SetPageData('conversion_page', 1);
                            }
                        }
                        else {
                            WoW_Template::SetPageData('conversion_page', 1);
                        }
                        break;
                    case '3':
                        WoW_Template::SetPageData('conversion_page', 3);
                        break;
                    case 'finish':
                        if(!WoW_Account::PerformConversionStep(3)) {
                            WoW_Template::SetPageData('conversion_page', 2);
                        }
                        break;
                    default:
                        break;
                }
            }
            WoW_Template::SetPageIndex('account_conversion');
            Wow_Template::SetMenuIndex('games');
            WoW_Template::SetPageData('page', 'account_conversion');
            WoW_Template::LoadTemplate('page_index');
        }
		WoW_Template::LoadTemplate('page_index');
    }
}
?>
