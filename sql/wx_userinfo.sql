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
-- 表的结构 `wx_userinfo`
--

CREATE TABLE IF NOT EXISTS `wx_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `subscribe` int(3) NOT NULL COMMENT '是否订阅0/1',
  `openid` varchar(50) NOT NULL COMMENT '用户唯一标识',
  `nickname` varchar(255) NOT NULL COMMENT '昵称',
  `sex` int(3) NOT NULL COMMENT '性别0/1/2',
  `language` varchar(10) NOT NULL COMMENT '用户的语言',
  `city` varchar(50) NOT NULL COMMENT '用户所在城市',
  `province` varchar(50) NOT NULL COMMENT '用户所在省份',
  `country` varchar(50) NOT NULL COMMENT '用户所在国家',
  `headimgurl` varchar(255) NOT NULL COMMENT '用户头像',
  `subscribe_time` int(50) NOT NULL COMMENT '用户关注时间',
  `remark` varchar(50) NOT NULL COMMENT '运营者对粉丝的备注',
  `groupid` varchar(255) NOT NULL COMMENT '用户所在的分组ID',
  `to_user` varchar(50) NOT NULL COMMENT '目前的搭讪对象',
  `last_time` int(50) NOT NULL COMMENT '用户与平台最后的交互时间',
  `flag` int(3) NOT NULL COMMENT '0普通用户1客服人员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `wx_userinfo`
--

INSERT INTO `wx_userinfo` (`id`, `subscribe`, `openid`, `nickname`, `sex`, `language`, `city`, `province`, `country`, `headimgurl`, `subscribe_time`, `remark`, `groupid`, `to_user`, `last_time`, `flag`) VALUES
(3, 1, 'oGer5jkgIXOZsKdC9dZMiY4BZnjo', 'Jimey', 1, 'zh_CN', '', '首尔', '韩国', 'http://wx.qlogo.cn/mmopen/xrDGLevdnomFa0qgsPhEsgPt9y8iaM4qEczFpWdfOrEgAeDibZdYibjic0TwWTqu6Iwia6GGaicJwrTrnZt0GK02vWqA/0', 1444295120, '', '0', '', 0, 0),
(4, 1, 'oGer5jsyK4_O7LDaNiAhXPoNb-zk', '蛐蛐雷达——王晓军', 1, 'zh_CN', '焦作', '河南', '中国', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKViaCLpEfPic87LaicVuWFUqDsEthZEopo37yxxYnYMwqrFFiaFErg1ethNdS1LjFr3YwUQbZjWsmdhA/0', 1433577568, '', '0', '', 0, 0),
(5, 1, 'oGer5jvrCQtZrBxvG382jLa2epy0', '杰', 1, 'zh_CN', '温州', '浙江', '中国', 'http://wx.qlogo.cn/mmopen/xrDGLevdnokKOIGlmib3xhAavzc5RtY5cbaHUDzaR7Geibw7lNxiacYvFdQMUBVX9Pebk9M2jPLgP1KL47ROianWicg/0', 1437355616, '', '0', '', 0, 0),
(6, 1, 'oGer5jm_MvGFkHYsfZfxJZlnknJc', '冰心冷水', 0, 'zh_CN', '', '', '', 'http://wx.qlogo.cn/mmopen/PRvlwWxDlNz2Gy3fYicY477JsgGAY2KTgtAXWtyV7Rq1jPicAoosJj7icLpGuMUCO4h0Rv2UCgVvcWLZUUiaOgSIbjhhbJkKYBMF/0', 1443450409, '', '0', 'oGer5jnhIvxmzFKZEtGnrv_yzHBc', 1447596353, 1),
(7, 1, 'oGer5jua3mAeMh8Hb138lQFx9O-4', '嘉慕', 1, 'zh_CN', '商丘', '河南', '中国', 'http://wx.qlogo.cn/mmopen/xrDGLevdnonWPaeHo2qNicJic6RDBdnAvKibNKAH96A2BZ1TicVic0UUWHmCNtnzsfSgAa7qHeJUT0BtZX5bO00c9Xsegh7hsxeXL/0', 1433575749, '', '0', '', 0, 0),
(8, 1, 'oGer5jmzgDHqt2JJ8bA4WSkjH5zY', '史前利', 1, 'zh_CN', '商丘', '河南', '中国', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLAkjWdcnq8ROONFfv4h23IxBMB1ba6UUT189mxmWrBTpibwiczHS5IsxqlXO0wP26reLu4KoaWHCic33XGxMRjOZJwfHq7pwf20R8/0', 1433573765, '', '0', '', 0, 0),
(9, 1, 'oGer5jnxnMo8jRrRQFRjz7T_Nhtc', '岁月_Timing', 1, 'zh_TW', '焦作', '河南', '中国', 'http://wx.qlogo.cn/mmopen/xrDGLevdnom3QmpWwicQiafibj6kZ1YmAmHRiaPXNavROGicyUqgH5JdZcMX2rmzC3kbCABRleZ2DKBuVTn6MdfSumpYwSf7O0lLw/0', 1428041722, '', '0', '', 0, 0),
(10, 1, 'oGer5jnBA1B1u2efuYoiiwVlv0lA', 'liuying', 1, 'zh_CN', '郑州', '河南', '中国', '', 1427936584, '', '0', '', 0, 0),
(11, 1, 'oGer5juHYdmvtEca24uVkJixkFpo', '横刀立马', 1, 'zh_CN', '驻马店', '河南', '中国', 'http://wx.qlogo.cn/mmopen/PRvlwWxDlNz9BUibhuFfqaYwOMVXuufVfU5ny6UibgEGeBlbAtHPdjZJcPe1iazU0KRUMiaUT8VbLJ4VubDhFu6X88AcPkoRL7E7/0', 1445304112, '', '0', '', 0, 0),
(30, 1, 'oGer5jnhIvxmzFKZEtGnrv_yzHBc', '贺全喜', 1, 'zh_CN', '商丘', '河南', '中国', 'http://wx.qlogo.cn/mmopen/rFK71LeAloJE2t0ia3UzlWObr3gbLk33WWbGia6QkPXR54KjO7YVyoZSwWANrIzsZsv6qoWs0GMoD00t5aORQwAWZ5GBy5IYQD/0', 1444096619, '', '0', 'oGer5jo4qJa06DPR49diO5Znpc_U', 1447663957, 1),
(31, 1, 'oGer5jo4qJa06DPR49diO5Znpc_U', 'jam', 1, 'zh_CN', '郑州', '河南', '中国', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM5ia738YVun1iciaaqvMFuSphJWXqGLonj8u3Lxk112B18hxRib9soic22OtxIBJ1Q4eicQAnINJicT3FfaQ/0', 1447627553, '', '0', 'oGer5jo4qJa06DPR49diO5Znpc_U', 1447672232, 0),
(32, 1, 'oGer5jnbY0bCFs93MJa4cgvwrd0o', '权恩民', 1, 'zh_CN', '菏泽', '山东', '中国', 'http://wx.qlogo.cn/mmopen/xrDGLevdnonWPaeHo2qNicCYZbShticyUtFcLCCicg7NxKcd1ia1B3SGAaicw8ib5OJYUxuLD8nAuAP2LCaletghicTQE6rOWHib7wJu/0', 1447672253, '', '0', '', 1447672272, 0);
