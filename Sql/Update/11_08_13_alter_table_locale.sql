ALTER TABLE `wow_race_abilities`
    ADD COLUMN `title_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `race`,
    ADD COLUMN `title_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title_en`,
    ADD COLUMN `title_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title_es`,
    ADD COLUMN `text_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title_ru`,
    ADD COLUMN `text_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `text_en`,
    ADD COLUMN `text_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `text_es`,
    CHANGE `title_en` `title_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,     
    CHANGE `text_en` `text_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `wow_classes`
    ADD COLUMN `story_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `id`,
	ADD COLUMN `story_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `story_en`,
	ADD COLUMN `story_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `story_es`,
	ADD COLUMN `info_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `story_ru`,
	ADD COLUMN `info_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `info_en`,
	ADD COLUMN `info_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `info_es`,
	CHANGE `story_en` `story_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	CHANGE `info_en` `info_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `wow_glyphproperties`
    ADD COLUMN `name_de` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `type`,
	ADD COLUMN `name_es` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `name_en`,
	ADD COLUMN `name_fr` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `name_es`,
	ADD COLUMN `description_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `name_ru`,
	ADD COLUMN `description_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `description_en`,
	ADD COLUMN `description_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `description_es`,
	CHANGE `name_en` `name_en` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
	CHANGE `description_en` `description_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;

ALTER TABLE `wow_mounts`
    ADD COLUMN `name_de` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `type`,
	ADD COLUMN `name_es` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `name_en`,
	ADD COLUMN `name_fr` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `name_es`,
	ADD COLUMN `source_de` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `source`,
	ADD COLUMN `source_es` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `source_en`,
	ADD COLUMN `source_fr` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `source_es`,
	CHANGE `name_en` `name_en` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	CHANGE `source_en` `source_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
	