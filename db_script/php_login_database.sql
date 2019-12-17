/*
SQLyog Ultimate v9.63 
MySQL - 5.5.5-10.1.40-MariaDB : Database - php_login_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_login_database` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `php_login_database`;

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dinero` double NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `cuenta` */

insert  into `cuenta`(`id`,`dinero`,`id_user`) values (1,6645,1),(2,1500,2);

/*Table structure for table `movimientos` */

DROP TABLE IF EXISTS `movimientos`;

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaccion` text COLLATE utf8_bin NOT NULL,
  `valor` double NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `movimientos` */

insert  into `movimientos`(`id`,`transaccion`,`valor`,`id_user`) values (1,'Ingresaste: ',1500,1),(2,'Retiraste: ',350,1),(3,'Ingresaste: ',1,1),(4,'Ingresaste: ',123,1),(5,'Ingresaste: ',312312,1),(6,'Ingresaste: ',312321,1),(7,'Retiraste: ',12312,1),(8,'Retiraste: ',12312,1),(9,'Retiraste: ',50100,1),(10,'Retiraste: ',551100,1),(11,'Retiraste: ',13,1),(12,'Ingresaste: ',1330,1),(14,'Retiraste ',15,1),(17,'Retiraste ',150,1),(18,'Retiraste ',235,1),(19,'Ingresaste ',1500,1),(20,'Ingresaste ',1500,2),(21,'Retiraste ',1500,1),(22,'Ingresaste ',150,1),(23,'Retiraste ',150,1),(24,'Retiraste ',999,1),(25,'Retiraste ',1,1),(26,'Ingresaste ',1500,1),(27,'Retiraste ',1200,1),(28,'Ingresaste ',1500,1),(29,'Ingresaste ',1500,1),(30,'Retiraste ',3250,1),(31,'Ingresaste ',1500,1),(32,'Retiraste ',1549,1),(35,'Ingresaste ',54564,1),(36,'Retiraste ',40000,1),(37,'Retiraste ',5420,1),(38,'Retiraste ',5000,1),(39,'Ingresaste ',1000,1),(40,'Ingresaste ',1500,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` text COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`usuario`,`email`,`password`) values (1,'Fernando Romo','fernandoromo401@gmail.com','39235401'),(2,'Alberto Cortez','aberto@hotmail.com','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
