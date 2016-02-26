-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jan 05, 2014, 06:11 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `a12`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `actor`
-- 

CREATE TABLE `actor` (
  `actor_name` varchar(99) NOT NULL,
  `actor_intro` varchar(99) NOT NULL,
  `pic` varchar(99) NOT NULL,
  PRIMARY KEY  (`actor_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `actor`
-- 

INSERT INTO `actor` VALUES ('Brad Pitt', 'smart', 'http://fabulouscelebrities.com/wp-content/uploads/2013/04/Brad-Pitt_15.jpg');
INSERT INTO `actor` VALUES ('Emma', 'beauty', 'http://www.freefever.com/stock/emma-watson-hd-desktop-mobile.jpg');
