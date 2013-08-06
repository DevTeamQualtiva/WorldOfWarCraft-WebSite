<?php

/**
 * Copyright (C) 2013 Asfo <https://github.com/Asfo>
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

class Services extends Controller {

	public function main() {
		WoW_Template::SetPageData('body_class', sprintf('%s  services-home', WoW_Locale::GetLocale(LOCALE_DOUBLE)));
		WoW_Template::SetTemplateTheme('wow');
		$url_data = WoW::GetUrlData('services');
		if(empty($url_data['action1'])) {
            WoW_Template::SetPageIndex('services');
            WoW_Template::SetPageData('page', 'services');
        }else{
			WoW_Template::ErrorPage(404);
		}
		WoW_Template::SetMenuIndex('menu-services');
		WoW_Template::LoadTemplate('page_index');
	}
}