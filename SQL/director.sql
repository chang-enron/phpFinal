-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jan 05, 2014, 06:13 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `a12`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `director`
-- 

CREATE TABLE `director` (
  `director_name` varchar(99) NOT NULL,
  `director_intro` varchar(99) NOT NULL,
  `pic` varchar(99) NOT NULL,
  PRIMARY KEY  (`director_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `director`
-- 

INSERT INTO `director` VALUES ('Steven Spielberg', 'good', 'http://static.giantbomb.com/uploads/original/0/4859/524034-steven_spielberg.jpg');
INSERT INTO `director` VALUES ('æŽå®‰', 'å®‰éº—', 'http://ent.people.com.cn/mediafile/200601/17/F200601171310451842045125.jpg');
