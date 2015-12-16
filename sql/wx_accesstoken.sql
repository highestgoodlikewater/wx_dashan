-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2015 年 11 月 16 日 19:35
-- 服务器版本: 5.5.27
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_ifreehand`
--

-- --------------------------------------------------------

--
-- 表的结构 `wx_accesstoken`
--

CREATE TABLE IF NOT EXISTS `wx_accesstoken` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `access_token` varchar(255) NOT NULL COMMENT 'access_token',
  `utime` varchar(100) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wx_accesstoken`
--

INSERT INTO `wx_accesstoken` (`id`, `access_token`, `utime`) VALUES
(1, 'RbvVtHi1ZmaWcPg_gYNszvtFo1IjG3UD2PMcsSBGcQO6DQ_8WrGPJ1zmowKpmqzjDoW70I4Imrntgussrw_9LXxorvRimke-ng3fdVieYjIYXLaACATSG', '1447672245');
