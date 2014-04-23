-- Adminer 3.3.4 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bc_admin_menus`;
CREATE TABLE `bc_admin_menus` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `alias` varchar(32) DEFAULT '',
  `module` varchar(80) DEFAULT '',
  `controller` varchar(80) DEFAULT '',
  `action` varchar(80) DEFAULT '',
  `params` varchar(255) DEFAULT '',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` smallint(6) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_admin_menus` (`menu_id`, `name`, `alias`, `module`, `controller`, `action`, `params`, `sort_order`, `status`, `parent_id`, `url`, `icon`) VALUES
(1,	'控制面板',	'Dashboard',	'',	'',	'',	'',	0,	0,	0,	'index',	'icon-dashboard'),
(2,	'全局',	'global',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-cogs'),
(3,	'系统设置',	'config',	'',	'',	'',	'',	0,	0,	2,	'config',	NULL),
(4,	'站点管理',	'site',	'',	'',	'',	'',	0,	1,	2,	'site',	NULL),
(5,	'语言版本管理',	'language',	'',	'',	'',	'',	0,	1,	2,	'language',	NULL),
(6,	'基本设置',	'base',	'',	'',	'',	'',	0,	1,	3,	'config',	NULL),
(7,	'核心设置',	'core',	'',	'',	'',	'',	0,	1,	3,	'config/core',	NULL),
(8,	'应用设置',	'app',	'',	'',	'',	'',	0,	1,	3,	'config/app',	NULL),
(9,	'用户设置',	'user',	'',	'',	'',	'',	0,	1,	3,	'config/user',	NULL),
(10,	'附件设置',	'attachment',	'',	'',	'',	'',	0,	1,	3,	'config/attachment',	NULL),
(11,	'栏目',	'category',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-th-list'),
(12,	'栏目管理',	'category',	'',	'',	'',	'',	0,	1,	11,	'category',	NULL),
(13,	'内容模型管理',	'model',	'',	'',	'',	'',	3,	1,	11,	'model',	NULL),
(14,	'用户',	'user',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-user'),
(15,	'用户',	'user',	'',	'',	'',	'',	0,	0,	14,	'user',	NULL),
(16,	'用户组',	'group',	'',	'',	'',	'',	0,	0,	14,	'user/group',	NULL),
(17,	'管理员',	'administrator',	'',	'',	'',	'',	0,	1,	14,	'administrator',	NULL),
(18,	'管理员角色',	'role',	'',	'',	'',	'',	0,	1,	14,	'role',	NULL),
(19,	'界面',	'layout',	'',	'',	'',	'',	0,	0,	0,	'#',	'icon-eye-open'),
(20,	'模板管理',	'template',	'',	'',	'',	'',	0,	1,	19,	'template',	NULL),
(21,	'区块管理',	'block',	'',	'',	'',	'',	0,	1,	19,	'template/block',	NULL),
(22,	'静态化管理',	'html',	'',	'',	'',	'',	0,	1,	19,	'template/html',	NULL),
(23,	'扩展',	'extra',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-briefcase'),
(24,	'模块管理',	'module',	'',	'',	'',	'',	0,	1,	34,	'module',	NULL),
(25,	'缓存管理',	'cache',	'',	'',	'',	'',	0,	0,	23,	'cache',	NULL),
(26,	'敏感词',	'badword',	'',	'',	'',	'',	0,	0,	23,	'badword',	NULL),
(27,	'联动菜单',	'linkage',	'',	'',	'',	'',	0,	0,	23,	'linkage',	NULL),
(28,	'自定义表单',	'form',	'',	'',	'',	'',	0,	0,	23,	'form',	NULL),
(29,	'采集',	'collection',	'',	'',	'',	'',	0,	0,	23,	'collection',	NULL),
(30,	'计划任务',	'cron',	'',	'',	'',	'',	0,	0,	23,	'cron',	NULL),
(31,	'后台菜单',	'menu',	'',	'',	'',	'',	0,	1,	2,	'menu',	NULL),
(32,	'操作日志',	'log',	'',	'',	'',	'',	0,	1,	23,	'log',	NULL),
(33,	'数据库管理',	'database',	'',	'',	'',	'',	0,	1,	23,	'database',	NULL),
(34,	'模块',	'module',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-cloud'),
(35,	'应用管理',	'app',	'',	'',	'',	'',	0,	0,	34,	'app',	NULL),
(36,	'友情链接',	'link',	'',	'',	'',	'',	0,	1,	34,	'link',	NULL),
(37,	'投票',	'vote',	'',	'',	'',	'',	10,	0,	34,	'vote',	NULL),
(38,	'留言板',	'guestbook',	'',	'',	'',	'',	0,	1,	34,	'guestbook',	NULL),
(39,	'评论',	'comment',	'',	'',	'',	'',	0,	1,	34,	'comment',	NULL),
(40,	'公告',	'announcement',	'',	'',	'',	'',	0,	0,	34,	'announcement',	NULL),
(41,	'短消息',	'message',	'',	'',	'',	'',	0,	0,	34,	'app/message',	NULL),
(42,	'广告',	'ads',	'',	'',	'',	'',	0,	1,	34,	'ads',	NULL),
(43,	'帮助',	'help',	'',	'',	'',	'',	0,	1,	0,	'#',	'icon-question-sign'),
(44,	'开发规范',	'dev',	'',	'',	'',	'',	0,	1,	43,	'help/dev',	''),
(45,	'UI规范',	'ui',	'',	'',	'',	'',	0,	1,	43,	'help/ui',	NULL),
(46,	'在线手册',	'docs',	'',	'',	'',	'',	0,	1,	43,	'help/docs',	NULL),
(47,	'版本升级',	'upgrade',	'',	'',	'',	'',	0,	1,	43,	'help/upgrade',	NULL),
(49,	'内容管理',	'content',	'',	'',	'',	'',	0,	1,	11,	'content',	NULL);

DROP TABLE IF EXISTS `bc_admin_roles`;
CREATE TABLE `bc_admin_roles` (
  `role_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `sites` varchar(255) NOT NULL DEFAULT '',
  `purview` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_admin_roles` (`role_id`, `name`, `sites`, `purview`, `status`) VALUES
(1,	'超级管理员',	'1,2',	'a:31:{i:0;s:25:\"administrator/index/index\";i:1;s:23:\"administrator/index/add\";i:2;s:24:\"administrator/index/edit\";i:3;s:26:\"administrator/index/delete\";i:4;s:20:\"category/index/index\";i:5;s:18:\"category/index/add\";i:6;s:19:\"category/index/edit\";i:7;s:21:\"category/index/delete\";i:8;s:18:\"config/index/index\";i:9;s:17:\"index/index/index\";i:10;s:20:\"language/index/index\";i:11;s:18:\"language/index/add\";i:12;s:19:\"language/index/edit\";i:13;s:21:\"language/index/delete\";i:14;s:16:\"menu/index/index\";i:15;s:14:\"menu/index/add\";i:16;s:15:\"menu/index/edit\";i:17;s:17:\"menu/index/delete\";i:18;s:18:\"module/index/index\";i:19;s:16:\"module/index/add\";i:20;s:20:\"module/index/install\";i:21;s:22:\"module/index/uninstall\";i:22;s:19:\"module/index/delete\";i:23;s:16:\"role/index/index\";i:24;s:14:\"role/index/add\";i:25;s:15:\"role/index/edit\";i:26;s:17:\"role/index/delete\";i:27;s:16:\"site/index/index\";i:28;s:14:\"site/index/add\";i:29;s:15:\"site/index/edit\";i:30;s:17:\"site/index/delete\";}',	1),
(2,	'管理员',	'1,2',	'a:21:{i:0;s:25:\"administrator/index/index\";i:1;s:18:\"config/index/index\";i:2;s:17:\"index/index/index\";i:3;s:20:\"language/index/index\";i:4;s:18:\"language/index/add\";i:5;s:19:\"language/index/edit\";i:6;s:21:\"language/index/delete\";i:7;s:16:\"menu/index/index\";i:8;s:14:\"menu/index/add\";i:9;s:15:\"menu/index/edit\";i:10;s:17:\"menu/index/delete\";i:11;s:18:\"module/index/index\";i:12;s:16:\"module/index/add\";i:13;s:20:\"module/index/install\";i:14;s:22:\"module/index/uninstall\";i:15;s:19:\"module/index/delete\";i:16;s:16:\"role/index/index\";i:17;s:16:\"site/index/index\";i:18;s:14:\"site/index/add\";i:19;s:15:\"site/index/edit\";i:20;s:17:\"site/index/delete\";}',	1),
(3,	'信息发布员',	'1',	'a:4:{i:0;s:17:\"index/index/index\";i:1;s:20:\"language/index/index\";i:2;s:16:\"menu/index/index\";i:3;s:16:\"site/index/index\";}',	1);

DROP TABLE IF EXISTS `bc_admin_users`;
CREATE TABLE `bc_admin_users` (
  `user_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `last_login_time` int(10) NOT NULL DEFAULT '0',
  `last_login_ip` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_admin_users` (`user_id`, `role_id`, `username`, `password`, `nickname`, `email`, `add_time`, `last_login_time`, `last_login_ip`, `status`) VALUES
(1,	1,	'admin',	'e10adc3949ba59abbe56e057f20f883e',	'admin',	'admin@admin.com',	1325042598,	1325042598,	'127.0.0.1',	1),
(2,	2,	'hyperblue',	'e10adc3949ba59abbe56e057f20f883e',	'小熊',	'hyperblue@qq.com',	1374029057,	0,	'',	1),
(3,	3,	'test',	'e10adc3949ba59abbe56e057f20f883e',	'test',	'test@test.com',	1374029275,	0,	'',	1),
(4,	1,	'test2',	'e10adc3949ba59abbe56e057f20f883e',	'test2',	'test2@test.com',	1374029395,	0,	'',	0),
(6,	1,	'test3',	'e10adc3949ba59abbe56e057f20f883e',	'test3',	'test3@test.com',	1374135029,	0,	'',	0);

DROP TABLE IF EXISTS `bc_ads`;
CREATE TABLE `bc_ads` (
  `ads_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `ads_position_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL,
  `name` varchar(80) NOT NULL,
  `code` text,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_ads` (`ads_id`, `ads_position_id`, `type`, `name`, `code`, `add_time`, `sort_order`, `status`) VALUES
