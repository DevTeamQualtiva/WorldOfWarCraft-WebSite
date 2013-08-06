-- Fix al error de locales wow instance data
ALTER TABLE `wow_instance_data`     
    CHANGE `name_fr` `name_es` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
    CHANGE `name_es` `name_fr` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;
     