<?php
$sql = 'SELECT * FROM '.DBPREFIX.'site_setting';
$sets = $objC->GetRow($sql);

define('CACHE_LIFETIME',                $sets['cacheLifeTime']);        # 静态缓存有效时间
define('SITE_LOGO',                     $sets['logo']);                 # logo图片路径
define('LOGO_TITLE',                    $sets['logoTitle']);            # logo文字描述
define('SITE_DOMAIN',                   $sets['siteDomain']);           # 站点域名
define('SITE_NAME',                     $sets['siteName']);             # 站点名称
define('FAVORITE_NAME',                 $sets['favoriteName']);         # 收藏夹显示名称
define('ADMIN_EMAIL',                   $sets['adminEmail']);           # 站长广告邮箱
define('COUNT_CODE',                    stripslashes($sets['countCode']));            # 页面底部统计代码
define('PAGE_INDEX_TITLE',              $sets['indexTitle']);           # 首页标题
define('PAGE_INDEX_KEYWORDS',           $sets['indexKeywords']);        # 首页关键字词
define('PAGE_INDEX_DESCRIPTION',        $sets['indexDescription']);     # 首页描述
define('PAGE_COMMON_TITLE',             $sets['commonTitle']);          # 其他页面通用标题
define('PAGE_COMMON_KEYWORDS',          $sets['commonKeywords']);       # 其他页面通用关键字词
define('PAGE_COMMON_DESCRIPTION',       $sets['commonDescription']);    # 其他页面通用描述
define('PAGE_APPLY_TITLE',              $sets['commonTitle']);          # 申请页面标题
define('PAGE_APPLY_KEYWORDS',           $sets['commonKeywords']);       # 申请页面关键字词
define('PAGE_APPLY_DESCRIPTION',        $sets['commonDescription']);    # 申请页面描述
define('WEB_ICP',                       $sets['icp']);                  # icp备案
define('WEB_ICPURL',                    $sets['icpurl']);               # icp备案url
define('HTML_PATH',                     $sets['htmlpath']);
define('THEME_PATH',                    $sets['theme']);
define('VERSION_5W',                    $sets['version']);
define('MAILSERVER',                    $sets['mail_server']);
define('MAILPORT',                      $sets['mail_port']);
define('MAILUSERNAME',                  $sets['mail_user']);
define('MAILPASSWORD',                  $sets['mail_password']);
define('MAILNICK',                      $sets['mail_nick']);
define('CACHE_USE',                     $sets['usecache']);
define('CACHE_TIME',                    $sets['sptime']*86400);