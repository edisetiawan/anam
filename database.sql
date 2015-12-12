/*
SQLyog Ultimate v11.21 (32 bit)
MySQL - 5.1.33 : Database - jijo_praktikum_uty
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_username` char(6) DEFAULT NULL,
  `admin_password` char(32) DEFAULT NULL,
  `admin_level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`admin_level`) values (1,'ANAM','mhs','0357a7592c4734a8b1e12bc48e29e9e9','student'),(2,'DOSEN','dosen','ce28eed1511f631af6b2a7bb0a85d636','lecturer');

/*Table structure for table `tb_student` */

DROP TABLE IF EXISTS `tb_student`;

CREATE TABLE `tb_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_nim` char(10) NOT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `student_address` text,
  `student_phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_student` */

insert  into `tb_student`(`student_id`,`student_nim`,`student_name`,`student_address`,`student_phone`) values (4,'1000000003','Test 4','Test 4','897987987987'),(5,'1000000004','Test 5','Test 5','897987987987'),(6,'1000000005','Test 6','Test 6','897987987987'),(7,'1000000006','Test 7','Test 7','897987987987'),(8,'1000000007','Test 8','Test 8','897987987987'),(9,'1000000008','Test 9','Test 9','897987987987'),(11,'9883748576','asdfasdf','<strong style=\"color:pink\">TEST</strong>','asdfasdf'),(12,'7263849587','lala','&lt;a href=&quot;logout.php&quot;&gt;vulnerability&lt;/a&gt;','09876723836'),(13,'0987878372','asdfasdfasd','&lt;img src=&quot;05.jpg&quot; style=&quot;width:100%&quot;&gt;','asdfasdf'),(14,'7263849584','asdfasdf','<script>alert(document.cookie);</script>','asdfasdfasdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
