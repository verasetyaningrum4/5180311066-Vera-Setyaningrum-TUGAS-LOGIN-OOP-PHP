/*
SQLyog Ultimate v8.4 
MySQL - 5.5.5-10.4.11-MariaDB-log : Database - db_user
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_user` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_user`;

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`password`,`nama`,`level`) values (2,'vera','$2y$10$DfLJii1Dhx.JqmZKHEL/yeEjDrlWT.m4afEfDKD9SHuZFUDNY4SY2','vera','1'),(3,'reni','$2y$10$9eMqnbeEYyapwf.m37ny1OnfU31S5X4NegeJ9Y19MmIabnjhG9BIy','reni','2'),(4,'admin','$2y$10$7X8T3ZvXIMMhPJhU16GAdeb0xEXLalZ2WVDOt7hN12tbGcoZ5l11S','admin','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