(1,	1,	'text',	'测试广告',	'a:3:{s:7:\"content\";s:6:\"123456\";s:3:\"url\";s:23:\"http://www.bingceng.com\";s:9:\"url_title\";s:15:\"提示你一下\";}',	1377065625,	0,	1),
(2,	0,	'text',	'测试广告',	'a:3:{s:7:\"content\";s:6:\"123456\";s:3:\"url\";s:23:\"http://www.bingceng.com\";s:9:\"url_title\";s:15:\"提示你一下\";}',	1377071377,	0,	1);

DROP TABLE IF EXISTS `bc_ads_positions`;
CREATE TABLE `bc_ads_positions` (
  `ads_position_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(80) NOT NULL,
  `type_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ads_position_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `bc_ads_positions` (`ads_position_id`, `site_id`, `name`, `type_id`, `width`, `height`, `description`, `status`) VALUES
(1,	1,	'广告位一',	0,	100,	100,	'测试广告位',	1);

DROP TABLE IF EXISTS `bc_attr`;
CREATE TABLE `bc_attr` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `module_id` int(10) NOT NULL DEFAULT '0',
  `variable` varchar(100) NOT NULL,
  `settings` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_caches`;
CREATE TABLE `bc_caches` (
  `cache_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  PRIMARY KEY (`cache_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_categories`;
CREATE TABLE `bc_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `module_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `model` varchar(30) NOT NULL,
  `template_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `name` varchar(80) NOT NULL,
  `alias` varchar(32) NOT NULL DEFAULT '',
  `original_img` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(30) NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_categories` (`category_id`, `site_id`, `parent_id`, `module_id`, `model`, `template_id`, `name`, `alias`, `original_img`, `keywords`, `description`, `link`, `target`, `add_time`, `sort_order`, `status`) VALUES
(1,	1,	0,	0,	'page',	0,	'关于我们',	'about',	'',	'',	'',	'',	'',	1375235440,	0,	1),
(2,	1,	1,	0,	'page',	0,	'公司简介',	'about',	'',	'',	'',	'',	'',	1375235440,	0,	1),
(3,	1,	0,	0,	'page',	0,	'联系我们',	'contact',	'',	'',	'',	'',	'',	1375235440,	10,	1),
(4,	1,	1,	0,	'page',	0,	'荣誉资质',	'honor',	'',	'',	'',	'',	'',	1375235440,	0,	1),
(5,	1,	0,	0,	'article',	0,	'新闻中心',	'news',	'',	'',	'',	'',	'',	1375236701,	0,	1),
(6,	1,	0,	0,	'page',	0,	'解决方案',	'services',	'',	'',	'',	'',	'',	1375236756,	0,	1),
(7,	1,	0,	0,	'gallery',	0,	'产品案例',	'case',	'',	'',	'',	'',	'',	1375236770,	0,	1),
(8,	1,	0,	0,	'page',	0,	'招贤纳士',	'job',	'',	'',	'',	'',	'',	1375236836,	0,	1),
(9,	1,	0,	0,	'link',	0,	'在线留言',	'guestbook',	'',	'',	'',	'guestbook',	'',	1375236879,	0,	1),
(10,	1,	5,	0,	'article',	0,	'企业动态',	'company',	'',	'',	'',	'',	'',	1375838718,	0,	1),
(11,	1,	5,	0,	'article',	0,	'行业新闻',	'industry',	'',	'',	'',	'',	'',	1375838753,	0,	1),
(12,	2,	0,	0,	'page',	0,	'About',	'about',	'',	'',	'',	'',	'',	1375926114,	0,	1),
(13,	2,	0,	0,	'article',	0,	'News',	'news',	'',	'',	'',	'',	'',	1375926132,	0,	1),
(14,	2,	0,	0,	'gallery',	0,	'Product',	'product',	'',	'',	'',	'',	'',	1375926161,	0,	1),
(16,	1,	0,	0,	'plugin',	0,	'博客',	'blog',	'',	'',	'',	'blog?lang=cn&amp;site_id=1',	'',	1377228547,	11,	1);

DROP TABLE IF EXISTS `bc_comments`;
CREATE TABLE `bc_comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `module` varchar(80) NOT NULL,
  `from_id` int(10) unsigned NOT NULL DEFAULT '0',
  `from_name` varchar(255) NOT NULL,
  `to_id` int(10) unsigned NOT NULL DEFAULT '0',
  `to_name` varchar(255) NOT NULL,
  `content` text,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_comments` (`comment_id`, `site_id`, `module`, `from_id`, `from_name`, `to_id`, `to_name`, `content`, `add_time`, `status`) VALUES
(1,	1,	'content',	1,	'评论用户',	1,	'测试测试',	'这都什么玩意',	1330000000,	1);

DROP TABLE IF EXISTS `bc_contents`;
CREATE TABLE `bc_contents` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `original_img` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `bc_contents` (`content_id`, `site_id`, `category_id`, `title`, `keywords`, `description`, `original_img`, `add_time`, `sort_order`, `status`) VALUES
(1,	1,	10,	'测试测试',	'阿什顿',	'阿什顿啊',	'',	1375841331,	0,	1),
(2,	1,	2,	'公司简介',	'',	'',	'',	1375845262,	0,	1),
(3,	1,	4,	'荣誉资质',	'',	'',	'',	1375845687,	0,	1),
(4,	1,	3,	'联系我们',	'',	'',	'',	1375846451,	0,	1),
(5,	1,	8,	'招贤纳士',	'',	'',	'',	1375846470,	0,	1),
(6,	1,	10,	'测试2',	'',	'',	'',	1375846497,	0,	1),
(7,	1,	10,	'测试3',	'',	'',	'',	1375859866,	0,	1),
(8,	2,	12,	'About',	'',	'',	'',	1375926172,	0,	1),
(9,	1,	6,	'解决方案',	'',	'',	'',	1376464869,	0,	1);

DROP TABLE IF EXISTS `bc_contents_article_data`;
CREATE TABLE `bc_contents_article_data` (
  `content_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `need_login` tinyint(3) NOT NULL,
  `lit_img` varchar(255) NOT NULL,
  `user_group` varchar(255) NOT NULL,
  `content_2` text NOT NULL,
  `update_time` datetime NOT NULL,
  `attr` varchar(255) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_contents_article_data` (`content_id`, `content`, `short_title`, `color`, `need_login`, `lit_img`, `user_group`, `content_2`, `update_time`, `attr`) VALUES
(1,	'&lt;p&gt;测试两下&lt;br/&gt;&lt;/p&gt;',	'test',	'#802424',	0,	'',	'1,3',	'&lt;p&gt;test and test&lt;/p&gt;',	'2013-08-13 13:10:29',	'1,2,3'),
(6,	'&lt;p&gt;测试2&lt;/p&gt;',	'',	'',	0,	'',	'0',	'',	'0000-00-00 00:00:00',	'0'),
(7,	'&lt;p&gt;123445&lt;/p&gt;',	'',	'',	0,	'',	'0',	'',	'0000-00-00 00:00:00',	'0');

DROP TABLE IF EXISTS `bc_contents_download_data`;
CREATE TABLE `bc_contents_download_data` (
  `content_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_contents_gallery_data`;
CREATE TABLE `bc_contents_gallery_data` (
  `content_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_contents_page_data`;
CREATE TABLE `bc_contents_page_data` (
  `content_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_contents_page_data` (`content_id`, `content`) VALUES
(2,	'&lt;p&gt;测试&lt;/p&gt;'),
(3,	'&lt;p&gt;测试&lt;/p&gt;'),
(4,	''),
(5,	''),
(8,	''),
(9,	'');

DROP TABLE IF EXISTS `bc_guestbooks`;
CREATE TABLE `bc_guestbooks` (
  `guestbook_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `guestname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `mobile` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guestbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_guestbooks` (`guestbook_id`, `site_id`, `reply_id`, `type_id`, `user_id`, `guestname`, `email`, `tel`, `mobile`, `address`, `content`, `add_time`, `status`) VALUES
(1,	1,	0,	0,	0,	'游客1',	'test@test.com',	'027-88888888',	2147483647,	'湖北省武汉市',	'这是要发啊',	1376643257,	1),
(3,	1,	1,	0,	1,	'',	'',	'',	0,	'',	'ceshi23423',	1376645332,	0);

DROP TABLE IF EXISTS `bc_languages`;
CREATE TABLE `bc_languages` (
  `language_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL DEFAULT '',
  `filename` varchar(64) NOT NULL DEFAULT '',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_languages` (`language_id`, `name`, `code`, `locale`, `image`, `directory`, `filename`, `sort_order`, `status`) VALUES
(1,	'中文(简体)',	'zh_CN',	'',	'cn.png',	'',	'',	0,	1),
(2,	'英文',	'en_US',	'',	'us.png',	'',	'',	0,	1);

DROP TABLE IF EXISTS `bc_links`;
CREATE TABLE `bc_links` (
  `link_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `sitename` varchar(80) NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_links` (`link_id`, `site_id`, `type_id`, `sitename`, `website`, `logo`, `email`, `description`, `add_time`, `sort_order`, `status`) VALUES
(1,	1,	0,	'百度',	'http://www.baidu.com',	'bdlogo-1376640823.gif',	'admin@baidu.com',	'搜索引擎',	1376635210,	0,	1);

DROP TABLE IF EXISTS `bc_logs`;
CREATE TABLE `bc_logs` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `user_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `module` varchar(80) NOT NULL DEFAULT '',
  `controller` varchar(80) NOT NULL DEFAULT '',
  `action` varchar(80) NOT NULL DEFAULT '',
  `params` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_models`;
CREATE TABLE `bc_models` (
  `model_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `alias` varchar(80) NOT NULL,
  `fields` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_models` (`model_id`, `name`, `alias`, `fields`, `status`) VALUES
(1,	'文章',	'article',	'a:10:{s:10:\"content_id\";a:14:{s:4:\"name\";s:8:\"内容ID\";s:5:\"alias\";s:10:\"content_id\";s:4:\"type\";s:3:\"int\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"content\";a:14:{s:4:\"name\";s:6:\"内容\";s:5:\"alias\";s:7:\"content\";s:4:\"type\";s:6:\"editor\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:2:{s:7:\"toolbar\";s:4:\"full\";s:12:\"remote_image\";i:0;}}s:11:\"short_title\";a:14:{s:4:\"name\";s:9:\"短标题\";s:5:\"alias\";s:11:\"short_title\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:2:{s:8:\"password\";s:1:\"0\";s:3:\"max\";s:0:\"\";}s:9:\"is_system\";i:0;}s:5:\"color\";a:14:{s:4:\"name\";s:12:\"标题颜色\";s:5:\"alias\";s:5:\"color\";s:4:\"type\";s:11:\"colorpicker\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";b:0;s:9:\"is_system\";i:0;}s:10:\"need_login\";a:14:{s:4:\"name\";s:21:\"是否需登录查看\";s:5:\"alias\";s:10:\"need_login\";s:4:\"type\";s:3:\"box\";s:5:\"value\";s:1:\"0\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:3:{s:4:\"type\";s:5:\"radio\";s:7:\"options\";s:12:\"是|1\r\n否|0\";s:9:\"fieldtype\";s:7:\"tinyint\";}s:9:\"is_system\";i:0;}s:7:\"lit_img\";a:14:{s:4:\"name\";s:9:\"缩略图\";s:5:\"alias\";s:7:\"lit_img\";s:4:\"type\";s:5:\"image\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:2:\"10\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:2:{s:9:\"allow_ext\";s:12:\"gif|jpg|jpeg\";s:9:\"watermark\";s:1:\"0\";}s:9:\"is_system\";i:0;}s:10:\"user_group\";a:14:{s:4:\"name\";s:9:\"用户组\";s:5:\"alias\";s:10:\"user_group\";s:4:\"type\";s:3:\"box\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:3:{s:4:\"type\";s:8:\"multiple\";s:7:\"options\";s:46:\"普通会员|1\r\n中级会员|2\r\n高级会员|3\";s:9:\"fieldtype\";s:7:\"varchar\";}s:9:\"is_system\";i:0;}s:9:\"content_2\";a:14:{s:4:\"name\";s:13:\"详细内容2\";s:5:\"alias\";s:9:\"content_2\";s:4:\"type\";s:6:\"editor\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:2:{s:7:\"toolbar\";s:5:\"basic\";s:12:\"remote_image\";s:1:\"0\";}s:9:\"is_system\";i:0;}s:11:\"update_time\";a:14:{s:4:\"name\";s:12:\"修改时间\";s:5:\"alias\";s:11:\"update_time\";s:4:\"type\";s:8:\"datetime\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:1:{s:6:\"format\";s:5:\"Y-m-d\";}s:9:\"is_system\";i:0;}s:4:\"attr\";a:14:{s:4:\"name\";s:6:\"属性\";s:5:\"alias\";s:4:\"attr\";s:4:\"type\";s:3:\"box\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:3:{s:4:\"type\";s:8:\"checkbox\";s:7:\"options\";s:38:\"置顶|1\r\n推荐|2\r\n热点|3\r\n精华|4\";s:9:\"fieldtype\";s:7:\"varchar\";}s:9:\"is_system\";i:0;}}',	1),
(2,	'图集',	'gallery',	'a:2:{s:10:\"content_id\";a:14:{s:4:\"name\";s:8:\"内容ID\";s:5:\"alias\";s:10:\"content_id\";s:4:\"type\";s:3:\"int\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"content\";a:14:{s:4:\"name\";s:6:\"内容\";s:5:\"alias\";s:7:\"content\";s:4:\"type\";s:6:\"editor\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:2:{s:7:\"toolbar\";s:4:\"full\";s:12:\"remote_image\";i:0;}}}',	1),
(5,	'单页',	'page',	'a:2:{s:10:\"content_id\";a:14:{s:4:\"name\";s:8:\"内容ID\";s:5:\"alias\";s:10:\"content_id\";s:4:\"type\";s:3:\"int\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"content\";a:14:{s:4:\"name\";s:6:\"内容\";s:5:\"alias\";s:7:\"content\";s:4:\"type\";s:6:\"editor\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:2:{s:7:\"toolbar\";s:4:\"full\";s:12:\"remote_image\";i:0;}}}',	1),
(4,	'下载',	'download',	'a:2:{s:10:\"content_id\";a:14:{s:4:\"name\";s:8:\"内容ID\";s:5:\"alias\";s:10:\"content_id\";s:4:\"type\";s:3:\"int\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";i:0;s:8:\"required\";i:0;s:9:\"is_system\";i:1;s:6:\"status\";i:1;s:4:\"attr\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"content\";a:14:{s:4:\"name\";s:6:\"内容\";s:5:\"alias\";s:7:\"content\";s:4:\"type\";s:6:\"editor\";s:5:\"value\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:4:\"tips\";s:0:\"\";s:7:\"pattern\";s:0:\"\";s:10:\"error_tips\";s:0:\"\";s:10:\"sort_order\";s:1:\"0\";s:8:\"required\";s:1:\"0\";s:9:\"is_system\";i:1;s:6:\"status\";s:1:\"1\";s:4:\"attr\";a:2:{s:7:\"toolbar\";s:4:\"full\";s:12:\"remote_image\";i:0;}}}',	1);

DROP TABLE IF EXISTS `bc_options`;
CREATE TABLE `bc_options` (
  `option_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `variable` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bc_sites`;
CREATE TABLE `bc_sites` (
  `site_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` smallint(3) NOT NULL DEFAULT '0',
  `name` varchar(80) NOT NULL,
  `alias` varchar(32) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `bc_sites` (`site_id`, `language_id`, `name`, `alias`, `keywords`, `description`, `status`, `sort_order`) VALUES
(1,	1,	'中文站',	'cn',	'',	'',	1,	0),
(2,	2,	'English Site',	'en',	'',	'',	1,	0);

-- 2014-02-13 14:37:46
