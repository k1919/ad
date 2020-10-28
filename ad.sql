-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-10-28 09:24:33
-- 服务器版本： 5.7.28
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `epii`
--

-- --------------------------------------------------------

--
-- 表的结构 `epii_adgroup`
--

CREATE TABLE `epii_adgroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '名称',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告分组';

--
-- 转存表中的数据 `epii_adgroup`
--

INSERT INTO `epii_adgroup` (`id`, `name`, `addtime`, `updatetime`) VALUES
(1, '首页轮播图', 1603778626, 1603789546),
(2, '推荐', 1603778634, 1603778640);

-- --------------------------------------------------------

--
-- 表的结构 `epii_adlist`
--

CREATE TABLE `epii_adlist` (
  `id` int(11) NOT NULL,
  `is_tui` tinyint(4) NOT NULL COMMENT '是否推荐 1推荐  2不推荐',
  `status` tinyint(4) NOT NULL COMMENT '当前状态  1 启用 2是关闭',
  `img_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址(存储)',
  `img_url_show` varchar(255) NOT NULL COMMENT '图片展示地址',
  `jump_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转链接',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序值  越小越靠前',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加链接',
  `updatetime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属分组id',
  `title` varchar(255) NOT NULL COMMENT '描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `epii_adlist`
--

INSERT INTO `epii_adlist` (`id`, `is_tui`, `status`, `img_url`, `img_url_show`, `jump_url`, `sort`, `addtime`, `updatetime`, `group_id`, `title`) VALUES
(1, 2, 2, '202010\\27\\1603786967992.png', 'upload/202010/27/1603786967992.png', 'www.baidu.com', 3, 1603786262, 1603848132, 2, '通过商品详情页的数据埋点，我们可以更加了解用户，从而为他们提供更好的服务。'),
(2, 1, 1, '202010\\27\\1603789287401.jpg', 'upload/202010/27/1603789287401.jpg', '', 1, 1603789292, 1603789491, 1, ''),
(3, 1, 1, '202010\\27\\1603789313458.png', 'upload/202010/27/1603789313458.png', '', 0, 1603789314, 1603848087, 1, '广告位标题描述广告位标题描述广告位标题描述广告位标题描述');

--
-- 转储表的索引
--

--
-- 表的索引 `epii_adgroup`
--
ALTER TABLE `epii_adgroup`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `epii_adlist`
--
ALTER TABLE `epii_adlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `epii_adgroup`
--
ALTER TABLE `epii_adgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `epii_adlist`
--
ALTER TABLE `epii_adlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
