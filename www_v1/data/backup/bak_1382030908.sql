#
# bakfile
# Version:5.5.31-0+wheezy1
# Time: 2013-10-18 01:28:28
# Type: 
# 5w: http://www.5w.com
DROP TABLE IF EXISTS 5w_admin_action;
CREATE TABLE 5w_admin_action (
  actionID int(11) NOT NULL AUTO_INCREMENT,
  cDate varchar(10) NOT NULL DEFAULT '',
  mDate varchar(10) NOT NULL DEFAULT '',
  actionName varchar(20) DEFAULT NULL,
  moduleID int(11) NOT NULL DEFAULT '0',
  actionStr varchar(50) NOT NULL DEFAULT '',
  actionState varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (actionID),
  KEY actionModuleID (moduleID)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_ad;
CREATE TABLE 5w_admin_ad (
  autoID int(50) NOT NULL AUTO_INCREMENT,
  id varchar(10) NOT NULL,
  title varchar(50) NOT NULL,
  content text NOT NULL,
  orders int(12) NOT NULL DEFAULT '1',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  wide int(10) DEFAULT '0',
  high int(10) DEFAULT '0',
  PRIMARY KEY (autoID)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_ag;
CREATE TABLE 5w_admin_ag (
  agID int(11) NOT NULL AUTO_INCREMENT,
  actionStr varchar(50) NOT NULL DEFAULT '',
  groupID int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (agID),
  KEY groupID (groupID)
) ENGINE=MyISAM AUTO_INCREMENT=3055 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_group;
CREATE TABLE 5w_admin_group (
  groupID int(11) NOT NULL AUTO_INCREMENT,
  cDate varchar(10) NOT NULL DEFAULT '',
  mDate varchar(10) NOT NULL DEFAULT '',
  groupName varchar(20) NOT NULL DEFAULT '',
  groupInfo varchar(255) DEFAULT NULL,
  groupState tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (groupID)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_help;
CREATE TABLE 5w_admin_help (
  id int(10) NOT NULL AUTO_INCREMENT,
  url varchar(20) NOT NULL,
  hid int(10) NOT NULL,
  content text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_log;
CREATE TABLE 5w_admin_log (
  logID int(11) NOT NULL AUTO_INCREMENT,
  cDate varchar(10) NOT NULL DEFAULT '',
  masterMail varchar(50) NOT NULL DEFAULT '',
  actStr varchar(50) NOT NULL DEFAULT '',
  actIP varchar(15) NOT NULL DEFAULT '',
  actPage varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (logID)
) ENGINE=MyISAM AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_master;
CREATE TABLE 5w_admin_master (
  masterMail varchar(50) NOT NULL DEFAULT '',
  groupID int(10) unsigned NOT NULL,
  cDate varchar(10) NOT NULL DEFAULT '',
  mDate varchar(10) NOT NULL DEFAULT '',
  masterPwd varchar(41) NOT NULL DEFAULT '',
  masterName varchar(20) NOT NULL DEFAULT '',
  masterPhone varchar(12) DEFAULT NULL,
  masterLoginTimes int(11) NOT NULL DEFAULT '0',
  masterLastIP varchar(15) DEFAULT NULL,
  masterLastDate varchar(10) DEFAULT NULL,
  masterState tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (masterMail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_mg;
CREATE TABLE 5w_admin_mg (
  mgID int(11) NOT NULL AUTO_INCREMENT,
  masterMail varchar(50) NOT NULL DEFAULT '',
  groupID int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (mgID),
  KEY masterMail (masterMail,groupID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_admin_module;
CREATE TABLE 5w_admin_module (
  moduleID int(11) NOT NULL AUTO_INCREMENT,
  moduleIndex int(11) NOT NULL DEFAULT '0',
  moduleName varchar(50) NOT NULL DEFAULT '',
  moduleLink varchar(200) NOT NULL DEFAULT '',
  moduleFID int(11) NOT NULL DEFAULT '0',
  moduleState tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (moduleID)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_apply_site;
CREATE TABLE 5w_apply_site (
  siteID int(10) unsigned NOT NULL AUTO_INCREMENT,
  cDate int(10) unsigned NOT NULL,
  siteName varchar(100) NOT NULL,
  siteUrl varchar(200) NOT NULL,
  stpID int(10) unsigned NOT NULL,
  alexa int(10) unsigned NOT NULL DEFAULT '0',
  contact varchar(100) NOT NULL,
  buildDate varchar(50) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_defaultsite;
CREATE TABLE 5w_defaultsite (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteSort int(11) NOT NULL DEFAULT '100',
  stpID int(7) NOT NULL,
  PRIMARY KEY (siteID),
  KEY stpID (stpID)
) ENGINE=MyISAM AUTO_INCREMENT=12006 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_defaultsitetype;
CREATE TABLE 5w_defaultsitetype (
  stpID int(7) NOT NULL AUTO_INCREMENT,
  stpName varchar(20) NOT NULL,
  stpSort int(7) NOT NULL DEFAULT '100',
  stpImg varchar(50) DEFAULT NULL,
  PRIMARY KEY (stpID)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_index_setting;
CREATE TABLE 5w_index_setting (
  iid int(10) NOT NULL AUTO_INCREMENT,
  iname varchar(20) NOT NULL,
  iiframe text NOT NULL,
  isort int(10) NOT NULL DEFAULT '100',
  PRIMARY KEY (iid)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_member_setting;
CREATE TABLE 5w_member_setting (
  userID int(10) unsigned NOT NULL,
  title varchar(100) NOT NULL COMMENT '首页自定义标题',
  search varchar(50) NOT NULL DEFAULT '1' COMMENT '1百度。2搜狗，3谷歌，4淘宝',
  PRIMARY KEY (userID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_members;
CREATE TABLE 5w_members (
  userID int(10) unsigned NOT NULL AUTO_INCREMENT,
  userMail varchar(100) DEFAULT NULL,
  userName varchar(100) NOT NULL,
  userPwd varchar(100) NOT NULL,
  userLoginTimes int(10) unsigned NOT NULL DEFAULT '1',
  userLastIP varchar(15) NOT NULL,
  userStatus tinyint(1) unsigned NOT NULL,
  userLastDate int(10) unsigned NOT NULL,
  userRegDate int(10) unsigned NOT NULL,
  userRegIP varchar(15) NOT NULL,
  `from` varchar(10) NOT NULL,
  domain varchar(25) NOT NULL,
  setdomain tinyint(4) DEFAULT '0',
  jifen int(11) DEFAULT '0',
  freezen int(11) DEFAULT '0',
  used int(11) DEFAULT '0',
  dstatus tinyint(4) DEFAULT '0',
  PRIMARY KEY (userID)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_message;
CREATE TABLE 5w_message (
  mid int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '4',
  title varchar(100) NOT NULL,
  content text NOT NULL,
  contact varchar(50) NOT NULL,
  createDate int(10) unsigned NOT NULL DEFAULT '0',
  reply varchar(255) DEFAULT NULL,
  urlfrom varchar(120) NOT NULL,
  urluser varchar(50) DEFAULT NULL,
  PRIMARY KEY (mid)
) ENGINE=MyISAM AUTO_INCREMENT=522 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_search;
CREATE TABLE 5w_search (
  id int(11) NOT NULL AUTO_INCREMENT,
  class int(11) NOT NULL,
  search_select char(20) DEFAULT NULL,
  `action` text,
  `name` char(50) DEFAULT NULL,
  btn char(50) DEFAULT NULL,
  img_text varchar(50) DEFAULT NULL,
  img_url text,
  url text,
  params text,
  sort int(11) NOT NULL DEFAULT '100' COMMENT '????',
  is_show int(1) NOT NULL DEFAULT '1',
  is_default int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_search_class;
CREATE TABLE 5w_search_class (
  classid int(15) NOT NULL AUTO_INCREMENT,
  classname char(20) DEFAULT NULL,
  sort int(11) NOT NULL DEFAULT '100' COMMENT '????',
  is_default int(1) NOT NULL DEFAULT '0' COMMENT '??????',
  PRIMARY KEY (classid)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_search_keyword;
CREATE TABLE 5w_search_keyword (
  id int(11) NOT NULL AUTO_INCREMENT,
  class int(11) DEFAULT '0',
  `name` varchar(10) NOT NULL DEFAULT '',
  url text NOT NULL,
  namecolor varchar(7) DEFAULT NULL,
  sort int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY classid (class)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site;
CREATE TABLE 5w_site (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteProvince int(4) DEFAULT '0',
  siteCity int(4) DEFAULT '0',
  siteTown int(4) DEFAULT '0',
  stpID int(11) NOT NULL,
  siteFamous tinyint(1) NOT NULL DEFAULT '0',
  siteStatus tinyint(1) NOT NULL DEFAULT '1',
  cDate int(10) unsigned NOT NULL DEFAULT '0',
  siteDefine varchar(200) DEFAULT NULL,
  siteSort int(11) NOT NULL DEFAULT '100',
  siteColor varchar(7) NOT NULL DEFAULT '',
  dsiteColor varchar(7) NOT NULL DEFAULT '',
  PRIMARY KEY (siteID),
  KEY stpID (stpID),
  KEY siteFamous (siteFamous),
  KEY siteName (siteName)
) ENGINE=MyISAM AUTO_INCREMENT=571 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_cool;
CREATE TABLE 5w_site_cool (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteStatus tinyint(1) NOT NULL DEFAULT '1',
  cDate int(10) unsigned NOT NULL DEFAULT '0',
  siteSort int(11) NOT NULL,
  stpID int(10) NOT NULL DEFAULT '5',
  siteColor varchar(7) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=236 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_famous;
CREATE TABLE 5w_site_famous (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteStatus tinyint(1) unsigned NOT NULL DEFAULT '1',
  cDate int(10) NOT NULL,
  siteSort int(11) NOT NULL,
  siteColor varchar(7) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_foot;
CREATE TABLE 5w_site_foot (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteStatus tinyint(1) NOT NULL DEFAULT '1',
  cDate int(10) unsigned NOT NULL DEFAULT '0',
  siteSort int(11) NOT NULL,
  stpID int(10) NOT NULL,
  siteColor varchar(7) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_left;
CREATE TABLE 5w_site_left (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteStatus tinyint(1) NOT NULL DEFAULT '1',
  cDate int(10) unsigned NOT NULL DEFAULT '0',
  siteSort int(11) NOT NULL,
  stpID int(10) NOT NULL,
  siteColor varchar(7) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_setting;
CREATE TABLE 5w_site_setting (
  id tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  logo varchar(255) DEFAULT NULL,
  siteName varchar(255) DEFAULT NULL,
  siteDomain varchar(50) DEFAULT NULL,
  logoTitle varchar(255) DEFAULT NULL,
  favoriteName varchar(255) DEFAULT NULL,
  adminEmail varchar(255) DEFAULT NULL,
  cacheLifeTime int(10) unsigned NOT NULL DEFAULT '3600',
  indexKeywords varchar(255) DEFAULT NULL,
  indexDescription varchar(255) DEFAULT NULL,
  indexTitle varchar(255) DEFAULT NULL,
  commonTitle varchar(255) DEFAULT NULL,
  commonKeywords varchar(255) DEFAULT NULL,
  commonDescription varchar(255) DEFAULT NULL,
  applyTitle varchar(255) DEFAULT NULL,
  applyKeywords varchar(255) DEFAULT NULL,
  applyDescription varchar(255) DEFAULT NULL,
  countCode text,
  icp varchar(255) DEFAULT NULL,
  icpurl varchar(255) DEFAULT NULL,
  htmlpath varchar(255) DEFAULT NULL,
  theme varchar(255) DEFAULT NULL,
  version varchar(255) DEFAULT NULL,
  usersite tinyint(4) DEFAULT '1',
  mail_server varchar(30) DEFAULT NULL,
  mail_port smallint(6) DEFAULT '25',
  mail_user varchar(30) DEFAULT NULL,
  mail_password varchar(30) DEFAULT NULL,
  mail_nick varchar(30) DEFAULT '5w.com',
  usecache tinyint(4) DEFAULT '1',
  sptime int(11) DEFAULT '0',
  ver int(8) NOT NULL DEFAULT '0',
  misver int(8) NOT NULL DEFAULT '0',
  dataver int(8) NOT NULL DEFAULT '0',
  misdataver int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_site_tool;
CREATE TABLE 5w_site_tool (
  siteID int(11) NOT NULL AUTO_INCREMENT,
  siteCreateDate char(10) NOT NULL DEFAULT '0',
  siteName varchar(250) NOT NULL,
  siteUrl text NOT NULL,
  siteStatus tinyint(1) NOT NULL DEFAULT '1',
  cDate int(10) unsigned NOT NULL DEFAULT '0',
  siteSort int(11) NOT NULL,
  siteColor varchar(7) DEFAULT NULL,
  PRIMARY KEY (siteID)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_tag_nav_img;
CREATE TABLE 5w_tag_nav_img (
  iid int(11) NOT NULL AUTO_INCREMENT,
  iname varchar(50) DEFAULT NULL,
  `name` varchar(8) DEFAULT '',
  PRIMARY KEY (iid)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_tag_site_nav;
CREATE TABLE 5w_tag_site_nav (
  navID int(10) NOT NULL AUTO_INCREMENT,
  userID int(10) NOT NULL,
  navName varchar(20) NOT NULL,
  cDate int(10) NOT NULL DEFAULT '0',
  navSort int(4) NOT NULL DEFAULT '100',
  navImg varchar(50) DEFAULT 'z_0.gif',
  PRIMARY KEY (navID),
  KEY userID (userID)
) ENGINE=MyISAM AUTO_INCREMENT=788 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_tag_site_url;
CREATE TABLE 5w_tag_site_url (
  siteID int(10) unsigned NOT NULL AUTO_INCREMENT,
  siteName varchar(100) NOT NULL,
  siteUrl text NOT NULL,
  usedate int(10) DEFAULT NULL,
  userID int(11) DEFAULT NULL,
  siteSort int(11) DEFAULT '100',
  navID int(11) NOT NULL,
  PRIMARY KEY (siteID),
  KEY userID (userID),
  KEY navID (navID)
) ENGINE=MyISAM AUTO_INCREMENT=5347 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_templates;
CREATE TABLE 5w_templates (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  listorder int(11) DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_type_cool;
CREATE TABLE 5w_type_cool (
  stpID int(11) NOT NULL AUTO_INCREMENT,
  stpCreateDate varchar(10) NOT NULL DEFAULT '0',
  stpName varchar(50) NOT NULL,
  stpHtmlName varchar(100) NOT NULL,
  stpShortName char(4) NOT NULL,
  stpParentID int(11) NOT NULL DEFAULT '0',
  stpSort int(10) unsigned NOT NULL DEFAULT '1000',
  description varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  keywords varchar(255) DEFAULT NULL,
  PRIMARY KEY (stpID)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_type_foot;
CREATE TABLE 5w_type_foot (
  stpID int(11) NOT NULL AUTO_INCREMENT,
  stpCreateDate varchar(10) NOT NULL DEFAULT '0',
  stpName varchar(50) NOT NULL,
  stpHtmlName varchar(100) NOT NULL,
  stpShortName char(4) NOT NULL,
  stpParentID int(11) NOT NULL DEFAULT '0',
  stpSort int(10) unsigned NOT NULL DEFAULT '1000',
  description varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  keywords varchar(255) DEFAULT NULL,
  PRIMARY KEY (stpID)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_type_left;
CREATE TABLE 5w_type_left (
  stpID int(11) NOT NULL AUTO_INCREMENT,
  stpCreateDate varchar(10) NOT NULL DEFAULT '0',
  stpName varchar(50) NOT NULL,
  stpHtmlName varchar(100) NOT NULL,
  stpShortName char(4) NOT NULL,
  stpParentID int(11) NOT NULL DEFAULT '0',
  stpSort int(10) unsigned NOT NULL DEFAULT '1000',
  description varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  keywords varchar(255) DEFAULT NULL,
  stpStatus tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (stpID)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS 5w_type_site;
CREATE TABLE 5w_type_site (
  stpID int(11) NOT NULL AUTO_INCREMENT,
  stpCreateDate char(10) NOT NULL DEFAULT '0',
  stpName varchar(50) NOT NULL,
  stpHtmlName varchar(100) NOT NULL,
  stpShortName char(4) NOT NULL,
  stpParentID int(11) NOT NULL DEFAULT '0',
  stpSort int(10) unsigned NOT NULL DEFAULT '1000',
  description varchar(255) DEFAULT NULL,
  title varchar(200) DEFAULT NULL,
  keywords varchar(255) DEFAULT NULL,
  stpStatus tinyint(4) DEFAULT '1',
  stpCount int(10) NOT NULL DEFAULT '0',
  tplID int(11) DEFAULT '0',
  stpColor varchar(7) DEFAULT NULL,
  stpshow tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (stpID),
  KEY stpParentID (stpParentID)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO 5w_admin_action VALUES('1','','1208687310','会员列表','8','viewUser','1');
INSERT INTO 5w_admin_action VALUES('2','','1208687310','修改会员','8','updateUser','1');
INSERT INTO 5w_admin_action VALUES('4','','1208687310','锁定会员','8','lockUser','1');
INSERT INTO 5w_admin_action VALUES('5','','1208687310','删除会员','8','delUser','1');
INSERT INTO 5w_admin_action VALUES('70','','1208078540','管理组列表','35','viewAdminGroup','1');
INSERT INTO 5w_admin_action VALUES('71','','1208078540','添加管理组','35','addAdminGroup','1');
INSERT INTO 5w_admin_action VALUES('72','','1208078540','修改管理组','35','updateAdminGroup','1');
INSERT INTO 5w_admin_action VALUES('73','','1208078540','删除管理组','35','delAdminGroup','1');
INSERT INTO 5w_admin_action VALUES('74','','1208078540','管理员列表','36','viewMaster','1');
INSERT INTO 5w_admin_action VALUES('75','','1208078540','添加管理员','36','addMaster','1');
INSERT INTO 5w_admin_action VALUES('76','','1208078540','修改管理员','36','updateMaster','1');
INSERT INTO 5w_admin_action VALUES('77','','1208078540','删除管理员','36','delMaster','1');
INSERT INTO 5w_admin_action VALUES('78','','1208078540','权限管理列表','37','viewAdminAction','1');
INSERT INTO 5w_admin_action VALUES('79','','1208078540','添加权限','37','addAdminAction','1');
INSERT INTO 5w_admin_action VALUES('80','','1208078540','禁用权限','37','updateAdminAction','1');
INSERT INTO 5w_admin_action VALUES('81','','1208078540','删除权限','37','delAdminAction','1');
INSERT INTO 5w_admin_action VALUES('82','','1208078540','查看管理模块','38','viewAdminModule','1');
INSERT INTO 5w_admin_action VALUES('83','','1208078540','添加管理模块','38','addAdminModule','1');
INSERT INTO 5w_admin_action VALUES('84','','1208078540','修改管理模块','38','updateAdminModule','1');
INSERT INTO 5w_admin_action VALUES('85','','1208078540','删除管理模块','38','delAdminModule','1');
INSERT INTO 5w_admin_action VALUES('93','','1208061825','系统工具','39','useTools','1');
INSERT INTO 5w_admin_action VALUES('94','','1208061825','密码修改','40','updateMasterPwd','1');
INSERT INTO 5w_admin_action VALUES('106','','1213263532','查看管理日志','44','viewAdminLog','1');
INSERT INTO 5w_admin_action VALUES('155','1223974952','1223974952','查看站点列表','71','viewSite','1');
INSERT INTO 5w_admin_action VALUES('156','1223974952','1223974952','添加站点','71','addSite','1');
INSERT INTO 5w_admin_action VALUES('157','1223974952','1223974952','删除站点','71','delSite','1');
INSERT INTO 5w_admin_action VALUES('158','1223974952','1223974952','修改站点','71','updateSite','1');
INSERT INTO 5w_admin_action VALUES('159','1223975037','1223975037','查看分类表','70','viewSiteType','1');
INSERT INTO 5w_admin_action VALUES('160','1223975037','1223975037','添加分类','70','addSiteType','1');
INSERT INTO 5w_admin_action VALUES('161','1223975037','1223975037','删除分类','70','delSiteType','1');
INSERT INTO 5w_admin_action VALUES('162','1223975037','1223975037','修改分类','70','updateSiteType','1');
INSERT INTO 5w_admin_action VALUES('163','1278585153','1278585153','站点审核','72','checkSite','1');
INSERT INTO 5w_admin_action VALUES('164','1278916057','1278916057','查看留言列表','74','viewMessage','1');
INSERT INTO 5w_admin_action VALUES('165','1278916057','1278916057','删除留言','74','delMessage','1');
INSERT INTO 5w_admin_action VALUES('166','1279353505','1279353505','用户站点','75','viewUserSite','1');
INSERT INTO 5w_admin_action VALUES('167','1280312584','1280312584','静态管理','76','doCache','1');
INSERT INTO 5w_admin_action VALUES('168','','','页面修改','80','domodify','1');
INSERT INTO 5w_admin_action VALUES('169','','','添加新闻','79','addnews','1');
INSERT INTO 5w_admin_action VALUES('170','','','添加新闻','79','doaddnews','1');
INSERT INTO 5w_admin_action VALUES('171','','','新闻管理','81','newsManage','1');
INSERT INTO 5w_admin_action VALUES('172','','','管理新闻','82','manageNews','1');
INSERT INTO 5w_admin_action VALUES('173','','','管理类别','83','manageNewsType','1');
INSERT INTO 5w_admin_action VALUES('174','','','配置修改','77','adminSiteSetting','1');
INSERT INTO 5w_admin_action VALUES('175','','','广告管理','84','adminAd','1');

INSERT INTO 5w_admin_ad VALUES('1','index01','首页头部广告','<iframe src=\"http://www.5w.com/data/html/tmall.htm\" width=\"390\" height=\"60\" SCROLLING=\"no\" FRAMEBORDER=\"0\" style=\"top:0px;left:0px;\"></iframe>','2','0','358','60');
INSERT INTO 5w_admin_ad VALUES('45','index01','首页头部广告','<a title=\"最快的比特币实时行情\" href=\"http://z.btc123.com/\"><img src=\"http://www.btc123.com/static/images/anti_block/358_60_line_z.btc123.png\"></a>','1','0','358','60');
INSERT INTO 5w_admin_ad VALUES('4','index02','首页头部右边广告','<a title=\"实时委单深度\" href=\"http://mm.btc123.com/btcchina.php\"><img alt=\"比特币中国深度\" src=\"http://www.btc123.com/static/images/anti_block/mm_btcc.png\" /></a>','3','1','100','60');
INSERT INTO 5w_admin_ad VALUES('42','index01','首页头部广告','<a href=\"https://btcchina.com/\"><img src=\"http://www.btc123.com/static/images/anti_block/btcc_v4.png\" alt=\"比特币中国\"></a>','3','1','358','60');
INSERT INTO 5w_admin_ad VALUES('6','index03','搜索右侧广告','<a href=\"http://tuan.5w.com/\">今日团购</a>','4','0','100','25');
INSERT INTO 5w_admin_ad VALUES('9','index02','首页头部右边广告','<a title=\"比特币中文论坛\" href=\"http://www.btcbbs.com/\"><img src=\"http://www.btc123.com/static/images/btcbbs_logo_100_60.png\" /></a>','5','1','100','60');
INSERT INTO 5w_admin_ad VALUES('10','index03','搜索右侧广告','<a href=\"https://docs.google.com/document/d/1W76HmWVxd-XfLm95yI2G0hPIuYBNqSVJ80k7DnWwRXo/pub\">每日派息0.016%</a>','3','1','100','25');
INSERT INTO 5w_admin_ad VALUES('13','index04','中间文字广告','<a href=\"http://www.taobao.com\"><font color=\"#539043\">淘</font><font color=\"#3b5998\">宝</font><font color=\"#ca9333\">皇</font><font color=\"#3b5998\">冠</font><font color=\"#539043\">店</font></a>','1','1','80','25');
INSERT INTO 5w_admin_ad VALUES('30','index06','内页广告','<a title=\"最快的比特币实时行情\" href=\"http://z.btc123.com/\"><img alt=\"比特币行情汇总\" src=\"http://www.btc123.com/static/images/anti_block/120_60_ads_p.png\"></a>','2','1','120','60');
INSERT INTO 5w_admin_ad VALUES('16','index04','中间文字广告','<a href=\"http://tuan.5w.com/\">团购大全</a>','2','0','80','25');
INSERT INTO 5w_admin_ad VALUES('17','index04','中间文字广告','<a href=\"http://www.aata.at/?id=5w\">免费电视棒</a>','4','0','80','25');
INSERT INTO 5w_admin_ad VALUES('18','index04','中间文字广告','<a href=\"http://www.k015.com/3/index.asp?id=1128\">减肥瘦到尖叫</a>','6','0','80','25');
INSERT INTO 5w_admin_ad VALUES('19','index04','中间文字广告','<a href=\"http://www.kdtx888.com/\">一折充值卡</a>','7','1','80','25');
INSERT INTO 5w_admin_ad VALUES('20','index04','中间文字广告','<a href=\"http://www.3158.cn/?site=dh5w\">99个好项目</a>','7','0','80','25');
INSERT INTO 5w_admin_ad VALUES('39','index03','搜索右侧广告','<a href=\"https://yesbtc.co\">比特汇 担保交易</a>','2','1','100','25');
INSERT INTO 5w_admin_ad VALUES('22','index04','中间文字广告','<a href=\"http://www.baidu.com\">baidu</a>','9','0','80','25');
INSERT INTO 5w_admin_ad VALUES('24','index05','名站导航广告','<a href=\"http://z.btc123.com\" style=\"font-size:12px;color:#A01400\">行情页面汇总(推荐)</a>','5','1','123','30');
INSERT INTO 5w_admin_ad VALUES('25','index05','名站导航广告','<a href=\"http://info.btc123.com/index_btcchina.php\" style=\"font-size:12px;color:#178517;\" target=\"_blank\">比特币中国实时价格</a>','10','1','123','30');
INSERT INTO 5w_admin_ad VALUES('26','index05','名站导航广告','<a href=\"http://ss.btc123.com\" style=\"font-size:12px;color:#fd5151;\" target=\"_blank\">比特币美元实时价格</a>','15','1','123','30');
INSERT INTO 5w_admin_ad VALUES('27','index05','名站导航广告','<a href=\"http://mm.btc123.com/btcchina.php\" style=\"font-size:12px;color:#178517;\" target=\"_blank\">比特币中国买卖深度</a>','20','1','123','30');
INSERT INTO 5w_admin_ad VALUES('28','index05','名站导航广告','<a href=\"http://info.btc123.com/\" style=\"font-size:12px;color:#fd5151;\" target=\"_blank\">MtGox美元价格(K线)</a>','25','1','123','30');
INSERT INTO 5w_admin_ad VALUES('29','index05','名站导航广告','<a href=\"http://www.btcbbs.com/\" style=\"font-size:12px;color:#178517;\" target=\"_blank\">比特币资讯论坛(中)</a>','30','1','123','30');
INSERT INTO 5w_admin_ad VALUES('34','mztop','名站首行新浪','<a href=\"http://www.sina.com.cn/\">新浪</a> - <a href=\"http://weibo.com/\">微博</a><em class=\"sina\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;font-size:12px\"><span class=\"arrow\">sina</span><a href=\"http://weibo.com/btc123\">BTC123微博</a><a href=\"http://weibo.com/u/3244140934\">比特币洋洋访谈</a><a href=\"http://weibo.com/kingofcurrency\">货币之王比特币</a><a href=\"http://weibo.com/bitcoinqqagent\">比特币QQagent</a><a href=\"http://weibo.com/bitcoinchina\">比特币中国</a><a href=\"http://weibo.com/jiehangchen\">比特币中文</a></div>','20','1','0','0');
INSERT INTO 5w_admin_ad VALUES('32','index06','内页广告','<img src=\"http://www.btc123.com/static/images/btcoinRun_120_60.png\" />','1','0','120','60');
INSERT INTO 5w_admin_ad VALUES('38','mztop','名站首行腾讯','<a href=\"http://www.qq.com/\">腾讯</a> - <a href=\"http://www.soso.com/\">搜搜</a><em class=\"tencent\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display: none;\"><span class=\"arrow\">qq</span><a href=\"http://qzone.qq.com/\">Qzone</a><a href=\"http://t.qq.com/\">腾讯微博</a><a href=\"http://news.qq.com/\">腾讯新闻</a><a href=\"http://finance.qq.com\">腾讯财经</a><a href=\"http://ent.qq.com\">腾讯娱乐</a><a href=\"http://auto.qq.com\">腾讯汽车</a><a href=\"http://games.qq.com/\">腾讯游戏</a></div>','35','0','0','0');
INSERT INTO 5w_admin_ad VALUES('46','mztop','名站首行百度','<a href=\"http://www.baidu.com/\">百度</a> - <a href=\"http://tieba.baidu.com/\">帖吧</a><em class=\"baidu\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;\"><span class=\"arrow\">baidu</span><a href=\"http://zhidao.baidu.com/\">百度知道</a><a href=\"http://baike.baidu.com/\">百度百科</a><a href=\"http://wenku.baidu.com/\">百度文库</a><a href=\"http://news.baidu.com/\">百度新闻</a><a href=\"http://top.baidu.com/\">搜索风云榜</a><a href=\"http://index.baidu.com/\">百度指数</a><a href=\"http://zhanzhang.baidu.com/\">站长平台</a></div>','15','1','0','0');
INSERT INTO 5w_admin_ad VALUES('47','mztop','名站首行比特币','<a href=\"http://bitcoin.org/\">BTC官网</a> - <a href=\"https://bitcointalk.org/\">Talk</a><em class=\"bitcoin\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;\"><span class=\"arrow\">bitcoin</span>\r\n<a href=\"https://bitcoin.it/\">官方Wiki</a><a href=\"https://zh-cn.bitcoi​n.it\">中文维基</a><a href=\"http://bitcoin.org/clients.html\">客户端</a><a href=\"http://www.weusecoins.com/\" style=\"font-size:12px\">We Use Coins</a><a href=\"http://bitcoin.stackexchange.com/\">Q & A</a><a href=\"http://webchat.freenode.net/?channels=bitcoin&uio=d4\">IRC</a></div>','12','1','0','0');
INSERT INTO 5w_admin_ad VALUES('48','mztop','名站首行Google','<a href=\"http://www.google.com/\">谷歌</a> - <a href=\"http://www.google.com.hk/trends/explore#q=bitcoin\">趋势</a><em class=\"google\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;\"><span class=\"arrow\">google</span><a href=\"http://translate.google.com/\">翻译</a><a href=\"http://images.google.com/\">图片</a><a href=\"http://ditu.google.cn/\">地图</a><a href=\"http://www.gmail.com/\">Gmail</a><a href=\"http://books.google.com.hk/\">图书</a></div>','25','1','0','0');
INSERT INTO 5w_admin_ad VALUES('49','mztop','名站首行豆瓣','<a href=\"http://www.douban.com/\">豆瓣</a> - <a href=\"http://movie.douban.com/\">电影</a><em class=\"douban\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;\"><span class=\"arrow\">douban</span><a href=\"http://book.douban.com/\">豆瓣读书</a><a href=\"http://music.douban.com/\">豆瓣音乐</a><a href=\"http://douban.fm/\">豆瓣FM</a><a href=\"http://www.douban.com/group/\">小组</a></div>','30','0','0','0');
INSERT INTO 5w_admin_ad VALUES('50','index02','首页头部右边广告','<a title=\"比特人\" href=\"http://www.btcman.com/\"><img alt=\"btcman\" src=\"http://www.btc123.com/static/images/anti_block/btcman.png\" /></a>','2','0','100','60');
INSERT INTO 5w_admin_ad VALUES('51','mztop','名站首行btcchina','<a style=\"color: #ff6600;\" href=\"https://btcchina.com/\">比特币中国</a> - <a href=\"http://weibo.com/bitcoinchina\">微博</a>\r\n<em class=\"btcchina\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em>\r\n<div class=\"tsbox\" style=\"display:none;font-size:12px\"><span class=\"arrow\">btcc</span>\r\n<a href=\"http://btcchina.org/\">比特币中国百科</a>\r\n<a href=\"https://weibo.com/bitcoinchina\">btcc官微</a>\r\n<a href=\"https://btcchina.com/?lang=en\">英文版交易</a>\r\n</div>','5','1','0','0');
INSERT INTO 5w_admin_ad VALUES('52','mztop','名站首行火币网','<a style=\"color: #178517;\" href=\"https://www.huobi.com/index.php?utm_source=btc123_1\">火币网</a> - <a href=\"https://www.huobi.com/?a=regist_gift&utm_source=12352\">免费领币</a><em class=\"huobi\" onmouseover=\"mmover(this)\" onmouseout=\"mmout()\"></em><div class=\"tsbox\" style=\"display:none;\"><span class=\"arrow\">baidu</span><a href=\"https://s.huobi.com\">模拟交易</a><a href=\"https://www.huobi.com/index.php?utm_source=btc123_2\">实盘交易</a><a href=\"https://www.huobi.com/?a=regist_gift&utm_source=12352\">免费领取BTC</a></div>','10','1','0','0');

INSERT INTO 5w_admin_ag VALUES('3005','viewUser','1');
INSERT INTO 5w_admin_ag VALUES('3006','updateUser','1');
INSERT INTO 5w_admin_ag VALUES('3007','lockUser','1');
INSERT INTO 5w_admin_ag VALUES('3008','delUser','1');
INSERT INTO 5w_admin_ag VALUES('3009','viewAdminGroup','1');
INSERT INTO 5w_admin_ag VALUES('3010','addAdminGroup','1');
INSERT INTO 5w_admin_ag VALUES('3011','updateAdminGroup','1');
INSERT INTO 5w_admin_ag VALUES('3012','delAdminGroup','1');
INSERT INTO 5w_admin_ag VALUES('3013','viewMaster','1');
INSERT INTO 5w_admin_ag VALUES('3014','addMaster','1');
INSERT INTO 5w_admin_ag VALUES('3015','updateMaster','1');
INSERT INTO 5w_admin_ag VALUES('3016','delMaster','1');
INSERT INTO 5w_admin_ag VALUES('3017','viewAdminAction','1');
INSERT INTO 5w_admin_ag VALUES('3018','addAdminAction','1');
INSERT INTO 5w_admin_ag VALUES('3019','updateAdminAction','1');
INSERT INTO 5w_admin_ag VALUES('3020','delAdminAction','1');
INSERT INTO 5w_admin_ag VALUES('3021','viewAdminModule','1');
INSERT INTO 5w_admin_ag VALUES('3022','addAdminModule','1');
INSERT INTO 5w_admin_ag VALUES('3023','updateAdminModule','1');
INSERT INTO 5w_admin_ag VALUES('3024','delAdminModule','1');
INSERT INTO 5w_admin_ag VALUES('3025','useTools','1');
INSERT INTO 5w_admin_ag VALUES('3026','updateMasterPwd','1');
INSERT INTO 5w_admin_ag VALUES('3027','viewAdminLog','1');
INSERT INTO 5w_admin_ag VALUES('3028','viewSite','1');
INSERT INTO 5w_admin_ag VALUES('3029','addSite','1');
INSERT INTO 5w_admin_ag VALUES('3030','delSite','1');
INSERT INTO 5w_admin_ag VALUES('3031','updateSite','1');
INSERT INTO 5w_admin_ag VALUES('3032','viewSiteType','1');
INSERT INTO 5w_admin_ag VALUES('3033','addSiteType','1');
INSERT INTO 5w_admin_ag VALUES('3034','delSiteType','1');
INSERT INTO 5w_admin_ag VALUES('3035','updateSiteType','1');
INSERT INTO 5w_admin_ag VALUES('3036','checkSite','1');
INSERT INTO 5w_admin_ag VALUES('3037','viewMessage','1');
INSERT INTO 5w_admin_ag VALUES('3038','delMessage','1');
INSERT INTO 5w_admin_ag VALUES('3039','viewUserSite','1');
INSERT INTO 5w_admin_ag VALUES('3040','doCache','1');
INSERT INTO 5w_admin_ag VALUES('3041','updatemodify','1');
INSERT INTO 5w_admin_ag VALUES('3042','domodify','1');
INSERT INTO 5w_admin_ag VALUES('3043','addnews','1');
INSERT INTO 5w_admin_ag VALUES('3044','doaddnews','1');
INSERT INTO 5w_admin_ag VALUES('3045','newsManage','1');
INSERT INTO 5w_admin_ag VALUES('3047','manageNews','1');
INSERT INTO 5w_admin_ag VALUES('3048','updatenews','1');
INSERT INTO 5w_admin_ag VALUES('3049','doupdatenews','1');
INSERT INTO 5w_admin_ag VALUES('3050','deletenews','1');
INSERT INTO 5w_admin_ag VALUES('3051','manageNewsType','1');
INSERT INTO 5w_admin_ag VALUES('3052','addNewsType','1');
INSERT INTO 5w_admin_ag VALUES('3053','adminSiteSetting','1');
INSERT INTO 5w_admin_ag VALUES('3054','adminAd','1');

INSERT INTO 5w_admin_group VALUES('1','1','1','系统管理组','系统管理组','1');

INSERT INTO 5w_admin_help VALUES('1','adminSiteSetting','1','<p>网站配置相关说明</p>');
INSERT INTO 5w_admin_help VALUES('2','adminsite_famous','1','<p>名站导航相关说明</p>');

INSERT INTO 5w_admin_log VALUES('1','1340807035','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('2','1340807246','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('3','1340807476','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('4','1340900008','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('5','1340900192','izung','添加广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('6','1340900207','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('7','1340932662','izung','添加广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('8','1340942015','izung','添加广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('9','1340942189','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('10','1340953151','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('11','1340953360','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_4.php');
INSERT INTO 5w_admin_log VALUES('12','1341122493','izung','删除管理模块','114.89.218.87','/evaqinadmin/adminSysModule.php');
INSERT INTO 5w_admin_log VALUES('13','1341122542','izung','删除管理模块','114.89.218.87','/evaqinadmin/adminSysModule.php');
INSERT INTO 5w_admin_log VALUES('14','1341195263','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('15','1341195274','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('16','1341197452','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('17','1341202474','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('18','1341202488','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('19','1341202647','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('20','1341203468','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('21','1341249189','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('22','1341249240','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('23','1342066011','izung','修改广告','114.89.218.87','/evaqinadmin/adminAd_4.php');
INSERT INTO 5w_admin_log VALUES('24','1346258360','izung','修改广告','61.165.181.96','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('25','1346258538','izung','修改广告','61.165.181.96','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('26','1347011298','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('27','1347011363','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('28','1347011496','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('29','1347012802','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('30','1347012851','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('31','1347012966','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('32','1347013050','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('33','1347013218','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('34','1347013658','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('35','1347013699','izung','回复留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('36','1347013729','izung','删除留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('37','1347013738','izung','删除留言','180.175.21.115','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('38','1347604571','izung','修改广告','114.95.225.93','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('39','1348065556','izung','修改广告','114.89.209.4','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('40','1349710252','izung','删除留言','116.238.17.165','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('41','1351393072','izung','回复留言','116.238.16.83','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('42','1358521052','izung','删除留言','58.39.206.17','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('43','1359196994','izung','修改广告','58.39.206.17','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('44','1359197074','izung','修改广告','58.39.206.17','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('45','1361428620','izung','删除留言','114.82.48.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('46','1361428655','izung','回复留言','114.82.48.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('47','1361428690','izung','回复留言','114.82.48.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('48','1361764807','izung','删除留言','221.239.243.85','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('49','1361764815','izung','删除留言','221.239.243.85','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('50','1362473862','izung','修改广告','221.239.243.85','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('51','1362583823','izung','删除留言','221.239.243.85','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('52','1362583846','izung','回复留言','221.239.243.85','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('53','1363274436','izung','管理员修改密码','180.152.158.165','/evaqinadmin/adminMasterPwd.php');
INSERT INTO 5w_admin_log VALUES('54','1363333577','izung','删除留言','180.152.158.165','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('55','1364195022','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('56','1364526255','izung','添加广告','221.239.255.139','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('57','1364526290','izung','修改广告','221.239.255.139','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('58','1364526308','izung','修改广告','221.239.255.139','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('59','1364526355','izung','修改广告','221.239.255.139','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('60','1365315264','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('61','1365315277','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('62','1365315305','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('63','1365315316','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('64','1365315383','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('65','1365315486','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('66','1365315494','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('67','1365315509','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('68','1365315638','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('69','1365386047','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('70','1365390357','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('71','1365424646','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('72','1365478898','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('73','1365515200','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('74','1365561133','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('75','1365647722','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('76','1365647787','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('77','1365670745','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('78','1365756246','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('79','1365756257','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('80','1365756473','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('81','1365818480','izung','删除留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('82','1365818682','izung','回复留言','221.239.255.139','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('83','1366014326','izung','删除留言','180.175.16.121','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('84','1366014488','izung','回复留言','180.175.16.121','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('85','1366162679','izung','回复留言','58.39.206.74','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('86','1366162690','izung','删除留言','58.39.206.74','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('87','1366162771','izung','回复留言','58.39.206.74','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('88','1366336371','izung','修改广告','114.95.57.32','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('89','1366336465','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('90','1366336516','izung','修改广告','114.95.57.32','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('91','1366391256','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('92','1366423483','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('93','1366456991','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('94','1366461480','izung','修改广告','114.95.57.32','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('95','1366461572','izung','修改广告','114.95.57.32','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('96','1366475524','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('97','1366475607','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('98','1366517285','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('99','1366596607','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('100','1366596871','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('101','1366598558','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('102','1366598585','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('103','1366599092','izung','回复留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('104','1366679905','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('105','1366712469','izung','删除留言','114.95.57.32','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('106','1366802865','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('107','1366818915','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('108','1366887074','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('109','1367027482','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('110','1367218777','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('111','1367218785','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('112','1367229079','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('113','1367236522','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('114','1367236538','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('115','1367245363','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('116','1367310196','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('117','1367429274','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('118','1367578261','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('119','1367578310','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('120','1367645596','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('121','1367645660','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('122','1367651715','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('123','1367651722','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('124','1367651842','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('125','1367728441','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('126','1367767617','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_4.php');
INSERT INTO 5w_admin_log VALUES('127','1367828440','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('128','1367923870','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('129','1367923943','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('130','1367923956','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('131','1367924102','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('132','1367924302','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('133','1367946467','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('134','1367979053','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('135','1368065519','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('136','1368101494','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('137','1368235401','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('138','1368364276','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('139','1368378767','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('140','1368409413','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('141','1368525064','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('142','1368538871','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('143','1368584897','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('144','1368629513','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('145','1368632070','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('146','1368669041','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('147','1368676469','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('148','1368714291','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('149','1368877894','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('150','1368885452','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('151','1368885717','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('152','1368885785','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('153','1368885810','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('154','1368885890','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('155','1368944288','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('156','1368956180','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('157','1368956302','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('158','1368956415','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('159','1368956659','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('160','1368956736','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('161','1368956776','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('162','1368956826','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('163','1368967015','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('164','1369005149','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('165','1369025568','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('166','1369098077','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('167','1369133903','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('168','1369148589','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('169','1369181912','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('170','1369181918','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('171','1369321290','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('172','1369377040','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('173','1369377153','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('174','1369405175','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('175','1369445144','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('176','1369489728','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('177','1369546002','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('178','1369583576','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('179','1369621560','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('180','1369722669','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('181','1369722678','izung','修改广告','180.156.170.69','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('182','1370077864','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('183','1370172480','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('184','1370172644','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('185','1370225655','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('186','1370225803','izung','回复留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('187','1370261709','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('188','1370273405','izung','删除留言','180.156.170.69','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('189','1370440593','izung','删除留言','180.156.170.21','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('190','1370489171','izung','删除留言','180.156.170.21','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('191','1370507996','izung','删除留言','180.156.170.21','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('192','1370597657','izung','修改广告','180.156.170.21','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('193','1370597747','izung','修改广告','180.156.170.21','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('194','1370597761','izung','修改广告','180.156.170.21','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('195','1370597767','izung','修改广告','180.156.170.21','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('196','1370610397','izung','删除留言','114.82.50.228','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('197','1370925860','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('198','1370925872','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('199','1370925924','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('200','1370926025','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('201','1371003123','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('202','1371268349','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('203','1371382764','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('204','1371394452','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('205','1371394480','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('206','1371435314','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('207','1371438966','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('208','1371440303','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('209','1371558940','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('210','1371561952','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('211','1371607289','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('212','1371698998','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('213','1371915432','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('214','1371915473','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('215','1371959491','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('216','1372153566','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('217','1372153602','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('218','1372153632','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('219','1372175083','izung','修改广告','116.238.3.62','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('220','1372850776','izung','删除留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('221','1372851107','izung','回复留言','116.238.3.62','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('222','1373884683','izung','删除留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('223','1373884885','izung','回复留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('224','1373884926','izung','回复留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('225','1373884979','izung','回复留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('226','1373885016','izung','删除留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('227','1373885088','izung','回复留言','140.206.200.162','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('228','1374115409','izung','回复留言','140.206.201.59','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('229','1374582002','izung','回复留言','180.156.168.54','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('230','1374591823','izung','修改广告','140.206.201.59','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('231','1374929507','izung','修改广告','140.206.201.164','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('232','1374929566','izung','修改广告','140.206.201.164','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('233','1375546324','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('234','1375546344','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('235','1375546933','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('236','1376030836','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('237','1376033264','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('238','1376226511','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('239','1376226557','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('240','1376226610','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('241','1376226642','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('242','1376226670','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('243','1376226907','izung','回复留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('244','1376227113','izung','回复留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('245','1376234589','izung','回复留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('246','1376238153','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('247','1376238223','izung','回复留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('248','1376238252','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('249','1376239429','izung','修改广告','114.82.44.153','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('250','1376239468','izung','修改广告','114.82.44.153','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('251','1376239665','izung','修改广告','114.82.44.153','/evaqinadmin/adminAd_6.php');
INSERT INTO 5w_admin_log VALUES('252','1376313029','izung','删除留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('253','1376313095','izung','回复留言','114.82.44.153','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('254','1376624208','izung','修改广告','140.206.201.64','/evaqinadmin/adminAd_5.php');
INSERT INTO 5w_admin_log VALUES('255','1376748304','izung','删除留言','58.39.217.23','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('256','1378223905','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('257','1378224027','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('258','1378224353','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('259','1378224366','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('260','1378570963','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('261','1378739164','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('262','1378739173','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('263','1378739246','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('264','1378739283','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('265','1378739307','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('266','1378742297','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('267','1378742305','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('268','1378746677','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('269','1378746734','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('270','1378804306','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('271','1379072363','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('272','1379376656','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('273','1379388652','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('274','1379388685','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('275','1379473390','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_3.php');
INSERT INTO 5w_admin_log VALUES('276','1379499863','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('277','1379499935','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('278','1379499941','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('279','1379502632','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('280','1379502639','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('281','1379674797','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('282','1380026359','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('283','1380026365','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('284','1380035326','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('285','1380035332','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_2.php');
INSERT INTO 5w_admin_log VALUES('286','1380203603','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('287','1380204097','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('288','1380431305','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('289','1380672168','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('290','1381282466','izung','删除留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('291','1381308501','izung','修改广告','221.239.253.90','/evaqinadmin/adminAd_1.php');
INSERT INTO 5w_admin_log VALUES('292','1381442105','izung','回复留言','221.239.253.90','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('293','1381751960','izung','删除留言','222.72.183.51','/evaqinadmin/adminMessage.php');
INSERT INTO 5w_admin_log VALUES('294','1382030861','izung','删除留言','222.72.183.51','/evaqinadmin/adminMessage.php');

INSERT INTO 5w_admin_master VALUES('izung','1','','1363274436','fd4fa6fc2d6ba683338fd1fce9ab5dbf','izung','','383','222.72.183.51','1382030841','1');


INSERT INTO 5w_admin_module VALUES('2','1','网站配置','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('6','11','系统管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('7','7','数据管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('38','0','模块管理','adminSysModule.php','6','1');
INSERT INTO 5w_admin_module VALUES('40','0','密码修改','adminMasterPwd.php','6','1');
INSERT INTO 5w_admin_module VALUES('69','3','站点管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('72','2','站点申请审核','adminSiteCheck.php','69','1');
INSERT INTO 5w_admin_module VALUES('73','6','留言管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('74','0','留言列表','adminMessage.php','73','1');
INSERT INTO 5w_admin_module VALUES('82','0','基本信息设置','adminSiteSetting.php','2','1');
INSERT INTO 5w_admin_module VALUES('83','9','广告管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('84','2','首页管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('90','2','名站导航管理','adminsite_famous.php','84','1');
INSERT INTO 5w_admin_module VALUES('98','0','数据备份优化','backupController.php','7','1');
INSERT INTO 5w_admin_module VALUES('100','0','数据恢复','restoreController.php','7','1');
INSERT INTO 5w_admin_module VALUES('102','1','首页头部广告','adminAd_1.php','83','1');
INSERT INTO 5w_admin_module VALUES('103','2','首页头部右边广告','adminAd_2.php','83','1');
INSERT INTO 5w_admin_module VALUES('105','8','生成静态','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('106','0','生成静态','adminCache.php','105','1');
INSERT INTO 5w_admin_module VALUES('107','5','中间文字广告','adminAd_4.php','83','1');
INSERT INTO 5w_admin_module VALUES('108','4','名站导航广告','adminAd_5.php','83','1');
INSERT INTO 5w_admin_module VALUES('113','3','酷站导航管理','admincoolframeset.php','84','1');
INSERT INTO 5w_admin_module VALUES('114','5','页脚导航管理','adminfootframeset.php','84','1');
INSERT INTO 5w_admin_module VALUES('116','4','主题管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('117','0','更换主题','theme.php','116','1');
INSERT INTO 5w_admin_module VALUES('118','5','自定义导航','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('119','3','会员列表','adminUser.php','118','1');
INSERT INTO 5w_admin_module VALUES('120','4','会员站点','adminUserSite.php','118','1');
INSERT INTO 5w_admin_module VALUES('121','1','收录站点管理','adminsiteframeset.php','69','1');
INSERT INTO 5w_admin_module VALUES('122','3','批量导入网址','adminSiteImport.php','69','1');
INSERT INTO 5w_admin_module VALUES('123','1','自定义设置','adminUserSetting.php','118','1');
INSERT INTO 5w_admin_module VALUES('124','2','默认网址设置','adminselfframeset.php','118','1');
INSERT INTO 5w_admin_module VALUES('125','2','外发邮箱设置','adminSiteSetting.php?p=mail','2','1');
INSERT INTO 5w_admin_module VALUES('126','2','缓存设置','adminSiteSetting.php?p=cache','118','1');
INSERT INTO 5w_admin_module VALUES('127','4','网址回收站','adminSiteBack.php','69','1');
INSERT INTO 5w_admin_module VALUES('129','6','名站切换栏管理','adminsite_other.php','84','1');
INSERT INTO 5w_admin_module VALUES('138','3','站点数据清空','restoreController.php?a=truncate','7','1');
INSERT INTO 5w_admin_module VALUES('139','1','搜索分类管理','adminSearchType.php','141','1');
INSERT INTO 5w_admin_module VALUES('140','2','搜索引擎管理','adminSearch.php','141','1');
INSERT INTO 5w_admin_module VALUES('141','4','搜索管理','left.php','0','1');
INSERT INTO 5w_admin_module VALUES('142','6','内页广告','adminAd_6.php','83','1');
INSERT INTO 5w_admin_module VALUES('143','3','搜索关键字管理','adminSearchKeywords.php','141','1');
INSERT INTO 5w_admin_module VALUES('144','1','名站首行管理','adminMztop.php','84','1');
INSERT INTO 5w_admin_module VALUES('145','4','实用工具管理','adminsite_tool.php','84','1');
INSERT INTO 5w_admin_module VALUES('146','7','左侧导航管理','adminleftframeset.php','84','1');
INSERT INTO 5w_admin_module VALUES('147','3','搜索右侧广告','adminAd_3.php','83','1');
INSERT INTO 5w_admin_module VALUES('148','0','二级页面模板管理','subtemplates.php','116','1');

INSERT INTO 5w_apply_site VALUES('10','1364973471','比特币棋牌游戏','http://www.btcqp.com','0','156784','909613200','2013年1月');
INSERT INTO 5w_apply_site VALUES('14','1367053112','比特币交易工具','maomaoyu213.vicp.cc','0','2147483647','2855044863','2013年4月2日');
INSERT INTO 5w_apply_site VALUES('15','1367055644','比特币800','www.btc800.com','0','0','576405067','1个月');
INSERT INTO 5w_apply_site VALUES('16','1367706186','点对点货币综合资讯','p2pbucks.com','0','0','banlieuef@gmail.com','2013年4月25日');
INSERT INTO 5w_apply_site VALUES('17','1369329306','比特币论坛','http://www.DWbbs.com','0','7','581929','2013.3.1');
INSERT INTO 5w_apply_site VALUES('18','1369386727','goddice','www.goddice.info','0','0','MSN k77366@live.com','');
INSERT INTO 5w_apply_site VALUES('19','1369975775','莱特比中文网','www.laitebi.com','0','12','2272497','5月');
INSERT INTO 5w_apply_site VALUES('20','1370007071','比特国际','btcicc.com','0','0','85533661','新站');
INSERT INTO 5w_apply_site VALUES('21','1370104158','比特币交易','www.bitcoin-chinese.com','0','313132','303869349','');
INSERT INTO 5w_apply_site VALUES('22','1370111822','BTC零售回购','http://item.taobao.com/item.htm?spm=686.1000925.1000774.21.WvMHmn&id=24911104095','0','100','QQ104699','2013年6月2日');
INSERT INTO 5w_apply_site VALUES('23','1370166067','兰州博客','http://lanzhou.name/','0','1000','854946788','1年');
INSERT INTO 5w_apply_site VALUES('24','1370417608','老虎矿机','www.tigerminer.com','0','0','1596718620','');
INSERT INTO 5w_apply_site VALUES('25','1371302139','比特币交互平台','https://btcltc.com','0','0','38533163','2013/6/15');
INSERT INTO 5w_apply_site VALUES('26','1371366582','老虎矿机','www.tigerminer.com','0','0','２９１０７３６４','');
INSERT INTO 5w_apply_site VALUES('27','1372512318','比特币门三百网','http://www.men300.com/','0','8','398740479','2001.11');
INSERT INTO 5w_apply_site VALUES('28','1372575140','易易币（易易数字加密货币资讯）','http://eecoin.net','0','0','QQ：17106298','2013-06-29');
INSERT INTO 5w_apply_site VALUES('29','1373132875','just-dice','https://just-dice.com/','0','3','11','');
INSERT INTO 5w_apply_site VALUES('30','1373459630','比特币中文门户','http://www.btc800.com/','0','924','917015406','2013年04月13日');
INSERT INTO 5w_apply_site VALUES('31','1373632095','LTC模拟交易平台','http://www.ltcbase.com/','0','0','2019216205','');
INSERT INTO 5w_apply_site VALUES('32','1374143555','比特国际论坛','btcicc.com','0','0','85533661','一个多月');
INSERT INTO 5w_apply_site VALUES('33','1374236200','比特时代','http://www.btc38.com','0','974','2921757715','2013年5月');
INSERT INTO 5w_apply_site VALUES('34','1374848714','796交易所','https://796.com/','0','380913','决胜千里Q376768','2013.6');
INSERT INTO 5w_apply_site VALUES('35','1375330694','比特币大乐透','http://www.btcgame.cc','0','0','112480509','2013-08-01');
INSERT INTO 5w_apply_site VALUES('36','1375495186','欢乐95比特币','http://www.huanle95.com/btc','0','19860427','21112469','2013-06-05');
INSERT INTO 5w_apply_site VALUES('37','1375589743','东部列车旅游','http://www.donfcar.com','0','113562','1149951481@qq.com','2013年5月17日');
INSERT INTO 5w_apply_site VALUES('38','1375772134','5个骰子','https://www.5dices.co','0','0','near0@msn.com','');
INSERT INTO 5w_apply_site VALUES('39','1375857624','比特币大乐透','http://www.btcgame.cc','0','0','112480509','2013-08-01');
INSERT INTO 5w_apply_site VALUES('40','1376014859','比特金网络钱包','http://www.btgold.net/','0','2000','qq860197372','2013-6');
INSERT INTO 5w_apply_site VALUES('41','1376419995','BTC江湖，比特币江湖','www.btcwan.com','0','0','2949501481','');
INSERT INTO 5w_apply_site VALUES('42','1376491492','ripple币话费充值','www.rippletele.com','0','18212','1668266935@qq.com','');
INSERT INTO 5w_apply_site VALUES('43','1377078299','甲驭网络','http://www.sysfix.cn','0','4','1253140355','2008-7');
INSERT INTO 5w_apply_site VALUES('47','1377626558','莱特币官网','www.laiteb.com','0','864254','602945462','2013.3');
INSERT INTO 5w_apply_site VALUES('48','1377667130','一起挖比特币','www.175btc.com','0','10000','admin@175btc.com','2013-06');
INSERT INTO 5w_apply_site VALUES('45','1377509546','中国比特币矿池','175btc.com','0','0','435195325','2013-8-16');
INSERT INTO 5w_apply_site VALUES('46','1377591884','175btc中国比特币矿池','www.175btc.com','0','65535','58261415','2013/08/10');
INSERT INTO 5w_apply_site VALUES('49','1377748755','比特币资讯','www.chnbitcoin.com','0','0','502888444','2013-5');
INSERT INTO 5w_apply_site VALUES('50','1377749163','莱特币中文官网','http://www.laiteb.com/','0','866413','602945462','2013');
INSERT INTO 5w_apply_site VALUES('51','1377839897','BexBtc','http://bexbtc.com/','0','123456789','btcbet@yahoo.com','');
INSERT INTO 5w_apply_site VALUES('52','1377875847','BetCoin ™ Dice','www.betcoindice.tm','0','165933','betcoin@betcoin.tm','2013年8越1日');
INSERT INTO 5w_apply_site VALUES('53','1378006634','XRP传媒和实物交易平台','www.xrpmedia.com','0','787793','2485915332@qq.com','2013-08');
INSERT INTO 5w_apply_site VALUES('54','1378034381','BetCoin ™ Etertainment','www.betcoin.tm','0','188657','betcoin@betcoin.tm','2013年8月1日');
INSERT INTO 5w_apply_site VALUES('55','1378043879','挖矿机','http://www.wakuangji.cn/','0','13','tggroup@126.com','2013-6-8');
INSERT INTO 5w_apply_site VALUES('56','1378350555','Zillat Talk社区','zillat.com','0','0','249049478','');
INSERT INTO 5w_apply_site VALUES('57','1378477152','投资理财论坛-起航者','http://www.77886.cn','0','129654','739121523','');
INSERT INTO 5w_apply_site VALUES('58','1378950005','同道会','http://www.tongdaohui.com','0','1','153102250','2010年11月23日');
INSERT INTO 5w_apply_site VALUES('59','1379136531','btc008','www.btc008.com','0','14','2956190946','2013-08-08');
INSERT INTO 5w_apply_site VALUES('60','1379373341','比付宝','http://bifupay.com','0','1000000','qq:23000419','2013.9.3');
INSERT INTO 5w_apply_site VALUES('61','1379383429','比特币家园','www.btc888888.com','0','29','13061554328','');
INSERT INTO 5w_apply_site VALUES('62','1379524977','柳大师GBL港盘自动交易工具','http://btctool.info','0','0','2649116017','2013年9月6日');
INSERT INTO 5w_apply_site VALUES('63','1379817737','btcifc','https://www.btcifc.com','0','1000000','1352888755','');
INSERT INTO 5w_apply_site VALUES('64','1379983943','比特币中国网','http://www.btc126.com/','0','1000000','11841694','2013.09.10');
INSERT INTO 5w_apply_site VALUES('65','1380221529','比特币玩21点','http://www.btc-bj.com','0','0','1902064210','');
INSERT INTO 5w_apply_site VALUES('66','1380472851','开服表','www.wykfb.com','0','100000','173780433','');
INSERT INTO 5w_apply_site VALUES('67','1380611501','800山寨币','800996.com/btc','0','579908','qq:236741051','2013-03-11');
INSERT INTO 5w_apply_site VALUES('68','1380717945','比特集(比特币购物网站)','http://www.btcsmarket.com/','0','0','btcsmarket@gmail.com','2013-09');
INSERT INTO 5w_apply_site VALUES('69','1381117065','比特集','http://www.btcsmarket.com/','0','0','qq2246817085','2013-10-1');
INSERT INTO 5w_apply_site VALUES('70','1381429614','asic-ufominer','www.asic-ufominer.com','0','0','1419749187','2013年7月');
INSERT INTO 5w_apply_site VALUES('71','1381608631','比特币社区','http://zillat.com/index.php?app=invite&mod=Index&act=index&id=247','0','150','122040653','2013');
INSERT INTO 5w_apply_site VALUES('72','1382010260','比特宝','https://www.bitbill.com','0','700000','2764277783','20131001');

INSERT INTO 5w_defaultsite VALUES('11972','腾讯新闻','http://news.qq.com/','2','6');
INSERT INTO 5w_defaultsite VALUES('11973','搜狐新闻','http://news.sohu.com/','3','6');
INSERT INTO 5w_defaultsite VALUES('11968','豆豆网','http://www.doudou.com/','5','5');
INSERT INTO 5w_defaultsite VALUES('11967','腾讯游戏','http://games.qq.com/','4','5');
INSERT INTO 5w_defaultsite VALUES('11965','魔兽世界','http://www.warcraftchina.com/','2','5');
INSERT INTO 5w_defaultsite VALUES('11963','乐视网','http://www.letv.com/','7','4');
INSERT INTO 5w_defaultsite VALUES('11960','搜狐高清','http://tv.sohu.com/hdtv','4','4');
INSERT INTO 5w_defaultsite VALUES('11958','土豆网','http://www.tudou.com/','2','4');
INSERT INTO 5w_defaultsite VALUES('11955','团秀网','http://p.yiqifa.com/c?s=1db52acd&amp;w=220184&amp;c=5371&amp;i=11502&amp;l=0&amp;e=&amp;t=http://tuanxiu.cn','6','3');
INSERT INTO 5w_defaultsite VALUES('11954','满座网','http://p.yiqifa.com/c?s=7e3584ea&amp;w=220184&amp;c=5330&amp;i=11422&amp;l=0&amp;e=&amp;t=http://www.manzuo.com/','5','3');
INSERT INTO 5w_defaultsite VALUES('11953','团宝网','http://p.yiqifa.com/c?s=0d254847&amp;w=220184&amp;c=5278&amp;i=11082&amp;l=0&amp;e=&amp;t=http://www.groupon.cn','4','3');
INSERT INTO 5w_defaultsite VALUES('11952','聚美优品','http://p.yiqifa.com/c?s=5cc8a44d&amp;w=220184&amp;c=5227&amp;i=10462&amp;l=0&amp;e=&amp;t=http://www.jumei.com/','3','3');
INSERT INTO 5w_defaultsite VALUES('11977','央视网','http://www.cntv.cn/index.shtml','7','6');
INSERT INTO 5w_defaultsite VALUES('11976','中国政府网','http://www.gov.cn/','6','6');
INSERT INTO 5w_defaultsite VALUES('11975','凤凰新闻','http://news.ifeng.com/','5','6');
INSERT INTO 5w_defaultsite VALUES('11974','网易新闻','http://news.163.com/','4','6');
INSERT INTO 5w_defaultsite VALUES('11971','新浪新闻','http://news.sina.com.cn/','1','6');
INSERT INTO 5w_defaultsite VALUES('11970','多玩网','http://www.duowan.com/','7','5');
INSERT INTO 5w_defaultsite VALUES('11969','新浪游戏','http://game.sina.com.cn/','6','5');
INSERT INTO 5w_defaultsite VALUES('11966','休闲小游戏','http://game.doudou.com/','3','5');
INSERT INTO 5w_defaultsite VALUES('11964','17173','http://www.17173.com/','1','5');
INSERT INTO 5w_defaultsite VALUES('11962','酷6网','http://www.ku6.com/','6','4');
INSERT INTO 5w_defaultsite VALUES('11961','新浪视频','http://video.sina.com.cn/','5','4');
INSERT INTO 5w_defaultsite VALUES('11959','奇艺高清','http://www.qiyi.com/','3','4');
INSERT INTO 5w_defaultsite VALUES('11957','优酷网','http://www.youku.com/','1','4');
INSERT INTO 5w_defaultsite VALUES('11956','团购导航','http://tuan.5w.com/','7','3');
INSERT INTO 5w_defaultsite VALUES('11950','饭团网','http://p.yiqifa.com/c?s=5769343b&amp;w=220184&amp;c=4373&amp;i=9482&amp;l=0&amp;e=&amp;t=http://tuan.fantong.com/23/1/cps','2','3');
INSERT INTO 5w_defaultsite VALUES('11951','拉手网','http://p.yiqifa.com/c?s=fa812b72&amp;w=220184&amp;c=5298&amp;i=10942&amp;l=0&amp;e=&amp;t=http://www.lashou.com/','1','3');
INSERT INTO 5w_defaultsite VALUES('11936','百度','http://www.baidu.com/index.php?tn=5wcom_pg&amp;ch=3','1','1');
INSERT INTO 5w_defaultsite VALUES('11937','&lt;font color=red&gt;搜搜&lt;/font&gt;','http://www.soso.com/?unc=b400056&cid=union.s.wh','2','1');
INSERT INTO 5w_defaultsite VALUES('11938','搜狗','http://www.sogou.com/index.php?pid=sogou-site-8725fb777f25776f','3','1');
INSERT INTO 5w_defaultsite VALUES('11939','谷歌','http://www.google.com.hk/webhp?prog=aff&amp;client=pub-9491289701756083&amp;channel=3192690012','4','1');
INSERT INTO 5w_defaultsite VALUES('11940','有道','http://www.youdao.com/','5','1');
INSERT INTO 5w_defaultsite VALUES('11941','必应','http://cn.bing.com/','6','1');
INSERT INTO 5w_defaultsite VALUES('11942','雅虎','http://www.yahoo.cn/','7','1');
INSERT INTO 5w_defaultsite VALUES('11943','淘宝特卖','http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351859_9092254&eventid=101586','1','2');
INSERT INTO 5w_defaultsite VALUES('11944','当当网','http://p.yiqifa.com/c?s=09594d42&w=220184&c=247&i=159&l=0&e=c&t=http://www.dangdang.com','2','2');
INSERT INTO 5w_defaultsite VALUES('11945','卓越网','http://p.yiqifa.com/c?s=5e5ae424&w=220184&c=245&i=201&l=0&e=c&t=http://www.amazon.cn','5','2');
INSERT INTO 5w_defaultsite VALUES('11946','凡客诚品','http://www.gouwuluo.com/zt/?5w','4','2');
INSERT INTO 5w_defaultsite VALUES('11947','京东商城','http://p.yiqifa.com/c?s=2d61eddb&w=220184&c=4509&i=5862&l=0&e=c&t=http://www.360buy.com','3','2');
INSERT INTO 5w_defaultsite VALUES('11948','梦芭萨','http://www.gouwuluo.com/www/?moonbasa','6','2');
INSERT INTO 5w_defaultsite VALUES('11949','淘宝网','http://www.taobao.com/','7','2');
INSERT INTO 5w_defaultsite VALUES('11978','天籁村音乐网','http://www.6621.com/','1','7');
INSERT INTO 5w_defaultsite VALUES('11979','九天音乐','http://www.9sky.com/','2','7');
INSERT INTO 5w_defaultsite VALUES('11980','百度MP3','http://mp3.baidu.com/','3','7');
INSERT INTO 5w_defaultsite VALUES('11981','虾米音乐','http://www.xiami.com/','4','7');
INSERT INTO 5w_defaultsite VALUES('11982','酷狗音乐','http://www.kugou.com/','5','7');
INSERT INTO 5w_defaultsite VALUES('11983','音悦台','http://www.yinyuetai.com/','6','7');
INSERT INTO 5w_defaultsite VALUES('11984','一听音乐','http://www.1ting.com/','7','7');
INSERT INTO 5w_defaultsite VALUES('11985','163邮箱','http://mail.163.com/','1','8');
INSERT INTO 5w_defaultsite VALUES('11986','126邮箱','http://mail.126.com/','2','8');
INSERT INTO 5w_defaultsite VALUES('11987','139邮箱','http://mail.10086.cn/','3','8');
INSERT INTO 5w_defaultsite VALUES('11988','雅虎邮箱','http://mail.cn.yahoo.com/','4','8');
INSERT INTO 5w_defaultsite VALUES('11989','QQ邮箱','http://mail.qq.com/','5','8');
INSERT INTO 5w_defaultsite VALUES('11990','新浪邮箱','http://mail.sina.com.cn/','6','8');
INSERT INTO 5w_defaultsite VALUES('11991','Hotmail','http://www.hotmail.com/','7','8');
INSERT INTO 5w_defaultsite VALUES('11992','起点','http://www.qidian.com/','1','9');
INSERT INTO 5w_defaultsite VALUES('11993','潇湘书院','http://www.xxsy.net/','2','9');
INSERT INTO 5w_defaultsite VALUES('11994','红袖添香','http://www.hongxiu.com/','3','9');
INSERT INTO 5w_defaultsite VALUES('11995','纵横中文','http://www.zongheng.com/','4','9');
INSERT INTO 5w_defaultsite VALUES('11996','小说阅读网','http://www.readnovel.com/','5','9');
INSERT INTO 5w_defaultsite VALUES('11997','看书网','http://book.qukanshu.com/','6','9');
INSERT INTO 5w_defaultsite VALUES('11998','言情小说吧','http://www.xs8.cn/','7','9');
INSERT INTO 5w_defaultsite VALUES('11999','QQ空间','http://qzone.qq.com/','1','10');
INSERT INTO 5w_defaultsite VALUES('12000','天涯社区','http://www.tianya.cn/','2','10');
INSERT INTO 5w_defaultsite VALUES('12001','猫扑','http://www.mop.com/','3','10');
INSERT INTO 5w_defaultsite VALUES('12002','百度贴吧','http://tieba.baidu.com/','4','10');
INSERT INTO 5w_defaultsite VALUES('12003','蹦蹦家园','http://www.bengbeng.com/','5','10');
INSERT INTO 5w_defaultsite VALUES('12004','搜狐微博','http://37540.18bm.com/click?pid=76&amp;mid=37540&amp;pt=love','6','10');
INSERT INTO 5w_defaultsite VALUES('12005','新浪微博','http://37540.18bm.com/click?pid=38&amp;mid=37540&amp;channel=1&amp;pt=df','7','10');

INSERT INTO 5w_defaultsitetype VALUES('2','购物','2','z_19.gif');
INSERT INTO 5w_defaultsitetype VALUES('4','视频','4','z_9.gif');
INSERT INTO 5w_defaultsitetype VALUES('5','游戏','5','z_13.gif');
INSERT INTO 5w_defaultsitetype VALUES('1','搜索','1','z_0.gif');
INSERT INTO 5w_defaultsitetype VALUES('6','新闻','6','z_2.gif');
INSERT INTO 5w_defaultsitetype VALUES('8','邮箱','8','z_18.gif');
INSERT INTO 5w_defaultsitetype VALUES('10','社区','10','z_5.gif');
INSERT INTO 5w_defaultsitetype VALUES('11','五星','3','z_12.gif');

INSERT INTO 5w_index_setting VALUES('7','在线听歌','&lt;div class=&quot;mzdh_list1&quot;&gt;&lt;iframe width=&quot;700&quot; align=&quot;middle&quot; height=&quot;230&quot; SCROLLING=&quot;no&quot; FRAMEBORDER=&quot;0&quot; name=&quot;iframe_canvas&quot; src=&quot;http://www.btc123.com/data/html/yinyue.htm&quot;&gt;&lt;/iframe&gt;&lt;/div&gt;','2');

INSERT INTO 5w_member_setting VALUES('1','btc123.com滴滴答','2');

INSERT INTO 5w_members VALUES('1','snoleo@126.com','snoleo','6535bb4847c5b73587d1be1d6c9960c7','5','116.238.3.62','1','1371989579','1341814741','114.89.218.87','5w','bitcoin','1','0','0','0','1');
INSERT INTO 5w_members VALUES('2','w3af@email.com','john8212','769ef37e10e26a488e4430e8743998f4','1','173.230.156.195','1','1371914734','1371914734','173.230.156.195','5w','john8212','0','0','0','0','0');
INSERT INTO 5w_members VALUES('3','snoleo@qq.com','abc','e10adc3949ba59abbe56e057f20f883e','4','116.238.3.62','1','1371993853','1371915364','116.238.3.62','5w','abc','0','0','0','0','1');
INSERT INTO 5w_members VALUES('4','','88952634','63ab49d596446251aec9af55ecf0f270','45','222.244.173.244','1','1376829079','1372337693','106.186.25.184','5w','88952634','0','0','0','0','0');
INSERT INTO 5w_members VALUES('5','','88952634s3','63ab49d596446251aec9af55ecf0f270','3','222.244.173.244','1','1376829076','1372337701','106.186.25.184','5w','88952634s3','0','0','0','0','0');

INSERT INTO 5w_message VALUES('6','1','比特币导航网用户','有没有挖矿设备动态，如果显卡、fpga、asic等','QQ：17485195','1350373134','请看主页\"高级挖矿\"一栏','mining-info.html','');
INSERT INTO 5w_message VALUES('2','1','比特币导航网用户','那个比特币中国交易平台没有啊','894466192@qq.com','1345608196','你好, 交易页面里收藏的是提供比特币与实物的交易的网址. 为了避免混淆, 我已经最相关的字眼做了一些更改: 将\"比特币交易\"改为\"实物交易\".<br />\r\n比特币中国属于汇兑平台, 请在主页搜索\"汇兑平台\", 就能找到.','trading.html','');
INSERT INTO 5w_message VALUES('4','1','比特币导航网用户','你们的导航中，比特币投资给的链接Bitcoinbank，这是一个骗子网站，你们太不负责任了：https://bitcointalk.org/index.php?topic=102450.0\r\n\r\n快点取消这个链接！','qq：359661238','1346844232','非常感谢你能够指正我的错误! 我已经在投资的页面删掉了这个网址.<br />\r\n这确实是我的失误, 当初我看到他们的广告, 并简单的浏览了他们的业务, 我觉得是一个不错的应用, 但当时我确实没有去仔细查证这是否是一个庞氏骗局.<br />\r\n再次感谢你的指正! 你不但在我网页上留言, 还给我发了邮件, 我本应该更及时的处理掉这个事情. 今后我会更频繁的浏览我的邮件!<br />\r\n欢迎能够继续关注我的网站, 并提出你的宝贵建议和意见.<br />\r\nwebmaster@btc123.com','investing.html','');
INSERT INTO 5w_message VALUES('25','1','比特币导航网用户','比特币新闻网cnbtcnews.com停止更新已久，btcman.com正常更新。敬请考虑更换。','schwabiz@yahoo.com','1360647145','已经更新, 请查看, 谢谢关注!','','');
INSERT INTO 5w_message VALUES('27','1','比特币导航网用户','这网站很不错，有特色，','QQ12275182','1360864013','谢谢支持~ 请多关注, 多提意见哈~','','');
INSERT INTO 5w_message VALUES('34','1','比特币导航网用户','建议做一个手机版的页面，方便手机用户浏览','1323456','1361890583','好的, 近期考虑做一个, 谢谢关注!','','');
INSERT INTO 5w_message VALUES('138','1','比特币导航网用户','图表有时候出现不连续情况，就是出现一个时间段没有K线，请解决这个bug。','unifly@sina.com','1366206710','行情页面K线的断层问题已经得到解决, 请刷新页面查看. 之前由于K线数据不全(或断层)给大家带来的困扰, 深表歉意! 谢谢关注!','','');
INSERT INTO 5w_message VALUES('153','1','比特币导航网用户','美元实时行情，数据时常中断，对短线交易者来说，打击太大，呵呵','251351328','1366554030','我非常理解, 我也很郁闷. 先说一下btc123的实时行情页面的原理, 这个页面其实相当于是一个\"介绍人\", 什么是介绍人呢, 就是说当用户打开这个页面的时候, 页面的程序就将Mt.Gox的实时行情数据接口介绍给用户, 然后用户就使用自己的浏览器去Mt.Gox获取实时行情. 现在的问题就是Mt.Gox的实时行情数据接口太不稳定, 所以经常会中断, 大家都很郁闷.','','');
INSERT INTO 5w_message VALUES('136','1','比特币导航网用户','我的 chrome 浏览器无法打开 i.btc123.com 打开后行情全为空白.不知道啥原因,\r\n版本 26.0.1410.64 m  ','Q105990193','1366157744','','','');
INSERT INTO 5w_message VALUES('187','1','比特币导航网用户','把蝴蝶矿机链接去掉吧，美国已经证实蝴蝶矿机实验室是骗人的了。我朋友今天去那里看过了','15838008167','1367650837','是吗? 这个如果是真的可是爆炸性新闻哦~ 这个需要你提供详细的报道链接和说明哦.','','');
INSERT INTO 5w_message VALUES('144','1','Tony','http://ss.btc123.com/页面排版有误','18605207331','1366335998','之前是css没有写好哈, 现在已经更正了, 请刷新页面查看哈~ 谢谢关注!','','');
INSERT INTO 5w_message VALUES('176','1','比特币导航网用户','比特中国的实时行情不完整，出错了，MT的实时行情也打不开，敬请速解决。','973749885','1367225335','你好,已经解决了, 非常抱歉! 之前代码有点问题, 请您刷新页面查看, 非常感谢您的关注! ','','');
INSERT INTO 5w_message VALUES('173','1','比特币导航网用户','BTC123.COM 无法访问 尤其是国内用户啊 打开网站直接连接到114~不知道是什么问题，114说是解析域名问题~','27600101@qq.com','1367155623','是的, 非常抱歉! 这是我的错误! 4月28日下午我更新了DNS解析信息, 后来发生了错误. 我发现后立即进行了更正, 但是错误的解析信息已经同步出去了, 虽然错误已经修正, 但目前部分省市的用户还需要等待一些时间(最久36小时)才能正常访问所有的 btc123 的行情页面, 非常抱歉! 或者您可以暂时网址中的 btc123.com 替换为 btc123.cn 临时访问. 再次表示抱歉!','','');
INSERT INTO 5w_message VALUES('167','1','比特币导航网用户','在矿池大全中 能不能表明下各个Pool的挖矿方式 pps \r\npplns\r\nDGM\r\npot或者其他什么的','qq172780950','1366854676','','mining-pools.html','');
INSERT INTO 5w_message VALUES('171','1','比特币导航网用户','1. 「使用文档」 已更新到新网址：https://en.bitcoin.it/wiki/Avalon\r\n\r\n2. 请移除「Lancelot 矿机购买」，商品已下架。\r\n\r\n3. 请考虑增加 [Avalon ASIC users thread] : https://bitcointalk.org/index.php?topic=140539.0;all\r\n\r\n谢谢','123956172','1367072506','','','');
INSERT INTO 5w_message VALUES('172','1','比特币导航网用户','建议把不懂英语的投资人的需求考虑一下，有没有一个客户端，即可以简单的鼠标点击交易，又可以查询实时行情，像炒股软件一样.','15838008167','1367135130','','investing.html','');
INSERT INTO 5w_message VALUES('76','1','比特币导航网用户','有实力的话 现在可以搞一个免手续费的 btc交易网，可以完全模仿btcchina ，他们的手续费太贵， 特别是现在btc交易这么火','14761195901','1364350622','','','');
INSERT INTO 5w_message VALUES('83','1','比特币导航网用户','i.btc123.com 这里，能不能合并一些交易量较小的 transaction, 比如 0.01 BTC 的那些，合并到 0.2 BTC 这样比较说明问题。否则看着很误导','18973102893','1364799606','你好, 这个实现起来有一些技术难度, 因为交易是实时显示的. 稍后我会详细看一下具体的细节问题. 谢谢关注!','','');
INSERT INTO 5w_message VALUES('98','1','比特币导航网用户','IE9 浏览器无法打开行情图片！MT的线图打不开！BTCCHINA的线图正常！是什么原因','27600101@qq.com','1365344607','目前MT的线图和BTCCHINA实现机制不同,当然相同的(也是惭愧的)是两个图都在外部服务器. 自己做的(或者改良的)图正在开发当中.','','');
INSERT INTO 5w_message VALUES('148','1','比特币导航网用户','http://info.btc123.com/index_btcchina.php能不能加上买盘总量和卖盘总量','AlanLee','1366380856','您的意见我们会考虑. 目前如果想粗略看到买卖盘的积累量, 可以先看这个深度累积图: http://k.btc123.com','','');
INSERT INTO 5w_message VALUES('152','1','比特币导航网用户','我个人捐1btc可以将广告去掉么','qq10716294 18641510378','1366503362','您说的是行情页的广告位吗? ....这个确实有些让我为难, 毕竟网站也是需要开支, 如果真的要完全取代广告费用, 可能需要持续的捐赠... 我尽量做到让广告不影响用户体验. 希望理解.','','');
INSERT INTO 5w_message VALUES('141','1','比特币导航网用户','实时行情上黄兰两条是均线么?分别是几日的均线啊?','retzzz2010@gmail.com','1366309852','目前均线使用的是EMA, 其中黄线是 EMA(10), 蓝线是 EMA(21).','','');
INSERT INTO 5w_message VALUES('107','1','比特币导航网用户','比特币将钱，提交到支付宝太慢','13484204197','1365576104','不好意思, 朋友, 我是导航和行情网站....','','');
INSERT INTO 5w_message VALUES('147','1','比特币导航网用户','http://info.btc123.com/的k线越来越不靠谱了 还不如从前','111','1366363195','经过两天两夜的奋斗, 行情页面K线的断层问题已经得到解决, 请刷新页面查看. 之前由于K线数据不全(或断层)给大家带来的困扰, 深表歉意! 谢谢关注!','','');
INSERT INTO 5w_message VALUES('123','1','比特币导航网用户','为什么BTCChina和MtGox的K线图不一样啊……一会白一会黑，很晃眼啊……','275839118','1365818906','BTCChina的数据接口和MtGox不同, 目前BTCChina的K线图正在制作当中. 可能需要一些时间. [2013-05-13更新] 目前BTCChina的动态K线图已经制作好了, 不会再出现一会白一会黑的情况了, 请查看: http://info.btc123.com/index_btcchina.php','','');
INSERT INTO 5w_message VALUES('125','1','比特币导航网用户','这交易网站没有录入啊51btc.com','123513776','1365844944','','','');
INSERT INTO 5w_message VALUES('151','1','客户','请问：FxBTC 汇兑交易平台是本网设立的吗？若不是那么请问该交易平台是哪家公司所办？该交易平台安全吗？','qsg_d@163.com','1366474739','你好, 本网站是导航网, 收集关于比特币的网站的网址, 另外从各个交易平台取得交易信息呈现给大家. 安全是一个相对的概念, 我无法说一个网站安全, 也无法说一个网站不安全. 我非常理解你的心情, 但是抱歉对于类似的问题我似乎无法给你一个直接和满意的答复.','','');
INSERT INTO 5w_message VALUES('115','1','比特币导航网用户','我的钱长时间到不了账户，没法购买比特币，太耽误事儿了！','55561086','1365729416','不好意思, 朋友, 我是导航和行情网站, 我不是交易站.... 打个比方, 您向您股票开户的证券公司的账户里充了5000元, 然后您到大智慧(或者同花顺)的网站投诉说: 怎么充了钱还没到! 人家帮不了你....','','');
INSERT INTO 5w_message VALUES('116','1','比特币导航网用户','我提现到支付宝，三天还没到!咋办办呀?T_T','claudia3910@sina.com','1365737547','朋友, 求求你们了, 这是导航和价格行情的网站. 不做交易. 另外QQ群里也不要再问我关于充值的事情了. ','','');
INSERT INTO 5w_message VALUES('131','1','海洋海洋','你们好我找不到交易系统','13551336669','1366127448','请问什么交易系统? 如果你的意思是用显示生活中的钱与比特币兑换的话, 请Ctrl+F搜索\"汇兑\".','','');
INSERT INTO 5w_message VALUES('129','1','比特币导航网用户','希望能加入全屏功能及一定的画线功能，方便更好的浏览图表。','unifly@sina.com','1366034495','很好的提议! 我们正在开发当中','','');
INSERT INTO 5w_message VALUES('130','1','比特币导航网用户','可以绑定一个银行卡作为唯一提现的账户么。不然密码被盗  资金不安全','455210421@qq.com','1366036030','不好意思, 朋友, 我们是导航网站, 提供关于比特币的网站, 以及提供比特币价格行情, 不需要银行卡的.','','');
INSERT INTO 5w_message VALUES('128','1','比特币导航网用户','非常不错的行情图标展！用的html5？在iphone上用safari浏览ss.btc123.com正常，但进行无法缩放、拖动等操作，估计ipad也不行，希望可以加强触屏操作体验。','unifly@sina.com','1365996321','是的, 目前ipad能够正常浏览网页, 但是无法操作K线图的高级功能, 如拖拽等. 这个功能我们需要开发. 谢谢您的提议!','','');
INSERT INTO 5w_message VALUES('121','1','比特币导航网用户','网站升级后会出现延时的情况 不知道可不可以改善你\r\n虽然说是导航和价格行情网站但是没升级可以做到的事情升级后应该更可以吧','yugexuan603@sohu.com','1365776213','关于延时, 是因为交易平台(主要是MtGox)的数据接口延时严重, 行情网站去交易平台拿数据, 拿到的数据不是最新的, 所以有延时. 国外的各大行情站应该和我的情况是差不多的(可能很多比btc123的行情还要延时的厉害, btc123对于最近成交的数据做过一些优化, 拿到的数据延时会小一些). 希望交易平台能够实时更新他们的数据接口吧.','','');
INSERT INTO 5w_message VALUES('94','1','比特币导航网用户','为什么白天看不到 数据图片 只有晚上才能看到呢？','350236409','1365035325','你好, 这个问题和时间无关, 最近图片网站受到了一些DDoS攻击, 导致了图片无法显示.','','');
INSERT INTO 5w_message VALUES('96','1','比特币导航网用户','我想知道挖矿速度计算信息，如我的挖矿机是1G/s，那一小时能挖多少','pizzamail@163.com','1365251837','','mining-info.html','');
INSERT INTO 5w_message VALUES('178','1','比特币导航网用户','还是看不了实时行情啊！还没解决吗？','gx52588528sat@163.com','1367255366','朋友已经解决了, 可能个别地区的DNS记录还没有更新, 或者你先在dos窗口运行: ifconfig /flushdns 这个命令清除一下电脑里的DNS缓存, 然后清空一下浏览器的缓存, 再试一下, 如果还不行, 请暂时先访问 http://ss.btc123.cn 相信5月1号就会全部地区都正常的.','','');
INSERT INTO 5w_message VALUES('186','1','vipsy','建议要求要有3D图表要好要真要是靠谱,希望能加入全屏功能及一定的画线功能，方便更好的浏览图表。','com.vipsy@syvip.com','1367595116','','','');
INSERT INTO 5w_message VALUES('181','1','比特币导航网用户','chrome 26版本的，页面打开后只有图形，没有数据','123456789','1367475048','','','');
INSERT INTO 5w_message VALUES('182','1','cm2355','这个实时行情非常好用，非常感谢站长的辛苦劳动。\r\n提个小建议：现在大家的显示器都越来越大，但是行情的界面是固定宽度的，感觉对大显示器比较浪费，而且单位面积能看到的信息也太少了。希望能根据屏幕大小自动适应宽度','cuiming2355_cn@hotmail.com','1367502823','好的,我会尝试做些更改, 主要是我的显示器不够大.... 呵呵 谢谢你的意见!','','');
INSERT INTO 5w_message VALUES('190','1','比特币导航网用户','有没有图片形式的价格数据，这样可以在淘宝商品说明中引用','qq247041','1367677733','','','');
INSERT INTO 5w_message VALUES('191','1','比特币导航网用户','谢谢站长的辛苦努力，为了更好的相互交流了解行情，提2个建议：1、能否把每个周期的历史数据延长，（比如日线级别的看完所有历史数据），另外能否加入指标如：KDJ、MACD.2,能否做个行情软件，这样服务内容会大增，为将来的交流模式建立更深入更有凝聚力的平台。','jucal@sina.cn','1367726873','谢谢你的建议! \r\n1. 日K线向后拖可以看完所有数据\r\n2. 正在制作加入了MACD的行情\r\n3. 行情软件目前还没有考虑做, 主要不太喜欢exe的程序, 另外还需要安装, 会感觉不安全. 不过不排除后面会做哦.\r\n','','');
INSERT INTO 5w_message VALUES('309','1','DG小徐','BTC123广告怎么投','18667116551','1371625686','','','');
INSERT INTO 5w_message VALUES('246','1','比特币导航网用户','&quot;BTC123.COM 无法访问 尤其是国内用户啊 打开网站直接连接到114~不知道是什么问题，114说是解析域名问题~&quot;,这个问题还存在啊，何时能解决？','lovinghomez00@hotmail.com     15961185599','1369365992','啊....怎么会这样, 我已经把DNS解析迁移到国内了....请问下你那边是什么网络? 是电信, 还是联通? 如果实在还是不行, 你可以在设置IP的那个窗口, 把你电脑的DNS服务器指定为谷歌的8.8.8.8, 应该就没问题了.','','');
INSERT INTO 5w_message VALUES('255','1','比特币导航网用户','我提一个傻问题，万一你们的网站不做了，我的比 特币去什么地方找？','QQ498336442','1369861166','你好, btc123 不涉及任何关于比特币充值. 您在btc123 上可以浏览网站, 也可以看比特币的实时价格. 如果网站不做了(虽然可能性很小), 您可能无法方便的看到关于比特币网站的汇总, 和无法方便的浏览价格行情. 但是跟您的比特币没有任何关系哦.','','');
INSERT INTO 5w_message VALUES('276','1','比特币导航网用户','能不能做成类似于股票分析软件的分时图和盘口，竖过来的看起来非常不方便。应该做个行情软件，类似东方财富通这样的。软件只是看看价格的话，也不会有太大的安全性上的问题。','shiminjia','1370610821','','','');
INSERT INTO 5w_message VALUES('284','1','比特币导航网用户','我关心比特币很久了，很想参与比特币的美元实际交易，请问实际参与呢?比方开户，款项如何进出?请能指点。另外有个问题请教，一个比特币能拆成一千个份吗?否则怎会是0.****数呢?不好意思，谢谢。','13917123668@139.com','1370744406','美元实际的交易可以去MtGox.com或者btc-e.com交易哦. 具体的操作简单的说不清楚, 您可以去比特币中文论坛btcbbs.com里找找看哈~','','');
INSERT INTO 5w_message VALUES('288','1','比特币导航网用户','建议把网站当前连接的用户数量显示在主页上','ljycslg@163.com','1370857826','','','');
INSERT INTO 5w_message VALUES('302','1','比特币导航网用户','http://info.btc123.com/index_btcchina.php\r\n可否考虑把btcchina的时间周期从“1天，2小时，1小时”改为“1天，6小时/4小时，1小时”。现在的1小时和2小时区别不大，不是等比数列。最好还是等比数列。','qq:4120948','1371430675','谢谢你的建议, 已经增加6小时/4小时线, 请查看','','');
INSERT INTO 5w_message VALUES('303','1','gz980903','建议在挖矿收益计算器中加入难度增长系数，对未来的预测会更准确。感觉你们现在的计算公式中难度增加系数是9%，不知道对不对？','18907158168','1371440059','','mining-info.html','');
INSERT INTO 5w_message VALUES('307','1','比特币导航网用户','把那条绿线去掉，影响观看，保留那个价格框就行了','2572295090@qq.com','1371572883','','','');
INSERT INTO 5w_message VALUES('310','1','BTC123比特币导航用户','1、LTC 《BTC－E》的买一价与卖一价搞反了\r\n2、弄不明白各交易网站的成交量数据的一天时间段是怎么划分的，好象按北京时间0点起与GMT 0点起都不对。能否指点一下\r\n','1513092556','1371905818','1. 非常感谢您发现的bug! 已经修正了, 请查看!\r\n2. 各交易网站的成交量指的是最近24小时之内的成交量. 不是按照固定时间算的.','','');
INSERT INTO 5w_message VALUES('347','1','BTC123比特币导航用户','现在LTC的地位已经确定了 你们会不会考虑一下上btc-e的ltc呢？？？','gdfslg@qq.com','1371955951','','','');
INSERT INTO 5w_message VALUES('350','1','BTC123比特币导航用户','你好，我之前在Btcchina上找他们的api死活没找到啊，找admin也很吊的说不提供？请问贵站用的他们哪个api啊','936818264','1372064841','','','');
INSERT INTO 5w_message VALUES('352','1','BTC123比特币导航用户','重要的建议：btc123的行情越来越丰富了，建议你们站发布一个比特币指数，以各个有代表性的大交易所的比特币兑美元、欧元、人民币、日元、卢布等价格加权计算得出，随着比特币的发展，各币种的权重将来还可以修改，具体的规则可以参考美元指数。这是一件有影响的大事，对比特币，对你们网站都是重大利好。','QQ1513092556','1372310579','','','');
INSERT INTO 5w_message VALUES('354','1','gz980903','挖矿收益计算器中，一段时间（一个月）的收益应该也要考虑难度系数的增加导致的收益逐步下降问题，不应该是日产量X30来计算。这样才能更精确。望能够改进！谢谢！！','18907158168','1372311777','','mining-info.html','');
INSERT INTO 5w_message VALUES('355','1','BTC123比特币导航用户','站长你好，可否把 挖矿收益对比表 的链接指向 我们呀，地址为 http://www.800996.com/btc/\r\n谢谢了','601095','1372325243','','','');
INSERT INTO 5w_message VALUES('356','1','BTC123比特币导航用户','有没有LTC的实时行情比如http://bitcoinwisdom.com/markets/btce/ltcusd\r\n更希望能添加LTC的价格闹钟','qq 393027598','1372348443','','ex-info.html','');
INSERT INTO 5w_message VALUES('361','1','BTC123比特币导航用户','796.com btc期货网站','qq352340116','1372872908','','','');
INSERT INTO 5w_message VALUES('362','1','BTC123比特币导航用户','为什么我的MTGOX实时数据老是断呀','ttm.ok.db@163.com','1372936774','','','');
INSERT INTO 5w_message VALUES('363','1','BTC123比特币导航用户','网站要能添加：买盘总量和卖盘总量就完美了，这个从技术角度来说不难吧，只需要累计成交量就行了。','linyibo010@126.com','1372938235','你好, 买盘和卖盘总量请查看此页面: (MtGox交易所) mm.btc123.com ; (比特币中国交易所) mm.btc123.com/btcchina.php','','');
INSERT INTO 5w_message VALUES('358','1','BTC123比特币导航用户','建议在其他虚拟货币中加上BQC，这个时间长，交易量大,关注人多.','565666774','1372484874','','','');
INSERT INTO 5w_message VALUES('359','1','BTC123比特币导航用户','https://btcjam.com/  BTC的P2P借贷网站','289402882','1372571318','已经加上, 谢谢提供!','investing.html','');
INSERT INTO 5w_message VALUES('360','1','BTC123比特币导航用户','http://www.ttbit.com/ ASICMINER官方指定的全国总经销\r\n','18388669864','1372763883','','mining-pro.html','');
INSERT INTO 5w_message VALUES('368','1','BTC123比特币导航用户','你好我想在行情页面，打广告卖矿机，广告费怎么算的，具体怎么联系你们','QQ 274020190','1373187825','','','');
INSERT INTO 5w_message VALUES('394','1','BTC123比特币导航用户','委单量的增减变化，从我连接开始算起记录委单量的增减','ttm.ok.db@163.com','1374145749','','','');
INSERT INTO 5w_message VALUES('395','1','BTC123比特币导航用户','ltc 收益收计算器。跟BTC那模式一样的','10000','1374174290','','mining-info.html','');
INSERT INTO 5w_message VALUES('396','1','BTC123比特币导航用户','OKCoin，一个工信部备案成立的比特币汇兑平台https://www.okcoin.com?invite=2450296，正规可靠接受监管！该平台采用SSL、GSLB、分布式服务器、离线存储等先进技术保证了平台的安全和稳定，充值即时到帐0手续费，方便快捷！很多人开始转向它交易，现在注册还免费送比特币！点击https://www.okcoin.com?invite=2450296了解\r\n','248372589','1374247125','','ex.html','');
INSERT INTO 5w_message VALUES('373','1','btcu','建议在行情汇总旁边加入字体大小设置。对于某些显示器来说，这个行情汇总看着眼痛。','btcu@某群','1373321062','你好, 请按键盘的 Ctrl + \"=\", 就可以放大字体了.','','');
INSERT INTO 5w_message VALUES('390','1','BTC123比特币导航用户','到哪里能找到比特币的历史数据，如每天的收盘价开盘价之类的？请问能不能提供给我，我想做一个分析，包括夏普比率之类的','768570374@qq.com','1373900331','','','');
INSERT INTO 5w_message VALUES('391','1','BTC123比特币导航用户','初级挖矿教学失效了！！！','805705693','1373945056','你好, 请刷新一下页面就好了.','mining-howto.html','');
INSERT INTO 5w_message VALUES('392','1','BTC123比特币导航用户','为什么在接受BTC的网站前面要用“某&quot;? 我们团美酒网 的”团美酒商城 也希望能接受BTC购酒 http://tuanm9.com/mall/index.html','2402209234@qq.com','1374052453','','accept-bitcoins.html','');
INSERT INTO 5w_message VALUES('376','1','BTC123比特币导航用户','K线图，不应该是红烛涨，绿烛跌嘛？你们的图怎么反过来了','qq251013410','1373420167','你好, 比特币行情页面是按照国际惯例. 请看使用说明: http://www.btc123.com/data/html/about_info.html','','');
INSERT INTO 5w_message VALUES('377','1','BTC123比特币导航用户','IE和QQ浏览器，无法显示K线图。用傲游的可以。不知可否提高兼容性？','251013410','1373420408','你好, 请升级IE浏览器至 IE7 以上版本. 就可以访问了.','','');
INSERT INTO 5w_message VALUES('404','1','BTC123比特币导航用户','我要看MTGOX，的2小时K线行情，怎么没有','QQ：170247044','1374496201','你好, 2小时K线已经添加, 请查看.','','');
INSERT INTO 5w_message VALUES('410','1','BTC123比特币导航用户','实时行情的下跌声音提示怎么变的那么难听!','ttm.ok.db@163.com','1374648142','你好, 声音已经修正了, 之前是为了区别上涨和下跌的两种声音, 之前的声音太相近了.','','');
INSERT INTO 5w_message VALUES('411','1','BTC123比特币导航用户','mt.gox实时价格与原网站不一致','437019773','1374715518','','','');
INSERT INTO 5w_message VALUES('413','1','BTC123比特币导航用户','矿池 - deepbit是个假网站链接吧','limingz@gmail.com','1374899031','你好, 这个站不是假链接, 他们曾经是全球最大的矿池, 后来因为手续费比较高, 逐渐大家都去btcguild上挖矿了.','','');
INSERT INTO 5w_message VALUES('415','1','BTC123比特币导航用户','把赌博网站的连接去掉，尤其的是国内的，我是在相关部门工作的，比较喜欢你的网站，挺方便的，信不信由你了，到时候被墙了都是小事儿','529958541','1375005033','','','');
INSERT INTO 5w_message VALUES('417','1','BTC123比特币导航用户','你好,在贵网站做广告，要多少钱，谢谢！！或者给我一个广告位置的价格好吗？谢谢','18320863858','1375186802','','','');
INSERT INTO 5w_message VALUES('425','1','BTC123比特币导航用户','交易的介面怎么没有了。。急急急','18672597232','1375504282','你好, 请问是什么交易界面呢? BTC123本身是没有交易的哦, 目前仅提供交易平台的价格行情信息. 交易请去各自的交易平台交易.','','');
INSERT INTO 5w_message VALUES('430','1','BTC123比特币导航用户','我要看MTGOX，的8小时K线行情，4小时直接到24小时,跨度太长,中间没过渡','15583617360','1375666578','','','');
INSERT INTO 5w_message VALUES('432','1','BTC123比特币导航用户','我想入股咱们网站，怎么入股','18678979015','1375770709','','','');
INSERT INTO 5w_message VALUES('438','1','BTC123比特币导航用户','为什么下面的那个两个图标不是在最中间呢？就是那个有红蓝绿三条钱不断变长变短的个长方形和一个k线图的正方形。这两个图标应该放在©2012-2013 BTC123比特币导航. 沪ICP备12011456号-1. Powered by btc123.com - 比特币信息行情第一站这一行的下边并且居中，也就是最后一行居中。','qq545259742','1375944274','你好, 已经将图标改成\"站长统计\", 加入到了网站下部的链接中. 这样就好看多了, 同时也谢谢你提的意见!','tech.html','');
INSERT INTO 5w_message VALUES('440','1','BTC123比特币导航用户','加上6小时K线，clackmoody有6小时线','11111111111','1375979508','','','');
INSERT INTO 5w_message VALUES('446','1','BTC123比特币导航用户','我觉的btctele.com应该算到名站导航里吧。一个真正方便所有BTC用户的应用。:-)','xiangfu@openmobilefree.net','1376058414','','','');
INSERT INTO 5w_message VALUES('452','1','BTC123比特币导航用户','建议 最好能把国外大大小小的交易平台都加上 谢谢！','13610924448','1376122730','你好,已经添加了一些国外的交易平台, 如果您还有候选的, 可以QQ告诉我或者发邮件: web@btc123.com , 谢谢!','ex-markets-global.html','');
INSERT INTO 5w_message VALUES('461','1','barbour discount code\r\n','so much nice stuff but love this!!! welcome to my website: http://midwestgardenexchange.com/forum/viewtopic.php?f=5&amp;t=36978 ','nikefree5@gmail.com','1376885069','','','');
INSERT INTO 5w_message VALUES('462','1','BTC123比特币导航用户','http://info.btc123.com/index_btcchina.php这个网页在IE8中出现无法浏览的情况，不知如何改进或接近问题，如果不装别的浏览器的情况下','QQ：157852579','1377101713','','','');
INSERT INTO 5w_message VALUES('463','1','BTC123比特币导航用户','希望添加对IOS设备的chrome浏览器app的声音支持，这样苹果设备都可以有涨跌声音提示了。','wjh_mail@hotmail.com','1377576117','','','');
INSERT INTO 5w_message VALUES('464','1','BTC123比特币导航用户','最近中国新开的一个矿池175btc.com，有几个朋友说想从你们网站链接过去，但是没有找到，是不是有问题的。','712337370','1377591390','','','');
INSERT INTO 5w_message VALUES('465','1','BTC123比特币导航用户','您好，现在http://ss.btc123.com/这个页面为什么没有K线图了只有折线图了',',,','1377676986','您好! 请在K线图下方的\"样式\"里选择\"K线式\"','','');
INSERT INTO 5w_message VALUES('466','1','BTC123比特币导航用户','您好，刚刚提交了www.chnbitcoin.com 的申请，什么时候能通过呢？','502888444','1377752944','','','');
INSERT INTO 5w_message VALUES('467','1','BTC123比特币导航用户','别把LTC给撤了啊','287953776','1377772645','','','');
INSERT INTO 5w_message VALUES('468','1','BTC123比特币导航用户','预计下次难度后面加个百分比(30%)这样一目了然 不用算了','QQ:278150000','1377853436','','','');
INSERT INTO 5w_message VALUES('499','1','gphjr','控制面板打不开了','gp008@163.com','1379472421','','fb_staticK.html','');
INSERT INTO 5w_message VALUES('500','1','gphjr','比特币首页打不开','gp008@163.com','1379472556','','fb_staticK.html','');
INSERT INTO 5w_message VALUES('501','1','BTC123比特币导航用户','Please add https://letsdice.com/\r\nThanks','523452345','1379543834','','','');
INSERT INTO 5w_message VALUES('489','1','BTC123比特币导航用户','老连接不上网','13932633081','1378775693','','','');
INSERT INTO 5w_message VALUES('502','1','BTC123比特币导航用户qinjie','希望 在线听歌 能有显示歌词的选项，因为有时候听到好听的歌，就想看看歌词，可是又不想再去麻烦找 另：刚才验证码输错，已经写好的内容没保存，又重写了一遍，最好能自动保存内容','qq:243526123','1379665434','','','');
INSERT INTO 5w_message VALUES('471','1','BTC123比特币导航用户','首页导航处，不同平台的价格用不同的颜色条纹来显示吧，不然看到后面的最高价，最低价，成交量时，已经拿不准是哪家的了。','18257752427','1377958732','','','');
INSERT INTO 5w_message VALUES('472','1','BTC123比特币导航用户','建议K线图上做一个画线的工具，就好像www.BTC800.COM那样类似的，我觉得他们没有你们的网站做得好。建议加上那个工具。','13812667419','1377965365','','','');
INSERT INTO 5w_message VALUES('473','1','BTC123比特币导航三千用户','能把796交易平台的期货价格弄到导航里吗？796里的人气很旺，如果可以，它的股票也放上面吧，这样看着方便些','zjiang@163.com','1377997427','','','');
INSERT INTO 5w_message VALUES('474','1','zhang','贵公司已经改版了，挺好的。但是，贵公司把行情界面里的“静态K线”好像给删掉了，只留了“动态盘口”，其实这个静态K线提供了一个委托累计的数据，非常有用，并且这个数据/界面只有贵公司的网站上有，其他的数据你们有的，其他网站基本也有，而且你现在更改后的界面和http://bitcoinwisdom.com/的界面像极了，因为我以前就参考你们两家的数据，你们的静态K线和动态盘口是特色，提供了很重要的数据和信息，没必要向别人学习，自己的特色和特点为什么要放弃呢？ 本人强烈建议贵司能把原来的数据和界面保留下来，真的非常有用！我（老张——58168）也在微博给你们留言了.','微博：老张_58168, angelozhang111@hotmail.com','1378038037','','','');
INSERT INTO 5w_message VALUES('457','1','joshua','加一个http://tool.bifeng.com/currency\r\n挖矿比较工具','qq2239472485','1376487160','','','');
INSERT INTO 5w_message VALUES('460','1','barbour quilted ','ok in the Business or Education System which I worked in we would have tried this approach, something like Praise the Lord it was long ago, that you found this Scripture to be true. How many time do I have to say its the approach. A Beginner would be scared to death of you like Bible Bullies. all I am saying is there is a gentler way to share your Gift from the Lord. I have experienced that side of you as well as the other. You guys have a blessed night, see ya tomorrow .http://www.computers-dr.com/forum/viewtopic.php?f=10&amp;t=4898 .','ckfmzwjl2d@hotmail.com','1376837021','','','');
INSERT INTO 5w_message VALUES('475','1','BTC123比特币导航用户','什么网站啊！老连不上，行情一来就断了，','357962712','1378043652','你好, 实时行情 ss.btc123.com 做了一次升级, 目前1.20版本的行情链接要稳定很多. 有任何问题, 欢迎提意见~','','');
INSERT INTO 5w_message VALUES('503','1','qinjie','搞不懂你们，在线听歌 把 暂停功能 设在浅绿色小框那里，然后在左边用大大的一个框 加一句废话 来说暂停在 浅绿色小框那，你们是嫌你们的广告位太多了吗？不会直接做一个暂停播放的按钮啊，然后左边的小框可以拿来做别的什么，比如：显示歌词 靠，验证码又输错，还好这次我先copy了','qq:243526123','1379665912','','','');
INSERT INTO 5w_message VALUES('488','1','bubing','K.btc123.com数据在Thinkpad X61这类12寸标准屏（1024*768）显示的时候，数据自动更新之后，右边的行情数据会发生覆盖K线图的情况。这个是否可以修正？','bubing@live.com','1378740483','你好, 问题已经修正, 请刷新页面查看~ ','feedback_k.btc123.html','');
INSERT INTO 5w_message VALUES('477','1','BTC123比特币导航用户','对于你们搜集的BTC游戏数量太少，而且都比较复杂，如果能像www.btcredblue.com这样简单的玩法类的游戏的话，估计会带来很多流量的，就像4399里面的游戏，什么类型的都有什么样的都敢上，我指示打个比方没有要给那个网站做广告的意思','454774403','1378061583','','games.html','');
INSERT INTO 5w_message VALUES('478','1','BTC123比特币导航用户','那四条不同颜色的线段代表什么意思?','329719706','1378097325','你好 请参考\"指标参数设置\"中第一行 EMA/MA 的说明. 在\"页面设置\"里可以选择均线是 EMA 还是 MA','feedback_k.btc123.html','');
INSERT INTO 5w_message VALUES('504','1','自由王软件','有没有兴趣做一个自动交易软件.可能有点商业价值\r\n我有点想法,但没有实力','QQ:810700725','1379687301','','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('480','1','BTC123比特币导航用户','在ipad2上，右侧的深度，因为右上角那个链接，布局歪了','qq 97043389','1378187947','你好, 问题已经修正, 请刷新页面查看~ ','feedback_k.btc123.html','');
INSERT INTO 5w_message VALUES('481','1','BTC123比特币导航用户','为什么btc123老喜欢剽窃别人的东西然后改成自己的！','info@bitcoinwisdom.com','1378377820','','feedback_k.btc123.html','');
INSERT INTO 5w_message VALUES('482','1','BTC123比特币导航用户','您好，我们提交了两个网站\r\nwww.betcoin.tm\r\nwww.betcoindice.tm\r\n到目前为止没有看到我们的连接。\r\n我们的游戏网站目前排 在比特币游戏中前三位：\r\nhttp://topbitcoinsites.com/category/gamesgambling/\r\nAlexa排名10万以内。','betcoin@betcoin.tm','1378393405','','','');
INSERT INTO 5w_message VALUES('483','1','BTC123比特币导航用户','ss.btc123.com MT的实时怎么老是断线。请尽快修复啊。我主要要的就是提示声。其他实时没有提示声音。','QQ:310907251','1378420131','你好, 今天做了一次升级, 目前1.20版本的实时行情(ss.btc123.com)比之前的网络稳定一些了. 有任何问题, 欢迎提意见~','','');
INSERT INTO 5w_message VALUES('485','1','BTC123比特币导航用户','怎么延迟这么大','512372885','1378634923','','feedback_k.btc123.html','');
INSERT INTO 5w_message VALUES('496','1','BTC123比特币导航用户','ss.btc123.com  实时数据能不能多一些。就是买价和卖价什么的显示的更长。','xiaoge0828@163.com','1379398165','','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('497','1','BTC123比特币导航用户','ss.btc123.com  实时数据能不能多一些。就是买价和卖价什么的显示的更长。','xiaoge0828@163.com','1379398166','你好, 请点击右上位置的\"更多选项\", 然后在\"主页面委单深度显示行数\" 中选择更大的数字, 就可以显示更长了.','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('493','1','BTC123比特币导航用户','(LTC)莱特中国 http://cnltcpool.com/ 都跑路了，你们还为它做广告，','67043285@qq.com','1379078740','非常抱歉, 还不知道他们已经跑路了, 我们马上把这个链接撤下来! 再次向大家表示歉意! 有任何问题请发邮件至: webmaster@btc123.com','','');
INSERT INTO 5w_message VALUES('494','1','BTC123比特币导航用户','数据卡住了！快调试','QQ362471567','1379206479','','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('495','1','BTC123比特币导航用户','哎  怎么今天又连不上啊','512372885','1379213082','','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('498','1','BTC123比特币导航用户','能否再K线图页面加一个设置，可以自行设置红跌绿张，或绿涨红跌否？这样方便中国的股民，呵呵','g.bean@qq.com','1379398818','','fd_k.btc123.html','');
INSERT INTO 5w_message VALUES('505','1','BTC123比特币导航用户','网站都是简体，那种被墙的站就不要放到首页吧。','xvzhonglin@tom.com','1380030832','','','');
INSERT INTO 5w_message VALUES('506','1','BTC123比特币导航用户','ss.btc123.com 可以不可以做一个软件啊','1601889','1380177101','','fb_ss.btc123.html','');
INSERT INTO 5w_message VALUES('507','1','BTC123比特币导航用户','http://info.btc123.com/index_btcchina.php,能在这上面增加Bitstamp的行情K线么，毕竟现在的情况下它的价格比MtGox更有参考性。','cn.err0@gmail.com','1380184168','你好, 请查看 k.btc123.com 这个是bitstamp的K线','fb_z.btc123.html','');
INSERT INTO 5w_message VALUES('508','1','BTC123比特币导航用户','btc游戏还应该添加casinobtc，ipo上市了，用户挺多','xuyongpku@163.com','1380198249','你好, 已经添加~','games.html','');
INSERT INTO 5w_message VALUES('509','1','BTC123比特币导航用户','首页内容太多，也就是小的分类太多，感觉有点杂乱，当然这样的优点是内容丰富，但是不容易一下找到自己想要找的内容，建议首页按照交易类、信息类、其他虚拟货币类、挖矿类、矿机类等几个大类，当然还可以还可以添加其他大类，大类下面通过链接再分小类，个人建议，仅供参考，而且这样大改动页面会比较耗费精力，可能不妥，见谅','wsndpy135@sohu.com','1380251511','','','');
INSERT INTO 5w_message VALUES('510','1','BTC123比特币导航用户','听说BTC123要改版，新版本什么时候出来啊？？','572374701','1380258589','','','');
INSERT INTO 5w_message VALUES('511','1','连成','BTC客户端占满C盘了，新手根本不知道该怎么解决，希望前辈们帮忙','378454424','1380453424','','','');
INSERT INTO 5w_message VALUES('512','1','BTC123比特币导航用户','如何注册应用看不到.','15091255550','1380512343','','','');
INSERT INTO 5w_message VALUES('513','1','BTC123比特币导航用户','BTC100怎么没有？','qq2841869164','1380570122','','ex-markets-cn.html','');
INSERT INTO 5w_message VALUES('514','1','BTC123比特币导航用户','一般的浏览器搜不到 正版的123','664682897','1380630566','你好, 目前在主流搜索引擎(如百度, 谷歌, 搜狗, Bing等)均能在第一页搜到BTC123','','');
INSERT INTO 5w_message VALUES('515','1','BTC123比特币导航用户','希望新版的K线图能支持BTCTrade','QQ1020334039','1380890486','','fd_k.btc123.html','');
INSERT INTO 5w_message VALUES('517','1','BTC123比特币导航用户','收入比特币奥薇购物商城http://shop34714960.taobao.com/','QQ:173353378','1381235621','','','');
INSERT INTO 5w_message VALUES('518','1','BTC123比特币导航用户','k.btc123同时在线用户可以聊天就好了，不知道是否可以加个在线用户的聊天室','QQ245668','1381241612','','fd_k.btc123.html','');
INSERT INTO 5w_message VALUES('520','1','BTC123比特币导航用户','2013-10-16 20:48 发现显示的难度、全网算力都完全错了','985320196@qq.com','1381956549','','','');

INSERT INTO 5w_search VALUES('14','8','搜狗','http://news.sogou.com/news','query','搜狗新闻','搜狗','static/images/s/sogou.gif','http://news.sogou.com/?pid=sogou-site-464d828b85b0bed9','sort:0,\r\ntime:0,\r\nw:03009900,\r\n_asf:news.sogou.com,\r\n_ast:,\r\nmode:1,\r\npid:sogou-site-464d828b85b0bed9','3','0','0');
INSERT INTO 5w_search VALUES('4','2','百度','http://www.baidu.com/s','wd','百度一下','百度','static/images/s/baidu.gif','http://www.baidu.com/','tn:5wcom','2','1','0');
INSERT INTO 5w_search VALUES('13','2','谷歌','http://www.google.com.hk/cse','q','谷歌搜索','谷歌','static/images/s/google.gif','http://www.google.com.hk/webhp?prog=aff&client=pub-9491289701756083&channel=3192690012','cx:partner-pub-9491289701756083%3Asxy07z809dy,\r\nie:utf-8','1','1','1');
INSERT INTO 5w_search VALUES('16','9','百度','http://mp3.baidu.com/m','word','搜 索','百度mp3','static/images/s/mp3.gif','http://mp3.baidu.com/m?ie=utf-8&ct=134217728&tn=5wcom&word=','f:ms,\r\nct:134217728,\r\ntn:5wcom','1','1','1');
INSERT INTO 5w_search VALUES('17','10','百度','http://video.baidu.com/v','word','百度视频','百度视频','static/images/s/video.gif','http://video.baidu.com/','ct:301989888,\r\nrn:20,\r\npn:0,\r\ndb:0,\r\ns:0,\r\nfbl:800','2','1','1');
INSERT INTO 5w_search VALUES('18','11','百度','http://image.baidu.com/i','word','搜 索','百度图片','static/images/s/pic.gif','http://image.baidu.com/?tn=5wcom','ct:201326592,\r\ncl:2,\r\npv:,\r\nlm:-1,\r\ntn:5wcom','1','1','0');
INSERT INTO 5w_search VALUES('19','13','搜狗','http://wenda.sogou.com/search','query','搜 索','搜狗','static/images/s/sogou.gif','http://wenda.sogou.com/?pid=sogou-site-464d828b85b0bed9','pid:sogou-site-464d828b85b0bed9','2','1','0');
INSERT INTO 5w_search VALUES('20','14','淘宝','http://search8.taobao.com/browse/search_auction.htm','q','淘宝搜索','淘宝搜索','static/images/s/taobao.gif','http://www.taobao.com/','pid:mm_19869273_2351859_9092254,\r\ncommend:all,\r\nsearch_type:action,\r\nuser_action:initiative,\r\nf:D9_5_1,\r\nat_topsearch:1,\r\nsort:,\r\nmode:66,\r\nspercent:0','1','1','1');
INSERT INTO 5w_search VALUES('36','2','搜狗','http://www.sogou.com/sogou','query','搜狗搜索','搜狗','static/images/s/sogou.gif','http://www.sogou.com/index.php?pid=sogou-site-8725fb777f25776f','pid:sogou-site-8725fb777f25776f','4','0','0');
INSERT INTO 5w_search VALUES('21','12','谷歌','http://ditu.google.cn/maps','q','搜 索','谷歌地图','static/images/s/google.gif','http://ditu.google.cn/','','2','1','0');
INSERT INTO 5w_search VALUES('23','9','SOSO','http://cgi.music.soso.com/fcgi-bin/m.q','w','搜 索','搜搜mp3','static/images/s/soso.gif','http://music.soso.com/?unc=5wcom&cid=union.s.wh','unc:5wcom,\r\ncid:union.s.wh','3','1','0');
INSERT INTO 5w_search VALUES('24','9','谷歌','http://www.google.cn/music/search','q','搜 索','谷歌','static/images/s/google.gif','http://www.google.cn/music/homepage','aq:f,\r\nie:utf-8,\r\noe:utf8,\r\nhl:zh-CN','2','1','0');
INSERT INTO 5w_search VALUES('25','10','谷歌','http://www.google.com.hk/search','q','搜 索','谷歌','static/images/s/google.gif','http://www.google.com.hk/videohp','tbo:p,\r\ntbs:vid%3A1,\r\nsource:vgc,\r\nie:utf-8','3','1','0');
INSERT INTO 5w_search VALUES('26','11','谷歌','http://images.google.com.hk/images','q','搜 索','谷歌','static/images/s/google.gif','http://images.google.com.hk/imgcat/imghp?hl=zh-CN','gbv:2,\r\nsource:hp,\r\nhl:zh-CN','2','1','1');
INSERT INTO 5w_search VALUES('27','8','SOSO','http://news.soso.com/n.q','w','搜 索','搜搜新闻','static/images/s/soso.gif','http://news.soso.com/?unc=5wcom&cid=union.s.wh','cid:union.s.wh,\r\nie:gb2312,\r\nunc:5wcom','4','0','0');
INSERT INTO 5w_search VALUES('29','8','百度','http://news.baidu.com/ns','word','搜 索','百度新闻','static/images/s/news.gif','http://news.baidu.com/?tn=5wcom','tn:5wcom','1','1','1');
INSERT INTO 5w_search VALUES('30','14','京东','http://click.union.360buy.com/JdClick/','keyword','京东','京东','static/images/s/360buy.gif','http://click.union.360buy.com/JdClick/?unionId=2442&t=1&to=http://www.360buy.com','unionId:2442,\r\nt:5,\r\nto:http%3A%2F%2Fsearch.360buy.com/Search','4','1','0');
INSERT INTO 5w_search VALUES('31','13','百度','http://zhidao.baidu.com/q','word','百度一下','百度一下','static/images/s/zhidao.gif','http://zhidao.baidu.com/q?pt=5wcom','tn:ikaslist,\r\nct:17,\r\npt:5wcom','1','1','1');
INSERT INTO 5w_search VALUES('32','12','百度','http://map.baidu.com/m','word','百度一下','百度地图','static/images/s/baidu.gif','http://map.baidu.com/','','1','1','1');
INSERT INTO 5w_search VALUES('33','8','谷歌','http://news.google.com.hk/news/search','q','搜 索','谷歌','static/images/s/google.gif','http://news.google.com.hk/','ie:utf-8','2','1','0');
INSERT INTO 5w_search VALUES('34','14','卓越','http://www.amazon.cn/gp/search','keywords','搜 索','卓越','static/images/s/joyo.gif','http://www.amazon.cn/gp/redirect.html?ie=UTF8&location=http%3A%2F%2Fwww.amazon.cn%2F&tag=5wcom-23&linkCode=ur2','ie:GBK,\r\ntag:5wcom-23,\r\nindex:aps,\r\nlinkCode:ur2,\r\ncamp:0,\r\ncreative:0','3','1','0');
INSERT INTO 5w_search VALUES('35','14','当当','http://union.dangdang.com/transfer.php','key','搜 索','当当网','static/images/s/dangdang.gif','http://union.dangdang.com/transfer.php?from=P-283517&ad_type=10&sys_id=1&backurl=http://www.dangdang.com/','from:P-283517,\r\nad_type:10,\r\nsys_id:1,\r\nbackurl:http%3A%2F%2Fsearch.dangdang.com%2Fsearch.php?key={key}','4','1','0');
INSERT INTO 5w_search VALUES('37','11','搜狗','http://pic.sogou.com/pics','query','搜狗图片','搜狗图片','static/images/s/sogou.gif','http://pic.sogou.com/?pid=sogou-site-464d828b85b0bed9','pid:sogou-site-464d828b85b0bed9','3','0','0');

INSERT INTO 5w_search_class VALUES('2','网页','2','1');
INSERT INTO 5w_search_class VALUES('8','新闻','4','0');
INSERT INTO 5w_search_class VALUES('10','视频','5','0');
INSERT INTO 5w_search_class VALUES('11','图片','6','0');
INSERT INTO 5w_search_class VALUES('12','地图','7','0');
INSERT INTO 5w_search_class VALUES('13','问答','8','0');

INSERT INTO 5w_search_keyword VALUES('15','9','千百度','http://www.soso.com/q?w=千百度&unc=b400056&cid=union.s.wh&ie=gb2312','#FF0000','1');
INSERT INTO 5w_search_keyword VALUES('16','9','最重要的决定','http://www.soso.com/q?w=最重要的决定&unc=b400056&cid=union.s.wh&ie=gb2312','','2');
INSERT INTO 5w_search_keyword VALUES('17','9','爱的供养','http://www.soso.com/q?w=爱的供养&unc=b400056&cid=union.s.wh&ie=gb2312','','3');
INSERT INTO 5w_search_keyword VALUES('52','9','没那么简单','http://www.soso.com/q?w=没那么简单&unc=b400056&cid=union.s.wh&ie=gb2312','','5');
INSERT INTO 5w_search_keyword VALUES('18','9','因为爱情','http://www.soso.com/q?w=因为爱情&unc=b400056&cid=union.s.wh&ie=gb2312','','4');
INSERT INTO 5w_search_keyword VALUES('27','13','比特币','http://baike.baidu.com/view/5784548.htm','','1');
INSERT INTO 5w_search_keyword VALUES('53','11','btc123.com','http://www.baidu.com/s?tn=baiduhome_pg&ie=utf-8&bs=btc123&f=8&rsv_bp=1&rsv_spt=1&wd=btc123.com&inputT=757','','1');
INSERT INTO 5w_search_keyword VALUES('40','12','BTC行情页面汇总','http://z.btc123.com','','5');
INSERT INTO 5w_search_keyword VALUES('43','14','淘宝特卖','http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351859_9092254&eventid=101586','#FF0000','5');
INSERT INTO 5w_search_keyword VALUES('44','10','广告','http://www.btc123.com','','5');
INSERT INTO 5w_search_keyword VALUES('62','2','高效“另类挖矿”方式','http://dalanmao.net','#000000','5');

INSERT INTO 5w_site VALUES('1','1341895544','btcguild全网成果','https://www.btcguild.com/block_list.php','0','0','0','10','0','0','1341895544','','22','','');
INSERT INTO 5w_site VALUES('2','1341895544','BTC Guild','http://www.btcguild.com/','0','0','0','10','0','1','1365153235','','20','','');
INSERT INTO 5w_site VALUES('3','1341895544','slush运行状态','http://mining.bitcoin.cz/stats/','0','0','0','10','0','0','1341895544','','12','','');
INSERT INTO 5w_site VALUES('4','1341895544','slush','http://mining.bitcoin.cz/','0','0','0','10','0','1','1341895544','','10','','');
INSERT INTO 5w_site VALUES('5','1341895544','deepbit组团挖矿','https://deepbit.net/teams/','0','0','0','10','0','0','1341895544','','5','','');
INSERT INTO 5w_site VALUES('6','1341895544','deepbit运行状态','https://deepbit.net/stats','0','0','0','10','0','0','1341895544','','3','','');
INSERT INTO 5w_site VALUES('7','1341895544','deepbit','http://www.deepbit.net/','0','0','0','10','0','1','1341895897','','2','','');
INSERT INTO 5w_site VALUES('8','1341895655','BTCMine','http://btcmine.com/','0','0','0','10','0','1','1341895655','','65','','');
INSERT INTO 5w_site VALUES('9','1341895655','Bitparking矿池','http://mmpool.bitparking.com/pool','0','0','0','10','0','1','1341895655','','60','','');
INSERT INTO 5w_site VALUES('10','1341895655','EclipseMC','https://eclipsemc.com/','0','0','0','10','0','1','1341895655','','55','','');
INSERT INTO 5w_site VALUES('11','1341895655','Eligius','http://eligius.st/','0','0','0','10','0','1','1341895655','','50','','');
INSERT INTO 5w_site VALUES('12','1341895655','p2pool','http://p2pool.info/','0','0','0','10','0','1','1341895655','','45','','');
INSERT INTO 5w_site VALUES('13','1341895655','Ozcoin','http://ozco.in/','0','0','0','10','0','1','1341895655','','40','','');
INSERT INTO 5w_site VALUES('14','1341895655','abcpool','http://www.abcpool.co/','0','0','0','10','0','1','1341895655','','35','','');
INSERT INTO 5w_site VALUES('15','1341895655','MaxBTC(已关闭)','https://www.maxbtc.com/','0','0','0','10','0','1','1380503732','','30','','');
INSERT INTO 5w_site VALUES('16','1341895889','CPU网页挖矿','http://www.bitcoinplus.com/','0','0','0','10','0','0','1341895889','','1','','');
INSERT INTO 5w_site VALUES('17','1341895889','BTCWarp','http://pool.btcwarp.com/','0','0','0','10','0','1','1341895889','','95','','');
INSERT INTO 5w_site VALUES('18','1341895889','BitMinter','https://bitminter.com/','0','0','0','10','0','1','1341895889','','90','','');
INSERT INTO 5w_site VALUES('19','1341895889','TripleMining','https://www.triplemining.com/','0','0','0','10','0','1','1341895889','','85','','');
INSERT INTO 5w_site VALUES('20','1341895889','Metabank','https://metabank.ru/pool','0','0','0','10','0','1','1341895889','','80','','');
INSERT INTO 5w_site VALUES('21','1341895889','BitcoinPool','https://www.bitcoinpool.com/','0','0','0','10','0','1','1341895889','','75','','');
INSERT INTO 5w_site VALUES('22','1341895889','Mt.Red','https://mtred.com/','0','0','0','10','0','1','1341895889','','70','','');
INSERT INTO 5w_site VALUES('23','1342067676','比特币中国实时行情','http://info.btc123.com/index_btcchina.php','0','0','0','16','0','1','1370611520','','5','#C80000','');
INSERT INTO 5w_site VALUES('24','1342067676','MtGox美元价格行情','http://info.btc123.com/','0','0','0','16','0','1','1369328114','','1','#FF0000','');
INSERT INTO 5w_site VALUES('25','1342067676','比特币K线汇总','http://k.btc123.com','0','0','0','16','0','1','1370537454','','7','','');
INSERT INTO 5w_site VALUES('26','1342067676','MtGox 深度','https://mtgox.com/api/0/data/getDepth.php','0','0','0','16','0','0','1342067676','','15','','');
INSERT INTO 5w_site VALUES('27','1342067676','BitcoinCharts','http://bitcoincharts.com/charts/mtgoxUSD','0','0','0','16','0','1','1370537454','','10','','');
INSERT INTO 5w_site VALUES('28','1342067676','BTCcharts','http://btccharts.com/#m=mtgox-BTC-USD','0','0','0','16','0','1','1347684053','','30','','');
INSERT INTO 5w_site VALUES('29','1342067676','BitStock','http://bitstock.info/','0','0','0','16','0','0','1347684053','','25','','');
INSERT INTO 5w_site VALUES('30','1342197708','BTC基本原理 by 云风','http://blog.codingnow.com/2011/05/bitcoin.html','0','0','0','12','0','1','1370153484','','1','','');
INSERT INTO 5w_site VALUES('31','1342197735','BTC技术原理','http://zhiqiang.org/blog/it/technical-document-of-bitcoin.html','0','0','0','12','0','1','1370153484','','5','','');
INSERT INTO 5w_site VALUES('32','1342197753','36氪的BTC简单介绍','http://www.36kr.com/p/24387.html','0','0','0','12','0','1','1370153484','','10','','');
INSERT INTO 5w_site VALUES('33','1342197772','从入门到精通','http://cnbtcnews.com/bitcoin-study/what-is-bitcoin/bitcoin-form-accidence-to-mastery.html','0','0','0','12','0','1','1342197772','','15','#FF0000','');
INSERT INTO 5w_site VALUES('34','1342197786','中文维基','https://zh-cn.bitcoin.it/','0','0','0','12','0','1','1342197786','','20','','');
INSERT INTO 5w_site VALUES('35','1342197863','Learn Bitcoin','http://blog.bitinstant.com/learn-bitcoin/','0','0','0','12','0','0','1342197863','','25','','');
INSERT INTO 5w_site VALUES('36','1342197878','WeUseCoins','http://www.weusecoins.com/','0','0','0','12','0','1','1342197878','','30','','');
INSERT INTO 5w_site VALUES('37','1342197901','LoveBitcoins','http://lovebitcoins.org/','0','0','0','12','0','1','1342197901','','35','','');
INSERT INTO 5w_site VALUES('39','1342431778','blockexplorer Queries','http://blockexplorer.com/q','0','0','0','7','0','1','1346382266','','1','','');
INSERT INTO 5w_site VALUES('40','1342438173','关于BTC的争论','http://shaneliu.org/archives/506','0','0','0','12','0','0','1370154197','','45','','');
INSERT INTO 5w_site VALUES('41','1342489532','BitVPS','http://www.bitvps.com/','0','0','0','8','0','1','1342489532','','1','','');
INSERT INTO 5w_site VALUES('42','1342489650','Vircurex','https://vircurex.com/','0','0','0','15','0','0','1342489846','','10','','');
INSERT INTO 5w_site VALUES('43','1342489846','BitStamp','https://www.bitstamp.net/','0','0','0','15','0','0','1365133479','','50','','');
INSERT INTO 5w_site VALUES('44','1342489846','比特币树','http://www.btctree.com/','0','0','0','15','0','0','1342489846','','45','','');
INSERT INTO 5w_site VALUES('45','1342489846','比特币兑换网','http://www.btc1000.com/','0','0','0','15','0','0','1342489846','','40','','');
INSERT INTO 5w_site VALUES('46','1342489846','比特币中国','https://www.btcchina.com/','0','0','0','15','0','0','1361767385','','35','','');
INSERT INTO 5w_site VALUES('47','1342489846','NanaimoGold','https://www.nanaimogold.com/bitcoin.php','0','0','0','15','0','0','1342489846','','30','','');
INSERT INTO 5w_site VALUES('48','1342489846','bitcoinCentral','https://bitcoin-central.net/','0','0','0','15','0','0','1342489846','','25','','');
INSERT INTO 5w_site VALUES('49','1342489846','btc-e','http://www.btc-e.com/','0','0','0','15','0','0','1342489846','','20','','');
INSERT INTO 5w_site VALUES('50','1342489846','BitInstant','http://bitinstant.com/','0','0','0','15','0','0','1342489846','','15','','');
INSERT INTO 5w_site VALUES('51','1342489846','Mt.Gox','http://www.mtgox.com/','0','0','0','15','0','0','1342489846','','1','','');
INSERT INTO 5w_site VALUES('52','1342489846','Tradehill','http://www.tradehill.com','0','0','0','15','0','0','1365133536','','5','','');
INSERT INTO 5w_site VALUES('53','1343201949','BlockChain钱包','http://blockchain.info/wallet','0','0','0','8','0','1','1370508125','','5','','');
INSERT INTO 5w_site VALUES('54','1343201949','易用钱包EasyWallet','https://easywallet.org/','0','0','0','8','0','1','1370535419','','10','','');
INSERT INTO 5w_site VALUES('55','1343201949','Instawallet','https://www.instawallet.org/','0','0','0','8','0','0','1343201949','','15','','');
INSERT INTO 5w_site VALUES('56','1343202057','本地面交平台','https://localbitcoins.com/','0','0','0','18','0','1','1367162428','','1','','');
INSERT INTO 5w_site VALUES('57','1343202057','Bit-Pay','https://bit-pay.com/','0','0','0','18','0','1','1343202057','','5','','');
INSERT INTO 5w_site VALUES('58','1343202130','炒币基金ultimafund','http://www.ultimafund.com/','0','0','0','17','0','1','1371142703','','5','','');
INSERT INTO 5w_site VALUES('59','1343202130','GLBSE','https://glbse.com/','0','0','0','17','0','0','1343202130','','1','','');
INSERT INTO 5w_site VALUES('60','1343202728','coinDL','https://www.coindl.com/','0','0','0','8','0','1','1343202728','','20','','');
INSERT INTO 5w_site VALUES('61','1343202741','Bitmit','http://www.bitmit.net/','0','0','0','18','0','1','1343202741','','10','','');
INSERT INTO 5w_site VALUES('62','1343531917','BTC的缺陷 - 张志强','http://zhiqiang.org/blog/finance/techinical-and-financial-deficit-of-bitcoin.html','0','0','0','11','0','1','1371724797','','1','','');
INSERT INTO 5w_site VALUES('63','1343531917','Is Bitcoin A Good Idea','http://www.quora.com/Bitcoin/Is-the-cryptocurrency-Bitcoin-a-good-idea','0','0','0','11','0','1','1371723674','','5','','');
INSERT INTO 5w_site VALUES('64','1343543098','一线码农的cnblog','http://www.cnblogs.com/huangxincheng/','0','0','0','11','0','1','1343543098','','10','','');
INSERT INTO 5w_site VALUES('65','1343889138','Bitcoin Savings & Trust','https://bitcointalk.org/index.php?topic=50822.0','0','0','0','21','0','1','1343889138','','1','','');
INSERT INTO 5w_site VALUES('66','1344052209','slush矿池创始帖子','https://bitcointalk.org/index.php?topic=1976.0','0','0','0','6','0','1','1368024921','','2','','');
INSERT INTO 5w_site VALUES('67','1344647166','50BTC','https://50btc.com/','0','0','0','10','0','1','1344647166','','90','','');
INSERT INTO 5w_site VALUES('68','1344651836','中文比特币新闻网','http://www.cnbtcnews.com/','0','0','0','1','0','0','1368268200','','1','','');
INSERT INTO 5w_site VALUES('69','1344651913','BTC优秀文章翻译','http://cnbitcointalk.com/','0','0','0','1','0','0','1375173219','','20','','');
INSERT INTO 5w_site VALUES('70','1344651913','BTC86比特币资讯','http://www.bitcoin86.com/index.html','0','0','0','1','0','0','1375173219','','15','','');
INSERT INTO 5w_site VALUES('71','1344651913','比特币中文资讯','http://www.bitecoin.com/','0','0','0','1','0','1','1375806397','','10','','');
INSERT INTO 5w_site VALUES('72','1344651913','比特币中国wiki','http://btcchina.org','0','0','0','1','0','1','1380530580','','5','','');
INSERT INTO 5w_site VALUES('73','1344652078','中文维基','https://zh-cn.bitcoin.it/','0','0','0','1','0','1','1344652078','','25','','');
INSERT INTO 5w_site VALUES('74','1344653156','实时未确认交易(C)','http://blockchain.info/unconfirmed-transactions','0','0','0','9','0','1','1346257909','','3','','');
INSERT INTO 5w_site VALUES('75','1344653156','全球节点(C)','http://www.weusecoins.com/globe-bitcoin/','0','0','0','9','0','0','1344653156','','5','','');
INSERT INTO 5w_site VALUES('76','1344653156','BlockChain的图表','http://www.blockchain.info/charts','0','0','0','9','0','1','1366187703','','10','','');
INSERT INTO 5w_site VALUES('77','1344653225','海峡比特币网','http://www.hxtop.com/','0','0','0','1','0','1','1375173219','','30','','');
INSERT INTO 5w_site VALUES('78','1344830538','Deflation and Bitcoin','https://bitcointalk.org/index.php?topic=11627.0','0','0','0','21','0','1','1344830538','','3','','');
INSERT INTO 5w_site VALUES('79','1346086455','关于bitlotto的帖子1','https://bitcointalk.org/index.php?topic=79862.0','0','0','0','21','0','1','1346086455','','5','','');
INSERT INTO 5w_site VALUES('80','1346086478','关于bitlotto的帖子2','https://bitcointalk.org/index.php?topic=34007.0','0','0','0','21','0','1','1346086478','','7','','');
INSERT INTO 5w_site VALUES('81','1346134953','LiteCoin创世帖','https://bitcointalk.org/index.php?topic=47417.0','0','0','0','21','0','1','1346134953','','9','','');
INSERT INTO 5w_site VALUES('82','1346135339','LTC矿池列表','https://github.com/litecoin-project/litecoin/wiki/Comparison-of-mining-pools','0','0','0','19','0','1','1367764046','','85','','');
INSERT INTO 5w_site VALUES('83','1346135375','LiteCoin创世帖','https://bitcointalk.org/index.php?topic=47417.0','0','0','0','19','0','1','1346135375','','3','','');
INSERT INTO 5w_site VALUES('84','1346136051','Bitcoinbank','http://mybitcoinbank.de/','0','0','0','17','0','0','1346136051','','7','','');
INSERT INTO 5w_site VALUES('85','1346250562','SierraChart bridge','https://bitcointalk.org/index.php?topic=6019.0','0','0','0','21','0','1','1346250562','','11','','');
INSERT INTO 5w_site VALUES('86','1346257945','比特币中国实时价格','http://info.btc123.com/index_btcchina.php','0','0','0','9','0','1','1346258060','','2','#FF0000','');
INSERT INTO 5w_site VALUES('87','1346258188','比特币中国实时价格','http://info.btc123.com/index_btcchina.php','0','0','0','16','0','0','1346258188','','33','#FF0000','');
INSERT INTO 5w_site VALUES('88','1346298345','p2pool - talk创世帖','https://bitcointalk.org/index.php?topic=18313.0','0','0','0','22','0','1','1370500578','','15','','');
INSERT INTO 5w_site VALUES('89','1346298413','p2pool - wiki','https://en.bitcoin.it/wiki/P2Pool','0','0','0','22','0','1','1346298413','','3','','');
INSERT INTO 5w_site VALUES('90','1346298512','MiningFarm - talk','https://bitcointalk.org/index.php?topic=10617.0','0','0','0','22','0','1','1346298512','','5','','');
INSERT INTO 5w_site VALUES('91','1346298629','pushpool - talk','https://bitcointalk.org/index.php?topic=8707.0','0','0','0','22','0','1','1346298629','','7','','');
INSERT INTO 5w_site VALUES('92','1346382308','bitcoin-tools的网址汇总','http://www.bitcoin-tools.de/links.html','0','0','0','7','0','1','1346382308','','3','','');
INSERT INTO 5w_site VALUES('93','1347015330','Timekoin论坛介绍帖子','https://bitcointalk.org/index.php?topic=88467.0','0','0','0','19','0','1','1347015330','','5','','');
INSERT INTO 5w_site VALUES('94','1347684053','clarkmoody 深度表','http://bitcoin.clarkmoody.com/','0','0','0','16','0','0','1347684053','','35','','');
INSERT INTO 5w_site VALUES('95','1347684053','MtGoxlive','http://mtgoxlive.com/','0','0','0','16','0','0','1347684053','','40','','');
INSERT INTO 5w_site VALUES('96','1347720118','ppbit中文矿池','http://ppbit.com/','0','0','0','10','0','0','1347720118','','87','','');
INSERT INTO 5w_site VALUES('97','1347720292','btc熊猫矿池','http://www.btcpanda.com/','0','0','0','10','0','0','1347721566','','89','','');
INSERT INTO 5w_site VALUES('98','1347811078','比特铸币池','http://www.btcminter.com/','0','0','0','10','0','0','1347811078','','82','','');
INSERT INTO 5w_site VALUES('99','1348285935','p2pool 论坛创世帖','https://bitcointalk.org/index.php?topic=18313.0','0','0','0','10','0','0','1348285935','','100','','');
INSERT INTO 5w_site VALUES('100','1348285955','P2Pool wiki','https://en.bitcoin.it/wiki/P2Pool','0','0','0','10','0','0','1348285955','','105','','');
INSERT INTO 5w_site VALUES('101','1348827463','LTC K线','http://www.ltc-charts.com/','0','0','0','19','0','1','1348827463','','7','','');
INSERT INTO 5w_site VALUES('102','1349416372','如何搭建BTC交易所','http://www.reddit.com/r/Bitcoin/comments/oii6l/how_do_i_set_up_a_bitcoin_exchange','0','0','0','11','0','1','1371723858','','15','','');
INSERT INTO 5w_site VALUES('103','1349416509','Intersango 自建交易所','https://bitcointalk.org/index.php?topic=35812.0','0','0','0','11','0','1','1371723595','','20','','');
INSERT INTO 5w_site VALUES('104','1349416527','开源BTC交易所','http://bitcoin.stackexchange.com/questions/1447/is-there-an-open-source-bitcoin-exchange','0','0','0','11','0','1','1371723898','','25','','');
INSERT INTO 5w_site VALUES('105','1350049772','LTCBBS','http://ltcbbs.com','0','0','0','1','0','0','1350049772','','7','','');
INSERT INTO 5w_site VALUES('106','1351393317','BTCFPGA','http://www.btcfpga.com/','0','0','0','23','0','0','1351393317','','1','','');
INSERT INTO 5w_site VALUES('107','1351393317','蝴蝶矿机官网(墙)','http://www.butterflylabs.com/','0','0','0','23','0','1','1368268219','','2','','');
INSERT INTO 5w_site VALUES('108','1351393317','Xiangfu\'s Website','http://www.openmobilefree.net/','0','0','0','23','0','1','1351393317','','3','','');
INSERT INTO 5w_site VALUES('109','1362224601','Avalon网上商店','http://launch.avalon-asics.com/','0','0','0','24','0','1','1362224601','','1','','');
INSERT INTO 5w_site VALUES('110','1362224601','Avaon使用文档','https://en.bitcoin.it/wiki/Avalon','0','0','0','24','0','1','1367219199','','2','','');
INSERT INTO 5w_site VALUES('111','1362224601','软件代码','https://github.com/BitSyncom','0','0','0','24','0','1','1362224601','','3','','');
INSERT INTO 5w_site VALUES('112','1362224601','Lancelot 矿机购买','http://item.taobao.com/item.htm?id=13920274208','0','0','0','24','0','0','1362224601','','4','','');
INSERT INTO 5w_site VALUES('113','1362224601','Lancelot/Icarus文档','http://en.qi-hardware.com/wiki/Icarus','0','0','0','24','0','1','1362224601','','5','','');
INSERT INTO 5w_site VALUES('114','1345630193','免费比特币','http://free.btcfor.us','0','0','0','1','0','1','0','','100','','');
INSERT INTO 5w_site VALUES('115','1364527790','bitcoinity','http://bitcoinity.org/markets','0','0','0','16','0','1','1364527914','','20','','');
INSERT INTO 5w_site VALUES('116','1365133389','比特币美元兑换','http://www.btccny.net/','0','0','0','15','0','0','1365133535','','40','','');
INSERT INTO 5w_site VALUES('117','1365134523','Bitcoin-24','https://bitcoin-24.com/','0','0','0','15','0','0','1365134523','','36','','');
INSERT INTO 5w_site VALUES('118','1365152663','slush运行状态','http://mining.bitcoin.cz/stats/','0','0','0','6','0','1','1365152663','','3','','');
INSERT INTO 5w_site VALUES('119','1365152908','BTC Guild 矿池运行状态','https://www.btcguild.com/index.php?page=pool_stats','0','0','0','6','0','1','1365152913','','6','','');
INSERT INTO 5w_site VALUES('120','1365152940','btcguild 英雄榜','https://www.btcguild.com/index.php?page=rankings','0','0','0','6','0','1','1367163489','','8','','');
INSERT INTO 5w_site VALUES('121','1365153002','p2pool 创世帖','https://bitcointalk.org/index.php?topic=18313.0','0','0','0','6','0','1','1367163471','','11','','');
INSERT INTO 5w_site VALUES('122','1365153003','P2Pool wiki','https://en.bitcoin.it/wiki/P2Pool','0','0','0','6','0','1','1365153003','','13','','');
INSERT INTO 5w_site VALUES('123','1365153090','deepbit 状态','https://deepbit.net/stats','0','0','0','6','0','1','1367163462','','16','','');
INSERT INTO 5w_site VALUES('124','1365153121','deepbit 团队榜','https://deepbit.net/teams/','0','0','0','6','0','1','1367163456','','17','','');
INSERT INTO 5w_site VALUES('125','1366187471','Ferro成交量热力图','https://ferroh.com/charts','0','0','0','9','0','1','1366187703','','15','','');
INSERT INTO 5w_site VALUES('126','1366187728','非常实时的美元行情','http://ss.btc123.com','0','0','0','9','0','1','1366461741','','20','','');
INSERT INTO 5w_site VALUES('127','1366424813','Bitcoin交易信号(W)','http://btctrading.wordpress.com/','0','0','0','26','0','0','1368267247','','1','','');
INSERT INTO 5w_site VALUES('128','1366424834','BitcoinWatch的技术分析','http://blog.bitcoinwatch.com/','0','0','0','26','0','0','1366424955','','5','','');
INSERT INTO 5w_site VALUES('129','1366424859','比特币牛熊网(W)','http://www.bitcoinbullbear.com/','0','0','0','26','0','0','1366424859','','10','','');
INSERT INTO 5w_site VALUES('130','1366424876','BitcoinAnalyst','http://chart.ly/users/BitcoinAnalyst','0','0','0','26','0','0','1366424886','','15','','');
INSERT INTO 5w_site VALUES('131','1366461743','难度与算力图','http://bitcoin.sipa.be/','0','0','0','9','0','1','1366461743','','25','','');
INSERT INTO 5w_site VALUES('132','1367163415','42BTC','http://42btc.com/','0','0','0','15','0','0','1367163415','','55','','');
INSERT INTO 5w_site VALUES('133','1367163415','HIBTC','http://www.hibtc.com/','0','0','0','15','0','0','1367163415','','56','','');
INSERT INTO 5w_site VALUES('134','1367163416','Bter','http://www.bter.com','0','0','0','15','0','0','1367163416','','57','','');
INSERT INTO 5w_site VALUES('135','1367219253','Avalon 用户讨论帖','https://bitcointalk.org/index.php?topic=140539.0;all','0','0','0','24','0','1','1367219253','','7','','');
INSERT INTO 5w_site VALUES('136','1367578551','初级挖矿教学','http://cnbtcnews.com/bitcoin-study/bitcoin-mining-guid/bitcoin-mining-teach-for-beginner.html','0','0','0','27','0','1','1367578551','','1','','');
INSERT INTO 5w_site VALUES('137','1367578626',' 比特币论坛挖矿专区','http://www.btcbbs.com/forum.php?gid=43','0','0','0','27','0','1','1367578626','','20','','');
INSERT INTO 5w_site VALUES('138','1367578626','Ubuntu 11.04 挖矿教程','https://bitcointalk.org/index.php?topic=7514.0','0','0','0','27','0','1','1367578626','','15','','');
INSERT INTO 5w_site VALUES('139','1367578626','cgminer官方发布帖','https://bitcointalk.org/index.php?topic=28402.0','0','0','0','27','0','1','1367578626','','10','','');
INSERT INTO 5w_site VALUES('140','1367578626','Ubuntu挖矿','https://bitcointalk.org/index.php?topic=9239.0','0','0','0','27','0','1','1367578626','','5','','');
INSERT INTO 5w_site VALUES('141','1367626067','mpex证券代理','https://coinbr.com/','0','0','0','17','0','1','1367626067','','20','','');
INSERT INTO 5w_site VALUES('142','1367626067','mpex证券交易所','http://mpex.co/','0','0','0','17','0','1','1377433809','','15','','');
INSERT INTO 5w_site VALUES('143','1367626067','ICBIT比特币期货','https://icbit.se/','0','0','0','17','0','1','1367626067','','10','','');
INSERT INTO 5w_site VALUES('144','1367675519','p2pool 源码','https://github.com/forrestv/p2pool','0','0','0','22','0','1','1367675519','','10','','');
INSERT INTO 5w_site VALUES('145','1367761838','Freicoin(FRC)','http://freico.in/','0','0','0','19','0','1','1367764046','','80','','');
INSERT INTO 5w_site VALUES('146','1367761838','FRC官方论坛','http://www.freicoin.org/','0','0','0','19','0','1','1367764046','','75','','');
INSERT INTO 5w_site VALUES('147','1367761838','PPCoin(PPC)','http://ppcoin.org/','0','0','0','19','0','1','1367764046','','70','','');
INSERT INTO 5w_site VALUES('148','1367761838','PPC创世帖','https://bitcointalk.org/index.php?topic=101820.0','0','0','0','19','0','1','1367764046','','65','','');
INSERT INTO 5w_site VALUES('149','1367761838','虚拟币汇总wiki(英文)','https://en.bitcoin.it/wiki/List_of_alternative_cryptocurrencies','0','0','0','19','0','1','1367764046','','60','','');
INSERT INTO 5w_site VALUES('150','1367761838','FeatherCoin(FTC)','http://feathercoin.com/','0','0','0','19','0','1','1370105344','','55','','');
INSERT INTO 5w_site VALUES('151','1367761838','FTC源代码','https://github.com/FeatherCoin/FeatherCoin','0','0','0','19','0','1','1367764046','','50','','');
INSERT INTO 5w_site VALUES('152','1367761838','Terracoin(TRC)','http://terracoin.org/','0','0','0','19','0','1','1367764046','','45','','');
INSERT INTO 5w_site VALUES('153','1367761838','NMC域名注册','http://register.dot-bit.org/','0','0','0','19','0','1','1367763556','','15','','');
INSERT INTO 5w_site VALUES('154','1367761838','NameCoin(NMC)','http://namecoin.info/','0','0','0','19','0','1','1367763556','','10','','');
INSERT INTO 5w_site VALUES('155','1367761838','Ripple(波纹币)','https://ripple.com/','0','0','0','19','0','1','1367764046','','40','','');
INSERT INTO 5w_site VALUES('156','1367761838','Timekoin','http://timekoin.org/','0','0','0','19','0','1','1367764046','','35','','');
INSERT INTO 5w_site VALUES('157','1367761838','LiteCoin(LTC)莱特币','http://litecoin.org/','0','0','0','19','0','1','1367764046','','30','','');
INSERT INTO 5w_site VALUES('158','1367761838','LTC汇兑','https://btc-e.com/exchange/ltc_btc','0','0','0','19','0','1','1367761838','','1','','');
INSERT INTO 5w_site VALUES('159','1367763559','NMC源码','https://github.com/vinced/namecoin','0','0','0','19','0','1','1367763559','','20','','');
INSERT INTO 5w_site VALUES('160','1367763604','Namecoin官网','http://dot-bit.org/Main_Page','0','0','0','19','0','1','1374808668','','25','','');
INSERT INTO 5w_site VALUES('161','1367924502','BTC行情页面汇总','http://z.btc123.com','0','0','0','9','0','1','1367924513','','30','','');
INSERT INTO 5w_site VALUES('162','1367944093','比特币期权交易','http://www.anyoption.com/bitcoin-options','0','0','0','17','0','1','1367944093','','25','','');
INSERT INTO 5w_site VALUES('163','1368024920','挖矿边际收益曲线','http://blockchain.info/charts/miners-operating-profit-margin','0','0','0','6','0','1','1368024920','','1','','');
INSERT INTO 5w_site VALUES('164','1368073458','买币 vs 挖矿','http://forum.bitcoin.org/index.php?topic=7427.0','0','0','0','6','0','1','1368073458','','20','','');
INSERT INTO 5w_site VALUES('165','1368083114','比特币借贷','http://coinlenders.com/','0','0','0','17','0','1','1368083114','','30','','');
INSERT INTO 5w_site VALUES('166','1364233850','比特先锋','https://bitxf.com','0','0','0','0','0','1','0','','100','','');
INSERT INTO 5w_site VALUES('167','1364741070','比特币爱好者','http://www.btcfans.com/','0','0','0','0','0','1','0','','100','','');
INSERT INTO 5w_site VALUES('168','1368263909','FxBTC','https://www.fxbtc.com','0','0','0','15','0','0','1368263909','','60','','');
INSERT INTO 5w_site VALUES('169','1368266612','Mt.Gox','http://www.mtgox.com/','0','0','0','28','0','1','1368266612','','1','','');
INSERT INTO 5w_site VALUES('170','1368266612','btc-e','http://www.btc-e.com/','0','0','0','28','0','1','1368266612','','5','','');
INSERT INTO 5w_site VALUES('171','1368266612','BitStamp','https://www.bitstamp.net/','0','0','0','28','0','1','1368266612','','10','','');
INSERT INTO 5w_site VALUES('172','1368266612','Bitcoin-24(欧洲)(墙)','https://bitcoin-24.com/','0','0','0','28','0','1','1368266612','','15','','');
INSERT INTO 5w_site VALUES('173','1368266612','Vircurex(可能被黑)','http://vircurex.com/','0','0','0','28','0','1','1368266612','','20','','');
INSERT INTO 5w_site VALUES('174','1368266612','Tradehill','http://www.tradehill.com','0','0','0','28','0','1','1368266612','','25','','');
INSERT INTO 5w_site VALUES('175','1368266612','bitcoinCentral(被黑)','https://bitcoin-central.net/','0','0','0','28','0','1','1368266612','','30','','');
INSERT INTO 5w_site VALUES('176','1368266612','NanaimoGold (墙)','https://www.nanaimogold.com/bitcoin.php','0','0','0','28','0','1','1368266612','','35','','');
INSERT INTO 5w_site VALUES('177','1368266612','Virwox','https://www.virwox.com','0','0','0','28','0','1','1368266612','','40','','');
INSERT INTO 5w_site VALUES('178','1368266922','A Libertarian Intro(墙)','http://evoorhees.blogspot.com/2012/04/bitcoin-libertarian-introduction.html','0','0','0','12','0','1','1370153973','','40','','');
INSERT INTO 5w_site VALUES('181','1368267517','比特海','https://www.btcsea.com','0','0','0','15','0','0','1368267517','','40','','');
INSERT INTO 5w_site VALUES('182','1368408389','各种虚拟币挖矿收益表','http://www.coinchoose.com/','0','0','0','6','0','1','1368408389','','25','','');
INSERT INTO 5w_site VALUES('183','1368511798','Coinsetter外汇交易平台','http://www.coinsetter.com/','0','0','0','28','0','1','1368511798','','45','','');
INSERT INTO 5w_site VALUES('184','1368530332','ASICMINER IPO帖子','https://bitcointalk.org/index.php?topic=99497.0','0','0','0','21','0','1','1368530332','','15','','');
INSERT INTO 5w_site VALUES('185','1368589041','Goomboo技术分析','https://bitcointalk.org/index.php?topic=60501.0','0','0','0','26','0','0','1368589041','','20','','');
INSERT INTO 5w_site VALUES('186','1368811478','挖矿收益计算器','http://mining.btcfans.com/','0','0','0','6','0','1','1368811478','','30','','');
INSERT INTO 5w_site VALUES('187','1368929506','BitFunder股票交易所','https://bitfunder.com/','0','0','0','17','0','1','1377433793','','1','','');
INSERT INTO 5w_site VALUES('188','1368929539','btct.co股票交易所','https://btct.co/','0','0','0','17','0','1','1368929539','','35','','');
INSERT INTO 5w_site VALUES('189','1368930756','havelock股票基金平台','https://www.havelockinvestments.com/','0','0','0','17','0','1','1375532505','','40','','');
INSERT INTO 5w_site VALUES('190','1368932960','加拿大BTC兑换平台','https://www.canadianbitcoins.com/','0','0','0','28','0','1','1368932963','','55','','');
INSERT INTO 5w_site VALUES('191','1368932961','加拿大虚拟交易VirtEx','https://www.cavirtex.com/','0','0','0','28','0','1','1368932961','','50','','');
INSERT INTO 5w_site VALUES('192','1369017899','btctrade','http://www.btctrade.com','0','0','0','15','0','0','1369017899','','65','','');
INSERT INTO 5w_site VALUES('193','1369278082','btcGarden项目','https://bitcointalk.org/index.php?topic=213172.0','0','0','0','23','0','1','1369278082','','4','','');
INSERT INTO 5w_site VALUES('194','1369278110','btcGarden官网','http://www.btcgarden.com','0','0','0','23','0','1','1369278110','','5','','');
INSERT INTO 5w_site VALUES('195','1369328018','MtGox买卖实时深度','http://mm.btc123.com','0','0','0','16','0','1','1369328086','','45','','');
INSERT INTO 5w_site VALUES('196','1369328075','btcchina买卖实时深度','http://mm.btc123.com/btcchina.php','0','0','0','16','0','1','1369328075','','55','','');
INSERT INTO 5w_site VALUES('197','1369328142','比特儿Bter实时行情','http://info.btc123.com/bter.php','0','0','0','16','0','1','1369328142','','50','','');
INSERT INTO 5w_site VALUES('198','1369390240','Avalon芯片收款地址','https://blockchain.info/address/1FGAftzSTztFSB8LMwsrdCKTyqGY6zr3sU','0','0','0','23','0','1','1369390240','','10','','');
INSERT INTO 5w_site VALUES('199','1369404367','DigCoin众筹','https://digco.in/','0','0','0','23','0','1','1369404367','','15','','');
INSERT INTO 5w_site VALUES('200','1369406596','coinpunk','http://coinpunk.org/','0','0','0','8','0','1','1369406596','','25','','');
INSERT INTO 5w_site VALUES('201','1369408935','比特币挖矿收益计算器','http://www.alloscomp.com/bitcoin/calculator','0','0','0','6','0','1','1369408935','','35','','');
INSERT INTO 5w_site VALUES('202','1369409012','另一个挖矿收益对比表','http://dustcoin.com/mining','0','0','0','6','0','1','1369409012','','40','','');
INSERT INTO 5w_site VALUES('203','1369561810','域名Namecheap','http://www.namecheap.com/','0','0','0','29','0','1','1369561810','','1','','');
INSERT INTO 5w_site VALUES('204','1369561810','WordPress(墙)','http://en.support.wordpress.com/bitcoin/','0','0','0','29','0','1','1369561810','','2','','');
INSERT INTO 5w_site VALUES('205','1369561810','P2P下载海盗湾(墙)','http://thepiratebay.se/','0','0','0','29','0','1','1369561810','','3','','');
INSERT INTO 5w_site VALUES('206','1369561810','Reddit','http://www.reddit.com/r/Bitcoin/','0','0','0','29','0','1','1369561810','','4','','');
INSERT INTO 5w_site VALUES('207','1369561810','互联网档案馆','http://archive.org/donate/','0','0','0','29','0','1','1369561810','','5','','');
INSERT INTO 5w_site VALUES('208','1369561810','图片布告4chan','https://www.4chan.org/pass','0','0','0','29','0','1','1369561810','','6','','');
INSERT INTO 5w_site VALUES('209','1369561810','OkPay','https://www.okpay.com','0','0','0','29','0','1','1369561810','','7','','');
INSERT INTO 5w_site VALUES('210','1369561810','欧洲卖烟的','http://www.cigs.eu/','0','0','0','29','0','1','1369561810','','8','','');
INSERT INTO 5w_site VALUES('211','1369568747','亚利桑那州一律师行','http://www.roselawgroup.com/','0','0','0','29','0','1','1369568747','','9','','');
INSERT INTO 5w_site VALUES('212','1369568872','微电影《ABE》','http://www.abemovie.com/','0','0','0','29','0','1','1369568872','','10','','');
INSERT INTO 5w_site VALUES('213','1369569268','BTC换购物卡','http://bit-cards.com/','0','0','0','29','0','1','1369569268','','11','','');
INSERT INTO 5w_site VALUES('214','1369569396','某国外家教网','http://www.plusplustutoring.com/blog/index.php?itemid=162','0','0','0','29','0','1','1369569396','','12','','');
INSERT INTO 5w_site VALUES('215','1369569661','(国内)某婴儿商店','http://shop33439203.taobao.com/','0','0','0','29','0','1','1369646958','','13','','');
INSERT INTO 5w_site VALUES('216','1369631898','约会网OkCupid','http://www.okcupid.com/','0','0','0','29','0','1','1369631898','','14','','');
INSERT INTO 5w_site VALUES('217','1369640023','Linux Mint (捐赠)','http://www.linuxmint.com/donors.php','0','0','0','29','0','1','1369640023','','15','','');
INSERT INTO 5w_site VALUES('218','1369640160','波士顿某素食餐馆','http://www.veggiegalaxy.com/','0','0','0','29','0','1','1369640160','','16','','');
INSERT INTO 5w_site VALUES('219','1369640306','服务市场Resallex','https://www.resallex.com/','0','0','0','29','0','1','1369640306','','17','','');
INSERT INTO 5w_site VALUES('220','1369640408','加拿大某喷雾器','http://www.vapetropolis.com/','0','0','0','29','0','1','1369640408','','18','','');
INSERT INTO 5w_site VALUES('221','1369640411','软件公司CreateTank','http://www.createtank.com/','0','0','0','29','0','1','1369640411','','19','','');
INSERT INTO 5w_site VALUES('222','1369645125','俄罗斯WebMoney','http://wmtransfer.com/','0','0','0','29','0','1','1369645125','','20','','');
INSERT INTO 5w_site VALUES('223','1369645171','美大学生橄榄球锦标赛','http://www.usasevenscrc.com/group-tickets/','0','0','0','29','0','1','1369646944','','21','','');
INSERT INTO 5w_site VALUES('224','1369645272','加州某寿司店','http://oceanbluesushica.com/','0','0','0','29','0','1','1369645272','','22','','');
INSERT INTO 5w_site VALUES('225','1369645305','某电子产品网上商城','http://bitelectronics.net/','0','0','0','29','0','1','1369645305','','23','','');
INSERT INTO 5w_site VALUES('226','1369645383','某英国原创画商','https://www.artgalleriesdirect.com','0','0','0','29','0','1','1369645383','','24','','');
INSERT INTO 5w_site VALUES('227','1369645420','比特币人才市场','http://coind.net/','0','0','0','29','0','1','1369645420','','25','','');
INSERT INTO 5w_site VALUES('228','1369645443','比特币书店','http://www.cointagion.com/','0','0','0','29','0','1','1369645443','','26','','');
INSERT INTO 5w_site VALUES('229','1369645510','比特币ATM机公司R','https://www.robocoinkiosk.com/','0','0','0','29','0','1','1369645510','','29','','');
INSERT INTO 5w_site VALUES('230','1369645510','比特币ATM机公司B','https://bitcoinatm.com/','0','0','0','29','0','1','1370187330','','28','','');
INSERT INTO 5w_site VALUES('231','1369645510','比特币ATM机公司L','http://lamassubtc.com/','0','0','0','29','0','1','1369645510','','27','','');
INSERT INTO 5w_site VALUES('232','1369645556','文件换BTC','http://btcfile.com','0','0','0','29','0','1','1370187358','','156','','');
INSERT INTO 5w_site VALUES('233','1369645632','佛蒙特州某度假屋','http://killingtoncabin.com/','0','0','0','29','0','1','1370187279','','157','','');
INSERT INTO 5w_site VALUES('234','1369645668','BTC买高端奢侈品','http://www.bitpremier.com/','0','0','0','29','0','1','1369645668','','30','','');
INSERT INTO 5w_site VALUES('235','1369645700','BTC换礼品卡','http://icedmocha.co.uk/','0','0','0','29','0','1','1369645700','','31','','');
INSERT INTO 5w_site VALUES('236','1369645731','BTC买门票','http://bitseats.com/','0','0','0','29','0','1','1369645731','','32','','');
INSERT INTO 5w_site VALUES('237','1369645825','(国内)BTC买燕窝虫草','http://hidi.taobao.com/','0','0','0','29','0','1','1369645825','','33','','');
INSERT INTO 5w_site VALUES('238','1369645868','马略卡岛某素食餐馆','http://rawger-arohma.com/','0','0','0','29','0','1','1369645868','','34','','');
INSERT INTO 5w_site VALUES('239','1369646245','美国某律师行(墙)','http://www.l4sb.com/','0','0','0','29','0','1','1369646245','','35','','');
INSERT INTO 5w_site VALUES('240','1369646307','哥伦比亚某园艺店','http://www.paisajismocreativo.com.co/','0','0','0','29','0','1','1369646307','','36','','');
INSERT INTO 5w_site VALUES('241','1369646389','经济学教育基金(捐)','http://www.fee.org/donate/page/donate-bitcoins','0','0','0','29','0','1','1369646389','','37','','');
INSERT INTO 5w_site VALUES('242','1369646439','维基世界地图(捐)','http://www.openstreetmap.org/','0','0','0','29','0','1','1369646439','','38','','');
INSERT INTO 5w_site VALUES('243','1369646469','某室内生长灯商家','http://www.hydroponicshut.com/','0','0','0','29','0','1','1369646469','','39','','');
INSERT INTO 5w_site VALUES('244','1369646507','旧金山某寿司店','http://www.sfnarasushi.com/','0','0','0','29','0','1','1369646507','','40','','');
INSERT INTO 5w_site VALUES('245','1369646561','开源OS Haiku(捐)','https://www.haiku-os.org/blog/mmadia/2013-05-12_bitcoin_now_accepted','0','0','0','29','0','1','1369646561','','41','','');
INSERT INTO 5w_site VALUES('252','1369648128','Kim Dotcom的MEGA','https://mega.co.nz/','0','0','0','29','0','1','1369648191','','42','','');
INSERT INTO 5w_site VALUES('253','1369648175','Lumfile云文件服务器','http://lumfile.com/','0','0','0','29','0','1','1369648175','','43','','');
INSERT INTO 5w_site VALUES('254','1369648441','加密聊ChatSecure(捐)','https://chatsecure.org/','0','0','0','29','0','1','1369648525','','44','','');
INSERT INTO 5w_site VALUES('255','1369648574','洛杉矶某录音棚','http://masmusicproductions.com/bitcoin-accepted-here/','0','0','0','29','0','1','1369648574','','45','','');
INSERT INTO 5w_site VALUES('256','1369648823','旧金山某软件开发(捐)','http://www.yorba.org/about/donate/','0','0','0','29','0','1','1369648823','','49','','');
INSERT INTO 5w_site VALUES('257','1369648823','美国某百年书店(墙)','http://bravenewbookstore.com/','0','0','0','29','0','1','1369648823','','48','','');
INSERT INTO 5w_site VALUES('258','1369648823','救生用品诺亚的秘密','http://noahssecretinc.webs.com/','0','0','0','29','0','1','1369648823','','47','','');
INSERT INTO 5w_site VALUES('259','1369648823','Livi Design(墙)','http://livi-design.com/bitcoins/','0','0','0','29','0','1','1369648823','','46','','');
INSERT INTO 5w_site VALUES('260','1369649167','北美虚拟电话号码','http://www.numberproxy.com/','0','0','0','29','0','1','1369649167','','52','','');
INSERT INTO 5w_site VALUES('261','1369649167','游戏销售HumbleBundle','https://www.humblebundle.com/','0','0','0','29','0','1','1370227632','','51','','');
INSERT INTO 5w_site VALUES('262','1369649167','礼品卡应用网站','http://www.gyft.com/','0','0','0','29','0','1','1369649167','','50','','');
INSERT INTO 5w_site VALUES('263','1369671132','还是甜品店','http://www.mandrik.com/','0','0','0','29','0','1','1369671132','','63','','');
INSERT INTO 5w_site VALUES('264','1369671132','又是甜品店','http://cupsandcakesbakery.com/','0','0','0','29','0','1','1369671132','','62','','');
INSERT INTO 5w_site VALUES('265','1369671132','巧克力甜品店','http://www.the-chocolate-tree.co.uk/','0','0','0','29','0','1','1369671132','','61','','');
INSERT INTO 5w_site VALUES('266','1369671132','(国内)新西兰奶粉代购','http://shop103278383.taobao.com/','0','0','0','29','0','1','1369671132','','60','','');
INSERT INTO 5w_site VALUES('267','1369671132','某主机租赁商','http://www.crservers.com/','0','0','0','29','0','1','1369671132','','59','','');
INSERT INTO 5w_site VALUES('268','1369671132','某虚拟交换机公司','http://www.portell.ca/','0','0','0','29','0','1','1369671132','','58','','');
INSERT INTO 5w_site VALUES('269','1369671132','某在线唱片销售','http://www.buyreggae.com/','0','0','0','29','0','1','1369671132','','57','','');
INSERT INTO 5w_site VALUES('270','1369671132','加拿大某牙科医生','http://drwwl.com/','0','0','0','29','0','1','1369671132','','56','','');
INSERT INTO 5w_site VALUES('271','1369671132','某网上药店','http://www.btcpharmacy.co.uk/','0','0','0','29','0','1','1369671132','','55','','');
INSERT INTO 5w_site VALUES('272','1369671132','某植物生长灯','http://www.truliteled.com/shop/','0','0','0','29','0','1','1369671132','','54','','');
INSERT INTO 5w_site VALUES('273','1369671132','某网站设计公司','http://www.uneeksites.com/','0','0','0','29','0','1','1369671132','','53','','');
INSERT INTO 5w_site VALUES('274','1369672031','监控工具','http://itnerden.no/store/index.php','0','0','0','29','0','1','1369672031','','67','','');
INSERT INTO 5w_site VALUES('275','1369672031','著名哲学电台(捐)','http://www.freedomainradio.com/Donate.aspx','0','0','0','29','0','1','1369672031','','66','','');
INSERT INTO 5w_site VALUES('276','1369672031','阿根廷某有机蔬菜','http://www.tierrabuenadelivery.com/','0','0','0','29','0','1','1369672031','','65','','');
INSERT INTO 5w_site VALUES('277','1369672031','某手表商','http://watcharmory.com/','0','0','0','29','0','1','1369672031','','64','','');
INSERT INTO 5w_site VALUES('278','1369672346','西班牙某律师行','http://www.abogadosderechoshumanos.com/','0','0','0','29','0','1','1369672346','','68','','');
INSERT INTO 5w_site VALUES('279','1369672911','星际2比赛','http://www.sc2btc.com/bitcoin','0','0','0','29','0','1','1369672911','','71','','');
INSERT INTO 5w_site VALUES('280','1369672911','另一个星际2比赛','http://www.riskywagerdetected.com/','0','0','0','29','0','1','1369672911','','70','','');
INSERT INTO 5w_site VALUES('281','1369672911','纯棉女装','http://www.naturalcottonclothing.com/','0','0','0','29','0','1','1369672911','','69','','');
INSERT INTO 5w_site VALUES('282','1369724530','以色列某旅游公司','http://www.shevet-ahim.co.il/en/','0','0','0','29','0','1','1369724530','','72','','');
INSERT INTO 5w_site VALUES('283','1369724569','BTC买苹果产品','http://bitandbuy.com/','0','0','0','29','0','1','1369724569','','73','','');
INSERT INTO 5w_site VALUES('284','1369724792','社交网络FetLife','https://fetlife.com/','0','0','0','29','0','1','1369724792','','74','','');
INSERT INTO 5w_site VALUES('285','1369724891','孔明锁','http://www.cubicdissection.com/','0','0','0','29','0','1','1369724891','','75','','');
INSERT INTO 5w_site VALUES('286','1369725071','各种统计数据','http://bitinsight.info/','0','0','0','9','0','1','1369725071','','31','','');
INSERT INTO 5w_site VALUES('287','1369725687','差价合约plus500(墙)','http://www.plus500.com/','0','0','0','17','0','1','1370153888','','45','','');
INSERT INTO 5w_site VALUES('288','1369725858','BTC广告平台','http://btclicks.com/','0','0','0','8','0','1','1369725858','','30','','');
INSERT INTO 5w_site VALUES('289','1369725936','奥地利主机租赁','http://www.ccihosting.com/','0','0','0','29','0','1','1369725936','','76','','');
INSERT INTO 5w_site VALUES('290','1369726044','墨西哥某潜水俱乐部','http://www.diveadventurestulum.com/','0','0','0','29','0','1','1369726044','','77','','');
INSERT INTO 5w_site VALUES('291','1369732017','某游戏开发公司','http://www.tisimgames.com/','0','0','0','29','0','1','1369732017','','78','','');
INSERT INTO 5w_site VALUES('292','1369732191','免费电子书下载(捐)','http://boox.pw/search?q=baby','0','0','0','29','0','1','1369732191','','79','','');
INSERT INTO 5w_site VALUES('293','1369732227','德国某艺术品出租商','http://artefacti.de/','0','0','0','29','0','1','1369732227','','80','','');
INSERT INTO 5w_site VALUES('294','1369732329','澳洲小电商DigiDeals','https://digideals.com.au/','0','0','0','29','0','1','1369732329','','81','','');
INSERT INTO 5w_site VALUES('295','1369732410','丹麦某著名约会网','http://www.single.dk/','0','0','0','29','0','1','1369732410','','82','','');
INSERT INTO 5w_site VALUES('296','1369732476','澳洲个性衬衣袖扣','http://www.cufflinked.com.au/','0','0','0','29','0','1','1369732497','','83','','');
INSERT INTO 5w_site VALUES('297','1369732663','堪萨斯州某养马场','http://www.peeperranch.com/','0','0','0','29','0','1','1369732663','','85','','');
INSERT INTO 5w_site VALUES('298','1369732664','荷兰BTC跳蚤市场(墙)','http://bitcoinplaats.nl/','0','0','0','29','0','1','1369732664','','84','','');
INSERT INTO 5w_site VALUES('299','1369757397','(国内)德州扑克书店','http://nlploplo8.taobao.com/','0','0','0','29','0','1','1369757397','','86','','');
INSERT INTO 5w_site VALUES('300','1369759069','又一主机租赁商','http://4tunas.com/','0','0','0','29','0','1','1369795555','','87','','');
INSERT INTO 5w_site VALUES('301','1369798278','某网络购票','https://littlebiggy.com/viewSubject/4755745','0','0','0','29','0','1','1369798278','','88','','');
INSERT INTO 5w_site VALUES('302','1369798721','资本局中局','http://www.36kr.com/p/129193.html','0','0','0','35','0','1','1369798721','','8','','');
INSERT INTO 5w_site VALUES('303','1369798721','Facebook股权结构','http://www.36kr.com/p/80336.html','0','0','0','35','0','1','1369798721','','7','','');
INSERT INTO 5w_site VALUES('304','1369798721','比特币简史回顾解析','http://vga.zol.com.cn/370/3708715_all.html','0','0','0','35','0','1','1369798721','','6','','');
INSERT INTO 5w_site VALUES('305','1369798721','什么是VIE','http://tech2ipo.com/56981','0','0','0','35','0','1','1369798721','','5','','');
INSERT INTO 5w_site VALUES('306','1369798721','高手往往输给自己','http://www.btcbbs.com/forum.php?mod=viewthread&tid=244','0','0','0','35','0','1','1369798721','','4','','');
INSERT INTO 5w_site VALUES('307','1369798721','从BTC和Ven看国家货币的消失','http://www.36kr.com/p/25066.html','0','0','0','35','0','1','1369798721','','3','','');
INSERT INTO 5w_site VALUES('308','1369798721','重新发明货币','http://blog.sina.com.cn/s/blog_63045e190101d4ny.html','0','0','0','35','0','1','1369798721','','2','','');
INSERT INTO 5w_site VALUES('309','1369798721','6个有关BTC的教育资源','http://www.36kr.com/p/203299.html','0','0','0','35','0','1','1369798819','','1','','');
INSERT INTO 5w_site VALUES('310','1369798912','论比特币作为货币的角色','https://bitcointalk.org/index.php?topic=215310.0','0','0','0','35','0','1','1369798912','','9','','');
INSERT INTO 5w_site VALUES('311','1369800133','CNBitcoinTalk热帖翻译','http://cnbitcointalk.com/','0','0','0','36','0','1','1369800133','','4','','');
INSERT INTO 5w_site VALUES('312','1369800133','货币之王比特币的微博','http://weibo.com/kingofcurrency','0','0','0','36','0','1','1369800217','','3','','');
INSERT INTO 5w_site VALUES('313','1369800133','BTC导航官方微博','http://weibo.com/btc123','0','0','0','36','0','1','1369800133','','2','','');
INSERT INTO 5w_site VALUES('314','1369800133','头条新闻-比特币观察','http://bitcoinwatch.com/headlines.html','0','0','0','36','0','1','1369800133','','1','','');
INSERT INTO 5w_site VALUES('315','1369803959','(国内)不凡知识杂货店','http://bookfans.taobao.com/','0','0','0','29','0','1','1369803959','','89','','');
INSERT INTO 5w_site VALUES('316','1370014200','某产品头脑加速器','http://www.foc.us/','0','0','0','29','0','1','1370014200','','90','','');
INSERT INTO 5w_site VALUES('317','1370014249','某犹太教堂(捐)','http://tiferesyisroel.org/donate.html','0','0','0','29','0','1','1370014249','','91','','');
INSERT INTO 5w_site VALUES('318','1370014328','某帐篷租售公司','http://www.stretch-concepts.com/bitcoin/','0','0','0','29','0','1','1370014328','','92','','');
INSERT INTO 5w_site VALUES('319','1370014478','某手机软件公司','http://ideasbynature.com/','0','0','0','29','0','1','1370014478','','93','','');
INSERT INTO 5w_site VALUES('320','1370014622','温哥华某餐馆(墙)','http://bestie.ca/','0','0','0','29','0','1','1370014622','','94','','');
INSERT INTO 5w_site VALUES('321','1370015055','瑞士某在线记账软件','http://www.cashctrl.com/en/','0','0','0','29','0','1','1370015055','','95','','');
INSERT INTO 5w_site VALUES('322','1370015102','某说唱乐队','https://www.philadelphiaslick.com/','0','0','0','29','0','1','1370015102','','96','','');
INSERT INTO 5w_site VALUES('323','1370101310','第三个挖矿收益对比表','http://www.wheretomine.com/','0','0','0','6','0','1','1370101310','','45','','');
INSERT INTO 5w_site VALUES('324','1370105364','虚拟币索引帖','https://bitcointalk.org/index.php?topic=134179.0','0','0','0','19','0','1','1370105364','','90','','');
INSERT INTO 5w_site VALUES('325','1370141021','某免费游戏网站(捐)','http://freebiebundle.com/','0','0','0','29','0','1','1370141021','','97','','');
INSERT INTO 5w_site VALUES('326','1370141096','某亡命旅游导游','http://www.youngpioneertours.com/','0','0','0','29','0','1','1370141096','','98','','');
INSERT INTO 5w_site VALUES('327','1370141175','比特币T恤','http://massappealink.com/','0','0','0','29','0','1','1370141175','','99','','');
INSERT INTO 5w_site VALUES('328','1370141199','某图片交易网站','http://bitmagination.com/','0','0','0','29','0','1','1370141199','','100','','');
INSERT INTO 5w_site VALUES('329','1370141260','某匿名网盘','https://fileha.sh/','0','0','0','29','0','1','1370141260','','101','','');
INSERT INTO 5w_site VALUES('330','1370141356','某程序员接受BTC雇佣','http://redream.co.nz/','0','0','0','29','0','1','1370141356','','102','','');
INSERT INTO 5w_site VALUES('331','1370141809','新西兰NomNoms外卖','http://bitcoin.travel/listings/nom-noms/','0','0','0','29','0','1','1370141809','','103','','');
INSERT INTO 5w_site VALUES('332','1370141872','英某公司旗下所有酒吧','http://www.individualpubs.co.uk/','0','0','0','29','0','1','1370142558','','104','','');
INSERT INTO 5w_site VALUES('333','1370142218','某论文代写网','http://rapidessay.com/','0','0','0','29','0','1','1370142218','','105','','');
INSERT INTO 5w_site VALUES('334','1370142335','Massdrop团购网','https://www.massdrop.com/','0','0','0','29','0','1','1370333710','','106','','');
INSERT INTO 5w_site VALUES('335','1370142517','蛋糕设计','http://www.designer-cakes.com/now-accepting-bitcoin','0','0','0','29','0','1','1370142517','','107','','');
INSERT INTO 5w_site VALUES('336','1370142855','某账单支付网站','http://billpayforcoins.com/payyourbills.php','0','0','0','29','0','1','1370142855','','108','','');
INSERT INTO 5w_site VALUES('337','1370142925','德克萨斯某彩蛋枪(墙)','http://txtpaintball.com/','0','0','0','29','0','1','1370142925','','109','','');
INSERT INTO 5w_site VALUES('338','1370143062','BT种子下载站EZTV(捐)','https://eztv.it/','0','0','0','29','0','1','1370143062','','110','','');
INSERT INTO 5w_site VALUES('339','1370143063','再来一个BT下载站(捐)','http://publicbt.com/','0','0','0','29','0','1','1370143063','','112','','');
INSERT INTO 5w_site VALUES('340','1370143064','另一BT下载站(捐)','http://openbittorrent.com/','0','0','0','29','0','1','1370143064','','111','','');
INSERT INTO 5w_site VALUES('341','1370143366','BTC买时装','http://www.bitfash.com/','0','0','0','29','0','1','1370143366','','113','','');
INSERT INTO 5w_site VALUES('342','1370143414','免费软件问题悬赏站','http://www.freedomsponsors.org/','0','0','0','29','0','1','1370143414','','114','','');
INSERT INTO 5w_site VALUES('343','1370143519','BTC寄明信片','http://cards4bits.com/','0','0','0','29','0','1','1370143519','','115','','');
INSERT INTO 5w_site VALUES('344','1370143545','福特汽车某经销商','http://www.spford.com/','0','0','0','29','0','1','1370143545','','116','','');
INSERT INTO 5w_site VALUES('345','1370143599','某深度宅向网络漫画(捐)','http://xkcd.com/','0','0','0','29','0','1','1370143599','','117','','');
INSERT INTO 5w_site VALUES('346','1370143628','某SEO网络营销公司','http://procog.com/','0','0','0','29','0','1','1370143628','','118','','');
INSERT INTO 5w_site VALUES('347','1370143654','外汇大站Oanda.com','http://www.oanda.com/corp/forex-lab-notes/2013/apr/22/why-we-added-bitcoin-oanda-currency-converter-1920/','0','0','0','29','0','1','1370143654','','119','','');
INSERT INTO 5w_site VALUES('348','1370143701','某游戏辅助软件','http://isboxer.com/','0','0','0','29','0','1','1370143701','','120','','');
INSERT INTO 5w_site VALUES('349','1370143949','某通关益智游戏','http://macheist.com/','0','0','0','29','0','1','1370143949','','121','','');
INSERT INTO 5w_site VALUES('350','1370153564','比特币教学课程','https://www.udemy.com/bitcoin-or-how-i-learned-to-stop-worrying-and-love-crypto/','0','0','0','12','0','1','1370153564','','50','','');
INSERT INTO 5w_site VALUES('351','1370153918','BTC天使投资基金','http://www.bitangels.co/','0','0','0','17','0','1','1371142667','','50','','');
INSERT INTO 5w_site VALUES('352','1370172024','域名注册商easydns','http://blog.easydns.org/2013/04/16/we-now-accept-bitcoin-as-a-payment-method/','0','0','0','29','0','1','1370172044','','122','','');
INSERT INTO 5w_site VALUES('353','1370172069','手工木制音箱','http://digifuzz.com/','0','0','0','29','0','1','1370172069','','123','','');
INSERT INTO 5w_site VALUES('354','1370172128','荷里某网吧','http://www.modelprinting.com/headshots/north_hollywood_internet_cafe','0','0','0','29','0','1','1370172128','','124','','');
INSERT INTO 5w_site VALUES('355','1370172752','币信论坛','http://bbs.btcxin.com/forum.php','0','0','0','25','0','1','1370172752','','5','','');
INSERT INTO 5w_site VALUES('356','1370172752','DWBBS','http://www.dwbbs.com/','0','0','0','25','0','1','1370172752','','4','','');
INSERT INTO 5w_site VALUES('357','1370172752','LTCBBS','http://ltcbbs.com/','0','0','0','25','0','1','1370172752','','3','','');
INSERT INTO 5w_site VALUES('358','1370172752','比特人论坛','http://bbs.btcman.com/','0','0','0','25','0','1','1370172752','','2','','');
INSERT INTO 5w_site VALUES('359','1370172752','比特币中文论坛','http://www.btcbbs.com/','0','0','0','25','0','1','1370172752','','1','','');
INSERT INTO 5w_site VALUES('360','1370179956','某乐队Detox Junky','http://detoxjunky.info/','0','0','0','29','0','1','1370179956','','125','','');
INSERT INTO 5w_site VALUES('361','1370180096','南非\"携程网\"(墙)','http://southafrica.to/','0','0','0','29','0','1','1370180096','','126','','');
INSERT INTO 5w_site VALUES('362','1370180135','某极客T恤专卖','http://somethinggeeky.com/news/2013/04/bitcoin-payments-now-accepted','0','0','0','29','0','1','1370180135','','127','','');
INSERT INTO 5w_site VALUES('363','1370180162','某VoIP设备销售商','http://8774e4voip.com/blog/bitcoin-accepted-at-e4/','0','0','0','29','0','1','1370180162','','128','','');
INSERT INTO 5w_site VALUES('364','1370180185','伦敦某搬家公司','http://eastlondonmanwithavan.com/','0','0','0','29','0','1','1370180185','','129','','');
INSERT INTO 5w_site VALUES('365','1370180222','瑞士某咖啡杯','http://www.tazzine.ch/','0','0','0','29','0','1','1370180222','','130','','');
INSERT INTO 5w_site VALUES('366','1370180384','科罗拉多州屋顶修缮商','http://www.totalroofingco.com/','0','0','0','29','0','1','1370186179','','131','','');
INSERT INTO 5w_site VALUES('367','1370180483','开BTC网店傻瓜教学','http://openbitcoinstore.com/','0','0','0','12','0','1','1370180483','','55','','');
INSERT INTO 5w_site VALUES('368','1370183132','匿名邮箱服务提供商(捐)','https://www.guerrillamail.com/','0','0','0','29','0','1','1370183132','','132','','');
INSERT INTO 5w_site VALUES('369','1370183303','古典音乐乐谱网(捐)','http://imslp.org/','0','0','0','29','0','1','1370183303','','133','','');
INSERT INTO 5w_site VALUES('370','1370183611','某刀具销售商','http://www.100yearknives.com/','0','0','0','29','0','1','1370183611','','134','','');
INSERT INTO 5w_site VALUES('371','1370183689','某空间主机销售商','http://www.dailyhostnews.com/web-hosting-provider-certified-hosting-now-accepts-payments-via-bitcoin','0','0','0','29','0','1','1370183689','','135','','');
INSERT INTO 5w_site VALUES('372','1370183715','西班牙某录音棚','http://www.tostadero.es/','0','0','0','29','0','1','1370183715','','136','','');
INSERT INTO 5w_site VALUES('373','1370183800','某音乐销售网','http://www.digital-tunes.net/','0','0','0','29','0','1','1370183800','','137','','');
INSERT INTO 5w_site VALUES('374','1370184075','某沙发销售商','http://www.couchclamp.com/','0','0','0','29','0','1','1370184075','','138','','');
INSERT INTO 5w_site VALUES('375','1370184100','南非某小电商','http://salonsupplystore.co.za/','0','0','0','29','0','1','1370184100','','139','','');
INSERT INTO 5w_site VALUES('376','1370184143','英国某重金属乐队','http://knifeparty.com/haunted-house','0','0','0','29','0','1','1370184143','','140','','');
INSERT INTO 5w_site VALUES('377','1370184290','某在线珠宝销售站','http://www.merrinandgussy.com/','0','0','0','29','0','1','1370184290','','141','','');
INSERT INTO 5w_site VALUES('378','1370184323','休斯顿某物业公司','http://fatproperty.com/','0','0','0','29','0','1','1370184323','','142','','');
INSERT INTO 5w_site VALUES('379','1370184385','纪录片<1050 Toronto>','http://1050toronto.com','0','0','0','29','0','1','1370186130','','143','','');
INSERT INTO 5w_site VALUES('380','1370184415','匈牙利某主机托管商','http://serverastra.com/','0','0','0','29','0','1','1370184415','','144','','');
INSERT INTO 5w_site VALUES('381','1370184890','某手工剃须刀','http://clubparker.ca/','0','0','0','29','0','1','1370184890','','145','','');
INSERT INTO 5w_site VALUES('382','1370184953','全球手工制品市场','http://www.etsy.com/search?q=bitcoin&view_type=gallery&ship_to=ZZ','0','0','0','29','0','1','1370184953','','146','','');
INSERT INTO 5w_site VALUES('383','1370185061','视频下载播放软件Vuze','http://www.vuze.com/','0','0','0','29','0','1','1370185061','','147','','');
INSERT INTO 5w_site VALUES('384','1370185145','德国主机空间租赁商','https://simpleno.de/','0','0','0','29','0','1','1370185145','','148','','');
INSERT INTO 5w_site VALUES('385','1370185163','Gimp开发组','https://mail.gnome.org/archives/gimp-developer-list/2013-April/msg00046.html','0','0','0','29','0','1','1370185163','','149','','');
INSERT INTO 5w_site VALUES('386','1370185201','快餐公司Foodler','https://www.foodler.com/user/Bitcoin.do','0','0','0','29','0','1','1370185201','','150','','');
INSERT INTO 5w_site VALUES('387','1370185603','美国某野餐酒公司','http://picnicwineco.com/','0','0','0','29','0','1','1370185603','','151','','');
INSERT INTO 5w_site VALUES('388','1370186071','BTC实时信息','http://realtimebitcoin.info/','0','0','0','9','0','1','1370186078','','35','','');
INSERT INTO 5w_site VALUES('389','1370186239','炫酷二维码(国内)(捐)','http://www.qrcoolx.com/','0','0','0','29','0','1','1370186601','','152','','');
INSERT INTO 5w_site VALUES('390','1370186698','自己种蘑菇','http://www.magicmushroomskit.com/','0','0','0','29','0','1','1370186698','','153','','');
INSERT INTO 5w_site VALUES('391','1370186853','某PS达人接受BTC(墙)','http://www.lulielens.com/','0','0','0','29','0','1','1370187202','','154','','');
INSERT INTO 5w_site VALUES('392','1370187041','3D地球BTC交易','http://diox.github.io/bitcoin-websockets-globe/','0','0','0','9','0','1','1370187054','','40','','');
INSERT INTO 5w_site VALUES('393','1370187174','某相册DIY网站','http://www.poyomi.com/bitcoin','0','0','0','29','0','1','1370187185','','155','','');
INSERT INTO 5w_site VALUES('394','1370261277','左脚点卡充值店(国内)','http://jiayan12.taobao.com','0','0','0','29','0','1','1370333810','','158','','');
INSERT INTO 5w_site VALUES('395','1370365194','某免费VPN(捐)(墙)','http://www.vpnbook.com/','0','0','0','29','0','1','1370365547','','159','','');
INSERT INTO 5w_site VALUES('396','1370365511','主机租赁商GigaHost','https://gigahost.dk/en/','0','0','0','29','0','1','1370365511','','160','','');
INSERT INTO 5w_site VALUES('397','1370365676','MineCraft某付款插件','http://buycraft.net/','0','0','0','29','0','1','1370365676','','161','','');
INSERT INTO 5w_site VALUES('398','1370365763','某乌托邦项目','http://www.kickstarter.com/projects/766331751/project-babylon-20','0','0','0','29','0','1','1370365818','','162','','');
INSERT INTO 5w_site VALUES('399','1370405203','巴比特','http://www.8btc.com/','0','0','0','1','0','1','1375173219','','35','','');
INSERT INTO 5w_site VALUES('400','1370418115','比特币Logo的T恤(国内)','http://item.taobao.com/item.htm?id=25365048018','0','0','0','29','0','1','1370418123','','163','','');
INSERT INTO 5w_site VALUES('401','1370419299','Bitcoin Magazine','http://bitcoinmagazine.net/','0','0','0','37','0','0','1370419299','','1','','');
INSERT INTO 5w_site VALUES('402','1370419301','BTC实时新闻','http://wtbtc.com/','0','0','0','37','0','1','1370419301','','2','','');
INSERT INTO 5w_site VALUES('403','1370419321','Bitcoin Media','http://bitcoinmedia.com/','0','0','0','37','0','0','1370419321','','3','','');
INSERT INTO 5w_site VALUES('404','1370419343','Bitcoin Weekly','http://bitcoinweekly.com/','0','0','0','37','0','0','1370419343','','4','','');
INSERT INTO 5w_site VALUES('405','1370419361','Coineer','http://www.coineer.com/','0','0','0','37','0','1','1370419361','','5','','');
INSERT INTO 5w_site VALUES('406','1370419387','BitInstant 的博客','http://blog.bitinstant.com/','0','0','0','37','0','1','1370419387','','6','','');
INSERT INTO 5w_site VALUES('407','1370420089','bitZino扑克','https://bitzino.com/','0','0','0','38','0','1','1370420089','','7','','');
INSERT INTO 5w_site VALUES('408','1370420089','BTC击鼓传花','http://www.bitcoingem.com/','0','0','0','38','0','1','1376474215','','6','','');
INSERT INTO 5w_site VALUES('409','1370420089','比特币彩票','http://bitlotto.com/','0','0','0','38','0','1','1370420089','','5','','');
INSERT INTO 5w_site VALUES('410','1370420089','BitJack21','https://bitjack21.com/','0','0','0','38','0','1','1370420089','','4','','');
INSERT INTO 5w_site VALUES('411','1370420089','BitcoinGamer','https://www.bitcoingamer.com/','0','0','0','38','0','1','1370420089','','3','','');
INSERT INTO 5w_site VALUES('412','1370420089','踩雷游戏','http://minefield.bitcoinlab.org/','0','0','0','38','0','1','1370420089','','2','','');
INSERT INTO 5w_site VALUES('413','1370420089','中本聪骰子','http://satoshidice.com/','0','0','0','38','0','1','1376474235','','1','','');
INSERT INTO 5w_site VALUES('414','1370500520','p2pool - talk使用说明帖','https://bitcointalk.org/index.php?topic=153232.0','0','0','0','22','0','1','1370500578','','1','','');
INSERT INTO 5w_site VALUES('415','1370500577','p2pool 官网','http://p2pool.info/','0','0','0','22','0','1','1370500577','','20','','');
INSERT INTO 5w_site VALUES('416','1370500610','p2pool - talk使用说明帖','https://bitcointalk.org/index.php?topic=153232.0','0','0','0','10','0','1','1370500639','','100','','');
INSERT INTO 5w_site VALUES('417','1370500637','p2pool - wiki','https://en.bitcoin.it/wiki/P2Pool','0','0','0','10','0','1','1370500637','','110','','');
INSERT INTO 5w_site VALUES('418','1370500638','p2pool - talk创世帖','https://bitcointalk.org/index.php?topic=18313.0','0','0','0','10','0','1','1370500638','','105','','');
INSERT INTO 5w_site VALUES('419','1370508137','脑钱包','http://brainwallet.org/','0','0','0','8','0','1','1370508137','','35','','');
INSERT INTO 5w_site VALUES('420','1370521674','CoinDesk','http://www.coindesk.com/','0','0','0','37','0','1','1370521674','','7','','');
INSERT INTO 5w_site VALUES('421','1370535011','BitInstant 的博客(英文)','http://blog.bitinstant.com/','0','0','0','39','0','1','1370535011','','12','','');
INSERT INTO 5w_site VALUES('422','1370535011','比特币周报(英文)','http://bitcoinweekly.com/','0','0','0','39','0','1','1370535011','','11','','');
INSERT INTO 5w_site VALUES('423','1370535011','BTC资讯网','http://www.bitcoin86.com/index.html','0','0','0','39','0','0','1370535011','','10','','');
INSERT INTO 5w_site VALUES('424','1370535011','Coineer','http://www.coineer.com/','0','0','0','39','0','1','1370535011','','9','','');
INSERT INTO 5w_site VALUES('425','1370535011','比特币杂志(英文)','http://bitcoinmagazine.net/','0','0','0','39','0','0','1370535011','','8','','');
INSERT INTO 5w_site VALUES('426','1370535011','比特币传媒(英文)','http://bitcoinmedia.com/','0','0','0','39','0','0','1370535011','','7','','');
INSERT INTO 5w_site VALUES('427','1370535011','BTC实时新闻(英文)','http://wtbtc.com/','0','0','0','39','0','1','1370535011','','6','','');
INSERT INTO 5w_site VALUES('428','1370535011','比特币中文资讯','http://www.bitecoin.com/','0','0','0','39','0','1','1375806349','','5','','');
INSERT INTO 5w_site VALUES('429','1370535011','CoinDesk(英文)','http://www.coindesk.com/','0','0','0','39','0','1','1370535011','','4','','');
INSERT INTO 5w_site VALUES('430','1370535011','bitcoin86资讯','http://www.bitcoin86.com/index.html','0','0','0','39','0','1','1375806348','','3','','');
INSERT INTO 5w_site VALUES('431','1370535011','比特币中国wiki','http://btcchina.net/','0','0','0','39','0','1','1380530565','','2','','');
INSERT INTO 5w_site VALUES('432','1370535011','比特币洋洋访谈','http://weibo.com/u/3244140934','0','0','0','39','0','1','1375757062','','1','','');
INSERT INTO 5w_site VALUES('433','1370536743','Goomboo价格技术分析','https://bitcointalk.org/index.php?topic=60501.0','0','0','0','15','0','1','1370536743','','15','','');
INSERT INTO 5w_site VALUES('434','1370536743','BitcoinAnalyst','http://chart.ly/users/BitcoinAnalyst','0','0','0','15','0','1','1370536743','','10','','');
INSERT INTO 5w_site VALUES('435','1370536743','S3052价格分析','http://www.bitcoinbullbear.com/','0','0','0','15','0','1','1377173337','','5','','');
INSERT INTO 5w_site VALUES('436','1370536743','Bitcoin交易信号(墙)','http://btctrading.wordpress.com/','0','0','0','15','0','1','1370536743','','1','','');
INSERT INTO 5w_site VALUES('437','1370536752','比特币中国','https://www.btcchina.com/','0','0','0','26','0','1','1371571311','','1','','');
INSERT INTO 5w_site VALUES('438','1370536752','FxBTC','https://www.fxbtc.com','0','0','0','26','0','1','1371571311','','2','','');
INSERT INTO 5w_site VALUES('439','1370536752','Bter','https://www.bter.com','0','0','0','26','0','1','1371571311','','3','','');
INSERT INTO 5w_site VALUES('440','1370536752','42BTC','http://42btc.com/','0','0','0','26','0','1','1371571311','','4','','');
INSERT INTO 5w_site VALUES('441','1370536752','比特海','https://www.btcsea.com','0','0','0','26','0','0','1371571311','','5','','');
INSERT INTO 5w_site VALUES('442','1370536752','人盟比特币','https://www.rmbtb.com/','0','0','0','26','0','1','1371571311','','11','','');
INSERT INTO 5w_site VALUES('443','1370536752','btctrade','http://www.btctrade.com','0','0','0','26','0','1','1371571311','','12','','');
INSERT INTO 5w_site VALUES('444','1370537454','比特币美元实时价格','http://ss.btc123.com','0','0','0','16','0','1','1370537454','','60','','');
INSERT INTO 5w_site VALUES('445','1370537512','价格行情汇总页(推荐)','http://z.btc123.com','0','0','0','16','0','1','1370537512','','65','','');
INSERT INTO 5w_site VALUES('446','1370701650','比特币全网数据统计','http://www.blockchain.info/stats','0','0','0','7','0','1','1370701650','','5','','');
INSERT INTO 5w_site VALUES('447','1370863481','796交易所','https://www.796.com/','0','0','0','26','0','0','1371571311','','13','','');
INSERT INTO 5w_site VALUES('448','1371037488','ASICME','http://www.asicme.com/','0','0','0','23','0','1','1371037488','','20','','');
INSERT INTO 5w_site VALUES('449','1371133355','理解记单词(国内)','http://www.english-word.cn/','0','0','0','29','0','1','1371133355','','164','','');
INSERT INTO 5w_site VALUES('450','1371435545','IG 比特币二进制交易','http://www.igindex.co.uk/spread-betting/bitcoin-binary-bets.html','0','0','0','17','0','1','1371435545','','55','','');
INSERT INTO 5w_site VALUES('451','1371567212','比特币充手机话费(国内)','http://www.btctele.com/','0','0','0','8','0','1','1371567212','','40','','');
INSERT INTO 5w_site VALUES('452','1371567247','比特币充手机话费(国内)','http://www.btctele.com/','0','0','0','29','0','1','1371567247','','165','','');
INSERT INTO 5w_site VALUES('453','1371571311','HIBTC','http://www.hibtc.com/','0','0','0','26','0','1','1371571311','','14','','');
INSERT INTO 5w_site VALUES('454','1371612194','GoXBTC(国内)','https://www.goxbtc.com/','0','0','0','26','0','1','1371612194','','15','','');
INSERT INTO 5w_site VALUES('455','1371724124','bitcoin协议','https://en.bitcoin.it/wiki/Protocol_rules','0','0','0','11','0','1','1371724124','','27','','');
INSERT INTO 5w_site VALUES('456','1371724219','创世论文(中文翻译)','http://www.btc123.com/data/docs/bitcoin_cn.pdf','0','0','0','11','0','1','1371724219','','32','','');
INSERT INTO 5w_site VALUES('457','1371724219','比特币创世论文','http://bitcoin.org/bitcoin.pdf','0','0','0','11','0','1','1371724219','','31','','');
INSERT INTO 5w_site VALUES('458','1371724219','Bitcoin基本原理- 云风','http://blog.codingnow.com/2011/05/bitcoin.html','0','0','0','11','0','1','1371725108','','30','','');
INSERT INTO 5w_site VALUES('459','1371724219','BTC匿名性研究- 张志强','http://zhiqiang.org/blog/it/bitcoin-is-not-perfectly-anonymous.html','0','0','0','11','0','1','1371725108','','29','','');
INSERT INTO 5w_site VALUES('460','1371724219','bitcoin技术原理- 张志强','http://zhiqiang.org/blog/it/technical-document-of-bitcoin.html','0','0','0','11','0','1','1371725059','','28','','');
INSERT INTO 5w_site VALUES('461','1371724307','比特币官方wiki:技术','https://en.bitcoin.it/wiki/Category:Technical','0','0','0','11','0','1','1371724307','','34','','');
INSERT INTO 5w_site VALUES('462','1371724308','BTC学习资料','http://bbs.btcman.com/forum.php?mod=viewthread&tid=160','0','0','0','11','0','1','1371724308','','33','','');
INSERT INTO 5w_site VALUES('463','1371724589','BTC技术内幕(1)李雪愚','http://www.showmuch.com/a/20110530/233347.html','0','0','0','11','0','1','1371725061','','35','','');
INSERT INTO 5w_site VALUES('464','1371724750','BTC技术内幕(完)李雪愚','http://www.showmuch.com/a/20110731/085343.html','0','0','0','11','0','1','1371725061','','40','','');
INSERT INTO 5w_site VALUES('465','1371724750','BTC技术内幕(5)李雪愚','http://www.showmuch.com/a/20110618/123447.html','0','0','0','11','0','1','1371725061','','39','','');
INSERT INTO 5w_site VALUES('466','1371724750','BTC技术内幕(4)李雪愚','http://www.showmuch.com/a/20110608/094205.html','0','0','0','11','0','1','1371725061','','38','','');
INSERT INTO 5w_site VALUES('467','1371724750','BTC技术内幕(3)李雪愚','http://www.showmuch.com/a/20110602/111007.html','0','0','0','11','0','1','1371725061','','37','','');
INSERT INTO 5w_site VALUES('468','1371724750','BTC技术内幕(2)李雪愚','http://www.showmuch.com/a/20110601/000911.html','0','0','0','11','0','1','1371725061','','36','','');
INSERT INTO 5w_site VALUES('469','1371727013','通俗易懂讲解BTC(墙)','http://ivarptr.blogspot.com/2011/05/bitcoin.html','0','0','0','11','0','1','1371727018','','45','','');
INSERT INTO 5w_site VALUES('470','1371727041','深入分析BTC技术(墙)','http://ivarptr.blogspot.com/2011/05/bitcoin_31.html','0','0','0','11','0','1','1371727041','','43','','');
INSERT INTO 5w_site VALUES('471','1372851062','BTC的人人贷','https://btcjam.com/','0','0','0','17','0','1','1372851062','','60','','');
INSERT INTO 5w_site VALUES('472','1372897926','比特币涨跌期权','http://btcoracle.com/','0','0','0','17','0','1','1372897926','','65','','');
INSERT INTO 5w_site VALUES('473','1373165499','全网算力走势曲线','http://blockchain.info/charts/hash-rate','0','0','0','6','0','1','1373165499','','50','','');
INSERT INTO 5w_site VALUES('474','1373165502','BTC难度曲线图','http://bitcoindifficulty.com/','0','0','0','6','0','1','1373165502','','55','','');
INSERT INTO 5w_site VALUES('475','1373165658','烤猫股票IPO帖(老)','https://bitcointalk.org/index.php?topic=99497.0','0','0','0','23','0','1','1373165658','','25','','');
INSERT INTO 5w_site VALUES('476','1374205894','Bitcoin Money','http://www.bitcoinmoney.com/','0','0','0','37','0','1','1374205894','','8','','');
INSERT INTO 5w_site VALUES('477','1374327410','比特国际中文论坛','http://www.btcicc.com','0','0','0','25','0','1','1374327410','','6','','');
INSERT INTO 5w_site VALUES('478','1374327430','比特币领先社区','http://bitcoinlead.org/','0','0','0','25','0','1','1374327430','','7','','');
INSERT INTO 5w_site VALUES('479','1374327459','BTC教育论坛','http://www.btc-edu.com/','0','0','0','25','0','1','1374327459','','8','','');
INSERT INTO 5w_site VALUES('480','1374327476','BTC信息论坛','http://www.btcxx.com/','0','0','0','25','0','1','1374327476','','1','','');
INSERT INTO 5w_site VALUES('481','1374379037','外贸婚纱礼服首饰','http://www.seasonmall.com/','0','0','0','29','0','1','1374379074','','166','','');
INSERT INTO 5w_site VALUES('482','1374808758','素数币官网','http://ppcoin.org/','0','0','0','19','0','1','1374808758','','90','','');
INSERT INTO 5w_site VALUES('483','1374808760','素数币官方帖','https://bitcointalk.org/index.php?topic=251850.0','0','0','0','19','0','1','1374808760','','95','','');
INSERT INTO 5w_site VALUES('484','1374808780','素数币介绍帖','https://bitcointalk.org/index.php?topic=245953.0','0','0','0','19','0','1','1374808780','','100','','');
INSERT INTO 5w_site VALUES('485','1374808796','素数币比特币兑换','https://www.coins-e.com/exchange/XPM_BTC/','0','0','0','19','0','1','1374808796','','105','','');
INSERT INTO 5w_site VALUES('486','1375173219','TTbit','http://www.ttbit.com/','0','0','0','1','0','0','1375173219','','40','','');
INSERT INTO 5w_site VALUES('487','1375498010','烤猫(大猫)','https://btct.co/security/ASICMINER-PT','0','0','0','42','0','1','1375498010','','1','','');
INSERT INTO 5w_site VALUES('488','1375498012','烤猫(小猫)','https://btct.co/security/TAT.ASICMINER','0','0','0','42','0','1','1375498012','','5','','');
INSERT INTO 5w_site VALUES('489','1375498033','labcoin','https://btct.co/security/LABCOIN','0','0','0','42','0','1','1375498033','','10','','');
INSERT INTO 5w_site VALUES('490','1375498045','花园矿机','https://btct.co/security/BTCGARDEN','0','0','0','42','0','1','1375498045','','15','','');
INSERT INTO 5w_site VALUES('491','1375498047','AMC(ACTIVEMINING)','https://btct.co/security/ACTIVEMINING','0','0','0','42','0','1','1375498047','','20','','');
INSERT INTO 5w_site VALUES('492','1375498474','btct.co证券列表','https://btct.co/security','0','0','0','42','0','1','1375498474','','25','','');
INSERT INTO 5w_site VALUES('493','1375539455','796比特币期货交易','https://796.com/','0','0','0','17','0','1','1375539455','','70','','');
INSERT INTO 5w_site VALUES('494','1375669691','BTC股票投资参考','http://cnbitcointalk.com/','0','0','0','17','0','1','1375669691','','75','','');
INSERT INTO 5w_site VALUES('495','1375757082','比特币洋洋访谈','http://weibo.com/u/3244140934','0','0','0','1','0','1','1375757082','','45','','');
INSERT INTO 5w_site VALUES('496','1375757124','TTbit淘比特','http://www.ttbit.com/','0','0','0','23','0','1','1375757124','','30','','');
INSERT INTO 5w_site VALUES('497','1375807690','比巴克','http://p2pbucks.com/','0','0','0','1','0','1','1375807690','','50','','');
INSERT INTO 5w_site VALUES('498','1375977157','时价交易行','https://cny2btc.com/','0','0','0','26','0','1','1375977157','','20','','');
INSERT INTO 5w_site VALUES('499','1375977332','OKCoin','http://okcoin.com','0','0','0','26','0','1','1375977332','','1','','');
INSERT INTO 5w_site VALUES('500','1376037699','烤猫挖矿速度图','http://www.asicminercharts.com/live/','0','0','0','6','0','1','1376037699','','60','','');
INSERT INTO 5w_site VALUES('501','1376037775','全网算力分布图','http://blockchain.info/pools','0','0','0','6','0','1','1377746878','','65','','');
INSERT INTO 5w_site VALUES('502','1376230559','bitcoin.de德国汇兑平台','https://www.bitcoin.de','0','0','0','28','0','1','1376230559','','60','','');
INSERT INTO 5w_site VALUES('503','1376230700','coins-e多种虚拟币交易','https://www.coins-e.com/','0','0','0','28','0','1','1376230700','','65','','');
INSERT INTO 5w_site VALUES('504','1376230732','bitcurex','https://bitcurex.com/','0','0','0','28','0','1','1376230732','','70','','');
INSERT INTO 5w_site VALUES('505','1376312577','crypto-trade','https://crypto-trade.com/','0','0','0','28','0','1','1376312742','','75','','');
INSERT INTO 5w_site VALUES('506','1376312686','VirWoX','http://www.virwox.com/','0','0','0','28','0','0','1376312686','','80','','');
INSERT INTO 5w_site VALUES('507','1376312857','campbx','https://www.campbx.com/','0','0','0','28','0','1','1376312857','','80','','');
INSERT INTO 5w_site VALUES('508','1376313246','比特币价格加权平均','http://bitcoinaverage.com/','0','0','0','16','0','1','1376313246','','70','','');
INSERT INTO 5w_site VALUES('509','1376474250','Just-Dice(火)','https://just-dice.com/','0','0','0','38','0','1','1376474250','','8','','');
INSERT INTO 5w_site VALUES('510','1376474366','BTC玩-彩蛋投注','http://www.btcwan.com/','0','0','0','38','0','1','1379334726','','9','','');
INSERT INTO 5w_site VALUES('511','1376476555','BTC踩雷kamikaze','http://bitcoinkamikaze.com/','0','0','0','38','0','1','1376476555','','10','','');
INSERT INTO 5w_site VALUES('512','1376476557','LTC踩雷kamikaze','http://litecoinkamikaze.com/','0','0','0','38','0','1','1376476557','','11','','');
INSERT INTO 5w_site VALUES('513','1376584617','btc-dice(台湾)','http://www.btc-dice.com','0','0','0','38','0','1','1376624103','','12','','');
INSERT INTO 5w_site VALUES('514','1376629724','雪球-比特币专区','http://xueqiu.com/S/MTGOXUSD','0','0','0','17','0','1','1376629724','','80','','');
INSERT INTO 5w_site VALUES('515','1376969046','TheGenesisBlock','http://minig.thegenesisblock.com/','0','0','0','37','0','1','1376969046','','9','','');
INSERT INTO 5w_site VALUES('516','1376969625','GenesisBlock价格板','http://markets.thegenesisblock.com/','0','0','0','16','0','1','1376969698','','75','','');
INSERT INTO 5w_site VALUES('517','1377056530','bitAds','https://bitads.net/','0','0','0','8','0','1','1377056530','','45','','');
INSERT INTO 5w_site VALUES('518','1377098065','显卡挖矿速度表','https://en.bitcoin.it/wiki/Mining_hardware_comparison','0','0','0','6','0','1','1377098065','','70','','');
INSERT INTO 5w_site VALUES('519','1377098121','算力分布图(较准确)','http://blockorigin.pfoe.be/chart.php','0','0','0','6','0','1','1377746925','','75','','');
INSERT INTO 5w_site VALUES('520','1377098524','Give Me Coins','http://give-me-coins.com/','0','0','0','10','0','1','1377098524','','115','','');
INSERT INTO 5w_site VALUES('521','1377098571','(LTC)莱特中国','http://cnltcpool.com/','0','0','0','10','0','0','1377098571','','120','','');
INSERT INTO 5w_site VALUES('522','1377098754','LTC挖矿收益计算','http://www.mincoinpool.com/calc?cointype=LTC&hashrate=','0','0','0','6','0','1','1377098754','','80','','');
INSERT INTO 5w_site VALUES('523','1377098799','FTC挖矿收益计算','http://www.mincoinpool.com/calc?cointype=FTC&hashrate=','0','0','0','6','0','1','1377098799','','85','','');
INSERT INTO 5w_site VALUES('524','1377099040','BQC挖矿收益计算','http://www.mincoinpool.com/calc?cointype=BQC&hashrate=','0','0','0','6','0','1','1377099040','','90','','');
INSERT INTO 5w_site VALUES('525','1377099183','另一LTC挖矿收益计算','http://ltc.kattare.com/calc.php','0','0','0','6','0','1','1377099183','','95','','');
INSERT INTO 5w_site VALUES('526','1377099231','挖矿排名表','http://blockorigin.pfoe.be/top.php','0','0','0','6','0','1','1377099231','','100','','');
INSERT INTO 5w_site VALUES('527','1377099653','blockchain信息统计','http://www.blockchain.info/stats','0','0','0','9','0','1','1377099653','','45','','');
INSERT INTO 5w_site VALUES('528','1377099717','全球节点','http://www.blockchain.info/nodes-globe','0','0','0','9','0','1','1377099717','','50','','');
INSERT INTO 5w_site VALUES('529','1377099736','客户端版本分布','http://bitcoinstats.org/versions.html','0','0','0','9','0','0','1377099736','','55','','');
INSERT INTO 5w_site VALUES('530','1377099773','活跃地址','http://www.blockchain.info/popular-addresses','0','0','0','9','0','1','1377099773','','65','','');
INSERT INTO 5w_site VALUES('531','1377099774','日交易单数','http://www.blockchain.info/charts/n-transactions','0','0','0','9','0','1','1377099774','','60','','');
INSERT INTO 5w_site VALUES('532','1377099824','最新blocks挖掘情况','http://blockorigin.pfoe.be/blocklist.php','0','0','0','9','0','1','1377099824','','70','','');
INSERT INTO 5w_site VALUES('533','1377099940','非活跃地址交易单数','http://www.blockchain.info/charts/n-transactions-excluding-popular','0','0','0','9','0','1','1377099940','','75','','');
INSERT INTO 5w_site VALUES('534','1377137064','烤猫 dividends addr','https://blockchain.info/zh-cn/address/115tTroRo3B9ZDQ6ATJGDCHcNEVbjJoZnF','0','0','0','23','0','1','1377137080','','35','','');
INSERT INTO 5w_site VALUES('535','1377173170','JoyBTC行情预测','http://www.joybtc.com/','0','0','0','15','0','1','1377173170','','20','','');
INSERT INTO 5w_site VALUES('536','1377176815','EasyWallet','https://easywallet.org/','0','0','0','8','0','1','1377176815','','55','','');
INSERT INTO 5w_site VALUES('537','1377176817','Coinbase','https://coinbase.com/','0','0','0','8','0','1','1377176817','','50','','');
INSERT INTO 5w_site VALUES('538','1377440771','骰子网列表','http://www.bitcoindice.com/','0','0','0','38','0','1','1377440771','','13','','');
INSERT INTO 5w_site VALUES('539','1377484972','比特派投资博客','http://www.btcpie.com/','0','0','0','17','0','1','1377484972','','85','','');
INSERT INTO 5w_site VALUES('540','1377745035','175btc(国内矿池)','http://www.175btc.com/','0','0','0','10','0','1','1377745035','','125','','');
INSERT INTO 5w_site VALUES('541','1377757951','比特币资讯在线','http://www.chnbitcoin.com/','0','0','0','39','0','1','1377757951','','14','','');
INSERT INTO 5w_site VALUES('542','1377757951','比巴克','http://p2pbucks.com/','0','0','0','39','0','1','1377757951','','13','','');
INSERT INTO 5w_site VALUES('543','1377758008','bitcoin86资讯','http://www.bitcoin86.com/','0','0','0','1','0','1','1377758008','','55','','');
INSERT INTO 5w_site VALUES('544','1377881697','币读-资讯','http://www.btcdu.com/','0','0','0','39','0','1','1377881697','','15','','');
INSERT INTO 5w_site VALUES('545','1377881729','莱特币中文网','http://www.laitebi.com/','0','0','0','39','0','1','1377881729','','16','','');
INSERT INTO 5w_site VALUES('546','1377883004','币读-资讯','http://www.btcdu.com','0','0','0','1','0','1','1377883004','','60','','');
INSERT INTO 5w_site VALUES('547','1377911098','比特信网页版','https://bitmsg.me/','0','0','0','8','0','1','1377911098','','60','','');
INSERT INTO 5w_site VALUES('548','1377911274','比特信官网','https://bitmessage.org','0','0','0','8','0','1','1377911282','','65','','');
INSERT INTO 5w_site VALUES('549','1377926421','汉典(捐赠)','http://www.zdic.net/aboutus/','0','0','0','29','0','1','1377926421','','167','','');
INSERT INTO 5w_site VALUES('550','1378447843','挖矿机资讯','http://www.wakuangji.cn/','0','0','0','39','0','1','1378448649','','17','','');
INSERT INTO 5w_site VALUES('551','1378447857','挖矿机资讯','http://www.wakuangji.cn/','0','0','0','1','0','1','1378448662','','65','','');
INSERT INTO 5w_site VALUES('552','1378458072','巴比特论坛','http://8btc.com','0','0','0','25','0','1','1378458072','','9','','');
INSERT INTO 5w_site VALUES('553','1378525471','ZillaTalk社区','http://zillat.com/','0','0','0','17','0','1','1378525471','','90','','');
INSERT INTO 5w_site VALUES('554','1378639270','财神堂娱乐网','http://www.caishentang.com','0','0','0','38','0','1','1381627781','','14','','');
INSERT INTO 5w_site VALUES('555','1378710345','中国比特币CHBTC','http://www.chbtc.com','0','0','0','26','0','1','1378710345','','16','','');
INSERT INTO 5w_site VALUES('556','1378804363','BTCredblue','http://www.btcredblue.com','0','0','0','38','0','1','1378804363','','15','','');
INSERT INTO 5w_site VALUES('557','1378804410','比特币之家','http://www.5ywyx.com','0','0','0','1','0','1','1378804410','','67','','');
INSERT INTO 5w_site VALUES('558','1379205119','最新骰子LetsDice','https://letsdice.com/','0','0','0','38','0','1','1381593325','','16','','');
INSERT INTO 5w_site VALUES('559','1379224292','比特币地址财富榜','http://btc.ondn.net','0','0','0','7','0','1','1381916938','','10','','');
INSERT INTO 5w_site VALUES('560','1379321792','新手入门','http://btc.p2pbucks.com/index.html','0','0','0','12','0','1','1379334478','','60','','');
INSERT INTO 5w_site VALUES('561','1379650109','火币网','http://www.huobi.com','0','0','0','26','0','1','1379650109','','22','','');
INSERT INTO 5w_site VALUES('562','1379669514','比特币Armory钱包','http://bitcoinarmory.com/','0','0','0','8','0','1','1379669514','','70','','');
INSERT INTO 5w_site VALUES('563','1379755685','众赢BTC期货','https://www.zydeal.com/','0','0','0','17','0','1','1379755685','','95','','');
INSERT INTO 5w_site VALUES('564','1379819556','btcifc','http://btcifc.com','0','0','0','26','0','1','1379819556','','24','','');
INSERT INTO 5w_site VALUES('565','1380073222','btc.re挖矿收益计算','http://btc.re/?t=miningcalc','0','0','0','6','0','1','1380073267','','105','','');
INSERT INTO 5w_site VALUES('566','1380204080','CasinoBitco.in','http://casinobitco.in/','0','0','0','38','0','1','1380204080','','17','','');
INSERT INTO 5w_site VALUES('567','1380375139','LetsTalkBitcoin','http://letstalkbitcoin.com/','0','0','0','37','0','1','1380375139','','10','','');
INSERT INTO 5w_site VALUES('568','1380378346','比特币百科','http://8btc.com/wiki/','0','0','0','12','0','1','1380378346','','65','','');
INSERT INTO 5w_site VALUES('569','1380503666','F2Pool鱼池','http://f2pool.com/','0','0','0','10','0','1','1380503666','','120','','');
INSERT INTO 5w_site VALUES('570','1381433638','BTC100','https://btc100.org','0','0','0','26','0','1','1381433638','','25','','');

INSERT INTO 5w_site_cool VALUES('1','1341564794','算力分布图(较准确)','http://blockorigin.pfoe.be/chart.php','1','1377747109','1','8','');
INSERT INTO 5w_site_cool VALUES('2','1341591146','btcGarden项目','https://bitcointalk.org/index.php?topic=213172.0','1','1371037528','15','11','');
INSERT INTO 5w_site_cool VALUES('3','1341591173','蝴蝶矿机(墙)','http://www.butterflylabs.com/','1','1371037528','5','11','');
INSERT INTO 5w_site_cool VALUES('4','1341622465','blockchain钱包','http://blockchain.info/wallet','1','1370508091','5','5','');
INSERT INTO 5w_site_cool VALUES('158','1367428743','796交易所','https://796.com/','1','1376629680','5','18','#A81F00');
INSERT INTO 5w_site_cool VALUES('6','1341634646','ASIC ME','http://www.asicme.com/','1','1371037528','10','11','');
INSERT INTO 5w_site_cool VALUES('7','1341739918','比特币是什么','http://btc.p2pbucks.com/','1','1379334311','2','14','');
INSERT INTO 5w_site_cool VALUES('221','1377331948','比特币简介','https://zh-cn.bitcoin.it/wiki/%E7%AE%80%E4%BB%8B','1','1377331948','1','14','');
INSERT INTO 5w_site_cool VALUES('9','1341740004','从入门到精通','http://cnbtcnews.com/bitcoin-study/what-is-bitcoin/bitcoin-form-accidence-to-mastery.html','1','1379321836','5','14','');
INSERT INTO 5w_site_cool VALUES('10','1341740300','比特币百科','http://8btc.com/wiki/','1','1380378377','15','14','');
INSERT INTO 5w_site_cool VALUES('12','1341743099','S3052价格分析','http://www.bitcoinbullbear.com/','1','1377173264','5','7','');
INSERT INTO 5w_site_cool VALUES('13','1341743133','BitcoinAnalyst','http://chart.ly/users/BitcoinAnalyst','1','1341743133','10','7','');
INSERT INTO 5w_site_cool VALUES('232','1380173491','TheGenesisBlock','http://minig.thegenesisblock.com/','1','1380173491','5','13','');
INSERT INTO 5w_site_cool VALUES('17','1341743663','全球节点','http://www.blockchain.info/nodes-globe','1','1341934781','3','9','');
INSERT INTO 5w_site_cool VALUES('197','1370420727','Just-Dice','http://www.just-dice.com/','1','1379205151','15','1','');
INSERT INTO 5w_site_cool VALUES('19','1341895012','中本聪骰子','http://satoshidice.com/','1','1380722214','10','1','');
INSERT INTO 5w_site_cool VALUES('230','1379034779','bitZino扑克','https://bitzino.com/','1','1381537243','20','1','');
INSERT INTO 5w_site_cool VALUES('21','1341895092','slush','http://mining.bitcoin.cz/','1','1341895092','10','2','');
INSERT INTO 5w_site_cool VALUES('22','1341895092','btcguild','http://www.btcguild.com/','1','1377744216','2','2','');
INSERT INTO 5w_site_cool VALUES('23','1341895092','deepbit','https://deepbit.net/','1','1377744223','13','2','');
INSERT INTO 5w_site_cool VALUES('24','1341895203','MaxBTC','https://www.maxbtc.com/','1','1341895203','20','2','');
INSERT INTO 5w_site_cool VALUES('25','1341895203','TripleMining','https://www.triplemining.com/','1','1341895203','25','2','');
INSERT INTO 5w_site_cool VALUES('26','1341895203','abcpool','http://www.abcpool.co/','1','1341895203','30','2','');
INSERT INTO 5w_site_cool VALUES('27','1341895203','Ozcoin','http://ozco.in/','1','1377744216','18','2','');
INSERT INTO 5w_site_cool VALUES('28','1341895256','p2pool','http://p2pool.info/','1','1341895256','35','2','');
INSERT INTO 5w_site_cool VALUES('29','1341895278','Mt.Red','https://mtred.com/','1','1341895278','40','2','');
INSERT INTO 5w_site_cool VALUES('30','1341895315','BitparkingPool','http://mmpool.bitparking.com/pool','1','1341895315','45','2','');
INSERT INTO 5w_site_cool VALUES('31','1341895345','Eligius','http://eligius.st/','1','1341895345','50','2','');
INSERT INTO 5w_site_cool VALUES('150','1366187409','Ferro成交热力图','https://ferroh.com/charts','1','1366187567','3','15','');
INSERT INTO 5w_site_cool VALUES('226','1378639322','财神堂娱乐网(中文)','http://www.caishentang.com','1','1381658336','8','1','');
INSERT INTO 5w_site_cool VALUES('128','1357890017','FxBTC','http://www.fxbtc.com','1','1380108689','12','4','');
INSERT INTO 5w_site_cool VALUES('35','1341898284','海峡BTC','http://www.hxtop.com/','1','1377882705','12','3','');
INSERT INTO 5w_site_cool VALUES('114','1343199432','比特信网页版','https://bitmsg.me/','1','1377911167','15','5','');
INSERT INTO 5w_site_cool VALUES('37','1341898383','Coineer','http://www.coineer.com/','1','1341898383','15','13','');
INSERT INTO 5w_site_cool VALUES('171','1368267689','btc-e','http://www.btc-e.com/','1','1368267718','5','17','');
INSERT INTO 5w_site_cool VALUES('172','1368267689','BitStamp','https://www.bitstamp.net/','1','1368267718','10','17','');
INSERT INTO 5w_site_cool VALUES('173','1368267689','Tradehill','http://www.tradehill.com','1','1377353983','25','17','');
INSERT INTO 5w_site_cool VALUES('223','1377744256','175btc(国内矿池)','http://www.175btc.com/','1','1377745080','15','2','');
INSERT INTO 5w_site_cool VALUES('43','1341898503','比特币中国','https://www.btcchina.com/','1','1364366159','5','4','');
INSERT INTO 5w_site_cool VALUES('170','1368267689','MtGox','http://www.mtgox.com/','1','1368285285','1','17','');
INSERT INTO 5w_site_cool VALUES('45','1341915377','Coinbase','https://coinbase.com/','1','1341915377','10','5','');
INSERT INTO 5w_site_cool VALUES('204','1373730751','OKCoin比特币网','http://www.okcoin.com/?channelId=3','1','1376748552','6','4','#ff6600');
INSERT INTO 5w_site_cool VALUES('66','1341921234','ZhouTong的声明','https://bitcointalk.org/index.php?topic=95795.0','1','1343629610','10','19','');
INSERT INTO 5w_site_cool VALUES('48','1341915454','BTC充话费(国内)','http://www.btctele.com/','1','1371567157','20','5','');
INSERT INTO 5w_site_cool VALUES('200','1370508828','欢乐95淘宝导购','http://www.huanle95.com/','1','1375495409','25','5','');
INSERT INTO 5w_site_cool VALUES('234','1380504458','btctrade行情','http://info.btc123.com/btctrade.php','1','1380504512','15','6','');
INSERT INTO 5w_site_cool VALUES('116','1343789603','LTC','http://litecoin.org/','1','1377883063','10','10','');
INSERT INTO 5w_site_cool VALUES('138','1362471251','比特币中文论坛','http://www.btcbbs.com','1','1367071191','5','22','#178517');
INSERT INTO 5w_site_cool VALUES('67','1341921234','Bitcoinica关于Mt.Gox账户被盗的公共声明','https://bitcointalk.org/index.php?topic=95738.0','1','1343629574','5','19','');
INSERT INTO 5w_site_cool VALUES('56','1341915955','BITGO','http://www.bitgo.net/','1','1380504512','25','6','');
INSERT INTO 5w_site_cool VALUES('57','1341915955','K线汇总','http://k.btc123.com','1','1380504512','20','6','');
INSERT INTO 5w_site_cool VALUES('58','1341915955','美元实时行情','http://ss.btc123.com','1','1380504512','5','6','#940000');
INSERT INTO 5w_site_cool VALUES('203','1373165569','BTC挖矿收益计算','http://mining.btcfans.com/','1','1377099503','5','8','');
INSERT INTO 5w_site_cool VALUES('64','1341920780','全网运算分布','http://blockchain.info/pools','1','1377747125','2','8','');
INSERT INTO 5w_site_cool VALUES('68','1341921234','Bitcoinica账户被盗事件','https://bitcointalk.org/index.php?topic=93074.0','1','1343629573','1','19','');
INSERT INTO 5w_site_cool VALUES('217','1376474565','btc-dice(中文台湾)','http://www.btc-dice.com','1','1381537279','3','1','');
INSERT INTO 5w_site_cool VALUES('228','1378742148','比特派','http://www.btcpie.com','1','1378742148','8','18','');
INSERT INTO 5w_site_cool VALUES('233','1380375053','LetsTalkBTC','http://letstalkbitcoin.com/','1','1380375103','4','13','');
INSERT INTO 5w_site_cool VALUES('73','1341933202','全网信息统计','http://www.blockchain.info/stats','1','1380173960','1','9','');
INSERT INTO 5w_site_cool VALUES('168','1368073343','LTC挖矿收益计算','http://ltc.kattare.com/calc.php','1','1373165569','20','8','');
INSERT INTO 5w_site_cool VALUES('75','1341933591','活跃地址','http://www.blockchain.info/popular-addresses','1','1341934685','30','9','');
INSERT INTO 5w_site_cool VALUES('76','1341934516','比特币地址土豪榜','http://btc.ondn.net','1','1381916918','20','9','');
INSERT INTO 5w_site_cool VALUES('220','1377173318','JoyBTC价格分析','http://www.joybtc.com/','1','1377173318','2','7','');
INSERT INTO 5w_site_cool VALUES('193','1370105285','LTC模拟交易','http://www.ltcbase.com','1','1375152097','11','10','');
INSERT INTO 5w_site_cool VALUES('161','1367763775','虚拟币汇总','https://en.bitcoin.it/wiki/List_of_alternative_cryptocurrencies','1','1367763888','1','10','');
INSERT INTO 5w_site_cool VALUES('225','1377882780','莱特币资讯','http://www.laitebi.com/','1','1377882780','12','10','');
INSERT INTO 5w_site_cool VALUES('123','1346257995','比特币中国行情','http://info.btc123.com/index_btcchina.php','1','1380504512','10','6','');
INSERT INTO 5w_site_cool VALUES('83','1341937432','Ubuntu挖矿','https://bitcointalk.org/index.php?topic=9239.0','1','1370701403','3','12','');
INSERT INTO 5w_site_cool VALUES('84','1341937432','Ubuntu11.04挖矿','https://bitcointalk.org/index.php?topic=7514.0','1','1367578948','5','12','');
INSERT INTO 5w_site_cool VALUES('148','1365151705','BitMinter','http://bitminter.com/','1','1377744216','19','2','');
INSERT INTO 5w_site_cool VALUES('89','1341967709','BitcoinTrading','http://www.bitcointrading.com/','1','1341967709','10','20','');
INSERT INTO 5w_site_cool VALUES('90','1341967710','BTC的淘宝平台','http://www.bitmit.net/','1','1367225892','1','20','');
INSERT INTO 5w_site_cool VALUES('91','1341967730','花掉你的比特币','https://www.spendbitcoins.com/','1','1367226121','5','20','');
INSERT INTO 5w_site_cool VALUES('215','1375977215','时价交易行','https://cny2btc.com/','1','1376900196','13','4','');
INSERT INTO 5w_site_cool VALUES('160','1367578692','btcbbs挖矿专区','http://www.btcbbs.com/forum.php?gid=43','1','1370701403','4','12','');
INSERT INTO 5w_site_cool VALUES('99','1341969766','BlockChain图表','http://www.blockchain.info/charts','1','1366187561','5','15','');
INSERT INTO 5w_site_cool VALUES('100','1341969766','难度与算力图','http://bitcoin.sipa.be/','1','1366187598','1','15','');
INSERT INTO 5w_site_cool VALUES('175','1368267689','bitcoin.de德国交易所','https://www.bitcoin.de','1','1376312962','20','17','');
INSERT INTO 5w_site_cool VALUES('103','1341970963','gsslgle','https://www.gsslgle.com','1','1341970979','15','16','');
INSERT INTO 5w_site_cool VALUES('104','1341970963','proxite.net','https://proxite.net/','1','1341970963','10','16','');
INSERT INTO 5w_site_cool VALUES('105','1341970963','谷歌地图观察','http://www.williamlong.info/google/','1','1341970963','5','16','');
INSERT INTO 5w_site_cool VALUES('106','1341970963','Domain','http://www.ename.net/domain','1','1341970963','25','16','');
INSERT INTO 5w_site_cool VALUES('107','1341970963','isup.me','http://www.isup.me/','1','1341970980','1','16','');
INSERT INTO 5w_site_cool VALUES('108','1342010566','CoinDesk','http://www.coindesk.com/','1','1370521700','1','13','');
INSERT INTO 5w_site_cool VALUES('109','1342396368','初级挖矿教学','http://cnbtcnews.com/bitcoin-study/bitcoin-mining-guid/bitcoin-mining-teach-for-beginner.html','1','1342396368','2','12','');
INSERT INTO 5w_site_cool VALUES('149','1365152515','Bitcoin交易信号(墙)','http://btctrading.wordpress.com/','1','1368957766','3','7','');
INSERT INTO 5w_site_cool VALUES('144','1364807423','比特币学习资料','http://bbs.btcman.com/forum.php?mod=viewthread&tid=160&extra=page%3D1','1','1364807423','20','14','');
INSERT INTO 5w_site_cool VALUES('235','1380849676','比特币之家','http://www.5ywyx.com/','1','1380849676','18','3','');
INSERT INTO 5w_site_cool VALUES('118','1344652758','实时未确认交易(C)','http://blockchain.info/unconfirmed-transactions','1','1344652758','10','15','');
INSERT INTO 5w_site_cool VALUES('205','1374226688','LTCBBS','http://www.ltcbbs.com','1','1377882781','15','10','');
INSERT INTO 5w_site_cool VALUES('176','1368267689','VirWox','http://www.virwox.com/','1','1377353983','15','17','');
INSERT INTO 5w_site_cool VALUES('121','1345542540','cgminer官方发布帖','https://bitcointalk.org/index.php?topic=28402.0','1','1367578868','3','12','#E06200');
INSERT INTO 5w_site_cool VALUES('140','1362471296','巴比特','http://www.8btc.com/','1','1376318620','15','3','#8C1100');
INSERT INTO 5w_site_cool VALUES('129','1362220845','网上商店','http://launch.avalon-asics.com/','1','1362220845','1','21','');
INSERT INTO 5w_site_cool VALUES('130','1362220845','使用文档','https://en.bitcoin.it/wiki/Avalon','1','1367219327','2','21','');
INSERT INTO 5w_site_cool VALUES('131','1362220845','软件代码','https://github.com/BitSyncom','1','1362220845','3','21','');
INSERT INTO 5w_site_cool VALUES('132','1362220845','Avalon用户讨论帖','https://bitcointalk.org/index.php?topic=140539.0;all','1','1367219347','5','21','');
INSERT INTO 5w_site_cool VALUES('133','1362220845','Lancelot/Icarus文档','http://en.qi-hardware.com/wiki/Icarus','1','1362221197','6','21','');
INSERT INTO 5w_site_cool VALUES('134','1362223659','Ripple','https://ripple.com/','1','1370105285','5','10','');
INSERT INTO 5w_site_cool VALUES('179','1368408239','虚拟币占比图','http://www.coinchoose.com/charts.php','1','1377883080','2','10','#178517');
INSERT INTO 5w_site_cool VALUES('137','1362471251','比特人论坛','http://bbs.btcman.com/','1','1369369263','1','22','#C40000');
INSERT INTO 5w_site_cool VALUES('139','1362471251','比特币领先社区','http://bitcoinlead.org','1','1374226662','10','22','');
INSERT INTO 5w_site_cool VALUES('147','1365134010','BTC爱好者','http://www.btcfans.com/','1','1370487023','19','3','');
INSERT INTO 5w_site_cool VALUES('214','1375806207','比特币资讯网','http://www.bitcoin86.com/index.html','1','1375806207','50','3','');
INSERT INTO 5w_site_cool VALUES('151','1366998023','ASIC各家矿机追踪','http://minr.info/','1','1366998023','1','11','');
INSERT INTO 5w_site_cool VALUES('153','1367114683','比特儿','https://bter.com/','1','1380108689','20','4','');
INSERT INTO 5w_site_cool VALUES('154','1367225894','BTC本地面交','https://localbitcoins.com/','1','1367225894','2','20','');
INSERT INTO 5w_site_cool VALUES('155','1367226105','接受BTC支付的商家','https://www.spendbitcoins.com/places/','1','1367226105','4','20','');
INSERT INTO 5w_site_cool VALUES('162','1367801854','50BTC','https://50btc.com/','1','1377744216','5','2','');
INSERT INTO 5w_site_cool VALUES('166','1367943962','雪球-比特币专区','http://xueqiu.com/S/MTGOXUSD','1','1376710603','10','18','');
INSERT INTO 5w_site_cool VALUES('165','1367924204','行情汇总(荐)','http://z.btc123.com','1','1380504472','1','6','#178517');
INSERT INTO 5w_site_cool VALUES('231','1380165162','挖矿排名','http://blockorigin.pfoe.be/top.php','1','1380165162','3','8','');
INSERT INTO 5w_site_cool VALUES('180','1368588994','Goomboo分析','https://bitcointalk.org/index.php?topic=60501.0','1','1368588994','15','7','');
INSERT INTO 5w_site_cool VALUES('181','1369017865','比特币交易网','http://www.btctrade.com','1','1371651191','2','4','#A81500');
INSERT INTO 5w_site_cool VALUES('182','1369369199','BTC信息论坛','http://www.btcxx.com/','1','1371313068','20','22','');
INSERT INTO 5w_site_cool VALUES('183','1369560184','Namecheap','http://www.namecheap.com/','1','1369561891','1','23','');
INSERT INTO 5w_site_cool VALUES('192','1369672636','BTC实时新闻','http://wtbtc.com/','1','1370364355','3','13','');
INSERT INTO 5w_site_cool VALUES('186','1369560535','Reddit','http://www.reddit.com/r/Bitcoin/','1','1369560615','15','23','');
INSERT INTO 5w_site_cool VALUES('187','1369560794','WordPress(墙)','http://en.support.wordpress.com/bitcoin/','1','1369561064','5','23','');
INSERT INTO 5w_site_cool VALUES('188','1369561023','海盗湾(墙)','http://thepiratebay.se/','1','1369561799','10','23','');
INSERT INTO 5w_site_cool VALUES('189','1369561272','互联网档案馆','http://archive.org/donate/','1','1369561933','20','23','');
INSERT INTO 5w_site_cool VALUES('190','1369561533','图片布告4chan','https://www.4chan.org/pass','1','1369561533','25','23','');
INSERT INTO 5w_site_cool VALUES('194','1370172993','币信论坛','http://bbs.btcxin.com/forum.php','1','1371313068','25','22','');
INSERT INTO 5w_site_cool VALUES('195','1370404341','矿机市场(彩云比特)','http://www.cybtc.com/','1','1373165719','3','11','');
INSERT INTO 5w_site_cool VALUES('213','1375669612','BTC股票参考','http://cnbitcointalk.com/','1','1378811646','6','18','');
INSERT INTO 5w_site_cool VALUES('199','1370508069','脑钱包','http://brainwallet.org/','1','1370508069','1','5','');
INSERT INTO 5w_site_cool VALUES('201','1370662478','比巴克','http://p2pbucks.com/','1','1377882705','3','3','');
INSERT INTO 5w_site_cool VALUES('202','1370965996','巴比特论坛','http://8btc.com/','1','1378458099','15','22','');
INSERT INTO 5w_site_cool VALUES('206','1375363783','F2Pool鱼池','http://f2pool.com/','1','1377744216','14','2','#D82800');
INSERT INTO 5w_site_cool VALUES('207','1375498175','ACTIVEMINING','https://btct.co/security/ACTIVEMINING','1','1377433718','20','24','');
INSERT INTO 5w_site_cool VALUES('222','1377433703','BitFunder股票列表','https://bitfunder.com/market','1','1377433703','2','24','');
INSERT INTO 5w_site_cool VALUES('209','1375498175','LABCoin','https://btct.co/security/LABCOIN','1','1377433670','10','24','');
INSERT INTO 5w_site_cool VALUES('210','1375498175','烤猫(小猫)','https://btct.co/security/TAT.ASICMINER','1','1375498175','5','24','');
INSERT INTO 5w_site_cool VALUES('211','1375498175','烤猫(大猫)','https://btct.co/security/ASICMINER-PT','1','1375498175','3','24','');
INSERT INTO 5w_site_cool VALUES('212','1375498214','btct证券列表','https://btct.co/security','1','1377433678','1','24','');
INSERT INTO 5w_site_cool VALUES('219','1377099882','最新区块挖掘情况','http://blockorigin.pfoe.be/blocklist.php','1','1379232733','4','9','');
INSERT INTO 5w_site_cool VALUES('229','1378811706','ZillaTalk社区','http://zillat.com/','1','1378811706','12','18','');

INSERT INTO 5w_site_famous VALUES('1','0','Mt.Gox','https://www.mtgox.com/','1','1381867635','13','');
INSERT INTO 5w_site_famous VALUES('2','0','算力分布图(较准确)','http://blockorigin.pfoe.be/chart.php','1','1381867766','43','#178517');
INSERT INTO 5w_site_famous VALUES('3','0','btc-e','https://btc-e.com/','1','1381867635','14','');
INSERT INTO 5w_site_famous VALUES('45','0','BTC美元行情(K线)','http://info.btc123.com','1','1381868725','31','#178517');
INSERT INTO 5w_site_famous VALUES('5','0','BTC人民币(K线)','http://info.btc123.com/index_btcchina.php','1','1381868722','11','#178517');
INSERT INTO 5w_site_famous VALUES('48','0','BTC美元实时行情','http://ss.btc123.com','1','1381868723','32','');
INSERT INTO 5w_site_famous VALUES('7','0','BitcoinCharts','http://bitcoincharts.com','1','1381867635','26','');
INSERT INTO 5w_site_famous VALUES('51','0','价格行情汇总','http://z.btc123.com/','1','1381875982','22','');
INSERT INTO 5w_site_famous VALUES('11','0','MtGox实时盘口','http://mm.btc123.com/','1','1381875940','51','');
INSERT INTO 5w_site_famous VALUES('12','0','矿池 - btcguild','http://www.btcguild.com/','1','1381867635','24','');
INSERT INTO 5w_site_famous VALUES('14','0','比特汇担保交易','https://www.yesbtc.co/','1','1381875785','53','');
INSERT INTO 5w_site_famous VALUES('15','0','矿池 - 50btc','https://50btc.com/','1','1381867635','25','');
INSERT INTO 5w_site_famous VALUES('47','0','BTC/LTC免费交易','http://www.okcoin.com/?channelId=8','1','1381875332','21','#DC0052');
INSERT INTO 5w_site_famous VALUES('17','0','洋洋访谈','http://weibo.com/u/3244140934','1','1381867674','54','');
INSERT INTO 5w_site_famous VALUES('18','0','Talk官方论坛','https://bitcointalk.org/','1','1381875796','35','');
INSERT INTO 5w_site_famous VALUES('19','0','Bitcoin On reddit','http://www.reddit.com/r/Bitcoin/','1','1381875797','36','');
INSERT INTO 5w_site_famous VALUES('21','0','免费比特币','https://www.chbtc.com/help/des4','1','1381867635','15','#F80083');
INSERT INTO 5w_site_famous VALUES('23','0','比特人','http://www.btcman.com/','1','1381875795','34','');
INSERT INTO 5w_site_famous VALUES('24','0','挖矿难度曲线图','http://bitcoindifficulty.com/','1','1381867674','61','');
INSERT INTO 5w_site_famous VALUES('25','0','静态K线行情','http://k.btc123.com/static_k/','1','1381867914','42','');
INSERT INTO 5w_site_famous VALUES('26','0','各虚拟币挖矿对比','http://dustcoin.com/mining','1','1381867779','44','');
INSERT INTO 5w_site_famous VALUES('27','0','各虚拟币占比图','http://www.coinchoose.com/charts.php','1','1381867791','45','');
INSERT INTO 5w_site_famous VALUES('28','0','Blockchain','http://www.blockchain.info/','1','1381867674','55','');
INSERT INTO 5w_site_famous VALUES('29','0','BlockExplorer','http://blockexplorer.com/','1','1381867674','56','');
INSERT INTO 5w_site_famous VALUES('30','0','比特币中国盘口','http://mm.btc123.com/btcchina.php','1','1381867674','52','');
INSERT INTO 5w_site_famous VALUES('32','0','中本聪骰子','http://satoshidice.com/','1','1381867674','65','');
INSERT INTO 5w_site_famous VALUES('33','0','国际市场价格','http://bitcoincharts.com/markets/','1','1381868230','46','');
INSERT INTO 5w_site_famous VALUES('50','0','BTC股票投资参考','http://cnbitcointalk.com/','1','1381867674','66','');
INSERT INTO 5w_site_famous VALUES('35','0','bitfunder证券列表','https://bitfunder.com/market','1','1381867969','62','');
INSERT INTO 5w_site_famous VALUES('46','0','实时K线汇总','http://k.btc123.com','1','1381868748','41','');
INSERT INTO 5w_site_famous VALUES('37','0','bitmit(BTC淘宝网)','http://www.bitmit.net','1','1381867674','63','');
INSERT INTO 5w_site_famous VALUES('39','0','btc-Dice(中文台湾)','http://www.btc-dice.com','1','1381867674','64','');
INSERT INTO 5w_site_famous VALUES('41','0','BitStamp','https://www.bitstamp.net/','1','1381867635','16','');
INSERT INTO 5w_site_famous VALUES('42','0','中国比特币','http://www.chbtc.com','1','1381867635','23','#FC0046');
INSERT INTO 5w_site_famous VALUES('44','0','BTCBBS中文论坛','http://www.btcbbs.com','1','1381875794','33','#178517');
INSERT INTO 5w_site_famous VALUES('49','0','796交易所','https://796.com','1','1381867635','12','#ff6600');

INSERT INTO 5w_site_foot VALUES('1','1341319524','bitcoin技术原理','http://zhiqiang.org/blog/it/technical-document-of-bitcoin.html','1','1341320446','10','1','');
INSERT INTO 5w_site_foot VALUES('4','1341320167','Bitcoin基本原理','http://blog.codingnow.com/2011/05/bitcoin.html','1','1372781070','20','1','');
INSERT INTO 5w_site_foot VALUES('5','1341320444','wiki:技术','https://en.bitcoin.it/wiki/Category:Technical','1','1341492814','1','1','#ff6600');
INSERT INTO 5w_site_foot VALUES('29','1375808303','比特币交易全景定量分析论文','http://www.btc123.com/data/docs/Quantitative_Analysis_of_the_Full_Bitcoin.pdf','1','1375808303','35','1','');
INSERT INTO 5w_site_foot VALUES('27','1374328525','比特国际中文论坛','http://www.btcicc.com','1','1375756734','50','2','');
INSERT INTO 5w_site_foot VALUES('26','1372781070','易懂的比特币机理详解(推荐)','http://www.btc123.com/data/docs/easy_understood_bitcoin_mechanism.pdf','1','1372812427','30','1','');
INSERT INTO 5w_site_foot VALUES('9','1341493835','比特币创世论文','http://bitcoin.org/bitcoin.pdf','1','1370663205','2','1','');
INSERT INTO 5w_site_foot VALUES('10','1341742778','头条新闻-比特币观察','http://bitcoinwatch.com/headlines.html','1','1369800204','2','2','');
INSERT INTO 5w_site_foot VALUES('23','1369800204','货币之王比特币的微博','http://weibo.com/kingofcurrency','1','1369800204','3','2','');
INSERT INTO 5w_site_foot VALUES('12','1342114813','Facebook股权结构','http://www.36kr.com/p/80336.html','1','1369798768','30','4','');
INSERT INTO 5w_site_foot VALUES('22','1369798891','论比特币作为货币的角色','https://bitcointalk.org/index.php?topic=215310.0','1','1369798891','3','4','');
INSERT INTO 5w_site_foot VALUES('14','1342395616','创世论文(翻译版)','http://www.btc123.com/data/docs/bitcoin_cn.pdf','1','1375808383','3','1','');
INSERT INTO 5w_site_foot VALUES('15','1344652341','BTC导航官方微博','http://weibo.com/btc123','1','1369800204','1','2','');
INSERT INTO 5w_site_foot VALUES('16','1368291106','比特币简史回顾','http://vga.zol.com.cn/370/3708715_all.html','1','1370663189','15','4','');
INSERT INTO 5w_site_foot VALUES('17','1369367848','BTC股票投资参考','http://cnbitcointalk.com/','1','1375667293','4','2','');
INSERT INTO 5w_site_foot VALUES('18','1369367884','什么是VIE','http://tech2ipo.com/56981','1','1369367884','20','4','');
INSERT INTO 5w_site_foot VALUES('19','1369367989','高手往往输给自己','http://www.btcbbs.com/forum.php?mod=viewthread&tid=244','1','1369798768','10','4','');
INSERT INTO 5w_site_foot VALUES('20','1369404561','重新发明货币','http://blog.sina.com.cn/s/blog_63045e190101d4ny.html','1','1369798768','5','4','');
INSERT INTO 5w_site_foot VALUES('21','1369795869','6个有关BTC的教育资源','http://www.36kr.com/p/203299.html','1','1369798802','1','4','');
INSERT INTO 5w_site_foot VALUES('28','1375756733','比特币洋洋访谈','http://weibo.com/u/3244140934','1','1375756733','6','2','#ff6600');

INSERT INTO 5w_site_left VALUES('158','1341318646','Metabank','https://metabank.ru/pool','1','1341318646','82','7','');
INSERT INTO 5w_site_left VALUES('157','1341318519','EclipseMC','https://eclipsemc.com/','1','1341318519','54','7','');
INSERT INTO 5w_site_left VALUES('156','1341318461','Eligius','http://eligius.st','1','1341318461','53','7','');
INSERT INTO 5w_site_left VALUES('155','1341318419','p2pool','http://p2pool.info/','1','1341318419','52','7','');
INSERT INTO 5w_site_left VALUES('154','1341318303','Ozcoin','http://ozco.in/','1','1341318303','51','7','');
INSERT INTO 5w_site_left VALUES('153','1341318238','abcpool','http://www.abcpool.co/','1','1341318238','41','7','');
INSERT INTO 5w_site_left VALUES('152','1341317955','实时价格MtGoxlive',' http://mtgoxlive.com','1','1341323959','60','6','');
INSERT INTO 5w_site_left VALUES('129','1341203673','MtGox市场深度','https://mtgox.com/api/0/data/getDepth.php','1','1341323959','3','6','');
INSERT INTO 5w_site_left VALUES('128','1341203621','MtGox价格K线','http://bitcoincharts.com/charts/mtgoxUSD','1','1341203621','2','6','');
INSERT INTO 5w_site_left VALUES('21','1279617741','中文比特币网','http://www.bitecoin.com/','1','1341224704','2','1','');
INSERT INTO 5w_site_left VALUES('22','1279617741','比特币中文网','http://bitebi.cc/','1','1341224827','4','1','');
INSERT INTO 5w_site_left VALUES('133','1341224818','海峡比特币网','http://www.hxtop.com/','1','1341224818','3','1','');
INSERT INTO 5w_site_left VALUES('151','1341317733','BTCMine','http://btcmine.com/','1','1341318320','71','7','');
INSERT INTO 5w_site_left VALUES('150','1341317698','BitcoinPool','https://www.bitcoinpool.com/','1','1341318315','81','7','');
INSERT INTO 5w_site_left VALUES('149','1341317592','Bitparking矿池','http://mmpool.bitparking.com/pool','1','1341317630','61','7','');
INSERT INTO 5w_site_left VALUES('148','1341317526','btcguild全网成果','https://www.btcguild.com/block_list.php','1','1341317526','32','7','');
INSERT INTO 5w_site_left VALUES('147','1341317271','deepbit运行状态','https://deepbit.net/stats','1','1341317308','12','7','');
INSERT INTO 5w_site_left VALUES('37','1279617741','Mt.Gox','http://www.mtgox.com','1','1341557170','10','2','');
INSERT INTO 5w_site_left VALUES('38','1279617741','比特币中国','http://www.btcchina.com','1','1341557170','30','2','');
INSERT INTO 5w_site_left VALUES('39','1279617741','btc-e','http://www.btc-e.com','1','1341557170','20','2','');
INSERT INTO 5w_site_left VALUES('146','1341317270','deepbit组团挖矿','https://deepbit.net/teams/','1','1341317308','13','7','');
INSERT INTO 5w_site_left VALUES('145','1341243643','客户端统计','http://bitcoinstatus.rowit.co.uk/','1','1341243643','5','5','');
INSERT INTO 5w_site_left VALUES('144','1341243499','slush','http://mining.bitcoin.cz/','1','1341317342','21','7','');
INSERT INTO 5w_site_left VALUES('143','1341243370','全网算力曲线','http://blockchain.info/charts/hash-rate','1','1341243370','3','4','');
INSERT INTO 5w_site_left VALUES('142','1341243340','全网算力曲线','http://blockchain.info/charts/hash-rate','1','1341243340','3','5','');
INSERT INTO 5w_site_left VALUES('141','1341243275','slush运行状态','http://mining.bitcoin.cz/stats/','1','1341317342','22','7','');
INSERT INTO 5w_site_left VALUES('140','1341242926','btcguild','http://www.btcguild.com','1','1341317330','31','7','');
INSERT INTO 5w_site_left VALUES('139','1341242909','deepbit','http://www.deepbit.net','1','1341317308','11','7','');
INSERT INTO 5w_site_left VALUES('59','1279617741','btc实物交易论坛','http://www.bitcointrading.com','1','1341229768','20','3','');
INSERT INTO 5w_site_left VALUES('127','1341203588','实时价格BTCcharts','http://btccharts.com/#m=mtgox-BTC-USD','1','1341227661','1','6','');
INSERT INTO 5w_site_left VALUES('63','1298293122','Bets of Bitcoin','http://betsofbitco.in/','1','1341229615','23','3','');
INSERT INTO 5w_site_left VALUES('163','1341332491','NanaimoGold','https://www.nanaimogold.com/bitcoin.php','1','1341557170','60','2','');
INSERT INTO 5w_site_left VALUES('162','1341323959','bitcoinity','http://bitcoinity.org/markets','1','1341323959','30','6','');
INSERT INTO 5w_site_left VALUES('161','1341318790','BTC Warp','http://pool.btcwarp.com/','1','1341318790','85','7','');
INSERT INTO 5w_site_left VALUES('160','1341318710','BitMinter','https://bitminter.com/','1','1341318710','84','7','');
INSERT INTO 5w_site_left VALUES('71','1298293234','更多 >>','http://www.btc123.com','1','1341243376','99','4','');
INSERT INTO 5w_site_left VALUES('159','1341318673','TripleMining','https://www.triplemining.com/','1','1341318673','83','7','');
INSERT INTO 5w_site_left VALUES('138','1341238787','动态全网活动图','http://www.bitcoinmonitor.com/','1','1341243319','30','5','');
INSERT INTO 5w_site_left VALUES('137','1341234553','bitcoinCentral','https://bitcoin-central.net/','1','1341557170','50','2','');
INSERT INTO 5w_site_left VALUES('136','1341230584','在线钱包(慎用)','https://www.instawallet.org','1','1341323014','15','3','');
INSERT INTO 5w_site_left VALUES('135','1341229928','Coinbase','https://coinbase.com','1','1341229928','30','3','');
INSERT INTO 5w_site_left VALUES('132','1341205920','比特币中国交易历史(需登录)','https://btcchina.com/trade/history','1','1341323959','50','6','');
INSERT INTO 5w_site_left VALUES('131','1341205813','比特币中国市场深度(需登录)','https://btcchina.com/trade/depth','1','1341323959','40','6','');
INSERT INTO 5w_site_left VALUES('130','1341203899','比特币树','http://www.btctree.com','1','1341557170','40','2','');
INSERT INTO 5w_site_left VALUES('126','1340178785','比特币新闻网','http://www.cnbtcnews.com/','1','1341224627','1','1','');
INSERT INTO 5w_site_left VALUES('121','1279617741','比特币总量曲线','http://blockchain.info/charts/total-bitcoins','1','1341204006','2','5','');
INSERT INTO 5w_site_left VALUES('122','1279617741','信息总览','http://blockchain.info/stats','1','1341204001','1','5','');
INSERT INTO 5w_site_left VALUES('125','1302664906','全网运算分布','http://blockchain.info/pools','1','1341229469','1','4','');
INSERT INTO 5w_site_left VALUES('164','1341333040','clarkmoody深度表','http://bitcoin.clarkmoody.com/','1','1341333040','4','6','');
INSERT INTO 5w_site_left VALUES('165','1341333245','bitcoinwatch技术分析','http://blog.bitcoinwatch.com/','1','1341333245','1','8','');
INSERT INTO 5w_site_left VALUES('166','1341333298','比特币牛熊网(需翻墙)','http://www.bitcoinbullbear.com/','1','1341333298','2','8','');
INSERT INTO 5w_site_left VALUES('167','1341333356','BitcoinAnalyst','http://chart.ly/users/BitcoinAnalyst','1','1341333356','3','8','');
INSERT INTO 5w_site_left VALUES('168','1341334439','中本聪骰子','http://satoshidice.com/','1','1341334439','10','3','');
INSERT INTO 5w_site_left VALUES('169','1341334596','踩雷游戏','http://minefield.bitcoinlab.org','1','1341334596','19','3','');
INSERT INTO 5w_site_left VALUES('170','1341334637','比特币投资基金','http://www.ultimafund.com/','1','1341334637','5','3','');
INSERT INTO 5w_site_left VALUES('171','1341457244','Mt.Red','https://mtred.com/','1','1341457244','75','7','');
INSERT INTO 5w_site_left VALUES('172','1341470360','MaxBTC','https://www.maxbtc.com/','1','1341470360','35','7','');
INSERT INTO 5w_site_left VALUES('173','1341622543','BitInstant','http://bitinstant.com/','1','1341622543','70','2','');
INSERT INTO 5w_site_left VALUES('174','1342055448','新手入门','http://btc.p2pbucks.com/','1','1379322103','15','14','');
INSERT INTO 5w_site_left VALUES('175','1342055473','BTC学习资料','http://bbs.btcman.com/forum.php?mod=viewthread&tid=160','1','1380378255','10','14','');
INSERT INTO 5w_site_left VALUES('176','1342056399','中文维基','https://zh-cn.bitcoin.it/','1','1370706951','5','14','');
INSERT INTO 5w_site_left VALUES('177','1342056428','比特币百科','http://8btc.com/wiki/','1','1380378254','20','14','');
INSERT INTO 5w_site_left VALUES('178','1342059797','实物交易','trading.html','1','1370701281','5','12','');
INSERT INTO 5w_site_left VALUES('179','1342060565','比特币金融投资','investing.html','1','1370701281','1','12','#940400');
INSERT INTO 5w_site_left VALUES('214','1370531300','国际汇兑平台','ex-markets-global.html','1','1370537284','15','11','');
INSERT INTO 5w_site_left VALUES('184','1342060881','其他国际资讯','globalinfo.html','1','1370537168','20','10','');
INSERT INTO 5w_site_left VALUES('185','1342060881','其他中文资讯','chineseinfo.html','1','1370537168','15','10','');
INSERT INTO 5w_site_left VALUES('186','1342060914','中文资讯','http://www.bitecoin.com/','1','1372072162','5','10','');
INSERT INTO 5w_site_left VALUES('187','1342060933','雪球-比特币专区','http://xueqiu.com/S/MTGOXUSD','1','1376629909','10','10','');
INSERT INTO 5w_site_left VALUES('188','1342060978','难度曲线','http://bitcoin.sipa.be/','1','1370701180','10','15','');
INSERT INTO 5w_site_left VALUES('189','1342061027','BlockExplorer','http://blockexplorer.com/','1','1367226667','15','15','');
INSERT INTO 5w_site_left VALUES('190','1342061028','很酷的信息图表','charts-figures.html','1','1370701181','5','15','#940400');
INSERT INTO 5w_site_left VALUES('192','1342061274','国内汇兑平台','ex-markets-cn.html','1','1370537284','20','11','');
INSERT INTO 5w_site_left VALUES('193','1342061274','价格行情走势','ex-info.html','1','1370537284','5','11','');
INSERT INTO 5w_site_left VALUES('194','1342061412','挖矿信息','mining-info.html','1','1342061412','10','9','');
INSERT INTO 5w_site_left VALUES('195','1342061412','高级挖矿','mining-pro.html','1','1342061412','15','9','');
INSERT INTO 5w_site_left VALUES('196','1342061412','矿池大全','mining-pools.html','1','1368957372','1','9','#9C0400');
INSERT INTO 5w_site_left VALUES('197','1342061412','挖矿教程','mining-howto.html','1','1342061412','5','9','');
INSERT INTO 5w_site_left VALUES('198','1342061693','素数币发布帖','https://bitcointalk.org/index.php?topic=251850.0','1','1374808852','7','16','');
INSERT INTO 5w_site_left VALUES('199','1342061693','LTC汇兑','https://btc-e.com/exchange/ltc_btc','1','1362224428','6','16','');
INSERT INTO 5w_site_left VALUES('200','1342061693','素数币汇兑','https://www.coins-e.com/exchange/XPM_BTC/','1','1374808876','8','16','');
INSERT INTO 5w_site_left VALUES('201','1342061693','Namecoin官网','http://dot-bit.org/Main_Page','1','1374808896','10','16','');
INSERT INTO 5w_site_left VALUES('202','1342061830','价格分析','price-tech-analysis.html','1','1342061830','10','11','');
INSERT INTO 5w_site_left VALUES('203','1342064342','比特币地址缩短','https://btc.to/','1','1370701281','10','12','');
INSERT INTO 5w_site_left VALUES('204','1342064342','脑钱包','http://brainwallet.org/','1','1370701281','15','12','');
INSERT INTO 5w_site_left VALUES('206','1346258264','比特币中国实时价格','http://info.btc123.com/index_btcchina.php','1','1370537301','25','11','#980900');
INSERT INTO 5w_site_left VALUES('207','1362224218','Ripple','https://ripple.com/','1','1362224218','2','16','');
INSERT INTO 5w_site_left VALUES('208','1362224343','Timekoin','http://timekoin.org/','1','1362224343','3','16','');
INSERT INTO 5w_site_left VALUES('209','1362224428','Litecoin 官 网','http://litecoin.org/','1','1362224475','5','16','');
INSERT INTO 5w_site_left VALUES('210','1362332107','BTC中文论坛','http://www.btcbbs.com','1','1370153649','1','14','#ff6600');
INSERT INTO 5w_site_left VALUES('211','1366461543','比特币美元实时价格','http://ss.btc123.com','1','1370537284','30','11','#178517');
INSERT INTO 5w_site_left VALUES('212','1367226667','Blockchain','http://www.blockchain.info/','1','1367226667','20','15','');
INSERT INTO 5w_site_left VALUES('213','1370153374','BTC教学课程(推荐)','https://www.udemy.com/bitcoin-or-how-i-learned-to-stop-worrying-and-love-crypto/','1','1370707011','30','14','');
INSERT INTO 5w_site_left VALUES('215','1370706860','常见问题','http://www.bitecoin.com/faq','1','1379322103','25','14','');

INSERT INTO 5w_site_setting VALUES('1','static/images/logo_180_60.png','BTC123比特币导航','www.btc123.com','网址导航大全|自定义网址导航|网址之家|btc123个性导航','5w网址导航','webmaster@btc123.com','86400','比特币,bitcoin,比特币网址导航,比特币行情,比特币价格,比特价格K线图,比特币挖矿,比特币网址大全,比特幣','比特币信息行情第一站，btc123是专业的比特币(bitcoin)网址导航，汇集比特币最新资源及相关网站。提供实时比特币价格行情、K线图。了解比特币，从btc123开始。','BTC123_比特币导航 - 了解比特币(bitcoin)从这里开始','比特币网址导航_Bitcoin网址之家_比特币网址大全','比特币知名网址导航 比特币网址大全 bitcoin网址导航 bitcoin网址大全 比特币知名网站汇总 比特币网址目录','btc123.com 比特币导航网，收录所有关于比特币的网站，提供比特币资讯，信息。方便比特币爱好者扩大关于比特币的了解和知晓关于比特币的最新讯息。','Bitcoin导航_Bitcoin网址导航_网址大全_比特币网址导航_btc123.com','比特币网站收录查询_免费收录比特币网站_比特币新站提交收录','btc123.com 比特币导航网，收录所有关于比特币的网站，提供比特币资讯，信息。方便比特币爱好者扩大关于比特币的了解和知晓关于比特币的最新讯息。','<script src=\"http://s16.cnzz.com/stat.php?id=4220260&web_id=4220260\" language=\"JavaScript\"></script><script type=\"text/javascript\">\r\nvar _bdhmProtocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");\r\ndocument.write(unescape(\"%3Cscript src=\'\" + _bdhmProtocol + \"hm.baidu.com/h.js%3F32bd829c22f4f3afcb1b6160c9b3a0f0\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>','沪ICP备12011456号-1','http://www.miibeian.gov.cn/','html/','default/','8.0','1','smtp.exmail.qq.com','25','support@btc123.com','slibber09','support@btc123.com','1','2','20110906','20110815','20110515','20110829');

INSERT INTO 5w_site_tool VALUES('1','0','MtGox美元价格k线','http://bitcoincharts.com/charts/mtgoxUSD','1','1341074372','1','');

INSERT INTO 5w_tag_nav_img VALUES('1','z_0.gif','默认');
INSERT INTO 5w_tag_nav_img VALUES('2','z_1.gif','笑话');
INSERT INTO 5w_tag_nav_img VALUES('3','z_2.gif','新闻');
INSERT INTO 5w_tag_nav_img VALUES('4','z_3.gif','金融');
INSERT INTO 5w_tag_nav_img VALUES('5','z_4.gif','音乐');
INSERT INTO 5w_tag_nav_img VALUES('6','z_5.gif','社区');
INSERT INTO 5w_tag_nav_img VALUES('7','z_6.gif','摄影');
INSERT INTO 5w_tag_nav_img VALUES('8','z_7.gif','小说');
INSERT INTO 5w_tag_nav_img VALUES('9','z_8.gif','美食');
INSERT INTO 5w_tag_nav_img VALUES('10','z_9.gif','视频');
INSERT INTO 5w_tag_nav_img VALUES('11','z_10.gif','聊天');
INSERT INTO 5w_tag_nav_img VALUES('12','z_11.gif','交友');
INSERT INTO 5w_tag_nav_img VALUES('13','z_12.gif','收藏');
INSERT INTO 5w_tag_nav_img VALUES('14','z_13.gif','游戏');
INSERT INTO 5w_tag_nav_img VALUES('15','z_14.gif','天气');
INSERT INTO 5w_tag_nav_img VALUES('16','z_15.gif','艺术');
INSERT INTO 5w_tag_nav_img VALUES('17','z_16.gif','技术');
INSERT INTO 5w_tag_nav_img VALUES('18','z_17.gif','团购');
INSERT INTO 5w_tag_nav_img VALUES('19','z_18.gif','邮箱');
INSERT INTO 5w_tag_nav_img VALUES('20','z_19.gif','购物');
INSERT INTO 5w_tag_nav_img VALUES('21','z_20.gif','搜索');

INSERT INTO 5w_tag_site_nav VALUES('757','1','社区','0','10','z_5.gif');
INSERT INTO 5w_tag_site_nav VALUES('756','1','邮箱','0','8','z_18.gif');
INSERT INTO 5w_tag_site_nav VALUES('755','1','新闻','0','6','z_2.gif');
INSERT INTO 5w_tag_site_nav VALUES('754','1','游戏','0','5','z_13.gif');
INSERT INTO 5w_tag_site_nav VALUES('753','1','视频','0','4','z_9.gif');
INSERT INTO 5w_tag_site_nav VALUES('752','1','购物','0','2','z_19.gif');
INSERT INTO 5w_tag_site_nav VALUES('751','1','搜索','0','1','z_0.gif');
INSERT INTO 5w_tag_site_nav VALUES('758','1','中文','0','11','z_0.gif');
INSERT INTO 5w_tag_site_nav VALUES('784','3','新闻','0','6','z_2.gif');
INSERT INTO 5w_tag_site_nav VALUES('783','3','游戏','0','5','z_13.gif');
INSERT INTO 5w_tag_site_nav VALUES('782','3','视频','0','4','z_9.gif');
INSERT INTO 5w_tag_site_nav VALUES('781','3','五星','0','3','z_12.gif');
INSERT INTO 5w_tag_site_nav VALUES('780','3','购物','0','2','z_19.gif');
INSERT INTO 5w_tag_site_nav VALUES('779','3','搜索','0','1','z_0.gif');
INSERT INTO 5w_tag_site_nav VALUES('770','1','细纹','0','12','z_0.gif');
INSERT INTO 5w_tag_site_nav VALUES('785','3','邮箱','0','7','z_18.gif');
INSERT INTO 5w_tag_site_nav VALUES('786','3','社区','0','8','z_5.gif');
INSERT INTO 5w_tag_site_nav VALUES('787','3','哈哈1','0','9','z_0.gif');

INSERT INTO 5w_tag_site_url VALUES('5183','凤凰新闻','http://news.ifeng.com/','1371990115','1','5','755');
INSERT INTO 5w_tag_site_url VALUES('5182','网易新闻','http://news.163.com/','1371990115','1','4','755');
INSERT INTO 5w_tag_site_url VALUES('5181','搜狐新闻','http://news.sohu.com/','1371990115','1','3','755');
INSERT INTO 5w_tag_site_url VALUES('5180','腾讯新闻','http://news.qq.com/','1371990115','1','2','755');
INSERT INTO 5w_tag_site_url VALUES('5179','新浪新闻','http://news.sina.com.cn/','1371990115','1','1','755');
INSERT INTO 5w_tag_site_url VALUES('5178','多玩网','http://www.duowan.com/','1371990115','1','7','754');
INSERT INTO 5w_tag_site_url VALUES('5177','新浪游戏','http://game.sina.com.cn/','1371990115','1','6','754');
INSERT INTO 5w_tag_site_url VALUES('5175','腾讯游戏','http://games.qq.com/','1371990115','1','4','754');
INSERT INTO 5w_tag_site_url VALUES('5176','豆豆网','http://www.doudou.com/','1371990115','1','5','754');
INSERT INTO 5w_tag_site_url VALUES('5174','休闲小游戏','http://game.doudou.com/','1371990115','1','3','754');
INSERT INTO 5w_tag_site_url VALUES('5173','魔兽世界','http://www.warcraftchina.com/','1371990115','1','2','754');
INSERT INTO 5w_tag_site_url VALUES('5171','乐视网','http://www.letv.com/','1371990115','1','7','753');
INSERT INTO 5w_tag_site_url VALUES('5172','17173','http://www.17173.com/','1371990115','1','1','754');
INSERT INTO 5w_tag_site_url VALUES('5170','酷6网','http://www.ku6.com/','1371990115','1','6','753');
INSERT INTO 5w_tag_site_url VALUES('5169','新浪视频','http://video.sina.com.cn/','1371990115','1','5','753');
INSERT INTO 5w_tag_site_url VALUES('5168','搜狐高清','http://tv.sohu.com/hdtv','1371990115','1','4','753');
INSERT INTO 5w_tag_site_url VALUES('5167','奇艺高清','http://www.qiyi.com/','1371990115','1','3','753');
INSERT INTO 5w_tag_site_url VALUES('5166','土豆网','http://www.tudou.com/','1371990115','1','2','753');
INSERT INTO 5w_tag_site_url VALUES('5165','优酷网','http://www.youku.com/','1371990115','1','1','753');
INSERT INTO 5w_tag_site_url VALUES('5164','淘宝网','http://www.taobao.com/','1371990115','1','7','752');
INSERT INTO 5w_tag_site_url VALUES('5163','梦芭萨','http://www.gouwuluo.com/www/?moonbasa','1371990115','1','6','752');
INSERT INTO 5w_tag_site_url VALUES('5162','卓越网','http://p.yiqifa.com/c?s=5e5ae424&w=220184&c=245&i=201&l=0&e=c&t=http://www.amazon.cn','1371990115','1','5','752');
INSERT INTO 5w_tag_site_url VALUES('5161','凡客诚品','http://www.gouwuluo.com/zt/?5w','1371990115','1','4','752');
INSERT INTO 5w_tag_site_url VALUES('5160','京东商城','http://p.yiqifa.com/c?s=2d61eddb&w=220184&c=4509&i=5862&l=0&e=c&t=http://www.360buy.com','1371990115','1','3','752');
INSERT INTO 5w_tag_site_url VALUES('5159','当当网','http://p.yiqifa.com/c?s=09594d42&w=220184&c=247&i=159&l=0&e=c&t=http://www.dangdang.com','1371990115','1','2','752');
INSERT INTO 5w_tag_site_url VALUES('5158','淘宝特卖','http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351859_9092254&eventid=101586','1371990115','1','1','752');
INSERT INTO 5w_tag_site_url VALUES('5157','雅虎','http://www.yahoo.cn/','1371990115','1','7','751');
INSERT INTO 5w_tag_site_url VALUES('5156','必应','http://cn.bing.com/','1371990115','1','6','751');
INSERT INTO 5w_tag_site_url VALUES('5155','有道','http://www.youdao.com/','1371990115','1','5','751');
INSERT INTO 5w_tag_site_url VALUES('5154','谷歌','http://www.google.com.hk/webhp?prog=aff&amp;client=pub-9491289701756083&amp;channel=3192690012','1371990115','1','4','751');
INSERT INTO 5w_tag_site_url VALUES('5153','搜狗','http://www.sogou.com/index.php?pid=sogou-site-8725fb777f25776f','1371990115','1','3','751');
INSERT INTO 5w_tag_site_url VALUES('5152','<font color=red>搜搜</font>','http://www.soso.com/?unc=b400056&cid=union.s.wh','1371990115','1','2','751');
INSERT INTO 5w_tag_site_url VALUES('5151','百度','http://www.baidu.com/index.php?tn=5wcom_pg&amp;ch=3','1371990115','1','1','751');
INSERT INTO 5w_tag_site_url VALUES('5184','中国政府网','http://www.gov.cn/','1371990115','1','6','755');
INSERT INTO 5w_tag_site_url VALUES('5185','央视网','http://www.cntv.cn/index.shtml','1371990115','1','7','755');
INSERT INTO 5w_tag_site_url VALUES('5186','163邮箱','http://mail.163.com/','1371990115','1','1','756');
INSERT INTO 5w_tag_site_url VALUES('5187','126邮箱','http://mail.126.com/','1371990115','1','2','756');
INSERT INTO 5w_tag_site_url VALUES('5188','139邮箱','http://mail.10086.cn/','1371990115','1','3','756');
INSERT INTO 5w_tag_site_url VALUES('5189','雅虎邮箱','http://mail.cn.yahoo.com/','1371990115','1','4','756');
INSERT INTO 5w_tag_site_url VALUES('5190','QQ邮箱','http://mail.qq.com/','1371990115','1','5','756');
INSERT INTO 5w_tag_site_url VALUES('5191','新浪邮箱','http://mail.sina.com.cn/','1371990115','1','6','756');
INSERT INTO 5w_tag_site_url VALUES('5192','Hotmail','http://www.hotmail.com/','1371990115','1','7','756');
INSERT INTO 5w_tag_site_url VALUES('5193','QQ空间','http://qzone.qq.com/','1371990115','1','1','757');
INSERT INTO 5w_tag_site_url VALUES('5194','天涯社区','http://www.tianya.cn/','1371990115','1','2','757');
INSERT INTO 5w_tag_site_url VALUES('5195','猫扑','http://www.mop.com/','1371990115','1','3','757');
INSERT INTO 5w_tag_site_url VALUES('5196','百度贴吧','http://tieba.baidu.com/','1371990115','1','4','757');
INSERT INTO 5w_tag_site_url VALUES('5197','蹦蹦家园','http://www.bengbeng.com/','1371990115','1','5','757');
INSERT INTO 5w_tag_site_url VALUES('5198','搜狐微博','http://37540.18bm.com/click?pid=76&amp;mid=37540&amp;pt=love','1371990115','1','6','757');
INSERT INTO 5w_tag_site_url VALUES('5199','新浪微博','http://37540.18bm.com/click?pid=38&amp;mid=37540&amp;channel=1&amp;pt=df','1371990115','1','7','757');
INSERT INTO 5w_tag_site_url VALUES('5346','新浪微博','http://37540.18bm.com/click?pid=38&amp;mid=37540&amp;channel=1&amp;pt=df','1372042501','3','7','787');
INSERT INTO 5w_tag_site_url VALUES('5345','搜狐微博','http://37540.18bm.com/click?pid=76&amp;mid=37540&amp;pt=love','1372042501','3','6','787');
INSERT INTO 5w_tag_site_url VALUES('5343','百度贴吧','http://tieba.baidu.com/','1372042501','3','4','787');
INSERT INTO 5w_tag_site_url VALUES('5344','蹦蹦家园','http://www.bengbeng.com/','1372042501','3','5','787');
INSERT INTO 5w_tag_site_url VALUES('5342','猫扑','http://www.mop.com/','1372042501','3','3','787');
INSERT INTO 5w_tag_site_url VALUES('5338','新浪邮箱','http://mail.sina.com.cn/','1372042501','3','6','785');
INSERT INTO 5w_tag_site_url VALUES('5339','Hotmail','http://www.hotmail.com/','1372042501','3','7','785');
INSERT INTO 5w_tag_site_url VALUES('5340','QQ空间','http://qzone.qq.com/','1372042501','3','1','787');
INSERT INTO 5w_tag_site_url VALUES('5341','天涯社区','http://www.tianya.cn/','1372042501','3','2','787');
INSERT INTO 5w_tag_site_url VALUES('5337','QQ邮箱','http://mail.qq.com/','1372042501','3','5','785');
INSERT INTO 5w_tag_site_url VALUES('5334','126邮箱','http://mail.126.com/','1372042501','3','2','785');
INSERT INTO 5w_tag_site_url VALUES('5336','雅虎邮箱','http://mail.cn.yahoo.com/','1372042501','3','4','785');
INSERT INTO 5w_tag_site_url VALUES('5335','139邮箱','http://mail.10086.cn/','1372042501','3','3','785');
INSERT INTO 5w_tag_site_url VALUES('5333','163邮箱','http://mail.163.com/','1372042501','3','1','785');
INSERT INTO 5w_tag_site_url VALUES('5332','央视网','http://www.cntv.cn/index.shtml','1372042501','3','7','784');
INSERT INTO 5w_tag_site_url VALUES('5331','中国政府网','http://www.gov.cn/','1372042501','3','6','784');
INSERT INTO 5w_tag_site_url VALUES('5330','凤凰新闻','http://news.ifeng.com/','1372042501','3','5','784');
INSERT INTO 5w_tag_site_url VALUES('5329','网易新闻','http://news.163.com/','1372042501','3','4','784');
INSERT INTO 5w_tag_site_url VALUES('5327','腾讯新闻','http://news.qq.com/','1372042501','3','2','784');
INSERT INTO 5w_tag_site_url VALUES('5328','搜狐新闻','http://news.sohu.com/','1372042501','3','3','784');
INSERT INTO 5w_tag_site_url VALUES('5326','新浪新闻','http://news.sina.com.cn/','1372042501','3','1','784');
INSERT INTO 5w_tag_site_url VALUES('5325','多玩网','http://www.duowan.com/','1372042501','3','7','783');
INSERT INTO 5w_tag_site_url VALUES('5322','腾讯游戏','http://games.qq.com/','1372042501','3','4','783');
INSERT INTO 5w_tag_site_url VALUES('5323','豆豆网','http://www.doudou.com/','1372042501','3','5','783');
INSERT INTO 5w_tag_site_url VALUES('5324','新浪游戏','http://game.sina.com.cn/','1372042501','3','6','783');
INSERT INTO 5w_tag_site_url VALUES('5321','休闲小游戏','http://game.doudou.com/','1372042501','3','3','783');
INSERT INTO 5w_tag_site_url VALUES('5319','17173','http://www.17173.com/','1372042501','3','1','783');
INSERT INTO 5w_tag_site_url VALUES('5320','魔兽世界','http://www.warcraftchina.com/','1372042501','3','2','783');
INSERT INTO 5w_tag_site_url VALUES('5317','酷6网','http://www.ku6.com/','1372042501','3','6','782');
INSERT INTO 5w_tag_site_url VALUES('5318','乐视网','http://www.letv.com/','1372042501','3','7','782');
INSERT INTO 5w_tag_site_url VALUES('5315','搜狐高清','http://tv.sohu.com/hdtv','1372042501','3','4','782');
INSERT INTO 5w_tag_site_url VALUES('5316','新浪视频','http://video.sina.com.cn/','1372042501','3','5','782');
INSERT INTO 5w_tag_site_url VALUES('5314','奇艺高清','http://www.qiyi.com/','1372042501','3','3','782');
INSERT INTO 5w_tag_site_url VALUES('5313','土豆网','http://www.tudou.com/','1372042501','3','2','782');
INSERT INTO 5w_tag_site_url VALUES('5312','优酷网','http://www.youku.com/','1372042501','3','1','782');
INSERT INTO 5w_tag_site_url VALUES('5310','梦芭萨','http://www.gouwuluo.com/www/?moonbasa','1372042501','3','6','781');
INSERT INTO 5w_tag_site_url VALUES('5311','淘宝网','http://www.taobao.com/','1372042501','3','7','781');
INSERT INTO 5w_tag_site_url VALUES('5309','卓越网','http://p.yiqifa.com/c?s=5e5ae424&w=220184&c=245&i=201&l=0&e=c&t=http://www.amazon.cn','1372042501','3','5','781');
INSERT INTO 5w_tag_site_url VALUES('5308','凡客诚品','http://www.gouwuluo.com/zt/?5w','1372042501','3','4','781');
INSERT INTO 5w_tag_site_url VALUES('5307','京东商城','http://p.yiqifa.com/c?s=2d61eddb&w=220184&c=4509&i=5862&l=0&e=c&t=http://www.360buy.com','1372042501','3','3','781');
INSERT INTO 5w_tag_site_url VALUES('5306','当当网','http://p.yiqifa.com/c?s=09594d42&w=220184&c=247&i=159&l=0&e=c&t=http://www.dangdang.com','1372042501','3','2','781');
INSERT INTO 5w_tag_site_url VALUES('5305','淘宝特卖','http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351859_9092254&eventid=101586','1372042501','3','1','781');
INSERT INTO 5w_tag_site_url VALUES('5304','雅虎','http://www.yahoo.cn/','1372042501','3','7','779');
INSERT INTO 5w_tag_site_url VALUES('5303','必应','http://cn.bing.com/','1372042501','3','6','779');
INSERT INTO 5w_tag_site_url VALUES('5302','有道','http://www.youdao.com/','1372042501','3','5','779');
INSERT INTO 5w_tag_site_url VALUES('5301','谷歌','http://www.google.com.hk/webhp?prog=aff&amp;client=pub-9491289701756083&amp;channel=3192690012','1372042501','3','4','779');
INSERT INTO 5w_tag_site_url VALUES('5300','搜狗','http://www.sogou.com/index.php?pid=sogou-site-8725fb777f25776f','1372042501','3','3','779');
INSERT INTO 5w_tag_site_url VALUES('5299','<font color=red>搜搜</font>','http://www.soso.com/?unc=b400056&cid=union.s.wh','1372042501','3','2','779');
INSERT INTO 5w_tag_site_url VALUES('5298','百度','http://www.baidu.com/index.php?tn=5wcom_pg&amp;ch=3','1372042501','3','1','779');

INSERT INTO 5w_templates VALUES('2','彩票','caipiao.tpl','2');
INSERT INTO 5w_templates VALUES('4','游戏','game.tpl','3');
INSERT INTO 5w_templates VALUES('5','小说','xiaoshuo.tpl','4');
INSERT INTO 5w_templates VALUES('6','视频','shipin.tpl','5');

INSERT INTO 5w_type_cool VALUES('1','1341560099','BTC 游戏','games.html','','0','87','','','');
INSERT INTO 5w_type_cool VALUES('2','1341560145','矿池汇总','mining-pools.html','','0','10','','','');
INSERT INTO 5w_type_cool VALUES('3','1341560207','中文资讯','chineseinfo.html','','0','20','','','');
INSERT INTO 5w_type_cool VALUES('4','1341560549','国内汇兑','ex-markets-cn.html','','0','30','','','');
INSERT INTO 5w_type_cool VALUES('5','1341560573','BTC 应用','apps.html','','0','40','','','');
INSERT INTO 5w_type_cool VALUES('6','1341560603','价格行情','ex-info.html','','0','35','','','');
INSERT INTO 5w_type_cool VALUES('7','1341560620','价格分析','price-tech-analysis.html','','0','60','','','');
INSERT INTO 5w_type_cool VALUES('8','1341560640','挖矿信息','mining-info.html','','0','13','','','');
INSERT INTO 5w_type_cool VALUES('9','1341560659','相关信息','info.html','','0','80','','','');
INSERT INTO 5w_type_cool VALUES('10','1341561189','其他虚拟币','alternative_cryptocurrencies.html','','0','90','','','');
INSERT INTO 5w_type_cool VALUES('11','1341564753','高级挖矿','mining-pro.html','','0','15','','','');
INSERT INTO 5w_type_cool VALUES('12','1341584086','挖矿教程','mining-howto.html','','0','14','','','');
INSERT INTO 5w_type_cool VALUES('13','1341587494','国际资讯','globalinfo.html','','0','25','','','');
INSERT INTO 5w_type_cool VALUES('14','1341622914','入门介绍','intro.html','','0','1','','','');
INSERT INTO 5w_type_cool VALUES('15','1341665970','信息图表','charts-figures.html','','0','85','','','');
INSERT INTO 5w_type_cool VALUES('17','1341714062','国际汇兑','ex-markets-global.html','','0','28','','','');
INSERT INTO 5w_type_cool VALUES('18','1341714164','金融投资','investing.html','','0','37','','','');
INSERT INTO 5w_type_cool VALUES('19','1341921043','论坛热帖','bitcointalk-hots.html','','0','135','','','');
INSERT INTO 5w_type_cool VALUES('20','1341967640','实物交易','trading.html','','0','45','','','');
INSERT INTO 5w_type_cool VALUES('21','1362220554','Avalon资源','avalon.html','','0','3','','','');
INSERT INTO 5w_type_cool VALUES('22','1362471102','中文论坛','chineseforums.html','','0','42','','','');
INSERT INTO 5w_type_cool VALUES('23','1369557574','BTC接受站','accept-bitcoins.html','','0','200','','','');
INSERT INTO 5w_type_cool VALUES('24','1375498105','BTC 股票','bitcoin_stock.html','','0','39','','','');

INSERT INTO 5w_type_foot VALUES('1','1341319480','技术进阶','tech.html','','0','10','','','');
INSERT INTO 5w_type_foot VALUES('2','1341677626','最新动态','headlines.html','','0','3','','','');
INSERT INTO 5w_type_foot VALUES('4','1342113128','值得一看','value.html','','0','11','','','');

INSERT INTO 5w_type_left VALUES('12','1342008449','比特币应用','apps.html','','0','15','','','','1');
INSERT INTO 5w_type_left VALUES('14','1342010690','比特币入门','intro.html','','0','1','','','','1');
INSERT INTO 5w_type_left VALUES('9','1341978724','比特币挖矿','mining.html','','0','25','','','','1');
INSERT INTO 5w_type_left VALUES('11','1341978809','比特币汇兑','ex.html','','0','10','','','','1');
INSERT INTO 5w_type_left VALUES('16','1342061602','其他虚拟币','alternative_cryptocurrencies.html','','0','30','','','','1');
INSERT INTO 5w_type_left VALUES('10','1341978750','比特币资讯','news.html','','0','5','','','','1');
INSERT INTO 5w_type_left VALUES('15','1342011470','相关数据查询','info.html','','0','20','','','','1');

INSERT INTO 5w_type_site VALUES('1','1341192899','中文资讯','chineseinfo.html','','39','10','比特币信息行情第一站，btc123收集的关于比特币中文资讯网站的分页面。','比特币中文资讯网站','比特币,bitcoin,新闻,信息,比特币网址汇总,bitcoin websites directory','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('16','1341979089','价格行情走势','ex-info.html','','14','1','比特币汇率信息，查看比特币与其他货币的兑换价格的实时信息，或者历史信息（k线图）。','比特币价格行情走势','比特币,bitcoin,汇率,兑换价格,比特币价格,比特币行情','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('18','1343201818','比特币实物交易','trading.html','','8','5','关于比特币实物交易应用的网站','比特币实物交易','比特币 bitcoin 实物交易','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('19','1343789910','其他虚拟币','alternative_cryptocurrencies.html','','0','75','关于其他网络货币的形式','山寨币 其他虚拟币','比特币 山寨币','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('15','1341979044','价格分析','price-tech-analysis.html','','14','5','通过技术指标预测比特币价格行情的网站收录页面','比特币行情分析网站','比特币,bitcoin,行情分析,价格预测','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('6','1341193618','挖矿信息','mining-info.html','','41','40','比特币挖矿相关网站，矿池，教程，显卡挖矿效率对比图。','比特币挖矿','比特币 bitcoin 挖矿 mining','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('7','1341194191','相关信息','info.html','','0','65','比特币市场容量，最新难度，全网运算量，最新交易信息，等。','比特币相关信息','比特币 bitcoin 相关 信息','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('8','1341194401','应用','apps.html','','0','71','比特币相关应用网站，比特币游戏，比特币投资基金，等专注于比特币应用的网站。','比特币相关应用','比特币 bitcoin 应用 比特币游戏 比特币基金','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('9','1341204350','信息图表','charts-figures.html','','7','1','比特币相关的各种信息图表，市场总量曲线，总市值曲线图，市场总交易费曲线图，交易量曲线，地址量等等。','比特币相关信息图表','比特币 信息 bitcoin 图表 图 曲线图','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('10','1341234660','矿池','mining-pools.html','','41','50','比特币挖矿矿池网站收录','比特币矿池','比特币 bitcoin 挖矿 矿池 mining pool','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('11','1341389140','技术原理','tech.html','','0','60','关于比特币(bitcoin)的技术型文章','比特币 技术 科技文章','比特币 bitcoin 技术 科技','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('12','1341635304','入门介绍','intro.html','','0','1','比特币新手入门介绍','比特币 入门介绍','比特币 bitcoin 入门 介绍','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('17','1343201813','比特币金融投资','investing.html','','8','1','关于比特币投资应用的网站','比特币投资','比特币 bitcoin 投资','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('14','1341978963','比特币汇兑','ex.html','','0','15','关于比特币汇兑的信息，如汇兑平台，汇率信息','比特币汇兑','比特币,btc,bitcoin,交易,汇兑','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('21','1343889087','论坛热帖','bitcointalk-hots.html','','0','5','比特币官方论坛热门帖子','比特币官方论坛热门帖子','比特币 论坛 热帖','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('22','1346298308','开源矿池','open-source-mining-pools.html','','10','1','开源的比特币矿池','开源矿池','开源 比特币 挖矿 矿池 open source bitcoin mining pool','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('23','1351393209','高级挖矿','mining-pro.html','','41','45','关于比特币的高级挖矿, 如FPGA, ASIC等','高级挖矿','比特币 挖矿 FPGA ASIC Bitcoin Mining','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('24','1362221164','Avalon资源','avalon.html','','0','3','关于 Avalon官方的相关资源','Avalon 相关资源','Avalon 相关 资源','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('25','1362471163','中文论坛','chineseforums.html','','0','19','比特币的中文论坛','比特币中文论坛','比特币 中文 论坛 bitcoin btc','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('26','1366424782','国内汇兑平台','ex-markets-cn.html','','14','10','比特币汇兑交易平台汇总，国内主要的比特币与人民币的兑换平台。','国内比特币交易平台汇总','bitcoin,比特币,交易平台,比特币中国','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('27','1367578464','挖矿教程','mining-howto.html','','41','85','比特币挖矿教程汇总页面','比特币挖矿教程','比特币 挖矿 ltc btc','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('28','1368265487','国际汇兑平台','ex-markets-global.html','','14','15','比特币汇兑交易平台汇总，国外主要的比特币与其他货币（如美元，欧元）的兑换平台。','比特币交易平台汇总 - 国际','bitcoin 比特币 交易 平台 美元 汇兑 MtGox btce','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('29','1369557862','接受BTC网站','accept-bitcoins.html','','0','90','此页面收集接受比特币作为付款方式的网站. 可以预见到此页面会越来越大.','接受比特币支付的网站汇总','接受比特币支付 接受比特币付款','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('30','1369569623','国内接受BTC网站','cn-accept-bitcoins.html','','29','1','国内接受比特币付款的网站列表','中国接受比特币付款的网站','接受比特币付款','0','0','0','','1');
INSERT INTO 5w_type_site VALUES('35','1369798504','值得一看','value.html','','0','95','关于比特币的有价值的网站, 值得一看的网站','比特币有价值的网站','比特币 bitcoin 有价值 值得一看','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('36','1369799006','最新动态','headlines.html','','0','100','关于比特币的最新动态的网页汇总','关于比特币的最新动态','比特币 bitcoin 最新动态','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('37','1370419232','国际资讯','globalinfo.html','','39','12','比特币信息行情第一站，btc123收集的关于比特币国际资讯网站的分页面。','比特币国际资讯','比特币,bitcoin,新闻,信息,比特币网址汇总,bitcoin websites directory','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('38','1370419635','BTC游戏','games.html','','0','55','比特币信息行情第一站，btc123收集的关于比特币游戏相关网站的分页面。','比特币游戏网址导航','比特币,bitcoin,比特币游戏,bitcoin games,bitcoin website directory,比特币导航','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('39','1370531589','比特币资讯','news.html','','0','901','比特币信息行情第一站，btc123收集的关于比特币新闻资讯网站的分页面。','比特币新闻资讯网站收集','比特币,btc,bitcoin,新闻,信息,比特币网址汇总,bitcoin websites directory','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('41','1370939004','挖矿相关','mining.html','','0','105','比特币信息行情第一站，btc123收集的关于比特币挖矿相关网站的分页面。','比特币挖矿_btc123_比特币导航 - 了解比特币挖矿从这里开始','比特币,btc,bitcoin,挖矿,矿池,比特币网址汇总,bitcoin websites directory','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('42','1375496935','比特币股票','bitcoin_stock.html','','0','110','btc123收集的比特币股票汇总。','比特币股票汇总','比特币,bitcoin,股票,stock','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('43','1377912089','feedback','','','0','998','','','','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('44','1377912193','k.btc123反馈','fb_k.btc123.html','','43','1','','','','1','0','0','','1');
INSERT INTO 5w_type_site VALUES('45','1378739348','ss.btc123反馈','fb_ss.btc123.html','','43','1','','','','1','0','0','','1');

