/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : 192.168.0.88:3306
Source Database       : laravel54

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-09-04 18:55:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_premissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_premissions`;
CREATE TABLE `admin_premissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_premissions
-- ----------------------------
INSERT INTO `admin_premissions` VALUES ('1', 'post', '文章管理', '2017-08-29 16:27:00', '2017-08-30 17:00:39');
INSERT INTO `admin_premissions` VALUES ('2', 'topic', '专题管理', '2017-08-29 16:51:24', '2017-08-30 17:00:56');
INSERT INTO `admin_premissions` VALUES ('3', 'notice', '通知管理', '2017-08-29 16:51:44', '2017-08-30 17:01:36');
INSERT INTO `admin_premissions` VALUES ('5', 'postUser', '管理用户（包括作者和普通的阅读者）', '2017-09-01 09:46:46', '2017-09-01 10:25:39');
INSERT INTO `admin_premissions` VALUES ('4', 'system', '系统管理', '2017-08-30 14:42:07', '2017-08-30 17:02:10');
INSERT INTO `admin_premissions` VALUES ('6', 'zan', '点赞权限', '2017-09-01 10:37:10', '2017-09-01 10:37:10');
INSERT INTO `admin_premissions` VALUES ('7', 'comment', '评论的权限', '2017-09-01 10:38:01', '2017-09-01 10:38:01');

-- ----------------------------
-- Table structure for admin_premission_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_premission_role`;
CREATE TABLE `admin_premission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `premission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_premission_role
-- ----------------------------
INSERT INTO `admin_premission_role` VALUES ('1', '1', '1', null, null);
INSERT INTO `admin_premission_role` VALUES ('2', '1', '2', null, null);
INSERT INTO `admin_premission_role` VALUES ('3', '1', '3', null, null);
INSERT INTO `admin_premission_role` VALUES ('4', '1', '4', null, null);
INSERT INTO `admin_premission_role` VALUES ('5', '2', '1', null, null);
INSERT INTO `admin_premission_role` VALUES ('6', '1', '5', null, null);
INSERT INTO `admin_premission_role` VALUES ('7', '3', '6', null, null);
INSERT INTO `admin_premission_role` VALUES ('8', '3', '7', null, null);
INSERT INTO `admin_premission_role` VALUES ('9', '4', '1', null, null);
INSERT INTO `admin_premission_role` VALUES ('10', '4', '6', null, null);
INSERT INTO `admin_premission_role` VALUES ('11', '4', '7', null, null);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', '系统管理员', '拥有所有权限', '2017-08-30 11:23:59', '2017-08-30 14:39:28');
INSERT INTO `admin_roles` VALUES ('2', '文章管理员', '文章管理员', '2017-08-30 11:24:30', '2017-08-30 14:44:00');
INSERT INTO `admin_roles` VALUES ('3', '普通读者', '只能来评论，点赞', '2017-09-01 10:35:35', '2017-09-01 10:35:35');
INSERT INTO `admin_roles` VALUES ('4', '签约作者', '能发文章，评论，点赞', '2017-09-01 10:36:02', '2017-09-01 10:36:02');

-- ----------------------------
-- Table structure for admin_role_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_user`;
CREATE TABLE `admin_role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_user
-- ----------------------------
INSERT INTO `admin_role_user` VALUES ('1', '1', '1', null, null);
INSERT INTO `admin_role_user` VALUES ('3', '2', '2', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$2tFPFcNzb6bygQMMBdB.oe5FFKKXYQ39eu4ctuWMdMRSngVTDYQLK', null, null, '8VVCcdHIyBIykdkASzTA10hIHhAIWKb83DfUJlhMjjKwVlTgGR9WYEezJbYK');
INSERT INTO `admin_users` VALUES ('2', 'post_manager', '$2y$10$U0yKp5wPqI/IgHhVR2LMteMfLyXifURPxWb6OFVovdkK6QDh/YuWO', '2017-08-28 17:05:52', '2017-08-30 18:03:13', 'q1ef0IjovO0oxAEoV7FJUcBkoQ866u3hlRxrnb1es45tUhP9uLlQnlNd1Oh1');
INSERT INTO `admin_users` VALUES ('3', 'test3', '$2y$10$lDEvhr2joT2/61HYVDqkR.2ioJRo8NiFw/Hx2iYeNLfvdWuY0H9My', '2017-08-28 17:12:48', '2017-08-30 14:44:41', null);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '36', '这是一次文章评论测试！！', '1', '2017-08-25 13:40:12', '2017-08-25 13:40:12');
INSERT INTO `comments` VALUES ('2', '36', '这是二次文章评论测试！！', '1', '2017-08-25 13:43:37', '2017-08-25 13:43:37');
INSERT INTO `comments` VALUES ('3', '36', '这是三次文章评论测试！！', '1', '2017-08-25 14:50:57', '2017-08-25 14:50:57');
INSERT INTO `comments` VALUES ('4', '38', '测试文章2的评论测试。！！', '1', '2017-08-25 16:33:25', '2017-08-25 16:33:25');
INSERT INTO `comments` VALUES ('6', '42', '中间件组可以像单个中间件一', '1', '2017-08-30 18:29:16', '2017-08-30 18:29:16');

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fan_id` int(11) NOT NULL DEFAULT '0',
  `start_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO `fans` VALUES ('1', '2', '1', '2017-08-28 09:58:28', '2017-08-28 09:58:28');
INSERT INTO `fans` VALUES ('2', '1', '2', '2017-08-28 09:59:29', '2017-08-28 09:59:29');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for mails
-- ----------------------------
DROP TABLE IF EXISTS `mails`;
CREATE TABLE `mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of mails
-- ----------------------------
INSERT INTO `mails` VALUES ('3', '邮件1邮件1邮件1水电费', '邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1邮件1', '2017-09-04 18:28:44', '2017-09-04 18:29:38');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_08_21_075253_create_posts_table', '2');
INSERT INTO `migrations` VALUES ('5', '2017_08_25_104038_ceate_comments_table', '3');
INSERT INTO `migrations` VALUES ('6', '2017_08_25_150049_create_zans_table', '4');
INSERT INTO `migrations` VALUES ('7', '2017_08_25_164359_create_fans_table', '5');
INSERT INTO `migrations` VALUES ('8', '2017_08_27_212151_create_topics_table', '6');
INSERT INTO `migrations` VALUES ('9', '2017_08_27_212223_create_post_topics_table', '6');
INSERT INTO `migrations` VALUES ('10', '2017_08_28_152728_create_admin_users_table', '7');
INSERT INTO `migrations` VALUES ('11', '2017_08_28_172115_alert_posts_table', '8');
INSERT INTO `migrations` VALUES ('12', '2017_08_29_100106_create_premission_and_roles', '9');
INSERT INTO `migrations` VALUES ('13', '2017_08_29_162428_alert_admin_premissions', '10');
INSERT INTO `migrations` VALUES ('14', '2017_08_29_220648_alert_admin_roles', '11');
INSERT INTO `migrations` VALUES ('19', '2017_08_31_163557_create_notices_table', '12');
INSERT INTO `migrations` VALUES ('20', '2017_08_31_180658_create_jobs_table', '13');
INSERT INTO `migrations` VALUES ('21', '2017_09_01_105502_create_user_roles_table', '14');
INSERT INTO `migrations` VALUES ('23', '2017_09_04_172707_create_mails_table', '15');

