-- ----------
-- En Titulo
-- ----------
UPDATE `wow_forum_category` SET `title_en`='Technical Support' WHERE `cat_id`='8';
UPDATE `wow_forum_category` SET `title_en`='Service Status <strong>[Read Only]</strong>' WHERE `cat_id`='9';

-- --------
-- En desc
-- --------
UPDATE `wow_forum_category` SET `desc_en`='For problems installing or patching World of Warcraft, connecting to the realms or crashing during game play.' WHERE `cat_id`='8';

-- ------------
-- Esp Titulos
-- ------------
UPDATE `wow_forum_category` SET `title_es`='Servicio al cliente' WHERE `cat_id`='7';
UPDATE `wow_forum_category` SET `title_es`='Soporte técnico' WHERE `cat_id`='8';
UPDATE `wow_forum_category` SET `title_es`='Estatus del servicio <strong>[Sólo lectura]</strong>' WHERE `cat_id`='9';


-- ---------
-- Esp desc
-- ---------
UPDATE `wow_forum_category` SET `desc_es`='Si tienes problemas para instalar o actualizar World of Warcraft, conectarte a los reinos o si tu juego está \"crasheando\", entra aquí' WHERE `cat_id`='8';
UPDATE `wow_forum_category` SET `desc_es`='Foro moderado por Agentes de Soporte de Blizzard para hablar de asuntos de cuenta y dentro del juego.' WHERE `cat_id`='7';
UPDATE `wow_forum_category` SET `desc_es`='Lista de mensajes importantes con respecto al estatus del servicio, incluyendo problemas relacionados con los reinos.' WHERE `cat_id`='9';


-- --------
-- General
-- --------
UPDATE `wow_forum_category` SET `icon`='realm_status.gif' WHERE `cat_id`='9';
UPDATE `wow_forum_category` SET `icon`='general_1.gif' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `icon`='libro.gif' WHERE `cat_id`='12';
UPDATE `wow_forum_category` SET `icon`='roleplay.gif' WHERE `cat_id`='13';

UPDATE `wow_forum_category` SET `title_de`='Betriebsstatus <strong>[nur lesen]</strong>',`title_fr`='Etat du service <strong>[En lecture seulement]</strong>',`title_ru`='Состояние службы <strong>[только для чтения]</strong>' WHERE `cat_id`='9';

UPDATE `wow_forum_category` SET `title_de`='Allgemeine Diskussion',`title_en`='General Discussion',`title_es`='Foro General',`title_fr`='Discussion générale',`title_ru`='Общий раздел' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `desc_ru`='Обсудить World Of Warcraft.' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `desc_en`='Discuss World of Warcraft.' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `desc_es`='Habla de World of Warcraft.' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `desc_fr`='Discuter de World of Warcraft.' WHERE `cat_id`='10';
UPDATE `wow_forum_category` SET `desc_ru`='Обсудить World Of Warcraft.' WHERE `cat_id`='10';

UPDATE `wow_forum_category` SET `title_de`='Gildenrekrutierung',`title_en`='Guild Recruitment',`title_es`='Reclutamiento de hermandades',`title_fr`='recrutement de guilde',`title_ru`='Гильдии Набор' WHERE `cat_id`='11';
UPDATE `wow_forum_category` SET `desc_de`='Auf der Suche nach einer Gilde, oder willst du deine Gilde werben? Hereinspaziert!',`desc_en`='Searching for a guild, or do you want to advertise your guild? Come on in!',`desc_es`='¿Buscas hermandad o deseas promover la tuya? ¡Entra aquí!',`desc_fr`='Recherche d\'une guilde, ou voulez-vous faire de la publicité à votre guilde? Entrez!',`desc_ru`='Поиск гильдии, или вы хотите разместить рекламу Вашей гильдии? Приходите на!' WHERE `cat_id`='11';

UPDATE `wow_forum_category` SET `title_de`='Geschichte Forum',`title_en`='Story Forum ',`title_es`='Historia de Warcraft',`title_fr`='Forum Histoire',`title_ru`='Форум:' WHERE `cat_id`='12';
UPDATE `wow_forum_category` SET `desc_de`='Wir laden Sie zu der Warcraft-Universum und Storylines von Azeroth hier diskutieren.',`desc_en`='We invite you to discuss the Warcraft Universe and storylines of Azeroth here.',`desc_es`='Te invitamos a charlar acerca del universo de Warcraft y las historias de Azeroth',`desc_fr`='Nous vous invitons à discuter de l\'Univers et histoires d\'Azeroth Warcraft ici.',`desc_ru`='Мы приглашаем вас обсудить Вселенной Warcraft и сюжетных линий Азерота здесь.' WHERE `cat_id`='12';

