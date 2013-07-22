/*
SQLyog Ultimate v8.82 
MySQL - 5.5.16 : Database - web_battle
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web_battle` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `web_battle`;

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

LOCK TABLES `comments` WRITE;

UNLOCK TABLES;

/*Table structure for table `community_slides` */

DROP TABLE IF EXISTS `community_slides`;

CREATE TABLE `community_slides` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '#',
  `date` date NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `community_slides` */

LOCK TABLES `community_slides` WRITE;

insert  into `community_slides`(`id`,`desc`,`title`,`url`,`date`,`image`) values (1,'Testing BattleCMS at maximum capacity.','Testing BattleCMS','#','2011-04-20','4ZONJ2G8H02S1291403588642.jpg'),(2,'Find us on BattleCMS','Where to find us?','#','2011-04-20','3A016YGNDN971281040709386.jpg'),(3,'Check The Forum for the latest updates.','BattleCMS Forum','#','2011-04-20','HXW8I6KL6MRK1290045863003.jpg'),(4,'test','test','#','2011-04-20','TE943VAV1IVZ1290560963083.jpg');

UNLOCK TABLES;

/*Table structure for table `forum_blizzposts` */

DROP TABLE IF EXISTS `forum_blizzposts`;

CREATE TABLE `forum_blizzposts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `postid` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `forum_blizzposts` */

LOCK TABLES `forum_blizzposts` WRITE;

UNLOCK TABLES;

/*Table structure for table `forum_categ` */

DROP TABLE IF EXISTS `forum_categ`;

CREATE TABLE `forum_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `forum_categ` */

LOCK TABLES `forum_categ` WRITE;

insert  into `forum_categ`(`id`,`num`,`name`) values (1,1,'BattleCMS');

UNLOCK TABLES;

/*Table structure for table `forum_forums` */

DROP TABLE IF EXISTS `forum_forums`;

CREATE TABLE `forum_forums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `categ` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `locked` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `forum_forums` */

LOCK TABLES `forum_forums` WRITE;

insert  into `forum_forums`(`id`,`num`,`categ`,`name`,`image`,`description`,`locked`) values (1,1,1,'Announcement','blizzard','All important messages/announcements/informations regarding BattleCMS will be posted here.',1),(2,2,1,'General Talk','general','You can talk anything you want here :)',0),(3,3,1,'Bugs','bugs','Post here all bugs you find.',0),(4,4,1,'Suggestions','suggestions','Post here your ideas regarding BattleCMS.',0);

UNLOCK TABLES;

/*Table structure for table `forum_posts` */

DROP TABLE IF EXISTS `forum_posts`;

CREATE TABLE `forum_posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL DEFAULT '0',
  `postid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `forum_posts` */

LOCK TABLES `forum_posts` WRITE;

UNLOCK TABLES;

/*Table structure for table `forum_replies` */

DROP TABLE IF EXISTS `forum_replies`;

CREATE TABLE `forum_replies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `threadid` int(10) NOT NULL,
  `content` text NOT NULL,
  `author` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `forum_replies` */

LOCK TABLES `forum_replies` WRITE;

UNLOCK TABLES;

/*Table structure for table `forum_threads` */

DROP TABLE IF EXISTS `forum_threads`;

CREATE TABLE `forum_threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `locked` tinyint(1) DEFAULT '0',
  `has_blizz` tinyint(1) DEFAULT '0',
  `prefix` varchar(255) NOT NULL DEFAULT 'none',
  `last_date` datetime NOT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `forum_threads` */

LOCK TABLES `forum_threads` WRITE;

UNLOCK TABLES;

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `txn_id` varchar(32) DEFAULT NULL,
  `payer_email` varchar(64) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `info` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `logs` */

LOCK TABLES `logs` WRITE;

UNLOCK TABLES;

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_url` varchar(30) NOT NULL DEFAULT '0' COMMENT 'Just Youtube Videos',
  `title` text,
  `description` text,
  `comments` int(10) DEFAULT '0',
  `link` varchar(255) DEFAULT '#',
  `visible` int(2) NOT NULL DEFAULT '0',
  `type` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '0 video - 1 wallpapapers - 2 screenshots - 3 artwork - 4 comics',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `media` */

LOCK TABLES `media` WRITE;

insert  into `media`(`id`,`author`,`date`,`id_url`,`title`,`description`,`comments`,`link`,`visible`,`type`) values (16,0,'2012-03-12 01:59:00','-E5M3X-1KP0','CATACLYSM (Español - España) - World of Warcraft','Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.',0,'http://www.youtube.com/watch?v=-E5M3X-1KP0',1,0),(17,0,'2012-03-12 01:59:00','CARC72zF7UI','World of Warcraft - Cinemáticas','Normal Video',0,'http://www.youtube.com/watch?v=CARC72zF7UI',1,0),(18,0,'2012-03-12 01:59:00','dYK_Gqyf48Y','World of Warcraft - Cinematic Trailer','Some Trailers',0,'http://www.youtube.com/watch?v=dYK_Gqyf48Y',1,0),(19,0,'2012-03-12 01:59:00','IBHL_-biMrQ','World of Warcraft: The Burning Crusade','TBC Trailer',0,'http://www.youtube.com/watch?v=IBHL_-biMrQ',1,0);