-- ----------------------------
-- Table structure for notices
-- ----------------------------
DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notices
-- ----------------------------
INSERT INTO `notices` VALUES ('3', '来自cm1的通知', '来自cm1的通知来自cm1的通知来自cm1的通知', '2017-08-31 18:37:25', '2017-08-31 18:42:57');
INSERT INTO `notices` VALUES ('4', '来自cm2的通知', '来自cm2的通知来自cm2的通知', '2017-08-31 18:39:53', '2017-08-31 18:42:36');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('41', 'Laravel 提供了简单的方法使你的应用免受', '<p>任何情况下在你的应用程序中定义 HTML 表单时都应该包含 CSRF 令牌隐藏域，这样 CSRF 保护中间件才可以验证请求。辅助函数&nbsp;csrf_field&nbsp;可以用来生成令牌字段：</p><pre><code>&lt;form method=\"POST\" action=\"/profile\"&gt;\r\n    {{ csrf_field() }}\r\n    ...\r\n&lt;/form&gt;</code></pre><p>包含在&nbsp;web&nbsp;中间件组里的&nbsp;VerifyCsrfToken&nbsp;<a href=\"http://d.laravel-china.org/docs/5.4/middleware\">中间件</a>会自动验证请求里的令牌&nbsp;token&nbsp;与 Session 中存储的令牌&nbsp;token&nbsp;是否匹配。</p><h2><a href=\"http://d.laravel-china.org/docs/5.4/csrf#csrd-token-vue\">CRSF 令牌和 Vue</a><a href=\"http://d.laravel-china.org/docs/5.4/csrf#CRSF-令牌和-Vue\">#</a></h2><p>如果你使用&nbsp;<a href=\"https://vuejs.org/\">Vue.js</a>&nbsp;框架，没有&nbsp;make:auth&nbsp;命令提供的身份验证过渡，那么你需要在你应用的主要布局中手动定义一个&nbsp;Laravel&nbsp;Javascript对象。这个对象会指定 Vue 在做请求时需要的 CSRF 令牌：</p><p></p><pre><code><span><span><span><span>&lt;</span>script</span><span>&gt;</span></span></span>\r\n    window<span>.</span>Laravel <span>=</span> <span>{</span><span>!</span><span>!</span> <span>json_encode<span>(</span></span><span>[</span>\r\n        <span>\'csrfToken\'</span> <span>=</span><span>&gt;</span> <span>csrf_token<span>(</span></span><span>)</span><span>,</span>\r\n    <span>]</span><span>)</span> <span>!</span><span>!</span><span>}</span><span>;</span>\r\n<span><span><span><span>&lt;/</span>script</span><span>&gt;</span></span></span></code></pre><p><br></p>', '2', '2017-08-28 09:50:54', '2017-08-28 18:45:49', '1');
INSERT INTO `posts` VALUES ('36', '12345678901', '<p>123456789</p>', '1', '2017-08-24 16:35:49', '2017-08-28 18:43:15', '0');
INSERT INTO `posts` VALUES ('42', '中间件组', '<p>有时您可能想要将多个中间件分组到同一个键值下，从而使它们更方便地分配给路由，你可以使用 HTTP kernel 的&nbsp;$middlewareGroups&nbsp;属性来实现。</p><p>Laravel 带有开箱即用的&nbsp;web&nbsp;和&nbsp;api&nbsp;中间件，包含了可能应用到 Web UI 和 API 路由的通用中间件：</p><pre><code>/**\r\n * 应用的路由中间件组\r\n *\r\n * @var array\r\n */\r\nprotected $middlewareGroups = [\r\n    \'web\' =&gt; [\r\n        \\App\\Http\\Middleware\\EncryptCookies::class,\r\n        \\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse::class,\r\n        \\Illuminate\\Session\\Middleware\\StartSession::class,\r\n        \\Illuminate\\View\\Middleware\\ShareErrorsFromSession::class,\r\n        \\App\\Http\\Middleware\\VerifyCsrfToken::class,\r\n        \\Illuminate\\Routing\\Middleware\\SubstituteBindings::class,\r\n    ],\r\n\r\n    \'api\' =&gt; [\r\n        \'throttle:60,1\',\r\n        \'auth:api\',\r\n    ],\r\n];</code></pre><p></p><p>中间件组可以像单个中间件一样使用相同的语法指定给路由和控制器。重申，路由组仅仅是为了使一次将多个中间件指</p><p><br></p>', '1', '2017-08-30 18:28:12', '2017-08-30 18:28:12', '0');
INSERT INTO `posts` VALUES ('43', '123', '<p>123123</p>', '2', '2017-09-01 14:38:17', '2017-09-01 14:38:17', '0');