UPDATE `wow_forum_category` SET `title_de`='Ende der Welt Tavern',`title_en`='World’s End Tavern',`title_es`='La taberna del fin del mundo',`title_fr`='La taverne de fin du monde',`title_ru`='Краю Света таверне',`desc_de`='Ziehen Sie einen Stuhl, trinken Sie ein Krug Bier, neue Freunde treffen, erzählen Geschichten und Rollenspiele in diesem Forum.',`desc_en`='Pull up a chair, drink a mug of ale, meet new friends, tell stories, and role-play in this forum.',`desc_es`='Acércate una silla, tómate un tarro de cerveza, haz nuevas amistades y cuenta tus historias',`desc_fr`='Prenez une chaise, boire une tasse de bière, rencontrer de nouveaux amis, raconter des histoires et des jeux de rôle dans ce forum.',`desc_ru`='Подтянуть стул, выпить кружку пива, встретить новых друзей, рассказывают истории, и ролевая игра в этом форуме.' WHERE `cat_id`='13';


UPDATE `wow_forum_category` SET `title_de`='Krieger',`title_es`='Guerrero',`title_fr`='Guerrier' WHERE `cat_id`='28';
UPDATE `wow_forum_category` SET `title_de`='Paladin',`title_es`='Paladin',`title_fr`='Paladin' WHERE `cat_id`='29';
UPDATE `wow_forum_category` SET `title_de`='Druide',`title_es`='Druida',`title_fr`='Druide' WHERE `cat_id`='30';
UPDATE `wow_forum_category` SET `title_de`='Schurke',`title_es`='Pícaro',`title_fr`='Voleur' WHERE `cat_id`='31';
UPDATE `wow_forum_category` SET `title_de`='Priester',`title_es`='Sacerdote',`title_fr`='Prêtre' WHERE `cat_id`='32';
UPDATE `wow_forum_category` SET `title_de`='Todesritter',`title_es`='Caballero de la muerte',`title_fr`='Chevalier de la mort' WHERE `cat_id`='33';
UPDATE `wow_forum_category` SET `title_de`='Magier',`title_es`='Mago',`title_fr`='Mage' WHERE `cat_id`='34';
UPDATE `wow_forum_category` SET `title_de`='Hexenmeister',`title_es`='Brujo',`title_fr`='Démoniste' WHERE `cat_id`='35';
UPDATE `wow_forum_category` SET `title_de`='Jäger',`title_es`='Cazador',`title_fr`='Chasseur' WHERE `cat_id`='36';
UPDATE `wow_forum_category` SET `title_de`='Schamane',`title_es`='Chamán',`title_fr`='Chaman' WHERE `cat_id`='37';
UPDATE `wow_forum_category` SET `header`='0',`parent_cat`='6',`short`='0',`realm_cat`='0',`title_de`='Mönch',`title_en`='Monk',`title_es`='Monje',`title_fr`='Moine',`title_ru`='Монах',`icon`='monje.gif' WHERE `cat_id`='38';

UPDATE `wow_forum_category` SET `realm_cat`='1',`title_en`='Realm Forums',`title_ru`='Игровые миры' WHERE `cat_id`='39';
UPDATE `wow_forum_category` SET `title_en`='Armory Realm',`title_ru`='Armory Realm' WHERE `cat_id`='40';
INSERT INTO `wow_forum_category`(`cat_id`,`header`,`parent_cat`,`short`,`realm_cat`,`gmlevel`,`title_de`,`title_en`,`title_es`,`title_fr`,`title_ru`,`desc_de`,`desc_en`,`desc_es`,`desc_fr`,`desc_ru`,`icon`) VALUES ( '41','0','38','1','0','0','','Armory Realm 2','','','Armory Realm 2','','','','','','');