UNLOCK TABLES;

/*Table structure for table `media_comments` */

DROP TABLE IF EXISTS `media_comments`;

CREATE TABLE `media_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mediaid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `media_comments` */

LOCK TABLES `media_comments` WRITE;

UNLOCK TABLES;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'BattleCMS',
  `class` varchar(255) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

LOCK TABLES `messages` WRITE;

UNLOCK TABLES;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `content` text,
  `contentlnk` text,
  `title` text,
  `comments` int(10) DEFAULT '0',
  `image` varchar(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

insert  into `news`(`id`,`author`,`date`,`content`,`contentlnk`,`title`,`comments`,`image`) values (23,1,'2011-11-28 00:00:00','<p>World of Warcraft Patch 4.2, Rage of the Firelands is here! With a new raid, a legendary questline, all-new raid tier and PvP armor sets, the most diverse daily questing experience to date, major story developments, PvP Season 10, user interface enhancements, and much more, patch 4.2 has brought Azeroth a little something for everyone.</p>\r\n<p>If you want to know what’s what before traversing the new content and features, we encourage you to wade through all of the patch 4.2 information we’ve released, watch the Rage of the Firelands patch trailer, and read the official patch notes. Be sure to check out the Customer &amp; Technical Support Information section as well if you’re seeking information on known patch issues, the latest fixes, or need technical troubleshooting assistance.</p>\r\n<p style=\"text-align: center;\"><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"349\" src=\"http://www.youtube.com/embed/HsXglDs81FU\" width=\"560\"></iframe></p>\r\n<p>&#160;</p>\r\n<center>\r\n	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n				<div class=\"ctextheader\">\r\n					<img src=\"http://eu.media5.battle.net/cms/gallery/C3TFJYGGOUOV1308923764027.jpg\" style=\"width: 580px; height: 45px;\" />\r\n					<h1>\r\n						Content &amp; Features</h1>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/gallery/3OM23DHSMCPW1308917532816.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Patch Notes<br />\r\n					<span class=\"ctextteaser\">Read the official Rage of the firelands patch 4.2 notes.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td style=\"width: 5px;\">&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media3.battle.net/cms/gallery/HMCHL8KGA36J1308917283146.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Dungeon Journal<br />\r\n					<span class=\"ctextteaser\">Learn more about specific dungeons, the bosses within thoses dungeons, their abilities, and the rewards they offer.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media2.battle.net/cms/gallery/DKA6DI1HD3D51308917309912.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Elemental Bonds<br />\r\n					<span class=\"ctextteaser\">…Is this the end of the Son of Durotan?</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td>&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/gallery/NV66DHYBF3BF1309338393093.jpg\" /> </a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Featured Items<br />\r\n					<span class=\"ctextteaser\">Patch 4.2 boasts a wealth of cool items for collectors and completionists alike.</span></a></p>\r\n				</div>\r\n				<a href=\"http://eu.battle.net/wow/en/blog/2513298#blog\" target=\"_blank\"> </a></td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/gallery/IYEV8YVGGZG01308917391114.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Firelands Raid<br />\r\n					<span class=\"ctextteaser\">Enjoy this scorching opportunity to delve into this Elemental Plane, where six unique bosses stand between you and the reinvigorated Ragnaros.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td>&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/gallery/61W632G1QEJZ1308917794161.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a target=\"_blank\">Firelands armor<br />\r\n					<span class=\"ctextteaser\">Have a look at the latest raiding tier armor, including stats, set bonuses, and artwork.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/gallery/HLMZWRFC7TF51308917365786.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a target=\"_blank\">Fire and Flames<br />\r\n					<span class=\"ctextteaser\">Feast your eyes on the adventures that await as you’re transported through the fire and the flames and into the Firelands.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td>&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/gallery/EZRP4DWDAMCW1308917467926.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">New Legendary<br />\r\n					<span class=\"ctextteaser\">Patch 4.2 introduces an epic quest that will challenge those daring enough to complete the legendary staff Dragonwrath, Tarecgosa’s Rest.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media3.battle.net/cms/gallery/FNYSRYIXLLYF1308917264804.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">New Daily Quests<br />\r\n					<span class=\"ctextteaser\">Stalwart adventurers will have the opportunity to test their mettle at two new daily quest areas located in the hillside of Hyjal and depths of the Firelands.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td>&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/gallery/IRAK7S7FNQLG1308917867793.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">VP Conversion<br />\r\n					<span class=\"ctextteaser\">With the release of patch 4.2 all Valor Points will be converted down to Justice Points up to the 4000 point cap.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>&#160;</p>\r\n	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n				<div class=\"ctextheader\">\r\n					<img src=\"http://eu.media5.battle.net/cms/gallery/WFBGPFJU97W11308917944989.jpg\" style=\"width: 580px; height: 45px;\" />\r\n					<h1>\r\n						PvP Content &amp; Features</h1>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/gallery/OA5Y5L2X26NP1308917562538.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">New PvP Mounts<br />\r\n					<span class=\"ctextteaser\">In order to best accommodate players under the play style of Rated Battlegrounds, we’ll be offering all-new PvP ground mounts in a unique way.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td style=\"width: 5px;\">&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/gallery/M5JI20E3T7391308917693991.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Season 10 Armor<br />\r\n					<span class=\"ctextteaser\">Players on the battlefields of World of Warcraft have proven their mettle in glorious combat and are ready for new challenges and more powerful rewards.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<div>\r\n					<a  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/gallery/ZTAR8KEEXRST1308917732519.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">Season Transition<br />\r\n					<span class=\"ctextteaser\">Learn about the end of Season 9, the distribution of end-of-season rewards, and the conversion from Conquest Points to Honor Points.</span></a></p>\r\n				</div>\r\n				</td>\r\n				<td>&#160;</td>\r\n				<td>\r\n				<div>\r\n					<a target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/gallery/CRMEFNR3VK1Q1308917835477.jpg\" /></a>\r\n					<p class=\"ctextheader\"><a  target=\"_blank\">War Games<br />\r\n					<span class=\"ctextteaser\">Patch 4.2 implements a new interface option within the PvP tab that makes it easier than ever to call our friend or foe for a face-off.</span></a></p>\r\n				</div>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>&#160;</p>\r\n	<p>&#160;</p>\r\n</center>\r\n<p>\r\n<style type=\"text/css\">\r\n#blog .detail img {\r\n-moz-border-radius:4px;\r\n-webkit-border-radius:4px;\r\nborder-radius:4px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #372511;\r\nmax-width: 580px !important;\r\npadding: 1px;\r\n}\r\n#blog .detail td:hover > a img, #blog .detail a img:hover {\r\nborder: 1px solid #CD9000;\r\n}\r\n#blog .detail td div:hover > a img, #blog .detail a img:hover {\r\nborder: 1px solid #CD9000;\r\n}\r\n#blog .detail td a img, #blog .detail td div img {\r\nwidth: 285px;\r\nheight: 140px;\r\nmargin-top: 8px;\r\n}\r\n#blog .detail td a, #blog .detail td div, #blog .detail td div.ctextheader {\r\nposition: relative;\r\ndisplay: block;\r\ntext-decoration: none;\r\nline-height:1 !important;\r\nfont-family: Arial !important;\r\n}\r\n#blog .detail td a p, #blog .detail td div p {\r\nposition: absolute;\r\ntop: 18px;\r\nleft: 128px;\r\nright: 5px;\r\nmargin: 0;\r\npadding: 0;\r\n}\r\n#blog .detail td div.ctextheader h1 {\r\nposition: absolute;\r\ntop: 20px;\r\nleft: 30px;\r\ncolor: #ffb001 !important;\r\nfont-size: 23px !important;\r\n}\r\n#blog .detail td a p.ctextheader, #blog .detail td div p.ctextheader {\r\ncolor: #d19205 !important;\r\nfont-size: 17px !important;\r\nline-height:1 !important;\r\ntext-weight: bold !important;\r\n}\r\n#blog .detail td a p span.ctextteaser, #blog .detail td div p span.ctextteaser {\r\ncolor: #ad8460 !important;\r\nfont-size: 12px !important;\r\nline-height:1 !important;\r\nfont-family: Arial !important;\r\ntext-align: left !important;\r\n}</style>\r\n</p>\r\n','','Patch 4.2: Rage of the Elements',0,'4.2.0'),(24,1,'2011-11-28 00:00:00','<p>In addition to the new iLevel 365 gear that players can purchase from unlockable vendors at the <a href=\"http://www.wowhead.com/zone=5733\" target=\"_blank\">Molten Front</a> and the <a href=\"http://eu.battle.net/wow/en/blog/2236786\" target=\"_blank\">epic armor sets</a> they can claim from Ragnaros and his minions in the <a href=\"http://www.wowhead.com/zone=5723\" target=\"_blank\">Firelands raid</a>, patch 4.2 also boasts a wealth of cool items for collectors and completionists alike.</p>\r\n	<p>From companion pets to mounts to trinkets with unique on-use effects, there\'s a little something for everyone. To make sure you don\'t miss out on any of these collectables, we\'ve put together a list of all the new featured items introduced in 4.2 so you can check out what\'s available and where!</p>\r\n	<p>&#160;</p>\r\n	<p>&#160;</p>\r\n	<center>\r\n		<style type=\"text/css\">\r\n.top-list tr:hover td { color:inherit; }\r\n.top-list tr:nth-child(2) td { color:inherit; font-weight:normal }		</style>\r\n		<div class=\"top-list-container\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"top-list\" style=\"text-align: left;\">\r\n				<tbody>\r\n					<tr>\r\n						<td colspan=\"3\">\r\n						<div class=\"ctextheader\">\r\n							<img src=\"http://eu.media4.battle.net/cms/gallery/1J1XZIDEGIRX1309441435785.jpg\" style=\"width: 520px; height: 65px;\" />\r\n							<h1>\r\n								Firelands Raid</h1>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th style=\"text-align: center;\">\r\n							Item Name</th>\r\n						<th style=\"text-align: center;\">\r\n							Item Type</th>\r\n						<th style=\"text-align: center;\">\r\n							Where You Can Get It</th>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=71665\" target=\"_blank\">Flametalon of Alysrazor</a></td>\r\n						<td>Epic Ground Mount</td>\r\n						<td>Rare drop from <a href=\"http://eu.battle.net/wow/en/zone/firelands/alysrazor\" target=\"_blank\">Alysrazor</a>; available in both 10-player and 25-player versions of the raid, as well as in Normal and Heroic modes.</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=69230\" target=\"_blank\">Corrupted Fire Hawk</a></td>\r\n						<td>Epic Flying Mount</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5828\" target=\"_blank\">“Glory of the Firelands Raider”</a> achievement. Learned from <a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=69230\" target=\"_blank\">Corrupted Egg of Millagazor</a>.</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=69224\" target=\"_blank\">Pureblood Fire Hawk</a></td>\r\n						<td>Epic Flying Mount</td>\r\n						<td>Rare drop from <a href=\"http://eu.battle.net/wow/en/zone/firelands/ragnaros\" target=\"_blank\">Ragnaros</a>; available in both 10-player and 25-player version of the raid, as well as Normal and Heroic modes. Learned from <a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=69224\" target=\"_blank\">Smoldering Egg of Millagazor</a>.</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n		<p>&#160;</p>\r\n		<style type=\"text/css\">\r\n.top-list tr:hover td { color:inherit; }\r\n.top-list tr:nth-child(2) td { color:inherit; font-weight:normal }		</style>\r\n		<div class=\"top-list-container\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"top-list\" style=\"text-align: left;\">\r\n				<tbody>\r\n					<tr>\r\n						<td colspan=\"3\">\r\n						<div class=\"ctextheader\">\r\n							<img src=\"http://eu.media3.battle.net/cms/gallery/DZ3OOX3VPNTS1309441387524.jpg\" style=\"width: 520px; height: 65px;\" />\r\n							<h1>\r\n								Mount Hyjal Dailies</h1>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th style=\"text-align: center;\">\r\n							Item Name</th>\r\n						<th style=\"text-align: center;\">\r\n							Item Type</th>\r\n						<th style=\"text-align: center;\">\r\n							Where You Can Get It</th>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q1\" href=\"http://wowhead.com/item=71259\" target=\"_blank\">Leyara\'s Locket</a></td>\r\n						<td>Vanity item; transforms player into a Druid of the Flame</td>\r\n						<td>Reward from “The Rest is History,” the final quest in a new series that becomes available after unlocking all content at the Molten Front and completing <a href=\"http://www.wowhead.com/achievement=5859\" target=\"_blank\">&#34;Legacy of Leyara.&#34;</a></td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=70161\" target=\"_blank\">Mushroom Chair</a></td>\r\n						<td>\r\n						<p>Vanity item; sets down a mushroom chair upon which a beleaguered player may sit and rest</p>\r\n						</td>\r\n						<td>Ayla Shadowstorm (unlockable vendor)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=70159\" target=\"_blank\">Mylune\'s Call</a></td>\r\n						<td>\r\n						<p>Vanity item; initiates Mylune’s Call, summoning an image of the regrowth of Hyjal</p>\r\n						</td>\r\n						<td>Varlan Highbough (unlockable vendor)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=70140\" target=\"_blank\">Hyjal Bear Cub</a></td>\r\n						<td>\r\n						<p>Non-combat pet</p>\r\n						</td>\r\n						<td>\r\n						<p>Varlan Highbough (unlockable vendor)</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=70160\" target=\"_blank\">Crimson Lasher</a></td>\r\n						<td>\r\n						<p>Non-combat pet</p>\r\n						</td>\r\n						<td>\r\n						<p>Ayla Shadowstorm (unlockable vendor)</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=34955\" target=\"_blank\">Searing Scorchling</a></td>\r\n						<td>\r\n						<p>Non-combat pet</p>\r\n						</td>\r\n						<td>\r\n						<p>Possible reward from <a class=\"bml-link-item color-q2\" href=\"http://wowhead.com/item=71631\">Zen\'Vorka’s Cache</a>, which can be purchased from Zen\'Vorka (unlockable vendor) for 30 Marks of the World Tree</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=69213\" target=\"_blank\">Flameward Hippogryph</a></td>\r\n						<td>\r\n						<p>Epic flying mount</p>\r\n						</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5866\" target=\"_blank\">&#34;The Molten Front Offensive&#34;</a></td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70141\" target=\"_blank\">Dwyer\'s Caber</a></td>\r\n						<td>\r\n						<p>Trinket with on-use cosmetic effect; the player tosses a tree</p>\r\n						</td>\r\n						<td>Varlan Highbough<br />\r\n						<p>(unlockable vendor)</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70142\" target=\"_blank\">Moonwell Chalice</a></td>\r\n						<td>Trinket summons a small moonwell</td>\r\n						<td>Ayla Shadowstorm (unlockable vendor)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70143\" target=\"_blank\">Moonwell Phial</a></td>\r\n						<td>\r\n						<p>Trinket summons a veil of splashing waters</p>\r\n						</td>\r\n						<td>Ayla Shadowstorm (unlockable vendor)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70144\" target=\"_blank\">Ricket\'s Magnetic Fireball</a></td>\r\n						<td>Trinket with cosmetic effect; your attacks may attract small celestial objects</td>\r\n						<td>Damek Bloombeard (unlockable vendor)</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n		<p>&#160;</p>\r\n		<style type=\"text/css\">\r\n.top-list tr:hover td { color:inherit; }\r\n.top-list tr:nth-child(2) td { color:inherit; font-weight:normal }		</style>\r\n		<div class=\"top-list-container\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"top-list\" style=\"text-align: left;\">\r\n				<tbody>\r\n					<tr>\r\n						<td colspan=\"3\">\r\n						<div class=\"ctextheader\">\r\n							<img src=\"http://eu.media5.battle.net/cms/gallery/USHGZJY2B39K1309441338262.jpg\" style=\"width: 520px; height: 65px;\" />\r\n							<h1>\r\n								Rated Battlegrounds and Arenas</h1>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th style=\"text-align: center;\">\r\n							Item Name</th>\r\n						<th style=\"text-align: center;\">\r\n							Item Type</th>\r\n						<th style=\"text-align: center;\">\r\n							Where You Can Get It</th>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70909\" target=\"_blank\">Vicious War Steed</a></td>\r\n						<td>Epic Ground Mount</td>\r\n						<td>\r\n						<p><a href=\"http://eu.battle.net/wow/en/blog/2483320\" target=\"_blank\">Reward</a> for completing <a href=\"http://www.wowhead.com/achievement=5328\" target=\"_blank\">&#34;Veteran of the Alliance&#34;</a>, <a href=\"http://www.wowhead.com/achievement=5823\" target=\"_blank\">&#34;Veteran of the Alliance II&#34;</a> and <a href=\"http://www.wowhead.com/achievement=5329\" target=\"_blank\">&#34;Warbound Veteran of the Alliance&#34;</a></p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q4\" href=\"http://wowhead.com/item=70910\" target=\"_blank\">Vicious War Wolf</a></td>\r\n						<td>Epic Ground Mount</td>\r\n						<td>\r\n						<p><a href=\"http://eu.battle.net/wow/en/blog/2483320\" target=\"_blank\">Reward</a> for completing <a href=\"http://www.wowhead.com/achievement=5325\" target=\"_blank\">&#34;Veteran of the Horde&#34;</a>, <a href=\"http://www.wowhead.com/achievement=5824\" target=\"_blank\">&#34;Veteran of the Horde II&#34;</a> and <a href=\"http://www.wowhead.com/achievement=5326\" target=\"_blank\">&#34;Warbound Veteran of the Horde&#34;</a></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n		<p>&#160;</p>\r\n		<style type=\"text/css\">\r\n.top-list tr:hover td { color:inherit; }\r\n.top-list tr:nth-child(2) td { color:inherit; font-weight:normal }		</style>\r\n		<div class=\"top-list-container\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"top-list\" style=\"text-align: left;\">\r\n				<tbody>\r\n					<tr>\r\n						<td colspan=\"3\">\r\n						<div class=\"ctextheader\">\r\n							<img src=\"http://eu.media4.battle.net/cms/gallery/5GWD81S5IWYT1309441412557.jpg\" style=\"width: 520px; height: 65px;\" />\r\n							<h1>\r\n								Miscellaneous</h1>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th style=\"text-align: center;\">\r\n							Item Name</th>\r\n						<th style=\"text-align: center;\">\r\n							Item Type</th>\r\n						<th style=\"text-align: center;\">\r\n							Where You Can Get It</th>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q1\" href=\"http://wowhead.com/item=69838\" target=\"_blank\">Chirping Box</a></td>\r\n						<td>Non-combat pet</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5860\" target=\"_blank\">&#34;The \'Unbeatable\' Pterodactyl: BEATEN&#34;</a> (complete the &#34;Vigilance on Wings&#34; daily quest in Mount Hyjal 10 times)</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<p><a class=\"bml-link-item color-q1\" href=\"http://wowhead.com/item=72042\" target=\"_blank\">Alliance Balloon</a></p>\r\n						<a class=\"bml-link-item color-q1\" href=\"http://wowhead.com/item=72045\" target=\"_blank\">Horde Balloon</a></td>\r\n						<td>Non-combat pet</td>\r\n						<td>Reward for completing &#34;Blown Away&#34;</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=71140\" target=\"_blank\">Nuts</a></td>\r\n						<td>\r\n						<p>Non-combat pet</p>\r\n						</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5876\" target=\"_blank\">&#34;Petting Zoo&#34;</a> (collect 100 unique companion pets)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q1\" href=\"http://wowhead.com/item=71387\" target=\"_blank\">Brilliant Kaliri</a></td>\r\n						<td>Non-combat pet</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5877\" target=\"_blank\">&#34;Menagerie&#34;</a> (collect 125 unique companion pets)</td>\r\n					</tr>\r\n					<tr>\r\n						<td><a class=\"bml-link-item color-q3\" href=\"http://wowhead.com/item=54810\" target=\"_blank\">Celestial Dragon</a></td>\r\n						<td>Non-combat pet</td>\r\n						<td>Reward for completing <a href=\"http://www.wowhead.com/achievement=5875\" target=\"_blank\">&#34;Littlest Pet Shop&#34;</a> (collect 150 unique companion pets)</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n		<p>&#160;</p>\r\n	</center>\r\n\r\n<style type=\"text/css\">\r\n#blog .detail img {\r\n-moz-border-radius:4px;\r\n-webkit-border-radius:4px;\r\nborder-radius:4px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #372511;\r\nmax-width: 520px !important;\r\npadding: 1px;\r\n}\r\n#blog .detail td div.ctextheader {\r\nposition: relative;\r\ndisplay: block;\r\ntext-decoration: none;\r\n}\r\n#blog .detail td div.ctextheader h1 {\r\nposition: absolute;\r\ntop: 18px;\r\nleft: 30px;\r\ncolor: #ffb001;\r\nfont-size: 23px;\r\ntext-shadow: #000000 1px 2px 3px;\r\n}\r\n#blog .detail td a p.ctextheader, #blog .detail td div p.ctextheader {\r\ncolor: #d19205;\r\nfont: 18px/1 Arial,Verdana,sans-serif;\r\n}</style>','','Patch 4.2: Featured Items',0,'featureditems'),(20,1,'0000-00-00 00:00:00','World of Warcraft Patch 4.3: Hour of Twilight nears, and with it, Deathwing’s reign of terror will finally come to an end. Featuring a new raid, unexplored dungeons, a legendary rogue quest line, the latest raid tier armor sets, major story developments, the Transmogrification and Void Storage features, and much more, Hour of Twilight has something for everyone..\r\n<div id=\"center\"><br>\r\n	<div class=\"ctextheadline\">\r\n		<img src=\"http://eu.media4.battle.net/cms/gallery/RC2CO4SNOMFT1320833523998.jpg\" style=\"width: 580px; height: 45px;\" />\r\n		<h1>\r\n			Content &amp; Features</h1>\r\n	</div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/blog_thumbnail/6UI3J2B2ZLHI1317321685765.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Raid Finder</span><br />\r\n		<span class=\"summarytext\">Enjoy our brand-new grouping feature that works much like the Dungeon Finder.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/blog_thumbnail/SOHDLM4OWJF71313585059916.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Transmogrification</span><br />\r\n		<span class=\"summarytext\">Customize the appearance of your weapons and armor like never before.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/blog_thumbnail/6XAVNMWID70C1313660227876.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Void Storage</span><br />\r\n		<span class=\"summarytext\">Characters of all levels will be able to take advantage of this brand-new technology, which will open up 80 slots of long-term storage space.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/blog_thumbnail/S8BLQAJZL9301317746259756.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Valor Changes</span><br />\r\n		<span class=\"summarytext\">With patch 4.3, we\'ll be introducing some changes to the way Valor Points are obtained, as well as the items they can be exchanged for.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media2.battle.net/cms/blog_thumbnail/TF5FWQJV66MF1317210321396.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Fangs of the Father</span><br />\r\n		<span class=\"summarytext\">Attention rogues! Play a central role in the fate of Azeroth by doing what you do best: manipulating key events from the shadows.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/P9VUT605DXAZ1314262079585.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">The All-New Darkmoon Faire</span><br />\r\n		<span class=\"summarytext\">You’ll be dazzled. You’ll be amazed! You aren’t prepared for the Darkmoon Faire, ‘cause it’s like nothing you’ve seen before!</span></a></div>\r\n	<p style=\"clear: both;\">&#160;</p>\r\n	<div class=\"ctextheadline\">\r\n		<img src=\"http://eu.media5.battle.net/cms/gallery/OVXWRHAJZJ4P1320833656835.jpg\" style=\"width: 580px; height: 45px;\" />\r\n		<h1>\r\n			Tier 13 Sets and Visual Retrospective</h1>\r\n	</div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media3.battle.net/cms/blog_thumbnail/W1C83D9578F71315579410079.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Warlock Tier Set</span><br />\r\n		<span class=\"summarytext\">The warlock set has the flavor of the Old Gods about it, full of dark and warped aesthetics. General Vezax from the Ulduar raid was used as a reference point.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/XTSGMRFB7ZF41317987453789.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Hunter Tier Set</span><br />\r\n		<span class=\"summarytext\">A dragon-head helm and chained leathery wings around the shoulders -- the set gives the impression of a skeletal dragon crouching over the hunter\'s upper body.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/blog_thumbnail/0AP817VT773C1316103167706.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Mage Tier Set</span><br />\r\n		<span class=\"summarytext\">The combination of moving cogs, quilted fabric, and buckled straps give the set an intriguing &#34;techno-mage&#34; flavor.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media3.battle.net/cms/blog_thumbnail/95KFX579H9261315935561322.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Druid Tier Set</span><br />\r\n		<span class=\"summarytext\">Twisting, organic shapes are often key elements of a druid set, and this tier is no exception, with writhing plant roots providing a frame for the glowing clusters of fungi.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/7J7DWPT5WW2M1316014013476.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Shaman Tier Set</span><br />\r\n		<span class=\"summarytext\">The shaman set combines huge wolf-skull shoulder pads, bone fetishes, and fur with glowing shards of amber crystal: a mix of the animal and the elemental.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media5.battle.net/cms/blog_thumbnail/WZBWZUQSA6UG1315511140272.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Warrior Tier Set</span><br />\r\n		<span class=\"summarytext\">Gnarled dragon horn and angular elementium plating with burning fire behind it were the key ingredients.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media2.battle.net/cms/blog_thumbnail/MZLJSYVI6GKI1316629978030.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Paladin Tier Set</span><br />\r\n		<span class=\"summarytext\">The ‘feathered’ plate mail, rendered in silver and gold, creates an aggressive, yet sweeping and powerful silhouette for the paladin.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/MKP8J0HP9B1V1316527703712.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Rogue Tier Set</span><br />\r\n		<span class=\"summarytext\">A close-fitting mask, collar, and cowl helps reinforce the rogue\'s sneaky silhouette, despite the sharp, bladed details.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/FV1PBVSBVI8S1317203740617.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Priest Tier Set</span><br />\r\n		<span class=\"summarytext\">Creepy, soulless black eyes and a spiked, setting sun motif create the bold two-tone priest set.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/VO7DROA9BVXD1319724579692.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Death Knight Tier Set</span><br />\r\n		<span class=\"summarytext\">The Necrotic Boneplate set features bones stretched and twisted into unnatural shapes by sorcerous means.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media2.battle.net/cms/gallery/HG43KVD56T0C1320658241819.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Tier Set Bonuses</span><br />\r\n		<span class=\"summarytext\">With all the visuals of the tier sets, let’s not forget the magic that lays imbued betwixt their stitches and plating!</span></a></div>\r\n	<p style=\"clear: both;\">&#160;</p>\r\n	<div class=\"ctextheadline\">\r\n		<img src=\"http://eu.media3.battle.net/cms/gallery/GT6C6FTS92F51320833637514.jpg\" style=\"width: 580px; height: 45px;\" />\r\n		<h1>\r\n			Raids &amp; Dungeons</h1>\r\n	</div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\"  target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/RFXF4JIWWNTT1288709394829.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Raid Preview: Dragon Soul</span><br />\r\n		<span class=\"summarytext\">Assist Thrall and the Dragon Aspects as they seek to bring an end to the Black Dragonflight once and for all.</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media4.battle.net/cms/blog_thumbnail/4X5B4WE74Q001316422569592.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Dungeons Preview: End Time</span><br />\r\n		<span class=\"summarytext\">Deathwing roams the skies of Azeroth, wreaking havoc on the land and its people -- how can you stop him?</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media1.battle.net/cms/blog_thumbnail/V9OA0INVOZHK1316422710831.jpg\" /></a> <a class=\"cteasersummary\"  target=\"_blank\"><span class=\"headline\">Dungeons Preview: Well of Eternity</span><br />\r\n		<span class=\"summarytext\">Witness one of the most catastrophic events in Azeroth’s history: the War of the Ancients!</span></a></div>\r\n	<div class=\"cteaser\">\r\n		<a class=\"cteaserimg\" target=\"_blank\"><img src=\"http://eu.media2.battle.net/cms/blog_thumbnail/RASNKQG5BHE11316426431395.jpg\" /></a> <a class=\"cteasersummary\" target=\"_blank\"><span class=\"headline\">Dungeons Preview: Hour of Twilight</span><br />\r\n		<span class=\"summarytext\">A most dangerous task awaits you: Escort Thrall and the Dragon Soul safely to Wyrmrest Temple, for the assault on Deathwing.</span></a></div>\r\n	<p style=\"clear: both;\">&#160;</p>\r\n	\r\n	\r\n	\r\n	\r\n			\r\n				<tbody>\r\n<!-- repeat for every media coverage link you have -->					<tr>\r\n						\r\n<!-- repeat until here for every media coverage link you have -->				</tbody>\r\n			\r\n		\r\n	<p style=\"clear: both;\">&#160;</p>\r\n</div>\r\n<style type=\"text/css\">\r\n#blog .detail #center {\r\nwidth: 590px;\r\nmargin: 0px auto;\r\n}\r\n#blog .detail div.ctextheadline {\r\nposition: relative;\r\ndisplay: block;\r\ntext-decoration: none;\r\nline-height:1 !important;\r\nfont-family: Arial !important;\r\nmargin-left: 3px;\r\n}\r\n#blog .detail div.ctextheadline h1 {\r\nposition: absolute;\r\ntop: 13px;\r\nleft: 30px;\r\ncolor: #ffb001 !important;\r\nfont-size: 23px !important;\r\n}\r\n#blog .detail div.cteaser, #blog .detail img, #blog .detail div.cteaserg {\r\n-moz-border-radius:4px;\r\n-webkit-border-radius:4px;\r\nborder-radius:4px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #372511;\r\npadding: 1px;\r\n}\r\n#blog .detail div.cteaser, #blog .detail div.cteaserg {\r\nwidth: 285px;\r\nheight: 144px;\r\nmargin: 8px 3px 0px 3px;\r\npadding-top: 5px;\r\nbackground-color: #1D100A;\r\nfloat:left;\r\n}\r\n#blog .detail div.cteaser:hover {\r\nborder: 1px solid #CD9000;\r\nbackground-color: #40200d;\r\n}\r\n#blog .detail .cteaser a.cteaserimg, #blog .detail .cteaserg div.cteaserimg {\r\ndisplay: block;\r\nwidth: 125px;\r\nheight: 140px;\r\ntext-align: center;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteaserimg img, #blog .detail .cteaserg div.cteaserimg img {\r\n-moz-border-radius:10px;\r\n-webkit-border-radius:10px;\r\nborder-radius:10px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #1D100A;\r\nvertical-align: middle;\r\nwidth: 109px;\r\nheight: 109px;\r\nmargin-top: 10px;\r\npadding: 1px;\r\n}\r\n#blog .detail .cteaser a.cteasersummary, #blog .detail .cteaserg div.cteasersummary {\r\ndisplay: block;\r\npadding-right: 3px;\r\nline-height: 1.4 !important;\r\nwidth: 157px;\r\nheight: 140px;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.headline, #blog .detail .cteaserg div.cteasersummary span.headline {\r\ncolor: #d19205 !important;\r\nfont-size: 17px !important;\r\ntext-weight: bold !important;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.summarytext, #blog .detail .cteaserg div.cteasersummary span.summarytext {\r\ncolor: #ad8460 !important;\r\nfont-size: 12px !important;\r\n}\r\n.top-list tr:nth-child(2) td {\r\ncolor: #F0E29A;\r\nbackground-color: transparent;\r\n}\r\n.top-list-interior table tbody tr td {\r\nbackground-color: none !important;\r\ncolor: #EFC9A0 !important;\r\nfont-weight: normal !important;\r\nvertical-align: top;\r\n}\r\n.top-list-interior table tbody tr:hover td {\r\ncolor: #fff !important;\r\n}</style>\r\n\r\n\r\n					\r\nHope you enjoy, and we will let you know what is fixed and what is not.',NULL,'Patch 4.3: Hour of Twilight',0,'4.3.0');

UNLOCK TABLES;

/*Table structure for table `prices` */

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'vote',
  `vp` int(10) DEFAULT '0',
  `dp` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `prices` */

LOCK TABLES `prices` WRITE;

insert  into `prices`(`id`,`service`,`type`,`vp`,`dp`) values (1,'name-change','vote',300,0),(2,'race-change','vote',500,0),(3,'appear-change','vote',400,0),(4,'faction-change','vote',600,10);

UNLOCK TABLES;

/*Table structure for table `realms` */

DROP TABLE IF EXISTS `realms`;

CREATE TABLE `realms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `realmid` int(10) DEFAULT NULL,
  `world_db` varchar(255) NOT NULL DEFAULT 'world',
  `char_db` varchar(255) NOT NULL DEFAULT 'characters',
  `version` varchar(15) NOT NULL DEFAULT '4.3.4',
  `drop_rate` varchar(5) NOT NULL DEFAULT '1x',
  `exp_rate` varchar(5) NOT NULL DEFAULT '1x',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `realms` */