-- ----------------------------
-- Table structure for post_topics
-- ----------------------------
DROP TABLE IF EXISTS `post_topics`;
CREATE TABLE `post_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of post_topics
-- ----------------------------
INSERT INTO `post_topics` VALUES ('1', '36', '1', '2017-08-28 09:59:54', '2017-08-28 09:59:54');
INSERT INTO `post_topics` VALUES ('2', '36', '2', '2017-08-28 10:00:05', '2017-08-28 10:00:05');

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('1', '旅游', null, null);
INSERT INTO `topics` VALUES ('2', '生活', null, null);
INSERT INTO `topics` VALUES ('3', '程序员1', '2017-08-31 14:45:28', '2017-08-31 17:04:44');
INSERT INTO `topics` VALUES ('8', '123', '2017-08-31 17:11:27', '2017-08-31 17:11:27');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '作者', '294225707@qq.com', '$2y$10$2tFPFcNzb6bygQMMBdB.oe5FFKKXYQ39eu4ctuWMdMRSngVTDYQLK', '9b9kDrNtiS4UG8sWadzfzoooda02rN56pAk9xGlJ4qa6ZoxcmS9eP1txLxAl', '2017-08-24 15:04:23', '2017-09-01 14:37:16');
INSERT INTO `users` VALUES ('2', '读者', '294225708@qq.com', '$2y$10$JNWx0hsX6PadpCNnkIpfke/IXBJtg5yWfTsqJgU4cUsKd1h/EWS6m', 'AKKL1IAq0DthpIl4o7nH2ELbp2O6svQGGWx8iznZd4kcwyZj3dU4h0GgQVLl', '2017-08-24 16:08:55', '2017-09-01 12:07:30');
INSERT INTO `users` VALUES ('3', '添加读者', '294225709@qq.com', '123456', null, '2017-09-01 14:12:21', '2017-09-01 14:12:39');

-- ----------------------------
-- Table structure for user_notice
-- ----------------------------
DROP TABLE IF EXISTS `user_notice`;
CREATE TABLE `user_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_notice
-- ----------------------------
INSERT INTO `user_notice` VALUES ('1', '1', '4');
INSERT INTO `user_notice` VALUES ('3', '3', '4');
INSERT INTO `user_notice` VALUES ('4', '3', '3');

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('3', '2', '3', null, null);
INSERT INTO `user_roles` VALUES ('4', '1', '4', null, null);

-- ----------------------------
-- Table structure for zans
-- ----------------------------
DROP TABLE IF EXISTS `zans`;
CREATE TABLE `zans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of zans
-- ----------------------------
INSERT INTO `zans` VALUES ('3', '36', '1', '2017-08-25 15:48:25', '2017-08-25 15:48:25');
INSERT INTO `zans` VALUES ('4', '38', '1', '2017-08-25 16:32:40', '2017-08-25 16:32:40');
INSERT INTO `zans` VALUES ('7', '42', '1', '2017-08-30 18:28:20', '2017-08-30 18:28:20');
