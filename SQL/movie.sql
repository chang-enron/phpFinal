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
-- 資料表格式： `movie`
-- 

CREATE TABLE `movie` (
  `movie_name` varchar(99) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `date` int(2) NOT NULL,
  `director_name` varchar(99) NOT NULL,
  `actor_name` varchar(99) NOT NULL,
  `introduction` varchar(9999) NOT NULL,
  `level` float NOT NULL,
  `type` varchar(99) NOT NULL,
  `num_command` varchar(99) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY  (`movie_name`),
  UNIQUE KEY `director_name` (`director_name`,`movie_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `movie`
-- 

INSERT INTO `movie` VALUES ('About Time', 2013, 9, 18, 'Richard Curtis', ' Domhnall Gleeson, Rachel McAdams, Bill Nighy', 'At the age of 21, Tim discovers he can travel in time', 4.66667, 'drama', '3', 'http://ia.media-imdb.com/images/M/MV5BMTA1ODUzMDA3NzFeQTJeQWpwZ15BbWU3MDgxMTYxNTk@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/u2PUMA6nFWk');
INSERT INTO `movie` VALUES ('American Hustle', 2013, 12, 31, 'David O. Russell', 'Christian Bale, Amy Adams, Bradley Cooper', 'A con man, Irving Rosenfeld, along with his seductive British partner, Sydney Prosser, is forced to work for a wild FBI agent, Richie DiMaso. DiMaso pushes them into a world of Jersey powerbrokers and mafia.', 0, 'drama', '0', 'http://ia.media-imdb.com/images/M/MV5BNjkxMTc0MDc4N15BMl5BanBnXkFtZTgwODUyNTI1MDE@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/7xEPIYTH0qQ');
INSERT INTO `movie` VALUES ('Anchorman 2:The Legend Continues', 2013, 12, 18, 'Adam McKay', ' Will Ferrell, Christina Applegate, Paul Rudd', 'With the 70s behind him, San Diego''s top rated newsman, Ron Burgundy, returns to take New York''s first 24-hour news channel by storm.', 0, 'comedy', '0', 'http://ia.media-imdb.com/images/M/MV5BMjE5ODk0NjQzNV5BMl5BanBnXkFtZTgwODk4MDA1MDE@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/JRC80uIV0oE');
INSERT INTO `movie` VALUES ('Frozen ', 2013, 12, 27, 'Chris Buck,Jennifer Lee', ' Kristen Bell, Josh Gad, Idina Menzel', 'Fearless optimist Anna teams up with Kristoff in an epic journey', 0, 'animated', '0', 'http://ia.media-imdb.com/images/M/MV5BMTQ1MjQwMTE5OF5BMl5BanBnXkFtZTgwNjk3MTcyMDE@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/dQoR5WyfqQs');
INSERT INTO `movie` VALUES ('The Hobbit:The Desolation of Smaug', 2013, 12, 13, 'Peter Jackson', '  Ian McKellen, Martin Freeman, Richard Armitage', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.', 0, 'action', '0', 'http://ia.media-imdb.com/images/M/MV5BMzU0NDY0NDEzNV5BMl5BanBnXkFtZTgwOTIxNDU1MDE@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/TP2px1aiu14');
INSERT INTO `movie` VALUES ('The Hunger Games: Catching Fire', 2013, 11, 22, 'Francis Lawrence', 'Jennifer Lawrence, Josh Hutcherson, Liam Hemsworth, Philip Seymour Hoffman', 'Katniss Everdeen and Peeta Mellark become targets of the Capitol after their victory in the 74th Hunger Games sparks a rebellion in the Districts of Panem.', 0, 'action', '0', 'http://ia.media-imdb.com/images/M/MV5BMTAyMjQ3OTAxMzNeQTJeQWpwZ15BbWU4MDU0NzA1MzAx._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/xhaxvt0Dl6U');
INSERT INTO `movie` VALUES ('The Wolf of Wall Street', 2013, 12, 25, 'Martin Scorsese', ' Leonardo DiCaprio, Jonah Hill, Margot Robbie ', 'Based on the true story of Jordan Belfort, from his rise to a wealthy stockbroker living the high life to his fall involving crime, corruption and the federal government.', 0, 'comedy', '0', 'http://ia.media-imdb.com/images/M/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_SX640_SY720_.jpg', '//www.youtube.com/embed/qPG1-cAo5sI');
