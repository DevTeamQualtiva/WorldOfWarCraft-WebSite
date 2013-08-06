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

class WoW_Paginator
{
    private static $_current_page = 1;
    private static $_total_results = 1;
    private static $_per_page = 10;
    private static $total_pages = 0;
    private static $_padding_l = 1;
    private static $_padding_r = 1;
    private static $link_prefix = '?page=';
    private static $link_suffix = '';
    private static $tpl_first = '';
    private static $tpl_last = '';
    private static $separator = '';
    private static $tpl_prev = '';
    private static $tpl_next = '';
    private static $tpl_page_nums = '';
    private static $tpl_cur_page_num = '';
    private static $_output = '';
    private static $outside_template = '';
    private static $_data = NULL;
 
    public static function Initialize($page, $totalResults, $perPage, $template = false, $data = NULL)
    {
        self::$_data = $data;
        self::LoadTemplate($template);
        if($page > 0 || $page == NULL) {
            self::$_current_page = $page;
            self::$_total_results = $totalResults;
            self::$_per_page = $perPage;
            
            return self::paginate();
        }
        else {
            return false;
        }
    }
    
    private static function LoadTemplate($template) {
        switch($template) {
            case 'mini':
              if(is_array(self::$_data)){
                  $thread_id = self::$_data['thread_id'];
              }
              self::$tpl_first = NULL;
              self::$tpl_last = NULL;
              self::$separator = NULL;
              self::$tpl_prev = NULL;
              self::$tpl_next = NULL;
              self::$separator = ', ';
              self::$tpl_page_nums = '<a href="../topic/'.$thread_id.'{link}">{page}</a>';
              break;
            case 'blizztracker':
            case 'forum':
            default:
              self::$link_prefix = '?page=';
              self::$link_suffix = '';
              self::$tpl_first = ' <a href="{link}">{page}</a> … ';
              self::$tpl_last = ' … <a href="{link}">{page}</a> ';
              self::$separator = ' <div class="page-sep"></div> ';
              self::$tpl_prev = ' <a href="{link}">&lt; Prev</a> ';
              self::$tpl_next = ' <a href="{link}">Next &gt;</a> ';
              self::$tpl_page_nums = ' <a href="{link}">{page}</a> ';
              self::$tpl_cur_page_num = ' <span class="active">{page}</span> ';
              self::$outside_template = '<div class="pageNav">%s</div>';
              break;
        }
    }
 
    public static function paginate()
    {
        $output = '';
        self::$total_pages = ceil(self::$_total_results / self::$_per_page);

        if(self::$total_pages <= 1)
        {
        	return false;
        }

        if(self::$_current_page > self::$total_pages)
            self::$_current_page = self::$total_pages;

        if(self::$total_pages <= 5) {
            self::$_padding_l = self::$_current_page;
            self::$_padding_r = self::$total_pages - self::$_current_page;
            self::$tpl_last = NULL;
            self::$tpl_first = NULL;
        }
        elseif(self::$total_pages > 5){
            if(self::$_current_page < 4){
                self::$tpl_first = NULL;
                self::$_padding_r = 4 - self::$_current_page;
                $remain = self::$total_pages - self::$_current_page;
                self::$_padding_l = ($remain == 2 ? 1 : ($remain == 0 ? 3 : 2));
            }
            else{
                if(self::$total_pages - self::$_current_page > 2){
                    self::$_padding_l = 1;
                }
                else{
                    $remain = self::$total_pages - self::$_current_page;
                    self::$_padding_l = ($remain == 2 ? 1 : ($remain == 0 ? 3 : 2));
                }
                self::$_padding_r = (self::$total_pages - self::$_current_page > 2) ? 1 : self::$total_pages - self::$_current_page;
                if(self::$_current_page + 2 >= self::$total_pages){
                    self::$tpl_last = NULL;
                }
            }
        }
        
        $start = self::$_current_page - self::$_padding_l < 1 ? 1 : self::$_current_page - self::$_padding_l;
        $finish = self::$_current_page + self::$_padding_r;
        
        ##########################################
        # ADD PREV TO OUTPUT IF CURRENT PAGE > 1 #
        ##########################################
        if(self::$_current_page > 1 && self::$tpl_prev != NULL) {
            $output .= preg_replace('/\{link\}/i', self::$link_prefix . (self::$_current_page - 1) . self::$link_suffix, self::$tpl_prev);
        }
        
        ###########################################
        # ADD FIRST TO OUTPUT IF CURRENT PAGE > 1 #
        ###########################################
        if(self::$_current_page > 1 && self::$tpl_first != NULL) {
            $patterns = array('/\{link\}/i', '/\{page\}/i');
            $replaces = array(self::$link_prefix . '1' . self::$link_suffix, '1');
            $output .= preg_replace($patterns, $replaces, self::$tpl_first);
        }
 
        ################################################
        # GET LIST OF LINKED NUMBERS AND ADD TO OUTPUT #
        ################################################
        $nums = array();
        for($i = $start; $i <= $finish; $i++) {
            if ($i == self::$_current_page) {
                $nums[] = preg_replace('/\{page\}/i', $i, self::$tpl_cur_page_num);
            } else {
                $patterns = array('/\{link\}/i', '/\{page\}/i');
                $replaces = array(self::$link_prefix . $i . self::$link_suffix, $i);
                $nums[] = preg_replace($patterns, $replaces, self::$tpl_page_nums);
            }
        }
        $output .= implode(self::$separator, $nums);
 
        ############################################
        # ADD LAST TO OUTPUT IF FINISH < MAX PAGES #
        ############################################
        if (self::$_current_page < $finish && self::$tpl_last != NULL) {
            $patterns = array('/\{link\}/i', '/\{page\}/i');
            $replaces = array(self::$link_prefix . self::$total_pages . self::$link_suffix, self::$total_pages);
            $output .= preg_replace($patterns, $replaces, self::$tpl_last);
        }
        
        ##################################################
        # ADD NEXT TO OUTPUT IF CURRENT PAGE < MAX PAGES #
        ##################################################
        if (self::$_current_page < self::$total_pages && self::$tpl_next != NULL) {
            $output .= preg_replace('/\{link\}/i', self::$link_prefix . (self::$_current_page + 1) . self::$link_suffix, self::$tpl_next);
        }
 
        return self::$_output = sprintf(self::$outside_template, $output);
    }
}
?>
