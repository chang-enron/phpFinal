-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jan 05, 2014, 06:12 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `a12`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `command`
-- 

CREATE TABLE `command` (
  `command_code` int(99) NOT NULL,
  `id` varchar(99) NOT NULL,
  `movie_name` varchar(99) NOT NULL,
  `director_name` varchar(99) NOT NULL,
  `command` varchar(99) NOT NULL,
  `level` int(5) NOT NULL,
  PRIMARY KEY  (`command_code`),
  KEY `movie` (`movie_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `command`
-- 

INSERT INTO `command` VALUES (0, '00057138', 'About Time', '', '0', 5);
INSERT INTO `command` VALUES (1, '00057138', 'About Time', 'Richard Curtis', 'gooood!!', 5);
INSERT INTO `command` VALUES (2, '00057138', '/', '', 'GGGG', 4);
INSERT INTO `command` VALUES (3, '00057138', 'About Time', 'Richard Curtis', 'gooood!!', 4);
INSERT INTO `command` VALUES (4, '00057138', 'About Time', 'Richard Curtis', 'c', 5);
