-- ----------------------------------------------
-- - Fix Error WoW_Forums::HandleForumCategories
-- ----------------------------------------------
UPDATE `wow_forum_category` SET `title_de`='Realms',`title_en`='Realms',`title_es`='Reinos',`title_fr`='Realms',`title_ru`='Realms' WHERE `cat_id`='39';
UPDATE `wow_forum_category` SET `title_de`='REALM',`title_en`='REALM',`title_es`='Nombre del Reino',`title_fr`='REALM',`title_ru`='REALM',`icon`='reino.gif' WHERE `cat_id`='40';
UPDATE `wow_forum_category` SET `title_de`='REALM 2',`title_en`='REALM 2',`title_es`='Nombre del Reino 2',`title_fr`='REALM 2',`title_ru`='REALM 2',`icon`='reino.gif' WHERE `cat_id`='41';
INSERT INTO `wow_forum_category`(`cat_id`,`header`,`parent_cat`,`short`,`realm_cat`,`gmlevel`,`title_de`,`title_en`,`title_es`,`title_fr`,`title_ru`,`desc_de`,`desc_en`,`desc_es`,`desc_fr`,`desc_ru`,`icon`) VALUES ( '42','0','38','1','0','0','REALM 3','REALM 3','Reino 3','REALM 3','REALM 3','','','','','','reino.gif');
UPDATE `wow_forum_category` SET `header`='1',`parent_cat`='-1',`short`='0',`realm_cat`='0' WHERE `cat_id`='39';
UPDATE `battle`.`wow_forum_category` SET `parent_cat`='39' WHERE `cat_id`='40';
UPDATE `battle`.`wow_forum_category` SET `parent_cat`='39' WHERE `cat_id`='41';
UPDATE `battle`.`wow_forum_category` SET `parent_cat`='39' WHERE `cat_id`='42';
UPDATE `battle`.`wow_forum_category` SET `short`='0' WHERE `cat_id`='40';
UPDATE `battle`.`wow_forum_category` SET `short`='0' WHERE `cat_id`='41';
UPDATE `battle`.`wow_forum_category` SET `short`='0' WHERE `cat_id`='42';
UPDATE `battle`.`wow_forum_category` SET `short`='1' WHERE `cat_id`='39';

UPDATE `wow_forum_category` SET `title_de`='Battlegrounds and World PvP',`title_es`='Campos de batalla',`title_fr`='Battlegrounds and World PvP' WHERE `cat_id`='24';
