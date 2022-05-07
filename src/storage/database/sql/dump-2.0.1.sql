-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sole_x
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `user_id`, `category_id`, `hidden_at`, `review_at`, `content`, `views`, `status`) VALUES (1,'2021-03-01 18:20:15',NULL,NULL,'【Laravel】 走进 Laravel 源码，带你实现网站主题功能',10,1,NULL,NULL,'如何在 Laravel 的基础上实现网站换肤、主题切换的功能？\r\n\r\n## 前言\r\n\r\n今天带你走进 `Laravel` 源码，来轻松实现这一功能。 如果你使用过 WordPress、Hexo 等等这些优秀的软件，你就会被他主题市场那些个美轮美奂的主题所吸引，那么，有没有想过如何在 Laravel 的基础上来实现这个功能呢？\r\n\r\n## 从这里开始\r\n\r\n首先，Laravel 为我们提供了一个叫扩展包开发的功能，可以实现扩展 Laravel\r\n的模板，但是这个扩展是有限制的，就是你必须注册一个命名空间，然后在你调取主题的地方还得必须加上这个命名空间前缀调用，显然，我们不可能使用这个方案去动态的修改之前控制器中调配用模板的代码，Laravel 又提供了另一个方案，*First\r\n系列方法，使用这个方法，我们可以包装一下\r\n\r\n```php\r\nif($action === \'start\') {\r\n    var_dump(2333);\r\n}\r\n```',0,1),(2,'2021-03-04 18:20:18',NULL,NULL,'全新 Xdebug 3.0 配置 PHP STORM 调试教程',10,1,NULL,NULL,'随着 PHP 8.0 发布的前后，Xdebug 也发布了全新的 3 版本。与以往的 Xdebug 繁琐的配置不同，全新的 Xdebug 3。本文主要针对 PHP STORM 如何安装使用，其他开发工具可能不太适用，值得注意的是您需要安装 PHP STORM 2020.3 以上的版本才能使用 Xdebug 3。',0,1);


--
-- Dumping data for table `user_social`
--

INSERT INTO `user_social` (`id`, `created_at`, `updated_at`, `user_id`, `name`, `url`, `is_show`) VALUES (1,NULL,NULL,1,'github','sole/sole',1);

--
-- Dumping data for table `post_tag_relation`
--

INSERT INTO `post_tag_relation` (`id`, `created_at`, `updated_at`, `post_id`, `post_tag_id`) VALUES (1,NULL,NULL,1,1),(2,NULL,NULL,1,2),(3,NULL,NULL,2,2),(4,NULL,NULL,2,3),(5,NULL,NULL,2,4),(6,NULL,NULL,2,5);


--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `created_at`, `updated_at`, `user_id`, `password`) VALUES (1,NULL,NULL,10,'$2y$10$gCDtKnvCniFvO8BehUPMzuMmWAotYHCAOwK2bGkpp7uzZK2uEDYw6');

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `created_at`, `updated_at`, `deleted_at`, `path`, `filename`, `size`, `storage_driver`, `mime_type`, `attachable_type`, `attachable_group`, `attachable_id`, `hash`, `user_id`, `unsafe_cause`, `is_safe`, `is_public`, `is_enable`) VALUES (1,NULL,NULL,NULL,'http://q1.qlogo.cn/g?b=qq&nk=721796631&s=640','111','0','local','image/png','SoleX\\Blog\\App\\Models\\User','avatar',10,'131312',10,NULL,0,1,1),(2,NULL,NULL,NULL,'https://images.unsplash.com/photo-1502977249166-824b3a8a4d6d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fGZsb3dlcnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60','1','0','local','image/png','SoleX\\Blog\\App\\Models\\Post','cover',1,'12321321',10,NULL,0,1,1);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`, `nickname`, `phone`, `level`) VALUES (10,'唯一丶','me@2vy.cc',NULL,'$2y$10$NlDHcI8Zw.VDyRLva322ReQfPqo6IRp1WEYpfjoy45yAk1Q49/3xG',NULL,NULL,'9S3turPZRa4LkQrRSdFQzyy9x5RlWfHsOPTAYSVpLGrsZ3XaXMBwq6RVOb5Z',NULL,NULL,'2021-02-23 22:45:32','2021-02-23 22:45:32',NULL,'me@2v','',0);

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `created_at`, `updated_at`, `ua`, `location`, `company`, `job_title`, `intro`) VALUES (1,1,NULL,NULL,'Chrome','成都','哈哈哈','搬砖工',NULL);

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `title`, `intro`, `keywords`, `description`, `sort`, `url`, `parent_id`, `nested_left`, `nested_right`, `layer`, `is_enable`, `is_show`) VALUES (1,NULL,NULL,NULL,'Laravel','Laravel','Laravel','Laravel','Laravel',0.00,'/category/laravel',0,0,1,0,1,1);

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `created_at`, `updated_at`, `name`, `value`, `comment`, `is_available`) VALUES (1,NULL,NULL,'allow_register','1',NULL,1),(2,NULL,NULL,'active-theme','sole/light',NULL,1);

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `created_at`, `updated_at`, `name`, `color`, `is_enable`) VALUES (1,NULL,NULL,'Laravel','bg-red-400',1),(2,NULL,NULL,'PHP','bg-blue-400',1),(3,NULL,NULL,'Xdebug','bg-green-400',1),(4,NULL,NULL,'调试','bg-yellow-400',1),(5,NULL,NULL,'PHP STORM','bg-gray-400',1);
