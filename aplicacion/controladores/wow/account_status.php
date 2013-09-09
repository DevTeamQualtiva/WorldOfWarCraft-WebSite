<?php

/**
 * Copyright (C) 2011 - 2013 Apocalypsecore <https://apocalypsecore.tk>
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

class Account_status extends Controller {
    public function main() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::SetPageIndex('account_status');
        WoW_Template::SetPageData('page', 'account_status');
        if(!WoW_Account::IsLoggedIn()) {
            WoW_Template::SetPageData('account-status', 'no_session');
        }
        elseif(WoW_Account::IsBanned()) {
            WoW_Template::SetPageData('account-status', 'no_subscribe');
        }
        else {
            WoW_Template::SetPageData('account-status', 'success');
        }
        WoW_Template::LoadTemplate('page_index');
    }
}
?>