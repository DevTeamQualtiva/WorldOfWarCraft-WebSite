-- -----------------------------------------------------
-- Reservada Para la Clase "Monk" para la expansion MOP
-- -----------------------------------------------------
UPDATE `wow_class_abilities` SET `id`='41' WHERE `id`='37';
UPDATE `wow_class_abilities` SET `id`='42' WHERE `id`='38';
UPDATE `wow_class_abilities` SET `id`='43' WHERE `id`='39';
UPDATE `wow_class_abilities` SET `id`='44' WHERE `id`='40';

-- -------------------------------------------------------
-- habilidades Para la Clase "Monk" Necesita su escritura
-- -------------------------------------------------------
INSERT INTO `wow_class_abilities`(`id`,`class`,`title_de`,`title_en`,`title_es`,`title_fr`,`title_ru`,`text_de`,`text_en`,`text_es`,`text_fr`,`text_ru`,`icon`) VALUES
( '37','10','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK'),
( '38','10','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK'),
( '39','10','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK'),
( '40','10','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK','MONK');
