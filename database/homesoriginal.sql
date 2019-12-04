/*
SQLyog Community Edition- MySQL GUI v6.03
Host - 5.0.27-community-log : Database - homes
*********************************************************************
Server version : 5.0.27-community-log
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `homes`;

USE `homes`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `buyhouse` */

DROP TABLE IF EXISTS `buyhouse`;

CREATE TABLE `buyhouse` (
  `name` char(60) NOT NULL,
  `gender` char(6) NOT NULL,
  `address` char(100) NOT NULL,
  `telno` char(50) NOT NULL,
  `city` char(50) NOT NULL,
  `email` char(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `buyhouse` */

insert  into `buyhouse`(`name`,`gender`,`address`,`telno`,`city`,`email`) values ('john','Male','112','64864','hvkh','v,mnv6@yfy.com'),('Evans Githinji','Male','345345','0722471224','Nairobi','evanoskill@gmail.com'),('Pauline Githinji','Female','Moi University Chepkoilel Campus\r\nP.o. Box 1125 - 30100 \r\n','0733876309','Eldoret','pwgithinji@yahoo.com'),('John Waweru','Male','86756','0724903445','Nairobi','jwaweru@yahoo.com'),('Faith Mwai','Female','23689','0721401583','Nairobi','famumwa@yahoo.com'),('Evelyne Something','Female','464665','0728241520','Nairobi','evelynek@newdream.net'),('Dennice Githinji','Male','62000','0724128271','Nairobi','dblanc@gmail.com'),('Ras Dan','Male','54644 - 00200','0728110390','nairobi','wesadan@gmail.com'),('Kennedy Kenina','Male','3487 - 30100','0726875553','Eldoret','genge@gmail.com'),('Sensual Seduction','Female','497209','0723647686','Nakuru','seduction@mocospace.com'),('Kriss Githinji','Male','1125 - 30100','0725975437','Eldoret','klinyao@gmail.com'),('John Waweru','Male','9349 - 00323','0715956632','Kiambu','csymatata@ymail.com'),('Duncan Kisi','Female','345','345435','naivasha','dunnice@jnet.com'),('Duncan Kisi','Female','345','345435','naivasha','dunnice@jnet.com');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL auto_increment,
  `housetype` varchar(50) NOT NULL,
  `houseaddress` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `file_name` varchar(75) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY  (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

/*Table structure for table `sellhouse` */

DROP TABLE IF EXISTS `sellhouse`;

CREATE TABLE `sellhouse` (
  `ID` int(11) NOT NULL auto_increment,
  `housetype` text,
  `houseaddress` text,
  `agentname` text,
  `agentaddress` text,
  `agentphone` text,
  `price` float(10,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `sellhouse` */

insert  into `sellhouse`(`ID`,`housetype`,`houseaddress`,`agentname`,`agentaddress`,`agentphone`,`price`) values (58,'Mansions','kahoya estate eldoret','evans githinji','2340 eldoreu','0738361534',655000.00),(57,'Mansions','kahoya estate eldoret','kriss housing agencies','343 eldoret','0725975437',1200000.00),(56,'Bungalows','Managerial estate mumias','Booker Housing Agencies','3487 Mumias','0733554968',1200000.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