LOCK TABLES `realms` WRITE;

insert  into `realms`(`id`,`realmid`,`world_db`,`char_db`,`version`,`drop_rate`,`exp_rate`) values (1,1,'world','characters','4.3.4','1x','1x');

UNLOCK TABLES;

/*Table structure for table `servers` */

DROP TABLE IF EXISTS `servers`;

CREATE TABLE `servers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `host` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `database` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `servers` */

LOCK TABLES `servers` WRITE;

UNLOCK TABLES;

/*Table structure for table `slideshows` */

DROP TABLE IF EXISTS `slideshows`;

CREATE TABLE `slideshows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `slideshows` */

LOCK TABLES `slideshows` WRITE;

insert  into `slideshows`(`id`,`title`,`description`,`image`,`link`) values (4,'Title1','Description1','community01.png','#'),(5,'Title2','Description2','draenei.jpg','#');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '0-0.jpg',
  `blizz` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `character` int(10) NOT NULL DEFAULT '0',
  `vote_points` int(10) NOT NULL DEFAULT '0',
  `donation_points` int(10) NOT NULL DEFAULT '0',
  `char_realm` int(10) NOT NULL DEFAULT '1',
  `registerIp` varchar(30) NOT NULL DEFAULT '0-0-0-0',
  `country` varchar(20) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `quest1` int(2) NOT NULL DEFAULT '0',
  `ans1` varchar(50) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

UNLOCK TABLES;

/*Table structure for table `version` */

DROP TABLE IF EXISTS `version`;

CREATE TABLE `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL,
  `DB_Version` varchar(50) DEFAULT NULL,
  `Updates` varchar(50) DEFAULT NULL,
  `Emulador` varchar(20) DEFAULT 'ApocalypseCore'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

/*Data for the table `version` */

LOCK TABLES `version` WRITE;

insert  into `version`(`Name`,`Number`,`Revision`,`DB_Version`,`Updates`,`Emulador`) values ('BattleCMS','v1','1','v1','0','ApocalypseCore');

UNLOCK TABLES;

/*Table structure for table `vote` */

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `ID` int(10) DEFAULT NULL COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text COMMENT 'It must have http:// to work properly',
  `Description` text COMMENT 'Add the Description for the Voting'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

/*Data for the table `vote` */

LOCK TABLES `vote` WRITE;

insert  into `vote`(`ID`,`Name`,`Link`,`Description`) values (1,'BattleCMS','http://apocalypsecore.tk','Vote for US');

UNLOCK TABLES;

/*Table structure for table `votes` */

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes` (
  `id` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `voteid` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `votes` */

LOCK TABLES `votes` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
