-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-14 18:38:04
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bugs`
--

-- --------------------------------------------------------

--
-- 表的结构 `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `data` longtext NOT NULL,
  `create_time` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `app` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `app`
--

INSERT INTO `app` (`id`, `title`, `data`, `create_time`, `admin`, `app`) VALUES
  (1, '筑讯中国', '{"users":{"1":"admin","2":"123"},"title":"\\u7b51\\u8baf\\u4e2d\\u56fd","version":"v1","module":"sys\\r\\nuser\\r\\ntemp"}', 0, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `version` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `poster` int(11) NOT NULL,
  `doer` int(11) NOT NULL,
  `post_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `app_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bug`
--

INSERT INTO `bug` (`id`, `title`, `version`, `module`, `content`, `priority`, `poster`, `doer`, `post_time`, `update_time`, `state`, `app_id`) VALUES
  (1, 'sdfsdafdsfdsf', 'v1', 'sys\r\n', 'sdfsdfdsfdsfdsfdsfdsf\r\nsdfdsfdsfds', 1, 2, 1, 1479119808, 1479119808, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bug_trace`
--

CREATE TABLE `bug_trace` (
  `id` int(11) NOT NULL,
  `bugid` int(11) NOT NULL,
  `doer` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `post_time` int(11) NOT NULL,
  `attached` text,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bug_trace`
--

INSERT INTO `bug_trace` (`id`, `bugid`, `doer`, `poster`, `post_time`, `attached`, `content`) VALUES
  (1, 1, 1, 2, 1479119517, 'false', 'sdfsdfdsfdsfdsfdsfdsf'),
  (2, 1, 1, 2, 1479119788, NULL, 'sdfsdfdsfdsfdsfdsfdsf\r\nsdfdsfdsfds'),
  (3, 1, 1, 2, 1479119793, NULL, 'sdfsdfdsfdsfdsfdsfdsf\r\nsdfdsfdsfds'),
  (4, 1, 1, 2, 1479119808, NULL, 'sdfsdfdsfdsfdsfdsfdsf\r\nsdfdsfdsfds');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `post_time` int(11) DEFAULT NULL COMMENT '发布时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `level` tinyint(4) DEFAULT NULL COMMENT '级别',
  `info` text COMMENT '信息',
  `app_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `post_time`, `update_time`, `level`, `info`, `app_id`) VALUES
  (1, '163828@qq.com', 'admin', 'ebdf9c2365681ee3c55539183423b8a2', 1479117018, 1479117018, 20, NULL, 1),
  (2, '123@qq.com', '阿毛', 'e10adc3949ba59abbe56e057f20f883e', 1479119827, 1479119827, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bug_trace`
--
ALTER TABLE `bug_trace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `bug_trace`
--
ALTER TABLE `bug_trace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;