UPDATE `wow_forum_category` SET `title_de`='Schaden',`title_es`='Daño',`title_fr`='Dégâts' WHERE `cat_id`='25';
UPDATE `wow_forum_category` SET `title_de`='Heilung',`title_es`='Sanación',`title_fr`='Soins' WHERE `cat_id`='26';
UPDATE `wow_forum_category` SET `title_de`='Schutz',`title_es`='Tanqueo',`title_fr`='Tanks' WHERE `cat_id`='27';

UPDATE `wow_forum_category` SET `desc_de`='Ob durch Stahl oder Magie, Schaden – jede Menge davon – ist deine Kunst in höchster Perfektion.',`desc_en`='The slash of the sword, a flick of the wand. Stow your weapons and discuss the strategy of dealing damage.',`desc_es`='El tajo de una espada; el ligero movimiento de una varita. Guarda tus armas y compartes tus estrategias para causar daño.',`desc_fr`='Que ce soit par l’acier ou la magie, les dégâts (beaucoup de dégâts !) sont votre prédilection' WHERE `cat_id`='25';
UPDATE `wow_forum_category` SET `desc_de`='Deine Verbündeten am Leben erhalten, manchmal dem Anschein nach gegen ihre Absichten.',`desc_en`='To aid your companions is to see success. Kneel and meditate on the art of healing.',`desc_es`='Ayudar a tus compañeros puede suponer el éxito. Arrollídate y medita sobre el arte de sanar.',`desc_fr`='Garder vos alliés en vie, parfois même contre leur gré.' WHERE `cat_id`='26';
UPDATE `wow_forum_category` SET `desc_de`='Sich dem Feind in den Weg stellen und eure Gefährten vor dem sicheren Tod schützen.',`desc_en`='A wall unwavering, a leader unshaken. Gather and confer on the craft of tanking',`desc_es`='Un muro firme; un líder inquebrantable. Reúnete con aquellos que creen que tanquear es un arte.',`desc_fr`='Se mettre en travers de vos ennemis, protégeant vos compagnons d’une mort certaine.' WHERE `cat_id`='27';

UPDATE `wow_forum_category` SET `title_es`='Roles de Clases' WHERE `cat_id`='5';


UPDATE `wow_forum_category` SET `title_de`='Kundendienst' WHERE `cat_id`='7';
UPDATE `wow_forum_category` SET `title_de`='Technischer Support' WHERE `cat_id`='8';
UPDATE `wow_forum_category` SET `desc_de`='Übersicht wichtiger Mitteilungen, die den Status unseres Services (z.B. Realms) betreffen.',`desc_fr`='Rassemble la totalité des messages importants concernant l’état du service, notamment les soucis impactant les royaumes.' WHERE `cat_id`='9';
UPDATE `wow_forum_category` SET `title_de`='Arena und gewertete Schlachtfelder\r\n',`title_en`='Arenas',`title_es`='Arenas',`title_fr`='Arène et champs de bataille cotés' WHERE `cat_id`='23';
UPDATE `wow_forum_category` SET `desc_de`='Lebst du für den gewerteten Wettbewerb? Dies ist der Ort um Taktiken, Teams und Erfahrungen zu besprechen.',`desc_en`='Discuss all aspects of World of Warcraft Arenas with your fellow players.',`desc_es`='Habla sobre todos los aspectos relacionados con las Arenas de World of Warcraft',`desc_fr`='Vous participez à des arènes ou champs de bataille cotés ? Partagez ici tactiques, réflexions et expériences avec vos pairs.' WHERE `cat_id`='23';
UPDATE `wow_forum_category` SET `desc_de`='Tausche Hilfestellungen und Tipps zu Schlachtfeldern oder ungewerteten PvP-Kämpfen mit Gleichgesinnten aus.',`desc_en`='Discuss all aspects of Battlegrounds with your fellow players.',`desc_es`='Habla sobre todos los aspectos relacionados con los Campos de batalla',`desc_fr`='Retrouvez et partagez des conseils, des astuces et vos réflexions sur les champs de bataille et le JcJ en extérieur ici.' WHERE `cat_id`='24';

UPDATE `wow_forum_category` SET `title_es`='Juego y Guías' WHERE `cat_id`='3';
UPDATE `wow_forum_category` SET `title_de`='Hilfen/Guides für neue Spieler',`title_en`='New Player Help and Guides',`title_es`='Ayuda y guías para jugadores nuevos',`title_fr`='Aides/Guides – Nouveaux joueurs',`title_ru`='Помощь новичкам и руководства' WHERE `cat_id`='14';

