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

class Blog extends Controller {
    public function main() {
        WoW_Template::SetTemplateTheme('wow');
        WoW_Template::SetPageData('body_class', WoW_Locale::GetLocale(LOCALE_DOUBLE));
        $url_data = WoW::GetUrlData('blog');
        $blog_id = $url_data['blog_id'];
        if(!$blog_id || !WoW::LoadBlog($blog_id)) {
            WoW_Template::ErrorPage(404);
        }
        else {
            WoW_Template::SetPageData('wow_news', WoW::GetLastNews());
            WoW_Template::SetPageData('blog_title', WoW::GetBlogData('title'));
            WoW_Template::SetPageData('overall_meta_title', WoW::GetBlogData('title'));
            WoW_Template::SetPageData('overall_meta_img', '/cms/blog_thumbnail/' . WoW::GetBlogData('image'));
            WoW_Template::SetPageIndex('blog');
            WoW_Template::SetPageData('page', 'blog');
        }
        WoW_Template::SetMenuIndex('menu-home');
        WoW_Template::LoadTemplate('page_index');
    }
}

?>