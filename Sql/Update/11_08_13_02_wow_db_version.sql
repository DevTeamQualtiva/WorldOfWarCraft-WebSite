ALTER TABLE `wow_db_version`
    ADD COLUMN `Web` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci DEFAULT 'Battle.net' NOT NULL COMMENT 'Web tipo Battle.net' AFTER `prev_name`;

